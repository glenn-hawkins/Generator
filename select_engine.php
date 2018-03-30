<option selected="selected">Select Chapter</option>
<?php

    $book = $_GET['book']; // get book
              
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
        						or die('Error connecting to MySQL server.');
              
    $query = "SELECT chapter, value FROM chapter WHERE book = '$book'";
    
    $result = mysqli_query($dbc, $query)
        or die('Error querying database.');
              
    while($row=mysqli_fetch_array($result)) {
        echo '<option value="' . $row[value] . '" name="' . $row[value] . '">' . $row[chapter] . 
			"</option>" . PHP_EOL;
    }
	
?>