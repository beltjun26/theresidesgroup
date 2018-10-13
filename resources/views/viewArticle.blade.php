@extends('layouts.app')

@section('title', 'View Article')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <hr class="col-xs-12">
            <div class="row">
                <div class="col-sm-6 offset-sm-3">
                    <div class="card">
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
                                    <a
                                    class="btn btn-outline-primary"
                                    href="/article/edit/{{ $article->id }}"
                                    >
                                        Edit
                                    </a>
                                    <button
                                    class="btn btn-outline-danger"
                                    type="button"
                                    name="button"
                                    >
                                        Delete
                                    </button>
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
