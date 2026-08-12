<<<<<<< HEAD
$(document).on('click', '[data-wizard]', function(e){
    var href;
    var $this = $(this);
    var $target = $($this.attr('data-target') || (href = $this.attr('href')) && href.replace(/.*(?=#[^\s]+$)/, ''));

    var wizard = $target.data('wizard');

    if(!wizard){
        return;
    }

    var method = $this.data('wizard');

    if(/^(back|next|first|finish|reset)$/.test(method)){
        wizard[method]();
    }

    e.preventDefault();
});
=======
$(document).on('click', '[data-wizard]', function(e){
    var href;
    var $this = $(this);
    var $target = $($this.attr('data-target') || (href = $this.attr('href')) && href.replace(/.*(?=#[^\s]+$)/, ''));

    var wizard = $target.data('wizard');

    if(!wizard){
        return;
    }

    var method = $this.data('wizard');

    if(/^(back|next|first|finish|reset)$/.test(method)){
        wizard[method]();
    }

    e.preventDefault();
});
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
