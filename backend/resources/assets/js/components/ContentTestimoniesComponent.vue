<template>

    <div class="main">

        <div class="content-header py-0">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 col-12">
                        <h1 class="panel_title mb-0">Testimonios</h1>
                            <!-- <p class="panel_subtitle">Actualiza y gestiona la tasa diaria</p> -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    
        <section class="panel_content">
          <div class="container-fluid">
              <div class="row mt-4">
                <div class="col-md-12 col-lg-5 col-12 ">
                    <div class="testimonies_add_container" style="background: white">
                        <h4 class="testimonies_title">Agregar Testimonio</h4>


                          <form  class="form-addtasa d-flex" @submit="newTestimonials" method="post"  enctype="multipart/form-data">
                          <div class="col-lg-12 col-md-12 col-12 ">
                            <label class="form_labels">Nombre y apellido</label>
                              <input type="text" v-model="name" placeholder="Nombre" class="tasa_config_input input-group">

                          </div>
                          <div class="col-lg-12 col-md-12 col-12 ">
                            <label class="form_labels">Testimonio</label>
                              <input type="text" v-model="testimonials"  placeholder="Testimonio"  class="tasa_config_input input-group">

                          </div>
                          <div class="col-lg-12 col-md-12 col-12 ">
                            <label class="form_labels">Monto de operacion</label>
                              <input type="text" v-model="operation"  placeholder="Monto de cambio"  class="tasa_config_input input-group">

                          </div>
                          <div class="col-lg-12 col-md-12 col-12 ">
                            <label class="form_labels">Calificacion</label>
                              <input type="number" v-model="calification" min="1" max="5"  placeholder="Calificacion"  class="tasa_config_input input-group">

                          </div>
                          <div class="col-lg-12 col-md-12 col-12 ">
                            <label class="form_labels">Fecha</label>
                              <input type="date" v-model="date"  placeholder="Fecha"  class="tasa_config_input date input-group">

                          </div>
                          <div class="col-lg-6 col-md-12 col-12 mb-3">


                            <label class="form_labels">Imagen</label>
                              <input type="file" name="file" @change="previewFiles()" id="file" ref="myFiles"   placeholder="Beneficio"  class="tasa_config_input file input-group">
                            

                            <div class="col-lg-3" v-if="image">
                              <img :src="image" class="img-responsive" height="70" width="90">
                           </div>

                          </div>
                          <div class="col-lg-12 col-md-12  col-12 ">
                              <button type="submit" class="btn btn-success tasa_config_btn">Agregar</button> 
                          </div>
                        </form>
                                   
                    </div>                  
                </div>
              </div>
          </div>

  
        </section>

    </div>

</template>

<script>
    export default {
        data(){
            return {
              name: '',
              testimonials: '',
              operation: null,
              calification: null,
              date: null,
              image: '',
              avatar: ''
            }   
        },
        methods:{
   previewFiles(event) {
      this.avatar = this.$refs.myFiles.files
      let foo = this.avatar[0].name
      this.avatar = foo
      console.log(foo)
   },
            onImageChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
            },
            createImage(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.image = e.target.result;
                };
                reader.readAsDataURL(file);
            },
           newTestimonials(e){
let config = { headers: { 'Content-Type': 'multipart/form-data' } }

              e.preventDefault();          
              axios.post('/addtestimonials', {
                // name: this.name,
                // testimonials: this.testimonials,
                // operation:this.operation,
                // calification: this.calification,
                // date: this.date,
                // avatar: this.avatar
              },  { headers: { 'Content-Type': 'multipart/form-data' } } )
              .then( res =>{ debugger })
              .catch(e => {  debugger   });
          }
          

        },

        computed:{
        }
    }
      
</script>
<style>
    .main{
      padding: 30px;
      background: #F4F6F9;
    }
    .panel_title{
      font-style: normal;
      font-weight: normal;
      font-size: 32px;
      line-height: 44px;
      color: #000000;
    }
    .testimonies_add_container{
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 25px;
      height: auto;
      border-radius: 4px;
    }
    .testimonies_title{
      font-family: Open Sans;
      font-style: normal;
      font-weight: normal;
      font-size: 14px;
      line-height: 19px;
      color: #ADADAD;
    }
    .form-addtasa{
      flex-direction: column;
    }
    .tasa_config_input{
      height: 50px;
      background: #FFFFFF;
      border: 1px solid #DDDDDD;
      box-sizing: border-box;
      border-radius: 4px;
      padding-left: 15px;
      margin-bottom: 15px;
    }
    .tasa_config_input.date{
      padding-top: 10px;
    }
    .tasa_config_input.file{
      padding-top: 10px;
    }
    .form_labels{
      font-size: 14px;
      margin-bottom: 1px;
    }
</style>
