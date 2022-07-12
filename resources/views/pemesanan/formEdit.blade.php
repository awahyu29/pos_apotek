<!-- Input groups with icon -->
<div class="form-group">
    <label class="form-control-label">{{__('Supplier')}}</label>
    <div class="input-group input-group-merge">
        <select class="form-control" data-toggle="select" name="suplier" required>
            <option value="" selected>{{$pemesanan->suplier}}</option>
            @foreach ($suplier as $s)
                @if ($s->nama == $pemesanan->suplier)
                    @php($select = 'selected')
                @else
                    @php($select = '')
                @endif
                <option {{$select}} value="{{ $s->nama }}">{{ $s->nama }}</option>
            @endforeach
        </select>
    </div>
    @error('Supplier')
        <small class="text-danger" role="alert">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="form-group">
    <label class="form-control-label">{{__('Nama Barang')}}</label>
    <div class="input-group input-group-merge">
        <select class="form-control" data-toggle="select" name="nama" required>
            <option value="" selected>{{$pemesanan->nama}}</option>
            @foreach ($barang as $b)
                @if ($b->nama == $pemesanan->nama)
                    @php($select = 'selected')
                @else
                    @php($select = '')
                @endif
                <option {{$select}} value="{{ $b->nama }}">{{ $b->nama }}</option>
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
            value="{{ $pemesanan->jumlah }}" required>
    </div>
    @error('Jumlah')
        <small class="text-danger" role="alert">
            {{ $message }}
        </small>
    @enderror
</div>
<div class="form-group">
    <label class="form-control-label">{{__('Harga Beli')}}</label>
    <div class="input-group input-group-merge">
        <input class="form-control form-control" min="1" name="harga_beli" placeholder="harga Rp." type="number"
            value="{{ $pemesanan->harga_beli }}" required>
    </div>
    @error('Harga Beli')
        <small class="text-danger" role="alert">
            {{ $message }}
        </small>
    @enderror
</div>
<div class="form-group">
    <label class="form-control-label">{{__('Ongkir')}}</label>
    <div class="input-group input-group-merge">
        <input class="form-control form-control" min="1" name="ongkir" placeholder="harga Rp." type="number"
            value="{{ $pemesanan->ongkir }}" required>
    </div>
    @error('Ongkir')
        <small class="text-danger" role="alert">
            {{ $message }}
        </small>
    @enderror
</div>
<button class="btn btn-primary" type="submit">{{__('Submit')}}</button>
