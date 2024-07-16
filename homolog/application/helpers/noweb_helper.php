<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('upload_img'))
{
    function upload_img($name= NULL, $pasta = NULL, $max = NULL)
    {
        $upload_config['encrypt_name'] = true;
        if($pasta != NULL){

            $upload_config['upload_path'] =  './uploads/'.$pasta.'/';
        }else{

            $upload_config['upload_path'] =  './uploads/';
        }
        $upload_config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx';
        is_writable('./uploads/');
         $ci = & get_instance();
        $ci->load->library('upload', $upload_config);

        $fname = '';
        if ($name!=null){
            if ($ci->upload->do_upload($name)) {
                $img = $ci->upload->data();
                
                  if($img['is_image'] == '1'){
	                if($img['image_width'] > 1500 && $max == NULL){
						$convertida  = redimensionar($img['full_path'], NULL, 1500, NULL, $img['file_ext'], $img['file_path']);
						$fname = $convertida['nome'];
						unlink($img['full_path']);
		                
	                }else{
		               $fname = $img['file_name'];
	                }
                }
                
            }else{
	            $fname = $ci->upload->display_errors();	
            }
        }

        return $fname;
    }

}
if ( ! function_exists('upload_'))
{
    function upload_($name= NULL, $pasta = NULL, $max = NULL)
    {
        $upload_config['encrypt_name'] = true;
        if($pasta != NULL){

            $upload_config['upload_path'] =  './uploads/'.$pasta.'/';
        }else{

            $upload_config['upload_path'] =  './uploads/';
        }
        $upload_config['allowed_types'] = '*';
        is_writable('./uploads/');
         $ci = & get_instance();
        $ci->load->library('upload', $upload_config);

        $fname = '';
        if ($name!=null){
            if ($ci->upload->do_upload($name)) {
                $img = $ci->upload->data();
		        $fname = $img['file_name'];
            }else{
	            $fname = $ci->upload->display_errors();	
            }
        }

        return $fname;
    }

}

if(! function_exists('tirarAcentos')){
	function tirarAcentos($string){
return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/", "/(ç|Ç)/","/(:|,|;|[|]|{|}|\)|\()/" ),explode(" ","a A e E i I o O u U n N c "),$string);
}
}


if(! function_exists('geraLink')){
	function geraLink($titulo)
	{
		$titulo = str_replace('?','',$titulo);
		$titulo = str_replace('!','',$titulo);
		$titulo = str_replace('$','',$titulo);
		$titulo = str_replace('#','',$titulo);
		$titulo = str_replace('&','',$titulo);
		$titulo = str_replace('%','',$titulo);
		$titulo = trim($titulo);
		$titulo = str_replace(' ','-',$titulo);
		$titulo = str_replace('/','-',$titulo);
		$titulo = str_replace('--','-',$titulo);
		$titulo = str_replace('--','-',$titulo);
		
		return	strtolower(tirarAcentos(str_replace(' ', '-',trim($titulo))));
	}
} 

if(! function_exists('getTitle')){
		function getTitle()
	{
		 $ci = & get_instance();

	        $ci->load->model("Pagina_Model", "pagina");
	$config = $ci->pagina->getConfig()->first_row();	
		
		    return $config->titulo;
		    }
}  


if(!function_exists('redimensionar')){
	 function redimensionar($imagem, $nome=NULL, $largura, $altura=NULL, $ex, $pasta)
	{
		$name =NULL;
		if ($nome == NULL) {
			$name = md5(uniqid(rand(),true));
		}else{
			$name= $nome;
		}
		
		switch($ex)
		{
			case ".gif":
				$img = imagecreatefromgif($imagem);//['tmp_name']
				break;
			case ".bmp":
				$img = imagecreatefrompng($imagem);
				break;
			case ".png":
				$img = imagecreatefrompng($imagem);
			break;
			case ".jpg":
				$img = imagecreatefromjpeg($imagem);
			break;
			case ".jpeg":
				$img = imagecreatefromjpeg($imagem);
			break;
			default:
				$img = imagecreatefromjpeg($imagem); 
			break;
		}
		
		
		$x = imagesx($img);
		$y = imagesy($img);
		
		$q = '';
		if ($altura == NULL) {
			$altura = ($largura * $y)/$x;
		}else{
			$q='q';
		}
		
		
		$nova = imagecreatetruecolor($largura, $altura);
		imagecopyresampled($nova, $img, 0, 0, 0, 0, $largura, $altura, $x, $y);
		
		$local= "$pasta/$name". $ex;
		imagejpeg($nova, $local);
		
		imagedestroy($img);
		imagedestroy($nova);	
		$ret = array( "path" => $local, "nome" =>"$name$ex" );
		return $ret;
	}
	
	
}







