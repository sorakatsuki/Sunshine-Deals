/*! 
* jQuery Countdown Timer 1.2 Plugin
* Copyright 2011 Tom Ellis http://www.webmuse.co.uk
* Licensed under MIT License
* See http://www.webmuse.co.uk/license/
*/
(function($) {
   
	$.fn.countdown = function( options ) {  
	
		var defaults = {
				date: new Date(),
				updateTime: 1000,
				htmlTemplate: "<h2>%{d} <span class=\"cd-time\">Days</span> %{h}:%{m}:%{s}</h2>",
				minus: false,
				onChange: null,
				onComplete: null,
				leadingZero: true
			},
			opts = {},
			rDate = /(%\{d\}|%\{h\}|%\{m\}|%\{s\})/g,
			rDays = /%\{d\}/,
			rMonths = /%\{mo\}/,
			rHours = /%\{h\}/,
			rMins = /%\{m\}/,
			rSecs = /%\{s\}/,
			complete = false,
			template,
			floor = Math.floor,
			onChange = null,
			onComplete = null;
		   
		$.extend( opts, defaults, options );
		
		template = opts.htmlTemplate;
		
		return this.each(function() {
		
			var $this = $(this),
				timer,
				TodaysDate = new Date(),
				CountdownDate = new Date( opts.date ),
				msPerDay = 864E5, //24 * 60 * 60 * 1000
				timeLeft = CountdownDate.getTime() - TodaysDate.getTime(),
				e_daysLeft = timeLeft / msPerDay,
				totalDaysLeft = floor(e_daysLeft),
				daysLeft = floor(e_daysLeft % 30),
				daysLeft = totalDaysLeft,
				e_monthsLeft = totalDaysLeft / 30,
				monthsLeft = floor(e_monthsLeft),
				e_hrsLeft = (e_daysLeft - totalDaysLeft)*24, //Gets remainder and * 24
				hrsLeft = floor(e_hrsLeft),
				minsLeft = floor((e_hrsLeft - hrsLeft)*60),					
				e_minsleft = (e_hrsLeft - hrsLeft)*60, //Gets remainder and * 60
				secLeft = floor((e_minsleft - minsLeft)*60),
				time = "";

			if( opts.onChange){
				$this.bind("change", opts.onChange);
			}
			
			if( opts.onComplete ){
				$this.bind("complete", opts.onComplete);
			}
			
			if ( opts.leadingZero ) {
				
				if ( minsLeft < 10) {
					minsLeft = "0" + minsLeft;
				}
				
				if ( secLeft < 10) {
					secLeft = "0" + secLeft;
				}
			}

			//Set initial time
			if ( TodaysDate <= CountdownDate || opts.minus ) {
				time = template.replace( rMonths, monthsLeft ).replace( rDays, daysLeft ).replace( rHours, hrsLeft ).replace( rMins, minsLeft ).replace(rSecs, secLeft);
			} else {
				time = template.replace( rDate, "00");
				complete = true;
			}
							
			timer = window.setInterval(function(){
				
				TodaysDate = new Date(),
				CountdownDate = new Date( opts.date ),
				msPerDay = 864E5, //24 * 60 * 60 * 1000
				timeLeft = CountdownDate.getTime() - TodaysDate.getTime(),
				e_daysLeft = timeLeft / msPerDay,
				totalDaysLeft = floor(e_daysLeft),
				daysLeft = floor(e_daysLeft % 30),
				daysLeft = totalDaysLeft,
				e_monthsLeft = totalDaysLeft / 30,
				monthsLeft = floor(e_monthsLeft),
				e_hrsLeft = (e_daysLeft - totalDaysLeft)*24, //Gets remainder and * 24
				hrsLeft = floor(e_hrsLeft),
				minsLeft = floor((e_hrsLeft - hrsLeft)*60),					
				e_minsleft = (e_hrsLeft - hrsLeft)*60, //Gets remainder and * 60
				secLeft = floor((e_minsleft - minsLeft)*60),
				time = "";
				
				if ( opts.leadingZero ) {
					
					if ( minsLeft < 10) {
						minsLeft = "0" + minsLeft;
					}
					
					if ( secLeft < 10) {
						secLeft = "0" + secLeft;
					}
				}

				if ( TodaysDate <= CountdownDate || opts.minus ) {
					time = template.replace( rMonths, monthsLeft ).replace( rDays, daysLeft ).replace( rHours, hrsLeft ).replace( rMins, minsLeft ).replace(rSecs, secLeft);
				} else {
					time = template.replace( rDate, "00");
					complete = true;
				}
								
				$this.html( time );
				
				$this.trigger('change', [timer] );
			    
				if ( complete ){

					$this.trigger('complete');
					clearInterval( timer );
				}       		
			
			}, opts.updateTime);


		    $this.html( time );
			
			if ( complete ){
				$this.trigger('complete');
				clearInterval( timer );
			}
			
		});
	};
       
})(jQuery);