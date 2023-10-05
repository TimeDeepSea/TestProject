var banners = ["img/YUE2.jpeg","img/YUE1.jpeg","img/YUE3.jpeg","img/YUE4.jpeg","img/YUE5.jpeg","img/YUE6.jpeg"];
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