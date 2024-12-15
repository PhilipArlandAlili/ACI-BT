<!-- Business Permit Form -->
<form action="#" method="post" class="form" id="business_permit_new_form">
    <label for="businessName">Business name/ Trade Activity:</label>
    <input type="text" name="business_name" id="bpnbusiness_name" class="form-control"
        oninput="this.value = this.value.toUpperCase();updateText()" s placeholder="Ex: Carl Store" required><br>

    <label for="businessAddress">Business Location:</label><br>
    <input type="text" name="address" id="bpnaddress" class="form-control"
        oninput="this.value = this.value.toUpperCase();updateText()"
        placeholder="Ex. Anywhere you want" required><br>

    <label for="manager_operator">Manager / Operator:</label>
    <input type="text" class="form-control" id="bpnmanager" name="manager"
        oninput="this.value = this.value.toUpperCase();updateText()" placeholder="Ex. Juan Dela Cruz" required><br>

    <label for="purok">Purok:</label><br>
    <select name="purok" id="bpnpurok" class="form-control" oninput="updateText()" required>
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
    <hr>

    <div class="BPermitNewprint" style="text-align: right;">
        <button type="button" class="btn btn-primary w-25" id="BPermitNewprintBtn">Print</button>

        <!-- Business Permit Modal -->
        <div class="modal fade" id="businessPermitModal" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content text-center">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-light">
                        <h2 style="font-weight: bold;">Confirm if all the data is correct?</h2>
                    </div>
                    <div class="modal-footer d-flex justify-content-around">
                        <button class="w-25 btn btn-primary" name="business_permit_new"
                            onclick="printIframe()">Yes</button>
                        <button type="button" class="w-25 btn btn-danger" data-bs-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    // Event listener for Business Permit print button
    document.getElementById("BPermitNewprintBtn").addEventListener("click", function () {
        let form = document.getElementById("business_permit_new_form");  // Correct form ID

        // Validate the form
        if (form.checkValidity()) {
            // If the form is valid, show the Business Permit modal
            let businessPermitModal = new bootstrap.Modal(document.getElementById("businessPermitModal"));
            businessPermitModal.show();
        } else {
            // If the form is not valid, show the built-in validation messages
            form.reportValidity();
        }
    });
</script>