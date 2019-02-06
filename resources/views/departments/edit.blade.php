@extends('appshell::layouts.default')

@section('title')
    {{ __('Edit Department') }}
@stop


@section('content')
    <div class="card card-accent-success">
        <div class="card-header">
            {{ __('Edit "' . $department->name . '" department data') }}
        </div>
        <div class="card-block">
            {!! Form::model($department, ['route' => ['departments.update', $department]]) !!}
                @include('departments._form')
            {!! Form::close() !!}
        </div>
        <div class="card-footer">
            @can('delete users')
                {!! Form::open(['route' => ['departments.destroy', $department], 'method' => 'DELETE', 'class' => "float-right"]) !!}
                    <button class="btn btn-outline-danger">
                        {{ __('Delete department') }}
                    </button>
                {!! Form::close() !!}
            @endcan
        </div>
    </div>
@endsection