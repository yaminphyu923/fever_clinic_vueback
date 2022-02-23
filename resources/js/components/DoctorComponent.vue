<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4><b>Doctors List</b></h4>
                <a href="/"><button class="btn btn-md btn-primary">Home</button></a>
                <button class="btn btn-md btn-primary" data-toggle="modal" data-target="#addDoctor" v-if="doctor_create">Add Doctor</button>
                <a href="/specialities"><button class="btn btn-md btn-primary" v-if="doctor_create">Speciality Record</button></a>
                <a href="/degrees"><button class="btn btn-md btn-primary" v-if="doctor_create">Degree Record</button></a>

            </div>

            <div class="col-md-12">
                <div class="modal fade" name="addDoctor" id="addDoctor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Adding Doctor</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form @submit.prevent="store">

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Doctor Name:</b></label>

                                        <div class="col-sm-8">
                                            <input type="text" name="name" v-model="doctors.name" class="form-control" id="name" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Phone:</b></label>

                                        <div class="col-sm-8">
                                            <input type="text" name="phone" v-model="doctors.phone" class="form-control" id="phone" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Degree:</b></label>

                                        <div class="col-sm-8">
                                            <select name="degree_id" id="degree" v-model="doctors.degree_id" class="form-control">
                                                <option v-for="degree in degrees" :key="degree.id" :value="degree.id">{{degree.name}}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Speciality:</b></label>

                                        <div class="col-sm-8">
                                            <select name="speciality_id" id="speciality" v-model="doctors.speciality_id" class="form-control">
                                                <option v-for="speciality in specialities" :key="speciality.id" :value="speciality.id">{{speciality.name}}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-3">
                <div class="row">
                    <div class="col-sm-3 offset-sm-9 mb-3">
                        <form @submit.prevent="doctor">
                            <div class="input-group">
                                <input type="text" v-model="search" placeholder="Search Name..." class="form-control">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-sm btn-primary">🔎</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Degree</th>
                                <th>Speciality</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="(alldoctor,index) in alldoctors.data" :key="alldoctor.id">
                                <td>{{index+1}}</td>
                                <td>{{alldoctor.name}}</td>
                                <td>{{alldoctor.phone}}</td>
                                <td>{{(alldoctor.degree != null)?alldoctor.degree.name:'-'}}</td>
                                <td>{{(alldoctor.speciality != null)?alldoctor.speciality.name:'-'}}</td>
                                <td>
                                    <a :href="'/doctors/'+alldoctor.id"><button class="btn btn-sm btn-warning" v-if="doctor_edit">Edit</button></a>

                                    <button class="btn btn-sm btn-danger" @click="destroy(alldoctor.id)" v-if="doctor_delete">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <pagination :data="alldoctors" @pagination-change-page="doctor"></pagination>
            </div>
        </div>
    </div>
</template>

<script>

    import VModal from 'vue-js-modal';

    export default {
        name: 'DoctorComponent',

        props: ['auth_id'],

        data(){
            return {
                alldoctors: {},
                degrees: {},
                specialities: {},
                doctors:{
                    name: "",
                    phone: "",
                    degree_id: "",
                    speciality_id: "",
                    user_id: "",
                },

                search: "",
                // showModal: true,

                doctor_list : "",
                doctor_create : "",
                doctor_edit : "",
                doctor_delete : "",
            }
        },

        methods:{

            // searchDoctor(){
            //     axios.get('/api/doctors_paginate?search=' + this.search)
            //     axios.get(`/api/doctors_paginate?search=${this.search}`)
            //     .then(response => {
            //         this.alldoctors = response.data.info;
            //     })
            // },

            index(){
                axios.get('/api/degrees')
                .then(response => {
                    // console.log(response.data.info);
                    this.degrees = response.data.info;
                }),

                axios.get('/api/specialities')
                .then(response => {
                    // console.log(response.data.info);
                    this.specialities = response.data.info;
                })
            },

            doctor(page=1){
                axios.get(`/api/doctors_paginate?page=${page}&search=${this.search}`)
                    .then(response => {
                        // console.log(response.data.info);
                        this.alldoctors = response.data.info;
                    })
                },

            // save() {
            //     $('#addDoctor').modal('hide');
            //     this.$emit('submit');
            // },

            store(){

                this.doctors.user_id = this.auth_id;
                axios.post('/api/createDoctors',this.doctors)
                .then(response => {
                    this.index();

                    Toast.fire({
                        icon: 'success',
                        title: 'Creating successfully'
                    })

                     window.location.reload();
                })
            },
            destroy(id){
                Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Delete'
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios.delete(`/api/doctors/${id}`)
                        .then(response => {
                            this.index();
                            Swal.fire({ title: 'Deleted!',icon: 'success', })
                        })
                    }
                    window.location.reload();
                })
            },

            user(){
                axios.get(`/api/get_auth_user/${this.auth_id}`)
                .then(response => {
                    // console.log(response.data.info);
                    this.auth_user = response.data.user;
                    this.role = response.data.role;
                    this.permissions = response.data.permissions;

                    console.log(response);
                    this.checkPermission();
                });


            },

            checkPermission(){

                this.permissions.forEach((item) => {

                    console.log(item);

                    if(item.name == 'doctor-create'){
                        this.doctor_create = true;
                    }

                    if(item.name == 'doctor-edit'){
                        this.doctor_edit = true;
                    }

                    if(item.name == 'doctor-delete'){
                        this.doctor_delete = true;
                    }

                    if(item.name == 'doctor-list'){
                        this.doctor_list = true;
                    }

                });
            },
        },

        created(){
            this.index();
            this.doctor();
            this.user();
        }
    }
</script>
