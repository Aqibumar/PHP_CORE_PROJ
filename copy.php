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
$student_id = $_GET['student_id'];

// Sanitize the student_id to prevent SQL injection
$student_id = $conn->real_escape_string($student_id);

// Example query
$sql = "SELECT * FROM grading WHERE id = '$student_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) { 
    // Output data of each row
    $row = $result->fetch_assoc();
    echo "<div align='center'>";
    echo   "<font size='5'>";
    echo ('ID: ');echo $row['id'] . "<br>";
    echo ('Student Name: ');echo $row['student_name'] . "<br>";
    echo ('Student Age: '); echo $row ['age'] . "<br>";
    echo ('Student Father Name: ');echo $row['father_name'] . "<br>";
    echo ('Contact No: '); echo $row ['contact_no'] . "<br>";
    echo ('Obtained Marks: ');echo $row['marks'] . "<br>";
    echo ('Grade : '); echo $row ['grade'] . "<br>";
"</font>";
"</div>";

?>

<hr>
    <form method='get' action=''> 
       <input type='hidden' name='id' value='<?php echo htmlspecialchars($row['id']); ?>'> <br>
       Student Name: <input type='text' name='name' value='<?php echo htmlspecialchars($row['student_name']); ?>'> <br> 
       Student Age: <input type='number' name='age' value='<?php echo htmlspecialchars($row['age']); ?>'> <br> 
       Father Name: <input type='text' name='fathername' value='<?php echo htmlspecialchars($row['father_name']); ?>'> <br> 
       Contact NO:<input type='number' name='contactno' value='<?php echo htmlspecialchars($row['contact_no']); ?>'> <br> 
       Obtained Marks:<input type='number' name='marks' value='<?php echo htmlspecialchars($row['marks']); ?>'> <br> 
       Grade: <input type='text' name='grade' value='<?php echo htmlspecialchars($row['grade']); ?>'> <br> 
      
        <input type='submit' name='submit' value='Update'>
    </form>
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
) {
    echo "<hr><br><br>";
    echo "<div align='center'>";
    echo   "<font size='5'>";
    echo "ID: ". htmlspecialchars($_GET['id'])."<br>";
    echo "Name: " . htmlspecialchars($_GET['name'])."<br>";
    echo "Age: " . htmlspecialchars($_GET['age'])."<br>";
    echo "Father Name: " . htmlspecialchars($_GET['fathername'])."<br>";
    echo "Contact No: " . htmlspecialchars($_GET['contactno'])."<br>";
    echo "Obtained Marks: " . htmlspecialchars($_GET['marks'])."<br>";
    echo "Grade: ". htmlspecialchars($_GET['grade'])."<br>"."<br>"."<br>"."<br>"."<br>"."<br>"."<br>"."<br>"."<hr>";
    echo "DATA HAS BEEN Copied SUCCESSFULLY"."<br>";    
    "</font>";
    "</div>";

    mysqli_query($conn,"INSERT INTO 
    grading(student_name,father_name,age,
    contact_no,marks,grade)
     Values ( '".$_GET['name']."',
     '".$_GET['fathername']."',
     '".$_GET['age']."',
     '".$_GET['contactno']."',
     '".$_GET['marks']."',
     '".$_GET['grade']."')");
}
?>

</body>
</html>