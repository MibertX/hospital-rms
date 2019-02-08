@extends('appshell::layouts.default')

@section('title')
    {{ __('Create new doctor') }}
@stop


@section('content')
    <div class="card card-accent-success">
        <div class="card-header">
            {{ __('New Doctor Data') }}
        </div>
        <div class="card-block">
            {!! Form::open(['url' => route('doctors.store')]) !!}
            @include('doctors._form')
            {!! Form::close() !!}
        </div>
        <div class="card-footer">
        </div>
    </div>
@endsection