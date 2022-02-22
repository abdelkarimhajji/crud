<?php
    $conn =  mysqli_connect('localhost','root','','products')or die(mysqli_error($conn));
    $stmt = $conn->prepare("select * from employe");
    $stmt->execute();
    $result = $stmt->get_result(); 
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $delete = $conn->query("DELETE FROM employe WHERE matricule = $id")or die(mysqli_error($conn));
    }   
    
?>

        
    
        <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style3.css">
        <title>Document</title>
        <style>
            .p{
                color:red;
            }
            .img_back{
    background-image: url(IMG/mountain2.jpg);
    background-repeat: no-repeat;
    background-position: center;
    padding-top: 10%;
    height: 800px; 
  }
  .table_css{
width: 80%;
margin-left:8%;
  }
  .td{
    color: white;
    position: relative;
    top:30px;
   left:15px;
    
}
.td2{
    color: white;
    position: relative;
    top:30px;
   
}
        </style>
    </head>
    <body>
   
    <div id="sideNav">
        <nav>
            <ul>
                <div class="j"><li class="h"><a href="form.php">Home</a></li></div>
                <div class="j"><li class="h"><a href="#">About US</a></li></div>
                <div class="j"><li class="h"><a href="index3.html">Activites</a></li></div>
                <div class="j"><li class="h"><a href="#">teachers</a></li></div>
                <div class="j"><li class="h"><a href="#contact">Contact</a></li></div>
                
            </ul>
        </nav>
    
    </div>
    <div id="manuBtn">
        <img src="IMG/menu.png"id="menu">
        </div>
        <div class="img_back">
        
    <table class="table table_css">
        <thead>
            <tr>
            <th scope="col">Photo</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Birth Day</th>
            <th scope="col">Matricule</th>
            <th scope="col">Department</th>
            <th scope="col">Salary</th>
            <th scope="col">Fonction</th>
            <th scope="col">button</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        while($row = $result->fetch_assoc()):?>
        <?php $photo  = $row['photo'];?>
            <tr>
                <td><?php echo "<img src='IMG/$photo'class='karim'>"?>
                </td>
                <td><?php echo $row['firstname'];?></td>
                <td><?php echo $row['lastname'];?></td>
                <td><?php echo $row['birth'];?></td>
                <td><?php echo $row['matricule'];?></td>
                <td><?php echo $row['department'];?></td>
                <td><?php echo $row['salary'];?></td>
                <td><?php echo $row['fnction'];?></td>
                <td><a href="form.php?edit=<?php echo $row['matricule'];?>"class="btn btn-info td">Edit</a></td>
                <td><a href="all.php?delete=<?php echo $row['matricule'];?>"class="btn btn-danger td">Delet</a></td>
            </tr>
        <?php endwhile; ?>
        
        </tbody>
    </table>
    </div>

    <form action="all.php" method="POST" >
      <select style="height:40px !important; border-radius:7px;" name="select">
        <option value="matricule">Matricule</option>
        <option value="nom">Nom</option>
        <option value="departemnt">Departement</option>
      </select>
      <input name="search_input" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button name="search_btn" class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>

        <script src="bootstrap.bundle.min.js"></script>
        <script src="main.js"></script>
    </body>
    </html>
    <!-- 
        echo "<tr><td>"."<img src='IMG/$photo'class='karim'>"."<td class='td'>".$row['firstname']."</td>"."<td class='td'>".$row['lastname']."</td>"."<td class='td2'>".$row['birth']."<td class='td'>".$row['matricule']."</td>"."<td class='td'>".$row['department']."</td>"."<td class='td2'>".$row['salary']."<td class='td2'>".$row['fnction']."</td>"."</td>"."<td>"."<a href='database.php?edit='".$row['matricule']."class='btn btn-info td'>Edit</a>"."</td>"; -->