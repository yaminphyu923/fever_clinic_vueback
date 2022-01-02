<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h4><b>Category List</b></h4>
                <a href="/"><button class="btn btn-md btn-danger float-right">Home</button></a>
                <a href="/medical"><button class="btn btn-md btn-primary float-right mr-1">Medical List</button></a>
                <button class="btn btn-md btn-primary float-right mr-1" data-toggle="modal" data-target="#addMedicalCategory">Add Category List</button>

            </div>


            <div class="col-md-12">
                <div class="modal fade" id="addMedicalCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Adding Category List</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form @submit.prevent="store">

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Category Name:</b></label>

                                        <div class="col-sm-8">
                                            <input type="text" name="name" v-model="categories.name" class="form-control" id="name" autocomplete="off">
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
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="(allcategory,index) in allCategories.data" :key="allcategory.id">
                                <td>{{index+1}}</td>
                                <td>{{allcategory.name}}</td>
                                <td>
                                    <a :href="'/medical/category/'+ allcategory.id"><button class="btn btn-sm btn-warning">Edit</button></a>

                                    <button class="btn btn-sm btn-danger" @click="destroy(allcategory.id)">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <pagination :data="allCategories" @pagination-change-page="index"></pagination>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'MedicalCategoryComponent',

        props: ['auth_id'],

        data(){
            return {
                allCategories: {},

                categories : {
                    name: "",
                    user_id: "",
                },

                search: "",
            }
        },

        methods:{
            index(page=1){
                axios.get(`/api/medical_categories_paginate?page=${page}&search=${this.search}`)
                .then(response => {
                    // console.log(response.data.info);
                    this.allCategories = response.data.info;
                });
            },
            store(){
                this.categories.user_id = this.auth_id;
                axios.post('/api/medical_categories',this.categories)
                .then(response => {

                    Toast.fire({
                        icon: 'success',
                        title: 'Creating successfully'
                    })
                })
                window.location.reload();
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
                        axios.delete(`/api/medical_categories/${id}`)
                        .then(response => {
                            this.index();
                            Swal.fire({ title: 'Deleted!',icon: 'success', })
                        })

                    }
                })
            }
        },

        created(){
            this.index();
        }
    }
</script>
