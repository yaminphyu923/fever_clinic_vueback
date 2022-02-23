<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12" id="printMe">
                <div class="row my-3">
                    <div class="col-sm-3 col-3 text-right">
                        <img :src="img" alt="" style="width:50px;height:50px;">
                    </div>
                    <div class="col-sm-6 col-9">
                        <h4><b>Covid Center</b></h4>
                    </div>
                    <div class="col-sm-3 col-3 text-right">
                        <a :href="'/createPDF/'+id" target="_blank"><button type="button" class="btn btn-md btn-primary">Download Pdf</button></a>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <span v-if="patients.date" class="w-25"><b>Date Time -</b> {{formatDate(patients.date)}}</span>
                    <span v-if="patients.name" class="w-25"><b>Patient Name -</b> {{patients.name}}</span>
                    <span v-if="patients.nrc" class="w-25"><b>NRC -</b> {{patients.nrc}}</span>
                    <span v-if="patients.phone" class="w-25"><b>Phone -</b> {{patients.phone}}</span>
                </div>

                <div class="d-flex justify-content-between">
                    <span v-if="patients.gender" class="w-25"><b>Gender -</b> {{patients.gender}}</span>
                    <span v-if="patients.age" class="w-25"><b>Age -</b> {{patients.age}}</span>
                    <span v-if="patients.address" class="w-25"><b>Address -</b> {{patients.address}}</span>
                    <span v-if="patients.nextKin" class="w-25"><b>Next Kin -</b> {{patients.nextKin}}</span>
                </div>

                <div class="d-flex justify-content-between">
                    <span v-if="patients.attendent" class="w-25"><b>Attendent -</b> {{patients.attendent}}</span>
                    <span v-if="patients.occupation" class="w-25"><b>Occupation -</b> {{patients.occupation}}</span>
                    <span v-if="patients.symptoms" class="w-25"><b>Symptoms -</b> {{patients.symptoms}}</span>
                    <span v-if="patients.travelHistory" class="w-25"><b>Travel History -</b> {{patients.travelHistory}}</span>
                </div>

                <div class="d-flex justify-content-between">
                    <span v-if="patients.remark" class="w-100"><b>Remark -</b> {{patients.remark}}</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'PdfComponent',

        props: ['auth_id'],

        data(){
            return {
                patients : {},

                hospitals: {},

                hosPrints: {},

                pastPrints: {},

                physicalPrints: {},

                id: "",

                img: '../logos/clinic.png',
            }
        },

        methods: {

            edit(){
                axios.get(`/api/patients/${this.id}`)
                .then(response => {
                    //console.log(response.data.info);
                    this.patients = response.data.info;
                })
            },

            pdf(){
                axios.get('/api/createPDF')
                .then(response => {
                    console.log(response.data);
                })
            },

            hospitalPrint(){
                axios.get(`/api/detailHospitalPrint/${this.id}`)
                .then(response => {
                    //console.log(response.data.info);
                    this.hosPrints = response.data.info;
                    // console.log(this.hosPrints);
                })
            },

            pastPrint(){
                axios.get(`/api/detailPastPrint/${this.id}`)
                .then(response => {
                    //console.log(response.data.info);
                    this.pastPrints = response.data.info;
                    //console.log(this.pastPrints);
                })
            },

            physicalPrint(){
                axios.get(`/api/detailPhysicalPrint/${this.id}`)
                .then(response => {
                    //console.log(response.data.info);
                    this.physicalPrints = response.data.info;
                    //console.log(this.pastPrints);
                })
            },

            formatDate(date) {
                return moment(date).format('DD-MMM-YYYY h:mm a');
            },

            formatDay(date){
                return moment(date).format('YYYY-MM-DD');
            },

        },
        created(){
            var full_url = document.URL;
            var url_array = full_url.split('/');
            var id = url_array[url_array.length-1];
            this.id = id;

            this.edit();

            this.hospitalPrint();

            this.pastPrint();

            this.physicalPrint();
        }
    }
</script>
