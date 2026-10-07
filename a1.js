



document.addEventListener("DOMContentLoaded", function () {
    loadMe();
});


function loadMe () {
    var out = document.querySelector("#me");
    fetch("me.php")
      .then(resp => resp.text())
      .then( txt => out.innerHTML = txt );
}




/* QUESTION 1 */
function q1GO() {
    let input = document.querySelector("#q1in").value;  //select the input from the html DOM 
    let out = document.querySelector("#q1out");         //get the output box the html    DOM
    let params = "ants=" + input;                       //url input, php reads that

    fetch("a1q1.php?"+params)                           //tell to fetch from a server with those inputs
      .then(resp => resp.text() )
      .then( txt => out.innerHTML = txt );
}





/* QUESTION 2A */
function q2_1GO() {
    let input = document.querySelector("#q2-1in").value;
    let out = document.querySelector("#q2-1out");
    let params = "n=" + input;



    fetch("a1q2-1.php", {
        method: "POST",
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body : params
    })
      .then(resp => resp.text())
      .then( txt => out.innerHTML = txt );
}







/* QUESTION 2B */
function q2_2GO() {
    let in1 = document.querySelector("#q2-2in1").value; // first endpoint
    let in2 = document.querySelector("#q2-2in2").value; // second endpoint
    let out = document.querySelector("#q2-2out");       //output box
    let params = "start=" + in1 + "&end=" + in2;
    fetch("a1q2-2.php", {
        method: "POST",
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body : params
    })
      .then(resp => resp.text())
      .then( txt => out.innerHTML = txt );
}
