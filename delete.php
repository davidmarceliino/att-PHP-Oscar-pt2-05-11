<?php
require 'banco.php';
$id = 0;
if(!empty($_GET['codigo']))
{

    $id = $_REQUEST['codigo'];

}
if(!empty($_POST))
{

    $id = $_POST['codigo'];

    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "delete from tb_alunos where codigo = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    Banco::desconectar();
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar contato</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.mi
n.css" integrity="sha384-
MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <div class ="container">
        <div class ="span10 offset1">
            <div class ="row">
                <h3 class="well">Excluir contato</h3>
            </div>
            <form class = "form-horizontal" action="delete.php" method = "POST">
                <input type="hidden" name="codigo" value ="<?php echo $id;?>" />
                <div class = "alert alert-danger"> Deseja excluir o contato?</div>
                <div class = "form action">
                    <button type = "submit" class="btn btn-danger">Sim</button>
                    <a href="index.php" type="btn" class="btn btn-default">Não</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>