@extends('layouts.default')

@section('content')
    {{ Form::open(array('url'=>'/vdl/job')) }}
        {{ Form::label("URL") }}
        {{ Form::text("url") }}
        {{ Form::submit("提交") }}
    {{ Form::close() }}
@stop