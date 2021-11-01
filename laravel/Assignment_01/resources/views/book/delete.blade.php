@extends('layouts.app')

@section('content')

<div class="modal fade" id="post-delete-popup" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Delete Confirm') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="book-delete">
                <h4 class="delete-confirm-header">Are you sure to delete post?</h4>
                <div class="col-md-12">
                    <div class="row">
                        <label class="col-md-4 text-md-left">{{ __('ID') }}</label>
                        <label class="col-md-8 text-md-left">
                            <i class="post-text">{{$book->id}}</i>
                        </label>
                    </div>
                    <div class="row">
                        <label class="col-md-4 text-md-left">{{ __('Title') }}</label>
                        <label class="col-md-8 text-md-left">
                            <i class="post-text" id="book-title"></i>
                        </label>
                    </div>
                    <div class="row">
                        <label class="col-md-4 text-md-left">{{ __('Type') }}</label>
                        <label class="col-md-8 text-md-left">
                            <i class="post-text" id="book-type"></i>
                        </label>
                    </div>
                    <div class="row">
                        <label class="col-md-4 text-md-left">{{ __('Author Name') }}</label>
                        <label class="col-md-8 text-md-left">
                            <i class="post-text" id="book-authorName"></i>
                        </label>
                    </div>
                    <div class="row">
                        <label class="col-md-4 text-md-left">{{ __('Release Date') }}</label>
                        <label class="col-md-8 text-md-left">
                            <i class="post-text" id="book-releaseDate"></i>
                        </label>
                    </div>
                    <div class="row">
                        <label class="col-md-4 text-md-left">{{ __('Price($)') }}</label>
                        <label class="col-md-8 text-md-left">
                            <i class="post-text" id="book-price"></i>
                        </label>
                    </div>
                </div>
            </div>
            <!-- onclick="deletePostById({{json_encode(csrf_token())}})" -->
            <!-- "{{ url('task/'.$book->id) }}" -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <form method="POST" action="{{ url('book/list/'.$book->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>