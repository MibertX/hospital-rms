@extends('appshell::layouts.default')

@section('title')
    {{ __('Create new department') }}
@stop


@section('content')
    <div class="card card-accent-success">
        <div class="card-header">
            {{ __('New Department Data') }}
        </div>
        <div class="card-block">
            {!! Form::open(['url' => route('departments.store')]) !!}
                @include('departments._form')
            {!! Form::close() !!}
        </div>
        <div class="card-footer">
        </div>
    </div>
@endsection