<!DOCTYPE html>
<html>
<head>
	<!--META START-->
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="format-detection" content="telephone=no"> 
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no;">
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
	<!--META END-->
	<title></title>
<style type="text/css">
body{
	font-family: Arial;
	background: #ddd !important;
}
body,h1,h2,h3,h4, table, tr, td{
	margin: 0px;
	padding: 0px;
	border:none;
}

h1,h2,h3,h4{
	font-size: 1em;
}
h2{
	font-size: 1.5em;
}
div.container{
	padding-top: 10px;
	padding-bottom: 10px;
	margin: 0px;
	/*border: 1px solid gray;*/
	/*border-radius: 0px 0px 15px 15px;*/
	background: white;
}

div.title{
	margin: 0px 30px;
	margin-top: 0px;
	background: #F2784B;
	padding: 10px 30px;
	text-align: center;
	color: white;
	font-family: sans-serif;
	border-radius:30px 0px 30px 0px ;
}
div.body{
	padding: 10px 30px;
}
div.footer{
	text-align: center;
	background: #252525;
	color: silver;
	padding: 20px;
	margin: 5px 30px;
}
img{
	width: 280px;
}
a{
	font-weight: bold;
	color: #252525 !important;
	text-decoration: none;
}
table{
	border-spacing: 0px;
}
div.legal{
	margin: 0px;
	padding: 20px;
	/*border: 1px solid gray;
	border-radius: 0px 0px 15px 15px;
	border-top: none;*/
	color: gray;
	text-align: center;
}
td.content-body{min-width: 500px;}
td.margin-left{width: 50%}
td.margin-right{width: 50%}
@media screen and (max-width: 500px) {
	td.content-body{min-width: 100%;}
	td.margin-left{width: 0px}
	td.margin-right{width: 0px}
	div.body{
		padding: 0px 30px;
	}
}


</style>
</head>
<body style="background: #ddd">
<table>
	<tr>
		<td class="margin-left"></td>
		<td class="content-body" >
			<!-- Content START-->
			@yield('content')
			<!-- Content END-->
			<div class="legal">
				<small>Garron Consulting Group es una marca de Garron S.A.S ubicada en la Republica Argentina CUIT 33-71600383-9.</small>
				<br>
				<small>Ver términos y condiciones <a style="font-weight: normal; color: gray; text-decoration: underline;" href="{{ route('policies') }}">aquí</a></small>
			</div>
		</td>
		<td class="margin-right"></td>
	</tr>
</table>


</body>
</html>