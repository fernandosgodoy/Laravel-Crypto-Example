<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Input;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Validator;

class CryptoExampleController extends Controller
{
    
    public function __construct() {
    }

    public function Index(){
        return view('crypto');
    }

    public function Criptografar(Request $request){
        $rules = array(
            'txtPalavra' => 'required',
        );

        $validator = Validator::make(Input::all() , $rules);

        if ($validator->fails()) {
            return Redirect::to('criptografia')->withErrors($validator)
                ->withInput(); 
        }
        else  {
            $resultado = "";
            $palavra = Input::get('txtPalavra');
            $resultado = Crypt::encryptString($palavra);
            return view('crypto', compact('resultado'));
        }

    }

    public function Descriptografar(Request $request){
        $rules = array(
            'txtHash' => 'required',
        );

        $validator = Validator::make(Input::all() , $rules);

        if ($validator->fails()) {
            return Redirect::to('criptografia')->withErrors($validator)
                ->withInput(); 
        }
        else  {
            $decrResult = "";
            $palavra = Input::get('txtHash');
            try {
                $decrResult = Crypt::decryptString($palavra);
            } catch (DecryptException $e) {
                $decrResult = $e;
            }
           
            return view('crypto', compact('decrResult'));
        }

    }

}
