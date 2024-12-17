<!-- Barangay Clearance Form -->

<form action="#" method="post" class="form" id="certificate_of_fisherfolks_form">

    <label for="">First Name:</label>
    <input type="text" class="form-control" name="first_name" id="cffirst_name" maxlength="50"
        oninput="this.value = this.value.toUpperCase(); this.value = this.value.replace(/[^A-Za-z. ]/g, '').replace(/^([^.]*)\.(.*)\./, '$1.$2'); updateText();"
        required placeholder="Ex. Juan"><br>

    <label for="">Middle Name:</label>
    <input type="text" class="form-control" name="middle_name" id="cfmiddle_name" maxlength="50"
        oninput="this.value = this.value.toUpperCase(); this.value = this.value.replace(/[^A-Za-zs ]/g, '').replace(/^([^.]*)\.(.*)\./, '$1.$2'); updateText();"
        placeholder="Ex. Reyes"><br>

    <label for="">Last Name:</label>
    <input type="text" class="form-control" name="last_name" id="cflast_name" maxlength="50"
        oninput="this.value = this.value.toUpperCase(); this.value = this.value.replace(/[^A-Za-z' ]/g, '').replace(/^([^.]*)\.(.*)\./, '$1.$2'); updateText();"
        required placeholder="Ex. Dela Cruz"><br>

    <label for="suffix">Suffix:</label>
    <select class="text-left form-control" name="suffix" id="cfsuffix" onchange="updateText();">
        <option value="">N/A</option>
        <option value="Jr">Jr</option>
        <option value="Sr">Sr</option>
        <option value="I">I</option>
        <option value="II">II</option>
        <option value="III">III</option>
    </select><br>

    <label for="purok">Purok:</label>
    <select class="text-left form-control" name="purok" id="cfpurok" onchange="updateText();" required>
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

    <label for="">Type of Fishing</label>
    <input type="text" class="form-control" name="fishing_type" id="cffishing_type" maxlength="50"
        oninput="this.value = this.value.toUpperCase(); this.value = this.value.replace(/[^A-Za-z' ]/g, '').replace(/^([^.]*)\.(.*)\./, '$1.$2'); updateText();"
        required placeholder="Ex. Sport Fishing"><br>

    <label for="purok">Purok Located At:</label>
    <select class="text-left form-control" name="purok" id="cflpurok" onchange="updateText();" required>
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
    </select><br><hr>

    <div class="fisherfolksPrint" style="text-align: right;">
        <button type="button" id="fisherfolksPrintBtn" class="btn btn-primary w-25">Print</button>

        <!-- Barangay Clearance Modal -->
        <div class="modal fade" id="fisherfolksModal" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content text-center">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-light">
                        <h2 style="font-weight: bold;">Confirm if all the data is correct?</h2>
                    </div>
                    <div class="modal-footer d-flex justify-content-around">
                        <button class="w-25 btn btn-primary" name="certificate_of_fisherfolks"
                            onclick="printIframe()">Yes</button>
                        <button type="button" class="w-25 btn btn-danger" data-bs-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- <script src="assets/js/certificate/certificate_of_fisherfolks.js"></script> -->

<script>
    // Event listener for Barangay Clearance button
    document.getElementById("fisherfolksPrintBtn").addEventListener("click", function () {
        let form = document.getElementById("certificate_of_fisherfolks_form");  // Correct form ID

        // Validate the form
        if (form.checkValidity()) {
            // If the form is valid, show the Barangay Clearance modal
            let fisherfolksModal = new bootstrap.Modal(document.getElementById("fisherfolksModal"));
            fisherfolksModal.show();
        } else {
            // If the form is not valid, show the built-in validation messages
            form.reportValidity();
        }
    });
</script>