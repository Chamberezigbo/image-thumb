<?php

?>

<html>

<head></head>

<body>
     <canvas id="canvas"></canvas>
</body>
<script>
     const canvas = document.getElementById("canvas");
     const ctx = canvas.getContext("2d");
     /*
          ctx.fillStyle = "blue";
          ctx.fillRect(20, 20, 500, 500);
          ctx.textAlign = "center";
          ctx.fillText("S", 10, 50)
          */
     //URL?text=Simon&width=50&height=50
     //pro can request type of png 
     //ctx.stroke();
     //rectangle
     /// expand with color, background etc.
     function drawTextBG(ctx, txt, font, x, y) {

          /// lets save current state as we make a lot of changes        
          ctx.save();

          /// set font
          ctx.font = font;

          /// draw text from top - makes life easier at the moment
          ctx.textBaseline = 'top';

          /// color for background
          ctx.fillStyle = 'blue';

          /// get width of text
          var width = ctx.measureText(txt).width;

          /// draw background rect assuming height of font
          ctx.fillRect(x, y, width, parseInt(font, 10));

          /// text color
          ctx.fillStyle = '#fff';

          /// draw text on top
          ctx.fillText(txt, x, y);

          /// restore original state
          ctx.restore();
     }

     function centeredText(string, fontSize, color) {
          var i = string.length;
          i = i * fontSize * 0.62;
          if (i > canvas.width) {
               i = canvas.width;
          }
          ctx.fillStyle = "RGBA(255, 0, 0, 0.8)";
          //ctx.fillRect(canvas.width / 2 - i / 2, canvas.height / 2 - (fontSize * 1.5) / 2, i, (fontSize * 1.5));
          ctx.fillRect(0, 0, 300, 150);
          ctx.font = fontSize.toString() + "px monospace";
          ctx.fillStyle = color;
          ctx.textBaseline = "middle";
          ctx.textAlign = "center";

          ctx.fillText(string, canvas.width / 2, canvas.height / 2);
     }

     //drawTextBG(ctx, "S", "", 50, 50)

     centeredText("S", 100, "#fff")

     canvas.toBlob((blob) => {
          window.open(new File([blob], "name.jpg", {
               type: "image/jpeg"
          }))
     }, 'image/jpeg')
</script>

</html>