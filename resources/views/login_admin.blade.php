@extends('templates.default')
@section('content')
<form class='form-container' style='width: 50%' method="post" action="{{ route('admin.login') }}">
  @csrf
  <h4 style='text-align: center'>Login Admin</h4>

  @if (session('info'))
    <div style='color: blue'>*{{ session('info') }}</div>
  @endif

  @if (session('error'))
    <div style='color: red'>*{{ session('error') }}</div>
  @endif

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" name='email' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Senha</label>
    <input type="password" name='senha' class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check" style='text-align: right'>
    <a href='/proj-dev-sistemas/public/create_admin' >Criar conta</a>
  </div>
  <button type="submit" class="btn btn-primary" style='display: block; width: 100%'>Logar</button>
</form>
@stop