<?php
$uPath =	APPPATH.'/uploads/';
$dados = array('uPath'=> $uPath);

$this->load->view('frontend/includes/head');

if($view != ''){ $this->load->view('frontend/'.$view ); }
$this->load->view('frontend/includes/footer');