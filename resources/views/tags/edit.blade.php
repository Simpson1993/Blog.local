@extends('main')

@section('title', "| Edit Tag")

@section('content')

    {!! Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' =>
    'PUT'])!!}

    <h2>Edit Tag</h2>
    {{ Form::label('name', 'Name: ') }}
    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' =>
    "$tag->name" ]) }}

    {{ Form::submit('Save New Tag', ['class' => 'btn btn-button
    btn-primary btn-block btn-top-space']) }}

    {!! Form::close() !!}

@endsection