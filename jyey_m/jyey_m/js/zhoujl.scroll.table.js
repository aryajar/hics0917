(function(root,factory){
    "use strict";
    if(typeof define==="function"&&define.amd){
        define(["jquery"],factory);
    }else if(typeof exports==="object"){
        module.exports=factory(require("jquery"));
    }else{
        factory(root.jQuery);}
}(this,function init($,undefined){
    if($.zhoujl===undefined){$.zhoujl={};
    }
$.zhoujl.table=function(width,height){
        $("#scroll-table").css("width",(1+width)+"px");
        $("#table-content-container-mark").css("width",width+"px");
        $(".table-content-container").css("width",(width)+"px");
        $(".table-body-container").css("width",(width-230)+"px");
        $(".table-title-scroll").css("width",(width-230)+"px");
        var scrollContainerWidth=$(".table-title-scroll-container div").length*60;
        if(width>scrollContainerWidth+230){
            $(".table-title-scroll-container").css("width",(width)+"px");
            $(".table-body-container table").css("width",(width)+"px");
            $(".table-title-scroll").css("overflow-x","none");
            $(".table-body-container").css("overflow-x","none");
            $("#table-content-container-mark").css("marginTop","0");
            var gridWidth=(width)/$(".table-title-scroll-container div").length;
            $(".table-title-scroll-container div").css("width",gridWidth+"px");
            $(".table-body-container td").css("width",gridWidth+"px");
            createScroll(width-230,width);
        }else{
            $(".table-title-scroll-container").css("width",scrollContainerWidth+"px");
            $(".table-body-container table").css("width",scrollContainerWidth+"px");
            $(".table-title-scroll").css("overflow-x","auto");
            $(".table-body-container").css("overflow-x","auto");
            $("#table-content-container-mark").css("marginTop","-17px");
            $(".table-title-scroll-container div").css("width","60x");
            $(".table-body-container td").css("width","60px");createScroll(scrollContainerWidth,width);
        }
var totalHeight=$("#table-body-container").height()+$(".table-title-container").height();
        if(height>totalHeight){
            $(".table-content-container").css("overflow-y","none");
            $("#table-content-container-mark").css("height",totalHeight+"px");
            $(".table-content-container").css("height",totalHeight+"px");
        }else{
            var contentHeight=height-$(".table-title-container").height();
            $(".table-content-container").css("overflow-y","auto");
            $("#table-content-container-mark").css("height",contentHeight+"px");
            $(".table-content-container").css("height",contentHeight+"px");
        }
    }
function createScroll(scrollWidth,totalWidth){
        $(".table-scroll-mark").remove();
        $("#scroll-table").append("<div class='table-scroll-mark' style='width: "+totalWidth+"px;'>"+
"<div class='table-scroll' style = 'width:"+(totalWidth-230)+"px;'>"+
"<div style='width: "+scrollWidth+"px; height: 1px'></div>"+
"</div ></div >")
$(".table-scroll").scroll(function(){
    $(".table-title-scroll").scrollTop(this.scrollTop);
    $(".table-title-scroll").scrollLeft(this.scrollLeft);
    $(".table-body-container").scrollTop(this.scrollTop);
    $(".table-body-container").scrollLeft(this.scrollLeft);
});
    }
}
)
);