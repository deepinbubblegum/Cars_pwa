<template>
  <div>
    <img class="top-navicator-image" src="~/assets/svg/cars_header.svg" />
    <div class="box-scan-page">
      <h1 class="lable-scan">Scan QR Code</h1>
      <button class="btn-scan">SCAN</button>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style>
.box-scan-page{
    position: absolute;
    left: 50%;
    top: 30%;
    transform: translate(-50%, -50%);
}

.lable-scan{
    font-weight: bold;
}

.btn-scan{
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

}

.btn-scan:hover{
    background-color: rgb(255, 153, 0, 0.8);
}
</style>