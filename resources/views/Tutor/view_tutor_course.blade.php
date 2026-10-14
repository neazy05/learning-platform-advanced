@extends('layouts.app')


@section('scripts')
    <script src="{{asset('js/rating.js')}}"></script>
@endsection

@section('styles')

    <link rel="stylesheet" href="{{asset('css/rating.css')}}"/>

@endsection
@section('content')


    @if(count($errors)>0)

        <div class="list-group">
            @foreach($errors->all() as $err )

                <div class="list-group-item text-danger">{{$err}}</div>
            @endforeach
        </div>
    @endif

    <div class="card text-center">
        <h2 class="card-header">
            {{$course->course_en_name}}
        </h2>
        <div class="card-body">
            <h4 class="card-title">Course Information</h4>
            <p class="card-text">

            @if(isset($course->course_nickname))
                <div><strong>Nickname:</strong> {{$course->course_nickname}}</div>
            @endif
            <div><strong>Code:</strong> {{$course->course_code}}</div>
            <div><strong>Category:</strong> {{$course->category->title}}</div>
            <div>
                <table style="margin:0 auto">
                    <tbody>
                    <tr class='rating'>
                        <td>

                            <span class="number-rating"></span>
                            <div><strong>Rating:</strong>
                                <span class='ratingValue'>
                               {{$course->course_rating}}
                            </span>
                                <span class="stars-outer">
                                            <div class="stars-inner"></div>
                                        </span>
                            </div>


                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <br/>
            <div>
                <img src="{{asset($course->course_image)}}" alt="Course Image" width="200px" height="150px">
            </div>
            <br/>

            <h4 class="card-title">Course Content</h4>
            <div><strong>Number of Enrolled Students:</strong> {{count($course->users()->get())}}</div>
            <div><strong>Number of Lectures:</strong> {{count($course->lectures()->get())}}</div>
            <div><strong>Number of Assignments:</strong> {{count($course->assignments()->get())}}</div>

            </p>

            <a href="{{route('create_lecture',['id'=>$course->id])}}" class="btn btn-primary">Add Lecture</a>
            <a href="{{route('create_assignment',['id'=>$course->id])}}" class="btn btn-primary">Add Assignment</a>
        </div>
        <div class="card-footer text-muted">
            <a href="{{route('all_course_lectures',['id'=>$course->id])}}" class="btn btn-success">View Lectures</a>
            <a href="{{route('all_course_assignments',['id'=>$course->id])}}" class="btn btn-success">View
                Assignments</a>
        </div>
    </div>






@endsection


@section('chat-section')
    <global-chats :user="{{ auth()->user() }}"></global-chats>
@endsection
