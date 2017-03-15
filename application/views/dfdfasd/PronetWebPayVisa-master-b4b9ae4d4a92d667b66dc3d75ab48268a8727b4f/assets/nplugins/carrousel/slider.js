(function (jQuery) {
    
    'use strict';
    
    jQuery.fn.fullWidth = function (options) {
        
        var defaults = {
            maxHeight   	:    450,
            minHeight   	:    375,
            delay       	:    5000,
            transition  	:    1000,
            maxFont     	:    36,
            minFont     	:    20
        }, settings = jQuery.extend(defaults, options),
		cssTrans = (function() {
		   var s = document.createElement('p').style;
		   
		   return 'transition' in s ||
		   		  'WebkitTransition' in s ||
				  'MozTransition' in s ||
				  'msTransition' in s ||
				  'OTransition' in s;
        }());
		
        return this.each( function() {
         
            var jQueryfull    	=    jQuery(this),
            	jQueryinner      =    jQueryfull.find('.inner'),
            	jQueryslides     =    jQueryinner.find('.slide'),
            	jQueryimages     =    jQueryslides.find('img'),
            	jQuerynav        =    jQueryfull.find('.slide-nav'),
            	jQuerycontrols   =    jQueryfull.find('.controls a'),
            	jQuerynavCircles =    '',
            	smallest    =    9999,
            	status      =    {current : 0, previous : 0, max : jQueryslides.length - 1},
            	timers      =    {slides : '', resize : ''},
            
            move = function(direction, current){
                if(jQueryinner.is(':animated')) return;
            
                stop();
             
                status.previous = status.current;
            
                if(direction === 'right'){
                    status.current = status.current + 1 > status.max ? 0 : status.current+1;
                }else if(direction === 'left'){
                    status.current = status.current - 1 < 0 ? status.max : status.current-1;
                }else{
                    status.current = current || 0;
                }
             
                jQuerynavCircles.removeClass('current').eq(status.current).addClass('current');
                jQueryfull.trigger( 'fws.start', { 'status' : status, 'direction' : direction } );
				
                if(cssTrans){
                    jQueryinner.css({ 'margin-left' : '-' + 100 * status.current + '%' });
                    setTimeout(start, settings.transition);
                }else{
                    jQueryinner.animate({ 'margin-left' : '-' + 100 * status.current + '%' }, settings.transition, start );
                }
             
            },
            start = function(){
                jQueryfull.trigger( 'fws.finish', { 'status' : status } );
                timers.slides = setTimeout(function(){ move('right'); }, settings.delay);
            },
            stop = function(){
                clearTimeout(timers.slides);
            },
            resize = function(){
                
                var jQuerywWidth		=    jQuery(window).width(),
                	newHeight   =    parseInt(jQuerywWidth/3, 10),
                	imageCSS    =    jQuerywWidth <= smallest ? ['100%', 'auto', '9999'] : ['', '', ''],
                	start       =    jQueryinner.height(),
                	divCSS      =    jQuerywWidth <= 480 ? ['0', '100%', 'none'] : ['', '', ''],
                	size        =    jQuerywWidth/41;
                /*
                size equals window width divided by 41. 41 was chosen as it creates a nicely proportionate font size.
                However, you can experiment with this if you want a generally larger or smaller size to be set.
                For example: a width of 960px/41 = 23.4px, with 20 instead of 41 you'd get a font size of 48px.
                It really depends on what kind of content you're displaying and how much text you've got on each slide.
                */    
                
                size = size > settings.maxFont ? settings.maxFont : 
                            (size < settings.minFont ? settings.minFont : size);

                jQueryinner.css('height', function(){
                    return newHeight > settings.maxHeight ? settings.maxHeight : 
                            (newHeight < settings.minHeight ? settings.minHeight : newHeight);
                });

                jQueryimages.css({
                    'margin-top' : function(){
                        var curr = jQuery(this).height();
                        return '-' + (start > curr ? 0 : curr-start) / 2 + 'px';
                    },
                    'height'	: imageCSS[0],
					'width' 	: imageCSS[1],
					'maxWidth'  : imageCSS[2]
                });

                jQueryslides.find('div').css({
                    'font-size' : size, 
                    'top' : function(){
                        var diff = start - jQuery(this).height();
                        return jQuerywWidth <= 480 ? diff : diff/2;
                    },
                    'padding' 	: divCSS[0],
					'width'		: divCSS[1]
                }).find('br').css('display', divCSS[2]);
                
            },
            attachEvents = function(){
            
                jQuery(window).resize(function(){
                    clearTimeout(timers.resize);
                    timers.resize = setTimeout(resize, 100);
                }).trigger('resize');
                
                jQuerycontrols.on('click', function(){
                    move(this.className); 
                    return false;
                });
                
                jQueryfull.on('mouseenter mouseleave', function(e){
					
                    if( jQuerycontrols.is(':animated') ) return;
                    
					if( e.type === 'mouseenter' ){
						jQuerycontrols.fadeIn(); 
					}else{
						jQuerycontrols.fadeOut();
					}
                });
                
                jQuerynavCircles.on('click', function(){
                    move('direct', jQuery(this).index());
                });
                
                jQuery(document).on('keydown', function(e){
                    if(!(e.which === 37 || e.which === 39)) return; 
                    move(e.which === 37 ? 'left' : 'right');
                });
    
            };
        
            (function(){
                
                jQueryimages.each(function(){
                    var w = jQuery(this).attr('width');
                    smallest = w < smallest ? w : smallest;
                });
                
                jQueryslides.css('width', parseFloat(100/jQueryslides.length, 10)+'%')
                      .each(function(i){
                          jQuery(this).addClass('slide-'+(i+1));
                          jQuerynav.append('<span>&bull;</span>');
                      }).find('div').wrapInner('<p />');
                
                jQueryinner.css({
                    height: settings.minHeight,
                    transitionDuration: settings.transition+'ms',
                    width: (jQueryslides.length*100)+'%'
                });
                
                jQuerynavCircles = jQuerynav.find('span');
                jQuerynavCircles.first().addClass('current');
                jQuerynav.css('width', function(){
                    return jQuerynavCircles.length*26;
                });
                
                jQuery(window).load(function() {
                    attachEvents();
                    jQueryfull.trigger( 'fws.start', { 'status' : status, 'direction' : 'direct' } );
                    jQueryinner.fadeTo(1000, 1, start);
                });
            }());
        
        });
    };
     
}(jQuery));