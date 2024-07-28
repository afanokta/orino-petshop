<div class="card-body">
    @if (count($orders) == 0)
    <div class="card mb-2" style="height: 100px">
        <div class="card-body align-self-middle">
            <p class="text-center m-0">Belum Ada Order</p>
        </div>
    </div>
    @endif
    @foreach ($orders as $order)
    <div class="card my-4">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h5 class="card-title">Order ID {{ $order->id }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted"> By {{ $order->user->name }}</h6>
                </div>
                <div class="col d-flex justify-content-end align-items-start gap-2">
                    @switch($order->confirmation)
                    @case('waiting')
                    <span class="badge bg-warning p-2">Menunggu Konfirmasi</span>
                    @break

                    @case('accept_form')
                    @case('confirm')
                    @if ($order->is_paid == true)
                    <span class="card-text badge bg-success p-2">Paid</span>
                    @else
                    <span class="card-text badge bg-danger p-2">Unpaid</span>
                    @endif
                    <span class="badge bg-success p-2">Form Diterima</span>
                    @break

                    @case('reject_form')
                    <span style="cursor: pointer;" class="card-text badge bg-danger p-2" data-bs-toggle="modal"
                        data-bs-target="#alasan{{ $order->id }}">
                        Form Ditolak
                    </span>
                    @break

                    @default
                    @if ($order->is_paid == true)
                    <span class="card-text badge bg-success p-2">Paid</span>
                    @else
                    <span style="cursor: pointer;" class="card-text badge bg-danger p-2" data-bs-toggle="modal"
                        data-bs-target="#alasan{{ $order->id }}">
                        Pembayaran Ditolak
                    </span>
                    <span class="card-text badge bg-danger p-2">Unpaid</span>
                    @endif
                    @endswitch
                    <div class="modal fade" id="alasan{{ $order->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content" style="background: #fdf9e5;">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Mohon Maaf Pemesanan
                                        Anda Telah Ditolak
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h5>Pesanan Anda ditolak karena <span
                                            class="text-danger">{{ $order->reject_message }}</span>,
                                        Silahkan
                                        Lakukan Pemesanan Ulang</h5>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-around my-2">
                    @if ($order->confirmation == 'confirm' && is_null($order->productReview))
                    <button type="button" class="btn btn-primary text-white fw-bold" data-bs-toggle="modal"
                        data-bs-target="#review{{ $order->id }}">Beri Ulasan</button>
                    @endif
                    <button type="button" class="btn btn-success text-white fw-bold" data-bs-toggle="modal"
                        data-bs-target="#checkForm{{ $order->id }}">
                        Check Order
                    </button>
                </div>
            </div>
        </div>
    </div>
    @if ($order->confirmation == 'confirm')
    {{-- MODAL REVIEW --}}
    <div class="modal fade" id="review{{ $order->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <form action="{{ route('productReview.store') }}" method="POST">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content" style="background: #fdf9e5;">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Review Layanan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex">
                        <input type="text" hidden value="{{ $order->id }}" name="order_id">
                        <table class="mx-auto">
                            <tr>
                                <td>Kualitas:</td>
                                <td>
                                    <div class="rate">
                                        <input type="radio" id="star5kualitas{{ $order->id }}" name="kualitas" value="5" />
                                        <label for="star5kualitas{{ $order->id }}" title="text">5 stars</label>
                                        <input type="radio" id="star4kualitas{{ $order->id }}" name="kualitas" value="4" />
                                        <label for="star4kualitas{{ $order->id }}" title="text">4 stars</label>
                                        <input type="radio" id="star3kualitas{{ $order->id }}" name="kualitas" value="3" />
                                        <label for="star3kualitas{{ $order->id }}" title="text">3 stars</label>
                                        <input type="radio" id="star2kualitas{{ $order->id }}" name="kualitas" value="2" />
                                        <label for="star2kualitas{{ $order->id }}" title="text">2 stars</label>
                                        <input type="radio" id="star1kualitas{{ $order->id }}" name="kualitas" value="1" />
                                        <label for="star1kualitas{{ $order->id }}" title="text">1 star</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Pelayanan:</td>
                                <td>
                                    <div class="rate">
                                        <input type="radio" id="star5pelayanan{{ $order->id }}" name="pelayanan" value="5" />
                                        <label for="star5pelayanan{{ $order->id }}" title="text">5 stars</label>
                                        <input type="radio" id="star4pelayanan{{ $order->id }}" name="pelayanan" value="4" />
                                        <label for="star4pelayanan{{ $order->id }}" title="text">4 stars</label>
                                        <input type="radio" id="star3pelayanan{{ $order->id }}" name="pelayanan" value="3" />
                                        <label for="star3pelayanan{{ $order->id }}" title="text">3 stars</label>
                                        <input type="radio" id="star2pelayanan{{ $order->id }}" name="pelayanan" value="2" />
                                        <label for="star2pelayanan{{ $order->id }}" title="text">2 stars</label>
                                        <input type="radio" id="star1pelayanan{{ $order->id }}" name="pelayanan" value="1" />
                                        <label for="star1pelayanan{{ $order->id }}" title="text">1 star</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Harga:</td>
                                <td>
                                    <div class="rate">
                                        <input type="radio" id="star5harga{{ $order->id }}" name="harga" value="5" />
                                        <label for="star5harga{{ $order->id }}" title="text">5 stars</label>
                                        <input type="radio" id="star4harga{{ $order->id }}" name="harga" value="4" />
                                        <label for="star4harga{{ $order->id }}" title="text">4 stars</label>
                                        <input type="radio" id="star3harga{{ $order->id }}" name="harga" value="3" />
                                        <label for="star3harga{{ $order->id }}" title="text">3 stars</label>
                                        <input type="radio" id="star2harga{{ $order->id }}" name="harga" value="2" />
                                        <label for="star2harga{{ $order->id }}" title="text">2 stars</label>
                                        <input type="radio" id="star1harga{{ $order->id }}" name="harga" value="1" />
                                        <label for="star1harga{{ $order->id }}" title="text">1 star</label>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">SIMPAN</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    {{-- END OF MODAL REVIEW --}}
    @endif
    {{-- MODAL --}}
    <div class="modal fade" id="checkForm{{ $order->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content" style="background: #fdf9e5;">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Order</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if ($order->service_type == 'App\Models\Grooming')
                    <x-show-grooming-form :order="$order"></x-show-grooming-form>
                    @else
                    <x-show-pet-hotel-form :order="$order"></x-show-pet-hotel-form>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    {{-- END OF MODAL --}}
    @endforeach
</div>
{{-- </div> --}}
