<?php require "header.php"?>
<?php
session_start();

if (isset($_POST['keluar'])){
    session_destroy();
    header('Location: index.php');
}
?>
<div class="container">
    <div class="card">
        <div class="card-header text-white bg-dark mb-3 text-center ">
            <h2>SELAMAT DATANG</h2>
        </div>
        <div class="card-body">
            <div>
                <?= $_SESSION['username'];?>
            </div>
            <form method="post">
            <button type="submit" name="keluar" class="btn btn-danger">Keluar</button>
            </form>
        </div>
    </div>
</div>
<?php require "footer.php"?>
