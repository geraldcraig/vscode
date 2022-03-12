<?php

$endpoint = "http://localhost/qub/week00/dropdown/api.php";
 
$result = file_get_contents($endpoint);
 
$data = json_decode($result, true);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Dynamically Generate Select Dropdowns</title>
</head>
<body>


<form>
    <select>
        <option selected='selected'>Choose one</option>
        <?php

        foreach ($data as $row) {
            $item = $row['username'];
            echo "<option value='strtolower($item)' href='filter.php?sort=$item'>$item</option>";
        }
        // A sample product array
        
        // Iterating through the product arra
           
        
        ?>
    </select>
    <input type="submit" value="Submit">
</form>



</body>
</html>