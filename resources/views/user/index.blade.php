<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EVENTVINH</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="events, education, workshops, conferences" name="keywords">
    <meta content="EventVinh - Your premier platform for educational events and workshops" name="description">

    {{-- Header --}}
    @include('layouts.user.header')
</head>

<body>
    <!-- Spinner Start -->
    @include('layouts.user.spinner')
    <!-- Spinner End -->


    <!-- Navbar Start -->
    @include('layouts.user.navbar')
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{ asset('user_asset/img/carousel-1.jpg') }}" alt="" style="filter: brightness(0.9);">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: linear-gradient(rgba(24, 29, 56, .8), rgba(24, 29, 56, .4));">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <span class="text-primary text-uppercase mb-3 animated fadeInDown" style="font-weight: 600; letter-spacing: 2px; padding: 3px 8px; background-color: rgba(255, 255, 255, 0.1); border-radius: 4px;">Premium Courses</span>
                                <h1 class="display-3 text-white animated fadeInUp fw-bold" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">The Best Online Learning Platform</h1>
                                <p class="fs-5 text-white mb-4 pb-2 animated fadeIn">Discover a world of knowledge with our premium courses designed to enhance your skills and advance your career opportunities.</p>
                                <div class="animated fadeInUp" style="animation-delay: 0.5s;">
                                    <a href="" class="btn btn-primary py-md-3 px-md-5 me-3" style="border-radius: 30px; font-weight: 500; box-shadow: 0 4px 15px rgba(0,0,0,0.2);">Explore Courses</a>
                                    <a href="" class="btn btn-light py-md-3 px-md-5" style="border-radius: 30px; font-weight: 500; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">Join Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{ asset('user_asset/img/carousel-2.jpg') }}" alt="" style="filter: brightness(0.9);">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: linear-gradient(rgba(24, 29, 56, .8), rgba(24, 29, 56, .4));">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <span class="text-primary text-uppercase mb-3 animated fadeInDown" style="font-weight: 600; letter-spacing: 2px; padding: 3px 8px; background-color: rgba(255, 255, 255, 0.1); border-radius: 4px;">Learn Anywhere</span>
                                <h1 class="display-3 text-white animated fadeInUp fw-bold" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">Get Educated Online From Your Home</h1>
                                <p class="fs-5 text-white mb-4 pb-2 animated fadeIn">Access high-quality educational content from anywhere, anytime. Learn at your own pace with our flexible online platform.</p>
                                <div class="animated fadeInUp" style="animation-delay: 0.5s;">
                                    <a href="" class="btn btn-primary py-md-3 px-md-5 me-3" style="border-radius: 30px; font-weight: 500; box-shadow: 0 4px 15px rgba(0,0,0,0.2);">Explore Courses</a>
                                    <a href="" class="btn btn-light py-md-3 px-md-5" style="border-radius: 30px; font-weight: 500; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">Join Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Custom Indicators -->
        <div class="carousel-indicators custom-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                            <h5 class="mb-3">Skilled Instructors</h5>
                            <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-globe text-primary mb-4"></i>
                            <h5 class="mb-3">Online Classes</h5>
                            <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-home text-primary mb-4"></i>
                            <h5 class="mb-3">Home Projects</h5>
                            <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-book-open text-primary mb-4"></i>
                            <h5 class="mb-3">Book Library</h5>
                            <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="{{ asset('user_asset/img/about.jpg') }}" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6>
                    <h1 class="mb-4">Welcome to eLEARNING</h1>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                    <div class="row gy-2 gx-4 mb-4">
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Skilled Instructors</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Online Classes</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>International Certificate</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Skilled Instructors</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Online Classes</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>International Certificate</p>
                        </div>
                    </div>
                    <a class="btn btn-primary py-3 px-5 mt-2" href="">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Categories Start -->
    <div class="container-xxl py-5 category">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Categories</h6>
                <h1 class="mb-5">Courses Categories</h1>
            </div>
            <div class="row g-3">
                <div class="col-lg-7 col-md-6">
                    <div class="row g-3">
                        <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="{{ asset('user_asset/img/cat-1.jpg') }}" alt="">
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                    <h5 class="m-0">Web Design</h5>
                                    <small class="text-primary">49 Courses</small>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.3s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="{{ asset('user_asset/img/cat-2.jpg') }}" alt="">
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                    <h5 class="m-0">Graphic Design</h5>
                                    <small class="text-primary">49 Courses</small>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.5s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="{{ asset('user_asset/img/cat-3.jpg') }}" alt="">
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                    <h5 class="m-0">Video Editing</h5>
                                    <small class="text-primary">49 Courses</small>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 wow zoomIn" data-wow-delay="0.7s" style="min-height: 350px;">
                    <a class="position-relative d-block h-100 overflow-hidden" href="">
                        <img class="img-fluid position-absolute w-100 h-100" src="{{ asset('user_asset/img/cat-4.jpg') }}" alt="" style="object-fit: cover;">
                        <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin:  1px;">
                            <h5 class="m-0">Online Marketing</h5>
                            <small class="text-primary">49 Courses</small>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Categories Start -->


    <!-- Events Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Events</h6>
                <h1 class="mb-5">Featured Events</h1>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="course-item bg-light shadow-sm rounded h-100">
                        <div class="position-relative overflow-hidden" style="height: 200px;">
                            <img class="img-fluid w-100 h-100" src="{{ asset('user_asset/img/course-1.jpg') }}" alt="Event Image" style="object-fit: cover;">
                            <div class="event-overlay position-absolute top-0 end-0 bg-primary text-white py-1 px-3 m-2 rounded-pill">
                                <small><i class="fa fa-calendar-alt me-2"></i>May 15, 2025</small>
                            </div>
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;"><i class="fa fa-info-circle me-1"></i>Details</a>
                                <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;"><i class="fa fa-ticket-alt me-1"></i>Register</a>
                            </div>
                        </div>
                        <div class="text-center p-4 pb-0">
                            <div class="mb-1">
                                <span class="badge bg-danger py-1 px-2 rounded-pill mb-2">Required</span>
                            </div>
                            <h3 class="mb-2 text-truncate">Web Development Workshop</h3>
                            <div class="d-flex justify-content-center mb-2">
                                <small class="fa fa-star text-warning"></small>
                                <small class="fa fa-star text-warning"></small>
                                <small class="fa fa-star text-warning"></small>
                                <small class="fa fa-star text-warning"></small>
                                <small class="fa fa-star text-warning"></small>
                                <span class="ms-1">(4.9)</span>
                            </div>
                            <p class="mb-4" style="min-height: 48px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">Learn modern web development techniques from industry experts</p>
                        </div>
                        <div class="d-flex border-top mt-auto">
                            <small class="flex-fill text-center border-end py-2 text-truncate"><i class="fa fa-user-tie text-primary me-2"></i>Prof. John Smith</small>
                            <small class="flex-fill text-center border-end py-2 text-truncate"><i class="fa fa-clock text-primary me-2"></i>9 AM - 4 PM</small>
                            <small class="flex-fill text-center py-2 text-truncate"><i class="fa fa-user text-primary me-2"></i><span class="text-danger">5 spots left</span></small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="course-item bg-light shadow-sm rounded h-100">
                        <div class="position-relative overflow-hidden" style="height: 200px;">
                            <img class="img-fluid w-100 h-100" src="{{ asset('user_asset/img/course-2.jpg') }}" alt="Event Image" style="object-fit: cover;">
                            <div class="event-overlay position-absolute top-0 end-0 bg-primary text-white py-1 px-3 m-2 rounded-pill">
                                <small><i class="fa fa-calendar-alt me-2"></i>May 20, 2025</small>
                            </div>
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;"><i class="fa fa-info-circle me-1"></i>Details</a>
                                <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;"><i class="fa fa-ticket-alt me-1"></i>Register</a>
                            </div>
                        </div>
                        <div class="text-center p-4 pb-0">
                            <div class="mb-1">
                                <span class="badge bg-success py-1 px-2 rounded-pill mb-2">Optional</span>
                            </div>
                            <h3 class="mb-2 text-truncate">UI/UX Design Masterclass</h3>
                            <div class="d-flex justify-content-center mb-2">
                                <small class="fa fa-star text-warning"></small>
                                <small class="fa fa-star text-warning"></small>
                                <small class="fa fa-star text-warning"></small>
                                <small class="fa fa-star text-warning"></small>
                                <small class="fa fa-star-half-alt text-warning"></small>
                                <span class="ms-1">(4.5)</span>
                            </div>
                            <p class="mb-4" style="min-height: 48px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">Master the art of creating beautiful and functional user interfaces</p>
                        </div>
                        <div class="d-flex border-top mt-auto">
                            <small class="flex-fill text-center border-end py-2 text-truncate"><i class="fa fa-user-tie text-primary me-2"></i>Dr. Emily Johnson</small>
                            <small class="flex-fill text-center border-end py-2 text-truncate"><i class="fa fa-clock text-primary me-2"></i>1 PM - 5 PM</small>
                            <small class="flex-fill text-center py-2 text-truncate"><i class="fa fa-user text-primary me-2"></i>12 attendees</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="course-item bg-light shadow-sm rounded h-100">
                        <div class="position-relative overflow-hidden" style="height: 200px;">
                            <img class="img-fluid w-100 h-100" src="{{ asset('user_asset/img/course-3.jpg') }}" alt="Event Image" style="object-fit: cover;">
                            <div class="event-overlay position-absolute top-0 end-0 bg-primary text-white py-1 px-3 m-2 rounded-pill">
                                <small><i class="fa fa-calendar-alt me-2"></i>May 25, 2025</small>
                            </div>
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;"><i class="fa fa-info-circle me-1"></i>Details</a>
                                <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;"><i class="fa fa-ticket-alt me-1"></i>Register</a>
                            </div>
                        </div>
                        <div class="text-center p-4 pb-0">
                            <div class="mb-1">
                                <span class="badge bg-danger py-1 px-2 rounded-pill mb-2">Required</span>
                            </div>
                            <h3 class="mb-2 text-truncate">AI in Education Conference</h3>
                            <div class="d-flex justify-content-center mb-2">
                                <small class="fa fa-star text-warning"></small>
                                <small class="fa fa-star text-warning"></small>
                                <small class="fa fa-star text-warning"></small>
                                <small class="fa fa-star text-warning"></small>
                                <small class="fa fa-star text-warning"></small>
                                <span class="ms-1">(5.0)</span>
                            </div>
                            <p class="mb-4" style="min-height: 48px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">Explore how artificial intelligence is transforming education</p>
                        </div>
                        <div class="d-flex border-top mt-auto">
                            <small class="flex-fill text-center border-end py-2 text-truncate"><i class="fa fa-user-tie text-primary me-2"></i>Prof. Robert Chen</small>
                            <small class="flex-fill text-center border-end py-2 text-truncate"><i class="fa fa-clock text-primary me-2"></i>10 AM - 3 PM</small>
                            <small class="flex-fill text-center py-2 text-truncate"><i class="fa fa-user text-primary me-2"></i><span class="text-success">Open</span></small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5">
                <a href="#" class="btn btn-primary py-3 px-5 rounded-pill animated fadeInUp">View All Events <i class="fa fa-arrow-right ms-2"></i></a>
            </div>
        </div>
    </div>
    <!-- Events End -->


    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Instructors</h6>
                <h1 class="mb-5">Expert Instructors</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('user_asset/img/team-1.jpg') }}" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Instructor Name</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('user_asset/img/team-2.jpg') }}" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Instructor Name</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('user_asset/img/team-3.jpg') }}" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Instructor Name</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('user_asset/img/team-4.jpg') }}" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Instructor Name</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3">Testimonial</h6>
                <h1 class="mb-5">Our Students Say!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative">
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="{{ asset('user_asset/img/testimonial-1.jpg') }}" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="{{ asset('user_asset/img/testimonial-2.jpg') }}" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="{{ asset('user_asset/img/testimonial-3.jpg') }}" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="{{ asset('user_asset/img/testimonial-4.jpg') }}" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
        

    <!-- Footer Start -->
    @include('layouts.user.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    @include('layouts.user.script')
</body>

</html>