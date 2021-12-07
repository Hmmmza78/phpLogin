<?php
include 'connection.php';

$msg = "";

if (isset($_POST['saveData'])){
//  checking the credentials filled by the user by POST method
    $name =  $_POST["name"];
    $uname = $_POST["uname"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];
// check for pre-existing email
    $emailCheck = mysqli_query($conn,"select * from users where email ='$email'");
    $eCount= mysqli_num_rows($emailCheck);
// recation to an existing email
    if ($eCount>0){
        $msg = "<div class='alert alert-danger' role='alert'>
  This email already exists!
</div>";
echo $msg;
    }
    // check for pre-existing username
    else {
        $unameCheck = mysqli_query($conn,"select * from users where email ='$uname'");
        $unameCount= mysqli_num_rows($unameCheck);
    // reaction to pre-existing username
        if ($unameCount>0){
        $msg = "<div class='alert alert-danger' role='alert'>
  This username already exists!
</div>";
    }
    // Adding data to the database if everything goes right
    else{
      $query =  mysqli_query($conn, "insert into users(name, username,email, password) values('$name','$uname','$email','$pwd')");
    if($query){
        $msg = "<div class='alert alert-success' role='alert'>
  User Registered!
</div>";
echo $msg;
    }
    // Main code Ends here, Belo is just a safety step- in case of any accident
    // reaction to any unprecedented accident
    else {$msg = "<div class='alert alert-danger' role='alert'>
  Something Went wrong!
</div>";
echo $msg;}
    }
    }
}


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>php Login Temaplate</title>
</head>

<body>
   
    <div class="container my-5 mx-auto">
        <form action="" method="post" class="form card bg-light" id="form">
            <div class="bg-white text-center my-3 pt-2">
                <h2>php Login Template</h2>
            </div>

            <div class="form-group w-50 my-3 mx-auto">
                <label class="form-control my-2 border-0" for="name">Enter Your Name</label>
                <input type="text" name="name" id="name" required class="form-control">
            </div>
            <div class="form-group w-50 my-3 mx-auto">
                <label class="form-control my-2 border-0" for="uname">Enter Your UserName</label>
                <input type="text" name="uname" id="uname" required class="form-control">
            </div>
            <div class="form-group w-50 my-3 mx-auto">
                <label class="form-control my-2 border-0" for="password">Enter Your Password</label>
                <input type="password" name="pwd" required id="pwd" class="form-control">
            </div>
            <div class="form-group w-50 my-3 mx-auto">
                <div>
                    <label class="form-control my-2 border-0" for="email">Enter Your Email</label>
                    <input type="email" name="email" required id="email" class="form-control">
                </div>
            </div>
            <input name="saveData" type="submit" class="btn btn-primary h-50 m-4 w-25 mx-auto" id="submit" value="Login"></input>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>