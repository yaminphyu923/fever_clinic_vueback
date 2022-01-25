<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <a href="/"><button type="button" class="btn btn-sm btn-outline-danger float-right mr-1"><b>Home</b></button></a>
                <a href="/medical"><button type="button" class="btn btn-sm btn-outline-danger float-right mr-1"><b>Back</b></button></a>
            </div>

            <div class="col-sm-12 mt-3">
                <h4><b>Prescriptive Medicine</b></h4>
                <div class="row">
                    <div class="col-sm-3 offset-sm-9 mb-3">
                        <form @submit.prevent="index">
                            <div class="input-group">
                                <input type="text" v-model="search" placeholder="Search..." class="form-control">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-sm btn-primary">🔎</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Date</th>
                                <th>Patient Name</th>
                                <th>Prescriptive Doctor</th>
                                <th>Drug Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="(pre,index) in pre_medicines.data" :key="pre.id">
                                <td>{{index+1}}</td>
                                <td>{{formatDate(pre.date)}}</td>
                                <td>{{(pre.patient != null)?pre.patient.name:"-"}}</td>
                                <td>{{(pre.doctor != null)?pre.doctor.name:"-"}}</td>
                                <!-- {{(pre.medicalList != null)?pre.medicalList.name:"-"}} -->
                                <td>{{(pre.medical_list != null)?pre.medical_list.name:"-"}}</td>
                                <td>
                                    <form>
                                        <!-- <input type="text" :value="pre.id"> -->
                                        <button type="button" class="btn btn-sm btn-primary" @click="out(pre.id)">Out</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <pagination :data="pre_medicines" @pagination-change-page="index"></pagination>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'PrescriptiveMedicineComponent',

    data(){
        return {
            pre_medicines : {},

            search: "",
        }
    },

    methods: {
        index(page=1){
            axios.get(`/api/pre_medicines_paginate?page=${page}&search=${this.search}`)
            .then(response => {
                this.pre_medicines = response.data.info;
            })
        },
        formatDate(date) {
            return moment(date).format('DD/MM/YYYY');
        },

        out(id){
            axios.put(`/api/pre_medicines/${id}`)
            .then(response => {
                Toast.fire({
                    icon: 'success',
                    title: 'Out Patient Successfully'
                })
            })
        }
    },

    created(){
        this.index();
    }
}
</script>
