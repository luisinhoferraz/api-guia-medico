<html>
    <head>
        <title>PLANOS DE SAÚDE</title>
        
    </head>
    <body>
        <?php
            $conn = oci_connect('username', 'password', '10.10.0.24:1521/tasy');

            // a tabela de planos no banco de dados contém o código antigo e o código novo de cada plano registrado na ANS; porém, cada tupla possui apenas um dos dois códigos
            // portanto a consulta PL/SQL executa o UNION, para considerar os dois códigos como uma coluna só e ao mesmo tempo ignorar as colunas vazias
            
            $query = 'select NR_PROTOCOLO_ANS, DS_PLANO from pls_plano where NR_PROTOCOLO_ANS is not null UNION select CD_SCPA, DS_PLANO from pls_plano where CD_SCPA is not null';
            
            $stid = oci_parse($conn, $query);
            oci_execute($stid, OCI_DEFAULT);
            
            while ($row = oci_fetch_array($stid, OCI_ASSOC)) { // percorre todas as linhas do resultado da consulta SQL
                $array[] = ['codigo_ans' => $row['NR_PROTOCOLO_ANS'], 'nome_plano' => $row['DS_PLANO']]; // atribui os valores de cada plano a um array PHP
            }

            $json_str = json_encode($array); // transforma a variável PHP num array JSON

            echo $json_str;

            oci_free_statement($stid);
            oci_close($conn);
        ?>
    </body>
</html>