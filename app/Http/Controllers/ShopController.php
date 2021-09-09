<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ShopController extends Controller {

    public function show_produtos(){
        return view('produtos');
    }

    public function show_produto($id){
        return view('produto');
    }

    public function show_finalizar_compra(){
        return view('finalizar_compra');
    }
}