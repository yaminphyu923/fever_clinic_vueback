<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <a href="/"><button class="btn btn-md btn-primary">Home</button></a>
                <a href="/role_management"><button class="btn btn-md btn-primary">Back</button></a>
            </div>

            <div class="col-sm-8 offset-sm-2 mt-3">
                <div class="card">
                    <h4 class="text-center mt-5"><b>Role - <span class="text-danger">{{role.name}}</span></b></h4>
                    <div class="card-body my-3">

                        <div class="form-group row">
                            <label for="" class="col-sm-3">Name:</label>

                            <div class="col-sm-6">
                                <b>{{role.name}}</b>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Permission:</label>

                            <div class="row">
                                <div class="col-sm-3" v-for="permission in permissions" :key="permission.id">
                                    <input type="checkbox" v-on:change="checkPermission(permission.id)"> {{permission.name}}
                                </div>
                            </div>


                        </div>

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
                    console.log(this.role.permission);
                })
            },

            checkPermission(id){
                // console.log(id);
                this.role.permission.push(id);
            },

            update(){
                axios.post('/api/roles',this.role)
                    .then(response => {

                        Toast.fire({
                            icon: 'success',
                            title: 'Updating successfully'
                        })

                })
            },
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
