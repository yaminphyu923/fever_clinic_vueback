<template>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6 mb-3">
                <h3 class="text-center"><b>Monitoring</b></h3>
            </div>
        </div>

        <form @submit.prevent="update">
            <div class="row">
                <!-- <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Patient ID(NRC)</b></label>
                        <div class="col-sm-8">

                            <Select2 v-model="monitoring.patient_id" :options="patients" :settings="{ settingOption: patients.text, settingOption: patients.text }"/>
                        </div>
                    </div>
                </div> -->
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>PR</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="pr" id="pr" v-model="monitoring.pr" class="form-control" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>CRT</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="crt" id="crt" v-model="monitoring.crt" class="form-control" autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Emergency</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="emergency" id="emergency" v-model="monitoring.emergency" class="form-control" autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>T</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="t" id="t" v-model="monitoring.t" class="form-control" autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>SPO2</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="spo2" id="spo2" v-model="monitoring.spo2" class="form-control" autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>RBS</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="rbs" id="rbs" v-model="monitoring.rbs" class="form-control" autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>GCS</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="gcs" id="gcs" v-model="monitoring.gcs" class="form-control" autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Pupil</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="pupil" id="pupil" v-model="monitoring.pupil" class="form-control" autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>BP</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="bp" id="bp" v-model="monitoring.bp" class="form-control" autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Urine Output</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="urine" id="urine" v-model="monitoring.urine" class="form-control" autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Date</b></label>
                        <div class="col-sm-8">
                            <input type="datetime-local" name="date" id="date" v-model="monitoring.date" class="form-control" autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>TX</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="tx" id="tx" v-model="monitoring.tx" class="form-control" autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Pain Score</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="pain_score" id="pain_score" v-model="monitoring.pain_score" class="form-control" autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="col-sm-2 offset-sm-10">
                    <button type="submit" class="btn btn-md btn-success">Update</button>
                </div>

            </div>
        </form>
    </div>
</template>

<script>

    import Select2 from 'v-select2-component';

    export default {
        name: 'EditMonitoringComponent',

        props: ['auth_id'],

        components: {Select2},

        data(){
            return {
                id: "",

                hospital_id: "",

                date: "",
                monitoring: {
                    patient_id: "",
                    pr: "",
                    crt: "",
                    emergency: "",
                    t: "",
                    spo2: "",
                    rbs: "",
                    gcs: "",
                    pupil: "",
                    bp: "",
                    urine: "",
                    date: "",
                    tx: "",
                    pain_score: "",
                    user_id: "",
                },
                patients: [],
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

            edit(){
                axios.get(`/api/edit-monitoring/${this.id}/${this.date}`)
                .then(response => {
                    console.log(response.data.info);
                    this.monitoring = response.data.info;

                })
            },


            update(){
                this.monitoring.patient_id = this.id;
                this.monitoring.user_id = this.auth_id;
                axios.put(`/api/monitorings/${this.monitoring.id}`,this.monitoring)
                .then(response => {
                     Toast.fire({
                        icon: 'success',
                        title: 'Updating successfully'
                    })
                })
            }
        },

        created(){
            var full_url = document.URL;
            var url_array = full_url.split('/');
            var id = url_array[url_array.length-3];
            var hospital_id = url_array[url_array.length-2];
            var date = url_array[url_array.length-1];
            this.id = id;
            this.hospital_id = hospital_id;
            this.date = date;
            this.patient();
            this.edit();
        }
    }
</script>
