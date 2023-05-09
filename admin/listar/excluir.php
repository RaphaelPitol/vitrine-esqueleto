<?php

$sql = "DELETE FROM categoria WHERE id = :id";
$consulta = $pdo->prepare($sql);
$consulta->bindParam(":id", $id);

if($consulta->execute()){
    echo "<script>alert('Deletado com Sucesso!')</script>";
    echo "<script>location.href='listar/categorias'</script>";
    exit;
}else{
    echo "Erro ao excluir o Item";
}