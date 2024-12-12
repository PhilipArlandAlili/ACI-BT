// From PHP
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
        ptrcurrent_address.innerText = trcurrent_address.value;
        ptrprevious_address.innerText = trprevious_address.value;
        ptrpurpose.innerText = trpurpose.value;