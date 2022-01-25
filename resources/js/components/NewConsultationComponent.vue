<template>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6 mb-3">
                <h3 class="text-center"><b>Consultation</b></h3>
            </div>
        </div>

        <form @submit.prevent="store">
            <div class="row">
                <!-- <div class="col-sm-12">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Patient ID(NRC)</b></label>
                        <div class="col-sm-8">

                            <Select2 v-model="consultation.patient_id" :options="patients" :settings="{ settingOption: patients.text, settingOption: patients.text }"/>
                        </div>
                    </div>
                </div> -->

                <div class="col-sm-12">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Consultation</b></label>
                        <div class="col-sm-8">
                            <select name="" id="" v-model="consultation.consultation" class="form-control">
                                <option value="Medical">Medical</option>
                                <option value="Surgical">Surgical</option>
                                <option value="OG">OG</option>
                                <option value="Child">Child</option>
                                <option value="ICU">ICU</option>
                                <option value="HDU">HDU</option>
                                <option value="ENT">ENT</option>
                                <option value="PNF">PNF</option>
                                <option value="eye">Eye</option>
                                <option value="Ca-Mu">Ca-Mu</option>
                                <option value="CSU">CSU</option>
                                <option value="Ortho">Ortho</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Consultation Note</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="note" id="note" v-model="consultation.note" class="form-control" autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="col-sm-2 offset-sm-10">
                    <button type="submit" class="btn btn-md btn-success">Save</button>
                </div>

            </div>
        </form>
    </div>
</template>

<script>

    import Select2 from 'v-select2-component';

    export default {
        name: 'NewConsultationComponent',

        props: ['auth_id'],

        components: {Select2},

        data(){
            return {
                id: "",
                consultation: {
                    patient_id: "",
                    consultation: "",
                    note: "",
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
                this.consultation.patient_id = this.id;
                this.consultation.user_id = this.auth_id;
                axios.post('/api/consultations',this.consultation)
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
