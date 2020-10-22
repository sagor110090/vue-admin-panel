<template>
  <div class="students">
    <div class="card">
      <div class="card-header">
        <h6 v-if="newRow == true">Create student</h6>
        <h6 v-if="newRow == false">List students</h6>
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
        <form @submit.prevent="createStudent" v-if="newRow == true">
          <div class="form-group"></div>
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
          <div class="form-group"></div>
          <div class="form-group"></div>

          <div class="form-group">
            <button
              class="btn btn-success btn-sm"
              type="submit"
              :disabled="form.busy"
              name="button"
            >
              {{ form.busy ? "Please wait..." : "Submit" }}
            </button>
            <button
              @click.prevent="backToPrivous"
              class="btn btn-warning btn-sm"
            >
              <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
            </button>
          </div>
        </form>
      </div>
      <!-- End first half -->

      <div class="col-12" v-if="newRow == false">
        <div class="table-responsive p-3">
          <table
            class="table table-bordered"
            id="table"
            v-if="students.length > 0"
          >
            <thead>
              <tr>
                <th>Id</th>

                <th>Title</th>

                <th>Content</th>

                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(student, index) in students.data" :key="student.id">
                <td>{{ index + 1 }}</td>

                <td>{{ student.title }}</td>

                <td>{{ student.content }}</td>

                <td>
                  <router-link
                    :to="'/student/' + student.id"
                    class="btn btn-warning btn-sm"
                    ><i class="fa fa-edit"></i
                  ></router-link>
                  <button
                    @click.prevent="deleteStudent(student, index)"
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

          <span v-else-if="!students.data">Loading...</span>
          <span v-else>No students exist</span>
          <pagination
            :data="students"
            @pagination-change-page="listStudents"
          ></pagination>
        </div>
        <!-- End 2nd half -->
      </div>
    </div>
  </div>
</template>

<script>
import { Form, HasError, AlertError } from "vform";
export default {
  name: "Student",
  components: { HasError },
  data: function () {
    return {
      newRow: false,
      students: false,
      form: new Form({
        title: "",
        content: "",
      }),
    };
  },
  created: function () {
    this.listStudents();
  },
  methods: {
    listStudents: function (page = 1) {
      var that = this;
      this.form.get("/api/students?page=" + page).then(function (response) {
        that.students = response.data;
      });
    },
    createStudent: function () {
      var that = this;
      this.form.post("/api/students").then(function (response) {
        that.successAlert();
        that.students.data.push(response.data);
        that.newRow = false;
      });
      this.form.title = "";
      this.form.content = "";
    },
    deleteStudent: function (student, index) {
      var that = this;
      this.$swal({
        title: "Are you sure?",
        text:
          "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          this.form
            .delete("/api/students/" + student.id)
            .then(function (response) {
              that.students.data.splice(index, 1);
            });
        }
      });
    },
    addNew: function (post, index) {
      this.newRow = true;
    },
    backToPrivous: function () {
      this.newRow = false;
    },
    successAlert: function () {
      this.$swal({
        title: "Successfully saved!",
        icon: "success",
      });
    },
  },
};
</script>
