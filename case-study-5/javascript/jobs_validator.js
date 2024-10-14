function chkName(event){

    //currentTarget = refers to element whose event listener triggered the event

    var name = event.currentTarget;

    var namePattern = name.value.search(/^([A-z\s]+)$/); //match the string against a regular expression (return position of first match instead of array of matches)

    if(namePattern!=0){
        alert("The name you entered (" + name.value +
            ") is not in the correct form. \n" +
            "Name should contain alphabet characters and character spaces only");
        name.focus();
        name.select();
        return false;
    }
}

function chkEmail(event){
    var email = event.currentTarget;

    // \w is word characters
    var emailPattern = email.value.search(/^[\w.-]+@[\w]+(\.[\w]+){0,2}\.[\w]{2,3}$/);
    if (emailPattern!=0) {
        alert("The email you entered (" + email.value +
            ") is not in the correct form. \n");
        email.focus();
        email.select();
        return false;
    }

    var segments = email.value.split('@')[1].split('.');
    // split the email and take the second part (after the @) and further split by period '.'
    if (segments.length > 4) {
        alert("The domain name contains more than four address extensions. This email is invalid");
        email.focus();
        email.select();
        return false;
    }
}

function chkDate(event){
    var date = event.currentTarget;
    var now = new Date()
    
    if (now.getDate()<10) {
        var dateFormatted = "0" + now.getDate()
    }
    else {
        var dateFormatted = now.getDate()
    }

    //javascript counts months starting from zero (january - 0)
    if ((now.getMonth()+1)<10) {
        var monthFormatted = "0" + (now.getMonth()+1)
    }
    else {
        var monthFormatted = now.getMonth() + 1
    }

    var nowDate= now.getFullYear() + "-" + monthFormatted + "-" + dateFormatted

    if(date.value < nowDate || date.value === nowDate){
        alert("The start date cannot be from today and the past");
        date.focus();
        date.select();
        return false;
    }

}
