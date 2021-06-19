<?php  
function insertPais($nome, $sigla) {
    $sql = "INSERT INTO paises (nome, sigla) VALUES(:nome, :sigla)";
    $stmt = getConnection()->prepare( $sql );
    $stmt->bindParam( ':nome', $nome );
    $stmt->bindParam( ':sigla', $sigla );
        
    $result = $stmt->execute();

    if (!$result) {
        var_dump( $stmt->errorInfo() );
        exit;
    }
}

function editPais($id) {
    $sql = "SELECT * FROM paises WHERE id = :id";
    $stmt = getConnection()->prepare($sql);
    $stmt->bindParam(':id', $id);

    $result = $stmt->execute();

    if (!$result) {
        var_dump($stmt->errorInfo());
        exit;
    }

    return $result;
}

function updatePais($id) {
    $nome = $_POST['nome'];
    $sigla = $_POST['sigla'];

    $sql = "UPDATE  paises 
            SET     nome = :nome
            ,       sigla = :sigla
            ,       updated_at = NOW()
            WHERE   id = :id";

    $stmt = getConnection()->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':sigla', $sigla);
    $stmt->bindParam(':id', $id);

    $result = $stmt->execute();

    if (!$result) {
        var_dump($stmt->errorInfo());
        exit;
    }
}
if (isInsert()):
    insertPais($_POST['nome'], $_POST['sigla']);
?>

<script>
    window.location.assign("?page=paises/list");
</script>

<?php
elseif(isUpdate()):
    updatePais($_POST["id"]);
?>

<script>
    window.location.assign("?page=paises/list");
</script>

<?php
elseif(isEdit()):
    if(isset($_GET["id"])):
        $result = getById('paises', $_GET["id"]);
    endif;
endif;

function isInsert(): bool {
    return !isset($_GET["id"]) && isset($_POST['send']) && (isset($_POST['nome']) && isset($_POST['sigla']));
}

function isEdit() {
    return isset($_GET["id"]);
}

function isUpdate() {
    return isset($_POST['send']) && isset($_POST["id"]);
}
?>

<div class="dflex fd-col al-cen">

    <h2 class="page-title">Cadastro de Países</h2>

    <div class="actions">
        <a href="?page=paises/list" class="listar">
            <i class="fas fa-plus"></i>
            <span>Listar</span>
        </a>
    </div>

    <form action="" method="post" class="dflex al-cen jc-cen insert-form">
        <input type="hidden" name="id" value="<?= $result[0]['id']?>">
        <fieldset class="dflex al-cen jc-cen">
            <div>
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" value="<?php isEdit() ? $result[0]['nome'] : '' ?>" required>
            </div>
            <div>
                <label for="sigla">Sigla</label>
                <input type="text" name="sigla" id="sigla" value="<?php isEdit() ? $result[0]['sigla'] : '' ?>" required>
            </div>
            <?php if (isEdit()): ?>
            <div>
                <label for="update">Updated At</label>
                <input type="text" name="updated" id="updated" value="<?php isEdit() ? $result[0]['updated_at'] : '' ?>" disabled>
            </div>
            <?php endif; ?>
        </fieldset>
        <div class="actions">
            <button name="send" value="save" type="submit" >
                <i class="fas fa-plus"></i>
                <span>Salvar</span>
            </button>
        </div>
    </form>

</div>