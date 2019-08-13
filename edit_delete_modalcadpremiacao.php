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
			<form method="POST" action="crudmodal2.php?id=<?php echo $row['id']; ?>">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Nome:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="nome" value="<?php echo $row['nome']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Telefone:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" required required class="form-control" name="telefone" value="<?php echo $row['sms']; ?> ">
					</div>
				</div>
                <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Sobrenome:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="sobrenome" value="<?php echo $row['sobrenome']; ?>">
					</div>
				</div>
                <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Empresa:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="empresa" value="<?php echo $row['empresa']; ?>">
					</div>
				</div>
                <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Estado:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="estado" value="<?php echo $row['estado']; ?>">
					</div>
				</div>
                <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Cidade:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="cidade" value="<?php echo $row['cidade']; ?>">
					</div>
				</div>
                <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Data de nacimento:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="datadenascimento" value="<?php echo $row['datadenascimento']; ?>">
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
                <center><h4 class="modal-title" id="myModalLabel">Deletar telefone</h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Vc quer mesmo deletar o telefone?</p>
				<h2 class="text-center"><?php echo $row['nome'].'do telefone '.$row['sms']; ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <a href="crudmodal2.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Sim</a>
            </div>
 
        </div>
    </div>
</div>