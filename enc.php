<?php
  $TextoClaro = 'secret';
  $Cifra = 'AES-256-CBC';

  //$Chave = random_bytes(32);
  $Chave = base64_decode("ZsteBu1qSA9ZNXjajwAvbg==");
  
  $IV = random_bytes(16); 

  $TextoCifrado = openssl_encrypt($TextoClaro, $Cifra, $Chave, OPENSSL_RAW_DATA, $IV);

  $Resultado = base64_encode($TextoCifrado);
  echo $Resultado;

  //

  $out = base64_decode($Resultado);
  echo "<br><br>Result: ".openssl_decrypt($Resultado, $Cifra, $Chave, OPENSSL_RAW_DATA, $IV);

?>