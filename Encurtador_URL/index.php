<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encurt</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        $urlLong = trim($_POST['inpURL'] ?? "");

        if (filter_var($urlLong, FILTER_VALIDATE_URL)) {
            require_once "conexao.php";
            $inserir = "INSERT INTO urlLong (urlLonga) VALUES (?)";
            $stmt = $pdo->prepare($inserir);

            $stmt->bindParam(1, $urlLong);

            $stmt->execute();
            $pdo = null;
        }
       
    ?>
    <header>
        <div id="titulo">
            <h1>Encurt URL</h1>
            <p>Aqui você encurta seu URL de forma gratuita e sem burocracia</p>
        </div>
        <nav>
            <a href="#">Inicio</a>
            <a href="#">Quem somos</a>
        </nav>
    </header>
    <main>
        <div id="idForm">
            <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                <label for="inpURL">Insira aqui a URL para encurtar</label>
                <input type="url" name="inpURL" id="inpURL" required placeholder="https://example.com">
                <input type="submit" value="Encurtar">
                <label for="inpEncurtada">Aqui está seu URL curta e pronta para uso</label>
                <input type="url" name="inpEncurtada" id="inpEncurtada" placeholder="URL Encurtada" readonly>
            </form>
        </div>
    </main>
    <footer>
        <p>Desenvolvido por carlos.herique.dot</p>
    </footer>
</body>
</html>