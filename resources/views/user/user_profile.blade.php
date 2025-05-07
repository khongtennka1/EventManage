<link href="{{ asset('assets_user/css/user_profile.css') }}" rel="stylesheet">
@extends('user.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="user-container">
        <h4 style="margin-bottom: 20px;">Quản lý tài khoản</h4>
        <div class="card" style="border: none;">
            <div class="card-body pt-3">
                <ul class="nav nav-tabs nav-tabs-bordered">
                    <li class="nav-item">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-info">Thông tin cá nhân</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-changePassword">Thay đổi mật khẩu</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-delete">Xoá tài khoản</button>
                    </li>
                </ul>

                <div class="tab-content">
                    <div id="profile-info" class="tab-pane fade show active pt-3">
                        <form action="{{ route('userProfileHandler', $user->UserID) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <h5>Thông tin cá nhân</h5>
                            <div class="image-upload">
                                <input type="file" name="Avatar" accept="image/*" style="display: none;" id="avatar">
                                <label for="avatar" class="custom-file-upload">
                                    <i class="fas fa-camera"></i> Tải ảnh
                                </label>
                            </div>
                            <img id="preview" src="" alt="Preview"
                                style="display: none; max-width: 100px; margin-top: 10px;">
                            <input type="hidden" name="UserID" value="{{ $user->UserID }}">
        
                            <div style="display: flex; gap: 10px; margin-bottom: 15px;">
                                <div style="flex: 1;">
                                    <label for="FullName">Tên người dùng</label>
                                    <input type="text" name="FullName" value="{{ $user->FullName }}" style="width: 80%;">
                                </div>
        
                                <div style="flex: 1;">
                                    <label for="Username">Tên tài khoản</label>
                                    <input type="text" name="Username" value="{{ $user->UserName }}" required
                                        style="width: 80%;">
                                </div>
                            </div>
        
                            <div style="display: flex; gap: 10px; margin-bottom: 15px;">
                                <div style="flex: 1;">
                                    <label for="StudentCode">Mã sinh viên</label>
                                    <input type="text" name="StudentCode" value="{{ $user->StudentCode }}" style="width: 80%;">
                                </div>
        
                                <div style="flex: 1;">
                                    <label for="Point">Điểm rèn luyện</label>
                                    <input type="text" style="width: 80%;" name="Point" value="{{ $user->Points }}" readonly>
                                </div>
                            </div>
        
                            <div style="display: flex; gap: 10px; margin-bottom: 15px;">
                                <div style="flex: 1;">
                                    <label for="Role">Phân quyền</label>
                                    <input type="text" style="width: 80%;" name="Role"
                                        value="{{ $user->Role == 1 ? 'Quản trị viên' : 'Người dùng' }}" readonly>
                                </div>
        
                                <div style="flex: 1;">
                                    <label for="IsActive">Trạng thái</label>
                                    <input type="text" style="width: 80%;" name="IsActive"
                                        value="{{ $user->IsActive == 0 ? 'Đã tắt' : 'Đang hoạt động' }}" readonly>
                                </div>
                            </div>
        
                            <hr style="margin-bottom: 30px; margin-top: 30px;">
        
                            <h5 style="margin-left: 10px;">Thông tin liên hệ</h5>
                            <div style="display: flex; gap: 10px; margin-bottom: 15px;">
                                <div style="flex: 1;">
                                    <label for="Email">Email</label>
                                    <input type="email" name="Email" value="{{ $user->Email }}" required style="width: 80%;">
                                </div>
                                <div style="flex: 1;">
                                    <label for="PhoneNumber">Số điện thoại</label>
                                    <input type="text" name="PhoneNumber" value="{{ $user->PhoneNumber }}" required
                                        style="width: 80%;">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success">Lưu thay đổi</button>
                        </form>
                    </div>

                    <div id="profile-changePassword" class="tab-pane fade pt-3">
                        <form action="{{ route('userChangePassword', $user->UserID) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="currentPassword" class="col-form-label">Mật khẩu hiện tại</label>
                                <input name="currentPassword" type="password" class="form-control" id="currentPassword" required>
                            </div>

                            <div class="mb-3">
                                <label for="newPassword" class="col-form-label">Mật khẩu mới</label>
                                <input name="newPassword" type="password" class="form-control" id="newPassword" required>
                            </div>

                            <div class="mb-3">
                                <label for="renewPassword" class="col-form-label">Nhập lại mật khẩu mới</label>
                                <input name="confirmPassword" type="password" class="form-control" id="renewPassword" required>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" style="">Thay đổi mật khẩu</button>
                            </div>
                        </form>
                    </div>

                    <div id="profile-delete" class="tab-pane fade pt-3">
                        <form action="{{ route('userDelete', $user->UserID) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <h4>Bạn có chắc chắn muốn xoá tài khoản không?</h4>
                            
                            <div class="mb-3">
                                <label for="confirmPasswordDelete" class="col-form-label">Nhập mật khẩu để xác nhận</label>
                                <input name="confirmPasswordDelete" type="password" class="form-control" id="confirmPasswordDelete" required style="width: 70%; margin-left: 20px;">
                            </div>

                            <button type="submit" class="btn btn-danger">Xoá tài khoản</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection