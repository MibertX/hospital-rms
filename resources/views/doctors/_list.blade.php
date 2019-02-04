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
        @foreach($doctors as $doctor)
            <tr>
                <td>{{$doctor->id}}</td>
                <td>{{$doctor->name}}</td>
                <td>{{$doctor->gender}}</td>
                <td>{{$doctor->status}}</td>
                <td>{{$doctor->age}}</td>
                <td>{{$doctor->phone}}</td>
                <td>{{$doctor->email}}</td>
                <td>{{$doctor->address}}</td>
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
    {{ $doctors->links() }}
</div>