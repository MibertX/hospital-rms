
<div class="row">
    <div class="form-group col-12 col-md-8{{ $errors->has('user.name') ? ' has-danger' : '' }}">
        {!! Form::label('user[name]', 'Name') !!}
        <div class="input-group">
        <span class="input-group-addon">
            <i class="zmdi zmdi-layers"></i>
        </span>
            {{ Form::text('user[name]', null, ['class' => 'form-control form-control-lg', 'placeholder' => __('Name')]) }}
        </div>
        @if ($errors->has('user.name'))
            <div class="error-help-block error text-danger">{{ $errors->first('user.name') }}</div>
        @endif
    </div>

    <div class="form-group col-12 col-md-4{{ $errors->has('user.gender') ? ' has-danger' : '' }}">
        <label>{{ __('Gender') }}</label>
        <div class="col-md-10">
            @php($currentGender = isset($doctor) ? $doctor->gender->value() : 'male')
            @foreach($genders as $key => $value)
                <label class="radio-inline" for="type_{{ $key }}">
                    <input type="radio" value="{{$key}}" id="gender_{{$key}}" {{$key == $currentGender ? 'checked' : ''}}>
                    {{ $value }}
                    &nbsp;
                </label>
            @endforeach

            @if ($errors->has('user.gender'))
                <div class="form-control-feedback">{{ $errors->first('user.gender') }}</div>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-12 col-md-6 {{ $errors->has('user.email') ? ' has-danger' : '' }}">
        {!! Form::label('user[email]', 'Email') !!}
        <div class="input-group">
        <span class="input-group-addon">
            <i class="zmdi zmdi-layers"></i>
        </span>
            {{ Form::text('user[email]', null, ['class' => 'form-control form-control-lg', 'placeholder' => __('Email')]) }}
        </div>
        @if ($errors->has('user.email'))
            <div class="error-help-block error text-danger">{{ $errors->first('user.email') }}</div>
        @endif
    </div>

    <div class="form-group col-12 col-md-6 {{ $errors->has('user.phone') ? ' has-danger' : '' }}">
        {!! Form::label('user[phone]', 'Phone') !!}
        <div class="input-group">
        <span class="input-group-addon">
            <i class="zmdi zmdi-layers"></i>
        </span>
            {{ Form::text('user[phone]', null, ['class' => 'form-control form-control-lg', 'placeholder' => __('Phone')]) }}
        </div>
        @if ($errors->has('user.phone'))
            <div class="error-help-block error text-danger">{{ $errors->first('user.phone') }}</div>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('user.address') ? ' has-danger' : '' }}">
    {!! Form::label('user[address]', 'Address') !!}
    <div class="input-group">
        <span class="input-group-addon">
            <i class="zmdi zmdi-layers"></i>
        </span>
        {{ Form::text('user[address]', null, ['class' => 'form-control form-control-lg', 'placeholder' => __('Address')]) }}
    </div>
    @if ($errors->has('user.address'))
        <div class="error-help-block error text-danger">{{ $errors->first('user.address') }}</div>
    @endif
</div>

<div class="row">
    <div class="form-group col-12 col-md-6 {{$errors->has('user.birthday') ? ' has-error':''}}">
        {!! Form::label('user[birthday]', 'Birthday') !!}
        <div class="input-group">
        <span class="input-group-addon">
            <i class="zmdi zmdi-calendar-note"></i>
        </span>
            {!! Form::text('user[birthday]', null, ['class' => 'form-control birthday-datepicker']) !!}
        </div>
        @if ($errors->has('user.birthday')) <p class="error-help-block error text-danger">{{$errors->first('user.birthday')}}</p> @endif
    </div>

    <div class="form-group col-12 col-md-6 {{ $errors->has('department_id') ? ' has-danger' : '' }}">
        {!! Form::label('department_id', 'Department') !!}
        <div class="input-group">
            <span class="input-group-addon">
                <i class="zmdi zmdi-layers"></i>
            </span>
            @php($currentDepartmentId = isset($doctor) ? $doctor->department_id : false)
            <select name="department_id" class="form-control">
                <option value="">{{__('Select Department')}}</option>
                @foreach($departments as $department)
                    <option value="{{$department->id}}" {{$department->id == $currentDepartmentId ? 'selected' : ''}}>{{$department->name}}</option>
                @endforeach
            </select>
        </div>
        @if ($errors->has('department_id'))
            <div class="error-help-block error text-danger">{{ $errors->first('department_id') }}</div>
        @endif
    </div>
</div>

<div class="form-group">
    <button class="btn btn-success" type="submit">
        {{ __('Save') }}
    </button>
    <a href="#" onclick="history.back();" class="btn btn-link text-muted">{{ __('Cancel') }}</a>
</div>

@section('scripts')
    <script>
        $(document).ready(function(){
            $('.birthday-datepicker').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd'
            });
        });
    </script>
@endsection