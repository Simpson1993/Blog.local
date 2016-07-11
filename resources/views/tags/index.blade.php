@extends('main')

@section('title', '| All Tags')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>Tags</h1>
            <table class="table">
                <thed>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th></th>
                    </tr>
                </thed>

                <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <th>{{ $tag->id }}</th>
                        <td><a href="{{route('tags.show', $tag->id)}}">{{ $tag->name }}</a></td>
                        @if(Auth::user()->id == 99)
                            <td>
                                {!! Form::open(['route' => ['tags.destroy',
                                $tag->id], 'method' => 'DELETE']) !!}

                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm
                                btn-position space-remember']) !!}

                                {!! Form::close() !!}

                                <a href="{{ route('tags.edit',$tag->id ) }}" class="btn btn-default btn-sm
                                btn-position">Edit</a>
                            </td>
                        @else
                            <td></td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-3">
            <div class="well">
                {!! Form::open(['route' => 'tags.store', 'method' => 'POST'])
                 !!}
                <h2>New Tag</h2>
                {{ Form::label('name', 'Name: ') }}
                {{ Form::text('name', null, ['class' => 'form-control']) }}

                {{ Form::submit('Create New Tag', ['class' => 'btn btn-button
                btn-primary btn-block btn-top-space']) }}
                {!! Form::close() !!}
            </div>
        </div>

    </div>

@endsection