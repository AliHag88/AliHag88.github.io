<?php
header('Content-Type: application/json');
$ip = $_SERVER['REMOTE_ADDR'];
$file = 'ips.txt';
$ips = file_exists($file) ? file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) : [];

if (!in_array($ip, $ips)) {
    $ips[] = $ip;
    file_put_contents($file, implode(PHP_EOL, $ips) . PHP_EOL, LOCK_EX);
}

echo json_encode(['count' => count($ips)]);
?>
