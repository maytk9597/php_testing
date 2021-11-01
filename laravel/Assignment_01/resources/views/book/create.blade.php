@extends('layouts.app')
@section('content')
<!-- Styles -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Book</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('create.book') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right required">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autocomplete="title" autofocus>

                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right required">{{ __('type') }}</label>

                            <div class="col-md-6">
                                <input id="type" type="text" class="form-control @error('type') is-invalid @enderror" name="type" autocomplete="type" value="{{ old('type') }}"></input>
                                @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right required">{{ __('price') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" autocomplete="price" value="{{ old('price') }}"></input>
                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="quantity" class="col-md-4 col-form-label text-md-right required">{{ __('quantity') }}</label>

                            <div class="col-md-6">
                                <input id="quantity" type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity" autocomplete="quantity" value="{{ old('quantity') }}"></input>
                                @error('quantity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="releaseDate" class="col-md-4 col-form-label text-md-right required">{{ __('Release Date') }}</label>

                            <div class="col-md-6">
                                <input id="releaseDate" type="date" class="form-control @error('releaseDate') is-invalid @enderror" name="releaseDate" autocomplete="releaseDate" value="{{ old('releaseDate') }}"></date>
                                @error('releaseDate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="author_id" class="col-md-4 col-form-label text-md-right required">{{ __('Author ID') }}</label>

                            <div class="col-md-6">
                                <input id="author_id" type="text" class="form-control @error('author_id') is-invalid @enderror" name="author_id" autocomplete="author_id" value="{{ old('author_id') }}"></date>
                                @error('author_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                    {{ __('Create') }}
                                </a>
                                <div class="modal fade" id="myModal" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Confirm</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-default">Confirm</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <button type="reset" class="btn btn-secondary">
                                    {{ __('Clear') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection