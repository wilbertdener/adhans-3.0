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
            error_log("Caminho do script: " . $pythonScript); // Para verificação
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
    
    

    
    

    public function executar322() {
        
        
        // Pegando o id enviado via POST
        $id = $this->input->post('id');
        
        
        // O resto do código permanece igual
        $pythonPath = '"C:\\Program Files\\Python310\\python.exe"'; // Caminho com aspas duplas
        $pythonScript = APPPATH . 'python/teste.py/';  // Caminho do seu script Python
       
        
        // Executando o script e capturando saída e erro
        $output = shell_exec($pythonPath . " " . escapeshellarg($pythonScript) . " 2>&1");
        
        // Verificando se houve erro
        if ($output === null) {
            echo json_encode(['erro' => 'Erro ao executar o script Python.']);
        } else {
            echo json_encode(['resultado' => trim($id)]);
        }
        
    }
    
    public function executar122() {
        header('Content-Type: application/json');
        
            
        $id = $this->input->post('id');
            
            
        // O resto do código permanece igual
        $pythonPath = '"C:\\Program Files\\Python310\\python.exe"'; // Caminho com aspas duplas
        $pythonScript = APPPATH . 'python/teste.py/';  // Caminho do seu script Python
        $tempFile = tempnam(sys_get_temp_dir(), 'py_');
        file_put_contents($tempFile, file_get_contents(APPPATH . 'python/teste.py'));
        $command = escapeshellarg($pythonPath) . ' ' . escapeshellarg($tempFile) . ' ' . escapeshellarg($id);
        // Executando o script e capturando saída e erro
        $output = shell_exec($pythonPath . " " . escapeshellarg($pythonScript) . " 2>&1");
        
        // Verificando se houve erro
        if ($output === null) {
            echo json_encode(['erro' => 'Erro ao executar o script Python.']);
        } else {
            echo json_encode(['resultado' => trim($id)]);
        }
    }


    public function executar1122() {
        try {
            // Pegando o id enviado via POST
            $id = $this->input->post('id');

            
            $pythonPath = '"C:\\Users\\Wilbert\\anaconda3\\python.exe"'; 
            
            $pythonScript = APPPATH . 'python/teste.py';
            error_log("Caminho do script: " . $pythonScript); // Para verificação
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
        header('Content-Type: application/json');
        
        try {
            $id = $this->input->post('id');
            if (!$id) {
                throw new Exception("ID não recebido");
            }
    
            // Caminhos corrigidos
            $pythonPath = 'C:\\Program Files\\Python310\\python.exe';
            $pythonScript = APPPATH . 'python/teste.py'; // Removida a barra extra
    
            // Verificação de arquivos
            if (!file_exists($pythonPath)) {
                throw new Exception("Python não encontrado em: {$pythonPath}");
            }
    
            if (!file_exists($pythonScript)) {
                throw new Exception("Script Python não encontrado em: {$pythonScript}");
            }
    
            // Comando corrigido
            $command = escapeshellarg($pythonPath) . ' ' . 
                      escapeshellarg($pythonScript) . ' ' . 
                      escapeshellarg($id) . ' 2>&1';
    
            $output = shell_exec($command);
            $tempFile = tempnam(sys_get_temp_dir(), 'py_');
        file_put_contents($tempFile, file_get_contents(APPPATH . 'python/teste.py'));
        $command = escapeshellarg($pythonPath) . ' ' . escapeshellarg($tempFile) . ' ' . escapeshellarg($id);
    
            if ($output === null) {
                throw new Exception("Falha ao executar script Python");
            }
    
            // Decodifica a resposta do Python
            $resultadoPython = json_decode(trim($output), true);
    
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new Exception("Resposta inválida do Python: " . $output);
            }
    
            // Retorna o resultado completo do Python
            echo json_encode(['resultado' => $resultadoPython]);
    
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'erro' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
        }
    }
    
        
}
