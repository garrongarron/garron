<!DOCTYPE html>
<html>
<head>
	<title></title>
<style type="text/css">
body{
	font-family: Arial
}
body,h1,h2,h3,h4{
	margin: 0px;
	padding: 0px;
}
table{
	border:none;
}
h1,h2,h3,h4{
	font-size: 1em;
}
h2{
	font-size: 1.5em;
}
div.container{
	margin-top: 20px;
	margin-bottom: 20px;
	border: 1px solid gray;
	
}
div.title{
	background: #F2784B;
	padding: 10px 30px;
	text-align: center;
	color: white;
	font-family: sans-serif;
}
div.body{
	padding: 10px 30px;
}
div.footer{
	text-align: center;
	background: #252525;
	color: silver;
	padding: 20px;
}
img{
	width: 300px;
}
a{
	font-weight: bold;
	color: #252525;
	text-decoration: none;
}
</style>
</head>
<body>
<table>
	<tr>
		<td style="width: 50%"></td>
		<td style="min-width: 500px" >
			<div class="container">
				<div class="title">
					<img src="http://localhost/img/GarronConsultingGroup.png">
				</div>
				<div class="body">
					<div align="center">
						<h2>Bienvenido</h2>
						<small>Tu <b>Desarrollo Profesional</b> depende sólo de ti. En <b>GCG</b> generamos las oportunidades para ayudarte a conseguirlo.</small>
					</div>
					<hr>
					<h3>Busca Trabajo o a tus Candidatos</h3>
					<p>Aquí las mejores empresas buscan a los mejores profesionales.</p>
					<ul>
						<li>Tu Ususario: {{ $data['name'] or 'Pepe' }}</li>
						<li>Tu email: {{ $data['email'] or 'pepe@gmail.com' }}</li>
						<li>Tu pasword: {{ $data['password'] or '123456' }}</li>
						<li>Has clic <a href="{{ route('ITResources') }}">aquí</a> para empezar</li>
					</ul>
					<div align="center">
						<a href="{{ route('ITResources') }}">www.garron.com.ar/ITResources</a>
					</div>
				</div>
				<div class="footer">
					Garron Consulting Group
				</div>
			</div>

		</td>
		<td style="width: 50%"></td>
	</tr>
</table>
</body>
</html>


			
