<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body bgcolor="lightgrey">
    <div align='center'>
        <hr>
    <font size='5'>
            <?php 
                echo ('Student Name: '); echo $_POST['studentname'] . "<br>";
                echo ('Student Age: '); echo $_POST['studentage'] . "<br>";
                echo ('Father Name: '); echo $_POST['fathername'] . "<br>";
                echo ('Contact NO: '); echo $_POST['contactno'] . "<br>";
                echo ('Marks: '); echo $_POST['marks'] . "<br>";
                $marks = $_POST['marks'];
                $grade = calculateGrade($marks);
                echo('Grade: '); echo $grade;
    
                include "connection.php";

                mysqli_query($conn,"
                insert into grading(student_name,age,father_name,contact_no,marks,grade)
                values ('" . $_POST['studentname'] . "'
                ,$_POST[studentage]
                ,'" . $_POST['fathername'] . "'
                ,'" . $_POST['contactno'] . "'
                ,'" . $_POST['marks'] . "'
                ,'" . $grade . "' ) ");

                

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

    
    </font>
    </div>
    <br><hr><br>
    <div align='center'>
    <a href="studentdata.php"><button style="width: 120px; height:30px">All Data</button></a>
    </div>
</body>
</html>
