<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Email_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function send($dados, $html, $cc = null, $isEmail = null)
	{
		// Load PHPMailer library
		$this->load->library('phpmailer_lib');

		// PHPMailer object
		$mail = $this->phpmailer_lib->load();

		// SMTP configuration
		$mail->isSMTP();
		$mail->Host        = 'webmail.familiafujitsu.com.br';
		$mail->SMTPAuth    = true;
		$mail->Username    = 'contato@familiafujitsu.com.br';
		$mail->Password    = 'Hxiz50@7';
		$mail->SMTPSecure  = false;
		$mail->SMTPAutoTLS = false;
		$mail->Port        = 587;
		$mail->CharSet     = 'UTF-8';
		// $mail->SMTPDebug   = 2;

		$mail->setFrom('contato@familiafujitsu.com.br', 'Familia Airstage');
		$mail->addReplyTo('contato@familiafujitsu.com.br', 'Familia Airstage');

		// Add a recipient
		if (!$cc) {
			$mail->addAddress($dados['email'], $dados['nome']);
		}

		// Add cc or bcc

		if ($cc) {
			foreach ($cc as $ee) :

				$addE = "";

				if ($isEmail) {
					$addE = $ee->cliente_email;
				} else {
					$addE = $ee->email;
				}

				$mail->addBCC($addE);

			endforeach;
		}

		// $mail->addBCC('bcc@example.com');

		// Email subject
		$mail->Subject = $dados['subject'];

		// Set email format to HTML
		$mail->isHTML(true);

		// Email body content
		$mail->Body = $html;

		// Send email
		if (!$mail->send()) {
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
		}
	}

	public function layout_email()
	{
		$msg = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		  <head>
		    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700" rel="stylesheet">
		    <title>Set up a new password for {{ product_name }}</title>
		    <!--
		    The style block is collapsed on page load to save you some scrolling.
		    Postmark automatically inlines all CSS properties for maximum email client
		    compatibility. You can just update styles here, and Postmark does the rest.
		    -->
		    <style type="text/css" rel="stylesheet" media="all">
		    /* Base ------------------------------ */

		    *:not(br):not(tr):not(html) {
		      font-family: "Montserrat", Arial;
		      box-sizing: border-box;
		    }

		    body {
		      width: 100% !important;
		      height: 100%;
		      margin: 0;
		      line-height: 1.4;
		      background-color: #F2F4F6;
		      color: #74787E;
		      -webkit-text-size-adjust: none;
		    }

		    p,
		    ul,
		    ol,
		    blockquote {
		      line-height: 1.4;
		      text-align: left;
		    }

		    a {
		      color: #3869D4;
		    }

		    a img {
		      border: none;
		    }

		    td {
		      word-break: break-word;
		    }
		    /* Layout ------------------------------ */

		    .email-wrapper {
		      width: 100%;
		      margin: 0;
		      padding: 0;
		      -premailer-width: 100%;
		      -premailer-cellpadding: 0;
		      -premailer-cellspacing: 0;
		      background-color: #F2F4F6;
		    }

		    .email-content {
		      width: 100%;
		      margin: 0;
		      padding: 0;
		      -premailer-width: 100%;
		      -premailer-cellpadding: 0;
		      -premailer-cellspacing: 0;
		    }
		    /* Masthead ----------------------- */

		    .email-masthead {
		      padding: 25px 0;
		      text-align: center;
		    }

		    .email-masthead_logo {
		      width: 94px;
		    }

		    .email-masthead_name {
		      font-size: 16px;
		      font-weight: bold;
		      color: #bbbfc3;
		      text-decoration: none;
		      text-shadow: 0 1px 0 white;
		    }
		    /* Body ------------------------------ */

		    .email-body {
		      width: 100%;
		      margin: 0;
		      padding: 0;
		      -premailer-width: 100%;
		      -premailer-cellpadding: 0;
		      -premailer-cellspacing: 0;
		      border-top: 1px solid #EDEFF2;
		      border-bottom: 1px solid #EDEFF2;
		      background-color: #FFFFFF;
		    }

		    .email-body_inner {
		      width: 570px;
		      margin: 0 auto;
		      padding: 0;
		      -premailer-width: 570px;
		      -premailer-cellpadding: 0;
		      -premailer-cellspacing: 0;
		      background-color: #FFFFFF;
		    }

		    .email-footer {
		      width: 570px;
		      margin: 0 auto;
		      padding: 0;
		      -premailer-width: 570px;
		      -premailer-cellpadding: 0;
		      -premailer-cellspacing: 0;
		      text-align: center;
		    }

		    .email-footer p {
		      color: #AEAEAE;
		    }

		    .body-action {
		      width: 100%;
		      margin: 30px auto;
		      padding: 0;
		      -premailer-width: 100%;
		      -premailer-cellpadding: 0;
		      -premailer-cellspacing: 0;
		      text-align: center;
		    }

		    .body-sub {
		      margin-top: 25px;
		      padding-top: 25px;
		      border-top: 1px solid #EDEFF2;
		    }

		    .content-cell {
		      padding: 35px;
		    }

		    .preheader {
		      display: none !important;
		      visibility: hidden;
		      mso-hide: all;
		      font-size: 1px;
		      line-height: 1px;
		      max-height: 0;
		      max-width: 0;
		      opacity: 0;
		      overflow: hidden;
		    }
		    /* Attribute list ------------------------------ */

		    .attributes {
		      margin: 0 0 21px;
		    }

		    .attributes_content {
		      background-color: #EDEFF2;
		      padding: 16px;
		    }

		    .attributes_item {
		      padding: 0;
		    }
		    /* Related Items ------------------------------ */

		    .related {
		      width: 100%;
		      margin: 0;
		      padding: 25px 0 0 0;
		      -premailer-width: 100%;
		      -premailer-cellpadding: 0;
		      -premailer-cellspacing: 0;
		    }

		    .related_item {
		      padding: 10px 0;
		      color: #74787E;
		      font-size: 15px;
		      line-height: 18px;
		    }

		    .related_item-title {
		      display: block;
		      margin: .5em 0 0;
		    }

		    .related_item-thumb {
		      display: block;
		      padding-bottom: 10px;
		    }

		    .related_heading {
		      border-top: 1px solid #EDEFF2;
		      text-align: center;
		      padding: 25px 0 10px;
		    }
		    /* Discount Code ------------------------------ */

		    .discount {
		      width: 100%;
		      margin: 0;
		      padding: 24px;
		      -premailer-width: 100%;
		      -premailer-cellpadding: 0;
		      -premailer-cellspacing: 0;
		      background-color: #EDEFF2;
		      border: 2px dashed #9BA2AB;
		    }

		    .discount_heading {
		      text-align: center;
		    }

		    .discount_body {
		      text-align: center;
		      font-size: 15px;
		    }
		    /* Social Icons ------------------------------ */

		    .social {
		      width: auto;
		    }

		    .social td {
		      padding: 0;
		      width: auto;
		    }

		    .social_icon {
		      height: 20px;
		      margin: 0 8px 10px 8px;
		      padding: 0;
		    }
		    /* Data table ------------------------------ */

		    .purchase {
		      width: 100%;
		      margin: 0;
		      padding: 35px 0;
		      -premailer-width: 100%;
		      -premailer-cellpadding: 0;
		      -premailer-cellspacing: 0;
		    }

		    .purchase_content {
		      width: 100%;
		      margin: 0;
		      padding: 25px 0 0 0;
		      -premailer-width: 100%;
		      -premailer-cellpadding: 0;
		      -premailer-cellspacing: 0;
		    }

		    .purchase_item {
		      padding: 10px 0;
		      color: #74787E;
		      font-size: 15px;
		      line-height: 18px;
		    }

		    .purchase_heading {
		      padding-bottom: 8px;
		      border-bottom: 1px solid #EDEFF2;
		    }

		    .purchase_heading p {
		      margin: 0;
		      color: #9BA2AB;
		      font-size: 12px;
		    }

		    .purchase_footer {
		      padding-top: 15px;
		      border-top: 1px solid #EDEFF2;
		    }

		    .purchase_total {
		      margin: 0;
		      text-align: right;
		      font-weight: bold;
		      color: #2F3133;
		    }

		    .purchase_total--label {
		      padding: 0 15px 0 0;
		    }
		    /* Utilities ------------------------------ */

		    .align-right {
		      text-align: right;
		    }

		    .align-left {
		      text-align: left;
		    }

		    .align-center {
		      text-align: center;
		    }
		    /*Media Queries ------------------------------ */

		    @media only screen and (max-width: 600px) {
		      .email-body_inner,
		      .email-footer {
		        width: 100% !important;
		      }
		    }

		    @media only screen and (max-width: 500px) {
		      .button {
		        width: 100% !important;
		      }
		    }
		    /* Buttons ------------------------------ */

		    .button {
		      background-color: #3869D4;
		      border-top: 10px solid #3869D4;
		      border-right: 18px solid #3869D4;
		      border-bottom: 10px solid #3869D4;
		      border-left: 18px solid #3869D4;
		      display: inline-block;
		      color: #FFF;
		      text-decoration: none;
		      border-radius: 3px;
		      box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16);
		      -webkit-text-size-adjust: none;
		    }

		    .button--green {
		      background-color: #22BC66;
		      border-top: 10px solid #22BC66;
		      border-right: 18px solid #22BC66;
		      border-bottom: 10px solid #22BC66;
		      border-left: 18px solid #22BC66;
		    }

		    .button--red {
		      background-color: #FF0000;
		      border-top: 10px solid #FF0000;
		      border-right: 18px solid #FF0000;
		      border-bottom: 10px solid #FF0000;
		      border-left: 18px solid #FF0000;
		    }
		    /* Type ------------------------------ */

		    h1 {
		      margin-top: 0;
		      color: #2F3133;
		      font-size: 19px;
		      font-weight: bold;
		      text-align: left;
		    }

		    h2 {
		      margin-top: 0;
		      color: #2F3133;
		      font-size: 16px;
		      font-weight: bold;
		      text-align: left;
		    }

		    h3 {
		      margin-top: 0;
		      color: #2F3133;
		      font-size: 14px;
		      font-weight: bold;
		      text-align: left;
		    }

		    p {
		      margin-top: 0;
		      color: #74787E;
		      font-size: 16px;
		      line-height: 1.5em;
		      text-align: left;
		    }

		    p.sub {
		      font-size: 12px;
		      margin-top:20px!important;
		      margin-bottom:0!important;
		    }

		    p.center {
		      text-align: center;
		    }
		    </style>
		  </head>
		  	';
		return $msg;
	}
}