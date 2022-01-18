<?php

$query = $db -> prepare("SELECT * FROM users WHERE username = 'Askylan' AND ( id = 1 OR rang > 'admin')");
$query -> execute();
$query_result = $query -> fetchAll();




?>
