@extends('layouts.app')

@section('content')
<section id="hero-2" class="bg-fixed hero-section division bg-heroimg2 bg-cover pt-5">
    <p class="h2glamour">Create your own Nail Designs</p>
</section>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><br></div>
                <div class="card-body">
                    <!-- Container for relative positioning -->
                    <div style="position: relative;">
                        <!-- Image of the hand with the nail -->
                        <img src="{{ asset('css/images/nailhand2.png') }}" id="nailhandimg" alt="Nail Image" style="width: 100%; height: auto;">
                        <!-- Canvas overlay for painting -->
                        <canvas id="paintCanvas" width="1000" height="600" style="position: absolute; top: 0; left: 0;"></canvas>
                        <!-- Toolbar -->
                       
                    </div> <div id="toolbar">
                            <input type="color" id="colorPicker">
                            <button id="clearButton">Clear</button>
                            <button id="drawScribbleButton">Scribble</button>
                            <button id="drawPenButton">Pen</button>
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

    // Event listeners to handle drawing modes
    document.getElementById("drawScribbleButton").addEventListener("click", function() {
        drawingMode = 'scribble';
    });
    document.getElementById("drawPenButton").addEventListener("click", function() {
        drawingMode = 'pen';
    });

    // Event listeners to handle painting
    canvas.addEventListener('mousedown', startDrawing);
    canvas.addEventListener('mouseup', stopDrawing);
    canvas.addEventListener('mousemove', draw);

    // Button click event listeners
    document.getElementById("clearButton").addEventListener("click", clearCanvas);

    function startDrawing(e) {
        // Set drawing mode and color
        setColor();
        context.beginPath();
        if (drawingMode === 'scribble') {
            context.moveTo(e.clientX, e.clientY);
        } else if (drawingMode === 'pen') {
            context.moveTo(e.clientX, e.clientY);
            context.lineWidth = 2; // Set pen width
            context.lineCap = 'round'; // Set line cap style to round
            context.strokeStyle = color; // Set stroke color
        }
    }

    function draw(e) {
        if (drawingMode === 'scribble') {
            if (e.buttons !== 1) return; // Check if left mouse button is pressed
            context.lineTo(e.clientX, e.clientY);
            context.strokeStyle = color; // Set stroke color
            context.lineWidth = 7; // Set scribble line width
            context.stroke();
        } else if (drawingMode === 'pen') {
            if (e.buttons !== 1) return; // Check if left mouse button is pressed
            context.lineTo(e.clientX, e.clientY);
            context.stroke();
        }
    }

    function stopDrawing() {
        context.closePath();
    }

    function setColor() {
        var newColor = document.getElementById("colorPicker").value;
        color = newColor;
        context.strokeStyle = color; // Set stroke color
    }

    function clearCanvas() {
        context.clearRect(0, 0, canvas.width, canvas.height);
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
