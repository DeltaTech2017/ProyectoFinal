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


    function salir(){

    unset($_SESSION['gale_user']);
    redirect('web/login');
    }

function publicar_anuncio(){
  $this->load->view('publicar_anuncio');
}

  function categorias(){
    $this->load->view('categorias');
  }

  function mi_cuenta(){
    $this->load->view('mi_cuenta');


  }

  function ver_anuncio(){
    $this->load->view('ver_anuncio');


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
