@extends('layouts.app')

@section('title', 'Article List')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">
                Article List
            </h1>
            <a
                class="btn btn-success"
                href="/article/add"
            >
                Add
            </a>
            @if (session('status'))
                <div class="alert alert-success col-sm-6 offset-sm-3" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <hr class="col-xs-12">
            <div class="row">
                @forelse ($articles as $article)
                    <div class="col-sm-6">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset('img/image.jpeg') }}" alt="Card image cap">
                            <div class="card-body">
                                <h5>
                                    <a href="/article/view/{{ $article->id }}">
                                        {{ $article->title }}
                                    </a>
                                </h5>
                                <p style="min-height:100px">
                                    {!! str_limit(nl2br(e($article->content)), $limit = 150, $end = '...') !!}
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
                                        <a
                                        class="btn btn-outline-danger"
                                        href="/article/delete/{{ $article->id }}"
                                        >
                                            Delete
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-sm-12">
                        <p class="text-center">No Articles Yet</p>
                    </div>
                @endforelse
            </div>
            <div class="row">
                {{ $articles->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
