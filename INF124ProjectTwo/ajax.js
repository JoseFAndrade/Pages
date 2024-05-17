
var submitableAjaxVar = true; 

function getPlace(zip) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        console.log(xhr.responseText);
        if (xhr.readyState == 4 && xhr.status == 200)
        {
            var result = xhr.responseText;
            console.log(result);
            if(result.localeCompare("DataNotFound") != 0){
                var place = result.split (',');
                if (document.getElementById ("City name").value == "")
                    document.getElementById ("City name").value = place[1];
                if (document.getElementById ("State code").value == "")
                    document.getElementById ("State code").value = place[0];
            }
        }
    };
    xhr.open("GET","backend-getCity.php?zip="+zip,true);
    xhr.send();
}


function checkCardValid(number) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if(xhr.readyState == 4 && xhr.status== 200){
            var result = xhr.responseText;
            console.log(result+"\n");
            console.log(result.localeCompare("wrong"));
            if(result.localeCompare("wrong")===0)
            {
                submitable = false;
                //time to set a small red text under the credit card to make sure to tell people that it is wrong
                console.log(document.getElementsByClassName("hidden-red")[0].style.visibility);
                document.getElementsByClassName("hidden-red")[0].textContent = "The credit number seems to not be correct, please try again.";
                document.getElementsByClassName("hidden-red")[0].style.visibility = "visible";
            }
            else {
                submitableAjaxVar = true;
                document.getElementsByClassName("hidden-red")[0].style.visibility = "invisible";
            }
        }
    };
    xhr.open("POST","backend-checkCard.php",true);
    xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    xhr.send("num="+number);
}


function checkQuantityCount(numberRequested){
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if(xhr.readyState == 4 && xhr.status == 200){
            var numberLeft = xhr.responseText;
            if( Number(numberRequested) > Number(numberLeft)){
                submitable = false;
                //change some stuff to show that there is too many out of stock
            }
            else { //okay to submit so return the variable back to true
                submitable = true;
            }
        }
    };

    xhr.open("Get","backend-checkQuantity.php?quantity="+numberRequested,true);
    xhr.send();
}








