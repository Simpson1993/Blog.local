@extends('main')

@section('title', '| Edit Category')

@section('content')

    <div class="row">
        {!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'PUT']) !!}
        <div class="col-md-8">
            {{ Form::label('name', 'Category name: ') }}
            {{ Form::text('name', null, ["class" => 'form-control input-lg']) }}

            {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block btn-top-space']) }}

            {!! Html::linkRoute('categories.edit', 'Cancel', array($category->id), array('class' => 'btn
                        btn-danger btn-block')) !!}

            <a href="{{ route('categories.index') }}"
               class="btn btn-default btn-block btn-top-space">
                <<< Return to all categories</a>
        </div>

        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Created At:</dt>
                    <dd>{{ date('M j, Y H:i',strtotime($category->created_at)) }}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Last Updated:</dt>
                    <dd>{{ date('M j, Y H:i', strtotime($category->updated_at)) }}</dd>
                </dl>
            </div>
        </div>
        {!! Form::close() !!}
    </div>

@endsection