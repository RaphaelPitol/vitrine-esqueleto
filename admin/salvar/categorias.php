<?php
/**Tarefa */
//pegar do post o valor do campo nome 
//e fazer a conexao do pdo
//criar o sql do create para cadastrar na tabela de categoria

/*se post for True*/
if($_POST){
    /* cria variavel Id e atravez do Post inseri os dados passados pelo formulario
     se não for vazia ou null*/
    $id = $_POST["id"] ?? null;
    /* cria variavel nome e atravez do Post inseri os dados passados pelo formulario
     se não for vazia ou null*/
    $nome = $_POST["nome"] ?? null;
    /** se estiver vazia a varivel nome */
    }if(empty($nome)){
        /** mandar a mensagem de erro */
        mensagemErro("Preencha o nome da Categoria");
    }
    /**fazemos o select no banco */
    $sql = "select id from categoria where nome = :nome and id <> :id";
    /**a variavel consulta recebebe o variavel pdo que armazena a conecção com o banco 
      e prepara as informações retornadas pelo sql*/
    $consulta = $pdo->prepare($sql);
    /**aqui vincula o parametro ao nome da variavel nome*/
    $consulta->bindParam(":nome", $nome);
    /**aqui vincula o parametro ao nome da variavel id*/
    $consulta->bindParam(":id", $id);
    /**executa os parametros preparados */
    $consulta->execute();
    /**a variavel dados recebe um objetor e retorna um objeto anônimo com nomes de 
     * propriedade que correspondem aos nomes de coluna retornados em seu conjunto de resultados 
     * peguei essa resposta da documentação*/
    $dados = $consulta->fetch(PDO::FETCH_OBJ);
    /**se na variavel dados o id ja existir */
    if(!empty($dados->id)){
        /**retorna mensagem de erro */
        mensagemErro("Ja existe uma categoria cadastrada com este nome");
    }
       
    /**se estiver vazia a variavel id */
    if(empty($id)){
        /**faça o insert no banco */
        $sql = "insert into categoria (nome) values (:nome)";
        /**a variavel consulta recebebe o variavel pdo que armazena a conecção com o banco 
      e prepara as informações retornadas pelo sql*/
        $consulta = $pdo->prepare($sql);
        /**aqui vincula o parametro ao nome da variavel nome*/
        $consulta->bindParam(":nome", $nome);
        /**caso esteje setada a variavel id */
    }else{
        /**faça o update no banco */
        $sql = "update categoria set nome = :nome where id = :id";
        $consulta = $pdo->prepare($sql);
        /**aqui vincula o parametro ao nome da variavel nome*/
        $consulta->bindParam(":nome", $nome);
        /**aqui vincula o parametro ao nome da variavel id*/
        $consulta->bindParam(":id", $id);
    }
   /** se não conseguir os parametros */
    if(!$consulta->execute()){
        /** retorna mensagem de erro */
        mensagemErro("Não foi possivel salvar os dados");
    }
    /**redireciona para a pagina listar categorias */

    echo"<script>location.href='listar/categorias'</script>";
    exit;







/*$nome = $_POST['nome'];
$id = $_POST['id'];

$sqlInsert = "insert into categoria (id, nome) values (:id, :nome) ";

$insert = $pdo->prepare($sqlInsert);
$insert->bindParam(":id",$id);
$insert->bindParam(":nome",$nome);
$insert->execute();

/*$sqlDelete = "delete from categoria where id = 55 ";
$delete = $pdo->prepare($sqlDelete);

$delete->execute();*/