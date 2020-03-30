/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
$(function () {
    // Summernote
    $('.textarea').summernote();
})
window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


/*
Componente para el boton de eliminar
*/ 
Vue.component('boton-eliminar',{
    props: ['id'],
    template: '<button @click="eliminarItem" class="btn btn-flat bg-gradient-danger" :data-id="id"><span class="ion ion-trash-a"></span></button>',
    methods: {
        eliminarItem : function(e){
            let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var formData = new FormData();
            formData.append('_token',CSRF_TOKEN);
            formData.append('_method','DELETE');
            fetch(location.href+"/"+e.target.getAttribute("data-id"),{
                method: 'POST',
                body: formData
            }).then(function(response){
                if(response.ok){
                    window.location.reload(true);
                    //console.log(e.target.parentNode.parentNode.parentNode.parentNode.remove(e.target));
                }
            })
            //
        }
    },
});
const app = new Vue({
    el: '#app',
});
