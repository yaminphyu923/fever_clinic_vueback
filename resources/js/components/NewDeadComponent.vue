<template>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6 mb-3">
                <h3 class="text-center"><b>Dead</b></h3>
            </div>
        </div>

        <form @submit.prevent="store">
            <div class="row">
                <!-- <div class="col-sm-12">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Patient ID(NRC)</b></label>
                        <div class="col-sm-8">

                            <Select2 v-model="dead.patient_id" :options="patients" :settings="{ settingOption: patients.text, settingOption: patients.text }"/>
                        </div>
                    </div>
                </div> -->

                <div class="col-sm-12">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Dead Time</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="dead_time" id="dead_time" v-model="dead.dead_time" class="form-control" autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Cause</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="cause" id="cause" v-model="dead.cause" class="form-control" autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group row">
                        <label for="physician" class="col-sm-4"><b>Confirm By</b></label>
                        <div class="col-sm-7">
                            <Select2 v-model="dead.doctor_id" :options="doctors" :settings="{ settingOption: doctors.text, settingOption: doctors.text }"/>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Note</b></label>
                        <div class="col-sm-8">
                            <textarea name="note" id="note" v-model="dead.note" cols="30" rows="1" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-sm-2 offset-sm-10">
                    <button type="reset" class="btn btn-md btn-warning">Cancel</button>
                    <button type="submit" class="btn btn-md btn-success">Save</button>
                </div>

            </div>
        </form>
    </div>
</template>

<script>

    import Select2 from 'v-select2-component';

    export default {
        name: 'NewDeadComponent',

        props: ['auth_id'],

        components: {Select2},

        data(){
            return {
                id: "",
                dead: {
                    patient_id: "",
                    dead_time: "",
                    cause: "",
                    doctor_id: "",
                    note: "",
                    user_id: "",
                },
                patients: [],

                doctors: [],
            }
        },
        methods: {
             patient(){
                axios.get('/api/patientData')
                .then(response => {
                    this.patients = response.data;
                    // console.log(this.patients);
                })
            },

            doctor(){
                axios.get('/api/doctorData')
                .then(response => {
                    this.doctors = response.data;
                })
            },


            store(){
                this.dead.patient_id = this.id;
                this.dead.user_id = this.auth_id;
                axios.post('/api/deads',this.dead)
                .then(response => {
                     Toast.fire({
                        icon: 'success',
                        title: 'Creating successfully'
                    })
                })
            }
        },

        created(){
            var full_url = document.URL;
            var url_array = full_url.split('/');
            var id = url_array[url_array.length-1];
            this.id = id;
            this.patient();
            this.doctor();
        }
    }
</script>
