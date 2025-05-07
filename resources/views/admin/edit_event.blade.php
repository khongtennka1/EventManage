@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <h4 class="text-uppercase mb-0 mt-0 page-title">Sửa sự kiện</h4>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <ul class="breadcrumb float-right p-0 mb-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Events</a></li>
                            <li class="breadcrumb-item"><span>Sửa sự kiện</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card" style="margin-top: 20px;">
                <div class="card-body">
                    <form action="{{ route('updateEventHandler', $event->EventID) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-4"> 
                            <label for="eventName">Tên sự kiện:</label>
                            <input type="text" id="eventName" name="EventName" value="{{ old('EventName', $event->EventName) }}" required class="form-control">
                        </div>

                        <div class="form-group mb-4">
                            <label>Hình ảnh:</label>
                            <input type="file" name="ImageURL" accept="image/*" class="form-control">
                            <small class="form-text text-muted">Max. file size: 50 MB. Allowed images: jpg, gif, png.</small>
                        </div>
                        
                        @if($event->ImageURL)
                            <div class="mb-4">
                                <label>Hình ảnh hiện tại:</label><br>
                                <img src="{{ asset('storage/' . $event->ImageURL) }}" alt="Hình ảnh sự kiện" style="width: 150px; height: 120px;">
                            </div>
                        @endif

                        <div class="form-group mb-4"> 
                            <label>Loại sự kiện:</label>
                            <select name="EventTypeID" required class="form-control">
                                <option value="1" {{ $event->EventTypeID == 1 ? 'selected' : '' }}>Ngày hội thể thao</option>
                                <option value="2" {{ $event->EventTypeID == 2 ? 'selected' : '' }}>Chương trình tình nguyện</option>
                                <option value="3" {{ $event->EventTypeID == 3 ? 'selected' : '' }}>Chương trình giao lưu</option>
                                <option value="4" {{ $event->EventTypeID == 4 ? 'selected' : '' }}>Họp lớp</option>
                            </select>
                        </div>

                        <div class="form-group mb-4">
                            <label for="location">Địa điểm:</label>
                            <input type="text" id="location" name="Location" value="{{ old('Location', $event->Location) }}" required class="form-control">
                        </div>

                        <div class="form-group mb-4"> 
                            <label for="description">Mô tả:</label>
                            <textarea id="description" name="Description" required class="form-control">{{ old('Description', $event->Description) }}</textarea>
                        </div>

                        <div class="form-group row mb-4"> 
                            <div class="col-md-6">
                                <label for="Participant">Số người tham gia:</label>
                                <input type="number" id="Participant" name="Participant" value="{{ old('Participant', $event->Participant) }}" required class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="points">Điểm sự kiện:</label>
                                <input type="number" id="points" name="Points" value="{{ old('Points', $event->Points) }}" required class="form-control">
                            </div>
                        </div>

                        <div class="form-group row mb-4"> 
                            <div class="col-md-6">
                                <label for="startTime">Thời gian bắt đầu:</label>
                                <input type="datetime-local" id="startTime" name="StartDate" value="{{ old('StartDate', $event->StartDate) }}" required class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="endTime">Thời gian kết thúc:</label>
                                <input type="datetime-local" id="endTime" name="EndDate" value="{{ old('EndDate', $event->EndDate) }}" required class="form-control">
                            </div>
                        </div>

                        <div class="form-group mb-4"> 
                            <h4>Trạng thái:</h4>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" id="radio1" name="IsMandatory" value="1" {{ $event->IsMandatory == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="radio1">Bắt buộc</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" id="radio2" name="IsMandatory" value="0" {{ $event->IsMandatory == 0 ? 'checked' : '' }}>
                                <label class="form-check-label" for="radio2">Không bắt buộc</label>
                            </div>
                        </div>

                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary btn-lg">Cập nhật sự kiện</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection