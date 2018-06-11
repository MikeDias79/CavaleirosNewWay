<?php 
	
	require 'banco.php';

	$id = null;
	if ( !empty($_GET['id'])) 
            {
		$id = $_REQUEST['id'];
            }
	
	if ( null==$id ) 
            {
		header("Location: index.php");
            }
	
	if ( !empty($_POST)) 
            {
		
        $nomeErro = null;
        $classeErro = null;
        $especialidadeErro = null;
        $vidaErro = null;
        $defesaErro = null;
        $danoErro = null;
        $vataqueErro = null;
        $vmovimentoErro = null;
        $img_cavaleiroErro = null;
		
        $nome = $_POST['nome'];
        $classe = $_POST['classe'];
        $especialidade = $_POST['especialidade'];
        $vida = $_POST['vida'];
        $defesa = $_POST['defesa'];
		$dano = $_POST['dano'];
		$vataque = $_POST['vataque'];
		$vmovimento = $_POST['vmovimento'];
		$img_cavaleiro = $_POST['img_cavaleiro'];
		
		//Validação
		$validacao = true;
        if(empty($nome))
        {
            $nomeErro = 'Hey Nobre Aventureiro, precisamos saber seu nome...';
            $validacao = false;
        }
        
        if(empty($classe))
        {
            $classeErro = 'Qual sua Classe caro amigo?';
            $validacao = false;
        }
        
        if(count($especialidade) < 0)
        {
            $especialidadeErro = 'Informe em que você é realmente bom';
            $validacao = false;
        }
        
        if(empty($defesa))
        {
            $defesaErro = 'E defender-se? sabe?';
            $validacao = false;
        }
       
        
        if(empty($dano))
        {
            $danoErro = 'Qual estrago você consegue fazer?';
            $validacao = false;
        }

        if(empty($vataque))
        {
            $vataqueErro = 'Qual sua velocidade ao atacar uma orda de Orcs?';
            $validacao = false;
        }
		
        if(empty($vmovimento))
        {
            $vmovimento = 'Qual sua velocidade para movimentar-se durante um banquete no salão principal?';
            $validacao = false;
        }
		
        if(empty($img_cavaleiro))
        {
            $img_cavaleiroErro = 'O que tem a esconder Nobre Cavaleiro?';
            $validacao = false;
        }		
		
		
		// update data
		if ($validacao) 
                {
					
					$CE = count($especialidade) - 1;
					$c = 0;
					
					while($c <= $CE) {
						if ($c == 0){
							$AEspecialidade = $especialidade[$c];
						} else {
							$AEspecialidade = $AEspecialidade . "," . $especialidade[$c];
						}
						$c = $c + 1;
					}
					
					
                    $pdo = Banco::conectar();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "
					UPDATE nw_cavaleiros SET 
					nome='$nome',
					classe='$classe',
					especialidade='$AEspecialidade',
					vida='$vida',
					defesa='$defesa',
					dano='$dano',
					vataque='$vataque',
					vmovimento='$vmovimento',
					IMG_Cavaleiro='$img_cavaleiro' 
					WHERE Cod_Cavaleiro = $id
					";

					
                    $q = $pdo->prepare($sql);
                    $q->execute();
                    Banco::desconectar();
                    header("Location: index.php");
		}
	} 
        else 
            {
                $pdo = Banco::conectar();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM nw_cavaleiros where Cod_Cavaleiro = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
        $nome = $data['nome'];
        $classe = $data['classe'];
        $especialidade = $data['especialidade'];
				
		
        $vida = $data['vida'];
        $defesa = $data['defesa'];
		$dano = $data['dano'];
		$vataque = $data['vataque'];
		$vmovimento = $data['vmovimento'];
		$img_cavaleiro = trim($data['IMG_Cavaleiro']);
		Banco::desconectar();
	}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3 class="well"> Atualizar Contato </h3>
                    </div>
             
                    <form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">
                         
                        <div class="control-group <?php echo !empty($nomeErro)?'error ' : '';?>">
                            <label class="control-label">Nome</label>
                            <div class="controls">
                                <input size= "50" name="nome" type="text" placeholder="Nome" required="" value="<?php echo !empty($nome)?$nome: '';?>">
                                <?php if(!empty($nomeErro)): ?>
                                    <span class="help-inline"><?php echo $nomeErro;?></span>
                                <?php endif;?>
                            </div>
                        </div>
                        
                        <div class="control-group <?php echo !empty($classeErro)?'error ': '';?>">
                            <label class="control-label">Classe</label>
                            <div class="controls">
                               <Select name="classe">
                               	<option value="Mago" <?php if ($classe=='Mago') { ?> SELECTED <?php } ?>>Mago</option>
                               	<option value="Sacerdote" <?php if ($classe=='Sacerdote') { ?> SELECTED <?php } ?>>Sacerdote</option>
                               	<option value="Lutador" <?php if ($classe=='Lutador') { ?> SELECTED <?php } ?>>Lutador</option>
                               	<option value="Arqueiro" <?php if ($classe=='Arqueiro') { ?> SELECTED <?php } ?>>Arqueiro</option>
                               	<option value="Cavaleiro" <?php if ($classe=='Cavaleiro') { ?> SELECTED <?php } ?>>Cavaleiro</option>
                               	<option value="Espadachim" <?php if ($classe=='Espadachim') { ?> SELECTED <?php } ?>>Espadachim</option>
                               </Select>
                                <?php if(!empty($classeErro)): ?>
                                <span class="help-inline"><?php echo $classeErro;?></span>
                                <?php endif;?>
                        </div>
                        </div>

                        <div class="control-group <?php echo !empty($especialidadeErro)?'error ': '';?>">
                            <label class="control-label">Especialidade</label>
                            <div class="controls">
								<input type="checkbox"  name="especialidade[]" value="Magia Branca" <?php if (strpos($especialidade, 'Magia Branca') !== false) { ?> CHECKED <?php } ?>> Magia Branca <br>
								<input type="checkbox"  name="especialidade[]" value="Cura" <?php if (strpos($especialidade, 'Cura') !== false) { ?> CHECKED <?php } ?>> Cura<br>
								<input type="checkbox"  name="especialidade[]" value="Tanker" <?php if (strpos($especialidade, 'Tanker') !== false) { ?> CHECKED <?php } ?>> Tanker<br>
								<input type="checkbox"  name="especialidade[]" value="Invocação" <?php if (strpos($especialidade, 'Invocação') !== false) { ?> CHECKED <?php } ?>> Invocação<br>
								<input type="checkbox"  name="especialidade[]" value="Ataque a Distancia" <?php if (strpos($especialidade, 'Ataque a Distancia') !== false) { ?> CHECKED <?php } ?>> Ataque a Distancia<br>
								<input type="checkbox"  name="especialidade[]" value="Matador de Chefes" <?php if (strpos($especialidade, 'Matador de Chefes') !== false) { ?> CHECKED <?php } ?>> Matador de Chefes<br>
								<input type="checkbox"  name="especialidade[]" value="AntiTanque" <?php if (strpos($especialidade, 'AntiTanque') !== false) { ?> CHECKED <?php } ?>> AntiTanque<br>
								<input type="checkbox"  name="especialidade[]" value="Ataque em Area" <?php if (strpos($especialidade, 'Ataque em Area') !== false) { ?> CHECKED <?php } ?>> Ataque em Área<br>
				
                                <?php if(!empty($especialidadeErro)): ?>
                                <span class="help-inline"><?php echo $especialidadeErro;?></span>
                                <?php endif;?>
                        </div>
                        </div>                                                                                                                                                
                                                                                                                                                
                                                                                                                                                                                                
                        <div class="control-group <?php echo !empty($vidaErro)?'error ': '';?>">
                            <label class="control-label">Vida</label>
                            <div class="controls">
                                <input size="35" name="vida" type="text" placeholder="Vida" required="" value="<?php echo !empty($vida)?$vida: '';?>">
                                <?php if(!empty($vidaErro)): ?>
                                <span class="help-inline"><?php echo $vidaErro;?></span>
                                <?php endif;?>
                        </div>
                        </div>
                        
                        <div class="control-group <?php echo !empty($defesaErro)?'error ': '';?>">
                            <label class="control-label">Defesa</label>
                            <div class="controls">
                                <input size="40" name="defesa" type="text" placeholder="Defesa" required="" value="<?php echo !empty($defesa)?$defesa: '';?>">
                                <?php if(!empty($defesaErro)): ?>
                                <span class="help-inline"><?php echo $defesaErro;?></span>
                                <?php endif;?>
                        </div>
                        </div>
                        
                        <div class="control-group <?php echo !empty($danoErro)?'error ': '';?>">
                            <label class="control-label" >Dano</label>
                            <div class="controls">
                                <input size="1" name="dano" type="text" placeholder="Dano" required="" value="<?php echo !empty($dano)?$dano: '';?>">
                                <?php if(!empty($danoErro)): ?>
                                <span class="help-inline"><?php echo $danoErro;?></span>
                                <?php endif;?>
                        </div>
                        </div>
                        
                        
                         <div class="control-group <?php echo !empty($vataqueErro)?'error ': '';?>">
                            <label class="control-label" >Velocidade de Ataque</label>
                            <div class="controls">
                                <input size="1" name="vataque" type="text" placeholder="Velocidade de Ataque" required="" value="<?php echo !empty($vataque)?$vataque: '';?>">
                                <?php if(!empty($vataqueErro)): ?>
                                <span class="help-inline"><?php echo $vataqueErro;?></span>
                                <?php endif;?>
                        </div>
                        </div>                       

                        <div class="control-group <?php echo !empty($vmovimentoErro)?'error ': '';?>">
                            <label class="control-label" >Velocidade de Movimento</label>
                            <div class="controls">
                                <input size="1" name="vmovimento" type="text" placeholder="Velocidade de Movimento" required="" value="<?php echo !empty($vmovimento)?$vmovimento: '';?>">
                                <?php if(!empty($vmovimentoErro)): ?>
                                <span class="help-inline"><?php echo $vmovimentoErro;?></span>
                                <?php endif;?>
                        </div>
                        </div>                       
                                                

                        <div class="control-group <?php echo !empty($img_cavaleiroErro)?'error ': '';?>">
                            <label class="control-label" >Avatar</label>
                            <div class="controls">
                               
                                <table width="70%">
									<tr>
										<td align="center"><img src="img/1.gif"><br><input type="radio" name="img_cavaleiro" value="1"   <?php if ($img_cavaleiro=='1') { ?> CHECKED <?php } ?>></td>
										<td align="center"><img src="img/2.gif"><br><input type="radio" name="img_cavaleiro" value="2"   <?php if ($img_cavaleiro=='2') { ?> CHECKED <?php } ?>></td>
										<td align="center"><img src="img/3.gif"><br><input type="radio" name="img_cavaleiro" value="3"   <?php if ($img_cavaleiro=='3') { ?> CHECKED <?php } ?>></td>
										<td align="center"><img src="img/4.gif"><br><input type="radio" name="img_cavaleiro" value="4"   <?php if ($img_cavaleiro=='4') { ?> CHECKED <?php } ?>></td>
										<td align="center"><img src="img/5.gif"><br><input type="radio" name="img_cavaleiro" value="5"   <?php if ($img_cavaleiro=='5') { ?> CHECKED <?php } ?>></td>
									</tr>
									<tr>
										<td align="center"><img src="img/6.gif"><br><input type="radio" name="img_cavaleiro" value="6"   <?php if ($img_cavaleiro=='6') { ?> CHECKED <?php } ?>></td>
										<td align="center"><img src="img/7.gif"><br><input type="radio" name="img_cavaleiro" value="7"   <?php if ($img_cavaleiro=='7') { ?> CHECKED <?php } ?>></td>
										<td align="center"><img src="img/8.gif"><br><input type="radio" name="img_cavaleiro" value="8"   <?php if ($img_cavaleiro=='8') { ?> CHECKED <?php } ?>></td>
										<td align="center"><img src="img/9.gif"><br><input type="radio" name="img_cavaleiro" value="9"   <?php if ($img_cavaleiro=='9') { ?> CHECKED <?php } ?>></td>
										<td align="center"><img src="img/10.gif"><br><input type="radio" name="img_cavaleiro" value="10" <?php if ($img_cavaleiro=='10') { ?> CHECKED <?php } ?>></td>
									</tr>                               
                                </table> 
                                
                                <?php if(!empty($img_cavaleiroErro)): ?>
                                <span class="help-inline"><?php echo $img_cavaleiroErro;?></span>
                                <?php endif;?>
                        </div>
                        </div>                            

                                                                        
                        <div class="form-actions">
                            <br/>
                
                            <button type="submit" class="btn btn-success">Adicionar</button>
                            <a href="index.php" type="btn" class="btn btn-default">Voltar</a>
                        
                        </div>
                    </form>
                </div>                 
    </div> 
  </body>
</html>

