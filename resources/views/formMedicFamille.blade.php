@extends('layouts.master')
@section('content')
    {!! Form::open(['url' => 'rechercheParFamille']) !!}
    <div class="container" style="width:100%;">
        <div class="col-md-12">
            <form class="form-inline my-2 my-lg-0">

                <select name="famille" id="famille" class="custom-select">
                    @foreach($mesFamilles as $uneFamille)
                        <option selected=""  value="{{$uneFamille->id_famille}}">{{$uneFamille->lib_famille}}</option>
                    @endforeach
                </select>
                <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        </div>
    </div>
    {!! Form::close() !!}
@stop
