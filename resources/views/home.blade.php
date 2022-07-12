{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    {{ __('You are logged in!') }}
</div>
</div>
</div>
</div>
</div>
@endsection --}}
@section('title', '| Dashboard')
@extends('layouts.main')
@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- Card stats -->
                @if ($checkProfil == true)
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="alert alert-danger" role="alert">
                                <span class="alert-icon"><i class="fa fa-exclamation-circle"></i></span>
                                <span class="alert-text">
                                    <strong>Your profile is not complete!</strong>
                                    Complete your profile so you can use the features to the fullest!
                                    <a href="{{ route('profile') }}"
                                        class="text-nowrap text-white text-underline">Complete
                                        profile now</a>
                                </span>
                            </div>
                        </div>
                    </div>
                @endif
                @role('admin')
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Depart</h5>
                                        <span class="h2 font-weight-bold mb-0">{{ $departements }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                                            <i class="fa fa-sitemap"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <a href="{{ route('departements.index') }}" class="text-nowrap">
                                        Go to departements index
                                        <i class="fa fa-arrow-right"></i>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Pengguna</h5>
                                        <span class="h2 font-weight-bold mb-0">{{ $users }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-warning text-white rounded-circle shadow">
                                            <i class="fa fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <a href="{{ route('users.index') }}" class="text-nowrap">
                                        Go to users index
                                        <i class="fa fa-arrow-right"></i>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Barang</h5>
                                        <span class="h2 font-weight-bold mb-0">{{ $barang }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-success text-white rounded-circle shadow">
                                            <i class="fa fa-money-check-alt"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <a href="{{ route('barang.index') }}" class="text-nowrap">
                                        Go to barang index
                                        <i class="fa fa-arrow-right"></i>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Suplier</h5>
                                        <span class="h2 font-weight-bold mb-0">{{ $suplier }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                            <i class="ni ni-badge"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <a href="{{ route('suplier.index') }}" class="text-nowrap">
                                        Go to supplier index
                                        <i class="fa fa-arrow-right"></i>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                @endrole

                @role('supervisor')
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Karyawan</h5>
                                        <span class="h2 font-weight-bold mb-0">{{ $users->count() }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-warning text-white rounded-circle shadow">
                                            <i class="fa fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <a href="{{ route('users.index') }}" class="text-nowrap">
                                        Go to users index
                                        <i class="fa fa-arrow-right"></i>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Barang</h5>
                                        <span class="h2 font-weight-bold mb-0">{{ $barang }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                            <i class="fa fa-tasks"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <a href="{{ route('barang.index') }}" class="text-nowrap">
                                        Go to barang index
                                        <i class="fa fa-arrow-right"></i>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Suplier</h5>
                                        <span class="h2 font-weight-bold mb-0">{{ $suplier }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                            <i class="fa fa-file-alt"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <a href="{{ route('suplier.index') }}" class="text-nowrap">
                                        Go to suplier index
                                        <i class="fa fa-arrow-right"></i>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                @endrole
            </div>
        </div>
    </div>
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <!-- Title -->
                        <h5 class="h3 mb-0">Holiday Notice</h5>
                    </div>
                    <!-- Card body -->
                    <div class="card-body mb-12">
                        @if (count($response['response']['holidays']) < 1)
                            <div class="alert alert-danger" role="alert">
                                <span class="alert-icon"><i class="fa fa-sad-tear"></i></span>
                                <span class="alert-text"><strong>No holidays this month!</strong> Don't be sad,
                                    maybe
                                    next month!</span>
                            </div>
                        @endif
                        @for ($i = 0; $i < count($response['response']['holidays']); $i++)
                            <div class="timeline timeline-one-side" data-timeline-content="axis"
                                data-timeline-axis-style="dashed">
                                <div class="timeline-block">
                                    <span class="timeline-step badge-success">
                                        <i class="ni ni-bell-55"></i>
                                    </span>
                                    @php
                                        $date = $response['response']['holidays'][$i]['date']['iso'];
                                        $date = substr($date, 8, 2) . '-' . substr($date, 5, 2) . '-' . substr($date, 0, 4);
                                        $day = date('l', strtotime($date));
                                    @endphp
                                    <div class="timeline-content">
                                        <div class="d-flex p-2">
                                            <div>
                                                <span
                                                    class="text-muted text-sm font-weight-bold">{{ $response['response']['holidays'][$i]['description'] }}</span>
                                            </div>
                                        </div>
                                        <h6 class="text-sm mt-1 mb-0"><i
                                                class="fas fa-clock mr-1"></i>{{ $day . ', ' . $date }}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                        @endfor
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card bg-default">
                          <div class="card-header bg-transparent">
                            <div class="row align-items-center">
                              <div class="col">
                                <h6 class="text-light text-uppercase ls-1 mb-1">Overview</h6>
                                <h5 class="h3 text-white mb-0">Advantage</h5>
                              </div>
                              <div class="col">
                                <ul class="nav nav-pills justify-content-end">
                                  <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales-dark" data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}' data-prefix="Rp." data-suffix="k">
                                    <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                                      <span class="d-none d-md-block">Month</span>
                                      <span class="d-md-none">M</span>
                                    </a>
                                  </li>
                                  <li class="nav-item" data-toggle="chart" data-target="#chart-sales-dark" data-update='{"data":{"datasets":[{"data":[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}' data-prefix="Rp." data-suffix="k">
                                    <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                                      <span class="d-none d-md-block">Week</span>
                                      <span class="d-md-none">W</span>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                          <div class="card-body">
                            <!-- Chart -->
                            <div class="chart">
                              <!-- Chart wrapper -->
                              <canvas id="chart-sales-dark" class="chart-canvas"></canvas>
                            </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
        </div>
    </div>
    <!-- Footer -->
    <footer>
        <div class="container-fluid">
            @include('nav.footer')
        </div>
    </footer>
@endsection
