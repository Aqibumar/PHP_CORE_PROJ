<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body bgcolor="lightgrey" align='center'>
    <table border="2px solid black"  cellpadding=0 cellspacing= 0 style="margin-top: 100px; width: 100%;">
        <tr>
            <th>Student Name</th>
            <th>Father Name</th>
            <th>Marks In English</th>
            <th>Grade</th>
            <th>Marks In Math</th>
            <th>Grade</th>
            <th>Marks In Urdu</th>
            <th>Grade</th>
            <th>Overall Marks</th>
            <th>Overall Grade</th>
        </tr>
    <?php

    
    include "connection.php";

    //.........Trying to bring parent db data here----------------// 
    // $Sql= "SELECT id,english,math,urdu FROM grading";
    //              $result=$conn->query($Sql);
    //              if($result->num_rows>0){
    //                 while($row=$result->fetch_assoc()){
    //              $studentid = $row['id'];
    //              $englishmarks = $row['english'];
    //              $mathmarks = $row['math'];
    //              $urdumarks = $row['urdu'];
    //                 mysqli_query($conn,"
    //              insert into result(english,
    //              math,urdu,id)
    //              values ('" .$englishmarks. "'
    //              ,'" .$mathmarks. "'
    //              ,'" .$urdumarks. "'
    //              ,'" .$studentid. "'
    //               )
    //               ");
    //                 }}        
    //-------------------------------------------------------------//
    
    $sql= "SELECT grading.student_name,grading.father_name,result.englishmarks,result.mathmarks,result.urdumarks,result.englishgrade,
    result.mathgrade,result.urdugrade,result.marks,result.grade,result.result_id
    FROM grading,result WHERE grading.id = result.student_id";
    $result= $conn->query($sql);
    if($result->num_rows>0 ){
        while($row=$result->fetch_assoc()){

            $english = $row['englishmarks'];
            $math =$row['mathmarks'];
            $urdu =$row['urdumarks'];
            $marks = totalmarks($english,$math,$urdu);
            $grade = calculateGrade($marks);
            $englishgrade = calculateSubGrade($english); 
            $mathgrade = calculateSubGrade($math); 
            $urdugrade = calculateSubGrade($urdu); 
            
            echo "<tr>";
            echo "<td>".$row['student_name']."</td>";
            echo "<td>".$row['father_name']."</td>";
            echo "<td>".$english."</td>";
            echo "<td>".$englishgrade."</td>";
            echo "<td>".$math."</td>";
            echo "<td>".$mathgrade."</td>";
            echo "<td>".$urdu."</td>";
            echo "<td>".$urdugrade."</td>";
            echo "<td>".$marks."</td>";
            echo "<td>".$grade."</td>";
            echo "</tr>";

            //---------Updating Data to database with Calculation-----------//
            if($row['grade'] || $row['marks'] || $row['englishgrade'] || $row['mathgrade']|| $row['urdugrade'] == null ){
                mysqli_query($conn,"UPDATE result set
                grade ='".$grade."',
                marks ='".$marks."',
                englishgrade ='".$englishgrade."',
                mathgrade ='".$mathgrade."',
                urdugrade ='".$urdugrade."'
                where result.result_id = '".$row['result_id']."'
                "); 
                }
                
                
                

        }
        
        echo "</table>";

        

           


    }


    //-----------------Functions......................//
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
    ?>



</body>
</html>