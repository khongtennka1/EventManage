@extends('layouts.master')

@section('css')
    <!-- Bootstrap Datepicker CSS -->
    <link href="{{ URL::asset('build/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css">
    
    <!-- DataTables CSS -->
    <link href="{{ URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    
    <!-- Responsive DataTable Examples -->
    <link href="{{ URL::asset('build/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Events @endslot
        @slot('title') Events List @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 card-title flex-grow-1">Events List</h5>
                        <div class="flex-shrink-0">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#newEvent" class="btn btn-success btn-rounded waves-effect waves-light mb-2">
                                <i class="mdi mdi-plus me-1"></i> New Event
                            </button>
                            <a href="#!" class="btn btn-light"><i class="mdi mdi-refresh"></i></a>
                        </div>
                    </div>
                </div>

                <div class="card-body border-bottom">
                    <form action="{{ route('filterEvents') }}" method="GET">
                        <div class="row g-3">
                            <div class="col-xxl-4 col-lg-6">
                                <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
                            </div>
                            <div class="col-xxl-2 col-lg-6">
                                <select name="status" class="form-select">
                                    <option value="all">Status</option>
                                    <option value="Active" {{ request('status') == 'Active' ? 'selected' : '' }}>Active</option>
                                    <option value="New" {{ request('status') == 'New' ? 'selected' : '' }}>New</option>
                                    <option value="Close" {{ request('status') == 'Close' ? 'selected' : '' }}>Close</option>
                                </select>
                            </div>
                            <div class="col-xxl-2 col-lg-4">
                                <select name="event_type_id" class="form-select">
                                    <option value="">Select Type</option>
                                    @foreach ($eventTypes as $type)
                                        <option value="{{ $type->EventTypeID }}" {{ request('event_type_id') == $type->EventTypeID ? 'selected' : '' }}>
                                            {{ $type->EventTypeName }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xxl-2 col-lg-4">
                                <button type="submit" class="btn btn-soft-secondary w-100">
                                    <i class="mdi mdi-filter-outline align-middle"></i> Filter
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle dt-responsive nowrap w-100 table-check" id="job-list">
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
                                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editEventModal{{ $event->EventID }}">
                                                <i class='bx bxs-edit'></i> Edit
                                            </button>
                                            <form action="{{ route('deleteEventHandler', $event->EventID) }}" method="POST" onsubmit="return confirmDelete();" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class='bx bxs-trash'></i> Delete
                                                </button>
                                            </form>

                                            <a href="{{ route('event-details', $event->EventID) }}" class="btn btn-info btn-sm">Show</a>
                                        </td>
                                    </tr>

                                    <!-- Edit Event Modal -->
                                    <div class="modal fade" id="editEventModal{{ $event->EventID }}" tabindex="-1" aria-labelledby="editEventModalLabel{{ $event->EventID }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editEventModalLabel{{ $event->EventID }}">Edit Event</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('updateEventHandler', $event->EventID) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="EventID" value="{{ $event->EventID }}">
                                                        <div class="mb-3">
                                                            <label for="eventName" class="form-label">Event Name</label>
                                                            <input type="text" class="form-control @error('EventName') is-invalid @enderror" id="eventName" name="EventName" value="{{ $event->EventName }}" required>
                                                            @error('EventName')
                                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="description" class="form-label">Description</label>
                                                            <input type="text" class="form-control @error('Description') is-invalid @enderror" id="descroption" name="Description" value="{{ $event->Description }}" required>
                                                            @error('Description')
                                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="location" class="form-label">Location</label>
                                                            <input type="text" class="form-control @error('Location') is-invalid @enderror" id="location" name="Location" value="{{ $event->Location }}" required>
                                                            @error('Location')
                                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="point" class="form-label">Points</label>
                                                            <input type="number" class="form-control @error('Points') is-invalid @enderror" id="point" name="Points" value="{{ $event->Points }}" required>
                                                            @error('Points')
                                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="eventtype" class="form-label">Event Type</label>
                                                            <select name="EventTypeID" id="eventtype" class="form-control @error('EventTypeID') is-invalid @enderror"  value="{{ $event->eventType->EventTypeName }}" style="height: 50px;">
                                                                <option value="1">Ngày hội thể thao</option>
                                                                <option value="2">Chương trình tình nguyện</option>
                                                                <option value="3">Chương trình giao lưu</option>
                                                                <option value="2">Họp lớp</option>
                                                            </select>
                                                            @error('EventTypeID')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="institutename" class="form-label">Institute Name</label>
                                                            <select name="InstituteID" id="institutename" class="form-control" onchange="updateDepartments()">
                                                                <option value="">Select Institute</option>
                                                                    @foreach($institutes as $institute)
                                                                        <option value="{{ $institute->InstituteID }}" data-faculty="{{ $institute->InstituteID }}">
                                                                            {{ $institute->InstituteName }}
                                                                        </option>
                                                                    @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="departmentname" class="form-label">Department Name</label>
                                                            <select name="DepartmentID" id="departmentname" class="form-control">
                                                                <option value="">Select Department</option>
                                                                    @foreach($departments as $department)
                                                                        <option value="{{ $department->DepartmentID }}" data-faculty="{{ $department->DepartmentID }}">
                                                                            {{ $department->DepartmentName }}
                                                                        </option>
                                                                    @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="participant" class="form-label">Participant</label>
                                                            <input type="number" class="form-control @error('Participant') is-invalid @enderror" id="participant" name="Participant" value="{{ $event->Participant }}" required>
                                                            @error('Participant')
                                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="startdate" class="form-label">Start Date</label>
                                                            <input type="datetime-local" class="form-control @error('StartDate') is-invalid @enderror" id="startdate" name="StartDate" value="{{ date('d-m-Y', strtotime($event->StartDate)) }}" required>
                                                            @error('StartDate')
                                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="enddate" class="form-label">End Date</label>
                                                            <input type="datetime-local" class="form-control @error('EndDate') is-invalid @enderror" id="enddate" name="EndDate" value="{{ date('d-m-Y', strtotime($event->EndDate)) }}" required>
                                                            @error('EndDate')
                                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="ismandatory" class="form-label">IsMandatory</label>
                                                            <select name="IsMandatory" id="ismandatory" class="form-control @error('IsMandatory') is-invalid @enderror" style="height: 50px;">
                                                                <option value="1">Bắt buộc</option>
                                                                <option value="0">Không bắt buộc</option>
                                                            </select>
                                                            @error('IsMandatory')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="eventimg">Event Picture</label>
                                                            <div class="input-group">
                                                                <input type="file" class="form-control @error('ImageURL') is-invalid @enderror"
                                                                    id="avatar" name="ImageURL" autofocus>
                                                                <label class="input-group-text" for="avatar">Upload</label>
                                                            </div>
                                                            <div class="text-start mt-2">
                                                                <img src="{{ !empty($event->ImageURL) ? asset('storage/' . $event->ImageURL) : '' }}" alt="" class="avatar-lg" >
                                                            </div>
                                                            @error('ImageURL')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                        <div class="mt-3 d-grid">
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- New Event Modal -->
    <div class="modal fade" id="newEvent" tabindex="-1" aria-labelledby="newEventLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newEventLabel">Add Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('addEventHandler') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" class="form-control" id="userid-input">
                                <div class="text-center mb-4">
                                    <div class="position-relative d-inline-block">
                                        <div class="position-absolute bottom-0 end-0">
                                            <label for="member-image-input" class="mb-0" data-bs-toggle="tooltip"
                                                data-bs-placement="right" title="Select Event Image">
                                                <div class="avatar-xs">
                                                    <div
                                                        class="avatar-title bg-light border rounded-circle text-muted cursor-pointer">
                                                        <i class="bx bxs-image-alt"></i>
                                                    </div>
                                                </div>
                                            </label>
                                            <input class="form-control d-none" name="ImageURL" value="" id="member-image-input"
                                                type="file" accept="image/png, image/gif, image/jpeg" style="width:40px; height:40px;y"> 
                                        </div>
                                        <div class="avatar-lg">
                                            <div class="avatar-title bg-light">
                                                <img src="{{ URL::asset('build/images/event.jpg') }}" id="member-img" class="avatar-md h-auto" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        <div class="mb-3">
                            <label for="newEventName" class="form-label">Event Name</label>
                            <input type="text" class="form-control @error('EventName') is-invalid @enderror" id="newEventName" name="EventName" required>
                            @error('EventName')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
 
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control @error('Description') is-invalid @enderror" id="description" name="Description" required>
                            @error('Description')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control @error('Location') is-invalid @enderror" id="location" name="Location" required>
                            @error('Location')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="eventtype" class="form-label">Event Type</label>
                            <select name="EventTypeID" id="eventtype" class="form-control @error('EventTypeID') is-invalid @enderror" style="height: 50px;">
                                <option value="1">Ngày hội thể thao</option>
                                <option value="2">Chương trình tình nguyện</option>
                                <option value="3">Chương trình giao lưu</option>
                                <option value="4">Họp lớp</option>
                            </select>
                            @error('EventTypeID')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="institutename" class="form-label">Institute Name</label>
                            <select name="InstituteID" id="institutename" class="form-control" onchange="updateDepartments()">
                                <option value="">Select Institute</option>
                                    @foreach($institutes as $institute)
                                        <option value="{{ $institute->InstituteID }}" data-faculty="{{ $institute->InstituteID }}">
                                            {{ $institute->InstituteName }}
                                        </option>
                                    @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="departmentname" class="form-label">Department Name</label>
                            <select name="DepartmentID" id="departmentname" class="form-control">
                                <option value="">Select Department</option>
                                    @foreach($departments as $department)
                                        <option value="{{ $department->DepartmentID }}" data-faculty="{{ $department->DepartmentID }}">
                                            {{ $department->DepartmentName }}
                                        </option>
                                    @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="startdate" class="form-label">Start Date</label>
                            <input type="datetime-local" class="form-control @error('StartDate') is-invalid @enderror" id="startdate" name="StartDate" required>
                            @error('StartDate')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="enddate" class="form-label">End Date</label>
                            <input type="datetime-local" class="form-control @error('EndDate') is-invalid @enderror" id="enddate" name="EndDate" required>
                            @error('EndDate')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="ismandatory" class="form-label">IsMandatory</label>
                            <select name="IsMandatory" id="ismandatory" class="form-control @error('IsMandatory') is-invalid @enderror" style="height: 50px;">
                                <option value="1">Bắt buộc</option>
                                <option value="0">Không bắt buộc</option>
                            </select>
                            @error('IsMandatory')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="participant" class="form-label">Participant</label>
                            <input type="number" class="form-control @error('Participant') is-invalid @enderror" id="participant" name="Participant" required>
                                @error('Participant')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                        </div>

                        <div class="mb-3">
                            <label for="point" class="form-label">Points</label>
                            <input type="number" class="form-control @error('Points') is-invalid @enderror" id="point" name="Points" required>
                                @error('Points')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        <div class="mt-3 d-grid">
                            <button type="submit" class="btn btn-success">Add Event</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this event?');
        }
    </script>
    <!-- Bootstrap Datepicker JS -->
    <script src="{{ URL::asset('build/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    
    <!-- Job List Initialization -->
    <script src="{{ URL::asset('build/js/pages/job-list.init.js') }}"></script>

    <script>
    function updateDepartments() {
        var instituteID = document.getElementById('institutename').value;
        var departmentSelect = document.getElementById('departmentname');

        departmentSelect.innerHTML = '<option value="">Select Department</option>';

        @foreach($departments as $department)
            if ("{{ $department->InstituteID }}" === instituteID) {
                var option = document.createElement('option');
                option.value = "{{ $department->DepartmentID }}";
                option.textContent = "{{ $department->DepartmentName }}";
                departmentSelect.appendChild(option);
            }
        @endforeach
    }
</script>
@endsection