<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <h4><b>Summary</b></h4>
            </div>

            <div class="col-md-6 col-sm-12 text-right">
                <a href="/bed"><button type="button" class="btn btn-md btn-primary">Back</button></a>
                <a href="/"><button type="button" class="btn btn-md btn-primary">Home</button></a>
            </div>

            <div class="col-sm-3 offset-sm-9 my-3">
                <form @submit.prevent="index">
                    <div class="input-group">
                        <input type="date" v-model="search" placeholder="Search Name..." class="form-control">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-sm btn-primary">🔎</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-12 mt-3">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Date</th>
                                <th>Building</th>
                                <th>Floor</th>
                                <th>Room</th>
                                <th>Bed</th>

                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="(summary,index) in summaries.data" :key="summary.id">
                                <td>{{index+1}}</td>
                                <td>{{formatDate(summary.date)}}</td>
                                <td>
                                    <div v-for="building in buildings" :key="'b'+building.id">
                                        {{(summary.bed.building_id == building.id) ? building.name : ""}}
                                    </div>

                                </td>
                                <td>
                                    <div v-for="floor in floors" :key="'f'+floor.id">
                                        {{(summary.bed.floor_id == floor.id ) ? floor.name : ''}}
                                    </div>
                                </td>
                                <td>
                                    <div v-for="room in rooms" :key="'r'+room.id">
                                        {{(summary.bed.room_id == room.id ) ? room.name : ''}}
                                    </div>
                                </td>
                                <td>{{(summary.bed != null) ? summary.bed.name : '-'}}</td>

                            </tr>
                        </tbody>
                    </table>
                </div>

                <pagination :data="summaries" @pagination-change-page="index"></pagination>
            </div>
        </div>
    </div>
</template>

<script>

    import Select2 from 'v-select2-component';

    export default {
        name: 'SummaryComponent',

        props: ['auth_id'],

        components: {Select2},

        data(){
            return {

                summaries: {},

                buildings: {},

                floors: {},

                rooms: {},

                search: "",

                building_list: false,
                floor_list: false,
                room_list: false,
                bed_list: false,
            }
        },

        methods:{

            formatDate(date) {
                return moment(date).format('DD-MMM-YYYY h:mm a');
            },

            index(page=1){
                axios.get(`/api/summaries?page=${page}&search=${this.search}`)
                .then(response => {
                    console.log(response.data.info);
                    this.summaries = response.data.info.summaries;
                    this.buildings = response.data.info.buildings;
                    this.floors = response.data.info.floors;
                    this.rooms = response.data.info.rooms;
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

        },

        created(){
            this.index();

            this.user();
        }
    }
</script>
