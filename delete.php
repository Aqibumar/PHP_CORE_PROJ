<?php
session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                echo "<img src='images/".$row['student_img']."' alt='Student_img' width='140' height='100'>"."<br>";
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
<div style="color: red;"><h6>Are you sure you want to delete this Data</h6></div>
    <form method='get' action=''> 
       <input type='hidden' name='id' value='<?php echo htmlspecialchars($row['id']); ?>'> <br>
        <input type='submit' name='submit' value='Delete Anyways'>
    </form>
<?php
} else {  
    echo "Error or no results";
}

if (isset($_GET['submit']) && isset($_GET['id'])

) {
    
    ?>
    <br><br>
<div style="color: red;"><p>DATA HAS BEEN Deleted SUCCESSFULLY</p></div>
    <?php

     mysqli_query($conn, "DELETE FROM grading
                         where grading.id = '".$_GET['id']."'");
}
?>

</body>
</html>