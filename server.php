<?php
    $conn =  mysqli_connect('localhost','root','','products')or die(mysqli_error($conn));

    // ADD NEW EMPLOYEE
    if(isset($_POST['save'])) {
        $first      = $_POST['firest'];
        $last       = $_POST['last'];
        $birth      = $_POST['birth'];
        $matricule  = $_POST['matricule'];
        $department = $_POST['department'];
        $salary     = $_POST['salary'];
        $fnction    = $_POST['fnction'];
        // $photo      = $_POST['photo'];
        $photo = $_FILES["photo"]["name"];
        $img_tmp = $_FILES["photo"]["tmp_name"];
        $img_local ="IMG/" . $photo;

        $req        = "INSERT INTO employe (firstname,lastname,birth,matricule,department,salary,fnction,photo) values ('$first','$last','$birth','$matricule','$department','$salary','$fnction','$photo')";
       
        
            
            move_uploaded_file($img_tmp,$img_local);

        $res        = mysqli_query($conn, $req);

    }


    // EDIT
    if(isset($_POST['update'])) {
        $matricule = $_POST['matricule'];
        $first = $_POST['firest'];
        $last = $_POST['last'];
        $birth      = $_POST['birth'];
        $matricule  = $_POST['matricule'];
        $department = $_POST['department'];
        $salary     = $_POST['salary'];
        $fnction    = $_POST['fnction'];
        $old_photo = $_GET['photo'];
        $photo = $_FILES["photo"]["name"];
        $img_tmp = $_FILES["photo"]["tmp_name"];
        $img_local ="IMG/" . $photo;
        if($photo==""){
            $photo=$old_photo;
        }
        $update = $conn->query("UPDATE `employe` SET `firstname`='$first',`lastname`='$last',`photo`='$photo' WHERE `matricule` = '$matricule' ")or die(mysqli_error($conn));
        move_uploaded_file($img_tmp,$img_local);
    }

    header("location: all.php");

    

    // if(isset($_POST['update'])){
    //     session_start();
    //     $id = $_GET['edit'];
    //     $first = $_POST['firest'];
    //     $last = $_POST['last'];
        
    //     $_SESSION['id'] = $id;
    //     $_SESSION['first'] = $first;
    //     $_SESSION['last'] = $last;
    
    //     //$update = $conn->query("UPDATE `employe` SET `firstname` = '$first',`lastname` = '$last' WHERE `matricule` = '$id' ")or die(mysqli_error());
    //     $update = $conn->query("UPDATE `employe` SET `firstname`='$first',`lastname`='$last' WHERE `matricule` = '$id' ")or die(mysqli_error($conn));
    // }

    // header("location: database3.php");
    // exit;
    //     $stmt = $conn->prepare("select * from employe");

    //     $stmt->execute();

    //     $result = $stmt->get_result();
