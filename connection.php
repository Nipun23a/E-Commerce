<?php
class Database {
    public static $connection;

    public static function setUpConnection() {
        if (!isset(Database::$connection)) {
            Database::$connection = new mysqli("localhost", "root", "", "webvivadb", "3306");
        }
    }

    public static function iud($query, $types = '', ...$params) {
        Database::setUpConnection();
        $stmt = Database::$connection->prepare($query);
        if ($types !== '') {
            $stmt->bind_param($types, ...$params);
        }
        $stmt->execute();
        $stmt->close();
    }

    public static function search($query, $types = '', ...$params) {
        Database::setUpConnection();
        $stmt = Database::$connection->prepare($query);
        if ($types !== '') {
            $stmt->bind_param($types, ...$params);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result;
    }
}
?>