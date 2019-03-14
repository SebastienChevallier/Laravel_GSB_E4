@extends('layouts.master')
@section('content')
    @if(isset($erreur))
        <div class="alert-danger" role="alert">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <p> Voici l'erreur : {{ $erreur }}</p>
        </div>
    @endif
    @if(isset($success))
        <div class="alert-success" role="alert">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <p>{{ $success }}</p>
        </div>
    @endif
@stop