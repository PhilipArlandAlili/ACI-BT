<form action="#" method="post" id="form">

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

    <label for="">Amount (In Numeric Form)</label>
    <input type="number" name="amount" class="form-control" maxlength="10" placeholder="Ex. 123456789" required><br>

    <label for="">Duty Officer Full Name:</label>
    <input type="text" class="form-control">
    <button name="certificate_of_income" onclick="printIframe()" type="submit">Print</button>
</form>