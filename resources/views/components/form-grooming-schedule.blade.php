<div class="">

    <form action="{{ $url }}" method="POST">
        @csrf
        @if ($action == 'update')
        @method('PUT')
        @endif
        <div class="form-group mb-3">
            <label for="tanggal">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="date" value="{{ $schedule->date ?? '' }}">
        </div>
        <div class="form-group mb-3">
            <label for="session">Jam Mulai</label>
            <input type="time" class="form-control" id="session" name="session"
                value="{{ $action == 'update' ? $schedule->session->format('H:i') : '' }}">
        </div>
        <div class="form-group mb-3">
            <label for="session_end">Jam Selesai</label>
            <input type="time" class="form-control" id="session_end" name="session_end"
                value="{{  $action == 'update' ? $schedule->session_end->format('H:i') : '' }}">
        </div>
        <input type="submit" class="btn btn-success" value="SIMPAN">
        <a href="{{ route('admin.grooming.schedule.index') }}" class="btn btn-primary">Kembali</a>
    </form>
    @if ($action == 'update' && is_null($schedule->grooming))
    <form action="{{ route('admin.grooming.schedule.destroy', ['schedule' => $schedule]) }}" class="mt-3" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="HAPUS" class="btn btn-danger">
    </form>
    @endif
</div>
