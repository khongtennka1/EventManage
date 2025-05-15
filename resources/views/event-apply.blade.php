@extends('layouts.master')

@section('title') @lang('translation.Apply_Job') @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Jobs @endslot
@slot('title') Job Apply @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body border-bottom">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0 card-title flex-grow-1">Applied Jobs</h5>
                    <div class="flex-shrink-0">
                        <select class="form-select" aria-label="Default select example">
                            <option value="Today" selected>Today</option>
                            <option value="1 Monthly">1 Month</option>
                            <option value="6 Month">6 Month</option>
                            <option value="1 Years">1 Year</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered align-middle nowrap">
                        <thead>
                           <tr>
                                <th scope="col">No</th>
                                <th scope="col">Title</th>
                                <th scope="col">Type</th>
                                <th scope="col">Start Date</th>
                                <th scope="col">Image</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if (isset($events) && $events->isNotEmpty())
                                @foreach ($events as $event)
                                    <tr>
                                        <td>{{ $event->EventID }}</td>
                                        <td>{{ $event->EventName }}</td>
                                        <td>{{ $event->eventType->EventName }}</td>
                                        <td>{{ $event->StartDate }}</td>
                                        <td>
                                            <img src="{{ asset('storage/' . $event->ImageURL) }}" alt="{{ $event->EventName }}" style="max-width: 50px; max-height: 50px;">
                                        </td>
                                        <td><span class="badge bg-success">{{ $event->status }}</span></td>
                                        <td>
                                            <form action="{{ route('eventApprovalHandler', $event->EventID) }}" method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit" name="IsApproved" value="1" class="btn btn-success"><i class="bxr bx-check-circle"></i></button>
                                            </form>

                                            <form action="{{ route('deleteEventHandler', $event->EventID) }}" method="POST" onsubmit="return confirmDelete();" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="mdi mdi-delete-outline"></i>
                                                </button>
                                            </form>

                                            <a href="{{ route('event-details', $event->EventID) }}"><i class="mdi mdi-eye-outline"></i></a>
                                        </td>
                                    </tr>                                    
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="row justify-content-between align-items-center">
                    <div class="col-auto me-auto">
                        <p class="text-muted mb-0">Showing <b>1</b> to <b>12</b> of <b>45</b> entries</p>
                    </div>
                    <div class="col-auto">
                        <div class="card d-inline-block mb-0">
                            <div class="card-body p-2">
                                <nav aria-label="Page navigation example" class="mb-0">
                                    <ul class="pagination mb-0">
                                        <li class="page-item">
                                            <a class="page-link" href="javascript:void(0);" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>
                                        <li class="page-item active"><a class="page-link" href="javascript:void(0);">2</a></li>
                                        <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                        <li class="page-item"><a class="page-link" href="javascript:void(0);">...</a></li>
                                        <li class="page-item"><a class="page-link" href="javascript:void(0);">12</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="javascript:void(0);" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
        </div>
        <!--end card-->
    </div>
    <!--end col-->

</div>
<!--end row-->

<!-- Modal -->
<div class="modal fade" id="jobDelete" tabindex="-1" aria-labelledby="jobDeleteLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-body px-4 py-5 text-center">
                <button type="button" class="btn-close position-absolute end-0 top-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="avatar-sm mb-4 mx-auto">
                    <div class="avatar-title bg-primary text-primary bg-opacity-10 font-size-20 rounded-3">
                        <i class="mdi mdi-trash-can-outline"></i>
                    </div>
                </div>
                <p class="text-muted font-size-16 mb-4">Are you sure you want to permanently erase the job.</p>

                <div class="hstack gap-2 justify-content-center mb-0">
                    <button type="button" class="btn btn-danger">Delete Now</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script src="{{URL::asset('build/js/app.js')}}"></script>
@endsection
