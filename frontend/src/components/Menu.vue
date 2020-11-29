<template>
			<nav data-scroll-header class="navbar navbar-expand-xl billboard_header p-0" id="navbar_responsive">
				<router-link to="/" class="d-flex">
				<div class="billboard_header_logo">
                    <img src="../assets/images/logo/logo_blanco 1.png" class="img-fluid" alt="">            
                </div>
                	<h1 class="billboard_header_title">Money<span style="font-weight: bold;">Draft</span></h1>	
				</router-link>


				<button class="navbar-toggler" style="margin-left: auto; outline: none" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="true" aria-label="Toggle navigation" >
			    <i class="material-icons" style="color: white; font-size: 22px">dehaze</i>
			  </button>
			  <div class="collapse navbar-collapse" style="justify-content: flex-end;" id="navbarNavDropdown">
			    <ul class="navbar-nav" >
			      <li class="nav-item" style="padding-top: 13px;">
		    		<router-link to="/" class="billboard_header_btn">Inicio</router-link>
			      </li>
			      <li class="nav-item" style="padding-top: 13px;">
			      	<router-link to="/" href="#testimonials" class="billboard_header_btn">Testimonios</router-link>
			      </li>
			      <li class="nav-item" style="padding-top: 13px;">
					<router-link to="/" href="#price_change" class="billboard_header_btn">Tasa del día</router-link>
			      </li>
			      <li class="nav-item" style="padding-top: 13px;">
					<router-link to="/" href="#contact" class="billboard_header_btn">Contactanos</router-link>
			      </li>
			      <li class="nav-item responsive">
			      	<router-link to="/" href="#price_change" class="billboard_header_btn-b responsive_btn">Enviar dinero a <span style="font-weight: bold;margin-left: 3px;"> Venezuela</span></router-link>
			      </li>
			    </ul>
			  </div>
			</nav>
</template>
<script>


let scroll = new SmoothScroll('a[href*="#"]', {
	speed: 900,
	clip: true,
	offset: 65
	});

export default {
  name: 'Menu',
  data(){
  	return {
  	}
  },
  mounted () {
	  	this.changeNavbar();
	  },
	  methods:{
	  	changeNavbar(){
	  		let navbar = document.getElementById('navbar_responsive')
			window.onscroll = function(ev) {
				var altura = window.pageYOffset
				// console.log(altura)
			    if ( altura >= navbar.clientHeight) {
			        navbar.style.background="black";
			    }else  {
			    	navbar.style.background="rgba(0, 0, 0, 0.65)";
			    }
			};
	  	}

	  }
}
</script>
<style scoped>
		.billboard_header{
		height: 100px;
		position: fixed;
		left: 0%;
		right: 0%;
		top: 0%;
		bottom: 95.97%;
		background: rgba(0, 0, 0, 0.65);
		display: flex;
		z-index: 1000;
		justify-content: start;

	}
	.billboard_header_logo{
		width: 75px;
		height: 52px;
		/*background: url(../assets/images/logo/logo_blanco 1.png);*/
		margin-top: 24px;
    	margin-bottom: 24px;
    	margin-left: 30px;
    	background-size: cover;
		background-position: center center;
	}
	.billboard_header_title{
		font-family: Poppins;
		font-style: normal;
		font-weight: 100;
		font-size: 22px;
		line-height: 33px;
		display: flex;
		align-items: center;
		/*text-align: center;*/
		color: #FFFFFF;
	}
	.billboard_header_containerbtn{
		width: 100%;
		display: flex;
		align-items: center;
		color: #FFFFFF;
		justify-content: flex-end
	}
	.billboard_header_btn{
		font-family: Poppins;
		font-style: normal;
		font-weight: 100;
		font-size: 14px;
		line-height: 21px;
		text-decoration: none;
		/* identical to box height */
		margin-right: 20px;
		color: #FFFFFF;
		/*float: right;*/
	}
	.billboard_header_btn-a{
		font-family: Poppins;
		font-style: normal;
		font-weight: 500;
		font-size: 14px;
		line-height: 21px;
		text-decoration-line: underline;
		color: #FFFFFF;
		margin-right: 19px;	
	}
	.billboard_header_btn-b{
		background: #FFFFFF;
		border-radius: 4px;
		width: 250px;
		height: 50px;
		display: flex;
		align-items: center;
		text-align: center;
		margin-right: 30px;
		justify-content: center;
		font-family: Poppins;
		font-style: normal;
		font-weight: normal;
		font-size: 14px;
		line-height: 21px;
		display: flex;
		color: #000000;
		text-decoration: none;
	}
		@media (max-width:575px){
		.billboard_header_logo[data-v-17c8f968] {
		    width: 70px;
		    margin-left: 20px;
	}
		.billboard_container_title{
			height: auto;
			padding-right: 0;
		}
		.billboard_title{
			font-family: Poppins;
			font-style: normal;
			font-weight: bold;
			font-size: 26px;
			line-height: 109.5%;
			width: auto;
		}
		.billboard_subtitle{
			width: auto;
			font-size: 12px;
			padding-right: 0;
			margin-bottom: 0;
		}
		.billboard_container_subtitle{
			height: auto;
			padding-right: 50px;
		}
		.billboard_container_btns{
			display: flex;
			flex-direction: column;
			margin-top: 15px;
			margin-bottom: 15px;
		}
		.billboard_header_btn-c{
			margin-bottom: 15px;
		}
		.billboard_testimonios_img{
			width: 60px;

		}
		.billboard_testimonios_text{
			font-size: 12px;
		}

	}
@media (min-width:320px) and (max-width:1200px){
	.navbar-nav {
	    display: -ms-flexbox;
	    display: flex;
	    -ms-flex-direction: column;
	    flex-direction: column;
	    padding-left: 0;
	    margin-bottom: 0;
	    list-style: none;
	    background: rgba(0, 0, 0, 0.85);
	    text-align: center;
	}
	.responsive{
		display: flex;
		justify-content: center;
		margin-bottom: 10px;
	}
	.billboard_header_btn-a{
		font-weight: 300;
		text-decoration: none;
	}
	 .responsive_btn{
		color: white;
		background: none;
	}
}
</style>