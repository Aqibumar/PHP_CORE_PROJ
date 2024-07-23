<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Student Data</title>
</head>
<body bgcolor="lightgrey">

    <div align='center'> <a href="adddata.php"><button>Add Data In table</button></a></div>
    <hr style="border-top: 8px solid grey;">
    <table cellspacing='2px' cellpadding='2px' align="center" border= '1px solid black' >
        <tr>
            <th>ID</th>
            <th>Student Name</th>
            <th>Student Age</th>
            <th>Father Name</th>
            <th>Contact No</th>
            <th>Marks</th>
            <th>Grade</th>
            <th>Option</th>
        </tr>
    <?php

    include "connection.php";
    $sql= "SELECT id,student_name,father_name,age,contact_no, marks,grade FROM grading";
    $result= $conn->query($sql);
    if($result->num_rows >0){
        while ($row=$result->fetch_assoc()){
            $marks = $row['marks'];
            $grade = calculateGrade($marks);

            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['student_name']."</td>";
            echo "<td>".$row['age']."</td>";
            echo "<td>".$row['father_name']."</td>";
            echo "<td>".$row['contact_no']."</td>";
            echo "<td>".$row['marks']."</td>";  
            echo "<td>".$grade."</td>"; 
            echo"<td>". "<a href='edit.php?student_id=".$row['id']."'target='_blank'><button>Edit </button></a>"," | ","<a href='copy.php?student_id=".$row['id']."'target='_blank'><button> Copy </button></a>"," | ","<a href='delete.php?student_id=".$row['id']."'target='_blank'><button> Delete </button></a>"," "."</td>";     
            echo "</tr>";

            if($row['grade']== null){
                mysqli_query($conn,"UPDATE grading set
                grade ='".$grade."'
                  where grading.id = '".$row['id']."'");
            }
        };
        
        
            
          
  

     echo "</table>";
    }
    else{
        echo "0 result";
    }
    function calculateGrade($marks) {
        if ($marks >= 90) {
            return 'A';
        } elseif ($marks >= 80) {
            return 'B';
        } elseif ($marks >= 70) {
            return 'C';
        } elseif ($marks >= 60) {
            return 'D';
        } else {
            return 'F';
        }
    }  
    ?>
    
    

    
</body>
</html>