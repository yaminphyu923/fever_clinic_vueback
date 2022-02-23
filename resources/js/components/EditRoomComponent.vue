<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <a href="/" class="float-right"><button class="btn btn-md btn-danger">Home</button></a>
                <div class="card mt-5">
                    <div class="card-body">

                        <h4 class="text-center my-4">Edit Room</h4>

                        <form @submit.prevent="update">

                            <div class="form-group row">
                                <label for="" class="col-sm-4"><b>Name:</b></label>

                                <div class="col-sm-8">
                                    <input type="text" name="name" v-model="rooms.name" class="form-control" id="name">
                                </div>
                            </div>


                            <!-- <input type="text" name="user_id" v-model="degrees.user_id" class="form-control" id="user_id" value="{{auth()->user()->id}}"> -->

                            <div class="col-sm-4 offset-sm-4">
                                <a href="/room"><button type="button" class="btn btn-danger">Back</button></a>
                                <button type="submit" class="btn btn-primary">Update</button>
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
        name: 'EditRoomComponent',

        props: ['auth_id'],

        data(){
            return {
                id : "",

                rooms:{
                    name: "",
                    user_id: "",
                },

            }
        },

        methods:{

            edit(){
                axios.get(`/api/rooms/${this.id}`)
                .then(response => {
                    //console.log(response.data.info);
                    this.rooms = response.data.info;
                })
            },

            update(){
                this.rooms.user_id = this.auth_id;
                axios.put(`/api/rooms/${this.id}`,this.rooms)
                .then(response => {
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
            this.edit();
        }
    }
</script>
