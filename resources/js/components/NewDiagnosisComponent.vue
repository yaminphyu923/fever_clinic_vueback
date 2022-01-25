<template>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6 mb-3">
                <h3 class="text-center"><b>Diagnosis</b></h3>
            </div>
        </div>

        <form @submit.prevent="store">
            <div class="row">
                <!-- <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Patient ID(NRC)</b></label>
                        <div class="col-sm-8">

                            <Select2 v-model="diagnosis.patient_id" :options="patients" :settings="{ settingOption: patients.text, settingOption: patients.text }"/>
                        </div>
                    </div>
                </div> -->
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Diagnosis</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="diagnosis" id="diagnosis" v-model="diagnosis.diagnosis" class="form-control" autocomplete="off">
                        </div>
                    </div>
                </div>
                <!-- <div class="col-sm-6">
                    <div class="form-group row">
                        <div class="col-sm-8">
                            <input type="text" name="dia" id="dia" v-model="diagnosis.dia" class="form-control">
                        </div>
                    </div>
                </div> -->

                <div class="col-sm-12">
                    <div class="form-group row">
                        <label for=""><b>Information on Diagnosis</b></label>
                        <textarea name="" id="" v-model="diagnosis.information" cols="30" rows="3" class="form-control"></textarea>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group row">
                        <label for=""><b>Treatment Plan</b></label>
                        <textarea name="" id="" v-model="diagnosis.treatment" cols="30" rows="3" class="form-control"></textarea>
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
        name: 'NewDiagnosisComponent',

        props: ['auth_id'],

        components: {Select2},

        data(){
            return {
                id: "",
                diagnosis: {
                    patient_id: "",
                    diagnosis: "",
                    dia: "",
                    information: "",
                    treatment: "",
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


            store(){
                this.diagnosis.patient_id = this.id;
                this.diagnosis.user_id = this.auth_id;
                axios.post('/api/diagnoses',this.diagnosis)
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
        }
    }
</script>
