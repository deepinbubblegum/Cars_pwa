<template>
  <div>
    <img class="top-navicator-image" src="~/assets/svg/cars_header.svg" />
    <div class="box-scan-page">
      <h1 class="lable-scan">Scan QR Code</h1>
      <button v-on:click="scan_qrcode" class="btn-scan">SCAN</button>
    </div>
    <div class="modal-content" v-if="!isHidden">
      <div class="close" v-on:click="scan_qrcode"></div>
      <div class="dispaly-scan">
        <p class="error" v-if="error">{{ error }}</p>
        <p class="decode-result" v-if="result">
          ID: <b>{{ result }}</b>
        </p>
        <qrcode-stream @decode="onDecode" @init="onInit"></qrcode-stream>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      isHidden: true,
      result: "",
      error: "",
    };
  },
  methods: {
    onDecode(result) {
      this.result = result;
      this.$store.commit('scanded', this.result);
      this.$router.replace('/car-images');
    },
    async onInit(promise) {
      try {
        await promise;
      } catch (error) {
        if (error.name === "NotAllowedError") {
          this.error = "ERROR: you need to grant camera access permisson";
        } else if (error.name === "NotFoundError") {
          this.error = "ERROR: no camera on this device";
        } else if (error.name === "NotSupportedError") {
          this.error = "ERROR: secure context required (HTTPS, localhost)";
        } else if (error.name === "NotReadableError") {
          this.error = "ERROR: is the camera already in use?";
        } else if (error.name === "OverconstrainedError") {
          this.error = "ERROR: installed cameras are not suitable";
        } else if (error.name === "StreamApiNotSupportedError") {
          this.error = "ERROR: Stream API is not supported in this browser";
        }
      }
    },
    scan_qrcode: function (event) {
      this.isHidden = !this.isHidden;
    },
  },
};
</script>

<style>
.box-scan-page {
  position: absolute;
  left: 50%;
  top: 30%;
  transform: translate(-50%, -50%);
}

.lable-scan {
  font-weight: bold;
}

.btn-scan {
  text-align: center;
  position: absolute;
  left: 50%;
  margin-top: 30px;
  transform: translate(-50%, -50%);
  outline: none;
  border: none;
  width: 200px;
  height: 50px;
  color: white;
  background-color: rgb(255, 153, 0);
  font-weight: bold;
  border-radius: 30px;
  font-size: 30px;
  box-shadow: 0 4px 8px 0 rgb(0, 0, 0, 0.2);
  outline: none !important;
}

.btn-scan:hover {
  background-color: rgb(255, 153, 0, 0.8);
}

.modal-content {
  position: absolute;
  width: 100%;
  height: 100%;
  border-radius: 8px;
  background-color: black;
  padding: 8px;
  margin: 0px;
}

.hidden-el {
  display: none;
}

.close {
  position: absolute;
  right: 32px;
  top: 32px;
  width: 32px;
  height: 32px;
  opacity: 0.3;
  z-index: 99;
}
.close:hover {
  opacity: 1;
}
.close:before,
.close:after {
  position: absolute;
  left: 15px;
  content: " ";
  height: 33px;
  width: 2px;
  background-color: rgb(255, 255, 255);
}
.close:before {
  transform: rotate(45deg);
}
.close:after {
  transform: rotate(-45deg);
}

.dispaly-scan {
  width: 100%;
  height: 100%;
  padding: 28px;
}

.decode-result {
  color: #fff;
}

.error {
  font-weight: bold;
  color: red;
}
</style>