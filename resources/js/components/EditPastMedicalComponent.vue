<template>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6 mb-3">
                <h3 class="text-center"><b>Past Medical History</b></h3>
            </div>
        </div>

        <form @submit.prevent="update">
            <div class="row">
                <!-- <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Patient ID(NRC)</b></label>
                        <div class="col-sm-8">
                            <Select2 v-model="past_medicals.patient_id" :options="patients" :settings="{ settingOption: patients.text, settingOption: patients.text }"/>
                        </div>
                    </div>
                </div> -->
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>DM</b></label>
                        <div class="col-sm-8">
                            <textarea v-model="past_medicals.dm" cols="30" rows="1" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>H/T</b></label>
                        <div class="col-sm-8">
                            <textarea v-model="past_medicals.ht" cols="30" rows="1" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>IHD</b></label>
                        <div class="col-sm-8">
                            <textarea v-model="past_medicals.ihd" cols="30" rows="1" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Stroke </b></label>
                        <div class="col-sm-8">
                            <textarea v-model="past_medicals.stroke" cols="30" rows="1" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Renal Problem</b></label>
                        <div class="col-sm-8">
                            <textarea v-model="past_medicals.renal" cols="30" rows="1" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Liver Problem </b></label>
                        <div class="col-sm-8">
                            <textarea v-model="past_medicals.liver" cols="30" rows="1" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Bleeding History</b></label>
                        <div class="col-sm-8">
                            <textarea v-model="past_medicals.bleeding" cols="30" rows="1" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Comobidity</b></label>
                        <div class="col-sm-2">
                            <input type="checkbox" v-model="past_medicals.como"> Yes
                        </div>
                        <div class="col-sm-6">
                            <textarea v-model="past_medicals.comobidity" cols="30" rows="1" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <p class="text-danger">Comobidity ထဲ data ဖြည့်လျှင် Home Page မှ Patient List ထဲတွင် Comobidity စာသား ပေါ်နေမည်ဖြစ်သည်။</p>
                    <h5><b>Directed History</b></h5>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Past History </b></label>
                        <div class="col-sm-8">
                            <textarea v-model="past_medicals.past" cols="30" rows="1" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Drug History</b></label>
                        <div class="col-sm-8">
                            <textarea v-model="past_medicals.drug" cols="30" rows="1" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Drug Allergy </b></label>
                        <div class="col-sm-8">
                            <textarea v-model="past_medicals.drug_allergy" cols="30" rows="1" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Last Meal</b></label>
                        <div class="col-sm-8">
                            <textarea v-model="past_medicals.last_meal" cols="30" rows="1" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Smoking </b></label>
                        <div class="col-sm-8">
                            <textarea v-model="past_medicals.smoking" cols="30" rows="1" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Alcohol </b></label>
                        <div class="col-sm-8">
                            <textarea v-model="past_medicals.alcohol" cols="30" rows="1" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Pregnancy </b></label>
                        <div class="col-sm-8">
                            <textarea v-model="past_medicals.pregnancy" cols="30" rows="1" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Recent Drugs </b></label>
                        <div class="col-sm-8">
                            <textarea v-model="past_medicals.recent_drugs" cols="30" rows="1" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Regular Drugs </b></label>
                        <div class="col-sm-8">
                            <textarea v-model="past_medicals.regular_drugs" cols="30" rows="1" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Medication</b></label>
                        <div class="col-sm-8">
                            <textarea v-model="past_medicals.medication" cols="30" rows="1" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>System Enquery </b></label>
                        <div class="col-sm-8">
                            <textarea v-model="past_medicals.system_enquery" cols="30" rows="1" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Pre_hospital Treatment</b></label>
                        <div class="col-sm-8">
                            <textarea v-model="past_medicals.pre_hospital" cols="30" rows="1" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-sm-1 offset-sm-11">
                    <button type="submit" class="btn btn-success btn-lg">Update</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    import Select2 from 'v-select2-component';

    export default {
        name: 'EditPastMedicalComponent',

        props: ['auth_id'],

        components: {Select2},

        data(){
            return {
                id: "",

                date: "",

                past_medicals: {
                    patient_id : "",
                    dm: "",
                    ht: "",
                    ihd: "",
                    stroke: "",
                    renal: "",
                    liver: "",
                    bleeding: "",
                    como: "",
                    comobidity: "",
                    past: "",
                    drug: "",
                    drug_allergy: "",
                    last_meal: "",
                    smoking: "",
                    alcohol: "",
                    pregnancy: "",
                    recent_drugs: "",
                    regular_drugs: "",
                    medication: "",
                    system_enquery: "",
                    pre_hospital: "",
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

            edit(){
                axios.get(`/api/edit-pastmedical/${this.id}/${this.date}`)
                .then(response => {
                    this.past_medicals = response.data.info;
                })
            },

            update(){
                this.past_medicals.user_id = this.auth_id;
                axios.put(`/api/past_medicals/${this.past_medicals.id}`,this.past_medicals)
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
