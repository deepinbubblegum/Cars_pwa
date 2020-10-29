<template>
  <div>
    <img class="top-navicator-image" src="~/assets/svg/Asset1.svg" />
    <div>
      <img class="success-image" src="~/assets/svg/success.svg" alt="success" />
      <h2 class="h2-txt">
        ระบบได้ทำการบันทึกข้อมูล <br />
        เรียบร้อยแล้ว
      </h2>
    </div>
  </div>
</template>

<script>
export default {
  methods: {},
  created() {
    setTimeout(() => this.$router.push({ path: "/scanQR" }), 3000);
  },
};
</script>

<style>
.success-image {
  position: absolute;
  width: 150px;
  top: 35%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: -1;
}

.h2-txt {
  position: fixed;
  top: 55%;
  left: 50%;
  width: 100%;
  transform: translate(-50%, -50%);
  font-weight: bold;
  text-align: center;
  margin-top: 20px;
}
</style>