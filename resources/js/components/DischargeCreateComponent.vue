<template>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6 mb-3">
                <h3 class="text-center"><b>Discharge</b></h3>
            </div>
        </div>

        <form @submit.prevent="store">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group row">
                        <label for="" class="col-sm-3"><b>Patient ID(NRC)</b></label>
                        <div class="col-sm-4">

                            <Select2 v-model="discharge.patient_id" :options="patients" :settings="{ settingOption: patients.text, settingOption: patients.text }"/>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group row">
                        <label for="" class="col-sm-3"><b>Discharge Time</b></label>
                        <div class="col-sm-4">
                            <input type="datetime-local" name="time" id="time" v-model="discharge.time" class="form-control" autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group row">
                        <label for="" class="col-sm-3"><b>Place</b></label>
                        <div class="col-sm-4">
                            <select name="" id="" v-model="discharge.place" class="form-control">
                                <option value="OPD">OPD</option>
                                <option value="Admission">Admission</option>
                                <option value="DC">DC</option>
                                <option value="DR">DR</option>
                                <option value="Abscond">Abscond</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group row">
                        <label for="" class="col-sm-3"><b>OPD</b></label>
                        <div class="col-sm-4">
                            <input type="text" name="opd" id="opd" v-model="discharge.opd" class="form-control" autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group row">
                        <label for="" class="col-sm-3"><b>Admission</b></label>
                        <div class="col-sm-4">
                            <input type="text" name="admission" id="admission" v-model="discharge.admission" class="form-control" autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group row">
                        <label for="" class="col-sm-3"><b>Refer To</b></label>
                        <div class="col-sm-4">
                            <textarea name="refer_to" id="refer_to" v-model="discharge.refer_to" cols="30" rows="1" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group row">
                        <label for="" class="col-sm-3"><b>PR</b></label>
                        <div class="col-sm-3">
                            <input type="text" name="pr" id="pr" v-model="discharge.pr" class="form-control" autocomplete="off">
                        </div>
                        <div class="col-sm-1">
                            <label for="">/min</label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group row">
                        <label for="" class="col-sm-3"><b>SPO2</b></label>
                        <div class="col-sm-3">
                            <input type="text" name="spo2" id="spo2" v-model="discharge.spo2" class="form-control" autocomplete="off">
                        </div>
                        <div class="col-sm-1">
                            <label for="">%</label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group row">
                        <label for="" class="col-sm-3"><b>BP</b></label>
                        <div class="col-sm-3">
                            <input type="text" name="bp" id="bp" v-model="discharge.bp" class="form-control" autocomplete="off">
                        </div>
                        <div class="col-sm-1">
                            <label for="">mmHg</label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group row">
                        <label for="" class="col-sm-3"><b>GCS</b></label>
                        <div class="col-sm-4">
                            <input type="text" name="gcs" id="gcs" v-model="discharge.gcs" class="form-control" autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 offset-sm-3">
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
        name: 'DischargeCreateComponent',

        props: ['auth_id'],

        components: {Select2},

        data(){
            return {
                discharge: {
                    patient_id: "",
                    time: "",
                    place: "",
                    opd: "",
                    admission: "",
                    refer_to: "",
                    pr: "",
                    spo2: "",
                    bp: "",
                    gcs: "",
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
                this.discharge.user_id = this.auth_id;
                axios.post('/api/discharges',this.discharge)
                .then(response => {
                     Toast.fire({
                        icon: 'success',
                        title: 'Creating successfully'
                    })
                })
            }
        },

        created(){
            this.patient();
        }
    }
</script>
