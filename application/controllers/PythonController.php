<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PythonController extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function executar() {
        try {
            // Pegando o id enviado via POST
            $id = $this->input->post('id');

            //putenv('PYTHONPATH=C:\\Program Files\\Python310\\Lib\\site-packages');
            
            // Caminhos para o Python e o script
            /* $pythonPath = '"C:\\Program Files\\Python310\\python.exe"'; // Caminho com aspas duplas
            $pythonScript = APPPATH . 'python/teste.py';  // Caminho do seu script Python
    
            // Gerar comando para rodar o script Python
            $command = "PYTHONPATH=C:\\Program Files\\Python310\\Lib\\site-packages " . $pythonPath . " " . escapeshellarg($pythonScript) . " " . escapeshellarg($id);
 */

            $pythonPath = '"C:\\Users\\Wilbert\\anaconda3\\python.exe"'; 
            $pythonScript = APPPATH . 'python/teste.py';
            $pythonLibPath = "C:\\Users\\Wilbert\\anaconda3\\Lib\\site-packages";//"C:\\Program Files\\Python310\\Lib\\site-packages"; //C:\\Users\\Wilbert\\anaconda3\\Lib\\site-packages

            $command = "set PYTHONPATH=" . escapeshellarg($pythonLibPath) . " && " . $pythonPath . " " . escapeshellarg($pythonScript) . " " . escapeshellarg($id);

            // Logando o comando para depuração
            log_message('debug', 'Comando Python: ' . $command);
    
            // Executar o script e capturar a saída
            exec($command, $output, $return_var);

            //echo "Saída do comando:\n";
            //print_r($output); // Captura stdout + stderr

            //echo "\nCódigo de retorno: $return_var\n";
    
            // Verificar se ocorreu erro ao executar
            if ($return_var !== 0) {
                throw new Exception("Erro ao executar o script Python.");
            }
    
            // Resposta do script Python
            $result = implode("\n", $output); // Junta a saída em uma string
    
            // Retorna a resposta como JSON
            echo json_encode(['resultado' => $result]);
    
        } catch (Exception $e) {
            // Se houve erro, captura e exibe uma mensagem de erro JSON
            echo json_encode(['erro' => $e->getMessage()]);
        }
    }
    
    

    
    

    public function executar22() {
        
        
        // Pegando o id enviado via POST
        $id = $this->input->post('id');
        
        
        // O resto do código permanece igual
        $pythonPath = '"C:\\Program Files\\Python310\\python.exe"'; // Caminho com aspas duplas
        $pythonScript = APPPATH . 'python/teste.py';  // Caminho do seu script Python
        
        // Executando o script e capturando saída e erro
        $output = shell_exec($pythonPath . " " . escapeshellarg($pythonScript) . " 2>&1");
        
        // Verificando se houve erro
        if ($output === null) {
            echo json_encode(['erro' => 'Erro ao executar o script Python.']);
        } else {
            echo json_encode(['resultado' => trim($id)]);
        }
        
    }
    
    
    
    
        
}
