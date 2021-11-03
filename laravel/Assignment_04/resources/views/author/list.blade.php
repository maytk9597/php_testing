@extends('layouts.app')

@section('content')
<!-- Styles -->
<link href="{{ asset('css/lib/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/post-list.css') }}" rel="stylesheet">

<!-- Script -->
<script src="{{ asset('js/lib/moment.min.js') }}"></script>
<script src="{{ asset('js/lib/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/post-list.js') }}"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Author List') }}</div>
                <div class="card-body">
                    <table class="table table-hover" id="post-list">
                        <thead>
                            <tr>
                                <th class="header-cell" scope="col">ID</th>
                                <th class="header-cell" scope="col">Name</th>
                                <th class="header-cell" scope="col">Description</th>
                                <th class="header-cell" scope="col">Date Of Bith</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($authorList as $author)
                            <tr>
                                <td>
                                    <a class="post-name" data-toggle="modal" data-target="#post-detail-popup">{{$author->id}}</a>
                                <td>{{$author->name}}</td>
                                <td>{{$author->description}}</td>
                                <td>{{date('Y/m/d', strtotime($author->DOB))}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection