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

import VueHtmlToPaper from 'vue-html-to-paper';

var cors = require('cors')

Vue.use(VModal);
// Vue.use(require('vue-moment'));

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

Vue.component('pastmedical-create-component', require('./components/PastMedicalCreateComponent.vue').default);

Vue.component('phyexamination-create-component', require('./components/PhyExaminationCreateComponent.vue').default);

Vue.component('diagnosis-create-component', require('./components/DiagnosisCreateComponent.vue').default);

Vue.component('treatment-create-component', require('./components/TreatmentCreateComponent.vue').default);

Vue.component('dead-create-component', require('./components/DeadCreateComponent.vue').default);

Vue.component('discharge-create-component', require('./components/DischargeCreateComponent.vue').default);

Vue.component('progress-create-component', require('./components/ProgressCreateComponent.vue').default);

Vue.component('ptoverall-create-component', require('./components/PtOverallCreateComponent.vue').default);

Vue.component('monitoring-create-component', require('./components/MonitoringCreateComponent.vue').default);

Vue.component('imaging-create-component', require('./components/ImagingCreateComponent.vue').default);

Vue.component('consultation-create-component', require('./components/ConsultationCreateComponent.vue').default);

Vue.component('investigation-create-component', require('./components/InvestigationCreateComponent.vue').default);

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

Vue.component('editlab-component', require('./components/EditLabComponent.vue').default);

Vue.component('labcategory-component', require('./components/LabCategoryComponent.vue').default);

Vue.component('group-component', require('./components/GroupComponent.vue').default);

Vue.component('editgroup-component', require('./components/EditGroupComponent.vue').default);

Vue.component('editlabcategory-component', require('./components/EditLabCategoryComponent.vue').default);

Vue.component('prescriptivemedicine-component', require('./components/PrescriptiveMedicineComponent.vue').default);

Vue.component('disease-component', require('./components/DiseaseComponent.vue').default);

Vue.component('editdisease-component', require('./components/EditDiseaseComponent.vue').default);

Vue.component('edithistory-component', require('./components/EditHistoryComponent.vue').default);

Vue.component('user-component', require('./components/UserComponent.vue').default);

Vue.component('edituser-component', require('./components/EditUserComponent.vue').default);

Vue.component('register-component', require('./components/RegisterComponent.vue').default);

Vue.component('newlyregister-component', require('./components/NewlyRegisterComponent.vue').default);

Vue.component('plnav-component', require('./components/PLNavComponent.vue').default);

Vue.component('totalpatient-component', require('./components/TotalPatientComponent.vue').default);

Vue.component('inpatient-component', require('./components/InPatientComponent.vue').default);

Vue.component('outpatient-component', require('./components/OutPatientComponent.vue').default);

Vue.component('comopatient-component', require('./components/ComobidityPatientComponent.vue').default);

Vue.component('referralpatient-component', require('./components/ReferralPatientComponent.vue').default);

Vue.component('deadpatient-component', require('./components/DeadPatientComponent.vue').default);

Vue.component('detailpatient-component', require('./components/DetailPatientComponent.vue').default);

Vue.component('rolemanagement-component', require('./components/RoleManagementComponent.vue').default);

Vue.component('createrole-component', require('./components/CreateRoleComponent.vue').default);

Vue.component('editrole-component', require('./components/EditRoleComponent.vue').default);

Vue.component('showrole-component', require('./components/ShowRoleComponent.vue').default);

Vue.component('permission-component', require('./components/PermissionComponent.vue').default);

Vue.component('createpermission-component', require('./components/CreatePermissionComponent.vue').default);

Vue.component('editpermission-component', require('./components/EditPermissionComponent.vue').default);

Vue.component('newpatient-component', require('./components/NewPatientComponent.vue').default);

Vue.component('newpatientnav-component', require('./components/NewPatientNavComponent.vue').default);

Vue.component('newhospital-component', require('./components/NewHospitalComponent.vue').default);

Vue.component('newpastmedical-component', require('./components/NewPastMedicalComponent.vue').default);

Vue.component('newphyexamination-component', require('./components/NewPhyExaminationComponent.vue').default);

Vue.component('newdiagnosis-component', require('./components/NewDiagnosisComponent.vue').default);

Vue.component('newinvestigation-component', require('./components/NewInvestigationComponent.vue').default);

Vue.component('newtreatment-component', require('./components/NewTreatmentComponent.vue').default);

Vue.component('newdead-component', require('./components/NewDeadComponent.vue').default);

Vue.component('newdischarge-component', require('./components/NewDischargeComponent.vue').default);

Vue.component('newprogress-component', require('./components/NewProgressComponent.vue').default);

Vue.component('newptoverall-component', require('./components/NewPtOverallComponent.vue').default);

Vue.component('newmonitoring-component', require('./components/NewMonitoringComponent.vue').default);

Vue.component('newimaging-component', require('./components/NewImagingComponent.vue').default);

Vue.component('newconsultation-component', require('./components/NewConsultationComponent.vue').default);

Vue.component('editpatientnav-component', require('./components/EditPatientNavComponent.vue').default);

Vue.component('editpatient-component', require('./components/EditPatientComponent.vue').default);

Vue.component('editpat-component', require('./components/EditPatComponent.vue').default);

Vue.component('edithospital-component', require('./components/EditHospitalComponent.vue').default);

Vue.component('editpastmedical-component', require('./components/EditPastMedicalComponent.vue').default);

Vue.component('editpastmedical-component', require('./components/EditPastMedicalComponent.vue').default);

Vue.component('editphyexamination-component', require('./components/EditPhyExaminationComponent.vue').default);

Vue.component('editdiagnosis-component', require('./components/EditDiagnosisComponent.vue').default);

Vue.component('editinvestigation-component', require('./components/EditInvestigationComponent.vue').default);

Vue.component('edittreatment-component', require('./components/EditTreatmentComponent.vue').default);

Vue.component('editdead-component', require('./components/EditDeadComponent.vue').default);

Vue.component('editdischarge-component', require('./components/EditDischargeComponent.vue').default);

Vue.component('editprogress-component', require('./components/EditProgressComponent.vue').default);

Vue.component('editptoverall-component', require('./components/EditPtOverallComponent.vue').default);

Vue.component('editmonitoring-component', require('./components/EditMonitoringComponent.vue').default);

Vue.component('editimaging-component', require('./components/EditImagingComponent.vue').default);

Vue.component('editconsultation-component', require('./components/EditConsultationComponent.vue').default);

Vue.component('duty-component', require('./components/DutyRoasterComponent.vue').default);

Vue.component('editduty-component', require('./components/EditDutyRoasterComponent.vue').default);

Vue.component('hrduty-component', require('./components/HRDutyComponent.vue').default);

Vue.component('edithrduty-component', require('./components/EditHRDutyComponent.vue').default);

Vue.component('time-component', require('./components/TimeComponent.vue').default);

Vue.component('edittime-component', require('./components/EditTimeComponent.vue').default);

Vue.component('building-component', require('./components/BuildingComponent.vue').default);

Vue.component('editbuilding-component', require('./components/EditBuildingComponent.vue').default);

Vue.component('floor-component', require('./components/FloorComponent.vue').default);

Vue.component('editfloor-component', require('./components/EditFloorComponent.vue').default);

Vue.component('room-component', require('./components/RoomComponent.vue').default);

Vue.component('bed-component', require('./components/BedComponent.vue').default);

Vue.component('editbed-component', require('./components/EditBedComponent.vue').default);

Vue.component('editroom-component', require('./components/EditRoomComponent.vue').default);

Vue.component('roombednav-component', require('./components/RoomBedNavComponent.vue').default);

Vue.component('donation-component', require('./components/DonationComponent.vue').default);

Vue.component('expense-component', require('./components/ExpenseComponent.vue').default);

Vue.component('remain-component', require('./components/RemainComponent.vue').default);

Vue.component('summary-component', require('./components/SummaryComponent.vue').default);

Vue.component('pdf-component', require('./components/PdfComponent.vue').default);

Vue.component('userguide-component', require('./components/UserGuideComponent.vue').default);

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

const options = {
    name: '_blank',
    specs: [
        'fullscreen=yes',
        'titlebar=yes',
        'scrollbars=yes'
    ],
    styles: [
        'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css',
        'https://unpkg.com/kidlat-css/css/kidlat.css'
    ],
    timeout: 1000, // default timeout before the print window appears
    autoClose: false, // if false, the window will not close after printing
    windowTitle: window.document.title, // override the window title
}

Vue.use(VueHtmlToPaper, options);

Vue.use(cors({ origin: ['http://localhost:8001/'], }))

const app = new Vue({
    el: '#app',
});
