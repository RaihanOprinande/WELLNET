<div class="mb-3">
    <label>Jenis Kelamin</label>
    <select name="jenis_kelamin" class="form-control">
        <option value="">-- Pilih --</option>
        <option value="Laki-laki" {{ old('jenis_kelamin', $user_setting->jenis_kelamin ?? '') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
        <option value="Perempuan" {{ old('jenis_kelamin', $user_setting->jenis_kelamin ?? '') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
    </select>
</div>

<div class="mb-3">
    <label>Umur</label>
    <input type="number" name="umur" class="form-control"
        value="{{ old('umur', $user_setting->umur ?? '') }}" placeholder="Masukkan umur">
</div>

<div class="mb-3">
    <label>Skor</label>
    <input type="number" name="skor" class="form-control"
        value="{{ old('skor', $user_setting->skor ?? '') }}">
</div>

<div class="mb-3">
    <label>Lencana</label>
    <select name="lencana" class="form-control">
        <option value="">-- Pilih --</option>
        @foreach(['Seedling','Sprout','Explorer','Trailblazer','Mountaineer','Skywalker','Digital Sage'] as $badge)
            <option value="{{ $badge }}" {{ old('lencana', $user_setting->lencana ?? '') == $badge ? 'selected' : '' }}>
                {{ $badge }}
            </option>
        @endforeach
    </select>
</div>

<div class="row">
    <div class="col-md-6">
        <label>Waktu Tidur (Mulai)</label>
        <input type="time" name="sleep_schedule_start" class="form-control"
            value="{{ old('sleep_schedule_start', $user_setting->sleep_schedule_start ?? '') }}">
    </div>
    <div class="col-md-6">
        <label>Waktu Tidur (Selesai)</label>
        <input type="time" name="sleep_schedule_end" class="form-control"
            value="{{ old('sleep_schedule_end', $user_setting->sleep_schedule_end ?? '') }}">
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-6">
        <label>Digital Freetime (Mulai)</label>
        <input type="time" name="digital_freetime_start" class="form-control"
            value="{{ old('digital_freetime_start', $user_setting->digital_freetime_start ?? '') }}">
    </div>
    <div class="col-md-6">
        <label>Digital Freetime (Selesai)</label>
        <input type="time" name="digital_freetime_end" class="form-control"
            value="{{ old('digital_freetime_end', $user_setting->digital_freetime_end ?? '') }}">
    </div>
</div>

<div class="mb-3 mt-3">
    <label>Downtime (menit)</label>
    <input type="number" name="downtime" class="form-control"
        value="{{ old('downtime', $user_setting->downtime ?? '') }}">
</div>
