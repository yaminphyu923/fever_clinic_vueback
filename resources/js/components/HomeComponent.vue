<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-10 offset-sm-1">
                <h3><b>Patient Lists</b></h3>
            </div>

            <div class="col-sm-12">
                <a href="/patient-create"><button class="btn btn-md btn-primary"><b>Create</b></button></a>
                <a href="/total-patient"><button class="btn btn-md btn-primary"><b>Patient List</b></button></a>
                <a href="/doctors"><button class="btn btn-md btn-primary"><b>Doctors</b></button></a>
                <!-- <a href="/hrmanagements"><button class="btn btn-sm btn-primary"><b>HR Management</b></button></a> -->
                <!-- <a href="/disease"><button class="btn btn-sm btn-primary"><b>Disease</b></button></a> -->
                <a href="/medical"><button class="btn btn-md btn-primary"><b>Medical List</b></button></a>
                <a href="/lab"><button class="btn btn-md btn-primary"><b>Lab</b></button></a>
                <a href="/edit-history"><button class="btn btn-md btn-primary"><b>Edit History</b></button></a>
                <a href="/user"><button class="btn btn-md btn-primary"><b>User</b></button></a>
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
                                    <a :href="'/detail-patient/' + patient.id"><button type="button" class="btn btn-sm btn-warning">Detail</button></a>
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
                }
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
        }
    }
</script>
