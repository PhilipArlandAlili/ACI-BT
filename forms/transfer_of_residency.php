<form action="#" method="post" class="form" id="transfer_of_residency_form">

    <label for="">First Name:</label>
    <input type="text" class="form-control" id="trfirst_name" name="first_name" maxlength="50"
        oninput="this.value = this.value.replace(/[^A-Za-z. ]/g, '').replace(/^([^.]*)\.(.*)\./, '$1.$2');this.value = this.value.toUpperCase();updateText();"
        required placeholder="Ex. Juan"><br>

    <label for="">Middle Name:</label>
    <input type="text" class="form-control" id="trmiddle_name" name="middle_name" maxlength="50"
        oninput="this.value = this.value.replace(/[^A-Za-zs ]/g, '').replace(/^([^.]*)\.(.*)\./, '$1.$2');this.value = this.value.toUpperCase();updateText();"
        placeholder="Ex. Reyes"><br>

    <label for="">Last Name:</label>
    <input type="text" class="form-control" id="trlast_name" name="last_name" maxlength="50"
        oninput="this.value = this.value.replace(/[^A-Za-z' ]/g, '').replace(/^([^.]*)\.(.*)\./, '$1.$2');this.value = this.value.toUpperCase();updateText();"
        required placeholder="Ex. Dela Cruz"><br>

    <label for="suffix">Suffix:</label>
    <select class="text-left form-control" onchange="updateText()" name="suffix" id="trsuffix">
        <option value="">N/A</option>
        <option value="Jr">Jr</option>
        <option value="Sr">Sr</option>
        <option value="I">I</option>
        <option value="II">II</option>
        <option value="III">III</option>
    </select><br>

    <label for="">Nationality</label>
    <input type="text" oninput="this.value = this.value.toUpperCase();updateText()" class="form-control" name="nationality" id="trnationality"
        placeholder="Ex. Filipino" required><br>

    <label for="">Civil Status:</label>
    <select class="form-control" onchange="updateText()" name="civil_status" id="trcivil_status" required>
        <option value="">--Select Civil Status--</option>
        <option value="Single">Single</option>
        <option value="Married">Married</option>
        <option value="Widow">Widow</option>
    </select><br>

    <label for="purok">Purok:</label>
    <select class="text-left form-control" name="purok" id="trpurok" required onchange="updateText()">
        <option value="">--Select Purok--</option>
        <option value="Centro">Centro</option>
        <option value="Huwaran">Huwaran</option>
        <option value="Kaakbayan">Kaakbayan</option>
        <option value="New Princesa">New Princesa</option>
        <option value="San Franciso I">San Franciso I</option>
        <option value="San Franciso II">San Franciso II</option>
        <option value="Sandiwa">Sandiwa</option>
        <option value="Trece">Trece</option>
        <option value="Uha">UHA</option>
    </select><br>

    <label for="">Previous Address:</label>
    <input type="text" oninput="this.value = this.value.toUpperCase();updateText()" class="form-control" name="previous_address" id="trprevious_address"
        placeholder="Ex. Cagayancillo, Palawan" required><br>

    <label for="">Purpose:</label>
    <input type="text" name="purpose" oninput="this.value = this.value.toUpperCase();updateText()" class="form-control" id="trpurpose" cols="30" rows="10"
        placeholder="Ex. 4P'S Membership" required><br>
    <hr>

    <div class="transferPrint" style="text-align: right;">
        <button type="button" class="btn btn-primary w-25" id="transferPrintBtn">Print</button>
        <div class="modal fade" id="transferModal" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content text-center">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-light">
                        <h2 style="font-weight: bold;">Confirm if all the data is correct?</h2>
                    </div>
                    <div class="modal-footer d-flex justify-content-around">
                        <button class="w-25 btn btn-primary" name="transfer_of_residency" onclick="printIframe()"
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
    document.getElementById("transferPrintBtn").addEventListener("click", function () {
        let form = document.getElementById("transfer_of_residency_form");  // Use the unique form ID

        // Validate the form
        if (form.checkValidity()) {
            // If the form is valid, show the Business Permit Renewal modal
            let transferModal = new bootstrap.Modal(document.getElementById("transferModal"));
            transferModal.show();
        } else {
            // If the form is not valid, show the built-in validation messages
            form.reportValidity();
        }
    });
</script>