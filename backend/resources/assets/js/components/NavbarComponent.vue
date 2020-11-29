<template>
      <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom" style="margin-left: 0 !important">
            <!-- Left navbar links -->

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item" style="cursor: pointer;">
                    <a class="nav-link nav_btn" data-slide="false" @click="cerrarSesion()">Cerrar Sesion&nbsp;<i class="fa fa-sign-out" style="color: #0D0D0D; margin-left: 9px"></i></a>
                </li>
            </ul>
        </nav>
</template>

<script>
    export default {
        methods:{
            cerrarSesion(){
                axios.get('/logout')
                .then( res =>{ window.location.href = 'http://backend.moneydraft.pcarvajal.com' +'/login' })
                .catch(err => console.log('LOGIN', err));
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
<style scoped>
    .nav_btn{
        font-family: Open Sans;
        font-style: normal;
        font-weight: normal;
        font-size: 16px;
        line-height: 22px;
        color: #8C8C8C;
        margin-left: 9px;    
    }
</style>