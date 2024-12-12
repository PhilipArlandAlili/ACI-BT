
function changeCertificate() {
    var certificate_type = document.getElementById("certificate_type").value;
    var forms = document.getElementsByClassName("certificates")[0].children;

    for (var i = 0; i < forms.length; i++) {
        if (forms[i].id === certificate_type) {
            forms[i].classList.add("active");
        } else {
            forms[i].classList.remove("active");
        }
    }

    var iframe = document.getElementById('myIframe');
    var doc = "certificates/" + certificate_type + ".html";

    if (certificate_type == '') {
        doc = " "
    }

    if (certificate_type == 'barangay_clearance') {
        var iframe1 = document.getElementById('myIframe1');
        var doc1 = "certificates/" + "business_permit_new" + ".html";
        iframe1.src = doc1;
    }

    iframe.src = doc;

    document.getElementById("fillup").scrollIntoView({ behavior: 'smooth' });

    document.querySelectorAll('.form').forEach(function (form) {
        form.reset();
    });
}

function printIframe() {
    console.log("print me");
    var cert = document.getElementById('certificate_type').value;
    var iframe = document.getElementById('myIframe');
    var form = document.getElementById(cert + "_form");
    console.log(form);
    var iframeWindow = iframe.contentWindow;
    iframeWindow.print();
    form.submit();
    
}

function updateText() {
    var iframe = document.getElementById('myIframe');
    var iframeDocument = iframe.contentDocument || iframe.contentWindow.document;

    if (certificate_type.value == 'barangay_clearance') {
        // From PHP
        var first_name = document.getElementById('first_name');
        var middle_name = document.getElementById('middle_name');
        var last_name = document.getElementById('last_name');
        var suffix = document.getElementById('suffix');
        var purok = document.getElementById('purok');
        var birthplace = document.getElementById('birthplace');
        var birthdate = document.getElementById('birthdate');
        var civil_status = document.getElementById('civil_status');
        var pormonth = document.getElementById('month');
        var poryear = document.getElementById('year');
        var period_of_residency = document.getElementById('period_of_residency');
        var purpose = document.getElementById('purpose');

        // From HTML
        var pfirst_name = iframeDocument.getElementById('first_name');
        var pmiddle_name = iframeDocument.getElementById('middle_name');
        var plast_name = iframeDocument.getElementById('last_name');
        var psuffix = iframeDocument.getElementById('suffix');
        var ppurok = iframeDocument.getElementById('purok');
        var pbirthplace = iframeDocument.getElementById('birthplace');
        var pbirthdate_month = iframeDocument.getElementById('birthdate_month');
        var pbirthdate_day = iframeDocument.getElementById('birthdate_day');
        var pbirthdate_year = iframeDocument.getElementById('birthdate_year');
        var pcivil_status = iframeDocument.getElementById('civil_status');
        var pyear_month = iframeDocument.getElementById('year_month');
        var pperiod_of_residency = iframeDocument.getElementById('period_of_residency');
        var ppurpose = iframeDocument.getElementById('purpose');

        var date = new Date(birthdate.value);
        var month = date.getMonth();
        var day = date.getDate();
        var year = date.getFullYear();

        const month_names = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        month = month_names[month];

        pfirst_name.innerText = first_name.value;
        pmiddle_name.innerText = middle_name.value;
        plast_name.innerText = last_name.value;
        psuffix.innerText = suffix.value;
        ppurok.innerText = purok.value;
        pbirthplace.innerText = birthplace.value;

        if (birthdate.value) {
            if (validateBirthdate(birthdate.value)) {
                pbirthdate_month.innerText = "";
                pbirthdate_day.innerText = "";
                pbirthdate_year.innerText = "";
            } else {
                pbirthdate_month.innerText = month;
                pbirthdate_day.innerText = day + ", ";
                pbirthdate_year.innerText = year;
            }
        } else {
            pbirthdate_month.innerText = "";
            pbirthdate_day.innerText = "";
            pbirthdate_year.innerText = "";
        }

        pcivil_status.innerText = civil_status.value;

        if (pormonth.checked) {
            if (period_of_residency.value == 1) {
                pyear_month.innerText = " Month";
            } else if (period_of_residency.value > 1) {
                pyear_month.innerText = " Months";
            } else {
                pyear_month.innerText = "";
            }
        } else if (poryear.checked) {
            if (period_of_residency.value == 1) {
                pyear_month.innerText = " Year";
            } else if (period_of_residency.value > 1) {
                pyear_month.innerText = " Years";
            } else {
                pyear_month.innerText = "";
            }
        } else {
            pyear_month.innerText = "";
        }

        pperiod_of_residency.innerText = period_of_residency.value;
        ppurpose.innerText = purpose.value.toUpperCase();
    } else if (certificate_type.value == 'business_permit_new') {
        // From PHP
        var bpnbusiness_name = document.getElementById('bpnbusiness_name');
        var bpnpurok = document.getElementById('bpnpurok');
        var bpnmanager = document.getElementById('bpnmanager');
        var bpnaddress = document.getElementById('bpnaddress');

        // From HTML
        var pbpnbusiness_name = iframeDocument.getElementById('bpnbusiness_name');
        var pbpnpurok = iframeDocument.getElementById('bpnpurok');
        var pbpnmanager = iframeDocument.getElementById('bpnmanager');
        var pbpnaddress = iframeDocument.getElementById('bpnaddress');

        pbpnbusiness_name.innerText = bpnbusiness_name.value;
        pbpnpurok.innerText = bpnpurok.value;
        pbpnmanager.innerText = bpnmanager.value;
        pbpnaddress.innerText = bpnaddress.value;
    } else if (certificate_type.value == 'business_permit_renew') {
        // From PHP
        var bprbusiness_name = document.getElementById('bprbusiness_name');
        var bprpurok = document.getElementById('bprpurok');
        var bprmanager = document.getElementById('bprmanager');
        var bpraddress = document.getElementById('bpraddress');

        // From HTML
        var pbprbusiness_name = iframeDocument.getElementById('bprbusiness_name');
        var pbprpurok = iframeDocument.getElementById('bprpurok');
        var pbprmanager = iframeDocument.getElementById('bprmanager');
        var pbpraddress = iframeDocument.getElementById('bpraddress');

        pbprbusiness_name.innerText = bprbusiness_name.value;
        pbprpurok.innerText = bprpurok.value;
        pbprmanager.innerText = bprmanager.value;
        pbpraddress.innerText = bpraddress.value;
    } else if (certificate_type.value == 'certificate_of_cohabitation') {
        var cocfirst_name = document.getElementById('cocfirst_name');
        var cocmiddle_name = document.getElementById('cocmiddle_name');
        var coclast_name = document.getElementById('coclast_name');
        var cocsuffix = document.getElementById('cocsuffix');
        var cocbirthdate = document.getElementById('cocbirthdate');
        var cocfirst_name_female = document.getElementById('cocfirst_name_female');
        var cocmiddle_name_female = document.getElementById('cocmiddle_name_female');
        var coclast_name_female = document.getElementById('coclast_name_female');
        var cocbirthdate_female = document.getElementById('cocbirthdate_female');
        var cocpurok = document.getElementById('cocpurok');
        var cocdate_of_marriage = document.getElementById('cocdate_of_marriage');

        const month_names = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        var cocdate = new Date(cocbirthdate.value);
        var cocmonth = cocdate.getMonth();
        var cocday = cocdate.getDate();
        var cocyear = cocdate.getFullYear();
        cocmonth = month_names[cocmonth];

        var cocdate_female = new Date(cocbirthdate_female.value);
        var cocmonth_female = cocdate_female.getMonth();
        var cocday_female = cocdate_female.getDate();
        var cocyear_female = cocdate_female.getFullYear();
        cocmonth_female = month_names[cocmonth_female];

        var cocdate_of_marriage = new Date(cocdate_of_marriage.value);
        var cocyear_dom = cocdate_of_marriage.getFullYear();

        // From HTML
        var pcocfirst_name = iframeDocument.getElementById('cocfirst_name');
        var pcocmiddle_name = iframeDocument.getElementById('cocmiddle_name');
        var pcoclast_name = iframeDocument.getElementById('coclast_name');
        var pcocsuffix = iframeDocument.getElementById('cocsuffix');
        var pcocbirthdate_month = iframeDocument.getElementById('cocbirthdate_month');
        var pcocbirthdate_day = iframeDocument.getElementById('cocbirthdate_day');
        var pcocbirthdate_year = iframeDocument.getElementById('cocbirthdate_year');
        var pcocfirst_name_female = iframeDocument.getElementById('cocfirst_name_female');
        var pcocmiddle_name_female = iframeDocument.getElementById('cocmiddle_name_female');
        var pcoclast_name_female = iframeDocument.getElementById('coclast_name_female');
        var pcocbirthdate_female_month = iframeDocument.getElementById('cocbirthdate_female_month');
        var pcocbirthdate_female_day = iframeDocument.getElementById('cocbirthdate_female_day');
        var pcocbirthdate_female_year = iframeDocument.getElementById('cocbirthdate_female_year');
        var pcocpurok = iframeDocument.getElementById('cocpurok');
        var pcocdate_of_marriage = iframeDocument.getElementById('cocdate_of_marriage');
        var pcocdom_y = iframeDocument.getElementById('cocdom_y');

        pcocfirst_name.innerText = cocfirst_name.value;
        pcocmiddle_name.innerText = cocmiddle_name.value;
        pcoclast_name.innerText = coclast_name.value;
        pcocsuffix.innerText = cocsuffix.value;
        pcocbirthdate_month.innerText = cocmonth;
        pcocbirthdate_day.innerText = cocday + ", ";
        pcocbirthdate_year.innerText = cocyear;
        pcocfirst_name_female.innerText = cocfirst_name_female.value;
        pcocmiddle_name_female.innerText = cocmiddle_name_female.value;
        pcoclast_name_female.innerText = coclast_name_female.value;
        pcocbirthdate_female_month.innerText = cocmonth_female;
        pcocbirthdate_female_day.innerText = cocday_female + ", ";
        pcocbirthdate_female_year.innerText = cocyear_female;
        pcocpurok.innerText = cocpurok.value;

        var coctoday = new Date();
        var coctyear = coctoday.getFullYear();

        var years_married = coctyear - cocyear_dom;

        pcocdate_of_marriage.innerText = years_married;

        if (years_married == 1) {
            pcocdom_y.innerText = 'Year';
        } else {
            pcocdom_y.innerText = 'Years';
        }

    } else if (certificate_type.value == 'certificate_of_employability') {
        var cefirst_name = document.getElementById('cefirst_name');
        var cemiddle_name = document.getElementById('cemiddle_name');
        var celast_name = document.getElementById('celast_name');
        var cesuffix = document.getElementById('cesuffix');
        var cebirthdate = document.getElementById('cebirthdate');
        var cepurok = document.getElementById('cepurok');
        var cepurpose = document.getElementById('cepurpose');

        var pcefirst_name = iframeDocument.getElementById('cefirst_name');
        var pcemiddle_name = iframeDocument.getElementById('cemiddle_name');
        var pcelast_name = iframeDocument.getElementById('celast_name');
        var pcesuffix = iframeDocument.getElementById('cesuffix');
        var pcebirthdate = iframeDocument.getElementById('cebirthdate');
        var pcepurok = iframeDocument.getElementById('cepurok');
        var pcepurpose = iframeDocument.getElementById('cepurpose');

        pcefirst_name.innerText = cefirst_name.value;
        pcemiddle_name.innerText = cemiddle_name.value;
        pcelast_name.innerText = celast_name.value;
        pcesuffix.innerText = cesuffix.value;
        pcebirthdate.innerText = showAge(cebirthdate);
        pcepurok.innerText = cepurok.value;
        pcepurpose.innerText = cepurpose.value;

    } else if (certificate_type.value == 'certificate_of_income') {

    } else if (certificate_type.value == 'certificate_of_indigency_aics') {
        var cidfirst_name = document.getElementById('cidfirst_name');
        var cidmiddle_name = document.getElementById('cidmiddle_name');
        var cidlast_name = document.getElementById('cidlast_name');
        var cidsuffix = document.getElementById('cidsuffix');
        var cidbirthdate = document.getElementById('cidbirthdate');
        var cidcivil_status = document.getElementById('cidcivil_status');
        var cidpurok = document.getElementById('cidpurok');
        var cidpurpose = document.getElementById('cidpurpose');

        var pcidfirst_name = iframeDocument.getElementById('cidfirst_name');
        var pcidmiddle_name = iframeDocument.getElementById('cidmiddle_name');
        var pcidlast_name = iframeDocument.getElementById('cidlast_name');
        var pcidsuffix = iframeDocument.getElementById('cidsuffix');
        var pcidbirthdate = iframeDocument.getElementById('cidbirthdate');
        var pcidcivil_status = iframeDocument.getElementById('cidcivil_status');
        var pcidpurok = iframeDocument.getElementById('cidpurok');
        var pcidpurpose = iframeDocument.getElementById('cidpurpose');

        pcidfirst_name.innerText = cidfirst_name.value;
        pcidmiddle_name.innerText = cidmiddle_name.value;
        pcidlast_name.innerText = cidlast_name.value;
        pcidsuffix.innerText = cidsuffix.value;
        pcidbirthdate.innerText = cidbirthdate.value;
        pcidcivil_status.innerText = cidcivil_status.value;
        pcidpurok.innerText = cidpurok.value;
        pcidpurpose.innerText = cidpurpose.value;

    } else if (certificate_type.value == 'complaint_certificate') {

    } else if (certificate_type.value == 'death_certificate') {

    } else if (certificate_type.value == 'lot_ownership') {

    } else if (certificate_type.value == 'transfer_of_residency') {
        var trfirst_name = document.getElementById('trfirst_name');
        var trmiddle_name = document.getElementById('trmiddle_name');
        var trlast_name = document.getElementById('trlast_name');
        var trsuffix = document.getElementById('trsuffix');
        var trnationality = document.getElementById('trnationality');
        var trcivil_status = document.getElementById('trcivil_status');
        var trpurok = document.getElementById('trpurok');
        var trcurrent_address = iframeDocument.getElementById('trcurrent_address');
        var trprevious_address = document.getElementById('trprevious_address');
        var trpurpose = document.getElementById('trpurpose');

        // From HTML
        var ptrfirst_name = iframeDocument.getElementById('trfirst_name');
        var ptrmiddle_name = iframeDocument.getElementById('trmiddle_name');
        var ptrlast_name = iframeDocument.getElementById('trlast_name');
        var ptrsuffix = iframeDocument.getElementById('trsuffix');
        var ptrnationality = iframeDocument.getElementById('trnationality');
        var ptrcivil_status = iframeDocument.getElementById('trcivil_status');
        var ptrpurok = iframeDocument.getElementById('trpurok');
        var ptrcurrent_address = iframeDocument.getElementById('trcurrent_address');
        var ptrprevious_address = iframeDocument.getElementById('trprevious_address');
        var ptrpurpose = iframeDocument.getElementById('trpurpose');


        ptrfirst_name.innerText = trfirst_name.value;
        ptrmiddle_name.innerText = trmiddle_name.value;
        ptrlast_name.innerText = trlast_name.value;
        ptrsuffix.innerText = trsuffix.value;
        ptrnationality.innerText = trnationality.value;
        ptrcivil_status.innerText = trcivil_status.value;
        ptrpurok.innerText = trpurok.value;
        ptrcurrent_address.innerText = trpurok.value;
        ptrprevious_address.innerText = trprevious_address.value;
        ptrpurpose.innerText = trpurpose.value;
    }

}

function validateBirthdate(birthdate_input) {
    var today = new Date();
    var birthdate = new Date(birthdate_input.value);

    var age = today.getFullYear() - birthdate.getFullYear();
    var month_diff = today.getMonth() - birthdate.getMonth();

    if (month_diff < 0 || (month_diff === 0 && today.getDate() < birthdate.getDate())) {
        age--;
    }

    console.log(age);

    if (age < 18) {
        alert("You must be at least 18 years old.");
        birthdate_input.value = '';
        return true;
    } else {
        return false;
    }

}

function showAge(birthdate_input) {
    var today = new Date();
    var birthdate = new Date(birthdate_input.value);

    var age = today.getFullYear() - birthdate.getFullYear();
    var month_diff = today.getMonth() - birthdate.getMonth();

    if (month_diff < 0 || (month_diff === 0 && today.getDate() < birthdate.getDate())) {
        age--;
    }

    return age;
}