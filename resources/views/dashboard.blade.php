

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Welcome to {{ config('app.name') }}</h1>
        <p>This is a sample page using the Tabler framework with Laravel.</p>
        <p>{{ __("You're logged in!") }}</p>
    </div>
@endsection