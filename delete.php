<?php

require_once __DIR__ . "/CalculaArreglodeParametros.php";
require_once __DIR__ . "/calculaSqldeAsignaciones.php";

function delete(PDO $pdo,  string $from,  array $where)
{
 $sql = "DELETE FROM $from";

 if (sizeof($where) === 0) {
  $pdo->exec($sql);
 } else {
  $sqlDeWhere = calculaSqlDeAsignaciones(" AND ", $where);
  $sql .= " WHERE $sqlDeWhere";

  $statement = $pdo->prepare($sql);
  $parametros = calculaArregloDeParametros($where);
  $statement->execute($parametros);
 }
}