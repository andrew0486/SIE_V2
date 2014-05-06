<div id="movimientos" class="modal hide fade in" style="display: none;"> <!--Modal Movimientos-->
    	<div class="modal-header">
	         <button type="button" data-dismiss="modal" class="close">&times;</button>
	        <h3>Movimientos</h3>
     	</div>
     	<div class="modal-body"> <!--Cuerpo del modal-->
	         <form class="form" role="form" id="crearMovimiento">
	         	<div class="controls controls-row">
	         		<label class="span2" for="selectContrato">Contrato:</label>
	         		<select class="" id="selectContrato">
	         			<option>Seleccione Contrato</option>
	         		</select>
	         	</div>
	         	<div class="controls controls-row">
	         		<label class="span2">Tipo de Movimiento</label>
	         		<select>
	         			<option value="adicion">Adición</option>
	         			<option value="sustraccion">Sustracción</option>
	         		</select>
	         	</div>
	         	<div class="controls controls-row">
	         		<label class="span2">Valor de Movimiento:</label>
	         		<input class="s" type="text">
	         	</div>
	         	<div class="controls controls-row">
	         		<label class="span2">Fecha de Inicio</label>
	         		<input type="date">
	         	</div>
	  		 </form>                
    	</div>
	    	<div class="modal-footer"> <!-- Pie de modal-->
                    <a href="#" class="btn btn-primary" onclick="document.crearMovimiento.submit();">Realizar Movimiento</a>
                    <a href="#" data-dismiss="modal" class="btn">Cerrar</a>
                </div>
</div>