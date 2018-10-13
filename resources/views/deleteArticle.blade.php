@extends('layouts.app')

@section('title', 'View Article')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="row">
                <div class="alert alert-danger col-sm-6 offset-sm-3" role="alert">
                  Are you sure you want to delete this article?
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 offset-sm-3">
                    <div class="card border-danger">
                        <img class="card-img-top" src="{{ asset('img/image.jpeg') }}" alt="Card image cap">
                        <div class="card-body">
                            <h5>
                                <a href="/article/view/{{ $article->id }}">
                                    {{ $article->title }}
                                </a>
                            </h5>
                            <p style="min-height:100px">
                                {!! nl2br(e($article->content)) !!}
                            </p>
                            <footer class="blockquote-footer">{{ $article->author }}</footer>
                            <i>{{ $article->created_at->diffForHumans() }}</i>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="btn-group">
                                    <form class="" action="/article/deleteArticle" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $article->id }}">
                                        <button
                                        class="btn btn-outline-danger"
                                        type="submit"
                                        name="submit"
                                        >
                                            Delete
                                        </button>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
