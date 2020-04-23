
{{-- Para usar la plantilla template.blade.php --}}
@extends('template')

{{-- Llenando de información los @yield() --}}

@section('pageTitle', 'Preguntas Frecuentes')
{{-- Como solo nos interesa mandar un string al yield, podemos pasar dicho string como 2do parámetro de la función @section() --}}

@section('cssLink', '/css/bootstrap.min.css')

@section('mainContent')
	<!-- FAQ -->
<div class="container" style="margin-top:30px; margin-bottom: 30px;">
	<div class="row">
		<div class="col-12">
			<div class="accordion" id="accordionExample">
				<div class="card div-shadow p-3 mb-5 rounded">
					<div class="card-header">
						<h2 class="mb-0">
							<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
								¿Dónde puedo recibir mi pedido?
							</button>
						</h2>
					</div>

					<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
						<div class="card-body">
							Realizamos envíos a todo el país.
						</div>
					</div>
				</div>

				<div class="card div-shadow p-3 mb-5 rounded">
					<div class="card-header">
						<h2 class="mb-0">
							<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								¿Los muebles se entregan montados?
							</button>
						</h2>
					</div>
					<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
						<div class="card-body">
							Nuestros productos son entregados en un paquete plano y desmontados. El el paquete se incluye una sencilla guía de montaje. Para montar los muebles no es necesario ningún tipo de pegamento, cola o herramienta accesoria. Únicamente las piezas de cartón, que ya tienen los cortes y diseños necesarios para realizar su ensamblado.
						</div>
					</div>
				</div>

				<div class="card div-shadow p-3 mb-5 rounded">
					<div class="card-header">
						<h2 class="mb-0">
							<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								¿Cuánto tarda en llegar el pedido?
							</button>
						</h2>
					</div>
					<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
						<div class="card-body">
							El tiempo de entrega dependerá del tipo de envío seleccionado. En general la demora se encuentra entre 15 y 20 días hábiles luego de acreditado el pago.
						</div>
					</div>
				</div>

				<div class="card div-shadow p-3 mb-5 rounded">
					<div class="card-header">
						<h2 class="mb-0">
							<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
								¿Cuánto son los gastos de envío de una compra?
							</button>
						</h2>
					</div>
					<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
						<div class="card-body">
							Los gastos de envío dependen del volumen total de los productos comprados y del lugar donde se realice la entrega. Al hacer su pedido se le pedirá que seleccione el tipo de envío y se le indicará el coste en cada caso.
						</div>
					</div>
				</div>

				<div class="card div-shadow p-3 mb-5 rounded">
					<div class="card-header">
						<h2 class="mb-0">
							<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
								¿Cuál es el plazo para realizar un cambio?
							</button>
						</h2>
					</div>
					<div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
						<div class="card-body">
							Podés solicitar un cambio hasta 10 días luego de realizada la compra.
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- //FAQ -->
@endsection
