@extends('layouts.app')


@section('scripts')

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>



@endsection


@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>


@endsection



@section('content')


    <table id="allCoursesCategoriesTable" class="table table-bordered table-hover" style="background-color:white">

        <thead>
        <tr>
            <th>ID</th>

            <th>Title</th>
            <th>Parent</th>
            <th>Delete</th>

        </tr>
        </thead>

        <tbody>

        @foreach($categories as $c)

            <tr>
                <td>{{$c->id}}</td>
                <td>{{$c->title}}</td>

                @if(!isset($c->parent_id))
                    <td>No Parent</td>

                @else
                    @foreach($categories as $c2)
                        @if($c2->id==$c->parent_id)
                            <td>{{$c2->title}}</td>
                            @break
                        @elseif($c2->id!=$c->parent_id && $loop->last)
                            <td>No Parent</td>
                        @endif
                    @endforeach
                @endif

                <td align="center">
                    <a href="{{route('delete_courses_category',['id'=>$c->id])}}"><i class="fa fa-trash"
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