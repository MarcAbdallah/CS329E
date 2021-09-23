var xhr;
if (window.ActiveXObject) {
    xhr = new ActiveXObject ("Microsoft.XMLHTTP");
}
else if (window.XMLHttpRequest) {
    xhr = new XMLHttpRequest ();
}

function ajax(){
    var user = document.getElementById("user").value;
    if (user == null){return;}
    var url = "./ajax.php?user=" + user;
    xhr.open("GET", url, true);
    xhr.onreadystatechange = updatePage;
    xhr.send(null);
}

function updatePage(){
    if (xhr.readyState == 4) {
        if (xhr.status == 200) {
            var response = xhr.responseText;
            if (response !== ""){
                window.alert(response);
            }
        }
    }
}

function check1(event){
    var user = document.getElementById("username").value;
    var pw = document.getElementById("password").value;
    if (user == null || user == ""){
        window.alert("Please enter a username");
        event.preventDefault();
        return false;
    }

    else if (pw == null || pw == ""){
        window.alert("Please enter a password");
        event.preventDefault();
        return false;
    }
}

function check2(event){
    var user = document.getElementById("user").value;
    var pw = document.getElementById("pw").value;
    if (user == null || user == ""){
        window.alert("Please enter a username");
        event.preventDefault();
        return false;
    }
    else if (user.length > 20 || user.length < 7){
        window.alert("Username must be between 7 and 20 characters");
        event.preventDefault();
        return false;
    }
    else if (pw == null || pw == ""){
        window.alert("Please enter a password");
        event.preventDefault();
        return false;
    }
}