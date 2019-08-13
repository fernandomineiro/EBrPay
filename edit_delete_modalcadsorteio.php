<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Editar sms</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="crudmodalsorteio.php?id=<?php echo $row['id']; ?>">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Data premiação:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="data" value="<?php echo $row['datasorteio']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Data início:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" required required class="form-control" name="inicio" value="<?php echo $row['datainicio']; ?> ">
					</div>
				</div>
                <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Data fim:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="fim" value="<?php echo $row['datafim']; ?>">
					</div>
				</div>
                <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Tipo:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="tipo" value="<?php echo $row['premiacao']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Imagem:</label>
					</div>
					<div class="col-sm-10">
								
								<input class="form-control" type="file" value="<?php echo $fetch['image']; ?>" name="image">
							</div>
				</div>
                
				
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <button type="submit" name="edit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Atualizar</a>
			</form>
            </div>
 
        </div>
    </div>
</div>
 
<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Deletar sorteio</h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Vc quer mesmo deletar o sorteio?</p>
				<h2 class="text-center"><?php echo $row['datasorteio'].'do sorteio '.$row['premiacao']; ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <a href="crudmodal2.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Sim</a>
            </div>
 
        </div>
    </div>
</div>