<template>
  <div class="home">
    <!-- <Billboard></Billboard> -->
    <BillboardMovil></BillboardMovil>
    <section class="about-us" data-aos="fade-up">
      <div class="about_container">
        <h2 class="about_title">
          Money<span style="font-weight: bold;">Draft</span>
        </h2>
        <p class="about_text">
          Nuestra casa de cambio virtual nace como solución a esa problemática
          que tienen todos los venezolanos a la hora de enviar remesas a sus
          familias, ofrecemos tasas competitivas y en la mayoría de las veces la
          mejor que puedas encontrar.
        </p>
      </div>
    </section>

    <section class="testimonials" id="testimonials" data-aos="fade-up">
      <swiper :options="swiperOption">
        <swiper-slide
          v-for="(item, index) in testimonial.data"
          class="animated fadeIn"
          v-if="index <= addTestimonial"
        >
          <div class="testimonials_main_container">
            <div class="testimonials_ranking" style="direction: rtl">
              <i
                class="material-icons"
                v-for="number in [0, 1, 2, 3, 4]"
                v-bind:class="[
                  { calification_star: number >= item.calification },
                ]"
                >grade</i
              >
            </div>
            <div class="testimonials_container">
              <div class="testimonials_coment_container">
                <h5 class="testimonials_comment">{{ item.testimonials }}</h5>
              </div>
              <div class="testimonials_container_triangle">
                <div class="triangulo-2"></div>
              </div>
              <p class="testimonials_date">
                {{ item.date | moment("YYYY / MM") }}
              </p>
              <!-- 2019/05 -->
              <div class="testimonials_user_container">
                <div class="testimonials_user_image">
                  <img
                    class="testimonial_image"
                    :src="item.avatarUrl"
                    alt="Testimonios de personas que usaron los servicios de MoneyDraft"
                  />
                </div>
                <h4 class="testimonials_user_name">{{ item.name }}</h4>
                <p class="testimonial_user_operation">
                  {{ item.operation | currency }} Cop a Venezuela
                </p>
              </div>
            </div>
          </div>
        </swiper-slide>
        <div class="swiper-pagination" slot="pagination"></div>
      </swiper>
    </section>

    <!------------ WIDGET ---------------->

    <section class="widget" id="price_change" data-aos="fade-up">
      <div class="widget_container ">
        <h3 class="widget_text">¡Envia tus remesas con nosotros!</h3>
        <h3 class="widget_title">
          Calcula <span class="d-none d-lg-inline"> tu </span>
          <span style="font-weight: bold"
            ><span class="d-none d-lg-inline">tasa</span> y envia</span
          >
        </h3>

        <div class="widget_container_prices d-none d-lg-flex">
          <div class="widget_prices_send">
            <div class="widget_prices_county_co"></div>
            <div class="widget_container_info">
              <money
                v-model="pesos_co"
                class="widget_prices_quantity"
                minlength="6"
                maxlength="9"
                v-bind="money"
              ></money>
              <!-- <input type="" class="widget_prices_quantity"  name="" v-model="pesos_co" value="pesos_co"> -->
              <span class="widget_price_money">cop</span>
              <p class="widget_prices_sends" style="font-weight: 100">Envias</p>
            </div>
          </div>

          <div class="widget_prices_play">
            <div class="widget_container_info_foo">
              <div class="foo">
                <div class="widget_prices_circle"></div>
                <div class="widget_prices_circle"></div>
                <div class="widget_prices_circle"></div>
              </div>

              <div class="triangulo-3"></div>

              <div class="foo">
                <div class="widget_prices_circle"></div>
                <div class="widget_prices_circle"></div>
                <div class="widget_prices_circle"></div>
              </div>
            </div>
          </div>
          <div class="widget_prices_send">
            <div class="widget_prices_county_ve"></div>
            <div class="widget_container_info">
              <div
                id="texto"
                class="widget_prices_quantity ve"
                style="width: 100%"
                contenteditable="true"
              >
                {{ calculos }}
                <span class="widget_price_money" style="text-align: start"
                  >bss</span
                >
              </div>

              <!-- <input type="" class="widget_prices_quantity" name="" v-model="calculos" value="calculos"> -->
              <p class="widget_prices_sends" style="font-weight: 100">
                Recibes
              </p>
            </div>
          </div>
        </div>
        <div class="widget_container_price-movil d-flex d-lg-none">
          <div class="widget_prices_send-movil">
            <div class="widget_prices_county_co"></div>
            <div class="widget_container_info">
              <money
                v-model="pesos_co"
                class="widget_prices_quantity"
                maxlength="9"
                v-bind="money"
              ></money>

              <span class="widget_price_money-co">cop</span>
              <p class="widget_prices_sends" style="font-weight: 100">Envias</p>
            </div>
          </div>
          <div class="widget_prices_play-movil">
            <div class="widget_container_info_foo-movil">
              <div class="foo-movil">
                <div class="widget_prices_circle-movil"></div>
                <div class="widget_prices_circle-movil"></div>
                <div class="widget_prices_circle-movil"></div>
              </div>

              <div class="widget_container_triangle">
                <div class="widget_triangulo_movil"></div>
              </div>

              <div class="foo-movil">
                <div class="widget_prices_circle-movil"></div>
                <div class="widget_prices_circle-movil"></div>
                <div class="widget_prices_circle-movil"></div>
              </div>
            </div>
          </div>
          <div class="widget_prices_send-movil">
            <div class="widget_prices_county_ve"></div>
            <div class="widget_container_info">
              <div
                id="texto"
                class="widget_prices_quantity"
                style="min-width: 150px; text-align: start"
                contenteditable="true"
              >
                {{ calculos }}
                <span
                  class="widget_price_money-ve"
                  style="text-align: start; width: auto;"
                  >bss</span
                >
              </div>
              <p class="widget_prices_sends" style="font-weight: 100">
                Recibes
              </p>
            </div>
          </div>
        </div>

        <a
          class="billboard_widget_btn"
          v-bind:href="link()"
          @click="btnLink()"
          target="_blank"
          >Realizar envio ahora</a
        >
        <div class="widget_container_description">
          <p class="widget_description">
            La tasa puede variar de una hora a otra, tenlo presente al momento
            de realizar tus envios.
          </p>
        </div>

        <p class="widget_text mt-5">
          Hay {{ userRandom2 }} <span v-if="userRandom == 1">persona</span
          ><span v-if="userRandom > 1">personas</span> cambiando en este momento
        </p>
      </div>
    </section>
    <section class="contact" id="contact" data-aos="fade-up">
      <div class="contact_container">
        <p class="contact_text">Contacta con nosotros</p>
        <h3 class="contact_title d-none d-md-block">
          Estamos en
          <span style="font-weight: bold;">instagram y whatsapp</span>
        </h3>
        <h3 class="contact_title d-block d-md-none ">
          Estamos en <span style="font-weight: bold;">IG y WS</span>
        </h3>
        <a href="https://wa.me/584248644310" target="_blank" class="">
          <div class="contact_btn_ws"></div>
        </a>

        <a
          href="https://www.instagram.com/moneydraft_co/"
          target="_blank"
          class=""
        >
          <div class="contact_btn_instagram"></div>
        </a>
      </div>
    </section>
    <footer class="footer">
      <div class="footer_container">
        <p class="footer_text">
          Todos los derechos reservados <br class="d-block d-lg-none" />
          Money<span style="font-weight: bold; display: contents;">Draft</span>
          - 2020
        </p>
      </div>
    </footer>
  </div>
</template>

<script>
import Billboard from "@/components/Billboard.vue";
import BillboardMovil from "@/components/BillboardMovil.vue";
import axios from "axios";

AOS.init();

export default {
  name: "home",
  components: {
    Billboard,
    BillboardMovil,
  },
  data() {
    return {
      swiperOption: {
        slidesPerView: 5,
        spaceBetween: 30,
        autoplay: {
          delay: 4000,
          disableOnInteraction: true,
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        breakpoints: {
          520: {
            slidesPerView: 1,
            spaceBetween: 1,
          },
          729: {
            slidesPerView: 2,
            spaceBetween: 10,
          },
          1024: {
            slidesPerView: 3,
            spaceBetween: 10,
          },
        },
      },

      validation: 0,
      pesos_co: 100000,
      bolivares: 30,
      foo: "foo",
      prueba: `https://wa.me/584248644310?text=Deseo%20cambiar%20`,
      testimonials: [1, 2, 3, 4, 5, 6],
      array1: [1, 2],
      tasas: 0,
      tasaAct: 0,
      money: {
        precision: 0,
        decimal: ",",
        thousands: ".",
      },
      userRandom: 0,
      testimonial: [],
      addTestimonial: 5,
    };
  },

  methods: {
    getTasaAct() {
      axios
        .get("http://127.0.0.1:8000/api/tasa")
        .then((res) => {
          (this.tasas = res.data),
            (this.tasaAct = this.tasas[this.tasas.length - 1].tasa);
        })

        .catch((err) => console.log("Tasa", err));
    },
    enviarMensjae() {
      let x = this.pesos_co;
      console.log(this.pesos_co);
    },
    addTestimonials() {
      setInterval(() => {
        if (this.addTestimonial <= 9) {
          // console.log("Probando")

          this.addTestimonial = this.addTestimonial + 1;
        } else {
          // console.log("listo")
        }
      }, 10000);
    },
    btnLink() {
      let pesos = this.pesos_co;
      if (pesos < 10000) {
        this.$toasted.error("El monto minimo son 10.000 COP", {
          duration: 10000,
        });
      } else if (pesos > 1000000) {
        this.$toasted.error("El monto maximo son 1.000.0000 COP", {
          duration: 10000,
        });
      }
    },
    link() {
      let pesos = this.pesos_co;
      if (pesos >= 10000 && pesos <= 1000000) {
        return `https://wa.me/584248644310?text=Deseo%20cambiar%20${this.pesos_formated}%20COP%20para%20recibir%20${this.calculos}%20Bss`;
      }
    },
    getTestimonial() {
      axios
        .get("http://127.0.0.1:8000/api/testimonials")
        .then((res) => {
          (this.testimonial = res.data), console.log(this.testimonial);
        })

        .catch((err) => console.log("LOGIN", err));
    },
  },
  mounted() {
    this.addTestimonials();
    this.getTasaAct();
    this.getTestimonial();
  },
  computed: {
    calculos: function() {
      let cambiobs = this.pesos_co / this.tasaAct;
      let cambiobs_formated = Math.trunc(cambiobs);
      cambiobs_formated = Intl.NumberFormat("de-DE").format(cambiobs_formated);

      return cambiobs_formated;
    },
    pesos_formated: function() {
      let cambiobs = this.pesos_co;
      let cambiobs_formated = Math.trunc(cambiobs);
      cambiobs_formated = Intl.NumberFormat("de-DE").format(cambiobs_formated);

      return cambiobs_formated;
    },
    userRandom2: function() {
      let myNumeroAleatorio = Math.floor(Math.random() * 5) + 1;
      this.userRandom = myNumeroAleatorio;
      return myNumeroAleatorio;
    },
  },
};
</script>
<style scoped>
.prueba {
  border: 1px solid white;
}

html {
  scroll-behavior: smooth;
}
/*FOOTER*/
.footer {
  width: 100%;
  height: 100px;
  background: #f5f5f5;
}
.footer_container {
  padding-right: 30px;
}
.footer_text {
  font-family: Poppins;
  font-style: normal;
  font-weight: normal;
  line-height: 115.5%;
  display: flex;
  justify-content: flex-end;
  color: #595959;
  padding-top: 42px;
}

/*ABOUT US*/
.about-us {
  width: 100%;
  height: auto;
  background: #f5f5f5;
  overflow: hidden;
  padding-top: 90px;
  padding-bottom: 90px;
  padding-left: 174px;
  padding-right: 174px;
}
.about_container {
  text-align: center;
  width: 100%;
}
.about_title {
  margin-bottom: 10px;
  font-family: Poppins;
  font-style: normal;
  font-weight: normal;
  font-size: 32px;
  line-height: 48px;
  align-items: center;
  text-align: center;
  color: #000000;
}
.about_text {
  margin-top: 0px;
  font-family: Poppins;
  font-style: normal;
  font-weight: normal;
  font-size: 22px;
  line-height: 33px;
  display: flex;
  align-items: center;
  text-align: center;
  color: #595959;
}
/*TESTIMONIALS*/
.testimonials {
  width: 100%;
  height: 519px;
}
.testimonials_main_container {
  width: 201px;
  height: auto;
  margin-left: 40px;
  shape-margin: 30px;
  margin-top: 90px;
}
.testimonials_ranking {
  text-align: right;
  height: 15px;
  margin-bottom: 13px;
}
.testimonial_stars {
  margin-right: 3px;
}
.testimonials_ranking .far .fa-star {
  margin-left: 225px;
}
.testimonials_container {
  width: 100%;
  /*height: 274px;*/
  margin-bottom: 55px;
}
.testimonials_coment_container {
  height: 150px;
  background: #f5f5f5;
  border-radius: 8px;
  padding: 19px 21px 26px 24px;
  display: flex;
  align-items: center;
  text-align: center;
}
.testimonials_comment {
  font-family: Poppins;
  font-style: normal;
  font-weight: normal;
  font-size: 13px;
  line-height: 19px;
  color: #595959;
}
.testimonials_container_triangle {
  width: 100%;
  display: flex;
  justify-content: center;
  margin-top: -12px;
}
.triangulo-2 {
  height: 24px;
  width: 28px;
  /*border: 1px solid red;*/
  background: url(../assets/images/icons/triangulo_testimonios.svg);
  background-size: cover;
  background-position: center center;
}
.testimonials_date {
  font-family: Poppins;
  font-style: normal;
  font-weight: bold;
  font-size: 11px;
  line-height: 16px;
  color: silver;
  display: flex;
  justify-content: flex-end;
  margin-top: 0;
  margin-bottom: 0;
}
.testimonials_user_image {
  display: flex;
  justify-content: center;
}
.testimonial_image {
  border-radius: 100%;
  width: 54px;
  height: 54px;
}
.testimonials_user_name {
  margin-top: 6px;
  margin-bottom: 0;
  display: flex;
  justify-content: center;
  font-family: Poppins;
  font-style: normal;
  font-weight: bold;
  font-size: 14px;
  line-height: 21px;
  color: #000000;
}
.testimonial_user_operation {
  margin-top: 0px;
  display: flex;
  justify-content: center;
  font-family: Poppins;
  font-style: normal;
  font-weight: normal;
  font-size: 11px;
  line-height: 16px;
  color: #595959;
}
.swiper-pagination {
  display: flex;
  justify-content: flex-end;
  left: -30px !important;
}
.swiper-pagination >>> .swiper-pagination-bullet-active {
  background-color: #4c2291 !important;
  margin-top: 200px;
  height: 10px !important;
  width: 10px !important;
}
.swiper-pagination >>> .swiper-pagination-bullet {
  background-color: #4c2291 !important;
  margin-top: 200px;
  height: 10px !important;
  width: 10px !important;
}
/*WIDGET*/
.widget {
  /*height: 462px;*/
  background: #4c2291;
  backdrop-filter: blur(10px);
  padding-top: 90px;
  padding-bottom: 90px;
}
.widget_container {
  text-align: center;
  padding-right: 150px;
  padding-left: 150px;
}
.widget_text {
  font-family: Poppins;
  font-style: normal;
  font-weight: 100;
  font-size: 18px;
  line-height: 16px;
  color: #ffffff;
  margin: 0;
}
.widget_title {
  font-family: Poppins;
  font-style: normal;
  font-weight: 100;
  font-size: 36px;
  line-height: 16px;
  color: #ffffff;
  margin-top: 18px;
}
.billboard_widget_btn {
  font-family: Poppins;
  font-style: normal;
  font-weight: normal;
  font-size: 14px;
  line-height: 21px;
  color: #000000;
  align-items: center;
  text-align: center;
  justify-content: center;
  width: 250px;
  height: 50px;
  background: #ffffff;
  border-radius: 4px;
  border: none;
  cursor: pointer;
  margin-top: 51px;
  margin-bottom: 13px;
  display: inline-flex;
}
.widget_container_description {
  text-align: center;
  width: 100%;
  /*border: 1px solid red;*/
  justify-content: center;
  display: flex;
}
.widget_description {
  width: 299px;
  font-family: Poppins;
  font-size: 12px;
  line-height: 18px;
  color: #fffdfd;
  font-style: italic;
  margin-bottom: 0;
}
.widget_container_prices {
  display: flex;
  justify-content: center;
  padding-top: 42px;
  margin-bottom: 60px;
  height: 42px;
}
.widget_container_price-movil {
  display: flex;
  text-align: center;
  padding-top: 30px;
  flex-direction: column;
}

.widget_prices_county_co {
  /*border: 1px solid red;*/
  /*background: red;*/
  background: url(../assets/images/bg-images/colmbia.png);
  background-position: center center;
  background-repeat: no-repeat;
  background-size: cover;
  border-radius: 50%;
  width: 45px;
  height: 45px;
  -moz-border-radius: 50%;
  -webkit-border-radius: 50%;
  border-radius: 50%;
}
.widget_prices_county_ve {
  background: url(../assets/images/bg-images/venezuela.png);
  background-position: center center;
  background-repeat: no-repeat;
  background-size: cover;
  border-radius: 50%;
  width: 45px;
  height: 45px;
  -moz-border-radius: 50%;
  -webkit-border-radius: 50%;
}
.widget_price_money {
  font-size: 14px;
  position: absolute;
  top: 190px;
  width: 174px;
  text-align: end;
  font-family: Poppins;
  font-style: normal;
  font-weight: bold;
  color: #ffffff;
}
.widget_price_money-co {
  font-size: 14px;
  position: absolute;
  top: 167px;
  width: 174px;
  text-align: end;
  font-family: Poppins;
  font-style: normal;
  font-weight: bold;
  color: #ffffff;
}
.widget_price_money-ve {
  font-size: 14px;
  position: absolute;
  top: 395px;
  width: 174px;
  text-align: end;
  font-family: Poppins;
  font-style: normal;
  font-weight: bold;
  color: #ffffff;
  margin-bottom: 30px;
}
.widget_container_info {
  display: flex;
  flex-direction: column;
  margin-left: 9px;
}
.widget_container_info_foo {
  display: flex;
}
.widget_container_info_foo-movil {
  flex-direction: column;
  display: flex;
}
.widget_prices_send {
  display: flex;
  align-items: center;
  margin-top: 42px;
  margin-bottom: 40px;
}
.widget_prices_send-movil {
  display: flex;
  align-items: center;
  margin-top: 0;
  margin-bottom: 0;
  justify-content: center;
}
.widget_prices_play {
  display: flex;
  align-items: center;
  justify-content: center;
  margin-top: 42px;
  margin-bottom: 40px;
  /*width: 400px;*/
  margin-left: 62px;
  margin-right: 62px;
  /*background: red;*/
}
.widget_prices_play-movil {
  display: flex;
  align-items: center;
  justify-content: center;
  margin-top: 20px;
  margin-bottom: 20px;
  /*width: 400px;*/
  margin-left: 62px;
  margin-right: 62px;
  /*background: red;*/
}
.widget_prices_quantity {
  margin: 0;
  font-family: Poppins;
  font-style: normal;
  font-weight: bold;
  font-size: 32px;
  line-height: 115.5%;
  color: #ffffff;
  background: #4c2291;
  border: none;
  width: 150px;
  outline: none;
}
.widget_prices_quantity.ve {
  min-width: 150px;
  text-align: start;
}
.widget_prices_sends {
  margin: 0;
  font-family: Poppins;
  font-style: normal;
  font-weight: normal;
  font-size: 14px;
  line-height: 115.5%;
  color: #ffffff;
  text-align: left;
}
.triangulo-3 {
  height: 19px;
  width: 19px;
  /*border: 1px solid red;*/
  background: url(../assets/images/icons/triangulo_play.svg);
  /*background-size: cover;*/
  background-position: center center;
  background-repeat: no-repeat;
}
.widget_triangulo_movil {
  height: 19px;
  width: 19px;
  margin-bottom: 10px;
  margin-top: 10px;
  /*border: 1px solid red;*/
  background: url(../assets/images/icons/trinagulo_play_bottom.svg);
  /*background-size: cover;*/
  background-position: center center;
  background-repeat: no-repeat;
}
.widget_prices_circle {
  border-radius: 50%;
  width: 6px;
  height: 6px;
  background: #7946ca;
  margin-left: 4px;
  display: flex;
  flex-direction: /*column*/ ;
}
.widget_prices_circle-movil {
  border-radius: 50%;
  width: 6px;
  height: 6px;
  background: #7946ca;
  margin-left: 4px;
  display: flex;
  flex-direction: /*column*/ ;
  margin-bottom: 8px;
}
.foo {
  display: flex;
  flex-direction: /*column*/ ;
  margin-left: 7px;
  margin-right: 10px;
  margin-top: 7px;
}
.foo-movil {
  display: flex;
  flex-direction: column;
  margin-left: 7px;
  margin-right: 10px;
  margin-top: 7px;
}
.widget_container_triangle {
  display: flex;
  justify-content: center;
}
.billboard_header_btn-c {
  background: #4c2291;
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
  color: #efe7fb;
  text-decoration: none;
}
/*CONTACT*/
.contact {
  width: 100%;
}
.contact_container {
  padding-top: 90px;
  text-align: center;
  padding-bottom: 90px;
}
.contact_text {
  font-size: 18px;
  font-family: Poppins;
  font-style: normal;
  font-weight: normal;
  color: #595959;
}
.contact_title {
  font-family: Poppins;
  font-style: normal;
  font-weight: normal;
  font-size: 36px;
  line-height: 10px;
  color: black;
  margin-top: 16px;
  margin-bottom: 30px;
}
.contact_btn_instagram {
  display: inline-block;
  /*background: black;*/
  height: 38px;
  width: 38px;
  margin-left: 13px;
  border-radius: 4px;
  background: url(../assets/images/icons/icon_instagram.svg);
}
.contact_btn_ws {
  display: inline-block;
  /*background: black;*/
  height: 38px;
  width: 38px;
  margin-left: 13px;
  background: url(../assets/images/icons/icon_wasap.svg);
}

.billboard_header_btn-c:hover {
  color: #efe7fb;
}
.calification_star {
  color: silver;
}
.calification_star2 {
  color: silver;
}

@media (max-width: 1024px) {
  .about-us {
    padding-left: 54px;
    padding-right: 54px;
  }
  .widget_container {
    padding-left: 75px;
    padding-right: 75px;
  }
}
@media (max-width: 768px) {
  .about-us {
    padding-left: 20px;
    padding-right: 20px;
  }
  .about_text {
    font-size: 18px;
    line-height: 24px;
  }
  .testimonials_main_container {
    margin-left: 0;
  }
  .swiper-slide-active {
    /*padding-left: 30px !important;*/
  }
  .widget_container {
    padding-left: 10px;
    padding-right: 10px;
  }
  .contact_title {
    font-size: 30px;
  }
  .widget_text {
    font-size: 16px;
  }
  .footer_text {
    font-family: Poppins;
    font-style: normal;
    font-weight: normal;
    line-height: 115.5%;
    display: flex;
    justify-content: center;
    color: #595959;
    padding-top: 42px;
    text-align: center;
  }
  .step0_container_banks {
    display: flex;
    flex-direction: column;
  }
  .step0_container_btn {
    justify-content: center;
  }
  .modal-content {
    height: auto;
    width: 100%;
  }
  .step1_title1 {
    width: 83%;
  }
  .step1_container_pays {
    flex-direction: column;
  }
  .step1_pay_info {
    margin-right: 0;
    margin-bottom: 10px;
  }
  .step1_pays_image {
    width: auto;
  }
  .step1_pays_info2 {
    width: 100%;
  }
  .step1_container {
    padding-right: 20px;
    padding-left: 20px;
  }
  .step3_container {
    padding-right: 20px;
    padding-left: 20px;
  }
  .step1_container_pagination {
    padding-right: 17px;
    padding-top: 50px;
  }
  .footer_container {
    padding-right: 10px;
    padding-left: 10px;
  }
  .billboard_header_btn-c {
    margin-right: 0;
  }
}
@media (min-width: 320px) and (max-width: 520px) {
  .testimonials_main_container {
    margin-left: auto;
    margin-right: auto;
  }
}
</style>
