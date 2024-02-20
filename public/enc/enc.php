<?php
$pk = file_get_contents(realpath(__DIR__.DIRECTORY_SEPARATOR.'key.pem'));
$kh = openssl_pkey_get_private($pk, "Software123");
$detalles = openssl_pkey_get_details($kh);

function to_hex($data)
{
    return strtoupper(bin2hex($data));
}
?>
