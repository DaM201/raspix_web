<?php
// Otevření nebo vytvoření souboru system_information.txt v režimu append
$file = fopen('system_information.txt', 'a');

// Získání aktuálního času
$currentDateTime = date('Y-m-d H:i:s');

// Získání IP adresy klienta
$clientIP = $_SERVER['HTTP_CLIENT_IP'] ?? $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'];

// Získání dalších informací pomocí User-Agent hlavičky
$userAgent = $_SERVER['HTTP_USER_AGENT'] ?? '';

// Další informace o klientovi
$acceptCharset = $_SERVER['HTTP_ACCEPT_CHARSET'] ?? 'Neznámé ACCEPT_CHARSET';
$acceptEncoding = $_SERVER['HTTP_ACCEPT_ENCODING'] ?? 'Neznámé ACCEPT_ENCODING';
$acceptLanguage = $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? 'Neznámé ACCEPT_LANGUAGE';
$connection = $_SERVER['HTTP_CONNECTION'] ?? 'Neznámé CONNECTION';
$referer = $_SERVER['HTTP_REFERER'] ?? 'Neznámý REFERER';
$host = $_SERVER['HTTP_HOST'] ?? 'Neznámý HOST';
$forwarded = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? 'Neznámý X_FORWARDED_FOR';
$language = $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? 'Neznámý jazyk';

// Další informace o žádosti
$httpMethod = $_SERVER['REQUEST_METHOD'] ?? 'Neznámá metoda';
$requestScheme = $_SERVER['REQUEST_SCHEME'] ?? 'Neznámé REQUEST_SCHEME';
$requestTime = $_SERVER['REQUEST_TIME'] ?? 'Neznámý REQUEST_TIME';
$requestTimeFloat = $_SERVER['REQUEST_TIME_FLOAT'] ?? 'Neznámý REQUEST_TIME_FLOAT';
$queryString = $_SERVER['QUERY_STRING'] ?? 'Neznámý QUERY_STRING';
$remotePort = $_SERVER['REMOTE_PORT'] ?? 'Neznámý REMOTE_PORT';

// Další informace o serveru
$serverSoftware = $_SERVER['SERVER_SOFTWARE'] ?? 'Neznámý server';
$documentRoot = $_SERVER['DOCUMENT_ROOT'] ?? 'Neznámý DOCUMENT_ROOT';
$serverAdmin = $_SERVER['SERVER_ADMIN'] ?? 'Neznámý SERVER_ADMIN';
$serverSignature = $_SERVER['SERVER_SIGNATURE'] ?? 'Neznámý SERVER_SIGNATURE';

// Další informace o PHP
$phpVersion = phpversion();

// Záznam do souboru
$information = "$currentDateTime NEW CONNECTION:\n";
$information .= "IP adresa klienta: $clientIP\n";
$information .= "User-Agent: $userAgent\n";
$information .= "ACCEPT_CHARSET: $acceptCharset\n";
$information .= "ACCEPT_ENCODING: $acceptEncoding\n";
$information .= "ACCEPT_LANGUAGE: $acceptLanguage\n";
$information .= "CONNECTION: $connection\n";
$information .= "REFERER: $referer\n";
$information .= "HOST: $host\n";
$information .= "X_FORWARDED_FOR: $forwarded\n";
$information .= "LANGUAGE: $language\n";
$information .= "HTTP metoda: $httpMethod\n";
$information .= "Request Scheme: $requestScheme\n";
$information .= "Request Time: $requestTime\n";
$information .= "Request Time Float: $requestTimeFloat\n";
$information .= "Query String: $queryString\n";
$information .= "Remote Port: $remotePort\n";
$information .= "Server's software: $serverSoftware\n";
$information .= "Document Root: $documentRoot\n";
$information .= "Server Admin: $serverAdmin\n";
$information .= "Server Signature: $serverSignature\n";
$information .= "Version PHP: $phpVersion\n\n";

$browser = "Neznámý prohlížeč";
$os = "Neznámý operační systém";

if (strpos($userAgent, 'Windows') !== false) {
    $os = "Windows";
} elseif (strpos($userAgent, 'Macintosh') !== false) {
    $os = "macOS";
} elseif (strpos($userAgent, 'Linux') !== false) {
    $os = "Linux";
}

if (strpos($userAgent, 'Firefox') !== false) {
    $browser = "Mozilla Firefox";
} elseif (strpos($userAgent, 'Chrome') !== false) {
    $browser = "Google Chrome";
} elseif (strpos($userAgent, 'Safari') !== false) {
    $browser = "Safari";
} elseif (strpos($userAgent, 'MSIE') !== false || strpos($userAgent, 'Trident/') !== false) {
    $browser = "Internet Explorer";
}

$information .= "REMOTE_PORT: $remotePort\n";
$information .= "BROWSER: $browser\n";
$information .= "OPERATION SYSTEM: $os\n\n";

fwrite($file, $information);

fclose($file);

header("Location: home.html");
exit;

?>
