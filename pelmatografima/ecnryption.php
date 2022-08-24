<?php   
    function encrypt($key, $payload) {
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        $encrypted = openssl_encrypt($payload, 'aes-256-cbc', $key, 0, $iv);
        return base64_encode($encrypted . '::' . $iv);
    }
    function decrypt($key, $garble) {
        list($encrypted_data, $iv) = explode('::', base64_decode($garble), 2);
        // echo $encrypted_data;
        // echo $iv;
        return openssl_decrypt($encrypted_data, 'aes-256-cbc', $key, 0, $iv);
    }
