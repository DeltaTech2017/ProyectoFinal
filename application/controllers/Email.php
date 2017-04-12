<?php

  /**
   *
   */

   defined('BASEPATH') OR exit('No direct script access allowed');

  class Email extends CI_Controller
  {

    public function __construct()
    {
      parent::__construct();
    }

    function index()
    {
      $this->load->view('olvidoclave');

      if (isset($_POST['email2'])) {
  # code...
  $sql="select * from usuarios where correo = ?";
  $CI =& get_instance();
  $correo=$_POST['email2'];

  $rs=$CI->db->query($sql, array($correo));
  $rs=$rs->result();
  if(count($rs)>0){

$usuario=$rs[0];
$clave=$usuario->clave;

    $config=Array(
      'protocol'=>'smtp',
      'smtp_host'=> 'ssl://smtp.googlemail.com',
      'smtp_port'=>465,
      'smtp_user'=>'delta.tech0023@gmail.com',
      'smtp_pass'=>'deltatech23'

    );


    $this->load->library('email', $config);
    $this->email->set_newline("\r\n");

    $this->email->from('delta.tech0023@gmail.com', 'Delta Tech Team');
    $this->email->to($correo);
    $this->email->subject('Su clave es');
    $this->email->message($clave);
    if ($this->email->send()) {
      # code...
      echo"<script>alert('Correo de recuperacion enviado');</script>";
      unset($_POST['email2']);
    }else{
      show_error($this->email->print_debugger());
    }


  }else{
    echo "<script>alert('Este correo no esta registrado');</script>";
  }





    }
}
  }


 ?>
