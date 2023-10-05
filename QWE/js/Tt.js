window.onload = function(){
    var img = document.getElementsByTagName("img")[0];
    var imgArr = ["img/1.jpg","img/2.png","img/3.jpg","img/4.png","img/5.png"];
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