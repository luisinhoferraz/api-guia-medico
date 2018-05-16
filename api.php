<html>
    <head>
        <title>TESTE PHP</title>
        
    </head>
    <body>
        <?php
            $conn = oci_connect('tasy', 'aloisk', '10.10.0.24:1521/tasy');
            $query = 'select DS_PLANO from pls_plano';
            $stid = oci_parse($conn, $query);
            oci_execute($stid, OCI_DEFAULT);
            while ($row = oci_fetch_array($stid, OCI_ASSOC)) { // percorre todas as linhas do resultado da consulta SQL
                foreach ($row as $item) {
                    $array[] = $item;
                }
            }

            print_r($array);

            echo '<br /> FIM DO ARRAY PHP E INÍCIO DO ARRAY JSON <br />';

            $json_str = json_encode($array);
            echo 'JSON'.$json_str;

            oci_free_statement($stid);
            oci_close($conn);
        ?>
    </body>
</html>