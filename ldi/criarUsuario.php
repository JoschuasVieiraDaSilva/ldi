<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>LDI4 - Criação de usuário</title>
</head>
<body>
    <h1>Cadastrar usuário na loja</h1>
    <?php
    include_once 'Usuario.php';

    $usuario = new Usuario(
        $_POST['nome'],
        $_POST['email'],
        $_POST['senha'],
        $_POST['cpf'],
        $_POST['tel'],
        $_POST['dtNasc']
        );
    $result = $usuario->save();
    echo '<div class="' . ($result ? 'red' : 'green') . '">';
    switch ($result) {
        case 0:
            echo 'Usuário cadastrado com sucesso!';
            break;
        case 1062:
            echo 'O email informado já está cadastrado!';
            break;
        default:
            echo 'Não foi possível cadastrar o usuário!';
    }
    echo "</div>";
    ?>
</body>
</html>