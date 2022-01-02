<template>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6">
                <h3 class="text-center"><b>Imaging</b></h3>
                <h5 class="ml-3">Lab Test/News</h5>
            </div>
        </div>
        <div class="row">
            <form @submit.prevent="store">
                <div class="col-sm-12 mt-2">
                    <button type="reset" class="btn btn-md btn-danger"><b>Cancel</b></button>
                    <button type="submit" class="btn btn-md btn-success"><b>Save</b></button>
                </div>

                <!-- <input type="file" class="form-control" v-on:change="onImageChange"> -->

                <!-- https://www.codecheef.org/article/laravel-vue-js-image-upload-using-image-intervention -->

                <!-- https://www.positronx.io/laravel-vue-js-file-image-upload-example-tutorial/ -->

                <div class="col-sm-12">
                    <div class="card my-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Patient ID(NRC)</b></label>
                                        <div class="col-sm-8">
                                            <!-- <select v-model="images.patient_id" class="form-control choice">
                                                <option v-for="patient in patients" :key="patient.id" v-bind:value="patient.id">{{patient.name}} ({{patient.nrc}})</option>
                                            </select> -->

                                            <Select2 v-model="images.patient_id" :options="patientData" :settings="{ settingOption: patientData.text, settingOption: patientData.text }"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Doctor who requested the test</b></label>
                                        <div class="col-sm-8">
                                            <!-- <select name="doctor_id" id="doctor_id" v-model="images.doctor_id" class="form-control">
                                                <option v-for="doctor in doctors" :key="doctor.id" :value="doctor.id">{{doctor.name}}</option>
                                            </select> -->

                                            <Select2 v-model="images.doctor_id" :options="doctors" :settings="{ settingOption: doctors.text, settingOption: doctors.text }"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Date Requested:</b></label>
                                        <div class="col-sm-8">
                                            <input type="datetime-local" name="date_requested" id="date_requested" v-model="images.date_requested" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Date of Analysis:</b></label>
                                        <div class="col-sm-8">
                                            <input type="datetime-local" name="date_analysis" id="date_analysis" v-model="images.date_analysis" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <ul class="nav nav-tabs" role="tablist" style="margin-bottom: 30px;">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#images">Images</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#information">Information</a>
                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        <div class="tab-pane active" id="images">
                                           <div class="row">
                                               <div class="col-sm-6">
                                                    <div class="form-group row">
                                                        <label for="" class="col-sm-4"><b>Image1</b></label>
                                                        <div class="col-sm-8">
                                                            <input type="file" name="image1" id="image1" class="form-control" v-on:change="onImageOneChange">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group row">
                                                        <label for="" class="col-sm-4"><b>Image2</b></label>
                                                        <div class="col-sm-8">
                                                            <input type="file" name="image2" id="image2" class="form-control" v-on:change="onImageTwoChange">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group row">
                                                        <label for="" class="col-sm-4"><b>Image3</b></label>
                                                        <div class="col-sm-8">
                                                            <input type="file" name="image3" id="image3" class="form-control" v-on:change="onImageThreeChange">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group row">
                                                        <label for="" class="col-sm-4"><b>Image4</b></label>
                                                        <div class="col-sm-8">
                                                            <input type="file" name="image4" id="image4" class="form-control" v-on:change="onImageFourChange">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group row">
                                                        <label for="" class="col-sm-4"><b>Image5</b></label>
                                                        <div class="col-sm-8">
                                                            <input type="file" name="image5" id="image5" class="form-control" v-on:change="onImageFiveChange">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group row">
                                                        <label for="" class="col-sm-4"><b>Image6</b></label>
                                                        <div class="col-sm-8">
                                                            <input type="file" name="image6" id="image6" class="form-control" v-on:change="onImageSixChange">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="information">
                                            <div class="col-sm-12">
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-2"><b>Analysis</b></label>
                                                    <div class="col-sm-8">
                                                        <textarea name="analysis" id="analysis" cols="30" rows="3" v-model="images.analysis" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-2"><b>Conclusion</b></label>
                                                    <div class="col-sm-8">
                                                        <textarea name="conclusion" id="conclusion" cols="30" rows="3" v-model="images.conclusion" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</template>

<script>
    import Select2 from 'v-select2-component';
    export default {

        name: 'ImagingCreateComponent',

        // ready: function(){
        //     $('.choice').select2();
        // },

        props: ['auth_id'],
        components: {Select2},
        data(){
            return {
                images:{
                    patient_id: "",
                    doctor_id: "",
                    date_requested: "",
                    date_analysis: "",
                    image1: "",
                    image2: "",
                    image3: "",
                    image4: "",
                    image5: "",
                    image6: "",
                    analysis: "",
                    conclusion: "",
                    user_id: "",
                },

                patients: [],

                doctors: [],

                patientData: [],

                // result: "",

                //  myOptions: ['op1', 'op2', 'op3'],
            }
        },

        methods: {
            onImageOneChange(e) {
                this.images.image1 = e.target.files[0];
            },

            onImageTwoChange(e) {
                this.images.image2 = e.target.files[0];
            },

            onImageThreeChange(e) {
                this.images.image3 = e.target.files[0];
            },

            onImageFourChange(e) {
                this.images.image4 = e.target.files[0];
            },

            onImageFiveChange(e) {
                this.images.image5 = e.target.files[0];
            },

            onImageSixChange(e) {
                this.images.image6 = e.target.files[0];
            },

            patient(){
                axios.get('/api/patients')
                .then(response => {
                    this.patients = response.data.info;
                })
            },

            patientDatas(){
                axios.get('/api/patientData')
                .then(response => {
                    this.patientData = response.data;
                    // console.log(this.patientData);
                })
            },

            doctor(){
                axios.get('/api/doctorData')
                .then(response => {
                    this.doctors = response.data;
                })
            },

            // onPatientChange(e){
            //     console.log(e.target.value);
            // },

            store(){
                const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }

                let formData = new FormData();

                formData.append('patient_id', this.images.patient_id);
                formData.append('doctor_id', this.images.doctor_id);
                formData.append('date_requested', this.images.date_requested);
                formData.append('date_analysis', this.images.date_analysis);
                formData.append('image1', this.images.image1);
                formData.append('image2', this.images.image2);
                formData.append('image3', this.images.image3);
                formData.append('image4', this.images.image4);
                formData.append('image5', this.images.image5);
                formData.append('image6', this.images.image6);
                formData.append('analysis', this.images.analysis);
                formData.append('conclusion', this.images.conclusion);

                this.images.user_id = this.auth_id;
                formData.append('user_id', this.images.user_id);
                // console.log(this.images.image1);

                axios.post('/api/imagings',formData,config)
                .then(response => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Creating successfully',
                    })
                })
            },

            // myChangeEvent(val){
            //     console.log(val);
            // },
            // mySelectEvent({id, text}){
            //     console.log({id, text})
            // }
        },

        created(){
            this.patient();
            this.doctor();
            this.patientDatas();
        }
    }
</script>
