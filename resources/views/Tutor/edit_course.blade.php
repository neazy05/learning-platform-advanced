@extends('layouts.app')

@section('content')


    @if(count($errors)>0)

        <div class="list-group">
            @foreach($errors->all() as $err )

                <div class="list-group-item text-danger">{{$err}}</div>
            @endforeach
        </div>
    @endif

    <div class="card">
        <div class="card-header">

            <h5> Edit Course</h5>
        </div>

        <div class="card-body">

            <form role="form" method='post' action="{{route('update_course',['id'=>$course->id])}}"
                  enctype="multipart/form-data"
                  id="editCourseForm">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="updateCourseENName" class="form-control-label">Course Name:</label>
                    <input type="text" class="form-control" id="updateCourseENName" name="updateCourseENName"
                           value="{{$course->course_en_name}}" required/>
                </div>

                <div class="form-group">
                    <label for="updateCourseNickName" class="form-control-label">Course Nickname:</label>
                    <input type="text" class="form-control" id="updateCourseNickName" name="updateCourseNickName"
                           value="{{$course->course_nickname}}"/>
                </div>

                <div class="form-group">
                    <label for="updateCourseCode" class="form-control-label">Course Code:</label>
                    <input type="text" class="form-control" id="updateCourseCode" name="updateCourseCode"
                           value="{{$course->course_code}}" required/>
                </div>

                <div class="form-group">
                    <p>Old Course Image:</p>
                    <img src="{{asset($course->course_image)}}" alt="Course Image" width="200px" height="150px">
                </div>
                <div class="form-group">
                    <label for="updateCourseImage" class="form-control-label">New Course Image:</label>
                    <input type="file" class="form-control-file" id="updateCourseImage" name="updateCourseImage"/>
                </div>

                <h3>Category Selection:</h3>

                <div class="form-group">
                    <select class="form-control" id="updateCourseCategory" name="updateCourseCategory" required>


                        @foreach($categories as $c)

                            @if($course->category_id==$c->id)
                                <option value="{{$c->id}}" selected>{{$c->title}}</option>
                            @else
                                <option value="{{$c->id}}">{{$c->title}}</option>
                            @endif

                        @endforeach
                    </select>
                </div>
                <br/>
                <div class="form-group" id="updateUserSubmitGroup">
                    <input type="submit" class="btn btn-success" value="Update">

                </div>

            </form>
        </div>
    </div>






@endsection


@section('chat-section')
    <global-chats :user="{{ auth()->user() }}"></global-chats>
@endsection
