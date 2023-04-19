<!DOCTYPE html>
<html lang="tr">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body class="bg-secondary">

    <div class="modal-header p-5 pb-1 border-bottom-0">


<?php   //tablodaki butonların işlevleri
include("kaynak/baglanti.php");


//user tablosu (fotoğrafların olduğu)
if (isset($_POST["btn_fotoSil"]) ) 
{ 
    $fotoId = $_POST["btn_fotoSil"];//butonun value değeri alınıyor
    $sqlSil="delete from user where id='$fotoId'";
    $calistir=mysqli_query($baglanti,$sqlSil);
    echo "<h1>ID si '$fotoId' olan fotoğraf silindi</h1>";
}

//yazar tablosu
if (isset($_POST["btn_YaziSil"]) ) 
{ 
    $yaziId = $_POST["btn_YaziSil"];//butonun value değeri alınıyor
    $sqlSil="delete from yazar where id='$yaziId'";
    $calistir=mysqli_query($baglanti,$sqlSil);
    echo "<h1>ID si '$yaziId' olan yazı silindi</h1>";
}

//"kullanicilar" tablosu
if (isset($_POST["btn_kullaniciEkle"]) ) 
{ 
    header("location:kayit.php");
}
else if (isset($_POST["btn_kullaniciSil"]) ) 
{ 
    $kullamiciId = $_POST["btn_kullaniciSil"];//butonun value değeri alınıyor
    $sqlSil="delete from kullanicilar where id='$kullamiciId'";
    $calistir=mysqli_query($baglanti,$sqlSil);
    echo "<h1>ID si '$kullamiciId' olan kullanıcı silindi</h1>";
}
if (isset($_POST["btn_kullaniciParola"]) ) 
{ 
    $yeniParola=$_POST["txt_parola"];
    $kullaniciId = $_POST["btn_kullaniciParola"];//butonun value değeri alınıyor
    $sqlGuncelle="update kullanicilar SET parola = '$yeniParola' where id='$kullaniciId'";
    $calistir=mysqli_query($baglanti,$sqlGuncelle);
    echo "<h1>ID si '$kullaniciId' olan kullanıcının parolası güncellendi</h1>";
}

        //tabloların verileri
        session_start();
        if ($_SESSION["id"]==1) {
            echo '<h3 class="h3">Hoş Geldiniz : ADMİN</h3>';
            $bul1="select * from user";
            $kayit1=$baglanti->query($bul1);

            $bul2="select * from yazar";
            $kayit2=$baglanti->query($bul2);

            $bul3="select * from kullanicilar";
            $kayit3=$baglanti->query($bul3);
        }
        else{
            echo '<h1>  <a href="giris.php">  Giriş yapınız    </a>    </h1>';
        }
        ?>
    </div>
   
<?php
if($_SESSION["id"]==1)//admin kullanıcısı girdiyse sayfa yükleniyor
{
echo '
                                        <!--   "USER" tablosu   -->
<form action="admin.php" method="POST">
<div class="modal-header p-5 pb-4 border-bottom-0">
        <table class="table table-striped table-dark p-5">
            <thead>
                <tr>
                    <th>USER VERİLERİ</th>
                </tr>
                <tr>
                    <th scope="col">Fotoğraf ID</th>
                    <th scope="col">Fotoğraf</th>
                    <th scope="col">Fotoğraf İşlemleri</th>
                </tr>
            </thead>
            <tbody>
';

    if ($kayit1->num_rows>0) {
        while ($satir=$kayit1->fetch_assoc()) {
          echo  '<tr>
          <td>'.$satir["id"].'</td>
          <td> <img src=" '.$satir["foto_url"].' "> </td>
          <td><button class="btn btn-lg rounded-3 btn-danger" type="submit" name="btn_fotoSil" value="'.$satir["id"].'">Sil</button></td>
          </tr>';
        }
      }
            echo '
            </tbody>
        </table>
    </div>
    </form>
<hr>

                                        <!--   "YAZAR" tablosu   -->
<form action="admin.php" method="POST">
<div class="modal-header p-5 pb-4 border-bottom-0">
        <table class="table table-striped table-dark p-5">
            <thead>
                <tr>
                    <th>YAZAR VERİLERİ</th>
                </tr>
                <tr>
                    <th scope="col">Yazı ID</th>
                    <th scope="col">Yazı</th>
                    <th scope="col">Yazı İşlemleri</th>
                </tr>
            </thead>
            <tbody>
';

    if ($kayit2->num_rows>0) {
        while ($satir=$kayit2->fetch_assoc()) {
          echo  '<tr>
          <td>'.$satir["id"].'</td>
          <td> '.$satir["yazi"].' </td>
          <td><button class="btn btn-lg rounded-3 btn-danger" type="submit" name="btn_YaziSil" value="'.$satir["id"].'">Sil</button></td>
          </tr>';
        }
      }
            echo '
            </tbody>
        </table>
    </div>
    </form>
    <hr>
    
                                        <!--   "kullanicilar" tablosu   -->
    <form action="admin.php" method="POST">
    <div class="modal-header p-5 pb-4 border-bottom-0">
            <table class="table table-striped table-dark p-5">
                <thead>
                    <tr>
                        <th>BÜTÜN KULLANICILAR</th>
                        <th><button class="btn btn-lg rounded-3 btn-light" type="submit" name="btn_kullaniciEkle">Kullanici Ekle</button></th>
                        <th scope="col"></th>
                        <th scope="col"><input name="txt_parola" type="text" class="form-control rounded-3"placeholder="Yeni Parola"></th>
                    </tr>
                    <tr>
                        <th scope="col">Kullanıcı ID</th>
                        <th scope="col">Kullanıcı Adı</th>
                        <th scope="col">Kullanıcı Parola</th>
                        <th scope="col">Kullanıcı İşlemleri</th>
                    </tr>
                </thead>
                <tbody>
    ';
    $i=1;//kaçıncı satır olduğu bilgisinde kullanılacak
        if ($kayit3->num_rows>0) {
            while ($satir=$kayit3->fetch_assoc()) {
              echo  '<tr>
              <td >'.$satir["id"].'</td>
              <td>'.$satir["ad"].'</td>
              <td>'.$satir["parola"].'</td>

              <td>';
                if($i!=1){//adminde silme olmayacak
                    echo '<button class="btn btn-lg rounded-3 btn-danger" type="submit" name="btn_kullaniciSil" value="'.$satir["id"].'">Sil</button>';
                }
              echo'
              <button class="btn btn-lg rounded-3 btn-warning" type="submit" name="btn_kullaniciParola" value="'.$satir["id"].'">Parolasını Değiştir</button>
              </td>
              </tr>';
              $i++;
            }
          }
                echo '
                </tbody>
            </table>
        </div>
        </form>
';
}

?>
    </body>
</html>