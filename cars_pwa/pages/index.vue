<template>
  <div>
    <img class="top-navicator-image" src="~/assets/svg/Asset1.svg" />
    <img class="user_def_icon" src="~/assets/svg/Asset2.svg" />
    <div class="sign_in">
      <p class="text_sign_in">SIGN IN</p>

      <input
        class="input-box"
        placeholder="Username"
        v-model="username"
        type="text"
      />
      <input
        class="input-box"
        placeholder="Password"
        v-model="password"
        type="password"
      />
      <button class="input-box sing-btn" @click="handleLoginClicked">
        SIGN IN
      </button>
    </div>
  </div>
</template>

<script>
export default {
  layout: "session",
  data() {
    return {
      username: "",
      password: "",
    };
  },
  methods: {
    async handleLoginClicked() {
      try {
        const response = await this.$axios.post("user.php/signin",
          {
            user: {
              username: this.username,
              password: this.password,
            },
          }
        );
        console.log(response);

        // if (response.data.success) {
        //   this.$router.replace('/scanQR');
        // }
      } catch (err) {
        console.log(err);
      }
    },
  },
};
</script>

<style>
.user_def_icon {
  width: 5%;
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
  background-color: rgb(255, 255, 255);
  border: none;
  padding: 14px;
  outline: none;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
}

.sing-btn {
  outline: none !important;
  border: none;
  background-color: #ff9900;
  color: white;
  font-weight: bold;
  cursor: pointer;
}

.sing-btn:hover {
  background-color: #ff9900e5;
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