<x-dashboard>
    @slot('content')
    @if (!$order->is_paid)
    <div class="d-flex mb-3">
        <form action="{{ route('admin.order.confirm', ['order' => $order->id]) }}" method="POST" class="h-100">
            @csrf
            <button type="submit" class="btn btn-success">Konfirmasi Pesanan</button>
        </form>
        <button class="btn btn-danger ms-2" data-bs-toggle="modal" data-bs-target="#rejectPayment">Tolak
            Pesanan</button>
    </div>
    @endif
    <form action="{{ route('admin.order.update', ['order' => $order]) }}" enctype="multipart/form-data" method="POST">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="form-group mb-3">
                    <label>Order ID</label>
                    <input type="text" name="owner" placeholder="Nama" class="form-control" value="{{ $order->id }}"
                        disabled>
                </div>
                <div class="form-group mb-3">
                    <label>Email</label>
                    <input type="text" name="email" placeholder="Nama" class="form-control"
                        value="{{ $order->user->email }}" disabled>
                </div>
                <div class="form-group mb-3">
                    <label>Nomor Telp.</label>
                    <input type="text" name="phone_number" placeholder="Nama" class="form-control"
                        value="{{ $order->service->phone_number }}" disabled>
                </div>
                <label>Harga</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                    <input type="number" name="price" placeholder="Nama" class="form-control"
                        value="{{ $order->price }}">
                </div>
                <div class="form-group mb-3">
                    <label>Waktu Pesanan Dibuat</label>
                    <input type="datetime" name="price" class="form-control" required disabled
                        value="{{ $order->created_at }}">
                </div>
                <div class="form-group mb-3">
                    <label>Jenis Layanan</label>
                    <input type="text" name="price" class="form-control" required disabled
                        value="{{ $order->service->product->name }}">
                </div>
                <div class="form-group mb-3">
                    <h6>Status:
                        @switch($order->confirmation)
                        @case('accept_form')
                        @case('confirm')
                        <span class="badge bg-success">Form Diterima</span>
                        <span
                            class="fw-bold badge {{ $order->is_paid ? 'bg-success' : 'bg-danger' }}">{{ $order->is_paid ? 'Paid' : 'Unpaid' }}</span>
                        <span
                            class="fw-bold badge {{ $order->payment_receipt != null ? 'bg-success' : 'bg-danger' }}">{{ $order->payment_receipt == null ? 'Belum Bayar' : 'Sudah Bayar' }}</span>
                        @break

                        @case('reject_form')
                        <span class="badge bg-danger">Form Ditolak</span>
                        @break

                        @case('reject')
                        <span class="badge bg-danger">Pembayaran Ditolak</span>
                        @break

                        @default
                        <span class="badge bg-warning">Menunggu Konfirmasi</span>
                        @endswitch
                    </h6>
                </div>
                <div class="rating mb-3">
                    <h5>Rating Pelayanan Oleh Pelanggan</h5>
                    @if ($order->productReview)
                    <table>
                        <tr>
                            <td style="width:150px">Kualitas</td>
                            <td class="">: {{ $order->productReview->kualitas }} <span class="text-warning">★</span></td>
                        </tr>
                        <tr>
                            <td>Pelayanan</td>
                            <td class="">: {{ $order->productReview->pelayanan }} <span class="text-warning">★</span></td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td class="">: {{ $order->productReview->harga }} <span class="text-warning">★</span></td>
                        </tr>
                    </table>
                    @else
                    <div class="">
                        <span class="badge bg-danger">Pengguna belum memberikan review pesanan</span>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <h5>Bukti Pembayaran</h5>
                @if ($order->payment_receipt)
                <img id="gambar" src="{{ Storage::url($order->payment_receipt) }}" alt=""
                    class="img-fluid mh-100 rounded-4">
                @else
                <h5 class="badge bg-danger">Belum Ada Bukti Pembayaran</h5>
                @endif
                <div class="form-group">
                    <label for="payment_receipt_img">Ubah Bukti Pembayaran</label>
                    <input type="file" class="form-control" name="payment_receipt_img" accept="image/png,jpg,jpeg"
                        id="payment_receipt">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                @if ($order->service_type == 'App\Models\Grooming')
                <a class="btn btn-primary"
                    href="{{ route('admin.grooming.show', ['grooming' => $order->service_id]) }}">Lihat Detail
                    Pemesanan Grooming</a>
                @else
                <a class="btn btn-primary"
                    href="{{ route('admin.pethotel.show', ['pethotel' => $order->service_id]) }}">Lihat Detail
                    Pemesanan Pethotel</a>
                @endif
            </div>
            <div class="col">
                <input type="submit" class="btn btn-warning" value="Simpan Perubahan">
            </div>
        </div>
    </form>
    <div class="modal fade" id="rejectPayment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="{{ route('admin.order.rejectPayment', ['order' => $order->id]) }}" method="POST">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content" style="background: #fdf9e5;">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Penolakan Pembayaran</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Alasan Penolakan</label>
                            <textarea class="form-control" name="reject_message" id="" cols="30" rows="10"
                                placeholder="Masukkan Alasan Penolakan"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-warning text-white">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @endslot
</x-dashboard>
