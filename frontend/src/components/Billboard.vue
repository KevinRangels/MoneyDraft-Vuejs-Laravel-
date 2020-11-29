<template>
		<!-- Billboard  -->
	<div class="billboard">
		<div class="fadein">
			<div class="billboard_image_background-1"></div>
			<div class="billboard_image_background-2"></div>
			<div class="billboard_image_background-3"></div>
            <!-- <img id="f1" src="../assets/images/bg-images/Rectangle 4.png" class=" billboard_image top" alt="">
            <img id="f2" src="../assets/images/bg-images/family2.jpg" class=" billboard_image bottom" alt="">
            <img id="f3" src="../assets/images/bg-images/family3.jpg" class=" billboard_image bottom" alt=""> -->
            <!-- <Menu></Menu> -->
				<div class="billboard_shadow">
					<div class="billboard_container">
						<div class="billboard_container_title" >
							<h3 class="billboard_title">Envia dinero <span style="font-weight: 100;display: contents;">a <br> tus familiares y amigos</span> </h3>					
						</div>
						<div class="billboard_container_subtitle" >
							<p class="billboard_subtitle">Consulta la tasa del dia y contacta con uno de nuestros asesores, <br> tambien puedes utilizar nuevo formulario online para enviar tu solicitud y te llamaremos cuando este lista.</p>					
						</div>
						<div class="billboard_container_btns" >
							<a href="" class="billboard_header_btn-c">Enviar dinero ahora</a>
							<a href="" class="billboard_header_btn-b">Haz la solicitud  <span style="font-weight: bold;margin-left: 3px;"> online</span></a>
						</div>
						<div class="billboard_container_testimonios">
							<div class="billboard_testimonios_img"></div>
							<div class="billboard_testimonios_container">
								<h4 class="billboard_testimonios_text">Testimonios</h4>
								<p class="billboard_testimonios_text" style="font-weight: 100">¡Ve que dicen nuestros clientes de nosotros!</p>	
							</div>
	
						</div>
					</div>

				</div>	
						
		</div>
		
	</div>
</template>
<script>
import Menu from '@/components/Menu.vue'

	var scroll = new SmoothScroll('a[href*="#"]', {
	speed: 600
	});
	
	export default {
	  name: 'billboard',
      components: {
        Menu
        },
	  mounted () {
	  	this.changeNavbar();
	  },
	  methods:{
	  	changeNavbar(){
	  		let navbar = document.getElementById('navbar_desktop')
			window.onscroll = function(ev) {
				var altura = window.pageYOffset
				// console.log(altura)
			    if ( altura >= navbar.clientHeight) {
			        navbar.style.background="black";
			    }else  {
			    	navbar.style.background="rgba(0, 0, 0, 0.15)";
			    }
			};
	  	}

	  }
	}

</script>
<style scoped>
.billboard{
		width: 100%;
		height: 100vh;
	}
	/*BILLBOARD*/
		@media (max-width:1024px) {
	  .billboard{
			display: none;
	   }
	}
	.billboard{
		width: 100%;
		height: 100vh;
	}
	.billboard_image_background-1{
		position: absolute;
		left: 0%;
		right: 0%;
		top: 0%;
		bottom: 69.65%;
		background: url(../assets/images/bg-images/Rectangle 4.png), #C4C4C4;
		height: 100vh;
		width: 100%;
		background-size: cover;
		background-position: center center;
	}
	.billboard_image_background-2{
		position: absolute;
		left: 0%;
		right: 0%;
		top: 0%;
		bottom: 69.65%;
		background: url(../assets/images/bg-images/family2.jpg), #C4C4C4;
		height: 100vh;
		width: 100%;
		background-size: cover;
		background-position: center center;
	}
	.billboard_image_background-3{
		position: absolute;
		left: 0%;
		right: 0%;
		top: 0%;
		bottom: 69.65%;
		background: url(../assets/images/bg-images/family3.jpg), #C4C4C4;
		height: 100vh;
		width: 100%;
		background-size: cover;
		background-position: center center;
	}	
    
	@keyframes cf3FadeInOut {
	  17% {
	    opacity:1;
	  }
	  25% {
	    opacity:0;
	  }

	  92% {
	    opacity:0;
	  }
	}

	.fadein .billboard_image_background-1 {

	}

	.fadein .billboard_image_background-2 {
	animation: cf3FadeInOut 28s 10s;
	animation-iteration-count: infinite;
	}

	.fadein .billboard_image_background-3 {
	animation: cf3FadeInOut 28s 6s;
	animation-iteration-count: infinite;
	}

	.billboard_header{
		height: 100px;
		position: fixed;
		left: 0%;
		right: 0%;
		top: 0%;
		bottom: 95.97%;
		background: rgba(0, 0, 0, 0.15);
		display: flex;
		z-index: 1000;

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
		margin-left: 15px;
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
	.billboard_shadow{
		position: absolute;
		left: 0%;
		right: 0%;
		/*top: 22.9%;*/
		/*bottom: 69.65%;*/
		height: 100vh;
		background: linear-gradient(180deg, rgba(0, 0, 0, 0) 10.63%, #000000 100%);
		/*margin-top: 220px;*/
	}
	.billboard_container{
		height: 100vh;
		display: flex;
		flex-direction: column;
		justify-content: flex-end;
        padding-bottom: 30px;
        /*padding-right: 500px;*/

	}
	.billboard_container_title{
		margin-bottom: 15px;
		margin-top: 0;
		padding-right: 500px;

	}
	.billboard_title{
		font-family: Poppins;
		font-style: normal;
		font-weight: bold;
		font-size: 58px;
		line-height: 109.5%;
		/* or 64px */
		display: flex;
		align-items: center;
		color: #FFFFFF;
		text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
		width: auto;
		margin-left: 30px;
		margin-bottom: 0;
	}
	.billboard_container_subtitle{
		height: 40px;
		padding-right: 450px;
	}
	.billboard_subtitle{
		font-family: Poppins;
		font-style: normal;
		font-weight: 300;
		font-size: 14px;
		line-height: 141%;
/*		width: auto;
*/		display: flex;
		align-items: center;
		color: #FFFFFF;
		margin-left: 30px;
		margin-top: 0;
	}
	.billboard_container_btns{
		display: flex;
		margin-top: 30px;
		margin-left: 30px;
		margin-bottom: 30px;

	}
	.billboard_header_btn-c{
		background: #4C2291;
		border-radius: 4px;
		width: 250px;
		height: 50px;
		text-align: center;
		margin-right: 30px;
		justify-content: center;
		font-family: Poppins;
		font-style: normal;
		font-weight: normal;
		font-size: 14px;
		line-height: 21px;
		display: flex;
		align-items: center;
		text-align: center;
		color: #EFE7FB;
		text-decoration: none;	
	}
	.billboard_container_testimonios{
		display: flex;
		color: white;
		align-items: center;
		/*padding-bottom: 45px;*/
		height: 48px;
	}
	.billboard_testimonios_img{
		background: url(../assets/images/icons/Vector.png);
		height: 36px;
		width: 30px;
		margin-left: 30px;
		background-position: center center;
		background-repeat: no-repeat;
		margin-right: 15px;

	}
	.billboard_testimonios_container{
		display: flex;
		flex-direction: column;
		width: 453px;
		/*margin-bottom: 30px;*/

	}
	.billboard_testimonios_text{
		margin: 0;
		font-family: Poppins;
		font-style: normal;
		font-weight: bold;
		font-size: 14px;
		line-height: 21px;
	}
</style>