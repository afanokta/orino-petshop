<x-dashboard>
    @slot('content')
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="background-color: #FFEFB0">{{ __('Form Grooming') }}</div>
                    <div class="card-body">
                        <form id="groomingForm" action="{{ route('store_product') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Nama Pemilik</label>
                                <input type="text" name="name" placeholder="Nama" class="form-control" required><br>
                            </div>

                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" name="alamat" placeholder="Alamat" class="form-control" required><br>
                            </div>

                            <div class="form-group">
                                <label>No.HP</label>
                                <input type="text" name="hp" placeholder="0821..." class="form-control"
                                    required><br>
                            </div>

                            <div class="form-group">
                                <label>Nama Hewan</label>
                                <input type="text" name="nama hewan" placeholder="Nama Hewan Peliharaan"
                                    class="form-control" required><br>
                            </div>

                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select name="kelamin" class="form-control" required>
                                    <option value="jantan">Jantan</option>
                                    <option value="betina">Betina</option>
                                </select><br>
                            </div>

                            <div class="form-group">
                                <label>Sinyalement</label>
                                <input type="text" name="kelamin" placeholder="Jenis Kelamin Hewan" class="form-control"
                                    required><br>
                            </div>

                            <div class="form-group">
                                <label>Perlengkapan yang Dibawa</label>
                                <input type="text" name="perlengkapan" placeholder="Perlengkapan" class="form-control"
                                    required><br>
                            </div>

                            <div class="form-group">
                                <label>Jenis Grooming</label>
                                <select name="grooming" class="form-control" required>
                                    <option value="biasa">Grooming Biasa</option>
                                    <option value="kutu">Grooming Kutu</option>
                                    <option value="jamur">Grooming Jamur</option>
                                    <option value="komplit">Grooming Komplit</option>
                                </select><br>
                            </div>

                            <div class="form-group">
                                <label>Catatan Groomer</label>
                                <input type="text" name="catatan" placeholder="Catatan Untuk Groomer"
                                    class="form-control" required><br>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endslot
</x-dashboard>
