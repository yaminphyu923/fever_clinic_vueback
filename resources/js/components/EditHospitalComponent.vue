<template>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6 mb-3">
                <h3 class="text-center"><b>Edit Hospital</b></h3>
            </div>
        </div>

        <form @submit.prevent="update">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Patient ID(NRC)</b></label>
                        <div class="col-sm-8">

                            <Select2 v-model="hospitals.patient_id" :options="patients" :settings="{ settingOption: patients.text, settingOption: patients.text }"/>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Date Time</b></label>
                        <div class="col-sm-8">
                            <input type="datetime-local" name="date" id="date" v-model="hospitals.date" class="form-control" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Admission No</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="admission" id="admission" v-model="hospitals.admission" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Bed</b></label>
                        <div class="col-sm-8">
                            <Select2 v-model="hospitals.bed_id" :options="beds" :settings="{ settingOption: beds.text + beds.room_name, settingOption: beds.text + beds.room_name }"/>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>MultipleDoctorChoice</b></label>
                        <div class="col-sm-8">
                            <Select2 v-model="hospitals.doctor_multiple_id" :options="doctors" :settings="{ settingOption: doctors.text, settingOption: doctors.text }"/>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Incharge Doctor</b></label>
                        <div class="col-sm-8">
                            <Select2 v-model="hospitals.doctor_incharge_id" :options="doctors" :settings="{ settingOption: doctors.text, settingOption: doctors.text }"/>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-6"><b>Police Case:</b></label>
                        <div class="col-sm-6">
                            <label for="yes_police_case">
                                <input type="radio" name="police_case" id="yes_police_case" v-model="hospitals.police_case" value="Yes">
                                Yes
                            </label>

                            <label for="no_police_case">
                                <input type="radio" name="police_case" id="no_police_case" v-model="hospitals.police_case" value="No">
                                No
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Fever</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="fever" id="fever" v-model="hospitals.fever" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-6"><b>Sore Throat :</b></label>
                        <div class="col-sm-6">
                            <label for="yes_sore_throat">
                                <input type="radio" name="sore_throat" id="yes_sore_throat" v-model="hospitals.sore_throat" value="Yes">
                                Yes
                            </label>

                            <label for="no_sore_throat">
                                <input type="radio" name="sore_throat" id="no_sore_throat" v-model="hospitals.sore_throat" value="No">
                                No
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Chills :</b></label>
                        <div class="col-sm-8">
                            <label for="yes_chills">
                                <input type="radio" name="chills" id="yes_chills" v-model="hospitals.chills" value="Yes">
                                Yes
                            </label>

                            <label for="no_chills">
                                <input type="radio" name="chills" id="no_chills" v-model="hospitals.chills" value="No">
                                No
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-6"><b>Repeated shaking with chills :</b></label>
                        <div class="col-sm-6">
                            <label for="yes_shaking_chills">
                                <input type="radio" name="shaking_chills" id="yes_shaking_chills" v-model="hospitals.shaking_chills" value="Yes">
                                Yes
                            </label>

                            <label for="no_shaking_chills">
                                <input type="radio" name="shaking_chills" id="no_shaking_chills" v-model="hospitals.shaking_chills" value="No">
                                No
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Headache :</b></label>
                        <div class="col-sm-8">
                            <label for="yes_headache">
                                <input type="radio" name="headache" id="yes_headache" v-model="hospitals.headache" value="Yes">
                                Yes
                            </label>

                            <label for="no_headache">
                                <input type="radio" name="headache" id="no_headache" v-model="hospitals.headache" value="No">
                                No
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-6"><b>New loss of taste or smell :</b></label>
                        <div class="col-sm-6">
                            <label for="yes_taste_smell">
                                <input type="radio" name="taste_smell" id="yes_taste_smell" v-model="hospitals.taste_smell" value="Yes">
                                Yes
                            </label>

                            <label for="no_taste_smell">
                                <input type="radio" name="taste_smell" id="no_taste_smell" v-model="hospitals.taste_smell" value="No">
                                No
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Malaise/Myalgia :</b></label>
                        <div class="col-sm-8">
                            <label for="yes_malaise">
                                <input type="radio" name="malaise" id="yes_malaise" v-model="hospitals.malaise" value="Yes">
                                Yes
                            </label>

                            <label for="no_chills">
                                <input type="radio" name="malaise" id="no_malaise" v-model="hospitals.malaise" value="No">
                                No
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-6"><b>Odema :</b></label>
                        <div class="col-sm-6">
                            <label for="yes_odema">
                                <input type="radio" name="odema" id="yes_odema" v-model="hospitals.odema" value="Yes">
                                Yes
                            </label>

                            <label for="no_odema">
                                <input type="radio" name="odema" id="no_odema" v-model="hospitals.odema" value="No">
                                No
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Date of onset</b></label>
                        <div class="col-sm-8">
                            <input type="date" name="date_onset" id="date_onset" v-model="hospitals.date_onset" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Date of Covid (+)</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="date_covid" id="date_covid" v-model="hospitals.date_covid" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Refer To</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="refer_to" id="refer_to" v-model="hospitals.refer_to" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4"><b>Others</b></label>
                        <div class="col-sm-8">
                            <textarea name="others" id="others" cols="30" rows="1" v-model="hospitals.others" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-sm-2 offset-sm-4">
                    <!-- <button type="reset" class="btn btn-md btn-warning">Cancel</button> -->
                    <button type="submit" class="btn btn-md btn-success">Update</button>
                </div>

            </div>
        </form>
    </div>
</template>

<script>

    import Select2 from 'v-select2-component';

    export default {
        name: 'EditHospitalComponent',

        props: ['auth_id'],

        components: {Select2},

        data(){
            return {
                id: "",

                hospital_id: "",

                date: "",

                hospitals: {
                    patient_id: "",
                    date: "",
                    admission: "",
                    bed_id: "",
                    doctor_multiple_id: "",
                    doctor_incharge_id: "",
                    police_case: "",
                    fever: "",
                    sore_throat: "",
                    chills: "",
                    shaking_chills: "",
                    headache: "",
                    taste_smell: "",
                    malaise: "",
                    odema: "",
                    date_onset: "",
                    date_covid: "",
                    refer_to: "",
                    others: "",
                    user_id: "",
                },
                patients: [],

                doctors: [],

                beds: [],
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
            doctor(){
                axios.get('/api/doctorData')
                .then(response => {
                    this.doctors = response.data;
                })
            },

            bed(){
                axios.get('/api/bedData')
                .then(response => {
                    //console.log(response.data);
                    //this.beds = response.data;

                    response.data.forEach(item => {

                        this.beds.push({
                            id : item.id,
                            text : item.text + '/ ' + item.room_name + '/ ' + item.floor_name + '/ ' + item.building_name,
                        });

                    })

                    //console.log(this.beds);
                })
            },

            edit(){
                axios.get(`/api/hospitals/${this.hospital_id}`)
                .then(response => {
                    this.hospitals = response.data.info;

                })
            },

            update(){
                this.hospitals.user_id = this.auth_id;
                axios.put(`/api/hospitals/${this.hospital_id}`,this.hospitals)
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
            this.doctor();
            this.bed();
            this.edit();
        }
    }
</script>
