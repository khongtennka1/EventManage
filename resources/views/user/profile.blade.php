<head>
    <link rel="stylesheet" href="{{ asset('assets/user_asset/css/profile.css') }}">
    @include('layouts.user.header')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
    <link href="{{ asset('user_asset/css/profile.css') }}" rel="stylesheet">
</head>

<main>
    @include('layouts.user.navbar')

    <div class="profile-container">
        <div class="profile-tab-container">
            <div class="profile-tab active" data-tab="personal"><i class="fas fa-user-circle"></i> Personal Information</div>
            <div class="profile-tab" data-tab="account"><i class="fas fa-lock"></i> Account Security</div>
            <div class="profile-tab" data-tab="points"><i class="fas fa-chart-line"></i> Points History</div>
        </div>

        <div id="personal" class="profile-form-content active">
            <h2>Personal Information</h2>
            <form action="{{ route('updateProfile', $user->UserID) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            <div class="profile-avatar-container">
                <img src="{{ asset('storage/' . $user->Avatar) }}" alt="User Avatar" class="profile-avatar" id="avatar-preview">
                <div class="profile-avatar-upload">
                    <label for="avatar-upload" class="profile-upload-btn"><i class="fas fa-cloud-upload-alt"></i> Choose Image</label>
                    <input type="file" id="avatar-upload" class="profile-file-upload" accept="image/*"  name="Avatar">
                    <small>Recommended size: 300x300px (Max 2MB)</small>
                </div>
            </div>    
                <div class="row">
                    <div class="col-md-6">
                        <div class="profile-form-group">
                            <label for="fullName">Full Name</label>
                            <input type="text" id="fullName" name="FullName" placeholder="Your full name" value="{{ $user->FullName }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="Email" placeholder="your.email@example.com" value="{{ $user->Email }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="profile-form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="Phone" placeholder="Your phone" value="{{ $user->PhoneNumber }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-form-group">
                            <label for="dob">Date of Birth</label>
                            <input type="date" id="dob" name="dob" value="$user->dob">
                        </div>
                    </div>
                </div>

                <div class="profile-form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="Address" placeholder="Your address" value="{{ $user->Address }}">
                </div>

                <div class="profile-form-group">
                    <label for="gender">Gender</label>
                    <select id="gender" name="Gender" value="{{ $user->Gender }}">
                        <option value="">Select gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div><div class="profile-btn-group">
                    <button type="button" class="profile-btn profile-btn-secondary" id="exportExcel"><i class="fas fa-file-excel"></i> Export to Excel</button>
                    <button type="submit" class="profile-btn profile-btn-primary"><i class="fas fa-save"></i> Save Changes</button>
                </div>
            </form>
        </div>

        <div id="account" class="profile-form-content">
            <h2>Account Security</h2>
            <form id="account-form">
                <div class="profile-form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Your username">
                </div>

                <div class="profile-form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter new password">
                </div>

                <div class="profile-form-group">
                    <label for="confirmPassword">Confirm Password</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm new password">
                </div>

                <div class="profile-btn-group">
                    <button type="submit" class="profile-btn profile-btn-primary"><i class="fas fa-shield-alt"></i> Update Security</button>
                </div>
            </form>
        </div>        <div id="points" class="profile-form-content">
            <h2>Points History</h2>
            <div class="profile-points-summary">
                <div class="profile-point-box">
                    <h3><i class="fas fa-star"></i> Current Points</h3>
                    <p id="currentPoints">850</p>
                </div>
                <div class="profile-point-box">
                    <h3><i class="fas fa-plus-circle"></i> Earned Points</h3>
                    <p id="prosPoints">+150</p>
                </div>
                <div class="profile-point-box">
                    <h3><i class="fas fa-minus-circle"></i> Deducted Points</h3>
                    <p id="consPoints">-50</p>
                </div>
            </div>

            <table class="profile-history-table">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Student Code</th>
                        <th>Event Name</th>
                        <th>Point</th>
                        <th>Reason</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>John Doe</td>
                        <td>123456</td>
                        <td>Event A</td>
                        <td class="positive">+50</td>
                        <td>Participation</td>
                    </tr>
                    <tr>
                        <td>Jane Smith</td>
                        <td>654321</td>
                        <td>Event B</td>
                        <td class="negative">-20</td>
                        <td>Absence</td>
                    </tr>
                    <!-- More rows as needed -->
                </tbody>
            </table>
        </div>
    </div>    @include('layouts.user.footer')
    <script src="{{ asset('user_asset/js/profile.js') }}"></script>
</main>

@include('layouts.user.script')