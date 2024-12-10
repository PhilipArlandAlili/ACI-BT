<form action="#" method="post" id="complaint_certificateForm">

<label for="">First Name:</label>
    <input type="text" class="form-control" name="first_name" maxlength="50"  oninput="this.value = this.value.replace(/[^A-Za-z ]/g, '').replace(/^([^.]*)\.(.*)\./, '$1.$2');updateText();" required placeholder="Ex. Juan"><br>

    <label for="">Middle Name:</label>
    <input type="text" class="form-control" name="middle_name" maxlength="50"  oninput="this.value = this.value.replace(/[^A-Za-zs]/g, '').replace(/^([^.]*)\.(.*)\./, '$1.$2');updateText();" required  placeholder="Ex. J"><br>

    <label for="">Last Name:</label>
    <input type="text" class="form-control" name="last_name" maxlength="50"  oninput="this.value = this.value.replace(/[^A-Za-z']/g, '').replace(/^([^.]*)\.(.*)\./, '$1.$2');updateText();" required  placeholder="Ex. Dela Cruz"><br>


    <label for="suffix">Suffix:</label>
    <select class="text-left form-control" name="suffix" id="suffix">
        <option value="">N/A</option>
        <option value="Jr">Jr</option>
        <option value="Sr">Sr</option>
        <option value="I">I</option>
        <option value="II">II</option>
        <option value="III">III</option>
    </select><br>

    <label for="birthday">Birthday:</label>
    <input type="date" class="form-control" onchange="validatebday(this);updateText();" id="birthdate" name="birthdate" required><br>

    <label for="purok">Purok:</label>
    <select class="text-left form-control" name="purok" id="purok" required>
        <option value="">--Select Purok--</option>
        <option value="Centro">Centro</option>
        <option value="Hurawan">Huwaran</option>
        <option value="Kaakbayan">Kaakbayan</option>
        <option value="New Princesa">New Princesa</option>
        <option value="San Franciso I">San Franciso I</option>
        <option value="San Franciso II">San Franciso II</option>
        <option value="Sandiwa">Sandiwa</option>
        <option value="Trece">Trece</option>
        <option value="Uha">UHA</option>
    </select><br>

    <label for="">Date Filed:</label>
    <input type="date" name="date_of_complain" onchange="validateformarriagedate(this);updateText();" class="form-control" required><br>
    <hr>

    <!--Respondent Full Name-->
    <label for="" class="fw-bold">Respondent</label><br>
    <label for="first_name">First Name:</label>
    <input type="text" class="form-control" id="first_name"maxlength="50"  oninput="this.value = this.value.replace(/[^A-Za-z ]/g, '').replace(/^([^.]*)\.(.*)\./, '$1.$2');updateText();" name="first_name_respondent" placeholder="Ex. Juan" required><br>

    <label for="middle_name">Middle Name:</label>
    <input type="text" class="form-control" id="middle_name"maxlength="50"  oninput="this.value = this.value.replace(/[^A-Za-z ]/g, '').replace(/^([^.]*)\.(.*)\./, '$1.$2');updateText();" name="middle_name_respondent" placeholder="Ex. Mandaragat"
        required><br>

    <label for="last_name">Last Name:</label>
    <input type="text" class="form-control" id="last_name"maxlength="50"  oninput="this.value = this.value.replace(/[^A-Za-z ]/g, '').replace(/^([^.]*)\.(.*)\./, '$1.$2');updateText();" name="last_name_respondent" placeholder="Ex. Dela Cruz" required><br>

    <label for="suffix">Suffix:</label>
    <select class="text-left form-control" name="suffix_respondent" id="suffix">
        <option value="">N/A</option>
        <option value="Jr">Jr</option>
        <option value="Sr">Sr</option>
        <option value="I">I</option>
        <option value="II">II</option>
        <option value="III">III</option>
    </select><br>

    <label for="">Case Number:</label>
    <input type="number" name="case_no" class="form-control" placeholder="2024-005" required><br>

    <label for="">VAWC Official Name</label>
    <input type="text" name="vawc_official_name" class="form-control" required><br>
    <hr>

    <div class="complaintPrint" style="text-align: right;">
        <button type="button" class="btn btn-primary w-25" id="complaintPrintBtn">Print</button>
        <div class="modal fade" id="complaintModal" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content text-center">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-light">
                        <h2 style="font-weight: bold;">Confirm if all the data is correct?</h2>
                    </div>
                    <div class="modal-footer d-flex justify-content-around">
                        <button class="w-25 btn btn-primary" name="complaint_certificate" onclick="printIframe()"
                            id="confirmPrint" >Yes</button>
                        <button type="button" class="w-25 btn btn-danger" data-bs-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    // Event listener for Business Permit Renewal print button
    document.getElementById("complaintPrintBtn").addEventListener("click", function () {
        let form = document.getElementById("complaintForm");  // Use the unique form ID

        // Validate the form
        if (form.checkValidity()) {
            // If the form is valid, show the Business Permit Renewal modal
            let complaintModal = new bootstrap.Modal(document.getElementById("complaintModal"));
            complaintModal.show();
        } else {
            // If the form is not valid, show the built-in validation messages
            form.reportValidity();
        }
    });
</script>