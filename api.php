<?php
    require 'banco.php';
    $id = null;
    if(!empty($_GET['id']))
    {
        $id = $_REQUEST['id'];
    }
    
    if(null==$id)
    {
        echo "erro - ID Ausente";
		exit;
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
    
		$id = $data['Cod_Cavaleiro'];
		if(trim($id) == "")
		{
			echo "erro - ID Inválido";
			exit;
		}		
		
		$nome = $data['nome'];
        $classe = $data['classe'];
        $especialidade = str_replace(",","-", $data['especialidade']);
        $vida = $data['vida'];
        $defesa = $data['defesa'];
		$dano = $data['dano'];
		$vataque = $data['vataque'];
		$vmovimento = $data['vmovimento'];		
		
 
$Array_Cavaleiro = array(
	"ID"=>$id, 
	"Nome" => $nome, 
	"Classe" => $classe,
	"Especialidade" => $especialidade,
	"Vida" => $vida,
	"Defesa" => $defesa,
	"Dano" => $dano,
	"VelocidadeAtaque" => $vataque,
	"VelocidadeMovimento" => $vmovimento

);

$json_php = json_encode($Array_Cavaleiro);   
echo $json_php;
exit;


 } ?>
