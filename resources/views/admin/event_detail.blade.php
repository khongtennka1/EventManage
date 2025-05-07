@extends('admin.layouts.app')

@section('title', 'Chi tiết sự kiện')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <h4 class="text-uppercase mb-0 mt-0 page-title">Chi tiết sự kiện</h4>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <ul class="breadcrumb float-right p-0 mb-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Events</a></li>
                            <li class="breadcrumb-item"><span>Chi tiết sự kiện</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card" style="margin-top: 20px;">
                <div class="card-body">
                    <h5 class="card-title">Tên sự kiện: {{ $event->EventName }}</h5>
                    <p class="card-text">Địa điểm: {{ $event->Location }}</p>
                    <p class="card-text">Loại sự kiện: {{ $event->EventTypeID }}</p>
                    <p class="card-text">Mô tả: {{ $event->Description }}</p>
                    <p class="card-text">Số người tham gia: {{ $event->Participant }}</p>
                    <p class="card-text">Ngày bắt đầu: {{ $event->StartDate }}</p>
                    <p class="card-text">Ngày kết thúc: {{ $event->EndDate }}</p>

                    @if($event->ImageURL)
                        <div class="mb-4">
                            <label>Hình ảnh:</label><br>
                            <img src="{{ asset('storage/' . $event->ImageURL) }}" alt="Hình ảnh sự kiện" style="width: 150px; height: 120px;">
                        </div>
                    @endif

                    <a href="{{ route('edit_event', $event->EventID) }}" class="btn btn-warning">Sửa</a>
                    <form action="{{ route('deleteEventHandler', $event->EventID) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sự kiện này không?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </form>
                    <a href="{{ route('event_manage') }}" class="btn btn-secondary">Quay lại</a>
                </div>
            </div>
        </div>
    </div>  
@endsection
    <script>
        function confirmDelete() {
            return confirm('Bạn có chắc chắn muốn xoá sự kiện này!');
        }
    </script>   
