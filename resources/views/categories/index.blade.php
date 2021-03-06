@extends('main')

@section('title', '| All Categories')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>Categories</h1>
            <table class="table">
                <thed>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th></th>
                    </tr>
                </thed>

                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <th>{{ $category->id }}</th>
                        <td>{{ $category->name }}</td>
                        @if(Auth::user()->id == 99)
                            <td>
                                {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'DELETE']) !!}

                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm
                                btn-position space-remember']) !!}

                                {!! Form::close() !!}

                                <a href="{{ route('categories.edit',$category->id ) }}" class="btn btn-default btn-sm
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
                {!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
                    <h2>New Category</h2>
                    {{ Form::label('name', 'Name: ') }}
                    {{ Form::text('name', null, ['class' => 'form-control']) }}

                    {{ Form::submit('Create New Category', ['class' => 'btn btn-button btn-primary btn-block btn-top-space']) }}
                {!! Form::close() !!}
            </div>
        </div>

    </div>

@endsection