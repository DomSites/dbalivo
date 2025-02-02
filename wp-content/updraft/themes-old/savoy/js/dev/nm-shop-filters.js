(function($) {
	
	'use strict';
	
	// Extend core script
	$.extend($.nmTheme, {
		
		/**
		 *	Initialize scripts
		 */
		filters_init: function() {
			var self = this;
			
			/* Shop filters */
			self.$shopFilterMenu = $('#nm-shop-filter-menu');
			self.$shopSidebarPopupBtn = $('#nm-shop-sidebar-popup-button');
            self.shopSidebarLayout = $('#nm-shop-sidebar').data('sidebar-layout'); // Get the sidebar/filters layout
            self.filterPanelSliding = false;
			self.filterPanelSlideSpeed = 200;
			self.filterPanelHideWidth = 551;
			
			/*self.filterScrollbars = (nm_wp_vars.shopFilterScrollbars == '1') ? true : false;
			self.filterScrollbarsLoaded = false;*/
			
			// Shop filters: Toggle function names
			self.shopFilterMenuFnNames = {
				'cat':		'shopFiltersCategoriesToggle',
				'filter':	'shopFiltersSidebarToggle',
				'search':	'shopFiltersSearchToggle'
			};
			
			self.shopFiltersBind();
		},
		
		
		/**
		 *	Shop filters: Bind
		 */
		shopFiltersBind: function() {
			var self = this;
			
			
			/* Bind: Shop filters menu */
			self.$shopFilterMenu.find('a').bind('click', function(e) {
				e.preventDefault();
				
				if (self.filterPanelSliding) { return; }
				
				// Remove any visible shop notices
				self.shopRemoveNotices();
					
				self.filterPanelSliding = true;
				
				var to = 0,
					$this = $(this).parent('li'),
					thisData = $this.data('panel');					
				
				// Hide active panel
				if (!$this.hasClass('active')) {
					to = self.shopFiltersHideActivePanel();
				}
				
				$this.toggleClass('active');
				
				// Use "setTimeout()" to allow the active panel to slide-up first (if open)
				setTimeout(function() {
					var fn = self.shopFilterMenuFnNames[thisData];
					self[fn]();
				}, to);
			});
			
			
			/* Bind: Category menu */
			if (self.filtersEnableAjax && self.$pageIncludes.hasClass('shop_categories')) {
				// Set categories count
				//$('#nm-categories-count').text($('#nm-shop-categories').children().length-1);
				
				self.$shopWrap.on('click', '#nm-shop-categories a',  function(e) {
					e.preventDefault();
					
					var $this = $(this),
						$thisLi = $this.parent('li');					
					
					//if ($thisLi.hasClass('current-cat')) { return; }
										
					// Close search panel (if open)
					if (self.searchEnabled && self.$searchBtn.parent('li').hasClass('active')) {
						self.categoryClicked = true; // Adding this to make sure the shop overlay will not be hidden by the search button click event
						self.$searchBtn.trigger('click');
					}
										
					// Set new "current" class
					$('#nm-shop-categories').children('.current-cat').removeClass('current-cat');
					$thisLi.addClass('current-cat');
					
					self.shopGetPage($this.attr('href'));
				});
			}
            
            
            if (self.$shopSidebarPopupBtn.length) {
                self.$shopSidebarPopup = $('#nm-shop-sidebar-popup');
                
                /* Bind: Filters popup button "scroll" and "resize" events */
                var timer = null;
                self.$window.bind('scroll.nmShopPopupBtn resize.nmShopPopupBtn', function()  {
                    if (timer) { clearTimeout(timer); }
				    timer = setTimeout(function() {
                        if (! self.$body.hasClass('shop-filters-popup-open')) { // Is the filters popup open?
                            self.shopFiltersPopupButtonToggle();
                        }
                    }, 500);
                });
                
                /* Bind: Filters popup menu button */
                self.$shopSidebarPopupBtn.bind('click', function() {
                    self.shopFiltersPopupShow();
                });
                
                /* Bind: Filters popup menu - Reset button */
				$('#nm-shop-sidebar-popup-reset-button').bind('click', function(e) {
					e.preventDefault();
                    self.shopFiltersPopupReset();
				});
            }
			
			
			/* Bind: Sidebar widget headings */
            var shopWidgetAnimateToggle = (self.isTouch) ? false : true,
                shopWidgetResizeEvent = false;
            self.$shopWrap.on('click', '#nm-shop-sidebar .nm-widget-title', function(e) {
				var $widgetLi = $(this).closest('li');
                
                if ($widgetLi.hasClass('show')) {
                    if (shopWidgetAnimateToggle) {
                        $widgetLi.children('.nm-shop-widget-col').last().css('height', '');
                    }
                    
                    $widgetLi.removeClass('show');
                } else {
                    var $openWidgetLi = $widgetLi.parent('#nm-shop-widgets-ul').children('.show');
                    
                    if (shopWidgetAnimateToggle) {
                        var $widgetContentCol = $widgetLi.children('.nm-shop-widget-col').last(),
                            widgetHeight = $widgetContentCol.children().first().outerHeight(true)+'px', // Note: Get/save the height -before- adding the CSS (to make the animations in-sync)
                            $openWidgetContentCol = $openWidgetLi.children('.nm-shop-widget-col').last();
                        
                        $widgetContentCol.css('height', widgetHeight);
                        $openWidgetContentCol.css('height', ''); // Close open widget
                        
                        // Hide open widget on-resize (widget height can change)
                        if (!shopWidgetResizeEvent) {
                            shopWidgetResizeEvent = true;
                            // Bind single "resize" event
                            self.$window.one('resize.nmShopWidget', function() {
                                self.shopFiltersWidgetHideOpen();
                                shopWidgetResizeEvent = false;
                            });
                        }
                    }
                    
                    $openWidgetLi.removeClass('show');
                    $widgetLi.addClass('show');
                }
			});
            
            
			/* Bind: Sidebar widgets */
			if (self.filtersEnableAjax && self.$pageIncludes.hasClass('shop_filters')) {
				/* 
				 *	Bind custom widgets:
				 *	- Sorting
				 *	- Price 
				 *	- Color
				 */
				self.$shopWrap.on('click', '#nm-shop-sidebar .nm_widget a', function(e) {
					e.preventDefault();
					self.shopGetPage($(this).attr('href'));
				});
				
				/* Bind: "WooCommerce Product Categories" widget */
				self.$shopWrap.on('click', '#nm-shop-sidebar .widget_product_categories a', function(e) {
					e.preventDefault();
					self.shopGetPage($(this).attr('href'));
				});
				
				/* Bind: "WooCommerce Layered Nav" widget */
				self.$shopWrap.on('click', '#nm-shop-sidebar .widget_layered_nav a', function(e) {
					e.preventDefault();
					self.shopGetPage($(this).attr('href'));
				});
								
				/* Bind: "WooCommerce Layered Nav (active) Filters" widget */
				self.$shopWrap.on('click', '#nm-shop-sidebar .widget_layered_nav_filters a', function(e) {
					e.preventDefault();
					self.shopGetPage($(this).attr('href'));
				});
								
				/* Bind: "WooCommerce Product Tags" widget */
				self.$shopWrap.on('click', '#nm-shop-sidebar .widget_product_tag_cloud a', function(e) {
					e.preventDefault();
					self.shopGetPage($(this).attr('href'), false, true); // Args: pageUrl, isBackButton, isProductTag
				});
                
                /* Bind: "WooCommerce Average Rating Filter" widget */
                self.$shopWrap.on('click', '#nm-shop-sidebar .widget_rating_filter a', function(e) {
					e.preventDefault();
					self.shopGetPage($(this).attr('href'));
				});
			}
		},
		
		
		/**
		 *	Shop filters: Toggle categories
		 */
		shopFiltersCategoriesToggle: function() {
			var self = this;
			
			$('#nm-shop-categories').slideToggle(self.filterPanelSlideSpeed, function() {
				var $this = $(this);
				
				$this.toggleClass('fade-in');
				if (!$this.hasClass('fade-in')) {
					$this.removeClass('force-show').css('display', '');
				}
				
				self.filterPanelSliding = false;
			});
		},
		
		
		/**
		 *	Shop filters: Reset categories (remove classes and inline style)
		 */
		shopFiltersCategoriesReset: function() {
			$('#nm-shop-categories').removeClass('fade-in force-show').css('display', '');
		},
		
		
		/**
		 *	Shop filters: Toggle sidebar filters/widgets panel
		 */
		shopFiltersSidebarToggle: function() {
			var self = this,
				$shopSidebar = $('#nm-shop-sidebar'),
				isOpen = $shopSidebar.is(':visible');
			
			// Hide filters before sliding-up if sidebar is visible
			if (isOpen) {
				$shopSidebar.removeClass('fade-in');
			}
			
			$shopSidebar.slideToggle(self.filterPanelSlideSpeed, function() {
				// Show filters after sliding-down if sidebar is hidden
				if (!isOpen) {
					$shopSidebar.addClass('fade-in');
				}
				
				self.filterPanelSliding = false;
				
				// Instantiate filter/widget scrollbars
				/*if (self.filterScrollbars && !self.filterScrollbarsLoaded) {
					self.filterScrollbarsInit();
				}*/
			});
		},
        
        
        /**
         *  Shop Filters: Hide open widget (in "accordion" layout)
         */
        shopFiltersWidgetHideOpen: function() {
            var $openWidgetLi = $('#nm-shop-widgets-ul').children('.show');
            if ($openWidgetLi.length) {
                $openWidgetLi.find('.nm-widget-title').trigger('click'); // Hide open widget
            }
        },
		
		
		/**
		 *	Shop filters: Toggle search panel
		 */
		shopFiltersSearchToggle: function() {
			var self = this;
			
			// Toggle panel (code in nm-core)
			self.searchPanelToggle();
			
			// Reset search query
			self.currentSearch = '';
		},
		
		
		/**
		 *	Shop filters: Hide active panel
		 */
		shopFiltersHideActivePanel: function() {
			var self = this,
				to = 0,
				$activeMenu = self.$shopFilterMenu.children('.active');
			
			// Hide active panel
			if ($activeMenu.length) {
				$activeMenu.removeClass('active');
				
				var activeData = $activeMenu.data('panel');
				
				// Categories panel should remain visible, don't "slideToggle"
				if ($activeMenu.is(':hidden') && activeData == 'cat') {
					self.shopFiltersCategoriesReset();
				} else {
					to = 300;
					
					var fn = self.shopFilterMenuFnNames[activeData];
					self[fn]();
				}
			}
			
			// Return timeout
			return to;
		},
        
        
        /**
         *  Shop filters poup: Toggle button
         */
        shopFiltersPopupButtonToggle: function() {
            var self = this;

            var popupBtnOffset = (self.$shopSidebarPopupBtn.hasClass('visible')) // Offset doesn't include button height
                    ? self.$shopSidebarPopupBtn.offset().top + self.$shopSidebarPopupBtn.outerHeight(true)
                    : self.$shopSidebarPopupBtn.offset().top,
                shopOffset = self.$shopBrowseWrap.offset().top,
                tolerance = 190;

            // Is popup-button below start of the Shop (plus tolerance)?
            if (popupBtnOffset > (shopOffset + tolerance)) {
                self.shopFiltersPopupButtonShow();
            } else {
                self.shopFiltersPopupButtonHide();
            }
        },
        
        
        /**
         *  Shop filters poup: Show button
         */
        shopFiltersPopupButtonShow: function() {
            var self = this;
            self.$shopSidebarPopupBtn.addClass('visible');
        },
        
        
        /**
         *  Shop filters poup: Hide button
         */
        shopFiltersPopupButtonHide: function() {
            var self = this;
            self.$shopSidebarPopupBtn.removeClass('visible');
        },
        
        
        /**
         *  Shop filters poup: Show
         */
        shopFiltersPopupShow: function() {
            var self = this;
            
            self.shopFiltersPopupButtonHide();
            
            self.$shopSidebarPopup.addClass('visible');
            self.$body.addClass('shop-filters-popup-open');
            //self.$widgetPanelOverlay.addClass('show');

            // Bind: Filters popup outside click
            self.$document.bind('mouseup.filtersPopup', function(e) {
                if (! self.$shopSidebarPopup.is(e.target) // If the target of the click isn't the container ...
                    && self.$shopSidebarPopup.has(e.target).length === 0) // Nor a descendant of the container
                {
                    self.shopFiltersPopupHide();
                }
            });
        },
		
        
        /**
         *  Shop filters poup: Hide 
         */
        shopFiltersPopupHide: function() {
            var self = this;
            
            self.$shopSidebarPopup.removeClass('visible');
            
            self.shopFiltersPopupButtonToggle(); // Show popup button (if it should be vivisble)
            
            self.$body.removeClass('shop-filters-popup-open');
            self.$document.unbind('mouseup.filtersPopup');
            //self.$widgetPanelOverlay.trigger('click');
            
            setTimeout(function() {
                // Reset search
                $('#nm-shop-search-input').val('');
                self.shopSearchHideNotice();
            }, self.panelsAnimSpeed);
        },
        
        
        /**
         *  Shop filters poup: Reset
         */
        shopFiltersPopupReset: function() {
            var self = this,            
                resetUrl = location.href.replace(location.search, ''); // Get the current URL without query-strings
            
            self.shopGetPage(resetUrl);
            //NM - for testing: self.shopGetPage(resetUrl+'?filters_popup=1');

            self.shopFiltersPopupHide();
        },
		
        
		/**
		 *	Shop: AJAX load shop page from external link
		 */
		shopExternalGetPage: function(pageUrl) {
			var self = this;
			
			//console.log('NM: shopExternalGetPage() URL: '+pageUrl);
						
			if (pageUrl == window.location.href) {
				// Shop page is already loaded, scroll to shop-top
				self.shopScrollToTop();
			} else {
				// Remove current "active" class from categories menu
				$('#nm-shop-categories').children('.current-cat').removeClass('current-cat');
			
				// Smooth-scroll to top
				var to = self.shopScrollToTop();
				setTimeout(function() {
					self.shopGetPage(pageUrl); // Load shop page
				}, to);
			}
		},
		
		
		/**
		 *	Shop: AJAX load shop page
		 */
		shopGetPage: function(pageUrl, isBackButton, isProductTag) {
			var self = this;
			
			if (self.shopAjax) { return false; }
			
			if (pageUrl) {
				// Remove any visible shop notices
				self.shopRemoveNotices();												
				
				// Set current shop URL (used to reset search and product-tag AJAX results)
				//self.shopSetCurrentUrl(isProductTag);
				
                if (self.shopSidebarLayout == 'popup') {
                    // Hide filters popup
                    self.shopFiltersPopupHide();
                }
                
				// Smooth-scroll to top
				//var to = self.shopScrollToTop();
				//setTimeout(function() {
				
				// Hide active filter panel and scroll/jump to shop-top (if browser has "mobile" width)
				if (self.$body.width() < self.filterPanelHideWidth) {
                    // Show 'loader' overlay
                    self.shopShowLoader(true); // Args: disableAnimation

                    var orgToggleSpeed = self.filterPanelSlideSpeed; // Save original panel slide speed
                    self.filterPanelSlideSpeed = 0; // Disable panel slide speed
                    
                    self.shopFiltersHideActivePanel(); // Hide active filter panel
                    //self.shopScrollToTop();

                    self.filterPanelSlideSpeed = orgToggleSpeed; // Reset panel slide speed
				} else {
                    // Show 'loader' overlay
                    self.shopShowLoader();
				}
				
				// Make sure the URL has a trailing-slash before query args (301 redirect fix)
				pageUrl = pageUrl.replace(/\/?(\?|#|$)/, '/$1');
				
				// Set browser history "pushState" (if not back button "popstate" event)
				if (!isBackButton) {
					self.setPushState(pageUrl);
				}
                    
				self.shopAjax = $.ajax({
					url: pageUrl,
					data: {
						shop_load: 'full',
                        shop_filters_layout: self.shopSidebarLayout
					},
					dataType: 'html',
					cache: false,
					headers: {'cache-control': 'no-cache'},
					
					method: 'POST', // Note: Using "POST" method for the Ajax request to avoid "shop_load" query-string in pagination links
					
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						console.log('NM: AJAX error - shopGetPage() - ' + errorThrown);
						
						// Hide 'loader' overlay (after scroll animation)
						self.shopHideLoader();
						
						self.shopAjax = false;
					},
					success: function(response) {
						// Update shop content
						self.shopUpdateContent(response);
						
						self.shopAjax = false;
					}
				});
				
				//}, to);
			}
		},
		
		
		/**
		 *	Shop: Update shop content with AJAX HTML
		 */
		shopUpdateContent: function(ajaxHTML) {
			var self = this,
				$ajaxHTML = $('<div>' + ajaxHTML + '</div>'); // Wrap the returned HTML string in a dummy 'div' element we can get the elements
			
			// Page title - wp_title()
			if (nm_wp_vars.shopAjaxUpdateTitle) {
				var wpTitle = $ajaxHTML.find('#nm-wp-title').text();
				if (wpTitle.length) {
					// Update document/page title
					document.title = wpTitle;
				}
			}
			
			// Extract elements
			var $ajaxCategories = $ajaxHTML.find('#nm-shop-categories'),
				$ajaxSidebarFilters = $ajaxHTML.find('#nm-shop-widgets-ul'),
				$ajaxShopBrowseWrap = $ajaxHTML.find('#nm-shop-browse-wrap');
											
			// Prepare/replace categories
			if ($ajaxCategories.length) { 
				var $shopCategories = $('#nm-shop-categories');
				
				// Is the category menu open? -add 'force-show' class
				if ($shopCategories.hasClass('fade-in')) {
					$ajaxCategories.addClass('fade-in force-show');
				}
				
				$shopCategories.replaceWith($ajaxCategories); 
			}
			// Prepare/replace sidebar filters
            if ($ajaxSidebarFilters.length) {
                /*var $shopSidebar = $('#nm-shop-sidebar'),
                    $shopSidebarFilters = $('#nm-shop-widgets-ul');
				
                $shopSidebarFilters.replaceWith($ajaxSidebarFilters);
                
				// Header sidebar: Is the sidebar open?
				if ($shopSidebar.hasClass('fade-in')) {
					// Header sidebar: Instantiate filter/widget scrollbars
					if (self.filterScrollbars) {
						self.filterScrollbarsInit();
					}
				} else {
					// Header sidebar: Sidebar is hidden, instantiate filter/widget scrollbars when "filter" link is clicked instead
					self.filterScrollbarsLoaded = false;
				}*/
                var $shopSidebarFilters = $('#nm-shop-widgets-ul');
				
                $shopSidebarFilters.replaceWith($ajaxSidebarFilters);
            }
			// Replace shop
			if ($ajaxShopBrowseWrap.length) {
				self.$shopBrowseWrap.replaceWith($ajaxShopBrowseWrap);
			}
			
			// Get the new shop browse wrap
			self.$shopBrowseWrap = $('#nm-shop-browse-wrap');
			
			// Load images (init Unveil)
			self.shopLoadImages();
			
			
			if (!self.shopInfLoadBound) {	
				// Bind "infinite load" if enabled (initial shop page didn't have pagination)
				self.infload_init();
			}
			
			
			// Smooth-scroll to top
			var to = self.shopScrollToTop();
			setTimeout(function() {
				// Hide 'loader' overlay (after scroll animation)
				self.shopHideLoader();
			}, to);
		}
		
	});
	
	// Add extension so it can be called from $.nmThemeExtensions
	$.nmThemeExtensions.filters = $.nmTheme.filters_init;
	
})(jQuery);
