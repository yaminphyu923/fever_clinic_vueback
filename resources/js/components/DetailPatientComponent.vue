<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-10 offset-sm-1">
                <h4>Patient Name - <b><span class="text-danger">{{patients.name}}</span></b></h4>
            </div>

            <div class="col-sm-12 mt-2">
                <a href="/"><button class="btn btn-md btn-primary"><b>◀ Back</b></button></a>
                <button type="button" class="btn btn-md btn-primary" @click="print"><b>🖨 Print this Patient</b></button>
                <a :href="'/pdf/'+patients.id"><button class="btn btn-md btn-primary"><b>📁 Export PDF</b></button></a>
                <a :href="'/new-patient/'+patients.id"><button class="btn btn-md btn-primary"><b>➕ Create New Medical History</b></button></a>
                <a :href="'/edit-pat/'+patients.id"><button class="btn btn-md btn-primary"><b>📝 Edit Patient</b></button></a>
            </div>

            <div class="col-sm-12 my-5">
                <h4><b>Patient Information</b></h4>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Name</th>
                                <th>NRC</th>
                                <th>Phone</th>
                                <th>Gender</th>
                                <th>Age</th>
                                <th>Address</th>
                                <th>Next of Kin</th>
                                <th>Attendent</th>
                                <th>Occupation</th>
                                <th>Symptoms</th>
                                <th>Travel History</th>
                                <th>Remark</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{formatDate(patients.date)}}</td>
                                <td>{{patients.name}}</td>
                                <td>{{patients.nrc}}</td>
                                <td>{{patients.phone}}</td>
                                <td>{{patients.gender}}</td>
                                <td>{{patients.age}}</td>
                                <td>{{patients.address}}</td>
                                <td>{{patients.nextKin}}</td>
                                <td>{{patients.attendent}}</td>
                                <td>{{patients.occupation}}</td>
                                <td>{{patients.symptoms}}</td>
                                <td>{{patients.travelHistory}}</td>
                                <td>{{patients.remark}}</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-danger" @click="destroy(id)" v-if="patient_delete">🗑</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-sm-12" v-if="hospital_list">
                <h4><b>Hospital Information</b></h4>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Hospital ID</th>
                                <th>Patient ID</th>
                                <th>Admission No</th>
                                <th>Police Case</th>
                                <th>Doctors with Multiple Choice</th>
                                <th>Incharge Doctor</th>
                                <!-- <th>Created</th> -->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="hospital in hospitals.data" :key="hospital.id">
                                <td>{{formatDate(hospital.date)}}</td>
                                <td>{{hospital.id}}</td>
                                <td>{{hospital.patient_id}}</td>
                                <td>{{hospital.admission}}</td>
                                <td>{{hospital.police_case}}</td>
                                <td>{{hospital.doctor_multiple_id}}</td>
                                <td>{{hospital.doctor_incharge_id}}</td>
                                <!-- <td>{{formatDay(hospital.created_at)}}</td> -->
                                <td>
                                    <a :href="'/edit-patient/' + hospital.patient_id + '/' +hospital.id + '/' + formatDay(hospital.created_at)" v-if="hospital_edit"><button class="btn btn-sm btn-outline-warning" data-toggle="tooltip" title="Detail">👁</button></a>
                                    <button class="btn btn-sm btn-outline-danger" data-toggle="tooltip" title="Delete" @click="allDestroy(hospital.id)" v-if="hospital_delete">🗑</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <pagination :data="hospitals" @pagination-change-page="detailPatientHospital"></pagination>
            </div>



        </div>
        <div class="row justify-content-center ml-5" style="display:none;">
            <div class="col-sm-12" id="printMe">
                <div class="row my-5">
                    <div class="col-sm-3 col-3 text-right">
                        <img :src="img" alt="" style="width:50px;height:50px;">
                    </div>
                    <div class="col-sm-9 col-9">
                        <h4><b>Covid Center</b></h4>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <span v-if="patients.date" class="w-25"><b>Date Time -</b> {{formatDate(patients.date)}}</span>
                    <span v-if="patients.name" class="w-25"><b>Patient Name -</b> {{patients.name}}</span>
                    <span v-if="patients.nrc" class="w-25"><b>NRC -</b> {{patients.nrc}}</span>
                    <span v-if="patients.phone" class="w-25"><b>Phone -</b> {{patients.phone}}</span>
                </div>

                <div class="d-flex justify-content-between">
                    <span v-if="patients.gender" class="w-25"><b>Gender -</b> {{patients.gender}}</span>
                    <span v-if="patients.age" class="w-25"><b>Age -</b> {{patients.age}}</span>
                    <span v-if="patients.address" class="w-25"><b>Address -</b> {{patients.address}}</span>
                    <span v-if="patients.nextKin" class="w-25"><b>Next Kin -</b> {{patients.nextKin}}</span>
                </div>

                <div class="d-flex justify-content-between">
                    <span v-if="patients.attendent" class="w-25"><b>Attendent -</b> {{patients.attendent}}</span>
                    <span v-if="patients.occupation" class="w-25"><b>Occupation -</b> {{patients.occupation}}</span>
                    <span v-if="patients.symptoms" class="w-25"><b>Symptoms -</b> {{patients.symptoms}}</span>
                    <span v-if="patients.travelHistory" class="w-25"><b>Travel History -</b> {{patients.travelHistory}}</span>
                </div>

                <div class="d-flex justify-content-between">
                    <span v-if="patients.remark" class="w-100"><b>Remark -</b> {{patients.remark}}</span>
                </div>

                <div class="my-3">
                    <h4 class="text-danger" v-if="hosPrints.length"><b>Hospital</b></h4>

                    <div v-for="(hosPrint,index) in hosPrints" :key="index" style="margin-bottom: 18px;">
                        <div class="d-flex justify-content-between">
                            <span v-if="hosPrint.date" class="w-25"><b>Date -</b> {{formatDate(hosPrint.date)}}</span>
                            <span v-if="hosPrint.admission" class="w-25"><b>Admission -</b> {{hosPrint.admission}}</span>
                            <span v-if="hosPrint.police_case" class="w-25"><b>Police Case -</b> {{hosPrint.police_case}}</span>
                            <span v-if="hosPrint.doctor_multiple_id" class="w-25"><b>Doctor -</b> {{(hosPrint.doctor != null) ? hosPrint.doctor.name : ''}}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span v-if="hosPrint.doctor_incharge_id" class="w-25"><b>Doctor Incharge -</b> {{(hosPrint.doctor_incharge != null) ? hosPrint.doctor_incharge.name : ''}}</span>
                            <span v-if="hosPrint.fever" class="w-25"><b>Fever -</b> {{hosPrint.fever}}</span>
                            <span v-if="hosPrint.sore_throat" class="w-25"><b>Sore Throat -</b> {{hosPrint.sore_throat}}</span>
                            <span v-if="hosPrint.chills" class="w-25"><b>Chills -</b> {{hosPrint.chills}}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span v-if="hosPrint.shaking_chills" class="w-25"><b>Repeated shaking with chills -</b> {{hosPrint.shaking_chills}}</span>
                            <span v-if="hosPrint.headache" class="w-25"><b>Headache -</b> {{hosPrint.headache}}</span>
                            <span v-if="hosPrint.taste_smell" class="w-25"><b>New loss of taste or smell -</b> {{hosPrint.taste_smell}}</span>
                            <span v-if="hosPrint.malaise" class="w-25"><b>Malaise/Myalgia -</b> {{hosPrint.malaise}}</span>
                        </div>

                        <div class="d-flex justify-content-between">
                            <span v-if="hosPrint.bed_id" class="w-25"><b>Bed -</b> {{(hosPrint.bed != null) ? hosPrint.bed.name : ''}}</span>
                            <span v-if="hosPrint.headache" class="w-25"><b>Headache -</b> {{hosPrint.headache}}</span>
                            <span v-if="hosPrint.taste_smell" class="w-25"><b>New loss of taste or smell -</b> {{hosPrint.taste_smell}}</span>
                            <span v-if="hosPrint.malaise" class="w-25"><b>Malaise/Myalgia -</b> {{hosPrint.malaise}}</span>
                        </div>

                        <div class="d-flex justify-content-between">
                            <span v-if="hosPrint.odema" class="w-25"><b>Odema -</b> {{hosPrint.odema}}</span>
                            <span v-if="hosPrint.date_onset" class="w-25"><b>Date of onset -</b> {{hosPrint.date_onset}}</span>
                            <span v-if="hosPrint.date_covid" class="w-25"><b>Date of Covid (+) -</b> {{hosPrint.date_covid}}</span>
                            <span v-if="hosPrint.refer_to" class="w-25"><b>Refer To -</b> {{hosPrint.refer_to}}</span>
                        </div>

                        <div class="d-flex justify-content-between">
                            <span v-if="hosPrint.others" class="w-100"><b>Others -</b> {{hosPrint.others}}</span>
                        </div>
                    </div>
                </div>

                <div class="my-3">
                    <h4 class="text-danger" v-if="pastPrints.length"><b>Past Medical History</b></h4>
                    <div v-for="pastPrint in pastPrints" :key="pastPrint.id" style="margin-bottom: 18px;">

                        <div class="d-flex justify-content-between">
                            <span v-if="pastPrint.dm" class="w-25"><b>DM -</b> {{pastPrint.dm}}</span>
                            <span v-if="pastPrint.ht" class="w-25"><b>H/T -</b> {{pastPrint.ht}}</span>
                            <span v-if="pastPrint.ihd" class="w-25"><b>IHD -</b> {{pastPrint.ihd}}</span>
                            <span v-if="pastPrint.stroke" class="w-25"><b>Stroke -</b> {{pastPrint.stroke}}</span>
                        </div>

                        <div class="d-flex justify-content-between">
                            <span v-if="pastPrint.renal" class="w-25"><b>Renal Problem -</b> {{pastPrint.renal}}</span>
                            <span v-if="pastPrint.liver" class="w-25"><b>Liver Problem -</b> {{pastPrint.liver}}</span>
                            <span v-if="pastPrint.bleeding" class="w-25"><b>Bleeding History -</b> {{pastPrint.bleeding}}</span>
                            <span v-if="pastPrint.como" class="w-25"><b>Comobidity -</b> {{pastPrint.como}} <b>{{pastPrint.comobidity}}</b></span>
                        </div>

                        <div class="d-flex justify-content-between">
                            <span v-if="pastPrint.past" class="w-25"><b>Past History -</b> {{pastPrint.past}}</span>
                            <span v-if="pastPrint.drug" class="w-25"><b>Drug History -</b> {{pastPrint.drug}}</span>
                            <span v-if="pastPrint.drug_allergy" class="w-25"><b>Drug Allergy -</b> {{pastPrint.drug_allergy}}</span>
                            <span v-if="pastPrint.last_meal" class="w-25"><b>Last Meal -</b> {{pastPrint.last_meal}}</span>
                        </div>

                        <div class="d-flex justify-content-between">
                            <span v-if="pastPrint.smoking" class="w-25"><b>Smoking -</b> {{pastPrint.smoking}}</span>
                            <span v-if="pastPrint.alcohol" class="w-25"><b>Alcohol -</b> {{pastPrint.alcohol}}</span>
                            <span v-if="pastPrint.pregnancy" class="w-25"><b>Pregnancy -</b> {{pastPrint.pregnancy}}</span>
                            <span v-if="pastPrint.recent_drugs" class="w-25"><b>Recent Drugs -</b> {{pastPrint.recent_drugs}}</span>
                        </div>

                        <div class="d-flex justify-content-between">
                            <span v-if="pastPrint.regular_drugs" class="w-25"><b>Regular Drugs -</b> {{pastPrint.regular_drugs}}</span>
                            <span v-if="pastPrint.medication" class="w-25"><b>Medication -</b> {{pastPrint.medication}}</span>
                            <span v-if="pastPrint.system_enquery" class="w-25"><b>System Enquery -</b> {{pastPrint.system_enquery}}</span>
                            <span v-if="pastPrint.pre_hospital" class="w-25"><b>Pre_hospital Treatment -</b> {{pastPrint.pre_hospital}}</span>
                        </div>
                    </div>
                </div>

                <div class="my-3">
                    <h4 class="text-danger" v-if="physicalPrints.length"><b>Physical Examination</b></h4>
                    <div v-for="physicalPrint in physicalPrints" :key="physicalPrint.id" style="margin-bottom: 18px;">

                        <div class="d-flex justify-content-between">
                            <span v-if="physicalPrint.temperature" class="w-25"><b>Temperature -</b> {{physicalPrint.temperature}}</span>
                            <span v-if="physicalPrint.ecg" class="w-25"><b>ECG -</b> {{physicalPrint.ecg}}</span>
                            <span v-if="physicalPrint.rbs" class="w-25"><b>RBS -</b> {{physicalPrint.rbs}}</span>
                            <span v-if="physicalPrint.spo2" class="w-25"><b>SPO2 -</b> {{physicalPrint.spo2}}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span v-if="physicalPrint.bp" class="w-25"><b>BP -</b> {{physicalPrint.bp}}</span>
                            <span v-if="physicalPrint.pr" class="w-25"><b>PR -</b> {{physicalPrint.pr}}</span>
                            <span v-if="physicalPrint.rr" class="w-25"><b>RR -</b> {{physicalPrint.rr}}</span>
                            <span v-if="physicalPrint.well_orientated || physicalPrint.pain || physicalPrint.voice || physicalPrint.no_response" class="w-25"><b>Conscious Level -</b> {{(physicalPrint.well_orientated == 1) ? 'Well-orientated' : ''}} , {{(physicalPrint.pain == 1) ? 'Respond to Pain' : ''}} , {{(physicalPrint.voice == 1) ? 'Respond to Voice' : ''}} , {{(physicalPrint.no_response == 1) ? 'No Response' : ''}}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span v-if="physicalPrint.general" class="w-25"><b>General -</b> {{physicalPrint.general}}</span>
                            <span v-if="physicalPrint.head_neck" class="w-25"><b>Head & Neck -</b> {{physicalPrint.head_neck}}</span>
                            <span v-if="physicalPrint.chest" class="w-25"><b>Chest -</b> {{physicalPrint.chest}}</span>
                            <span v-if="physicalPrint.abdomen_pelvic" class="w-25"><b>Abdomen & Pelvic -</b> {{physicalPrint.abdomen_pelvic}}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span v-if="physicalPrint.spine" class="w-25"><b>Spine -</b> {{physicalPrint.spine}}</span>
                            <span v-if="physicalPrint.upper_right" class="w-25"><b>Right Upper Limbs -</b> {{physicalPrint.upper_right}}</span>
                            <span v-if="physicalPrint.upper_left" class="w-25"><b>Left Upper Limbs -</b> {{physicalPrint.upper_left}}</span>
                            <span v-if="physicalPrint.lower_right" class="w-25"><b>Right Lower Limbs -</b> {{physicalPrint.lower_right}}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span v-if="physicalPrint.lower_left" class="w-25"><b>Left Lower Limbs -</b> {{physicalPrint.lower_left}}</span>
                            <span v-if="physicalPrint.refer_case" class="w-25"><b>Referred case -</b> {{physicalPrint.refer_case}}</span>
                            <span v-if="physicalPrint.other" class="w-50"><b>Other relevant findings -</b> {{physicalPrint.other}}</span>
                        </div>
                    </div>
                </div>

                <div class="my-3">
                    <h4 class="text-danger" v-if="diagnosisPrints.length"><b>Diagnosis</b></h4>
                    <div v-for="diagnosisPrint in diagnosisPrints" :key="diagnosisPrint.id" style="margin-bottom: 18px;">

                        <div class="d-flex justify-content-between">
                            <span v-if="diagnosisPrint.diagnosis" class="w-25"><b>Diagnosis -</b> {{diagnosisPrint.diagnosis}}</span>
                            <span v-if="diagnosisPrint.information" class="w-25"><b>Information on Diagnosis -</b> {{diagnosisPrint.information}}</span>
                            <span v-if="diagnosisPrint.treatment" class="w-50"><b>Treatment Plan -</b> {{diagnosisPrint.treatment}}</span>
                        </div>
                    </div>
                </div>


                <div class="my-3">
                    <h4 class="text-danger" v-if="investPrints.length"><b>Investigation</b></h4>
                    <div v-for="investPrint in investPrints" :key="investPrint.id" style="margin-bottom: 18px;">

                        <div class="d-flex justify-content-between">
                            <span v-if="investPrint.doctor_id" class="w-25"><b>Pathologist -</b> {{(investPrint.doctor != null) ? investPrint.doctor.name : ''}}</span>
                            <span v-if="investPrint.date_requested" class="w-25"><b>Date Requested -</b> {{formatDate(investPrint.date_requested)}}</span>
                            <span v-if="investPrint.date_analysis" class="w-25"><b>Date of Analysis -</b> {{formatDate(investPrint.date_analysis)}}</span>
                            <span v-if="investPrint.doctor_test" class="w-25"><b>Doctor who requested the test -</b> {{investPrint.doctor_test}}</span>
                        </div>

                        <div class="d-flex justify-content-between">
                            <span v-if="investPrint.queue" class="w-25"><b>Queue -</b> {{investPrint.queue}}</span>
                            <span v-if="investPrint.image" class="w-25"><b>Image -</b> <img :src="investUrl()+investPrint.image" alt="" :style="imgStyle"></span>
                            <span v-if="investPrint.exam_request" class="w-25"><b>Examination Request -</b> {{investPrint.exam_request}}</span>
                            <span v-if="investPrint.note" class="w-25"><b>Brief Clinical Note -</b> {{investPrint.note}}</span>
                        </div>

                        <div class="d-flex justify-content-between">
                            <span v-if="investPrint.value" class="w-25"><b>Value -</b> {{investPrint.value}}</span>
                            <span v-if="investPrint.remark" class="w-25"><b>Remark -</b> {{investPrint.remark}}</span>
                            <span v-if="investPrint.lab_name" class="w-25"><b>Name	 -</b> {{investPrint.lab_name}}</span>
                            <span v-if="investPrint.lab_unit" class="w-25"><b>Unit -</b> {{investPrint.lab_unit}}</span>
                        </div>

                        <div class="d-flex justify-content-between">
                            <span v-if="investPrint.lab_range" class="w-25"><b>Normal Range	 -</b> {{investPrint.lab_range}}</span>
                            <span v-if="investPrint.group_id" class="w-25"><b>Group -</b> {{(investPrint.group != null ) ? investPrint.group.name : ''}}</span>
                            <span v-if="investPrint.labcategory_id" class="w-50"><b>Category -</b> {{(investPrint.labcategory != null) ? investPrint.labcategory.name : ''}}</span>
                        </div>
                    </div>
                </div>


                <div class="my-3">
                    <h4 class="text-danger" v-if="treatmentPrints.length"><b>Treatment</b></h4>
                    <div v-for="treatmentPrint in treatmentPrints" :key="treatmentPrint.id" style="margin-bottom: 18px;">

                        <div class="d-flex justify-content-between">
                            <span v-if="treatmentPrint.note" class="w-25"><b>Quick Note -</b> {{treatmentPrint.note}}</span>
                            <span v-if="treatmentPrint.doctor_id" class="w-25"><b>Physician -</b> {{(treatmentPrint.doctor != null) ? treatmentPrint.doctor.name : ''}}</span>
                            <span v-if="treatmentPrint.pharmacy" class="w-25"><b>Pharmacy -</b> {{treatmentPrint.pharmacy}}</span>
                            <span v-if="treatmentPrint.pre_date" class="w-25"><b>Prescription Date -</b> {{formatDate(treatmentPrint.pre_date)}}</span>
                        </div>

                        <div class="d-flex justify-content-between">
                            <span v-if="treatmentPrint.queue" class="w-25"><b>Queue -</b> {{treatmentPrint.queue}}</span>
                            <span v-if="treatmentPrint.medical_list_id" class="w-25"><b>Drug -</b> {{(treatmentPrint.medical_list != null) ? treatmentPrint.medical_list.name : ''}}</span>
                            <span v-if="treatmentPrint.dose" class="w-25"><b>Dose -</b> {{treatmentPrint.dose}}</span>
                            <span v-if="treatmentPrint.frequency" class="w-25"><b>Frequency -</b>  {{treatmentPrint.frequency}}</span>
                        </div>

                        <div class="d-flex justify-content-between">
                            <span v-if="treatmentPrint.start_date" class="w-25"><b>Starting Date -</b> {{formatDate(treatmentPrint.start_date)}}</span>
                            <span v-if="treatmentPrint.end_date" class="w-25"><b>Ending Date -</b> {{formatDate(treatmentPrint.end_date)}}</span>
                            <span v-if="treatmentPrint.remark" class="w-50"><b>Remark -</b> {{treatmentPrint.remark}}</span>
                        </div>
                    </div>
                </div>

                <div class="my-3">
                    <h4 class="text-danger" v-if="deadPrints.length"><b>Dead</b></h4>
                    <div v-for="deadPrint in deadPrints" :key="deadPrint.id" style="margin-bottom: 18px;">

                        <div class="d-flex justify-content-between">
                            <span v-if="deadPrint.dead_time" class="w-25"><b>Dead Time -</b> {{deadPrint.dead_time}}</span>
                            <span v-if="deadPrint.cause" class="w-25"><b>Cause -</b> {{deadPrint.cause}}</span>
                            <span v-if="deadPrint.doctor_id" class="w-25"><b>Confirm By -</b> {{(deadPrint.doctor != null) ? deadPrint.doctor.name : ''}}</span>
                            <span v-if="deadPrint.note" class="w-25"><b>Note -</b> {{deadPrint.note}}</span>
                        </div>
                    </div>
                </div>

                <div class="my-3">
                    <h4 class="text-danger" v-if="dischargePrints.length"><b>Discharge</b></h4>
                    <div v-for="dischargePrint in dischargePrints" :key="dischargePrint.id" style="margin-bottom: 18px;">

                        <div class="d-flex justify-content-between">
                            <span v-if="dischargePrint.time" class="w-25"><b>Discharge Time -</b> {{formatDate(dischargePrint.time)}}</span>
                            <span v-if="dischargePrint.place" class="w-25"><b>Place -</b> {{dischargePrint.place}}</span>
                            <span v-if="dischargePrint.opd" class="w-25"><b>OPD -</b> {{dischargePrint.opd}}</span>
                            <span v-if="dischargePrint.admission" class="w-25"><b>Admission -</b> {{dischargePrint.admission}}</span>
                        </div>

                        <div class="d-flex justify-content-between">
                            <span v-if="dischargePrint.refer_to" class="w-25"><b>Refer To -</b> {{dischargePrint.refer_to}}</span>
                            <span v-if="dischargePrint.pr" class="w-25"><b>PR -</b> {{dischargePrint.pr}} /min</span>
                            <span v-if="dischargePrint.spo2" class="w-25"><b>SPO2 -</b> {{dischargePrint.spo2}} %</span>
                            <span v-if="dischargePrint.bp" class="w-25"><b>BP -</b> {{dischargePrint.bp}} mmHg</span>
                        </div>

                        <div class="d-flex justify-content-between">
                            <span v-if="dischargePrint.gcs" class="w-100"><b>GCS -</b> {{dischargePrint.gcs}}</span>

                        </div>
                    </div>
                </div>

                <div class="my-3">
                    <h4 class="text-danger" v-if="progressPrints.length"><b>Progress Note</b></h4>
                    <div v-for="progressPrint in progressPrints" :key="progressPrint.id" style="margin-bottom: 18px;">

                        <div class="d-flex justify-content-between">
                            <span v-if="progressPrint.progress_note" class="w-100"><b></b> <iframe :src="progressUrl()+progressPrint.progress_note" frameborder="0" width="100%"></iframe></span>
                        </div>
                    </div>
                </div>

                <div class="my-3">
                    <h4 class="text-danger" v-if="ptPrints.length"><b>PtOverall</b></h4>
                    <div v-for="ptPrint in ptPrints" :key="ptPrint.id" style="margin-bottom: 18px;">

                        <div class="d-flex justify-content-between">
                            <span v-if="ptPrint.date" class="w-50"><b>Date -</b> {{formatDay(ptPrint.date)}}</span>
                            <span v-if="ptPrint.text" class="w-50"><b>Text -</b> {{ptPrint.text}}</span>

                        </div>
                    </div>
                </div>

                <div class="my-3">
                    <h4 class="text-danger" v-if="monitoringPrints.length"><b>Monitoring</b></h4>
                    <div v-for="monitoringPrint in monitoringPrints" :key="monitoringPrint.id" style="margin-bottom: 18px;">

                        <div class="d-flex justify-content-between">
                            <span v-if="monitoringPrint.pr" class="w-25"><b>PR -</b> {{monitoringPrint.pr}}</span>
                            <span v-if="monitoringPrint.crt" class="w-25"><b>CRT -</b> {{monitoringPrint.crt}}</span>
                            <span v-if="monitoringPrint.emergency" class="w-25"><b>Emergency -</b> {{monitoringPrint.emergency}}</span>
                            <span v-if="monitoringPrint.t" class="w-25"><b>T -</b> {{monitoringPrint.t}}</span>
                        </div>

                        <div class="d-flex justify-content-between">
                            <span v-if="monitoringPrint.spo2" class="w-25"><b>SPO2 -</b> {{monitoringPrint.spo2}}</span>
                            <span v-if="monitoringPrint.rbs" class="w-25"><b>RBS -</b> {{monitoringPrint.rbs}}</span>
                            <span v-if="monitoringPrint.gcs" class="w-25"><b>GCS -</b> {{monitoringPrint.gcs}}</span>
                            <span v-if="monitoringPrint.pupil" class="w-25"><b>Pupil -</b> {{monitoringPrint.pupil}}</span>
                        </div>

                        <div class="d-flex justify-content-between">
                            <span v-if="monitoringPrint.bp" class="w-25"><b>BP -</b> {{monitoringPrint.bp}}</span>
                            <span v-if="monitoringPrint.urine" class="w-25"><b>Urine Output -</b> {{monitoringPrint.urine}}</span>
                            <span v-if="monitoringPrint.date" class="w-25"><b>Date -</b> {{formatDate(monitoringPrint.date)}}</span>
                            <span v-if="monitoringPrint.tx" class="w-25"><b>TX -</b> {{monitoringPrint.tx}}</span>
                        </div>

                        <div class="d-flex justify-content-between">
                            <span v-if="monitoringPrint.pain_score" class="w-100"><b>Pain Score -</b> {{monitoringPrint.pain_score}}</span>
                        </div>
                    </div>
                </div>

                <div class="my-3">
                    <h4 class="text-danger" v-if="imagingPrints.length"><b>Imaging</b></h4>
                    <div v-for="imagingPrint in imagingPrints" :key="imagingPrint.id" style="margin-bottom: 18px;">

                        <div class="d-flex justify-content-between">
                            <span v-if="imagingPrint.doctor_id" class="w-25"><b>Doctor who requested the test -</b> {{(imagingPrint.doctor != null) ? imagingPrint.doctor.name : ''}}</span>
                            <span v-if="imagingPrint.date_requested" class="w-25"><b>Date Requested -</b> {{formatDate(imagingPrint.date_requested)}}</span>
                            <span v-if="imagingPrint.date_analysis" class="w-25"><b>Date of Analysis -</b> {{formatDate(imagingPrint.date_analysis)}}</span>
                            <span v-if="imagingPrint.image1" class="w-25"><b>Image1 -</b> <img :src="imageOneUrl()+imagingPrint.image1" :style="imgStyle" alt=""></span>
                        </div>

                        <div class="d-flex justify-content-between">
                            <span v-if="imagingPrint.image2" class="w-25"><b>Image2 -</b> <img :src="imageTwoUrl()+imagingPrint.image2" :style="imgStyle" alt=""></span>
                            <span v-if="imagingPrint.image3" class="w-25"><b>Image3 -</b> <img :src="imageThreeUrl()+imagingPrint.image3" :style="imgStyle" alt=""></span>
                            <span v-if="imagingPrint.image4" class="w-25"><b>Image4 -</b> <img :src="imageFourUrl()+imagingPrint.image4" :style="imgStyle" alt=""></span>
                            <span v-if="imagingPrint.image5" class="w-25"><b>Image5 -</b> <img :src="imageFiveUrl()+imagingPrint.image5" :style="imgStyle" alt=""></span>
                        </div>

                        <div class="d-flex justify-content-between">
                            <span v-if="imagingPrint.image6" class="w-25"><b>Image6 -</b> <img :src="imageSixUrl()+imagingPrint.image6" :style="imgStyle" alt=""></span>
                            <span v-if="imagingPrint.analysis" class="w-25"><b>Analysis -</b> {{imagingPrint.analysis}}</span>
                            <span v-if="imagingPrint.conclusion" class="w-50"><b>Conclusion -</b> {{imagingPrint.conclusion}}</span>

                        </div>
                    </div>
                </div>

                <div class="my-3">
                    <h4 class="text-danger" v-if="consultPrints.length"><b>Consultation</b></h4>
                    <div v-for="consultPrint in consultPrints" :key="consultPrint.id" style="margin-bottom: 18px;">

                        <div class="d-flex justify-content-between">
                            <span v-if="consultPrint.consultation" class="w-50"><b>Consultation -</b> {{consultPrint.consultation}}</span>
                            <span v-if="consultPrint.note" class="w-50"><b>Consultation Note -</b> {{consultPrint.note}}</span>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'DetailPatientComponent',

        props: ['auth_id'],

        data(){
            return {
                patients : {},

                hospitals: {},

                hosPrints: {},

                pastPrints: {},

                physicalPrints: {},

                diagnosisPrints: {},

                investPrints: {},

                treatmentPrints: {},

                deadPrints: {},

                dischargePrints: {},

                progressPrints: {},

                ptPrints: {},

                monitoringPrints: {},

                imagingPrints: {},

                consultPrints: {},

                search: "",

                id: "",

                img: '../logos/clinic.png',

                patient_delete: false,

                hospital_list : false,

                hospital_edit : false,

                hospital_delete : false,

                imgStyle : {
                    width: '70px',
                    height: '70px',
                }
            }
        },

        methods: {
            print () {
                this.$htmlToPaper('printMe', null, () => {
                    console.log('Printing completed or was cancelled!');
                });
            },

            edit(){
                axios.get(`/api/patients/${this.id}`)
                .then(response => {
                    //console.log(response.data.info);
                    this.patients = response.data.info;
                })
            },

            hospitalPrint(){
                axios.get(`/api/detailHospitalPrint/${this.id}`)
                .then(response => {
                    //console.log(response.data.info);
                    this.hosPrints = response.data.info;
                    // console.log(this.hosPrints);
                })
            },

            pastPrint(){
                axios.get(`/api/detailPastPrint/${this.id}`)
                .then(response => {
                    //console.log(response.data.info);
                    this.pastPrints = response.data.info;
                    //console.log(this.pastPrints);
                })
            },

            physicalPrint(){
                axios.get(`/api/detailPhysicalPrint/${this.id}`)
                .then(response => {
                    //console.log(response.data.info);
                    this.physicalPrints = response.data.info;
                    //console.log(this.pastPrints);
                })
            },

            diagnosisPrint(){
                axios.get(`/api/detailDiagnosisPrint/${this.id}`)
                .then(response => {
                    //console.log(response.data.info);
                    this.diagnosisPrints = response.data.info;
                    //console.log(this.pastPrints);
                })
            },

            investPrint(){
                axios.get(`/api/detailInvestigationPrint/${this.id}`)
                .then(response => {
                    //console.log(response.data.info);
                    this.investPrints = response.data.info;
                    //console.log(this.pastPrints);
                })
            },

            treatmentPrint(){
                axios.get(`/api/detailTreatmentPrint/${this.id}`)
                .then(response => {
                    //console.log(response.data.info);
                    this.treatmentPrints = response.data.info;
                })
            },

            deadPrint(){
                axios.get(`/api/detailDeadPrint/${this.id}`)
                .then(response => {
                    //console.log(response.data.info);
                    this.deadPrints = response.data.info;
                })
            },

            dischargePrint(){
                axios.get(`/api/detailDischargePrint/${this.id}`)
                .then(response => {
                    //console.log(response.data.info);
                    this.dischargePrints = response.data.info;
                })
            },

            progressPrint(){
                axios.get(`/api/detailProgressPrint/${this.id}`)
                .then(response => {
                    //console.log(response.data.info);
                    this.progressPrints = response.data.info;
                })
            },

            ptPrint(){
                axios.get(`/api/detailPtOverallPrint/${this.id}`)
                .then(response => {
                    //console.log(response.data.info);
                    this.ptPrints = response.data.info;
                })
            },
            monitoringPrint(){
                axios.get(`/api/detailMonitoringPrint/${this.id}`)
                .then(response => {
                    //console.log(response.data.info);
                    this.monitoringPrints = response.data.info;
                })
            },

            imagingPrint(){
                axios.get(`/api/detailImagingPrint/${this.id}`)
                .then(response => {
                    //console.log(response.data.info);
                    this.imagingPrints = response.data.info;
                })
            },

            consultPrint(){
                axios.get(`/api/detailConsultationPrint/${this.id}`)
                .then(response => {
                    //console.log(response.data.info);
                    this.consultPrints = response.data.info;
                })
            },


            detailPatientHospital(page=1){
                axios.get(`/api/detailPatientHospital/${this.id}?page=${page}`)
                .then(response => {
                    this.hospitals = response.data.info;
                    //console.log(this.hospitals);
                })
            },

            formatDate(date) {
                return moment(date).format('DD-MMM-YYYY h:mm a');
            },

            formatDay(date){
                return moment(date).format('DD-MMM-YYYY');
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
                        axios.delete(`/api/patients/${id}`)
                        .then(response => {
                            this.index();
                            Swal.fire({ title: 'Deleted!',icon: 'success', })
                        })
                    }
                   window.location.href = "/";
                })
            },

            allDestroy(id){
                Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Delete'
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios.delete(`/api/hospitals/${id}`)
                        .then(response => {
                            this.index();
                            Swal.fire({ title: 'Deleted!',icon: 'success', })
                        })
                    }
                   window.location.reload();
                })
            },

             user(){
                axios.get(`/api/get_auth_user/${this.auth_id}`)
                .then(response => {
                    // console.log(response.data.info);
                    this.auth_user = response.data.user;
                    this.role = response.data.role;
                    this.permissions = response.data.permissions;

                    //console.log(response);
                    this.checkPermission();
                });


            },

            checkPermission(){

                this.permissions.forEach((item) => {

                    //console.log(item);

                    if(item.name == 'patient-delete'){
                        this.patient_delete = true;
                    }

                    if(item.name == 'hospital-list'){
                        this.hospital_list = true;
                    }

                    if(item.name == 'hospital-edit'){
                        this.hospital_edit = true;
                    }

                    if(item.name == 'hospital-delete'){
                        this.hospital_delete = true;
                    }

                });
            },

            investUrl(){
                return '/photos/investigations/';
            },

            progressUrl(){
                return '/photos/progress_notes/';
            },

            imageOneUrl(){
                return '/photos/imagings/imaging_one/';
            },
            imageTwoUrl(){
                return '/photos/imagings/imaging_two/';
            },
            imageThreeUrl(){
                return '/photos/imagings/imaging_three/';
            },
            imageFourUrl(){
                return '/photos/imagings/imaging_four/';
            },
            imageFiveUrl(){
                return '/photos/imagings/imaging_five/';
            },
            imageSixUrl(){
                return '/photos/imagings/imaging_six/';
            }

        },
        created(){
            var full_url = document.URL;
            var url_array = full_url.split('/');
            var id = url_array[url_array.length-1];
            this.id = id;

            this.edit();

            this.detailPatientHospital();

            this.user();

            this.hospitalPrint();

            this.pastPrint();

            this.physicalPrint();

            this.diagnosisPrint();

            this.investPrint();

            this.treatmentPrint();

            this.deadPrint();

            this.dischargePrint();

            this.progressPrint();

            this.ptPrint();

            this.monitoringPrint();

            this.imagingPrint();

            this.consultPrint();
        }
    }
</script>
