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
                            <li><img src="images/all-icon/map.png" alt="icon"><span>+963 11 6990200</span></li>
                            <li><img src="images/all-icon/email.png" alt="icon"><span>info@spu.edu.sy</span></li>
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
                                <p>Need Help? call and join us free </p>
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
    </div>
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
                                    <a href="{{route('courses')}}">Courses</a>
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
                    </nav>  <!-- nav -->
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
                    <h2>{{$course->course_en_name}}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('courses')}}">Courses</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$course->course_en_name}}</li>
                        </ol>
                    </nav>
                </div>  <!-- page banner cont -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== PAGE BANNER PART ENDS ======-->

<!--====== COURSES SINGEl PART START ======-->

<section id="corses-singel" class="pt-90 pb-120 gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="corses-singel-left mt-30">
                    <div class="title">
                        <h3>{{$course->course_en_name}}</h3>
                    </div> <!-- title -->
                    <div class="course-terms">
                        <ul>
                            <li>
                                <div class="teacher-name">
                                    <div class="thum">
                                        <img src="@if(isset($course->tutor->user->avatar)){{$course->tutor->user->avatar}}@else {{asset('front-end/images/teachers/t-2.jpg')}} @endif"
                                             alt="Teacher">
                                    </div>
                                    <div class="name">
                                        <span>Teacher</span>
                                        <h6>{{$course->tutor->user->name}}</h6>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="course-category">
                                    <span>Category</span>
                                    <h6>{{$course->category->title}} </h6>
                                </div>
                            </li>
                            <li>
                                <div class="review">
                                    <span>Review</span>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li class="rating">(20 Reviws)</li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div> <!-- course terms -->

                    <div class="corses-singel-image pt-50">
                        @if(isset($course->course_image))
                            <img src="{{$course->course_image}}" width="100px" height="250px"
                                 alt="Course">
                        @else
                            <img src="{{asset('front-end/images/course/cu-2.jpg')}} "
                                 alt="Course">

                        @endif
                    </div> <!-- corses singel image -->

                    <div class="corses-tab mt-30">
                        <ul class="nav nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="active" id="overview-tab" data-toggle="tab" href="#overview" role="tab"
                                   aria-controls="overview" aria-selected="true">Overview</a>
                            </li>
                            <li class="nav-item">
                                <a id="curriculam-tab" data-toggle="tab" href="#curriculam" role="tab"
                                   aria-controls="curriculam" aria-selected="false">Curriculum</a>
                            </li>
                            <li class="nav-item">
                                <a id="instructor-tab" data-toggle="tab" href="#instructor" role="tab"
                                   aria-controls="instructor" aria-selected="false">Instructor</a>
                            </li>
                            <li class="nav-item">
                                <a id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
                                   aria-selected="false">Reviews</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="overview" role="tabpanel"
                                 aria-labelledby="overview-tab">
                                <div class="overview-description">
                                    <div class="singel-description pt-40">
                                        <h6>Course Nickname</h6>
                                        @if(isset($course->course_nickname))
                                            <p>{{$course->course_nickname}}</p>
                                        @else
                                            <p>None</p>
                                        @endif
                                    </div>
                                    <div class="singel-description pt-40">
                                        <h6>Course Code</h6>
                                        <p>{{$course->course_code}}</p>
                                    </div>
                                </div> <!-- overview description -->
                            </div>
                            <div class="tab-pane fade" id="curriculam" role="tabpanel" aria-labelledby="curriculam-tab">
                                <div class="curriculam-cont">
                                    <div class="title">
                                        <h6>{{$course->course_en_name}}</h6>
                                    </div>
                                    <div class="accordion" id="accordionExample">
                                        @foreach($course->lectures()->get() as $l)
                                            <div class="card">
                                                <div class="card-header" id="heading{{$loop->index}}">
                                                    <a href="#" data-toggle="collapse"
                                                       data-target="#collapse{{$loop->index}}"
                                                       aria-expanded="true" aria-controls="collapse{{$loop->index}}">
                                                        <ul>
                                                            <li><i class="fa fa-file-o"></i></li>
                                                            <li><span class="lecture">Lecture {{$loop->index+1}}</span>
                                                            </li>
                                                            <li><span class="head">{{$l->title}}</span></li>
                                                            <li><span class="time d-none d-md-block"><i
                                                                            class="fa fa-clock-o"></i></span>

                                                            </li>
                                                        </ul>
                                                    </a>
                                                </div>

                                                <div id="collapse{{$loop->index}}" class="collapse show"
                                                     aria-labelledby="heading{{$loop->index}}"
                                                     data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        <p>{{$l->description}}</p>
                                                    </div>
                                                </div>
                                            </div>

                                        @endforeach


                                    </div>
                                </div> <!-- curriculam cont -->
                            </div>
                            <div class="tab-pane fade" id="instructor" role="tabpanel" aria-labelledby="instructor-tab">
                                <div class="instructor-cont">
                                    <div class="instructor-author">
                                        <div class="author-thum">
                                            <img src="{{$course->tutor->user->avatar}}" alt="Instructor">
                                        </div>
                                        <div class="author-name">
                                            <a href="#"><h5>{{$course->tutor->user->name}}</h5></a>
                                            <span>{{$course->tutor->tutor_diploma}}</span>
                                            <ul class="social">
                                                <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="instructor-description pt-25">
                                        <p>@if(isset($course->tutor->tutor_cv))<a href="{{$course->tutor->tutor_cv}}">Tutor's
                                                CV</a>@else No CV Available for this instructor.@endif</p>
                                    </div>
                                </div> <!-- instructor cont -->
                            </div>
                            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                <div class="reviews-cont">


                                    <script>
                                        /**
                                         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                                         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */

                                        var disqus_config = function () {
                                            this.page.url = "{{route('display_course_content',['id'=>$course->id])}}";  // Replace PAGE_URL with your page's canonical URL variable
                                            this.page.identifier = "course-{{$course->id}}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                        };

                                        (function () { // DON'T EDIT BELOW THIS LINE
                                            var d = document, s = d.createElement('script');
                                            s.src = 'https://spu-learning-platform.disqus.com/embed.js';
                                            s.setAttribute('data-timestamp', +new Date());
                                            (d.head || d.body).appendChild(s);
                                        })();
                                    </script>
                                    <noscript>Please enable JavaScript to view the <a
                                                href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a>
                                    </noscript>


                                    <div id="disqus_thread"></div>


                                </div> <!-- reviews cont -->
                            </div>
                        </div> <!-- tab content -->
                    </div>
                </div> <!-- corses singel left -->

            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12 col-md-6">
                        <div class="course-features mt-30">
                            <h4>Course Features </h4>
                            <ul>
                                <li><i class="fa fa-clone"></i>Lectures : <span>{{$course->lectures()->count()}}</span>
                                </li>
                                <li><i class="fa fa-beer"></i>Assignments :
                                    <span>{{$course->assignments()->count()}}</span></li>
                                <li><i class="fa fa-user-o"></i>Students : <span>{{$course->users()->count()}}</span>
                                </li>
                            </ul>
                            <div class="price-button pt-10">
                                <span>Price : <b>Free</b></span>
                                @if(Auth::check() and Auth::user()->roles()->where('role_en_name','student')->count()>0)
                                    <a href="{{route('enroll_course',['id'=>$course->id])}}" class="main-btn">Enroll
                                        Now</a>
                                @endif
                            </div>
                        </div> <!-- course features -->
                    </div>

                </div>
            </div>
        </div> <!-- row -->
        <div class="row">
            <div class="col-lg-8">
                <div class="releted-courses pt-95">
                    <div class="title">
                        <h3>Releted Courses</h3>
                    </div>
                    <div class="row">
                        @foreach($relatedCourses as $r)
                            <div class="col-md-6">
                                <div class="singel-course mt-30">
                                    <div class="thum">
                                        <div class="image">
                                            @if(isset($r->course_image))
                                                <img src="{{$r->course_image}}" width="100px" height="250px"
                                                     alt="Course">
                                            @else
                                                <img src="{{asset('front-end/images/course/cu-2.jpg')}} "
                                                     alt="Course">

                                            @endif
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
                                        <a href="{{route('single-course',['id'=>$r->id])}}">
                                            <h4>{{$r->course_en_name}}</h4></a>
                                        <div class="course-teacher">
                                            <div class="thum">
                                                <a href="#">
                                                    @if(isset($r->tutor->user->avatar))
                                                        <img src="{{$r->tutor->user->avatar}}" width="100px"
                                                             height="250px"
                                                             alt="teacher">
                                                    @else
                                                        <img src="{{asset('front-end/images/course/cu-2.jpg')}} "
                                                             alt="teacher">

                                                    @endif
                                                </a>
                                            </div>
                                            <div class="name">
                                                <a href="#"><h6>{{$r->tutor->user->name}}</h6></a>
                                            </div>
                                            <div class="admin">
                                                <ul>
                                                    <li><a href="#"><i
                                                                    class="fa fa-user"></i><span>{{$r->users()->count()}}</span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- singel course -->
                            </div>
                        @endforeach

                    </div> <!-- row -->
                </div> <!-- releted courses -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== COURSES SINGEl PART ENDS ======-->

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
