@extends('layouts.app')

@section('content')
    @if($errors->any())
        {!! implode('', $errors->all('<div>:message</div>')) !!}
    @endif

    <form action="/upload" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input type="file" class="form-control-file" name="file" id="exampleInputFile" aria-describedby="fileHelp">
            <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

{{--    <div id="app" :session="">--}}

{{--    </div>--}}
@endsection


