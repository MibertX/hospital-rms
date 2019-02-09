@extends('appshell::layouts.default')

@section('title')
    {{ __('Edit Patient') }}
@stop


@section('content')
    <div class="card card-accent-success">
        <div class="card-header">
            {{ __('Edit "' . $patient->name . '" data') }}
        </div>
        <div class="card-block">
            {!! Form::model($patient, ['route' => ['patients.update', $patient]]) !!}
                @include('patients._form')
            {!! Form::close() !!}
        </div>
        <div class="card-footer">
            @can('delete patients')
                {!! Form::open(['route' => ['patients.destroy', $patient], 'method' => 'DELETE', 'class' => "float-right"]) !!}
                <button class="btn btn-outline-danger">
                    {{ __('Delete patient') }}
                </button>
                {!! Form::close() !!}
            @endcan
        </div>
    </div>
@endsection