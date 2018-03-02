<template>
    <div>
        <li class="list-group-item " :class="className"><slot></slot>
        <!--<time style="font-size: 9px; margin-top: 10px; color: black" >{{time}}</time>-->
            <ul>
                 <small class="badge badge-pill" :class="badgeClass">{{ user }}</small>
                 <small class="alert-info">{{ time }}</small>
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
              if (this.side == 'left'){

                  return 'badge-'+this.color+' float-sm-right';
              }else {
                  return 'badge-'+this.color+' float-sm-left';

              }
          }

        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
