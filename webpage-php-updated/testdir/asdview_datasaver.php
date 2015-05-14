
 <?php
$jsonbookdir="visual-search/books/Segmented-books/";
 foreach ($_POST['listallbooks'] as $names)
{
     // echo  $segbookdir.$names;
      echo "Selected book is:".$names;
      $jsonbookfile=$names;
}
  ?>

<html lang="en">
    <head>
        <meta charset="utf-8">
       <script src="http://d3js.org/d3.v2.js"></script>
<script src="http://d3js.org/d3.v3.min.js"></script>
<script src="http://labratrevenge.com/d3-tip/javascripts/d3.tip.v0.6.3.js"></script>
<style>
.d3-tip {
  line-height: 1;
  font-weight: bold;
  padding: 12px;
  background: rgba(0, 0, 0, 0.8);
  color: #fff;
  border-radius: 2px;
}

/* Creates a small triangle extender for the tooltip */

.d3-tip:after {
  box-sizing: border-box;
  display: inline;
  font-size: 10px;
  width: 100%;
  line-height: 1;
  color: rgba(0, 0, 0, 0.8);
  content: "\25BC";
  position: absolute;
  text-align: center;
}



/* Style northward tooltips differently */

.d3-tip.n:after {
  margin: -1px 0 0 0;
  top: 100%;
  left: 0;
}

</style>

   </head>

    <body>
              
                
        <script type="text/javascript">

           var jsonbookdir="<?php echo $jsonbookdir; ?>"; 
           var jsonbookfile="<?php echo $jsonbookfile; ?>";
           //alert(jsonbookfile);            
           var pathtojsonfile="../".concat(jsonbookdir.concat(jsonbookfile));
           //alert(pathtojsonfile);
          
            var svg = d3.select("body")

                .append("svg")

                .attr("width","100%")

                .attr("height","100%")

                .style("border", "1px solid black")

 .append('svg:g')

    .call(d3.behavior.zoom().on("zoom", redraw))
    
  .append('svg:g');
//.attr("preserveAspectRatio","none") ;

   

var tip = d3.tip()

  .attr('class', 'd3-tip')

  .offset([-10, 0])

  .html(function(d) {

    return "<strong>name:</strong> <span style='color:red'>" + d.text + "</span>";});

svg.call(tip);

console.log('hello');
//document.write(jsonbookfile);
d3.json(pathtojsonfile,function(error,test) {
      
        console.log(test.imagepath);
        var imgpath="../".concat(test.imagepath);
        //alert(test.imagepath);
        var imgs = svg.selectAll("image").data([0])
     
                .enter()

 		.append("svg:image")

                .attr('image-rendering','optimizeQuality')

                .attr("xlink:href",imgpath)

                .attr("x", "0")

                .attr("y", "0");

var img = new Image();

//img.src=test.imagepath;
img.src=imgpath;
img.onload=function(){

                var width=this.width;

                var height=this.height;



            imgs.attr("width", width)

                .attr("height",height);

}





//Draw the Rectangle

                 var rectangle = svg.selectAll("rect").data(test.segments)
                        .enter()
                        .append("svg:rect")
                        .attr("class","overlay")
                        .attr("pointer-events", "all")
                        .attr("x", function (d) { return d.geometry.x; } )
                        .attr("y", function (d) { return d.geometry.y; } )
                        .attr("width", function (d) { return d.geometry.height; } )
                        .attr("height", function (d) { return d.geometry.width; } )
                        .style("fill-opacity",0.2)
                        .attr('fill',function (d) { return "blue"; } )
                        .on('mouseover',tip.show)
                        .on('mouseout',tip.hide)
	.on("click",function goToURL() {
		  window.open("form.html");
});

});

function redraw() {

//console.log("here", d3.event.translate, d3.event.scale);

svg.attr("transform", "translate(" + d3.event.translate + ")scale(" + d3.event.scale + ")");

}

</script>

    </body>

</html>

                                                                                                                 

                                                                                                                                                                                             


