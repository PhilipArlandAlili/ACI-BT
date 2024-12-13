
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

    // if (certificate_type == 'barangay_clearance') {
    //     var iframe1 = document.getElementById('myIframe1');
    //     var doc1 = "certificates/" + "business_permit_new" + ".html";
    //     iframe1.src = doc1;
    // }

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
    }

    else if (certificate_type.value == 'first_time_job_seeker') {
        // From PHP
        // First time jobseeker
        var ftfirst_name = document.getElementById('ftfirst_name');
        var ftmiddle_name = document.getElementById('ftmiddle_name');
        var ftlast_name = document.getElementById('ftlast_name');
        var ftsuffix = document.getElementById('ftsuffix');
        var ftbirthdate = document.getElementById('ftbirthdate');
        var ftpurok = document.getElementById('ftpurok');
        var ftpormonth = document.getElementById('ftmonth');
        var ftporyear = document.getElementById('ftyear');
        var ftperiod_of_residency = document.getElementById('ftperiod_of_residency');

        // From HTML
        var pftfirst_name = iframeDocument.getElementById('ftfirst_name');
        var pftmiddle_name = iframeDocument.getElementById('ftmiddle_name');
        var pftlast_name = iframeDocument.getElementById('ftlast_name');
        var pftsuffix = iframeDocument.getElementById('ftsuffix');
        var pftbirthdate_month = iframeDocument.getElementById('ftbirthdate_month');
        var pftpurok = iframeDocument.getElementById('ftpurok');
        var pftyear_month = iframeDocument.getElementById('ftyear_month');
        var pftperiod_of_residency = iframeDocument.getElementById('ftperiod_of_residency');

        pftfirst_name.innerText = ftfirst_name.value;
        pftmiddle_name.innerText = ftmiddle_name.value;
        pftlast_name.innerText = ftlast_name.value;
        pftsuffix.innerText = ftsuffix.value;
        pftpurok.innerText = ftpurok.value;

        // Oathtaking Seeker Name
        var pftofirst_name = iframeDocument.getElementById('ftofirst_name');
        var pftomiddle_name = iframeDocument.getElementById('ftomiddle_name');
        var pftolast_name = iframeDocument.getElementById('ftolast_name');
        var pftosuffix = iframeDocument.getElementById('ftosuffix');
        var pftoyear_month = iframeDocument.getElementById('ftoyear_month');
        var pftoperiod_of_residency = iframeDocument.getElementById('ftoperiod_of_residency');

        pftofirst_name.innerText = ftfirst_name.value;
        pftomiddle_name.innerText = ftmiddle_name.value;
        pftolast_name.innerText = ftlast_name.value;
        pftosuffix.innerText = ftsuffix.value;

        // Seeker Signature Name
        var pftosfirst_name = iframeDocument.getElementById('ftosfirst_name');
        var pftosmiddle_name = iframeDocument.getElementById('ftosmiddle_name');
        var pftoslast_name = iframeDocument.getElementById('ftoslast_name');
        var pftossuffix = iframeDocument.getElementById('ftossuffix');

        pftosfirst_name.innerText = ftfirst_name.value;
        pftosmiddle_name.innerText = ftmiddle_name.value;
        pftoslast_name.innerText = ftlast_name.value;
        pftossuffix.innerText = ftsuffix.value;

        // Guardian Alaga Name
        var pftogafirst_name = iframeDocument.getElementById('ftogafirst_name');
        var pftogamiddle_name = iframeDocument.getElementById('ftogamiddle_name');
        var pftogalast_name = iframeDocument.getElementById('ftogalast_name');
        var pftogasuffix = iframeDocument.getElementById('ftogasuffix');

        pftogafirst_name.innerText = ftfirst_name.value;
        pftogamiddle_name.innerText = ftmiddle_name.value;
        pftogalast_name.innerText = ftlast_name.value;
        pftogasuffix.innerText = ftsuffix.value;


        if (ftpormonth.checked) {
            if (ftperiod_of_residency.value == 1) {
                pftyear_month.innerText = " Month";
                pftoyear_month.innerText = " Month";
            } else if (ftperiod_of_residency.value > 1) {
                pftyear_month.innerText = " Months";
                pftoyear_month.innerText = " Months";
            } else {
                pftyear_month.innerText = "";
                pftoyear_month.innerText = "";
            }
        } else if (ftporyear.checked) {
            if (ftperiod_of_residency.value == 1) {
                pftyear_month.innerText = " Year";
                pftoyear_month.innerText = " Year";
            } else if (ftperiod_of_residency.value > 1) {
                pftyear_month.innerText = " Years";
                pftoyear_month.innerText = " Years";
            } else {
                pftyear_month.innerText = "";
                pftoyear_month.innerText = "";
            }
        } else {
            pftyear_month.innerText = "";
            pftoyear_month.innerText = "";
        }
        pftperiod_of_residency.innerText = ftperiod_of_residency.value;
        pftoperiod_of_residency.innerText = ftperiod_of_residency.value;


        // Guardian of the galaxy
        var ftogfirst_name = document.getElementById('ftogfirst_name');
        var ftogmiddle_name = document.getElementById('ftogmiddle_name');
        var ftoglast_name = document.getElementById('ftoglast_name');
        var ftogsuffix = document.getElementById('ftogsuffix');
        var ftogbirthdate = document.getElementById('ftogbirthdate');
        var ftogrole = document.getElementById('ftogrole');
        var ftogpurok = document.getElementById('ftogpurok');
        var ftogpormonth = document.getElementById('ftogmonth');
        var ftogporyear = document.getElementById('ftogyear');
        var ftogperiod_of_residency = document.getElementById('ftogperiod_of_residency');

        var pftogfirst_name = iframeDocument.getElementById('ftogfirst_name');
        var pftogmiddle_name = iframeDocument.getElementById('ftogmiddle_name');
        var pftoglast_name = iframeDocument.getElementById('ftoglast_name');
        var pftogsuffix = iframeDocument.getElementById('ftogsuffix');
        var pftogbirthdate_month = iframeDocument.getElementById('ftogbirthdate_month');
        var pftogrole = iframeDocument.getElementById('ftogrole');
        var pftogpurok = iframeDocument.getElementById('ftogpurok');
        var pftogyear_month = iframeDocument.getElementById('ftogyear_month');
        var pftogperiod_of_residency = iframeDocument.getElementById('ftogperiod_of_residency');

        pftogfirst_name.innerText = ftogfirst_name.value;
        pftogmiddle_name.innerText = ftogmiddle_name.value;
        pftoglast_name.innerText = ftoglast_name.value;
        pftogsuffix.innerText = ftogsuffix.value;
        pftogrole.innerText = ftogrole.value;
        pftogpurok.innerText = ftogpurok.value;

        // Guardian of the Galaxy Signature
        // Di gumagana
        var pftogsfirst_name = iframeDocument.getElementById('ftogsfirst_name');
        var pftogsmiddle_name = iframeDocument.getElementById('ftogsmiddle_name');
        var pftogslast_name = iframeDocument.getElementById('ftogslast_name');
        var pftogssuffix = iframeDocument.getElementById('ftogssuffix');

        pftogsfirst_name.innerText = ftogfirst_name.value;
        pftogsmiddle_name.innerText = ftogmiddle_name.value;
        pftogslast_name.innerText = ftoglast_name.value;
        pftogssuffix.innerText = ftogsuffix.value;
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

function numberToWords(num) {
    if (num === 0) return "zero";
    if (num > 1_000_000_000) return "Number exceeds 1 billion";

    const ones = [
        "", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine"
    ];
    const teens = [
        "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen",
        "Sixteen", "Seventeen", "Eighteen", "Nineteen"
    ];
    const tens = [
        "", "Ten", "Twenty", "Thirty", "Forty", "Fifty", "Sixty", "Seventy", "Eighty", "Ninety"
    ];
    const thousands = [
        "", "Thousand", "Million", "Billion"
    ];

    function convertChunk(num) {
        let words = "";

        if (num >= 100) {
            words += ones[Math.floor(num / 100)] + " hundred ";
            num %= 100;
        }
        if (num >= 11 && num <= 19) {
            words += teens[num - 11] + " ";
        } else if (num === 10 || num >= 20) {
            words += tens[Math.floor(num / 10)] + " ";
            num %= 10;
        }
        if (num > 0 && num <= 9) {
            words += ones[num] + " ";
        }

        return words.trim();
    }

    let result = "";
    let chunkCount = 0;

    while (num > 0) {
        const chunk = num % 1000;
        if (chunk > 0) {
            result = convertChunk(chunk) + " " + thousands[chunkCount] + " " + result;
        }
        num = Math.floor(num / 1000);
        chunkCount++;
    }

    return result.trim();
}

function convertTo12Hour(time24) {
    const [hours, minutes] = time24.split(":").map(Number);

    if (hours > 24 || minutes > 59 || hours < 0 || minutes < 0) {
        return "Invalid time";
    }

    const period = hours >= 12 ? "PM" : "AM";
    const hours12 = hours % 12 || 12; // Convert 0 to 12 for midnight

    return `${hours12}:${minutes.toString().padStart(2, "0")} ${period}`;
}

function carldeath() {
    var iframe = document.getElementById('myIframe');
    var iframeDocument;

    if (iframe && iframe.contentDocument) {
        iframeDocument = iframe.contentDocument;
    } else {
        console.error('Iframe document is not accessible or does not exist.');
        return;
    }

    console.log(iframeDocument);

    // Access input fields from the main document
    var dcfirst_name = document.getElementById('dcfirst_name');
    var dcmiddle_name = document.getElementById('dcmiddle_name');
    var dclast_name = document.getElementById('dclast_name');
    var dcsuffix = document.getElementById('dcsuffix');
    var dcbirthdate = document.getElementById('dcbirthdate');
    var dcpurok = document.getElementById('dcpurok');
    var dcdate_of_death = document.getElementById('dcdate_of_death');
    var dctime_of_death = document.getElementById('dctime_of_death');
    var dccause_of_death = document.getElementById('dccause_of_death');
    var dcreq_first_name = document.getElementById('dcreq_first_name');
    var dcreq_middle_name = document.getElementById('dcreq_middle_name');
    var dcreq_last_name = document.getElementById('dcreq_last_name');
    var dcreq_suffix = document.getElementById('dcreq_suffix');
    var dcrelationship = document.getElementById('dcrelationship');

    const month_names = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

    var dcdate = new Date(dcbirthdate.value);
    var dcmonth = month_names[dcdate.getMonth()];
    var dcday = dcdate.getDate();
    var dcyear = dcdate.getFullYear();

    var dcdeathdate = new Date(dcdate_of_death.value);
    var dcdeathmonth = month_names[dcdeathdate.getMonth()];
    var dcdeathday = dcdeathdate.getDate();
    var dcdeathyear = dcdeathdate.getFullYear();

    // Access input fields from the iframe document
    var pdcfirst_name = iframeDocument.getElementById('dcfirst_name');
    var pdcmiddle_name = iframeDocument.getElementById('dcmiddle_name');
    var pdclast_name = iframeDocument.getElementById('dclast_name');
    var pdcsuffix = iframeDocument.getElementById('dcsuffix');
    var pdcbirthdate_day = iframeDocument.getElementById('pcbirthdate_day');
    var pdcbirthdate_month = iframeDocument.getElementById('pcbirthdate_month');
    var pdcbirthdate_year = iframeDocument.getElementById('pcbirthdate_year');
    var pdcpurok = iframeDocument.getElementById('dcpurok');
    var pdcdate_of_death_day = iframeDocument.getElementById('dcdate_of_death_day');
    var pdcdate_of_death_month = iframeDocument.getElementById('dcdate_of_death_month');
    var pdcdate_of_death_year = iframeDocument.getElementById('dcdate_of_death_year');
    var pdctime_of_death = iframeDocument.getElementById('dctime_of_death');
    var pdccause_of_death = iframeDocument.getElementById('dccause_of_death');
    var pdcreq_first_name = iframeDocument.getElementById('dcreq_first_name');
    var pdcreq_middle_name = iframeDocument.getElementById('dcreq_middle_name');
    var pdcreq_last_name = iframeDocument.getElementById('dcreq_last_name');
    var pdcreq_suffix = iframeDocument.getElementById('dcreq_suffix');
    var pdcrelationship = iframeDocument.getElementById('dcrelationship');

    // Populate the iframe elements
    if (pdcfirst_name) pdcfirst_name.innerText = dcfirst_name.value;
    if (pdcmiddle_name) pdcmiddle_name.innerText = dcmiddle_name.value;
    if (pdclast_name) pdclast_name.innerText = dclast_name.value;
    if (pdcsuffix) pdcsuffix.innerText = dcsuffix.value;
    if (pdcbirthdate_month) pdcbirthdate_month.innerText = dcmonth;
    if (pdcbirthdate_day) pdcbirthdate_day.innerText = dcday;
    if (pdcbirthdate_year) pdcbirthdate_year.innerText = dcyear;
    if (pdcpurok) pdcpurok.innerText = dcpurok.value;
    if (pdcdate_of_death_day) pdcdate_of_death_day.innerText = dcdeathday;
    if (pdcdate_of_death_month) pdcdate_of_death_month.innerText = dcdeathmonth;
    if (pdcdate_of_death_year) pdcdate_of_death_year.innerText = dcdeathyear;
    if (pdctime_of_death) pdctime_of_death.innerText = convertTo12Hour(dctime_of_death.value);
    if (pdccause_of_death) pdccause_of_death.innerText = dccause_of_death.value;
    if (pdcreq_first_name) pdcreq_first_name.innerText = dcreq_first_name.value;
    if (pdcreq_middle_name) pdcreq_middle_name.innerText = dcreq_middle_name.value;
    if (pdcreq_last_name) pdcreq_last_name.innerText = dcreq_last_name.value;
    if (pdcreq_suffix) pdcreq_suffix.innerText = dcreq_suffix.value;
    if (pdcrelationship) pdcrelationship.innerText = dcrelationship.value;
}