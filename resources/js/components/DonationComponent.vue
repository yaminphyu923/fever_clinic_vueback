<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <h4><b>Donation</b></h4>
            </div>

            <div class="col-md-6 col-sm-12 text-right">
                <button class="btn btn-md btn-primary" data-toggle="modal" data-target="#addDonation">➕ Add Donation</button>
                <a href="/expense"><button class="btn btn-md btn-primary">💸 Expense</button></a>
                <a href="/remain"><button class="btn btn-md btn-primary">📜 Remain</button></a>
                <a href="/"><button class="btn btn-md btn-primary">🏠 Home</button></a>
            </div>

            <div class="col-md-12">
                <div class="modal fade" name="addDoctor" id="addDonation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Donation</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form @submit.prevent="store">

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 text-right"><b>Date:</b></label>

                                        <div class="col-sm-7">
                                            <input type="date" name="date" v-model="donations.date" class="form-control" id="date" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 text-right"><b>Name:</b></label>

                                        <div class="col-sm-7">
                                            <input type="text" name="name" v-model="donations.name" class="form-control" id="name" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 text-right"><b>Donated Price:</b></label>

                                        <div class="col-sm-7">
                                            <input type="text" name="price" v-model="donations.price" class="form-control" id="price" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 text-right"><b>Donated Item:</b></label>

                                        <div class="col-sm-7">
                                            <input type="text" name="item" v-model="donations.item" class="form-control" id="item" autocomplete="off">
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
                    <div class="col-sm-9 col-9">
                        <form @submit.prevent="donationSearchDate" method="GET">

                            <div class="form-group row">
                                <label for="" class="col-sm-2 text-right">From Date</label>
                                <div class="col-sm-2">
                                    <input type="date" name="start_date" class="form-control" v-model="start_date">
                                </div>
                                <label for="" class="col-sm-2 text-right">End Date</label>
                                <div class="col-sm-2">
                                    <input type="date" name="end_date" class="form-control" v-model="end_date">
                                </div>

                                <button type="submit" class="btn btn-sm btn-success col-sm-2">🔍 Search</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-3 col-3 mb-3">
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
                                <th>Date</th>
                                <th>Name</th>
                                <th>Donated Price</th>
                                <th>Donated Item</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="(alldonation,index) in alldonations.data" :key="alldonation.id">
                                <td>{{index+1}}</td>
                                <td>{{formatDate(alldonation.date)}}</td>
                                <td>{{alldonation.name}}</td>
                                <td>{{alldonation.price}}</td>
                                <td>{{alldonation.item}}</td>
                                <td>
                                    <!-- <a :href="'/donations/'+alldonation.id"><button class="btn btn-sm btn-warning">Edit</button></a> -->

                                    <button class="btn btn-sm btn-danger" @click="destroy(alldonation.id)">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <pagination :data="alldonations" @pagination-change-page="index"></pagination>
            </div>
        </div>
    </div>
</template>

<script>

    import Select2 from 'v-select2-component';

    export default {
        name: 'DonationComponent',

        props: ['auth_id'],

        components: {Select2},

        data(){
            return {

                alldonations: {},

                start_date : "",

                end_date : "",

                search: "",

                donations: {
                    date : "",
                    name : "",
                    price : "",
                    item : "",
                    user_id : "",
                },

                building_list: false,
                floor_list: false,
                room_list: false,
                bed_list: false,
            }
        },

        methods:{

            donationSearchDate(page=1){
                axios.get(`/api/donationPaginate?page=${page}&start_date=${this.start_date}&end_date=${this.end_date}`)
                .then(response => {
                    // console.log(response.data.info);
                    this.alldonations = response.data.info;
                })
            },

            formatDate(date) {
                return moment(date).format('DD-MMM-YYYY');
            },

            index(page=1){
                axios.get(`/api/donationPaginate?page=${page}&search=${this.search}`)
                .then(response => {
                    this.alldonations = response.data.info
                })
            },

            store(){
                this.donations.user_id = this.auth_id;
                axios.post('/api/donations',this.donations)
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
                        axios.delete(`/api/donations/${id}`)
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
            this.user();
        }
    }
</script>
