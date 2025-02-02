;(function($) {
    
    "use strict";
    
    $.fn.gauge = function(opts) {

        this.each(function() {
        
            var $this = $(this),
                data  = $this.data();
        
            if (data.gauge) {
                data.gauge.stop();
                delete data.gauge;
            }
            
            if (opts !== false) {
                data.gauge = new Gauge(this).setOptions(opts);
            }
        
        });
      
        return this;
        
    };
    
    $(document).ready( function() {
        
        var data = [],
			totalPoints = 400;
        
        function createMemoryUsage( memory ) {

			if (data.length > 0) {
			    data = data.slice(1);
            }
            
			while (data.length < totalPoints) {

				var prev = data.length > 0 ? data[data.length - 1] : 50,
					y = prev + Math.random() * 10 - 5;

				if (y < ( memory - 5 ) ) {
					y = memory - 4;
				} else if (y > memory) {
					y = memory;
				}

				data.push(y);
			}

			var res = [];
			
            for (var i = 0; i < data.length; ++i) {
				res.push([i, data[i]]);
			}
            
			return res;
            
		}
        
        var flotMemoryUsage = $.plot('#flotMemoryUsage', [ createMemoryUsage( $('#flotMemoryUsage').data('memory-usage') ) ], {
			colors: [$('#flotMemoryUsage').data('memory-status')],
			series: {
				lines: {
					show: true,
					fill: true,
					lineWidth: 1,
					fillColor: {
						colors: [{
							opacity: 0.45
						}, {
							opacity: 1
						}]
					}
				},
				points: {
					show: false
				},
				shadowSize: 1
			},
			grid: {
				borderColor: '#40424b',
				borderWidth: 1,
				labelMargin: 15,
				backgroundColor: '#282D33'
			},
			yaxis: {
				min: 0,
				max: 100,
				color: '#40424b'
			},
			xaxis: {
				show: false
			},
            legend: {
				position: "sw",
				show: true
			},
            
            
		});
        
        function update_memory_chart() {

			flotMemoryUsage.setData([createMemoryUsage( $('#flotMemoryUsage').data('memory-usage') )]);

			flotMemoryUsage.draw();
			setTimeout( update_memory_chart, 20 );
            
		}

		update_memory_chart();
        
        var post_max_size = $('#ut-gauge-post-max-size'),
            
            opts = $.extend(true, {}, {
                lines: 12, 
                angle: 0.12, 
                lineWidth: 0.5,
                pointer: {
                    length: 0.6, 
                    strokeWidth: 0.04, 
                    color: '#E5E5E5'
                },
                limitMax: 'true',
                strokeColor: '#40424b',
                generateGradient: true
            }, post_max_size.data('plugin-options'));

            var ms_gauge = new Gauge(post_max_size.get(0)).setOptions(opts);

        ms_gauge.maxValue = opts.maxValue; 
        ms_gauge.animationSpeed = 32; 
        ms_gauge.set(opts.value);
        
               
        var max_execution = $('#ut-gauge-max-execution'),
            opts = $.extend(true, {}, {
                lines: 12, 
                angle: 0.12, 
                lineWidth: 0.5, 
                pointer: {
                    length: 0.6, 
                    strokeWidth: 0.04, 
                    color: '#E5E5E5' 
                },
                limitMax: 'true', 
                strokeColor: '#40424b', 
                generateGradient: true
            }, max_execution.data('plugin-options'));
    
            var me_gauge = new Gauge(max_execution.get(0)).setOptions(opts);
    
        me_gauge.maxValue = opts.maxValue; 
        me_gauge.animationSpeed = 32; 
        me_gauge.set(opts.value);
        
        
        
        var max_input_vars = $('#ut-gauge-max-input-vars'),
            opts = $.extend(true, {}, {
                lines: 12, 
                angle: 0.12, 
                lineWidth: 0.5, 
                pointer: {
                    length: 0.6, 
                    strokeWidth: 0.04, 
                    color: '#E5E5E5' 
                },
                limitMax: 'true', 
                strokeColor: '#40424b', 
                generateGradient: true
            }, max_input_vars.data('plugin-options'));
    
            var miv_gauge = new Gauge(max_input_vars.get(0)).setOptions(opts);
    
        miv_gauge.maxValue = opts.maxValue; 
        miv_gauge.animationSpeed = 32; 
        miv_gauge.set(opts.value);
        
        
        /* clipboard */
        var clipboard = new Clipboard('.ut-helpdesk-copy-info');
        
        $('.ut-helpdesk-copy-info').click( function(){
            
            $('#ut-system-report-box').toggleClass('ut-hide');
            
            clipboard.on('success', function(e) {
            
                modal({
                    type: 'confirm',
                    title: 'Successfully copied to clipboard',
                    text: 'Report successfully copied to clipboard. Please paste down this report when starting a support inquiry in our supportforum.',
                    buttons: [
                        {
                            addClass: 'ut-ui-button-health'
                        },
                        {
                            addClass: 'ut-ui-button-blue'
                        }
                    ],                    
                    callback: function(result) {
                        
                        if( result === true ) {
                            $('#ut-system-report-box').toggleClass('ut-hide');
                        }
                        
                    }
                    
                });
            
            });
            
            clipboard.on('error', function(e) {
                
                modal({
                    type: 'error',
                    title: 'An error occured while copying to clipboard',
                    text: 'Please manually copy the report. Afterwards please paste down this report when starting a support inquiry in our supportforum.',
                    callback: function(result) {
                        
                        $('#ut-system-report-box').toggleClass('ut-hide');
                        
                    }
                    
                });
                                

            });
            
            
        });
            
        
    });
  
})(jQuery);