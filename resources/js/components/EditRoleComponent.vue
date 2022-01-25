<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <a href="/"><button class="btn btn-md btn-primary">Home</button></a>
                <a href="/role_management"><button class="btn btn-md btn-primary">Back</button></a>
            </div>

            <div class="col-sm-8 offset-sm-2 mt-3">
                <div class="card">
                    <h4 class="text-center mt-5"><b>Edit Role</b></h4>
                    <div class="card-body my-3">
                        <form @submit.prevent="update">
                            <div class="form-group row">
                                <label for="" class="col-sm-4">Name</label>

                                <div class="col-sm-6">
                                    <input type="text" v-model="role.name" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Permission</label>

                                <div class="row">
                                    <div class="col-sm-3" v-for="permission in permissions" :key="permission.id">
                                        <div v-if="isInclude(permission.id)">
                                            <input type="checkbox" v-model="role_permission" :value="permission.id" v-on:change="checkPermission($event)" checked> {{permission.name}}
                                        </div>

                                        <div v-else>
                                            <input type="checkbox" v-model="role_permission" :value="permission.id" v-on:change="checkPermission($event)"> {{permission.name}}
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="col-sm-6 offset-sm-4 mt-5">
                                <button type="submit" class="btn btn-sm btn-success btn-block">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'EditRoleComponent',

        data(){
            return {
                id: "",

                role :{
                    name : "",
                    permission: [],
                },

                role_permission: [],

                permissions : {},
            }
        },


        methods:{

            isInclude(id) {
                return this.anotherArrayName.includes(id)
            },
            permission(){
                axios.get('/api/permissions')
                .then(response => {
                    this.permissions = response.data.info;
                })
            },

            edit(){
                axios.get(`/api/roles/${this.id}`)
                .then(response => {
                    console.log(response.data.info);
                    this.role.name = response.data.info.role.name;

                    this.role.permission = response.data.info.role_permission;

                    this.role_permission = response.data.info.role_permission;
                    console.log(this.role.permission);

                })
            },

            checkPermission(e){
                console.log(this.role_permission);
                //this.role.permission.push(id);
            },

            update(){
                this.role.permission = this.role_permission;
                console.log(this.role);
                axios.put(`/api/roles/${this.id}`,this.role)
                    .then(response => {

                        Toast.fire({
                            icon: 'success',
                            title: 'Updating successfully'
                        })

                })
            },
        },

        computed: {
            anotherArrayName() {
                return this.role.permission.map(item => item)
            }
        },

        created(){
            var full_url = document.URL;
            var url_array = full_url.split('/');
            var id = url_array[url_array.length-1];
            this.id = id;

            this.permission();

            this.edit();
        }
    }
</script>
