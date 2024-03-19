<x-dashboard>
    @slot('content')
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-3">
                    <div class="card-header fw-bold" style="background-color: #FFEFB0">{{ __('Order Invoice') }}</div>

                    @php
                        $total_price = 0;
                    @endphp

                    <div class="card-body">
                        <h5 class="card-title">Order ID {{ $order->id }}</h5>
                        <h6 class="card-subtittle mb-2 text-muted">By {{ $order->user->name }}</h6>

                        @if ($order->is_paid == true)
                            <p class="card-text">Paid</p>
                        @else
                            <p class="card-text">Unpaid</p>
                        @endif
                        <hr>

                        @foreach ($order->transactions as $transaction)
                            <p>{{ $transaction->product->name }} - {{ $transaction->amount }} pcs</p>
                            @php
                                $total_price += $transaction->product->price * $transaction->amount;
                            @endphp
                        @endforeach
                        <hr>
                        <p>Total: {{ $total_price }}</p>
                        <hr>

                        @if ($order->is_paid == false && $order->payment_receipt == null && !Auth::user()->is_admin)
                            <form action="{{ route('submit_payment_receipt', $order) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Upload bukti pembayaran</label><br>
                                    <input type="file" name="payment_receipt" class="form-control"><br>
                                </div>
                                <button type="submit" class="btn btn-warning fw-bold mt-3">Kirim Pembayaran</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endslot
</x-dashboard>
