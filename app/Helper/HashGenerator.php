<?php

function aba_generate_hash(array $params, string $apiKey): string
{
    ksort($params);
    $raw = '';
    foreach ($params as $key => $value) {
        $raw .= "{$key}={$value}&";
    }
    $raw = rtrim($raw, '&');
    return hash_hmac('sha256', $raw, $apiKey);
}
