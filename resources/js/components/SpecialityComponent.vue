<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4><b>Speciality List</b></h4>
                <a href="/doctors"><button class="btn btn-md btn-primary">Back</button></a>
                <a href="/"><button class="btn btn-md btn-primary">Home</button></a>
                <button class="btn btn-md btn-primary" data-toggle="modal" data-target="#addSpeciality">Add Speciality</button>
            </div>


            <div class="col-md-12">
                <div class="modal fade" id="addSpeciality" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Adding Speciality</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form @submit.prevent="store">

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Speciality Name:</b></label>

                                        <div class="col-sm-8">
                                            <input type="text" name="name" v-model="specialities.name" class="form-control" id="name" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Code:</b></label>

                                        <div class="col-sm-8">
                                            <input type="text" name="code" v-model="specialities.code" class="form-control" id="code" autocomplete="off">
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
                        <form @submit.prevent="index">
                            <div class="input-group">
                                <input type="text" v-model="search" placeholder="Search..." class="form-control">

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
                                <th>Speciality Name</th>
                                <th>Code</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="(allspeciality,index) in allspecialities.data" :key="allspeciality.id">
                                <td>{{index+1}}</td>
                                <td>{{allspeciality.name}}</td>
                                <td>{{allspeciality.code}}</td>
                                <td>
                                    <a :href="'/specialities/' + allspeciality.id"><button class="btn btn-sm btn-warning">Edit</button></a>

                                    <button class="btn btn-sm btn-danger" @click="destroy(allspeciality.id)">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <pagination :data="allspecialities" @pagination-change-page="index"></pagination>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'SpecialityComponent',

        props: ['auth_id'],

        data(){
            return {
                allspecialities : {},
                specialities:{
                    name: "",
                    code: "",
                    user: "",
                },
                search: "",
            }
        },

        methods: {
            index(page=1){
                axios.get(`/api/specialities_paginate?page=${page}&search=${this.search}`)
                .then(response => {
                    // console.log(response);
                    this.allspecialities = response.data.info;
                })
            },
            store(){
                this.specialities.user_id = this.auth_id;
                axios.post('/api/createSpecialities',this.specialities)
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
                        axios.delete(`/api/specialities/${id}`)
                        .then(response => {
                            this.index();
                            Swal.fire({ title: 'Deleted!',icon: 'success', })
                        })
                    }

                    window.location.reload();
                })
            }
        },

        created(){
            this.index();
        }
    }
</script>
