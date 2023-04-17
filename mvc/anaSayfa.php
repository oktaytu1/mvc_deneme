<!DOCTYPE html>
<html lang="tr">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body class="bg-secondary">

    <div class="modal-header p-5 pb-1 border-bottom-0">

        <?php 
        include("kaynak/baglanti.php");
        session_start();
        //tabloların verileri
        if ($_SESSION["ad"]=="yazar") {
            echo '<h3 class="h3">Hoş Geldiniz : '.$_SESSION["ad"].'</h3>';
            $bul="select * from yazar";
            $kayit=$baglanti->query($bul);
        }
        else if ($_SESSION["ad"]=="user") {
            echo '<h3 class="h3">Hoş Geldiniz : '.$_SESSION["ad"].'</h3>
                <form class="" action="parola.php" method="POST">
                    <button class="w-100 mb-2 btn btn-lg rounded-3 btn-danger" type="submit" name="btn_parolaDegis">
                    Parola Değiştir</button>
                </form>
            ';
            $_SESSION["ad"]="user";
            $bul="select * from user";
            $kayit=$baglanti->query($bul);
        }
        else{
            echo '<h1>  <a href="giris.php">  Giriş yapınız    </a>    </h1>';
        }
        ?>
    </div>
   

<?php
if($_SESSION["ad"]=="user")//user kullanıcısı girdiyse sayfa yükleniyor
{
echo '
<div class="modal-header p-5 pb-4 border-bottom-0">
        <table class="table table-striped table-dark p-5">
            <thead>
                <tr>
                    <th scope="col">Fotoğraf ID</th>
                    <th scope="col">Fotoğraf</th>
                </tr>
            </thead>
            <tbody>
';

    if ($kayit->num_rows>0) {
        while ($satir=$kayit->fetch_assoc()) {
          echo  '<tr>
          <td>'.$satir["id"].'</td>
          <td> <img src=" '.$satir["foto_url"].' "> </td>
          </tr>';
        }
      }
            echo '
            </tbody>
        </table>
    </div>
';
}

if($_SESSION["ad"]=="yazar")//yazar kullanıcısı girdiyse sayfa yükleniyor
{
echo '
<div class="modal-header p-5 pb-4 border-bottom-0">
        <table class="table table-striped table-dark p-5">
            <thead>
                <tr>
                    <th scope="col">Yazi ID</th>
                    <th scope="col">Yazi</th>
                </tr>
            </thead>
            <tbody>
';

    if ($kayit->num_rows>0) {
        while ($satir=$kayit->fetch_assoc()) {
          echo  '<tr>
          <td>'.$satir["id"].'</td>
          <td> '.$satir["yazi"].' </td>
          </tr>';
        }
      }
            echo '
            </tbody>
        </table>
    </div>
';
}

?>
    </body>
</html>