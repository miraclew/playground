@extends('layouts.default')

@section('content')
    <h1>Create New User</h1>
    {{ Form::open(['route' => 'users.store']) }}
        <div>
            {{ Form::label('username', 'Username: ') }}
            {{ Form::text('username') }}
        </div>
        <div>
            {{ Form::label('password', 'Password: ') }}
            {{ Form::text('password') }}
        </div>

        <div>{{ Form::submit('Create User') }}</div>

    {{ Form::close() }}
@stop