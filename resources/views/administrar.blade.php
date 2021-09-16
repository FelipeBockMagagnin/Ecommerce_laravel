@extends('templates.defaultAdmin')
@section('content')
<div class='container mt-3 form-container ' style='padding-bottom: 50px' >

    
    <table class='table'>
        <thead class='table table-dark'>
            <tr>
                <th>Titulo</th>
                <th>Descrição</th>
                <th>Valor</th>
                <th>Estoque</th>
                <th colspan='2'></th>
            </tr>
        </thead>
        <tbody class='table table-string'>
        @foreach ($produtos as $produto)
            <tr>
                <th>{{ $produto->titulo }}</th>
                <th>{{ $produto->descricao }}</th>
                <th>R$ {{ $produto->valor }}</th>
                <th style='text-align: center'>{{ $produto->estoque }}</th>
                <th>
                    <a href="/proj-dev-sistemas/public/admin/delete_produto/<?php echo $produto->id ?>" style='display: block; color: black'><i class="fas fa-trash"></i></a>
                </th>
                <th>
                    <a href="/proj-dev-sistemas/public/admin/edit_produto/<?php echo $produto->id ?>" style='display: block; color: black'><i class="fas fa-edit"></i></a>
                </th>
            </tr>
            @endforeach  
        </tbody>        
    </table>    

    <button class='btn btn-primary' style='float: right'>Cadastrar Produto</button>
</div>
    
@stop