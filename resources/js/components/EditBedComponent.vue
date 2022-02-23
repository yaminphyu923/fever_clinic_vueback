<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <a href="/" class="float-right"><button class="btn btn-md btn-danger">Home</button></a>
                <div class="card mt-5">
                    <div class="card-body">

                        <h4 class="text-center my-4">Edit Bed</h4>

                        <form @submit.prevent="update">

                            <div class="form-group row">
                                <label for="" class="col-sm-4 text-right"><b>Name:</b></label>

                                <div class="col-sm-7">
                                    <input type="text" name="name" v-model="beds.name" class="form-control" id="name">
                                </div>
                            </div>

                             <div class="form-group row">
                                <label for="" class="col-sm-4 text-right"><b>Room:</b></label>

                                <div class="col-sm-7">
                                    <select name="" id="" v-model="beds.room_id" class="form-control">
                                        <option v-for="room in rooms" :key="room.id" :value="room.id">{{room.name}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-4 text-right"><b>Floor:</b></label>

                                <div class="col-sm-7">
                                    <select name="" id="" v-model="beds.floor_id" class="form-control">
                                        <option v-for="floor in floors" :key="floor.id" :value="floor.id">{{floor.name}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-4 text-right"><b>Building:</b></label>

                                <div class="col-sm-7">
                                    <select name="" id="" v-model="beds.building_id" class="form-control">
                                        <option v-for="building in buildings" :key="building.id" :value="building.id">{{building.name}}</option>
                                    </select>
                                </div>
                            </div>


                            <!-- <input type="text" name="user_id" v-model="degrees.user_id" class="form-control" id="user_id" value="{{auth()->user()->id}}"> -->

                            <div class="col-sm-4 offset-sm-4">
                                <a href="/bed"><button type="button" class="btn btn-danger">Back</button></a>
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
        name: 'EditBedComponent',

        props: ['auth_id'],

        data(){
            return {
                id : "",

                rooms : "",

                floors : "",

                buildings : "",

                beds:{
                    name: "",
                    room_id: "",
                    floor_id: "",
                    building_id:"",
                    user_id: "",
                },

            }
        },

        methods:{

            room(){
                axios.get('/api/rooms')
                .then(response => {
                    // console.log(response.data.info);
                    this.rooms = response.data.info;
                })
            },

            floor(){
                axios.get('/api/floors')
                .then(response => {
                    this.floors = response.data.info;
                })
            },

            building(){
                axios.get('/api/buildings')
                .then(response => {
                    this.buildings = response.data.info;
                })
            },

            edit(){
                axios.get(`/api/beds/${this.id}`)
                .then(response => {
                    //console.log(response.data.info);
                    this.beds = response.data.info;
                })
            },

            update(){
                this.beds.user_id = this.auth_id;
                axios.put(`/api/beds/${this.id}`,this.beds)
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
            this.room();
            this.floor();
            this.building();
        }
    }
</script>
