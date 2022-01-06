<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">

                <div class="card mt-5">
                    <div class="card-body">

                        <h4 class="text-center my-4">Edit HR Management</h4>

                        <form @submit.prevent="update">

                            <div class="form-group row">
                                <label for="" class="col-sm-4"><b>Name:</b></label>

                                <div class="col-sm-8">
                                    <input type="text" name="name" v-model="hrs.name" class="form-control" id="name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-4"><b>Phone:</b></label>

                                <div class="col-sm-8">
                                    <input type="text" name="phone" v-model="hrs.phone" class="form-control" id="phone">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-4"><b>Position:</b></label>

                                <div class="col-sm-8">
                                    <select name="position_id" id="position_id" v-model="hrs.position_id" class="form-control">
                                        <option v-for="position in positions" :key="position.id" :value="position.id">{{position.name}}</option>
                                    </select>
                                </div>
                            </div>

                            <!-- <input type="text" name="user_id" v-model="degrees.user_id" class="form-control" id="user_id" value="{{auth()->user()->id}}"> -->

                            <div class="col-sm-4 offset-sm-4">
                                <a href="/hrmanagements"><button type="button" class="btn btn-danger">Back</button></a>
                                <button type="submit" class="btn btn-primary">Save</button>
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
        name: 'EditHRManagementComponent',
        props: ['auth_id'],
        data(){
            return {
                id : "",
                positions: {},
                hrs:{
                    id: "",
                    name: "",
                    phone: "",
                    position_id: "",
                    user_id: "",
                },

            }
        },

        methods:{
            index(){
                axios.get('/api/positions')
                .then(response => {
                    this.positions = response.data.info;
                })
            },
            edit(){
                axios.get(`/api/hrs/${this.id}`)
                .then(response => {
                    // console.log(response.data.info);
                    this.hrs = response.data.info;
                })
            },

            update(){
                this.hrs.user_id = this.auth_id;
                axios.put(`/api/hrs/${this.id}`,this.hrs)
                .then(response => {
                    this.edit();
                    Toast.fire({
                        icon: 'success',
                        title: 'Update successfully'
                    })
                })
            }
        },

        created(){
            var full_url = document.URL;
            var url_array = full_url.split('/');
            var id = url_array[url_array.length-1];
            this.id = id;

            this.index();
            this.edit();
        }
    }
</script>
