<form action="#" method="post" class="form" id="certificate_of_cohabitation_form">

    <label for="" class="fw-bold">Male</label><br>
    <label for="">First Name:</label>
    <input type="text" class="form-control" name="first_name" id="cocfirst_name" maxlength="50"  oninput="this.value = this.value.replace(/[^A-Za-z. ]/g, '').replace(/^([^.]*)\.(.*)\./, '$1.$2');this.value = this.value.toUpperCase();updateText();" required placeholder="Ex. Juan"><br>

    <label for="">Middle Name:</label>
    <input type="text" class="form-control" name="middle_name" id="cocmiddle_name" maxlength="50"  oninput="this.value = this.value.replace(/[^A-Za-zs ]/g, '').replace(/^([^.]*)\.(.*)\./, '$1.$2');this.value = this.value.toUpperCase();updateText();"   placeholder="Ex. Reyes"><br>

    <label for="">Last Name:</label>
    <input type="text" class="form-control" name="last_name" id="coclast_name" maxlength="50"  oninput="this.value = this.value.replace(/[^A-Za-z' ]/g, '').replace(/^([^.]*)\.(.*)\./, '$1.$2');this.value = this.value.toUpperCase();updateText();" required  placeholder="Ex. Dela Cruz"><br>

    <label for="">Suffix:</label>
    <select class="form-control text-left" name="suffix" id="cocsuffix" onchange="updateText();">
        <option value="">N/A</option>
        <option value="Jr">Jr</option>
        <option value="Sr">Sr</option>
        <option value="I">I</option>
        <option value="II">II</option>
        <option value="III">III</option>
    </select><br>

    <label for="cohabitant1Birthdate">Birthdate:</label>
    <input type="date" class="form-control" id="cocbirthdate"  oninput="this.value = this.value.toUpperCase();validateBirthdate(this);updateText();" name="birthdate" required><br>

    <hr>

    <label for="" class="fw-bold">Female</label><br>
    <label for="">First Name:</label>
    <input type="text" class="form-control" name="first_name_female" id="cocfirst_name_female" maxlength="50"  oninput="this.value = this.value.replace(/[^A-Za-z. ]/g, '').replace(/^([^.]*)\.(.*)\./, '$1.$2');this.value = this.value.toUpperCase();updateText();" placeholder="Ex. Maria" required><br>

    <label for="">Middle Name:</label>
    <input type="text" class="form-control" name="middle_name_female" id="cocmiddle_name_female" maxlength="50"  oninput="this.value = this.value.replace(/[^A-Za-z ]/g, '').replace(/^([^.]*)\.(.*)\./, '$1.$2');this.value = this.value.toUpperCase();updateText();" placeholder="Ex. Garcia" ><br>

    <label for="">Last Name:</label>
    <input type="text" class="form-control" name="last_name_female" id="coclast_name_female" maxlength="50"  oninput="this.value = this.value.replace(/[^A-Za-z ]/g, '').replace(/^([^.]*)\.(.*)\./, '$1.$2');this.value = this.value.toUpperCase();updateText();" placeholder="Ex. Santos" required><br>


    <label for="cohabitant1Birthdate">Birthdate:</label>
    <input type="date" class="form-control" id="cocbirthdate_female" oninput="this.value = this.value.toUpperCase();validateBirthdate(this);updateText();" name="birthdate_female" required><br><hr>

    <label for="">Purok:</label><br>
    <select name="purok" class="form-control" id="cocpurok" onchange="updateText();" required>
        <option value="">--Select Purok--</option>
        <option value="Centro">Centro</option>
        <option value="Huwaran">Huwaran</option>
        <option value="Kaakbayan">Kaakbayan</option>
        <option value="New Princesa"> New Princesa</option>
        <option value="San Franciso I">San Franciso I</option>
        <option value="San Franciso II">San Franciso II</option>
        <option value="Sandiwa">Sandiwa</option>
        <option value="Trece">Trece</option>
        <option value="Uha">UHA</option>
    </select>
    <br>

    <!--Month and Year daw-->
    <label for="dateOfMarriage">Date of marriage:</label>
    <input type="date" id="cocdate_of_marriage" class="form-control" oninput="this.value = this.value.toUpperCase();validateDate(this);updateText();" name="date_of_marriage" required><br>
    <hr>

    <div class="print" style="text-align: right;">
        <button type="button" class="btn btn-primary w-25" data-bs-toggle="modal"
            data-bs-target="#certCohabilitation">Print</button>
        <div class="modal fade" id="certCohabilitation" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content text-center">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-light">
                        <h2 style="font-weight: bold;">Confirm if all the data is correct?</h2>
                    </div>
                    <div class="modal-footer d-flex justify-content-around">
                        <button class="w-25 btn btn-primary" name="certificate_of_cohabitation"
                            onclick="printIframe()">Yes</button>
                        <button type="button" class="w-25 btn btn-danger" data-bs-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>