<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <h4><b>Building</b></h4>
            </div>

            <div class="col-md-6 col-sm-12 text-right">
                <button class="btn btn-md btn-primary" data-toggle="modal" data-target="#addBuilding">Add</button>
            </div>

            <div class="col-md-12">
                <div class="modal fade" name="addDoctor" id="addBuilding" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Building</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form @submit.prevent="store">

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 text-right"><b>Name:</b></label>

                                        <div class="col-sm-7">
                                            <input type="text" name="name" v-model="buildings.name" class="form-control" id="name" autocomplete="off">
                                        </div>
                                    </div>


                                    <div class="col-sm-11 text-right">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
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
                            <tr v-for="(allbuilding,index) in allbuildings.data" :key="allbuilding.id">
                                <td>{{index+1}}</td>
                                <td>{{allbuilding.name}}</td>
                                <td>
                                    <a :href="'/buildings/'+allbuilding.id"><button class="btn btn-sm btn-warning">Edit</button></a>

                                    <button class="btn btn-sm btn-danger" @click="destroy(allbuilding.id)">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <pagination :data="allbuildings" @pagination-change-page="index"></pagination>
            </div>
        </div>
    </div>
</template>

<script>

    import Select2 from 'v-select2-component';

    export default {
        name: 'BuildingComponent',

        props: ['auth_id'],

        components: {Select2},

        data(){
            return {

                allbuildings: {},

                search: "",

                buildings: {
                    name : "",
                    user_id : "",
                },

                building_list: false,
                floor_list: false,
                room_list: false,
                bed_list: false,
            }
        },

        methods:{

            index(page=1){
                axios.get(`/api/buildingPaginate?page=${page}&search=${this.search}`)
                .then(response => {
                    this.allbuildings = response.data.info
                })
            },

            store(){
                this.buildings.user_id = this.auth_id;
                axios.post('/api/buildings',this.buildings)
                .then(response => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Creating successfully'
                    })

                    window.location.reload();
                })
            },

            user(){
                axios.get(`/api/get_auth_user/${this.auth_id}`)
                .then(response => {
                    // console.log(response.data.info);
                    this.auth_user = response.data.user;
                    this.role = response.data.role;
                    this.permissions = response.data.permissions;

                    //console.log(response);
                    this.checkPermission();
                });


            },

            checkPermission(){

                this.permissions.forEach((item) => {

                    //console.log(item);

                    if(item.name == 'building-list'){
                        this.building_list = true;
                    }

                    if(item.name == 'floor-list'){
                        this.floor_list = true;
                    }

                    if(item.name == 'room-list'){
                        this.room_list = true;
                    }

                    if(item.name == 'bed-list'){
                        this.bed_list = true;
                    }


                });
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
                        axios.delete(`/api/buildings/${id}`)
                        .then(response => {
                            this.index();
                            Swal.fire({ title: 'Deleted!',icon: 'success', })
                        })
                    }
                    window.location.reload();
                })
            },
        },

        created(){
            this.index();
            this.user();
        }
    }
</script>
