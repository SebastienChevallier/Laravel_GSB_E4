@extends('layouts.master')
@section('content')
    <div class="container" style="width:100%;">
        <div class="col-md-5">
            <div class="blanc">
                <h1>Liste des medicaments</h1>
            </div>
                <table class="table table-hover" style="width:100%;font-size: 15px">
                    <thead>
                    <tr>
                        <th scope="col">Medicament</th>
                        <th scope="col">prix echantillon</th>
                        <th scope="col">Famille</th>
                        <th scope="col">Modifier</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($mesMedicaments as $unMedicament)
                    <tr>
                        <th scope="row">{{$unMedicament->nom_commercial}}</th>
                        <td>{{$unMedicament->prix_echantillon}}</td>
                        <td>{{$unMedicament->lib_famille}}</td>
                        <td><div class="btn btn-outline-success" onclick="javascript: window.location ='{{ url('/modifMedic')}}/{{$unMedicament->id_medicament}}';"><i class="fas fa-plus-circle"></i> modifier</div></td>
                        <td><div class="btn btn-outline-danger" onclick="javascript: window.location ='{{ url('/supprMedic')}}/{{$unMedicament->id_medicament}}';"><i class="far fa-trash-alt"></i> supprimer</div></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
        </div>
    </div>
@stop
