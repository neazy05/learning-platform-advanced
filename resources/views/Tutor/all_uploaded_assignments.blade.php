@extends('layouts.app')


@section('scripts')

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>


@endsection


@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>


@endsection



@section('content')


    <table id="allUploadedAssignmentsTable" class="table table-bordered table-hover"
           style="background-color:white">

        <thead>
        <tr>
            <th>ID</th>
            <th>Student Name</th>
            <th>Course</th>
            <th>Date</th>
            <th>Grade</th>
            <th>Feedback</th>
            <th>Preview</th>

        </tr>
        </thead>

        <tbody>

        @foreach($assignments as $assigns)
            @foreach($assigns as $a )
                <tr>
                    <td>{{$a->id}}</td>
                    <td>{{$a->user->name}}</td>
                    <td>{{$a->course->course_en_name}}</td>
                    <td>{{$a->updated_at}}</td>


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

                        <a href="{{route('preview_uploaded_assignment',['id'=>$a->id])}}"><i
                                    class="fas fa-eye"></i></a>

                    </td>


                </tr>
            @endforeach

        @endforeach

        </tbody>
    </table>

@endsection


@section('chat-section')
    <global-chats :user="{{ auth()->user() }}"></global-chats>
@endsection