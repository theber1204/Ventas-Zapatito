<?php 

	session_start();
	//print_r($_SESSION['tablaComprasTemp']);
 ?>

 <h4>Hacer venta</h4>
 <h4><strong><div id="nombreclienteVenta"></div></strong></h4>
 <table class="table table-bordered table-hover table-condensed" style="text-align: center;">
 	<caption>
 		<span class="btn btn-success" onclick="crearVenta()"> Generar venta
 			<span class="glyphicon glyphicon-usd"></span>
 		</span>
 	</caption>
 	<tr>
 		<td>Marca</td>
		<td>Modelo</td>
 		<td>Descripcion</td>
		<td>Talla</td>
 		<td>Cantidad</td>
 		<td>Precio</td>
		<td>Cliente</td>
 		<td>Quitar</td>
 	</tr>
 	<?php 
 	$total=0;
 	$cliente=""; 
 		if(isset($_SESSION['tablaComprasTemp'])):
 			$i=0;
 			foreach (@$_SESSION['tablaComprasTemp'] as $key) {

 				$d=explode("||", @$key);
 	 ?>

 	<tr>
	 	<td><?php echo $d[1] ?></td>
		<td><?php echo $d[2] ?></td>
		<td><?php echo $d[3] ?></td>
		<td><?php echo $d[4] ?></td>
		<td><?php echo 1; ?></td>
		<td><?php echo $d[6] ?></td>
		<td><?php echo $d[7] ?></td>
		
 		<td>
 			<span class="btn btn-danger btn-xs" onclick="quitarP('<?php echo $i; ?>')">
 				<span class="glyphicon glyphicon-remove"></span>
 			</span>
 		</td>
 	</tr>

 <?php 
 		$total=$total + $d[6];
 		$i++;
 		$cliente=$d[7];
 	}
 	endif; 
 ?>

 	<tr>
 		<td>Total de venta: <?php echo "$".$total; ?></td>
 	</tr>

 </table>


 <script type="text/javascript">
 	$(document).ready(function(){
 		nombre="<?php echo @$cliente ?>";
 		$('#nombreclienteVenta').text("Nombre de cliente: " + nombre);
 	});
 </script>