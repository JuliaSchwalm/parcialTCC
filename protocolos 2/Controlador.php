<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;

class Controlador extends Controller{

   public function index(){
      return view('index');
   }

   public function formLogin(){
    return view('cadastro-login');
    }

    public function preencheLogin(Request $request){
        $existeCPF = Login::where('cpf-cnpj', $request->input('cpfCnpj')) -> exists();

        if($existeCPF){
            echo "<script>alert('CPF ou CNPJ já cadastrado!');</script>";
        } else {
        $db = new Login();
        Login::create([
            'cpf-cnpj' => $request->input('cpfCnpj'),
            'senha' => $request -> input ('senha'),
        ]);
         }
    return view('index');
    }


    public function validaLogin(Request $request){
        $existeCPF = Login::where('cpf-cnpj', $request->input('cpfCnpj')) -> exists();

        if($existeCPF){
            $usuario = Login::where('cpf-cnpj', $request -> input('cpfCnpj'))->first();
           if ($usuario && $request->input ('senha') === $usuario -> senha){
                return view ('pagina-inicial');
           } else{
            echo "<script>alert('Senha inválida!');</script>";
           }
        }
         else {
        echo "<script>alert('CPF ou CNPJ não cadastrado!');</script>";
         }
    return view('index');

    }
}


