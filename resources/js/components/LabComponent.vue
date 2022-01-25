<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-3"><b>Lab List</b></h4>
                <a href="/"><button class="btn btn-md btn-primary">Home</button></a>
                <button class="btn btn-md btn-primary" data-toggle="modal" data-target="#addLab">Add Lab</button>
                <a href="/lab_category"><button class="btn btn-md btn-primary">Lab Category</button></a>
                <a href="/group"><button class="btn btn-md btn-primary">Group</button></a>
                <a href="/labs-export"><button class="btn btn-md btn-primary">Export Excel</button></a>
                <button class="btn btn-md btn-primary" data-toggle="modal" data-target="#addExcel">Import Excel</button>
            </div>

            <div class="col-md-12 mt-5">
                <button class="btn btn-sm btn-primary" @click="sortByName">Sort by Name</button>
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

                                        <div class="col-sm-8 se">
                                            <Select2 v-model="labs.group_id" :options="groups" :settings="{ settingOption: groups.text, settingOption: groups.text }" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Lab Category:</b></label>

                                        <div class="col-sm-8 se">
                                            <Select2 v-model="labs.labcategory_id" :options="lab_categories" :settings="{ settingOption: lab_categories.text, settingOption: lab_categories.text }" />
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

            <div class="col-md-12">
                <div class="modal fade" name="addExcel" id="addExcel" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Adding Lab Excel File</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form @submit.prevent="fileImport">

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Lab Excel File:</b></label>

                                        <div class="col-sm-8">
                                            <input type="file" name="lab_file" class="form-control" id="lab_file" autocomplete="off" v-on:change="onFileChange">
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
                                <th>Unit</th>
                                <th>Normal Range</th>
                                <th>Group</th>
                                <th>Lab Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="(all_lab,index) in all_labs.data" :key="all_lab.id">
                                <td>{{index+1}}</td>
                                <td>{{all_lab.name}}</td>
                                <td>{{all_lab.unit}}</td>
                                <td>{{all_lab.range}}</td>
                                <td>{{(all_lab.group != null)?all_lab.group.name:'-'}}</td>
                                <td>{{(all_lab.lab_category != null)?all_lab.lab_category.name:'-'}}</td>
                                <td>
                                    <a :href="'/lab/'+all_lab.id"><button class="btn btn-sm btn-warning">Edit</button></a>

                                    <button class="btn btn-sm btn-danger" @click="destroy(all_lab.id)">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <pagination :data="all_labs" @pagination-change-page="index"></pagination>
            </div>
        </div>
    </div>
</template>

<script>

    import Select2 from 'v-select2-component';

    export default {
        name: 'LabComponent',

        props: ['auth_id'],

        components: {Select2},
        data(){
            return {

                groups: [],

                lab_categories: [],

                all_labs: {},

                labs:{
                    name: "",
                    unit: "",
                    range: "",
                    group_id: "",
                    labcategory_id: "",
                    user_id: "",
                },

                labFile: "",

                search: "",
                // showModal: true,
            }
        },

        methods:{

            onFileChange(e){
                this.labFile = e.target.files[0];
            },

            fileImport(){
                const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }

                let formData = new FormData();
                formData.append('labFile', this.labFile);
                axios.post('/api/importFile',formData,config)
                .then(response => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Creating successfully',
                    })
                })

                 window.location.reload();
            },

            sortByName(page=1){
                axios.get(`/api/labs_sortName?page=${page}`)
                .then(response => {
                    this.all_labs = response.data.info;
                })
            },

            index(page=1){
                axios.get(`/api/labs_paginate?page=${page}&search=${this.search}`)
                .then(response => {
                    this.all_labs = response.data.info;
                    console.log(this.all_labs);
                })
            },

            group(){
                axios.get('/api/groupData')
                .then(response => {
                    this.groups = response.data;
                })
            },

            labCategory(){
                axios.get('/api/labCategoryData')
                .then(response =>{
                    this.lab_categories = response.data;
                })
            },

            store(){

                this.labs.user_id = this.auth_id;
                axios.post('/api/labs',this.labs)
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
                        axios.delete(`/api/labs/${id}`)
                        .then(response => {
                            Swal.fire({ title: 'Deleted!',icon: 'success', })
                        })
                    }
                    window.location.reload();
                })
            }
        },

        created(){
            this.group();
            this.labCategory();
            this.index();
        }
    }
</script>
