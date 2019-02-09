@can('view patient`s doctors')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Doctors') }}
                </div>

                <div class="card-block">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>{{__('Name')}}</th>
                            <th>{{__('Department')}}</th>
                            <th>{{__('Phone') }}</th>
                            <th>{{__('Email') }}</th>
                            <th>{{__('First Visit at')}}</th>
                            <th>{{__('Last Visit at')}}</th>
                        </tr>
                        </thead>
                        @foreach($patient->doctors as $doctor)
                            <tr>
                                <td>
                                    @can('view doctors')
                                        {{$doctor->name}}
                                    @else
                                        {{$doctor->name}}
                                    @endcan
                                </td>
                                <td>{{$doctor->department->name}}</td>
                                <td>{{$doctor->phone}}</td>
                                <td>{{$doctor->email}}</td>
                                <td>{{$doctor->pivot->first_visit_at}}</td>
                                <td>{{$doctor->pivot->last_visit_at}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endcan