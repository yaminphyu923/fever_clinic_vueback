<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-10 offset-sm-1">
                <h4>Patient Name - <b><span class="text-danger">{{patients.name}}</span></b></h4>
            </div>

            <div class="col-sm-12 mt-2">
                <a href="/"><button class="btn btn-md btn-primary"><b>◀ Back</b></button></a>
                <!-- <a href="/"><button class="btn btn-md btn-primary"><b>🖨 Print this Patient</b></button></a>
                <a href="/"><button class="btn btn-md btn-primary"><b>📁 Export PDF</b></button></a> -->
                <a :href="'/new-patient/'+patients.id"><button class="btn btn-md btn-primary"><b>➕ Create New Medical History</b></button></a>
                <!-- <a href="/"><button class="btn btn-md btn-primary"><b>📝 Edit Patient</b></button></a> -->
            </div>

            <div class="col-sm-12 my-5">
                <h4><b>Patient Information</b></h4>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Name</th>
                                <th>NRC</th>
                                <th>Phone</th>
                                <th>Gender</th>
                                <th>Age</th>
                                <th>Address</th>
                                <th>Next of Kin</th>
                                <th>Attendent</th>
                                <th>Occupation</th>
                                <th>Symptoms</th>
                                <th>Travel History</th>
                                <th>Remark</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{formatDate(patients.date)}}</td>
                                <td>{{patients.name}}</td>
                                <td>{{patients.nrc}}</td>
                                <td>{{patients.phone}}</td>
                                <td>{{patients.gender}}</td>
                                <td>{{patients.age}}</td>
                                <td>{{patients.address}}</td>
                                <td>{{patients.nextKin}}</td>
                                <td>{{patients.attendent}}</td>
                                <td>{{patients.occupation}}</td>
                                <td>{{patients.symptoms}}</td>
                                <td>{{patients.travelHistory}}</td>
                                <td>{{patients.remark}}</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-danger" @click="destroy(id)">🗑</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-sm-12">
                <h4><b>Hospital Information</b></h4>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Hospital ID</th>
                                <th>Patient ID</th>
                                <th>Admission No</th>
                                <th>Police Case</th>
                                <th>Doctors with Multiple Choice</th>
                                <th>Incharge Doctor</th>
                                <!-- <th>Created</th> -->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="hospital in hospitals.data" :key="hospital.id">
                                <td>{{formatDate(hospital.date)}}</td>
                                <td>{{hospital.id}}</td>
                                <td>{{hospital.patient_id}}</td>
                                <td>{{hospital.admission}}</td>
                                <td>{{hospital.police_case}}</td>
                                <td>{{hospital.doctor_multiple_id}}</td>
                                <td>{{hospital.doctor_incharge_id}}</td>
                                <!-- <td>{{formatDay(hospital.created_at)}}</td> -->
                                <td>
                                    <a :href="'/edit-patient/' + hospital.patient_id + '/' +hospital.id + '/' + formatDay(hospital.created_at)"><button class="btn btn-sm btn-outline-warning" data-toggle="tooltip" title="Detail">👁</button></a>
                                    <button class="btn btn-sm btn-outline-danger" data-toggle="tooltip" title="Delete" @click="allDestroy(hospital.id)">🗑</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <pagination :data="hospitals" @pagination-change-page="detailPatientHospital"></pagination>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        name: 'DetailPatientComponent',

        data(){
            return {
                patients : {},

                hospitals: {},

                search: "",

                id: "",
            }
        },

        methods: {
            edit(){
                axios.get(`/api/patients/${this.id}`)
                .then(response => {
                    console.log(response.data.info);
                    this.patients = response.data.info;
                })
            },

            detailPatientHospital(page=1){
                axios.get(`/api/detailPatientHospital/${this.id}?page=${page}`)
                .then(response => {
                    this.hospitals = response.data.info;
                })
            },

            formatDate(date) {
                return moment(date).format('DD-MMM-YYYY h:mm a');
            },

            formatDay(date){
                return moment(date).format('YYYY-MM-DD');
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
                        axios.delete(`/api/patients/${id}`)
                        .then(response => {
                            this.index();
                            Swal.fire({ title: 'Deleted!',icon: 'success', })
                        })
                    }
                   window.location.href = "/";
                })
            },

            allDestroy(id){
                Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Delete'
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios.delete(`/api/hospitals/${id}`)
                        .then(response => {
                            this.index();
                            Swal.fire({ title: 'Deleted!',icon: 'success', })
                        })
                    }
                   window.location.reload();
                })
            }

        },
        created(){
            var full_url = document.URL;
            var url_array = full_url.split('/');
            var id = url_array[url_array.length-1];
            this.id = id;

            this.edit();

            this.detailPatientHospital();
        }
    }
</script>
