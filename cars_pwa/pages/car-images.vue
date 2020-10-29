<template>
  <div>
    <h3 class="text-show-id">ID : {{ $store.state.qr_data }}</h3>

    <div class="box-car-image">
      <div
        class="responsive"
        v-for="(item, index) in images"
        v-bind:item="item"
        v-bind:index="index"
        v-bind:key="item.id"
      >
        <div class="gallery">
          <img
            :src="
              'http://localhost:80/CARS_PWA/api/images/' +
              path_image +
              '/' +
              item
            "
          />
          <div class="desc">{{ index + 1 }}</div>
        </div>
      </div>

      <label class="cameraButton"
        ><img src="~/assets/svg/image_add_camera.png" />
        <input id="file"
          type="file"
          @change="upload_image"
          accept="image/*;capture=camera"
        />
      </label>
    </div>
    <button class="btn-take-photo" @click="takeaphoto">Take a photo</button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      // path_image: this.$store.state.qr_data,
      path_image: '456789',
      images: [],
      isHidden: true,
    };
  },
  methods: {
    upload_image() {
      var formData = new FormData();
      var imagefile = document.querySelector('#file');
      formData.append('file', imagefile.files[0]);
      formData.append("path_image", this.path_image);
      this.$axios.post("http://localhost:80/CARS_PWA/api/takephoto.php/upload_file_m", formData, {
        headers: {
          "Content-Type": "multipart/form-data",
        },
      });
    },
    async takeaphoto() {
      try {
        const response = await this.$axios.post(
          "http://localhost:80/CARS_PWA/api/takephoto.php/sendUdp",
          {
            user: {
              car_id: this.path_image,
            },
          }
        );
        this.images = [];
        console.log(response.data.messages);
        this.images = response.data.messages;
      } catch (err) {
        console.log(err);
      }
    },

    async getfristTime() {
      try {
        const response = await this.$axios.post(
          "http://localhost:80/CARS_PWA/api/takephoto.php/getimagefrist",
          {
            user: {
              car_id: this.path_image,
            },
          }
        );
        this.images = [];
        console.log("fristtime");
        console.log(response);
        this.images = response.data.messages;
      } catch (err) {
        console.log(err);
      }
    },
  },
  created() {
    this.getfristTime();
  },
};
</script>

<style>
.text-show-id {
  margin-top: 5px;
  position: absolute;
  left: 50%;
  top: 18px;
  transform: translate(-50%, -50%);
}
.box-car-image {
  position: absolute;
  top: 50px;
  padding-left: 5%;
  padding-right: 5%;
}

div.gallery {
  border: 1px solid #ccc;
  border-radius: 8px;
  margin-top: 15px;
}

div.gallery-add {
  /* border: 1px solid #ccc; */
  border-radius: 8px;
  margin-top: 15px;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: auto;
  border-top-left-radius: 8px;
  border-top-right-radius: 8px;
}

div.desc {
  padding: 5px;
  text-align: center;
}

* {
  box-sizing: border-box;
}

.image_add {
  margin-top: 5px;
  padding: 0;
  width: 100%;
  height: auto;
}

.image_add:hover {
  width: 102%;
  transition: 0.2s;
  cursor: pointer;
}

.responsive {
  padding: 0 6px;
  float: left;
  width: 25%;
}

@media only screen and (max-width: 700px) {
  .responsive {
    width: 50%;
    margin: 6px 0;
  }
}

@media only screen and (max-width: 500px) {
  .responsive {
    width: 100%;
  }
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

.btn-take-photo {
  position: fixed;
  top: 100%;
  width: 100%;
  height: 50px;
  -webkit-transform: translateY(-100%);
  -ms-transform: translateY(-100%);
  transform: translateY(-100%);
  border: none;
  outline: none !important;
  background-color: #ff9900;
  color: whitesmoke;
  font-weight: bold;
  font-size: 20px;
  cursor: pointer;
}

.btn-take-photo:hover {
  background-color: #ff9900c2;
}

label.cameraButton {
  display: inline-block;
  margin: 0;

  /* Styles to make it look like a button */
  padding: 0;
  border: 0;
  /* border-color: #eee #ccc #ccc #eee; */
  /* background-color: #ddd; */
  cursor: pointer;
}

/* Look like a clicked/depressed button */
label.cameraButton:active {
  border-color: #ccc #eee #eee #ccc;
}

/* This is the part that actually hides the 'Choose file' text box for camera inputs */
label.cameraButton input[accept*="camera"] {
  display: none;
}
</style>