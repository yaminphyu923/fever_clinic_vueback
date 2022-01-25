<template>
    <div class="container-fluid">
        <div class="row justify-content-between">
            <div class="col-md-12 patientnav mt-3">
                <a href="/hospital-create" class="mr-4" :class="activeClass('hospital-create')"><b>Hospital</b></a>
                <a href="/pastmedical-create" class="mr-4" :class="activeClass('pastmedical-create')"><b>Past Medical History</b></a>
                <a href="/phyexamination-create" class="mr-4" :class="activeClass('phyexamination-create')"><b>Physical Examination</b></a>
                <a href="/diagnosis-create" class="mr-4" :class="activeClass('diagnosis-create')"><b>Diagnosis</b></a>
                <a href="/investigation-create" class="mr-4" :class="activeClass('investigation-create')"><b>Investigation</b></a>
                <a href="/treatment-create" class="mr-4" :class="activeClass('treatment-create')"><b>Treatment</b></a>
                <a href="/dead-create" class="mr-4" :class="activeClass('dead-create')"><b>Dead</b></a>
                <a href="/discharge-create" class="mr-4" :class="activeClass('discharge-create')"><b>Discharge</b></a>
                <a href="/progress-create" class="mr-4" :class="activeClass('progress-create')"><b>Progress Note</b></a>
                <a href="/ptoverall-create" class="mr-4" :class="activeClass('ptoverall-create')"><b>Pt Overall Performance</b></a>
                <a href="/monitoring-create" class="mr-4" :class="activeClass('monitoring-create')"><b>Monitoring</b></a>
                <a href="/imaging-create" class="mr-4" :class="activeClass('imaging-create')"><b>Imaging</b></a>
                <a href="/consultation-create" class="mr-4" :class="activeClass('consultation-create')"><b>Consultation</b></a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
       name : 'PatientNavComponent',

       data(){
           return {
                url : "",
                currentLink: location.href,
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
                return segment == this.currentLink ? 'navhactive' : '';

            },
            setCurrentLink() {
                this.currentLink = new URL(location.href).pathname.split('/').pop();
            }
       },

        computed: {
            routes() {
                return window.routes
            },
        },
        mounted() {
            this.setCurrentLink()
        },
    }
</script>
