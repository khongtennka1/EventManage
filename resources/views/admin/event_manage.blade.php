@extends('admin.layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/event_list.css') }}">
@endsection

@section('title', 'Danh Sách Sự Kiện')

@section('content')
    <div class="container mt-4">
        <div class="search-results">
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
        </div>

        <h3 class="text-center">Danh Sách Sự Kiện</h3>
        <a href="{{ route('add_event') }}" class="btn btn-primary mb-3">Thêm sự kiện</a>

        <form action="{{ route('find_events') }}" method="GET" style="position: relative;">
            <input type="text" name="EventName" placeholder="Search" required
                style="width: 500px; height: 40px; margin-bottom: 20px; margin-right: 20px; border: 1px solid rgba(0, 0, 0, 0.2); border-radius: 5px; padding-left: 30px;">
            <button type="submit" style="position: absolute; left: 10px; top: 5px; border: none; background: transparent; cursor: pointer;">
                <i class="bi bi-search" style="font-size: 18px; margin-left: 450px;"></i>
            </button>
        </form>

        <ul class="list-group">
            @foreach ($events as $event)
                <li class="list-group-item d-flex align-items-center">
                    <img src="{{ asset('storage/' . $event->ImageURL) }}" alt="{{ $event->EventName }}"
                        class="event-image me-3">
                    <div>
                        <h5 class="mb-0">{{ $event->EventName }}</h5>
                        <small>{{ $event->StartDate }}</small>
                    </div>

                    <div class="ms-auto">
                        <a href="{{ route('edit_event', $event->EventID) }}" class="btn btn-warning btn-sm">Sửa</a>
                        <form action="{{ route('deleteEventHandler', $event->EventID) }}" method="POST"
                            class="d-inline-block"
                            onsubmit="return confirm('Bạn có chắc chắn muốn xóa sự kiện này không?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                        <a href="{{ route('eventDetails', $event->EventID) }}" class="btn btn-info btn-sm">Chi tiết</a>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <script>
        function confirmDelete() {
            return confirm('Bạn có chắc chắn muốn xoá sự kiện này!');
        }
    </script>
@endsection
