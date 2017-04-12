<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller{
  public function __construct()
  {

    parent:: __construct();

  }
  function index()
  {
$this->load->view('inicio');



  }
function buscar(){
$this->load->view('buscar');


}

function micuenta2(){
$this->load->view('micuenta2');


}

function editar_perfil(){

  $this->load->view('editar_perfil');
}


function admin(){

  $this->load->view('admin');
}

function admin_usuarios(){

  $this->load->view('admin_usuarios');
}

function admin_comentarios(){

  $this->load->view('admin_comentarios');
}

function loginadmin(){

  $this->load->view('loginadmin');
}
function editar_clave(){

  $this->load->view('editar_clave');
}
  function ver_anuncio(){

    $this->load->view('ver_anuncio');

  }



    function salir(){

    unset($_SESSION['user']);
    session_destroy();
    redirect('web/login');
    }

function publicar_anuncio(){
  $this->load->view('publicar_anuncio');
}

function buscar_color(){
  $this->load->view('buscar/color');

}

function buscar_tamanosc(){
  $this->load->view('buscar/tamanosc');
}

function buscar_marcas(){
  $this->load->view('buscar/marcas');
}

function editar_anuncio(){
  $this->load->view('editar_anuncio');
}

function buscar_precios(){
  $this->load->view('buscar/precios');
}

function buscar_tamanos(){
  $this->load->view('buscar/tamanos');
}

function buscar_tipos(){
  $this->load->view('buscar/tipos');
}


  function categorias(){
    $this->load->view('categorias');
  }

  function mi_cuenta(){
    $this->load->view('mi_cuenta');


  }
  function mi_perfil(){
    $this->load->view('mi_perfil');


  }



  function login(){
    $this->load->view('login');


  }



  function anuncio($cod=0){
    if($cod==0){
      redirect('web');



    }
    $d=array();
  $d['cod']=$cod;
    $this->load->view('ver_anuncio',$d);

  }

  function nosotros(){
    $this->load->view('nosotros');
  }


}
