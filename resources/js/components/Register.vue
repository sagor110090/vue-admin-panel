<template>
  <div class="row justify-content-center mt-5 animate-opacity">
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
                :class="{ 'is-invalid': form.errors.has('name') }"
              />
              <has-error :form="form" field="name"></has-error>
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
                :class="{ 'is-invalid': form.errors.has('email') }"
              />
              <has-error :form="form" field="email"></has-error>
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
                :class="{ 'is-invalid': form.errors.has('password') }"
              />
              <has-error :form="form" field="password"></has-error>
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
              <has-error :form="form" field="password_confirmation"></has-error>
            </div>
          </div>
          <div class="form-group row mb-0 mt-3">
            <div class="col-md-6 offset-md-4">
              <button
                @click.prevent="saveForm"
                type="submit"
                class="btn btn-success btn-sm"
                :disabled="form.busy"
              >
                Register
                {{ form.busy ? "Please wait..." : "" }}
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
import { Form, HasError, AlertError } from "vform";
export default {
  components: { HasError },
  data() {
    return {
      form: new Form({
        name: "",
        email: "",
        password: "",
        password_confirmation: "",
      }),
      errors: [],
    };
  },
  methods: {
    saveForm() {
      var that = this;
      this.form.post("/api/register", this.form).then(function (response) {
          console.log("saved");
          that.$router.push({ name: "Login" });
        })
        .catch((error) => {
          that.errors = error.response.data.errors;
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