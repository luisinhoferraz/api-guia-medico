<html>
    <head>
        <title>PLANOS DE SAÚDE</title>
        
    </head>
    <body>
        <?php

            // cabeçalho padrão das classes do framework
            if ( ! defined('BASEPATH')){
                exit('No direct script access allowed');
            }

            header('Access-Control-Allow-Origin: *');
            
            class Plano extends CI_Controller {

                public function planos(){

                    // URL para acesso local a esta classe: http://localhost/index.php/api-guia-medico/plano/planos?token=123456
                    
                    // obtém o token inserido pelo usuário na URL
                    $token = $this->input->get('token');
        
                    // valida o token
                    if($token == "123456"){

                        // se o token for válido, estabelece a conexão com o banco de dados
                        // a conexão já foi totalmente configurada no arquivo database.php, oferecido pelo CodeIgniter
                        $DB1 = $this->load->database('default',TRUE, TRUE);
                        
                        // a tabela de planos de saúde no banco de dados contém o código antigo e o código novo de cada plano registrado na ANS; porém, cada tupla possui somente um dos dois códigos
                        // portanto a consulta PL/SQL executa o UNION, para considerar os dois códigos como uma coluna só e ao mesmo tempo ignorar os registros que têm as duas colunas vazias
                        $sql = "select NR_PROTOCOLO_ANS, DS_PLANO from pls_plano where NR_PROTOCOLO_ANS is not null UNION select CD_SCPA, DS_PLANO from pls_plano where CD_SCPA is not null";

                        // realiza a consulta no banco de dados e guarda o resultado numa variável PHP
                        $query = $DB1->query($sql);

                        // transforma a variável PHP num array JSON e imprime na tela
                        echo json_encode( $query->result());

                        // encerra a conexão com o banco de dados
                        $DB1->close();
        
                    }else{
                        // se o token for inválido, exibe uma mensagem de erro
                        echo '{"ERRO": "token inválido"}';
                    }
    
    
                }
    
            
            }
        ?>
    </body>
</html>