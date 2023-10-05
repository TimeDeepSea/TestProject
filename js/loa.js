var banners = ["img/LU1.jfif","img/LU2.jfif","img/LU3.jfif","img/LU4.jfif","img/LU5.jfif",];
var counter = 0;
function run(){
    setInterval(cycle,2000)
}
function cycle(){
    counter++;
    if(counter == banners.length)
        counter = 0;
    document.getElementById("banner").src = banners[counter];
}