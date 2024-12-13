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
    

    function convertTo12Hour(time24) {
        const [hours, minutes] = time24.split(":").map(Number);
      
        if (hours > 24 || minutes > 59 || hours < 0 || minutes < 0) {
          return "Invalid time";
        }
      
        const period = hours >= 12 ? "PM" : "AM";
        const hours12 = hours % 12 || 12; // Convert 0 to 12 for midnight
      
        return `${hours12}:${minutes.toString().padStart(2, "0")} ${period}`;
      }