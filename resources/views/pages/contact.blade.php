@extends('main')

@section('title','| Contact')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Contact Me</h1>
            <hr>
            {!! Form::open(array('url' => '/send-message', 'class' => 'form sendMessageForm')) !!}

            <div class="form-group">
                {!! Form::label('Your Name') !!}
                {!! Form::text('name', null,
                    ['required',
                     'class'=>'form-control',
                     'placeholder'=>'Your name']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('Your E-mail Address') !!}
                {!! Form::text('email', null,
                    ['required',
                     'class'=>'form-control',
                     'placeholder'=>'Your e-mail address']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('Your Message') !!}
                {!! Form::textarea('message', null,
                    ['required',
                     'class'=>'form-control',
                     'placeholder'=>'Your message']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Contact Us!',
                  ['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection