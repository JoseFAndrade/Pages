function checkform() {
    var alerts = "";
    var inputs = document.OrderForm.getElementsByTagName("input");
    for(var i=0; i< inputs.length; ++i) {
                
        if(inputs[i].value == "" && !(inputs[i].name == "street2")){
            alerts+= (inputs[i].id + " is empty." +'\n');
        } 

        if((inputs[i].name == "state" || inputs[i].name == "city") && (!inputs[i].value == "") && (!checkLetter(inputs[i].value))){
            alerts+=(inputs[i].id + " must be letters only" + '\n');
        }

        if((inputs[i].name == "zip" || inputs[i].name == "card num" || inputs[i].name == "CVC") && (!inputs[i].value == "") && (!checkNum(inputs[i].value))){
            alerts+=(inputs[i].id + " must be numbers only" + '\n');
        }

        if((inputs[i].name == "expire") && (!inputs[i].value == "") && (!checkExpire(inputs[i].value))){
            alerts+=(inputs[i].id + " invalid" + '\n');
        }
    }
 
    if(alerts!=""){
        alert(alerts);
        return false;
    }
    return true;
}

function checkLetter(input){
    var letters = /^[A-Za-z]+$/;
    if(input.match(letters)){
        return true;
    }
    else{
        return false;
    }
}
function checkNum(input){
    var letters = /^[0-9]+$/;
    if(input.match(letters)){
        return true;
    }
    else{
        return false;
    }
}

function checkExpire(input){
    var check = /^(1[0-2]|0[4-9])\/2020$/;
    var next = /^(1[0-2]|0[1-9])\/20[2-9][1-9]$/;
    if(input.match(check) || input.match(next)){
        return true;
    }
    else{
        return false;
    }
}