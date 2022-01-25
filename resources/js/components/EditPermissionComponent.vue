<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <a href="/"><button class="btn btn-md btn-primary">Home</button></a>
                <a href="/permission"><button class="btn btn-md btn-primary">Back</button></a>
            </div>

            <div class="col-sm-8 offset-sm-2 mt-3">
                <div class="card">
                    <h4 class="text-center mt-5"><b>Edit Permission</b></h4>
                    <div class="card-body my-5">
                        <form @submit.prevent="update">
                            <div class="form-group row">
                                <label for="" class="col-sm-2 offset-sm-2">Name</label>

                                <div class="col-sm-6">
                                    <input type="text" v-model="permission.name" class="form-control">
                                </div>
                            </div>

                            <div class="col-sm-6 offset-sm-4">
                                <button type="submit" class="btn btn-sm btn-success btn-block">Update</button>
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
        name: 'EditPermissionComponent',

        data(){
            return {
                id: "",

                permission :{
                    name : "",
                }
            }
        },

        methods:{
            edit(){
                axios.get(`/api/permissions/${this.id}`)
                .then(response => {
                    this.permission = response.data.info;
                });
            },

            update(){
                axios.put(`/api/permissions/${this.id}`,this.permission)
                .then(response => {
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
