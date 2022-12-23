<template>
  <div class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="#"> <b>Admin</b>LTE </a>
      </div>
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Sign in to start your session</p>
          <Form @submit="submit()" :validation-schema="schema" v-slot="{ errors }" ref="form">
            <div class="form-group">
              <label for="exampleInputEmail1">Name</label>
              <Field
                type="text"
                name="account"
                class="form-control"
                id="exampleInputEmail1"
                placeholder="Enter email"
                aria-describedby="exampleInputEmail1-error"
                aria-invalid="true"
                v-model="dataLogin.account"
                :rules="{ required: true, min: 6 }"
              />
              <span id="exampleInputEmail1-error" class="error">
                {{ errors.account }}
              </span>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Name</label>
              <Field
                type="password"
                name="password"
                class="form-control"
                id="exampleInputEmail1"
                placeholder="Enter email"
                aria-describedby="exampleInputEmail1-error"
                aria-invalid="true"
                v-model="dataLogin.password"
                :rules="{ required: true, min: 6 }"
              />
              <span id="exampleInputEmail1-error" class="error">
                {{ errors.password }}
              </span>
            </div>
            <div class="row">
              <div class="col-8">
                <div class="icheck-primary">
                  <input type="checkbox" id="remember" />
                  <label for="remember"> &nbsp; Remember Me </label>
                </div>
              </div>
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
              </div>
            </div>
          </Form>
          <p class="mb-0">
            <a href="register.html" class="text-center">Register a new membership</a>
          </p>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data(){
    return{
      dataLogin:{
        account: '',
        password: '',
      }
    }
  }
}
</script>
