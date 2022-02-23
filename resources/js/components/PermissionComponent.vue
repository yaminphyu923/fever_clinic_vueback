<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="/"><button class="btn btn-md btn-primary">Home</button></a>
                <a href="/user"><button class="btn btn-md btn-primary">Back</button></a>
            </div>

            <div class="col-md-6 mt-3">
                <h4><b>Permission Management</b></h4>
            </div>
            <div class="col-md-6">
                <a class="btn btn-success float-right" href="/create-permission" v-if="create"> Create New Permission</a>
            </div>

            <div class="col-sm-12 mt-3">
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
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="(permission,index) in permissions.data" :key="permission.id">
                                <td>{{index+1}}</td>
                                <td>{{permission.name}}</td>
                                <td>
                                    <a :href="'/edit-permission/'+ permission.id"><button class="btn btn-sm btn-warning" v-if="edit">Edit</button></a>

                                    <button class="btn btn-sm btn-danger" @click="destroy(permission.id)" v-if="del">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <pagination :data="permissions" @pagination-change-page="index"></pagination>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'RoleManagementComponent',

        props : ['auth_id'],

        data(){
            return {
                permissions :{},

                auth_permissions : {},

                search: "",

                edit : false,

                del : false,

                create : false,
            }
        },

        methods:{
            index(page=1){
                axios.get(`/api/permissionPaginate?page=${page}&search=${this.search}`)
                .then(response => {
                    //console.log(response.data.info);
                    this.permissions = response.data.info;
                });
            },
            user(){
                axios.get(`/api/get_auth_user/${this.auth_id}`)
                .then(response => {
                    // console.log(response.data.info);
                    this.auth_user = response.data.user;
                    this.role = response.data.role;
                    this.auth_permissions = response.data.permissions;

                    // console.log(response);
                    this.checkPermission();
                });
            },

            checkPermission(){

                this.auth_permissions.forEach((item) => {

                    if(item.name == 'permission-create'){
                        this.create = true;
                    }

                    if(item.name == 'permission-edit'){
                        this.edit = true;
                    }

                    if(item.name == 'permission-delete'){
                        this.del = true;
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
                        axios.delete(`/api/permissions/${id}`)
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

            this.user();
        }
    }
</script>
