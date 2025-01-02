var ids = new Array(10);
ids[0] = "0.png";
ids[1] = "1.png";
ids[2] = "2.png";
ids[3] = "3.png";
ids[4] = "4.png";
ids[5] = "5.png";
ids[6] = "6.png";
ids[7] = "7.png";
ids[8] = "8.png";
ids[9] = "9.png";

var fadeOut_opacity = 1;
var fadeIn_opacity = 0;
var nextPic;
var delta = 0.01;
var i = 0;
var timer;

var captions = new Array("Weights", "Balance-Living Lifestyle Change",
    "Elliptical Trainer",
    "Download our App from the App Store ",
    "Our Weight Room", "Read our Health Blogs!",
    "Meet our Trainers!", "Our Wide Assortment of Free-Weights",
    "Enjoy our Outdoor Yoga Class!", "Balance-Living is Healthy Living!");

function effects() {
    document.getElementById("caption").textContent = captions[0];
    nextIn();
}

function nextOut() {
            document.getElementById("pics").style.opacity = fadeOut_opacity;
            clearInterval(timer);
            i++;
            if (i >= ids.length) {
                i = 0;
            }
            nextPic = "pics/" + ids[i];
            document.getElementById("pics").src = nextPic;
            document.getElementById("caption").textContent = captions[i];
            nextIn();
}

function nextIn() {
    timer = setInterval(function () {
            document.getElementById("pics").style.opacity = fadeIn_opacity;
            clearInterval(timer);
            fadeOut_opacity = 1;
            fadeIn_opacity = 0;
            nextOut();
    }, 3000);
}
