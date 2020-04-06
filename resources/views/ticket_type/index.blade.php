@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-11" style="margin-bottom:10px;">
            <a href="{{ url('/ticket-type/create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New</a>
        </div>
        <div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info' ] as $message)
                @if(Session::has('alert-'. $message))
                    <p class="alert alert-{{ $message }}">{{ Session::get('alert-'. $message) }}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif 
            @endforeach
        </div>
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-info">
                <div class="panel-heading text-center">
                    <h3>Ticket Type List</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr class="success">
                                    <th>SL</th>
                                    <th>Ticket Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection