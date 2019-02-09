@extends('appshell::layouts.default')

@section('title')
    {{ __('Patients') }}
@stop

@section('content')

    <div class="card card-accent-secondary">

        <div class="card-header">
            @yield('title')

            <div class="card-actionbar">
                @can('create patients')
                    <a href="{{ route('patients.create') }}" class="btn btn-sm btn-outline-success float-right">
                        <i class="zmdi zmdi-plus"></i>
                        {{ __('New Patient') }}
                    </a>
                @endcan
            </div>

            @include('filters._findby', ['filterFields' => $filterFields])
        </div>

        <div class="admin__user-list" id="findby__result-container">
            @include('patients._list', ['patients' => $patients])
        </div>
    </div>

@stop
