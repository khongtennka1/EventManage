<head>
    @include('layouts.user.header')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
    <title>Search Event</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link href="{{ asset('user_asset/css/event.css') }}" rel="stylesheet">
</head>

<main>
    @include('layouts.user.navbar')<div class="container my-5">
        <div class="custom-search-container mb-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="custom-search-title"><i class="fas fa-search me-2"></i>Tìm kiếm sự kiện</h5>
                <div class="d-flex gap-3">
                    <button id="exportBtn" class="btn btn-sm custom-export-btn text-white">
                        <i class="fas fa-file-export me-2"></i> Xuất Excel
                    </button>
                    <span class="custom-search-toggle" data-bs-toggle="collapse"
                        data-bs-target="#advancedSearch">
                        <i class="fas fa-sliders-h"></i> Bộ lọc
                    </span>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-md-9 col-lg-10">
                    <div class="form-floating">
                        <input type="text" class="form-control shadow-sm" id="searchInput" placeholder="Nhập tên sự kiện...">
                        <label for="searchInput"><i class="fas fa-search text-muted me-2"></i>Tìm kiếm theo tên sự
                            kiện</label>
                    </div>
                </div>
                <div class="col-md-3 col-lg-2">
                    <button id="searchBtn" class="btn btn-primary h-100 w-100 d-flex align-items-center justify-content-center">
                        <i class="fas fa-search me-2"></i>Tìm kiếm
                    </button>
                </div>
            </div>

            <div class="collapse mt-4" id="advancedSearch">
                <div class="row g-3 custom-advanced-search">
                    <div class="col-md-3">
                        <div class="form-floating">
                            <select class="form-select shadow-sm" id="eventType">
                                <option selected value="">Tất cả</option>
                                <option value="science">Khoa học</option>
                                <option value="politics">Chính trị</option>
                                <option value="entertainment">Giải trí</option>
                            </select>
                            <label for="eventType">Loại sự kiện</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating">
                            <select class="form-select shadow-sm" id="organizer">
                                <option selected value="">Tất cả</option>
                                <option value="science-club">CLB Khoa học</option>
                                <option value="school-union">Đoàn trường</option>
                                <option value="music-club">CLB Âm nhạc</option>
                            </select>
                            <label for="organizer">Đơn vị tổ chức</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating">
                            <select class="form-select shadow-sm" id="classFilter">
                                <option selected value="">Tất cả</option>
                                <option value="k21">K21</option>
                                <option value="k22">K22</option>
                                <option value="k23">K23</option>
                            </select>
                            <label for="classFilter">Lớp</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating">
                            <select class="form-select shadow-sm" id="requiredFilter">
                                <option selected value="">Tất cả</option>
                                <option value="required">Required</option>
                                <option value="optional">Optional</option>
                            </select>
                            <label for="requiredFilter">Yêu cầu</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold">Danh sách sự kiện</h4>
            <span class="custom-search-count"><span id="eventCount">3</span> sự kiện</span>
        </div>        <div class="row" id="eventContainer">
            <!-- Event items ở đây -->
            <div class="col-lg-4 col-md-6 mb-4" data-event-type="science" data-organizer="science-club"
                data-required="required">
                <div class="card custom-event-card shadow-sm h-100">
                    <div class="custom-event-img-container position-relative">
                        <img class="card-img-top" src="/api/placeholder/400/200" alt="Event Image">
                        <div class="custom-event-badge badge bg-danger px-3 py-2">Required</div>
                        <div class="position-absolute bottom-0 start-0 w-100 p-3 custom-event-actions">
                            <div class="d-flex gap-2">
                                <a href="#" class="btn btn-primary btn-sm flex-grow-1"><i
                                        class="fas fa-info-circle me-1"></i> Chi tiết</a>
                                <a href="#" class="btn btn-success btn-sm flex-grow-1"><i
                                        class="fas fa-ticket-alt me-1"></i> Đăng ký</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <small class="text-muted"><i class="fas fa-calendar-alt me-1"></i> 15/05/2025</small>
                            <small class="text-muted"><i class="fas fa-clock me-1"></i> 8:00 - 11:00</small>
                        </div>
                        <h5 class="card-title">Hội thảo phát triển Web</h5>
                        <p class="card-text text-muted small mb-2"><i class="fas fa-map-marker-alt me-1"></i> Hội
                            trường A</p>
                        <p class="card-text mb-4 flex-grow-1">Tìm hiểu về các công nghệ web hiện đại cùng chuyên gia
                            hàng đầu.</p>
                        <div class="d-flex align-items-center mt-auto">
                            <span class="badge bg-light text-dark me-2"><i class="fas fa-user text-primary me-1"></i>
                                CLB Khoa học</span>
                            <span class="badge bg-light text-dark"><i
                                    class="fas fa-calendar-check text-primary me-1"></i> 01/05/2025</span>
                        </div>
                    </div>
                </div>
            </div>

            <div id="noResults" class="text-center py-5 d-none">
                <i class="fas fa-search fa-3x text-muted mb-3"></i>
                <h5>Không tìm thấy kết quả phù hợp</h5>
                <p class="text-muted">Vui lòng thử lại với từ khóa hoặc bộ lọc khác</p>
            </div>
        </div>
    </div>        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
        <script src="{{ asset('user_asset/js/event.js') }}"></script>
</main>
<footer>
    @include('layouts.user.footer')
    @include('layouts.user.script')
</footer>
