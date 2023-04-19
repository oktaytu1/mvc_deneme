<?php
include("kaynak/baglanti.php");

if (isset($_POST["btn_kayitOl"]) ) 
{
    $ad=$_POST["txt_ad"];
	$parola=$_POST["txt_parola"];
	$parolaTekrar=$_POST["txt_parolaTekrar"];
    if ($ad==""||$parola==""||$parolaTekrar=="") {
		echo '<div>Gerekli Alanları Boş Bırakmayınız!</div>';
	}
	else{
        if($parola!=$parolaTekrar){
            echo '<div>İki Parolayı Da Aynı Giriniz!</div>';
        }
        else{
            $secim="INSERT INTO kullanicilar (ad, parola) VALUES ('$ad', '$parola')";
	        $calistir=mysqli_query($baglanti,$secim);
        	mysqli_close($baglanti);
            echo '<div>Kayıt Başarılı!</div>';
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
                  
                  <h1 class="fw-bold mb-0 fs-2">Kayıt Sayfası</h1>
                  <path d="M8.5 5.034v1.1l.953-.55.5.867L9 7l.953.55-.5.866-.953-.55v1.1h-1v-1.1l-.953.55-.5-.866L7 7l-.953-.55.5-.866.953.55v-1.1h1ZM13.25 9a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5ZM13 11.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5Zm.25 1.75a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5Zm-11-4a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5A.25.25 0 0 0 3 9.75v-.5A.25.25 0 0 0 2.75 9h-.5Zm0 2a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5ZM2 13.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5Z"/>
                    <path d="M5 1a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1a1 1 0 0 1 1 1v4h3a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h3V3a1 1 0 0 1 1-1V1Zm2 14h2v-3H7v3Zm3 0h1V3H5v12h1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3Zm0-14H6v1h4V1Zm2 7v7h3V8h-3Zm-8 7V8H1v7h3Z"/>
                  </svg>
                </div>
          
                <div class="modal-body p-5 pt-0">
                  <form action="kayit.php" method="POST">
                    <div class="form-floating mb-3">
                      <input name="txt_ad" type="text" class="form-control rounded-3" id="floatingInput" placeholder="Kullanıcı Adı">
                      <label for="floatingInput">Kullanıcı Adı</label>
                    </div>

                    <div class="form-floating mb-3">
                      <input name="txt_parola" type="text" class="form-control rounded-3" id="floatingInput" placeholder="Parola">
                      <label for="floatingInput">Parola</label>
                    </div>

                    <div class="form-floating mb-3">
                      <input name="txt_parolaTekrar" type="text" class="form-control rounded-3" id="floatingInput" placeholder="Parola Tekrar">
                      <label for="floatingInput">Parola Tekrar</label>
                    </div>

                    <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit" name="btn_kayitOl">Kayit Ol</button>
                    </form>
                    <hr>
                    <form action="giris.php">
                    <button class="w-100 mb-2 btn btn-lg rounded-3 btn-secondary" type="submit" name="btn_giris">Giriş Sayfası</button>
                    </form>
                </div>
              </div>
            </div>
          </div>
      </header>

  </body>
</html>