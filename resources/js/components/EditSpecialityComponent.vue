<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">

                <div class="card mt-5">
                    <div class="card-body">

                        <h4 class="text-center my-4">Edit Speciality</h4>

                        <form @submit.prevent="update">

                            <div class="form-group row">
                                <label for="" class="col-sm-4"><b>Speciality Name:</b></label>

                                <div class="col-sm-8">
                                    <input type="text" name="name" v-model="specialities.name" class="form-control" id="name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-4"><b>Code:</b></label>

                                <div class="col-sm-8">
                                    <input type="text" name="code" v-model="specialities.code" class="form-control" id="code">
                                </div>
                            </div>

                            <!-- <input type="text" name="user_id" v-model="degrees.user_id" class="form-control" id="user_id" value="{{auth()->user()->id}}"> -->

                            <div class="col-sm-4 offset-sm-4">
                                <a href="/specialities"><button type="button" class="btn btn-danger">Back</button></a>
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
        name: 'EditSpecialityComponent',

        props: ['auth_id'],

        data(){
            return {
                id : "",
                specialities:{
                    id: "",
                    name: "",
                    code: "",
                    user_id: "",
                },

            }
        },

        methods:{
            edit(){
                axios.get(`/api/specialities/${this.id}`)
                .then(response => {
                    // console.log(response.data.info);
                    this.specialities = response.data.info;
                })
            },

            update(){
                this.specialities.user_id = this.auth_id;
                axios.put(`/api/specialities/${this.id}`,this.specialities)
                .then(response => {
                    this.edit();
                    Toast.fire({
                        icon: 'success',
                        title: 'Update successfully'
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
