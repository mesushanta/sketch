<?php

namespace Sketch\Framework\Database;

use Sketch\Framework\Helpers\EnvLoader;
use PDO;
use Exception;

class Connection
{
    public static function establish() {
        $env = new EnvLoader();
        $env->load();
        $host = getenv('DB_HOST');
        $dbname =  getenv('DB_NAME');
        $username =  getenv('DB_USERNAME');
        $password =  getenv('DB_PASSWORD');
        try {
            $pdo = new PDO("mysql:host=" . $host. ";dbname=" . $dbname . ";charset=utf8", $username, $password);//        $pdo = new PDO("mysql:host=" . $host. ";dbname=" . $dbname . ";charset=utf8", $username, $password);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }catch (\Exception $e) {
            throw new Exception('Error creating a database connection');
        }
    }
}