<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name= "viewport"  content= "width=device-width, initial-scale=1">
		<title> @yield ('pageTitle') - Uniques Site </title>
		<link rel= "stylesheet" href= "https://use.fontawesome.com/releases/v5.8.2/css/all.css">
		<!-- <link rel= "stylesheet" href= "@yield( 'cssLink' )"> -->
		<link rel= "stylesheet" href= "/css/styles.css">
  </head>
  <body>

    {{- La función @include () está incluyendo un archivo que de por si sabe que esta localizada en resources/views -}}
    @include( 'partials.navbar' )

    {{- insertamos el contenido de cada una de las vistas cuando se las requiera -}}
		@yield( 'mainContent' )

    {{- Está incluyendo el archivo footer -}}
    @include( 'partials.footer' )

  </body>
</html>
