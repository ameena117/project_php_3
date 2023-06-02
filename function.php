<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Login</h4>
                    </div>
                    <form action="" method="post">
                        <div class="card-body">
                            <div class="form-group mb-2">
                                <label for="email">Your email</label>
                                <input type="text" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <label for="password">Your password</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <?php
                            if(isset($_POST['email'])){
                                $email=$_POST['email'];
                                $password=$_POST['password'];
                                Users($email, $password);
                            }
                            ?>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script></body>
</html>
<?php
function Users($email, $password){   
    //echo "User Function";
    //return "User Function";
    //$x = "User Function";
    //return $x;
    $users=[
        [
            'email'=>'a@a.com',
            'password'=>'123',
            'name'=>'User A'
        ],
        [
            'email'=>'b@a.com',
            'password'=>'123',
            'name'=>'User B'
        ],
        [
            'email'=>'c@a.com',
            'password'=>'123',
            'name'=>'User C'
        ],
        [
            'email'=>'d@a.com',
            'password'=>'123',
            'name'=>'User D'
        ],
    ];

//Users();
if($email !=null && $password !=null){

    $user=array_search($email, array_column($users,'email'));
    if($user !==false){
        $user=$users[$user];
        //var_dump($user);
        if($user['password']==$password){
            $_SESSION['LOGIN']=1;
            $_SESSION['Email']=$email;
            $_SESSION['name']=$user['name'];
            header('Location:home.php');
        }
        else{
            echo '<div class="alert alert-danger">Your Email or Password invalid </div>';
        }    
    }
        else{
            echo '<div class="alert alert-danger">Your Email or Password invalid </div>';
        }    
}
}