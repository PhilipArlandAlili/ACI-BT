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
  
  var suffix1 = iframeDocument.getElementById('suffix1');
  var stats = iframeDocument.getElementById('stats');

  if (purok)
    purok.innerText ="PUROK "+ document.getElementById('purok').value.toUpperCase() + ", BARANGAY TINIGUIBAN, PUERTO PRICESA CITY";
    else console.log('purok not found')
    
  if (suffix)
    suffix.innerText = document.getElementById('suffix').value.toUpperCase();
    else console.log('suffix not found')
    
      
    if (suffix1)
      suffix1.innerText = document.getElementById('suffix1').value.toUpperCase();
      else console.log('suffix1 not found')
  

    if (stats)
      stats.innerText = document.getElementById('stats').value.toUpperCase();
      else console.log('stats not found')
  
  }


  
 
  
  function printIframe() {
    console.log("print me");
    var cert = document.getElementById('certificateType').value;
    var iframe = document.getElementById('myIframe');
    var form = document.getElementById(cert + "Form");
    console.log(form);
    var iframeWindow = iframe.contentWindow;
    iframeWindow.print();
    form.submit();
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
          Var.innerText = text[x].value.toUpperCase();
      }
       
        }
        var address = iframeDocument.getElementById('address');
        if (address)
          address.innerText = document.getElementById('address').value.toUpperCase()  + ", BARANGAY TINIGUIBAN, PUERTO PRICESA CITY";
          else console.log('address not found')


  for (var x = 0; x < number.length; x++) {
    console.log(number[x].value);
    var Number = iframeDocument.getElementById('num'+x);

    
    if (certificateType.value == 'lot_ownership' && x == 1) {
        let lotnum = iframeDocument.getElementById('lotnum');
        var text = document.getElementById('lot_area_words');
        text.value = numberToWords(number[1].value);
    
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

    console.log("helo")
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
      Time.innerText = convertTo12Hour(time[x].value);
      console.log(time[x].value);
      
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
var numtotext = document.getElementById('income_num');
var income_words = document.getElementById('income_words');
income_words.value =numberToWords(number[0].value);

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


// const bdayInput = document.getElementById('bday').value;
// const bdayCoha = document.getElementById('bday2').value;

// if (bdayInput) {
//   console.log(validateAge(bdayInput));
//   console.log("bdayCinpu");
// }

// if (bdayCoha) {
//   console.log(validateAge(bdayCoha));

// console.log("bdayCoha" );
// }

if (certificateType.value === 'barangay_clearance') {
  console.log("mama mo")
  const years = document.getElementById('radioYears');
  const months = document.getElementById('radioMonths');
  var ym = iframeDocument.getElementById('ym');

  
  if (months.checked) {
      ym.innerHTML = "<b><u>Months</u></b> / Years";
  } else if (years.checked) {
      ym.innerHTML = "Months / <b><u>Years</u></b>";

  } else {
     ym.innerHTML = "Months / Years";
  }
} else {
  console.log("Certificate type is not 'barnagay_clearance'.");
}



}

///end updateText

    
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