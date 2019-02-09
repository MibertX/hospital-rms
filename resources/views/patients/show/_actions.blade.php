<div class="card">
    <div class="card-block">
        @can('edit patients')
            <div class="dropdown float-left">
                <a class="btn btn-outline-info dropdown-toggle" href="#" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false"
                   id="account-dropdown-link">
                    {{ __('Update status') }}
                </a>
                <div class="dropdown-menu">
                    @foreach($statuses as $value => $label)
                        <a class="dropdown-item" href="#"
                           @if ($patient->status->value() == $value)
                           style="pointer-events: none; color: silver"
                           @else
                           onclick="event.preventDefault(); submitPatientUpdate('{{$value}}');"
                           @endif
                        >{{ $label }}</a>
                    @endforeach

                    {!! Form::model($patient, [
                        'route'  => ['patients.status.update', $patient],
                        'method' => 'post',
                        'id'     => 'doctor-update-form',
                        'style'  => 'display: none;'
                    ]) !!}
                    {{ Form::hidden('status', $patient->status->value(), ['id' => 'doctor_status_field']) }}

                    {!! Form::close() !!}

                </div>
            </div>
            <script>
                function submitPatientUpdate(status) {
                    document.getElementById('doctor_status_field').setAttribute('value', status);
                    document.getElementById('doctor-update-form').submit();
                }
            </script>
        @endcan

        @can('delete patients')
            {!! Form::open(['route' => ['patients.destroy', $patient], 'method' => 'DELETE', 'class' => "float-right"]) !!}
            <button class="btn btn-outline-danger">
                {{ __('Delete Patient') }}
            </button>
            {!! Form::close() !!}
        @endcan

        @can('edit patients')
                <a href="{{route('patients.edit', ['patient' => $patient])}}"
                   class="btn btn-outline-info float-right" style="margin-right: 20px">{{ __('Edit') }}</a>
        @endcan
    </div>
</div>
