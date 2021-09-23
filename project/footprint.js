var elec = document.getElementById("electricity");
var e_output = document.getElementById("elec_value");
e_output.innerHTML = elec.value + ' kWh'; // Display the default slider value

var gas = document.getElementById("gas");
var g_output = document.getElementById("gas_value");
g_output.innerHTML = gas.value + ' kWh'; // Display the default slider value

var mpg = document.getElementById("mpg");
var mp_output = document.getElementById("mpg_value");
mp_output.innerHTML = mpg.value + ' mpg'; // Display the default slider value

var miles = document.getElementById("miles");
var m_output = document.getElementById("miles_value");
m_output.innerHTML = miles.value + ' miles'; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
elec.oninput = function() {
  e_output.innerHTML = this.value + ' kWh';
}

gas.oninput = function() {
    g_output.innerHTML = this.value + ' kWh';
  }

mpg.oninput = function() {
    mp_output.innerHTML = this.value + ' mpg';
}

miles.oninput = function() {
    m_output.innerHTML = this.value + ' miles';
}

function calculate(event){
    elecFP = parseFloat(elec.value) * 3.1 / 10000;
    gasFP = parseFloat(gas.value) * 2.03 / 10000;
    carFP = (parseFloat(miles.value) / parseFloat(mpg.value)) * 0.0143;
    total = elecFP + gasFP + carFP;
    elecFP = elecFP.toFixed(2);
    gasFP = gasFP.toFixed(2);
    carFP = carFP.toFixed(2);
    total = total.toFixed(2);

    document.getElementById('elec_result').innerHTML = elecFP + ' tonnes CO2';
    document.getElementById('gas_result').innerHTML = gasFP + ' tonnes CO2';
    document.getElementById('car_result').innerHTML = carFP + ' tonnes CO2';
    document.getElementById('total').innerHTML = total + ' tonnes CO2';
    event.preventDefault();
}


var xhr;
if (window.ActiveXObject) {
    xhr = new ActiveXObject ("Microsoft.XMLHTTP");
}
else if (window.XMLHttpRequest) {
    xhr = new XMLHttpRequest ();
}

function load(){
  var url = "./footprintajax.php?act=load";
  xhr.open("GET", url, true);
  xhr.onreadystatechange = updatePageLoad;
  xhr.send(null);
}

function save(){
  var url = "./footprintajax.php?act=save&elec=" + elec.value + "&gas=" + gas.value + "&mpg=" + mpg.value + "&miles=" + miles.value;
  xhr.open("GET", url, true);
  xhr.onreadystatechange = updatePageSave;
  xhr.send(null);
}

function updatePageLoad(){
  if (xhr.readyState == 4) {
      if (xhr.status == 200) {
          var response = xhr.responseText;
          if (response !== ""){
              var values = response.split(":");
              e_output.innerHTML = values[0] + ' kWh';
              elec.value = values[0];
              g_output.innerHTML = values[1] + ' kWh';
              gas.value = values[1];
              mp_output.innerHTML = values[2] + ' mpg';
              mpg.value = values[2];
              m_output.innerHTML = values[3] + ' miles';
              miles.value = values[3];
          }
      }
  }
}

function updatePageSave(){
  if (xhr.readyState == 4) {
      if (xhr.status == 200) {
          var response = xhr.responseText;
          if (response !== ""){
              window.alert("Successfully Saved");
          }
      }
  }
}
