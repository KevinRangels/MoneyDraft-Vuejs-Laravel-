<template>
  <aside class="main-sidebar sidebar-dark-primary elevation-4  ">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="images/logo/logo_blanco1.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">MoneyDraft</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
 
                    <div class="info">
                <!-- <li class="nav-item" style="cursor: pointer;"> -->
                    <a class="nav-link text-danger " style="color: white !important; cursor: pointer;" data-slide="true" @click="cerrarSesion()">Cerrar sesion&nbsp;<i class="fa fa-sign-out"></i></a>
                <!-- </li> -->
                    </div>
                </div>

                <!-- Sidebar Menu -->
  
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
</template>

<script>
    export default {
        methods:{
            cerrarSesion(){
                axios.get('/logout')
                .then( res =>{ window.location.href = 'http://moneydraft.pcarvajal.com' +'/login' })
                .catch(err => console.log('LOGOUT', err));
            }
        },

    }
</script>
