<?php
try {
// Create a variable with the data source
$datasource = 'mysql:host=localhost; dbname=books_sc1';

$id ='root';
$pwd='sesame';

// create connection
$connect = new PDO ($datasource, $id, $pwd);

//echo 'you are now connected';
} catch (Exception $e) {

echo 'you are NOT  connected';
}



?>