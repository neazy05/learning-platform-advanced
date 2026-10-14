@extends('layouts.app')


@section('scripts')

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>


@endsection


@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>


@endsection



@section('content')


    <table id="allStudentsCoursesTable" class="table table-bordered table-hover" style="background-color:white">

        <thead>
        <tr>
            <th>ID</th>

            <th>Name</th>
            <th>Code</th>
            <th>Nick Name</th>
            <th>Category</th>

            <th>View</th>
            <th>Leave</th>

        </tr>
        </thead>

        <tbody>

        @if($courses->count()!=0)

            @foreach($courses as $c)

                <tr>
                    <td>{{$c->id}}</td>
                    <td>{{$c->course_en_name}}</td>

                    <td>{{$c->course_code}}</td>

                    <td>
                        @if(isset($c->course_nickname))
                            {{$c->course_nickname}}
                        @else
                            No Nickname
                        @endif
                    </td>

                    <td>{{$c->category->title}}</td>

                    <td align="center">
                        <a href="{{route('enter_course',['id'=>$c->id])}}"><i
                                    class="fa fa-object-group"></i></a>
                    </td>

                    <td align="center">
                        <a href="{{route('leave_course',['id'=>$c->id])}}"><i
                                    class="fa fa-trash"></i></a>
                    </td>


                </tr>

            @endforeach

        @endif
        </tbody>
    </table>

@endsection


@section('chat-section')
    <global-chats :user="{{ auth()->user() }}"></global-chats>
@endsection