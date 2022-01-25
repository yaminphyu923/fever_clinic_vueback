<template>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6 mb-3">
                <h3 class="text-center"><b>Progress Note</b></h3>
            </div>
        </div>

        <form @submit.prevent="update">
            <div class="row">
                <!-- <div class="col-sm-12">
                    <div class="form-group row">
                        <label for="" class="col-sm-3"><b>Patient ID(NRC)</b></label>
                        <div class="col-sm-4">

                            <Select2 v-model="progress.patient_id" :options="patients" :settings="{ settingOption: patients.text, settingOption: patients.text }"/>
                        </div>
                    </div>
                </div> -->

                <div class="col-sm-12">
                    <div class="form-group row">
                        <label for="" class="col-sm-3"><b>Progress Note</b></label>
                        <div class="col-sm-4">
                            <input type="file" name="time" id="time" v-on:change="onFileChange" class="form-control" autocomplete="off">
                        </div>
                    </div>
                </div>


                <div class="col-sm-2 offset-sm-3">
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
        name: 'EditProgressComponent',

        props: ['auth_id'],

        components: {Select2},

        data(){
            return {
                id: "",

                hospital_id: "",

                date: "",
                progress: {
                    patient_id: "",
                    progress_note: "",
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

            onFileChange(e){
                this.progress.progress_note = e.target.files[0];
            },

             edit(){
                axios.get(`/api/edit-progress/${this.id}/${this.date}`)
                .then(response => {
                    // console.log(response.data.info);
                    this.progress = response.data.info;

                })
            },

            update(){
                const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }

                let formData = new FormData();

                formData.append('patient_id', this.id);
                formData.append('progress_note', this.progress.progress_note);
                // this.progress.user_id = this.auth_id;
                formData.append('user_id', this.progress.user_id);
                axios.post(`/api/progress-update/`,formData,config)
                .then(response => {
                    console.log(response);
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
