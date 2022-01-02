<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-10 offset-sm-1">
                <h3><b>Patient Lists</b></h3>
            </div>

            <div class="col-sm-12">
                <a href="/patient-create"><button class="btn btn-sm btn-primary"><b>Create</b></button></a>
                <a href="/doctors"><button class="btn btn-sm btn-primary"><b>Doctors</b></button></a>
                <!-- <a href="/hrmanagements"><button class="btn btn-sm btn-primary"><b>HR Management</b></button></a> -->
                <a href="/medical"><button class="btn btn-sm btn-primary"><b>Medical List</b></button></a>
                <a href="/lab"><button class="btn btn-sm btn-primary"><b>Lab</b></button></a>
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
                                <td>{{patient.date}}</td>
                                <td>{{patient.name}}</td>
                                <td>{{patient.phone}}</td>
                                <td>{{patient.nrc}}</td>
                                <td></td>
                                <td>
                                    <form>
                                        <div class="col-sm-12 mt-1">
                                            <div class="form-group row">
                                                <div class="col-sm-1">
                                                    <input type="checkbox" name="nrc" id="nrc">
                                                </div>
                                                <div class="col-sm-1">
                                                    <label for="">Yes</label>
                                                </div>
                                                <div class="col-sm-7">
                                                    <input type="date" class="form-control">
                                                </div>
                                                <div class="col-sm-3">
                                                    <button type="submit" class="btn btn-sm btn-success">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                                <td>
                                    <form>
                                        <div class="col-sm-12 mt-1">
                                            <div class="form-group row">
                                                <div class="col-sm-1">
                                                    <input type="checkbox" name="nrc" id="nrc">
                                                </div>
                                                <div class="col-sm-1">
                                                    <label for="">Yes</label>
                                                </div>
                                                <div class="col-sm-7">
                                                    <input type="date" class="form-control">
                                                </div>
                                                <div class="col-sm-3">
                                                    <button type="submit" class="btn btn-sm btn-success">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-warning">Detail</button>
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
            }
        },

        methods: {
            index(page=1){
                axios.get(`/api/patients_paginate?page=${page}&search=${this.search}`)
                .then(response => {
                    // console.log(response.data);
                    this.patients = response.data.info;
                })
            }
        },
        created(){
            this.index();
        }
    }
</script>
