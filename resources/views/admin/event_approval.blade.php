@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <h3 class="text-center">Danh Sách Sự Kiện Chưa Duyệt</h3>

    @if ($events->isEmpty())
        <div class="alert alert-warning">Không có sự kiện nào chưa được duyệt.</div>
    @else
        <ul class="list-group">
            @foreach ($events as $event)
                <li class="list-group-item d-flex align-items-center">
                    <img src="{{ asset('storage/' . $event->ImageURL) }}" alt="{{ $event->EventName }}" class="event-image me-3">
                    <div>
                        <h5 class="mb-0">{{ $event->EventName }}</h5>
                        <small>{{ $event->StartDate }}</small>
                    </div>
                    <div class="ms-auto">
                        <form action="{{ route('eventApprovalHandler', $event->EventID) }}" method="POST">
                            @csrf
                            <input type="hidden" name="IsApproved" value="1">
                            <button type="submit" class="btn btn-success btn-sm">Duyệt</button>
                        </form>
                        <form action="{{ route('eventApprovalHandler', $event->EventID) }}" method="POST">
                            @csrf
                            <input type="hidden" name="IsApproved" value="0">
                            <button type="submit" class="btn btn-danger btn-sm">Không Duyệt</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection