<template>
    <div>
        <li class="list-group-item " :class="className"><slot></slot></li>
        <small class="badge badge-pill float-sm-right " :class="badgeClass">{{ user }}</small>
    </div>
</template>

<script>
    export default {
        props:[
            'color',
            'user',
            'side'
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
