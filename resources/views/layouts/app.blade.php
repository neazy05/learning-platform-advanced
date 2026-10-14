<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Scripts -->

    <script src="{{asset('js/jquery.js')}}"></script>

    <script src="{{asset('js/propper.min.js')}}"></script>

    <script src="{{asset('js/fileinput/sortable.min.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('js/all.js')}}"></script>

    <link href="{{asset('css/all.css')}}">


    <script src="{{asset('js/toastr.min.js')}}"></script>


    <script src="{{asset('js/js.js')}}"></script>

@yield('scripts')


<!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
          integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}"/>

    @yield('styles')


    <style>
        body {
            background-image: url({{url('back5.jpg')}}) !important;
        }


        .navbar-brand, .navbar-light .navbar-nav a {
            color: #3490dc !important;
        }

        .profile-image {
            width: 50px;
            height: 40px;
            border-radius: 50%;
        }

    </style>

</head>
<body>
<div id='app'>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                SPU Learning Platform
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                @if(isset(Auth::user()->avatar))
                                    @if(!Str::startsWith(Auth::user()->avatar, 'http'))
                                        <img src="{{asset(Auth::user()->avatar)}}" class="profile-image" alt="no Image">
                                    @else
                                        <img src="{{Auth::user()->avatar}}" class="profile-image" alt="no Image">

                                    @endif
                                @else
                                    {{ Auth::user()->name }}
                                @endif
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>

                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <div class="container-fluid">

            <div class="row">

                @if(Auth::check())

                    <div class="col-2 col-sm-2 col-md-2 col-lg-2">

                        <div class="list-group">
                            <div class="list-group-item">
                                <a href="{{route('index')}}">Go to Index Page</a>
                            </div>
                            @if(Auth::check())
                                <div class="list-group-item">
                                    <a href="{{route('home')}}">Dashboard</a>
                                </div>
                                <div class="list-group-item">
                                    <a href="{{route('show_user_profile',['id'=>Auth::user()->id])}}">My Profile</a>
                                </div>

                                <div class="list-group-item">
                                    <a href="{{route('edit_user',['id'=>Auth::user()->id])}}">Edit Profile</a>
                                </div>


                            @endif
                            @if(Auth::check())
                                @if(Auth::user()->roles()->where('role_en_name','admin')->count()>0)
                                    <div class="list-group-item">
                                        <a href="{{route('create_user')}}">Create new User</a>
                                    </div>

                                    <div class="list-group-item">
                                        <a href="{{route('create_tutor')}}">Create new Tutor</a>
                                    </div>

                                    <div class="list-group-item">
                                        <a href="{{route('all_tutors')}}">All Tutors</a>
                                    </div>

                                    <div class="list-group-item">
                                        <a href="{{route('all_users')}}">All Admins and Students</a>
                                    </div>

                                    <div class="list-group-item">
                                        <a href="{{route('create_courses_category')}}">Create Courses Category</a>
                                    </div>

                                    <div class="list-group-item">
                                        <a href="{{route('all_courses_categories')}}">All Courses Categories</a>
                                    </div>





                                @endif

                                @if(Auth::user()->roles()->where('role_en_name','student')->count()>0)

                                    <div class="list-group-item">
                                        <a href="{{route('show_available_courses')}}">Available Courses</a>
                                    </div>

                                    <div class="list-group-item">
                                        <a href="{{route('all_student_courses')}}">My Courses</a>
                                    </div>

                                    <div class="list-group-item">
                                        <a href="{{route('upload_student_assignment')}}">Upload Assignment</a>
                                    </div>

                                    <div class="list-group-item">
                                        <a href="{{route('all_student_uploaded_assignments')}}">All my Assignments</a>
                                    </div>

                                @endif

                            @endif


                            @if(isset(Auth::user()->isTutor))

                                <div class="list-group-item">

                                    <a href="{{route("create_course")}}">
                                        Create New Course</a>
                                </div>

                                <div class="list-group-item">

                                    <a href="{{route('all_tutor_courses')}}">
                                        My Courses</a>
                                </div>


                                <div class="list-group-item">

                                    <a href="{{route('all_uploaded_assignments')}}">
                                        All Students Uploaded Assignments</a>
                                </div>


                            @endif

                        </div>


                    </div>


                    <div class="col-7 col-sm-7 col-md-7 col-lg-7">
                        @yield('content')
                    </div>


                    <div class="col-3 col-sm-3 col-md-3 col-lg-3">
                        @yield('chat-section')
                    </div>


                @else
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        @yield('content')
                    </div>

                @endif
            </div>
        </div>
    </main>
</div>

<script src="{{ asset('js/app.js') }}"></script>

<script type="text/javascript" src="{{asset('js/jquery.dataTables.min.js')}}"></script>

<script type="text/javascript" src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>


<script type="text/javascript">

    $(document).ready(function () {
        $('#allUsersTable').DataTable();
        $('#allTutorsTable').DataTable();
        $('#allLecturesTable').DataTable();
        $('#allCoursesCategoriesTable').DataTable();
        $('#allTutorsCoursesTable').DataTable();
        $('#allTutorsCourseLecturesTable').DataTable();
        $('#allStudentsCoursesTable').DataTable();
        $('#allTutorsCourseAssignmentsTable').DataTable();
        $('#allStudentUploadedAssignmentsTable').DataTable();
        $('#allUploadedAssignmentsTable').DataTable();


    });

</script>
<script type="text/javascript">

    @if(Session::has('success'))
    toastr.success("{{Session::get('success')}}");
    @endif

    @if(Session::has('success-creation'))
    toastr.success("{{Session::get('success-creation')}}");
    @endif

    @if(Session::has('info'))
    toastr.info("{{Session::get('info')}}");
    @endif

    @if(Session::has('error'))
    toastr.error("{{Session::get('error')}}");
    @endif

    @if(Session::has('warning'))
    toastr.warning("{{Session::get('warning')}}");
    @endif

</script>


</body>
</html>
