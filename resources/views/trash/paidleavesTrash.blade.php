@extends('trash.main')
@section('breadcrumb', 'PaidLeave Trash')
@section('list_trash')
<div class="row">
    <div class="col">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-6">
                        <h3 class="mb-0">{{__('PaidLeave')}}</h3>
                    </div>
                    <div class="col-lg-6 text-right">
                        <button onclick="restoreItem(this)" data-id="" data-url="paidLeaves/restore/" class="btn btn-sm btn-success"><Span>{{__('Restore All')}}</Span></button>
                        <button onclick="deleteItem(this)" data-id="" data-url="paidLeaves/delete/" class="btn btn-sm btn-youtube"><Span>{{__('Delete All')}}</Span></button>
                    </div>
                </div>
            </div>
            <div class="table-responsive py-2">
                <table class="table table-flush" id="myTable">
                    <thead class="thead-light">
                        <tr>
                            <th>{{ __('#') }}</th>
                            <th>{{ __('Employee') }}</th>
                            <th style="text-align: center">{{ __('Status') }}</th>
                            <th style="text-align: center">{{ __('Authorized by') }}</th>
                            <th style="text-align: center">{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>{{ __('#') }}</th>
                            <th>{{ __('Employee') }}</th>
                            <th style="text-align: center">{{ __('Status') }}</th>
                            <th style="text-align: center">{{ __('Authorized by') }}</th>
                            <th style="text-align: center">{{ __('Action') }}</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($paidLeaves as $paidLeave)
                            <tr>
                                <td style="vertical-align: middle">{{ $loop->iteration }}</td>
                                <td style="vertical-align: middle">{{ $paidLeave->user->fullname }}</td>
                                <td style="vertical-align: middle" align="center">
                                    @if ($paidLeave->status == 'unprocessed')
                                        <div class="progress-label">
                                            <span class="text-default">{{ $paidLeave->status }}</span>
                                        </div>
                                    @elseif ($paidLeave->status == 'authorized')
                                        <div class="progress-label">
                                            <span class="text-success">{{ $paidLeave->status }}</span>
                                        </div>
                                    @else
                                        <div class="progress-label">
                                            <span class="text-danger">{{ $paidLeave->status }}</span>
                                        </div>
                                    @endif
                                </td>
                                <td style="vertical-align: middle" align="center">
                                    @if ($paidLeave->authorized_by != 0)
                                        {{ $paidLeave->authorizer->fullname }}
                                    @else
                                        <div class="progress-label">
                                            <span class="text-danger">{{ __('--') }}</span>
                                        </div>
                                    @endif
                                </td>
                                <td style="vertical-align: middle" align="center">
                                    <button onclick="restoreItem(this)" data-id="{{$paidLeave->id}}" data-url="paidLeaves/restore/" class="btn btn-sm btn-icon btn-success btn-icon-only rounded-circle" data-toggle="tooltip" data-placement="top" title="Restore"><i class="fa fa-undo"></i></button>
                                    <button onclick="deleteItem(this)" data-id="{{$paidLeave->id}}" data-url="paidLeaves/delete/" class="btn btn-sm btn-icon btn-youtube btn-icon-only rounded-circle" data-toggle="tooltip" data-placement="top" title="Delete Permanent"><i class="fa fa-trash"></i></button>
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
