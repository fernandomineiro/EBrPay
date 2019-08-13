<?php
session_start();
	include ('config.php');
 
	if(isset($_POST['edit'])){
		
            $id = $_GET['id'];
            $funcao = $_POST['funcao'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
			$sql = "UPDATE funcionario SET funcao='$funcao', email='$email', senha='$senha' WHERE id='$id'";

if ($conn->query($sql) === FALSE) {
    die("erro");
} 
else{
    header('location: cadastrofuncionario.php');
}
	}
   else if(isset($_GET['id'])){
    $valor = $_GET['id'];
    $sql = "DELETE FROM funcionario WHERE id='$valor'";

    if ($conn->query($sql) === TRUE) {
        echo "Excluido com sucesso";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    
    header('location: cadastrofuncionario.php');
		
 
	}
	
 

 