@extends('appshell::layouts.default')

@section('title')
    {{ __('Doctors') }}
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
            @include('doctors._list', ['doctors' => $doctors])
        </div>
    </div>

@stop
