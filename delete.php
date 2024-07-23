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
    echo "<hr><br><br>";
    echo "<div align='center'>";
    echo   "<font size='5'>";
    echo "ID: ". htmlspecialchars($_GET['id'])."<br>"."<br>"."<br>"."<br>"."<br>"."<br>"."<br>"."<br>"."<hr>";
    echo "DATA HAS BEEN DELETED SUCCESSFULLY"."<br>";    
    "</font>";
    "</div>";

    mysqli_query($conn, "DELETE FROM grading
                         where grading.id = '".$_GET['id']."'");
}
?>

</body>
</html>