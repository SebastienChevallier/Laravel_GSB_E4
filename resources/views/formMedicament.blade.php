@extends('layouts.master')
@section('content')
    <center><h1 class="title">{{$title}}</h1></center>
    <hr/>
    <div class="row">
        @if(isset($unMedicament))
            <div class="well col-md-12">
                <div class="form-horizontal">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nom : </label>
                            <div class="col-md-6  col-md-3">
                                <input type="text" name="login" class="form-control" value="{{$unMedicament->nom_commercial}}" readonly>
                            </div>
                        </div>


                    <button type="submit" class="btn btn-default btn-success" onclick="javascript: window.location ='{{ url('/modifierMedicament')}}/{{$unMedicament->id_medicament}}';">
                        <span class="glyphicon glyphicon-ok"></span>
                        Modifier
                    </button>
                    <a class="btn btn-default btn-primary"   href="{{ url()->previous() }}">
                        <span class="glyphicon glyphicon-home"></span> Retour </a></center>
            </div>
    </div>
    @endif
@stop