<template>
    <div class="container-fluid">
        <div class="row justify-content-between">
            <div class="col-md-12 patientnav">
                <a href="/hospital-create" class="mr-4" :class="activeClass('hospital-create')"><b>Hospital</b></a>
                <a href="/imaging-create" class="mr-4" :class="activeClass('imaging-create')"><b>Imaging</b></a>
                <a href="/treatment-create" class="mr-4" :class="activeClass('treatment-create')"><b>Treatment</b></a>
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
