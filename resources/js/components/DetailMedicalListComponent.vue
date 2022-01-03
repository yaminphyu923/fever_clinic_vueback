<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <span><b>Last Detail Medical List</b></span>
                        <a href="/medical"><button type="button" class="btn btn-sm btn-primary float-right mr-1"><b>Back</b></button></a>
                        <button type="button" class="btn btn-sm btn-primary float-right mr-1" data-toggle="modal" data-target="#addRefill"><b>Add New Refill</b></button>
                        <button type="button" class="btn btn-sm btn-primary float-right mr-1" data-toggle="modal" data-target="#addMedical"><b>Add New Out</b></button>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <h6 class="my-3">📌 Name : <b>{{medicalLists.name}}</b></h6>
                                <h6 class="my-3">📌 Start Date : <b>{{formatDate(medicalLists.in_date)}}</b></h6>

                            </div>

                            <div class="col-sm-6">
                                <h6 class="my-3">📌 Category : <b>{{(medicalLists.medicalcategory != null)? medicalLists.medicalcategory.name:"-"}}</b></h6>
                                <h6 class="my-3">📌 Final Stock : <b>{{medicalLists.remain}}</b></h6>
                                <!-- <h6 class="my-3">📌 Recent Out Stock : <b>{{medicalLists.out_quantity}}</b></h6> -->
                            </div>
                            <div class="col-sm-12">
                                <h6 class="my-3">📌 Note : <b>{{medicalLists.note}}</b></h6>
                            </div>
                        </div>

                        <div class="row d-flex justify-content-end my-3">
                            <div class="col-md-12">
                                <ul class="nav nav-tabs" role="tablist" style="margin-bottom: 30px;">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#out">Out Medical List</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#refill">Refill Medical List</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane active" id="out">

                                        <div class="col-sm-4 offset-sm-8 mb-3">
                                            <form @submit.prevent="index">
                                                <div class="input-group">
                                                    <input type="date" v-model="outSearch" placeholder="Search..." class="form-control">

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
                                                        <th>No.</th>
                                                        <th>Out Date</th>
                                                        <th>Out Quantity</th>
                                                        <th>Note</th>
                                                        <th>Approve By</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <tr v-for="(outmedical,index) in outMedicals.data" :key="outmedical.id">
                                                        <td>{{index+1}}</td>
                                                        <td>{{formatDate(outmedical.out_date)}}</td>
                                                        <td>{{outmedical.out_quantity}}</td>
                                                        <th>{{outmedical.note}}</th>
                                                        <th>{{(outmedical.doctor != null)?outmedical.doctor.name:"-"}}</th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <pagination :data="outMedicals" @pagination-change-page="index"></pagination>

                                    </div>

                                    <div class="tab-pane" id="refill">
                                        <div class="col-sm-4 offset-sm-8 mb-3">
                                            <form @submit.prevent="indexRefill">
                                                <div class="input-group">
                                                    <input type="date" v-model="refillSearch" placeholder="Search..." class="form-control">

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
                                                        <th>No.</th>
                                                        <th>Refill Date</th>
                                                        <th>Refill Quantity</th>
                                                        <th>Note</th>
                                                        <th>Approve By</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <tr v-for="(refill,index) in refills.data" :key="refill.id">
                                                        <td>{{index+1}}</td>
                                                        <td>{{formatDate(refill.refill_date)}}</td>
                                                        <td>{{refill.refill_quantity}}</td>
                                                        <th>{{refill.note}}</th>
                                                        <th>{{(refill.doctor != null)?refill.doctor.name:"-"}}</th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <pagination :data="refills" @pagination-change-page="indexRefill"></pagination>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="modal fade" id="addMedical" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Adding New Out</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form @submit.prevent="store">

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Out Date:</b></label>

                                        <div class="col-sm-8">
                                            <input type="date" name="out_date" v-model="outMedical.out_date" class="form-control" id="out_date" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Out Quantity:</b></label>

                                        <div class="col-sm-8">
                                            <input type="number" name="out_quantity" v-model="outMedical.out_quantity" class="form-control" id="out_quantity" min="1" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Note:</b></label>

                                        <div class="col-sm-8">
                                            <textarea v-model="outMedical.note" class="form-control" cols="30" rows="3"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-5"><b>Approved By Doctor</b></label>

                                        <div class="col-sm-7 se">
                                            <!-- <select v-model="outMedical.approve_doctor" class="form-control">
                                                <option v-for="doctor in doctors" :key="doctor.id" :value="doctor.id">{{doctor.name}}</option>
                                            </select> -->

                                            <Select2 v-model="outMedical.approve_doctor" :options="doctors" :settings="{ settingOption: doctors.text, settingOption: doctors.text }"/>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-success float-right ml-1">Save</button>
                                    <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Close</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="modal fade" id="addRefill" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Refill Medical List</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form @submit.prevent="storeRefill">

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Refill Date:</b></label>

                                        <div class="col-sm-8">
                                            <input type="date" name="refill_date" v-model="refill.refill_date" class="form-control" id="refill_date" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Refill Quantity:</b></label>

                                        <div class="col-sm-8">
                                            <input type="number" name="refill_quantity" v-model="refill.refill_quantity" class="form-control" id="refill_quantity" min="1" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4"><b>Note:</b></label>

                                        <div class="col-sm-8">
                                            <textarea v-model="refill.note" class="form-control" cols="30" rows="3"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-5"><b>Approved By Doctor</b></label>

                                        <div class="col-sm-7 se">
                                            <Select2 v-model="refill.doctor_id" :options="doctors" :settings="{ settingOption: doctors.text, settingOption: doctors.text }" style="width:250px;"/>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-success float-right ml-1">Save</button>
                                    <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Close</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import Select2 from 'v-select2-component';
    export default {

        name: 'DetailMedicalListComponent',

        props: ['auth_id'],

        components: {Select2},

        data(){
            return {
                id: "",
                medicalLists: {},

                doctors: [],

                outMedicals: {},

                refills: {},

                outMedical: {
                    out_date: "",
                    out_quantity: "",
                    note: "",
                    approve_doctor: "",
                    medical_list_id: "",
                    user_id: "",
                },

                refill: {
                    out_date: "",
                    out_quantity: "",
                    note: "",
                    doctor_id: "",
                    medical_list_id: "",
                    user_id: "",
                },

                outSearch: "",
                refillSearch: "",
            }
        },

        methods: {
            medicalList(){
                axios.get(`/api/medical_lists/${this.id}`)
                .then(response => {
                    this.medicalLists = response.data.info;
                })
            },

            doctor(){
                axios.get('/api/doctorData')
                .then(response => {
                    this.doctors = response.data;
                    // console.log(this.doctors);
                })
            },
            index(page=1){
                console.log(this.outSearch);
                axios.get(`/api/out_medical_paginate?page=${page}&search=${this.outSearch}`)
                .then(response => {
                    this.outMedicals = response.data.info;
                    console.log(this.outMedicals);
                })
            },

            store(){
                this.outMedical.user_id = this.auth_id;
                this.outMedical.medical_list_id = this.id;
                axios.post('/api/outmedical',this.outMedical)
                .then(response => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Creating successfully'
                    })
                })
                window.location.reload();
            },

            storeRefill(){
                this.refill.user_id = this.auth_id;
                this.refill.medical_list_id = this.id;
                axios.post('/api/refill',this.refill)
                .then(response => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Creating successfully'
                    })
                })
                window.location.reload();
            },

            indexRefill(page=1){
                axios.get(`/api/refill_paginate?page=${page}&search=${this.refillSearch}`)
                .then(response => {
                    this.refills = response.data.info;
                    // console.log(this.refills);
                })
            },

            formatDate(date) {
                return moment(date).format('DD/MM/YYYY');
            },
        },

        created(){
            var full_url = document.URL;
            var url_array = full_url.split('/');
            var id = url_array[url_array.length-1];
            this.id = id;

            this.medicalList();
            this.doctor();
            this.index();
            this.indexRefill();
        }
    }
</script>
