@extends('trash.main')
@section('breadcrumb', 'Overtimes Trash')
@section('list_trash')
<div class="row">
    <div class="col">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-6">
                        <h3 class="mb-0">{{__('Overtimes')}}</h3>
                    </div>
                    <div class="col-lg-6 text-right">
                        <button onclick="restoreItem(this)" data-id="" data-url="overtimes/restore/" class="btn btn-sm btn-success"><Span>{{__('Restore All')}}</Span></button>
                        <button onclick="deleteItem(this)" data-id="" data-url="overtimes/delete/" class="btn btn-sm btn-youtube"><Span>{{__('Delete All')}}</Span></button>
                    </div>
                </div>
            </div>
            <div class="table-responsive py-2">
                <table class="table table-flush" id="myTable">
                    <thead class="thead-light">
                        <tr>
                            <th>{{ __('#') }}</th>
                            <th style="text-align: center">User id</th>
                            <th style="text-align: center">Date</th>
                            <th style="text-align: center">status</th>
                            <th style="text-align: center">authorized_by</th>
                            <th style="text-align: center">{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>{{ __('#') }}</th>
                            <th style="text-align: center">User id</th>
                            <th style="text-align: center">Date</th>
                            <th style="text-align: center">Status</th>
                            <th style="text-align: center">Authorized by</th>
                            <th style="text-align: center">{{ __('Action') }}</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($overtimes as $overtime)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td style="text-align: center">{{ $overtime->user->fullname }}</td>
                                <td style="text-align: center">{{ $overtime->date }}</td>
                                <td style="text-align: center">{{ $overtime->status }}</td>
                                <td style="text-align: center">
                                    @if($overtime->authorized_by != null)
                                        {{ $overtime->authorizer->fullname }}
                                    @else
                                        {{ __('-') }}
                                    @endif
                                </td>
                                <td style="text-align: center" align="center">
                                    <button onclick="restoreItem(this)" data-id="{{$overtime->id}}" data-url="overtimes/restore/" class="btn btn-sm btn-icon btn-success btn-icon-only rounded-circle" data-toggle="tooltip" data-placement="top" title="Restore"><i class="fa fa-undo"></i></button>
                                    <button onclick="deleteItem(this)" data-id="{{$overtime->id}}" data-url="overtimes/delete/" class="btn btn-sm btn-icon btn-youtube btn-icon-only rounded-circle" data-toggle="tooltip" data-placement="top" title="Delete Permanent"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
