@extends('layouts.app')
@section('styles')


    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport'/>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="{{asset('assets/css/material-dashboard.css?v=2.1.2')}}" rel="stylesheet"/>
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{asset('assets/demo/demo.css')}}" rel="stylesheet"/>

@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="card">
                <div class="card-header"><h3 class="alert alert-light">Dashboard</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Auth::user()->roles()->where('role_en_name','admin')->count()>0)
                        <div class="row">

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="card card-stats">
                                    <div class="card-header card-header-danger card-header-icon">
                                        <div class="card-icon">
                                            <i class="fa fa-users"></i>
                                        </div>
                                        <p class="card-category">Newly Registered Tutors</p>
                                        <h3 class="card-title">{{$newtutors}}</h3>
                                    </div>
                                    <div class="card-footer">
                                        <div class="stats">
                                            <i class="fa fa-area-chart"></i>&nbsp; Total {{$tutors}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="card card-stats">
                                    <div class="card-header card-header-warning card-header-icon">
                                        <div class="card-icon">
                                            <i class="fa fa-graduation-cap"></i>
                                        </div>
                                        <p class="card-category">Newly Registered Users</p>
                                        <h3 class="card-title">{{$newusers}}

                                        </h3>
                                    </div>
                                    <div class="card-footer">
                                        <div class="stats">
                                            <i class="fa fa-bar-chart"></i>&nbsp; Total {{$users}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="card card-stats">
                                    <div class="card-header card-header-success card-header-icon">
                                        <div class="card-icon">
                                            <i class="material-icons">store</i>
                                        </div>
                                        <p class="card-category">Newly Created Courses</p>
                                        <h3 class="card-title">{{$newcourses}}</h3>
                                    </div>
                                    <div class="card-footer">
                                        <div class="stats">
                                            <i class="fa fa-bar-chart"></i>&nbsp; Total {{$courses}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="card card-stats">
                                    <div class="card-header card-header-info card-header-icon">
                                        <div class="card-icon">
                                            <i class="fa fa-pie-chart"></i>
                                        </div>
                                        <p class="card-category">Newly Created Categories</p>
                                        <h3 class="card-title">{{$newcategories}}</h3>
                                    </div>
                                    <div class="card-footer">
                                        <div class="stats">
                                            <i class="fa fa-line-chart"></i> &nbsp;Total {{$categories}}
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                    @elseif(Auth::user()->roles()->where('role_en_name','student')->count()>0)

                            <div class="row">


                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="card card-stats">
                                        <div class="card-header card-header-success card-header-icon">
                                            <div class="card-icon">
                                                <i class="material-icons">store</i>
                                            </div>
                                            <p class="card-category">My Courses</p>
                                            <h3 class="card-title">{{$mycourses}}</h3>
                                        </div>
                                        <div class="card-footer">
                                            <div class="stats">
                                                <i class="fa fa-bar-chart"></i>&nbsp; Total {{$courses}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="card card-stats">
                                        <div class="card-header card-header-info card-header-icon">
                                            <div class="card-icon">
                                                <i class="fa fa-pie-chart"></i>
                                            </div>
                                            <p class="card-category">My Assignments</p>
                                            <h3 class="card-title">{{$myassignments}}</h3>
                                        </div>
                                        <div class="card-footer">
                                            <div class="stats">
                                                <i class="fa fa-line-chart"></i> &nbsp;Total {{$assignments}}
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>


                        @elseif(Auth::user()->isTutor)

                            <div class="row">


                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="card card-stats">
                                        <div class="card-header card-header-success card-header-icon">
                                            <div class="card-icon">
                                                <i class="material-icons">store</i>
                                            </div>
                                            <p class="card-category">My Courses</p>
                                            <h3 class="card-title">{{$mycourses}}</h3>
                                        </div>
                                        <div class="card-footer">
                                            <div class="stats">
                                                <i class="fa fa-bar-chart"></i>&nbsp; Total {{$courses}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="card card-stats">
                                        <div class="card-header card-header-info card-header-icon">
                                            <div class="card-icon">
                                                <i class="fa fa-pie-chart"></i>
                                            </div>
                                            <p class="card-category">My Assignments</p>
                                            <h3 class="card-title">{{$myassignments}}</h3>
                                        </div>
                                        <div class="card-footer">
                                            <div class="stats">
                                                <i class="fa fa-line-chart"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card card-stats">
                                    <div class="card-header card-header-warning card-header-icon">
                                        <div class="card-icon">
                                            <i class="fa fa-graduation-cap"></i>
                                        </div>
                                        <p class="card-category">My Students</p>
                                        <h3 class="card-title">{{$mystudents}}

                                        </h3>
                                    </div>
                                    <div class="card-footer">
                                        <div class="stats">
                                            <i class="fa fa-bar-chart"></i>&nbsp; Total Students in System {{$students}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection


@section('chat-section')
    <global-chats :user="{{ auth()->user() }}"></global-chats>
@endsection

