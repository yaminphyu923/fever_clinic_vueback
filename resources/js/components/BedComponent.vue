<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <h4><b>Bed</b></h4>
            </div>

            <div class="col-md-6 col-sm-12 text-right">
                <a href="/summary"><button type="button" class="btn btn-md btn-primary">Summary</button></a>
                <button type="button" class="btn btn-md btn-primary" @click="vacant">Vacant</button>
                <button type="button" class="btn btn-md btn-primary" @click="occupied">Occupied</button>
                <button class="btn btn-md btn-primary" data-toggle="modal" data-target="#addBed">Add</button>
            </div>

            <div class="col-md-12">
                <div class="modal fade" name="addDoctor" id="addBed" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Bed</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form @submit.prevent="store">

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 text-right"><b>Name:</b></label>

                                        <div class="col-sm-7">
                                            <input type="text" name="name" v-model="beds.name" class="form-control" id="name" autocomplete="off">
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


                                    <div class="col-sm-11 text-right">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-3">
                <div class="row">
                    <div class="col-sm-12">
                        <form @submit.prevent="bedSearch">
                            <div class="form-group row">
                                <label for="" class="col-sm-1 text-right"><b>Building:</b></label>

                                <div class="col-sm-1">
                                    <select name="" id="" v-model="beds.building_id" class="form-control">
                                        <option value=""></option>
                                        <option v-for="building in buildings" :key="building.id" :value="building.id">{{building.name}}</option>
                                    </select>
                                </div>

                                <label for="" class="col-sm-1"><b>Floor:</b></label>

                                <div class="col-sm-1">
                                    <select name="" id="" v-model="beds.floor_id" class="form-control">
                                        <option value=""></option>
                                        <option v-for="floor in floors" :key="floor.id" :value="floor.id">{{floor.name}}</option>
                                    </select>
                                </div>

                                <label for="" class="col-sm-1"><b>Room:</b></label>

                                <div class="col-sm-1">
                                    <select name="" id="" v-model="beds.room_id" class="form-control">
                                        <option value=""></option>
                                        <option v-for="room in rooms" :key="room.id" :value="room.id">{{room.name}}</option>
                                    </select>
                                </div>

                                <label for="" class="col-sm-1"><b>Bed:</b></label>

                                <div class="col-sm-2">
                                    <select name="" id="" v-model="beds.name" class="form-control">
                                        <option value=""></option>
                                        <option v-for="bedSearch in bedsSearch" :key="bedSearch.id">{{bedSearch.name}}</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-md btn-primary">🔎 Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-3 offset-sm-9 mb-3">
                        <form @submit.prevent="index">
                            <div class="input-group">
                                <input type="text" v-model="search" placeholder="Search Name..." class="form-control">

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
                                <th>Building</th>
                                <th>Floor</th>
                                <th>Room</th>
                                <th>Bed</th>
                                <th>Vacant/Occupied</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="(allbed,index) in allbeds.data" :key="allbed.id">
                                <td>{{index+1}}</td>
                                <td>{{(allbed.building != null ) ? allbed.building.name : '-'}}</td>
                                <td>{{(allbed.floor != null ) ? allbed.floor.name : '-'}}</td>
                                <td>{{(allbed.room != null ) ? allbed.room.name : '-'}}</td>
                                <td>{{allbed.name}}</td>
                                <td v-if="allbed.status == 0">
                                    <span class="badge badge-success">
                                        Vacant
                                    </span>
                                </td>
                                <td v-else>
                                    <span class="badge badge-danger">
                                        Occupied
                                    </span>
                                </td>
                                <td>
                                    <a :href="'/beds/'+allbed.id"><button class="btn btn-sm btn-warning">Edit</button></a>

                                    <button class="btn btn-sm btn-danger" @click="destroy(allbed.id)">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <pagination :data="allbeds" @pagination-change-page="index"></pagination>
            </div>
        </div>
    </div>
</template>

<script>

    import Select2 from 'v-select2-component';

    export default {
        name: 'BedComponent',

        props: ['auth_id'],

        components: {Select2},

        data(){
            return {

                allbeds: {},

                bedsSearch: {},

                rooms : {},

                floors : {},

                buildings : {},

                search: "",

                beds: {
                    name : "",
                    room_id : "",
                    floor_id : "",
                    building_id : "",
                    user_id : "",
                },

                building_list: false,
                floor_list: false,
                room_list: false,
                bed_list: false,
            }
        },

        methods:{

            vacant(page=1){
                axios.get(`/api/vacant?page=${page}`)
                .then(response => {
                    this.allbeds = response.data.info
                })
            },

            occupied(page=1){
                axios.get(`/api/occupied?page=${page}`)
                .then(response => {
                    this.allbeds = response.data.info
                })
            },

            bedSearch(page=1){
                axios.get(`/api/bedSearch?page=${page}&building_id=${this.beds.building_id}&floor_id=${this.beds.floor_id}&room_id=${this.beds.room_id}&name=${this.beds.name}`)
                .then(response => {
                    this.allbeds = response.data.info
                })
            },

            index(page=1){
                axios.get(`/api/bedPaginate?page=${page}&search=${this.search}`)
                .then(response => {
                    this.allbeds = response.data.info
                })
            },

            bed(){
                axios.get('/api/beds')
                .then(response => {
                    this.bedsSearch = response.data.info;
                })
            },

            room(){
                axios.get('/api/rooms')
                .then(response => {
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

            store(){
                this.beds.user_id = this.auth_id;
                axios.post('/api/beds',this.beds)
                .then(response => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Creating successfully'
                    })

                    window.location.reload();
                })
            },

            user(){
                axios.get(`/api/get_auth_user/${this.auth_id}`)
                .then(response => {
                    // console.log(response.data.info);
                    this.auth_user = response.data.user;
                    this.role = response.data.role;
                    this.permissions = response.data.permissions;

                    //console.log(response);
                    this.checkPermission();
                });


            },

            checkPermission(){

                this.permissions.forEach((item) => {

                    //console.log(item);

                    if(item.name == 'building-list'){
                        this.building_list = true;
                    }

                    if(item.name == 'floor-list'){
                        this.floor_list = true;
                    }

                    if(item.name == 'room-list'){
                        this.room_list = true;
                    }

                    if(item.name == 'bed-list'){
                        this.bed_list = true;
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
                        axios.delete(`/api/beds/${id}`)
                        .then(response => {
                            this.index();
                            Swal.fire({ title: 'Deleted!',icon: 'success', })
                        })
                    }
                    window.location.reload();
                })
            },
        },

        created(){
            this.index();
            this.bed();
            this.room();
            this.floor();
            this.building();
            this.user();
        }
    }
</script>
