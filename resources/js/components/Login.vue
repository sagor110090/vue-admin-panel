<template>
  <div class="row justify-content-center mt-5 animate-opacity">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Login</div>
        <div class="card-body">
          <!-- <div class="alert alert-danger" v-if="errors" role="alert">{{errors}}</div> -->
          <div class="form-group row mt-2">
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
          <div class="form-group row mt-2">
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
            </div>
          </div>
          <div class="form-group row mb-0 mt-2">
            <div class="col-md-8 offset-md-4">
              <button
                @click.prevent="loginUser"
                type="submit"
                class="btn btn-primary btn-sm"
                :disabled="form.busy"
              >
                Login
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
import { Form, HasError, AlertError } from "vform";
export default {
  components: { HasError },
  data() {
    return {
      form: new Form({
        email: "",
        password: "",
      }),
      errors: '',
    };
  },
  methods: {
    loginUser() {
      var that = this;
      this.form.post("/api/login", this.form).then(function (response) {
          localStorage.setItem('AuthCheck','true');
          that.$router.push({ name: "Dashboard" });
        })
        .catch((error) => {
          that.errors = error.response.data.message;
        });
    },
  },
};
</script>