<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4><b>Doctors List</b></h4>
                <a href="/"><button class="btn btn-md btn-primary">Home</button></a>
                <button class="btn btn-md btn-primary" data-toggle="modal" data-target="#addDoctor">Add Doctor</button>
                <a href="/specialities"><button class="btn btn-md btn-primary">Speciality Record</button></a>
                <a href="/degrees"><button class="btn btn-md btn-primary">Degree Record</button></a>
            </div>


            <div class="col-md-12">
                <div class="modal fade" id="addDoctor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Adding Doctor</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form @submit="store">

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Doctor Name:</b></label>

                                        <div class="col-sm-8">
                                            <input type="text" name="name" v-model="doctors.name" class="form-control" id="name">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Phone:</b></label>

                                        <div class="col-sm-8">
                                            <input type="text" name="phone" v-model="doctors.phone" class="form-control" id="phone">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Degree:</b></label>

                                        <div class="col-sm-8">
                                            <select name="degree" id="degree" v-model="doctors.degree" class="form-control">
                                                <option v-for="degree in degrees" :key="degree.id" :value="degree.id">{{degree.name}}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Speciality:</b></label>

                                        <div class="col-sm-8">
                                            <select name="speciality" id="speciality" v-model="doctors.speciality" class="form-control">
                                                <option v-for="speciality in specialities" :key="speciality.id" :value="speciality.id">{{speciality.name}}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-3">
                <div class="table-responsive">
                    <table class="datatable table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Degree</th>
                                <th>Speciality</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="(alldoctor,index) in alldoctors" :key="alldoctor.id">
                                <td>{{index+1}}</td>
                                <td>{{alldoctor.name}}</td>
                                <td>{{alldoctor.phone}}</td>
                                <td>{{alldoctor.degree}}</td>
                                <td>{{alldoctor.speciality}}</td>
                                <td>
                                    <a href=""><button class="btn btn-sm btn-warning">Edit</button></a>

                                    <a href=""><button class="btn btn-sm btn-danger">Delete</button></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'DoctorComponent',

        data(){
            return {
                alldoctors: "hello",
                degrees: {},
                specialities: {},
                doctors:{
                    name: "",
                    phone: "",
                    degree: "",
                    speciality: "",
                }
            }
        },

        methods:{
            index(){
                axios.get('/api/degrees')
                .then(response => {
                    // console.log(response.data.info);
                    this.degrees = response.data.info;
                }),

                axios.get('/api/specialities')
                .then(response => {
                    // console.log(response.data.info);
                    this.specialities = response.data.info;
                }),

                axios.get('/api/doctors')
                .then(response => {
                    // console.log(response.data.info);
                    this.alldoctors = response.data.info;
                })
            },

            store(){
                axios.post('/api/createDoctors',this.doctors)
                .then(response => {
                    this.index();
                })
            }
        },

        created(){
            this.index();
        }
    }
</script>
