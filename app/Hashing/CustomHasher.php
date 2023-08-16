<?php

namespace App\Hashing;

use SensitiveParameter;

class TokenHasher
{
    /**
     * @param string $token
     * @return string
     */
    public function hash(#[SensitiveParameter] string $token): string
    {
        return hash('sha256', $token);
    }
}