<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="my-3"><b>Position</b></h4>
                <a href="/"><button class="btn btn-md btn-danger">Home</button></a>
                <a href="/hrmanagements"><button class="btn btn-md btn-danger">Back</button></a>
                <button class="btn btn-md btn-primary" data-toggle="modal" data-target="#addposition">Add Position</button>
            </div>

            <div class="col-md-12">
                <div class="modal fade" id="addposition" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Adding Position</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form @submit="store">

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Name:</b></label>

                                        <div class="col-sm-8">
                                            <input type="text" name="name" v-model="position.name" class="form-control" id="name">
                                        </div>
                                    </div>

                                    <input type="hidden">

                                    <div class="float-right">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-3">
                <div class="table-responsive">
                    <table class="datatable table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="(position,index) in positions" :key="position.id">
                                <td>{{index+1}}</td>
                                <td>{{position.name}}</td>
                                <td>
                                    <a :href="'/positions/'+position.id"><button class="btn btn-sm btn-warning">Edit</button></a>

                                    <button class="btn btn-sm btn-danger" @click="destroy(position.id)">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "PositionComponent",

        data(){
            return {
                positions: {},
                position : {
                    name : "",
                    user_id : "",
                }
            }
        },

        methods:{
            view(){
                axios.get('/api/positions')
                .then(response => {
                    this.positions = response.data.info;
                })
            },
            store(){
                axios.post('/api/positions',this.position)
                .then(response=> {
                    Toast.fire({
                        icon: 'success',
                        title: 'Creating successfully'
                    })
                })
            },

            destroy(id){
                Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Delete'
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios.delete(`/api/positions/${id}`)
                        .then(response => {
                            this.view();
                            Swal.fire({ title: 'Deleted!',icon: 'success', })
                        })

                    }
                })
            }
        },

        created(){
            this.view();
        }

    }
</script>
