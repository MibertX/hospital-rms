<div class="card">
    <div class="card-block">
        @can('edit doctors')
            <div class="dropdown float-left">
                <a class="btn btn-outline-info dropdown-toggle" href="#" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false"
                   id="account-dropdown-link">
                    {{ __('Update status') }}
                </a>
                <div class="dropdown-menu">
                    @foreach($statuses as $value => $label)
                        <a class="dropdown-item" href="#"
                           @if ($doctor->status->value() == $value)
                           style="pointer-events: none; color: silver"
                           @else
                           onclick="event.preventDefault(); submitDoctorUpdate('{{$value}}');"
                           @endif
                        >{{ $label }}</a>
                    @endforeach

                    {!! Form::model($doctor, [
                        'route'  => ['doctors.status.update', $doctor],
                        'method' => 'post',
                        'id'     => 'doctor-update-form',
                        'style'  => 'display: none;'
                    ]) !!}
                    {{ Form::hidden('status', $doctor->status->value(), ['id' => 'doctor_status_field']) }}

                    {!! Form::close() !!}

                </div>
            </div>
            <script>
                function submitDoctorUpdate(status) {
                    document.getElementById('doctor_status_field').setAttribute('value', status);
                    document.getElementById('doctor-update-form').submit();
                }
            </script>
        @endcan

        @can('delete doctors')
            {!! Form::open(['route' => ['doctors.destroy', $doctor], 'method' => 'DELETE', 'class' => "float-right"]) !!}
            <button class="btn btn-outline-danger">
                {{ __('Delete Doctor') }}
            </button>
            {!! Form::close() !!}
        @endcan

        @can('edit doctors')
                <a href="{{route('doctors.edit', ['doctor' => $doctor])}}"
                   class="btn btn-outline-info float-right" style="margin-right: 20px">{{ __('Edit') }}</a>
        @endcan
    </div>
</div>
