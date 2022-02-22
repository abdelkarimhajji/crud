<?php
$conn =  mysqli_connect('localhost', 'root', '', 'products') or die(mysqli_error($conn));

$update = false;

$first = "";
$last = "";
$matricule = "";
$birth ="";
$salary="";
$department="";
$fnction="";

if (isset($_GET['edit'])) {
    $update = true;
    $id = $_GET['edit'];
    $g = $conn->query("SELECT * FROM employe WHERE matricule = $id") or die(mysqli_error($conn));
    $row = $g->fetch_array();
    $first = $row['firstname'];
    $last  = $row['lastname'];
    $matricule = $row['matricule'];
    $birth      = $row['birth'];
    $department = $row['department'];
    $salary     = $row['salary'];
    $fnction    = $row['fnction'];
    $photo      = $row['photo'];

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortout icon" type="image/x-icon" href="IMG/mountain2.jpg">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">


    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <script src="https://kit.fontawesome.com/696da253b9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Document </title>
</head>

<body>


    <div id="sideNav">

        <nav>
            <ul>
                <div class="j">
                    <li class="h"><a href="form.php">Home</a></li>
                </div>
                <div class="j">
                    <li class="h"><a href="all.php">See All</a></li>
                </div>
                <div class="j">
                    <li class="h"><a href="index3.html">Activites</a></li>
                </div>
                <div class="j">
                    <li class="h"><a href="#">teachers</a></li>
                </div>
                <div class="j">
                    <li class="h"><a href="#contact">Contact</a></li>
                </div>

            </ul>
        </nav>
    </div>
    <div id="manuBtn">
        <img src="IMG/menu.png" id="menu">
    </div>
    <div class="img">
        <div class="form-horizontal">
            <i class="fa-solid fa-address-card add "></i>
            <p>FORMULAIRE D’INFORMATION</p>
            <form action="server.php?photo=<?php echo $photo; ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="mb-3 pt-5 ">
                    <i class="fa-solid fa-user-tie i"></i>
                    <input type="text" class="col" name="firest" placeholder="First Name" value="<?php echo $first; ?>">
                </div>
                <div class="mb-3">
                    <i class="fa-solid fa-user-tie i"></i>
                    <input type="text" class="col" name="last" placeholder="Last Name" value="<?php echo $last; ?>">
                </div>
                <div class="mb-3">
                    <i class="fa-solid fa-calendar-plus i date"></i>
                    <input type="date" class="col" name="birth" placeholder="The Birth Date" value="<?php echo $birth; ?>">
                </div>
                <div class="mb-3">
                    <i class="fa-solid fa-fingerprint i"></i>
                    <input type="text" class="col" name="matricule" placeholder="Matricule" value="<?php echo $matricule; ?>">
                </div>
                <div class="mb-3 ">
                    <i class="fa-solid fa-hospital i"></i>
                    <input type="text" class="col" name="department" placeholder="Department" value="<?php echo $department; ?>">
                </div>
                <div class="mb-3">
                    <i class="fa-solid fa-hand-holding-dollar i"></i>
                    <input type="text" class="col" name="salary" placeholder="salary" value="<?php echo $salary; ?>">
                </div>
                <div class="mb-3">
                    <i class="fa-solid fa-map-location i"></i>
                    <input type="text" class="col" name="fnction" placeholder="Function" value="<?php echo $fnction; ?>">
                </div>
                <div class="mb-3">
                    <i class="fa-solid fa-camera i"></i>
                    <button type="button" class="btn-warning">

                        <input type="file" class="col8" name="photo"value="<?php echo $photo; ?>">
                        <i class="fa-solid fa-download d"> UPLOAD FILE</i>
                    </button>
                </div>
                <?php
                if ($update == true) :
                ?>
                    <button type="submit" class="btn" name="update">update</button>
                <?php else : ?>
                    <button type="submit" class="btn" name="save">Submit</button>
                <?php endif; ?>
            </form>
        </div>
    </div>

    <!-- <form action="database.php" method="POST">
            fist name
            
            <input type="text" name="first" id="">
            last name
            <input type="text" name="last" id="">
            cni
            <input type="number" name="cni" id="">
            email
            <input type="text" name="email" id="">
            file
            <input type="file" name="filee" id="">
            <input name="submit" type="submit" value="submit">
        </form> -->
    <script src="bootstrap.bundle.min.js"></script>
    <script src="main.js"></script>
</body>

</html>