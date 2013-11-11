$mouse(function(){
    $(".tile").mousedown(function(){      
        $(this).addClass("mouseover");
    });
  
    $(".tile").mouseup(function(){    
        $(this).removeClass("mouseover");
    });
});