<?php

header('Content-type: text/xml; charset=utf-8');

$token_example = '6a52f85027a5477719d6c650ea3338fd';

$uri = 'http://myne.api/comments?id_review=1';

$headers = array(
    "X-Myne-Token:" . $token_example,
    "Content-Type: application/xml"
);

$ch = curl_init($uri);

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$sCurlResponse = curl_exec($ch);

print_r($sCurlResponse);

echo curl_error($ch);

curl_close($ch);
