<?php

/**
 * Created by PhpStorm.
 * User: Evheni
 * Date: 12/27/2015
 * Time: 02:20
 */
class Database
{
    protected $config;
    var $connection;

    public function __construct()
    {
        $this->config = new Config();
        $dsn = "mysql:host=" . $this->config->DB_HOST .
            ";dbname=" . $this->config->DB_NAME . ";charset=utf8";
        $opt = array(
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );

        try {

            $DB = new PDO ($dsn, $this->config->DB_USERNAME, $this->config->DB_PASSWORD, $opt);
        }
        catch (PDOException $DB) {
            exit ('Error connect to database!');
        }

        $DB -> query ("SET character_set_client = utf8");
        $DB -> query ("SET NAMES 'utf8'");
    }
}