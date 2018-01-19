<?php

function connectToDB(){
    $dbconn = pg_connect("host=localhost port=5432 dbname=bbb user=postgres password=12345");
    return $dbconn;
}

function insertRecord($n) {
	$x1 = "a_" . $n;
	$x2 = "b_" . $n;
	
	$dbconn = connectToDB();
	
	
	$stat = pg_connection_status($dbconn);
    if ($stat === PGSQL_CONNECTION_OK) {
         echo 'Статус соединения: доступно<br>';
    } else {
         echo 'Статус соединения: разорвано<br>';
    }    
	
	
    $query = " INSERT INTO x (x1, x2) VALUES ('{$x1}', '{$x2}'); ";
    $result = pg_query($query);

    pg_free_result($result);
    pg_close($dbconn);
    
   
    $stat = pg_connection_status($dbconn);
    if ($stat === PGSQL_CONNECTION_OK) {
         echo 'Статус соединения: доступно<br>';
    } else {
         echo 'Статус соединения: разорвано<br>';
    } 
      
    
    echo "<br><br>";
}

insertRecord(5);
insertRecord(6);
insertRecord(7);

?>




