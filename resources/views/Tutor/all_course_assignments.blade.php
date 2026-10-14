@extends('layouts.app')


@section('scripts')

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>


@endsection


@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>


@endsection



@section('content')


    <table id="allTutorsCourseAssignmentsTable" class="table table-bordered table-hover" style="background-color:white">

        <thead>
        <tr>
            <th>ID</th>
            <th>Course</th>

            <th>Title</th>


            <th>Attachments</th>
            <th>Edit</th>
            <th>Delete</th>

        </tr>
        </thead>

        <tbody>

        @foreach($assignments as $a)

            <tr>
                <td>{{$a->id}}</td>
                <td>{{$a->course->course_en_name}}</td>

                <td>{{$a->title}}</td>

                <td>

                    @foreach($attachNames[$a->id] as $att)


                        <a href="{{asset($attachPath.$a->id."/".$att)}}" target="_blank">{{$att}}</a>
                        </br>
                    @endforeach


                </td>


                <td align="center">
                    <a href="{{route('edit_assignment',['id'=>$a->id])}}"><i
                                class="fa fa-undo"></i></a>
                </td>

                <td align="center">
                    <a href="{{route('delete_assignment',['id'=>$a->id])}}"><i class="fa fa-trash"
                                                                               aria-hidden="true"></i></a>
                </td>

            </tr>

        @endforeach

        </tbody>
    </table>

@endsection


@section('chat-section')
    <global-chats :user="{{ auth()->user() }}"></global-chats>
@endsection