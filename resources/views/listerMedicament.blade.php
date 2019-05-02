@extends('layouts.master')
@section('content')
    <div class="container" style="width:100%;">
        <div class="col-md-12">
            <div class="blanc">
                <h1>{{$title}}</h1>
            </div>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
            </form>

            <form class="form-inline my-2 my-lg-0">
                <select name="famille" id="famille" class="custom-select">
                    @foreach($mesFamilles as $uneFamille)
                        <option selected=""  value="{{$uneFamille->id_famille}}">{{$uneFamille->lib_famille}}</option>
                    @endforeach
                </select>
                <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
            </form>
                <table class="table table-hover" style="width:100%;font-size: 15px">
                    <thead>
                    <tr>
                        <th scope="col">Medicament</th>
                        <th scope="col">prix echantillon</th>
                        <th scope="col">Famille</th>
                        <th scope="col">Interactions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($mesMedicaments as $unMedicament)
                    <tr>
                        <th scope="row">{{$unMedicament->nom_commercial}}</th>
                        <td>{{$unMedicament->prix_echantillon}}</td>
                        <td>{{$unMedicament->lib_famille}}</td>
                        <td><div class="btn btn-outline-warning" onclick="javascript: window.location ='{{ url('/listerInteraction')}}/{{$unMedicament->id_medicament}}';"><i class="fas fa-eye"></i> Interactions</div></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
        </div>
    </div>
@stop
