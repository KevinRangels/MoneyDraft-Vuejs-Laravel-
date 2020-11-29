<template>
  <footer class="footer">
    <div class="footer_container">
      <h5 class="footer_text">
        Todos los derechos reservados <br class="d-block d-lg-none" />
        Money<span style="font-weight: bold; display: contents;">Draft</span> -
        2020
      </h5>
    </div>
  </footer>
</template>
<script>
export default {
  name: "Footer",
  data() {
    return {};
  },
};
</script>
<style>
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
@media (min-width: 320px) and (max-width: 519px) {
  .footer_container {
    text-align: center;
  }
}
</style>
