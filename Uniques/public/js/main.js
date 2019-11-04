
window.addEventListener('load', function(){
	var paises = document.getElementById('country');
	var provincias = document.getElementById('city');
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
						// vos tenías jsonResponse.data y debe ser jsonResponse.provincias
						provincias.innerHTML += `<option value="${provincia.id}">${provincia.nombre}</option>`; // aquí es provincia.id y provincia.nombre
					}
					console.log(jsonResponse.provincias);
					provincias.parentElement.classList.remove('hidden');
				});
			} else {
				provincias.innerHTML = '';
				provincias.parentElement.classList.add('hidden');
			}
		});


	var elementosDelFormulario = elFormulario.elements;
	// console.log(elementosDelFormulario);
	var arrayDeElementos = Array.from(elFormulario);

	arrayDeElementos.shift(); //quitamos la 1er posicion, el input hidden del token
	arrayDeElementos.pop(); //quitamos el ultimo elemento, el submit
	var errors = {}; //objeto literal para ver si un campo tiene error

	var regexEmail = /^\w+([\.\+\-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

	//Validacion primaria
	arrayDeElementos.forEach( function (elemento) {
		elemento.addEventListener('blur', function(){
			if ( this.value.trim() == '') {
				this.classList.add('is-invalid');
				this.nextElementSibling.innerHTML = `The field ${this.name} is required`;
				errors[this.name] = true; //si un campo tiene error creamos un campor con el nombre y el valor de true
			} else {
				this.classList.remove('is-invalid'); // quita clase de error si existe
				this.classList.add('is-valid'); // si la respuesta es correcta, se agrega la clase
				this.nextElementSibling.innerHTML = ''; // quitamos el texto al msj de error
				delete errors[this.name]; // si no hay error en campo se elimna dicha posicion

				//validacion de Campos del formulario
				if (this.name === 'name') {
					if (this.value.length > 3) {
						this.classList.add('is-invalid');
						this.nextElementSibling.innerHTML = 'Your name must have more than 3 letters';
						errors[this.name] = true;
					}
				}

				if (this.name === 'surname') {
					if (this.value.length > 3) {
						this.classList.add('is-invalid');
						this.nextElementSibling.innerHTML = 'Your surname must have more than 3 letters';
						errors[this.name] = true;
					}
				}

				if (this.name === 'email') {

					if (!regexEmail.test(elementValue)) {
						this.classList.add('is-invalid');
						this.nextElementSibling.innerHTML = `Enter a valid email`;

						errors[this.name] = true;
					} else {

						this.classList.remove('is-invalid');
						this.classList.add('is-valid');
						this.nextElementSibling.innerHTML = '';
					}
				}
				}

				if (this.name === 'file') {
					this.addEventListener('chanfe', function () {
						var fileName = this.value.split('\\').pop();
						this.nextElementSibling.innerText = fileName;

						var fileExt = this.value.split('.').pop();

						var imageType = ['jpg','jpeg','png'];

						var myExt = imageType.find()
					})
				} else {

				}

				if (elemento.name === 'file') {
					elemento.addEventListener('change', function () {

						var avatarName = this.value.split('\\').pop();
						this.nextElementSibling.innerText = avatarName

						var fileExt = this.value.split('.').pop();


						var imageType = ['jpg', 'jpeg', 'png',];

						var myExt= imageType.find(function (ext) {
							return ext === fileExt;
						});

						if (myExt === undefined) {
							this.classList.add('is-invalid');
							this.nextElementSibling.innerHTML = `The image must have the formats: jpg, jpeg y png`;

							errors[this.name] = true;
						} else {
							this.classList.remove('is-invalid');
							this.classList.add('is-valid')
							this.nextElementSibling.innerHTML = '';

							delete errors[this.name];
						}
					})
				}

		})
	});
				elFormulario.addEventListener('submit', function (event) {
				elementosDelFormulario.forEach(function (elemento) {
					var finalValue = elemento.value.trim();

					if (finalValue === '') {
						errors[elemento.name] = true;
					}
				});

				if (Object.keys(errors).length > 0) {
					alert('Please complete the fields');
					console.log(errors);
					event.preventDefault();
				}
			})




});
