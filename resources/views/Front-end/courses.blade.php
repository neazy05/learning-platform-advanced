<!doctype html>
<html lang="en">

<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Title ======-->
    <title>SPU Learning-Platform</title>

    <!--====== Favicon Icon ======-->

    <link rel="shortcut icon" href="{{asset('front-end/images/favicon.png')}}" type="image/png">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="{{asset('front-end/css/slick.css')}}">

    <!--====== Animate css ======-->
    <link rel="stylesheet" href="{{asset('front-end/css/animate.css')}}">

    <!--====== Nice Select css ======-->
    <link rel="stylesheet" href="{{asset('front-end/css/nice-select.css')}}">

    <!--====== Nice Number css ======-->
    <link rel="stylesheet" href="{{asset('front-end/css/jquery.nice-number.min.css')}}">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="{{asset('front-end/css/magnific-popup.css')}}">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{asset('front-end/css/bootstrap.min.css')}}">

    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="{{asset('front-end/css/font-awesome.min.css')}}">

    <!--====== Default css ======-->
    <link rel="stylesheet" href="{{asset('front-end/css/default.css')}}">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="{{asset('front-end/css/style.css')}}">

    <!--====== Responsive css ======-->
    <link rel="stylesheet" href="{{asset('front-end/css/responsive.css')}}">


</head>

<body>

<!--====== PRELOADER PART START ======-->

<div class="preloader">
    <div class="loader rubix-cube">
        <div class="layer layer-1"></div>
        <div class="layer layer-2"></div>
        <div class="layer layer-3 color-1"></div>
        <div class="layer layer-4"></div>
        <div class="layer layer-5"></div>
        <div class="layer layer-6"></div>
        <div class="layer layer-7"></div>
        <div class="layer layer-8"></div>
    </div>
</div>

<!--====== PRELOADER PART START ======-->

<!--====== HEADER PART START ======-->

<header id="header-part">

    <div class="header-top d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="header-contact text-lg-left text-center">
                        <ul>
                            <li><img src="{{asset('front-end/images/all-icon/call.png')}}" alt="icon"><span>+963 11 6990200</span>
                            </li>
                            <li><img src="{{asset('front-end/images/all-icon/email.png')}}"
                                     alt="icon"><span>info@spu.edu.sy</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="header-opening-time text-lg-right text-center">
                        <p>127/5 Daraa Autostrad, Ghabaghb</p>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- header top -->

    <div class="header-logo-support pt-30 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="logo">
                        <a href="{{route('home')}}">
                            <img src="{{asset('front-end/images/logo.png')}}" alt="Logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="support-button float-right d-none d-md-block">
                        <div class="support float-left">
                            <div class="icon">
                                <img src="{{asset('front-end/images/all-icon/support.png')}}" alt="icon">
                            </div>
                            <div class="cont">
                                <p>Need Help? call and join us free</p>
                                <span>+963 11 6990200</span>
                            </div>
                        </div>
                        <div class="button float-left">
                            @if(!Auth::check())
                                <a href="{{route('welcome')}}" class="main-btn">Login/Register</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- header logo support -->

    <div class="navigation">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-10 col-sm-9 col-8">
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item">
                                    <a href="{{route('index')}}">Home</a>
                                    <!--<ul class="sub-menu">
                                        <li><a class="active" href="index-2.html">Home 01</a></li>
                                        <li><a href="index-3.html">Home 02</a></li>
                                        <li><a href="index-4.html">Home 03</a></li>
                                    </ul>-->
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('about')}}">About us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="active" href="{{route('courses')}}">Courses</a>
                                    <!--<ul class="sub-menu">
                                        <li><a href="courses.html">Courses</a></li>
                                        <li><a href="courses-singel.html">Course Singel</a></li>
                                    </ul>-->
                                </li>

                                <li class="nav-item">
                                    <a href="{{route('tutors')}}">Our tutors</a>
                                    <!--<ul class="sub-menu">
                                        <li><a href="teachers.html">teachers</a></li>
                                        <li><a href="teachers-singel.html">teacher Singel</a></li>
                                    </ul>-->
                                </li>

                                <li class="nav-item">
                                    <a href="{{route('contact')}}">Contact</a>
                                    <!--<ul class="sub-menu">
                                        <li><a href="contact.html">Contact Us</a></li>
                                        <li><a href="contact-2.html">Contact Us 2</a></li>
                                    </ul>-->
                                </li>
                            </ul>
                        </div>
                    </nav> <!-- nav -->
                </div>
                <div class="col-lg-2 col-md-2 col-sm-3 col-4">
                    <div class="right-icon text-right">
                        <ul>
                            <li><a href="#" id="search"><i class="fa fa-search"></i></a></li>
                        </ul>
                    </div> <!-- right icon -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div>

</header>

<!--====== HEADER PART ENDS ======-->

<!--====== SEARCH BOX PART START ======-->

<div class="search-box">
    <div class="serach-form">
        <div class="closebtn">
            <span></span>
            <span></span>
        </div>
        <form action="{{route('search_front_end')}}" method="get"
              id="searchFrontEndForm">
            {{csrf_field()}}
            <input type="text" name="keyword" id="keyword" placeholder="Search by keyword">
            <button><i class="fa fa-search"></i></button>
        </form>
    </div> <!-- serach form -->
</div>

<!--====== SEARCH BOX PART ENDS ======-->

<!--====== PAGE BANNER PART START ======-->

<section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8"
         style="background-image: url(images/page-banner-2.jpg)">

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2>Our Courses</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Courses</li>
                        </ol>
                    </nav>
                </div>  <!-- page banner cont -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== PAGE BANNER PART ENDS ======-->

<!--====== COURSES PART START ======-->

<section id="courses-part" class="pt-120 pb-120 gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="courses-top-search">
                    <ul class="nav float-left" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="active" id="courses-grid-tab" data-toggle="tab" href="#courses-grid" role="tab"
                               aria-controls="courses-grid" aria-selected="true"><i class="fa fa-th-large"></i></a>
                        </li>
                        <li class="nav-item">
                            <a id="courses-list-tab" data-toggle="tab" href="#courses-list" role="tab"
                               aria-controls="courses-list" aria-selected="false"><i class="fa fa-th-list"></i></a>
                        </li>
                        <li class="nav-item">Showing {{$courses->count()}} 0f {{$coursesCount}} Results</li>
                    </ul> <!-- nav -->

                </div> <!-- courses top search -->
            </div>
        </div> <!-- row -->

        @if(Auth::check() and Auth::user()->roles()->where('role_en_name','student')->count()>0)
            @if($recommendations!="No Recommendations")
                <section id="course-part" class="pt-115 pb-115">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="section-title pb-45">
                                    <h5>Our course</h5>
                                    <h2>Recommended courses </h2>
                                </div> <!-- section title -->
                            </div>
                        </div> <!-- row -->
                        <div class="row course-slied mt-30">

                            @foreach($recommendations as $course)
                                <div class="col-lg-4">
                                    <div class="singel-course-2">
                                        <div class="thum">
                                            <div class="image">
                                                @if(isset($course->course_image))
                                                    <img src="{{$course->course_image}}" width="100px" height="250px"
                                                         alt="Course">
                                                @else
                                                    <img src="{{asset('front-end/images/course/cu-2.jpg')}} "
                                                         alt="Course">

                                                @endif
                                            </div>
                                            <div class="price">
                                                <span>Free</span>
                                            </div>
                                            <div class="course-teacher">
                                                <div class="thum">
                                                    <a href="courses-singel.html">
                                                        @if(isset($course->tutor->user->avatar))
                                                            <img src="{{$course->tutor->user->avatar}}" width="100px" height="250px"
                                                                 alt="teacher">
                                                        @else
                                                            <img src="{{asset('front-end/images/course/cu-2.jpg')}} "
                                                                 alt="teacher">

                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="name">
                                                    <a href="#"><h6>{{$course->tutor->user->name}}</h6></a>
                                                </div>
                                                <div class="review">
                                                    <ul>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cont">
                                            <a href="#"><h4>{{$course->course_en_name}}</h4></a>
                                        </div>
                                    </div> <!-- singel course -->
                                </div>
                            @endforeach


                        </div> <!-- course slied -->
                    </div> <!-- container -->
                </section>
            @endif
        @endif

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="courses-grid" role="tabpanel" aria-labelledby="courses-grid-tab">
                <div class="row">

                    @foreach($courses as $course)

                        <div class="col-lg-4 col-md-6">
                            <div class="singel-course mt-30">
                                <div class="thum">
                                    <div class="image">
                                        <img src="@if(isset($course->course_image)){{$course->course_image}} @else{{asset('front-end/images/course/cu-2.jpg')}} @endif"
                                             alt="Course" width="80px" height="150px">
                                    </div>
                                    <div class="price">
                                        <span>Free</span>
                                    </div>
                                </div>
                                <div class="cont">
                                    <ul>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                    <span>(20 Reviws)</span>
                                    <a href="{{route('single-course',['id'=>$course->id])}}"><h4>{{$course->course_en_name}}</h4></a>
                                    <div class="course-teacher">
                                        <div class="thum">
                                            <a href="#"><img
                                                        src="@if(isset($course->tutor->user->avatar)){{$course->tutor->user->avatar}} @else{{asset('front-end/images/course/teacher/t-1.jpg')}} @endif"
                                                        alt="
                                                        teacher"></a>
                                        </div>
                                        <div class="name">
                                            <a href="#"><h6>{{$course->tutor->user->name}}</h6></a>
                                        </div>
                                        <div class="admin">
                                            <ul>
                                                <li><a href="#"><i
                                                                class="fa fa-user"></i><span>{{$course->users()->count()}}</span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- singel course -->
                        </div>
                    @endforeach


                </div> <!-- row -->
            </div>



            <div class="tab-pane fade" id="courses-list" role="tabpanel" aria-labelledby="courses-list-tab">
                <div class="row">

                    @foreach($courses as $course)

                        <div class="col-lg-12">
                            <div class="singel-course mt-30">
                                <div class="row no-gutters">
                                    <div class="col-md-6">
                                        <div class="thum">
                                            <div class="image">
                                                <img src="@if(isset($course->course_image)){{$course->course_image}} @else{{asset('front-end/images/course/cu-2.jpg')}} @endif"
                                                     alt="Course" width="100%" height="100%">
                                            </div>
                                            <div class="price">
                                                <span>Free</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="cont">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                            <span>(20 Reviws)</span>
                                            <a href="{{route('single-course',['id'=>$course->id])}}"><h4>{{$course->course_en_name}}</h4></a>
                                            <div class="course-teacher">
                                                <div class="thum">
                                                    <a href="#"><img
                                                                src="@if(isset($course->tutor->user->avatar)){{$course->tutor->user->avatar}} @else{{asset('front-end/images/course/teacher/t-1.jpg')}} @endif"
                                                                alt="teacher"></a>
                                                </div>
                                                <div class="name">
                                                    <a href="#"><h6>Mark anthem</h6></a>
                                                </div>
                                                <div class="admin">
                                                    <ul>
                                                        <li><a href="#"><i
                                                                        class="fa fa-user"></i><span>{{$course->users()->count()}}</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!--  row  -->
                            </div> <!-- singel course -->
                        </div>
                    @endforeach

                </div> <!-- row -->
            </div>
        </div> <!-- tab content -->
        <div class="row">
            <div class="col-lg-12">
                <nav class="pagination mt-50">
                        @if(isset($query))
                            {{ $courses->appends($query)->links() }}
                        @else
                            {{ $courses->links() }}
                        @endif

                </nav>  <!-- courses pagination -->
            </div>
        </div>  <!-- row -->
    </div> <!-- container -->
</section>

<!--====== COURSES PART ENDS ======-->

<!--====== FOOTER PART START ======-->

<footer id="footer-part">
    <div class="footer-top pt-40 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-about mt-40">
                        <div class="logo">
                            <a href="{{route('index')}}"><img src="{{asset('front-end/images/logo-2.png')}}" alt="Logo"></a>
                        </div>
                        <p>SPU Learning Platform for those who willing to do.</p>
                        <ul class="mt-20">
                            <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div> <!-- footer about -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer-link mt-40">
                        <div class="footer-title pb-25">
                            <h6>Sitemap</h6>
                        </div>
                        <ul>
                            <li><a href="{{route('index')}}"><i class="fa fa-angle-right"></i>Home</a></li>
                            <li><a href="{{route('about')}}"><i class="fa fa-angle-right"></i>About us</a></li>
                            <li><a href="{{route('contact')}}"><i class="fa fa-angle-right"></i>contact</a></li>
                        </ul>
                        <ul>
                            <li><a href="{{route('courses')}}"><i class="fa fa-angle-right"></i>Courses</a></li>
                            <li><a href="{{route('tutors')}}"><i class="fa fa-angle-right"></i>Tutors</a></li>
                        </ul>
                    </div> <!-- footer link -->
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="footer-link support mt-40">
                        <div class="footer-title pb-25">
                            <h6>Support</h6>
                        </div>
                        <ul>
                            <li><a href="#"><i class="fa fa-angle-right"></i>FAQS</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i>Privacy</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i>Policy</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i>Support</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i>Documentation</a></li>
                        </ul>
                    </div> <!-- support -->
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-address mt-40">
                        <div class="footer-title pb-25">
                            <h6>Contact Us</h6>
                        </div>
                        <ul>
                            <li>
                                <div class="icon">
                                    <i class="fa fa-home"></i>
                                </div>
                                <div class="cont">
                                    <p>127/5 Daraa Autostrad, Ghabaghb</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="cont">
                                    <p>+963 11 6990200</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fa fa-envelope-o"></i>
                                </div>
                                <div class="cont">
                                    <p>info@spu.edu.sy</p>
                                </div>
                            </li>
                        </ul>
                    </div> <!-- footer address -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- footer top -->


</footer>

<!--====== FOOTER PART ENDS ======-->

<!--====== BACK TO TP PART START ======-->

<a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

<!--====== BACK TO TP PART ENDS ======-->


<!--====== jquery js ======-->
<script src="{{asset('front-end/js/vendor/modernizr-3.6.0.min.js')}}"></script>
<script src="{{asset('front-end/js/vendor/jquery-1.12.4.min.js')}}"></script>

<!--====== Bootstrap js ======-->
<script src="{{asset('front-end/js/bootstrap.min.js')}}"></script>

<!--====== Slick js ======-->
<script src="{{asset('front-end/js/slick.min.js')}}"></script>

<!--====== Magnific Popup js ======-->
<script src="{{asset('front-end/js/jquery.magnific-popup.min.js')}}"></script>

<!--====== Counter Up js ======-->
<script src="{{asset('front-end/js/waypoints.min.js')}}"></script>
<script src="{{asset('front-end/js/jquery.counterup.min.js')}}"></script>

<!--====== Nice Select js ======-->
<script src="{{asset('front-end/js/jquery.nice-select.min.js')}}"></script>

<!--====== Nice Number js ======-->
<script src="{{asset('front-end/js/jquery.nice-number.min.js')}}"></script>

<!--====== Count Down js ======-->
<script src="{{asset('front-end/js/jquery.countdown.min.js')}}"></script>

<!--====== Validator js ======-->
<script src="{{asset('front-end/js/validator.min.js')}}"></script>

<!--====== Ajax Contact js ======-->
<script src="{{asset('front-end/js/ajax-contact.js')}}"></script>

<!--====== Main js ======-->
<script src="{{asset('front-end/js/main.js')}}"></script>

<!--====== Map js ======-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ"></script>
<script src="{{asset('front-end/js/map-script.js')}}"></script>

</body>

</html>
