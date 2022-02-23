<template>
    <div class="container-fluid">
        <div class="row justify-content-between">
            <div class="col-md-12 plnav my-5">
                <a href="/" class="text-decoration-none"><b>🏚 Home</b></a>
                <a href="/building" class="text-decoration-none" :class="activeClass('building')"><b>Building</b></a>
                <a href="/floor" class="text-decoration-none" :class="activeClass('floor')"><b>Floor</b></a>
                <a href="/room" class="text-decoration-none" :class="activeClass('room')"><b>Room</b></a>
                <a href="/bed" class="text-decoration-none" :class="activeClass('bed')"><b>Bed</b></a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
       name : 'RoomBedNavComponent',

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
