@extends('layouts.app')

@section('scripts')



@endsection
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

            <h5>Upload an Assignment</h5>
        </div>

        <div class="card-body">

            <form role="form" method='post' action="{{route('store_student_assignment')}}"
                  enctype="multipart/form-data"
                  id="uploadStudentAssignmentForm">
                {{csrf_field()}}



                <div class="form-group">
                    <h3>Select Course:</h3>
                    <select class="form-control" id="newStudentAssignmentCourse" name="newStudentAssignmentCourse"
                            required>

                        <option></option>
                        @foreach($courses as $cc)

                            <option value="{{$cc->id}}">
                                {{$cc->course_en_name}}
                            </option>

                        @endforeach


                    </select>
                </div>



                <div class="form-group">
                    <label for="newStudentAssignmentAttachment" class="form-control-label">Assignment Selection:
                        <span style="color:red">*</span></label>

                    <!--<div class="file-loading">-->
                    <input id="newStudentAssignmentAttachment" name="newStudentAssignmentAttachment"
                           type="file"/>

                    <!--</div>-->
                </div>



                <div class="form-group" id="uploadStudentAssignmentSubmitGroup">
                    <input type="submit" class="btn btn-success" value="Upload">

                </div>

            </form>
        </div>
    </div>






@endsection


@section('chat-section')
    <global-chats :user="{{ auth()->user() }}"></global-chats>
@endsection
