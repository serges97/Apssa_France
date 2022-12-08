<!DOCTYPE html>
<html>
<body>

<?php

$tab = [];
for ($i = 1; $i <= 50; $i++) {
    $tab[$i] = $i;
    
    if ($i==25){
       
        echo '<font color="red">' .$tab[$i]. '</font><br>';
    } else{
		echo "$tab[$i] <br>";
  }
    
}

?> 

</body>
</html>