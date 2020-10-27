<template>
  <div>
    <h3 class="text-show-id">ID : {{$store.state.qr_data}}</h3>

    <div class="box-car-image">
      <div class="responsive">
        <div class="gallery">
          <img
            src="~/assets/img_5terre.jpg"
            alt="Cinque Terre"
            width="600"
            height="400"
          />
          <div class="desc">1</div>
        </div>
      </div>

      <div class="responsive">
        <div class="gallery">
          <img
            src="~/assets/img_5terre.jpg"
            alt="Cinque Terre"
            width="600"
            height="400"
          />
          <div class="desc">1</div>
        </div>
      </div>

      <div class="responsive">
        <div class="gallery">
          <img
            src="~/assets/img_5terre.jpg"
            alt="Cinque Terre"
            width="600"
            height="400"
          />
          <div class="desc">1</div>
        </div>
      </div>

      <div class="responsive">
        <div class="gallery">
          <img
            src="~/assets/img_5terre.jpg"
            alt="Cinque Terre"
            width="600"
            height="400"
          />
          <div class="desc">1</div>
        </div>
      </div>
      <div class="responsive">
        <div class="gallery">
          <img
            src="~/assets/img_5terre.jpg"
            alt="Cinque Terre"
            width="600"
            height="400"
          />
          <div class="desc">1</div>
        </div>
      </div>
      <div class="responsive">
        <div class="gallery">
          <img
            src="~/assets/img_5terre.jpg"
            alt="Cinque Terre"
            width="600"
            height="400"
          />
          <div class="desc">1</div>
        </div>
      </div>
      <div class="responsive">
        <div class="gallery">
          <img
            src="~/assets/img_5terre.jpg"
            alt="Cinque Terre"
            width="600"
            height="400"
          />
          <div class="desc">1</div>
        </div>
      </div>

      <div class="responsive">
        <div class="gallery-add">
          <img
            class="image_add"
            src="~/assets/svg/image_add_camera.png"
            alt="Cinque Terre"
            width="600"
            height="400"
          />
          <div class="desc"></div>
        </div>
      </div>
    </div>

    <button class="btn-take-photo">
        <img src="">
        Take a photo
    </button>
  </div>
</template>

<script>
export default {
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
  width: 20%;
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
  background-color: #FF9900;
  color: whitesmoke;
  font-weight: bold;
  font-size: 20px;
}

.btn-take-photo:hover{
    background-color:  #ff9900c2;
}
</style>