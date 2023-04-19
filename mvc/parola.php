<?php
session_start();
include("kaynak/baglanti.php");


if (isset($_POST["btn_parolaDegistir"])) 
{ 
	$eskiParola=$_POST["txt_eskiParola"];
	$yeniParola=$_POST["txt_yeniParola"];
    $ad=$_SESSION['ad']; 

	if ($eskiParola==""||$yeniParola=="") {
		echo '<div >Gerekli Alanları Boş Bırakmayınız!</div>';
	}
	else{
        $secim="SELECT * FROM kullanicilar WHERE ad='$ad' and parola='$eskiParola'";
	$calistir=mysqli_query($baglanti,$secim);
	$kayitSayisi=mysqli_num_rows($calistir);


	if ($kayitSayisi>0) {

    $secim = "UPDATE kullanicilar SET parola = '$yeniParola' WHERE ad='$ad'"; 

	$calistir=mysqli_query($baglanti,$secim);

	echo '<div >Parola Başarı İle Güncellendi</div>';

	mysqli_close($baglanti);
    }
    else{
        echo '<div >Eski Parola Yanlış</div>';
    }
	}
}


?>

<!doctype html>
<html lang="tr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body class="bg-secondary">
    <header>
        <div class="modal modal-signin position-static d-block bg-secondary py-3" tabindex="-1" role="dialog" id="modalSignin">
            <div class="modal-dialog" role="document">
              <div class="modal-content rounded-4 shadow">
                <div class="modal-header p-4 pb-4 border-bottom-0">
                  
                  <h1 class="fw-bold mb-0 fs-2">
                    <?php
                        echo $_SESSION["ad"];
                    ?>
                    İçin Parola Güncelle
                  </h1></svg>
                </div>
          
                <div class="modal-body p-5 pt-0">
                  <form action="parola.php" method="POST">
                    <div class="form-floating mb-3">
                      <input name="txt_eskiParola" type="text" class="form-control rounded-3" id="floatingInput" placeholder="Eski Parola">
                      <label for="floatingInput">Eski Parola</label>
                    </div>

                    <div class="form-floating mb-3">
                      <input name="txt_yeniParola" type="text" class="form-control rounded-3" id="floatingInput" placeholder="Yeni Parola">
                      <label for="floatingInput">Yeni Parola</label>
                    </div>

                    <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit" name="btn_parolaDegistir">Parola Değiştir</button>
                  </form>
                    <hr>
                    <form action="giris.php">
                    <button class="w-100 mb-2 btn btn-lg rounded-3 btn-danger" type="submit" name="btn_girisSayfasi">Giriş Sayfasına Dön</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
      </header>

  </body>
</html>