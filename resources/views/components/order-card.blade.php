<div class="card-body">
    <div class="row">
        <div class="col">
            @if (count($orders) == 0)
                <div class="card mb-2" style="height: 100px">
                    <div class="card-body align-self-middle">
                        <p class="text-center m-0">Belum Ada Order</p>
                    </div>
                </div>
            @endif
            @foreach ($orders as $order)
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title">Order ID {{ $order->id }}</h5>
                                <h6 class="card-subtittle mb-2 text-muted"> By {{ $order->user->name }}</h6>
                            </div>
                            <div class="col">
                                {{-- {{ $order->is_paid }} --}}
                                @if ($order->is_paid == true)
                                    <p class="card-text badge bg-success p-2 align-">Paid</p>
                                @else
                                    <p class="card-text badge bg-danger p-2">Unpaid</p>
                                @endif
                            </div>
                        </div>
                        <div class="d-flex justify-content-around">
                            @if ($order->payment_receipt)
                                <button type="button" class="btn btn-primary text-white fw-bold" data-bs-toggle="modal"
                                    data-bs-target="#buktiBayar{{ $order->id }}">Lihat Bukti Bayar</button>
                            @else
                                <button type="button" class="btn btn-warning text-white fw-bold" data-bs-toggle="modal"
                                    data-bs-target="#uploadPayment{{ $order->id }}">Bayar</button>
                            @endif
                            <button type="button" class="btn btn-success text-white fw-bold" data-bs-toggle="modal"
                                data-bs-target="#checkForm{{ $order->id }}">
                                Check Form
                            </button>
                        </div>
                    </div>
                </div>
                @if ($order->payment_receipt)
                    {{-- MODAL BUKTI BAYAR --}}
                    <div class="modal fade" id="buktiBayar{{ $order->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content" style="background: #fdf9e5;">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Bukti Pembayaran</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img class="img-fluid" src="{{ asset('storage/' . $order->payment_receipt) }}"
                                        alt="">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    {{-- MODAL PEMBAYARAN --}}
                    <div class="modal fade" id="uploadPayment{{ $order->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <form action="{{ route('order.pay', ['order' => $order->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="modal-dialog">
                                <div class="modal-content" style="background: #fdf9e5;">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Bukti Pembayaran</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Silahkan Upload Bukti Pembayaran, status pemesanan akan tetap "Unpaid" hingga
                                            staff
                                            Admin kami mengonfirmasi bukti pembayaran Anda</p>
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Upload bukti Pembayaran</label>
                                            <input class="form-control" type="file" id="formFile"
                                                name="payment_receipt">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-warning text-white">Upload</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                @endif
                {{-- MODAL --}}
                <div class="modal fade" id="checkForm{{ $order->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content" style="background: #fdf9e5;">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Form</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @if ($order->service_type == 'App\Models\Grooming')
                                    <x-show-grooming-form :order="$order"></x-show-grooming-form>
                                @else
                                    <x-show-pet-hotel-form :order="$order"></x-show-pet-hotel-form>
                                @endif
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- @if ($order->service_type == 'App\Models\Grooming')
                {{ Paginator::setPageName('grooming') }}
            @else
                {{ Paginator::setPageName('pethotel') }}
            @endif --}}
            {{-- {{ $orders->links('pagination::bootstrap-5') }} --}}
        </div>
    </div>
</div>
