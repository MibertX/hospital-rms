@extends('appshell::layouts.default')

@section('title')
    {{ __('Departments') }}
@stop

@section('content')
    <div class="card card-accent-secondary">
        <div class="card-header">
            @yield('title')
            <div class="card-actionbar">
                <a href="{{ route('departments.create') }}" class="btn btn-sm btn-outline-success float-right">
                    <i class="zmdi zmdi-plus"></i>
                    {{ __('New Department') }}
                </a>
            </div>
        </div>

        <div class="card-block">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Housing') }}</th>
                    <th style="width: 10%"></th>
                </tr>
                </thead>

                <tbody>
                @foreach($departments as $department)
                    <tr>
                        <td>{{$department->name}}</td>
                        <td>Корпус {{$department->housing}}</td>
                        <td>
                            @can('edit users')
                                <a href="{{ route('departments.edit', $department) }}"
                                   class="btn btn-xs btn-outline-primary btn-show-on-tr-hover float-right">{{ __('Edit') }}</a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

