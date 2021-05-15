<?php
require "config.php";
require "header.php";?>
    <div class="container">
        <div class="card">
            <div class="card-header text-white bg-dark mb-3 text-center ">
                <h1>LOGIN</h1>
            </div>

            <div class="card-body">
                <form method="post">
                    <div class="form-group">
                        <label for="exampleInputUsername1">Username</label>
                        <input type="username" class="form-control" name="username_login" value="<?php
                        if(isset($_COOKIE['username'])){echo $_COOKIE['username'];} ?>" id="username" placeholder="Username" required>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="password_login" value="<?php
                        if(isset($_COOKIE['password'])){echo $_COOKIE['password'];} ?>" id="password" placeholder="Password" required >
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="rm" id="rm">
                        <label class="form-check-label" for="exampleCheck1">Remember me</label>
                    </div>
                    <br>
                    <button type="submit" name="masuk" class="btn btn-active">Masuk</button>
                    <button type="submit" name="daftar" class="btn btn-info">Daftar</button>

                </form>
            </div>
        </div>
    </div>
<?php
if (isset($_POST["daftar"])){
    header('Location: daftar.php');}
if (isset($_POST["masuk"])){
    $username_log = $_POST["username_login"];
    $password_log = $_POST["password_login"];
    $data = "SELECT password FROM username where username=:username";
    $statement = $con->prepare($data);
    $statement->bindValue(":username",$username_log);
    $statement->execute();
    $result = $statement->fetch();
    if ($password_login === $result['password']){
        session_start();
        $_SESSION['username'] = $username_log;
        $_SESSION['password'] = $result['password'];
        if (isset($_POST['rm'])){
            setcookie('username', $username_log, time() + (60 * 60), '/');
            setcookie('password',$result['password'] , time() + (60 * 60), '/');
        }else{
            setcookie('username', "", time() + (0), '/');
            setcookie('password',"" , time() + (0), '/');
        }
        header('Location: show.php');
    }
}


?>
<?php require "footer.php"?>