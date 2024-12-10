<form action="#" method="post" id="certificate_of_indigencyForm">

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
    <input type="date" class="form-control" id="birthdate" onchange="validatebday(this);updateText();" name="birthdate" required><br>

    <label for="">Civil Status</label>
    <select name="civil_status" id="civil" onchange="updateText()" class="form-control" required>
        <option value="">--Select Civil Status--</option>
        <option value="Single">Single</option>
        <option value="Married">Married</option>
        <option value="Widow">Widow</option>
    </select><br>

    <label for="">Purok:</label><br>
    <select name="puroks" class="form-control" id="purok" onchange="update()" required>
        <option value="">--Select Purok--</option>
        <option value="Centro">Centro</option>
        <option value="Hurawan">Huwaran</option>
        <option value="Kaakbayan">Kaakbayan</option>
        <option value="New Princesa"> New Princesa</option>
        <option value="San Franciso I">San Franciso I</option>
        <option value="San Franciso II">San Franciso II</option>
        <option value="Sandiwa">Sandiwa</option>
        <option value="Trece">Trece</option>
        <option value="Uha">UHA</option>
    </select><br>

    <label for="">Purpose:</label>
    <input type="text" name="purpose" oninput="updateText()"class="form-control" id="" cols="30" rows="10"
        placeholder="Ex. Medical Assistance" required><br>
    <hr>

    <div class="indigencyPrint" style="text-align: right;">
        <button type="button" class="btn btn-primary w-25" id="indigencyPrintBtn">Print</button>
        <div class="modal fade" id="indigencyModal" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content text-center">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-light">
                        <h2 style="font-weight: bold;">Confirm if all the data is correct?</h2>
                    </div>
                    <div class="modal-footer d-flex justify-content-around">
                        <button class="w-25 btn btn-primary" name="certificate_of_indigency" onclick="printIframe()" id="confirmPrint" >Yes</button>
                        <button type="button" class="w-25 btn btn-danger" data-bs-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>

<script>
    // Event listener for Business Permit Renewal print button
    document.getElementById("indigencyPrintBtn").addEventListener("click", function () {
        let form = document.getElementById("indigencyForm");  // Use the unique form ID

        // Validate the form
        if (form.checkValidity()) {
            // If the form is valid, show the Business Permit Renewal modal
            let indigencyModal = new bootstrap.Modal(document.getElementById("indigencyModal"));
            indigencyModal.show();
        } else {
            // If the form is not valid, show the built-in validation messages
            form.reportValidity();
        }
    });
</script>