<?php
session_start();
if (!isset($_SESSION['student_id'])) {
    die("No student ID set in session.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<body bgcolor="lightgrey" align ='center'>

<table border="2px solid black" align="center" width='50%'>
<tr>
    <th>Sr.No</th>
    <th>Subject</th>
    <th>Maximum Marks</th>
    <th>Obtained Marks</th>
    <th>Grade</th>
</tr>

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

                
                    echo "<tr>";
                    echo "<td>1<br>2<br>3</td>";
                    echo "<td>English<br>Math<br>Urdu</td>";
                    echo "<td>100<br>100<br>100</td>";
                    echo "<td>$english<br>$math<br>$urdu</td>";
                    echo "<td>$englishgrade<br>$mathgrade<br>$urdugrade</td>";
                    echo "</tr>";
                echo "</table>";
                echo "<table align='center' border='2px solid black' width='50%'>";
                echo "<tr>
                <th>Overall Marks:  $marks </th>
                <th>Overall Grade:  $grade</th>
                </tr>";
                echo "</table>";
   echo "</font>
    </div>";
}
    ?>
</body>
</html>