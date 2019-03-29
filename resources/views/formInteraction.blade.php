@extends('layouts.master')
@section('content')
    <?php var_dump($mesInteractions);?>
    <div class="container" style="width:100%;">
        <div class="col-md-5">
            <div class="blanc">
                <h1>Liste des medicaments</h1>
            </div>
            <table class="table table-hover" style="width:100%;font-size: 15px">
                <thead>
                <tr>
                    <th scope="col">Medicament</th>
                    <th scope="col">Interactions</th>
                    <th scope="col">Supprimer</th>
                </tr>
                </thead>
                <tbody>
                @foreach($mesInteractions as $uneInteraction)
                    <tr>
                        <th scope="row">{{$uneInteraction->nom_commercial}}</th>
                        <td><div class="btn btn-outline-success" onclick="javascript: window.location ='{{ url('/formInteraction')}}/{{$unMedicament->id_medicament}}';"><i class="fas fa-plus-circle"></i> modifier</div></td>
                        <td><div class="btn btn-outline-danger" onclick="javascript: window.location ='{{ url('/supprMedic')}}/{{$unMedicament->id_medicament}}';"><i class="far fa-trash-alt"></i> supprimer</div></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop