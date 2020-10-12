<template>
  <div class="row justify-content-center mt-5">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Register</div>
        <!-- {{auth}} -->
    
        <div class="card-body">
          <div class="form-group row mt-4">
            <label class="col-md-4 col-form-label text-md-right" for="name"
              >Name</label
            >
            <span class="invalid-feedback" v-if="errors.name">{{
              errors.name[0]
            }}</span>
            <div class="col-md-6">
              <input
                class="form-control"
                placeholder="Name"
                type="text"
                v-model="form.name"
              />
            </div>
          </div>
          <div class="form-group row mt-4">
            <label for="email" class="col-md-4 col-form-label text-md-right"
              >Your e-mail</label
            >
            <div class="col-md-6">
              <input
                class="form-control"
                placeholder="Email"
                type="email"
                v-model="form.email"
              />
            </div>
          </div>
          <div class="form-group row mt-4">
            <label for="password" class="col-md-4 col-form-label text-md-right"
              >Password</label
            >
            <div class="col-md-6">
              <input
                class="form-control"
                placeholder="Password"
                type="password"
                v-model="form.password"
                name="password"
              />
            </div>
          </div>
          <div class="form-group row mt-4">
            <label
              for="confirm_password"
              class="col-md-4 col-form-label text-md-right"
              >Confirm Password</label
            >
            <div class="col-md-6">
              <input
                class="form-control"
                placeholder="Confirm Password"
                type="password"
                v-model="form.password_confirmation"
                name="password_confirmation"
              />
            </div>
          </div>
          <div class="form-group row mb-0 mt-3">
            <div class="col-md-6 offset-md-4">
              <button
                @click.prevent="saveForm"
                type="submit"
                class="btn btn-success"
              >
                Register
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
// import {mapState} from 'vuex';
export default {
  data() {
    return {
      form: {
        name: "",
        email: "",
        password: "",
        password_confirmation: "",
      },
      errors: [],
    };
  },
  methods: {
    saveForm() {
      axios
        .post("/api/register", this.form)
        .then(() => {
          console.log("saved");
          this.$router.push({ name: "Login" });
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
        });
    },
  },
  // mounted(){
  //   this.$store.dispatch('authCheck')
  // },
  // computed:{
  //   ...mapState([
  //     'auth'
  //   ])
  // }
};
</script>