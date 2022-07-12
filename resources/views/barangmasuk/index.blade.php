@section('title', '| Barang Masuk')
@extends('layouts.main')
@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">{{ __('Barang Masuk') }}</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('Barang Masuk') }}</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        @can('barangmasuk-create')
                            <a href="/barangmasuk/create" class="btn btn-sm btn-neutral">{{ __('Add Barang Masuk') }}</a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <!-- Table -->
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">{{ __('Barang Masuk') }}</h3>
                    </div>
                    <div class="table-responsive py-4">
                        <table class="table table-flush" id="myTable">
                            <thead class="thead-light">
                                <tr>
                                    <th>{{ __('#') }}</th>
                                    <th>{{ __('Nama') }}</th>
                                    <th>{{ __('Tanggal Masuk') }}</th>
                                    <th>{{ __('Jumlah') }}</th>
                                    <th>{{ __('Harga') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            {{-- <tfoot>
                                <tr>
                                    <th>{{ __('#') }}</th>
                                    <th>{{ __('Nama') }}</th>
                                    <th>{{ __('Tanggal Masuk') }}</th>
                                    <th>{{ __('Jumlah') }}</th>
                                    <th>{{ __('Harga') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </tfoot> --}}
                            <tbody>
                                @php
                                    function idr($salary)
                                    {
                                        $result = 'Rp. ' . number_format($salary, 2, ',', '.');
                                        return $result;
                                    }
                                @endphp
                                @foreach ($barangmasuk as $p)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $p->nama }}</td>
                                        <td>{{ $p->tgl_masuk }}</td>
                                        <td>{{ $p->jumlah }}</td>
                                        <td>{{ idr($p->harga) }}</td>
                                        <td style="vertical-align: middle;">
                                            {{-- @can('barangmasuk-edit')
                                                <a href="{{ route('barangmasuk.edit', $p) }}"
                                                    class="btn btn-sm btn-icon btn-primary btn-icon-only rounded-circle"
                                                    data-toggle="tooltip" data-placement="top" title="Edit"><span
                                                        class="btn-inner--icon"><i class="fas fa-pen-square"></i></span></a>
                                            @endcan --}}
                                            @can('barangmasuk-delete')
                                                <button onclick="deleteItem(this)" data-id="{{ $p->id }}"
                                                    class="btn btn-sm btn-icon btn-youtube btn-icon-only rounded-circle"
                                                    data-toggle="tooltip" data-placement="top" title="Remove">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        @include('nav.footer')
        @include('barangmasuk.remove_script')
    </div>
    </div>

@endsection
