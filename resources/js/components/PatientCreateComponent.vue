<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-10 offset-sm-1">

                <form action="">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group row">
                                <label for="" class="col-sm-4"><b>Name:</b></label>

                                <div class="col-sm-8">
                                    <input type="text" name="name" v-model="patients.name" class="form-control" id="name">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group row">
                                <label for="" class="col-sm-4"><b>gender:</b></label>

                                <div class="col-sm-8">
                                    <select name="gender" id="gender" v-model="patients.gender" class="form-control" placeholder="Choose gender...">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 mt-1">
                            <div class="form-group row">
                                <label for="" class="col-sm-4"><b>Age:</b></label>

                                <div class="col-sm-4">
                                    <input type="text" name="age" v-model="patients.age" class="form-control" id="age">
                                </div>

                                <div class="col-sm-2">
                                    <button class="btn btn-sm btn-primary">=</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 mt-1">
                            <div class="form-group row">
                                <label for="" class="col-sm-4"><b>Date of Birth:</b></label>

                                <div class="col-sm-4">
                                    <input type="text" name="dob" v-model="patients.dob" class="form-control date" id="dob">
                                </div>

                                <div class="col-sm-2">
                                    <button class="btn btn-sm btn-primary">=</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 mt-1">
                            <div class="form-group row">
                                <label for="" class="col-sm-4"><b>NRC:</b></label>

                                <div class="col-sm-8">
                                    <input type="text" name="nrc" v-model="patients.nrc" class="form-control" id="nrc">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 mt-1">
                            <div class="form-group row">
                                <label for="" class="col-sm-4"><b>Phone No:</b></label>

                                <div class="col-sm-8">
                                    <input type="text" name="phone" v-model="patients.phone" class="form-control" id="phone">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 mt-1">
                            <div class="form-group row">
                                <label for="" class="col-sm-4"><b>Address:</b></label>

                                <div class="col-sm-8">
                                    <input type="text" name="address" v-model="patients.address" class="form-control" id="address">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 mt-1">
                            <div class="form-group row">
                                <label for="" class="col-sm-4"><b>Next of Kin:</b></label>

                                <div class="col-sm-8">
                                    <input type="text" name="nextKin" v-model="patients.nextKin" class="form-control" id="nextKin">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 mt-1">
                            <div class="form-group row">
                                <label for="" class="col-sm-4"><b>Attendent:</b></label>

                                <div class="col-sm-8">
                                    <input type="text" name="attendent" v-model="patients.attendent" class="form-control" id="attendent">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 mt-1">
                            <div class="form-group row">
                                <label for="" class="col-sm-4"><b>Occupation:</b></label>

                                <div class="col-sm-8">
                                    <input type="text" name="occupation" v-model="patients.occupation" class="form-control" id="occupation">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 mt-1">
                            <div class="form-group row">
                                <label for="" class="col-sm-4"><b>Symptoms:</b></label>

                                <div class="col-sm-8">
                                    <input type="text" name="symptoms" v-model="patients.symptoms" class="form-control" id="symptoms">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 mt-1">
                            <div class="form-group row">
                                <label for="" class="col-sm-4"><b>Travel History:</b></label>

                                <div class="col-sm-8">
                                    <input type="text" name="travelHistory" v-model="patients.travelHistory" class="form-control" id="travelHistory">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 mt-1">
                            <div class="form-group row">
                                <label for="" class="col-sm-4"><b>Remark:</b></label>

                                <div class="col-sm-8">
                                    <input type="text" name="remark" v-model="patients.remark" class="form-control" id="remark">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 mt-1">
                            <div class="form-group row">
                                <label for="" class="col-sm-4"><b>Date:</b></label>

                                <div class="col-sm-8">
                                    <input type="text" name="date" v-model="patients.date" class="form-control datetime" id="date">
                                </div>

                            </div>
                        </div>

                        <div class="col-sm-6 offset-sm-6 mt-3 d-flex justify-content-center">
                            <a href="/"><button type="button" class="btn btn-md btn-danger">Home</button></a>
                            <button type="submit" class="btn btn-md btn-success" style="margin-left:2px;">Save</button>

                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'PatientCreateComponent',

        data(){
            return {
                patients : {
                    name : "",
                    gender: "",
                    age: "",
                    dob: "",
                    nrc: "",
                    phone: "",
                    address: "",
                    nextKin: "",
                    attendent: "",
                    occupation: "",
                    symptoms: "",
                    travelHistory: "",
                    remark: "",
                }
            }
        },
        methods:{
            calculateAge(){
                let date = new Date();
                let year = date.getYear();
                console.log(date);
            }
        },

        created(){
            this.calculateAge();
        }
    }
</script>
