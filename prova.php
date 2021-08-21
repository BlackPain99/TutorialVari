<?php

function add($x, $y){
    $sum = $x + $y;
    echo "Sum = $sum <br><br>";
}

function sub($x,$y){  
    $sub = $x - $y;     
    echo "Diff = $sub <br><br>";  
}  

if(isset($_POST['add']))  
{  
    //call add() function
    add($_POST['first'],$_POST['second']);  
}     
if(isset($_POST['sub']))  
{  
    //call add() function  
    sub($_POST['first'],$_POST['second']);  
} 

?>

<form method="POST">
    Enter first number: 
    <input type="text" name="first"/>
    <br><br>
    Enter second number:
    <input type="text" name="second"/>
    <br><br>
    <input type="submit" name="add" value="ADDITION"/>
    <input type="submit" name="sub" value="SUBTRACTION"/>
</form>

<?php
$data = date('d-m-Y H-i-sA', strtotime('28-01-1999 14:22:22' . '+30 days'));
echo $data;

?>

<?php
setcookie("username", "Luca Rossi", time() + 60 * 60 * 24 * 30);

if(isset($_COOKIE["username"])){
    echo $_COOKIE["username"];
} else {
    echo "Nessun cookie disponibile";
}

setcookie("username", "", time()-3600);


?>
