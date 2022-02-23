<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h4><b>Doctor Duty List</b></h4>
            </div>
            <div class="col-md-6">

                <a href="/"><button class="btn btn-md btn-primary">Back</button></a>

                <a href="/hrDuty"><button class="btn btn-md btn-primary" v-if="doctorduty_create">HR Duty Roaster</button></a>
                <a href="/time"><button class="btn btn-md btn-primary" v-if="time_list">Time</button></a>

            </div>

            <div class="col-sm-7 mt-3">
                <form @submit.prevent="doctorDuty" method="GET">

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
            <div class="col-sm-4 mt-3">
                <button type="button" class="btn btn-md btn-primary" @click="sortByDate">Sort By Date</button>
                <button type="button" class="btn btn-md btn-primary" @click="sortByLatestUpdate">Sort By Latest Update</button>
            </div>

            <div class="col-sm-1 text-right mt-3">
                <button class="btn btn-md btn-primary" data-toggle="modal" data-target="#addDoctor" v-if="doctorduty_create">Add</button>
            </div>

            <div class="col-md-12">
                <div class="modal fade" name="addDoctor" id="addDoctor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Adding Doctor Duty</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form @submit.prevent="store">

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Date:</b></label>

                                        <div class="col-sm-8">
                                            <input type="date" name="name" v-model="duties.date" class="form-control" id="name" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Time:</b></label>

                                        <div class="col-sm-8 se">
                                            <Select2 v-model="duties.time_id" :options="alltimes" :settings="{ settingOption: alltimes.text, settingOption: alltimes.text }"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Choose Doctor:</b></label>

                                        <div class="col-sm-8 se">
                                            <Select2 v-model="duties.doctor_id" :options="doctors" :settings="{ settingOption: doctors.text, settingOption: doctors.text }"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Note:</b></label>

                                        <div class="col-sm-8">
                                            <textarea name="note" cols="30" rows="2" class="form-control" v-model="duties.note"></textarea>
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
                    <div class="col-sm-3 offset-sm-9 mb-3">
                        <form @submit.prevent="doctorDuty">
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
                                <th>Doctor</th>
                                <th>Note</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="(doctor_duty,index) in doctor_duties.data" :key="doctor_duty.id">
                                <td>{{index+1}}</td>
                                <td>{{doctor_duty.date}}</td>
                                <td>{{(doctor_duty.time != null)? doctor_duty.time.time: '-'}}</td>
                                <td>{{(doctor_duty.doctor != null)?doctor_duty.doctor.name:'-'}}</td>
                                <td>{{doctor_duty.note}}</td>
                                <td>
                                    <a :href="'/doctor_duties/'+doctor_duty.id"><button class="btn btn-sm btn-warning" v-if="doctorduty_edit">Edit</button></a>

                                    <button class="btn btn-sm btn-danger" @click="destroy(doctor_duty.id)" v-if="doctorduty_delete">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <pagination :data="doctor_duties" @pagination-change-page="doctorDuty"></pagination>
            </div>
        </div>
    </div>
</template>

<script>

    import Select2 from 'v-select2-component';

    export default {
        name: 'DutyRoasterComponent',

        props: ['auth_id'],

        components: {Select2},

        data(){
            return {
                alltimes: [],
                doctors: [],
                doctor_duties: {},
                duties:{
                    date: "",
                    time_id: "",
                    doctor_id: "",
                    note: "",
                    user_id: "",
                },

                search: "",

                start_date : "",

                end_date : "",

                // showModal: true,
                doctorduty_create : "",
                doctorduty_edit : "",
                doctorduty_delete : "",
                time_list : "",
            }
        },

        methods:{

            // searchDoctor(){
            //     axios.get('/api/doctors_paginate?search=' + this.search)
            //     axios.get(`/api/doctors_paginate?search=${this.search}`)
            //     .then(response => {
            //         this.alldoctors = response.data.info;
            //     })
            // },

            doctorDuty(page=1){
                axios.get(`/api/doctorDutyPaginate?page=${page}&start_date=${this.start_date}&end_date=${this.end_date}`)
                .then(response => {
                    // console.log(response.data.info);
                    this.doctor_duties = response.data.info;
                })
            },

            sortByDate(){
                axios.get('/api/doctor_duties')
                .then(response => {
                    this.doctor_duties = response.data.info;
                })
            },

            sortByLatestUpdate(){
                axios.get('/api/sortByLatestDoctor')
                .then(response => {
                    this.doctor_duties = response.data.info;
                })
            },

            time(){
                axios.get('/api/timeData')
                .then(response => {
                    //console.log(response.data);
                    this.alltimes = response.data;
                })
            },

            doctor(){
                axios.get('/api/doctorData')
                .then(response => {
                    this.doctors = response.data;
                })
            },

            store(){

                this.duties.user_id = this.auth_id;
                axios.post('/api/doctor_duties',this.duties)
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
                        axios.delete(`/api/doctor_duties/${id}`)
                        .then(response => {
                            this.index();
                            Swal.fire({ title: 'Deleted!',icon: 'success', })
                        })
                    }
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

                    if(item.name == 'doctor_duty-create'){
                        this.doctorduty_create = true;
                    }

                    if(item.name == 'doctor_duty-edit'){
                        this.doctorduty_edit = true;
                    }

                    if(item.name == 'doctor_duty-delete'){
                        this.doctorduty_delete = true;
                    }

                    if(item.name == 'time-list'){
                        this.time_list = true;
                    }


                });
            },
        },

        created(){
            this.time();
            this.doctor();
            this.user();
            this.doctorDuty();
        }
    }
</script>
