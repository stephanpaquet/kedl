@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ __('pages.faq_title') }}</h1>
    @foreach( $faqs as $faq)
        <div class="faq">
            <div class="faq-question">
                <span class="letter">Q.</span> <span>{{ $faq->question }}</span>
            </div>
            <div class="faq-response">
                <span class="letter">R.</span> <span>{{ $faq->response }}</span>
            </div>
        </div>
    @endforeach
</div>
@endsection
