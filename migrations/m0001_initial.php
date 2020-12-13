<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 30.11.2020
 * Time: 15:50
 */
class m0001_initial
{
    public function up()
    {
        $db = \App\Application::$app->db;
        $SQL = "CREATE TABLE users (
                id INT AUTO_INCREMENT PRIMARY KEY, 
                email VARCHAR (255) NOT NULL, 
                firstname VARCHAR (255) NOT NULL,
                lastname VARCHAR (255) NOT NULL,
                status TINYINT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
          ) ENGINE=INNODB";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = \App\Application::$app->db;
        $SQL = "DROP TABLE users";
        $db->pdo->exec($SQL);
    }
}