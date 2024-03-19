<x-dashboard>
    @slot('content')
            <div class="row mt-4">
                <!-- Grooming Card -->
                <div class="col-md-6">
                    <div class="card mb-4">
                        <a href="{{ route('admin.grooming.index') }}">
                            <img src="{{ asset('media/adm-grooming.svg') }}" class="card-img-top mx-auto d-block"
                                alt="Grooming">
                            <hr class="hr-view">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Grooming</h5>
                            <p class="card-text">Description about grooming...</p>
                        </div>
                    </div>
                </div>

                <!-- Pet Hotel Card -->
                <div class="col-md-6">
                    <div class="card mb-4">
                        <a href="{{ route('admin.pethotel.index') }}">
                            <img src="{{ asset('media/adm-ph.svg') }}" class="card-img-top mx-auto d-block" alt="Pet Hotel">
                            <hr class="hr-view">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Pet Hotel</h5>
                            <p class="card-text">Description about pet hotel...</p>
                        </div>
                    </div>
                </div>

                <!-- Orders Card -->
                <div class="col-md-6 mt-5">
                    <div class="card mb-4">
                        <a href="{{ route('admin.order.index') }}">
                            <img src="{{ asset('media/adm-order.svg') }}" class="card-img-top mx-auto d-block"
                                alt="Orders">
                            <hr class="hr-view">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Orders</h5>
                            <p class="card-text">Description about orders...</p>
                        </div>
                    </div>
                </div>

                <!-- Feedback Card -->
                <div class="col-md-6 mt-5">
                    <div class="card mb-4">
                        <a href="{{ route('landing_page') }}">
                            <img src="{{ asset('media/adm-feedback.svg') }}" class="card-img-top mx-auto d-block"
                                alt="Feedback">
                            <hr class="hr-view">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Feedback</h5>
                            <p class="card-text">Description about feedback...</p>
                        </div>
                    </div>
                </div>
            </div>
    @endslot
</x-dashboard>
