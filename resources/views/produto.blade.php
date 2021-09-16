@extends('templates.defaultUser')
@section('content')
<form style='padding: 10px; margin: 10px; text-align: center' method="post"
    action="/proj-dev-sistemas/public/finalizar_compra/<?php echo $produto->id ?>">
    @csrf
    <h5 class="card-title">{{ $produto->titulo }}</h5>
    <p class="card-text">{{ $produto->descricao }}</p>
    <p class="card-text">R$ {{ $produto->valor }}</p>
    <p class="card-text">Estoque: {{ $produto->estoque }}</p>
    <input style='display: none' name='id' value='<?php echo $produto->id ?>' />

    @if (session('error'))
    <div style='color: red'>*{{ session('error') }}</div>
    @endif


    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Comprar
    </button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pagamento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>1 - Pague o valor de <b>R$ {{ $produto->valor }}</b> para o PIX do QRcode abaixo</p>

                <img style='width: 50%' src='/proj-dev-sistemas/resources/images/chave pix.png' alt='Código PIX' />

                <p>Ou utilizando a chave: <b>24fc5a45-34fc-4632-9c6e-1bd2a688acce</b></p>
                <p>2 - Após o pagamento ser confirmado clique em finalizar compra</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type='submit' class="btn btn-primary">Finalizar Comprar</button>
            </div>
        </div>
    </div>
</div>


</form>

<form method="post" action="/proj-dev-sistemas/public/calcular_cep">
    @csrf

    @if (session('calculo_cep'))
        <div style='text-align: center; color: blue'>{{ session('calculo_cep') }}</div>
    @endif

    <div class='row'>
        <div class='col-5'></div>
        
        <div class='col-2'>
            Informe o cep (sem - )
            <input name='cep' class='form-control' />
        </div>

        <input style='display: none' name='id' value='<?php echo $produto->id ?>' />

        <div class='col-1 mt-4'>
            <button class='btn btn-primary'>Consultar</button>
        </div>
    </div>
</form>


<!-- Button trigger modal -->


</form>

@stop