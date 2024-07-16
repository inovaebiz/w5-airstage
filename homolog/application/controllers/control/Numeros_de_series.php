<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Numeros_de_series extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
        // Carregamento de Helpers
        $this->load->helper(['form', 'url', 'noweb']);

        // Carregamento de Models
        $this->load->model("Numeros_de_series_Model", "numero_serie");
        $this->load->model("Distribuidores_Model", "distribuidor");

        // Carregamento de Libraries
        $this->load->library('form_validation');
        $this->load->library('pagination');
        $this->load->library('upload');
        
        // Carregamento do arquivo de configuração do PhpSpreadsheet
        $this->load->config('phpspreadsheet', TRUE);
        $spreadsheetConfig = $this->config->item('PhpSpreadsheet', 'phpspreadsheet');
        require_once $spreadsheetConfig['path']; // Verifique se o caminho está correto

        $simpleCacheConfig = $this->config->item('simple-cache', 'phpspreadsheet');
        require_once $simpleCacheConfig['path']; // Verifique se o caminho está correto
	}

	public function index($offset = 0)
    {
        $distribuidores = $this->distribuidor->getByStatusDistribuidor();

        // Capturar parâmetros de busca e quantidade por página
        $termoBusca = $this->input->get('termoBusca');
        $perPage = $this->input->get('perPage') ? : 100;

        // Configuração da paginação
        $config['base_url'] = site_url('control/numeros-de-series');
        $config['total_rows'] = $this->numero_serie->getTotalRowsTermoBusca($termoBusca);
        $config['per_page'] = $perPage;
        $config['uri_segment'] = 4;

        // Configuração de links da paginação
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = '&laquo;';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = '&raquo;';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = '<i class="fa fa-caret-right" aria-hidden="true"></i>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '<i class="fa fa-caret-left" aria-hidden="true"></i>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');

        // Inicializar a paginação
        $this->pagination->initialize($config);

        // Definir o limite e o offset
        $limit = $config['per_page'];

        // Verificar se o offset é válido
        if ($offset < 0 || $offset > $config['total_rows']) {
            show_404(); // Página não encontrada
        }

        // Carregar os números de série da página atual
        $numeros_series = $this->numero_serie->getTermoBusca($limit, $offset, $termoBusca);

        $this->form_validation->set_rules('data_emissao', 'Data da Emissão', 'required');
        $this->form_validation->set_rules('distribuidor_id', 'Distribuidor', 'required');
        $this->form_validation->set_rules('produto', 'Número do Equipamento', 'required');
        $this->form_validation->set_rules('serie', 'Número de Série', 'required');
        if($this->form_validation->run()){
            $dados = $this->input->post();
            if(isset($dados['is_used'])) {
                $dados['is_used'] = 1;
            } else {
                $dados['is_used'] = 0;
            }
            $dados['data_emissao'] = date('Y-m-d', strtotime(str_replace('/','-',$dados['data_emissao'])));
            $this->numero_serie->insertNumeroSerie($dados);
            redirect(base_url('control/numeros-de-series?msg=cadastrado'));
        }

        // Passar os dados para a view
        $data = array(
            'distribuidores'=> $distribuidores,
            'numeros_series' => $numeros_series,
            'view' => 'cadastro-de-numeros-de-series',
            'pagination_filter' => $this->load->view('pagination_filter', '', true), // Carregar a view com os filtros e converter em string
            'pagination' => $this->pagination->create_links(), // Adicionar links de paginação ao array de dados
            'config' => $config, // Passar a configuração de paginação para a visualização
            'offset' => $offset, // Passar o offset para a visualização
            'total_rows' => $config['total_rows'] // Passar total_rows para a visualização
        );

        // Carregar a view principal
        $this->load->view('template', $data);
    }

    public function ajax_list($offset = 0)
    {
        // Capturar parâmetros de busca e quantidade por página
        $termoBusca = $this->input->get('termoBusca');
        $perPage = $this->input->get('perPage') ? : 100;
        
        // Verificar o valor de offset
        $offset = $this->uri->segment(4) ? (int)$this->uri->segment(4) : 0;

        // Adicionar mensagem de log para verificar o offset
        // log_message('debug', 'Offset recebido: ' . $offset);

        // Configuração da paginação
        $config['base_url'] = site_url('control/numeros-de-series/ajax_list');
        $config['total_rows'] = $this->numero_serie->getTotalRowsTermoBusca($termoBusca);
        $config['per_page'] = $perPage;
        $config['uri_segment'] = 4;
        $config['reuse_query_string'] = true;

        // Configuração de links da paginação
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = '&laquo;';
        $config['last_link'] = '&raquo;';
        $config['next_link'] = '<i class="fa fa-caret-right" aria-hidden="true"></i>';
        $config['next_tag_open'] = '<li class="paginate_button page-item next">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '<i class="fa fa-caret-left" aria-hidden="true"></i>';
        $config['prev_tag_open'] = '<li class="paginate_button page-item previous">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="paginate_button page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="paginate_button page-item">';
        $config['num_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');

        // Inicializar a paginação
        $this->pagination->initialize($config);

        // Definir o limite e o offset
        $limit = $config['per_page'];

        // Verificar se o offset é válido
        if ($offset < 0 || $offset > $config['total_rows']) {
            show_404(); // Página não encontrada
        }

        // Carregar os números de série da página atual
        $numeros_series = $this->numero_serie->getTermoBusca($limit, $offset, $termoBusca);

        // Gerar a tabela de dados
        $table_data = $this->load->view('tabela_numeros_series', ['numeros_series' => $numeros_series], true);

        // Gerar os links de paginação
        $pagination = $this->pagination->create_links();

        // Modificar os links de paginação para adicionar classes 'disabled' e 'active'
        $pagination = $this->modify_pagination_links($pagination, (int)$offset, (int)$config['per_page'], (int)$config['total_rows']);

        header('Content-Type: application/json');
        echo json_encode(array(
            'table_data' => $table_data,
            'pagination' => $pagination
        ));

    }

    private function modify_pagination_links($pagination, $offset, $per_page, $total_rows)
    {   
        // Obter o valor de termoBusca da variável de classe
        $termoBusca = $this->input->get('termoBusca');

        // Calcular a página atual
        $current_page = ($offset / $per_page) + 1;

        // Definir a quantidade mínima de páginas a serem mostradas
        $min_pages = 3;

        // Iniciar a lista de numerações das páginas dentro do <ul class="pagination">
        $pagination = '<ul class="pagination">';

        // URL base para os links de navegação
        $base_url = site_url('control/numeros-de-series/ajax_list');

        // Adicionar link "First" se não estiver na primeira página
        if ($offset > 0) {
            $first_url = $base_url . '/0?termoBusca=' . $termoBusca . '&perPage=' . $per_page;
            $pagination .= '<li class="paginate_button page-item first"><a href="' . $first_url . '" class="page-link">&laquo;</a></li>';
        }

        // Adicionar link "previous"
        $prev_url = $offset > 0 ? $base_url . '/' . max(0, $offset - $per_page) . '?termoBusca=' . $termoBusca . '&perPage=' . $per_page : '#';
        $pagination .= '<li class="paginate_button page-item previous ' . ($offset == 0 ? 'disabled' : '') . '"><a href="' . $prev_url . '" class="page-link"><i class="fa fa-caret-left" aria-hidden="true"></i></a></li>';

        // Adicionar links de numeração das páginas
        $start_page = max(1, $current_page - floor($min_pages / 2));
        $end_page = min(ceil($total_rows / $per_page), $start_page + $min_pages - 1);

        for ($i = $start_page; $i <= $end_page; $i++) {
            $page_url = $base_url . '/' . (($i - 1) * $per_page) . '?termoBusca=' . $termoBusca . '&perPage=' . $per_page;
            $pagination .= '<li class="paginate_button page-item ' . ($i == $current_page ? 'active' : '') . '"><a href="' . $page_url . '" class="page-link">' . $i . '</a></li>';
        }

        // Adicionar link "next"
        $next_url = $offset + $per_page < $total_rows ? $base_url . '/' . ($offset + $per_page) . '?termoBusca=' . $termoBusca . '&perPage=' . $per_page : '#';
        $pagination .= '<li class="paginate_button page-item next ' . (($offset + $per_page) >= $total_rows ? 'disabled' : '') . '"><a href="' . $next_url . '" class="page-link"><i class="fa fa-caret-right" aria-hidden="true"></i></a></li>';

        // Adicionar link "Last" se não estiver na última página
        if ($offset + $per_page < $total_rows) {
            $last_offset = floor(($total_rows - 1) / $per_page) * $per_page;
            $last_url = $base_url . '/' . $last_offset . '?termoBusca=' . $termoBusca . '&perPage=' . $per_page;
            $pagination .= '<li class="paginate_button page-item last"><a href="' . $last_url . '" class="page-link">&raquo;</a></li>';
        }

        // Fechar a lista de numerações das páginas e o <ul>
        $pagination .= '</ul>';

        return $pagination;
    }

    public function upload() {
        
        set_time_limit(0); // Remover o limite de tempo de execução (opcional)
        ini_set('memory_limit', '1024M'); // Aumentar o limite de memória para 1GB

        try {
            // Configurações de upload
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'xls|xlsx|csv';
            $config['max_size'] = 10240; // 10MB

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('file')) {
                $error = array('error' => $this->upload->display_errors());

                // Carregar a view de upload com mensagem de erro
                $data = array(
                    'view' => 'upload-de-numeros-de-series',
                    'error' => $error
                );
                $this->load->view('template', $data);
            } else {
                $data = $this->upload->data();
                $file = $data['full_path'];

                // Verificar a extensão do arquivo
                $file_extension = pathinfo($file, PATHINFO_EXTENSION);
                if (!in_array($file_extension, ['xls', 'xlsx', 'csv'])) {
                    // Arquivo com extensão não suportada, exibir mensagem de erro
                    $error = array('error' => 'Apenas arquivos .xls, .xlsx ou .csv são permitidos.');
                    $data = array(
                        'view' => 'upload-de-numeros-de-series',
                        'error' => $error
                    );
                    $this->load->view('template', $data);
                    return; // Encerrar a execução do método
                }

                // Carregar o arquivo Excel usando PhpSpreadsheet
                $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file);
                $sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

                $errors = [];
                $validRows = [];
                $existingRows = [];
                
                $last_distribuidor_nome = null;

                // Validar e processar os dados do Excel
                foreach ($sheet as $rowNumber => $row) {

                    // $data_emissao = date('Y-m-d', strtotime(str_replace('/','-',$row['A'])));

                    $data_emissao = '';
                    if ($file_extension == 'csv') {
                        // Tratar como CSV
                        $data_emissao = date('Y-m-d', strtotime(str_replace('/', '-', $row['A'])));
                    } else {
                        // Tratar como XLS ou XLSX
                        // $data_emissao = date('Y-d-m', strtotime(str_replace('/', '-', $row['A'])));
                        $data_emissao = DateTime::createFromFormat('m/d/Y', $row['A']);
                        if ($data_emissao !== false) {
                            $data_emissao = $data_emissao->format('Y-m-d');
                        }
                    }

                    $distribuidor_nome = $row['B'];
                    $condensador = explode(' ', $row['C'])[0];
                    $serie = $row['D'];

                    // Verificar se distribuidor_nome é nulo ou igual ao último processado
                    if ($data_emissao === null || $distribuidor_nome === null || $distribuidor_nome == $last_distribuidor_nome) {
                        $errors[] = [
                            'linha' => $rowNumber + 1, // +1 para ajustar ao número da linha real
                            'coluna' => 'A',
                            'mensagem' => 'Distribuidor não encontrado ou duplicado'
                        ];
                    }

                    $distribuidor = $this->distribuidor->getDistribuidorByNome($distribuidor_nome);

                    if ($distribuidor) {

                        $row['A'] = $data_emissao;
                        $row['B'] = $distribuidor->distribuidor_id;
                        $row['C'] = $condensador;
                        $row['D'] = $serie;

                        // Adicione a coluna do nome do distribuidor à matriz $row
                        $row['DISTRIBUIDOR'] = $distribuidor->distribuidor_nome;

                        // Verificar se os dados já existem na tabela equip_condesadora_serie
                        try {
                            if ($row['A'] != null && $row['B'] != null && $row['C'] != null && $row['D'] != null) {
                                $exists = $this->numero_serie->serieExists($row['A'], $row['B'], $row['C'], $row['D']);
                            } else {
                                continue;
                            }
                        } catch (InvalidArgumentException $e) {
                            // Lidar com a exceção
                            $errors[] = [
                                'linha' => $rowNumber + 1,
                                'coluna' => 'A',
                                'mensagem' => $e->getMessage()
                            ];
                        }

                        if ($exists) {
                            $existingRows[] = [
                                'linha' => $rowNumber + 1,
                                'dados' => $row
                            ];
                        } else {
                            $validRows[] = $row;
                        }

                        // Atualizar o último distribuidor_nome processado
                        $last_distribuidor_nome = $distribuidor_nome;
                    
                    } else {
                        $errors[] = [
                            'linha' => $rowNumber + 1, // +1 para ajustar ao número da linha real
                            'coluna' => 'A',
                            'mensagem' => 'Distribuidor não encontrado'
                        ];
                    }
                }

                // Inserir dados válidos no banco de dados com pausas de 5 segundos
                $insertCount = 0;
                foreach ($validRows as $row) {
                    $this->numero_serie->saveSeries($row);
                    $insertCount++;

                    if ($insertCount % 1000 == 0) {
                        sleep(5); // Pausa de 5 segundos após 1000 inserções
                    }
                }

                // Contar dados inseridos e já existentes
                $insertedCount = count($validRows);
                $existingCount = count($existingRows);

                // Excluir o arquivo após processar
                if (file_exists($file)) {
                    unlink($file);
                }

                // Carregar a view de upload com os resultados
                $data = array(
                    'view' => 'upload-de-numeros-de-series-success',
                    'message' => 'Upload e importação bem-sucedidos',
                    'existingRows' => $existingRows,
                    'validRows' => $validRows,
                    'errors' => $errors,
                    'insertedCount' => $insertedCount,
                    'existingCount' => $existingCount
                );

                $this->load->view('template', $data);
            }
        } catch (Exception $e) {
            // Exibe informações sobre a exceção
            echo 'Erro ao processar o arquivo: ' . $e->getMessage();
        }
    }

    public function editar_numero_de_serie()
	{
		if(!empty($_POST)){
			$dados = $this->input->post();
			if(isset($dados['is_used'])) {
				$dados['is_used'] = 1;
			} else {
				$dados['is_used'] = 0;
			}
			$this->numero_serie->updateNumeroSerie($dados);
			redirect('/control/numeros-de-series?msg=editar');
		}
		$distribuidores = $this->distribuidor->getByStatusDistribuidor();
        $id = $this->uri->segment(4);
		$numeros_series = $this->numero_serie->getByIdNumeroSerie($id)->row();
		$data = array(
            'distribuidores'=> $distribuidores,
			'numeros_series'=> $numeros_series,
			'view'=> 'editar-numero-de-serie'
		);
		$this->load->view('template', $data);
	}

	public function excluir_numero_de_serie()
	{
		$id = $this->uri->segment(4);
		if ($id != '') {
			$this->numero_serie->deleteNumeroSerie($id);
			redirect('control/numeros-de-series?msg=delete');
		}
	}
}