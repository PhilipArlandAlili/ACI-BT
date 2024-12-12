function updateText() {
    var iframe = document.getElementById('myIframe');
    var iframeDocument = iframe.contentDocument || iframe.contentWindow.document;
    
    if (certificate_type.value == 'business_permit_new') {
        // From PHP
        var business_name = document.getElementById('business_name');
        var purok = document.getElementById('purok');
        var manager = document.getElementById('manager');
        var address = document.getElementById('address');

        // From HTML
        var pbusiness_name = iframeDocument.getElementById('business_name');
        var ppurok = iframeDocument.getElementById('purok');
        var pmanager = iframeDocument.getElementById('manager');
        var paddress = iframeDocument.getElementById('address');

        pbusiness_name.innerText = business_name.value;
        ppurok.innerText = purok.value;
        pmanager.innerText = manager.value;
        paddress.innerText = address.value;
    }

}