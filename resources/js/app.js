/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue'
import { InertiaProgress } from '@inertiajs/progress'

InertiaProgress.init()
createInertiaApp({
  title: title => `${title} - Holomia`,
  resolve: name => require(`./Pages/${name}`),
  setup({ el, App, props, plugin }) {
    Vue.use(plugin)

    new Vue({
      render: h => h(App, props),
    }).$mount(el)
  },
})
Vue.mixin({
    methods: {
        route: window.route,
    }
})
Vue.mixin({
    methods: {
        hasAnyPermission: function(permissions) {

            var allPermissions = this.$page.props.auth.can;
            var hasPermission = false;
            permissions.forEach(function(item) {
                if (allPermissions[item]) hasPermission = true;
            });
            return hasPermission;
        },
        hasAnyRoles: function(roles) {

            var allroles = this.$page.props.auth.roles;

            var hasRole = false;
            roles.forEach(function(item) {

                if (allroles[item]) hasRole = true;

            });
            return hasRole;
        },
        hasRoles: function(user, roles) {
            var hasRole = false;
            user.roles.forEach(function(item) {
                if (item.name == roles) hasRole = true;
            });
            return hasRole;
        },
    },
})
window.Bus = new Vue();
