import Vue from "vue";
import VueRouter from "vue-router";

import Login from "../components/forms/Login";
import Register from "../components/forms/Register";
import Home from "../components/Home";
import Dashboard from "../components/dashboard/Dashboard";

Vue.use(VueRouter);

const routes = [
  {
    path: '/',
    name: 'home',
    component: Home
  },
  {
    path: "/home",
    redirect: {
        name: "home"
    },
  },
  {
    path: "/login",
    name: "login",
    component: Login
  },
  {
    path: "/register",
    name: "register",
    component: Register
  },
  {
    path: "/dashboard",
    name: "dashboard",
    component: Dashboard
  },
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes
});

export default router;
