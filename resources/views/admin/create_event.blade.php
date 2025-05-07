@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <h4 class="text-uppercase mb-0 mt-0 page-title">Thêm sự kiện</h4>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <ul class="breadcrumb float-right p-0 mb-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Events</a></li>
                            <li class="breadcrumb-item"><span>Thêm sự kiện</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card" style="margin-top: 20px;">
                <div class="card-body">
                    <form action="{{ route('add_event') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-4"> 
                            <label for="eventName">Tên sự kiện:</label>
                            <input type="text" id="eventName" name="EventName" required class="form-control">
                        </div>

                        <div class="form-group mb-4">
                            <label>Hình ảnh:</label>
                            <input type="file" name="ImageURL" accept="image/*" class="form-control">
                            <small class="form-text text-muted">Max. file size: 50 MB. Allowed images: jpg, gif, png. Maximum 10 images only.</small>
                        </div>

                        <div class="form-group mb-4"> 
                            <label>Loại sự kiện:</label>
                            <select name="EventTypeID" required class="form-control">
                                <option value="1">Ngày hội thể thao</option>
                                <option value="2">Chương trình tình nguyện</option>
                                <option value="3">Chương trình giao lưu</option>
                                <option value="4">Họp lớp</option>
                            </select>
                        </div>

                        <div class="form-group mb-4">
                            <label for="location">Địa điểm:</label>
                            <input type="text" id="location" name="Location" required class="form-control">
                        </div>

                        <div class="form-group mb-4"> 
                            <label for="description">Mô tả:</label>
                            <textarea id="description" name="Description" required class="form-control"></textarea>
                        </div>

                        <div class="form-group row mb-4"> 
                            <div class="col-md-6">
                                <label for="Participant">Số người tham gia:</label>
                                <input type="number" id="Participant" name="Participant" required class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="points">Điểm sự kiện:</label>
                                <input type="number" id="points" name="Points" required class="form-control">
                            </div>
                        </div>

                        <div class="form-group row mb-4"> 
                            <div class="col-md-6">
                                <label for="startTime">Thời gian bắt đầu:</label>
                                <input type="datetime-local" id="startTime" name="StartDate" required class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="endTime">Thời gian kết thúc:</label>
                                <input type="datetime-local" id="endTime" name="EndDate" required class="form-control">
                            </div>
                        </div>

                        <div class="form-group mb-4"> 
                            <h4>Trạng thái:</h4>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" id="radio1" name="IsMandatory" value="1" checked>
                                <label class="form-check-label" for="radio1">Bắt buộc</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" id="radio2" name="IsMandatory" value="0">
                                <label class="form-check-label" for="radio2">Không bắt buộc</label>
                            </div>
                        </div>

                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary btn-lg">Lưu sự kiện</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection