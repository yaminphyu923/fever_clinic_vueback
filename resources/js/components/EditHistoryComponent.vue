<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-10 offset-sm-1">
                <h3><b>Edit History</b></h3>
            </div>

            <div class="col-sm-12 my-5">
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
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#.</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="patient in patients.data" :key="patient.id">
                                <td>
                                    <span class="badge badge-warning">♦ Date - {{formatDate(patient.date)}}</span>
                                    <span class="text-primary"><b>Account Name - {{patient.user != null? patient.user.name : "-"}}
                                        (Email Address - {{patient.user != null? patient.user.email : "-"}})
                                    </b></span>

                                    <span>edited the patient data</span>

                                    <span class="text-primary"><b>Name - {{patient.name}}(NRC - {{patient.nrc}})</b></span>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                 <pagination :data="patients" @pagination-change-page="index"></pagination>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        name: 'EditHistoryComponent',

        data(){
            return {
                patients: {},
                search: "",
                users: {},
            }
        },

        methods: {
            user(){
                axios.get('/api/users')
                .then(response => {
                    this.users = response.data.info;
                    // console.log(response.data.info);
                })
            },
            index(page=1){
                axios.get(`/api/edit_history?page=${page}&search=${this.search}`)
                .then(response => {
                    this.patients = response.data.info;
                    console.log(this.patients);
                })
            },

            formatDate(date) {
                return moment(date).format('DD-MMM-YYYY h:mm a');
            },
        },
        created(){
            this.index();
            this.user();
        }
    }
</script>
