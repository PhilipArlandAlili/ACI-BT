<form action="#" method="post" class="form" id="lot_ownership_form">
    <label for="">First Name:</label>
    <input type="text" class="form-control" id="lofirst_name" name="first_name" maxlength="50"
        oninput="this.value = this.value.replace(/[^A-Za-z ]/g, '').replace(/^([^.]*)\.(.*)\./, '$1.$2');this.value = this.value.toUpperCase();updateText();"
        required placeholder="Ex. Juan"><br>

    <label for="">Middle Name:</label>
    <input type="text" class="form-control" id="lomiddle_name" name="middle_name" maxlength="50"
        oninput="this.value = this.value.replace(/[^A-Za-zs ]/g, '').replace(/^([^.]*)\.(.*)\./, '$1.$2');this.value = this.value.toUpperCase();updateText();"
        placeholder="Ex. Reyes"><br>

    <label for="">Last Name:</label>
    <input type="text" class="form-control" id="lolast_name" name="last_name" maxlength="50"
        oninput="this.value = this.value.replace(/[^A-Za-z' ]/g, '').replace(/^([^.]*)\.(.*)\./, '$1.$2');this.value = this.value.toUpperCase();updateText();"
        required placeholder="Ex. Dela Cruz"><br>

    <label for="suffix">Suffix:</label>
    <select class="text-left form-control" name="suffix" id="losuffix" onchange="updateText();">
        <option value="">N/A</option>
        <option value="Jr">Jr</option>
        <option value="Sr">Sr</option>
        <option value="I">I</option>
        <option value="II">II</option>
        <option value="III">III</option>
    </select><br>

    <label for="purok">Purok:</label>
    <select class="text-left form-control" name="purok" id="lopurok" onchange="updateText();" required>
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

    <div class="form-check">
        <input class="form-check-input" name="claimant" type="checkbox" value="/" id="loclaimant" onchange="updateText()">
        <label class="form-check-label" for="flexCheckDefault">
            Claimant
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" name="beneficiary" type="checkbox" value="/" id="lobeneficiary" onchange="updateText()">
        <label class="form-check-label" for="flexCheckDefault">
            Beneficiary
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" name="actual_occupant" type="checkbox" value="/" id="loactual_occupant" onchange="updateText()">
        <label class="form-check-label" for="flexCheckChecked">
            Actual Occupant
        </label>
    </div><br>

    <label for="lotNumber">Lot Number:</label>
    <input type="number" class="form-control" oninput="updateText()" name="lot_number" id="lolot_number"
        placeholder="Ex. 5003" required><br>

    <label for="lotAreaNumerical">Area Measurement (Numerical Form):</label>
    <input type="number" class="form-control" oninput="updateText()" name="lot_area_numerical" id="lolot_area_numerical"
        placeholder="Ex. 350 sqm" required><br>
    <label hidden for="lotAreaNumerical">Area Measurement (Word Form):</label>
    <input hidden type="text" class="form-control" name="lot_area_word" id="lolot_area_word" placeholder="Ex. One Two Three"
        readonly>

    <label for="purok">Lot Location:</label>
    <select class="text-left form-control" name="lot_location_address" id="loloc" onchange="updateText();" required>
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
    <br>

    <div class="lotOwnershipPrint" style="text-align: right;">
        <button type="button" class="btn btn-primary w-25" id="lotOwnershipPrintBtn">Print</button>
        <div class="modal fade" id="lotOwnershipModal" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content text-center">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-light">
                        <h2 style="font-weight: bold;">Confirm if all the data is correct?</h2>
                    </div>
                    <div class="modal-footer d-flex justify-content-around">
                        <button class="w-25 btn btn-primary" name="lot_ownership" onclick="printIframe()"
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
    document.getElementById("lotOwnershipPrintBtn").addEventListener("click", function () {
        let form = document.getElementById("lot_ownership_form");  // Use the unique form ID

        // Validate the form
        if (form.checkValidity()) {
            // If the form is valid, show the Business Permit Renewal modal
            let lotOwnershipModal = new bootstrap.Modal(document.getElementById("lotOwnershipModal"));
            lotOwnershipModal.show();
        } else {
            // If the form is not valid, show the built-in validation messages
            form.reportValidity();
        }
    });
</script>