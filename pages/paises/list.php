<div class="dflex fd-col al-cen">
    <h2 class="page-title">Países</h2>
    
    <div class="actions">
        <a href="?page=paises/insert" class="inserir">
            <i class="fas fa-plus"></i>
            <span>Inserir</span>
        </a>
    </div>

    <div class="results w100 dflex jc-cen">

        <table class="w100 max-w80">
            <thead>
                <tr>
                    <td>Total de Registros: <?= countResults('paises')[0]['qtd']?></td>
                </tr>
                <tr class="table-head">
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
                    <div class="actions">
                        <?php $params = "&id=" . $row['id']; ?>
                        <a href="?page=paises/insert<?=$params?>" class="editar">
                            <i class="fas fa-edit"></i>
                            <span>Editar</span>
                        </a>
                        <a href="?page=paises/delete<?=$params?>" class="excluir">
                            <i class="fas fa-trash-alt"></i>
                            <span>Excluir</span>
                        </a>
                    </div>
                        
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
