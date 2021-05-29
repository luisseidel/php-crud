<?php

define( 'MYSQL_HOST', 'localhost' );
define( 'MYSQL_USER', 'root' );
define( 'MYSQL_PASSWORD', '' );
define( 'MYSQL_DB_NAME', 'phpoo' );

$PDO;

function getConnection() {

    if (!isset($PDO)) {
        try {
            return new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB_NAME, 
                            MYSQL_USER, 
                            MYSQL_PASSWORD 
                        );
        } catch ( PDOException $e ) {
            echo 'Erro ao conectar com o Banco de dados: ' . $e->getMessage();
        }
    }

    return $PDO;
}

function getFifthRows($table) {
    $sql = "SELECT * FROM $table LIMIT 50";
    $stmt = getConnection()->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

function getById($table, $id) {
    $sql = "SELECT * FROM $table WHERE id = :id";
    $stmt = getConnection()->prepare($sql);
    $stmt->bindParam( ':id', $id );
    $stmt->execute(
        [
            'id' => $id
        ]
    );
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}


function countResults($table) {
    $sql = "SELECT count(*) as qtd FROM $table";
    $stmt = getConnection()->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

?>