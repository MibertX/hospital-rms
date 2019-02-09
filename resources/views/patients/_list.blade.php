<div class="card-block">
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>{{ __('Name') }}</th>
            <th>{{ __('Gender') }}</th>
            <th>{{ __('Status') }}</th>
            <th>{{ __('Age') }}</th>
            <th>{{ __('Phone') }}</th>
            <th>{{ __('Email') }}</th>
            <th style="width: 10%">&nbsp;</th>
        </tr>
        </thead>

        <tbody>
        @foreach($patients as $patient)
            <tr>
                <td>
                    @can('view patients')
                        <a href="{{route('patients.show', ['patient' => $patient])}}">{{$patient->name}}</a>
                    @else
                        {{$patient->name}}
                    @endcan
                </td>
                <td>{{$patient->gender}}</td>
                <td>{{$patient->status}}</td>
                <td>{{$patient->age}}</td>
                <td>{{$patient->phone}}</td>
                <td>{{$patient->email}}</td>
                <td>
                    @can('view patients')
                        <a href="{{route('patients.show', ['patient' => $patient])}}"
                           class="btn btn-xs btn-outline-primary btn-show-on-tr-hover float-right">{{ __('Show') }}</a>
                    @endcan
                    @can('edit patients')
                        <a href="{{route('patients.edit', ['patient' => $patient])}}"
                           class="btn btn-xs btn-outline-primary btn-show-on-tr-hover float-right">{{ __('Edit') }}</a>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>
    <hr>
    {{ $patients->links() }}
</div>