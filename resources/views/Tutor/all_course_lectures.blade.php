@extends('layouts.app')


@section('scripts')

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>


@endsection


@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>


@endsection



@section('content')


    <table id="allTutorsCourseLecturesTable" class="table table-bordered table-hover" style="background-color:white">

        <thead>
        <tr>
            <th>ID</th>

            <th>Title</th>
            <th>Type</th>


            <th>View</th>
            <th>Edit</th>
            <th>Delete</th>

        </tr>
        </thead>

        <tbody>

        @foreach($lectures as $l)

            <tr>
                <td>{{$l->id}}</td>
                <td>{{$l->title}}</td>

                <td>
                    @if(Str::startsWith($l->lecture_attachments()->first()->path,'http'))

                        Video
                    @else
                        Document
                    @endif
                </td>





                <td align="center">
                    <a href="{{route('view_course_lecture',['id'=>$l->id])}}">
                        <i class="fa fa-object-group" aria-hidden="true"></i>
                    </a>
                </td>

                <td align="center">
                    <a href="{{route('edit_course_lecture',['id'=>$l->id])}}"><i
                                class="fa fa-undo"></i></a>
                </td>

                <td align="center">
                    <a href="{{route('delete_course_lecture',['id'=>$l->id])}}"><i class="fa fa-trash"
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