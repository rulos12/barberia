<?php
// producto.php
namespace App\Controllers;

use App\Models\ProductoM;

class Usuario extends BaseController
{
    public function index(): string
    {

        return  view ('usuario/login');
    }

    public function acceder (){

        $usuario = $_POST ('usuario');
        $pass = $_POST ('pass');

        $usuarioM = modelo('UsuarioM');
        $result = $usuarioM->valida($usuario,$pass);


        if(count($result)>0){
            
        }
    }
}