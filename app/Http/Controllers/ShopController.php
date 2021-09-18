<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Correios;


class ShopController extends Controller {

    public function show_produtos(){
        $produtos = DB::select('select * from produtos order by id');

        return view('produtos', ['produtos' => $produtos]);
    }

    public function show_produto($id){
        $produto = DB::select('select * from produtos where id =' . $id);

        return view('produto', ['produto' => $produto[0]]);
    }

    public function finalizar_compra(Request $form){
        $id = $form -> id; 

        if(!$id){
            return redirect()->route('shop.produtos');
        }

        $produto = DB::select('select * from produtos where id =' . $id);

        if(!$produto || $produto[0]->estoque < 1){
            return redirect()->route('shop.produto', ['id' => $id])->with('error', 'Não há estoque diponível para o produto');
        }

        $id_user = $form->session()->get('usuario')->id;

        DB::insert('insert into compras (data_compra, valor, quantidade, metodo_pagamento, id_user) values(?, ?, ?, ?, ?)', array(now(), $produto[0]->valor, 1, 0, $id_user));
        DB::update('update produtos set estoque = ' . $produto[0]->estoque - 1 . ' where id = ?', [$id]);

        return redirect()->route('shop.produtos');
    }

    public function calcular_cep(Request $form){
        $id = $form->id;
        $cep = $form->cep;
        
        if(!$cep || strlen($cep) < 8) {
            return redirect('/acesso/produto/'. $id)->with('error', 'cep inválido');
        }

        $dados = [
            'tipo'              => 'sedex', // Separar opções por vírgula (,) caso queira consultar mais de um (1) serviço. > Opções: `sedex`, `sedex_a_cobrar`, `sedex_10`, `sedex_hoje`, `pac`, 'pac_contrato', 'sedex_contrato' , 'esedex'
            'formato'           => 'caixa', // opções: `caixa`, `rolo`, `envelope`
            'cep_destino'       => $cep, // Obrigatório
            'cep_origem'        => '95185000', // Obrigatorio
            //'empresa'         => '', // Código da empresa junto aos correios, não obrigatório.
            //'senha'           => '', // Senha da empresa junto aos correios, não obrigatório.
            'peso'              => '1', // Peso em kilos
            'comprimento'       => '16', // Em centímetros
            'altura'            => '11', // Em centímetros
            'largura'           => '11', // Em centímetros
            'diametro'          => '0', // Em centímetros, no caso de rolo
            // 'mao_propria'       => '1', // Náo obrigatórios
            // 'valor_declarado'   => '1', // Náo obrigatórios
            // 'aviso_recebimento' => '1', // Náo obrigatórios
        ];

        $retorno = Correios::frete($dados);   
        $endereco = Correios::cep($cep);

        if(!isset($endereco['cidade'])){
            return redirect('/acesso/produto/'. $id)->with('error', 'cep não encontrado');
        }

        return redirect('/acesso/produto/'. $id)
            ->with(['calculo_cep' => 'Frete para ' . $endereco['cidade'] . ' - ' . $endereco['uf'] . ' no valor de R$' . $retorno[0]['valor'] . ' com prazo de entrega de ' . $retorno[0]['prazo'] . ' dias',
                    'valor_cep' =>  $retorno[0]['valor']]);
    }
}