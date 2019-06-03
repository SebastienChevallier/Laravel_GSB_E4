@extends('layouts.master')
@section('content')
    {!! Form::open(['url' => 'rechercheParNom']) !!}
    <div class="container" style="width:100%;">
        <div class="col-md-12">
            <form class="form-inline my-2 my-lg-0">

                <select name="nom" id="nom" class="custom-select">
                    @foreach($mesMedicaments as $unMedic)
                        <option selected=""  value="{{$unMedic->id_medicament}}">{{$unMedic->nom_commercial}}</option>
                    @endforeach
                </select>
                <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        </div>
    </div>
    {!! Form::close() !!}
@stop