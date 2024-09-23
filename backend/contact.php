<?php

$conn = mysqli_connect(
    '172.200.57.83',        #Server
    'blessing',             #DB user
    'blessing',                 #DB pass
    'BlessingDB'    #DB name
);
# Validar Conexiopn a BD

if (isset($conn)) {
    // echo "DB is connected";
}
?>