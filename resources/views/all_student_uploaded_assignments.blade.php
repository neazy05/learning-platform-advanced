@extends('layouts.app')


@section('scripts')

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>


@endsection


@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>


@endsection



@section('content')


    <table id="allStudentUploadedAssignmentsTable" class="table table-bordered table-hover table-responsive"
           style="background-color:white">

        <thead>
        <tr>
            <th>ID</th>
            <th>Course</th>

            <th>Attachment</th>
            <th>Grade</th>
            <th>Feedback</th>
            <th>Edit</th>
            <th>Delete</th>

        </tr>
        </thead>

        <tbody>

        @foreach($assignments as $a)

            <tr>
                <td>{{$a->id}}</td>
                <td>{{$a->course->course_en_name}}</td>


                <td>
                    <a href="{{asset($attachPath.$a->id."/".$attachNames[$a->id])}}"
                       target="_blank">{{$attachNames[$a->id]}}</a>
                </td>

                <td>
                    @if(isset($a->grade))
                        {{$a->grade}}
                    @else
                        Not Graded
                    @endif
                </td>

                <td>
                    @if(isset($a->feedback))
                        {{$a->feedback}}
                    @else
                        No Feedback
                    @endif
                </td>
                <td align="center">
                    @if(isset($a->grade))
                        You Can't Edit it.
                    @else
                        <a href="{{route('edit_student_assignment',['id'=>$a->id])}}"><i
                                    class="fa fa-undo"></i></a>
                    @endif

                </td>

                <td align="center">
                    @if(isset($a->grade))
                        You Can't Delete it.
                    @else
                        <a href="{{route('delete_student_assignment',['id'=>$a->id])}}"><i class="fa fa-trash"
                                                                                           aria-hidden="true"></i></a>                    @endif

                </td>

            </tr>

        @endforeach

        </tbody>
    </table>

@endsection


@section('chat-section')
    <global-chats :user="{{ auth()->user() }}"></global-chats>
@endsection