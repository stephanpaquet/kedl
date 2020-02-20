@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ __('pages.blog_title') }}</h1>
    @foreach( $blogs as $blog)
        <div class="faq">
            <h2 class="blog-title">{{ $blog->post_title }}</h2>
            <div class="blog-content">
                {!! $blog->post_content !!}
            </div>
        </div>
    @endforeach
</div>
@endsection
