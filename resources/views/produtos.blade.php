@extends('templates.defaultUser')
@section('content')
<div class='card-container'>

    @foreach ($produtos as $produto)
    <div class="card" style="width: 15rem;">
        <div class="card-body">
            <h5 class="card-title">{{ $produto->titulo }}</h5>
            <p class="card-text">{{ $produto->descricao }}</p>
            <p class="card-text">Preço: {{ $produto->valor }}</p>
            <p class="card-text">Estoque: {{ $produto->estoque }}</p>

            <a href="/proj-dev-sistemas/public/acesso/produto/<?php echo $produto->id ?>" class="btn btn-primary" style='display: block'>Comprar</a>
        </div>
    </div>
    @endforeach  
    
</div>
    
@stop