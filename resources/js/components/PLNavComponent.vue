<template>
    <div class="container-fluid">
        <div class="row justify-content-between">
            <div class="col-md-12 plnav mt-3">
                <a href="/" class="text-decoration-none"><b>🏚 Home</b></a>
                <a href="/total-patient" class="text-decoration-none" :class="activeClass('total-patient')"><b>Total Patient List</b></a>
                <a href="/in-patient" class="text-decoration-none" :class="activeClass('in-patient')"><b>In Patient List</b></a>
                <a href="/out-patient" class="text-decoration-none" :class="activeClass('out-patient')"><b>Out Patient List</b></a>
                <a href="/como-patient" class="text-decoration-none" :class="activeClass('como-patient')"><b>Comobidity</b></a>
                <a href="dead-patient" class="text-decoration-none" :class="activeClass('dead-patient')"><b>Dead Patient List</b></a>
                <a href="/referral-patient" class="text-decoration-none" :class="activeClass('referral-patient')"><b>Referral Patient List</b></a>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
       name : 'PLNavComponent',

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
                return segment == this.currentLink ? 'plactive' : '';

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
