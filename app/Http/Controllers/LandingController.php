<?php

namespace App\Http\Controllers;

use App\Models\ProductReview;

class LandingController extends Controller
{
    public function landing_page()
    {
        $reviews = ProductReview::selectRaw("id, order_id, kualitas, pelayanan, harga, (kualitas + pelayanan + harga ) / 3 AS average")->orderBy('average', 'desc')->with('order:id,user_id', 'order.user:id,name')->limit(5)->get();
        $average = ProductReview::selectRaw("AVG(harga) as harga, AVG(kualitas) as kualitas, AVG(pelayanan) as pelayanan")->get();
        $average_total = ($average[0]->harga + $average[0]->harga + $average[0]->kualitas) / 3;
        // dd($average);
        return view('landing_page', compact('reviews', 'average', 'average_total'));
    }
}
