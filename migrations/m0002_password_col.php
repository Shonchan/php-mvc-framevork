<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 30.11.2020
 * Time: 15:50
 */
class m0002_password_col
{
    public function up()
    {
        $db = \App\Application::$app->db;
        $SQL = "ALTER TABLE users ADD COLUMN password varchar (512) NOT NULL ";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = \App\Application::$app->db;
        $SQL = "ALTER TABLE users DROP COLUMN password";
        $db->pdo->exec($SQL);
    }
}