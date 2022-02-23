<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h4><b>Time List</b></h4>
            </div>
            <div class="col-sm-6 text-right">
                <button class="btn btn-md btn-primary" data-toggle="modal" data-target="#addTime" v-if="time_create">Add Time</button>
                <a href="/duty"><button class="btn btn-md btn-primary">Back</button></a>
            </div>

            <div class="col-md-12">
                <div class="modal fade" name="addDoctor" id="addTime" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Time</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form @submit.prevent="store">

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Time:</b></label>

                                        <div class="col-sm-8">
                                            <input type="text" name="phone" v-model="times.time" class="form-control" id="time" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="text-right">
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
                                <th>times</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="(time,index) in alltimes.data" :key="time.id">
                                <td>{{index+1}}</td>
                                <td>{{time.time}}</td>
                                <td>
                                    <a :href="'/times/'+time.id"><button class="btn btn-sm btn-warning" v-if="time_edit">Edit</button></a>

                                    <button class="btn btn-sm btn-danger" @click="destroy(time.id)" v-if="time_delete">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <pagination :data="alltimes" @pagination-change-page="index"></pagination>
            </div>
        </div>
    </div>
</template>

<script>

    import VModal from 'vue-js-modal';

    export default {
        name: 'TimeComponent',

        props: ['auth_id'],

        data(){
            return {
                times:{
                    time : "",
                    user_id : "",
                },

                alltimes : {},

                search: "",
                // showModal: true,

                time_create : "",
                time_edit : "",
                time_delete : "",
            }
        },

        methods:{

            index(page=1){
                axios.get(`/api/timePaginate?page=${page}&search=${this.search}`)
                    .then(response => {
                        // console.log(response.data.info);
                        this.alltimes = response.data.info;
                    })
                },

            store(){

                this.times.user_id = this.auth_id;
                axios.post('/api/times',this.times)
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
                        axios.delete(`/api/times/${id}`)
                        .then(response => {
                            this.index();
                            Swal.fire({ title: 'Deleted!',icon: 'success', })
                        })
                    }
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

                    // console.log(item);

                    if(item.name == 'time-create'){
                        this.time_create = true;
                    }

                    if(item.name == 'time-edit'){
                        this.time_edit = true;
                    }

                    if(item.name == 'time-delete'){
                        this.time_delete = true;
                    }

                });
            },
        },

        created(){
            this.index();
            this.user();
        }
    }
</script>
