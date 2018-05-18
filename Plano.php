<html>
    <head>
        <title>PLANOS DE SAÚDE</title>
        
    </head>
    <body>
        <?php
            if ( ! defined('BASEPATH')){
                exit('No direct script access allowed');
            }

            header('Access-Control-Allow-Origin: *');
            
            class Plano extends CI_Controller {

                public function planos(){
    
                    $token = $this->input->get('token');
        
                    if($token == "123456"){

                        $DB1 = $this->load->database('default',TRUE, TRUE);
        
                        $sql = "select NR_PROTOCOLO_ANS, DS_PLANO from pls_plano where NR_PROTOCOLO_ANS is not null UNION select CD_SCPA, DS_PLANO from pls_plano where CD_SCPA is not null";
        
                        $query = $DB1->query($sql);
                        echo json_encode( $query->result());
                        $DB1->close();
        
                    }else{
                        echo '{"ERRO": "token inválido"}';
                    }
    
    
                }
    
            
            }
        ?>
    </body>
</html>