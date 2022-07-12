@section('title', '| Pemesanan')
@extends('layouts.main')
@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">{{ __('Pemesanan') }}</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('Pemesanan') }}</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        @can('pemesanan-create')
                            <a href="/pemesanan/create" class="btn btn-sm btn-neutral">{{ __('Add Pemesanan') }}</a>
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
                        <h3 class="mb-0">{{ __('Pemesanan') }}</h3>
                    </div>
                    <div class="table-responsive py-4">
                        <table class="table table-flush" id="myTable">
                            <thead class="thead-light">
                                <tr>
                                    <th>{{ __('#') }}</th>
                                    <th>{{ __('Supplier') }}</th>
                                    <th>{{ __('Nama Barang') }}</th>
                                    <th>{{ __('Jumlah') }}</th>
                                    <th>{{ __('Biaya') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            {{-- <tfoot>
                                <tr>
                                    <th>{{ __('#') }}</th>
                                    <th>{{ __('Supplier') }}</th>
                                    <th>{{ __('Nama Barang') }}</th>
                                    <th>{{ __('Jumlah') }}</th>
                                    <th>{{ __('Biaya') }}</th>
                                    <th>{{ __('Status') }}</th>
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
                                @foreach ($pemesanan as $p)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $p->suplier }}</td>
                                        <td>{{ $p->nama }}</td>
                                        <td>{{ $p->jumlah }}</td>
                                        <td>{{ idr($p->biaya) }}</td>
                                        @if ($p->status == 1)
                                        <td><span class="badge rounded-pill text-warning">undelivered</span><i class="ni ni-delivery-fast text-warning"></i></td>
                                        @elseif($p->status == 2)
                                        <td><span class="badge rounded-pill text-success">delivered</span><i class="ni ni-delivery-fast text-success"></i></td>
                                        @endif
                                        <td style="vertical-align: middle;">
                                            @can('pemesanan-edit')
                                                <a href="{{ route('pemesanan.edit', $p) }}"
                                                    class="btn btn-sm btn-icon btn-primary btn-icon-only rounded-circle"
                                                    data-toggle="tooltip" data-placement="top" title="Edit"><span
                                                        class="btn-inner--icon"><i class="fas fa-pen-square"></i></span></a>
                                            @endcan
                                            @can('pemesanan-delete')
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
        @include('pemesanan.remove_script')
    </div>
    </div>

@endsection
