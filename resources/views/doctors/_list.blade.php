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
        @foreach($doctors as $doctor)
            <tr>
                <td>
                    @can('view doctors')
                        <a href="{{route('doctors.show', ['doctor' => $doctor])}}">{{$doctor->name}}</a>
                    @else
                        {{$doctor->name}}
                    @endcan
                </td>
                <td>{{$doctor->gender}}</td>
                <td>{{$doctor->status}}</td>
                <td>{{$doctor->age}}</td>
                <td>{{$doctor->phone}}</td>
                <td>{{$doctor->email}}</td>
                <td>
                    @can('view doctors')
                        <a href="{{route('doctors.show', ['doctor' => $doctor])}}"
                           class="btn btn-xs btn-outline-primary btn-show-on-tr-hover float-right">{{ __('Show') }}</a>
                    @endcan
                    @can('edit doctors')
                        <a href="{{route('doctors.edit', ['doctor' => $doctor])}}"
                           class="btn btn-xs btn-outline-primary btn-show-on-tr-hover float-right">{{ __('Edit') }}</a>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>
    <hr>
    {{ $doctors->links() }}
</div>