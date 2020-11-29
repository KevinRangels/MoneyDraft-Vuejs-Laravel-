<template>
  <div
    class="modal fade bd-example-modal-lg"
    id="modalStep0"
    tabindex="-1"
    role="dialog"
    aria-labelledby="myLargeModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content" v-if="modalStep == 1">
        <div class="step0_container">
          <div class="step0_container_warning">
            <div class="step1_image_warning"></div>
            <i class="material-icons" style="font-size: 65px; color: #000000;"
              >report_problem</i
            >
          </div>
          <p class="step0_text">Aviso importante</p>
          <h4 class="step0_title">Antes de continuar</h4>
          <p class="step0_information">
            Actualmente disponemos solo de los siguientes bancos para el envio
            de dinero a venezuela, por favor tenga en cuenta la siguiente lista
            y evite problemas mas adelante.
          </p>
          <div class="step0_container_banks">
            <div class="step0_bank">
              <img
                class="step_image_bank"
                src="../assets/images/bg-images/banesco.png"
                alt=""
              />
            </div>
            <div class="step0_bank">
              <img
                class="step_image_bank"
                src="../assets/images/bg-images/mercantil.png"
                alt=""
              />
            </div>
            <div class="step0_bank">
              <img
                class="step_image_bank"
                src="../assets/images/bg-images/bancoVenezuela.png"
                alt=""
              />
            </div>
          </div>
          <div class="step0_container_btn">
            <a type="button" class="billboard_header_btn-c" @click="modalStep1"
              >Acepto, continuar</a
            >
          </div>
        </div>
      </div>

      <div class="modal-content" v-if="modalStep == 2">
        <div class="step1_container">
          <div class="step1_container_head">
            <h4 class="step1_title1">
              Datos de transferencia y recepcion<br /><span
                style="display: contents;font-weight: bold;font-size: 32px;"
                >Realice el pago
                <span style="font-weight: 400; display: contents;"
                  >a:</span
                ></span
              >
            </h4>

            <div class="step1_container_pagination">
              <span class="step1_pagination"
                ><span style="color: #4C2291; font-weight: bold;">1</span>/2
                ></span
              >
            </div>
          </div>
          <div class="step1_container_pays">
            <div class="step1_pay_info">
              <div class="step1_pays_image"></div>
              <ul class="step1_pays_infoListU">
                <li class="step1_pays_infoList">
                  Banco: <span style="font-weight: 100;">BANCOLOMBIA</span>
                </li>
                <li class="step1_pays_infoList">
                  Titular:
                  <span style="font-weight: 100;">Pedro Caravajal</span>
                </li>
                <li class="step1_pays_infoList">
                  Pasaporte: <span style="font-weight: 100;">5113665231</span>
                </li>
                <li class="step1_pays_infoList">
                  Tipo de cuenta: <span style="font-weight: 100;">Ahorros</span>
                </li>
                <li class="step1_pays_infoList">
                  Numero de cuenta:
                  <span style="font-weight: 100;">46790061519</span>
                </li>
              </ul>
            </div>

            <div class="step1_pay_info">
              <div class="step1_pays_image"></div>
              <ul class="step1_pays_infoListU">
                <li class="step1_pays_infoList">
                  Banco: <span style="font-weight: 100;">BANCOLOMBIA</span>
                </li>
                <li class="step1_pays_infoList">
                  Titular:
                  <span style="font-weight: 100;">Geraldine Kuffati</span>
                </li>
                <li class="step1_pays_infoList">
                  Pasaporte: <span style="font-weight: 100;">5113665231</span>
                </li>
                <li class="step1_pays_infoList">
                  Tipo de cuenta: <span style="font-weight: 100;">Ahorros</span>
                </li>
                <li class="step1_pays_infoList">
                  Numero de cuenta:
                  <span style="font-weight: 100;">46790061519</span>
                </li>
              </ul>
            </div>
          </div>
          <p class="step1_pays_info2">
            Recuerde al momento de relizar el pago descargar una captura de
            patalla con la tranferencia realizada, haciendo visible tanto el
            numero de referencia como desde el banco que salio.
          </p>
          <h3 class="step1_transfer_title">
            <span style="font-weight: bold; display: contents;">Datos </span> de
            la transferencia
          </h3>
          <p class="step_transfer_info">
            Monto a transferir:
            <span style="font-weight: bold; display: contents;">
              100.000 COP</span
            >
          </p>
          <p class="step_transfer_info">
            Usted va a resivir aproximadamente:
            <span style="font-weight: bold; display: contents;">
              1.500.000 BSS</span
            >
          </p>
          <a
            href=""
            style="text-decoration: underline; color: black;font-weight: 100;font-size: 14px;margin-bottom: 20px; font-style: normal;"
            >Cambiar monto de envio</a
          >

          <div class="row" style="margin-top: 20px; margin-bottom: 30px;">
            <div class="col-6">
              <input
                class="step1_transfer_input"
                type=""
                name=""
                placeholder="Fecha cuando realizo el pago"
              />
              <input
                class="step1_transfer_input"
                type=""
                name=""
                placeholder="Numero de referencia"
              />
            </div>
            <div class="col-6">
              <input
                class="step1_transfer_input"
                type=""
                name=""
                placeholder="Desde de que banco realizo el pago"
              />
              <input
                class="step1_transfer_input"
                type=""
                name=""
                placeholder="Imagen de la transferencia"
              />
            </div>
          </div>
          <div class="step0_container_btn">
            <a
              type="button"
              class="billboard_header_btn-c"
              @click="modalStep2"
              style="margin-right: 0; margin-bottom: 0"
              >Siguiente</a
            >
          </div>
        </div>
      </div>

      <div class="modal-content" v-if="modalStep == 3">
        <div class="step1_container">
          <div class="step1_container_head">
            <h4 class="step1_title1">
              Datos de transferencia y recepcion<br /><span
                style="display: contents;font-weight: bold;font-size: 32px;"
                >A donde te enviaremos el pago?:</span
              >
            </h4>
            <p class="step_transfer_info"></p>
            <div class="step1_container_pagination">
              <span class="step1_pagination"
                ><span
                  @click="modalStep1"
                  style="color: #4C2291; cursor: pointer; font-weight: bold;"
                  >< 2</span
                >/2 ></span
              >
            </div>
          </div>
          <h4 class="step2_title1">
            <span style="font-weight: bold">Datos</span> de recepcion
          </h4>
          <div class="row" style="margin-top: 20px;">
            <div class="col-6">
              <input
                class="step1_transfer_input"
                type=""
                name=""
                placeholder="Nombre del banco"
              />
              <input
                class="step1_transfer_input"
                type=""
                name=""
                placeholder="Tipo de cuenta"
              />
              <input
                class="step1_transfer_input mb-0"
                type=""
                name=""
                placeholder="Cedula de identidad del titular"
              />
            </div>
            <div class="col-6">
              <input
                class="step1_transfer_input"
                type=""
                name=""
                placeholder="Numero de cuenta"
              />
              <input
                class="step1_transfer_input"
                type=""
                name=""
                placeholder="Nombre del titular"
              />
            </div>
          </div>
          <h4 class="step2_title2">Como te contactamos</h4>
          <div class="row" style="margin-bottom: 30px">
            <div class="col-12">
              <input
                class="step1_transfer_input"
                type=""
                name=""
                placeholder="Cual es tu nombre completo"
              />
            </div>
            <div class="col-6">
              <input
                class="step1_transfer_input"
                type=""
                name=""
                placeholder="Correo electronico"
              />
            </div>
            <div class="col-6">
              <input
                class="step1_transfer_input"
                type=""
                name=""
                placeholder="Telefono"
              />
            </div>
          </div>
          <div class="step0_container_btn">
            <a
              type="button"
              class="billboard_header_btn-c"
              @click="modalStep3"
              style="margin-right: 0; margin-bottom: 0"
              >Finalizar</a
            >
          </div>
        </div>
      </div>

      MODAL STEP 3

      <div
        class="modal-content"
        style="padding-top: 70px; padding-bottom: 70px;"
        v-if="modalStep == 4"
      >
        <div class="step3_container">
          <div class="step3_container_icon">
            <i class="material-icons" style="font-size: 70px; color: #4C2291;"
              >done</i
            >
          </div>
          <h2 class="step3_code">AXR352</h2>
          <p class="step3_info">
            Te enviamos un correo y un mensaje de texto con este codigo,
            guardalo y usalo para saber cual es el estado de tu envio en la
            pagina <span class="step3_info_bold">Estado de envios</span> o
            contactanos por <span class="step3_info_bold">Whatsapp</span> o
            <span class="step3_info_bold">Instagram</span>
          </p>
          <div class="step3_container_btn">
            <a
              type="button"
              class="billboard_header_btn-c"
              data-dismiss="modal"
              style="margin-right: 0; margin-bottom: 0"
              >Finalizar proceso</a
            >
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "ModalSteps",
  data() {
    return {
      modalStep: 0,
    };
  },

  methods: {
    modalStep0() {
      this.modalStep = 1;
      console.log(this.modalStep);
    },
    modalStep1() {
      this.modalStep = 2;
      console.log(this.modalStep);
    },
    modalStep2() {
      this.modalStep = 3;
      console.log(this.modalStep);
    },
    modalStep3() {
      this.modalStep = 4;
      console.log(this.modalStep);
    },
  },
};
</script>
