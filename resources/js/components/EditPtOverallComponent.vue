<template>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6 mb-3">
                <h3 class="text-center"><b>Pt Overall Performance</b></h3>
            </div>
        </div>

        <form @submit.prevent="update">
            <div class="row" v-for="(pt,index) in ptoverall" :key="pt.id">
                <!-- <div class="col-sm-12">
                    <div class="form-group row">
                        <label for="" class="col-sm-3"><b>Patient ID(NRC)</b></label>
                        <div class="col-sm-4">

                            <Select2 v-model="ptoverall.patient_id" :options="patients" :settings="{ settingOption: patients.text, settingOption: patients.text }"/>
                        </div>
                    </div>
                </div> -->
                <div class="col-sm-12">
                    <div class="form-group row" v-if="index == 0">
                        <label for="" class="col-sm-3"><b>Date</b></label>
                        <div class="col-sm-4">
                            <input type="date" name="date" id="date" v-model="pt.date" class="form-control" autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="col-sm-8">
                    <div class="form-group row">
                        <label for="" class="col-sm-5"><b>Text</b></label>
                        <div class="col-sm-5">
                            <input type="text" name="text" v-model="pt.text" class="form-control" autocomplete="off">
                        </div>
                    </div>
                </div>
                <!-- <div class="col-sm-4">
                    <div class="col-sm-3 d-flex justify-content-end">
                        <button type="button" class="btn btn-primary mr-1" @click="plus">➕</button>
                        <button type="button" class="btn btn-primary" @click="minus">➖</button>
                    </div>
                </div> -->
            </div>

            <div class="col-sm-2 offset-sm-5">
                <!-- <button type="reset" class="btn btn-md btn-warning">Cancel</button> -->
                <button type="submit" class="btn btn-md btn-success">Update</button>
            </div>
        </form>
    </div>
</template>

<script>

    import Select2 from 'v-select2-component';

    export default {
        name: 'EditPtOverallComponent',

        props: ['auth_id'],

        components: {Select2},

        data(){
            return {
                id: "",

                hospital_id: "",

                date: "",
                ptoverall: {
                    patient_id: "",
                    date: "",
                    text: [],
                    user_id: "",
                },
                patients: [],

                counter: 0,

                inputs: [{
                    id: 'text0',
                    label: 'Text',
                    value: '',
                }],
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

            plus(){
                this.inputs.push({
                    id : `text${++this.counter}`,
                    label : "Text",
                    value : "",
                })
            },

            minus(){
                this.inputs.pop({
                    id : `text${--this.counter}`,
                    label : "Text",
                    value : "",
                })
            },

            edit(){
                axios.get(`/api/edit-ptoverall/${this.id}/${this.date}`)
                .then(response => {
                    console.log(response.data.info);
                    this.ptoverall = response.data.info;

                })
            },

            update(){
                axios.post(`/api/ptoverall-update/`,this.ptoverall)
                .then(response => {
                    console.log(response.data.info);
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
