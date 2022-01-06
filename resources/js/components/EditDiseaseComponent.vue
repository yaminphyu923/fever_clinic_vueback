<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <!-- <a href="/degrees" class="float-right"><button class="btn btn-md btn-danger">Back</button></a> -->
                <div class="card mt-5">
                    <div class="card-body">

                        <h4 class="text-center my-4">Edit Disease</h4>

                        <form @submit.prevent="update">

                            <div class="form-group row">
                                <label for="" class="col-sm-4"><b>Disease Name:</b></label>

                                <div class="col-sm-8">
                                    <input type="text" name="name" v-model="diseases.name" class="form-control" id="name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-4"><b>Code:</b></label>

                                <div class="col-sm-8">
                                    <input type="text" name="code" v-model="diseases.code" class="form-control" id="code">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-4"><b>Disease Category:</b></label>

                                <div class="col-sm-8">
                                    <input type="text" name="category" v-model="diseases.category" class="form-control" id="category">
                                </div>
                            </div>

                            <!-- <input type="text" name="user_id" v-model="degrees.user_id" class="form-control" id="user_id" value="{{auth()->user()->id}}"> -->

                            <div class="col-sm-4 offset-sm-4">
                                <a href="/disease"><button type="button" class="btn btn-danger">Back</button></a>
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
        name: 'EditDiseaseComponent',

        props: ['auth_id'],

        data(){
            return {
                id : "",
                diseases:{
                    name: "",
                    code: "",
                    category: "",
                    user_id: "",
                },

            }
        },

        methods:{
            edit(){
                axios.get(`/api/diseases/${this.id}`)
                .then(response => {
                    // console.log(response.data.info);
                    this.diseases = response.data.info;
                })
            },

            update(){
                this.diseases.user_id = this.auth_id;
                axios.put(`/api/diseases/${this.id}`,this.diseases)
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
