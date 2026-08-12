<<<<<<< HEAD
<script>
    $(document).ready(function(e) {

        // Get a regular interval for drawing to the screen
        window.requestAnimFrame = (function(callback) {
            return window.requestAnimationFrame ||
                window.webkitRequestAnimationFrame ||
                window.mozRequestAnimationFrame ||
                window.oRequestAnimationFrame ||
                window.msRequestAnimaitonFrame ||
                function(callback) {
                    window.setTimeout(callback, 1000 / 60);
                };
        })();

        no = 0;
        steps = new Array();
        // Set up the canvas
        var canvas1 = document.getElementById("ttd");
        var canvas3 = document.getElementById("can");
        var ctx1 = canvas1.getContext("2d");
        var ctx3 = canvas3.getContext("2d");
        ctx1.strokeStyle = "blue";
        ctx3.strokeStyle = "blue";
       // ctx.lineWith = 5;
        //ctx2.lineWith = 5;

        // Set up the UI
        var sigText = document.getElementById("sig-dataUrl");
        var sigImage = document.getElementById("sig-image");
        var clearBtn = document.getElementById("sig-clearBtn");
        var submitBtn = document.getElementById("sig-submitBtn");
        clearBtn.addEventListener("click", function(e) {
            clearCanvas(canvas1);
        }, false);
        submitBtn.addEventListener("click", function(e) {
            var dataUrl = canvas1.toDataURL();
            var img = new Image();
            img.onload = function() {
                ctx1.drawImage(img, 0, 0, 400, 400);
                steps.length = 0;
                steps[no] = ctx1.getImageData(0, 0, canvas1.width, canvas1.height);
                // 			steps.push(  ctx.getImageData(0,0,canvas.width,canvas.height)); 
            }
            img.src = dataUrl;
            $('#ttd').show();
            clearCanvas(canvas1);
            $('#modal_ttd').modal('hide');
        }, false);

        var img = new Image();
        img.onload = function() {
            ctx1.drawImage(img, 0, 0, 400, 400);
            steps.length = 0;
            steps[no] = ctx1.getImageData(0, 0, canvas1.width, canvas1.height);
        }
        


        // Set up mouse events for drawing
        var drawing = false;
        var drawing1 = false;
        var mousePos = {
            x: 0,
            y: 0
        };
        var lastPos = mousePos;


        canvas1.addEventListener("mousedown", function(e) {
            drawing1 = true;
            lastPos = getMousePos(canvas1, e);
        }, false);
        canvas1.addEventListener("mouseup", function(e) {
            drawing1 = false;
        }, false);
        canvas1.addEventListener("mousemove", function(e) {
            mousePos = getMousePos(canvas1, e);
        }, false);

        canvas1.addEventListener("touchstart", function(e) {
            mousePos = getTouchPos(canvas1, e);
            var touch = e.touches[0];
            var mouseEvent = new MouseEvent("mousedown", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas1.dispatchEvent(mouseEvent);
        }, false);
        canvas1.addEventListener("touchend", function(e) {
            var mouseEvent = new MouseEvent("mouseup", {});
            canvas1.dispatchEvent(mouseEvent);
        }, false);
        canvas1.addEventListener("touchmove", function(e) {
            var touch = e.touches[0];
            var mouseEvent = new MouseEvent("mousemove", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas1.dispatchEvent(mouseEvent);
        }, false);

        // Prevent scrolling when touching the canvas
        document.body.addEventListener("touchstart", function(e) {
            if (e.target == canvas) {
                e.preventDefault();
            }
        }, false);
        document.body.addEventListener("touchend", function(e) {
            if (e.target == canvas) {
                e.preventDefault();
            }
        }, false);
        document.body.addEventListener("touchmove", function(e) {
            if (e.target == canvas) {
                e.preventDefault();
            }
        }, false);

        // Get the position of the mouse relative to the canvas
        function getMousePos(canvasDom, mouseEvent) {
            var rect = canvasDom.getBoundingClientRect();
            return {
                x: mouseEvent.clientX - rect.left,
                y: mouseEvent.clientY - rect.top
            };
        }

        // Get the position of a touch relative to the canvas
        function getTouchPos(canvasDom, touchEvent) {
            var rect = canvasDom.getBoundingClientRect();
            return {
                x: touchEvent.touches[0].clientX - rect.left,
                y: touchEvent.touches[0].clientY - rect.top
            };
        }

        // Draw to the canvas
        function renderCanvas() {
            if (drawing) {
                ctx1.moveTo(lastPos.x, lastPos.y);
                ctx1.lineTo(mousePos.x, mousePos.y);
                ctx1.strokeStyle = "blue";
                ctx1.stroke();
                lastPos = mousePos;
            }else if(drawing1){
                ctx1.moveTo(lastPos.x, lastPos.y);
                ctx1.lineTo(mousePos.x, mousePos.y);
                ctx1.strokeStyle = "blue";
                ctx1.stroke();
                lastPos = mousePos;
            }
        }

        function clearCanvas(c) {
            c.width = c.width;
        }

        // Allow for animation
        (function drawLoop() {
            requestAnimFrame(drawLoop);
            renderCanvas();
        })();

    });
=======
<script>
    $(document).ready(function(e) {

        // Get a regular interval for drawing to the screen
        window.requestAnimFrame = (function(callback) {
            return window.requestAnimationFrame ||
                window.webkitRequestAnimationFrame ||
                window.mozRequestAnimationFrame ||
                window.oRequestAnimationFrame ||
                window.msRequestAnimaitonFrame ||
                function(callback) {
                    window.setTimeout(callback, 1000 / 60);
                };
        })();

        no = 0;
        steps = new Array();
        // Set up the canvas
        var canvas1 = document.getElementById("ttd");
        var canvas3 = document.getElementById("can");
        var ctx1 = canvas1.getContext("2d");
        var ctx3 = canvas3.getContext("2d");
        ctx1.strokeStyle = "blue";
        ctx3.strokeStyle = "blue";
       // ctx.lineWith = 5;
        //ctx2.lineWith = 5;

        // Set up the UI
        var sigText = document.getElementById("sig-dataUrl");
        var sigImage = document.getElementById("sig-image");
        var clearBtn = document.getElementById("sig-clearBtn");
        var submitBtn = document.getElementById("sig-submitBtn");
        clearBtn.addEventListener("click", function(e) {
            clearCanvas(canvas1);
        }, false);
        submitBtn.addEventListener("click", function(e) {
            var dataUrl = canvas1.toDataURL();
            var img = new Image();
            img.onload = function() {
                ctx1.drawImage(img, 0, 0, 400, 400);
                steps.length = 0;
                steps[no] = ctx1.getImageData(0, 0, canvas1.width, canvas1.height);
                // 			steps.push(  ctx.getImageData(0,0,canvas.width,canvas.height)); 
            }
            img.src = dataUrl;
            $('#ttd').show();
            clearCanvas(canvas1);
            $('#modal_ttd').modal('hide');
        }, false);

        var img = new Image();
        img.onload = function() {
            ctx1.drawImage(img, 0, 0, 400, 400);
            steps.length = 0;
            steps[no] = ctx1.getImageData(0, 0, canvas1.width, canvas1.height);
        }
        


        // Set up mouse events for drawing
        var drawing = false;
        var drawing1 = false;
        var mousePos = {
            x: 0,
            y: 0
        };
        var lastPos = mousePos;


        canvas1.addEventListener("mousedown", function(e) {
            drawing1 = true;
            lastPos = getMousePos(canvas1, e);
        }, false);
        canvas1.addEventListener("mouseup", function(e) {
            drawing1 = false;
        }, false);
        canvas1.addEventListener("mousemove", function(e) {
            mousePos = getMousePos(canvas1, e);
        }, false);

        canvas1.addEventListener("touchstart", function(e) {
            mousePos = getTouchPos(canvas1, e);
            var touch = e.touches[0];
            var mouseEvent = new MouseEvent("mousedown", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas1.dispatchEvent(mouseEvent);
        }, false);
        canvas1.addEventListener("touchend", function(e) {
            var mouseEvent = new MouseEvent("mouseup", {});
            canvas1.dispatchEvent(mouseEvent);
        }, false);
        canvas1.addEventListener("touchmove", function(e) {
            var touch = e.touches[0];
            var mouseEvent = new MouseEvent("mousemove", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas1.dispatchEvent(mouseEvent);
        }, false);

        // Prevent scrolling when touching the canvas
        document.body.addEventListener("touchstart", function(e) {
            if (e.target == canvas) {
                e.preventDefault();
            }
        }, false);
        document.body.addEventListener("touchend", function(e) {
            if (e.target == canvas) {
                e.preventDefault();
            }
        }, false);
        document.body.addEventListener("touchmove", function(e) {
            if (e.target == canvas) {
                e.preventDefault();
            }
        }, false);

        // Get the position of the mouse relative to the canvas
        function getMousePos(canvasDom, mouseEvent) {
            var rect = canvasDom.getBoundingClientRect();
            return {
                x: mouseEvent.clientX - rect.left,
                y: mouseEvent.clientY - rect.top
            };
        }

        // Get the position of a touch relative to the canvas
        function getTouchPos(canvasDom, touchEvent) {
            var rect = canvasDom.getBoundingClientRect();
            return {
                x: touchEvent.touches[0].clientX - rect.left,
                y: touchEvent.touches[0].clientY - rect.top
            };
        }

        // Draw to the canvas
        function renderCanvas() {
            if (drawing) {
                ctx1.moveTo(lastPos.x, lastPos.y);
                ctx1.lineTo(mousePos.x, mousePos.y);
                ctx1.strokeStyle = "blue";
                ctx1.stroke();
                lastPos = mousePos;
            }else if(drawing1){
                ctx1.moveTo(lastPos.x, lastPos.y);
                ctx1.lineTo(mousePos.x, mousePos.y);
                ctx1.strokeStyle = "blue";
                ctx1.stroke();
                lastPos = mousePos;
            }
        }

        function clearCanvas(c) {
            c.width = c.width;
        }

        // Allow for animation
        (function drawLoop() {
            requestAnimFrame(drawLoop);
            renderCanvas();
        })();

    });
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>