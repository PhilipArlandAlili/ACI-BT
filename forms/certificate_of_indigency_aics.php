<form action="#" method="post" class="form" id="certificate_of_indigency_aicsForm">

    <label for="">First Name:</label>
    <input type="text" class="form-control" name="first_name" id="cidfirst_name" maxlength="50"
        oninput="this.value = this.value.replace(/[^A-Za-z ]/g, '').replace(/^([^.]*)\.(.*)\./, '$1.$2');this.value = this.value.toUpperCase();updateText();"
        required placeholder="Ex. Juan"><br>

    <label for="">Middle Name:</label>
    <input type="text" class="form-control" name="middle_name" id="cidmiddle_name" maxlength="50"
        oninput="this.value = this.value.replace(/[^A-Za-zs ]/g, '').replace(/^([^.]*)\.(.*)\./, '$1.$2');this.value = this.value.toUpperCase();updateText();"
        placeholder="Ex. Reyes"><br>

    <label for="">Last Name:</label>
    <input type="text" class="form-control" name="last_name" id="cidlast_name" maxlength="50"
        oninput="this.value = this.value.replace(/[^A-Za-z' ]/g, '').replace(/^([^.]*)\.(.*)\./, '$1.$2');this.value = this.value.toUpperCase();updateText();"
        required placeholder="Ex. Dela Cruz"><br>

    <label for="suffix">Suffix:</label>
    <select class="text-left form-control" name="suffix" id="cidsuffix" oninput="updateText()">
        <option value="">N/A</option>
        <option value="Jr">Jr</option>
        <option value="Sr">Sr</option>
        <option value="I">I</option>
        <option value="II">II</option>
        <option value="III">III</option>
    </select><br>

    <!-- Birthday = Age -->
    <label for="birthday">Birthday:</label>
    <input type="date" class="form-control" onchange="validatebday(this);this.value = this.value.toUpperCase();updateText();" id="cidbirthdate"
        name="birthdate" required><br>

    <label for="civil_status">Civil Status:</label>
    <select class="form-control" name="civil_status" id="cidcivil_status" oninput="this.value = this.value.toUpperCase();updateText();" required>
        <option value="">--Select Civil Status--</option>
        <option value="Single">Single</option>
        <option value="Married">Married</option>
        <option value="Widow">Widow</option>
    </select><br>

    <label for="purok">Purok:</label>
    <select class="text-left form-control" name="purok" id="cidpurok" oninput="this.value = this.value.toUpperCase();updateText()" required>
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

    <label for="purpose">Purpose:</label>
    <input type="text" name="purpose" class="form-control" id="cidpurpose" oninput="this.value = this.value.toUpperCase();updateText()"
        placeholder="Ex. Medical Services" required><br>
    <hr>

    <div class="indigency2Print" style="text-align: right;">
        <button type="button" class="btn btn-primary w-25" id="indigency2PrintBtn">Print</button>
        <div class="modal fade" id="indigency2Modal" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content text-center">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-light">
                        <h2 style="font-weight: bold;">Confirm if all the data is correct?</h2>
                    </div>
                    <div class="modal-footer d-flex justify-content-around">
                        <button class="w-25 btn btn-primary" name="certificate_of_indigency_aics"
                            onclick="printIframe()" id="confirmPrint">Yes</button>
                        <button type="button" class="w-25 btn btn-danger" data-bs-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    // Event listener for Business Permit Renewal print button
    document.getElementById("indigency2PrintBtn").addEventListener("click", function () {
        let form = document.getElementById("certificate_of_indigency_aicsForm");  // Use the unique form ID

        // Validate the form
        if (form.checkValidity()) {
            // If the form is valid, show the Business Permit Renewal modal
            let indigency2Modal = new bootstrap.Modal(document.getElementById("indigency2Modal"));
            indigency2Modal.show();
        } else {
            // If the form is not valid, show the built-in validation messages
            form.reportValidity();
        }
    });
</script>