<style>
    .form-section {
        display: none;
    }

    .form-section.active {
        display: block;
    }
</style>

<form action="#" method="post" class="form" id="first_time_job_seeker_form">

    <div class="form-section active" id="magakuha_section">
        <label for="" class="fw-bold">Maga kuha</label><br>
        <label for="">First Name:</label>
        <input type="text" class="form-control" id="ftfirst_name" name="first_name" maxlength="50"
            oninput="this.value = this.value.replace(/[^A-Za-z ]/g, '').replace(/^([^.]*)\.(.*)\./, '$1.$2');updateText();"
            required placeholder="Ex. Juan"><br>

        <label for="">Middle Name:</label>
        <input type="text" class="form-control" id="ftmiddle_name" name="middle_name" maxlength="50"
            oninput="this.value = this.value.replace(/[^A-Za-zs ]/g, '').replace(/^([^.]*)\.(.*)\./, '$1.$2');updateText();"
            placeholder="Ex. Reyes"><br>

        <label for="">Last Name:</label>
        <input type="text" class="form-control" id="ftlast_name" name="last_name" maxlength="50"
            oninput="this.value = this.value.replace(/[^A-Za-z' ]/g, '').replace(/^([^.]*)\.(.*)\./, '$1.$2');updateText();"
            required placeholder="Ex. Dela Cruz"><br>

        <label for="suffix">Suffix:</label>
        <select class="text-left form-control" name="suffix" id="ftsuffix" oninput="updateText();">
            <option value="">N/A</option>
            <option value="Jr">Jr</option>
            <option value="Sr">Sr</option>
            <option value="I">I</option>
            <option value="II">II</option>
            <option value="III">III</option>
        </select><br>

        <label for="birthdate">Birthday:</label>
        <input type="date" class="form-control" id="ftbirthdate" onchange=" validateBirthdate(this);updateText();"
            name="birthdate" required><br>

        <label for="period_of_residency">Period of Residency:</label>
        <div class="radios d-flex gap-3">
            <div class="form-check">
                <input class="form-check-input" name="period_of_residency" onclick="updateText()" type="radio"
                    value="months" id="ftmonth" required>
                <label class="form-check-label" for="radioMonths">
                    Months
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="period_of_residency" onclick="updateText()" type="radio"
                    value="years" id="ftyear" required>
                <label class="form-check-label" for="radioYears">
                    Years
                </label>
            </div>
        </div>

        <input type="number" class="form-control" id="ftperiod_of_residency" maxlength="2" max="99" min="1"
            oninput="showAge();updateText()" name="period_of_residency" placeholder="Ex. 3 years/months" required><br>

        <label for="purok">Purok:</label>
        <select class="text-left form-control" name="purok" id="ftpurok" oninput="updateText();" required>
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
        <div class="btn-container d-flex justify-content-between">
            <button type="button" class="btn btn-secondary" id="nextToGuardian">Next</button>
            <button name="first_time_job_seeker" class="btn btn-primary" onclick="printIframe()">Print</button>
        </div>
        <hr>
    </div>

    <div class="form-section" id="guardian_section">
        <label for="" class="fw-bold">Guardian</label><br>
        <label for="">First Name:</label>
        <input type="text" class="form-control" id="ftogfirst_name" name="first_name" maxlength="50"
            oninput="this.value = this.value.replace(/[^A-Za-z ]/g, '').replace(/^([^.]*)\.(.*)\./, '$1.$2');updateText();"
            required placeholder="Ex. Juan"><br>

        <label for="">Middle Name:</label>
        <input type="text" class="form-control" id="ftogmiddle_name" name="middle_name" maxlength="50"
            oninput="this.value = this.value.replace(/[^A-Za-zs ]/g, '').replace(/^([^.]*)\.(.*)\./, '$1.$2');updateText();"
            placeholder="Ex. Reyes"><br>

        <label for="">Last Name:</label>
        <input type="text" class="form-control" id="ftoglast_name" name="last_name" maxlength="50"
            oninput="this.value = this.value.replace(/[^A-Za-z' ]/g, '').replace(/^([^.]*)\.(.*)\./, '$1.$2');updateText();"
            required placeholder="Ex. Dela Cruz"><br>

        <label for="suffix">Suffix:</label>
        <select class="text-left form-control" name="suffix" id="ftogsuffix" oninput="updateText();">
            <option value="">N/A</option>
            <option value="Jr">Jr</option>
            <option value="Sr">Sr</option>
            <option value="I">I</option>
            <option value="II">II</option>
            <option value="III">III</option>
        </select><br>

        <label for="birthdate">Birthday:</label>
        <input type="date" class="form-control" id="ftogbirthdate" onchange=" validateBirthdate(this);updateText();"
            name="birthdate" required><br>

        <label for="suffix">Role:</label>
        <select class="text-left form-control" name="suffix" id="ftogrole" oninput="updateText();">
            <option value="">--Select Role--</option>
            <option value="Parent">Parent</option>
            <option value="Guardian">Guardian</option>
        </select><br>

        <label for="period_of_residency">Period of Residency:</label>
        <div class="radios d-flex gap-3">
            <div class="form-check">
                <input class="form-check-input" name="ftogperiod_of_residency" onclick="updateText()" type="radio"
                    value="months" id="ftogmonth" required>
                <label class="form-check-label" for="radioMonths">
                    Months
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="ftogperiod_of_residency" onclick="updateText()" type="radio"
                    value="years" id="ftogyear" required>
                <label class="form-check-label" for="radioYears">
                    Years
                </label>
            </div>
        </div>

        <input type="number" class="form-control" id="ftogperiod_of_residency" maxlength="2" max="99" min="1"
            oninput="showAge();updateText()" name="period_of_residency" placeholder="Ex. 3 years/months" required><br>

        <label for="purok">Purok:</label>
        <select class="text-left form-control" name="purok" id="ftogpurok" oninput="updateText();" required>
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
        <div class="btn-container d-flex justify-content-between">
            <button type="button" class="btn btn-secondary" id="backToMagaKuha">Back</button>
            <button name="first_time_job_seeker" class="btn btn-primary" onclick="printIframe()">Print</button>
        </div>
        <hr>
    </div>

    <!-- <button name="first_time_job_seeker" onclick="printIframe()">Print</button> -->
</form>

<script>
    const magaKuhaSection = document.getElementById('magakuha_section');
    const guardianSection = document.getElementById('guardian_section');
    const nextButton = document.getElementById('nextToGuardian');
    const backButton = document.getElementById('backToMagaKuha');

    nextButton.addEventListener('click', () => {
        magaKuhaSection.classList.remove('active');
        guardianSection.classList.add('active');
    });

    backButton.addEventListener('click', () => {
        guardianSection.classList.remove('active');
        magaKuhaSection.classList.add('active');
    });
</script>