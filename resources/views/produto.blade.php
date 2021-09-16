@extends('templates.defaultUser')
@section('content')
<form style='padding: 10px; margin: 10px; text-align: center' method="post" action="/proj-dev-sistemas/public/finalizar_compra/<?php echo $produto->id ?>">
@csrf
            <h5 class="card-title">{{ $produto->titulo }}</h5>
            <p class="card-text">{{ $produto->descricao }}</p>
            <p class="card-text">R$ {{ $produto->valor }}</p>
            <p class="card-text">Estoque: {{ $produto->estoque }}</p>

            @if (session('error'))
                <div style='color: red'>*{{ session('error') }}</div>
            @endif

            <button type='submit' class="btn btn-primary">Comprar</button>
    
</form>
    
@stop