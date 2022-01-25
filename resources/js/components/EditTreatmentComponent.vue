<template>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6 mb-3">
                <h3 class="text-center"><b>Treatment</b></h3>
            </div>
        </div>

        <form @submit.prevent="update">
            <div class="row">
                <!-- <div class="col-sm-12">
                    <div class="form-group row">
                        <label for="" class="col-sm-2"><b>Patient ID(NRC)</b></label>
                        <div class="col-sm-8">
                            <Select2 v-model="treatments.patient_id" :options="patients" :settings="{ settingOption: patients.text, settingOption: patients.text }"/>
                        </div>
                    </div>
                </div> -->

                <div class="col-sm-12" v-for="(treatment,index) in treatments" :key="index">
                    <div class="form-group row" v-if="index == 0">
                        <label for="" class="col-sm-2"><b>Quick Note</b></label>
                        <div class="col-sm-8">
                            <textarea name="note" id="note" cols="30" rows="3" v-model="treatment.note" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-sm-8 offset-sm-2">
                    <button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#addTreatment">Add Detail Treatment</button>
                </div>

                <div class="modal fade" id="addTreatment" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Create: Treament</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="row" v-for="(treatment,index) in treatments" :key="index">
                                        <div class="col-sm-6">
                                            <div class="form-group row" v-if="index == 0">
                                                <label for="physician" class="col-sm-4"><b>Physician</b></label>
                                                <div class="col-sm-7 se">
                                                    <!-- <select name="physician" id="physician" v-model="treatments.doctor_id" class="form-control">
                                                        <option v-for="doctor in doctors" :key="doctor.id" :value="doctor.id">{{doctor.name}}</option>
                                                    </select> -->
                                                    <Select2 v-model="treatment.doctor_id" :options="doctors" :settings="{ settingOption: doctors.text, settingOption: doctors.text }"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group row" v-if="index == 0">
                                                <label for="" class="col-sm-4"><b>Pharmacy:</b></label>

                                                <div class="col-sm-7">
                                                    <input type="text" name="pharmacy" v-model="treatment.pharmacy" class="form-control" id="pharmacy">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group row" v-if="index == 0">
                                                <label for="" class="col-sm-4"><b>Prescription Date:</b></label>

                                                <div class="col-sm-7">
                                                    <input type="datetime-local" name="pre_date" v-model="treatment.pre_date" class="form-control" id="pre_date">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group row" v-if="index == 0">
                                                <label for="" class="col-sm-4"><b>Queue:</b></label>

                                                <div class="col-sm-7">
                                                    <input type="text" name="queue" v-model="treatment.queue" class="form-control" id="queue">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <ul class="nav nav-tabs" role="tablist" style="margin-bottom: 30px;">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#preLine">Prescription Lines</a>
                                                </li>
                                            </ul>

                                            <div class="tab-content">
                                                <div class="tab-pane active" id="preLine">
                                                    <div class="row" v-for="(treatment,index) in treatments" :key="index">
                                                        <div class="col-sm-6">
                                                            <div class="form-group row">
                                                                <label for="drug0" class="col-sm-4"><b>Drug</b></label>
                                                                <div class="col-sm-7 se">
                                                                    <!-- <select name="drug" :id="input.id" v-model="input.value" class="form-control">
                                                                        <option v-for="medicalList in medicalLists" :key="medicalList.id" :value="medicalList.id">{{medicalList.name}}</option>
                                                                    </select> -->

                                                                     <Select2 v-model="treatment.medical_list_id" :options="medicalLists" :settings="{ settingOption: medicalLists.text, settingOption: medicalLists.text }"/>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!--  v-for="(input,index) in inputs" :key="index" -->

                                                        <div class="col-sm-6">
                                                            <div class="form-group row">
                                                                <label for="" class="col-sm-4"><b>Dose:</b></label>

                                                                <div class="col-sm-7">
                                                                    <input type="text" name="dose" v-model="treatment.dose" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group row">
                                                                <label for="" class="col-sm-4"><b>Frequency:</b></label>

                                                                <div class="col-sm-7">
                                                                    <input type="text" name="frequency" v-model="treatment.frequency" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group row">
                                                                <label for="" class="col-sm-4"><b>Starting Date:</b></label>

                                                                <div class="col-sm-7">
                                                                    <input type="datetime-local" name="start_date" v-model="treatment.start_date" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group row">
                                                                <label for="" class="col-sm-4"><b>Ending Date:</b></label>
                                                                <!--  :id="treatment.id" -->
                                                                <div class="col-sm-7">
                                                                    <input type="datetime-local" name="end_date" v-model="treatment.end_date" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group row">
                                                                <label for="" class="col-sm-4"><b>Remark</b></label>

                                                                <div class="col-sm-7">
                                                                    <textarea name="remark" v-model="treatment.remark" cols="30" rows="2" class="form-control"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- <div class="row">
                                                        <div class="col-sm-11 d-flex justify-content-end">
                                                            <button type="button" class="btn btn-primary mr-1" @click="plus">➕</button>
                                                            <button type="button" class="btn btn-primary" @click="minus">➖</button>
                                                        </div>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- <input type="text" name="user_id" v-model="degrees.user_id" class="form-control" id="user_id" value="{{auth()->user()->id}}"> -->


                            </div>

                            <div class="modal-footer mt-3 col-sm-11">
                                <button type="button" class="btn btn-secondary btn-md" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success btn-md">Update</button>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- <div class="col-sm-2 offset-sm-4">
                    <button type="reset" class="btn btn-md btn-warning">Cancel</button>
                    <button type="submit" class="btn btn-md btn-success">Save</button>
                </div> -->

            </div>
        </form>
    </div>
</template>

<script>
    import Select2 from 'v-select2-component';
    export default {
        name: 'EditTreatmentComponent',

        components: {Select2},

        props: ['auth_id'],

        data(){
            return {
                id: "",

                hospital_id: "",

                date: "",
                treatments: {
                    patient_id: "",
                    note: "",
                    doctor_id: "",
                    pharmacy: "",
                    pre_date: "",
                    queue: "",
                    medical_list_id: [],
                    dose: [],
                    frequency: [],
                    start_date: [],
                    end_date: [],
                    remark: [],
                    user_id: "",
                    medicine_id : [],
                },

                patients: [],

                doctors: [],

                medicalLists: [],

                counter: 0,

                inputs: [{
                    id: 'drug0',
                    label: 'Drug',
                    value: '',

                    id1: 'dose0',
                    label1: 'Dose',
                    value1: '',

                    id2: 'frequency0',
                    label2: 'Frequency',
                    value2: '',

                    id3: 'start0',
                    label3: 'Start Date',
                    value3: '',

                    id4: 'end0',
                    label4: 'End Date',
                    value4: '',

                    id5: 'remark0',
                    label5: 'Remark',
                    value5: '',
                }],

                // doses: [{
                //     id: 'dose0',
                //     label: 'Dose',
                //     value: '',
                // }],

                // frequency: [{
                //     id: 'frequency0',
                //     label: 'Frequency',
                //     value: '',
                // }],

                // startDates: [{
                //     id: 'start0',
                //     label: 'Start Date',
                //     value: '',
                // }],

                // endDates: [{
                //     id: 'end0',
                //     label: 'End Date',
                //     value: '',
                // }],

                // remarks: [{
                //     id: 'remark0',
                //     label: 'Remark',
                //     value: '',
                // }]
            }
        },
        methods: {
             patient(){
                axios.get('/api/patientData')
                .then(response => {
                    this.patients = response.data;
                })
            },

            doctor(){
                axios.get('/api/doctorData')
                .then(response => {
                    this.doctors = response.data;
                })
            },

            medicalList(){
                axios.get('/api/medicalListData')
                .then(response =>{
                    // console.log(response.data);
                    this.medicalLists = response.data;
                })
            },

            plus(){

                this.inputs.push({
                    id: `drug${++this.counter}`,
                    label: 'Drug',
                    value: '',

                    id1: `dose${++this.counter}`,
                    label1: 'Dose',
                    value1: '',

                    id2: `frequency${++this.counter}`,
                    label2: 'Frequency',
                    value2: '',

                    id3: `start${++this.counter}`,
                    label3: 'Start Date',
                    value3: '',

                    id4: `end${++this.counter}`,
                    label4: 'End Date',
                    value4: '',

                    id5: `remark${++this.counter}`,
                    label5: 'Remark',
                    value5: '',
                });

                // this.doses.push({
                //     id: `dose${++this.counter}`,
                //     label: 'Dose',
                //     value: '',
                // });

                // this.frequency.push({
                //     id: `frequency${++this.counter}`,
                //     label: 'Frequency',
                //     value: '',
                // }),

                // this.startDates.push({
                //     id: `start${++this.counter}`,
                //     label: 'Start Date',
                //     value: '',
                // }),

                // this.endDates.push({
                //     id: `end${++this.counter}`,
                //     label: 'End Date',
                //     value: '',
                // }),

                // this.remarks.push({
                //     id: `remark${++this.counter}`,
                //     label: 'Remark',
                //     value: '',
                // })

                // this.addings += 1;
                // this.treatments.medical_list_id.put({ value: '' });
                // console.log(this.addings);
            },

            minus(){
                this.inputs.pop({
                    id: `drug${--this.counter}`,
                    label: 'Drug',
                    value: '',

                    id1: `dose${--this.counter}`,
                    label1: 'Dose',
                    value1: '',

                    id2: `frequency${--this.counter}`,
                    label2: 'Frequency',
                    value2: '',

                    id3: `start${--this.counter}`,
                    label3: 'Start Date',
                    value3: '',

                    id4: `end${--this.counter}`,
                    label4: 'End Date',
                    value4: '',

                    id5: `remark${--this.counter}`,
                    label5: 'Remark',
                    value5: '',
                })
            },

            edit(){
                axios.get(`/api/edit-treatment/${this.id}/${this.date}`)
                .then(response => {
                    console.log(response.data.info);
                    this.treatments = response.data.info;
                })
            },

            update(){
                axios.post(`/api/treatment-update/`,this.treatments)
                .then(response => {

                    console.log(response.data);
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
            this.doctor();
            this.medicalList();

            this.edit();
        }
    }
</script>
