 <?php
 //  show_product.php
 $isbn= $_GET['isbn'];
 
 
 //Include the file that makes the connection to the desired database
 include 'connect.php';
 
 $query = 'SELECT * FROM books
 WHERE isbn = :isbn
 ORDER BY title';
    try {
        $statement = $connect->prepare($query);
        $statement->bindValue(':isbn', $isbn);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
		
		$title = $result[0]['title'];
	    $price = $result[0]['price'];
	    $author = $result[0]['author'];
	    $image_name = './images/' . $isbn . '.jpg';
        
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
	
?>
<!DOCTYPE html>
<html>    
<head>
    <title>Nick's Book Shop</title>
    <link rel="stylesheet" type="text/css" href= "main.css" />
</head>
<body>
	
	 
		<h1>Nick's Book Shop</h1> 
	<div id="left_column">
	    <h2><?php echo $author; ?></h2>
		<img src="<?php echo $image_name; ?>"/> 
    </div>
	 <div id="right_column">
        <p><b>BookList Price:</b>
        <?php echo '$' . $price; ?></p>
		<strong>Books Name: </strong>
		<p> <?php echo  $title; ?></p>
     </div>
 

</body>
</html>
 
 