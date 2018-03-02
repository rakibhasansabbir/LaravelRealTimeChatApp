<!doctype html>
<html lang="en" xmlns:v-on="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <STYLE>
        .list-group{
            overflow-y: scroll;
            height: 200px;
        }
    </STYLE>
</head>
<body>
    <div class="container">
        <div class="row" id="app">
            <h1></h1>
            <div class="offset-4 col-4 offset-sm-1 col-sm-8">

                <li class="list-group-item active">Chat Group</li>
                <ul class="list-group" v-chat-scroll>
                    <message v-for="value,index in chat.message"
                             :key=value.index
                             :color=chat.color[index]
                             :user=chat.user[index]
                             :side=chat.side[index]
                             :time=chat.time[index]
                    >@{{value}}</message>
                </ul>
                <div class="badge badge-pill badge-info">@{{ typeing }}</div>
                <input type="text" class="form-control" placeholder="Type your message here...."
                       v-model="message" v-on:keyup.enter="send"/>
            </div>
        </div>
    </div>

<script src="{{asset('js/app.js')}}"></script>
</body>
</html>