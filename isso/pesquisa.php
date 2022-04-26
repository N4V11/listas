<html>

<head>
    <link href="bootstrap2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <center>
        <h3>SisArray - TDS08</h3>
    </center>
    <hr />
    <br />
    <br />
    <div class="row justify-content-center row-cols-1 row-cols-md-2 mb-3 text-center">
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                    <h4 class="my-0 fw-normal"><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>&nbsp;&nbsp;<b>Pesquisa</b></h4>
                </div>
                <div class="card-body text-start">
                    <?php
                        $nome = $_POST['pesquisa'];
                        $arquivo = fopen("dados.txt", "r");
                        while (!feof($arquivo)) {
                            $linha = fgets($arquivo);
                        }
                        $dados = explode(";", $linha);
                        fclose($arquivo);
                        $pos = array_search($nome, $dados);
                        if($pos !== false){
                            echo '<label class="form-label">Nome</label><br />';
                            echo '<label class="form-label"><b>'.$dados[$pos].'</b></label><br />';
                            echo '<label class="form-label">Idade</label><br />';
                            echo '<label class="form-label"><b>'.$dados[$pos+1].'</b></label><br />';
                        } else {
                            echo "Não foi encontrado nenhum registro!<br/>";
                        }
                    ?>
                    <a href="index.php" class="btn btn-outline-secondary">Voltar</a>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>