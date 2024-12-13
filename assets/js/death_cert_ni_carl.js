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

        var dcdeathdate = new Date(dcdate_of_death.value);
        var dcdeathmonth = dcdeathdate.getMonth();
        var dcdeathday = dcdeathdate.getDate();
        var dcdeathyear = dcdeathdate.getFullYear();
        dcdeathmonth = month_names[dcdeathmonth];

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


        pdcfirst_name.innerText = dcfirst_name.value;
        pdcmiddle_name.innerText = dcmiddle_name.value;
        pdclast_name.innerText = dclast_name.value;
        pdcsuffix.innerText = dcsuffix.value;
        pdcbirthdate_month.innerText = dcmonth;
        pdcbirthdate_day.innerText = dcday;
        pdcbirthdate_year.innerText = dcyear;
        pdcpurok.innerText = dcpurok.value;
        pdcpurok.innerText = dcpurok.value;
        pdcdate_of_death_day.innerText = dcdeathday;
        pdcdate_of_death_month.innerText = dcdeathmonth;
        pdcdate_of_death_year.innerText = dcdeathyear;
        pdctime_of_death.innerText = dctime_of_death.value;
        pdccause_of_death.innerText = dccause_of_death.value;
        pdcreq_first_name.innerText = dcreq_first_name.value;
        pdcreq_middle_name.innerText = dcreq_middle_name.value;
        pdcreq_last_name.innerText = dcreq_last_name.value;
        pdcreq_suffix.innerText = dcreq_suffix.value;
        pdcrelationship.innerText = dcrelationship.value;