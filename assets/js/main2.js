// const monthNames = ['January', 
//   'February', 
//   'March', 
//   'April', 
//   'May', 
//   'June', 
//   'July', 
//   'August', 
//   'September', 
//   'October', 
//   'November', 
//   'December'];
  
const certs = ['barangay_clearance',
  'business_permit_new',
  'business_permit_renew',
  'certificate_of_employability',
  'certificate_of_income',
  'certificate_of_cohabitation',
  'complaint_certificate',
  'death_certificate',
  'first_time_job_seeker',
  'certificate_of_indigency',
  'certificate_of_indigency_aics',
  'lot_ownership',
  'transfer_of_residency'];


function getOrdinalSuffix(number) {
  if (number % 100 >= 11 && number % 100 <= 13) {
      return "th";
  }
  switch (number % 10) {
      case 1: return "st";
      case 2: return "nd";
      case 3: return "rd";
      default: return "th";
  }
}


function toggleFields() {
  const varname = [
    "first_name",
    "middle_initial",
    "last_name",
    "age",      
  ];
  for (let i = 0; i < varname.length; i++) {
    document.querySelectorAll('input[name="'+varname[i]+'"]').forEach(function(first) {
      console.log(varname[i]);
      first.setAttribute('name', varname[i]+"se");
  });
  }
  for (let i = 0; i <  certs.length; i++) {


  }
  document.getElementById("fillup").scrollIntoView({ behavior: 'smooth' });

  document.querySelectorAll('#form').forEach(function(form){
    form.reset();
  });

  document.querySelectorAll("#purok").forEach(function (name){
  name.setAttribute('id','puroks');
  name.setAttribute('name','puroks');

  });
  
  document.querySelectorAll("#bday").forEach(function (name){
    name.setAttribute('id','bdays');
    name.setAttribute('name','bdays');
  
    });
  document.querySelectorAll("#suffix").forEach(function (name){
  name.setAttribute('id','suffixs');
  name.setAttribute('name','suffixs');

  });
  var certificateType = document.getElementById('certificateType').value;
  var forms = document.getElementsByClassName('certificates')[0].children;

  for (var i = 0; i < forms.length; i++) {
      if (forms[i].id === certificateType) {
          forms[i].classList.add('active');
      } else {
          forms[i].classList.remove('active');
      }
  }

  var iframe = document.getElementById('myIframe');
  var doc = "certificates/" + certificateType + ".html";
  
  var currentForm = document.getElementById(certificateType);
  if (currentForm) {
      currentForm.querySelectorAll('input[type=text], input[type=number]').forEach(function(input) {
          // input.setAttribute('oninput', 'updateText()');
      });
      currentForm.querySelectorAll('input[type=date], input[type=time]').forEach(function(input) {
          // input.setAttribute('onchange', 'updateText()');
          input.setAttribute('class','form-control p-2 w-45');
      });
      currentForm.querySelectorAll('input[type=checkbox]').forEach(function(input) {
          input.setAttribute('onclick', 'updateText()');
      });
      currentForm.querySelectorAll('select').forEach(function(input) {
          input.setAttribute('onchange', 'select()');
      });
  }

    for (let index = 0; index < varname.length; index++) {
            
          var current = currentForm.querySelector('input[name="'+varname[index]+'se"]');
          if (current) {
              current.setAttribute('name', varname[index]);
          }
    }
  var purokSelect = currentForm.querySelector('select[id="puroks"]');
  var suffixSelect = currentForm.querySelector('select[id="suffixs"]');
  var bdayinput = currentForm.querySelector('input[id="bdays"]');


  if (purokSelect) {
    purokSelect.setAttribute('id', 'purok');
    purokSelect.setAttribute('name', 'purok');
  }
  if (bdayinput) {
    bdayinput.setAttribute('id', 'bday');
    bdayinput.setAttribute('name', 'bday');
  }
  if (suffixSelect) {
    suffixSelect.setAttribute('id', 'suffix');
    suffixSelect.setAttribute('name','suffix');
  }

  
  iframe.src = doc;
  function setIssuedDate() {
    const today = new Date();
    const formattedDate = today.toISOString().split('T')[0];
    document.getElementById('issueddate').value = formattedDate;
}

// Call the function when the page loads
window.onload = setIssuedDate;

}



function select(){
  var iframe = document.getElementById('myIframe');
  var iframeDocument = iframe.contentDocument || iframe.contentWindow.document;
  var purok = iframeDocument.getElementById('purok');
  var suffix = iframeDocument.getElementById('suffix');
  var purok1 = iframeDocument.getElementById('purok1');
  var suffix1 = iframeDocument.getElementById('suffix1');
  var stats = iframeDocument.getElementById('stats');

  if (purok)
    purok.innerText = document.getElementById('purok').value;
    else console.log('purok not found')
    
  if (suffix)
    suffix.innerText = document.getElementById('suffix').value;
    else console.log('suffix not found')
    if (purok1)
      purok1.innerText = document.getElementById('purok1').value;
      else console.log('purok1 not found')
      
    if (suffix1)
      suffix1.innerText = document.getElementById('suffix1').value;
      else console.log('suffix1 not found')
  

    if (stats)
      stats.innerText = document.getElementById('stats').value;
      else console.log('stats not found')
  
  }


  
 
  
  function printIframe() {
    if (validateForm()) {
        var iframe = document.getElementById('myIframe');
        var iframeWindow = iframe.contentWindow;
        iframeWindow.print();
    } else {
        alert('Please fill in all required fields before printing.');
    }
}

  function updateText() { 

    var iframe = document.getElementById('myIframe');          
        var text = document.getElementById(document.getElementById('certificateType').value).querySelectorAll('input[type=text]');
        var number =document.getElementById(document.getElementById('certificateType').value).querySelectorAll('input[type=number]');
        var date= document.getElementById(document.getElementById('certificateType').value).querySelectorAll('input[type=date]');
        var time= document.getElementById(document.getElementById('certificateType').value).querySelectorAll('input[type=time]');
        var checkbox = document.getElementById(document.getElementById('certificateType').value).querySelectorAll('input[type=checkbox]');
    // console.log(number[0].value);
      var iframeDocument = iframe.contentDocument || iframe.contentWindow.document;
      for (var x = 0; x < text.length; x++) {
       
        var Var = iframeDocument.getElementById('var'+x);
        if (Var) {
          Var.innerText = text[x].value;
      }
       
        }
        
  for (var x = 0; x < number.length; x++) {
    var Number = iframeDocument.getElementById('num'+x);
    console.log(number[x].value);
    if (certificateType.value == 'lot_ownership' && x == 1) {
        let lotnum = iframeDocument.getElementById('lotnum');
        
        if (lotnum) {
            Number.innerText = number[x].value;
            lotnum.innerText = numberToWords(number[x].value);
        }
    } else if (Number) {
        Number.innerText = number[x].value;
    }
}

  for (var x = 0; x < date.length; x++) {
    var day = iframeDocument.getElementById('day'+x);
    var month = iframeDocument.getElementById('month'+x);
    var year = iframeDocument.getElementById('year'+x);
    var sup = iframeDocument.getElementById('sup'+x);

    var dateValue = new Date(date[x].value);

  
        if (day || month || year) {
            day.innerText = dateValue.toLocaleDateString('en-US',{day: 'numeric'});
          year.innerText = dateValue.toLocaleDateString('en-US',{year: 'numeric'});
         
        }
        if (month) {
          month.innerText = dateValue.toLocaleDateString('en-US',{month: 'long'});
        }
        if(sup){

          sup.innerText = getOrdinalSuffix(dateValue.getDate());
        }

  }

  for (var x = 0; x < time.length; x++) {
    var Time = iframeDocument.getElementById('time'+x);
    if (Time) {
      Time.innerText = convertTime(time[x].value);
  }
}
if(certificateType.value == 'lot_ownership') {
  for (let y = 0; y < checkbox.length; y++) {
    var check = iframeDocument.getElementById('check'+y);
    if (checkbox[y].checked) {
        check.innerText = '/';
    } else {
        check.innerText = ' ';
    }
}

}


if(certificateType.value == 'cohabitation') {
var periods = iframeDocument.getElementById('period');
var inyears = iframeDocument.getElementById('inyears');

var month = monthNames[parseInt(document.getElementById('month').value.split('-')[1]-1, 10)]
var year = document.getElementById('month').value.split('-')[0];
let currentDate = new Date();
        
currentDate.setFullYear(currentDate.getFullYear() - year);
console.log(currentDate);
if (periods){ 
  periods.innerText =  month + ' ' + year;
}
if (inyears){
  inyears.innerText = currentDate;


}
else console.log('period not found');   


  }



if (certificateType.value == 'certificate_of_income') {
var num = iframeDocument.getElementById('intext');
var numtotext = document.getElementById('amountinwords');

if ( numtotext){ numtotext.innerText = numberToWords(number[0].value);}
if (num ) { 
 
  num.innerText = numberToWords(number[0].value);

}
if (certificateType.value == 'indigency') {
  var stat = iframeDocument.getElementById('stat');
  var stato = document.getElementById('civil').value;

  switch (stato) {
      case 'm':
        
          stat.innerHTML = "<u>married</u>, single, widow";
          break;
      case 'w':
          stat.innerHTML = "married, single, <u>widow</u>";
          break;
      case 's':
          stat.innerHTML = "married, <u>single</u>, widow";
          break;
      default:
          stat.innerText = "married, single, widow";
          break;
  }
}

}


const bdayInput = document.getElementById('bday').value;
const bdayCoha = document.getElementById('bday2').value;

if (bdayInput) {
  console.log(validateAge(bdayInput));
  console.log("bdayCinpu");
}

if (bdayCoha) {
  console.log(validateAge(bdayCoha));

console.log("bdayCoha" );
}


}///end updateText

    
var days = document.getElementById('days');
var months = document.getElementById('months');
var sups = document.getElementById('sups');
var years = document.getElementById('years');

const currentDate = new Date();

const day = currentDate.getDate();
const month = currentDate.getMonth() ; 
const year = currentDate.getFullYear();

const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
const monthName = monthNames[month];
console.log(days,months,sups,years);
if (days) days.innerText = day;
if (months) months.innerText = monthName;
if (sups) sups.innerText = getOrdinalSuffix(day);
if (years) years.innerText =year; 
else console.log("not ok");
