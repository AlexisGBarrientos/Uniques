$(document).ready ( function () {

	//window.addEventListener('load', function(){
		var paises = document.getElementById('country');
		var provincias = document.getElementById('city');
		var provinciasDiv = document.getElementById('provincia');
		var elFormulario = document.querySelector('.theForm');


		fetch('https://restcountries.eu/rest/v2/all')
		.then(function(response){
			return response.json();
		})
		.then(function(data){
			for(var pais of data){
				paises.innerHTML += `<option value="${pais.alpha2Code}">${pais.name}</option>`;
			}
		})


		paises.addEventListener('change', function(){
			if (this.value == 'AR') {
				fetch('https://apis.datos.gob.ar/georef/api/provincias')
				.then(function(response){
					return response.json();
				})
				.then(function(jsonResponse){
					for (var provincia of jsonResponse.provincias) {
						provincias.innerHTML += `<option value="${provincia.id}">${provincia.nombre}</option>`;
					}
					console.log(jsonResponse.provincias);
					provinciasDiv.style.display = 'block';
				});

			} else {
				provinciasDiv.style.display = 'none';
				provincia.innerHTML = '';
			}
		});


		// Validaciones de formularios.


		var elementosDelFormulario = elFormulario.elements;
		//console.log(elementosDelFormulario);

		// Guardamos en variable -arrayDeElementos- los elementos en forma de array
		var arrayDeElementos = Array.from(elementosDelFormulario);

		// Quitamos la 1er posicion, el input hidden del token
		arrayDeElementos.shift();

		// Quitamos el ultimo elemento, el submit
		arrayDeElementos.pop();

		// Creamos un objeto literal para ver si un campo tiene error
		var errors = {};

		var regexEmail = /^\w+([\.\+\-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

		var password = null;
		var email = null;

		//Validacion primaria, recorriendo -arrayDeElementos-
		arrayDeElementos.forEach( function (elemento) {


			// Cuando el campo pierde el foco...
			elemento.addEventListener('blur', function(){

				if (this.value.trim() == '') {
					this.classList.add('is-invalid');
					this.nextElementSibling.innerHTML = 'The field ' + this.getAttribute('data-name') + ' is required';
					errors[this.name] = true; //si un campo tiene error creamos un campor con el nombre y el valor de true
				} else {
					this.classList.remove('is-invalid'); // quita clase de Bootstrap de error si existiese
					this.classList.add('is-valid'); // si la respuesta es correcta, se agrega la clase de Bootstrap
					this.nextElementSibling.innerHTML = ''; // quitamos el texto al msj de error
					delete errors[this.name]; // si no hay error en campo se elimna dicha posicion

					//validacion de Campos del formulario
					if (this.name === 'name') {
						if (this.value.length < 3) {
							this.classList.add('is-invalid');
							this.nextElementSibling.innerHTML = 'Your name must have more than 3 letters';
							errors[this.name] = true;
						}
					}

					if (this.name === 'surname') {
						if (this.value.length < 3) {
							this.classList.add('is-invalid');
							this.nextElementSibling.innerHTML = 'Your surname must have more than 3 letters';
							errors[this.name] = true;
						}
					}

					if (this.name === 'password') {
						if (this.value.length < 5 || this.value.match(/DH/) === null) {
							this.classList.add('is-invalid');
							this.nextElementSibling.innerHTML = 'Your password must contain at 5 letters and the initials DH';
							errors[this.name]= true;
						} else {
							this.classList.remove('is-invalid');
							this.classList.add('is-valid');
							this.nextElementSibling.innerHTML = '';
						}

					}

					if (this.name === 'password_confirmation') {
						password = $('input[name="password"]').val();
						if (this.value !== password) {
							this.classList.add('is-invalid');
							this.nextElementSibling.innerHTML = 'Your password does not match the chosen one';
							errors[this.name]= true;
						} else {
							this.classList.remove('is-invalid');
							this.classList.add('is-valid');
							this.nextElementSibling.innerHTML = '';
						}

					}

					if (this.name === 'email') {

						if (!regexEmail.test(this.value)) {
							this.classList.add('is-invalid');
							this.nextElementSibling.innerHTML = 'Enter a valid email';

							errors[this.name] = true;
						} else {

							this.classList.remove('is-invalid');
							this.classList.add('is-valid');
							this.nextElementSibling.innerHTML = '';
						}
						email = this.value;
					}

					if (this.name === 'Re-email' && email !== null ) {

						if (this.value !== email) {
							this.classList.add('is-invalid');
							this.nextElementSibling.innerHTML = 'Your email does not match the chosen one';

							errors[this.name] = true;
						} else {

							this.classList.remove('is-invalid');
							this.classList.add('is-valid');
							this.nextElementSibling.innerHTML = '';
						}
					}


				}

			});

			// Validacion del campo -avatar- para testear su extension cuando el campo cambia de valor
			if (elemento.name === 'avatar') {
				elemento.addEventListener('change', function () {

					var fileName = this.value.split('\\').pop();
					this.nextElementSibling.innerText = fileName

					var fileExt = this.value.split('.').pop(); //quitamos la extension de dicho archivo

					var extensionOK = ['jpg','jpeg','png'];

					// Buscamos la extension en las extensiones permitidas
					var myExt = extensionOK.find(function(ext){
						return ext === fileExtension;
					});

					// Si no se encuentra extension
					if (myExt === undefined) {
						this.classList.add('is-invalid');
						this.nextElementSibling.innerHTML = 'The image must have the formats: jpg, jpeg y png';

						errors[this.name] = true;
					} else {
						this.classList.remove('is-invalid');
						this.classList.add('is-valid')
						this.nextElementSibling.innerHTML = '';

						delete errors[this.name];
					}

				});
			}

			// Cuando se quiera enviar el form
			elFormulario.addEventListener('submit', function (event) {

				// Iterando antes del submit
				arrayDeElementos.forEach(function (elemento) {

					var finalValue = elemento.value.trim();

					if (finalValue === '') {
						errors[elemento.name] = true;
						input.classList.add('is-invalid');
						input.nextElementSibling.innerHTML = 'The field' + input.getAttribute('data-nombre') + ' is required';
					}
				})

				console.log('Los errores: ', errors);

				if (Object.keys(errors).length > 0) {
					alert('Please complete the fields');
					event.preventDefault();
				}
			});

		});

	//});
} );
