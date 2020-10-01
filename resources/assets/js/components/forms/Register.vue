<template>
  <div>
    
    <link href="https://cdn.jsdelivr.net/npm/vuetify@1.2.2/dist/vuetify.min.css" rel="stylesheet" />
    <v-container bg fill-height grid-list-md text-xs-center>
        <v-layout row wrap align-center>
            <v-flex>   
              <v-card class="mx-auto mt-10 text-center pa-10" 
              elevation="11"
              outlined max-width="600px">
                <v-card-title class="justify-center ">Register</v-card-title>
                <v-card-text>
                  <p class="red--text" v-if="errorMessage !== null">{{errorMessage}}</p>
                  <v-form ref="form" v-model="valid" :lazy-validation="lazy" @submit="register">
                    <v-text-field
                      v-model="name"
                      :rules="fullNameRules"
                      outlined
                      label="Full Name"
                      name="fullname"
                      color="light-blue accent-4"
                      clearable
                      type="text"
                    />

                    <v-text-field
                      v-model="email"
                      :rules="emailRules"
                      outlined
                      label="Email"
                      name="email"
                      color="light-blue accent-4"
                      clearable
                      type="email"
                    />

                    <v-text-field
                      :append-icon="show ? 'mdi-eye' : 'mdi-eye-off'"
                      :rules="inputRules"
                      :type="show ? 'text' : 'password'"
                      v-model="password"
                      name="password"
                      color="light-blue accent-4"
                      outlined
                      label="Password"
                      required
                      @click:append="show = !show"
                    ></v-text-field>
                    <v-spacer/>
                    <strong>Output:</strong>
                    <pre>
                      {{output}}
                    </pre>
                    <v-spacer/>
                    <v-card-actions class="justify-center pl-8 pr-8">
                      <v-row class="justify-center ">
                        <v-icon left>mdi-arrow-right</v-icon>
                        <v-btn
                          class="px-10"
                          dark
                          v-on:click="register()"
                          text-center
                          block
                          color="#0e3da1"
                        >Register</v-btn>
                        <p>already have an account click <a href="login" class="body-2 black--text"><b>HERE</b></a></p>
                      </v-row>
                    </v-card-actions>
                  </v-form>
                </v-card-text>
              </v-card> 
            </v-flex>
        </v-layout>
    </v-container>
  </div>
</template>


<style scoped>
h2, h1 {
  color: white;
  text-align: center;
}
#back {
  background-color:  white;
  background-size: cover;
}
.card{
  width: 1440px;
  height: 100vh;
}
.loginLayout {
  margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
}

p {
  text-align: center;
  padding: 5px;
}

</style>
<script>

import axios from 'axios'

export default {
  name: "btnLogin",
  components: {    
  },
  data() {
    return {
      description: '',
      output: '',
      show: false,
      name: "",
      email: '',
      password: "",
      data: false,
      disable: false,
      loginbtn: true,
      valid: true,
      lazy: false,
      errorMessage: null,
      inputRules: [v => !!v || "Input is required"],
      emailRules: [
        v => !!v || 'E-mail is required',
        v => /.+@.+/.test(v) || 'E-mail must be valid',
      ],
      fullNameRules: [
        v => !!v || 'Name is required',
        v => v.length <= 10 || 'Name must be less than 10 characters',
      ],
    };
  },
  methods: {
    register() {
      let currentObj = this;
      if(this.$refs.form.validate()) {
        console.log(`${this.name}\n${this.email}\n${this.password}`)
        axios.post('/formSubmit', {
          name: this.name,
          email: this.email,
          password: this.password,
        })
        .then(this.successHandler)
        .catch(this.errHandler);
        this.$router.push('login');
      console.log('register')
      } else {
        this.errorMessage = 'All fields required!'
      console.log('register error')
      }
    },
  },
  mounted() {
    console.log('Component mounted.')
  }
};
</script>
