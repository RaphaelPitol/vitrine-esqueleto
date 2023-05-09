<div class="card">
    <div class="card-body">
        <h2 class="float-left">Lista de Categorias</h2>
        <div class="float-right">
            <a href="cadastros/categorias" class="btn btn-success">
                Cadastrar
            </a>
        </div>
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome da Categoria</th>
                    <th scope="col">Opções</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "select * from categoria";
                $sqlDelete = "delete from categoria where id = :id";

                $consulta = $pdo->prepare($sql);
                $consulta->execute();
                $dados = $consulta->fetchAll(PDO::FETCH_OBJ);

                foreach ($dados as &$dado) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $dado->id ?></th>
                        <td><?php echo $dado->nome ?></td>
                        <td><a href="cadastros/categorias/<?= $dado->id ?>" class="btn btn-success">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="listar/excluir/<?= $dado->id ?>" class="btn btn-danger"
                             onclick="return confirm('Tem certeza que deseja excluir?')">
                                <i class="fa fa-trash"></i>
                            </a>

                        </td>

                    <?php
                }
                    ?>
                    </tr>
            </tbody>
        </table>
    </div>
</div>