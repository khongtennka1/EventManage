@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<main id="main" class="main" style="margin-left: -50px; margin-top: -20px;">
    <div class="pagetitle">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h2>Danh sách người dùng</h2>
    </div>

    <form action="{{ route('find_users') }}" method="GET">
        <input type="text" name="keyword" placeholder="Tìm kiếm theo StudentCode, Email, hoặc Username" required 
        style="width: 500px; height: 40px; margin-left: 20px; border: 1px solid rgba(0, 0, 0, 0.2); border-radius: 5px;">
        <button type="submit" style="color: black; background-color:  #06BBCC; width: 100px; height: 30px; border: 1px solid rgba(0, 0, 0, 0.2);">Tìm kiếm</button>
    </form>

    <section class="section dashboard" style="margin-top: 20px;">
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-tabs" id="userTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="admins-tab" data-bs-toggle="tab" href="#admins" role="tab"
                         aria-controls="admins" aria-selected="true">Người quản trị</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="users-tab" data-bs-toggle="tab" href="#users" role="tab"
                         aria-controls="users" aria-selected="false">Người dùng</a>
                    </li>
                </ul>

                <div class="tab-content" id="userTabsContent">
                    <div class="tab-pane fade show active" id="admins" role="tabpanel" aria-labelledby="admins-tab">
                        <div class="card recent-sales overflow-auto mt-3">
                            <div class="card-body">
                                <table class="table table-borderless database">
                                    <thead>
                                        <tr>
                                            <th>UserID</th>
                                            <th>FullName</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>StudentCode</th>
                                            <th>Phone</th>
                                            <th>Point</th>
                                            <th>Avatar</th>
                                            <th>IsActive</th>
                                            <th>Functions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($admins as $user)
                                            <tr>
                                                <td>{{ $user->UserID }}</td>
                                                <td>{{ $user->FullName }}</td>
                                                <td>{{ $user->UserName }}</td>
                                                <td>{{ $user->Email }}</td>
                                                <td>{{ $user->StudentCode }}</td>
                                                <td>{{ $user->PhoneNumber }}</td>
                                                <td>{{ $user->Point }}</td>
                                                <td>
                                                    <img src="{{ asset('storage/' . $user->Avatar) }}" alt="Avatar" class="rounded-circle" style="height: 40px;">
                                                </td>
                                                
                                                <td>{{ $user->IsActive == 1 ? 'Đang hoạt động' : 'Không hoạt động' }}</td>
                                                <td>
                                                    <form action="{{ route('delete_user', $user->UserID) }}" method="POST" onsubmit="return confirmDelete();">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"><i class="bi bi-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                    <script>
                                        function confirmDelete(){
                                            return confirm('Bạn có chắc chắn muốn xoá người dùng này!');
                                        }
                                    </script>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="users" role="tabpanel" aria-labelledby="users-tab">
                        <div class="card recent-sales overflow-auto mt-3">
                            <div class="card-body">
                                <table class="table table-borderless database">
                                    <thead>
                                        <tr>
                                            <th>UserID</th>
                                            <th>FullName</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>StudentCode</th>
                                            <th>Phone</th>
                                            <th>Point</th>
                                            <th>Avatar</th>
                                            <th>IsActive</th>
                                            <th>Functions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->UserID }}</td>
                                                <td>{{ $user->FullName }}</td>
                                                <td>{{ $user->UserName }}</td>
                                                <td>{{ $user->Email }}</td>
                                                <td>{{ $user->StudentCode }}</td>
                                                <td>{{ $user->PhoneNumber }}</td>
                                                <td>{{ $user->Point }}</td>
                                                <td>{{ $user->Avatar }}</td>
                                                <td>{{ $user->IsActive == 1 ? 'Đang hoạt động' : 'Không hoạt động' }}</td>
                                                <td>
                                                    <form action="{{ route('delete_user', $user->UserID) }}" method="POST" onsubmit="return confirmDelete();">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"><i class="bi bi-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                        <script>
                                            function confirmDelete(){
                                                return confirm('Bạn có chắc chắn muốn xoá người dùng này!');
                                            }
                                        </script>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection