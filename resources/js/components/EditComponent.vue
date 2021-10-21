<template>
  <div>
      <div class="row justify-content-center">
          <div class="col-md-6">
              <div class="card-header">Edit Record</div>
              <div class="card-body">
                  <div class="form-group">
                      <label for="">Name</label>
                      <input type="text" class="form-control" name="name" v-model="employee.name">
                  </div>
                  <div class="form-group">
                      <label for="position">Position</label>
                      <input type="text" class="form-control" name="position" v-model="employee.position">
                  </div>
                  <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" class="form-control" name="email" v-model="employee.email">
                  </div>
                  <div class="form-group">
                      <button class="btn btn-primary" @click.prevent="update">Update</button>
                  </div>
              </div>
          </div>
      </div>
  </div>
</template>

<script>
export default {
    mounted() {
        this.getEmployee();
    },
    data() {
        return {
            employee: {}
        }
    },
    methods: {
        getEmployee() {
            axios.get('getEmployee/' + this.$route.params.id).then((response) => {
                this.employee = response.data;
                console.log(response.data);
            }).catch((errors) => {
                console.log(errors);
            })
        },
        update(){
            axios.post('update/' + this.$route.params.id, this.employee).then((response) => {
                console.log('updated');
                this.$router.push('/');
                this.$toaster.success(this.employee.name +' updated Successfully');
            }).catch((errors) => {
                console.log(errors);
            });
        }
    }
}
</script>

<style>

</style>