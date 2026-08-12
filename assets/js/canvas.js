<<<<<<< HEAD

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
=======

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
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
  }