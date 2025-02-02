(function($) {
	
	'use strict';
	
	// Extend core script
	$.extend($.nmTheme, {
		
		/**
		 *	Initialize scripts
		 */
		blog_init: function() {
			var self = this;
            
            self.$blogList = $('#nm-blog-list');
            
            
            // Bind: Categories toggle link
			$('#nm-blog-categories-toggle-link').on('click', function(e) {
				e.preventDefault();
				
				var $thisLink = $(this);
				
				$('#nm-blog-categories-list').slideToggle(200, function() {
					var $this = $(this);
					
					$thisLink.toggleClass('active');
					
					if (!$thisLink.hasClass('active')) {
						$this.css('display', '');
					}
				});
			});
            
            
            /* Masonry grid */
            self.$window.on('load', function() {
				if (self.$pageIncludes.hasClass('blog-masonry')) {
					var $blogUl = $('#nm-blog-list');
				    
                    // Initialize Masonry
                    $blogUl.masonry({
                        itemSelector: '.post',
                        gutter: 0,
                        // Disable animation when adding items
                        hiddenStyle: {},
                        visibleStyle: {}
                    });
				}
            });
            
            
            if (self.$blogList) {
                // Bind: Infinite load
                self.blogInfLoadBind();
            }
		},
		
        
        /**
		 *	Blog: Infinite load - Bind
		 */
		blogInfLoadBind: function() {
            var self = this;
            
            self.$blogPaginationWrap = $('#nm-blog-pagination');
            self.$blogInfLoadWrap = $('#nm-blog-infinite-load');
            
			if (self.$blogInfLoadWrap.length) {
                self.$blogInfLoadLink = self.$blogInfLoadWrap.children('a');
                self.infloadScroll = (self.$blogPaginationWrap.hasClass('scroll-mode')) ? true : false;
                
                if (self.infloadScroll) {
                    self.infscrollLock = false;

                    var pxFromWindowBottomToBottom,
                        pxFromMenuToBottom = Math.round(self.$document.height() - self.$blogPaginationWrap.offset().top),
                        bufferPx = parseInt(nm_wp_vars.infloadBufferBlog);

                    /* Bind: Window resize event to re-calculate the 'pxFromMenuToBottom' value (so the items load at the correct scroll-position) */
                    var to = null;
                    self.$window.off('resize.nmBlogInfLoad').on('resize.nmBlogInfLoad', function() {
                        if (to) { clearTimeout(to); }
                        to = setTimeout(function() {
                            var $infloadControls = $('#nm-blog-infinite-load'); // Note: Don't cache, element is dynamic
                            if ($infloadControls.length) {
                                pxFromMenuToBottom = Math.round(self.$document.height() - $infloadControls.offset().top);
                            }
                        }, 100);
                    });

                    /* Bind: Window scroll event */
                    self.$window.off('smartscroll.blogInfScroll').on('smartscroll.blogInfScroll', function() {
                        if (self.infscrollLock) {
                            return;
                        }

                        pxFromWindowBottomToBottom = 0 + self.$document.height() - (self.$window.scrollTop()) - self.$window.height();

                        // If distance remaining in the scroll (including buffer) is less than the pagination element to bottom:
                        if ((pxFromWindowBottomToBottom - bufferPx) < pxFromMenuToBottom) {
                            self.blogInfLoadGetPage();
                        }
                    });
                } else {
                    /* Bind: "Load" button */
                    self.$blogInfLoadLink.on('click', function(e) {
                        e.preventDefault();
                        self.blogInfLoadGetPage();
                    });
                }
            }
        },
        
		
		/**
		 *	Blog: Infinite load -  Get next page
		 */
		blogInfLoadGetPage: function() {
			var self = this;
			
			if (self.blogAjax) { return false; }
			
			// Get next blog-page URL
			var nextPageUrl = self.$blogInfLoadLink.attr('href');
            
			if (nextPageUrl) {
				// Show 'loader'
				self.$blogPaginationWrap.addClass('loading nm-loader');
                
                // Add/update the 'blog_load=1' query parameter to the page URL
				// Note: Don't use the 'data' setting in the '$.ajax' function below or the query will be appended, not updated (if 'blog_load' is added to the URL)
                nextPageUrl = self.updateUrlParameter(nextPageUrl, 'blog_load', '1');
                
                self.$document.trigger('nm_blog_infload_before', nextPageUrl);
                
				self.blogAjax = $.ajax({
					url: nextPageUrl,
                    dataType: 'html',
					cache: false,
					headers: {'cache-control': 'no-cache'},
					method: 'GET',
					error: function(XMLHttpRequest, textStatus, errorThrown) {
                        // Hide 'loader'
						self.$blogPaginationWrap.removeClass('loading nm-loader');
                        
						console.log('NM: AJAX error - blogInfLoadGetPage() - ' + errorThrown);
					},
					success: function(response) {
						var $response = $('<div>' + response + '</div>'), // Wrap the returned HTML string in a dummy 'div' element we can get the elements
							$newElements = $response.find('#nm-blog-list').children();
                        
                        // Hide new elements before they're added
                        $newElements.addClass('fade-out');
						
                        // Masonry: Position new elements
                        if (self.$pageIncludes.hasClass('blog-masonry')) {
                            var $newImages = $newElements.find('img'),
                                $lastNewImage = $newImages.last();
                            
                            // Remove loading="lazy" attribute so the "load" event below works
                            $newImages.removeAttr('loading');
                            
                            // Continue after last image has loaded to prevent incorrect height
                            $lastNewImage.on('load', function() {
                                self.$blogList.masonry('appended', $newElements);
                                
                                self.blogInfLoadPrepButton($response);
                                
                                self.$document.trigger('nm_blog_infload_after', $newElements);
                                
                                setTimeout(function() {
                                    // Show new elements
                                    $newElements.removeClass('fade-out');
                                    
                                    if (self.infloadScroll) {
                                        self.$window.trigger('scroll'); // Trigger 'scroll' in case the pagination element (+buffer) is still above the window bottom
                                    }
                                    
                                    self.blogAjax = false;
                                }, 300);
                            });
                            
                            // Append new elements
                            self.$blogList.append($newElements);
                        } else {
                            // Append new elements
				            self.$blogList.append($newElements);
                            
                            self.blogInfLoadPrepButton($response);
                            
                            self.$document.trigger('nm_blog_infload_after', $newElements);
                            
                            setTimeout(function() {
                                // Show new elements
                                $newElements.removeClass('fade-out');
                                
                                if (self.infloadScroll) {
                                    self.$window.trigger('scroll'); // Trigger 'scroll' in case the pagination element (+buffer) is still above the window bottom
                                }
                                
                                self.blogAjax = false;
                            }, 300);
                        }
					}
				});
			} else {
                if (self.infloadScroll) {
					self.infscrollLock = true; // "Lock" scroll (no more products/pages)
				}
            }
		},
        
        
        /**
		 *	Blog: Infinite load - Prep "load" button
		 */
		blogInfLoadPrepButton: function($response) {
            var self = this,
                nextPageUrl = $response.find('#nm-blog-infinite-load').children('a').attr('href');
            
            if (nextPageUrl) {
                self.$blogInfLoadLink.attr('href', nextPageUrl);
                
                // Hide "loader"
                self.$blogPaginationWrap.removeClass('loading nm-loader');
            } else {
                // Hide "load" button (no more products/pages)
                self.$blogPaginationWrap.addClass('all-pages-loaded');
                
                if (self.infloadScroll) {
                    self.infscrollLock = true; // "Lock" scroll (no more products/pages)
                }
            }
        }
		
	});
	
	// Add extension so it can be called from $.nmThemeExtensions
	$.nmThemeExtensions.blog = $.nmTheme.blog_init;
	
})(jQuery);
