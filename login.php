<?php
    if (!empty($_POST['usuario']) && !empty($_POST['senha'])) {
        $user = $_POST['usuario'];
        $pass = $_POST['senha'];
        $dsn = 'mysql:host=localhost;dbname=php_com_pdo';
        $usuario = 'root';
        $senha = '';
        try {
            $conexao = new PDO($dsn, $usuario, $senha);
            $query = "select * from tb_usuarios 
                        where email = :user 
                        and senha = :senha";
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(':user', $user);
            $stmt->bindValue(':senha', $pass);
            $stmt->execute();
            $usuario = $stmt->fetch();
            echo '<pre>';
            print_r($usuario);
            echo '</pre>';
        } catch(PDOException $e) {
            echo 'Erro: ' . $e->getCode() . ' Mensagem: ' . $e->getMessage();
        }
        // Registrar erros
    }
?>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <!-- COMPATIBILIDADE COM HTML5 -->
        <!--[if lt IE 9]>
            <script src="js/html5shiv.js"></script>
        <![endif]-->
        <!-- NORMALIZE CSS -->
        <link rel="stylesheet" 
              type="text/css" 
              href="css/normalize.css">
        <!-- CSS CUSTOMIZADO -->
        <link rel="stylesheet" 
              type="text/css" 
              href="css/style.css">
        <title>Login</title>
    </head>
    <body>
        <form method="post" action="index.php">
            <input type="text" placeholder="Usuário" name="usuario" />
            <br />
            <input type="password" placeholder="Senha" name="senha" />
            <button type="submit">Entrar</button>
        </form>        
    </body>
</html>