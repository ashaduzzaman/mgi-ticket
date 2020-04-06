{{-- {{!! Form:open(['url' => '', 'class' => 'form-group']) !!}} --}}

<div class="required form-group {{ $errors->has('name') ? 'has-error': ''}}">
    {!! Form::label('name', 'Ticket Type', ['class' => 'col-xs-3 col-sm-3 control-label']) !!}
    
    {!! Form::text('name', null,['class' => 'form-control', 'placeholder' => 'Enter Ticket type', 'autocomplete' => 'off']) !!}
</div>

{{-- {{!! Form:close() !!}} --}}