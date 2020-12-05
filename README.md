# Barış Demirdelen - T.C. Kimlik No Doğrulama Sistemi

#Kullanım
```sh
include 'validation.php';
$validation = validation("tc_kimlik_no", "ad", "soyad", "dogum_yili");
if ($validation == true){
   echo 'T.C. Doğrulama Başaralı';
} else {
   echo 'Başarısız';
}
```sh
