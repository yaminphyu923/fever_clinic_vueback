<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <a href="/" class="float-right"><button class="btn btn-md btn-danger">Home</button></a>
                <div class="card mt-5">
                    <div class="card-body">

                        <h4 class="text-center my-4">Edit Category</h4>

                        <form @submit.prevent="update">

                            <div class="form-group row">
                                <label for="" class="col-sm-4"><b>Name:</b></label>

                                <div class="col-sm-8">
                                    <input type="text" name="name" v-model="categories.name" class="form-control" id="name">
                                </div>
                            </div>

                            <div class="col-sm-4 offset-sm-4">
                                <a href="/medical/category"><button type="button" class="btn btn-danger">Back</button></a>
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
        name: 'EditMedicalCategoryComponent',

        props: ['auth_id'],

        data(){
            return {
                id : "",

                categories:{
                    id: "",
                    name: "",
                    user_id: "",
                },

            }
        },

        methods:{

            edit(){
                axios.get(`/api/medical_categories/${this.id}`)
                .then(response => {
                    // console.log(response.data.info);
                    this.categories = response.data.info;
                })
            },

            update(){
                this.categories.user_id = this.auth_id;
                axios.put(`/api/medical_categories/${this.id}`,this.categories)
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
