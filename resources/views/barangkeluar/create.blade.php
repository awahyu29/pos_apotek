@section('title','| Barang Keluar - Add')
@extends('layouts.main')
@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Barang Keluar</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('barangkeluar.index') }}">Barang Keluar</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Barang Keluar</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{ route('barangkeluar.index') }}" class="btn btn-sm btn-neutral">Back</a>
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
                        <h3 class="mb-0">Add New Barang Keluar</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <form method="POST" action="{{ route('barangkeluar.store') }}" enctype="multipart/form-data">
                            @csrf
                            @include('barangkeluar.formCreate')
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        @include('nav.footer')
    </div>
    </div>

@endsection
