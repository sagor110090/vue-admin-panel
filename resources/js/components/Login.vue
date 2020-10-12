<template>
  <div class="row justify-content-center mt-5">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Login</div>
        <div class="card-body">
          <div class="alert alert-danger" v-if="errors.email" role="alert">{{errors.email}}</div>
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
              />
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
              />
            </div>
          </div>
          <div class="form-group row mb-0 mt-2">
            <div class="col-md-8 offset-md-4">
              <button
                @click.prevent="loginUser"
                type="submit"
                class="btn btn-primary"
              >
                Login
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      form: {
        email: "",
        password: "",
      },
      errors: [],
    };
  },
  methods: {
    loginUser() {
      axios
        .post("/api/login", this.form)
        .then(() => {
          localStorage.setItem('AuthCheck','true');
          this.$router.push({ name: "Dashboard" });
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
        });
    },
  },
};
</script>