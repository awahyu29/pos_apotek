<!-- Input groups with icon -->
<div class="form-group">
    <label class="form-control-label">{{__('Jenis')}}</label>
    <div class="input-group input-group-merge">
        <input class="form-control form-control" name="jenis" placeholder="jenis barang" type="text"
            value="{{ $jenis->jenis }}" required>
    </div>
    @error('Jenis')
        <small class="text-danger" role="alert">
            {{ $message }}
        </small>
    @enderror
</div>
<button class="btn btn-primary" type="submit">{{__('Submit')}}</button>
