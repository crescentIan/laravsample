<template>
  <div class="card">
      <div class="card-header">Image Upload and View Image</div>
      <div class="card-body">
          <input type="file" name="" id="" v-on:change="getImagePath">
          <hr>
          <img src="" alt="" width="10%" height="50%">
      </div>
  </div>
</template>

<script>
export default {
    data(){
        return{
            imagePath: '',
        }
    },
    methods: {
        getImagePath: function(e) {
            const file = e.target.files[0];
            console.log(file);
        }
    }
}
</script>

<style>

</style>