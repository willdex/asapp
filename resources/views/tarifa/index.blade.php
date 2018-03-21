@extends ('layouts.inicio')
@section ('contenido')
@include('alerts.cargando')
@include('alerts.success')
@include('alerts.request')
@include('tarifa.modal')
	<div class="row">	

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

			<div class="table-responsive" style="overflow-x:inherit">	

		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<font size="6">TARIFAS</font>
		</div>

		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<div class="pull-right">
				<a class="btn btn-success" href="{!!URL::to('tarifa/create')!!}">REGISTRAR</a> 
			</div>
		</div>
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead style="background: #EFFBFB">
						<th><center>PORCENTAJE MOTO %</center></th>
						<th><center>COSTO FIJO MOTO Bs.</center></th>
						<th><center>GASTO FIJO EMPRESA Bs.</center></th>
						<th><center>IMPUESTOS %</center></th>
						<th><center>OPCION</center></th>
					</thead>

					<tbody align="center" id="body_moto">
					<tr>	
					{{Form::open(array('url' => 'actualizar_tarifa'))}}  
					<?php $verificar=DB::select("SELECT *FROM tarifa LIMIT 1"); 
						if (count($verificar)>=1) { 
						  foreach ($verificar as $key => $value) {  ?>
							<td ><input type="text" class="form-control" style="font-size: 20px; text-align: center" name="porcentaje_moto" id="porcentaje_moto" placeholder="Porcentaje Moto" value="{{$value->porcentaje_moto}}" onkeypress="return numerosmasdecimal(event)" maxlength=4></td>				
							<td><input type="text" class="form-control" style="font-size: 20px; text-align: center" name="costo_fijo_moto" id="costo_fijo_moto" placeholder="Costo Fijo Moto" value="{{$value->costo_fijo_moto}}"  onkeypress="return numerosmasdecimal(event)" maxlength=4></td>				
							<td><input type="text" class="form-control" style="font-size: 20px; text-align: center" name="gasto_fijo_empresa" id="gasto_fijo_empresa" placeholder="Gasto Fijo Empresa" value="{{$value->gasto_fijo_empresa}}"  onkeypress="return numerosmasdecimal(event)" maxlength=4></td>				
							<td><input type="text" class="form-control" style="font-size: 20px; text-align: center" name="impuesto" id="impuesto" placeholder="Impuesto" value="{{$value->impuesto}}" onkeypress="return numerosmasdecimal(event)" maxlength=4></td>							
				
							<td>{!!Form::submit('ACTUALIZAR',['class'=>'btn-sm btn-info','id'=>'btn_notificacion','onclick'=>'btn_esconder()'])!!}</td>
						  <?php  } ?>	
					<?php } ?>	
					</tr>
					</tbody>				
				</table>

				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th><center>DISTANCIA</center></th>
						<th><center>MONTO</center></th>
						<th><center>OPCION</center></th>
						
					</thead>

					<tbody align="center" id="body_moto">					
					@foreach($tarifa as $tar)
						<tr>
						<td style="font-size: 17px">{{ $tar->distancia}} Mt.</td>
						<td style="font-size: 17px">{{ $tar->monto}} Bs.</td>				
						<td>
						<input type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalTarifa" onclick="CargarTarifa({{$tar->id}})" value="ACTUALIZAR">
						<input type="button" class="btn btn-danger" data-toggle="modal" data-target="#ModalEliminarTarifa" onclick="CargarEliminarTarifa({{$tar->id}})" value="ELIMINAR">
						</td>
					</tr>
					@endforeach
					</tbody>				
				</table>




	<div class="pull-left">	{!!$tarifa->render()!!}  </div>
	<!--div class="pull-right">	<button class="btn btn-default" id="mostrar" onclick="ver_todos()"><b>VER TODOS</b></button>  </div-->
			</div>
		</div>
	</div>
   {!!Html::script('js/tarifa.js')!!}
@endsection

