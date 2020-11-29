<template>
  <div class="traking">
    <div class="billboard">
      <div class="fadein">
        <div class="billboard_image_background-1"></div>
        <Menu></Menu>

        <div class="billboard_shadow">
          <div class="billboard_container">
            <div class="billboard_container_title">
              <h3 class="billboard_title">
                <span style="font-weight: bold; display: contents;"
                  >Seguimiento</span
                >
                del <br />
                estado de mi envio
              </h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="traking_container ">
      <div class="traking_container_text">
        <h4 class="traking_text">
          Codigo de <span style="font-weight: 500;">seguimiento</span>
        </h4>
      </div>
      <div class="traking_container_input">
        <input
          type="text"
          class="traking_input"
          placeholder="ABC123"
          v-model="code"
          value="AXR352"
        />
      </div>

      <div class="traking_container_alert" v-if="error">
        <p class="traking_alert_text">
          No se encontro resultados para el codigo ingresado, por favor intente
          con otro
        </p>
      </div>

      <div class="traking_container_success" v-if="valid">
        <p class="traking_info_transfer">
          <span style="font-weight: bold">Enviado por: </span
          >xd.peter73@gmail.com - 04148504159
        </p>
        <p class="traking_info_transfer">
          <span style="font-weight: bold">Imagen de transferencia: </span
          ><span style="text-decoration: underline; cursor: pointer;"
            >haz click aqui</span
          >
          para ver en una nueva pestaña
        </p>
        <p class="traking_info_transfer">
          <span style="font-weight: bold">Datos para la consignacion: </span>
          Banesco - ****3821
        </p>

        <h6 class="traking_info_transfer mt-3 mb-3" style="font-weight: bold">
          Seguimiento:
        </h6>
        <div class="traking_container_list">
          <ul style="list-style: none; padding-left: 0" class="traking_list">
            <li class="d-flex mb-2">
              <div class="container_check" style="width: 30px; height: 20px;">
                <i class="material-icons mr-2">done</i>
              </div>
              Solicitud enviada
            </li>
            <li class="d-flex mb-2">
              <div class="container_check" style="width: 30px; height: 20px;">
                <i class="material-icons mr-2">done</i>
              </div>
              Solicitud Aprobada
            </li>
            <li class="d-flex mb-2">
              <div class="container_check" style="width: 30px; height: 20px;">
                <i class="material-icons mr-2">done</i>
              </div>
              Enviada a un aseso de Moneydraft
            </li>
            <li class="d-flex mb-2">
              <div class="container_check" style="width: 30px;">
                <i class="material-icons mr-2 d-none">done</i>
              </div>
              Transferencia realizada
            </li>
            <li class="d-flex mb-2">
              <div class="container_check" style="width: 30px;">
                <i class="material-icons mr-2 d-none">done</i>
              </div>
              Notificado al cliente
            </li>
            <li class="d-flex mb-2">
              <div class="container_check" style="width: 30px;">
                <i class="material-icons mr-2 d-none">done</i>
              </div>
              Solictud cerrada
            </li>
          </ul>
        </div>
      </div>
      <div class="traking_container_btn mb-5">
        <div class="traking_container_callme" v-if="valid">
          <a
            href="https://wa.me/584248644310"
            target="_blank"
            class="traking_btn_callme"
            >Tengo un problema, llamenme</a
          >
        </div>
        <a
          @click="confirmCode"
          style="color: white; cursor: pointer;"
          v-if="valid != true"
          class="billboard_header_btn-c"
          >Ver el estado de mi pedido</a
        >
        <a
          @click="searchOther"
          style="color: white; cursor: pointer;"
          v-if="valid"
          class="billboard_header_btn-c"
          >Buscar otro envio</a
        >
      </div>
    </div>
    <Footer></Footer>
  </div>
</template>
<script>
import Menu from "@/components/Menu.vue";
import Footer from "@/components/Footer.vue";
import axios from "axios";

export default {
  name: "traking",
  components: {
    Menu,
    Footer,
  },
  data() {
    return {
      code: "AXR352",
      code_success: "AXR352",
      error: false,
      valid: false,
    };
  },
  methods: {
    getTasa() {
      axios
        .get("http://127.0.0.1:8000/api/tasa")
        .then((res) => {
          console.log(res);
        })
        .catch((err) => console.log(err));
    },
    confirmCode() {
      if (this.code != this.code_success) {
        this.error = true;
      } else {
        this.error = false;
        this.valid = true;
      }
    },
    searchOther() {
      this.valid = false;
      this.code = "";
    },
    foo() {
      this.$toasted.error("Toasted !!", {
        duration: 5000,
      });
    },
  },
  mounted() {
    this.getTasa();
  },
};
</script>
<style scoped>
/*BILLBOARD*/

.billboard {
  width: 100%;
  height: 50vh;
}
.billboard_image_background-1 {
  position: absolute;
  left: 0%;
  right: 0%;
  top: 0%;
  bottom: 69.65%;
  background: url(../assets/images/bg-images/Rectangle4png), #c4c4c4;
  height: 50vh;
  width: 100%;
  background-size: cover;
  background-position: center center;
}
.billboard_image_background-2 {
  position: absolute;
  left: 0%;
  right: 0%;
  top: 0%;
  bottom: 69.65%;
  background: url(../assets/images/bg-images/family2.jpg), #c4c4c4;
  height: 50vh;
  width: 100%;
  background-size: cover;
  background-position: center center;
}
.billboard_image_background-3 {
  position: absolute;
  left: 0%;
  right: 0%;
  top: 0%;
  bottom: 69.65%;
  background: url(../assets/images/bg-images/family3.jpg), #c4c4c4;
  height: 50vh;
  width: 100%;
  background-size: cover;
  background-position: center center;
}

.billboard_shadow {
  position: absolute;
  left: 0%;
  right: 0%;
  /*top: 22.9%;*/
  /*bottom: 69.65%;*/
  height: 50vh;
  background: linear-gradient(180deg, rgba(0, 0, 0, 0) 10.63%, #000000 100%);
  /*margin-top: 220px;*/
}
.billboard_container {
  height: 50vh;
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
  padding-bottom: 30px;
  /*padding-right: 500px;*/
}
.billboard_container_title {
  margin-bottom: 15px;
  margin-top: 0;
  padding-right: 455px;
}
.billboard_title {
  font-family: Poppins;
  font-style: normal;
  font-weight: 300;
  font-size: 58px;
  line-height: 109.5%;
  /* or 64px */
  display: flex;
  align-items: center;
  color: #ffffff;
  text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
  width: auto;
  margin-left: 30px;
  margin-bottom: 0;
}
.billboard_header_btn-c {
  background: #4c2291;
  border-radius: 4px;
  width: 250px;
  height: 50px;
  text-align: center;
  justify-content: center;
  font-family: Poppins;
  font-style: normal;
  font-weight: normal;
  font-size: 14px;
  line-height: 21px;
  display: flex;
  align-items: center;
  text-align: center;
  color: #efe7fb;
  text-decoration: none;
}
.traking_container {
  padding-top: 90px;
  display: flex;
  flex-direction: column;
  padding-bottom: 130px;
  padding-right: 200px;
  padding-left: 200px;
}
.traking_container_text {
  display: flex;
  justify-content: center;
  margin-bottom: 15px;
}
.traking_text {
  font-family: Poppins;
  font-style: normal;
  font-weight: bold;
  font-size: 28px;
  line-height: 115.5%;
  color: #000000;
}
.traking_container_input {
  display: flex;
  justify-content: center;
  margin-bottom: 30px;
}
.traking_input {
  height: 100px;
  background: #f5f5f5;
  border: none;
  border-radius: 6px;
  width: 100%;
  color: #4c2291;
  font-family: Poppins;
  font-style: normal;
  font-weight: 300;
  font-size: 48px;
  line-height: 72px;
  text-align: center;
}
.traking_container_btn {
  display: flex;
  justify-content: flex-end;
}
.traking_container_alert {
  display: flex;
  justify-content: flex-start;
  background: #f6ffd3;
  border-radius: 8px;
  padding-top: 15px;
  margin-bottom: 30px;
  padding-left: 15px;
}
.traking_alert_text {
  font-family: Poppins;
  font-style: normal;
  font-weight: normal;
  font-size: 14px;
  line-height: 21px;
  color: #6c570a;
}
.traking_container_success {
  margin-bottom: 30px;
}
.traking_info_transfer {
  font-family: Poppins;
  font-style: normal;
  font-weight: 300;
  font-size: 14px;
  line-height: 21px;
  color: #000000;
  margin-bottom: 3px;
}
.traking_list {
  font-family: Poppins;
  font-style: normal;
  font-weight: 300;
  font-size: 14px;
  line-height: 21px;
  color: #000000;
  margin-bottom: 3px;
}
.traking_container_callme {
  display: flex;
  flex-direction: column;
  justify-content: center;
  margin-right: 20px;
}
.traking_btn_callme {
  font-family: Poppins;
  font-style: normal;
  font-weight: normal;
  font-size: 14px;
  line-height: 115.5%;
  color: #000000;
  text-decoration: underline;
}
@media (min-width: 520px) and (max-width: 1024px) {
  .billboard_title {
    font-size: 35px;
  }
  .billboard_container_title {
    padding-right: 180px;
  }
  .traking_container {
    padding-right: 100px;
    padding-left: 100px;
  }
  .traking_container_btn {
    justify-content: center;
  }
}
@media (min-width: 320px) and (max-width: 519px) {
  .billboard_title {
    font-size: 25px;
  }
  .billboard_container_title {
    padding-right: 50px;
  }
  .traking_container {
    padding-right: 30px;
    padding-left: 30px;
    padding-bottom: 30px;
    padding-top: 60px;
  }
  .traking_container_btn {
    justify-content: center;
    flex-direction: column;
  }
  .traking_btn_callme {
    margin-bottom: 20px;
    text-align: center;
  }
  /*.traking_container_callme{
			flex-direction: row;
		}*/
}
@media (min-width: 320px) and (max-width: 992px) {
  .navbar-nav {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    padding-left: 0;
    margin-bottom: 0;
    list-style: none;
    background: rgba(0, 0, 0, 0.65);
    text-align: center;
  }
  .responsive {
    display: flex;
    justify-content: center;
    margin-bottom: 10px;
  }
  .billboard_header_btn-a {
    font-weight: 300;
    text-decoration: none;
  }
  .billboard_header_btn-b {
    color: white;
    background: none;
  }
}
/*	@media (max-width:1024px) {

	}
*/
</style>
