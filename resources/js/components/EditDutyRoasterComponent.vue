<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <a href="/" class="float-right"><button class="btn btn-md btn-danger">Home</button></a>
                <div class="card mt-5">
                    <div class="card-body">

                        <h4 class="text-center my-4">Edit Doctor duty</h4>

                        <form @submit.prevent="update">

                            <div class="form-group row">
                                <label for="" class="col-sm-4"><b>Date:</b></label>

                                <div class="col-sm-8">
                                    <input type="date" name="name" v-model="duties.date" class="form-control" id="name" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-4"><b>Time:</b></label>

                                <div class="col-sm-8">
                                    <Select2 v-model="duties.time_id" :options="alltimes" :settings="{ settingOption: alltimes.text, settingOption: alltimes.text }"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-4"><b>Choose Doctor:</b></label>

                                <div class="col-sm-8">
                                    <Select2 v-model="duties.doctor_id" :options="doctors" :settings="{ settingOption: doctors.text, settingOption: doctors.text }"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-4"><b>Note:</b></label>

                                <div class="col-sm-8">
                                    <textarea name="note" cols="30" rows="2" class="form-control" v-model="duties.note"></textarea>
                                </div>
                            </div>

                            <div class="col-sm-4 offset-sm-4">
                                <a href="/duty"><button type="button" class="btn btn-danger">Back</button></a>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import Select2 from 'v-select2-component';
    export default {
        name: 'EditDutyRoasterComponent',

        props: ['auth_id'],

        components: {Select2},

        data(){
            return {
                id: "",
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
            }
        },

        methods:{
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
            edit(){
                axios.get(`/api/doctor_duties/${this.id}`)
                .then(response => {
                    // console.log(response.data.info);
                    this.duties = response.data.info;
                })
            },

            update(){
                this.duties.user_id = this.auth_id;
                axios.put(`/api/doctor_duties/${this.id}`,this.duties)
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

            this.time();
            this.doctor();
            this.edit();
        }
    }
</script>
