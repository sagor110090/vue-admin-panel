<template>
      <div class="StudentSingle">
        <div class="card">
          <div class="card-header">
            <h6>Update Student</h6>
          </div> 
          <div class="card-body">
        <form @submit.prevent="updateStudent" v-if="loaded">
          
          <router-link to="/students"  class="btn btn-warning btn-sm"> <i class="fa fa-arrow-left" aria-hidden="true"></i>
             Back to students</router-link>
          
            <div class="form-group">
    
            </div>
            <div class="form-group">
                  <label>Title</label>
                  <input type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('title') }" v-model="form.title"  maxlength="200" >
                  <has-error :form="form" field="title"></has-error>
            </div>
            <div class="form-group">
                  <label>Content</label>
                  <textarea v-model="form.content" class="form-control" :class="{ 'is-invalid': form.errors.has('content') }" ></textarea>
            </div>
            <div class="form-group">
    
            </div>
            <div class="form-group">
    
            </div>
      
          <div class="form-group">
              <button  class="btn btn-success btn-sm" type="submit" :disabled="form.busy" name="button">{{ (form.busy) ? 'Please wait...' : 'Update'}}</button>
              <button class="btn btn-danger btn-sm" @click.prevent="deleteStudent"><i class="fa fa-trash" v-if="form.busy==false"></i> {{ (form.busy) ? 'Please wait...' : ''}}</button>
          </div>
        </form>
        
        <span v-else>Loading student...</span>
      </div>
      </div>
    </div>
</template>

<script>
  import { Form, HasError, AlertError } from 'vform'
  export default {
    name: 'Student',
    components: {HasError},
    data: function(){
      return {
        loaded: false,
        form: new Form({
                      "title" : "",
                  "content" : "",
                        
        })
      }
    },
    created: function(){
      this.getStudent();
    },
    methods: {
      getStudent: function(Student){
        
        var that = this;
        this.form.get('/api/students/'+this.$route.params.id).then(function(response){
          that.form.fill(response.data);
          that.loaded = true;
        }).catch(function(e){
            if (e.response && e.response.status == 404) {
                that.$router.push('/404');
            }
        });
        
      },
      updateStudent: function(){
        
        var that = this;
        this.form.put('/api/students/'+this.$route.params.id).then(function(response){
          that.form.fill(response.data);
        })
        
      },
      deleteStudent: function(){
        
        var that = this;
        this.form.delete('/api/students/'+this.$route.params.id).then(function(response){
          that.form.fill(response.data);
          that.$router.push('/students');
        })
        
      }
    }
  }
  </script>