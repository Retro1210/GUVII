function sendData() {
    var firstname = document.getElementById('FIRST_NAME').value;
    var lastname = document.getElementById('LAST_NAME').value;
    var age = document.getElementById('AGE').value;
    var gmail = document.getElementById('GMAIL').value;
    var contactno = document.getElementById('CONTACT_NO').value;
    var password = document.getElementById('PASSWORD').value;
    $.ajax({
        type: 'POST',
        url: 'http://localhost/GUVI/Signup.php?action=save',
        data: { FIRST_NAME: firstname, LAST_NAME: lastname,AGE:age,GMAIL:gmail,CONTACT_NO:contactno,PASSWORD:password},
        success: function(response) {
            console.log(response);
        }
    });
} 


function submitLogin() {
    var firstname= document.getElementById('FIRST_NAME').value;
    var password = document.getElementById('PASSWORD').value;
    $.ajax({
        type: 'GET',
        url: 'http://localhost/process.php?FIRSTNAME='+firstname+'&PASSWORD='+password,
        success: function(response) {
            console.log(response);
        }
    });
} 