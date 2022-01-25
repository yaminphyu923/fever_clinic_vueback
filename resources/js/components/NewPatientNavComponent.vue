<template>
    <div class="container-fluid">
        <div class="row justify-content-between">
            <div class="col-md-12 patientnav mt-3">
                <a :href="'/new-hospital/' + id" class="mr-4" :class="activeClass('new-hospital')"><b>Hospital</b></a>
                <a :href="'/new-past-medical/' + id" class="mr-4" :class="activeClass('new-past-medical')"><b>Past Medical History</b></a>
                <a :href="'/new-phyexamination/' + id" class="mr-4" :class="activeClass('new-phyexamination')"><b>Physical Examination</b></a>
                <a :href="'/new-diagnosis/' + id" class="mr-4" :class="activeClass('new-diagnosis')"><b>Diagnosis</b></a>
                <a :href="'/new-investigation/' + id" class="mr-4" :class="activeClass('new-investigation')"><b>Investigation</b></a>
                <a :href="'/new-treatment/' + id" class="mr-4" :class="activeClass('new-treatment')"><b>Treatment</b></a>
                <a :href="'/new-dead/' + id" class="mr-4" :class="activeClass('new-dead')"><b>Dead</b></a>
                <a :href="'/new-discharge/' + id" class="mr-4" :class="activeClass('new-discharge')"><b>Discharge</b></a>
                <a :href="'/new-progress/' + id" class="mr-4" :class="activeClass('new-progress')"><b>Progress Note</b></a>
                <a :href="'/new-ptoverall/' + id" class="mr-4" :class="activeClass('new-ptoverall')"><b>Pt Overall Performance</b></a>
                <a :href="'/new-monitoring/' + id" class="mr-4" :class="activeClass('new-monitoring')"><b>Monitoring</b></a>
                <a :href="'/new-imaging/' + id" class="mr-4" :class="activeClass('new-imaging')"><b>Imaging</b></a>
                <a :href="'/new-consultation/' + id" class="mr-4" :class="activeClass('new-consultation')"><b>Consultation</b></a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
       name : 'NewPatientNavComponent',

       data(){
           return {
                url : "",
                currentLink: location.href,

                id : "",
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
            var id = url_array[url_array.length-1];
            this.id = id;

        }
    }
</script>
