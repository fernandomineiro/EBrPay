<?php
session_start();
	include ('config.php');
 
	if(isset($_POST['edit'])){
		
            $id = $_GET['id'];
            $data = $_GET['data'];
            $premiacao = $_GET['premiacao'];
            $teste = $_POST["image"];

            if($teste == ""){
                $sql = "UPDATE premiacao SET data='$data', premiacao='$premiacao' WHERE id='$id'";
    
                if ($conn->query($sql) === FALSE) {
                    die("erro");
                } 
                else{
                    header('location: cadastropremiacao.php');
                }
            }
            else{
                $image = 'uploadspremiacao/'.$teste;
                $sql = "UPDATE premiacao SET data='$data', premiacao='$premiacao', img='$image' WHERE id='$id'";
    
    if ($conn->query($sql) === FALSE) {
        die("erro");
    } 
    else{
        header('location: cadastropremiacao.php');
    }
            }
	}
   else if(isset($_GET['id'])){
    $valor = $_GET['id'];
    $sql = "DELETE FROM premiacao WHERE id='$valor'";

    if ($conn->query($sql) === TRUE) {
        echo "Excluido com sucesso";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    
    header('location: cadastrosorteio.php');
		
 
	}
	
 

 