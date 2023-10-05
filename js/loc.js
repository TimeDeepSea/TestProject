var banners = ["img/SU3.jfif","img/SU2.jpeg","img/SU1.jpeg","img/SU4.jpeg","img/SU5.jpeg"];
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