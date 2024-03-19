<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    public function checkout()
    {
        $user_id = Auth::id();
        $carts = Cart::where('user_id', $user_id)->get();

        if ($carts == null) {
            return Redirect::back();
        }

        $order = Order::create([
            'user_id' => $user_id,
        ]);

        foreach ($carts as $cart) {
            $product = Product::find($cart->product_id);
            $product->update([
                'stock' => $product->stock - $cart->amount,
            ]);

            Transaction::create([
                'amount' => $cart->amount,
                'order_id' => $order->id,
                'product_id' => $cart->product_id,
            ]);

            $cart->delete();
        }

        return Redirect::route('show_order', $order);
    }

    public function show(Request $request, Order $order)
    {
        return view('dashboard.order.show', compact('order'));
    }

    public function destroy(Order $order)
    {
        try {
            $order->service()->delete();
            $order->delete();
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('errors', 'Gagal Menghapus Data');
        }
        return redirect()->back()->with('success', 'Berhasil Menghapus Data');
    }

    public function index_order()
    {
        $user = Auth::user();
        $pethotelOrders = $user->orders()->whereHas('service', function ($query) {
            $query->where('service_type', 'LIKE', '%PetHotel%');
        })->orderBy('created_at', 'desc')->get();
        // $pethotelOrders->setPageName('pethotel_order');
        $groomingOrders = $user->orders()->whereHas('service', function ($query) {
            $query->where('service_type', 'LIKE', '%Grooming%');
        })->orderBy('created_at', 'desc')->get();
        // $groomingOrders->setPageName('grooming_order');
        // dd($groomingOrders, $pethotelOrders);
        return view('index_order', compact('groomingOrders', 'pethotelOrders'));
    }

    public function show_order(Order $order)
    {
        $user = Auth::user();
        $is_admin = $user->is_admin;

        if ($is_admin || $user->id == $user->id) {
            return view('show_order', compact('order'));
        }

        return Redirect::route('index_order');
    }

    public function submit_payment_receipt(Order $order, Request $request)
    {
        // dd($request->all());
        try {
            //code...
            $file = $request->file('payment_receipt');
            // $fileName = time() . '_' . $order->id . '.' . $file->extension();
            $path = Storage::disk('public')->put('payment_receipts', $file);
            $order->update([
                'payment_receipt' => $path,
            ]);

        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
            return redirect()->back()->with('errors', 'Gagal Upload Bukti Pembayaran');
        }
        return redirect()->back()->with('success', 'Berhasil Upload Bukti Pembayaran');
    }

    public function confirm_payment(Order $order)
    {
        if ($order->payment_receipt == null) {
            Alert::error('Konfirmasi Gagal', 'Pengguna belum upload bukti bayar');
            return redirect()->back();
        }
        $order->update([
            'is_paid' => true,
        ]);

        Alert::success('Payment Confirmed', 'Pembayaran telah dikonfirmasi!');

        return redirect()->back();
    }

    public function index(Request $request)
    {
        $data = [];
        $orders = Order::query();
        if ($request->end_date && $request->start_date) {
            $orders = $orders->whereBetween('created_at', [$request->start_date, $request->end_date]);
            $data['end_date'] = $request->end_date;
            $data['start_date'] = $request->start_date;
        }
        $orders = $orders->orderBy('created_at', 'desc')->paginate(10);
        $data['orders'] = $orders;
        return view('dashboard.order.index', $data);
    }

    public function filter(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $orders = Order::whereDate('created_at', '>=', $start_date)
            ->whereDate('created_at', '<=', $end_date)
            ->get();

        return view('order_data', compact('orders'));
    }

    public function delete_order(Order $order)
    {
        $order->service->delete();
        $order->delete();

        return Redirect::route('list-order');
    }
}
