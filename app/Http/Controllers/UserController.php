<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class UserController extends Controller {

    public function show_login(){
        return view('login');
    }

    public function show_create(){
        return view('create');
    }

    public function show_transacoes(){
        $compras = DB::select('select * from compras order by id');

        return view('transacoes', ['compras' => $compras]);
    }

    public function create(Request $form){
        $email = $form -> email; 
        $senha = $form -> senha;
        $conf_senha = $form -> conf_senha;
        $nome = $form -> nome;
        $nascimento = $form -> nascimento;


        if(!$email || !$senha || !$conf_senha || !$nome || !$nascimento){
            return redirect()->route('user.show_create')->with('error', 'Preencha todos os campos');
        }

        if($senha != $conf_senha){
            return redirect()->route('user.show_create')->with('error', 'A senha e a confirmação devem ser iguais');
        }

        DB::insert('insert into users (nome, data_criacao, nascimento, email, senha, tipo) values (?, ?, ?, ?, ?, ?)', array($nome, 'now()', $nascimento, $email, $senha, 1));

        return redirect()->route('user.show_login')->with('info', 'Usuário criado com sucesso');
    }

    public function login(Request $form){
        $email = $form -> email; 
        $senha = $form -> senha;

        if(!$email || !$senha){
            return redirect()->route('user.show_login')->with('error', 'Preencha todos os campos');
        }

        $results = DB::select('select * from users where email = ? and senha = ? and tipo = ?', [$email, $senha, 1]);
                
        if(count($results) > 0){
            return redirect()->route('shop.produtos');
        } else {
            return redirect()->route('user.show_login')->with('error', 'Login inválido');
        }        
    }
}