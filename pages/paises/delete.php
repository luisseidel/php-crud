<?php

if (isset($_POST['delete']) && isset($_POST["id"])) {
    //deletePais($_POST["id"]);

    print_r("Entrou 3");
    exit();
}

function deletePais($id) {
    $sql = "DELETE FROM paises WHERE id = :id";
    $stmt = getConnection()->prepare($sql);
    $stmt->bindParam(':id', $id);

    $result = $stmt->execute();
    
    if (!$result) {
        var_dump($stmt->errorInfo());
        exit;
    }
}
?>