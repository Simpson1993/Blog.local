@extends('main')

@section('title', '| Setting')

@section('content')

    <div class="container">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        {!! Form::open(['action' => 'ProfileController@viewSettings']) !!}

                        <div class="form-group">
                            {!! Form::label('profile_banner_url', 'Input the image url for your banner') !!}
                            {!! Form::text('profile_banner_url', $user->profile_banner_url, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('profile_image_url', 'Input the image url for your profile picture') !!}
                            {!! Form::text('profile_image_url', $user->profile_image_url, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('age', 'Input your age*') !!}
                            {!! Form::selectRange('age', 16, 99, $user->age, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('about_me', 'Input about information*') !!}
                            {!! Form::textarea('about_me',$user->about_me, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('contacts', 'Input contacts*') !!}
                            {!! Form::text('contacts', $user->contacts, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {{ Form::submit('Save info', array('class' => 'btn btn-primary btn-lg btn-block',
                            'style' => 'margin-top: 10px;')) }}
                        </div>

                        {!! Form::close() !!}
                        <p>*fill in the required fields</p>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
