@extends('layouts.app')

@section('title', 'Edit Article')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                <h1 class="text-center">
                    Edit Article
                </h1>
            </div>
            <form action="/article/editArticle" method="post">
                @csrf
                <input
                    type="hidden"
                    name="id"
                    value="{{ $article->id }}"
                >
                <div class="form-group">
                    <label for="author">
                        Title:
                    </label>
                    <input
                        class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                        type="text"
                        name="title"
                        value="{{ old('title', $article->title) }}"
                    >
                    @if ($errors->has('title'))
                        <span class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="content">
                        Content:
                    </label>
                    <textarea
                        class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}"
                        type="text"
                        name="content"
                    >{{ old('content', $article->content) }}</textarea>
                    @if ($errors->has('content'))
                        <span class="invalid-feedback">
                            {{ $errors->first('content') }}
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="bannerImg">
                        Upload Banner Image
                    </label>
                    <input
                        class="form-control-file"
                        type="file"
                        name="bannerImg"
                    >
                    @if ($errors->has('bannerImg'))
                        <span class="invalid-feedback">
                            {{ $errors->first('bannerImg') }}
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="author">
                        Author:
                    </label>
                    <input
                        class="form-control {{ $errors->has('author') ? 'is-invalid' : '' }}"
                        type="text"
                        name="author"
                        value="{{ old('author', $article->author) }}"
                    >
                    @if ($errors->has('author'))
                        <span class="invalid-feedback">
                            {{ $errors->first('author') }}
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="author">
                        Status:
                    </label>
                    <select
                        class="custom-select {{ $errors->has('status') ? 'is-invalid' : '' }}"
                        name="status"
                    >
                        <option
                            value="published"
                            {{ old('status', $article->status) == 'published'? 'selected': '' }}
                        >
                            Published
                        </option>
                        <option
                            value="draft"
                            {{ old('status', $article->status) == 'draft'? 'selected': '' }}
                        >
                            Draft
                        </option>
                    </select>
                    @if ($errors->has('status'))
                        <span class="invalid-feedback">
                            {{ $errors->first('status') }}
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <button
                        class="btn btn-primary"
                        type="submit"
                        name="submit"
                    >
                        Change
                    </button>
                </div>
            </form>
            <div class="row">
            </div>
        </div>
    </div>
</div>
@endsection
