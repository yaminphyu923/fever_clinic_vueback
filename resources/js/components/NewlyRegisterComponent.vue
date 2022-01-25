<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h4><b>Register List</b></h4>
                <a href="/"><button class="btn btn-md btn-primary">Home</button></a>
                <a href="/user"><button class="btn btn-md btn-primary">Back</button></a>
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
                                <th>SaMa</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="(user,index) in users.data" :key="user.id">
                                <td>{{index+1}}</td>
                                <td>{{user.name}}</td>
                                <td>{{user.email}}</td>
                                <td>{{user.sama}}</td>
                                <td>
                                    <!-- <a :href="'/degrees/'+ alldegree.id"><button class="btn btn-sm btn-warning">Edit</button></a> -->

                                    <button class="btn btn-sm btn-primary" @click="newlyRegister(user.id)">Approve</button>
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
        name: 'NewlyRegisterComponent',

        props: ['auth_id'],

        data(){
            return {
                users :{},

                search: "",
            }
        },

        methods:{
            index(page=1){
                axios.get(`/api/newly?page=${page}&search=${this.search}`)
                .then(response => {
                    // console.log(response.data.info);
                    this.users = response.data.info;
                });
            },

            newlyRegister(id){
                axios.put(`/api/newlyUpdate/${id}`)
                .then(response => {
                    console.log(id);
                    Toast.fire({
                        icon: 'success',
                        title: 'Approving successfully'
                    })
                    window.location.reload();
                })
            }
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

        },

        created(){
            this.index();
        }
    }
</script>
