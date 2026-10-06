document.addEventListener("DOMContentLoaded", function () {
    loadMe();
});

function loadMe () {
    var out = document.querySelector("#me");
    fetch("me.php")
      .then(resp => resp.text())
      .then( txt => out.innerHTML = txt );
}

function q1GO() {
    let input = document.querySelector("#q1in").value;
    let out = document.querySelector("#q1out");
    let params = "ants=" + input;
    fetch("a1q1.php?"+params)
      .then(resp => resp.text() )
      .then( txt => out.innerHTML = txt );
}

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

function q2_2GO() {
    let in1 = document.querySelector("#q2-2in1").value;
    let in2 = document.querySelector("#q2-2in2").value;
    let out = document.querySelector("#q2-2out");
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
