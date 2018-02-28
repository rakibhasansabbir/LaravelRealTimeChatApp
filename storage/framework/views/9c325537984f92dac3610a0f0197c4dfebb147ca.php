<!doctype html>
<html lang="en" xmlns:v-on="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
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
            <div class="offset-4 col-4">

                <li class="list-group-item active">Chat Group</li>
                <ul class="list-group" v-chat-scroll>
                    <message v-for="value in chat.message"
                             :key=value.index
                              color="success">{{value}}</message>
                </ul>
                <input type="text" class="form-control" placeholder="Type your message here...."
                       v-model="message" v-on:keyup.enter="send"/>
            </div>
        </div>
    </div>

<script src="<?php echo e(asset('js/app.js')); ?>"></script>
</body>
</html>