<template>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6 mb-3">
                <h3 class="text-center"><b>Pt Overall Performance</b></h3>
            </div>
        </div>

        <form @submit.prevent="store">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group row">
                        <label for="" class="col-sm-3"><b>Patient ID(NRC)</b></label>
                        <div class="col-sm-4">

                            <Select2 v-model="ptoverall.patient_id" :options="patients" :settings="{ settingOption: patients.text, settingOption: patients.text }"/>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group row">
                        <label for="" class="col-sm-3"><b>Date</b></label>
                        <div class="col-sm-4">
                            <input type="date" name="date" id="date" v-model="ptoverall.date" class="form-control" autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="col-sm-8" v-for="input in inputs" :key="input.id">
                    <div class="form-group row">
                        <label for="" class="col-sm-5"><b>Text</b></label>
                        <div class="col-sm-5">
                            <input type="text" name="text" :id="input.id" v-model="input.value" class="form-control" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="col-sm-3 d-flex justify-content-end">
                        <button type="button" class="btn btn-primary mr-1" @click="plus">➕</button>
                        <button type="button" class="btn btn-primary" @click="minus">➖</button>
                    </div>
                </div>

                <div class="col-sm-2 offset-sm-5">
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
        name: 'PtOverallCreateComponent',

        props: ['auth_id'],

        components: {Select2},

        data(){
            return {
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


            store(){
                this.inputs.forEach(item => {
                    this.ptoverall.text.push(item.value);
                });
                this.ptoverall.user_id = this.auth_id;
                axios.post('/api/pt_overalls',this.ptoverall)
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
