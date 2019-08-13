<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Editar premiação</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="crudmodalpremiacao.php?id=<?php echo $row['id']; ?>">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Data:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="data" value="<?php echo $row['data']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Premio:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" required required class="form-control" name="premio" value="<?php echo $row['premio']; ?> ">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Imagem:</label>
					</div>
					<div class="col-sm-10">
								
								<input class="form-control" type="file"  name="image">
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
                <center><h4 class="modal-title" id="myModalLabel">Deletar premio</h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Vc quer mesmo deletar o premio?</p>
				<h2 class="text-center"><?php echo $row['data'].'do telefone '.$row['premio']; ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <a href="crudmodalpremiacao.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Sim</a>
            </div>
 
        </div>
    </div>
</div>