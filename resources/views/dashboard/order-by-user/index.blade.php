<x-dashboard>
    @slot('content')
        <div class="container">
            <h1 class="text-center pd-4">Pelanggan paling banyak Order</h1>
            <hr>

            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped table-dark w-100">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Jumlah Order</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($orders) == 0)
                            <tr>
                                <td colspan="7" class="text-center">Tidak Ada Data Yang Ditampilkan</td>
                            </tr>
                        @endif
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td>{{ $order->user->email }}</td>
                                <td>{{ $order->pesanan }} Order</td>
                                <td class="">
                                    <a href="{{ route('admin.user_most_order.show', ['user' => $order->user->id]) }}"
                                        class="btn btn-success">Lihat Order</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $orders->links('pagination::bootstrap-5') }}
            </div>
        </div>
    @endslot
    @push('script')
        <script>
            $(document).ready(function() {
                $('.confirm-delete').on('click', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Apakah Anda Yakin Menghapus Data?',
                        text: "Anda Tidak Akan Dapat Mengembalikannya!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $(this).parent('form').trigger('submit')
                        } else if (result.isDenied) {
                            Swal.fire('Changes are not saved', '', 'info')
                        }
                    });
                })
            });
        </script>
    @endpush
</x-dashboard>
