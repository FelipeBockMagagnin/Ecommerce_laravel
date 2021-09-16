@extends('templates.defaultUser')
@section('content')
<div class='form-container container mt-3'>

    <table class='table'>
        <thead class='table table-dark'>
            <tr>
                <th>Data</th>
                <th>Quantidade</th>
                <th>Valor</th>
                <th style='text-align: center'>Método de Pagamento</th>
            </tr>
        </thead>
        <tbody class='table table-string'>
        @foreach ($compras as $compra)
            <tr>
                <th >{{ $compra->data_compra }}</th>
                <th>{{ $compra->quantidade }}</th>
                <th>R$ {{ $compra->valor }}</th>
                <th style='text-align: center'>{{ $compra->metodo_pagamento == 1 ? 'Boleto' : 'Crédito' }}</th>
            </tr>
            @endforeach  
        </tbody>        
    </table>    
    
</div>
    
@stop