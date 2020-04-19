<template>
  <div class="container">
    <form @submit.prevent="signup" >
        
      <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" v-model="form.name" />
      </div>
      <div>
        <span class="text-danger" v-if="errors.name">{{ errors.name[0]}}</span>
      </div>
      <div class="form-group">
        <label>Email address</label>
        <input type="email" class="form-control" v-model="form.email" />
      </div>
      <span class="text-danger" v-if="errors.email">{{ errors.email[0]}}</span>

      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" v-model="form.password" />
      </div>
      <span class="text-danger" v-if="errors.password">{{ errors.password[0]}}</span>

      <div class="form-group">
        <label>Password confirmation</label>
        <input type="password" class="form-control" v-model="form.password_confirmation" />
      </div>
      <button type="submit" class="btn btn-primary">Signup</button>
      <router-link to="/login">
        <button type="button" class="btn btn-success">Login</button>
      </router-link>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        name: null,
        email: null,
        password: null,
        password_confirmation: null
      },
      errors: {}
    };
  },
  created(){
    if(User.loggedIn()){
      this.$router.push({ name:'forum'})
    }
  },
  methods: {
    signup() {
      axios.post("api/auth/signup", this.form)
        .then(res => {
          User.responseAfterLogin(res)
          this.$router.push({ name:'forum'})
        })
        .catch(error => (this.errors = error.response.data.errors));
    }
  }
};
</script>

<style>
</style>