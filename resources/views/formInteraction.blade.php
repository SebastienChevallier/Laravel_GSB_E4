@extends('layouts.master')
@section('content')
    <center><h1 class="title">{{$title}}</h1></center>
    <hr/>
    <div class="row">
            <div class="well col-md-12">
                @if(isset($uneInteraction))
                    {!! Form::open(['url' => 'addInteraction']) !!}
                <div class="form-horizontal">
                    <div class="col-md-8">
                            <div class="form-group">
                                <select name="medicament1" id="medicament1" class="custom-select">
                                    <option selected="" disabled="">Selectionner un medicament</option>
                                    @foreach($mesMedicaments as $unMedicament)
                                        <option value="{{$unMedicament->id_medicament}}">{{$unMedicament->id_medicament}}-{{$unMedicament->nom_commercial}}</option>
                                    @endforeach
                                </select>

                                <select name="medicament2" id="medicament2" class="custom-select">
                                    <option selected="" disabled="">Selectionner une interaction</option>
                                    @foreach($mesMedicaments as $unMedicament)
                                        <option value="{{$unMedicament->id_medicament}}">{{$unMedicament->id_medicament}}-{{$unMedicament->nom_commercial}}</option>
                                    @endforeach
                                </select>

                                <button type="submit" class="btn btn-default btn-success" onclick="javascript: window.location ='{{ url('/addInteraction')}}';">
                                    <span class="glyphicon glyphicon-ok"></span>
                                    Ajouter l'interaction
                                </button>

                                    <a class="btn btn-default btn-primary"   href="{{ url()->previous() }}">
                                        <span class="glyphicon glyphicon-home"></span> Retour </a></center>

                                @else
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Nom : </label>
                                        <div class="col-md-6  col-md-3">
                                            <input type="text" name="login" class="form-control" value="{{$unMedicament->nom_commercial}}" readonly>
                                        </div>
                                    </div>

                                    <select name="medicament2" id="medicament2" class="custom-select">
                                        <option selected="" disabled="">Selectionner une interaction</option>
                                        @foreach($mesMedicaments as $unMedicament)
                                            <option value="{{$unMedicament->id_medicament}}">{{$unMedicament->id_medicament}}-{{$unMedicament->nom_commercial}}</option>
                                        @endforeach
                                    </select>

                                @endif

                            </div>
                    </div>
                </div>
            </div>
    </div>
@stop