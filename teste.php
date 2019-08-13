$data= $_POST["data"];
  $inicio= $_POST["inicio"];
  $fim= $_POST["fim"];
  $tipo= $_POST["tipo"];
  $image_name = $_FILES['photo']['name'];
			$image_temp = $_FILES['photo']['tmp_name'];
      $extension = explode('.', $image_name);
      
      $image = time().".".end($extension);
      $location="uploadssorteio/" . $image;
			move_uploaded_file($image_temp, "uploadspremiacao/".$image);
  

      $sql = "INSERT INTO sorteio (datasorteio,inicio,fim ,premio,img)
      VALUES ('$data','$inicio','$fim','$tipo','$location')";
      
      if ($conn->query($sql) === TRUE) {
        echo "<script>window.location = 'cadpremiacao.php'</script>";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
   
  
   
    