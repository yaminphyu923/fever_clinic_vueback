<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4><b>Lab Category List</b></h4>
                <a href="/lab"><button class="btn btn-md btn-primary">Back</button></a>
                <a href="/"><button class="btn btn-md btn-primary">Home</button></a>
                <button class="btn btn-md btn-primary" data-toggle="modal" data-target="#addLabCategory">Add Lab Category</button>
            </div>

            <div class="col-md-12">
                <div class="modal fade" name="addLabCategory" id="addLabCategory" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Adding Lab Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form @submit.prevent="store">

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Name:</b></label>

                                        <div class="col-sm-8">
                                            <input type="text" name="name" v-model="labCategories.name" class="form-control" id="name" autocomplete="off">
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
                        <form @submit.prevent="index">
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
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="(labcategory,index) in allLabCategories.data" :key="labcategory.id">
                                <td>{{index+1}}</td>
                                <td>{{labcategory.name}}</td>
                                <td>
                                    <a :href="'/lab_category/'+labcategory.id"><button class="btn btn-sm btn-warning">Edit</button></a>

                                    <button class="btn btn-sm btn-danger" @click="destroy(labcategory.id)">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <pagination :data="allLabCategories" @pagination-change-page="index"></pagination>
            </div>
        </div>
    </div>
</template>

<script>

    import VModal from 'vue-js-modal';

    export default {
        name: 'LabCategoryComponent',

        props: ['auth_id'],

        data(){
            return {

                allLabCategories: {},

                labCategories:{
                    name: "",
                    user_id: "",
                },

                search: "",
                // showModal: true,
            }
        },

        methods:{

            index(page=1){
                axios.get(`/api/lab_categories_paginate?page=${page}&search=${this.search}`)
                .then(response => {
                    this.allLabCategories = response.data.info;
                })
            },

            store(){

                this.labCategories.user_id = this.auth_id;
                axios.post('/api/lab_categories',this.labCategories)
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
                        axios.delete(`/api/lab_categories/${id}`)
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
