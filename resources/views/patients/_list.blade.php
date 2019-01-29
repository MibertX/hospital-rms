<div class="card-block">
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>{{ __('ID') }}</th>
            <th>{{ __('Name') }}</th>
            <th>{{ __('Gender') }}</th>
            <th>{{ __('Status') }}</th>
            <th>{{ __('Age') }}</th>
            <th>{{ __('Phone') }}</th>
            <th>{{ __('Email') }}</th>
            <th>{{ __('Address') }}</th>
            <th style="width: 10%">&nbsp;</th>
        </tr>
        </thead>

        <tbody>
        @foreach($patients as $patient)
            <tr>
                <td>{{$patient->id}}</td>
                <td>{{$patient->name}}</td>
                <td>{{$patient->gender}}</td>
                <td>{{$patient->status}}</td>
                <td>{{$patient->age}}</td>
                <td>{{$patient->phone}}</td>
                <td>{{$patient->email}}</td>
                <td>{{$patient->address}}</td>
                <td>
                    @can('edit orders')
                        <a href="#"
                           class="btn btn-xs btn-outline-primary btn-show-on-tr-hover float-right">{{ __('Show') }}</a>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>
    <hr>
    {{ $patients->links() }}
</div>