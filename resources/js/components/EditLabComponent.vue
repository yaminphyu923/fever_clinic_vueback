<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <!-- <a href="/degrees" class="float-right"><button class="btn btn-md btn-danger">Back</button></a> -->
                <div class="card mt-5">
                    <div class="card-body">

                        <h4 class="text-center my-4">Edit Lab</h4>

                        <form @submit.prevent="update">

                            <div class="form-group row">
                                <label for="" class="col-sm-4"><b>Name:</b></label>

                                <div class="col-sm-8">
                                    <input type="text" name="name" v-model="labs.name" class="form-control" id="name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-4"><b>Unit:</b></label>

                                <div class="col-sm-8">
                                    <input type="text" name="unit" v-model="labs.unit" class="form-control" id="unit">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-4"><b>Normal Range:</b></label>

                                <div class="col-sm-8">
                                    <input type="text" name="unit" v-model="labs.range" class="form-control" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-4"><b>Group:</b></label>

                                <div class="col-sm-8">
                                    <Select2 v-model="labs.group_id" :options="groups" :settings="{ settingOption: groups.text, settingOption: groups.text }" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-4"><b>Lab Category:</b></label>

                                <div class="col-sm-8">
                                    <Select2 v-model="labs.labcategory_id" :options="lab_categories" :settings="{ settingOption: lab_categories.text, settingOption: lab_categories.text }" />
                                </div>
                            </div>

                            <!-- <input type="text" name="user_id" v-model="degrees.user_id" class="form-control" id="user_id" value="{{auth()->user()->id}}"> -->

                            <div class="col-sm-4 offset-sm-4">
                                <a href="/lab"><button type="button" class="btn btn-danger">Back</button></a>
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
    import Select2 from 'v-select2-component';

    export default {
        name: 'EditLabComponent',

        props: ['auth_id'],

        components: {Select2},

        data(){
            return {
                id : "",

                groups: [],

                lab_categories: [],

                labs:{
                    name: "",
                    unit: "",
                    range: "",
                    group_id: "",
                    labcategory_id: "",
                    user_id: "",
                },

            }
        },

        methods:{

            group(){
                axios.get('/api/groupData')
                .then(response => {
                    this.groups = response.data;
                })
            },

            labCategory(){
                axios.get('/api/labCategoryData')
                .then(response =>{
                    this.lab_categories = response.data;
                })
            },

            edit(){
                axios.get(`/api/labs/${this.id}`)
                .then(response => {
                    // console.log(response.data.info);
                    this.labs = response.data.info;
                })
            },

            update(){
                this.labs.user_id = this.auth_id;
                axios.put(`/api/labs/${this.id}`,this.labs)
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

            this.group();
            this.labCategory();
        }
    }
</script>
