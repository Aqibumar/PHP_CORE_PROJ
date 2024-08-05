
<?php
session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body align='center' bgcolor="lightgrey">

<?php
include "connection.php";

// Check if student_id is set, otherwise default to 1
$student_id = $_SESSION['student_id'];

// Sanitize the student_id to prevent SQL injection
$student_id = $conn->real_escape_string($student_id);

// Example query
$sql = "SELECT * FROM grading WHERE id = '$student_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) { 
    // Output data of each row
    $row = $result->fetch_assoc();
    echo "<div align='center'>";
    echo "<font size='5'>";
                
                $english = $row['english'];
                $math = $row['math'];
                $urdu = $row['urdu'];
                $englishgrade=$row['gradeinenglish'];
                $mathgrade= $row['gradeinmath'];
                $urdugrade= $row['gradeinurdu'];
                $marks =  $row['marks'];
                $grade= $row['grade'];

                echo "<h2>Student Data</h2>"."<hr>";
                echo ('Student Name: '); echo $row['student_name'] . "<br>";
                echo ('Student Age: '); echo $row['age'] . "<br>";
                echo ('Father Name: '); echo $row['father_name'] . "<br>";
                echo ('Contact NO: '); echo $row['contact_no'] . "<br>". "<br>";
                echo "<b>Student Result</b>"."<br>"."<br>";
                echo ('English: '); echo $english; echo " | "; echo "<font size='4'> Grade: $englishgrade</font>". "<br>"; 
                echo ('Math: '); echo $math; echo " | "; echo "<font size='4'>  Grade: $mathgrade</font>". "<br>";
                echo ('Urdu: '); echo $urdu; echo " | "; echo "<font size='4'>  Grade: $urdugrade</font>". "<br>";
                echo "<hr>";
                echo ('Overall Marks: '); echo $marks; echo"  |  "; echo('Overall Grade: '); echo $grade;
   echo "</font>
    </div>";

?>
<hr>
    <br><br>
    <div align = "center"  class="box">
    <form action="", method="get" align="center" >
        <h2>Edit and Copy Student Data</h2> 
        <hr style="margin-bottom: 30px;">
        <input type='hidden' name='id' value='<?php echo htmlspecialchars($row['id']); ?>'> <br>
                Student Name: <input type="text" name="name"  value='<?php echo htmlspecialchars($row['student_name']); ?>'> <br>
                Father Name: <input type="text" name="fathername"  value='<?php echo htmlspecialchars($row['father_name']); ?>'> <br>
                Student Age: <input type="number" name="age"  value='<?php echo htmlspecialchars($row['age']); ?>'> <br>
                Contact No: <input type="number" name="contactno"  value='<?php echo htmlspecialchars($row['contact_no']); ?>'> <br><br>
                
                <b>Enter Obtained Marks</b><br><br>
                English: <input type="number" name="english"  value='<?php echo htmlspecialchars($english); ?>'> <br>
                English Grade: <input type="text" name="englishgrade"  value='<?php echo htmlspecialchars($englishgrade); ?>'> <br>
                Math: <input type="number" name="math"  value='<?php echo htmlspecialchars($math); ?>'> <br>
                Math Grade: <input type="text" name="mathgrade"  value='<?php echo htmlspecialchars($mathgrade); ?>'> <br>
                Urdu: <input type="number" name="urdu" value='<?php echo htmlspecialchars($urdu); ?>'> <br>
                Urdu Grade: <input type="text" name="urdugrade"  value='<?php echo htmlspecialchars($urdugrade); ?>'> <br>
                Overall Marks: <input type="number" name="marks"  value='<?php echo htmlspecialchars($marks); ?>'> <br>
                Overall Grade: <input type="text" name="grade"  value='<?php echo htmlspecialchars($grade); ?>'> <br>

                <hr style="margin-top: 30px;">
                <div style="color: red;"><h6>Are you sure you want to Copy this Data</h6></div>
                <input type="submit" name="submit" value="COPY" style="width: 90px; height:25px;">
            </form>
    </div>
<?php
} else {  
    echo "Error or no results";
}

if (isset($_GET['submit']) && isset($_GET['id'])
&& isset($_GET['name']) 
&& isset($_GET['age'])
&& isset($_GET['fathername'])
&& isset($_GET['contactno'])
&& isset($_GET['marks'])
&& isset($_GET['grade'])
&& isset($_GET['english'])
&& isset($_GET['englishgrade'])
&& isset($_GET['math'])
&& isset($_GET['mathgrade'])
&& isset($_GET['urdu'])
&& isset($_GET['urdugrade'])
) {
    echo "<div align='center'>";
    echo "<font size='5'>";
                $getenglish = $_GET['english'];
                $getmath = $_GET['math'];
                $geturdu = $_GET['urdu'];
                $getenglishgrade=$_GET['englishgrade'];
                $getmathgrade= $_GET['mathgrade'];
                $geturdugrade= $_GET['urdugrade'];
                $getmarks =  $_GET['marks'];
                $getgrade= $_GET['grade'];

                echo "<h2>Student Data</h2>"."<hr>";
                echo ('Student Name: '); echo $_GET['name'] . "<br>";
                echo ('Student Age: '); echo $_GET['age'] . "<br>";
                echo ('Father Name: '); echo $_GET['fathername'] . "<br>";
                echo ('Contact NO: '); echo $_GET['contactno'] . "<br>". "<br>";
                echo "<b>Student Result</b>"."<br>"."<br>";
                echo ('English: '); echo $getenglish; echo " | "; echo "<font size='4'> Grade: $getenglishgrade</font>". "<br>"; 
                echo ('Math: '); echo $getmath; echo " | "; echo "<font size='4'>  Grade: $getmathgrade</font>". "<br>";
                echo ('Urdu: '); echo $geturdu; echo " | "; echo "<font size='4'>  Grade: $geturdugrade</font>". "<br>";
                echo "<hr>";
                echo ('Overall Marks: '); echo $getmarks; echo"  |  "; echo('Overall Grade: '); echo $getgrade;
   echo "</font>
    </div>";
    ?>
    <br><br>
<div style="color: red;"><p>DATA HAS BEEN COPIED SUCCESSFULLY</p></div>
    <?php

mysqli_query($conn,"INSERT INTO 
grading(student_name,age,father_name,
contact_no,marks,grade,english,gradeinenglish,math,gradeinmath,urdu,gradeinurdu)
 Values ( '" . $_GET['name']. "',
     '" . $_GET['age']. "',
     '" . $_GET['fathername']. "',
     '" . $_GET['contactno']. "',
     '" . $_GET['marks']. "',
    '" . $_GET['grade']. "',
    '" . $_GET['english']. "',
     '" . $_GET['englishgrade']. "',
    '" . $_GET['math']. "',
    '" . $_GET['mathgrade']. "',
   '" . $_GET['urdu']. "',
  '". $_GET['urdugrade']. "')");
}
?>

</body>
</html>


