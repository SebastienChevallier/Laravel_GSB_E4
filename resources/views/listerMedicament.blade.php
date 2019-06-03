@extends('layouts.master')
@section('content')
    <div class="container" style="width:100%;">
        <div class="col-md-12">
            <div class="blanc">
                <h1>{{$title}}</h1>
            </div>

            <button type="button" class="btn btn-outline-success">
                <a class="nav-link" href="{{ url('/getMedicamentsParNom') }}" style="font-size: 25px;color : green;">Recherche par nom </a>
            </button>

            <button type="button" class="btn btn-outline-success">
                <a class="nav-link" href="{{ url('/getMedicamentsParFamille') }}" style="font-size: 25px;color : green;">Recherche par familles</a>
            </button>
                <table class="table table-hover" style="width:100%;font-size: 15px">
                    <thead>
                    <tr>
                        <th scope="col">Medicament</th>
                        <th scope="col">prix echantillon</th>
                        <th scope="col">Interactions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($mesMedicaments as $unMedicament)
                    <tr>
                        <th scope="row">{{$unMedicament->nom_commercial}}</th>
                        <td>{{$unMedicament->prix_echantillon}}</td>
                        <td><div class="btn btn-outline-warning" onclick="javascript: window.location ='{{ url('/listerInteraction')}}/{{$unMedicament->id_medicament}}';"><i class="fas fa-eye"></i> Interactions</div></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
        </div>
    </div>
@stop
