<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Obtém a URL atual
$current_url = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
$current_url .= "://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

$mode = "production";

// $config['protocol'] = 'smtp'; // Protocolo de envio de e-mail
// $config['smtp_host'] = 'smtp.example.com'; // Endereço do servidor SMTP
// $config['smtp_port'] = '587'; // Porta SMTP (normalmente 587 ou 25)
// $config['smtp_user'] = 'seu_email@example.com'; // Endereço de e-mail do remetente
// $config['smtp_pass'] = 'sua_senha'; // Senha do e-mail do remetente
// $config['mailtype'] = 'html'; // Tipo de e-mail (html, text, etc.)
// $config['charset'] = 'utf-8'; // Conjunto de caracteres
// $config['newline'] = "\r\n"; // Nova linha

// $config['from_name'] = 'Seu Nome'; // Nome do remetente padrão
// $config['from_email'] = 'seu_email@example.com'; // Endereço de e-mail do remetente padrão
// $config['subject_prefix'] = ''; // Prefixo para assuntos de e-mail (opcional)

// Nome do remetente padrão
$config['from_name'] = 'Familia Airstage';

// Endereço de e-mail do remetente padrão
if($mode != "production") :
	$config['from_email'] = 'gerson@w5.com.br';
else :
	$config['from_email'] = 'contato@familiafujitsu.com.br';
endif;

// Prefixo para assuntos de e-mail (opcional)
if (strpos($current_url, 'cadastrar') !== false) :
	$config['subject_prefix'] = 'Nova obra cadastrada';
elseif (strpos($current_url, 'editar') !== false) :
	$config['subject_prefix'] = 'Obra atualizada';
elseif (strpos($current_url, 'excluir') !== false) :
	$config['subject_prefix'] = 'Obra excluída';
else :
	$config['subject_prefix'] = 'Teste';
endif;