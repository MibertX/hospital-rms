<div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
    {!! Form::label('name', 'Name') !!}
    <div class="input-group">
        <span class="input-group-addon">
            <i class="zmdi zmdi-layers"></i>
        </span>
        {{ Form::text('name', null, ['class' => 'form-control form-control-lg', 'placeholder' => __('Department Name')]) }}
    </div>
    @if ($errors->has('name'))
        <div class="error-help-block error text-danger">{{ $errors->first('name') }}</div>
    @endif
</div>

<div class="form-group{{ $errors->has('housing') ? ' has-danger' : '' }}">
    {!! Form::label('housing', 'Housing') !!}
    <div class="input-group">
        <span class="input-group-addon">
            <i class="zmdi zmdi-layers"></i>
        </span>
        {{ Form::text('housing', null, ['class' => 'form-control form-control-lg', 'placeholder' => __('Department Housing')]) }}
    </div>
    @if ($errors->has('housing'))
        <div class="error-help-block error text-danger">{{ $errors->first('housing') }}</div>
    @endif
</div>

<div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
    {!! Form::label('address', 'Address') !!}
    <div class="input-group">
        <span class="input-group-addon">
            <i class="zmdi zmdi-layers"></i>
        </span>
        {{ Form::text('address', null, ['class' => 'form-control form-control-lg', 'placeholder' => __('Department Address')]) }}
    </div>
    @if ($errors->has('address'))
        <div class="error-help-block error text-danger">{{ $errors->first('address') }}</div>
    @endif
</div>

<hr>

<div class="form-group">
    <button class="btn btn-success" type="submit">
        {{ __('Save') }}
    </button>
    <a href="#" onclick="history.back();" class="btn btn-link text-muted">{{ __('Cancel') }}</a>
</div>