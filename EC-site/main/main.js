window.onload = function() {
    const loader = document.getElementById('loading-wrapper');
    loader.classList.add('completed');
  }


$(function(){
    $('#nav li').mouseover(function(e){
        $('ul',this).stop().slideDown('fast');
    })
    .mouseout(function(e) {
        $('ul',this).stop().slideUp('fast');
    });
});