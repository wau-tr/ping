
@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
<form method="POST" action="{{ route('projects.store') }}">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" aria-describedby="name" placeholder="Enter name">
            @if ($errors->has('name'))
                <span class="" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
    </div>
    <div class="form-group">
        <label for="url">Url</label>
        <input type="text" class="form-control" id="url" name="url" aria-describedby="url" placeholder="Enter url">
           @if ($errors->has('url'))
                <span class="" role="alert">
                    <strong>{{ $errors->first('url') }}</strong>
                </span>
            @endif
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
