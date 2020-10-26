<template>
  <div>
    <img class="user_def_icon" src="~/assets/svg/Asset2.svg" />
    <div class="sign_in">
      <p class="text_sign_in">SIGN IN</p>

      <input class="input-box" placeholder="Username" type="text" />
      <input class="input-box" placeholder="Password" ctype="password" />
      <button class="input-box sing-btn">SIGN IN</button>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style>
.user_def_icon {
  width: 6%;
  top: 8%;
  right: 5%;
  position: absolute;
  z-index: 1;
}
.text_sign_in {
  left: 50%;
  font-size: 30px;
  font-weight: bold;
  text-align: center;
}
.sign_in {
  position: absolute;
  top: 40%;
  left: 50%;
  display: inline-block;
  width: 40%;
  min-width: 280px;

  display: flex;
  flex-direction: column;
  transform: translate(-50%, -50%);
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  transition: 0.3s;
  border-radius: 10px;
  padding: 40px;
}
.input-box {
  float: left;
  margin: 6px;
  border-radius: 20px;
  background-color: lightskyblue;
  border: none;
  padding: 14px;
  outline: none;
}
.sing-btn {
  outline: none !important;
  border: none;
  background-color: rgba(0, 128, 0, 0.842);
  color: white;
  font-weight: bold;
  cursor: pointer;
}
.sing-btn:hover {
  background-color: green;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
}

hr.new {
  border: 1px solid rgba(0, 0, 0, 0.205);
  width: 100%;
  border-radius: 1px;
  margin: 0;
  padding: 1;
}
</style>