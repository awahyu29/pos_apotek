<!-- Input groups with icon -->
<div class="form-group">
    <label class="form-control-label">{{__('Supplier')}}</label>
    <div class="input-group input-group-merge">
        <select class="form-control" data-toggle="select" name="suplier" required>
            <option value="" selected>{{__('Supplier')}} ..</option>
            @foreach ($suplier as $s)
                <option value="{{ $s->nama }}">{{ $s->nama }}</option>
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
            <option value="" selected>{{__('Nama Barang')}} ..</option>
            @foreach ($barang as $b)
                <option value="{{ $b->nama }}">{{ $b->nama }}</option>
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
<div class="form-group">
    <label class="form-control-label">{{__('Harga Beli')}}</label>
    <div class="input-group input-group-merge">
        <input class="form-control form-control" min="1" name="harga_beli" placeholder="harga Rp." type="number"
            value="{{ old('Harga Beli') }}" required>
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
            value="{{ old('Ongkir') }}" required>
    </div>
    @error('Ongkir')
        <small class="text-danger" role="alert">
            {{ $message }}
        </small>
    @enderror
</div>
<button class="btn btn-primary" type="submit">{{__('Submit')}}</button>
