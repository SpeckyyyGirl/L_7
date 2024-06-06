<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./sign.css">
    <title>Sign UP</title>
</head>
<body>
    <?php
        require('./database.php');
        if (isset($_GET['id_up'])) {
            $id_up=$_GET['id_up'];
            $data=crud::userDataPerId($id_up);
        }
        if (isset($_POST['signUP_button'])) {
            $name=$_POST['name'];
            $lastName=$_POST['matric'];
            $email=$_POST['password'];
            $password=$_POST['role'];
           if (!empty($_POST['name'])&& !empty($_POST['matric'])&& !empty($_POST['password'])&&!empty($_POST['role'])) {
    
                $p=crud::database()->prepare('UPDATE users SET name=:n,matric=:m,password=:p,role=:r where id=:id');
                $p->bindValue(':id',$id_up);
                $p->bindValue(':n', $name);
                $p->bindValue(':m', $matric);
                $p->bindValue(':p', $password);
                $p->bindValue(':r',$role);
                $p->execute();
                echo 'Updated!';

            }
           }
        

    ?>
    <div class="form">
        <div class="title">
            <p>Updating user data</p>
        </div>
        <form action="" method="post">
            <input type="text" name="name" placeholder="Name" value="<?php if(isset($data)){
echo $data['name'];
            } ?>">
            <input type="text" name="matric" placeholder="Matric" value="<?php if(isset($data)){
echo $data['matric'];
            } ?>">
            <input type="password" name="password" placeholder="Password" value="<?php if(isset($data)){
echo $data['password'];
            } ?>">
            <input type="text" name="role" placeholder="Role" value="<?php if(isset($data)){
echo $data['role'];
            } ?>">
            <input type="submit" value="UPDATE" name="signUP_button"> 
        </form>
    </div>
</body>
</html>