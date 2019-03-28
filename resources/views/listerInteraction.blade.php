@extends('layouts.master')
@section('content')
    <div class="container" style="width:100%;">
        <div class="col-md-12">
            <div class="blanc">
                <h1>{{$title}}</h1>
            </div>
            @if(isset($lesInteractions) && $lesInteractions->count() !==  0)
                <table class="table table-hover" style="width:100%;font-size: 15px">
                    <thead>
                    <tr>
                        <th scope="col">Medicament</th>
                        <th scope="col">contre indication</th>
                        <th scope="col">Modifier</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($lesInteractions as $uneInteraction)
                        <tr>
                            <th scope="row">{{$uneInteraction->nom_commercial}}</th>
                            <td>{{$uneInteraction->contre_indication}}</td>
                            <td><div class="btn btn-outline-success" onclick="javascript: window.location ='{{ url('/modifInteraction')}}/{{$uneInteraction->id_medicament}}/{{$uneInteraction->med_id_medicament}}';"><i class="fas fa-plus-circle"></i> modifier</div></td>
                            <td><div class="btn btn-outline-danger" onclick="javascript: window.location ='{{ url('/supprInteraction')}}/{{$uneInteraction->id_medicament}}/{{$uneInteraction->med_id_medicament}}';"><i class="far fa-trash-alt"></i> supprimer</div></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h1>Aucune interactions</h1>
            @endif
        </div>
    </div>
@stop
