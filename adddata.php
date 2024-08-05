<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>student details</title>
</head>
<body bgcolor="lightgrey">
    <br><br>
    <div align = "center"  class="box">
    <form action="result.php", method="post" align="center" enctype="multipart/form-data">
        <h2>Student Data</h2> 
        <hr style="margin-bottom: 30px;">
                Student Name: <input type="text" name="studentname" id="studentname" required> <br><br>
                Father Name: <input type="text" name="fathername" id="fathername" require> <br><br>
                Student Age: <input type="number" name="studentage" id="studentage"require> <br><br>
                Contact No: <input type="number" name="contactno" id="contactno" require> <br><br>
                <input type="file" id="img" name="img"><br><br><br>
        
                <b>Enter Obtained Marks</b><br><br>
                English: <input type="number" name="english" id="english"require> <br><br>
                Math: <input type="number" name="math" id="math"require> <br><br>
                Urdu: <input type="number" name="urdu" id="urdu"require> <br><br>
                <hr style="margin-top: 30px;">
                <input type="submit" name="submit" value="ADD" style="width: 90px; height:25px;">
            </form>
    </div>

  
    
</body>
</html>