@extends('layouts.master')
@section('content')
    <center><h1 class="title">{{$title}}</h1></center>
    <hr/>
    <div class="row">
        @if(isset($uneInteraction))
            <div class="well col-md-12">
                <div class="form-horizontal">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nom : </label>
                            <div class="col-md-6  col-md-3">
                                <input type="text" name="login" class="form-control" value="{{$uneInteraction->nom_commercial}}" readonly>
                            </div>
                        </div>

                    <a class="btn btn-default btn-primary"   href="{{ url()->previous() }}">
                        <span class="glyphicon glyphicon-home"></span> Retour </a></center>
            </div>
    </div>
    @endif
@stop