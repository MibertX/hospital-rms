@extends('appshell::layouts.default')

@section('title')
    {{ __('Unpaid Orders') }}
@stop

@section('content')

    <div class="card card-accent-secondary">

        <div class="card-header">
            @yield('title')

            <div class="card-actionbar">
            </div>

            @include('filters._findby', ['filterFields' => $filterFields])
        </div>

        <div class="admin__user-list" id="findby__result-container">
            @include('patients._list', ['patients' => $patients])
        </div>
    </div>

@stop
