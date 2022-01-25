<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h4><b>Medical List</b></h4>
                <a href="/"><button class="btn btn-md btn-danger float-right">Home</button></a>
                <a href="/pre_medicine"><button class="btn btn-md btn-primary float-right mr-1">Prescriptive Medicine</button></a>
                <a href="/medical/category"><button class="btn btn-md btn-primary float-right mr-1">Category</button></a>
                <button class="btn btn-md btn-primary float-right mr-1" data-toggle="modal" data-target="#addMedical">Add Medical List</button>
            </div>

            <div class="col-md-12">
                <div class="modal fade" id="addMedical" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Adding Medical List</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form @submit.prevent="store">

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Name:</b></label>

                                        <div class="col-sm-8">
                                            <input type="text" name="name" v-model="medical.name" class="form-control" id="name" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Start Date:</b></label>

                                        <div class="col-sm-8">
                                            <input type="date" name="start_date" v-model="medical.start_date" class="form-control" id="start_date">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Quantity:</b></label>

                                        <div class="col-sm-8">
                                            <input type="text" name="quantity" v-model="medical.quantity" class="form-control" id="quantity">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="medicalcategory" class="col-sm-4"><b>Category</b></label>

                                        <div class="col-sm-8 se">
                                            <!-- <select v-model="medical.medical_category_id" class="form-control">
                                                <option v-for="category in categories" :key="category.id" :value="category.id">{{category.name}}</option>
                                            </select> -->

                                            <Select2 id="medicalcategory" v-model="medical.medical_category_id" :options="categories" :settings="{ settingOption: categories.name, settingOption: categories.name }"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Note:</b></label>

                                        <div class="col-sm-8">
                                            <textarea v-model="medical.note" class="form-control" cols="30" rows="3"></textarea>
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
                                <th>Start Date</th>
                                <th>Final Stock</th>
                                <th>Category</th>
                                <th>Note</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="(allmedical,index) in allmedicals.data" :key="allmedical.id">
                                <td>{{index+1}}</td>
                                <td>{{allmedical.name}}</td>
                                <td>{{formatDate(allmedical.in_date)}}</td>
                                <th>{{allmedical.remain}}</th>
                                <th>{{(allmedical.medicalcategory != null)?allmedical.medicalcategory.name:"-"}}</th>
                                <th>{{allmedical.note}}</th>
                                <td>
                                    <a :href="'/detail_medical/'+ allmedical.id"><button class="btn btn-sm btn-warning">👁 Detail</button></a>

                                    <button class="btn btn-sm btn-danger" @click="destroy(allmedical.id)" v-if="auth_user.role != 'superadmin'">🗑 Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <pagination :data="allmedicals" @pagination-change-page="index"></pagination>
            </div>
        </div>
    </div>
</template>

<script>

    import Select2 from 'v-select2-component';

    export default {
        name: 'MedicalListComponent',

        props: ['auth_user'],

        components: {Select2},

        data(){
            return {
                role : '',

                medical : {
                    name: "",
                    start_date: "",
                    quantity: "",
                    medical_category_id: "",
                    note: "",
                    user_id: "",
                },

                allmedicals : {},

                categories : [],

                search: "",
            }
        },

        methods:{
            category(){
                axios.get('/api/medicalCategoryData')
                .then(response => {
                    this.categories = response.data;
                    // console.log(this.categories);
                })
            },
            index(page=1){
                axios.get(`/api/medical_lists_paginate?page=${page}&search=${this.search}`)
                .then(response => {
                    this.allmedicals = response.data.info;
                });
            },
            store(){
                this.medical.user_id = this.auth_user.id;
                axios.post('/api/medical_lists',this.medical)
                .then(response => {

                    Toast.fire({
                        icon: 'success',
                        title: 'Creating successfully'
                    })
                })
                window.location.reload();
            },

            formatDate(date) {
                return moment(date).format('DD-MMM-YYYY');
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
            //             axios.delete(`/api/degrees/${id}`)
            //             .then(response => {
            //                 this.index();
            //                 Swal.fire({ title: 'Deleted!',icon: 'success', })
            //             })

            //         }
            //     })
            // }
        },

        created(){
            this.category();
            this.index();
            this.formatDate();

            console.log(this.auth_user);
        }
    }

</script>
