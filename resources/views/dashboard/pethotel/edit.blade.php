<x-dashboard>
    @slot('content')
        <div class="row">
            <div class="col">
                <a href="{{ route('admin.order.show', ['order' => $pethotel->order->id]) }}" class="btn btn-primary">Lihat
                    Order</a>
            </div>
        </div>
        <form action="{{ route('admin.pethotel.update', ['pethotel' => $pethotel]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="row">
                        <div class="col-lg-6 col">
                            <div class="form-group">
                                <label>Tanggal Mulai Pemesanan</label>
                                <input type="date" name="start_date" value="{{ $pethotel->start_date }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6 col">
                            <div class="form-group">
                                <label>Tanggal Akhir Pemesanan</label>
                                <input type="date" name="end_date" value="{{ $pethotel->end_date }}"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nama Pemilik</label>
                        <input type="text" name="owner" placeholder="Nama" class="form-control"
                            value="{{ $pethotel->owner }}" />
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="address" placeholder="Alamat" class="form-control"
                            value="{{ $pethotel->address }}" />
                    </div>
                    <div class="form-group">
                        <label>No.HP</label>
                        <input type="text" name="phone_number" placeholder="0821..." class="form-control"
                            value="{{ $pethotel->phone_number }}" />
                    </div>

                    <div class="form-group">
                        <label>Nama Kucing</label>
                        <input type="text" name="pet_name" placeholder="Nama Kucing Peliharaan" class="form-control"
                            value="{{ $pethotel->pet_name }}" />
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="pet_gender" class="form-control form-select" required>
                            <option value="jantan" {{ $pethotel->pet_gender == 'jantan' ? 'selected' : '' }}>Jantan</option>
                            <option value="betina" {{ $pethotel->pet_gender == 'betina' ? 'selected' : '' }}>Betina</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Usia</label>
                        <input type="number" name="pet_age" placeholder="Usia Kucing" class="form-control"
                            value="{{ $pethotel->pet_age }}" />
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="form-group">
                        <label>Merk Pakan</label>
                        <input type="text" name="pet_food" placeholder="Merk Makanan" class="form-control"
                            value="{{ $pethotel->pet_food }}" />
                    </div>
                    <div class="form-group">
                        <label>Catatan</label>
                        <input type="text" name="note" placeholder="Catatan" class="form-control"
                            value="{{ $pethotel->note }}" />
                    </div>

                    <div class="form-group">
                        <label>Sertifikat Vaksin</label>
                        @if ($pethotel->vaccine != null)
                            <img src="{{ Storage::url($pethotel->vaccine) }}" alt="" class="img-fluid">
                        @else
                            <h5 class="badge bg-danger">Tidak Ada Data</h5>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>File Medical Check Up H-1</label>
                        @if ($pethotel->medcheck != null)
                            <img src="{{ Storage::url($pethotel->medcheck) }}" alt="" class="img-fluid">
                        @else
                            <h5 class="badge bg-danger">Tidak Ada Data</h5>
                        @endif
                    </div>
                    <input type="submit" value="Simpan Data" class="btn btn-success">
                </div>
            </div>
        </form>
    @endslot
</x-dashboard>
