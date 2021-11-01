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
                <div class="card-header">{{ __('Post List') }}</div>
                <div class="card-body">
                    </form>
                    <div class="row mb-2 search-bar">
                        <form action="{{ route('searchBookListBetweenDate')}}" type="get" class="search">
                            <div class="search-date row m-0">
                                <label class="p-2 search-lbl">From </label>
                                <input class="search-input mb-2 form-control" type="date" name="start" required />
                            </div>
                            <div class="search-date row m-0">
                                <label class="p-2 search-lbl">To </label>
                                <input class="search-input mb-2 form-control" type="date" name="end" required />
                            </div>
                            @csrf
                            @method('GET')
                            <button class="btn btn-primary mb-2 search-btn" type="submit">Search</button>
                        </form>
                    </div>
                    <div class="row mb-2 search-bar">
                        <form action="{{ route('searchbooklist')}}" type="get" class="search">
                            <label class="p-2 search-lbl">Keyword </label>
                            <input class="search-input mb-2 form-control" type="text" name="keyword" />
                            @csrf
                            @method('GET')
                            <button class="btn btn-primary mb-2 search-btn" type="submit">Search</button>


                            <a class="btn btn-primary header-btn" href="/book/create">{{ __('Create') }}</a>
                            <a class="btn btn-primary header-btn" href="/book/download">{{ __('Download') }}</a>
                            <a class="btn btn-primary header-btn" href="/book/upload">{{ __('Upload') }}</a>
                    </div>
                    <table class="table table-hover" id="post-list">
                        <thead>
                            <tr>
                                <th class="header-cell" scope="col">Book Title</th>
                                <th class="header-cell" scope="col">Book Type</th>
                                <th class="header-cell" scope="col">Author ID</th>
                                <th class="header-cell" scope="col">Price</th>
                                <th class="header-cell" scope="col">Release Date</th>
                                <th class="header-cell" scope="col">Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookList as $book)
                            <tr>
                                <td>{{$book->title}}</td>
                                <td>{{$book->type}}</td>
                                <td>{{$book->author_id}}</td>
                                <td>{{$book->price}}$</td>
                                <td>{{date('Y/m/d', strtotime($book->releaseDate))}}</td>
                                <td>
                                    <form action="{{ route('book.delete', $book->id)}}" method="post">
                                        <a type="button" class="btn btn-primary" href="/book/edit/{{$book->id}}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure want to delete?')">Delete</button>
                                    </form>
                                    <!-- </td> -->
                                </td>
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