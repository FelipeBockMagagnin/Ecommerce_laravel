@extends('templates.default')
@section('content')
<form class='form-container' style='width: 50%'>
  <h4 style='text-align: center'>Login Usuário</h4>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Senha</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check" style='text-align: right'>
    <a href='/proj-dev-sistemas/public/create_user' >Criar conta</a>
  </div>
  <button type="submit" class="btn btn-primary" style='display: block; width: 100%'>Logar</button>
</form>
@stop