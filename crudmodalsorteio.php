<?php
session_start();
	include ('config.php');
 
	if(isset($_POST['edit'])){
		
            $id = $_GET['id'];
            $data = $_POST['data'];
            $datainicio = $_POST['datainicio'];
            $datafim = $_POST['datafim'];
            $premiacao = $_POST['premiacao'];
			$teste = $_POST["image"];

            if($teste == ""){
                $sql = "UPDATE sorteio SET datasorteio='$data', datainicio='$datainicio',datafim='$datafim', premiacao='$premiacao' WHERE id='$id'";
    
                if ($conn->query($sql) === FALSE) {
                    die("erro");
                } 
                else{
                    header('location: vendasms.php');
                }
            }
            else{
                $image = 'uploadssorteio/'.$teste;
                $sql = "UPDATE sorteio SET datasorteio='$data', datainicio='$datainicio',datafim='$datafim', premiacao='$premiacao', img='$image' WHERE product_id='$id'";
    
    if ($conn->query($sql) === FALSE) {
        die("erro");
    } 
    else{
        header('location: cadastrosorteio.php');
    }
            }
	}
   else if(isset($_GET['id'])){
    $valor = $_GET['id'];
    $sql = "DELETE FROM sorteio WHERE id='$valor'";

    if ($conn->query($sql) === TRUE) {
        echo "Excluido com sucesso";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    
    header('location: cadastrosorteio.php');
		
 
	}
	
 

 