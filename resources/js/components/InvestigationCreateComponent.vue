<template>
    <div class="container mt-3">
        <div class="row justify-content-between">
            <div class="col-md-12">
                <h4><b>Investigation</b></h4>

                <div class="jumbotron">
                    <p>Lab Test#</p>


                    <form action="">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="" class="col-sm-4"><b>Patient ID(NRC)</b></label>
                                    <div class="col-sm-8">
                                        <Select2 v-model="investigation.patient_id" :options="patients" :settings="{ settingOption: patients.text, settingOption: patients.text }"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="" class="col-sm-4"><b>Pathologist</b></label>
                                    <div class="col-sm-8">
                                        <Select2 v-model="investigation.doctor_id" :options="doctors" :settings="{ settingOption: doctors.text, settingOption: doctors.text }"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="" class="col-sm-4"><b>Date Requested</b></label>
                                    <div class="col-sm-8">
                                        <input type="datetime-local" v-model="investigation.date_requested" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="" class="col-sm-4"><b>Date of Analysis</b></label>
                                    <div class="col-sm-8">
                                        <input type="datetime-local" v-model="investigation.date_analysis" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="" class="col-sm-6"><b>Doctor who requested the test</b></label>
                                    <div class="col-sm-6">
                                        <input type="text" v-model="investigation.doctor_test" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="" class="col-sm-4"><b>Queue</b></label>
                                    <div class="col-sm-8">
                                        <input type="text" v-model="investigation.queue" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="" class="col-sm-4"><b>Image</b></label>
                                    <div class="col-sm-8">
                                        <input type="file" class="form-control" v-on:change="onImageChange">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="" class="col-sm-5"><b>Examination Request</b></label>
                                    <div class="col-sm-7">
                                        <textarea v-model="investigation.exam_request" cols="30" rows="2" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="" class="col-sm-4"><b>Brief Clinical Note</b></label>
                                    <div class="col-sm-8">
                                        <textarea v-model="investigation.note" cols="30" rows="2" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <h5><b>Lab Test Cases</b></h5>
                            </div>

                            <div class="col-sm-5 offset-sm-7">
                                <div class="form-group row">
                                    <label for="" class="col-sm-4"><b>Choose</b></label>
                                    <div class="col-sm-8">
                                        <select name="" id="" v-model="choose" class="form-control">
                                            <option value="all">All</option>
                                            <option v-for="group in groups" :key="group.id" :value="group.id">{{group.name}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group row" v-for="lab in labs.data" :key="lab.id">
                                    <label for="" class="col-sm-1"><b>Value</b></label>
                                    <div class="col-sm-2">
                                        <input type="text" v-model="investigation.value" class="form-control">
                                    </div>

                                    <label for="" class="col-sm-1"><b>Remark</b></label>
                                    <div class="col-sm-2">
                                        <input type="text" v-model="investigation.remark" class="form-control">
                                    </div>

                                    <div class="col-sm-6 table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Unit</th>
                                                    <th>Normal Range</th>
                                                    <th>Group</th>
                                                    <th>Category</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <td><input type="hidden" v-model="lab.lab_name">{{lab.name}}</td>
                                                    <td><input type="hidden" v-model="lab.lab_unit">{{lab.unit}}</td>
                                                    <td><input type="hidden" v-model="lab.lab_range">{{lab.range}}</td>
                                                    <td><input type="hidden" v-model="lab.group_id">{{(lab.group != null) ? lab.group.name:"-"}}</td>
                                                    <td><input type="hidden" v-model="lab.labcategory_id">{{(lab.labCategory != null) ? lab.labCategory.name:"-"}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <pagination :data="labs" @pagination-change-page="lab"></pagination>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import Select2 from 'v-select2-component';

    export default {
       name : 'InvestigationCreateComponent',

        components: {Select2},

        props: ['auth_id'],
       data(){
           return {

               patients: [],

               doctors: [],

               groups: {},

               choose: "",

            //    labs: [{
            //         id: 'value0',
            //         label: 'Value',
            //         value: '',
            //    }],

                labs: {},

               investigation: {
                   patient_id: "",
                   doctor_id: "",
                   date_requested: "",
                   date_analysis: "",
                   doctor_test: "",
                   queue: "",
                   image: "",
                   exam_request: "",
                   note: "",
                   value: [],
                   remark: [],
                   lab_name: [],
                   lab_unit: [],
                   lab_range: [],
                   group_id: [],
                   labcategory_id: [],
                   user_id: "",
               }
           }
       },

       methods:{
           onImageChange(e) {
                this.investigation.image = e.target.files[0];
            },

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

            group(){
                axios.get('/api/groups')
                .then(response => {
                    this.groups = response.data.info;
                    // console.log(this.groups);
                })
            },

            lab(page=1){
                axios.get(`/api/labs_paginate?page=${page}`)
                .then(response => {
                    this.labs = response.data.info;
                })
            }
       },

        created(){
            this.patient();
            this.doctor();
            this.group();
            this.lab();
        }
    }
</script>
