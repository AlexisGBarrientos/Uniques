
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
				<div class="card">
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

				<div class="card">
					<div class="card-header">
						<h2 class="mb-0">
							<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								¿Cuánto tarda en llegar el pedido?
							</button>
						</h2>
					</div>
					<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
						<div class="card-body">
							El tiempo de entrega dependerá del tipo de envío seleccionado. En general la demora se encuentra entre 15 y 20 días hábiles luego de acreditado el pago.
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-header">
						<h2 class="mb-0">
							<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								¿Cuál es el plazo para realizar un cambio?
							</button>
						</h2>
					</div>
					<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
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
