<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h4><b>User List</b></h4>
                <a href="/"><button class="btn btn-md btn-primary">Home</button></a>
                <a href="/user"><button class="btn btn-md btn-primary">Back</button></a>
            </div>

            <div class="col-md-8 offset-md-2 mt-3">
                <div class="card" :style="cardShadow">
                    <div class="card-body">
                       <h4 class="text-center mb-3 my-3"><b>Edit Account</b></h4>

                       <form @submit.prevent="update">
                           <div class="form-group row">
                               <label for="" class="col-sm-2 offset-sm-2">Name</label>

                               <div class="col-sm-6">
                                   <input type="text" v-model="user.name" class="form-control">
                               </div>
                           </div>

                           <div class="form-group row">
                               <label for="" class="col-sm-2 offset-sm-2">SaMa</label>

                               <div class="col-sm-6">
                                   <input type="text" v-model="user.sama" class="form-control">
                               </div>
                           </div>

                           <div class="form-group row">
                               <label for="" class="col-sm-2 offset-sm-2">Email</label>

                               <div class="col-sm-6">
                                   <input type="email" v-model="user.email" class="form-control">
                               </div>
                           </div>

                           <div class="form-group row">
                               <label for="" class="col-sm-2 offset-sm-2">Password</label>

                               <div class="col-sm-6">
                                   <input type="password" v-model="user.password" class="form-control">
                               </div>
                           </div>

                           <div class="form-group row">
                               <label for="" class="col-sm-2 offset-sm-2">Confirm Password</label>

                               <div class="col-sm-6">
                                   <input type="password" v-model="user.confirm_password" class="form-control">
                               </div>
                           </div>

                           <div class="form-group row">
                               <label for="" class="col-sm-2 offset-sm-2">Role</label>

                               <div class="col-sm-6">
                                    <Select2 v-model="user.role" :options="roles" :settings="{ settingOption: roles.text, settingOption: roles.text }" />
                                    <!-- <select v-model="user.role" class="form-control">
                                        <option value="ms">MS</option>
                                        <option value="master">Master</option>
                                        <option value="doctor">Doctor</option>
                                        <option value="officer">Officer</option>
                                        <option value="usertest">UserTest</option>
                                        <option value="stock">Stock</option>
                                    </select> -->
                               </div>
                           </div>

                           <div class="col-sm-6 offset-sm-4">
                               <button type="submit" class="btn btn-md btn-success btn-block">Update</button>
                           </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Select2 from 'v-select2-component';

    export default {
        name: 'EditUserComponent',

        props: ['auth_id'],

        components: {Select2},

        data(){
            return {
                users :{},

                search: "",

                id: "",

                roles: [],

                user: {
                    name : "",
                    sama : "",
                    email : "",
                    password : "",
                    confirm_password: "",
                    role: "",
                },

                cardShadow: {
                    boxShadow : '1px 1px 2px #333',
                }
            }
        },

        methods:{

            role(){
                axios.get('/api/roleData')
                .then(response => {
                    this.roles = response.data;
                })
            },

            edit(){
                axios.get(`/api/users/${this.id}`)
                .then(response => {
                    // console.log(response.data.info);
                    this.user = response.data.info;
                })
            },

            update(){
                axios.put(`/api/users/${this.id}`,this.user)
                .then(response => {
                    if(response.data.result == 1){
                        Toast.fire({
                            icon: 'success',
                            title: 'Updating successfully'
                        })
                    }else{
                        Toast.fire({
                            icon: 'error',
                            title: 'Password Invalid!'
                        })
                    }
                })
            }
        },

        created(){
            var full_url = document.URL;
            var url_array = full_url.split('/');
            var id = url_array[url_array.length-1];
            this.id = id;

            this.edit();

            this.role();
        }
    }
</script>
