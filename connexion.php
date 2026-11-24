<?php

try {
  $base = new PDO('mysql:host=127.0.0.1;dbname=ludotheque', 'root', '');
  $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
}

?>
