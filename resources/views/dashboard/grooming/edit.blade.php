<x-dashboard>
    @slot('content')
        <div class="row my-2">
            <div class="col">
                <a href="{{ route('admin.order.show', ['order' => $grooming->order->id]) }}" class="btn btn-primary">Lihat
                    Order</a>
            </div>
        </div>
        <form action="{{ route('admin.grooming.update', ['grooming' => $grooming]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="form-group mb-2">
                        <label>Layanan Grooming</label>
                        <select name="product_id" class="form-control form-select" required>
                            <option value="{{ $grooming->product->id }}" selected>{{ $grooming->product->name }}</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group mb-2">
                                <label>Tanggal Grooming</label>
                                <input type="date" name="start_date" value="{{ $grooming->date }}" class="form-control"
                                    readonly>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group mb-2">
                                <label>Sesi</label>
                                <input type="time" name="end_date" value="{{ $grooming->session->format('H:i') }}"
                                    class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <label>Nama Pemilik</label>
                        <input type="text" name="owner" placeholder="Nama" class="form-control" readonly
                            value="{{ $grooming->owner }}" />
                    </div>
                    <div class="form-group mb-2">
                        <label>Alamat</label>
                        <input type="text" name="address" placeholder="Alamat" class="form-control" readonly
                            value="{{ $grooming->address }}" />
                    </div>
                    <div class="form-group mb-2">
                        <label>No.HP</label>
                        <input type="text" name="phone_number" placeholder="0821..." class="form-control" readonly
                            value="{{ $grooming->phone_number }}" />
                    </div>

                </div>
                <div class="col-lg-6 col-12">
                    <div class="form-group mb-2">
                        <label>Nama Kucing</label>
                        <input type="text" name="pet_name" placeholder="Nama Kucing Peliharaan" class="form-control"
                            readonly value="{{ $grooming->pet_name }}" />
                    </div>
                    <div class="form-group mb-2">
                        <label>Jenis Kelamin</label>
                        <select name="pet_gender" class="form-control form-select" required>
                            <option value="jantan" {{ $grooming->pet_gender == 'jantan' ? 'selected' : '' }}>Jantan
                            </option>
                            <option value="betina" {{ $grooming->pet_gender == 'betina' ? 'selected' : '' }}>Betina
                            </option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label>Sinyalement</label>
                        <input type="text" name="pet_food" placeholder="Merk Makanan" class="form-control" readonly
                            value="{{ $grooming->sinyalement }}" />
                    </div>
                    <div class="form-group mb-2">
                        <label>Catatan</label>
                        <input type="text" name="note" placeholder="Catatan" class="form-control" readonly
                            value="{{ $grooming->note }}" />
                    </div>
                    <input type="submit" value="Simpan Data" class="btn btn-success">
                </div>
            </div>
        </form>
    @endslot
</x-dashboard>
