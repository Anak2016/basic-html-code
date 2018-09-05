var report = function (celsius, fahrenheit) {
    document.getElementById("result").innerHTML =
        celsius + "\xb0C = " + fahrenheit + "\xb0F";
};

document.getElementById("m_to_i").onclick = function () {
    var f = document.getElementById("input_text").value;
    report((f - 32) / 1.8, f);
};

document.getElementById("i_to_m").onclick = function () {
    var c = document.getElementById("input_text").value;
    report(c, 1.8 * c + 32);
};