<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student details</title>
</head>
<body bgcolor="lightgrey">
    
<div align='center'>
<font size='6'><b>Add Student Details</b></font>
<hr>
    <form action="result.php" method="post">
            
            <font  size='5'>    
                Student Name: <input type="text" name="studentname" id="studentname" required> <br><br>
                Father Name: <input type="text" name="fathername" id="fathername"> <br><br>
                Student Age: <input type="number" name="studentage" id="studentage"> <br><br>
                Contact No: <input type="number" name="contactno" id="contactno"> <br><br>
                Marks: <input type="number" name="marks" id="marks"> <br><br><hr>
                <input type="submit" name="submit" value="ADD" style="width: 120px; height:30px;">
            </font>
</div>
    
</body>
</html>