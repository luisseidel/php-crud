<div class="dflex fd-col al-cen">

    <h2 class="page-title">Cadastro de Países</h2>
    
    <?php
        if (isset($_POST['send'])) {
    
            if (isset($_POST['nome']) && isset($_POST['sigla'])) {
                insertPais($_POST['nome'], $_POST['sigla']);
                //header("Location: " . url() . "/php-crud/?page=crud");
            }
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

        function url(){
            return sprintf(
              "%s://%s",
              isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
              $_SERVER['SERVER_NAME'],
            );
        }
    ?>

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
            <button name="send" value="ok" type="submit" >
                <span>Inserir</span>
                <i class="fas fa-plus"></i>
            </button>
        </div>
    </form>

    <div class="results w100 dflex jc-cen">

        <table class="w100 max-w80">
            <thead>
                <tr>
                    <td>Total de Registros: <?= countResults('paises')[0]['qtd']?></td>
                </tr>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Sigla</th>
                    <th>Criado em</th>
                    <th>Atualizado em</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $rows = getFifthRows('paises');

                    foreach($rows as $row):
                ?>
                <tr>
                    <td><?=$row['id']?></td>
                    <td><?=$row['nome']?></td>
                    <td><?=$row['sigla']?></td>
                    <td><?=$row['created_at']?></td>
                    <td><?=$row['updated_at']?></td>
                    <td>
                        <button>Editar</button>
                        <button>Excluir</button>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>