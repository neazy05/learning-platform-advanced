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
                            <li><img src="{{asset('front-end/images/all-icon/call.png')}}" alt="icon"><span>+963 11 6990200</span></li>
                            <li><img src="{{asset('front-end/images/all-icon/email.png')}}" alt="icon"><span>info@spu.edu.sy</span></li>
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
                                    <a class="active" href="{{route('about')}}">About us</a>
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
         style="background-image: url(images/page-banner-1.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2>About Us</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">About Us</li>
                        </ol>
                    </nav>
                </div>  <!-- page banner cont -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== PAGE BANNER PART ENDS ======-->

<!--====== ABOUT PART START ======-->

<section id="about-page" class="pt-70 pb-110">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="section-title mt-50">
                    <h5>About us</h5>
                    <h2>Welcome to SPU Learning-Platform </h2>
                </div> <!-- section title -->
                <div class="about-cont">
                    <p> SPU L-P aims to be one of the leading world learning platforms in the region. SPU L-P also
                        aims at developing human resources consonant with international academic and professional
                        criteria.
                        SPU L-Ps objective is to meet the market needs nationally and regionally.
                        SPU L-P is working to provide a modern learning, training and research system in the academic
                        and vocational fields to enable the learner and the trainee to engage effectively
                        and directly in the labor market by developing their skills and regional needs in science
                        and technology.
                        <br> <br> SPU L-P seeks to enrich knowledge utilizing e-learning technologies and investing
                        in academic and professional lifelong learning. SPU L-P is committed to establish
                        long-term relationships with its graduates. Quality assurance is a target.</p>
                </div>
            </div> <!-- about cont -->
            <div class="col-lg-7">
                <div class="about-image mt-50">
                    <img src="{{asset('front-end/images/about/about-2.jpg')}}" alt="About">
                </div>  <!-- about imag -->
            </div>
        </div> <!-- row -->
        <div class="about-items pt-60">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-10">
                    <div class="about-singel-items mt-30">
                        <span>01</span>
                        <h4>Why Choose us</h4>
                        <p>Providing a modern system in learning, training and research in the academic and
                            professional field which allows the learner and the trainee to engage effectively and
                            directly in the labor market by developing their skills and knowledge in diverse modern
                            fields that are compatible with the needs and the development of the local and regional
                            economy,
                            and the growing use of the international network in activities and business locally.
                            Regionally and internationally.</p>
                    </div> <!-- about singel -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-10">
                    <div class="about-singel-items mt-30">
                        <span>02</span>
                        <h4>Our Mission</h4>
                        <p>The SPU Learning Platform aims to:

                            1-Meet the National and Arab needs for science and technology, and qualify human resources,
                            as well as develop the knowledge assets of our society.
                            <br/><br/>
                            2-Reinforce the Arabization movement with an intention to transfer knowledge to the Arab
                            region and link it with the global scientific process in a methodological way.
                            <br/><br/>
                            3-Develop the technologies of E-learning, and consolidate it and investing in it in the
                            academic, professional and lifelong learning.
                            <br/><br/>
                            4-Build long-term connections with its graduates and the institutions to which they belong.
                            <br/><br/>
                            5-motivate and develop the skills of educational and administrative staff; both full-time
                            and part-time staff; who are considered the most important asset in improving the quality of
                            all SVU processes.</p>
                    </div> <!-- about singel -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-10">
                    <div class="about-singel-items mt-30">
                        <span>03</span>
                        <h4>Our vission</h4>
                        <p>The SPU L-P seeks to be among learning platforms that have a prominent
                            ranking globally, and a pioneer in the field of E-learning in the region with
                            the aim of qualifying human resources to meet international academic and
                            professional standards and fulfill the needs of the national and regional
                            labor markets in various fields. The SPU L-P seeks also to attract the best
                            educational and research experiences and make them part of a scientific network
                            in which the learner and the graduate can interact.</p>
                    </div> <!-- about singel -->
                </div>
            </div> <!-- row -->
        </div> <!-- about items -->
    </div> <!-- container -->
</section>

<!--====== ABOUT PART ENDS ======-->

<!--====== COUNTER PART START ======-->

<div id="counter-part" class="bg_cover pt-65 pb-110" data-overlay="8" style="background-image: url(images/bg-2.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="singel-counter text-center mt-40">
                    <span><span class="counter">{{$studentsCount}}</span>+</span>
                    <p>Students enrolled</p>
                </div> <!-- singel counter -->
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="singel-counter text-center mt-40">
                    <span><span class="counter">{{$coursesCount}}</span>+</span>
                    <p>Courses Uploaded</p>
                </div> <!-- singel counter -->
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="singel-counter text-center mt-40">
                    <span><span class="counter">{{$usersCount}}</span>+</span>
                    <p>People certifie</p>
                </div> <!-- singel counter -->
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="singel-counter text-center mt-40">
                    <span><span class="counter">{{$tutorsCount}}</span>+</span>
                    <p>Global Teachers</p>
                </div> <!-- singel counter -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</div>

<!--====== COUNTER PART ENDS ======-->

<!--====== TEACHERS PART START ======-->

<section id="teachers-part" class="pt-65 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="section-title mt-50 pb-35">
                    <h5>Featured Teachers</h5>
                    <h2>Meet Our teachers</h2>
                </div> <!-- section title -->
            </div>
        </div> <!-- row -->
        <div class="row">
            @foreach($featuredTutors as $tutor)
                <div class="col-lg-3 col-sm-6">
                    <div class="singel-teachers mt-30 text-center">
                        <div class="image">
                            <img src="@if(isset($tutor->user->avatar)){{$tutor->user->avatar}}@else{{asset('img/undraw_profile.svg')}}@endif"
                                 alt="Teachers">
                        </div>
                        <div class="cont">
                            <a href="teachers-singel.html"><h6>{{$tutor->user->name}}</h6></a>
                            <span>Vice chencelor</span>
                        </div>
                    </div> <!-- singel teachers -->
                </div>
            @endforeach

        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== TEACHERS PART ENDS ======-->

<!--====== TEASTIMONIAL PART START ======-->

<section id="testimonial" class="bg_cover pt-115 pb-120" data-overlay="8"
         style="background-image: url(images/bg-2.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title pb-40">
                    <h5>Testimonial</h5>
                    <h2>What they say</h2>
                </div> <!-- section title -->
            </div>
        </div> <!-- row -->
        <div class="row testimonial-slied mt-40">
            @foreach($happyStudents as $student)
                @if($loop->index%2==0)
                    <div class="col-lg-6">
                        <div class="singel-testimonial">
                            <div class="testimonial-thum">
                                <img src="{{$student->avatar}}" width="100px" height="80px" alt="Testimonial">
                                <div class="quote">
                                    <i class="fa fa-quote-right"></i>
                                </div>
                            </div>
                            <div class="testimonial-cont">
                                <p>Our students achieve their goals and learn what makes them happy...</p>
                                <h6>{{$student->name}}</h6>
                                <span>Bsc, Engineering</span>
                            </div>
                        </div> <!-- singel testimonial -->
                    </div>
                @else
                    <div class="singel-testimonial">
                        <div class="testimonial-thum">
                            <img src="{{$student->avatar}}" width="100px" height="80px" alt="Testimonial">
                            <div class="quote">
                                <i class="fa fa-quote-right"></i>
                            </div>
                        </div>
                        <div class="testimonial-cont">
                            <p>Creativity and passions to learn is what makes our website continues...</p>
                            <h6>{{$student->name}}</h6>
                            <span>Bsc, Engineering</span>
                        </div>
                    </div> <!-- singel testimonial -->
                @endif

            @endforeach


        </div> <!-- testimonial slied -->
    </div> <!-- container -->
</section>

<!--====== TEASTIMONIAL PART ENDS ======-->

<!--====== PATNAR LOGO PART START ======-->

<div id="patnar-logo" class="pt-40 pb-80 gray-bg">
    <div class="container">
        <div class="row patnar-slied">
            <div class="col-lg-12">
                <div class="singel-patnar text-center mt-40">
                    <img src="images/patnar-logo/p-1.png" alt="Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="singel-patnar text-center mt-40">
                    <img src="images/patnar-logo/p-2.png" alt="Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="singel-patnar text-center mt-40">
                    <img src="images/patnar-logo/p-3.png" alt="Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="singel-patnar text-center mt-40">
                    <img src="images/patnar-logo/p-4.png" alt="Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="singel-patnar text-center mt-40">
                    <img src="images/patnar-logo/p-2.png" alt="Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="singel-patnar text-center mt-40">
                    <img src="images/patnar-logo/p-3.png" alt="Logo">
                </div>
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</div>

<!--====== PATNAR LOGO PART ENDS ======-->

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

<!--====== BACK TO TOP PART START ======-->

<a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

<!--====== BACK TO TOP PART ENDS ======-->




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
