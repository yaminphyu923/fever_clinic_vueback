<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <a href="/doctors" class="float-right"><button class="btn btn-md btn-danger">Back</button></a>
                <div class="card mt-5">
                    <div class="card-body">

                        <h4 class="text-center my-4">Edit Doctor</h4>

                        <form @submit.prevent="update">

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
                                    <select name="degree_id" id="degree" v-model="doctors.degree_id" class="form-control">
                                        <option v-for="degree in degrees" :key="degree.id" :value="degree.id">{{degree.name}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-4"><b>Speciality:</b></label>

                                <div class="col-sm-8">
                                    <select name="speciality_id" id="speciality" v-model="doctors.speciality_id" class="form-control">
                                        <option v-for="speciality in specialities" :key="speciality.id" :value="speciality.id">{{speciality.name}}</option>
                                    </select>
                                </div>
                            </div>

                            <!-- <input type="text" name="user_id" v-model="degrees.user_id" class="form-control" id="user_id" value="{{auth()->user()->id}}"> -->

                            <div class="col-sm-4 offset-sm-4">
                                <a href="/doctors"><button type="button" class="btn btn-danger">Back</button></a>
                                <button type="submit" class="btn btn-primary">Save</button>
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
        name: 'EditDoctorComponent',

        props: ['auth_id'],

        data(){
            return {
                id : "",
                degrees : {},
                specialities: {},
                doctors:{
                    id: "",
                    name: "",
                    phone: "",
                    degree_id: "",
                    speciality_id: "",
                    user_id: "",
                },

            }
        },

        methods:{
            index(){
                axios.get('/api/degrees')
                .then(response => {
                    this.degrees = response.data.info;
                })
                axios.get('/api/specialities')
                .then(response => {
                    this.specialities = response.data.info;
                })

            },
            edit(){
                axios.get(`/api/doctors/${this.id}`)
                .then(response => {
                    // console.log(response.data.info);
                    this.doctors = response.data.info;
                })
            },

            update(){
                this.doctors.user_id = this.auth_id;
                axios.put(`/api/doctors/${this.id}`,this.doctors)
                .then(response => {
                    this.edit();
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

            this.index();
            this.edit();
        }
    }
</script>
