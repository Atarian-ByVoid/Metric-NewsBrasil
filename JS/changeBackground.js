
var bgImageArray = ["lake.jpg", "lake2.jpg", "mountain1.jpg", "mountain_dark.jpg", "mountain2.jpg", "mountain3.jpg"],
    base = "/images/changeBackground/",
    secs = 15;
bgImageArray.forEach(function (img) {
    new Image().src = base + img;
});
function backgroundSequence() {
    window.clearTimeout();
    var k = 0;
    for (i = 0; i < bgImageArray.length; i++) {
        setTimeout(function () {
            document.documentElement.style.background = "url(" + base + bgImageArray[k] + ") no-repeat center center fixed";
            document.documentElement.style.backgroundSize = "cover";
            if ((k + 1) === bgImageArray.length) {
                setTimeout(function () { backgroundSequence() }, (secs * 1000))
            } else {
                k++;
            }
        }, (secs * 1000) * i)
    }
}
backgroundSequence();

