<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-10 offset-sm-1">
                <h3><b>Patient Lists</b></h3>
            </div>

            <div class="col-sm-12">
                <a href="/patient-create"><button class="btn btn-md btn-primary"><b>Create</b></button></a>
                <a href="/total-patient"><button class="btn btn-md btn-primary" v-if="patient_list"><b>Patient List</b></button></a>
                <a href="/doctors"><button class="btn btn-md btn-primary" v-if="doctor_list"><b>Doctors</b></button></a>
                <a href="/hrmanagements"><button class="btn btn-md btn-primary"><b>HR Management</b></button></a>
                <a href="/disease"><button class="btn btn-md btn-primary"><b>Disease</b></button></a>
                <a href="/medical"><button class="btn btn-md btn-primary" v-if="medical_list"><b>Medical List</b></button></a>
                <a href="/lab"><button class="btn btn-md btn-primary" v-if="lab_list"><b>Lab</b></button></a>
                <a href="/edit-history"><button class="btn btn-md btn-primary" v-if="edit_history"><b>Edit History</b></button></a>
                <a href="/user"><button class="btn btn-md btn-primary" v-if="user_list"><b>User</b></button></a>
                <a href="/duty"><button class="btn btn-md btn-primary" v-if="duty_list"><b>Duty Roaster</b></button></a>
                <a href="/bed"><button class="btn btn-md btn-primary" v-if="room_bed_list"><b>Room & Bed</b></button></a>
                <a href="/donation"><button class="btn btn-md btn-primary" v-if="donation_list"><b>Donation</b></button></a>
                <a href="/userGuide"><button class="btn btn-md btn-primary"><b>User Guide</b></button></a>
            </div>

            <div class="col-sm-12 my-5">
                <div class="col-sm-3 offset-sm-9 mb-3">
                    <form @submit.prevent="index">
                        <div class="input-group">
                            <input type="text" v-model="search" placeholder="Search..." class="form-control">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-sm btn-primary">🔎</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>NRC</th>
                                <th>Comobidy</th>
                                <th>Out Patient</th>
                                <th>Dead</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(patient,index) in patients.data" :key="patient.id">
                                <td>{{index+1}}</td>
                                <td>{{formatDate(patient.date)}}</td>
                                <td>{{patient.name}}</td>
                                <td>{{patient.phone}}</td>
                                <td>{{patient.nrc}}</td>
                                <td><span class="badge badge-danger" v-if="patient.como || patient.comobidity ">Comobidity</span></td>
                                <!-- {{(patient.como || patient.comobidity != null)? "comobidity":""}} -->
                                <td>
                                    <div class="col-sm-12 mt-1" v-if="patient.out_patient || patient.out_date">
                                        <span class="badge badge-danger">Out</span>
                                    </div>
                                    <div class="col-sm-12" v-else>
                                        <div class="form-group row">
                                            <div class="col-sm-1">
                                                <input type="checkbox" name="out_patient" id="out_patient" v-model="homeOut.out_patient[index]">
                                            </div>
                                            <div class="col-sm-1">
                                                <label for="">Yes</label>
                                            </div>
                                            <div class="col-sm-7">
                                                <input type="date" name="out_date" class="form-control" v-model="homeOut.out_date[index]">
                                            </div>
                                            <div class="col-sm-3">
                                                <button type="button" class="btn btn-sm btn-success" @click="outUpdate(patient.id)">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="col-sm-12 mt-1" v-if="patient.dead || patient.dead_date">
                                        <span class="badge badge-danger">Dead</span>
                                    </div>
                                    <div class="col-sm-12" v-else>
                                        <div class="form-group row">
                                            <div class="col-sm-1">
                                                <input type="checkbox" name="dead" id="dead" v-model="homeDead.dead[index]" value="1">
                                            </div>

                                            <div class="col-sm-1">
                                                <label for="">Yes</label>
                                            </div>
                                            <div class="col-sm-7">
                                                <input type="date" name="dead_date" class="form-control" v-model="homeDead.dead_date[index]">
                                            </div>
                                            <div class="col-sm-3">
                                                <button type="button" :id="patient.id" class="btn btn-sm btn-success" v-on:click="deadUpdate(patient.id)">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a :href="'/detail-patient/' + patient.id"><button type="button" class="btn btn-sm btn-warning" v-if="patient_detail">Detail</button></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                 <pagination :data="patients" @pagination-change-page="index"></pagination>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        name: 'HomeComponent',

        props: ['auth_id'],

        data(){
            return {
                patients: {},
                search: "",

                homeDead: {
                    dead: [],
                    dead_date: [],
                },

                homeOut: {
                    out_patient: [],
                    out_date: [],
                },

                patient_list : false,

                doctor_list : false,

                user_list : false,

                medical_list : false,

                lab_list : false,

                patient_detail : false,

                edit_history : false,

                duty_list : false,

                room_bed_list : false,

                donation_list : false,
            }
        },

        methods: {
            index(page=1){
                axios.get(`/api/patients_paginate?page=${page}&search=${this.search}`)
                .then(response => {
                    // console.log(response.data);
                    this.patients = response.data.info;
                    console.log(this.patients);
                })
            },

            user(){
                axios.get(`/api/get_auth_user/${this.auth_id}`)
                .then(response => {
                    // console.log(response.data.info);
                    this.auth_user = response.data.user;
                    this.role = response.data.role;
                    this.auth_permissions = response.data.permissions;

                    console.log(this.auth_permissions);
                    this.checkPermission();
                });
            },

            checkPermission(){

                this.auth_permissions.forEach((item) => {

                    if(item.name == 'patient-list'){
                        this.patient_list = true;
                    }

                    if(item.name == 'doctor-list'){
                        this.doctor_list = true;
                    }

                    if(item.name == 'user-list'){
                        this.user_list = true;
                    }

                    if(item.name == 'medical_list-list'){
                        this.medical_list = true;
                    }

                    if(item.name == 'lab-list'){
                        this.lab_list = true;
                    }

                    if(item.name == 'patient-detail'){
                        this.patient_detail = true;
                    }

                    if(item.name == 'edit_history-list'){
                        this.edit_history = true;
                    }

                    if(item.name == 'duty_roaster-list'){
                        this.duty_list = true;
                    }

                    if(item.name == 'room_bed-list'){
                        this.room_bed_list = true;
                    }

                    if(item.name == 'donation-list'){
                        this.donation_list = true;
                    }
                });
            },

            formatDate(date) {
                return moment(date).format('DD-MMM-YYYY h:mm a');
            },

            deadUpdate(id){
                // console.log(this.homeDead.dead[0],this.homeDead.dead_date[0]);
                let hDead = {
                    dead: this.homeDead.dead[0],
                    dead_date: this.homeDead.dead_date[0],
                };

                axios.put(`/api/homeDeadStore/${id}`, hDead)
                .then(response => {
                     Toast.fire({
                        icon: 'success',
                        title: 'Dead Patient Creating successfully'
                    })
                     window.location.reload();
                })
            },

            outUpdate(id){
                let hOut = {
                    out_patient : this.homeOut.out_patient[0],
                    out_date : this.homeOut.out_date[0],
                };

                axios.put(`/api/homeOutStore/${id}`, hOut)
                .then(response => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Out Patient Creating Successfully'
                    })
                     window.location.reload();
                })
            },
        },
        created(){
            this.index();
            this.user();
        }
    }
</script>
