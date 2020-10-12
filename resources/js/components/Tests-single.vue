<template>
      <div class="TestSingle">
        <div class="card">
          <div class="card-header">
            <h6>Update Test</h6>
          </div> 
          <div class="card-body">
        <form @submit.prevent="updateTest" class="mt-3 mb-3" v-if="loaded">
          
          <router-link to="/tests"  class="btn btn-warning btn-sm"> <i class="fa fa-arrow-left" aria-hidden="true"></i>
             Back to tests</router-link>
          
            <div class="form-group">
   
                  <input type="hidden" v-model="form.id">
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
   
                  <input type="hidden" v-model="form.created_at">
            </div>
            <div class="form-group">
   
                  <input type="hidden" v-model="form.updated_at">
            </div>
      
          <div class="form-group">
              <button  class="btn btn-success" type="submit" :disabled="form.busy" name="button">{{ (form.busy) ? 'Please wait...' : 'Update'}}</button>
              <button class="btn btn-danger" @click.prevent="deleteTest"><i class="fa fa-trash" v-if="form.busy==false"></i> {{ (form.busy) ? 'Please wait...' : ''}}</button>
          </div>
        </form>
        
        <span v-else>Loading test...</span>
      </div>
      </div>
    </div>
</template>

<script>
  import { Form, HasError, AlertError } from 'vform'
  export default {
    name: 'Test',
    components: {HasError},
    data: function(){
      return {
        loaded: false,
        form: new Form({
              "id" : "",
              "title" : "",
              "content" : "",
              "created_at" : "",
              "updated_at" : "",
          
        })
      }
    },
    created: function(){
      this.getTest();
    },
    methods: {
      getTest: function(Test){
        
        var that = this;
        this.form.get('/api/tests/'+this.$route.params.id).then(function(response){
          that.form.fill(response.data);
          that.loaded = true;
        }).catch(function(e){
            if (e.response && e.response.status == 404) {
                that.$router.push('/404');
            }
        });
        
      },
      updateTest: function(){
        
        var that = this;
        this.form.put('/api/tests/'+this.$route.params.id).then(function(response){
          that.form.fill(response.data);
        })
        
      },
      deleteTest: function(){
        
        var that = this;
        this.form.delete('/api/tests/'+this.$route.params.id).then(function(response){
          that.form.fill(response.data);
          that.$router.push('/tests');
        })
        
      }
    }
  }
  </script>