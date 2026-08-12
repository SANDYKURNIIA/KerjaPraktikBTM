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
        var canvas = document.getElementById("ttd");
        var canvas1 = document.getElementById("can");
        var canvas2 = document.getElementById("ttd1");
        var canvas3 = document.getElementById("can1");
        var canvas4 = document.getElementById("ttd2");
        var canvas5 = document.getElementById("can2");
        var ctx = canvas.getContext("2d");
        var ctx1 = canvas1.getContext("2d");
        var ctx2 = canvas2.getContext("2d");
        var ctx3 = canvas3.getContext("2d");
        var ctx4 = canvas4.getContext("2d");
        var ctx5 = canvas5.getContext("2d");
        ctx.strokeStyle = "blue";
        ctx1.strokeStyle = "blue";
        ctx2.strokeStyle = "blue";
        ctx3.strokeStyle = "blue";
        ctx4.strokeStyle = "blue";
        ctx5.strokeStyle = "blue";
        ctx.lineWith = 5;
        ctx2.lineWith = 5;
        ctx4.lineWith = 5;

        // Set up the UI
        var sigText = document.getElementById("sig-dataUrl");
        var sigImage = document.getElementById("sig-image");
        var clearBtn = document.getElementById("sig-clearBtn");
        var submitBtn = document.getElementById("sig-submitBtn");
        var clearBtn1 = document.getElementById("sig-clearBtn1");
        var submitBtn1 = document.getElementById("sig-submitBtn1");
        var clearBtn2 = document.getElementById("sig-clearBtn2");
        var submitBtn2 = document.getElementById("sig-submitBtn2");

        var clearBtn3 = document.getElementById("sig-clearBtn3");
        var clearBtn4 = document.getElementById("sig-clearBtn4");
        var clearBtn5 = document.getElementById("sig-clearBtn5");
        clearBtn.addEventListener("click", function(e) {
            clearCanvas(canvas);
        }, false);
        submitBtn.addEventListener("click", function(e) {
            var dataUrl = canvas.toDataURL();
            var img = new Image();
            img.onload = function() {
                ctx1.drawImage(img, 0, 0, 400, 400);
                steps.length = 0;
                steps[no] = ctx1.getImageData(0, 0, canvas1.width, canvas1.height);
                // 			steps.push(  ctx.getImageData(0,0,canvas.width,canvas.height)); 
            }
            img.src = dataUrl;
            $('#can').show();
            clearCanvas(canvas);
            $('#modal_ttd').modal('hide');
        }, false);
        clearBtn1.addEventListener("click", function(e) {
            clearCanvas(canvas2);
            var img = new Image();
            img.onload = function() {
                ctx2.drawImage(img, 0, 0, 400, 400);
                steps.length = 0;
                steps[no] = ctx2.getImageData(0, 0, canvas2.width, canvas2.height);
            }
            img.src = '<?php echo base_url("assets/dist/img/orang1.png"); ?>';
        }, false);
        submitBtn1.addEventListener("click", function(e) {
            var dataUrl = canvas2.toDataURL();
            var img = new Image();
            img.onload = function() {
                ctx3.drawImage(img, 0, 0, 400, 400);
                steps.length = 0;
                steps[no] = ctx3.getImageData(0, 0, canvas3.width, canvas3.height);
                // 			steps.push(  ctx.getImageData(0,0,canvas.width,canvas.height)); 
            }
            img.src = dataUrl;
            $('#can1').show();
            clearCanvas(canvas2);
            var img1 = new Image();
            img1.onload = function() {
                ctx2.drawImage(img1, 0, 0, 400, 400);
                steps.length = 0;
                steps[no] = ctx2.getImageData(0, 0, canvas2.width, canvas2.height);
            }
            img1.src = '<?php echo base_url("assets/dist/img/orang1.png"); ?>';
            $('#modal_ttd1').modal('hide');
        }, false);
        clearBtn2.addEventListener("click", function(e) {
            clearCanvas(canvas5);
        }, false);
        submitBtn2.addEventListener("click", function(e) {
            var dataUrl = canvas4.toDataURL();
            var img = new Image();
            img.onload = function() {
                ctx5.drawImage(img, 0, 0, 400, 400);
                steps.length = 0;
                steps[no] = ctx5.getImageData(0, 0, canvas5.width, canvas5.height);
                // 			steps.push(  ctx.getImageData(0,0,canvas.width,canvas.height)); 
            }
            img.src = dataUrl;
            $('#can2').show();
            clearCanvas(canvas);
            $('#modal_ttd2').modal('hide');
        }, false);

        clearBtn3.addEventListener("click", function(e) {
            clearCanvas(canvas);
            $('#can').hide();
        }, false);
        clearBtn4.addEventListener("click", function(e) {
            clearCanvas(canvas2);
            $('#ttd').hide();
        }, false);
        clearBtn5.addEventListener("click", function(e) {
            clearCanvas(canvas4);
        }, false);

       

        // Set up mouse events for drawing
        var drawing = false;
        var drawing1 = false;
        var drawing2 = false;
        var mousePos = {
            x: 0,
            y: 0
        };
        var lastPos = mousePos;
        canvas.addEventListener("mousedown", function(e) {
            drawing = true;
            lastPos = getMousePos(canvas, e);
        }, false);
        canvas.addEventListener("mouseup", function(e) {
            drawing = false;
        }, false);
        canvas.addEventListener("mousemove", function(e) {
            mousePos = getMousePos(canvas, e);
        }, false);

        canvas2.addEventListener("mousedown", function(e) {
            drawing1 = true;
            lastPos = getMousePos(canvas2, e);
        }, false);
        canvas2.addEventListener("mouseup", function(e) {
            drawing1 = false;
        }, false);
        canvas2.addEventListener("mousemove", function(e) {
            mousePos = getMousePos(canvas2, e);
        }, false);

        canvas4.addEventListener("mousedown", function(e) {
            drawing2 = true;
            lastPos = getMousePos(canvas4, e);
        }, false);
        canvas4.addEventListener("mouseup", function(e) {
            drawing2 = false;
        }, false);
        canvas4.addEventListener("mousemove", function(e) {
            mousePos = getMousePos(canvas4, e);
        }, false);

        // Set up touch events for mobile, etc
        canvas.addEventListener("touchstart", function(e) {
            mousePos = getTouchPos(canvas, e);
            var touch = e.touches[0];
            var mouseEvent = new MouseEvent("mousedown", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas.dispatchEvent(mouseEvent);
        }, false);
        canvas.addEventListener("touchend", function(e) {
            var mouseEvent = new MouseEvent("mouseup", {});
            canvas.dispatchEvent(mouseEvent);
        }, false);
        canvas.addEventListener("touchmove", function(e) {
            var touch = e.touches[0];
            var mouseEvent = new MouseEvent("mousemove", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas.dispatchEvent(mouseEvent);
        }, false);

        canvas2.addEventListener("touchstart", function(e) {
            mousePos = getTouchPos(canvas2, e);
            var touch = e.touches[0];
            var mouseEvent = new MouseEvent("mousedown", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas2.dispatchEvent(mouseEvent);
        }, false);
        canvas2.addEventListener("touchend", function(e) {
            var mouseEvent = new MouseEvent("mouseup", {});
            canvas2.dispatchEvent(mouseEvent);
        }, false);
        canvas2.addEventListener("touchmove", function(e) {
            var touch = e.touches[0];
            var mouseEvent = new MouseEvent("mousemove", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas2.dispatchEvent(mouseEvent);
        }, false);

        canvas4.addEventListener("touchstart", function(e) {
            mousePos = getTouchPos(canvas4, e);
            var touch = e.touches[0];
            var mouseEvent = new MouseEvent("mousedown", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas4.dispatchEvent(mouseEvent);
        }, false);
        canvas4.addEventListener("touchend", function(e) {
            var mouseEvent = new MouseEvent("mouseup", {});
            canvas4.dispatchEvent(mouseEvent);
        }, false);
        canvas4.addEventListener("touchmove", function(e) {
            var touch = e.touches[0];
            var mouseEvent = new MouseEvent("mousemove", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas4.dispatchEvent(mouseEvent);
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
                ctx.moveTo(lastPos.x, lastPos.y);
                ctx.lineTo(mousePos.x, mousePos.y);
                ctx.strokeStyle = "blue";
                ctx.stroke();
                lastPos = mousePos;
            }else if(drawing1){
                ctx2.moveTo(lastPos.x, lastPos.y);
                ctx2.lineTo(mousePos.x, mousePos.y);
                ctx2.strokeStyle = "blue";
                ctx2.stroke();
                lastPos = mousePos;
            }else if(drawing2){
                ctx4.moveTo(lastPos.x, lastPos.y);
                ctx4.lineTo(mousePos.x, mousePos.y);
                ctx4.strokeStyle = "blue";
                ctx4.stroke();
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
        var canvas = document.getElementById("ttd");
        var canvas1 = document.getElementById("can");
        var canvas2 = document.getElementById("ttd1");
        var canvas3 = document.getElementById("can1");
        var canvas4 = document.getElementById("ttd2");
        var canvas5 = document.getElementById("can2");
        var ctx = canvas.getContext("2d");
        var ctx1 = canvas1.getContext("2d");
        var ctx2 = canvas2.getContext("2d");
        var ctx3 = canvas3.getContext("2d");
        var ctx4 = canvas4.getContext("2d");
        var ctx5 = canvas5.getContext("2d");
        ctx.strokeStyle = "blue";
        ctx1.strokeStyle = "blue";
        ctx2.strokeStyle = "blue";
        ctx3.strokeStyle = "blue";
        ctx4.strokeStyle = "blue";
        ctx5.strokeStyle = "blue";
        ctx.lineWith = 5;
        ctx2.lineWith = 5;
        ctx4.lineWith = 5;

        // Set up the UI
        var sigText = document.getElementById("sig-dataUrl");
        var sigImage = document.getElementById("sig-image");
        var clearBtn = document.getElementById("sig-clearBtn");
        var submitBtn = document.getElementById("sig-submitBtn");
        var clearBtn1 = document.getElementById("sig-clearBtn1");
        var submitBtn1 = document.getElementById("sig-submitBtn1");
        var clearBtn2 = document.getElementById("sig-clearBtn2");
        var submitBtn2 = document.getElementById("sig-submitBtn2");

        var clearBtn3 = document.getElementById("sig-clearBtn3");
        var clearBtn4 = document.getElementById("sig-clearBtn4");
        var clearBtn5 = document.getElementById("sig-clearBtn5");
        clearBtn.addEventListener("click", function(e) {
            clearCanvas(canvas);
        }, false);
        submitBtn.addEventListener("click", function(e) {
            var dataUrl = canvas.toDataURL();
            var img = new Image();
            img.onload = function() {
                ctx1.drawImage(img, 0, 0, 400, 400);
                steps.length = 0;
                steps[no] = ctx1.getImageData(0, 0, canvas1.width, canvas1.height);
                // 			steps.push(  ctx.getImageData(0,0,canvas.width,canvas.height)); 
            }
            img.src = dataUrl;
            $('#can').show();
            clearCanvas(canvas);
            $('#modal_ttd').modal('hide');
        }, false);
        clearBtn1.addEventListener("click", function(e) {
            clearCanvas(canvas2);
            var img = new Image();
            img.onload = function() {
                ctx2.drawImage(img, 0, 0, 400, 400);
                steps.length = 0;
                steps[no] = ctx2.getImageData(0, 0, canvas2.width, canvas2.height);
            }
            img.src = '<?php echo base_url("assets/dist/img/orang1.png"); ?>';
        }, false);
        submitBtn1.addEventListener("click", function(e) {
            var dataUrl = canvas2.toDataURL();
            var img = new Image();
            img.onload = function() {
                ctx3.drawImage(img, 0, 0, 400, 400);
                steps.length = 0;
                steps[no] = ctx3.getImageData(0, 0, canvas3.width, canvas3.height);
                // 			steps.push(  ctx.getImageData(0,0,canvas.width,canvas.height)); 
            }
            img.src = dataUrl;
            $('#can1').show();
            clearCanvas(canvas2);
            var img1 = new Image();
            img1.onload = function() {
                ctx2.drawImage(img1, 0, 0, 400, 400);
                steps.length = 0;
                steps[no] = ctx2.getImageData(0, 0, canvas2.width, canvas2.height);
            }
            img1.src = '<?php echo base_url("assets/dist/img/orang1.png"); ?>';
            $('#modal_ttd1').modal('hide');
        }, false);
        clearBtn2.addEventListener("click", function(e) {
            clearCanvas(canvas5);
        }, false);
        submitBtn2.addEventListener("click", function(e) {
            var dataUrl = canvas4.toDataURL();
            var img = new Image();
            img.onload = function() {
                ctx5.drawImage(img, 0, 0, 400, 400);
                steps.length = 0;
                steps[no] = ctx5.getImageData(0, 0, canvas5.width, canvas5.height);
                // 			steps.push(  ctx.getImageData(0,0,canvas.width,canvas.height)); 
            }
            img.src = dataUrl;
            $('#can2').show();
            clearCanvas(canvas);
            $('#modal_ttd2').modal('hide');
        }, false);

        clearBtn3.addEventListener("click", function(e) {
            clearCanvas(canvas);
            $('#can').hide();
        }, false);
        clearBtn4.addEventListener("click", function(e) {
            clearCanvas(canvas2);
            $('#ttd').hide();
        }, false);
        clearBtn5.addEventListener("click", function(e) {
            clearCanvas(canvas4);
        }, false);

       

        // Set up mouse events for drawing
        var drawing = false;
        var drawing1 = false;
        var drawing2 = false;
        var mousePos = {
            x: 0,
            y: 0
        };
        var lastPos = mousePos;
        canvas.addEventListener("mousedown", function(e) {
            drawing = true;
            lastPos = getMousePos(canvas, e);
        }, false);
        canvas.addEventListener("mouseup", function(e) {
            drawing = false;
        }, false);
        canvas.addEventListener("mousemove", function(e) {
            mousePos = getMousePos(canvas, e);
        }, false);

        canvas2.addEventListener("mousedown", function(e) {
            drawing1 = true;
            lastPos = getMousePos(canvas2, e);
        }, false);
        canvas2.addEventListener("mouseup", function(e) {
            drawing1 = false;
        }, false);
        canvas2.addEventListener("mousemove", function(e) {
            mousePos = getMousePos(canvas2, e);
        }, false);

        canvas4.addEventListener("mousedown", function(e) {
            drawing2 = true;
            lastPos = getMousePos(canvas4, e);
        }, false);
        canvas4.addEventListener("mouseup", function(e) {
            drawing2 = false;
        }, false);
        canvas4.addEventListener("mousemove", function(e) {
            mousePos = getMousePos(canvas4, e);
        }, false);

        // Set up touch events for mobile, etc
        canvas.addEventListener("touchstart", function(e) {
            mousePos = getTouchPos(canvas, e);
            var touch = e.touches[0];
            var mouseEvent = new MouseEvent("mousedown", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas.dispatchEvent(mouseEvent);
        }, false);
        canvas.addEventListener("touchend", function(e) {
            var mouseEvent = new MouseEvent("mouseup", {});
            canvas.dispatchEvent(mouseEvent);
        }, false);
        canvas.addEventListener("touchmove", function(e) {
            var touch = e.touches[0];
            var mouseEvent = new MouseEvent("mousemove", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas.dispatchEvent(mouseEvent);
        }, false);

        canvas2.addEventListener("touchstart", function(e) {
            mousePos = getTouchPos(canvas2, e);
            var touch = e.touches[0];
            var mouseEvent = new MouseEvent("mousedown", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas2.dispatchEvent(mouseEvent);
        }, false);
        canvas2.addEventListener("touchend", function(e) {
            var mouseEvent = new MouseEvent("mouseup", {});
            canvas2.dispatchEvent(mouseEvent);
        }, false);
        canvas2.addEventListener("touchmove", function(e) {
            var touch = e.touches[0];
            var mouseEvent = new MouseEvent("mousemove", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas2.dispatchEvent(mouseEvent);
        }, false);

        canvas4.addEventListener("touchstart", function(e) {
            mousePos = getTouchPos(canvas4, e);
            var touch = e.touches[0];
            var mouseEvent = new MouseEvent("mousedown", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas4.dispatchEvent(mouseEvent);
        }, false);
        canvas4.addEventListener("touchend", function(e) {
            var mouseEvent = new MouseEvent("mouseup", {});
            canvas4.dispatchEvent(mouseEvent);
        }, false);
        canvas4.addEventListener("touchmove", function(e) {
            var touch = e.touches[0];
            var mouseEvent = new MouseEvent("mousemove", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas4.dispatchEvent(mouseEvent);
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
                ctx.moveTo(lastPos.x, lastPos.y);
                ctx.lineTo(mousePos.x, mousePos.y);
                ctx.strokeStyle = "blue";
                ctx.stroke();
                lastPos = mousePos;
            }else if(drawing1){
                ctx2.moveTo(lastPos.x, lastPos.y);
                ctx2.lineTo(mousePos.x, mousePos.y);
                ctx2.strokeStyle = "blue";
                ctx2.stroke();
                lastPos = mousePos;
            }else if(drawing2){
                ctx4.moveTo(lastPos.x, lastPos.y);
                ctx4.lineTo(mousePos.x, mousePos.y);
                ctx4.strokeStyle = "blue";
                ctx4.stroke();
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