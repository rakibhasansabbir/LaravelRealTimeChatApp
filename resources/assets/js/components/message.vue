<template>
    <div>
        <li class="list-group-item " :class="className"><slot></slot>
        <!--<time style="font-size: 9px; margin-top: 10px; color: black" >{{time}}</time>-->
            <ul>
                 <small class="badge badge-pill" :class="badgeClass">{{ user }}</small>
                 <small style="color: black; margin-top: 10px; font-size: 9px" >{{ time }}</small>
             </ul>

        </li>
        <br>
    </div>
</template>

<script>
    export default {
        props:[
            'color',
            'user',
            'side',
            'time'
        ],
        computed:{
          className(){
              return 'list-group-item-'+this.color+' text-'+this.side;
          },
          badgeClass(){
              return 'badge-'+this.color;
          }

        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
