@section('title', '| Jenis Barang')
@extends('layouts.main')
@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">{{ __('Jenis Barang') }}</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('Jenis Barang') }}</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        @can('jenis-create')
                            <a href="/jenisbarang/create" class="btn btn-sm btn-neutral">{{ __('Add Jenis Barang') }}</a>
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
                        <h3 class="mb-0">{{ __('Jenis Barang') }}</h3>
                    </div>
                    <div class="table-responsive py-4">
                        <table class="table table-flush" id="myTable">
                            <thead class="thead-light">
                                <tr>
                                    <th width="10%">{{ __('#') }}</th>
                                    <th>{{ __('jenis') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            {{-- <tfoot>
                                <tr>
                                    <th width="10%">{{ __('#') }}</th>
                                    <th>{{ __('jenis') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </tfoot> --}}
                            <tbody>
                                @foreach ($jenis as $j)
                                    <tr>
                                        <td width="10%">{{ $loop->iteration }}</td>
                                        <td>{{ $j->jenis }}</td>
                                        <td style="vertical-align: middle;">
                                            @can('jenis-edit')
                                                <a href="{{ route('jenisbarang.edit', $j) }}"
                                                    class="btn btn-sm btn-icon btn-primary btn-icon-only rounded-circle"
                                                    data-toggle="tooltip" data-placement="top" title="Edit"><span
                                                        class="btn-inner--icon"><i class="fas fa-pen-square"></i></span></a>
                                            @endcan
                                            @can('jenis-delete')
                                                <button onclick="deleteItem(this)" data-id="{{ $j->id }}"
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
        @include('jenisbarang.remove_script')
    </div>
    </div>

@endsection
