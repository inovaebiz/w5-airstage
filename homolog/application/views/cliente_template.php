<?php
$uPath =	APPPATH.'/uploads/';
$dados = array('uPath'=> $uPath);

$this->load->view('cliente/includes/cliente-head');


if($view != ''){ $this->load->view('cliente/'.$view, $dados); }
$this->load->view('cliente/includes/cliente-footer');