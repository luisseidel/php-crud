<?php
        if (isset($_POST['send']) && (isset($_POST['nome']) && isset($_POST['sigla']))) {
            insertPais($_POST['nome'], $_POST['sigla']);

            print_r("Entrou 1");
            exit();

        } else if (isset($_POST['edit']) && isset($_POST["id"])) {
            editPais($_POST["id"]);
            print_r("Entrou 2");
            exit();

        }
        
        function insertPais($nome, $sigla) {
            $sql = "INSERT INTO paises (nome, sigla) VALUES(:nome, :sigla)";
            $stmt = getConnection()->prepare( $sql );
            $stmt->bindParam( ':nome', $nome );
            $stmt->bindParam( ':sigla', $sigla );
             
            $result = $stmt->execute();
        
            if ( ! $result ) {
                var_dump( $stmt->errorInfo() );
                exit;
            }
         
            echo "Registro Inserido";
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
        }

        function url(){
            return sprintf(
              "%s://%s",
              isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
              $_SERVER['SERVER_NAME'],
            );
        }
    ?>
<div class="dflex fd-col al-cen">

    <h2 class="page-title">Cadastro de Países</h2>

    <form action="" method="post" class="dflex al-cen jc-cen insert-form">
        <fieldset class="dflex al-cen jc-cen">
            <div>
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" required>
            </div>
            <div>
                <label for="sigla">Sigla</label>
                <input type="text" name="sigla" id="sigla" required>
            </div>
        </fieldset>
        <div class="actions">
            <button name="send" value="save" type="submit" >
                <i class="fas fa-plus"></i>
                <span>Salvar</span>
            </button>
        </div>
    </form>

</div>