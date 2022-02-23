<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-sm-12">
                <h4><b>Remain</b></h4>
            </div>

            <div class="col-md-3 col-sm-12">
                 <!-- <span class="text-danger"><b>Total Donation Amount - {{ Number(totalDonation).toLocaleString() }}</b></span> -->
            </div>

            <div class="col-md-6 col-sm-12 text-right">
                <a href="/donation"><button class="btn btn-md btn-primary">⏪ Back</button></a>
                <a href="/"><button class="btn btn-md btn-primary">🏠 Home</button></a>
            </div>

            <div class="col-md-12 mt-3">
                <div class="row">

                    <div class="col-sm-3 col-3 offset-sm-9 mb-3">
                        <form @submit.prevent="index">
                            <div class="input-group">
                                <input type="date" v-model="search" placeholder="Search Name..." class="form-control">

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
                                <th>Out Date</th>
                                <th>Remain</th>
                                <th>Withdraw</th>
                                <th>Note</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="(allremain,index) in allremains.data" :key="allremain.id">
                                <td>{{index+1}}</td>
                                <td>{{formatDate(allremain.date)}}</td>
                                <td>{{Number(allremain.remain).toLocaleString()}}</td>
                                <td>{{Number(allremain.withdraw).toLocaleString()}}</td>
                                <td>{{allremain.note}}</td>

                            </tr>
                        </tbody>
                    </table>
                </div>

                <pagination :data="allremains" @pagination-change-page="index"></pagination>
            </div>
        </div>
    </div>
</template>

<script>

    import Select2 from 'v-select2-component';

    export default {
        name: 'RemainComponent',

        props: ['auth_id'],

        components: {Select2},

        data(){
            return {

                allremains: {},

                search: "",

                building_list: false,
                floor_list: false,
                room_list: false,
                bed_list: false,
            }
        },

        methods:{

            index(page=1){
                axios.get(`/api/remainPaginate?page=${page}&search=${this.search}`)
                .then(response => {
                    console.log(response.data.info);
                    this.allremains = response.data.info
                })
            },

            formatDate(date) {
                return moment(date).format('DD-MMM-YYYY');
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
