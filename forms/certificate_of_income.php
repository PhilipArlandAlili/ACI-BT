<form action="#" method="post" id="certificate_of_incomeForm">
<label for="">First Name:</label>
    <input type="text" class="form-control" name="first_name" id="first_name" maxlength="50"  oninput="this.value = this.value.replace(/[^A-Za-z ]/g, '').replace(/^([^.]*)\.(.*)\./, '$1.$2');updateText();" required placeholder="Ex. Juan"><br>

    <label for="">Middle Name:</label>
    <input type="text" class="form-control" name="middle_name" id="middle_name" maxlength="50"  oninput="this.value = this.value.replace(/[^A-Za-zs ]/g, '').replace(/^([^.]*)\.(.*)\./, '$1.$2');updateText();"   placeholder="Ex. Reyes"><br>

    <label for="">Last Name:</label>
    <input type="text" class="form-control" name="last_name" id="last_name" maxlength="50"  oninput="this.value = this.value.replace(/[^A-Za-z' ]/g, '').replace(/^([^.]*)\.(.*)\./, '$1.$2');updateText();" required  placeholder="Ex. Dela Cruz"><br>

    <label for="suffix">Suffix:</label>
    <select class="text-left form-control" name="suffix" id="suffix">
        <option value="">N/A</option>
        <option value="Jr">Jr</option>
        <option value="Sr">Sr</option>
        <option value="I">I</option>
        <option value="II">II</option>
        <option value="III">III</option>
    </select><br>

    <label for="puroks">Purok:</label>
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

    <label for="amount">Amount (In Numeric Form):</label>
    <input type="number" max="999999999" min="1" id="income_num" name="income_num" oninput="updateText()" class="form-control" maxlength="10"
        placeholder="Ex. 20000" required><br>

    <label for="income_words">Amount (In Words):</label>
    <input type="text" id="income_words" name="income_words" class="form-control" placeholder="Twenty Thousand"
        readonly><br><hr>

    <div class="incomePrint" style="text-align: right;">
        <button type="button" id="incomePrintBtn" class="btn btn-primary w-25">Print</button>
        <div class="modal fade" id="incomeModal" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content text-center">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-light">
                        <h2 style="font-weight: bold;">Confirm if all the data is correct?</h2>
                    </div>
                    <div class="modal-footer d-flex justify-content-around">
                        <button class="w-25 btn btn-primary" name="certificate_of_income" onclick="printIframe()"
                           >Yes</button>
                        <button type="button" class="w-25 btn btn-danger" data-bs-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    // Event listener for Business Permit Renewal print button
    document.getElementById("incomePrintBtn").addEventListener("click", function () {
        let form = document.getElementById("certificate_of_incomeForm");  // Use the unique form ID

        // Validate the form
        if (form.checkValidity()) {
            // If the form is valid, show the Business Permit Renewal modal
            let incomeModal = new bootstrap.Modal(document.getElementById("incomeModal"));
            incomeModal.show();
        } else {
            // If the form is not valid, show the built-in validation messages
            form.reportValidity();
        }
    });
</script>