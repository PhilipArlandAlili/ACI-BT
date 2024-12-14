<!-- Business Permit Renewal Form -->
<form action="#" method="post" class="form" id="business_permit_renewForm">
    <label for="businessName">Business name/ Trade Activity:</label>
    <input type="text" class="form-control" id="bprbusiness_name" name="business_name" oninput="this.value = this.value.toUpperCase();updateText()" placeholder="Ex. Carl Store" required><br>

    <label for="purok">Purok:</label><br>
    <select name="purok" id="bprpurok" class="form-control" oninput="this.value = this.value.toUpperCase();updateText()" required>
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
    </select>
    <br>

    <label for="manager_operator_renew">Manager / Operator:</label>
    <input type="text" class="form-control" id="bprmanager" name="manager" oninput="this.value = this.value.toUpperCase();updateText()"placeholder="Ex. Juan Dela Cruz" required><br>

    <label for="manager_operator_address_renew">Address (Manager / Operator):</label>
    <input type="text" class="form-control" id="bpraddress" name="address" oninput="this.value = this.value.toUpperCase();updateText()"placeholder="Ex. PSU Rd" required><br>

    <hr>

    <div class="BPermitRenewPrint" style="text-align: right;">
        <button type="button" class="btn btn-primary w-25" id="BPermitRenewPrintBtn">Print</button>
        <div class="modal fade" id="BPermitRenewModal" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content text-center">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-light">
                        <h2 style="font-weight: bold;">Confirm if all the data is correct?</h2>
                    </div>
                    <div class="modal-footer d-flex justify-content-around">
                        <button class="w-25 btn btn-primary" name="business_permit_renew" onclick="printIframe()"
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
    document.getElementById("BPermitRenewPrintBtn").addEventListener("click", function () {
        let form = document.getElementById("business_permit_renewForm");  // Use the unique form ID

        // Validate the form
        if (form.checkValidity()) {
            // If the form is valid, show the Business Permit Renewal modal
            let BPermitRenewModal = new bootstrap.Modal(document.getElementById("BPermitRenewModal"));
            BPermitRenewModal.show();
        } else {
            // If the form is not valid, show the built-in validation messages
            form.reportValidity();
        }
    });
</script>