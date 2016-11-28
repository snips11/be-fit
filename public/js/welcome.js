function getRandomImage()
{
    var images = [
        "images/dead.jpg",
        "images/eat.jpg",
        "images/instruct.jpg",
        "images/pull.jpg",
        "images/row.jpg",
        "images/run.jpg",
        "images/stretch.jpg",
        "images/yoga.jpg",
    ];
    return images[Math.floor(Math.random() * 8)];
}

$(document).ready(function(){
    $("#changeMe").attr('src', getRandomImage());
});