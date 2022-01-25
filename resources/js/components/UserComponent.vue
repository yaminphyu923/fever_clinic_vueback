<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h4><b>User List</b></h4>
                <a href="/"><button class="btn btn-md btn-primary">Home</button></a>
                <a href="/register-patient"><button class="btn btn-md btn-primary">Add New Account</button></a>
                <a href="/newlyregister-patient"><button class="btn btn-md btn-primary">Newly Register</button></a>
                <a href="/role_management"><button class="btn btn-md btn-primary">Role Mangement</button></a>
                <a href="/permission"><button class="btn btn-md btn-primary">Permission Mangement</button></a>
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="(user,index) in users.data" :key="user.id">
                                <td>{{index+1}}</td>
                                <td>{{user.name}}</td>
                                <td>{{user.email}}</td>
                                <td><span class="badge badge-success">{{user.role != null ? user.role.name : "-"}}</span></td>
                                <td>
                                    <a :href="'/edit_user/'+ user.id"><button class="btn btn-sm btn-warning" v-if="edit == true">Edit</button></a>

                                    <button class="btn btn-sm btn-danger" @click="destroy(user.id)" v-if="del == true">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <pagination :data="users" @pagination-change-page="index"></pagination>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'UserComponent',

        props: ['auth_id'],

        data(){
            return {
                users :{},

                search: "",

                auth_user: "",

                role : "",

                permissions : [],

                edit : false,

                del : false,
            }
        },

        methods:{
            index(page=1){
                axios.get(`/api/users?page=${page}&search=${this.search}`)
                .then(response => {
                    // console.log(response.data.info);
                    this.users = response.data.info;
                });
            },

            user(){
                axios.get(`/api/get_auth_user/${this.auth_id}`)
                .then(response => {
                    // console.log(response.data.info);
                    this.auth_user = response.data.user;
                    this.role = response.data.role;
                    this.permissions = response.data.permissions;

                    console.log(response);
                    this.checkPermission();
                });


            },

            checkPermission(){

                this.permissions.forEach((item) => {

                    console.log(item);

                    if(item.name == 'role-edit'){
                        this.edit = true;
                        console.log('edit');
                    }

                    if(item.name == 'role-delete'){
                        this.del = true;
                        console.log('delete');
                    }
                });
            },
            // store(){
            //     this.degrees.user_id = this.auth_id;
            //     axios.post('/api/createDegrees',this.degrees)
            //         .then(response => {
            //             this.index();

            //             this.degrees = {
            //                 name:"",
            //                 fullname: "",
            //             }

            //             Toast.fire({
            //                 icon: 'success',
            //                 title: 'Creating successfully'
            //             })
            //         window.location.reload();

            //     })
            // },
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
                        axios.delete(`/api/users/${id}`)
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
