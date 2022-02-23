<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-sm-12">
                <h4><b>Donation</b></h4>
            </div>

            <div class="col-md-3 col-sm-12">
                 <!-- <span class="text-danger"><b>Total Donation Amount - {{ Number(totalDonation).toLocaleString() }}</b></span> -->
            </div>

            <div class="col-md-6 col-sm-12 text-right">
                <button class="btn btn-md btn-primary" data-toggle="modal" data-target="#addExpense">➕ Add Expense</button>
                <a href="/donation"><button class="btn btn-md btn-primary">⏪ Back</button></a>
            </div>

            <div class="col-md-12">
                <div class="modal fade" name="addDoctor" id="addExpense" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Expense</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form @submit.prevent="store">

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 text-right"><b>Out Date:</b></label>

                                        <div class="col-sm-7">
                                            <input type="date" name="date" v-model="expenses.date" class="form-control" id="date" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 text-right"><b>Amount:</b></label>

                                        <div class="col-sm-7">
                                            <input type="text" name="name" v-model="expenses.amount" class="form-control" id="name" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 text-right"><b>Note:</b></label>

                                        <div class="col-sm-7">
                                            <textarea name="" id="" v-model="expenses.note" cols="30" rows="3" class="form-control"></textarea>
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
                        <form @submit.prevent="index" method="GET">

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
                        <!-- <form @submit.prevent="index">
                            <div class="input-group">
                                <input type="date" v-model="search" placeholder="Search Name..." class="form-control">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-sm btn-primary">🔎</button>
                                </div>
                            </div>
                        </form> -->
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Out Date</th>
                                <th>Amount</th>
                                <th>Note</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="(allexpense,index) in allexpenses.data" :key="allexpense.id">
                                <td>{{index+1}}</td>
                                <td>{{formatDate(allexpense.date)}}</td>
                                <td>{{allexpense.amount}}</td>
                                <td>{{allexpense.note}}</td>
                                <td>
                                    <!-- <a :href="'/donations/'+alldonation.id"><button class="btn btn-sm btn-warning">Edit</button></a> -->

                                    <button class="btn btn-sm btn-danger" @click="destroy(allexpense.id)">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <pagination :data="allexpenses" @pagination-change-page="index"></pagination>
            </div>
        </div>
    </div>
</template>

<script>

    import Select2 from 'v-select2-component';

    export default {
        name: 'ExpenseComponent',

        props: ['auth_id'],

        components: {Select2},

        data(){
            return {

                totalDonation : "",

                allexpenses: {},

                start_date : "",

                end_date : "",

                search: "",

                expenses: {
                    date : "",
                    amount : "",
                    note : "",
                    user_id : "",
                },

                building_list: false,
                floor_list: false,
                room_list: false,
                bed_list: false,
            }
        },

        methods:{

            total(){
                axios.get('/api/donations')
                .then(response => {
                    // console.log(response.data.info);
                    this.totalDonation = response.data.info;
                })
            },


            index(page=1){
                axios.get(`/api/expensePaginate?page=${page}&search=${this.search}&start_date=${this.start_date}&end_date=${this.end_date}`)
                .then(response => {
                    this.allexpenses = response.data.info
                })
            },

            formatDate(date) {
                return moment(date).format('DD-MMM-YYYY');
            },

            store(){
                this.expenses.user_id = this.auth_id;
                axios.post('/api/expenses',this.expenses)
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
                        axios.delete(`/api/expenses/${id}`)
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
            this.total();
            this.index();
            this.user();
        }
    }
</script>
