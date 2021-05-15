<?php
require "config.php";
require "header.php";
if (isset($_POST["simpan"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $statement = $con->prepare("INSERT INTO username (username,password) VALUES (:username,:password)");
    if (!empty($username) && !empty($password)) {
        $statement->bindValue(":username", $username);
        $statement->bindValue(":password", $password);
        $statement->execute();
        $success = "Selamat Anda sudah terdaftar !";
    } else {
        $failed = "Data yang Anda masukkan tidak boleh kosong !";
    }
}
if (isset($_POST["login_page"])){
    header('Location: index.php');}
?>

<div class="container">
    <div class="card">
        <div class="card-header text-white bg-dark mb-3 text-center ">
            <h1>DAFTAR</h1>
        </div>

        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Username" >

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" >
                </div>
                <?php if (!empty($success)): ?>
                    <div class="alert alert-success">
                        <?= $success; ?>
                    </div>
                <?php endif; ?>
                <?php if (!empty($failed)): ?>
                    <div class="alert alert-danger">
                        <?= $failed; ?>
                    </div>
                <?php endif; ?>
                <button type="submit" name="simpan" class="btn btn-warning">Simpan</button>
                <button type="submit" name="login_page" class="btn btn-active">Masuk</button>
            </form>
        </div>
    </div>
</div>
<?php require "footer.php"?>