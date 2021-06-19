<?php

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

if (isset($_GET["id"])):
    deletePais($_GET["id"]);
?>

<script>
    window.location.assign("?page=paises/list");
</script>

<?php
endif;
?>