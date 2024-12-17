<!-- Barangay Clearance Form -->

<form action="#" method="post" class="form" id="certificate_of_building_permit_form">

    <label for="">First Name:</label>
    <input type="text" class="form-control" name="first_name" id="cbpfirst_name" maxlength="50"
        oninput="this.value = this.value.toUpperCase(); this.value = this.value.replace(/[^A-Za-z. ]/g, '').replace(/^([^.]*)\.(.*)\./, '$1.$2'); updateText();"
        required placeholder="Ex. Juan"><br>

    <label for="">Middle Name:</label>
    <input type="text" class="form-control" name="middle_name" id="cbpmiddle_name" maxlength="50"
        oninput="this.value = this.value.toUpperCase(); this.value = this.value.replace(/[^A-Za-zs ]/g, '').replace(/^([^.]*)\.(.*)\./, '$1.$2'); updateText();"
        placeholder="Ex. Reyes"><br>

    <label for="">Last Name:</label>
    <input type="text" class="form-control" name="last_name" id="cbplast_name" maxlength="50"
        oninput="this.value = this.value.toUpperCase(); this.value = this.value.replace(/[^A-Za-z' ]/g, '').replace(/^([^.]*)\.(.*)\./, '$1.$2'); updateText();"
        required placeholder="Ex. Dela Cruz"><br>

    <label for="suffix">Suffix:</label>
    <select class="text-left form-control" name="suffix" id="cbpsuffix" onchange="updateText();">
        <option value="">N/A</option>
        <option value="Jr">Jr</option>
        <option value="Sr">Sr</option>
        <option value="I">I</option>
        <option value="II">II</option>
        <option value="III">III</option>
    </select><br>

    <label for="">Type of Building</label>
    <input type="text" class="form-control" name="building_type" id="cbpbuilding_type" maxlength="50"
        oninput="this.value = this.value.toUpperCase(); this.value = this.value.replace(/[^A-Za-z' ]/g, '').replace(/^([^.]*)\.(.*)\./, '$1.$2'); updateText();"
        required placeholder="Ex. Residential Building"><br>

    <label for="block_no">Block Number:</label>
    <input type="number" class="form-control" id="cbpblock" maxlength="2" max="99999" min="1" oninput="updateText()"
        name="block_no" placeholder="Ex. Block No. 9" required><br>

    <label for="lot_no">Lot Number:</label>
    <input type="number" class="form-control" id="cbplot" maxlength="2" max="99999" min="1" oninput="updateText()"
        name="lot_no" placeholder="Ex. Lot No. 48" required><br>

    <label for="area_measurement">Area Measurement:</label>
    <input type="number" class="form-control" id="cbparea" maxlength="2" max="99999" min="1"
        oninput="updateText()" name="area_measurement" placeholder="Ex. 87 sqm" required><br>

    <label for="td_no">TD Number:</label>
    <input type="text" class="form-control" name="td_no" id="cbptd" maxlength="50"
        oninput="this.value = this.value.toUpperCase();validateInput(this);updateText();" required
        placeholder="Ex. TD No. 061-18546" pattern="^[0-9-]+$" title="Only numbers and dashes are allowed."><br>

    <label for="tct_no">TCT Number:</label>
    <input type="number" class="form-control" id="cbptct" maxlength="2" max="99999" min="1" oninput="updateText()"
        name="tct_no" placeholder="Ex. TCT No. 179859" required><br>

    <label for="purok">Purok:</label>
    <select class="text-left form-control" name="purok" id="cbppurok" onchange="updateText();" required>
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
    <hr>

    <div class="building_permitPrint" style="text-align: right;">
        <button type="button" id="building_permitPrintBtn" class="btn btn-primary w-25">Print</button>

        <!-- Barangay Clearance Modal -->
        <div class="modal fade" id="building_permitModal" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content text-center">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-light">
                        <h2 style="font-weight: bold;">Confirm if all the data is correct?</h2>
                    </div>
                    <div class="modal-footer d-flex justify-content-around">
                        <button class="w-25 btn btn-primary" name="certificate_of_building_permit"
                            onclick="printIframe()">Yes</button>
                        <button type="button" class="w-25 btn btn-danger" data-bs-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- <script src="assets/js/certificate/certificate_of_building_permit.js"></script> -->

<script>
    // Event listener for Barangay Clearance button
    document.getElementById("buildingpermitPrintBtn").addEventListener("click", function () {
        let form = document.getElementById("certificate_of_building_permit_form");  // Correct form ID

        // Validate the form
        if (form.checkValidity()) {
            // If the form is valid, show the Barangay Clearance modal
            let buildingpermitModal = new bootstrap.Modal(document.getElementById("buildingpermitModal"));
            buildingpermitModal.show();
        } else {
            // If the form is not valid, show the built-in validation messages
            form.reportValidity();
        }
    });
</script>

<script>
    function validateInput(input) {
        // Replace any character that is not a number or dash with an empty string
        input.value = input.value.replace(/[^0-9-]/g, '');
    }
</script>