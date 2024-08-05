<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
   Enter Number: <input type="text" name="number">
   <input type="submit" name="submit">
</form>
<?php
if(isset($_POST['submit'])){
// echo $_POST['submit'];
// die();
 $a = 5;
 $b = 25;
    function myfunction($value){

        // $c = 30;
         $d = 30 - $value;
         echo $d;
    };


    echo myfunction($_POST['number']);

};
?>
<!-- ---------------------------------------Java Script---------------------------------------------- -->

<p id="date">Hellow world</p>
   <button type="button"
onclick="document.getElementById('date').innerHTML = Date()">
Click me to display Date and Time.</button>


<p id="change">change to hellow world</p>
<button onclick="document.getElementById('change').innerHTML='hello world'">Change the Text</button>

<p id="id">my code</p>
<button onclick="document.getElementById('id').innerHTML=''"></button>

<script>
    function myfunc() {
        let x , y ,z;
        x=5;
        y=10;
        z=x+y;
        return z;
    }
</script>
    
</body>
</html>