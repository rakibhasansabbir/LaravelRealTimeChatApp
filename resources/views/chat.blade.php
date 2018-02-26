<!DOCTYPE html>
<html xmlns:v-on="http://www.w3.org/1999/xhtml">
<head>
	<title></title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
	<style>
		.list-group{
			overflow-y: scroll;
			height: 200px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row" id="app">
			<div class=" offset-4 col-4">

				<li class="list-group-item active">Chat Room</li>
				<ul class="list-group" v-chat-scroll>
					<message v-for="value in chat.message" :key=value.index color="success">@{{ value }}</message>
				</ul>
				<input type="text" class="form-control" placeholder="Type your message here..."
					   v-model='message' @keyup.enter="send"> </input>
			</div>
		</div>
		
	</div>

	<script type="text/javascript" src="{{asset('js/app.js')}}"></script>

</body>
</html>