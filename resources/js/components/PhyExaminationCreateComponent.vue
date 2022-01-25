<template>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6 my-3">
                <h5><b>Bedside Measurement</b></h5>
            </div>
        </div>

        <form @submit.prevent="store">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Patient ID(NRC)</b></label>
                        <div class="col-sm-8">
                            <Select2 v-model="phy_examinations.patient_id" :options="patients" :settings="{ settingOption: patients.text, settingOption: patients.text }"/>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Temperature</b></label>
                        <div class="col-sm-8">
                            <input type="text" v-model="phy_examinations.temperature" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>ECG</b></label>
                        <div class="col-sm-8">
                            <textarea cols="30" rows="1" v-model="phy_examinations.ecg" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>RBS</b></label>
                        <div class="col-sm-6">
                            <textarea cols="30" rows="1" v-model="phy_examinations.rbs" class="form-control"></textarea>
                        </div>
                        <label for="" class="col-sm-1">mg%</label>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>SPO2</b></label>
                        <div class="col-sm-8">
                            <input type="text" v-model="phy_examinations.spo2" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>BP</b></label>
                        <div class="col-sm-8">
                            <input type="text" v-model="phy_examinations.bp" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>PR</b></label>
                        <div class="col-sm-8">
                            <input type="text" v-model="phy_examinations.pr" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>RR</b></label>
                        <div class="col-sm-8">
                            <input type="text" v-model="phy_examinations.rr" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group row">
                        <label for="" class="col-sm-2"><b>Conscious Level</b></label>
                        <div class="col-sm-2">
                            <input type="checkbox" v-model="phy_examinations.well_orientated">
                            Well-orientated
                        </div>
                        <div class="col-sm-2">
                            <input type="checkbox" v-model="phy_examinations.pain">
                            Respond to Pain
                        </div>
                        <div class="col-sm-2">
                            <input type="checkbox" v-model="phy_examinations.voice">
                            Respond to Voice
                        </div>
                        <div class="col-sm-2">
                            <input type="checkbox" v-model="phy_examinations.no_response">
                            No Response
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>General </b></label>
                        <div class="col-sm-8">
                            <textarea cols="30" rows="1" v-model="phy_examinations.general" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Head & Neck </b></label>
                        <div class="col-sm-8">
                            <textarea cols="30" rows="1" v-model="phy_examinations.head_neck" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Chest</b></label>
                        <div class="col-sm-8">
                            <textarea cols="30" rows="1" v-model="phy_examinations.chest" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Abdomen & Pelvic</b></label>
                        <div class="col-sm-8">
                            <textarea cols="30" rows="1" v-model="phy_examinations.abdomen_pelvic" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Spine</b></label>
                        <div class="col-sm-8">
                            <textarea cols="30" rows="1" v-model="phy_examinations.spine" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group row">
                        <label for="" class="col-sm-2">Upper Limbs</label>
                        <label for="" class="col-sm-1">Right</label>
                        <div class="col-sm-2">
                            <textarea cols="30" rows="1" v-model="phy_examinations.upper_right" class="form-control"></textarea>
                        </div>
                        <label for="" class="col-sm-1">Left</label>
                        <div class="col-sm-2">
                            <textarea cols="30" rows="1" v-model="phy_examinations.upper_left" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group row">
                        <label for="" class="col-sm-2">Lower Limbs</label>
                        <label for="" class="col-sm-1">Right</label>
                        <div class="col-sm-2">
                            <textarea cols="30" rows="1" v-model="phy_examinations.lower_right" class="form-control"></textarea>
                        </div>
                        <label for="" class="col-sm-1">Left</label>
                        <div class="col-sm-2">
                            <textarea cols="30" rows="1" v-model="phy_examinations.lower_left" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Referred case</b></label>
                        <div class="col-sm-8">
                            <input type="text" v-model="phy_examinations.refer_case" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-5"><b>Other relevant findings</b></label>
                        <div class="col-sm-7">
                            <textarea cols="30" rows="1" v-model="phy_examinations.other" class="form-control"></textarea>
                        </div>
                    </div>
                </div>


                <div class="col-sm-1 offset-sm-11">
                    <button type="submit" class="btn btn-success btn-lg">Save</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    import Select2 from 'v-select2-component';

    export default {
        name: 'PhyExaminationCreateComponent',

        props: ['auth_id'],

        components: {Select2},

        data(){
            return {

                phy_examinations: {
                    patient_id : "",
                    temperature: "",
                    ecg: "",
                    rbs: "",
                    spo2: "",
                    bp: "",
                    pr: "",
                    rr: "",
                    well_orientated: "",
                    pain: "",
                    voice: "",
                    no_response: "",
                    general: "",
                    head_neck: "",
                    chest: "",
                    abdomen_pelvic: "",
                    spine: "",
                    upper_right: "",
                    upper_left: "",
                    lower_right: "",
                    lower_left: "",
                    refer_case: "",
                    other: "",
                    user_id: "",
                },

                patients : [],

                doctors: [],

                allpast_medicals: {},
            }
        },

        methods: {
            patient(){
                axios.get('/api/patientData')
                .then(response => {
                    this.patients = response.data;
                })
            },

            store(){
                this.phy_examinations.user_id = this.auth_id;
                axios.post('/api/phy_examinations',this.phy_examinations)
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
