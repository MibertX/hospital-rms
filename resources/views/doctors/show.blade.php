@extends('appshell::layouts.default')

@section('title')
    {{ __('Viewing doctor :name', ['name' => $doctor->name]) }}
@stop

@section('content')

    @include('doctors.show._cards')

    @include('doctors.show._actions')

    @include('doctors.show._doctor_details')

    @include('doctors.show._patients')

    @include('doctors.show._actions')
@stop