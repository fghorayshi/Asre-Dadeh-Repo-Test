<?php

namespace App\Services;

use Exception;

class RsaEncryptionService
{
    protected $privateKey;
    protected $publicKey;

    public function __construct()
    {
        $this->privateKey = openssl_pkey_get_private(file_get_contents(base_path(env('RSA_PRIVATE_KEY'))), env('RSA_PRIVATE_KEY_PASS'));
        $this->publicKey = openssl_pkey_get_public(file_get_contents(base_path(env('RSA_PUBLIC_KEY'))));
    }

    public function encrypt($data)
    {
        openssl_public_encrypt($data, $encrypted, $this->publicKey);
        return base64_encode($encrypted);
    }

    public function decrypt($encryptedData)
    {
        $data = base64_decode($encryptedData);
        openssl_private_decrypt($data, $decrypted, $this->privateKey);
        return $decrypted;
    }
}
