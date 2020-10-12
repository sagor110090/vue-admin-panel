<template>
  <div class="posts">
    <div class="card">
      <div class="card-header">
        <h6 v-if="newRow == true">Create post</h6>
        <h6 v-if="newRow == false">List posts</h6>
      </div>
      <div class="card-body">
        <a
          href
          class="btn btn-success btn-sm"
          title="Add New "
          v-if="newRow == false"
          @click.prevent="addNew"
        >
          <i class="fa fa-plus" aria-hidden="true"></i> Add New
        </a>
        <form @submit.prevent="createPost" class="mt-4" v-if="newRow == true">
          <div class="form-group">
            <input type="hidden" v-model="form.id" />
          </div>
          <div class="form-group">
            <label>Title</label>
            <input
              type="text"
              v-model="form.title"
              class="form-control"
              :class="{ 'is-invalid': form.errors.has('title') }"
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
              {{ form.busy ? "Please wait..." : "Submit" }}
            </button>
          </div>
        </form>
      </div>
      <!-- End first half -->

      <div class="col-12" v-if="newRow == false">
        <div class="table-responsive">
          <table class="table table-bordered" id="table" v-if="posts.length > 0">
            <thead>
              <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Content</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              <tr v-for="(post, index) in posts" :key="post.id">
                <td>{{ index + 1 }}</td>

                <td>{{ post.title }}</td>

                <td>{{ post.content }}</td>

                <td>{{ post.created_at }}</td>

                <td>{{ post.updated_at }}</td>
                <td>
                  <router-link
                    :to="'/post/' + post.id"
                    class="btn btn-warning btn-sm"
                    ><i class="fa fa-edit"></i
                  ></router-link>
                  <button
                    @click.prevent="deletePost(post, index)"
                    type="button"
                    :disabled="form.busy"
                    name="button"
                    class="btn btn-danger btn-sm"
                  >
                    <i class="fa fa-trash" v-if="form.busy == false"> </i>
                    {{ form.busy ? "Please wait..." : "" }}
                  </button>
                </td>
              </tr>
            </tbody>
          </table>

          <span v-else-if="!posts">Loading...</span>
          <span v-else>No posts exist</span>
        </div>
        <!-- End 2nd half -->
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
      newRow: false,
      posts: false,
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
    this.listPosts();
  },
  methods: {
    listPosts: function () {
      var that = this;
      this.form.get("/api/posts").then(function (response) {
        that.posts = response.data;
      });
    },
    createPost: function () {
      var that = this;
      this.form.post("/api/posts").then(function (response) {
        that.posts.push(response.data);
      });
      this.newRow = false;
      this.form.id = "";
      this.form.title = "";
      this.form.content = "";
      this.form.created_at = "";
      this.form.updated_at = "";
    },
    deletePost: function (post, index) {
      var that = this;
      this.form.delete("/api/posts/" + post.id).then(function (response) {
        that.posts.splice(index, 1);
      });
    },
    addNew: function (post, index) {
      this.newRow = true;
    },
  },
};
</script>
