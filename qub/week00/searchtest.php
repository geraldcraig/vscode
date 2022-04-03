<!DOCTYPE html>
<html lang="en-GB">
<head>
    <title>Search results</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>

<?php
        $host = "localhost";
        $user = "root";
        $pw = "root";
        $db = "albumtest";
 
        $con = mysqli_connect($host, $user, $pw, $db);
	
        if (mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }

        if (isset($_GET['search'])) {
            $param = "%{$_GET['search']}%";
            $query = mysqli_prepare($con, "SELECT album.album, artist.name, albumyear.year FROM album
                                           INNER JOIN artist 
                                           ON album.artistid = artist.id 
                                           INNER JOIN albumyear
                                           ON album.yearid = albumyear.id
                                           WHERE year OR name LIKE ?");
            mysqli_stmt_bind_param($query, "s", $param);
            mysqli_stmt_execute($query);
            $results = mysqli_stmt_get_result($query);
            $rows = mysqli_num_rows($results);
            mysqli_stmt_close($query);
        
            if ($rows > 0) {
                echo "<h2>Search results for: {$_GET['search']}</h2>";
                     
                while ($result = mysqli_fetch_array($results)) {
                    $result_title=$result['name'];
                    $result_url=$result['album'];
                    $result_preview=$result['year'];
                        
                    echo "<div class='search_result'> 						
                    <tr>  
                    <td>$result_title</td>
                    <td>$result_url</td>
                    <td>$result_preview</td>
                    </tr>			
                    </div>";
                }   
            } else {
                echo "<h2>No results found for your search: {$_GET['search']}</h2>";
            }
        } else {
            echo "<h2>No search query provided. Please try your search again.</h2>";
        }
        mysqli_close();
 ?>

</body>
</html>