@extends('trash.main')
@section('breadcrumb', 'Tasks Trash')
@section('list_trash')
<div class="row">
    <div class="col">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-6">
                        <h3 class="mb-0">{{__('Tasks')}}</h3>
                    </div>
                    <div class="col-lg-6 text-right">
                        <button onclick="restoreItem(this)" data-id="" data-url="tasks/restore/" class="btn btn-sm btn-success"><Span>{{__('Restore All')}}</Span></button>
                        <button onclick="deleteItem(this)" data-id="" data-url="tasks/delete/" class="btn btn-sm btn-youtube"><Span>{{__('Delete All')}}</Span></button>
                    </div>
                </div>
            </div>
            <div class="table-responsive py-2">
                <table class="table table-flush" id="myTable" style="white-space: nowrap">
                    <thead class="thead-light">
                        <tr>
                            <th>{{ __('#') }}</th>
                            <th>{{ __('Task Name') }}</th>
                            @hasanyrole('admin|supervisor')
                            <th>{{ __('Assigned to') }}</th>
                            @endhasanyrole
                            <th>{{ __('Start Date') }}</th>
                            <th>{{ __('Deadline') }}</th>
                            <th style="text-align: center">{{ __('Status') }}</th>
                            <th>{{ __('Assigned by') }}</th>
                            <th>{{ __('Your Work') }}</th>
                            <th>{{ __('Submit Status') }}</th>
                            <th>{{ __('Note') }}</th>
                            <th style="text-align: center">{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>{{ '#' }}</th>
                            <th>{{ __('Task Name') }}</th>
                            @hasanyrole('admin|supervisor')
                            <th>{{ __('Assigned to') }}</th>
                            @endhasanyrole
                            <th>{{ __('Start Date') }}</th>
                            <th>{{ __('Deadline') }}</th>
                            <th style="text-align: center">{{ __('Status') }}</th>
                            <th>{{ __('Assigned by') }}</th>
                            <th>{{ __('Your Work') }}</th>
                            <th>{{ __('Submit Status') }}</th>
                            <th>{{ __('Note') }}</th>
                            <th style="text-align: center">{{ __('Action') }}</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td style="vertical-align: middle;">{{ $loop->iteration }}</td>
                                <td style="vertical-align: middle;">{{ $task->task_name }}</td>
                                @hasanyrole('admin|supervisor')
                                <td style="vertical-align: middle;">{{ $task->user->fullname }}</td>
                                @endhasanyrole
                                <td style="vertical-align: middle;">{{ $task->start_date }}</td>
                                <td style="vertical-align: middle;">
                                    @if ($task->deadline < Carbon\Carbon::now()->toDateString())
                                        <button data-toggle="modal"
                                            data-target="#late-notification-{{ $task->id }}"
                                            class="btn btn-sm btn-outline-danger rounded-pill">{{ $task->deadline }}</button>
                                    @elseif ($task->deadline == Carbon\Carbon::now()->toDateString())
                                        <button data-toggle="modal"
                                            data-target="#due-today-notification-{{ $task->id }}"
                                            class="btn btn-sm btn-outline-warning rounded-pill">{{ $task->deadline }}</button>
                                    @else
                                        <button data-toggle="modal"
                                            data-target="#future-notification-{{ $task->id }}"
                                            class="btn btn-sm btn-outline-primary rounded-pill">{{ $task->deadline }}</button>
                                    @endif
                                </td>
                                <td align="center">
                                    @if ($task->task_status_id == 1)
                                        <div class="progress-wrapper mt--4">
                                            <div class="progress-info">
                                                <div class="progress-label">
                                                    <span
                                                        class="text-danger">{{ $task->taskStatus->name }}</span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-danger" role="progressbar"
                                                    aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                    style="width: 10%;"></div>
                                            </div>
                                        </div>
                                    @elseif ($task->task_status_id == 2)
                                        <div class="progress-wrapper mt--4">
                                            <div class="progress-info">
                                                <div class="progress-label">
                                                    <span>{{ $task->taskStatus->name }}</span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-primary" role="progressbar"
                                                    aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                    style="width: 80%;"></div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="progress-wrapper mt--4">
                                            <div class="progress-info">
                                                <div class="progress-label">
                                                    <span
                                                        class="text-success">{{ $task->taskStatus->name }}</span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                    style="width: 100%;"></div>
                                            </div>
                                        </div>
                                    @endif
                                </td>
                                <td style="vertical-align: middle;">{{ $task->assignor->fullname }}</td>
                                <td style="vertical-align: middle;" align="center">
                                    @if (strlen($task->file) > 0)
                                        <a data-toggle="tooltip" data-placement="top"
                                            title="Attachment is available"
                                            href="{{ asset('file/task/' . $task->file) }}" target="_blank"><img
                                                src="{{ asset('file/task/default.png') }}" width="30px"></a>
                                    @else
                                        <img src="{{ asset('file/task/default-null.png') }}" width="30px"
                                            data-toggle="tooltip" data-placement="top" title="No attachments yet">
                                    @endif
                                </td>
                                <td style="vertical-align: middle;" align="center">
                                    @if ($task->submitted_at == '')
                                        <div class="progress-label">
                                            <span class="text-info">{{ __('--') }}</span>
                                        </div>
                                    @elseif ($task->submitted_at < $task->deadline)
                                            <div class="progress-label">
                                                <span class="text-success">{{ __('On time') }}</span>
                                            </div>
                                        @else
                                            <div class="progress-label">
                                                <span class="text-danger">{{ __('Late') }}</span>
                                            </div>
                                    @endif
                                </td>
                                <td style="vertical-align: middle;">{{ $task->description }}</td>
                                <td style="vertical-align: middle;">
                                    <button onclick="restoreItem(this)" data-id="{{$task->id}}" data-url="tasks/restore/" class="btn btn-sm btn-icon btn-success btn-icon-only rounded-circle" data-toggle="tooltip" data-placement="top" title="Restore"><i class="fa fa-undo"></i></button>
                                    <button onclick="deleteItem(this)" data-id="{{$task->id}}" data-url="tasks/delete/" class="btn btn-sm btn-icon btn-youtube btn-icon-only rounded-circle" data-toggle="tooltip" data-placement="top" title="Delete Permanent"><i class="fa fa-trash"></i></button>
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
