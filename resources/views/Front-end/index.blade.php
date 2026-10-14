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

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
          integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

    <script src="{{asset('js/rating.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/rating.css')}}"/>
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

    <!--====== Fontawesome css ======
    <link rel="stylesheet" href="{{asset('front-end/css/font-awesome.min.css')}}">-->

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

    <div class="header-top d-none d-md-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="header-contact text-lg-left text-center">
                        <ul>
                            <li><img src="images/all-icon/call.png" alt="icon"><span>+963 11 6990200</span></li>
                            <li><img src="images/all-icon/email.png" alt="icon"><span>info@spu.edu.sy</span></li>
                            <li><img src="images/all-icon/map.png"
                                     alt="icon"><span>127/5 Daraa Autostrad, Ghabaghb</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="header-social text-lg-right text-center">
                        <div class="button" style="font-size: 5px !important;line-height: 45px!important;">
                            @if(!Auth::check())
                                <a href="{{route('welcome')}}" class="main-btn">Login/Register</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- header top -->

    <div class="navigation navigation-2">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-11 col-md-10 col-sm-9 col-9">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="{{route('index')}}">
                            <img src="{{asset('front-end/images/logo.png')}}" alt="Logo">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto">
                                <!-- <li class="nav-item">
                                     <a class="active" href="index-2.html">Home</a>
                                     <ul class="sub-menu">
                                         <li><a href="index-2.html">Home 01</a></li>
                                         <li><a class="active" href="index-3.html">Home 02</a></li>
                                         <li><a href="index-4.html">Home 03</a></li>
                                     </ul>
                                 </li>-->

                                <li class="nav-item">
                                    <a class="active" href="{{route('index')}}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('about')}}">About us</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('courses')}}">Courses</a>
                                    <!-- <ul class="sub-menu">
                                         <li><a href="courses.html">Courses</a></li>
                                         <li><a href="courses-singel.html">Course Singel</a></li>
                                     </ul>-->
                                </li>

                                <li class="nav-item">
                                    <a href="{{route('tutors')}}">Our tutors</a>
                                    <!-- <ul class="sub-menu">
                                         <li><a href="teachers.html">teachers</a></li>
                                         <li><a href="teachers-singel.html">teacher Singel</a></li>
                                     </ul>-->
                                </li>


                                <li class="nav-item">
                                    <a href="{{route('contact')}}">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </nav> <!-- nav -->
                </div>
                <div class="col-lg-1 col-md-2 col-sm-3 col-3">
                    <div class="right-icon text-right">
                        <ul>
                            <li><a href="#" id="search"><i class="fa fa-search"></i></a></li>

                            <!--<li><a href="#"><i class="fa fa-shopping-bag"></i><span>0</span></a></li>-->
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

<!--====== SLIDER PART START ======-->

<section id="slider-part" class="slider-active">
    <div class="single-slider slider-2 bg_cover" style="background-image: url(images/slider/s-2.jpg)" data-overlay="4">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-10">
                    <div class="slider-cont">
                        <h1 data-animation="bounceInLeft" data-delay="1s">More than 5,000+ courses for develop your
                            skill</h1>
                        <a data-animation="fadeInUp" data-delay="1.3s" href="{{route('courses')}}" class="main-btn">Available
                            Courses</a>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- single slider -->

    <div class="single-slider slider-2 bg_cover" style="background-image: url(images/slider/s-3.jpg)" data-overlay="4">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-10">
                    <div class="slider-cont">
                        <h1 data-animation="bounceInLeft" data-delay="1s">More than 5,000+ courses for develop your
                            skill</h1>
                        <a data-animation="fadeInUp" data-delay="1.3s" href="{{route('courses')}}" class="main-btn">Available
                            Courses</a></div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- single slider -->

    <div class="single-slider slider-2 bg_cover" style="background-image: url(images/slider/s-1.jpg)" data-overlay="4">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-10">
                    <div class="slider-cont">
                        <h1 data-animation="bounceInLeft" data-delay="1s">More than 5,000+ courses for develop your
                            skill</h1>
                        <a data-animation="fadeInUp" data-delay="1.3s" href="{{route('courses')}}" class="main-btn">Available
                            Courses</a>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- single slider -->
</section>

<!--====== SLIDER PART ENDS ======-->

<!--====== CATEGORY PART START ======-->

<section id="category-2-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="category-2-items pt-10">
                    <div class="row">
                        @foreach($categories as $cat=>$numOfCourses)


                            <div class="col-md-6">
                                <div class="singel-items text-center mt-30">
                                    <div class="items-image">
                                        @if($loop->index%6==0)
                                            <img src="{{asset('front-end/images/category/ctg-1.jpg')}}" alt="Category">
                                        @elseif($loop->index%6==1)
                                            <img src="{{asset('front-end/images/category/ctg-2.jpg')}}" alt="Category">
                                        @elseif($loop->index%6==2)
                                            <img src="{{asset('front-end/images/category/ctg-3.jpg')}}" alt="Category">

                                        @elseif($loop->index%6==3)
                                            <img src="{{asset('front-end/images/category/ctg-4.jpg')}}" alt="Category">


                                        @elseif($loop->index%6==4)
                                            <img src="{{asset('front-end/images/category/ctg-5.jpg')}}" alt="Category">

                                        @elseif($loop->index%6==5)
                                            <img src="{{asset('front-end/images/category/ctg-6.jpg')}}" alt="Category">

                                        @endif
                                    </div>
                                    <div class="items-cont">
                                        <a href="#">
                                            <h5>{{$cat}}</h5>
                                            <span>{{$numOfCourses}} courses</span>
                                        </a>
                                    </div>
                                </div> <!-- singel items -->
                            </div>

                        @endforeach


                    </div> <!-- row -->
                </div> <!-- category -->
            </div>

        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== CATEGORY PART ENDS ======-->

<!--====== COURSE PART START ======-->

<section id="course-part" class="pt-115 pb-115">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title pb-45">
                    <h5>Our course</h5>
                    <h2>Featured courses </h2>
                </div> <!-- section title -->
            </div>
        </div> <!-- row -->
        <div class="row course-slied mt-30">

            @foreach($featuredCourses as $course)
                <div class="col-lg-4">
                    <div class="singel-course-2">
                        <div class="thum">
                            <div class="image">
                                @if(isset($course->course_image))
                                    <img src="{{$course->course_image}}" width="100px" height="250px" alt="Course">
                                @else
                                    <img src="{{asset('front-end/images/course/cu-2.jpg')}} " alt="Course">

                                @endif
                            </div>
                            <div class="price">
                                <span>Free</span>
                            </div>
                            <div class="course-teacher">
                                <div class="thum">
                                    <a href="#"><img
                                                src="{{$course->tutor->user->avatar}}"
                                                alt="teacher"></a>
                                </div>
                                <div class="name">
                                    <a href="#"><h6>{{$course->tutor->user->name}}</h6></a>
                                </div>
                                <div class="review">
                                    <table style="margin:0 auto">
                                        <tbody>
                                            <tr class='rating'>
                                                <td>
                                                    <span class="number-rating"></span>
                                                    <span class='ratingValue'>
                                                        {{$course->course_rating}}
                                                    </span>
                                                    <span class="stars-outer">
                                                         <div class="stars-inner"></div>
                                                    </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="cont">
                            <a href="{{route('single-course',['id'=>$course->id])}}">
                                <h4>{{$course->course_en_name}}</h4></a>
                        </div>
                    </div> <!-- singel course -->
                </div>
            @endforeach


        </div> <!-- course slied -->
    </div> <!-- container -->
</section>

<!--====== COURSE PART ENDS ======-->

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

<section id="teachers-part" class="pt-65 pb-120 gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title mt-50 pb-25">
                    <h5>Top Tutors</h5>
                    <h2>Featured Teachers</h2>
                </div> <!-- section title -->
                <div class="teachers-2">
                    <div class="row">
                        @foreach($featuredTutors as $t)
                            <div class="col-md-6">
                                <div class="teachers-2-singel mt-30">
                                    <div class="thum">
                                        <img src="{{$t->user->avatar}}" alt="Teacher" width="85px" height="75px">
                                    </div>
                                    <div class="cont">
                                        <a href="teachers-singel.html"><h5>{{$t->name}}</h5></a>
                                        @if(isset($t->tutor_diploma)) <p>{{$t->tutor_diploma}} Expert</p>@endif
                                        <span><i class="fa fa-book"></i>{{$t->courses()->count()}} Courses</span>
                                    </div>
                                </div> <!-- teachers 2 singel -->
                            </div>
                        @endforeach

                    </div> <!-- row -->
                </div> <!-- teachers 2 -->
            </div>
            <div class="col-lg-6 ">
                <div class="happy-student mt-55">
                    <div class="happy-title">
                        <h3>Happy Students</h3>
                    </div>
                    <div class="student-slied">
                        @foreach($happyStudents as $student)
                            <div class="singel-student">
                                <img src="{{$student->avatar}}" width="150px" height="150px" alt="Quote">
                                @if($loop->index%3==0)
                                    <p>Our students achieve their goals and learn what makes them happy...</p>
                                @elseif($loop->index%3==1)
                                    <p>Creativity and passions to learn is what makes our website continues...</p>
                                @elseif($loop->index%3==2)
                                    <p>No need to go out and attend classes, our E-Learning website encourages
                                        collaboration between tutors and students...</p>
                                @endif

                                <h6>{{$student->name}}</h6>
                                <span>Bsc, Engineering</span>
                            </div> <!-- singel student -->
                        @endforeach


                    </div> <!-- student slied -->
                    <div class="student-image">
                        <img src="{{asset('front-end/images/teachers/teacher-2/happy.png')}}" alt="Image">
                    </div>
                </div> <!-- happy student -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== TEACHERS PART ENDS ======-->

<!--====== EVENT 2 PART START ======

<section id="event-part" class="pt-120">
    <div class="container">
        <div class="event-bg bg_cover" style="background-image: url(images/bg-3.jpg)">
            <div class="row">
                <div class="col-lg-5 offset-lg-6 col-md-8 offset-md-2 col-sm-10 offset-sm-1">
                    <div class="event-2 pt-90 pb-70">
                        <div class="event-title">
                            <h3>Upcoming events</h3>
                        </div>
                        <ul>
                            <li>
                                <div class="singel-event">
                                    <span><i class="fa fa-calendar"></i> 2 December 2018</span>
                                    <a href="events-singel.html"><h4>Campus clean workshop</h4></a>
                                    <span><i class="fa fa-clock-o"></i> 10:00 Am - 3:00 Pm</span>
                                    <span><i class="fa fa-map-marker"></i> Rc Auditorim</span>
                                </div>
                            </li>
                            <li>
                                <div class="singel-event">
                                    <span><i class="fa fa-calendar"></i> 2 December 2018</span>
                                    <a href="events-singel.html"><h4>Tech Summit</h4></a>
                                    <span><i class="fa fa-clock-o"></i> 10:00 Am - 3:00 Pm</span>
                                    <span><i class="fa fa-map-marker"></i> Rc Auditorim</span>
                                </div>
                            </li>
                            <li>
                                <div class="singel-event">
                                    <span><i class="fa fa-calendar"></i> 2 December 2018</span>
                                    <a href="events-singel.html"><h4>Enviroement conference</h4></a>
                                    <span><i class="fa fa-clock-o"></i> 10:00 Am - 3:00 Pm</span>
                                    <span><i class="fa fa-map-marker"></i> Rc Auditorim</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
-->
<!--====== EVENT 2 PART ENDS ======-->

<!--====== NEWS PART START ======
{{--
<section id="news-part" class="pt-115 pb-110">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title pb-50">
                    <h5>Latest News</h5>
                    <h2>From the news</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="singel-news mt-30">
                    <div class="news-thum pb-25">
                        <img src="{{asset('front-end/images/news/n-1.jpg')}}" alt="News">
                    </div>
                    <div class="news-cont">
                        <ul>
                            <li><a href="#"><i class="fa fa-calendar"></i>2 December 2018 </a></li>
                            <li><a href="#"> <span>By</span> Adam linn</a></li>
                        </ul>
                        <a href="blog-singel.html"><h3>Tips to grade high cgpa in university life</h3></a>
                        <p>Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons
                            equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet
                            mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt .</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="singel-news news-list">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="news-thum mt-30">
                                <img src="{{asset('front-end/images/news/ns-1.jpg')}}" alt="News">
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="news-cont mt-30">
                                <ul>
                                    <li><a href="#"><i class="fa fa-calendar"></i>2 December 2018 </a></li>
                                    <li><a href="#"> <span>By</span> Adam linn</a></li>
                                </ul>
                                <a href="blog-singel.html"><h3>Intellectual communication</h3></a>
                                <p>Gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons
                                    vel.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="singel-news news-list">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="news-thum mt-30">
                                <img src="images/news/ns-2.jpg" alt="News">
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="news-cont mt-30">
                                <ul>
                                    <li><a href="#"><i class="fa fa-calendar"></i>2 December 2018 </a></li>
                                    <li><a href="#"> <span>By</span> Adam linn</a></li>
                                </ul>
                                <a href="blog-singel.html"><h3>Study makes you perfect</h3></a>
                                <p>Gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons
                                    vel.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="singel-news news-list">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="news-thum mt-30">
                                <img src="images/news/ns-3.jpg" alt="News">
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="news-cont mt-30">
                                <ul>
                                    <li><a href="#"><i class="fa fa-calendar"></i>2 December 2018 </a></li>
                                    <li><a href="#"> <span>By</span> Adam linn</a></li>
                                </ul>
                                <a href="blog-singel.html"><h3>Technology edcution is now....</h3></a>
                                <p>Gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons
                                    vel.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>-->

<!--====== NEWS PART ENDS ======-->
--}}
<!--====== PATNAR LOGO PART START ======-->

<div id="patnar-logo" class="pt-40 pb-80 gray-bg">
    <div class="container">
        <div class="row patnar-slied">
            <div class="col-lg-12">
                <div class="singel-patnar text-center mt-40">
                    <img src="{{asset('front-end/images/patnar-logo/p-1.png')}}" alt="Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="singel-patnar text-center mt-40">
                    <img src="{{asset('front-end/images/patnar-logo/p-2.png')}}" alt="Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="singel-patnar text-center mt-40">
                    <img src="{{asset('front-end/images/patnar-logo/p-3.png')}}" alt="Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="singel-patnar text-center mt-40">
                    <img src="{{asset('front-end/images/patnar-logo/p-4.png')}}" alt="Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="singel-patnar text-center mt-40">
                    <img src="{{asset('front-end/images/patnar-logo/p-2.png')}}" alt="Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="singel-patnar text-center mt-40">
                    <img src="{{asset('front-end/images/patnar-logo/p-3.png')}}" alt="Logo">
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
