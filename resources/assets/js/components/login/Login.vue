<template>
  <div class="container">
    <form @submit.prevent="login">
      <div class="form-group">
        <label>Email address</label>
        <input type="email" class="form-control" v-model="form.email" />
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" v-model="form.password" />
      </div>
      <button type="submit" class="btn btn-primary">Login</button>
      <router-link to="/signup">
              <button type="button" class="btn btn-success">Signup</button>
      </router-link>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        email: null,
        password: null
      }
    };
  },
  created(){
    if(User.loggedIn()){
      this.$router.push({ name:'forum'})
    }
  },
  methods: {
    login() {
      User.login(this.form);
    }
  }
};
</script>

<style>
</style>