<x-user-page>
    @slot('content')
        {{-- <body style="background:#fdf9e5"> --}}
        <section class="container">
            <div class="row gap-lg-0 gap-4">
                <div class="col-lg-6 col-12">
                    <!-- Grooming Orders -->
                    <div class="card">
                        <div class="card-header fw-bold" style="background-color: #FFEFB0">{{ __('Pet Hotel Orders') }}</div>
                        <x-order-card :orders="$pethotelOrders"></x-order-card>
                        {{-- {{ $pethotelOrders->appends(array_except(Request::query(), 'pethotel_order'))->links('pagination::bootstrap-5') }} --}}
                    </div>
                </div>

                <div class="col-lg-6 col-12">
                    <!-- Pet Hotel Orders -->
                    <div class="card">
                        <div class="card-header fw-bold" style="background-color: #FFEFB0">{{ __('Grooming Orders') }}</div>
                        <x-order-card :orders="$groomingOrders"></x-order-card>
                        {{-- {{ $groomingOrders->appends(array_except(Request::query(), 'grooming_order'))->links('pagination::bootstrap-5') }} --}}
                    </div>
                </div>
        </section>
    @endslot
</x-user-page>
