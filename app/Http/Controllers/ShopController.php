<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ShopController extends Controller {

    public function show_produtos(){
        $produtos = DB::select('select * from produtos');

        return view('produtos', ['produtos' => $produtos]);
    }

    public function show_produto($id){
        $produto = DB::select('select * from produtos where id =' . $id);

        return view('produto', ['produto' => $produto[0]]);
    }

    public function finalizar_compra(Request $form){
        $id = $form -> id; 

        $produto = DB::select('select * from produtos where id =' . $id);

        if(!$produto || $produto[0]->estoque < 1){
            return redirect()->route('shop.produto', ['id' => $id])->with('error', 'Não há estoque diponível para o produto');
        }

        DB::insert('insert into compras (data_compra, valor, quantidade, metodo_pagamento) values(?, ?, ?, ?)', array(now(), $produto[0]->valor, 1, 0));
        DB::update('update produtos set estoque = ' . $produto[0]->estoque - 1 . ' where id = ?', [$id]);

        return redirect()->route('shop.produtos');
    }
}