@extends('layouts.feature')

@section('content')
<div class="content-wrapper">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Custom CSS-->
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-9">
                    <h3 class="m-0">New Service Request</h3>
                </div>
                <!-- /.col -->
                <div class="col-sm-3">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{route('cx.index')}}">Service Consumer</a>
                        </li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <form action="{{route('cx.store')}}" method="post">
            <div class="row p-3">
                @csrf
            
                <div class="card card-primary p-0">
                    <div class="card-header">
                        <h3 class="card-title">Service Consumer Details</h3>
                    </div>
                    <div class="card-body row">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-id-card"></i></span></span>
                                    </div>

                                    <input type="text" name="nic" id="nic" class="form-control"
                                        placeholder="NIC Number" value="{{$nic}}">
                                </div>
                                <span id="nic-error" style="color: red; display: none;">Invalid NIC number
                                    format.</span>
                            </div>
                            <div class="col-lg-5">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span></span>
                                    </div>
                                    <input type="text" name="sc_name" id="sc_name" class="form-control"
                                        placeholder="SC Name" value="{{$name}}">
                                </div>
                                <span id="sc-name-error" style="color: red; display: none;">This field is
                                    required.</span>
                            </div>
                            <div class="col-lg-3">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span></span>
                                    </div>
                                    <input type="text" name="phone" id="phone" class="form-control"
                                        placeholder="Phone Number" value="{{$phone}}">
                                </div>
                                <span id="phone-error" style="color: red; display: none;">Phone number must be 10 digits
                                    and start with 0.</span>

                            </div>
                        </div>


                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer text-end">
                        <button class="btn btn-success disabled" id="next" onclick="enableServiceAndSetReadonly()">Next
                        </button>
                    </div>
                </div>

            </div>

            <div class="row px-3">

                <div class="card card-primary p-0">
                
                    <div class="card-header">
                        <h3 class="card-title">Requested Services </h3>
                    </div>
                    <div class="card-body row">
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-search"></i></span></span>
                                    </div>
                                    <input type="text" name="service" id="service" class="form-control"
                                        placeholder="Search Service" disabled>
                                        <input type="hidden" name="serviceID" id="serviceID">
                                </div>
                                <style>
                                    ul#suggestions>li{
                                        padding: 5px;
                                    }
                                    ul#suggestions>li:hover{
                                        cursor: pointer;
                                        background-color: #FFD;
                                        padding: 5px;
                                    }
                                </style>
                                <ul id="suggestions" class="list-group mt-2"
                                        style="display: none; 
                                        max-height: 200px; 
                                        overflow-y: auto; 
                                        position: absolute; 
                                        z-index: 1000;
                                        border:1px solid #333;
                                        background-color: #EEE;
                                        top: 30px;
                                        width: 97.5%;
                                        ">
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <h4 id="service-id">Service ID : </h4>
                            <h4 id="service-name">Service : </h4>
                            <h4 id="service-branch">Branch : </h4>
                            <h4 id="service-officer">Officer : </h4>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer text-end">
                        <button type="submit" id="submit" class="btn btn-success" disabled>Register</button>
                    </div>
                    
                </div>

            </div>
        </form>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


</div>
<script>
    // Flags to track if the user has interacted with each field
    let nicTouched = false;
    let scNameTouched = false;
    let phoneTouched = false;

    // Validate NIC
    function validateNIC() {
        const nicInput = document.getElementById('nic').value.trim();
        const nicError = document.getElementById('nic-error');
        const regex12Digits = /^\d{12}$/;
        const regexOldNic = /^\d{9}[VXvx]$/;

        if (regex12Digits.test(nicInput) || regexOldNic.test(nicInput)) {
            nicError.style.display = 'none';
            document.getElementById('nic').classList.add('is-valid');
            document.getElementById('nic').classList.remove('is-invalid');
            return true;
        } else if (nicTouched) {
            nicError.style.display = 'inline';
            document.getElementById('nic').classList.add('is-invalid');
            document.getElementById('nic').classList.remove('is-valid');
        }
        return false;
    }

    // Validate SC Name
    function validateSCName() {
        const scNameInput = document.getElementById('sc_name').value.trim();
        const scNameError = document.getElementById('sc-name-error');

        if (scNameInput !== '') {
            scNameError.style.display = 'none';
            document.getElementById('sc_name').classList.add('is-valid');
            document.getElementById('sc_name').classList.remove('is-invalid');
            return true;
        } else if (scNameTouched) {
            scNameError.style.display = 'inline';
            document.getElementById('sc_name').classList.add('is-invalid');
            document.getElementById('sc_name').classList.remove('is-valid');
        }
        return false;
    }

    // Validate Phone
    function validatePhone() {
        const phoneInput = document.getElementById('phone').value.trim();
        const phoneError = document.getElementById('phone-error');
        const phoneRegex = /^0\d{9}$/;

        if (phoneRegex.test(phoneInput)) {
            phoneError.style.display = 'none';
            document.getElementById('phone').classList.add('is-valid');
            document.getElementById('phone').classList.remove('is-invalid');
            return true;
        } else if (phoneTouched) {
            phoneError.style.display = 'inline';
            document.getElementById('phone').classList.add('is-invalid');
            document.getElementById('phone').classList.remove('is-valid');
        }
        return false;
    }

    // Enable or disable the Next button
    function checkAllFields() {
        const isNICValid = validateNIC();
        const isSCNameValid = validateSCName();
        const isPhoneValid = validatePhone();

        const nextButton = document.getElementById('next');
        if (isNICValid && isSCNameValid && isPhoneValid) {
            nextButton.classList.remove('disabled');
            nextButton.classList.add('btn-primary');
        } else {
            nextButton.classList.add('disabled');
            nextButton.classList.remove('btn-primary');
        }
    }

    // Add event listeners for blur and input events
    document.getElementById('nic').addEventListener('blur', function () {
        nicTouched = true;
        validateNIC();
        checkAllFields();
    });

    document.getElementById('sc_name').addEventListener('blur', function () {
        scNameTouched = true;
        validateSCName();
        checkAllFields();
    });

    document.getElementById('phone').addEventListener('blur', function () {
        phoneTouched = true;
        validatePhone();
        checkAllFields();
    });

    // Additional validation when typing
    document.getElementById('nic').addEventListener('input', function () {
        if (nicTouched) validateNIC();
        checkAllFields();
    });

    document.getElementById('sc_name').addEventListener('input', function () {
        if (scNameTouched) validateSCName();
        checkAllFields();
    });

    document.getElementById('phone').addEventListener('input', function () {
        if (phoneTouched) validatePhone();
        checkAllFields();
    });


    function enableServiceAndSetReadonly() {
        // Enable the "Search Service" field
        const serviceField = document.getElementById('service');
        serviceField.removeAttribute('disabled'); // Enable the field
        serviceField.focus(); // Optionally set focus to the service field

        // Make the NIC, SC Name, and Phone fields read-only
        const nicField = document.getElementById('nic');
        const scNameField = document.getElementById('sc_name');
        const phoneField = document.getElementById('phone');

        nicField.setAttribute('readonly', true);
        scNameField.setAttribute('readonly', true);
        phoneField.setAttribute('readonly', true);

        const nextButton = document.getElementById('next');
        nextButton.setAttribute('disabled',true);

    }

</script>
<script>
    document.getElementById('service').addEventListener('input', function () {
        const keyword = this.value.trim();
        const suggestionsBox = document.getElementById('suggestions');

        const serviceName = document.getElementById('service-name');
        const serviceBranch = document.getElementById('service-branch');
        const serviceOfficer = document.getElementById('service-officer');
        const serviceId = document.getElementById('service-id');

        const service_ID = document.getElementById('serviceID');
        const submitButton = document.getElementById('submit');


        if (keyword.length > 1) {
            // Send AJAX request to fetch matching services
            fetch(`/get-all-services/${keyword}`)
                .then(response => response.json())
                .then(data => {
                    // Clear previous suggestions
                    suggestionsBox.innerHTML = '';
                    suggestionsBox.style.display = 'none';

                    if (data.length > 0) {
                        data.forEach(service => {
                            const li = document.createElement('li');
                            li.textContent = `${service.name} (${service.branch})`;
                            li.style.cursor = 'pointer';
                            li.addEventListener('click', function () {
                                suggestionsBox.style.display = 'none';
                                submitButton.disabled = false;
                                document.getElementById('service').value = service.name;
                                serviceName.innerHTML = "Service : " + service.name;
                                serviceBranch.innerHTML = "Branch : " + service.branch;
                                serviceOfficer.innerHTML = "Officer : " + service.officer;
                                serviceId.innerHTML = "Service ID : " + service.id;
                                service_ID.setAttribute('value',service.id);
                                // add selected field details
                                
                            });
                            suggestionsBox.appendChild(li);
                        });
                        suggestionsBox.style.display = 'block';
                    }
                })
                .catch(error => console.error('Error fetching services:', error));
        } else {
            suggestionsBox.innerHTML = '';
            suggestionsBox.style.display = 'none';
        }
    });
</script>
@include('features.caseregister.modals.case_register_in')
@endsection
