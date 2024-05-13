@extends('layouts.app')

@section('content')

<section id="hero-2" class="bg-fixed hero-section division bg-heroimg2 bg-cover pt-5">
    <p class="h2glamour">Create your own Nail Designs</p>
</section>
<div class="container" style="position: relative;">
    <div class="row justify-content-center" style="position: relative;">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><br></div>
                <div class="card-body">
                    <!-- Container for relative positioning -->
                    <div style="position: relative;">
                        <!-- Image of the hand with the nail -->
                        <img src="{{ asset('css/images/nailhand2.png') }}" id="nailhandimg" alt="Nail Image" style="width: 100%; height: auto; display: block;">
                        <!-- Canvas overlay for painting -->
                        <canvas id="paintCanvas" width="1000" height="600" style="position: absolute; top: 0; left: 0;"></canvas>
                        <!-- Toolbar -->
                       
                    </div>
                    <div id="toolbar">
                        <input type="color" id="colorPicker">
                        <button id="clearButton">Clear</button>
                        <button id="drawScribbleButton">Scribble</button>
                        <input type="range" id="brushThicknessSlider" min="1" max="100" value="10" onchange="setRadius(this.value)">
                        <button id="drawPenButton">Pen</button>
                        <button class="imageButton" onclick="addImageToCanvas('css/images/flower.png')">Add Flower</button>
                        <button class="imageButton" onclick="addImageToCanvas('css/images/heart.png')">Add Heart</button>
                        <button id="saveButton">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var color = '#000000'; // Default color
    var canvas = document.getElementById('paintCanvas');
    var context = canvas.getContext('2d');
    var drawingMode = 'scribble'; // Default drawing mode
    var isDrawing = false; // Flag to track drawing state
    var radius = 10; // Default brush radius

    // Event listeners to handle drawing modes
    document.getElementById("drawScribbleButton").addEventListener("click", function() {
        drawingMode = 'scribble';
    });
    document.getElementById("drawPenButton").addEventListener("click", function() {
        drawingMode = 'pen';
    });

    // Event listeners to handle painting
    canvas.addEventListener('mousedown', startDrawing);
    canvas.addEventListener('mousemove', draw);
    canvas.addEventListener('mouseup', stopDrawing);
    canvas.addEventListener('mouseout', stopDrawing);

    // Button click event listeners
    document.getElementById("clearButton").addEventListener("click", clearCanvas);

    function startDrawing(e) {
        // Set drawing mode and color
        setColor();
        isDrawing = true;
        context.beginPath();
        var x = e.offsetX;
        var y = e.offsetY;
        console.log("Start Drawing: x = " + x + ", y = " + y);
        context.moveTo(x, y);
        if (drawingMode === 'pen') {
            context.lineWidth = 2; // Set pen width
            context.lineCap = 'round'; // Set line cap style to round
            context.strokeStyle = color; // Set stroke color
            context.lineTo(x, y); // Draw a dot at the starting point
            context.stroke(); // Draw a dot at the starting point
        }
    }

    function draw(e) {
        if (!isDrawing) return;
        var x = e.offsetX;
        var y = e.offsetY;
        console.log("Drawing: x = " + x + ", y = " + y);
        if (drawingMode === 'scribble') {
            context.lineTo(x, y);
            context.strokeStyle = color; // Set stroke color
            context.lineWidth = radius * 2; // Set scribble line width
            context.stroke();
        } else if (drawingMode === 'pen') {
            context.lineTo(x, y);
            context.stroke();
        }
    }

    function stopDrawing() {
        isDrawing = false;
        context.closePath();
    }

    var isAddingImage = false; // Flag to track if user is adding an image

function addImageToCanvas(imageUrl) {
    isAddingImage = true; // Set flag to true
    var img = new Image();
    img.onload = function() {
        // Wait for user to click on canvas to position the image
    };
    img.src = imageUrl;

    // Event listener to handle click on canvas
    canvas.addEventListener('click', function(event) {
        if (isAddingImage) {
            var x = event.offsetX - img.width / 2; // Calculate X coordinate
            var y = event.offsetY - img.height / 2; // Calculate Y coordinate
            context.drawImage(img, x, y); // Draw the image
            isAddingImage = false; // Reset flag
        }
    }, {once: true}); // Use {once: true} to remove the event listener after the first click
}



    function setColor() {
        var newColor = document.getElementById("colorPicker").value;
        color = newColor;
        context.strokeStyle = color; // Set stroke color
    }

    function clearCanvas() {
        context.clearRect(0, 0, canvas.width, canvas.height);
    }

    // Function to set the brush radius
    function setRadius(value) {
        radius = value;
    }

    // Button click event listener to save canvas as image
    document.getElementById("saveButton").addEventListener("click", saveCanvas);

    function saveCanvas() {
        // Get data URI of the canvas
        var dataURL = canvas.toDataURL();
        
        // Create a temporary link element
        var link = document.createElement('a');
        link.href = dataURL;
        
        // Set filename (you can change it as needed)
        link.download = 'canvas_image.png';
        
        // Append link to the body and trigger a click event to download the image
        document.body.appendChild(link);
        link.click();
        
        // Remove the link from the body
        document.body.removeChild(link);
    }

</script>
@endsection