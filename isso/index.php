<html>

<head>
    <link href="bootstrap2/css/bootstrap.min.css" rel="stylesheet">
    <link href="fundo.css" rel="stylesheet">
</head>

<body>
    <center>
        <h3>Polyana Studio</h3>
    </center>
    <hr />
    <div class="row justify-content-center row-cols-1 row-cols-md-2 mb-3 text-center">
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                    <h4 class="my-0 fw-normal"><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
  <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
  <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
</svg>&nbsp;&nbsp;<b>Agende seu Horário</b></h4>
                </div>
                <div class="card-body text-start" id="agendar">
                    <form action="index.php" method="POST">
                        <label class="form-label">Nome</label><br />
                        <input type="text" name="nome" class="form-control" placeholder="Digite o seu nome completo" required /><br />
                        <label for="appt">Horário</label>
                        <input type="time" id="appt" min="09:00" max="18:00" name="hora" class="form-control" required /><br />
                        <label class="form-label">Data</label><br />
                        <input id="date" type="date" name="data" required><br /><br />
                        <button type="submit" class="btn btn-outline-success" name="btagendar">Agendar</button>
                    </form>
                    <?php
                    if (isset($_POST['btagendar'])) {
                        $nome = $_POST['nome'];
                        $hora = $_POST['hora'];
                        $data = $_POST['data'];
                        $arquivo = 'dados.txt';
                        $texto = $nome . ";" . $hora . ";" . $data . ";";
                        $file = fopen($arquivo, 'a');
                        fwrite($file, $texto);
                        fclose($file);
                    } else {
                        echo "";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    
    <div class="row justify-content-center row-cols-1 row-cols-md-2 mb-3 text-center">
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                    <h4 class="my-0 fw-normal">&nbsp;&nbsp;<b>Dados dos Clientes</b></h4>
                </div>
                <div class="card-body" id="clientes">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Horário</th>
                                <th scope="col">Data</th>
                                <th scope="col">Alterações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $arquivo = fopen("dados.txt", "r");
                            while (!feof($arquivo)) {
                                $linha = fgets($arquivo);
                            }
                            $dados = explode(";", $linha);
                            fclose($arquivo);
                            echo '<br/><br/>';
                            $conta = count($dados) - 3;
                            for ($i = 0; $i <= $conta; $i++) {
                                $posicao = $i;
                                echo '<tr>';
                                echo '<td>' . $dados[$i] . '</td>';
                                $i++;
                                echo '<td>' . $dados[$i] . '</td>';
                                $i++;
                                echo '<td>' . $dados[$i] . '</td>';
                                echo '<td><a href="editar.php?pos=' . $posicao . '">Editar</a> | <a href="excluir.php?pos=' . $posicao . '">Excluir</a></td>';
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
</body>

</html>