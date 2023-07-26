<?php

const BASEDIR = 'C:\xampp\htdocs\todo';
const URL = 'http://localhost/todo';


// Veritabanı bilgilerini girin
$dbHost = '127.0.0.1';   // Veritabanı sunucu adresi
$dbName = 'todo';   // Veritabanı adı
$dbUser = 'root';   // Veritabanı kullanıcı adı
$dbPass = '';   // Veritabanı şifresi

try {
    // PDO bağlantısını oluşturun
    $db = new PDO("mysql:host={$dbHost};dbname={$dbName}", $dbUser, $dbPass);

    // Hataları göstermek için PDO'da hata raporlamayı etkinleştirin
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Karakter setini ayarlayın (isteğe bağlı)
    $db->exec("SET CHARACTER SET utf8");

} catch (Exception $e) {
    $e -> getMessage();
}