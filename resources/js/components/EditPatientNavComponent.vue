<template>
    <div class="container-fluid">
        <div class="row justify-content-between">
            <div class="col-md-12 patientnav mt-3">
                <a :href="'/edit-hospital/'+id+'/' +hospital_id+'/'+date" class="mr-4" :class="activeClass('edit-hospital')"><b>Hospital</b></a>

                <a :href="'/edit-pastmedical/'+ id + '/'+hospital_id+'/' + date" v-if="past_medicals != null" class="mr-4" :class="activeClass('edit-pastmedical')"><b>Past Medical History</b></a>
                <a :href="'/edit-phyexamination/'+id+'/'+hospital_id+'/'+date" v-if="phy_examinations != null" class="mr-4" :class="activeClass('edit-phyexamination')"><b>Physical Examination</b></a>
                <a :href="'/edit-diagnosis/'+id+'/'+hospital_id+'/'+date" v-if="diagnosis != null" class="mr-4" :class="activeClass('edit-diagnosis')"><b>Diagnosis</b></a>
                <a :href="'/edit-investigation/'+id+'/'+hospital_id+'/'+date" v-if="investigations.length > 0" class="mr-4" :class="activeClass('edit-investigation')"><b>Investigation</b></a>
                <a :href="'/edit-treatment/'+id+'/'+hospital_id+'/'+date" v-if="treatments.length > 0" class="mr-4" :class="activeClass('edit-treatment')"><b>Treatment</b></a>
                <a :href="'/edit-dead/'+id+'/'+hospital_id+'/'+date" v-if="dead != null" class="mr-4" :class="activeClass('edit-dead')"><b>Dead</b></a>
                <a :href="'/edit-discharge/'+id+'/'+hospital_id+'/'+date" v-if="discharge != null" class="mr-4" :class="activeClass('edit-discharge')"><b>Discharge</b></a>
                <a :href="'/edit-progress/'+id+'/'+hospital_id+'/'+date" v-if="progress != null" class="mr-4" :class="activeClass('edit-progress')"><b>Progress Note</b></a>
                <a :href="'/edit-ptoverall/'+id+'/'+hospital_id+'/'+date" v-if="ptoverall.length > 0" class="mr-4" :class="activeClass('edit-ptoverall')"><b>Pt Overall Performance</b></a>
                <a :href="'/edit-monitoring/'+id+'/'+hospital_id+'/'+date" v-if="monitoring != null" class="mr-4" :class="activeClass('edit-monitoring')"><b>Monitoring</b></a>
                <a :href="'/edit-imaging/'+id+'/'+hospital_id+'/'+date" v-if="images != null" class="mr-4" :class="activeClass('edit-imaging')"><b>Imaging</b></a>
                <a :href="'/edit-consultation/'+id+'/'+hospital_id+'/'+date" v-if="consultation != null" class="mr-4" :class="activeClass('edit-consultation')"><b>Consultation</b></a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
       name : 'EditPatientNavComponent',

       data(){
           return {
                id : "",
                hospital_id : "",
                date : "",
                url : "",
                currentLink: location.href,
                past_medicals : "",
                phy_examinations : "",
                diagnosis : "",
                investigations : "",
                treatments : "",
                dead : "",
                discharge : "",
                progress : "",
                ptoverall : "",
                monitoring : "",
                images : "",
                consultation : "",
           }
       },

       methods:{

           route(url) {
                return this.routes.route(url)
            },
            activeClass(segment) {
                // if(this.currentLink == ''){
                //     this.currentLink = 'home';
                // }
                // console.log(this.currentLink);
                // console.log('Segment' + segment);
                return segment == this.currentLink ? 'navhactive' : '';

            },
            setCurrentLink() {
                let current = new URL(location.href).pathname;
                let link = current.split('/');
                this.currentLink = link[1];
                console.log(this.currentLink);
            }
       },

        computed: {
            routes() {
                return window.routes
            },
        },
        mounted() {
            this.setCurrentLink();
            this.activeClass();
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

            axios.get(`/api/edit-pastmedical/${this.id}/${this.date}`)
            .then(response => {

                this.past_medicals = response.data.info;
                //console.log(this.past_medicals);
            })

            axios.get(`/api/edit-phyexamination/${this.id}/${this.date}`)
            .then(response => {
                this.phy_examinations = response.data.info;

            })

            axios.get(`/api/edit-diagnosis/${this.id}/${this.date}`)
            .then(response => {
                this.diagnosis = response.data.info;
            })

            axios.get(`/api/edit-investigation/${this.id}/${this.date}`)
            .then(response => {
                //console.log(response.data.info);
                this.investigations = response.data.info;
            })

            axios.get(`/api/edit-treatment/${this.id}/${this.date}`)
            .then(response => {
                this.treatments = response.data.info;
            })

            axios.get(`/api/edit-dead/${this.id}/${this.date}`)
            .then(response => {
                this.dead = response.data.info;
            })

            axios.get(`/api/edit-discharge/${this.id}/${this.date}`)
            .then(response => {
                this.discharge = response.data.info;
            })

            axios.get(`/api/edit-progress/${this.id}/${this.date}`)
            .then(response => {
                this.progress = response.data.info;

            })

            axios.get(`/api/edit-ptoverall/${this.id}/${this.date}`)
            .then(response => {
                this.ptoverall = response.data.info;

            })

            axios.get(`/api/edit-monitoring/${this.id}/${this.date}`)
            .then(response => {
                this.monitoring = response.data.info;
            })

            axios.get(`/api/edit-imaging/${this.id}/${this.date}`)
            .then(response => {
                this.images = response.data.info;
            })

            axios.get(`/api/edit-consultation/${this.id}/${this.date}`)
            .then(response => {
                this.consultation = response.data.info;
            })
        }
    }
</script>
