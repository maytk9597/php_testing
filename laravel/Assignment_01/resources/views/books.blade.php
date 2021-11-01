<!-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-sm-offset-2 col-sm-8">

        @if (count($books) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Books
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">
                    <thead>
                        <th>Book</th>
                        <th>&nbsp;</th>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                        <tr>
                            <td class="table-text">
                                <div>{{ $book->title }}</div>
                            </td>

                            <td>
                                <form action="{{ url('book/'.$book->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-btn fa-trash"></i>Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection -->
@extends('layouts.app')

@section('content')
<table class="table table-hover" id="post-list">
    <thead>
        <tr>
            <th class="header-cell" scope="col">Post Title</th>
            <th class="header-cell" scope="col">Post Description</th>
            <th class="header-cell" scope="col">Posted User</th>
            <th class="header-cell" scope="col">Posted Date</th>
            <th class="header-cell" scope="col">Operation</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($bookList as $book)
        <tr>
            <td>
                <!-- onclick="showPostDetail({{json_encode($post)}})" -->
                <a class="post-name" data-toggle="modal" data-target="#post-detail-popup">{{$book->title}}</a>
            <td>{{$book->type}}</td>
            <td>{{$book->price}}</td>
            <td>{{date('Y/m/d', strtotime($book->created_at))}}</td>
            <td>
                <a type="button" class="btn btn-primary" href="/post/edit/{{$post->id}}">Edit</a>
                <!-- onclick="showDeleteConfirm({{json_encode($post)}})" -->
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#post-delete-popup">Delete</button>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>