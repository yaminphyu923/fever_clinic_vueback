<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4><b>Lab List</b></h4>
                <a href="/"><button class="btn btn-md btn-primary">Home</button></a>
                <button class="btn btn-md btn-primary" data-toggle="modal" data-target="#addLab">Add Lab</button>
                <a href="/lab_category"><button class="btn btn-md btn-primary">Lab Category</button></a>
                <a href="/group"><button class="btn btn-md btn-primary">Group</button></a>

            </div>

            <div class="col-md-12">
                <div class="modal fade" name="addLab" id="addLab" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Adding Lab</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form @submit.prevent="store">

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Lab Name:</b></label>

                                        <div class="col-sm-8">
                                            <input type="text" name="name" v-model="labs.name" class="form-control" id="name" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Unit:</b></label>

                                        <div class="col-sm-8">
                                            <input type="text" name="unit" v-model="labs.unit" class="form-control" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Normal Range:</b></label>

                                        <div class="col-sm-8">
                                            <input type="text" name="unit" v-model="labs.range" class="form-control" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Group:</b></label>

                                        <div class="col-sm-8">

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Lab Category:</b></label>

                                        <div class="col-sm-8">

                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-success float-right ml-1">Save</button>
                                    <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Close</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-3">
                <div class="row">
                    <div class="col-sm-3 offset-sm-9 mb-3">
                        <form @submit.prevent="">
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
                                <th>Unit</th>
                                <th>Normal Range</th>
                                <th>Group</th>
                                <th>Lab Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <!-- <tr v-for="(alldoctor,index) in alldoctors.data" :key="alldoctor.id">
                                <td>{{index+1}}</td>
                                <td>{{alldoctor.name}}</td>
                                <td>{{alldoctor.phone}}</td>
                                <td>{{(alldoctor.degree != null)?alldoctor.degree.name:'-'}}</td>
                                <td>{{(alldoctor.speciality != null)?alldoctor.speciality.name:'-'}}</td>
                                <td>
                                    <a :href="'/doctors/'+alldoctor.id"><button class="btn btn-sm btn-warning">Edit</button></a>

                                    <button class="btn btn-sm btn-danger" @click="destroy(alldoctor.id)">Delete</button>
                                </td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>

                <!-- <pagination :data="alldoctors" @pagination-change-page="doctor"></pagination> -->
            </div>
        </div>
    </div>
</template>

<script>

    import VModal from 'vue-js-modal';

    export default {
        name: 'LabComponent',

        props: ['auth_id'],

        data(){
            return {

                labs:{
                    name: "",
                    unit: "",
                    range: "",
                    group_id: "",
                    lab_category_id: "",
                    user_id: "",
                },

                search: "",
                // showModal: true,
            }
        },

        methods:{
            index(){
                // axios.get('/api/degrees')
                // .then(response => {
                //     this.degrees = response.data.info;
                // }),

                // axios.get('/api/specialities')
                // .then(response => {
                //     this.specialities = response.data.info;
                // })
            },

            // doctor(page=1){
            //     axios.get(`/api/doctors_paginate?page=${page}&search=${this.search}`)
            //     .then(response => {
            //         this.alldoctors = response.data.info;
            //     })
            // },

            store(){

                this.labs.user_id = this.auth_id;
                axios.post('/api/labs',this.labs)
                .then(response => {
                    this.index();

                    Toast.fire({
                        icon: 'success',
                        title: 'Creating successfully'
                    })

                     window.location.reload();
                })
            },
            // destroy(id){
            //     Swal.fire({
            //     title: 'Are you sure?',
            //     icon: 'warning',
            //     showCancelButton: true,
            //     confirmButtonColor: '#3085d6',
            //     cancelButtonColor: '#d33',
            //     confirmButtonText: 'Delete'
            //     }).then((result) => {
            //         if (result.isConfirmed) {
            //             axios.delete(`/api/doctors/${id}`)
            //             .then(response => {
            //                 this.index();
            //                 Swal.fire({ title: 'Deleted!',icon: 'success', })
            //             })
            //         }
            //         window.location.reload();
            //     })
            // }
        },

        created(){

        }
    }
</script>
