<!-- Input groups with icon -->
<div class="form-group">
    <label class="form-control-label">{{__('Nama Barang')}}</label>
    <div class="input-group input-group-merge">
        <select class="form-control" data-toggle="select" name="nama" required>
            <option value="" selected>{{ $barangmasuk->nama }}</option>
            @foreach ($pemesanan as $s)
            @if ($s->nama == $barangmasuk->nama)
                    @php($select = 'selected')
                @else
                    @php($select = '')
                @endif
                <option {{$select}} value="{{ $s->nama }}">{{ $s->nama }}</option>
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
    <label class="form-control-label">{{ __('Tanggal Masuk') }}</label>
    <div class="input-group input-group-merge">
        <input type="text" value="{{ $barangmasuk->tgl_masuk }}" class="form-control datepicker" name="tgl_masuk"
            placeholder="Tanggal Masuk" required>
        @error('Tanggal Masuk')
            <small class="text-danger" role="alert">
                {{ $message }}
            </small>
        @enderror
    </div>
</div>

<div class="form-group">
    <label class="form-control-label">{{__('Jumlah')}}</label>
    <div class="input-group input-group-merge">
        <input class="form-control form-control" name="jumlah" placeholder="jumlah" type="number"
            value="{{ $barangmasuk->jumlah }}" required>
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
            value="{{ $barangmasuk->harga }}" required>
    </div>
    @error('Harga')
        <small class="text-danger" role="alert">
            {{ $message }}
        </small>
    @enderror
</div> --}}
<button class="btn btn-primary" type="submit">{{__('Submit')}}</button>
