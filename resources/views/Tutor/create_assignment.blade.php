@extends('layouts.app')

@section('styles')


@endsection
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

            <h5>Create New Assignment</h5>
        </div>

        <div class="card-body">

            <form role="form" method='post' action="{{route('store_assignment')}}" enctype="multipart/form-data"
                  id="createNewAssignmentForm">
                {{csrf_field()}}

                <div class="form-group">
                    <input type="hidden" class="form-control" id="newAssignmentCourseID" name="newAssignmentCourseID"
                           value="{{$course_id}}"/>
                </div>

                <div class="form-group">
                    <label for="newAssignmentTitle" class="form-control-label">Assignment Title:</label>
                    <input type="text" class="form-control" id="newAssignmentTitle" name="newAssignmentTitle" required/>
                </div>

                <div class="form-group">
                    <label for="newAssignmentDescription" class="form-control-label">Assignment Description:</label>
                    <textarea class="form-control" id="newAssignmentDescription"
                              name="newAssignmentDescription"></textarea>
                </div>


                <div class="form-group">
                    <label for="newAssignmentAttachments" class="form-control-label">Assignment Attachments:
                        <span style="color:red">*</span></label>

                    <input id="newAssignmentAttachments" name="newAssignmentAttachments[]" multiple="multiple"
                           type="file"/>


                </div>
                <br/>


                <div class="form-group" id="newAssignmentSubmitGroup">
                    <input type="submit" class="btn btn-success" value="Submit">

                </div>

            </form>
        </div>
    </div>


@endsection


@section('chat-section')
    <global-chats :user="{{ auth()->user() }}"></global-chats>

@endsection