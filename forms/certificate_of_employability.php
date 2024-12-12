<form action="#" method="POST" class="form" id="cecertificate_of_employability_form">

    <label for="">First Name:</label>
    <input type="text" class="form-control" name="first_name" id="cefirst_name" maxlength="50"
        oninput="this.value = this.value.replace(/[^A-Za-z ]/g, '').replace(/^([^.]*)\.(.*)\./, '$1.$2');updateText();"
        required placeholder="Ex. Juan"><br>

    <label for="">Middle Name:</label>
    <input type="text" class="form-control" name="middle_name" id="cemiddle_name" maxlength="50"
        oninput="this.value = this.value.replace(/[^A-Za-zs ]/g, '').replace(/^([^.]*)\.(.*)\./, '$1.$2');updateText();"
        placeholder="Ex. Reyes"><br>

    <label for="">Last Name:</label>
    <input type="text" class="form-control" name="last_name" id="celast_name" maxlength="50"
        oninput="this.value = this.value.replace(/[^A-Za-z' ]/g, '').replace(/^([^.]*)\.(.*)\./, '$1.$2');updateText();"
        required placeholder="Ex. Dela Cruz"><br>

    <label for="suffix">Suffix:</label>
    <select class="text-left form-control" name="suffix" id="cesuffix" onchange="updateText()">
        <option value="">N/A</option>
        <option value="Jr">Jr</option>
        <option value="Sr">Sr</option>
        <option value="I">I</option>
        <option value="II">II</option>
        <option value="III">III</option>
    </select><br>

    <!-- Birthdate = Age -->
    <label for="birthday">Birthday:</label>
    <input type="date" class="form-control" onchange="validatebday(this);updateText();" id="cebirthdate"
        name="birthdate" required><br>

    <label for="purok">Purok:</label>
    <select class="text-left form-control" name="purok" id="cepurok" onchange="updateText()" required>
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
    <input type="text" name="purpose" class="form-control" id="cepurpose" oninput="updateText()"
        placeholder="Ex. Employment" required><br>
    <hr>

    <div class="employabilityPrint" style="text-align: right;">
        <button type="button" class="btn btn-primary w-25" id="employabilityPrintBtn">Print</button>
        <div class="modal fade" id="employabilityModal" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content text-center">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-light">
                        <h2 style="font-weight: bold;">Confirm if all the data is correct?</h2>
                    </div>
                    <div class="modal-footer d-flex justify-content-around">
                        <button class="w-25 btn btn-primary" name="certificate_of_employability" onclick="printIframe()"
                            id="confirmPrint">Yes</button>
                        <button type="button" class="w-25 btn btn-danger" data-bs-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    // Event listener for Business Permit Renewal print button
    document.getElementById("employabilityPrintBtn").addEventListener("click", function () {
        let form = document.getElementById("certificate_of_employability_form");  // Use the unique form ID

        // Validate the form
        if (form.checkValidity()) {
            // If the form is valid, show the Business Permit Renewal modal
            let employabilityModal = new bootstrap.Modal(document.getElementById("employabilityModal"));
            employabilityModal.show();
        } else {
            // If the form is not valid, show the built-in validation messages
            form.reportValidity();
        }
    });
</script>