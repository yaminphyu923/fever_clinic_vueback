<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h4><b>User Guide</b></h4>
            </div>
            <div class="col-sm-6 text-right">
                <a href="/"><button class="btn btn-md btn-primary">Home</button></a>
            </div>

            <div class="col-sm-12">
                <iframe :src="pdfUrl" frameborder="0" height="640" width="1050" class="responsive-iframe"></iframe>
            </div>


        </div>
    </div>
</template>

<script>

    import VModal from 'vue-js-modal';

    export default {
        name: 'UserGuideComponent',

        props: ['auth_id'],

        data(){
            return {

                time_create : "",
                time_edit : "",
                time_delete : "",

                pdfUrl : '../pdf/yy.pdf'
            }
        },

        methods:{

            user(){
                axios.get(`/api/get_auth_user/${this.auth_id}`)
                .then(response => {
                    // console.log(response.data.info);
                    this.auth_user = response.data.user;
                    this.role = response.data.role;
                    this.permissions = response.data.permissions;

                    //console.log(response);
                    this.checkPermission();
                });


            },

            checkPermission(){

                this.permissions.forEach((item) => {

                    // console.log(item);

                    if(item.name == 'time-create'){
                        this.time_create = true;
                    }

                    if(item.name == 'time-edit'){
                        this.time_edit = true;
                    }

                    if(item.name == 'time-delete'){
                        this.time_delete = true;
                    }

                });
            },
        },

        created(){
            this.user();
        }
    }
</script>
