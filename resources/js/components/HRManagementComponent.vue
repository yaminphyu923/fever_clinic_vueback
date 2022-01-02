<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="my-3"><b>HR Management</b></h4>
                <a href="/"><button class="btn btn-md btn-danger">Home</button></a>
                <button class="btn btn-md btn-primary" data-toggle="modal" data-target="#addHR">Add HR Managemnet</button>
                <a href="/positions"><button class="btn btn-md btn-primary">Create Position</button></a>
            </div>

            <div class="col-md-12">
                <div class="modal fade" id="addHR" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Adding HR Management</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form @submit.prevent="store">

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Name:</b></label>

                                        <div class="col-sm-8">
                                            <input type="text" name="name" v-model="hr.name" class="form-control" id="name" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Phone:</b></label>

                                        <div class="col-sm-8">
                                            <input type="text" name="phone" v-model="hr.phone" class="form-control" id="phone" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Position:</b></label>

                                        <div class="col-sm-8">
                                            <select name="position_id" id="position_id" v-model="hr.position_id" class="form-control">
                                                <option v-for="position in positions" :key="position.id" :value="position.id">{{position.name}}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
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
                                <th>Phone</th>
                                <th>Position</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="(hr,index) in hrs" :key="hr.id">
                                <td>{{index+1}}</td>
                                <td>{{hr.name}}</td>
                                <td>{{hr.phone}}</td>
                                <td>{{(hr.position != null) ? hr.position.name:"-"}}</td>
                                <td>
                                    <a :href="'/hrmanagements/'+hr.id"><button class="btn btn-sm btn-warning">Edit</button></a>

                                    <button class="btn btn-sm btn-danger" @click="destroy(hr.id)">Delete</button>
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
        name: "HRManagementComponent",

        data(){
            return {
                hrs: {},

                hr : {
                    id: "",
                    name : "",
                    phone : "",
                    position_id : "",
                },

                positions : {},
            }
        },

        methods: {
            view(){
                axios.get('/api/hrs')
                .then(response => {
                    this.hrs = response.data.info;
                })
            },

            position(){
                axios.get('/api/positions')
                .then(response => {
                    this.positions = response.data.info;
                })
            },

            store(){
                axios.post('/api/hrs',this.hr)
                .then(response => {
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
                        axios.delete(`/api/hrs/${id}`)
                        .then(response => {
                            this.view();
                            Swal.fire({ title: 'Deleted!',icon: 'success', })
                        })

                    }
                })
            }
        },

        created(){
            this.position();
            this.view();
        }

    }
</script>
