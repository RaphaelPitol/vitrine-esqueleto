
<div class="card">
    <div class="card-header">
        <h2 class="float-left">Cadastros de categorias</h2>

        <div class="float-right">
            <a href="listar/categorias" class="btn btn-success">
                Lista de Categorias
            </a>
        </div>
    </div>
    <div class="card-body">
        <form action="salvar/categorias" method="post">
            <hr>
            <label for="id">ID da Categoria</label>
            <input type="text" name="id" id="id" class="form-control" value=<?php echo $id?>>

            <label for="nome">Nome da Categoria</label>
            <input type="text" name="nome" 
            id="nome" class="form-control" required value="">
            <br>
            <button type="submit" class="btn btn-success">
                Salvar Dados
            </button>
            <hr>
        </form>
    </div>
</div>