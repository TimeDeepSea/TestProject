var banners = ["img/CN1.jfif","img/CN2.jfif","img/CN3.jfif","img/CN4.jfif","img/CN5.jfif","img/CN6.jfif"];
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