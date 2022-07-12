<!-- Input groups with icon -->
<div class="form-group">
    <label class="form-control-label">{{__('Nama')}}</label>
    <div class="input-group input-group-merge">
        <input class="form-control form-control" name="nama" placeholder="nama" type="text"
            value="{{ $barangs->nama }}" required>
    </div>
    @error('Nama')
        <small class="text-danger" role="alert">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="form-group">
    <label class="form-control-label">{{__('Satuan')}}</label>
    <div class="input-group input-group-merge">
        <input class="form-control form-control" name="satuan" placeholder="lbr/kg/pcs" type="text"
            value="{{ $barangs->satuan }}" required>
    </div>
    @error('Satuan')
        <small class="text-danger" role="alert">
            {{ $message }}
        </small>
    @enderror
</div>
<div class="form-group">
    <label class="form-control-label">{{__('Jenis')}}</label>
    <div class="input-group input-group-merge">
        <select class="form-control" data-toggle="select" name="jenis" required>
            <option value="" selected>{{ $barangs->jenis }}</option>
            @foreach ($jenis as $j)
                @if ($j->jenis == $barangs->jenis)
                    @php($select = 'selected')
                @else
                    @php($select = '')
                @endif
                <option {{$select}} value="{{ $j->jenis }}">{{ $j->jenis }}</option>
            @endforeach
        </select>
    </div>
    @error('Jenis')
        <small class="text-danger" role="alert">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="form-group">
    <label class="form-control-label">{{__('Harga')}}</label>
    <div class="input-group input-group-merge">
        <input class="form-control form-control" name="harga" placeholder="harga Rp." type="number"
            value="{{ $barangs->harga }}" required>
    </div>
    @error('Harga')
        <small class="text-danger" role="alert">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="form-group">
    <label class="form-control-label">{{__('Jumlah')}}</label>
    <div class="input-group input-group-merge">
        <input class="form-control form-control" name="jumlah" placeholder="harga Rp." type="text"
            value="{{ $barangs->jumlah }}" required>
    </div>
    @error('Jumlah')
        <small class="text-danger" role="alert">
            {{ $message }}
        </small>
    @enderror
</div>
<button class="btn btn-primary" type="submit">{{__('Submit')}}</button>
