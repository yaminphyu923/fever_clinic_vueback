<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <a href="/"><button class="btn btn-md btn-primary">Home</button></a>
                <a href="/permission"><button class="btn btn-md btn-primary">Back</button></a>
            </div>

            <div class="col-sm-8 offset-sm-2 mt-3">
                <div class="card">
                    <h4 class="text-center mt-5"><b>Create Permission</b></h4>
                    <div class="card-body my-5">
                        <form @submit.prevent="store">
                            <div class="form-group row">
                                <label for="" class="col-sm-2 offset-sm-2">Name</label>

                                <div class="col-sm-6">
                                    <input type="text" v-model="permission.name" class="form-control">
                                </div>
                            </div>

                            <div class="col-sm-6 offset-sm-4">
                                <button type="submit" class="btn btn-sm btn-success btn-block">Save</button>
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
        name: 'CreatePermissionComponent',

        data(){
            return {
                permission :{
                    name : "",
                }
            }
        },

        methods:{
            // index(page=1){
            //     axios.get(`/api/users?page=${page}&search=${this.search}`)
            //     .then(response => {
            //         // console.log(response.data.info);
            //         this.users = response.data.info;
            //     });
            // },
            store(){
                axios.post('/api/permissions',this.permission)
                .then(response => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Creating successfully'
                    })
                })
            },
            // destroy(id){
            //     Swal.fire({
            //     title: 'Are you sure?',
            //     icon: 'warning',
            //     showCancelButton: true,
            //     confirmButtonColor: '#3085d6',
            //     cancelButtonColor: '#d33',
            //     confirmButtonText: 'Delete'
            //     }).then((result) => {
            //         if (result.isConfirmed) {
            //             axios.delete(`/api/users/${id}`)
            //             .then(response => {
            //                 this.index();
            //                 Swal.fire({ title: 'Deleted!',icon: 'success', })
            //             })
            //         }

            //         window.location.reload();

            //     })
            // }
        },

        created(){
            //this.index();
        }
    }
</script>
