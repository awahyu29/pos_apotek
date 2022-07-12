<!-- Input groups with icon -->
<div class="form-group">
    <label class="form-control-label">{{__('Nama Barang')}}</label>
    <div class="input-group input-group-merge">
        <select class="form-control" data-toggle="select" name="nama" required>
            <option value="" selected>{{__('Nama Barang')}} ..</option>
            @foreach ($barang as $s)
                <option value="{{ $s->nama }}">{{ $s->nama }}</option>
            @endforeach
        </select>
    </div>
    @error('Nama Barang')
        <small class="text-danger" role="alert">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="form-group">
    <label class="form-control-label">{{__('Jumlah')}}</label>
    <div class="input-group input-group-merge">
        <input class="form-control form-control" name="jumlah" placeholder="jumlah" type="number"
            value="{{ old('Jumlah') }}" required>
    </div>
    @error('Jumlah')
        <small class="text-danger" role="alert">
            {{ $message }}
        </small>
    @enderror
</div>
{{-- <div class="form-group">
    <label class="form-control-label">{{__('Harga')}}</label>
    <div class="input-group input-group-merge">
        <input class="form-control form-control" name="harga" placeholder="harga Rp." type="number"
            value="{{ old('Harga') }}" required>
    </div>
    @error('Harga')
        <small class="text-danger" role="alert">
            {{ $message }}
        </small>
    @enderror
</div> --}}
<button class="btn btn-primary" type="submit">{{__('Submit')}}</button>
