<?php
    require 'banco.php';
    $id = null;
    if(!empty($_GET['id']))
    {
        $id = $_REQUEST['id'];
    }
    
    if(null==$id)
    {
        header("Location: index.php");
    }
    else 
    {
       $pdo = Banco::conectar();
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $sql = "SELECT * FROM nw_cavaleiros where Cod_Cavaleiro = ?";
       $q = $pdo->prepare($sql);
       $q->execute(array($id));
       $data = $q->fetch(PDO::FETCH_ASSOC);
       Banco::desconectar();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">           
            <div class="span10 offset1">
                <div class="row">
                    <h3 class="well"> Listar Cavaleiros </h3>
                </div>
                
                <div class="form-horizontal">  

                    <div class="control-group">
                                <img src="img/<?php echo $data['IMG_Cavaleiro'];?>.gif">
                    </div>                                    
                                                                                                            
                    <div class="control-group">
                        <label class="control-label">Nome</label>
                        <div class="controls">
                            <label class="carousel-inner">
                                <?php echo $data['nome'];?>
                            </label>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label">Classe</label>
                        <div class="controls">
                            <label class="carousel-inner">
                                <?php echo $data['classe'];?>
                            </label>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label">Especialidade</label>
                        <div class="controls">
                            <label class="carousel-inner">
                                <?php echo $data['especialidade'];?>
                            </label>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label">Vida</label>
                        <div class="controls">
                            <label class="carousel-inner">
                                <?php echo $data['vida'];?>
                            </label>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label">Defesa</label>
                        <div class="controls">
                            <label class="carousel-inner">
                                <?php echo $data['defesa'];?>
                            </label>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label">Dano</label>
                        <div class="controls">
                            <label class="carousel-inner">
                                <?php echo $data['dano'];?>
                            </label>
                        </div>
                    </div>                    

                    
                    <div class="control-group">
                        <label class="control-label">Velocidade de Ataque</label>
                        <div class="controls">
                            <label class="carousel-inner">
                                <?php echo $data['vataque'];?>
                            </label>
                        </div>
                    </div>                                                            

                    
                    <div class="control-group">
                        <label class="control-label">Velocidade de Movimento</label>
                        <div class="controls">
                            <label class="carousel-inner">
                                <?php echo $data['vmovimento'];?>
                            </label>
                        </div>
                    </div>                                        
                                                                                
                    <br/>
                    <div class="form-actions">
                        <a href="index.php" type="btn" class="btn btn-default">Voltar</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </body>
</html>

