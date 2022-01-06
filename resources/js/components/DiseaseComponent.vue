<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h4><b>Disease List</b></h4>
                <a href="/"><button class="btn btn-md btn-primary">Home</button></a>
                <button class="btn btn-md btn-primary" data-toggle="modal" data-target="#addDisease">Add Disease</button>
            </div>


            <div class="col-md-12">
                <div class="modal fade" id="addDisease" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Adding Disease</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form @submit.prevent="store">

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Disease Name:</b></label>

                                        <div class="col-sm-8">
                                            <input type="text" name="name" v-model="diseases.name" class="form-control" id="name">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Code:</b></label>

                                        <div class="col-sm-8">
                                            <input type="text" name="code" v-model="diseases.code" class="form-control" id="code">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Disease Category:</b></label>

                                        <div class="col-sm-8">
                                            <input type="text" name="category" v-model="diseases.category" class="form-control" id="category">
                                        </div>
                                    </div>

                                    <!-- <input type="text" name="user_id" v-model="degrees.user_id" class="form-control" id="user_id" value="{{auth()->user()->id}}"> -->

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
                                <th>Disease Name</th>
                                <th>Code</th>
                                <th>Disease Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr v-for="(alldisease,index) in alldiseases.data" :key="alldisease.id">
                                <td>{{index+1}}</td>
                                <td>{{alldisease.name}}</td>
                                <td>{{alldisease.code}}</td>
                                <td>{{alldisease.category}}</td>
                                <td>
                                    <a :href="'/disease/'+ alldisease.id"><button class="btn btn-sm btn-warning">Edit</button></a>

                                    <button class="btn btn-sm btn-danger" @click="destroy(alldisease.id)">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <pagination :data="alldiseases" @pagination-change-page="index"></pagination>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'DiseaseComponent',

        props: ['auth_id'],

        data(){
            return {
                alldiseases :{},
                diseases:{
                    name: "",
                    code: "",
                    category: "",
                    user_id: "",
                },
                search: "",
            }
        },

        methods:{
            index(page=1){
                axios.get(`/api/diseases_paginate?page=${page}&search=${this.search}`)
                .then(response => {
                    // console.log(response.data.info);
                    this.alldiseases = response.data.info;
                });
            },
            store(){
                this.diseases.user_id = this.auth_id;
                axios.post('/api/diseases',this.diseases)
                    .then(response => {
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
                        axios.delete(`/api/diseases/${id}`)
                        .then(response => {
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
