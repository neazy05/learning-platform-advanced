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
            <br/>
            <div>
                <img src="{{asset($course->course_image)}}" alt="Course Image" width="200px" height="150px">
            </div>
            <br/>
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

            <h4 class="card-title">Course Content</h4>
            <div><strong>Number of Lectures:</strong> {{count($course->lectures()->get())}}</div>
            <div><strong>Number of Assignments:</strong> {{count($course->assignments()->get())}}</div>

            </p>

            <h4 class="card-title">Available Lectures:</h4>

            @foreach($course->lectures()->get() as $l)
                <a href="{{route('view_student_course_lecture',['id'=>$l->id])}}">
                    <strong>></strong> {{$l->title}}
                </a>
                <br/>

            @endforeach

            <br/>
            <h4 class="card-title">Available Assignments:</h4>

            @foreach($course->assignments()->get() as $a)
                <a href="{{route('view_student_course_assignment',['id'=>$a->id])}}">
                    <strong>></strong> {{$a->title}}
                </a>
                <br/>


            @endforeach

            <br/>
            <div>
                <strong>My Rating: </strong>
                @if(isset($myRating))
                    {{$myRating}}
                @else
                    0
                @endif
            </div>
            <br/>
            <form role="form" method="post" action="{{route('add_course_rating',['id'=>$course->id])}}"
                  enctype="multipart/form-data"
                  id="addRatingForm">
                {{csrf_field()}}

                <label for="rating">Rating</label>
                <input type="range" id="rangeInput" name="rating" min="0" max="5" value="0" step="0.5"
                       oninput="amount.value=rangeInput.value">


                <output name="amount" id="amount" for="rangeInput">0</output>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Rate">
                </div>
            </form>

        </div>
        <div class="card-footer text-muted">
            <a href="{{route('leave_course',['id'=>$course->id])}}" class="btn btn-danger">Leave Course</a>
        </div>
    </div>




@endsection


@section('chat-section')
    <global-chats :user="{{ auth()->user() }}"></global-chats>
@endsection
