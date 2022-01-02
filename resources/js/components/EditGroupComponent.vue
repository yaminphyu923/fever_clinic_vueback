<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <!-- <a href="/degrees" class="float-right"><button class="btn btn-md btn-danger">Back</button></a> -->
                <div class="card mt-5">
                    <div class="card-body">

                        <h4 class="text-center my-4">Edit Group</h4>

                        <form @submit.prevent="update">

                            <div class="form-group row">
                                <label for="" class="col-sm-4"><b>Name:</b></label>

                                <div class="col-sm-8">
                                    <input type="text" name="name" v-model="groups.name" class="form-control" id="name">
                                </div>
                            </div>

                            <div class="col-sm-4 offset-sm-4">
                                <a href="/group"><button type="button" class="btn btn-danger">Back</button></a>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'EditGroupComponent',

        props: ['auth_id'],

        data(){
            return {
                id : "",
                groups:{
                    name: "",
                    user_id: "",
                },

            }
        },

        methods:{
            edit(){
                axios.get(`/api/groups/${this.id}`)
                .then(response => {
                    // console.log(response.data.info);
                    this.groups = response.data.info;
                })
            },

            update(){
                this.groups.user_id = this.auth_id;
                axios.put(`/api/groups/${this.id}`,this.groups)
                .then(response => {
                    this.edit();
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
            var id = url_array[url_array.length-1];
            this.id = id;

            this.edit();
        }
    }
</script>
