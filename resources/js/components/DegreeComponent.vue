<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h4><b>Degree List</b></h4>
                <a href="/doctors"><button class="btn btn-md btn-primary">Back</button></a>
                <a href="/"><button class="btn btn-md btn-primary">Home</button></a>
                <button class="btn btn-md btn-primary" data-toggle="modal" data-target="#addDegree">Add Degree</button>
            </div>


            <div class="col-md-12">
                <div class="modal fade" id="addDegree" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Adding Degree</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form @submit.prevent="store">

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Degree Name:</b></label>

                                        <div class="col-sm-8">
                                            <input type="text" name="name" v-model="degrees.name" class="form-control" id="name">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Full Name:</b></label>

                                        <div class="col-sm-8">
                                            <input type="text" name="fullname" v-model="degrees.fullname" class="form-control" id="fullname">
                                        </div>
                                    </div>

                                    <!-- <input type="text" name="user_id" v-model="degrees.user_id" class="form-control" id="user_id" value="{{auth()->user()->id}}"> -->

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
                                <th>Degree Name</th>
                                <th>Full Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="(alldegree,index) in alldegrees" :key="alldegree.id">
                                <td>{{index+1}}</td>
                                <td>{{alldegree.name}}</td>
                                <td>{{alldegree.fullname}}</td>
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
        name: 'DegreeComponent',

        data(){
            return {
                alldegrees :"hello",
                degrees:{
                    name: "",
                    fullname: "",
                    user_id: "",
                }
            }
        },

        methods:{
            index(){
                axios.get('/api/degrees')
                .then(response => {
                    // console.log(response.data.info);
                    this.alldegrees = response.data.info;
                });
            },
            store(){
                axios.post('/api/createDegrees',this.degrees)
                .then(response => {
                    this.index();
                    this.degrees = {
                        name: "",
                        fullname: "",
                    }
                })
            }
        },

        created(){
            this.index();
        }
    }
</script>
