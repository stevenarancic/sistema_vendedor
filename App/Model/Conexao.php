<?php

namespace App\Model;

use PDO, PDOException;

class Conexao
{
    private static $instance;
    public static function getInstance()
    {
        try {
            if (!isset(self::$instance)) {
                $host = "mysql:host=localhost;dbname=sistemavendedor;charset=utf8";
                $user = "root";
                $pass = "";

                self::$instance = new PDO($host, $user, $pass);
            }
            return self::$instance;
        } catch (PDOException $e) {
            return "
                Erro ao conectar ao banco de dados!
                <br>
                Erro: $e";
        }
    }
}
