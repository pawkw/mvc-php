<?php
class Database {
    public static $host = '127.0.0.1';
    public static $dbName = 'mvc_php';
    public static $userName = 'mvc_php';
    public static $password = 'U8xuqdoZo0f7Wlip';

  private static function connect() {
    $pdo = new PDO("mysql:host=".self::$host.";dbname=".self::$dbName.";charset=utf8", self::$userName, self::$password);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
  }
  public static function query($query, $params = array()) {
    $stmt = self::connect()->prepare($query);
    $stmt->execute($params);

    if(explode(' ', $query)[0] == 'SELECT') {
        $data = $stmt->fetchAll();
        return $data;
    }
  }
}
