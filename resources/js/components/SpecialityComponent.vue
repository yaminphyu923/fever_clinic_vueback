<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4><b>Speciality List</b></h4>
                <a href="/doctors"><button class="btn btn-md btn-primary">Back</button></a>
                <a href="/"><button class="btn btn-md btn-primary">Home</button></a>
                <button class="btn btn-md btn-primary" data-toggle="modal" data-target="#addSpeciality">Add Speciality</button>
            </div>


            <div class="col-md-12">
                <div class="modal fade" id="addSpeciality" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Adding Speciality</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form @submit.prevent="store">

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
                                <th>Speciality Name</th>
                                <th>Code</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="(allspeciality,index) in allspecialities" :key="allspeciality.id">
                                <td>{{index+1}}</td>
                                <td>{{allspeciality.name}}</td>
                                <td>{{allspeciality.code}}</td>
                                <td>
                                    <a href=""><button class="btn btn-sm btn-warning">Edit</button></a>

                                    <a href=""><button class="btn btn-sm btn-danger">Delete</button></a>
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
        name: 'SpecialityComponent',

        data(){
            return {
                allspecialities : "hello",
                specialities:{
                    name: "",
                    code: "",
                }
            }
        },

        methods: {
            index(){
                axios.get('/api/specialities')
                .then(response => {
                    // console.log(response);
                    this.allspecialities = response.data.info;
                })
            },
            store(){
                axios.post('/api/createSpecialities',this.specialities)
                    .then(response => {
                        this.index();
                    })
            }
        },

        created(){
            this.index();
        }
    }
</script>
