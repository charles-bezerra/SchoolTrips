		<div class='modal fade' id='exampleModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
			<div class='modal-dialog' role='document'>
				<div class='modal-content'>
				  <div class='modal-header'>
				    <h5 class='modal-title'>Agende sua viagem aqui</h5>
				    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
			       		<span aria-hidden='true'>&times;</span>
		      		</button>
			  	  </div>
			 <form>
			   	  <div class='modal-body'>
					  <div class="form-group">
					    <label>Data de ida</label>
					    <input type="date" 
					    <?php 
					    	$data = date('Y-m-d');
					    	echo "min='$data'";
					    ?> 
					    class="form-control" name="data_saida">
					  </div>
					  <div class="form-group">
					    <label>Selecione o ônibus</label>
					    <select class="form-control" required="required" name="onibus">
					      <option>1 Volkswagen (45 assentos)</option>
					    </select>
					  </div>
					  <div class="form-group">
					    <label>Quantidade de ocupantes</label>
					    <input type="number" max="45" required="required"  class="form-control" name="quantidade_ocupantes">
					  </div>
					  <div class="form-group">
					    <label>Quantidade de dias</label>
					    <input type="number" class="form-control" required="required" name="quantidade_dias">
					  </div>
					  <div class="form-group">
					    <label>Atividade que será realizada</label>
					    <textarea class="form-control" rows="3" required="required" name="detalhes"></textarea>
					  </div>
					  <div class="form-group">
					    <label>Destino principal da viagem</label>
					    <input type="text" class="form-control" required="required" name="destino"></input>
					  </div>
				  </div>
				 <div class='modal-footer'>
					 <button type='button' class='btn btn-secondary' data-dismiss='modal'>Fechar</button>
					 <button id='submit_modal' class='btn btn-primary'>Enviar</button>
				 </div>
			</form>
				</div>
		</div>