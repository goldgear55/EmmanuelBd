<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/validaNombre.php";
require_once __DIR__ . "/../lib/php/insert.php";
require_once __DIR__ . "/../lib/php/devuelveCreated.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_ELECTRODOMESTICO.php";

ejecutaServicio(function () {

 $nombre = recuperaTexto("nombre");

 $nombre = validaNombre($nombre);

 $pdo = Bd::pdo();
 insert(pdo: $pdo, into: ELECTRODOMESTICO, values: [PAS_NOMBRE => $nombre]);
 $id = $pdo->lastInsertId();

 $encodeId = urlencode($id);
 devuelveCreated("/srv/electrodomestico.php?id=$encodeId", [
  "id" => ["value" => $id],
  "nombre" => ["value" => $nombre],
 ]);
});