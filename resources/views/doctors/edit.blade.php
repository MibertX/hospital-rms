@extends('appshell::layouts.default')

@section('title')
    {{ __('Edit Doctor') }}
@stop


@section('content')
    <div class="card card-accent-success">
        <div class="card-header">
            {{ __('Edit "' . $doctor->name . '" department data') }}
        </div>
        <div class="card-block">
            {!! Form::model($doctor, ['route' => ['doctors.update', $doctor]]) !!}
                @include('doctors._form')
            {!! Form::close() !!}
        </div>
        <div class="card-footer">
            @can('delete doctors')
                {!! Form::open(['route' => ['doctors.destroy', $doctor], 'method' => 'DELETE', 'class' => "float-right"]) !!}
                <button class="btn btn-outline-danger">
                    {{ __('Delete doctor') }}
                </button>
                {!! Form::close() !!}
            @endcan
        </div>
    </div>
@endsection