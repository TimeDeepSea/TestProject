window.onload = function(){
    var img = document.getElementsByTagName("img")[3];
    var imgArr = ["img/1.jpeg","img/2.jpeg","img/3.jpg","img/4.jpg","img/5.jpeg"];
    var index =  0;
    var prev = document.getElementById("prev");
    prev.onclick = function (){
        if (index == 0){
            index = 5;
        }
        index = index - 1;
        img.src = imgArr[index];
    }
    var next = document.getElementById("next");
    next.onclick = function (){
        if (index == 4){
            index = -1;
        }
        index = index + 1;
        img.src = imgArr[index];
    }
}