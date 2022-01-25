<template>
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-sm-10 offset-sm-1">
                <h3><b>Out Patient Lists</b></h3>
            </div>

            <div class="col-sm-12 d-flex justify-content-end">
                <button class="btn btn-md btn-primary mr-1" data-toggle="modal" data-target="#addExcel">📃 Import Excel</button>
                <a href="/outpatient-export"><button class="btn btn-md btn-primary mr-1">📃 Export Excel</button></a>
                <a href="/"><button class="btn btn-md btn-primary">◀ Back</button></a>
            </div>

            <div class="modal fade" name="addExcel" id="addExcel" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Adding Patient Excel File</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form @submit.prevent="totalPatientImport">

                                <div class="form-group row">
                                    <label for="" class="col-sm-4"><b>Patient Excel File:</b></label>

                                    <div class="col-sm-8">
                                        <input type="file" name="patient_file" class="form-control" id="patient_file" autocomplete="off" v-on:change="onFileChange">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success float-right ml-1">Save</button>
                                <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Close</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <form @submit.prevent="index">
                    <div class="form-group row">
                        <label for="" class="col-sm-1">Start Date</label>
                        <div class="col-sm-2">
                            <input type="date" name="start_date" class="form-control" v-model="date.start_date">
                        </div>

                        <label for="" class="col-sm-1">End Date</label>
                        <div class="col-sm-2">
                            <input type="date" name="end_date" class="form-control" v-model="date.end_date">
                        </div>

                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-md btn-primary">🔍 Search</button>
                        </div>
                    </div>
                </form>
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
        name: 'OutPatientComponent',

        data(){
            return {
                patients: {},
                search: "",

                patientFile: "",

                date: {
                    start_date:"",
                    end_date: "",
                }

            }
        },

        methods: {

            onFileChange(e){
                this.patientFile = e.target.files[0];
            },

            totalPatientImport(){
                const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }

                let formData = new FormData();
                formData.append('patientFile', this.patientFile);
                axios.post('/api/totalPatient',formData,config)
                .then(response => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Creating successfully',
                    })
                })

                 window.location.reload();
            },

            index(page=1){
                axios.get(`/api/outPatientPaginate?page=${page}&search=${this.search}&startDate=${this.date.start_date}&endDate=${this.date.end_date}`)
                .then(response => {
                    console.log(response.data.info);
                    this.patients = response.data.info;
                    // console.log(this.patients);
                })
            },

            // searchDate(page=1){
            //     axios.get(`/api/patients_paginate?page=${page}&startDate=${this.date.start_date}&endDate=${this.date.end_date}`)
            //     .then(response => {
            //         this.patients = response.data.info;
            //         console.log(this.patients);
            //     })
            // },

            formatDate(date) {
                return moment(date).format('DD-MMM-YYYY h:mm a');
            },
        },
        created(){
            this.index();
        }
    }
</script>
