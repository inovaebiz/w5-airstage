<?php

$uPath =	'../uploads/';
$dados = array('uPath'=> $uPath);
$this->load->view('backend/includes/control-head');
if($view != ''){ $this->load->view('backend/'.$view, $dados); }
$this->load->view('backend/includes/control-footer');