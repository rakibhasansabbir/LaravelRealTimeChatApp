<template>
    <div>
        <li class="list-group-item" :class="className"><slot></slot></li>
        <small class="badge badge-pill float-sm-right" :class="user">You</small>
    </div>
</template>

<script>
    export default {
        props:[
            'color'
        ],
        computed:{
          className(){
              return 'list-group-item-'+this.color;
          },
          user(){
              return 'badge-'+this.color;
          }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
