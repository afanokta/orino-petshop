<x-dashboard>
    @slot('content')
    <div class="row">
        <div class="col">
            <a href="{{ route('admin.order.show', ['order' => $pethotel->order->id]) }}" class="btn btn-primary">Lihat
                Order</a>
            <a href="{{ route('admin.pethotel.edit', ['pethotel' => $pethotel->id]) }}"
                class="btn btn-warning ms-1">Edit
                Data</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-7 col-12">
            <div class="row">
                <div class="col-lg-6 col">
                    <div class="form-group mb-2">
                        <label>Tanggal Mulai Pemesanan</label>
                        <input type="date" name="start_date" value="{{ $pethotel->start_date }}" class="form-control"
                            readonly>
                    </div>
                </div>
                <div class="col-lg-6 col">
                    <div class="form-group mb-2">
                        <label>Tanggal Akhir Pemesanan</label>
                        <input type="date" name="end_date" value="{{ $pethotel->end_date }}" class="form-control"
                            readonly>
                    </div>
                </div>
            </div>
            <div class="form-group mb-2">
                <label>Nama Pemilik</label>
                <input type="text" name="owner" placeholder="Nama" class="form-control" value="{{ $pethotel->owner }}"
                    readonly />
            </div>
            <div class="form-group mb-2">
                <label>Alamat</label>
                <input type="text" name="address" placeholder="Alamat" class="form-control"
                    value="{{ $pethotel->address }}" readonly />
            </div>
            <div class="form-group mb-2">
                <label>No.HP</label>
                <input type="text" name="phone_number" placeholder="0821..." class="form-control"
                    value="{{ $pethotel->phone_number }}" readonly />
            </div>

            <div class="form-group mb-2">
                <label>Nama Kucing</label>
                <input type="text" name="pet_name" placeholder="Nama Kucing Peliharaan" class="form-control"
                    value="{{ $pethotel->pet_name }}" readonly />
            </div>
        </div>

        <div class="col justify-content-center">
            <div class="form-group mb-2">
                <label>Jenis Kelamin</label>
                <label>Jenis Kelamin</label>
                <input type="text" name="pet_age" placeholder="Usia Kucing" class="form-control"
                    value="{{ $pethotel->pet_gender }}" readonly />
            </div>
            <div class="form-group mb-2">
                <label>Usia</label>
                <input type="text" name="pet_age" placeholder="Usia Kucing" class="form-control"
                    value="{{ $pethotel->pet_age }}" readonly />
            </div>

            <div class="form-group mb-2">
                <label>Merk Pakan</label>
                <input type="text" name="pet_food" placeholder="Merk Makanan" class="form-control"
                    value="{{ $pethotel->pet_food }}" readonly />
            </div>
            <div class="form-group mb-2">
                <label>Catatan</label>
                <textarea type="text" name="note" placeholder="Catatan" class="form-control" readonly>{{ $pethotel->note }}</textarea>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="{{ $pethotel->vaccine == true ? 1 : 0 }}"
                    {{ $pethotel->vaccine ? 'checked' : '' }} id="flexCheckIndeterminate" name="vaccine" disabled>
                <label class="form-check-label" for="flexCheckIndeterminate">
                    Ada Sertifikat?
                </label>
            </div>
        </div>
    </div>
    @endslot
</x-dashboard>
