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
                <a class="btn btn-success float-right" href="/create-permission"> Create New Permission</a>
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
                                    <a :href="'/edit-permission/'+ permission.id"><button class="btn btn-sm btn-warning">Edit</button></a>

                                    <button class="btn btn-sm btn-danger" @click="destroy(permission.id)">Delete</button>
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

        data(){
            return {
                permissions :{},

                search: "",
            }
        },

        methods:{
            index(page=1){
                axios.get(`/api/permissionPaginate?page=${page}&search=${this.search}`)
                .then(response => {
                    // console.log(response.data.info);
                    this.permissions = response.data.info;
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
        }
    }
</script>
