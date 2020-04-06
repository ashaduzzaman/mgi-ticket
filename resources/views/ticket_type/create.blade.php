@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">Create Ticket Type</h3>
                </div>
                <div class="panel-body">
                    {!! Form::open(['url' => 'ticket-type', 'method' => 'post', 'class' => 'form-horizontal']) !!}
                        @include('ticket_type._form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection