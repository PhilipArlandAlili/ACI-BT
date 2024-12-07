<form action="#" method="POST" id="form">
    <!-- Birthday input -->
    <label for="first_name">First Name:</label>
    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Ex. Juan" required><br>

    <div class="form-row d-flex justify-content-between">
        <div class="form-group col-sm-2">
            <label for="middle_initial">M.I. :</label>
            <input type="text" class="form-control" id="middle_initial" name="middle_initial" placeholder="Ex. M"
                maxlength="1" pattern="[A-Za-z]" style="text-transform: uppercase;" required>
        </div>
        <div class="form-group col-sm-6">
            <label for="last_name">Last Name:</label>
            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Ex. Dela Cruz"
                required><br>
        </div>
        <div class="form-group col-sm-2">
            <label for="suffix">Suffix:</label>
            <select class="text-left form-control" name="suffix" id="suffix">
                <option value="">N/A</option>
                <option value="Jr">Jr</option>
                <option value="Sr">Sr</option>
                <option value="I">I</option>
                <option value="II">II</option>
                <option value="III">III</option>
            </select>
        </div>
    </div>

    <!-- Birthday input -->
    <label for="birthday">Birthday:</label>
    <input type="date" class="form-control" id="birthday" name="birthday" required><br>

    <!-- Age input (readonly) -->
    <label for="age">Age:</label>
    <input type="text" class="form-control" id="age" name="age" readonly><br>

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
    <hr>

    <div class="print" style="text-align: right;">
        <button type="button" class="btn btn-primary w-25" data-bs-toggle="modal"
            data-bs-target="#certOfEmployability">Print</button>
        <div class="modal fade" id="certOfEmployability" tabindex="-1" style="display: none;" aria-hidden="true">
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
                            type="submit">Yes</button>
                        <button type="button" class="w-25 btn btn-danger" data-bs-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>