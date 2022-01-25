<template>
    <div class="container mt-3">
        <div class="row justify-content-between">
            <div class="col-md-12">
                <h4><b>Investigation</b></h4>

                <div class="jumbotron">
                    <p>Lab Test#</p>


                    <form @submit.prevent="update">
                        <div class="row" v-for="(investigation,index) in investigations" :key="index">

                            <div class="col-sm-6">
                                <div class="form-group row" v-if="index == 0">
                                    <label for="" class="col-sm-4"><b>Pathologist</b></label>
                                    <div class="col-sm-8">
                                        <Select2 v-model="investigation.doctor_id" :options="doctors" :settings="{ settingOption: doctors.text, settingOption: doctors.text }"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group row" v-if="index == 0">
                                    <label for="" class="col-sm-4"><b>Date Requested</b></label>
                                    <div class="col-sm-8">
                                        <input type="datetime-local" v-model="investigation.date_requested" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group row" v-if="index == 0">
                                    <label for="" class="col-sm-4"><b>Date of Analysis</b></label>
                                    <div class="col-sm-8">
                                        <input type="datetime-local" v-model="investigation.date_analysis" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group row" v-if="index == 0">
                                    <label for="" class="col-sm-6"><b>Doctor who requested the test</b></label>
                                    <div class="col-sm-6">
                                        <input type="text" v-model="investigation.doctor_test" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group row" v-if="index == 0">
                                    <label for="" class="col-sm-4"><b>Queue</b></label>
                                    <div class="col-sm-8">
                                        <input type="text" v-model="investigation.queue" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group row" v-if="index == 0">
                                    <label for="" class="col-sm-4"><b>Image</b></label>
                                    <div class="col-sm-8">
                                        <input type="file" class="form-control" v-on:change="onImageChange">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group row" v-if="index == 0">
                                    <label for="" class="col-sm-5"><b>Examination Request</b></label>
                                    <div class="col-sm-7">
                                        <textarea v-model="investigation.exam_request" cols="30" rows="2" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group row" v-if="index == 0">
                                    <label for="" class="col-sm-4"><b>Brief Clinical Note</b></label>
                                    <div class="col-sm-8">
                                        <textarea v-model="investigation.note" cols="30" rows="2" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <h5><b>Lab Test Cases</b></h5>
                            </div>

                            <!-- <div class="col-sm-5 offset-sm-7">
                                <div class="form-group row">
                                    <label for="" class="col-sm-4"><b>Choose</b></label>
                                    <div class="col-sm-8">
                                        <select name="" id="" v-model="choose" class="form-control" v-on:change="choosing()">
                                            <option value="all">All</option>
                                            <option v-for="group in groups" :key="group.id" :value="group.id">{{group.name}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div> -->

                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label for="" class="col-sm-1"><b>Value</b></label>
                                    <div class="col-sm-2">
                                        <input type="text" name="value[]" :id="lab.id" v-model="investigation.value" class="form-control">
                                    </div>



                                    <label for="" class="col-sm-1"><b>Remark</b></label>
                                    <div class="col-sm-2">
                                        <input type="text" name="remark" v-model="investigation.remark" class="form-control">
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
                                                    <td><input type="hidden" v-model="investigation.lab_name">{{investigation.lab_name}}</td>
                                                    <td><input type="hidden" v-model="investigation.lab_unit">{{investigation.lab_unit}}</td>
                                                    <td><input type="hidden" v-model="investigation.lab_range">{{investigation.lab_range}}</td>
                                                    <td><input type="hidden" v-model="investigation.group_id">{{(investigation.group != null) ? investigation.group.name:"-"}}</td>
                                                    <td><input type="hidden" v-model="investigation.labcategory_id">{{(investigation.lab_category != null) ? investigation.lab_category.name:"-"}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- <pagination :data="investigations" @pagination-change-page="choosing"></pagination> -->
                            </div>


                        </div>

                        <div class="col-sm-2 offset-sm-10">
                            <button type="submit" class="btn btn-md btn-success btn-block"><b>Update</b></button>
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
       name : 'EditInvestigationComponent',

        components: {Select2},

        props: ['auth_id'],
       data(){
           return {
               id: "",

               hospital_id: "",

               date: "",

               patients: [],

               doctors: [],

               groups: {},

               choose: "",

            //    labs: [{
            //         id: 'value0',
            //         label: 'Value',
            //         value: '',
            //    }],

                all_labs: {},

               investigations: {
                   id: "",
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

           choosing(page=1) {
            //    console.log(this.choose);
                axios.get(`/api/labs_group?page=${page}&search=${this.choose}`)
                .then(response => {
                    this.all_labs = response.data.info;
                    // console.log(this.all_labs);
                })
            },

           onImageChange(e) {
               this.investigations.forEach((item)=> {
                   item.image = e.target.files[0];
                   //console.log(item.image);
               })
                // this.investigations.image = e.target.files[0];
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
            },

            edit(){
                axios.get(`/api/edit-investigation/${this.id}/${this.date}`)
                .then(response => {
                    // console.log(response.data.info);
                    this.investigations = response.data.info;

                })
            },

            update(){
                const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }

                // console.log(this.investigations[0]);

                // this.all_labs.data.forEach((lab)=>{
                //     this.investigation.lab_name.push(lab.name);
                //     this.investigation.lab_unit.push(lab.unit);
                //     this.investigation.lab_range.push(lab.range);
                //     this.investigation.group_id.push(lab.group_id);
                //     this.investigation.labcategory_id.push(lab.labcategory_id);
                // });

                this.investigations.forEach((item) => {
                    let formData = new FormData();
                    formData.append('patient_id', this.id);
                    formData.append('id', item.id);
                    formData.append('doctor_id', this.investigations[0].doctor_id);
                    formData.append('date_requested', this.investigations[0].date_requested);
                    formData.append('date_analysis', this.investigations[0].date_analysis);
                    formData.append('doctor_test', this.investigations[0].doctor_test);
                    formData.append('queue', this.investigations[0].queue);
                    formData.append('image', this.investigations[0].image);
                    formData.append('exam_request', this.investigations[0].exam_request);
                    formData.append('note', this.investigations[0].note);
                    formData.append('value', item.value);
                    formData.append('remark', item.remark);
                    formData.append('lab_name', item.lab_name);
                    formData.append('lab_unit', item.lab_unit);
                    formData.append('lab_range', item.lab_range);
                    formData.append('group_id', item.group_id);
                    formData.append('labcategory_id', item.labcategory_id);

                    item.user_id = this.auth_id;
                    formData.append('user_id', item.user_id);


                    axios.post(`/api/investigation-update/`,formData,config)
                    .then(response => {
                        console.log(response);
                        Toast.fire({
                            icon: 'success',
                            title: 'Updating successfully',
                        })
                    })

                })
            },
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
            this.group();
            this.choosing();
            this.edit();
        }
    }
</script>
