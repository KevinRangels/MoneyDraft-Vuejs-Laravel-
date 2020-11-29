<template>

    <div class="main">
     <BlockUI v-if="loading" :message="msg" :html="html"></BlockUI>

        <div class="content-header py-0">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <h1 class="panel_title mb-0">Panel <span style="font-weight: bold">de control</span></h1>
                            <p class="panel_subtitle">Actualiza y gestiona la tasa diaria</p>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
    
               <section class="panel_content">

                <div class="container-fluid">
                          <div class="row mt-4">
                             <div class="col-md-12 col-lg-5 col-12 ">
                                <!-- small box -->
                                  <div class="tasa_config_container" style="background: white">
                                      <h4 class="tasa_config_title">Tasa actualmente configurada</h4>

                                    <div class="row d-flex container_form_tasa">

                                       <form @submit="saveNewTasa" class="form-addtasa d-flex" >
                                        <div class="col-lg-4 col-md-12 col-12 px-0">
                                            <input type="text" maxlength="6" placeholder="Tasa" v-model="addTasa" class="tasa_config_input input-group">

                                        </div>
                                        <div class="col-lg-3 col-md-12 col-12 px-lg-2 px-0">
                                            <input type="text" maxlength="3" placeholder="Beneficio" v-model="addBeneficio" class="tasa_config_input input-group">

                                        </div>
                                        <div class="col-lg-4 col-md-12  col-12 px-0" style="text-align: end">
                                            <button type="submit" class="btn btn-success tasa_config_btn">Guardar cambios</button> 
                                        </div>
                                      </form>
                                   
                                    </div>
                                  </div>
                               
                              </div>

                                  <div class="col-md-12 col-lg-3 col-12 ">
                                    <div class="" style="background: white">
                                      <div class="tasa_config_container" style="text-align: center;">
                                        <h3 class="tasa_container_title">{{tasa_act}}</h3>
                                        <p class="tasa_container_calculate mb-0">100.000 COP = <span style="font-weight: bold">{{BssPage}} BSS</span></p>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="col-md-12 col-lg-3 col-12 ">
                                    <div class="" style="background: white">
                                      <div class="tasa_config_container" style="text-align: center;">
                                        <h3 class="tasa_container_title">{{beneficio_act}}% aprox</h3>
                                        <p class="tasa_container_calculate mb-0" style="font-weight: bold">Beneficios</p>
                                        <p class="tasa_container_calculate mb-0">{{CopPage}} COP p/c 100.000 COP</p>
                                      </div>
                                    </div>
                                  </div>



                        </div>


                        <!-- /.card-body -->                    
                    <!-- /.card -->
                    <div class="row mt-5">
                        <div class=" col-12">
                            <h1 class="panel_title mb-0">Tasa actual  <span style="font-weight: bold">- Localbitcoin</span></h1>
                            <p class="panel_subtitle">Ultima actualizacion de la tasa {{fechaFormated }}</p>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div>
            </section>

                          <div class="row mt-3">


                                  <div class="col-lg-3 col-12 ">
                                    <div class="" style=" background: #009618; color: white">
                                      <div class="tasa_config_container" style="text-align: center;">
                                        <h3 class="tasa_container_title">{{changetasaLB}}</h3>
                                        <p class="tasa_container_calculate mb-0">100.000 COP = <span style="font-weight: bold">{{BssLB}} BSS</span></p>
                                      </div>
                                    </div>
                                    <div class="tasa_use_container">
                                      <p class="tasa_use_text" @click="useTasaLB()">Usar esta tasa</p>
                                    </div>
                                  </div>

                                  <div class="col-lg-3 col-12">
                                    <div class="" style="background: white">
                                      <div class="tasa_config_container" style="text-align: center;">
                                        <h3 class="tasa_container_title">{{beneficioLB_act}}% aprox</h3>
                                        <p class="tasa_container_calculate mb-0" style="font-weight: bold">Beneficios</p>
                                        <p class="tasa_container_calculate mb-0">{{CopLb}} COP p/c 100.000 COP</p>
                                      </div>
                                    </div>
                                    <div class="tasa_use_container">
                                      <p class="tasa_use_text" data-toggle="modal" data-target="#exampleModalCenter">Cambiar tipo de beneficio</p>
                                    </div>
                                  </div>



                        </div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Cambiar beneficio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row d-flex form_modal_container" style="justify-content: flex-start;">
          <form @submit="changeLocalbitcoin" class="form_modal_addtasa d-flex" >
           <div class="mr-1">
              <input type="text" placeholder="Beneficio" maxlength="3" v-model="beneficiolocalbitcoin" class="tasa_config_input input-group">
          </div>
          <div class="">
              <button type="submit" class="btn btn-success tasa_config_btn">Cambiar</button> 
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>




    </div>

</template>

<script>
    export default {
        data(){
            return {
                valores : '',
                tasa: '',
                addTasa: null,
                addBeneficio: null,
                tasaActual: 0,
                recepcion: 0,
                compraCo: 100000,
                comision: 0,
                tasa_act: 0,
                cambiosBs: 0,
                msg: 'Espera mientras se cargan los datos',
                html: '<i class="fas fa-spinner fa-spin fa-3x fa-fw" style:"color:silver"></i>',
                loading: false,
                beneficiolocalbitcoin: null,
                getbeneficioLB: 0,
                beneficioLB_act: 0,
                beneficio_act: null,
                fechaAct: null,
                fechaFormated: null
            }   
        },
        methods:{
              async getPrices(){
                this.loading=true
                 await axios.get('http://127.0.0.1:8000/api/pricerefence')
                .then( res =>{ this.tasa = res.data,
                              console.log(res.data),
                              this.cambiosBs =  this.tasa.cambio,
                              this.recepcion = this.compraCo / this.tasa_act,
                              this.loading = false
                                 })
                .catch(err => console.log('LOGIN', err));
                
              },
              saveNewTasa(e) {
                 if (!this.validReference(this.addBeneficio) && this.addBeneficio != null){
                                      this.$toasted.error("Campo de cambio de beneficio es solo de números enteros", {
                                      position: "bottom-center", 
                                      duration : 5000
                                      });
                                    }
                 if (!this.validtasa(this.addTasa) && this.addTasa != null){
                                      this.$toasted.error("Campo de tasa debe ser un número decimal. Ejemplo: 0.050", {
                                      position: "bottom-center", 
                                      duration : 15000
                                      });
                                    }                                           
                  e.preventDefault();
                  axios.post('/newtasa', { tasa: this.addTasa, beneficio: this.addBeneficio })
                  .then(res =>{ this.$toasted.success("Tasa cambiada con exito", { 
                                      position: "bottom-right",
                                      duration : 10000,
                                      // icon: "fa-search"
                                     }),window.location.href = 'http://127.0.0.1:8000' } )
                  .catch(err =>{
                               let tasa = err.response.data.errors.tasa
                               let beneficio = err.response.data.errors.beneficio
                                  if(tasa != null){
                                      this.$toasted.error(tasa, { 
                                          position: "bottom-center",
                                          duration : 10000,
                                          // icon: "fa-search"
                                         });
                                  }else{
                                    this.$toasted.error(beneficio, { 
                                          position: "bottom-center",
                                          duration : 10000
                                       });
                                  }
                               console.log(err.response)
                               
                                  });
              },
              changeLocalbitcoin(e) {
                if (!this.validReference(this.beneficiolocalbitcoin) && this.beneficiolocalbitcoin != null){
                                      this.$toasted.error("Campo de cambio de beneficio es solo de números", {
                                      position: "bottom-center", 
                                      duration : 5000
                                      });
                                      this.reference = null
                                    }
                  e.preventDefault();
                  axios.post('/beneficiolocalbitcoin', { beneficio_localbitcoin: this.beneficiolocalbitcoin })
                  .then(res =>{ this.$toasted.success("Beneficio cambiado con exito", { 
                                      position: "bottom-right",
                                      duration : 10000,
                                      // icon: "fa-search"
                                     }),window.location.href = 'http://127.0.0.1:8000' } )
                  .catch(err =>{
                               console.log('LOGIN', err.response)
                               let beneficio_localbitcoin = err.response.data.errors.beneficio_localbitcoin
                                if(beneficio_localbitcoin != null){
                                      this.$toasted.error(beneficio_localbitcoin, { 
                                          position: "bottom-center",
                                          duration : 10000,
                                          // icon: "fa-search"
                                         });
                                  }
                                  });
              },
              validReference: function (beneficiolocalbitcoin, addBeneficio){
                  var re = /^([0-9])*$/;
                  return re.test(beneficiolocalbitcoin, addBeneficio)
              },
              validtasa: function (addTasa){
                  var re = /^([0-9.])*$/;
                  return re.test(addTasa)
              },
              getTasaAct(){
                axios.get('http://127.0.0.1:8000/api/tasa')
                .then( res =>{ this.tasaActual = res.data, console.log(this.tasaActual),
                               this.tasa_act =  this.tasaActual[this.tasaActual.length-1].tasa,
                               this.beneficio_act =  this.tasaActual[this.tasaActual.length-1].beneficio  })
                .catch(err => console.log('LOGIN', err));

              },     
              getTasas(){
                  axios.get('/welcome')
                  .then( res =>{ })
                  .catch(err => console.log('LOGIN', err));
              },
              getBeneficioLocalB(){
                 axios.get('http://127.0.0.1:8000/api/tasalocalbitcoin')
                 .then( res =>{this.getbeneficioLB = res.data,
                               this.beneficioLB_act =  this.getbeneficioLB[this.getbeneficioLB.length-1].beneficio_localbitcoin,
                               this.fechaAct =  this.getbeneficioLB[this.getbeneficioLB.length-1].created_at,
                               this.fechaFormated = this.$moment(this.fechaAct).format('DD/MM/YYYY HH:mm:ss')
                                })
                 .catch(err => console.log('LOGIN', err)); 
              },
              useTasaLB(){
                this.addTasa = this.changetasaLB
                this.addBeneficio = this.beneficioLB_act
              }
        },
        mounted() {
            this.getPrices()
            this.getTasas()
            this.getTasaAct()
            this.getBeneficioLocalB()

        },
        computed:{
         foo: function () {
          
          let  tasa = this.tasa_act
          let comCo = this.compraCo
          let rece = comCo/tasa
          rece = rece.toFixed(3)
          let cambiovs = this.cambiosBs
          cambiovs = cambiovs.toFixed(3)
          let comi = cambiovs - rece
          comi = comi.toFixed(3)
          let comireset = Intl.NumberFormat('de-DE').format(comi);                                        // this.recepcion = this.compraCo / this.tasa_act,
           return  comireset
          },
          cambiobs_formated: function () {       
              let cambiovs = this.cambiosBs
              cambiovs = cambiovs.toFixed(3)
              let cambiovs_formated = Intl.NumberFormat('de-DE').format(cambiovs);
               return  cambiovs_formated
          },
          changetasaLB: function(){
            let cambio = this.cambiosBs
            let beneficio = this.beneficioLB_act
            let comision =  (cambio/100)*beneficio   //($cambio * 12)/100;
            let recepcion = cambio - comision
            let tasaLB = 100000/recepcion
            tasaLB = tasaLB.toFixed(3)
            return tasaLB
          },
          BssLB: function(){
            let BssLB = 100000/this.changetasaLB
            BssLB = BssLB.toFixed(3)
            let copLB_formated = Intl.NumberFormat('de-DE').format(BssLB);
            return copLB_formated
          },
          CopLb: function(){
            let beneficio = this.beneficioLB_act
            let cop = 100000
            let beneficio_porciento = beneficio / 100
            let CopLb = cop * beneficio_porciento
            let CopLb_formated = Intl.NumberFormat('de-DE').format(CopLb);
            return CopLb_formated
          },
          BssPage: function(){
            let BssPage = 100000/this.tasa_act
            BssPage = BssPage.toFixed(3)
            let BssPage_formated = Intl.NumberFormat('de-DE').format(BssPage);
            return BssPage_formated 
          },
          CopPage: function(){
            let beneficio = this.beneficio_act
            let cop = 100000
            let beneficio_porciento = beneficio / 100
            let CopLb = cop * beneficio_porciento
            let CopLb_formated = Intl.NumberFormat('de-DE').format(CopLb);
            return CopLb_formated           
          }   
        }
    }
      
</script>
<style>
   *{
    font-family: 'Open Sans', sans-serif;
   }
    .loading-icon {
      color: silver;
    }
    .main{
      padding: 30px;
      background: #F4F6F9;
    }
    .panel_title{
      /*font-family: Open Sans;*/
      font-style: normal;
      font-weight: normal;
      font-size: 32px;
      line-height: 44px;
      color: #000000;
    }
    .panel_subtitle{
      font-family: Open Sans;
      font-style: normal;
      font-weight: normal;
      font-size: 16px;
      line-height: 22px;
      color: #595959;
    }
    .panel_content{
      border-top: 1px solid #EAEAEA;
      border-bottom: 1px solid #EAEAEA;
    }
    .tasa_config_container{
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 25px;
      height: 132px;
      border-radius: 4px;
    }
    .tasa_config_title{
      font-family: Open Sans;
      font-style: normal;
      font-weight: normal;
      font-size: 14px;
      line-height: 19px;
      color: #ADADAD;
    }
    .tasa_config_input{
      height: 50px;
      background: #FFFFFF;
      border: 1px solid #DDDDDD;
      box-sizing: border-box;
      border-radius: 4px;
      padding-left: 15px
    }
    .tasa_container_calculate{
      font-size: 15px;
    }
    .tasa_config_btn{
      text-align: end;
      background: #009618;
      border: 1px solid #009618;
      box-sizing: border-box;
      border-radius: 4px;
      height: 50px
    }
    .tasa_use_container{
      display: flex;
      justify-content: flex-end;
    }
    .tasa_use_text{
      font-family: Open Sans;
      font-style: italic;
      font-weight: 600;
      font-size: 14px;
      line-height: 19px;
      color: #000000; 
      margin-top: 7px;
      cursor: pointer;
    }
    .form-addtasa{
      justify-content: space-between;
    }
    .container_form_tasa{
        justify-content: space-between;
    }
     @media (min-width:770px) and (max-width:990px){
      .tasa_config_container{
        margin-bottom: 10px;
      }
     }
    @media (max-width:769px){
      .main{
        padding-left: 15px;
        padding-right: 15px;
      }
        .tasa_config_container{
          height: auto;
          margin-bottom: 10px;
          padding-right: 15px;
          padding-left: 15px;
        }
        .tasa_config_input{
          margin-bottom: 7px;
        }
        .tasa_config_btn{
          width: 100%;
          text-align: center;
        }
        .tasa_use_text{
          margin-top: 3px;
        }
      .form-addtasa{
        flex-direction: column;
      }
    .container_form_tasa{
       flex-direction: column;
    }
    .loading-container .loading{
      padding-right: 10px !important;
      padding-left: 10px !important;
    }
    .panel_title{
      font-size: 25px;
    }

    }
</style>
