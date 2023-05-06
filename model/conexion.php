<?php

class Conexion
{
  static public function conn()
  {
    $link = new PDO("mysql:host=127.0.0.1;dbname=servdeskqroma","root","");
		$link->exec("set names utf8");
		return $link;
  }
}