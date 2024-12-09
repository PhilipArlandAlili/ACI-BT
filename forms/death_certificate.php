<form action="#" method="post" id="deathForm">

    <label for="first_name">First Name:</label>
    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Ex. Juan" required><br>

    <label for="middle_name">Middle Name:</label>
    <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Ex. Mandaragat"
        required><br>

    <label for="last_name">Last Name:</label>
    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Ex. Dela Cruz" required><br>

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
    <input type="date" class="form-control" id="birthdate" name="birthdate" required><br>

    <label for="purok">Purok:</label>
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

    <label for="dateOfDeath">Date of death:</label>
    <input type="date" class="form-control" name="date_of_death"><br>

    <label for="timeOfDeath">Time of death:</label>
    <input type="time" class="form-control" name="time_of_death"><br>

    <label for="causeOfDeath">Cause of death:</label>
    <input type="text" class="form-control" name="cause_of_death" placeholder="Too old"><br>
    <hr>


    <label for="" class="fw-bold">Requester</label><br>
    <label for="first_name">First Name:</label>
    <input type="text" class="form-control" id="first_name" name="req_first_name" placeholder="Ex. Juan" required><br>

    <label for="middle_name">Middle Name:</label>
    <input type="text" class="form-control" id="middle_name" name="req_middle_name" placeholder="Ex. Mandaragat"
        required><br>

    <label for="last_name">Last Name:</label>
    <input type="text" class="form-control" id="last_name" name="req_last_name" placeholder="Ex. Dela Cruz" required><br>

    <label for="suffix">Suffix:</label>
    <select class="text-left form-control" name="suffix" id="req_suffix">
        <option value="">N/A</option>
        <option value="Jr">Jr</option>
        <option value="Sr">Sr</option>
        <option value="I">I</option>
        <option value="II">II</option>
        <option value="III">III</option>
    </select><br>

    <label for="relationshipToDeadPerson">Relationship to the dead person:</label>
    <input type="text" class="form-control" name="relationship" placeholder="Son"><br>
    <hr>

    <div class="deathPrint" style="text-align: right;">
        <button type="button" class="btn btn-primary w-25" id="deathPrintBtn">Print</button>
        <div class="modal fade" id="deathModal" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content text-center">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-light">
                        <h2 style="font-weight: bold;">Confirm if all the data is correct?</h2>
                    </div>
                    <div class="modal-footer d-flex justify-content-around">
                        <button class="w-25 btn btn-primary" name="death_certificate" onclick="printIframe()"
                            id="confirmPrint" type="submit">Yes</button>
                        <button type="button" class="w-25 btn btn-danger" data-bs-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    // Event listener for Business Permit Renewal print button
    document.getElementById("deathPrintBtn").addEventListener("click", function () {
        let form = document.getElementById("deathForm");  // Use the unique form ID

        // Validate the form
        if (form.checkValidity()) {
            // If the form is valid, show the Business Permit Renewal modal
            let deathModal = new bootstrap.Modal(document.getElementById("deathModal"));
            deathModal.show();
        } else {
            // If the form is not valid, show the built-in validation messages
            form.reportValidity();
        }
    });
</script>