@extends('appshell::layouts.default')

@section('title')
    {{ __('Viewing patient :name', ['name' => $patient->name]) }}
@stop

@section('content')

    @include('patients.show._cards')

    @include('patients.show._actions')

    @include('patients.show._patient_details')

    @include('patients.show._doctors')

    @include('patients.show._actions')
@stop