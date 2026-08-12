<div class="modal fade" id="ttd" tabindex="-1" role="dialog" aria-labelledby="newPeternakModallabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newPeternakModallabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <div class="row">

                        <canvas id="tandatangan" width="500" height="400"></canvas>
                        <input type="button" value="clear" id="clear" size="23" onclick="erase()">
                        <input type="button" value="back" id="back" size="23" onclick="back()">
                        <input type="button" value="next" id="next" size="30" onclick="next()">


                    </div>
                </div>
            </div>
            <div class="modal-footer">

            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
	$(document).ready(function(e) {
		init1();
	});

	no = 0;
	isDraw = false;
	isBack = false;
	steps = new Array();
	var canvas, ctx, flag = false,

		prevX = 0,
		currX = 0,
		prevY = 0,
		currY = 0,
		dot_flag = false;

	var x = "blue",
		y = 3;

	function init1() {
		canvas = document.getElementById('tandatangan');
		ctx = canvas.getContext("2d");

		w = canvas.width;
		h = canvas.height;

		canvas.addEventListener("mousemove", function(e) {
			find('move', e)
		}, false);
		canvas.addEventListener("mousedown", function(e) {
			find('down', e)
		}, false);
		canvas.addEventListener("mouseup", function(e) {
			find('up', e)
		}, false);
		canvas.addEventListener("mouseout", function(e) {
			find('out', e)
		}, false);
		var img = new Image();
		img.onload = function() {
			ctx.drawImage(img, 0, 0, 200, 200);
			steps.length = 0;
			steps[no] = ctx.getImageData(0, 0, canvas.width, canvas.height);
			// 			steps.push(  ctx.getImageData(0,0,canvas.width,canvas.height)); 
		}



	}



	function draw() {
		ctx.beginPath();
		ctx.moveTo(prevX, prevY);
		ctx.lineTo(currX, currY);
		ctx.strokeStyle = x;
		ctx.lineWidth = y;
		ctx.stroke();
		ctx.closePath();
		isDraw = true;

		// steps.push(  ctx.getImageData(0,0,canvas.width,canvas.height));
		// 					no++;
	}

	function erase() {


		ctx.clearRect(0, 0, w, h);
		// document.getElementById("canvasimg").style.display = "none";
		var img = new Image();
		img.onload = function() {
			ctx.drawImage(img, 0, 0, 400, 400);
			steps.length = 0;
			steps[no] = ctx.getImageData(0, 0, canvas.width, canvas.height);
			// 			steps.push(  ctx.getImageData(0,0,canvas.width,canvas.height)); 
		}



	}


	function find(res, e) {
		if (res == 'down') {

			prevX = currX;
			prevY = currY;

			var offset = $("#tandatangan").offset();
			currX = e.pageX - offset.left;
			currY = e.pageY - offset.top;

			flag = true;
			dot_flag = true;
			if (dot_flag) {
				ctx.beginPath();
				ctx.fillStyle = x;
				ctx.fillRect(currX, currY, 2, 2);
				ctx.closePath();
				dot_flag = false;
			}
		}
		if (res == 'up' || res == "out") {
			flag = false;


		}
		if (res == 'up' && isDraw) {
			isDraw = false;
			if (isBack) {
				steps.pop();
				isBack = false;
			}

			steps[++no] = (ctx.getImageData(0, 0, canvas.width, canvas.height));

		}
		if (res == 'move') {
			if (flag) {

				prevX = currX;
				prevY = currY;
				var offset = $("#tandatangan").offset();
				currX = e.pageX - offset.left;
				currY = e.pageY - offset.top;
				draw();
			} else {

			}
		}
	}

	function next() {
		no++;
		// 				alert(no);
		if (no >= steps.length) no = steps.length - 1;
		ctx.putImageData(steps[no], 0, 0);
	}

	function back() {
		no--;
		isBack = true;

		if (no <= 0) no = 0;
		// 				alert(no);

		ctx.putImageData(steps[no], 0, 0);
	}
</script>