<?php
    require('core.php'); //load core file
    $SV = new Core();
    echo $SV->getconfig('dbhost');
    phpinfo();
 ?>