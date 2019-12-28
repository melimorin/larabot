
function createRandom(min, max) {
    return Math.floor(Math.random() * (max - min + 1) ) + min;
  }

function generateFlake() {

    var flocon = document.createElement("img");
    flocon.classList.add("flocon");
    flocon.setAttribute("src", "/images/monflocon.png");

    var flakeWidth = createRandom(25, 100);

    flocon.style.width = flakeWidth + "px";
    flocon.style.top = flakeWidth * -1 + "px";
    flocon.style.left = createRandom(0, window.innerWidth - flakeWidth) + "px";
    flocon.style.position = "fixed";
    flocon.style.zIndex = -1;

    var flakeInterval = setInterval(function() {
        flocon.style.top = flocon.offsetTop + 1 + "px";
        if (flocon.offsetTop >= window.innerHeight) {
            clearInterval(flakeInterval);
            document.body.removeChild(flocon);
        }
    }, 10)

    document.body.appendChild(flocon);



}

setInterval(function() {
    generateFlake();
}, 1200)




