<template>
    <div class="form_container col-md-4 offset-md-4 ">
    	<h3 class=" text-center mb-4">Iniciar Sesión</h3>
    	<div class="card">
    		<div class="card-body">
		        <form class="form-login" @submit="formSubmitLogin">
				  <div class="form-group">
				    <label for="exampleInputEmail1">Correo electronico</label>
				    <input type="email" v-model="user" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Correo electronico">
		 
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Contraseña</label>
				    <input type="password" v-model="password"  class="form-control" id="password" name="password" placeholder="Contraseña">
			  
				  </div>
				  <div class="container_form_btn d-flex justify-content-center">
				  	<button type="submit"  class="btn btn-primary" >Entrar</button>
				  </div>
				  	  <!-- @csrf -->
				</form>    			
    		</div>
    	</div>

    </div>
</template>

<script>
    export default {
		data(){
			return {
				user: '',
				password: ''
			}	
		},
		methods:{
			async iniciarSesion(){
				
				axios.post('/login', {
					email: this.user,
					password: this.password
				})
				.then( res =>{  window.location.href = 'http://127.0.0.1:8000'})
				.catch(e => {
					this.errors = 0
							  console.log('LOGIN', e)
							  let email = e.response.data.errors.email
							  let password = e.response.data.errors.password
		
							  if(email != null){
							  	  this.$toasted.error(email, { 
						            position: "bottom-center",
						            duration : 10000,
						            // icon: "fa-search"
						           });
							  }else{
							  	this.$toasted.error(password, { 
						            position: "bottom-center",
						            duration : 10000
						         });
							  }

							  
							});
			},
			formSubmitLogin(e) {
                e.preventDefault();
                axios.post('/login' , {
					email: this.user,
					password: this.password
				})
                .then(res =>{ window.location.href = 'http://127.0.0.1:8000' } )
                .catch(err =>{
                            
					this.errors = 0
							  console.log('LOGIN', e)
							  let email = err.response.data.errors.email
							  let password = err.response.data.errors.password
		
							  if(email != null){
							  	  this.$toasted.error(email, { 
						            position: "bottom-center",
						            duration : 10000,
						            // icon: "fa-search"
						           });
							  }else{
							  	this.$toasted.error(password, { 
						            position: "bottom-center",
						            duration : 10000
						         });
							  }
                             
                                });
            },
		},
        mounted() {
        }
    }
</script>
