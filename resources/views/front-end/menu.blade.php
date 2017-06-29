<!DOCTYPE html>
<html>
<body>

<button onclick="toggleLight()" id="myText"> </button>
<img id="myImage">

<script>
    var lightOn = true;
    var imageUrlPrefix = "https://www.w3schools.com/js/pic_bulb";
    var buttonTextPrefix = 'Turn ';

    function toggleLight() {

        var finalImageURL = imageUrlPrefix;
        var finalButtonText = buttonTextPrefix;

        if (lightOn) {
            finalImageURL += 'off.gif';
            finalButtonText += 'on';
        } else {
            finalImageURL += 'on.gif'
            finalButtonText += 'off';

        }

        document.getElementById('myImage').src=finalImageURL;
        document.getElementById('myText').innerHTML=finalButtonText;


        lightOn = !lightOn
    }
    toggleLight();

</script>

</body>
</html>