
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

    iframe.src = doc;
    console.log(certificate_type);
}

function updateText() {
    var iframe = document.getElementById('myIframe');
    var iframeDocument = iframe.contentDocument || iframe.contentWindow.document;
    
    if (certificate_type.value == 'barangay_clearance') {
        var first_name = document.getElementById('first_name');

        var pfirst_name = iframeDocument.getElementById('first_name');

        pfirst_name.innerText = first_name.value;
    }

}