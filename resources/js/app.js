/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

import Swal from 'sweetalert2';

import VModal from 'vue-js-modal';

import moment from 'moment';

Vue.use(VModal);

// global.jQuery = require('jquery');
// var $ = global.jQuery;
// window.$ = $;

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

Vue.component('home-component', require('./components/HomeComponent.vue').default);

Vue.component('patient-create-component', require('./components/PatientCreateComponent.vue').default);

Vue.component('hospital-create-component', require('./components/HospitalCreateComponent.vue').default);

Vue.component('treatment-create-component', require('./components/TreatmentCreateComponent.vue').default);

Vue.component('imaging-create-component', require('./components/ImagingCreateComponent.vue').default);

Vue.component('doctor-component', require('./components/DoctorComponent.vue').default);

Vue.component('editdoctor-component', require('./components/EditDoctorComponent.vue').default);

Vue.component('speciality-component', require('./components/SpecialityComponent.vue').default);

Vue.component('editspeciality-component', require('./components/EditSpecialityComponent.vue').default);

Vue.component('degree-component', require('./components/DegreeComponent.vue').default);

Vue.component('editdegree-component', require('./components/EditDegreeComponent.vue').default);

Vue.component('hrmanagement-component', require('./components/HRManagementComponent.vue').default);

Vue.component('edithrmanagement-component', require('./components/EditHRManagementComponent.vue').default);

Vue.component('position-component', require('./components/PositionComponent.vue').default);

Vue.component('editposition-component', require('./components/EditPositionComponent.vue').default);

Vue.component('patientnav-component', require('./components/PatientNavComponent.vue').default);

Vue.component('medicallist-component', require('./components/MedicalListComponent.vue').default);

Vue.component('medicalcategory-component', require('./components/MedicalCategoryComponent.vue').default);

Vue.component('editmedicalcategory-component', require('./components/EditMedicalCategoryComponent.vue').default);

Vue.component('detailmedicallist-component', require('./components/DetailMedicalListComponent.vue').default);

Vue.component('lab-component', require('./components/LabComponent.vue').default);

Vue.component('labcategory-component', require('./components/LabCategoryComponent.vue').default);

Vue.component('group-component', require('./components/GroupComponent.vue').default);

Vue.component('editgroup-component', require('./components/EditGroupComponent.vue').default);

Vue.component('editlabcategory-component', require('./components/EditLabCategoryComponent.vue').default);

Vue.component('prescriptivemedicine-component', require('./components/PrescriptiveMedicineComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 Vue.component('pagination', require('laravel-vue-pagination'));



const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

window.Swal = Swal;
window.Toast = Toast;
window.moment = moment;


const app = new Vue({
    el: '#app',
});
