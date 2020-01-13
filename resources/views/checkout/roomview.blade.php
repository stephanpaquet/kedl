@extends('layouts.app')

@section('content')
    <div class="container" id="app">
        <h1>{{ __('checkout.roomview_title') }}</h1>

        <pre>{{ print_r($session)  }}</pre>
    </div>
@endsection
