var overlay = document.getElementById("overlay");
var zoomedImage = document.getElementById("zoomedImage");
var profilPic = document.getElementById("profilePic");

profilPic.addEventListener("click", function() 
{
    overlay.style.display = "block";
    zoomedImage.src = profilePic.src;
    zoomedImage.style.display = "block";
});

zoomedImage.addEventListener("click", function() 
{
    overlay.style.display = "none";
    zoomedImage.style.display = "none";
});