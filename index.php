<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/bootstrap.min.js"></script>
    </head>
    
    <body>
        <div class="jumbotron">
        <div class="container">
            <div class="row">
                <h1> CLÃ NEW WAY</h1>
            </div>
            </br>
            <div class="row">
                <p>
                    <a href="create.php" class="btn btn-success">Adicionar</a>
                </p>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                           <th width="14%">&nbsp;</th>
                            <th width="27%">Nome</th>
                            <th width="26%">Classe</th>
                            <th width="33%">Especialidade</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'banco.php';
                        $pdo = Banco::conectar();
                        $sql = 'SELECT * FROM nw_cavaleiros ORDER BY nome';
                        
                        foreach($pdo->query($sql)as $row)
                        {
                            echo '<tr>';
							echo '<td align=center><img src=img/' . $row['IMG_Cavaleiro'] . '.gif></td>';
                            echo '<td>'. $row['nome'] 	. '</td>';
                            echo '<td>'. $row['classe'] . '</td>';
                            echo '<td>'. $row['especialidade'] . '</td>';
                            
                            echo '<td width=250>';
                            echo '<a class="btn btn-primary" href="read.php?id='.$row['Cod_Cavaleiro'].'">Listar</a>';
                            echo ' ';
                            echo '<a class="btn btn-warning" href="update.php?id='.$row['Cod_Cavaleiro'].'">Atualizar</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="delete.php?id='.$row['Cod_Cavaleiro'].'">Excluir</a>';
                            echo '</td>';
                            echo '<tr>';
                        }
                        Banco::desconectar();
                        ?>
                    </tbody>                   
                </table>               
            </div>
        </div>
        </div>
    </body>
</html>
