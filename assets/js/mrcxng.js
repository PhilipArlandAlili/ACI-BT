
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

        pbpnbusiness_name.innerText = bpnbusiness_name.value.toUpperCase();
        pbpnpurok.innerText = bpnpurok.value.toUpperCase();
        pbpnmanager.innerText = bpnmanager.value.toUpperCase();
        pbpnaddress.innerText = bpnaddress.value.toUpperCase();
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

        pbprbusiness_name.innerText = bprbusiness_name.value.toUpperCase();
        pbprpurok.innerText = bprpurok.value.toUpperCase();
        pbprmanager.innerText = bprmanager.value.toUpperCase();
        pbpraddress.innerText = bpraddress.value.toUpperCase();
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

        pcocfirst_name.innerText = cocfirst_name.value.toUpperCase();
        pcocmiddle_name.innerText = cocmiddle_name.value.toUpperCase();
        pcoclast_name.innerText = coclast_name.value.toUpperCase();
        pcocsuffix.innerText = cocsuffix.value.toUpperCase();
        pcocbirthdate_month.innerText = cocmonth;
        pcocbirthdate_day.innerText = cocday + ", ";
        pcocbirthdate_year.innerText = cocyear;
        pcocfirst_name_female.innerText = cocfirst_name_female.value.toUpperCase();
        pcocmiddle_name_female.innerText = cocmiddle_name_female.value.toUpperCase();
        pcoclast_name_female.innerText = coclast_name_female.value.toUpperCase();
        pcocbirthdate_female_month.innerText = cocmonth_female;
        pcocbirthdate_female_day.innerText = cocday_female + ", ";
        pcocbirthdate_female_year.innerText = cocyear_female;
        pcocpurok.innerText = cocpurok.value.toUpperCase();

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

        pcefirst_name.innerText = cefirst_name.value.toUpperCase();
        pcemiddle_name.innerText = cemiddle_name.value.toUpperCase();
        pcelast_name.innerText = celast_name.value.toUpperCase();
        pcesuffix.innerText = cesuffix.value.toUpperCase();
        pcebirthdate.innerText = showAge(cebirthdate);
        pcepurok.innerText = cepurok.value.toUpperCase();
        pcepurpose.innerText = cepurpose.value.toUpperCase();

    } else if (certificate_type.value == 'certificate_of_income') {

        var cifirst_name = document.getElementById('cifirst_name');
        var cimiddle_name = document.getElementById('cimiddle_name');
        var cilast_name = document.getElementById('cilast_name');
        var cisuffix = document.getElementById('cisuffix');
        var cipurok = document.getElementById('cipurok');
        var ciincome_num = document.getElementById('ciincome_num');
        var ciincome_words = document.getElementById('ciincome_words');


        var pcifirst_name = iframeDocument.getElementById('cifirst_name');
        var pcimiddle_name = iframeDocument.getElementById('cimiddle_name');
        var pcilast_name = iframeDocument.getElementById('cilast_name');
        var pcisuffix = iframeDocument.getElementById('cisuffix');
        var pcipurok = iframeDocument.getElementById('cipurok');
        var pcincome_num = iframeDocument.getElementById('ciincome_num');
        // var pcincome_words = iframeDocument.getElementById('ciincome_words');

        if(pcifirst_name){pcifirst_name.innerText = cifirst_name.value.toUpperCase();}
        if(pcimiddle_name){pcimiddle_name.innerText = cimiddle_name.value.toUpperCase();}
        if(pcilast_name){pcilast_name.innerText = cilast_name.value.toUpperCase();}
        if(pcisuffix){pcisuffix.innerText = cisuffix.value.toUpperCase();}
        if(pcipurok){pcipurok.innerText = cipurok.value.toUpperCase();}
        if(pcincome_num){pcincome_num.innerText = numberToWords(ciincome_num.value);}
        if(ciincome_words){ciincome_words.value = numberToWords(ciincome_num.value);}



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

        pcidfirst_name.innerText = cidfirst_name.value.toUpperCase();
        pcidmiddle_name.innerText = cidmiddle_name.value.toUpperCase();
        pcidlast_name.innerText = cidlast_name.value.toUpperCase();
        pcidsuffix.innerText = cidsuffix.value.toUpperCase();
        pcidbirthdate.innerText = cidbirthdate.value;
        pcidcivil_status.innerText = cidcivil_status.value.toUpperCase();
        pcidpurok.innerText = cidpurok.value.toUpperCase();
        pcidpurpose.innerText = cidpurpose.value.toUpperCase();

    } else if (certificate_type.value == 'complaint_certificate') {

        var ccfirst_name = document.getElementById('ccfirst_name');
        var ccmiddle_name = document.getElementById('ccmiddle_name');
        var cclast_name = document.getElementById('cclast_name');
        var ccsuffix = document.getElementById('ccsuffix');
        var ccbirthdate = document.getElementById('ccbirthdate');
        var ccpurok = document.getElementById('ccpurok');
        var ccdate_of_complain = document.getElementById('ccdate_of_complain');
        var ccfirst_name_respondent = document.getElementById('ccfirst_name_respondent');
        var ccmiddle_name_respondent = document.getElementById('ccmiddle_name_respondent');
        var cclast_name_respondent = document.getElementById('cclast_name_respondent');
        var ccsuffix_respondent = document.getElementById('ccsuffix_respondent');
        var cccase_no = document.getElementById('cccase_no');
        var ccvawc_official_name = document.getElementById('ccvawc_official_name');
        
    
        const month_names = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

// Safely handle ccdate_of_complain
var complain_date = ccdate_of_complain.value ? new Date(ccdate_of_complain.value) : null;
var complain_month = complain_date && !isNaN(complain_date.getTime()) ? month_names[complain_date.getMonth()] : '';
var complain_day = complain_date && !isNaN(complain_date.getTime()) ? complain_date.getDate() : '';
var complain_year = complain_date && !isNaN(complain_date.getTime()) ? complain_date.getFullYear() : '';

// Safely retrieve elements from iframeDocument
var pccfirst_name = iframeDocument.getElementById('ccfirst_name');
var pccmiddle_name = iframeDocument.getElementById('ccmiddle_name');
var pcclast_name = iframeDocument.getElementById('cclast_name');
var pccsuffix = iframeDocument.getElementById('ccsuffix');
var pccbirthdate = iframeDocument.getElementById('ccbirthdate');
var pccpurok = iframeDocument.getElementById('ccpurok');
var pcomplain_day = iframeDocument.getElementById('complain_day');
var pcomplain_month = iframeDocument.getElementById('complain_month');
var pcomplain_year = iframeDocument.getElementById('complain_year');
var pccfirst_name_respondent = iframeDocument.getElementById('ccfirst_name_respondent');
var pccmiddle_name_respondent = iframeDocument.getElementById('ccmiddle_name_respondent');
var pcclast_name_respondent = iframeDocument.getElementById('cclast_name_respondent');
var pccsuffix_respondent = iframeDocument.getElementById('ccsuffix_respondent');
var pcccase_no = iframeDocument.getElementById('cccase_no');
var pccvawc_official_name = iframeDocument.getElementById('ccvawc_official_name');

// Populate the iframe elements
if (pccfirst_name) pccfirst_name.innerText = ccfirst_name.value.toUpperCase();
if (pccmiddle_name) pccmiddle_name.innerText = ccmiddle_name.value.toUpperCase();
if (pcclast_name) pcclast_name.innerText = cclast_name.value.toUpperCase();
if (pccsuffix) pccsuffix.innerText = ccsuffix.value.toUpperCase();
if (pccbirthdate) pccbirthdate.innerText = showAge(ccbirthdate);
if (pccpurok) pccpurok.innerText = ccpurok.value.toUpperCase();
if (pcomplain_day) pcomplain_day.innerText = complain_day;
if (pcomplain_month) pcomplain_month.innerText = complain_month;
if (pcomplain_year) pcomplain_year.innerText = complain_year;
if (pccfirst_name_respondent) pccfirst_name_respondent.innerText = ccfirst_name_respondent.value.toUpperCase();
if (pccmiddle_name_respondent) pccmiddle_name_respondent.innerText = ccmiddle_name_respondent.value.toUpperCase();
if (pcclast_name_respondent) pcclast_name_respondent.innerText = cclast_name_respondent.value.toUpperCase();
if (pccsuffix_respondent) pccsuffix_respondent.innerText = ccsuffix_respondent.value.toUpperCase();
if (pcccase_no) pcccase_no.innerText = cccase_no.value;
if (pccvawc_official_name) pccvawc_official_name.innerText = ccvawc_official_name.value.toUpperCase();

    } else if (certificate_type.value == 'death_certificate') {
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
        var dcmonth = dcdate.getMonth();
        var dcday = dcdate.getDate();
        var dcyear = dcdate.getFullYear();
        dcmonth = month_names[dcmonth];

        if (!dcbirthdate.value) {
            dcmonth = '';
            dcday = '';
            dcyear = '';
        }

        var dcdeathdate = new Date(dcdate_of_death.value);
        var dcdeathmonth = dcdeathdate.getMonth();
        var dcdeathday = dcdeathdate.getDate();
        var dcdeathyear = dcdeathdate.getFullYear();
        dcdeathmonth = month_names[dcdeathmonth];

        if (!dcdate_of_death.value) {
            dcdeathmonth = '';
            dcdeathday = '';
            dcdeathyear = '';
        }

        // From HTML
        var pdcfirst_name = iframeDocument.getElementById('dcfirst_name');
        var pdcmiddle_name = iframeDocument.getElementById('dcmiddle_name');
        var pdclast_name = iframeDocument.getElementById('dclast_name');
        var pdcsuffix = iframeDocument.getElementById('dcsuffix');
        var pdcbirthdate_day = iframeDocument.getElementById('dcbirthdate_day');
        var pdcbirthdate_month = iframeDocument.getElementById('dcbirthdate_month');
        var pdcbirthdate_year = iframeDocument.getElementById('dcbirthdate_year');
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

        if (pdcfirst_name) pdcfirst_name.innerText = dcfirst_name.value.toUpperCase();
        if (pdcmiddle_name) pdcmiddle_name.innerText = dcmiddle_name.value.toUpperCase();
        if (pdclast_name) pdclast_name.innerText = dclast_name.value.toUpperCase();
        if (pdcsuffix) pdcsuffix.innerText = dcsuffix.value.toUpperCase();
        if (pdcbirthdate_month) pdcbirthdate_month.innerText = dcmonth.toUpperCase();
        if (pdcbirthdate_day) pdcbirthdate_day.innerText = dcday;
        if (pdcbirthdate_year) pdcbirthdate_year.innerText = dcyear;
        if (pdcpurok) pdcpurok.innerText = dcpurok.value.toUpperCase();
        if (pdcdate_of_death_day) pdcdate_of_death_day.innerText = dcdeathday;
        if (pdcdate_of_death_month) pdcdate_of_death_month.innerText = dcdeathmonth;
        if (pdcdate_of_death_year) pdcdate_of_death_year.innerText = dcdeathyear;
        if (pdctime_of_death) pdctime_of_death.innerText = convertTo12Hour(dctime_of_death.value);
        if (pdccause_of_death) pdccause_of_death.innerText = dccause_of_death.value.toUpperCase();
        if (pdcreq_first_name) pdcreq_first_name.innerText = dcreq_first_name.value.toUpperCase();
        if (pdcreq_middle_name) pdcreq_middle_name.innerText = dcreq_middle_name.value.toUpperCase();
        if (pdcreq_last_name) pdcreq_last_name.innerText = dcreq_last_name.value.toUpperCase();
        if (pdcreq_suffix) pdcreq_suffix.innerText = dcreq_suffix.value.toUpperCase();
        if (pdcrelationship) pdcrelationship.innerText = dcrelationship.value.toUpperCase();
    } else if (certificate_type.value == 'first_time_job_seeker') {
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
        var pftbirthdate = iframeDocument.getElementById('ftbirthdate');
        var pftpurok = iframeDocument.getElementById('ftpurok');
        var pftyear_month = iframeDocument.getElementById('ftyear_month');
        var pftperiod_of_residency = iframeDocument.getElementById('ftperiod_of_residency');

        pftfirst_name.innerText = ftfirst_name.value;
        pftmiddle_name.innerText = ftmiddle_name.value;
        pftlast_name.innerText = ftlast_name.value;
        pftsuffix.innerText = ftsuffix.value;
        pftbirthdate.innerText = showAge(ftbirthdate);
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
        var pftogbirthdate = iframeDocument.getElementById('ftogbirthdate');
        var pftogrole = iframeDocument.getElementById('ftogrole');
        var pftogsrole = iframeDocument.getElementById('ftogsrole');
        var pftogpurok = iframeDocument.getElementById('ftogpurok');
        var pftogyear_month = iframeDocument.getElementById('ftogyear_month');
        var pftogperiod_of_residency = iframeDocument.getElementById('ftogperiod_of_residency');

        pftogfirst_name.innerText = ftogfirst_name.value;
        pftogmiddle_name.innerText = ftogmiddle_name.value;
        pftoglast_name.innerText = ftoglast_name.value;
        pftogsuffix.innerText = ftogsuffix.value;
        pftogbirthdate.innerText = showAge(ftogbirthdate);
        pftogrole.innerText = ftogrole.value;
        pftogsrole.innerText = ftogrole.value;
        pftogpurok.innerText = ftogpurok.value;

        if (ftogpormonth.checked) {
            if (ftogperiod_of_residency.value == 1) {
                pftogyear_month.innerText = " Month";
            } else if (ftogperiod_of_residency.value > 1) {
                pftogyear_month.innerText = " Months";
            } else {
                pftogyear_month.innerText = "";
            }
        } else if (ftogporyear.checked) {
            if (ftogperiod_of_residency.value == 1) {
                pftogyear_month.innerText = " Year";
            } else if (ftogperiod_of_residency.value > 1) {
                pftogyear_month.innerText = " Years";
            } else {
                pftogyear_month.innerText = "";
            }
        } else {
            pftogyear_month.innerText = "";
        }
        pftogperiod_of_residency.innerText = ftogperiod_of_residency.value;

        // Guardian of the Galaxy Signature
        var pftogsfirst_name = iframeDocument.getElementById('ftogsfirst_name');
        var pftogsmiddle_name = iframeDocument.getElementById('ftogsmiddle_name');
        var pftogslast_name = iframeDocument.getElementById('ftogslast_name');
        var pftogssuffix = iframeDocument.getElementById('ftogssuffix');

        pftogsfirst_name.innerText = ftogfirst_name.value;
        pftogsmiddle_name.innerText = ftogmiddle_name.value;
        pftogslast_name.innerText = ftoglast_name.value;
        pftogssuffix.innerText = ftogsuffix.value;
    } else if (certificate_type.value == 'lot_ownership') {
        // From PHP
        var lofirst_name = document.getElementById('lofirst_name');
        var lomiddle_name = document.getElementById('lomiddle_name');
        var lolast_name = document.getElementById('lolast_name');
        var losuffix = document.getElementById('losuffix');
        var lopurok = document.getElementById('lopurok');
        var loclaimant = document.getElementById('loclaimant');
        var lobeneficiary = document.getElementById('lobeneficiary');
        var loactual_occupant = document.getElementById('loactual_occupant');
        var lolot_number = document.getElementById('lolot_number');
        var lolot_area_numerical = document.getElementById('lolot_area_numerical');
        var lolot_area_word = document.getElementById('lolot_area_word');
        var lololoc = document.getElementById('loloc');

        console.log('lofirst_name');
        // From HTML
        var plofirst_name = iframeDocument.getElementById('lofirst_name');
        var plomiddle_name = iframeDocument.getElementById('lomiddle_name');
        var plolast_name = iframeDocument.getElementById('lolast_name');
        var plosuffix = iframeDocument.getElementById('losuffix');
        var plopurok = iframeDocument.getElementById('lopurok');
        var ploclaimant = iframeDocument.getElementById('loclaimant');
        var plobeneficiary = iframeDocument.getElementById('lobeneficiary');
        var ploactual_occupant = iframeDocument.getElementById('loactual_occupant');
        var plolot_number = iframeDocument.getElementById('lolot_number');
        var plolot_area_numerical = iframeDocument.getElementById('lolot_area_numerical');
        var plolot_area_word = iframeDocument.getElementById('lolot_area_word');
        var plolotloc = iframeDocument.getElementById('loloc');

        if (loclaimant.checked) {
            ploclaimant.innerText = "/";
        } else {
            ploclaimant.innerText = "  ";
        }

        if (loactual_occupant.checked) {
            ploactual_occupant.innerText = "/";
        } else {
            ploactual_occupant.innerText = "  ";
        }

        if (lobeneficiary.checked) {
            plobeneficiary.innerText = "/";
        } else {
            plobeneficiary.innerText = "  ";
        }

        plofirst_name.innerText = lofirst_name.value;
        plomiddle_name.innerText = lomiddle_name.value;
        plolast_name.innerText = lolast_name.value;
        plosuffix.innerText = losuffix.value;
        plopurok.innerText = lopurok.value;
        plolot_number.innerText = lolot_number.value;
        plolot_area_numerical.innerText = lolot_area_numerical.value;
        plolot_area_word.innerText = numberToWords(lolot_area_numerical.value);
        lolot_area_word.value = numberToWords(lolot_area_numerical.value);
        plolotloc.innerText = lololoc.value;

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

function validateDate(date_input) {
    const date = new Date(date_input.value);
    const today = new Date();
    today.setHours(0, 0, 0, 0);
    today.setDate(today.getDate() + 1); // Add one day to today

    if (date > today) {
        alert("Future dates are not allowed. Please enter a valid date.");
        date_input.value = '';
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