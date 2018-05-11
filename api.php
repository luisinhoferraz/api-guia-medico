<html>
    <head>
        <title>TESTE 21</title>
        
    </head>
    <body>
        <?php
            $conn = oci_connect('tasy', 'aloisk', '10.10.0.24:1521/tasy');
            $query = 'select DS_PLANO from pls_plano';
            $stid = oci_parse($conn, $query);
            oci_execute($stid, OCI_DEFAULT);
            while ($row = oci_fetch_array($stid, OCI_ASSOC)) {
                foreach ($row as $item) {
                    echo $item." | ";
                }
                echo "\n";
            }
            oci_free_statement($stid);
            oci_close($conn);
        ?>
    </body>
</html>