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
    <table cellspacing='2px' cellpadding='2px' align="center" border= '1px solid black' style="width: 100%;" >
        <tr>
            <th>ID</th>
            <th>Student Name</th>
            <th>Student Age</th>
            <th>Father Name</th>
            <th>Contact No</th>
            <th>English</th>
            <th>Grade</th>
            <th>Math</th>
            <th>Grade</th>
            <th>Urdu</th>
            <th>Grade</th>
            <th>Overall Marks</th>
            <th>Overall Grade</th>
            <th>Option</th>
        </tr>
    <?php
    //-------------------Fetching Data to display in table--------------//
    include "connection.php";
    $sql= "SELECT id,student_name,father_name,age,contact_no, marks,grade,
    english,math,urdu,gradeinenglish,gradeinmath,gradeinurdu
    FROM grading";
    $result= $conn->query($sql);
    if($result->num_rows >0){
        while ($row=$result->fetch_assoc()){
            $english = $row['english'];
            $math =$row['math'];
            $urdu =$row['urdu'];
            $marks = totalmarks($english,$math,$urdu);
            $grade = calculateGrade($marks);
            $englishgrade = calculateSubGrade($english); 
            $mathgrade = calculateSubGrade($math); 
            $urdugrade = calculateSubGrade($urdu); 

            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['student_name']."</td>";
            echo "<td>".$row['age']."</td>";
            echo "<td>".$row['father_name']."</td>";
            echo "<td>".$row['contact_no']."</td>";
            echo "<td>".$english."</td>";
            echo "<td>".$englishgrade."</td>";
            echo "<td>".$math."</td>";
            echo "<td>".$mathgrade."</td>";
            echo "<td>".$urdu."</td>";
            echo "<td>".$urdugrade."</td>";
            echo "<td>".$marks."</td>";  
            echo "<td>".$grade."</td>"; 
            //-------------Passed the id of student through Session----------------//
            echo"<td>". "<a href='session.php?student_id=".$row['id']."&action=view' target='_blank'><button>View</button></a>"
            ," | ", "<a href='session.php?student_id=".$row['id']."&action=edit' target='_blank'><button>Edit</button></a>"
            ," | ","<a href='session.php?student_id=".$row['id']."&action=copy' target='_blank'><button> Copy </button></a>"
            ," | ","<a href='sesssion.php?student_id=".$row['id']."&action=delete' target='_blank'><button> Delete </button></a>"
            //--------------Passed the id without Session-----------//
            ," | ","<a href='subject.php?student_id=".$row['id']."'target='_blank'><button> Subjects </button></a>"
            ," "."</td>";     
            echo "</tr>";
            //-----------------------------------------------------------------//


            //--------------Updating the data of studentt to Database after calculating their grade and total marks----------------------------//
            if($row['grade']==null){
                mysqli_query($conn,"UPDATE grading set
                grade ='".$grade."'
                  where grading.id = '".$row['id']."'");
            }
            if($row['marks']==null){
                mysqli_query($conn,"UPDATE grading set
                marks ='".$marks."'
                  where grading.id = '".$row['id']."'");
            }
            if($row['gradeinenglish']==null){
                mysqli_query($conn,"UPDATE grading set
                gradeinenglish ='".$englishgrade."'
                  where grading.id = '".$row['id']."'");
            }
            if($row['gradeinmath']==null){
                mysqli_query($conn,"UPDATE grading set
                gradeinmath ='".$mathgrade."'
                  where grading.id = '".$row['id']."'");
            }
            if($row['gradeinurdu']==null){
                mysqli_query($conn,"UPDATE grading set
                gradeinurdu ='".$urdugrade."'
                  where grading.id = '".$row['id']."'");
            }
            //------------------------------------------------------------------------------------//
        };
        
     echo "</table>";
    }
    else{
        echo "0 result";
    }

    //----------------All the function to calculate total marks and grade of student--------------------//
    function calculateGrade($marks) {
        if ($marks >= 250) {
            return 'A';
        } elseif ($marks >= 200) {
            return 'B';
        } elseif ($marks >= 150) {
            return 'C';
        } elseif ($marks >= 120) {
            return 'D';
        } else {
            return 'F';
        }
    } 

    function totalmarks($english,$math,$urdu) {
      $calculatedmarks = $english+$math+$urdu;
      return $calculatedmarks;
    }

    function calculateSubGrade($marks) {
        if ($marks >=90) {
            return ' A';
        } elseif ($marks >= 70) {
            return ' B';
        } elseif ($marks >= 60) {
            return 'C';
        } elseif ($marks >= 40) {
            return 'D';
        } else {
            return 'F';
        }
    } 
    //-----------------------------------------------------------------------------------//
    ?>
    
    

    
</body>
</html>