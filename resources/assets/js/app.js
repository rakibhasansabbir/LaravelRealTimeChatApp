require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import VueChatScroll from 'vue-chat-scroll'

//for Notification
import Toaster from 'v-toaster'
import 'v-toaster/dist/v-toaster.css'
Vue.use(Toaster, {timeout: 5000})

Vue.use(VueChatScroll)

Vue.component('message', require('./components/message.vue'));

const app = new Vue({
    el: '#app',
    data: {
        message: '',
        chat: {
            message: [],
            user: [],
            color: [],
            side: [],
            time: []
        },

        typeing: '',
        onlineUser: 0
    },
    watch:{
        message(){
            Echo.private('chat')
                .whisper('typing', {
                    name: this.message
                });
        }
    },
    methods: {
        send() {
            if (this.message.length != 0) {

                this.chat.message.push(this.message);
                this.chat.user.push('you');
                this.chat.color.push('success');
                this.chat.side.push('left');
                this.chat.time.push(this.getTime());


                axios.post('/send', {
                    message : this.message,
                    chat:this.chat

                })
                    .then(response => {
                        console.log(response);
                        this.message = ''
                    })
                    .catch(error => {
                        console.log(error);
                    });
            }
        },
        getTime(){
            let time = new Date();
            return time.getHours()+':'+time.getMinutes();
        },
        getOldMessages(){
            axios.post('/getOldMessage')
                .then(response => {
                    console.log(response);
                    if (response.data != '') {
                        this.chat = response.data;
                    }
                })
                .catch(error => {
                    console.log(error);
                });
        }

    },

    mounted(){
        this.getOldMessages();
        Echo.private('chat')
            .listen('ChatEvent', (e) => {

                this.chat.message.push(e.message);
                this.chat.user.push(e.user);
                this.chat.color.push('warning');
                this.chat.side.push('right');
                this.chat.time.push(this.getTime());

                axios.post('/saveToSession',{
                    chat : this.chat
                })
                    .then(response => {

                    })
                    .catch(error => {
                        console.log(error);
                    });

            })
            .listenForWhisper('typing', (e) => {
                if(e.name != ''){
                    this.typeing = 'typing...';
                    console.log('typing...');
                }else {
                    this.typeing = '';
                }
            });

        Echo.join('chat')
            .here((users) => {
                this.onlineUser = users.length;
            })
            .joining((user) => {
                this.onlineUser +=1;
                this.$toaster.success( user.name+ ' joined')
            })
            .leaving((user) => {
                this.onlineUser -=1;
                this.$toaster.warning(user.name+ ' leaved')
            });
    }
});
