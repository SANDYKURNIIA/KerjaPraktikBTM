<script type="text/javascript">
  $(document).ready(function(e) {
    init11();
    id_pelayanan = $('#inPel').val();
    reload_data_diagnosa(id_pelayanan);
    reload_data_diagnosa_id_pel(id_pelayanan);
    reload_data_diagnosa1_id_pel1(id_pelayanan);
    reload_data_penunjang(id_pelayanan);
  });

  no = 0;
  isDraw = false;
  isBack = false;
  steps = new Array();
  var canvas, canvas1, ctx, ctx1, flag = false,

    prevX = 0,
    currX = 0,
    prevY = 0,
    currY = 0,
    prevX1 = 0,
    currX1 = 0,
    prevY1 = 0,
    currY1 = 0,
    dot_flag = false;

  var x = "red",
    y = 2;

  function init11() {
    canvas = document.getElementById('can');
    canvas1 = document.getElementById('tandatangan');
    ctx = canvas.getContext("2d");
    ctx1 = canvas1.getContext("2d");

    w = canvas.width;
    h = canvas.height;
    w1 = canvas1.width;
    h1 = canvas1.height;

    canvas.addEventListener('touchstart', touchstart, false);
    canvas.addEventListener('touchmove', touchmove, false);
    canvas.addEventListener('touchend', touchend, false);

    canvas.addEventListener('mousedown', drawstart, false);
    canvas.addEventListener('mousemove', drawmove, false);
    canvas.addEventListener('mouseup', drawend, false);

    
    var img = new Image();
    img.onload = function() {
      ctx.drawImage(img, 0, 0, 400, 400);
      steps.length = 0;
      steps[no] = ctx.getImageData(0, 0, canvas.width, canvas.height);
      // 			steps.push(  ctx.getImageData(0,0,canvas.width,canvas.height)); 
    }
    img.src = "<?php echo base_url("assets/dist/img/orang1.png"); ?>";


  }

  function drawstart(event) {
    ctx.beginPath();
    ctx.moveTo(event.pageX - canvas.offset.left, event.pageY - canvas.offset.top);
    isIdle = false;
  }

  function drawmove(event) {
    if (isIdle) return;
    ctx.lineTo(event.pageX - canvas.offset.left, event.pageY - canvas.offset.top);
    ctx.stroke();
  }

  function drawend(event) {
    if (isIdle) return;
    drawmove(event);
    isIdle = true;
  }

  function touchstart(event) {
    drawstart(event.touches[0])
  }

  function touchmove(event) {
    drawmove(event.touches[0]);
    event.preventDefault();
  }

  function touchend(event) {
    drawend(event.changedTouches[0])
  }
</script>