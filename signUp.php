<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./sign.css">
    <title>Sign UP</title>

    <style>
        /* Center the message */
        .center {
            text-align: center;
            margin-top: 20px;
        }
</style>

</head>

<body>
<?php
require('./database.php');
if (isset($_POST['signUP_button'])) {
    $name=$_POST['name'];
    $matric=$_POST['matric'];
    $password=$_POST['password'];
    $role=$_POST['role'];
    
    if (!empty($_POST['name']) && !empty($_POST['matric']) && !empty($_POST['password']) && !empty($_POST['role'])) 
    {
        $p=Crud::connect()->prepare('INSERT INTO users(name,matric,password,role) VALUES(:n,:m,:p,:r)');
        $p->bindValue(':n', $name);
        $p->bindValue(':m', $matric);
        $p->bindValue(':p', $password);
        $p->bindValue(':r',$role);
        $p->execute();
        echo '<script>alert("Added successfully!");</script>';
    } else {
        echo 'You have registered!';
    }
}
?>

    <div class="form">
        <div class="title">
            <p>Register Form</p>
        </div>
        <form action="" method="post">
            <input type="text" name="matric" placeholder="Matric" required>
            <input type="text" name="name" placeholder="Name" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="text" name="role" placeholder="Role (Lecturer/Student)" required>
            <input type="submit" value="Sign UP" name="signUP_button"> 
            <a href="./login.php">Do you have account? Sign in</a>
        </form>
    </div>
</body>
</html>