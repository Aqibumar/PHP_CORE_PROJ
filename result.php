<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body bgcolor="lightgrey">
    <div align='center'>
    <font size='5'>
            <?php 
                $english = $_POST['english'];
                $math = $_POST['math'];
                $urdu = $_POST['urdu'];
                $marks = totalmarks($english,$math,$urdu);
                $grade = calculateGrade($marks);
                $englishgrade= calculateSubGrade($english);
                $mathgrade= calculateSubGrade($math);
                $urdugrade= calculateSubGrade($urdu);


                $myimage = $_FILES["img"]["name"];
                $tempname = $_FILES["img"]["tmp_name"];
                $folder = "./images/" . $myimage;
            
               //uploaded image into the folder
               move_uploaded_file($tempname, $folder);

                

                echo "<h2>Student Data</h2>"."<hr>";
                echo "<img src='images/".$myimage."' alt='Student_img' width='140' height='100'>"."<br>";
                echo ('Student Name: '); echo $_POST['studentname'] . "<br>";
                echo ('Student Age: '); echo $_POST['studentage'] . "<br>";
                echo ('Father Name: '); echo $_POST['fathername'] . "<br>";
                echo ('Contact NO: '); echo $_POST['contactno'] . "<br>". "<br>";
                echo "<b>Student Result</b>"."<br>"."<br>";
                echo ('English: '); echo $english; echo " | "; echo "<font size='4'> Grade: $englishgrade</font>". "<br>"; 
                echo ('Math: '); echo $math; echo " | "; echo "<font size='4'>  Grade: $mathgrade</font>". "<br>";
                echo ('Urdu: '); echo $urdu; echo " | "; echo "<font size='4'>  Grade: $urdugrade</font>". "<br>";
                echo "<hr>";
                echo ('Overall Marks: '); echo $marks; echo"  |  "; echo('Overall Grade: '); echo $grade;
    
                include "connection.php";
                mysqli_query($conn,"
                insert into grading(student_name,age,father_name,contact_no,marks,grade,english,
                math,urdu,gradeinenglish,gradeinmath,gradeinurdu,student_img)
                values ('" . $_POST['studentname'] . "'
                ,$_POST[studentage]
                ,'" . $_POST['fathername'] . "'
                ,'" . $_POST['contactno'] . "'
                ,'" . $marks. "'
                ,'" . $grade . "'
                ,'" . $_POST['english']. "'
                ,'" . $_POST['math'] . "'
                ,'" . $_POST['urdu'] . "'
                ,'" .$englishgrade. "'
                ,'" .$mathgrade. "'
                ,'" .$urdugrade. "'
                ,'" .$myimage. "'
                 ) ");
                //----------Getting the id of last data that has been addedd---------//
                 $Sql= "SELECT Max(id) As max_id FROM grading";
                 $result=$conn->query($Sql);
                 if($result){
                 $row=$result->fetch_assoc();
                 $maxid=$row['max_id'];
                 }
                //----------Inserting data into Result table---------//
                mysqli_query($conn,"
                insert into result(englishmarks,
                mathmarks,urdumarks,englishgrade,mathgrade,urdugrade,marks,grade,student_id)
                values ('" . $_POST['english']. "'
                ,'" .$_POST['math'] . "'
                ,'" .$_POST['urdu'] . "'
                ,'" .$englishgrade. "'
                ,'" .$mathgrade. "'
                ,'" .$urdugrade. "'
                ,'" .$marks. "'
                ,'" . $grade . "'
                ,'" .$maxid. "'
                 ) ");
         
                 //---------Functions----------//
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
                        return 'A';
                    } elseif ($marks >= 70) {
                        return 'B';
                    } elseif ($marks >= 60) {
                        return 'C';
                    } elseif ($marks >= 40) {
                        return 'D';
                    } else {
                        return 'F';
                    }
                } 
                ?>

    </font>
    </div>
    <br><br>
    <div align='center'>
    <a href="studentdata.php"><button style="width: 120px; height:30px">All Students Data</button></a>
    </div>

                    
                
    
</body>
</html>
