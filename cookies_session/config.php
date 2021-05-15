<?php
try {
    $con = new PDO('mysql:host=localhost;dbname=tugas','root','');
}catch (PDOException $e){
    var_dump("Terjadi kesalahan dalam database dengan kode : " . $e->getMessage());
}
?>
