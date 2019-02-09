@can('view doctor`s patients')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Patients') }}
                </div>

                <div class="card-block">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>{{__('Name')}}</th>
                            <th>{{ __('Status') }}</th>
                            <th>{{ __('Phone') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Age') }}</th>
                            <th>{{__('First Visit at')}}</th>
                            <th>{{__('Last Visit at')}}</th>
                        </tr>
                        </thead>
                        @foreach($doctor->patients as $patient)
                            <tr>
                                <td>
                                    @can('view patients')
                                        {{$patient->name}}
                                    @else
                                        {{$patient->name}}
                                    @endcan
                                </td>
                                <td>{{$patient->status}}</td>
                                <td>{{$patient->age}}</td>
                                <td>{{$patient->phone}}</td>
                                <td>{{$patient->email}}</td>
                                <td>{{$patient->pivot->first_visit_at}}</td>
                                <td>{{$patient->pivot->last_visit_at}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endcan