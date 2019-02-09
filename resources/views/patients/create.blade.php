@extends('appshell::layouts.default')

@section('title')
    {{ __('Create new patient') }}
@stop


@section('content')
    <div class="card card-accent-success">
        <div class="card-header">
            {{ __('New Patient Data') }}
        </div>
        <div class="card-block">
            {!! Form::open(['url' => route('patients.store')]) !!}
                @include('patients._form')
            {!! Form::close() !!}
        </div>
        <div class="card-footer">
        </div>
    </div>
@endsection