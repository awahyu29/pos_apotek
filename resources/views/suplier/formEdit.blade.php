<!-- Input groups with icon -->
<div class="form-group">
    <label class="form-control-label">{{__('Nama')}}</label>
    <div class="input-group input-group-merge">
        <input class="form-control form-control" name="nama" placeholder="nama" type="text"
            value="{{ $suplier->nama }}" required>
    </div>
    @error('Nama')
        <small class="text-danger" role="alert">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="form-group">
    <label class="form-control-label">{{__('Kontak')}}</label>
    <div class="input-group input-group-merge">
        <input class="form-control form-control" name="kontak" placeholder="exp : 0812345678" type="number"
            value="{{ $suplier->kontak }}" required>
    </div>
    @error('Kontak')
        <small class="text-danger" role="alert">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="form-group">
    <label class="form-control-label">{{__('Alamat')}}</label>
    <div class="input-group input-group-merge">
        <input class="form-control form-control" name="alamat" placeholder="alamat" type="text"
            value="{{ $suplier->alamat }}" required>
    </div>
    @error('Alamat')
        <small class="text-danger" role="alert">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="form-group">
    <label class="form-control-label">{{__('Email')}}</label>
    <div class="input-group input-group-merge">
        <input class="form-control form-control" name="email" placeholder="Ex : email@email.com" type="email"
            value="{{ $suplier->email }}" required>
    </div>
    @error('Email')
        <small class="text-danger" role="alert">
            {{ $message }}
        </small>
    @enderror
</div>
<button class="btn btn-primary" type="submit">{{__('Submit')}}</button>
