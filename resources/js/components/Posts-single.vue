<template>
  <div class="PostSingle">
    <div class="card">
      <div class="card-header">
        <h6>Update Post</h6>
      </div>
      <div class="card-body">
        <form @submit.prevent="updatePost" v-if="loaded">
          <router-link to="/posts" class="btn btn-warning btn-sm">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back to
            posts</router-link
          >

          <div class="form-group mt-4">
            <input type="hidden" v-model="form.id" />
          </div>
          <div class="form-group">
            <label>Title</label>
            <input
              type="text"
              class="form-control"
              :class="{ 'is-invalid': form.errors.has('title') }"
              v-model="form.title"
              maxlength="200"
            />
            <has-error :form="form" field="title"></has-error>
          </div>
          <div class="form-group">
            <label>Content</label>
            <textarea
              v-model="form.content"
              class="form-control"
              :class="{ 'is-invalid': form.errors.has('content') }"
            ></textarea>
          </div>
          <div class="form-group">
            <input type="hidden" v-model="form.created_at" />
          </div>
          <div class="form-group">
            <input type="hidden" v-model="form.updated_at" />
          </div>

          <div class="form-group mt-4">
            <button
              class="btn btn-success"
              type="submit"
              :disabled="form.busy"
              name="button"
            >
              {{ form.busy ? "Please wait..." : "Update" }}
            </button>
            <button class="btn btn-danger" @click.prevent="deletePost">
              <i class="fa fa-trash" v-if="form.busy == false"></i>
              {{ form.busy ? "Please wait..." : "" }}
            </button>
          </div>
        </form>

        <span v-else>Loading post...</span>
      </div>
    </div>
  </div>
</template>

<script>
import { Form, HasError, AlertError } from "vform";
export default {
  name: "Post",
  components: { HasError },
  data: function () {
    return {
      loaded: false,
      form: new Form({
        id: "",
        title: "",
        content: "",
        created_at: "",
        updated_at: "",
      }),
    };
  },
  created: function () {
    this.getPost();
  },
  methods: {
    getPost: function (Post) {
      var that = this;
      this.form
        .get("/api/posts/" + this.$route.params.id)
        .then(function (response) {
          that.form.fill(response.data);
          that.loaded = true;
        })
        .catch(function (e) {
          if (e.response && e.response.status == 404) {
            that.$router.push("/404");
          }
        });
    },
    updatePost: function () {
      var that = this;
      this.form
        .put("/api/posts/" + this.$route.params.id)
        .then(function (response) {
          that.form.fill(response.data);
        });
    },
    deletePost: function () {
      var that = this;
      this.form
        .delete("/api/posts/" + this.$route.params.id)
        .then(function (response) {
          that.form.fill(response.data);
          that.$router.push("/posts");
        });
    },
  },
};
</script>