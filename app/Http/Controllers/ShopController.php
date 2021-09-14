<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;

class ShopController extends Controller {

    public function show_produtos(){
        $produtos = DB::select('select * from produtos');

        return view('produtos', ['produtos' => $produtos]);
    }

    public function show_produto($id){
        return view('produto');
    }

    public function show_finalizar_compra(){
        return view('finalizar_compra');
    }
}