@extends('layouts.main')
@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">@yield('breadcrumb')</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('trashs.index') }}">{{__('Trash')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">@yield('breadcrumb')</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        @yield('list_trash')
        <!-- Table -->
        {{-- <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-6">
                                <h3 class="mb-0">{{__('Salaries')}}</h3>
                            </div>
                            <div class="col-lg-6 text-right">
                                <button onclick="restoreItem(this)" data-id="" data-url="salaries/restore/" class="btn btn-sm btn-success"><Span>{{__('Restore All')}}</Span></button>
                                <button onclick="deleteItem(this)" data-id="" data-url="salaries/delete/" class="btn btn-sm btn-youtube"><Span>{{__('Delete All')}}</Span></button>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive py-4">
                        <table  class="table table-flush" id="myTable">
                            <thead class="thead-light">
                                <tr>
                                    <th>{{__('#')}}</th>
                                    <th>{{__('Name')}}</th>
                                    <th>{{__('Date')}}</th>
                                    <th>{{__('Type')}}</th>
                                    <th>{{__('Nominal')}}</th>
                                    @role('admin')
                                    <th style="text-align: center">{{__('Action')}}</th>
                                    @endrole
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>{{__('#')}}</th>
                                    <th>{{__('Name')}}</th>
                                    <th>{{__('Date')}}</th>
                                    <th>{{__('Type')}}</th>
                                    <th>{{__('Nominal')}}</th>
                                    @role('admin')
                                    <th style="text-align: center">{{__('Action')}}</th>
                                    @endrole
                                </tr>
                            </tfoot>
                            <tbody>
                                @php
                                    function idr($salary){
                                        $result = "Rp. " . number_format($salary,2,',','.');
                                        return $result;
                                    }
                                @endphp
                                @foreach ($salaries as $salary)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $salary->user->username }}</td>
                                        <td>{{ $salary->date }}</td>
                                        <td>{{ $salary->type->name }}</td>
                                        <td>{{ idr($salary->nominal) }}</td>
                                        @role('admin')
                                        <td style="vertical-align: middle;" align="center">
                                            <button onclick="restoreItem(this)" data-id="{{$salary->id}}" class="btn btn-sm btn-icon btn-success btn-icon-only rounded-circle" data-toggle="tooltip" data-placement="top" title="Restore"><i class="fa fa-undo"></i></button>
                                            <button onclick="deleteItem(this)" data-id="{{$salary->id}}" class="btn btn-sm btn-icon btn-youtube btn-icon-only rounded-circle" data-toggle="tooltip" data-placement="top" title="Delete Permanent"><i class="fa fa-trash"></i></button>
                                        </td>
                                        @endrole
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Footer -->
        @include('nav.footer')
        @include('trash.delete_script')
        @include('trash.restore_script')
    </div>
    </div>

@endsection
