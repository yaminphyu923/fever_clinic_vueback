<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fever Clinic</title>
    <link rel="stylesheet" href="{{ asset('customs/pdf.css') }}">
</head>

<body>
    {{-- <img src="{{ public_path() . '/logos/hotel1.jpg' }}" alt="Clinic">
    {{ public_path('logos/hotel1.jpg') }} --}}

    <h2 style="text-align: center;"><b>Fever Clinic</b></h2>
    <div style="display: flex;flex-direction: row;text-align: justify;line-height: 1.6;">
        @if ($patients->date)
            <div style="width: 200px;display:inline;margin-right:20px;"><b>Date Time -</b>
                {{ date('d-m-Y H:i A', strtotime($patients->date)) }}
            </div>
        @endif
        @if ($patients->name)
            <div style="width: 200px;display:inline;margin-right:20px;"><b>Name -</b> {{ $patients->name }}</div>
        @endif
        @if ($patients->nrc)
            <div style="width: 200px;display:inline;margin-right:20px;"><b>NRC -</b> {{ $patients->nrc }}</div>
        @endif
        @if ($patients->phone)
            <div style="width: 200px;display:inline;margin-right:20px;"><b>Phone -</b> {{ $patients->phone }}</div>
        @endif
        @if ($patients->gender)
            <div style="width: 200px;display:inline;margin-right:20px;"><b>Gender -</b> {{ $patients->gender }}</div>
        @endif
        @if ($patients->age)
            <div style="width: 200px;display:inline;margin-right:20px;"><b>Age -</b> {{ $patients->age }}</div>
        @endif
        @if ($patients->address)
            <div style="width: 200px;display:inline;margin-right:20px;"><b>Address -</b> {{ $patients->address }}
            </div>
        @endif

        @if ($patients->nextKin)
            <div style="width: 200px;display:inline;margin-right:20px;"><b>Next Kin -</b> {{ $patients->nextKin }}
            </div>
        @endif
        @if ($patients->attendent)
            <div style="width: 200px;display:inline;margin-right:20px;"><b>Attendent -</b> {{ $patients->attendent }}
            </div>
        @endif
        @if ($patients->occupation)
            <div style="width: 200px;display:inline;margin-right:20px;"><b>Occupation -</b>
                {{ $patients->occupation }}
            </div>
        @endif
        @if ($patients->symptoms)
            <div style="width: 200px;display:inline;margin-right:20px;"><b>Symptoms -</b> {{ $patients->symptoms }}
            </div>
        @endif
        @if ($patients->travelHistory)
            <div style="width: 200px;display:inline;margin-right:20px;"><b>Travel History -</b>
                {{ $patients->travelHistory }}
            </div>
        @endif
        @if ($patients->remark)
            <div style="width: 200px;display:inline;margin-right:20px;"><b>Remark -</b> {{ $patients->remark }}
            </div>
        @endif
    </div>

    @isset($hospitals)
        <h3 style="margin-bottom: -3px;color:tomato;"><b>Hospitals</b></h3>
    @endisset
    <div style="display: flex;flex-direction: row;text-align: justify;line-height: 1.6;">
        @foreach ($hospitals as $hospital)
            <div style="display: block;margin-bottom: 13px;">
                @if ($hospital->date)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Date Time -</b>
                        {{ date('d-m-Y H:i A', strtotime($hospital->date)) }}
                    </div>
                @endif
                @if ($hospital->admission)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b>Admission -</b>
                        {{ $hospital->admission }}
                    </div>
                @endif
                @if ($hospital->police_case)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b>Police Case -</b>
                        {{ $hospital->police_case }}
                    </div>
                @endif
                @if ($hospital->doctor_multiple_id)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b>Doctor -</b>
                        {{ $hospital->doctor != null ? $hospital->doctor->name : '' }}
                    </div>
                @endif
                @if ($hospital->doctor_incharge_id)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b>Doctor Incharge -</b>
                        {{ $hospital->doctorIncharge != null ? $hospital->doctorIncharge->name : '' }}
                    </div>
                @endif
                @if ($hospital->fever)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b>Fever -</b>
                        {{ $hospital->fever }}
                    </div>
                @endif
                @if ($hospital->sore_throat)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b>Sore Throat -</b>
                        {{ $hospital->sore_throat }}
                    </div>
                @endif
                @if ($hospital->chills)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b>Chills -</b>
                        {{ $hospital->chills }}
                    </div>
                @endif
                @if ($hospital->shaking_chills)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b>Repeated shaking with chills -</b>
                        {{ $hospital->shaking_chills }}
                    </div>
                @endif
                @if ($hospital->headache)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b>Headache -</b>
                        {{ $hospital->headache }}
                    </div>
                @endif
                @if ($hospital->taste_smell)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b>New loss of taste or smell -</b>
                        {{ $hospital->taste_smell }}
                    </div>
                @endif
                @if ($hospital->malaise)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b>Malaise/Myalgia -</b>
                        {{ $hospital->malaise }}
                    </div>
                @endif
                @if ($hospital->bed_id)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b>Bed -</b>
                        {{ $hospital->bed != null ? $hospital->bed->name : '' }}
                    </div>
                @endif
                @if ($hospital->odema)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b>Odema -</b>
                        {{ $hospital->odema }}
                    </div>
                @endif
                @if ($hospital->date_onset)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b>Date of onset -</b>
                        {{ $hospital->date_onset }}
                    </div>
                @endif
                @if ($hospital->date_covid)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b>Date of Covid (+) -</b>
                        {{ $hospital->date_covid }}
                    </div>
                @endif
                @if ($hospital->refer_to)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b>Refer To -</b>
                        {{ $hospital->refer_to }}
                    </div>
                @endif
                @if ($hospital->others)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b>Others -</b>
                        {{ $hospital->others }}
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    @isset($pasts)
        <h3 style="margin-bottom: -3px;color:tomato;"><b>Past Medical History</b></h3>
    @endisset
    <div style="display: flex;flex-direction: row;text-align: justify;line-height: 1.6;">
        @foreach ($pasts as $past)
            <div style="display: block;margin-bottom: 13px;">
                @if ($past->dm)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> DM -</b>
                        {{ $past->dm }}
                    </div>
                @endif
                @if ($past->ht)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> H/T -</b>
                        {{ $past->ht }}
                    </div>
                @endif
                @if ($past->ihd)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> IHD -</b>
                        {{ $past->ihd }}
                    </div>
                @endif
                @if ($past->stroke)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Stroke -</b>
                        {{ $past->stroke }}
                    </div>
                @endif

                @if ($past->renal)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Renal Problem -</b>
                        {{ $past->renal }}
                    </div>
                @endif
                @if ($past->liver)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Liver Problem -</b>
                        {{ $past->liver }}
                    </div>
                @endif
                @if ($past->bleeding)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Bleeding History -</b>
                        {{ $past->bleeding }}
                    </div>
                @endif
                @if ($past->como)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Comobidity -</b>
                        {{ $past->como }}
                    </div>
                @endif

                @if ($past->past)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Past History -</b>
                        {{ $past->past }}
                    </div>
                @endif
                @if ($past->drug)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Drug History -</b>
                        {{ $past->drug }}
                    </div>
                @endif
                @if ($past->drug_allergy)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Drug Allergy -</b>
                        {{ $past->drug_allergy }}
                    </div>
                @endif
                @if ($past->last_meal)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Last Meal -</b>
                        {{ $past->last_meal }}
                    </div>
                @endif

                @if ($past->smoking)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Smoking -</b>
                        {{ $past->smoking }}
                    </div>
                @endif
                @if ($past->alcohol)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Alcohol -</b>
                        {{ $past->alcohol }}
                    </div>
                @endif
                @if ($past->pregnancy)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Pregnancyy -</b>
                        {{ $past->pregnancy }}
                    </div>
                @endif
                @if ($past->recent_drugs)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Recent Drugs -</b>
                        {{ $past->recent_drugs }}
                    </div>
                @endif

                @if ($past->regular_drugs)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Regular Drugs -</b>
                        {{ $past->regular_drugs }}
                    </div>
                @endif
                @if ($past->medication)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Medication -</b>
                        {{ $past->medication }}
                    </div>
                @endif
                @if ($past->system_enquery)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> System Enquery -</b>
                        {{ $past->system_enquery }}
                    </div>
                @endif
                @if ($past->pre_hospital)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Pre_hospital Treatment -</b>
                        {{ $past->pre_hospital }}
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    @isset($phy_examinations)
        <h3 style="margin-bottom: -3px;color:tomato;"><b>Physical Examination</b></h3>
    @endisset
    <div style="display: flex;flex-direction: row;text-align: justify;line-height: 1.6;">
        @foreach ($phy_examinations as $phy_examination)
            <div style="display: block;margin-bottom: 13px;">
                @if ($phy_examination->temperature)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Temperature -</b>
                        {{ $phy_examination->temperature }}
                    </div>
                @endif
                @if ($phy_examination->ecg)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> ECG -</b>
                        {{ $phy_examination->ecg }}
                    </div>
                @endif
                @if ($phy_examination->rbs)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> RBS -</b>
                        {{ $phy_examination->rbs }}
                    </div>
                @endif
                @if ($phy_examination->spo2)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> SPO2 -</b>
                        {{ $phy_examination->spo2 }}
                    </div>
                @endif

                @if ($phy_examination->bp)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> BP -</b>
                        {{ $phy_examination->bp }}
                    </div>
                @endif
                @if ($phy_examination->pr)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> PR -</b>
                        {{ $phy_examination->pr }}
                    </div>
                @endif
                @if ($phy_examination->rr)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> RR -</b>
                        {{ $phy_examination->rr }}
                    </div>
                @endif
                @if ($phy_examination->spo2)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Conscious Level -</b>
                        {{ $phy_examination->well_orientated == 1 ? 'Well-orientated' : '' }} ,
                        {{ $phy_examination->pain == 1 ? 'Respond to Pain' : '' }} ,
                        {{ $phy_examination->voice == 1 ? 'Respond to Voice' : '' }} ,
                        {{ $phy_examination->no_response == 1 ? 'No Response' : '' }}
                    </div>
                @endif

                @if ($phy_examination->general)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> General -</b>
                        {{ $phy_examination->general }}
                    </div>
                @endif
                @if ($phy_examination->head_neck)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Head & Neck -</b>
                        {{ $phy_examination->head_neck }}
                    </div>
                @endif
                @if ($phy_examination->chest)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Chest -</b>
                        {{ $phy_examination->chest }}
                    </div>
                @endif
                @if ($phy_examination->abdomen_pelvic)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Abdomen & Pelvic -</b>
                        {{ $phy_examination->abdomen_pelvic }}
                    </div>
                @endif

                @if ($phy_examination->spine)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Spine -</b>
                        {{ $phy_examination->spine }}
                    </div>
                @endif
                @if ($phy_examination->upper_right)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Right Upper Limbs -</b>
                        {{ $phy_examination->upper_right }}
                    </div>
                @endif
                @if ($phy_examination->upper_left)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Left Upper Limbs -</b>
                        {{ $phy_examination->upper_left }}
                    </div>
                @endif
                @if ($phy_examination->lower_right)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Right Lower Limbs -</b>
                        {{ $phy_examination->lower_right }}
                    </div>
                @endif

                @if ($phy_examination->lower_left)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Left Lower Limbs -</b>
                        {{ $phy_examination->lower_left }}
                    </div>
                @endif
                @if ($phy_examination->refer_case)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Referred case -</b>
                        {{ $phy_examination->refer_case }}
                    </div>
                @endif
                @if ($phy_examination->other)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Other relevant findings -</b>
                        {{ $phy_examination->other }}
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    @isset($diagnoses)
        <h3 style="margin-bottom: -3px;color:tomato;"><b>Diagnosis</b></h3>
    @endisset
    <div style="display: flex;flex-direction: row;text-align: justify;line-height: 1.6;">
        @foreach ($diagnoses as $diagnosis)
            <div style="display: block;margin-bottom: 13px;">
                @if ($diagnosis->diagnosis)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Diagnosis -</b>
                        {{ $diagnosis->diagnosis }}
                    </div>
                @endif
                @if ($diagnosis->information)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Information on Diagnosis -</b>
                        {{ $diagnosis->information }}
                    </div>
                @endif
                @if ($diagnosis->treatment)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Treatment Plan -</b>
                        {{ $diagnosis->treatment }}
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    @isset($investigations)
        <h3 style="margin-bottom: -3px;color:tomato;"><b>Investigation</b></h3>
    @endisset
    <div style="display: flex;flex-direction: row;text-align: justify;line-height: 1.6;">
        @foreach ($investigations as $investigation)
            <div style="display: block;margin-bottom: 13px;">
                @if ($investigation->doctor_id)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Pathologist -</b>
                        {{ $investigation->doctor != null ? $investigation->doctor->name : '' }}
                    </div>
                @endif
                @if ($investigation->date_requested)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Date Requested -</b>
                        {{ date('d-m-Y H:i A', strtotime($investigation->date_requested)) }}
                    </div>
                @endif
                @if ($investigation->date_analysis)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Date of Analysis -</b>
                        {{ date('d-m-Y H:i A', strtotime($investigation->date_analysis)) }}
                    </div>
                @endif
                @if ($investigation->doctor_test)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Doctor who requested the test -</b>
                        {{ date('d-m-Y H:i A', strtotime($investigation->doctor_test)) }}
                    </div>
                @endif

                @if ($investigation->queue)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Queue -</b>
                        {{ $investigation->queue }}
                    </div>
                @endif
                {{-- @if ($investigation->image)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Image -</b>
                        <img src="{{ asset('photos/investigations/' . $investigation->image) }}"
                            style="width:70px;height:70px;" alt="">
                    </div>
                @endif --}}
                @if ($investigation->exam_request)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Examination Request -</b>
                        {{ $investigation->exam_request }}
                    </div>
                @endif
                @if ($investigation->note)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Brief Clinical Note -</b>
                        {{ date('d-m-Y H:i A', strtotime($investigation->note)) }}
                    </div>
                @endif

                @if ($investigation->value)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Value -</b>
                        {{ $investigation->value }}
                    </div>
                @endif
                @if ($investigation->remark)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Remark -</b>
                        {{ $investigation->remark }}
                    </div>
                @endif
                @if ($investigation->lab_name)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Lab Name -</b>
                        {{ $investigation->lab_name }}
                    </div>
                @endif
                @if ($investigation->lab_unit)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Lab Unit -</b>
                        {{ $investigation->lab_unit }}
                    </div>
                @endif

                @if ($investigation->lab_range)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Normal Range -</b>
                        {{ $investigation->lab_range }}
                    </div>
                @endif
                @if ($investigation->group_id)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Group -</b>
                        {{ $investigation->group != null ? $investigation->group->name : '' }}
                    </div>
                @endif
                @if ($investigation->labcategory_id)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Category -</b>
                        {{ $investigation->labCategory != null ? $investigation->labCategory->name : '' }}
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    @isset($treatments)
        <h3 style="margin-bottom: -3px;color:tomato;"><b>Treatment</b></h3>
    @endisset
    <div style="display: flex;flex-direction: row;text-align: justify;line-height: 1.6;">
        @foreach ($treatments as $treatment)
            <div style="display: block;margin-bottom: 13px;">
                @if ($treatment->note)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Quick Note -</b>
                        {{ $treatment->note }}
                    </div>
                @endif
                @if ($treatment->doctor_id)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Physician -</b>
                        {{ $treatment->doctor != null ? $treatment->doctor->name : '' }}
                    </div>
                @endif
                @if ($treatment->pharmacy)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Pharmacy -</b>
                        {{ $treatment->pharmacy }}
                    </div>
                @endif
                @if ($treatment->pre_date)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Prescription Date -</b>
                        {{ date('d-m-Y H:i A', strtotime($treatment->pre_date)) }}
                    </div>
                @endif

                @if ($treatment->queue)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Queue -</b>
                        {{ $treatment->queue }}
                    </div>
                @endif
                @if ($treatment->medical_list_id)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Drug -</b>
                        {{ $treatment->medicalList != null ? $treatment->medicalList->name : '' }}
                    </div>
                @endif
                @if ($treatment->dose)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Dose -</b>
                        {{ $treatment->dose }}
                    </div>
                @endif
                @if ($treatment->frequency)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Frequency -</b>
                        {{ date('d-m-Y H:i A', strtotime($treatment->frequency)) }}
                    </div>
                @endif
                @if ($treatment->start_date)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Starting Date -</b>
                        {{ date('d-m-Y H:i A', strtotime($treatment->start_date)) }}
                    </div>
                @endif
                @if ($treatment->end_date)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Ending Date -</b>
                        {{ date('d-m-Y H:i A', strtotime($treatment->end_date)) }}
                    </div>
                @endif
                @if ($treatment->remark)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Remark -</b>
                        {{ $treatment->remark }}
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    @isset($deads)
        <h3 style="margin-bottom: -3px;color:tomato;"><b>Dead</b></h3>
    @endisset
    <div style="display: flex;flex-direction: row;text-align: justify;line-height: 1.6;">
        @foreach ($deads as $dead)
            <div style="display: block;margin-bottom: 13px;">
                @if ($dead->dead_time)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Dead Time -</b>
                        {{ $dead->dead_time }}
                    </div>
                @endif
                @if ($dead->cause)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Cause -</b>
                        {{ $dead->cause }}
                    </div>
                @endif
                @if ($dead->doctor_id)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Doctor -</b>
                        {{ $dead->doctor != null ? $dead->doctor->name : '' }}
                    </div>
                @endif
                @if ($dead->note)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Note -</b>
                        {{ $dead->note }}
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    @isset($discharges)
        <h3 style="margin-bottom: -3px;color:tomato;"><b>Discharge</b></h3>
    @endisset
    <div style="display: flex;flex-direction: row;text-align: justify;line-height: 1.6;">
        @foreach ($discharges as $discharge)
            <div style="display: block;margin-bottom: 13px;">
                @if ($discharge->time)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Time -</b>
                        {{ $discharge->time }}
                    </div>
                @endif
                @if ($discharge->place)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Place -</b>
                        {{ $discharge->place }}
                    </div>
                @endif
                @if ($discharge->opd)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> OPD -</b>
                        {{ $discharge->opd }}
                    </div>
                @endif
                @if ($discharge->admission)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Admission -</b>
                        {{ $discharge->admission }}
                    </div>
                @endif

                @if ($discharge->refer_to)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Refer To -</b>
                        {{ $discharge->refer_to }}
                    </div>
                @endif
                @if ($discharge->pr)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> PR -</b>
                        {{ $discharge->pr }}
                    </div>
                @endif
                @if ($discharge->spo2)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> SPO2 -</b>
                        {{ $discharge->spo2 }}
                    </div>
                @endif
                @if ($discharge->bp)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> BP -</b>
                        {{ $discharge->bp }}
                    </div>
                @endif

                @if ($discharge->gcs)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> GCS -</b>
                        {{ $discharge->gcs }}
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    @isset($ptoveralls)
        <h3 style="margin-bottom: -3px;color:tomato;"><b>Pt Overall Performance</b></h3>
    @endisset
    <div style="display: flex;flex-direction: row;text-align: justify;line-height: 1.6;">
        @foreach ($ptoveralls as $ptoverall)
            <div style="display: block;margin-bottom: 13px;">
                @if ($ptoverall->date)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Date -</b>
                        {{ $ptoverall->date }}
                    </div>
                @endif
                @if ($ptoverall->text)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Text -</b>
                        {{ $ptoverall->text }}
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    @isset($monitorings)
        <h3 style="margin-bottom: -3px;color:tomato;"><b>Monitoring</b></h3>
    @endisset

    <div style="display: flex;flex-direction: row;text-align: justify;line-height: 1.6;">
        @foreach ($monitorings as $monitoring)
            <div style="display: block;margin-bottom: 13px;">
                @if ($monitoring->pr)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> PR -</b>
                        {{ $monitoring->pr }}
                    </div>
                @endif
                @if ($monitoring->crt)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> CRT -</b>
                        {{ $monitoring->crt }}
                    </div>
                @endif
                @if ($monitoring->emergency)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Emergency -</b>
                        {{ $monitoring->emergency }}
                    </div>
                @endif
                @if ($monitoring->t)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> T -</b>
                        {{ $monitoring->t }}
                    </div>
                @endif
            </div>


            <div style="display: block;margin-bottom: 13px;">
                @if ($monitoring->spo2)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> SPO2 -</b>
                        {{ $monitoring->spo2 }}
                    </div>
                @endif
                @if ($monitoring->rbs)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> RBS -</b>
                        {{ $monitoring->rbs }}
                    </div>
                @endif
                @if ($monitoring->gcs)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> GCS -</b>
                        {{ $monitoring->gcs }}
                    </div>
                @endif
                @if ($monitoring->pupil)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Pupil -</b>
                        {{ $monitoring->pupil }}
                    </div>
                @endif
            </div>
            <div style="display: block;margin-bottom: 13px;">
                @if ($monitoring->bp)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> BP -</b>
                        {{ $monitoring->bp }}
                    </div>
                @endif
                @if ($monitoring->urine)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Urine -</b>
                        {{ $monitoring->urine }}
                    </div>
                @endif
                @if ($monitoring->date)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Date -</b>
                        {{ $monitoring->date }}
                    </div>
                @endif
                @if ($monitoring->tx)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> TX -</b>
                        {{ $monitoring->tx }}
                    </div>
                @endif
            </div>
            <div style="display: block;margin-bottom: 13px;">
                @if ($monitoring->pain_score)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Pain Score -</b>
                        {{ $monitoring->pain_score }}
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    @isset($imagings)
        <h3 style="margin-bottom: -3px;color:tomato;"><b>Imaging</b></h3>
    @endisset
    <div style="display: flex;flex-direction: row;text-align: justify;line-height: 1.6;">
        @foreach ($imagings as $imaging)
            <div style="display: block;margin-bottom: 13px;">
                @if ($imaging->doctor_id)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Doctor -</b>
                        {{ $imaging->doctor != null ? $imaging->doctor->name : '' }}
                    </div>
                @endif
                @if ($imaging->date_requested)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Date Requested -</b>
                        {{ $imaging->date_requested }}
                    </div>
                @endif
                @if ($imaging->date_analysis)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Date Analysis -</b>
                        {{ $imaging->date_analysis }}
                    </div>
                @endif
                @if ($imaging->analysis)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Analysis -</b>
                        {{ $imaging->analysis }}
                    </div>
                @endif
            </div>
            <div style="display: block;margin-bottom: 13px;">
                @if ($imaging->conclusion)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Conclusion -</b>
                        {{ $imaging->conclusion }}
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    @isset($consultations)
        <h3 style="margin-bottom: -3px;color:tomato;"><b>Consultation</b></h3>
    @endisset
    <div style="display: flex;flex-direction: row;text-align: justify;line-height: 1.6;">
        @foreach ($consultations as $consultation)
            <div style="display: block;margin-bottom: 13px;">
                @if ($consultation->consultation)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Consultation -</b>
                        {{ $consultation->consultation }}
                    </div>
                @endif
                @if ($consultation->note)
                    <div style="width: 200px;display:inline;margin-right:20px;"><b> Note -</b>
                        {{ $consultation->note }}
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</body>

</html>
