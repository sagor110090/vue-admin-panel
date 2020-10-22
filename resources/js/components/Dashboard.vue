<template>
    <div>
        <div class="card text-left">
          <div class="card-body">
            <h4 class="card-title">Title</h4>
            <p class="card-text">Body</p>
          </div>
        </div> 
        <!-- <div v-if="user">
        Name: {{user.name}} <br>
        Email: {{user.email}}<br><br>
        <button @click.prevent="logout">Logout</button>
        </div>  -->
    </div>
</template>
<script>
export default {
    data(){
        return{
            user: null
        }
    },
    methods:{
        logout(){
            axios.post('/api/logout').then(()=>{
                localStorage.removeItem('AuthCheck');
                this.$router.push({ name: "Home"})
            })
        }
    },
    mounted(){
        axios.get('/api/user').then((res)=>{
            this.user = res.data;
            if (res.data) {
                 localStorage.removeItem('AuthCheck');
                this.$router.push({ name: "Home"})
            }
        }) 
         
    }
}
</script>