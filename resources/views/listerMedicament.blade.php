@extends('layouts.master')
@section('content')
    <div class="pagemedoc">
        <div class="col-md-5">
            <div class="blanc">
                <h1>Liste des medicaments</h1>
            </div>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Medicament</th>
                        <th scope="col">prix echantillon</th>
                        <th scope="col">Modifier</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                    </thead>
                    <tbody>

                            <tr class="table-active">
                                <th scope="row"></th>
                                <td>Column content</td>
                                <td>Column content</td>
                                <td>Column content</td>
                            </tr>

                    </tbody>
                </table>
        </div>
    </div>
@stop
