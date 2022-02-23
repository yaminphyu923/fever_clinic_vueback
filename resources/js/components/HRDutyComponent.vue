<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h4><b>HR Duty List</b></h4>
            </div>
            <div class="col-md-6">

                <a href="/duty"><button class="btn btn-md btn-primary">Doctor Duty List</button></a>

            </div>

            <div class="col-sm-6 text-right">
                <button class="btn btn-md btn-primary" data-toggle="modal" data-target="#addHR" v-if="hrduty_create">Add</button>
            </div>

            <div class="col-md-12">
                <div class="modal fade" name="addDoctor" id="addHR" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Adding HR Duty</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form @submit.prevent="store">

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Date:</b></label>

                                        <div class="col-sm-8">
                                            <input type="date" name="name" v-model="hr_duties.date" class="form-control" id="name" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Time:</b></label>

                                        <div class="col-sm-8 se">
                                            <Select2 v-model="hr_duties.time_id" :options="alltimes" :settings="{ settingOption: alltimes.text, settingOption: alltimes.text }"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Choose HR:</b></label>

                                        <div class="col-sm-8 se">
                                            <Select2 v-model="hr_duties.h_r_management_id" :options="allhrs" :settings="{ settingOption: allhrs.text, settingOption: allhrs.text }"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Note:</b></label>

                                        <div class="col-sm-8">
                                            <textarea name="note" cols="30" rows="2" class="form-control" v-model="hr_duties.note"></textarea>
                                        </div>
                                    </div>

                                    <div class="text-right">
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
                    <div class="col-sm-8">
                        <form @submit.prevent="hrDuty" method="GET">

                            <div class="form-group row">
                                <label for="" class="col-sm-1 col-md-2">From Date</label>
                                <div class="col-sm-2 col-md-3">
                                    <input type="date" name="start_date" class="form-control" v-model="start_date">
                                </div>
                                <label for="" class="col-sm-1 col-md-2">End Date</label>
                                <div class="col-sm-2 col-md-3">
                                    <input type="date" name="end_date" class="form-control" v-model="end_date">
                                </div>

                                <button type="submit" class="btn btn-sm btn-success col-sm-1 col-md-2">🔍 Search</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-md btn-primary" @click="sortByDate">Sort By Date</button>
                        <a href="#"><button type="button" class="btn btn-md btn-primary" @click="sortByLatestUpdate">Sort By Latest Update</button></a>
                    </div>
                    <div class="col-sm-3 offset-sm-9 mb-3">
                        <form @submit.prevent="searchHrDuty">
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
                                <th>Date</th>
                                <th>Time</th>
                                <th>HR</th>
                                <th>Note</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="(hr_duty,index) in hr_duties.data" :key="hr_duty.id">
                                <td>{{index+1}}</td>
                                <td>{{hr_duty.date}}</td>
                                <td>{{(hr_duty.time != null)? hr_duty.time.time: '-'}}</td>
                                <td>{{(hr_duty.hr_management != null)?hr_duty.hr_management.name:'-'}}</td>
                                <td>{{hr_duty.note}}</td>
                                <td>
                                    <a :href="'/hr_duties/'+hr_duty.id"><button class="btn btn-sm btn-warning" v-if="hrduty_edit">Edit</button></a>

                                    <button class="btn btn-sm btn-danger" @click="destroy(hr_duty.id)" v-if="hrduty_delete">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <pagination :data="hr_duties" @pagination-change-page="hrDuty"></pagination>
            </div>
        </div>
    </div>
</template>

<script>
    import Select2 from 'v-select2-component';
    export default {
        name: 'HRDutyComponent',

        props: ['auth_id'],

        components: {Select2},

        data(){
            return {
                alltimes: [],
                allhrs: [],

                search : "",

                start_date : "",

                end_date : "",

                hr_duties: {
                    date: "",
                    time_id: "",
                    h_r_management_id: "",
                    note: "",
                    user_id: "",
                },

                hrduty_create : "",
                hrduty_edit : "",
                hrduty_delete : "",
            }
        },

        methods: {
            time(){
                axios.get('/api/timeData')
                .then(response => {
                    //console.log(response.data);
                    this.alltimes = response.data;
                })
            },

            sortByDate(){
                axios.get('/api/hr_duties')
                .then(response => {
                    this.hr_duties = response.data.info;
                })
            },

            sortByLatestUpdate(){
                axios.get('/api/sortByLatestUpdate')
                .then(response => {
                    this.hr_duties = response.data.info;
                })
            },


            hr(){
                axios.get('/api/hrsData')
                .then(response => {
                    this.allhrs = response.data;
                })
            },

            hrDuty(page=1){
                axios.get(`/api/hrDutyPaginate?page=${page}&start_date=${this.start_date}&end_date=${this.end_date}`)
                    .then(response => {
                        //console.log(response.data.info);
                        this.hr_duties = response.data.info;
                    })
            },

            searchHrDuty(page=1){
                axios.get(`/api/hrDutyPaginate?page=${page}&search=${this.search}`)
                    .then(response => {
                        //console.log(response.data.info);
                        this.hr_duties = response.data.info;
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

                    if(item.name == 'hr_duty-create'){
                        this.hrduty_create = true;
                    }

                    if(item.name == 'hr_duty-edit'){
                        this.hrduty_edit = true;
                    }

                    if(item.name == 'hr_duty-delete'){
                        this.hrduty_delete = true;
                    }


                });
            },

            store(){

                this.hr_duties.user_id = this.auth_id;
                axios.post('/api/hr_duties',this.hr_duties)
                .then(response => {

                    Toast.fire({
                        icon: 'success',
                        title: 'Creating successfully'
                    })

                     window.location.reload();
                })
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
                        axios.delete(`/api/hr_duties/${id}`)
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
            this.time();
            this.user();
            this.hr();
            this.hrDuty();
        }
    }
</script>
