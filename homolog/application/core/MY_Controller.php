<?php	
class MY_Controller extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
		 
		$logado = $this->session->userdata("control");
		if (!$logado) 
			redirect(base_url('control/auth/login/'));
	}
    public function upload_gallery(){
		$imagem = '';
	   if($_FILES['file']['name'] != ''){
		   $imagem = upload_img('file','gallery');
	   }
			$arrayTmp['filelink'] = base_url('/uploads/gallery/' . $imagem);

			echo stripslashes(json_encode($arrayTmp));
   }
}

class MY_Cliente extends CI_Controller {
	public function __construct() {
	    parent::__construct();
		 
		$logado = $this->session->userdata("cliente");
		if (!$logado) 
			redirect(base_url('/login/'));
		}
	
    public function upload_gallery(){
		$imagem = '';
		if($_FILES['file']['name'] != ''){
			$imagem = upload_img('file','gallery');
		}
		$arrayTmp['filelink'] = base_url('/uploads/gallery/' . $imagem);

		echo stripslashes(json_encode($arrayTmp));
    }
}