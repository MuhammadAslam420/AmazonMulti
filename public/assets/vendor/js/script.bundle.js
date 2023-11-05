
$.noConflict();

jQuery('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
  var activated_tab = e.target // activated tab
  var previous_tab = e.relatedTarget // previous tab
  if(activated_tab.id === 'home_tab') {
    jQuery('#home_else').css('display', 'block');
    jQuery('#profile_else').css('display', 'none');
    jQuery('#messages_else').css('display', 'none');
    jQuery('#settings_else').css('display', 'none');
  };
  if(activated_tab.id === 'profile_tab') {
    jQuery('#home_else').css('display', 'none');
    jQuery('#profile_else').css('display', 'block');
    jQuery('#messages_else').css('display', 'none');
    jQuery('#settings_else').css('display', 'none');
  }
  if(activated_tab.id === 'messages_tab') {
    jQuery('#home_else').css('display', 'none');
    jQuery('#profile_else').css('display', 'none');
    jQuery('#messages_else').css('display', 'block');
    jQuery('#settings_else').css('display', 'none');
  }
  if(activated_tab.id === 'settings_tab') {
    jQuery('#home_else').css('display', 'none');
    jQuery('#profile_else').css('display', 'none');
    jQuery('#messages_else').css('display', 'none');
    jQuery('#settings_else').css('display', 'block');
  }

});

jQuery(window).on('load', function(){ 
  // Animate loader off screen
  jQuery('.se-pre-con').fadeOut("slow");
});

jQuery(document).ready(function() {
  jQuery('#tc_aside_toggle').on("click", function(e){
      jQuery('body').toggleClass('aside-minimize');
  });
  // jQuery('#tc_aside').on("hover", function(e){
  //     jQuery('body').toggleClass('aside-minimize-hover');
  // })
  jQuery("#tc_aside").hover(function () {
      jQuery('body').toggleClass("aside-minimize-hover");
  });

  //sidebar menu active
  jQuery('#basic-input .nav-link').on("click", function(e){
    console.log('ac');
    
    jQuery('.nav-collapse').addClass('show');
  });

  //Mobile Menu
  jQuery('#tc_aside_mobile_toggle').on('click', function () {
      
      jQuery('#tc_aside').toggleClass('aside-on');
      jQuery('.aside-overlay').addClass('active');

      //put this when popup opens, to stop body scrolling
      // bodyScrollLock.disableBodyScroll(targetElement);
      // jQuery('html').css('overflow', 'hidden');
      // jQuery('body').css('overflow', 'hidden');
  });

  jQuery('.aside-overlay').on('click', function () {
      jQuery('#tc_aside').removeClass('aside-on');
      jQuery('.aside-overlay').removeClass('active');

      //put this when close popup and show scrollbar in body
      // bodyScrollLock.enableBodyScroll(targetElement);

      // jQuery('html').css('overflow', 'auto');
      // jQuery('body').css('overflow', 'auto');
  });

  // Account offCanvas
  jQuery('#tc_quick_user_toggle').on("click", function(e){
      jQuery('#kt_quick_user').addClass('offcanvas-on');
  });
  jQuery('#kt_quick_user_close').on("click", function(e){
      jQuery('#kt_quick_user').removeClass('offcanvas-on');
  });


  jQuery('#tc_header_mobile_topbar_toggle').on("click", function(e){
      jQuery('body').toggleClass('topbar-mobile-on');
  });


  jQuery('#kt_demo_panel_toggle').on("click", function(e){
      jQuery('#kt_color_panel').addClass('offcanvas-on');
  });
  jQuery('#kt_color_panel_close').on("click", function(e){
      jQuery('#kt_color_panel').removeClass('offcanvas-on');
  });

  jQuery('#kt_notes_panel_toggle').on("click", function(e){
    jQuery('#kt_notes_panel').addClass('offcanvas-on');
});
jQuery('#kt_notes_panel_close').on("click", function(e){
    jQuery('#kt_notes_panel').removeClass('offcanvas-on');
   
});

jQuery('.click-edit').on("click",function(){
  jQuery('.editpopup').addClass('offcanvas-on');
});

jQuery('.kt_notes_panel_toggle').on("click", function(e){
  jQuery('.kt_notes_panel').addClass('offcanvas-on');
});
jQuery('.kt_notes_panel_close').on("click", function(e){
  jQuery('.kt_notes_panel').removeClass('offcanvas-on');
  jQuery('.editpopup').removeClass('offcanvas-on');
});

  // theme dark
  jQuery('#radio-light').on('click', function(e){
      jQuery('#radio-dark').parent('label').removeClass('active');
      jQuery('body').removeClass('dark');
      jQuery('#radio-light').attr("checked", "checked");
      jQuery('#radio-dark').removeAttr("checked", "");
      jQuery('#radio-light').parent('label').addClass('active');

  })

  jQuery('#radio-dark').on('click', function(e){
      jQuery('#radio-light').parent('label').removeClass('active');
      jQuery('body').addClass('dark');
      jQuery('#radio-dark').attr("checked", "checked");
      jQuery('#radio-light').removeAttr("checked", "");
      jQuery('#radio-dark').parent('label').addClass('active');
  })

  
  jQuery('.btn-rtl').on('click', function(e){
    jQuery('.btn-rtl').toggleClass('active');
    jQuery('body').toggleClass('rtl');
    jQuery('#kt_color_panel').removeClass('offcanvas-on');
    
  })

  //theme color
  jQuery('#color-theme-default').on('click', function(e){
    jQuery('body').removeClass('color-theme-red');
    jQuery('body').removeClass('color-theme-green');
    jQuery('body').removeClass('color-theme-blue');
    jQuery('body').removeClass('color-theme-yellow');
    jQuery('body').removeClass('color-theme-navy-blue');
    
  })
  jQuery('#color-theme-blue').on('click', function(e){
    jQuery('body').removeClass('color-theme-red');
    jQuery('body').removeClass('color-theme-green');
    jQuery('body').removeClass('color-theme-yellow');
    jQuery('body').removeClass('color-theme-navy-blue');
    jQuery('body').addClass('color-theme-blue');
    
  })
  jQuery('#color-theme-red').on('click', function(e){
    jQuery('body').removeClass('color-theme-blue');
    jQuery('body').removeClass('color-theme-green');
    jQuery('body').removeClass('color-theme-yellow');
    jQuery('body').removeClass('color-theme-navy-blue');
    jQuery('body').addClass('color-theme-red');
  })
  jQuery('#color-theme-green').on('click', function(e){
    jQuery('body').removeClass('color-theme-blue');
    jQuery('body').removeClass('color-theme-red');
    jQuery('body').removeClass('color-theme-yellow');
    jQuery('body').removeClass('color-theme-navy-blue');
    jQuery('body').addClass('color-theme-green');
  })
  jQuery('#color-theme-yellow').on('click', function(e){
    jQuery('body').removeClass('color-theme-blue');
    jQuery('body').removeClass('color-theme-red');
    jQuery('body').removeClass('color-theme-green');
    jQuery('body').removeClass('color-theme-navy-blue');
    jQuery('body').addClass('color-theme-yellow');
  })
  jQuery('#color-theme-navy-blue').on('click', function(e){
    jQuery('body').removeClass('color-theme-blue');
    jQuery('body').removeClass('color-theme-red');
    jQuery('body').removeClass('color-theme-green');
    jQuery('body').removeClass('color-theme-yellow');
    jQuery('body').addClass('color-theme-navy-blue');
  })


  // validation for form fields

  jQuery( "#myform" ).validate({
    rules: {
      email: {
        required: true
      },
      password : {
        required: true
      }
    }
  });
  
});


jQuery(document).ready(function() {
  // hide table if js enabled
  jQuery('#data-table').addClass('js');

	// Create our graph from the data table and specify a container to put the graph in
	createGraph('#data-table', '.chart');
	
	// Here be graphs
	function createGraph(data, container) {
		// Declare some common variables and container elements	
		var bars = [];
		var figureContainer = jQuery('<div id="figure"></div>');
		var graphContainer = jQuery('<div class="graph"></div>');
		var barContainer = jQuery('<div class="bars"></div>');
		var data = jQuery(data);
		var container = jQuery(container);
		var chartData;		
		var chartYMax;
		var columnGroups;
		
		// Timer variables
		var barTimer;
		var graphTimer;
		
		// Create table data object
		var tableData = {
			// Get numerical data from table cells
			chartData: function() {
				var chartData = [];
				data.find('tbody td').each(function() {
					chartData.push(jQuery(this).text());
				});
				return chartData;
			},
			// Get heading data from table caption
			chartHeading: function() {
				var chartHeading = data.find('caption').text();
				return chartHeading;
			},
			// Get legend data from table body
			chartLegend: function() {
				var chartLegend = [];
				// Find th elements in table body - that will tell us what items go in the main legend
				data.find('tbody th').each(function() {
					chartLegend.push(jQuery(this).text());
				});
				return chartLegend;
			},
			// Get highest value for y-axis scale
			chartYMax: function() {
				var chartData = this.chartData();
				// Round off the value
				var chartYMax = Math.ceil(Math.max.apply(Math, chartData) / 100) * 100;
				return chartYMax;
			},
			// Get y-axis data from table cells
			yLegend: function() {
				var chartYMax = this.chartYMax();
				var yLegend = [];
				// Number of divisions on the y-axis
				var yAxisMarkings = 5;						
				// Add required number of y-axis markings in order from 0 - max
				for (var i = 0; i < yAxisMarkings; i++) {
					yLegend.unshift(((chartYMax * i) / (yAxisMarkings - 1)));
				}
				return yLegend;
			},
			// Get x-axis data from table header
			xLegend: function() {
				var xLegend = [];
				// Find th elements in table header - that will tell us what items go in the x-axis legend
				data.find('thead th').each(function() {
					xLegend.push($(this).text());
				});
				return xLegend;
			},
			// Sort data into groups based on number of columns
			columnGroups: function() {
				var columnGroups = [];
				// Get number of columns from first row of table body
				var columns = data.find('tbody tr:eq(0) td').length;
				for (var i = 0; i < columns; i++) {
					columnGroups[i] = [];
					data.find('tbody tr').each(function() {
						columnGroups[i].push(jQuery(this).find('td').eq(i).text());
					});
				}
				return columnGroups;
			}
		}
		
		// Useful variables for accessing table data		
		chartData = tableData.chartData();		
		chartYMax = tableData.chartYMax();
		columnGroups = tableData.columnGroups();
		
		// Construct the graph
		
		// Loop through column groups, adding bars as we go
		$.each(columnGroups, function(i) {
			// Create bar group container
			var barGroup = jQuery('<div class="bar-group"></div>');
			// Add bars inside each column
			for (var j = 0, k = columnGroups[i].length; j < k; j++) {
				// Create bar object to store properties (label, height, code etc.) and add it to array
				// Set the height later in displayGraph() to allow for left-to-right sequential display
				var barObj = {};
				barObj.label = this[j];
				barObj.height = Math.floor(barObj.label / chartYMax * 100) + '%';
				barObj.bar = jQuery('<div class="bar fig' + j + '"><span>' + barObj.label + '%</span></div>')
					.appendTo(barGroup);
				bars.push(barObj);
			}
			// Add bar groups to graph
			barGroup.appendTo(barContainer);			
		});
		
		// Add heading to graph
		var chartHeading = tableData.chartHeading();
		var heading = jQuery('<h4>' + chartHeading + '</h4>');
		heading.appendTo(figureContainer);
		
		// Add legend to graph
		var chartLegend	= tableData.chartLegend();
		var legendList	= jQuery('<ul class="legend"></ul>');
		$.each(chartLegend, function(i) {			
			var listItem = jQuery('<li><span class="icon fig' + i + '"></span>' + this + '</li>')
				.appendTo(legendList);
		});
		legendList.appendTo(figureContainer);
		
		// Add x-axis to graph
		var xLegend	= tableData.xLegend();		
		var xAxisList	= jQuery('<ul class="x-axis"></ul>');
		$.each(xLegend, function(i) {			
			var listItem = jQuery('<li><span>' + this + '</span></li>')
				.appendTo(xAxisList);
		});
		xAxisList.appendTo(graphContainer);
		
		// Add y-axis to graph	
		var yLegend	= tableData.yLegend();
		var yAxisList	= jQuery('<ul class="y-axis"></ul>');
		$.each(yLegend, function(i) {			
			var listItem = jQuery('<li><span>' + this + '%</span></li>')
				.appendTo(yAxisList);
		});
		yAxisList.appendTo(graphContainer);		
		
		// Add bars to graph
		barContainer.appendTo(graphContainer);		
		
		// Add graph to graph container		
		graphContainer.appendTo(figureContainer);
		
		// Add graph container to main container
		figureContainer.appendTo(container);
		
		// Set individual height of bars
		function displayGraph(bars, i) {		
			// Changed the way we loop because of issues with $.each not resetting properly
			if (i < bars.length) {
				// Animate height using jQuery animate() function
				jQuery(bars[i].bar).animate({
					height: bars[i].height
				}, 800);
				// Wait the specified time then run the displayGraph() function again for the next bar
				barTimer = setTimeout(function() {
					i++;				
					displayGraph(bars, i);
				}, 100);
			}
		}
		
		// Reset graph settings and prepare for display
		function resetGraph() {
			// Stop all animations and set bar height to 0
			$.each(bars, function(i) {
				jQuery(bars[i].bar).stop().css('height', 0);
			});
			
			// Clear timers
			clearTimeout(barTimer);
			clearTimeout(graphTimer);
			
			// Restart timer		
			graphTimer = setTimeout(function() {		
				displayGraph(bars, 0);
			}, 200);
		}
		
		// Helper functions
		
		// Call resetGraph() when button is clicked to start graph over
		jQuery('#reset-graph-button').click(function() {
			resetGraph();
			return false;
		});
		
		// Finally, display graph via reset function
		resetGraph();
	}	
});







// tabs open with click on another page
window.onload = function(){  

  var url = document.location.toString();
  if (url.match('#')) {
    jQuery('.nav-item a[href="#' + url.split('#')[1] + '"]').tab('show');
  }
  //Change hash for page-reload
  jQuery('.nav-item a[href="#' + url.split('#')[1] + '"]').on('shown', function (e) {
      window.location.hash = e.target.hash;
  }); 
}

jQuery(function() {
  let url = location.href.replace(/\/$/, "");
 
    const hash = url.split("#");
    
    jQuery('#pills-tab a[href="#'+hash[1]+'"]').tab("show");
    url = location.href.replace(/\/#/, "#");
    history.replaceState(null, null, url);
    setTimeout(() => {
      jQuery(window).scrollTop(0);
    }, 400);
   
  jQuery('a[data-toggle="pill"]').on("click", function() {
    let newUrl;
    const hash = jQuery(this).attr("href");
    console.log('check2' ,hash);
    if(hash == "#info-tab") {
      newUrl = url.split("#")[0];
    } else {
      newUrl = url.split("#")[0] + hash;
    }
    newUrl;
    history.replaceState(null, null, newUrl);
  });
});


// 2 tabs click show one tab content  

jQuery('.nav-pills li a').on('click',function (e) {     
  //get selected href
  var href = jQuery(this).attr('href');
  
  // show tab for all tabs that match href
  jQuery('.nav-pills li a[href="' + href + '"]').tab('show');
})



jQuery('.cta').on('click', function(){	
    
  jQuery(this).removeClass( "active");

  jQuery(this).removeClass( "show");

  //jQuery(this).parents('.nav li a').eq(5).addClass( "active");
//jQuery(this).parents('.nav li a').addClass( "show");
});

jQuery('a[data-toggle="pill"]').on('shown.bs.tab', function (e) {
 
  var hashValue = jQuery(e.target).attr('href');

  
  jQuery("#info-tab").removeClass("active");
  jQuery("#ad-info-tab").removeClass("active");
  jQuery("#pricing-tab").removeClass("active");
  jQuery("#seo-tab").removeClass("active");
  jQuery(hashValue+"-tab").addClass("active");
  
 
  
})



///////////////// selected module
function myselect() {
  var sel = document.getElementById('slc');
  console.log('value', sel.value)
   /// show and hide div on the click by value basis
   jQuery(`#${sel.value}`).css("display", "block");

}


function mysizeSelect(){
  var selectedSize = [];
  var selectedColor = [];
  jQuery('#table-show').empty()
  for (var option of document.getElementById('sizeSelect').options) {
    if (option.selected) {
      selectedSize.push(option.value);
    }
  }
 
  for (var option of document.getElementById('selectColor').options) {
    if (option.selected) {
      selectedColor.push(option.value);
    }
  }

  combos = [] //or combos = new Array(2);
 if(selectedColor.length>=1 && selectedSize.length==0) {
  for(var j = 0; j < selectedColor.length; j++)
  {
    let obj = {
      color : selectedColor[j],
      size: ''
    }
    combos.push(obj)
 }
}
 else
  if(selectedSize.length>=1 && selectedColor.length==0){
    for(var i = 0; i < selectedSize.length ; i++)
    {
    let obj = {
      color : '',
      size: selectedSize[i],
    }
    combos.push(obj)
  }
}
 else{

  combos=[]
  for(var i = 0; i < selectedSize.length ; i++)
  {
       for(var j = 0; j < selectedColor.length; j++)
       {
          //you would access the element of the array as array1[i] and array2[j]
          //create and array with as many elements as the number of arrays you are to combine
          //add them in
          //you could have as many dimensions as you need
         
          let obj = {
            color : selectedColor[j],
            size: selectedSize[i]
          }
          combos.push(obj)
       }
  }
}
  // var sel = document.getElementById('sizeSelect');
   console.log('sizeSelect value', selectedSize)
   console.log('sizeSelect selectedColor', selectedColor)
   console.log('combos', combos)

   combos.forEach(function(elem){
    jQuery('#table-show').css('display', 'block')
    
    jQuery('#table-show').append('<tr class="row m-0 text-center"><td  class="col-2"> '+ elem.color+'</td><td class="col-2">'+ elem.size+'</td><td class="col-3 d-flex justify-content-center"><input type="text" class="form-control w-150px text-center" id="disabledInput" placeholder="'+ elem.color+ "-" +elem.size +'" disabled=""></td><td class="col-2"><img src="./assets/images/carousel/slide1.jpg" class="h-45px w-45px img-fluid" alt="img"></td><td class="col-3 d-flex justify-content-center"><input type="text" class="form-control w-150px text-center" id="disabledInput" placeholder="Credit Card" disabled=""></td></tr>')
});
}

jQuery('#remove-s').on("click", function(e){
  jQuery('#Size').css("display", "none");
});
jQuery('#remove-c').on("click", function(e){
  jQuery('#Color').css("display", "none");
});
/////////////////////////////////////////////////

jQuery('.thumbnail .detail-link').on('click', function(){	
  console.log("aa")
  jQuery(this).parent(".thumbnail").toggleClass("active");
}); 
jQuery('.selectall').on('click', function(){	
  jQuery('.thumbnail .detail-link').parent().addClass( "active");
}); 
jQuery('.unselectall').on('click', function(){	
  console.log("aa")
  jQuery('.thumbnail .detail-link').parent().removeClass( "active");
}); 
jQuery("#checkbox1").on('click', function(){	

  if(jQuery(this).is(":checked")) {
    jQuery('.changeme').html('UnSelect All');
    jQuery('.thumbnail .detail-link').parent().addClass( "active");


  } else {
    jQuery('.thumbnail .detail-link').parent().removeClass( "active");
    jQuery('.changeme').html('Select All <small class="text-muted">(1 Item Selected)</small>');
  }
  var checked = jQuery('input', this).is(':checked');
  jQuery('span', this).text(checked ? 'Off' : 'On');
  
});




  
jQuery(document).ready(function(){
  jQuery(".loadingmore").slice(0, 12).show();
  console.log( jQuery(".loadingmore").slice(0, 12).show().length);
  var getnumber = document.getElementById('numbering').innerHTML;
 console.log(getnumber);
  var totalgetnumber =jQuery(".loadingmore").length
  document.getElementById('totalnumber').innerHTML=totalgetnumber;
  console.log(totalgetnumber);
  
  jQuery("#loadMore").on("click", function(e){
  e.preventDefault();
  jQuery(".loadingmore:hidden").slice(0, 6).slideDown();
   getnumber= parseInt(getnumber)+6;
   document.getElementById("numbering").innerHTML=getnumber;
 
  if(jQuery(".loadingmore:hidden").length == 0) {
      jQuery("#loadMore").text("No Content").addClass("noContent");
  }
});

});

jQuery(document).ready(function() {
  jQuery(".pin-click").click(function(e) {
    var id = jQuery(this).attr('id');
    console.log(id)
     var pin_not =    jQuery(`#${id} .pin-fixnot.dis-block`)
     var pin =    jQuery(`#${id} .pin.dis-block`)
     console.log("hdjhsj", pin_not.length)
     console.log("pin", pin.length)
    if(pin_not.length == 1){
      jQuery(`#${id} .pin-fixnot`).removeClass('dis-block');
      jQuery(`#${id} .pin-fixnot`).addClass('dis-none');
      jQuery(`#${id} .pin`).addClass("dis-block border-bottoms");
      jQuery(`#${id} .pin`).removeClass("dis-none");
     
    }

    if(pin.length == 1){
      jQuery(`#${id} .pin-fixnot`).addClass('dis-block');
      jQuery(`#${id} .pin-fixnot`).removeClass('dis-none');
      jQuery(`#${id} .pin`).removeClass("dis-block border-bottoms");
      jQuery(`#${id} .pin`).addClass("dis-none ");
    }



  });
  });

jQuery('.pin-fix').on('click', function(){
  jQuery('.pin-fix').hide();
  jQuery('.pin-fixnot').show();
  jQuery('.pincard .card-body').removeClass("border-bottoms");
});



jQuery('.linkclick').on('click', function(){	
  console.log("aa")
  jQuery('.selectpage').removeClass('active');
  jQuery(this).parent(".selectpage").addClass("active");
}); 










const counters = document.querySelectorAll('.counter');
const speed = 200; // The lower the slower

counters.forEach(counter => {
	const updateCount = () => {
		const target = +counter.getAttribute('data-target');
		const count = +counter.innerText;

		// Lower inc to slow and higher to slow
		const inc = target / speed;

		// console.log(inc);
		// console.log(count);

		// Check if target is reached
		if (count < target) {
			// Add inc to count and output in counter
			counter.innerText = count + inc;
			// Call function every ms
			setTimeout(updateCount, 1);
		} else {
			counter.innerText = target;
		}
	};

	updateCount();
});




/* Get the documentElement (<html>) to display the page in fullscreen */
var elem = document.documentElement;

/* View in fullscreen */
function openFullscreen() {
    jQuery('#kt_open_fullscreen').hide();
    jQuery('#kt_close_fullscreen').show();
    if (elem.requestFullscreen) {
      elem.requestFullscreen();
    } else if (elem.mozRequestFullScreen) { /* Firefox */
      elem.mozRequestFullScreen();
    } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari and Opera */
      elem.webkitRequestFullscreen();
    } else if (elem.msRequestFullscreen) { /* IE/Edge */
      elem.msRequestFullscreen();
    }
    
  
    
}


/* Close fullscreen */
function closeFullscreen() {
    jQuery('#kt_close_fullscreen').hide();
    jQuery('#kt_open_fullscreen').show();
    if (document.exitFullscreen) {
      document.exitFullscreen();
    } else if (document.mozCancelFullScreen) { /* Firefox */
      document.mozCancelFullScreen();
    } else if (document.webkitExitFullscreen) { /* Chrome, Safari and Opera */
      document.webkitExitFullscreen();
    } else if (document.msExitFullscreen) { /* IE/Edge */
      document.msExitFullscreen();
    }
  }



  (function ($){

    $.fn.bekeyProgressbar = function(options){
  
        options = $.extend({
          animate     : true,
          animateText : true
        }, options);
  
        var $this = jQuery(this);
      
        var $progressBar = $this;
        var $progressCount = $progressBar.find('.ProgressBar-percentage--count');
        var $circle = $progressBar.find('.ProgressBar-circle');
        var percentageProgress = $progressBar.attr('data-progress');
        var percentageRemaining = (100 - percentageProgress);
        var percentageText = $progressCount.parent().attr('data-progress');
      
        //Calcule la circonfÃ©rence du cercle
        var radius = $circle.attr('r');
        var diameter = radius * 2;
        var circumference = Math.round(Math.PI * diameter);
  
        //Calcule le pourcentage d'avancement
        var percentage =  circumference * percentageRemaining / 100;
  
        $circle.css({
          'stroke-dasharray' : circumference,
          'stroke-dashoffset' : percentage
        })
        
        //Animation de la barre de progression
        if(options.animate === true){
          $circle.css({
            'stroke-dashoffset' : circumference
          }).animate({
            'stroke-dashoffset' : percentage
          }, 3000 )
        }
        
        //Animation du texte (pourcentage)
        if(options.animateText == true){
  
          jQuery({ Counter: 0 }).animate(
            { Counter: percentageText },
            { duration: 3000,
             step: function () {
               $progressCount.text( Math.ceil(this.Counter) + '%');
             }
            });
  
        }else{
          $progressCount.text( percentageText + '%');
        }
      
    };
  
  })(jQuery);
  
  jQuery(document).ready(function(){
  
    jQuery('.ProgressBar--animateNone').bekeyProgressbar({
    animate : false,
    animateText : false
  });
  
  jQuery('.ProgressBar--animateCircle').bekeyProgressbar({
    animate : true,
    animateText : false
  });
  
  jQuery('.ProgressBar--animateText').bekeyProgressbar({
    animate : false,
    animateText : true
  });
  
  jQuery('.ProgressBar--animateAll').bekeyProgressbar();
  
  })
  jQuery( document ).ready(function() {
    setInterval(function time(){
    var d = new Date();
      var days = 365 - d.getDay();
    var hours = 24 - d.getHours();
    var min = 60 - d.getMinutes();
    if((min + '').length == 1){
      min = '0' + min;
    }
    var sec = 60 - d.getSeconds();
    if((sec + '').length == 1){
          sec = '0' + sec;
    }
    jQuery('.countdown2 .days').html(days+"<small>d</small>");
    jQuery('.countdown2 .hours').html(hours+"<small>h</small>");
    jQuery('.countdown2 .mintues').html(min+"<small>m</small>");
    jQuery('.countdown2 .seconds').html(sec+"<small>s</small>");
  }, 1000); });




















// Custom for pacejs
paceOptions = {
  elements: true
};
var input = document.getElementById('input'), // input/output button
  number = document.querySelectorAll('.numbers div'), // number buttons
  operator = document.querySelectorAll('.operators div'), // operator buttons
  result = document.getElementById('result'), // equal button
  clear = document.getElementById('clear'), // clear button
  resultDisplayed = false; // flag to keep an eye on what output is displayed

// adding click handlers to number buttons
for (var i = 0; i < number.length; i++) {
  number[i].addEventListener("click", function(e) {

    // storing current input string and its last character in variables - used later
    var currentString = input.innerHTML;
    var lastChar = currentString[currentString.length - 1];

    // if result is not diplayed, just keep adding
    if (resultDisplayed === false) {
      input.innerHTML += e.target.innerHTML;
    } else if (resultDisplayed === true && lastChar === "+" || lastChar === "-" || lastChar === "Ã—" || lastChar === "Ã·") {
      // if result is currently displayed and user pressed an operator
      // we need to keep on adding to the string for next operation
      resultDisplayed = false;
      input.innerHTML += e.target.innerHTML;
    } else {
      // if result is currently displayed and user pressed a number
      // we need clear the input string and add the new input to start the new opration
      resultDisplayed = false;
      input.innerHTML = "";
      input.innerHTML += e.target.innerHTML;
    }

  });
}

// adding click handlers to number buttons
for (var i = 0; i < operator.length; i++) {
  operator[i].addEventListener("click", function(e) {

    // storing current input string and its last character in variables - used later
    var currentString = input.innerHTML;
    var lastChar = currentString[currentString.length - 1];

    // if last character entered is an operator, replace it with the currently pressed one
    if (lastChar === "+" || lastChar === "-" || lastChar === "Ã—" || lastChar === "Ã·") {
      var newString = currentString.substring(0, currentString.length - 1) + e.target.innerHTML;
      input.innerHTML = newString;
    } else if (currentString.length == 0) {
      // if first key pressed is an opearator, don't do anything
      console.log("enter a number first");
    } else {
      // else just add the operator pressed to the input
      input.innerHTML += e.target.innerHTML;
    }

  });
}

// on click of 'equal' button
result.addEventListener("click", function() {

  // this is the string that we will be processing eg. -10+26+33-56*34/23
  var inputString = input.innerHTML;

  // forming an array of numbers. eg for above string it will be: numbers = ["10", "26", "33", "56", "34", "23"]
  var numbers = inputString.split(/\+|\-|\Ã—|\Ã·/g);

  // forming an array of operators. for above string it will be: operators = ["+", "+", "-", "*", "/"]
  // first we replace all the numbers and dot with empty string and then split
  var operators = inputString.replace(/[0-9]|\./g, "").split("");

  console.log(inputString);
  console.log(operators);
  console.log(numbers);
  console.log("----------------------------");

  // now we are looping through the array and doing one operation at a time.
  // first divide, then multiply, then subtraction and then addition
  // as we move we are alterning the original numbers and operators array
  // the final element remaining in the array will be the output

  var divide = operators.indexOf("Ã·");
  while (divide != -1) {
    numbers.splice(divide, 2, numbers[divide] / numbers[divide + 1]);
    operators.splice(divide, 1);
    divide = operators.indexOf("Ã·");
  }

  var multiply = operators.indexOf("Ã—");
  while (multiply != -1) {
    numbers.splice(multiply, 2, numbers[multiply] * numbers[multiply + 1]);
    operators.splice(multiply, 1);
    multiply = operators.indexOf("Ã—");
  }

  var subtract = operators.indexOf("-");
  while (subtract != -1) {
    numbers.splice(subtract, 2, numbers[subtract] - numbers[subtract + 1]);
    operators.splice(subtract, 1);
    subtract = operators.indexOf("-");
  }

  var add = operators.indexOf("+");
  while (add != -1) {
    // using parseFloat is necessary, otherwise it will result in string concatenation :)
    numbers.splice(add, 2, parseFloat(numbers[add]) + parseFloat(numbers[add + 1]));
    operators.splice(add, 1);
    add = operators.indexOf("+");
  }

  input.innerHTML = numbers[0]; // displaying the output

  resultDisplayed = true; // turning flag if result is displayed
});

// clearing the input on press of clear
clear.addEventListener("click", function() {
  input.innerHTML = "";
})


// for classic Editor
ClassicEditor
.create( document.querySelector( '#editor' ),{
    toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ],
    alignment: {
      options: [ 'left', 'right' ]
    }
})

.catch( error => {
    console.error( error );
});

ClassicEditor
.create( document.querySelector( '#editor3' ),{
    toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ],
    alignment: {
      options: [ 'left', 'right' ]
    }
})

.catch( error => {
    console.error( error );
});

InlineEditor
.create( document.querySelector( '#editor2' ) )
.catch( error => {
    console.error( error );
} );

