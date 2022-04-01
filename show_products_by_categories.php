 <?php
 //  show_products_by_categories.php
 
 $catid = $_GET['catID'];

  
//Include the file that makes the connection to the desired database
 include 'connect.php';
 
    $query = 'SELECT * FROM books
              WHERE catID = :catID
              ORDER BY title';
    try {
        $statement = $connect->prepare($query);
        $statement->bindValue(':catID', $catid);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        
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
	
	
		<table>
		<tr> <h1>Nick's Book Shop</h1> </tr>
		<h2>Books by Selected Category </h2>
        <!--    
		-->
        <?php 
				foreach ($result  as $item) : 
				echo "<tr>";
				
                echo "<td>" . '<a href="show_product.php?isbn=' .  $item['isbn'] . ' ">' .  $item['title'] ."</td>" 
                .  "<td>".  $item['author']. "</td>" 
                ."<td>" .'  $' .  number_format($item['price'],2) . "</td>";
				
				echo "</tr>";
                endforeach; 
                if (empty($result)){
                    echo "404 ERROR: DO TO THE INCREASE IN GAS PRICES BOOKS WHERE UNABLE TO BE SHIPPIED INTO THIS CATEGORY";
                }
                
        

                
                ?>
        </table>

</body>
</html>