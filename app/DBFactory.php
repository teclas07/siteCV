<?php
class DBFactory
{
  public static function getMysqlConnectionWithPDO()
  {
    $db = new PDO('mysql:host=localhost;dbname=sitecv', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $db;
  }
}
