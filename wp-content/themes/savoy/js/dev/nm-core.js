(function($) {
	
	
	'use strict';
	
	
	if (!$.nmThemeExtensions)
		$.nmThemeExtensions = {};
	
    
	function NmTheme() {
		var self = this;
        
		// Page width "breakpoints"
		//self.BREAKPOINT_SMALL = 0;
		//self.BREAKPOINT_MEDIUM = 0;
		self.BREAKPOINT_LARGE = 864;
		
		// CSS Classes
		self.classHeaderFixed = 'header-on-scroll';
		self.classMobileMenuOpen = 'mobile-menu-open';
		self.classWidgetPanelOpen = 'widget-panel-open';
        
		// Page elements
		self.$window = $(window);
		self.$document = $(document);
		self.$html = $('html');
		self.$body = $('body');
		
		// Page includes element
		self.$pageIncludes = $('#nm-page-includes');
		
		// Page overlays
		self.$pageOverlay = $('#nm-page-overlay');
		self.$widgetPanelOverlay = $('#nm-widget-panel-overlay');
		
		// Header
		self.$topBar = $('#nm-top-bar');
		self.$header = $('#nm-header');
		self.$headerPlaceholder = $('#nm-header-placeholder');
		self.headerScrollTolerance = 0;
		
		// Mobile menu
		self.$mobileMenuBtn = $('#nm-mobile-menu-button');
		self.$mobileMenu = $('#nm-mobile-menu');
		self.$mobileMenuScroller = self.$mobileMenu.children('.nm-mobile-menu-scroll');
		self.$mobileMenuLi = self.$mobileMenu.find('ul li.menu-item');
		
		// Widget panel
		self.$widgetPanel = $('#nm-widget-panel');
        self.widgetPanelAnimSpeed = 250;
		
		// Slide panels animation speed
		self.panelsAnimSpeed = 200;
		
		// Shop
		self.$shopWrap = $('#nm-shop');
		self.isShop = (self.$shopWrap.length) ? true : false;
        self.shopCustomSelect = (nm_wp_vars.shopCustomSelect != '0') ? true : false;
		
		// Search
		self.searchEnabled = false;
		self.searchInHeader = false;
		if (nm_wp_vars.shopSearch !== '0') {
			self.searchEnabled = true;
			
			self.$searchPanel = $('#nm-shop-search');
			self.$searchNotice = $('#nm-shop-search-notice');
			
			if (nm_wp_vars.shopSearch === 'header') {
				self.searchInHeader = true;
				self.$searchBtn = $('#nm-menu-search-btn');
			} else {
				// Shop search enabled, only need the button on shop listings
				if (self.isShop) {
					self.$searchBtn = $('#nm-shop-search-btn');
				}
			}
		}
        
		// Initialize scripts
		self.init();
	};
	
	
	NmTheme.prototype = {
	
		/**
		 *	Initialize
		 */
		init: function() {
			var self = this;
            
            /* Page-load transition */
            if (nm_wp_vars.pageLoadTransition != '0') {
                self.isIos = navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPhone/i);
                if (!self.isIos) {
                    self.$window.on('beforeunload', function(e) {
                        $('#nm-page-load-overlay').addClass('nm-loader'); // Show preloader animation
                        self.$html.removeClass('nm-page-loaded');
                    });
                }
                // Hide page-load overlay - Note: Using the "pageshow" event so the overlay is hidden when the browser "back" button is used (only seems to be needed in Safari though)
                if ('onpagehide' in window) {
                    window.addEventListener('pageshow', function() {
                        setTimeout(function() { self.$html.addClass('nm-page-loaded'); }, 150);
                    }, false);
                } else {
                    setTimeout(function() { self.$html.addClass('nm-page-loaded'); }, 150);
                }
            }
            
			// Remove the CSS transition preload class
			self.$body.removeClass('nm-preload');
			
			// Fixed header
			self.headerIsFixed = (self.$body.hasClass('header-fixed')) ? true : false;
			
			// No touch: Init history/back-button support (push/pop-state)
			if (self.$html.hasClass('no-touch') && self.$html.hasClass('history')) {
				self.hasPushState = true;
				window.history.replaceState({nmShop: true}, '', window.location.href);
			} else {
				self.hasPushState = false;
			}
			
            // Scrollbar
            self.setScrollbarWidth();
            
			// Init header
			self.headerCheckPlaceholderHeight(); // Make sure the header and header-placeholder has the same height
			if (self.headerIsFixed) {
				self.headerSetScrollTolerance();
				self.mobileMenuPrep();
			}
            
            // Init widget panel
			self.widgetPanelPrep();
			
			// Check for old IE browser (IE10 or below)
			var ua = window.navigator.userAgent,
            	msie = ua.indexOf('MSIE ');
			if (msie > 0) {
				self.$html.addClass('nm-old-ie');
			}
			
			// Check for touch device (modernizr)
			self.isTouch = (self.$html.hasClass('touch')) ? true : false;
			
			// Load extension scripts
			self.loadExtension();
			
			self.bind();
			self.initPageIncludes();
            
			
			// "Add to cart" redirect: Show cart panel
			if (self.$body.hasClass('nm-added-to-cart')) {
				self.$body.removeClass('nm-added-to-cart')
				
				self.$window.load(function() {
					// Is widget/cart panel enabled?
					if (self.$widgetPanel.length) {
                        // Show cart panel
                        self.widgetPanelShow(true); // Args: showLoader
                        // Hide cart panel "loader" overlay
                        setTimeout(function() { self.widgetPanelCartHideLoader(); }, 1000);
                    }
				});
			}
		},
		
		
		/**
		 *	Extensions: Load scripts
		 */
		loadExtension: function() {
			var self = this;
			
			// Shop scripts
			if ($.nmThemeExtensions.shop) {
				$.nmThemeExtensions.shop.call(self);
			}
				
			// Shop/single-product scripts
			if ($.nmThemeExtensions.singleProduct) {
				$.nmThemeExtensions.singleProduct.call(self);
			}
				
			// Cart scripts
			if ($.nmThemeExtensions.cart) {
				$.nmThemeExtensions.cart.call(self);
			}
			
			// Checkout scripts
			if ($.nmThemeExtensions.checkout) {
				$.nmThemeExtensions.checkout.call(self);
			}
		},
		
        
        /**
         *  Utility: Throttle function execution - http://underscorejs.org/#throttle
         *
         *  Source code: http://underscorejs.org/docs/underscore.html#section-82
         */
        /*throttle: function(func, wait, options) {
            var context, args, result; var timeout = null; var previous = 0;
            if (!options) options = {};
            var later = function() {
                previous = options.leading === false ? 0 : _.now();
                timeout = null;
                result = func.apply(context, args);
                if (!timeout) context = args = null;
            };
            return function() {
                var now = _.now();
                if (!previous && options.leading === false) previous = now;
                var remaining = wait - (now - previous);
                context = this;
                args = arguments;
                if (remaining <= 0 || remaining > wait) {
                    if (timeout) {
                        clearTimeout(timeout);
                        timeout = null;
                    }
                    previous = now;
                    result = func.apply(context, args);
                    if (!timeout) context = args = null;
                } else if (!timeout && options.trailing !== false) {
                    timeout = setTimeout(later, remaining);
                }
                return result;
            };
        },*/
        
		
		/**
		 *  Helper: Calculate scrollbar width
		 */
		setScrollbarWidth: function() {
			// From Magnific Popup v1.0.0
			var self = this,
				scrollDiv = document.createElement('div');
			scrollDiv.style.cssText = 'width: 99px; height: 99px; overflow: scroll; position: absolute; top: -9999px;';
			document.body.appendChild(scrollDiv);
			self.scrollbarWidth = scrollDiv.offsetWidth - scrollDiv.clientWidth;
			document.body.removeChild(scrollDiv);
			// /Magnific Popup
		},
        
        
        /**
		 *	Helper: Is page vertically scrollable?
		 */
        pageIsScrollable: function() {
            return document.body.scrollHeight > document.body.clientHeight;
            //jQuery alt: return self.$body.height() > self.$window.height();
        },
        
        
        /**
		 *  Helper: Get parameter from current page URL
		 */
        urlGetParameter: function(param) {
            var url = decodeURIComponent(window.location.search.substring(1)),
                urlVars = url.split('&'),
                paramName, i;

            for (i = 0; i < urlVars.length; i++) {
                paramName = urlVars[i].split('=');
                if (paramName[0] === param) {
                    return paramName[1] === undefined ? true : paramName[1];
                }
            }
        },
		
		
		/**
		 *  Helper: Add/update a key-value pair in the URL query parameters 
		 */
		updateUrlParameter: function(uri, key, value) {
			// Remove #hash before operating on the uri
			var i = uri.indexOf('#'),
				hash = i === -1 ? '' : uri.substr(i);
			uri = (i === -1) ? uri : uri.substr(0, i);
			
			var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i"),
				separator = (uri.indexOf('?') !== -1) ? "&" : "?";
			
			if (uri.match(re)) {
				uri = uri.replace(re, '$1' + key + "=" + value + '$2');
			} else {
				uri = uri + separator + key + "=" + value;
			}
			
			return uri + hash; // Append #hash
		},
		
		
		/**
		 *	Helper: Set browser history "pushState" (AJAX url)
		 */
		setPushState: function(pageUrl) {
			var self = this;
			
			// Set browser "pushState"
			if (self.hasPushState) {
				window.history.pushState({nmShop: true}, '', pageUrl);
			}
		},
		
		
		/**
		 *	Header: Check/set placeholder height
		 */
		headerCheckPlaceholderHeight: function() {
			var self = this;
			
			// Make sure the header is not fixed/floated
			if (self.$body.hasClass(self.classHeaderFixed)) {
				return;
			}
			
            var headerHeight = self.$header.innerHeight(),
				headerPlaceholderHeight = parseInt(self.$headerPlaceholder.css('height'));
            
			// Is the header height different than the current placeholder height?
			if (headerHeight !== headerPlaceholderHeight) {
                self.$headerPlaceholder.css('height', headerHeight+'px');
			}
		},
		
		
		/**
		 *	Header: Set scroll tolerance
		 */
		headerSetScrollTolerance: function() {
			var self = this;
			
			self.headerScrollTolerance = (self.$topBar.length && self.$topBar.is(':visible')) ? self.$topBar.outerHeight(true) : 0;
		},
        
        
        /**
		 *	Header: Toggle fixed class
		 */
        headerToggleFixedClass: function(self) {
            if (self.$document.scrollTop() > self.headerScrollTolerance) {
                if (!self.$body.hasClass(self.classHeaderFixed)) {
                    self.$body.addClass(self.classHeaderFixed);
                }
            } else {
                if (self.$body.hasClass(self.classHeaderFixed)) {
                    self.$body.removeClass(self.classHeaderFixed);
                }
            }
        },
		
		
		/**
		 *	Bind scripts
		 */
		bind: function() {
			var self = this;
			
			
			
			/* Bind: Window resize */
			var timer = null, windowWidth;
			self.$window.resize(function() {
				if (timer) { clearTimeout(timer); }
				timer = setTimeout(function() {
					windowWidth = parseInt(self.$html.css('width'));
					
					if (self.$body.hasClass(self.classMobileMenuOpen) && windowWidth > self.BREAKPOINT_LARGE) {
						self.$pageOverlay.trigger('click');
					}
					
					// Make sure the header and header-placeholder has the same height
					self.headerCheckPlaceholderHeight();
																	
					if (self.headerIsFixed) {
						self.headerSetScrollTolerance();
						self.mobileMenuPrep();
					}
				}, 250);
			});
			
            
			
			/* Bind: Window scroll (Fixed header) */
			if (self.headerIsFixed) {
                self.$window.bind('scroll.nmheader', function() {
                    self.headerToggleFixedClass(self);
                });
                /*var throttled = self.throttle(self.headerToggleFixedClass, 50); // Throttle scroll function execution
                self.$window.bind('scroll', throttled);*/
                
				self.$window.trigger('scroll');
			}
			
			
			
			/* Bind: Sub-menu position check */
			var $topMenuItems = $('#nm-top-menu').children('.menu-item'),
				$mainMenuItems = $('#nm-main-menu-ul').children('.menu-item'),
				$menuItems = $.merge($topMenuItems, $mainMenuItems);
				
			$menuItems.hover(function() {
				var $subMenu = $(this).children('.sub-menu');
				if ($subMenu.length) {
					var windowWidth = self.$window.innerWidth(),
						subMenuOffset = $subMenu.offset().left,
						subMenuWidth = $subMenu.width(),
						subMenuGap = windowWidth - (subMenuOffset + subMenuWidth);
					if (subMenuGap < 0) {
						$subMenu.css('left', (subMenuGap-33)+'px');
					} else {
						$subMenu.css('left', '');
					}
				}
			});
			
			
			
			/* Bind: Mobile menu button */
			self.$mobileMenuBtn.bind('click', function(e) {
				e.preventDefault();
				
				if (!self.$body.hasClass(self.classMobileMenuOpen)) {
					self.mobileMenuOpen();
				} else {
					self.mobileMenuClose(true); // Args: hideOverlay
				}
			});
			
			/* Function: Mobile menu - Toggle sub-menu */
			var _mobileMenuToggleSub = function($menu, $subMenu) {
                $menu.toggleClass('active');
				$subMenu.toggleClass('open');
			};
			
			/* Bind: Mobile menu list elements */
			self.$mobileMenuLi.bind('click', function(e) {
				e.preventDefault();
				e.stopPropagation(); // Prevent click event on parent menu link
				
				var $this = $(this),
					$thisSubMenu = $this.children('ul');
									
				if ($thisSubMenu.length) {
					_mobileMenuToggleSub($this, $thisSubMenu);
				}
			});
			
			/* Bind: Mobile menu links */
			self.$mobileMenuLi.find('a').bind('click', function(e) {
				e.stopPropagation(); // Prevent click event on parent list element
				
				var $this = $(this),
					$thisLi = $this.parent('li'),
					$thisSubMenu = $thisLi.children('ul');
					
				if (($thisSubMenu.length || $this.attr('href').substr(0, 1) == '#') && !$thisLi.hasClass('nm-notoggle')) {
					e.preventDefault();
					_mobileMenuToggleSub($thisLi, $thisSubMenu);
				}
			});
			
			
			
			if (self.searchEnabled) {
				/* Bind: Search - Header link */
				if (self.searchInHeader) {
					self.$searchBtn.bind('click', function(e) {
						e.preventDefault();
						$(this).toggleClass('active');
						self.$body.toggleClass('header-search-open');
						self.searchPanelToggle();
					});
				}
				
				/* Bind: Search - Panel "close" button */
				$('#nm-shop-search-close').bind('click', function(e) {
					e.preventDefault();
					self.$searchBtn.trigger('click');
				});
				
				
				/* Bind: Search input "input" event */
				var validSearch;
				$('#nm-shop-search-input').on('input', function() {
					validSearch = self.shopSearchValidateInput($(this).val());
					
					if (validSearch) {
						self.$searchNotice.addClass('show');
					} else {
						self.$searchNotice.removeClass('show');
					}
				}).trigger('input');
			}
			
			
			
			/* Bind: Widget panel */
			if (self.$widgetPanel.length) {
				self.widgetPanelBind();
			}
			
			
			
			/* Bind: Login/register popup */
			if (self.$pageIncludes.hasClass('login-popup')) {
				$('#nm-menu-account-btn').bind('click', function(e) {
					e.preventDefault();
					
                    // Checkout page fix: Make sure the login form is visible
                    $('#nm-login-wrap').children('.login').css('display', '');
                    
					$.magnificPopup.open({
						mainClass: 'nm-login-popup nm-mfp-fade-in',
						alignTop: true,
						closeMarkup: '<a class="mfp-close nm-font nm-font-close2"></a>',
						removalDelay: 180,
						items: {
							src: '#nm-login-popup-wrap',
							type: 'inline'
						},
						callbacks: {
							close: function() {
								// Make sure the login form is displayed when the modal is re-opened
								$('#nm-login-wrap').addClass('inline fade-in slide-up');
								$('#nm-register-wrap').removeClass('inline fade-in slide-up');
							}
						}
					});
				});
			}
			
			
			
			/* Bind: Blog categories toggle link */
			$('#nm-blog-categories-toggle-link').bind('click', function(e) {
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
			
			
			
			/* Bind: Page overlay */
			$('#nm-page-overlay, #nm-widget-panel-overlay').bind('click', function() {
				var $this = $(this);
				
				if (self.$body.hasClass(self.classMobileMenuOpen)) {
                    self.mobileMenuClose(false); // Args: hideOverlay
				} else {
                    self.widgetPanelHide();
				}
				
				$this.addClass('fade-out');
				setTimeout(function() {
                    $this.removeClass('show fade-out');
				}, self.panelsAnimSpeed);
			});
		},
		
		
		/**
		 *	Mobile menu: Prepare (add CSS)
		 */
		mobileMenuPrep: function() {
			var self = this,
				windowHeight = self.$window.height() - self.$header.outerHeight(true);
			
			self.$mobileMenuScroller.css({'max-height': windowHeight+'px', 'margin-right': '-'+self.scrollbarWidth+'px'});
		},
        
        
        /**
		 *	Mobile menu: Open
		 */
		mobileMenuOpen: function(hideOverlay) {
            var self = this,
                headerPosition = self.$header.outerHeight(true);
            
            self.$mobileMenuScroller.css('margin-top', headerPosition+'px');
            
            self.$body.addClass(self.classMobileMenuOpen);
            self.$pageOverlay.addClass('show');
        },
        
        
        /**
		 *	Mobile menu: Close
		 */
		mobileMenuClose: function(hideOverlay) {
            var self = this;
            
            self.$body.removeClass(self.classMobileMenuOpen);
            
            if (hideOverlay) {
                self.$pageOverlay.trigger('click');
            }

            // Hide open menus (first level only)
            setTimeout(function() {
                $('#nm-mobile-menu-main-ul').children('.active').removeClass('active').children('ul').removeClass('open');
                $('#nm-mobile-menu-secondary-ul').children('.active').removeClass('active').children('ul').removeClass('open');
            }, 250);
        },
		
		
		/**
		 *	Shop search: Toggle panel
		 */
		searchPanelToggle: function() {
			var self = this,
				$searchInput = $('#nm-shop-search-input');
			
			self.$searchPanel.slideToggle(200, function() {
				self.$searchPanel.toggleClass('fade-in');
												
				if (self.$searchPanel.hasClass('fade-in')) {
					// "Focus" search input
					$searchInput.focus();
				} else {
					// Empty input value
					$searchInput.val('');
				}
				
				self.filterPanelSliding = false;
			});
			
			// Hide search notice
			self.shopSearchHideNotice();
		},
		
		
		/**
		 *	Shop search: Validate input string
		 */
		shopSearchValidateInput: function(s) {
			// Make sure the search string has at least one character (not just whitespace) and minimum allowed characters are entered
			if ((/\S/.test(s)) && s.length > (nm_wp_vars.shopSearchMinChar-1)) {
				return true;
			} else {
				return false;
			}
		},
		
		
		/**
		 *	Shop search: Hide notice
		 */
		shopSearchHideNotice: function(s) {
			$('#nm-shop-search-notice').removeClass('show');
		},
		
		
		/**
		 *	Widget panel: Prepare
		 */
		widgetPanelPrep: function() {
			var self = this;
            
            // Cart panel: Hide scrollbar
            self.widgetPanelCartHideScrollbar();
            
            // Cart panel: Set Ajax state
            self.cartPanelAjax = null;
            
            // Cart panel: Bind quantity-input buttons
            self.quantityInputsBindButtons(self.$widgetPanel);
            
            
            // Quantity inputs: Bind "blur" event
            self.$widgetPanel.on('blur', 'input.qty', function() {
                var $quantityInput = $(this),
                    currentVal = parseFloat($quantityInput.val()),
                    max	= parseFloat($quantityInput.attr('max'));
                
                // Validate input values
                if (currentVal === '' || currentVal === 'NaN') { currentVal = 0; }
				if (max === 'NaN') { max = ''; }
                
                // Make sure the value is not higher than the max value
                if (currentVal > max) { 
                    $quantityInput.val(max);
                    currentVal = max;
                };
                
                // Is the quantity value more than 0?
                if (currentVal > 0) {
                    self.widgetPanelCartUpdate($quantityInput);
                }
            });
            
            // Quantity inputs: Bind "nm_qty_change" event
            self.$document.on('nm_qty_change', function(event, quantityInput) {
                // Is the widget-panel open?
                if (self.$body.hasClass(self.classWidgetPanelOpen)) {
                    self.widgetPanelCartUpdate($(quantityInput));
                }
            });
		},
        
        
		/**
		 *	Widget panel: Bind
		 */
		widgetPanelBind: function() {
			var self = this;
			
			// Touch event handling
			if (self.isTouch) {
				// Allow page overlay "touchmove" event if header is not fixed/floating
				if (self.headerIsFixed) {
					// Bind: Page overlay "touchmove" event
					self.$pageOverlay.on('touchmove', function(e) {
						e.preventDefault(); // Prevent default touch event
					});
				}
				
				// Bind: Widget panel overlay "touchmove" event
				self.$widgetPanelOverlay.on('touchmove', function(e) {
					e.preventDefault(); // Prevent default touch event
				});
				
				// Bind: Widget panel "touchmove" event
				self.$widgetPanel.on('touchmove', function(e) {				
					e.stopPropagation(); // Prevent event propagation (bubbling)
				});
			}
			
			/* Bind: "Cart" buttons */
			$('#nm-menu-cart-btn, #nm-mobile-menu-cart-btn').bind('click', function(e) {
				e.preventDefault();										
				
				// Close the mobile menu first					
				if (self.$body.hasClass(self.classMobileMenuOpen)) {
					var $this = $(this);
					self.$pageOverlay.trigger('click');
					setTimeout(function() {
						$this.trigger('click'); // Trigger this function again
					}, self.panelsAnimSpeed);
				} else {
				    self.widgetPanelShow();
                }
			});
			
			/* Bind: "Close" button */
			$('#nm-widget-panel-close').bind('click.nmWidgetPanelClose', function(e) {
				e.preventDefault();
				$('#nm-widget-panel-overlay').trigger('click');
			});
            
            /* Bind: "Continue shopping" button */
			self.$widgetPanel.on('click.nmCartPanelClose', '#nm-cart-panel-continue', function(e) {
				e.preventDefault();
				$('#nm-widget-panel-overlay').trigger('click');
			});
			
			/* Bind: Cart panel - Remove product */
			self.$widgetPanel.on('click', '#nm-cart-panel .cart_list .remove', function(e) {
				e.preventDefault();
                // Is an Ajax request already running?
                if (! self.cartPanelAjax) {
                    self.widgetPanelCartRemoveProduct(this);
                }
			});
		},
        
        
		/**
		 *	Widget panel: Show
		 */
		widgetPanelShow: function(showLoader) {
			var self = this;
            
			if (showLoader) {
                self.widgetPanelCartShowLoader();
			}
			
            self.$body.addClass('widget-panel-opening '+self.classWidgetPanelOpen);
			self.$widgetPanelOverlay.addClass('show');
            
            setTimeout(function() {
                self.$body.removeClass('widget-panel-opening');
            }, self.widgetPanelAnimSpeed);
		},
        
        
        /**
		 *	Widget panel: Hide
		 */
		widgetPanelHide: function() {
			var self = this;
			
            self.$body.addClass('widget-panel-closing');
            self.$body.removeClass(self.classWidgetPanelOpen);
            
            setTimeout(function() {
                self.$body.removeClass('widget-panel-closing');
            }, self.widgetPanelAnimSpeed);
		},
		
        
        /**
		 *	Widget panel: Cart - Show loader
		 */
		widgetPanelCartShowLoader: function() {
			$('#nm-cart-panel-loader').addClass('show');
		},
        
		
		/**
		 *	Widget panel: Cart - Hide loader
		 */
		widgetPanelCartHideLoader: function() {
            var self = this;
            
			$('#nm-cart-panel-loader').addClass('fade-out');
			setTimeout(function() {
                $('#nm-cart-panel-loader').removeClass('fade-out show');
            }, 200);
		},
        
        
        /**
		 *	Widget panel: Cart - Hide scrollbar
		 */
		widgetPanelCartHideScrollbar: function() {
            var self = this;
            self.$widgetPanel.children('.nm-widget-panel-inner').css('marginRight', '-'+self.scrollbarWidth+'px');
        },
		
        
		/**
		 *	Widget panel: Cart - Remove product
		 */		
		widgetPanelCartRemoveProduct: function(button) {
			var self = this,
				$button = $(button),
				$itemLi = $button.closest('li'),
                $itemUl = $itemLi.parent('ul'),
                cartItemKey = $button.data('cart-item-key');
			
            // Show thumbnail loader
            $itemLi.closest('li').addClass('loading');
            
			self.cartPanelAjax = $.ajax({
				type: 'POST',
				url: nm_wp_vars.ajaxUrl,
				data: {
					action: 'nm_cart_panel_remove_product',
					cart_item_key: cartItemKey
				},
				dataType: 'json',
				// Note: Disabling these to avoid "origin policy" AJAX error in some cases
				//cache: false,
				//headers: {'cache-control': 'no-cache'},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					console.log('NM: AJAX error - widgetPanelCartRemoveProduct() - ' + errorThrown);
                    $itemLi.closest('li').removeClass('loading'); // Hide thumbnail loader
				},
				complete: function(response) {
					self.cartPanelAjax = null; // Reset Ajax state
                    
                    var json = response.responseJSON;
					
					if (json && json.status === '1') {
                        // Fade-out cart item
                        $itemLi.css({'-webkit-transition': '0.2s opacity ease', transition: '0.2s opacity ease', opacity: '0'});
                        
                        setTimeout(function() {
                            // Slide-up cart item
                            $itemLi.css('display', 'block').slideUp(150, function() {
                                $itemLi.remove();
                                
                                // Show "cart empty" elements?
                                var $cartLis = $itemUl.children('li');
                                if ($cartLis.length == 1) { $('#nm-cart-panel').addClass('nm-cart-panel-empty'); }
                                
                                // Replace cart/shop fragments
                                self.shopReplaceFragments(json.fragments);
                                
                                // Trigger "added_to_cart" event to make sure the HTML5 "sessionStorage" fragment values are updated
                                self.$body.trigger('added_to_cart', [json.fragments, json.cart_hash]);
                            });
                        }, 160);
					} else {
						console.log("NM: Couldn't remove product from cart");
					}
				}
			});
		},
		
		
        /**
		 *	Widget panel: Cart - Update quantity
		 */
        widgetPanelCartUpdate: function($quantityInput) {
            var self = this;
            
            // Is an Ajax request already running?
            if (self.cartPanelAjax) {
                self.cartPanelAjax.abort(); // Abort current Ajax request
            }
            
            // Show thumbnail loader
            $quantityInput.closest('li').addClass('loading');
            
            // Ajax data
            var data = {
                action: 'nm_cart_panel_update'
            };
            data[$quantityInput.attr('name')] = $quantityInput.val();
            
            self.cartPanelAjax = $.ajax({
                type: 'POST',
                url: nm_wp_vars.ajaxUrl,
				data: data,
                dataType: 'json',
				complete: function(response) {
				    self.cartPanelAjax = null; // Reset Ajax state
                    
                    var json = response.responseJSON;
                    
					if (json && json.status === '1') {
						self.shopReplaceFragments(json.fragments); // Replace cart/shop fragments
					}
                    
                    // Hide any visible thumbnail loaders
                    $('#nm-cart-panel .cart_list').children('.loading').removeClass('loading');
                }
            });
        },
        
        
        /**
		 *	Shop: Replace fragments
		 */
        shopReplaceFragments: function(fragments) {
            var $fragment;
            $.each(fragments, function(selector, fragment) {
                $fragment = $(fragment);
                if ($fragment.length) {
                    $(selector).replaceWith($fragment);
                }
            });
        },
        
        
        /**
		 *	Quantity inputs: Bind buttons
		 */
		quantityInputsBindButtons: function($container) {
			var self = this;
			
			// Add buttons
            // Note: Added these to the "../global/quantity-input.php" template instead (required for the Ajax Cart)
			//$container.find('.quantity').append('<div class="nm-qty-plus nm-font nm-font-media-play rotate-270"></div>').prepend('<div class="nm-qty-minus nm-font nm-font-media-play rotate-90"></div>');
			
			/* 
			 *	Bind buttons click event
			 *	Note: Modified code from WooCommerce core (v2.2.6)
			 */
			$container.off('click.nmQty').on('click.nmQty', '.nm-qty-plus, .nm-qty-minus', function() {
				// Get elements and values
				var $this		= $(this),
					$qty		= $this.closest('.quantity').find('.qty'),
					currentVal	= parseFloat($qty.val()),
					max			= parseFloat($qty.attr('max')),
					min			= parseFloat($qty.attr('min')),
					step		= $qty.attr('step');
				
				// Format values
				if (!currentVal || currentVal === '' || currentVal === 'NaN') currentVal = 0;
				if (max === '' || max === 'NaN') max = '';
				if (min === '' || min === 'NaN') min = 0;
				if (step === 'any' || step === '' || step === undefined || parseFloat(step) === 'NaN') step = 1;
                
				// Change the value
				if ($this.hasClass('nm-qty-plus')) {
					if (max && (max == currentVal || currentVal > max)) {
						$qty.val(max);
					} else {
						$qty.val(currentVal + parseFloat(step));
                        self.quantityInputsTriggerEvents($qty);
					}
				} else {
					if (min && (min == currentVal || currentVal < min)) {
						$qty.val(min);
					} else if (currentVal > 0) {
						$qty.val(currentVal - parseFloat(step));
                        self.quantityInputsTriggerEvents($qty);
					}
				}
			});
		},
        
        
        /**
		 *    Quantity inputs: Trigger events
		 */
        quantityInputsTriggerEvents: function($qty) {
            var self = this;
            
            // Trigger quantity input "change" event
            $qty.trigger('change');

            // Trigger custom event
            self.$document.trigger('nm_qty_change', $qty);
        },
        
        
		/**
		 *	Initialize "page includes" elements
		 */
		initPageIncludes: function() {
			var self = this;
			
            
            /* VC element: Row - Full height */
            if (self.$pageIncludes.hasClass('row-full-height')) {
                var _rowSetFullHeight = function() {
                    var $row = $('.nm-row-full-height:first');

                    if ($row.length) {
                        var windowHeight = self.$window.height(),
                            rowOffsetTop = $row.offset().top,
                            rowFullHeight;
                        
                        // Set/calculate Row's viewpoint height (vh)
                        windowHeight > rowOffsetTop && (rowFullHeight = 100 - rowOffsetTop / (windowHeight / 100), $row.css('min-height', rowFullHeight+'vh'));
                    }
                }
                
                _rowSetFullHeight(); // Init
                
                /* Bind: Window "resize" event for changing Row height */
                var rowResizeTimer = null;
                self.$window.bind('resize.nmRow', function() {
                    if (rowResizeTimer) { clearTimeout(rowResizeTimer); }
                    rowResizeTimer = setTimeout(function() { _rowSetFullHeight(); }, 250);
                });
            }
            
			
			/* VC element: Row - Video (YouTube) background */
			if (!self.isTouch && self.$pageIncludes.hasClass('video-background')) {
				$('.nm-row-video').each(function() {
					var $row = $(this),
						youtubeUrl = $row.data('video-url');
					
					if (youtubeUrl) {
						var youtubeId = vcExtractYoutubeId(youtubeUrl); // Note: function located in: "nm-js_composer_front(.min).js"
						
						if (youtubeId) {
							insertYoutubeVideoAsBackground($row, youtubeId); // Note: function located in: "nm-js_composer_front(.min).js"
						}
					}
				});
			}
			
			
			self.$window.load(function() {
				
				/* Blog grid (Packery) */
				if (self.$pageIncludes.hasClass('blog-grid')) {
					var $blogUl = $('#nm-blog-grid-ul');
				    
					// Initialize Packery
					$blogUl.packery({
						itemSelector: '.post',
						gutter: 0,
						isInitLayout: false // // Disable initial layout
					});
					
					// Packery event: "layoutComplete"
					$blogUl.packery('once', 'layoutComplete', function() {
						//setTimeout(function() {
						$blogUl.removeClass('nm-loader hide');
						//}, 200);
					});
					
					// Manually trigger initial layout
					$blogUl.packery();
				}
				
				
				/* VC element: Banner */
				if (self.$pageIncludes.hasClass('banner')) {
					var $banners = $('.nm-banner');
					
					/* Bind: Banner shop links (AJAX) */
					if (self.isShop && self.filtersEnableAjax) {
						$banners.find('.nm-banner-shop-link').bind('click', function(e) {
							e.preventDefault();
							var shopUrl = $(this).attr('href');
							if (shopUrl) {
								self.shopExternalGetPage($(this).attr('href')); // Smooth-scroll to top, then load shop page
							}
						});
					}
				}
				
				
				/* VC element: Banner slider */
				if (self.$pageIncludes.hasClass('banner-slider')) {
					var $bannerSliders = $('.nm-banner-slider');
					
					/* Helper: Add banner animation class */
					var _bannerAddAnimClass = function($slider, $slideActive) {
						$slider.$bannerContent = $slideActive.find('.nm-banner-text-inner');
						
						if ($slider.$bannerContent.length) {
							$slider.bannerAnimation = $slider.$bannerContent.data('animate');
							$slider.$bannerContent.addClass($slider.bannerAnimation);
						}
					};
					
					// Initialize banner sliders											
					$bannerSliders.each(function() {
						var $slider = $(this),
							sliderOptions = {
								arrows: false,
								prevArrow: '<a class="slick-prev"><i class="nm-font nm-font-angle-thin-left"></i></a>',
								nextArrow: '<a class="slick-next"><i class="nm-font nm-font-angle-thin-right"></i></a>',
								dots: false,
								edgeFriction: 0,
								infinite: false,
								pauseOnHover: false,
								speed: 350,
								touchThreshold: 30
							};
							
						// Wrap slider banners in a 'div' element (this will be the '.slick-slide' element around each banner)
						$slider.children().wrap('<div></div>');
						
						// Extend default slider settings with data attribute settings
						sliderOptions = $.extend(sliderOptions, $slider.data());
						
						// Event: Slick slide - Init
						$slider.on('init', function() {
							self.$document.trigger('banner-slider-loaded');
							_bannerAddAnimClass($slider, $slider.find('.slick-track .slick-active'));
						});
						
						// Event: Slick slide - Slide change
						$slider.on('afterChange', function(event, slick, currentSlide) {
							// Make sure the slide has changed
							if ($slider.slideIndex != currentSlide) {
								$slider.slideIndex = currentSlide;
								
								// Remove animation class from previous banner
								if ($slider.$bannerContent) {
									$slider.$bannerContent.removeClass($slider.bannerAnimation);
								}
								
								_bannerAddAnimClass($slider, $slider.find('.slick-track .slick-active')); // Note: Don't use the "currentSlide" index to find the active element ("infinite" setting clones slides)
							}
						});
						
						// Event: Slick slide - After position/size changes
						$slider.on('setPosition', function(event, slick) {
							var $currentSlide = $(slick.$slides[slick.currentSlide]),
								$currentBanner = $currentSlide.children('.nm-banner');
							
							// Is there an alt. image?
							if ($currentBanner.hasClass('has-alt-image')) {
								// Is the alt. image currently visible?
								if ($currentBanner.children('.nm-banner-alt-image').is(':visible')) {
									slick.$slider.addClass('alt-image-visible');
								} else {
									slick.$slider.removeClass('alt-image-visible');
								}
							} else {
								slick.$slider.removeClass('alt-image-visible');
							}
						});
						
						// Initialize banner slider
						$slider.slick(sliderOptions);
					});
				}
				
                
                /* VC element: Product slider */
				if (self.$pageIncludes.hasClass('product-slider')) {
					var $sliders = $('.nm-product-slider'),
						sliderOptions = {
							adaptiveHeight: true,
							arrows: false,
							dots: true,
							edgeFriction: 0,
							infinite: false,
							//pauseOnHover: false,
							speed: 350,
							touchThreshold: 30,
							slidesToShow: 4,
							slidesToScroll: 4,
							responsive: [
								{
									breakpoint: 1024,
									settings: {
										slidesToShow: 3,
										slidesToScroll: 3
									}
								},
								{
									breakpoint: 768,
									settings: {
										slidesToShow: 2,
										slidesToScroll: 2
									}
								},
								{
									breakpoint: 518,
									settings: {
										slidesToShow: 1,
										slidesToScroll: 1
									}
								}
							]
						};
					
					$sliders.each(function() {
						var $sliderWrap = $(this),
                            $slider = $sliderWrap.find('.nm-products:first');
                        
						// Extend default slider settings with data attribute settings
						sliderOptions = $.extend(sliderOptions, $sliderWrap.data());
						
						$slider.slick(sliderOptions);
					});
				}
				
                
				/* VC element: Post slider */
				if (self.$pageIncludes.hasClass('post-slider')) {
					var $sliders = $('.nm-post-slider'),
						sliderOptions = {
							adaptiveHeight: true,
							arrows: false,
							dots: true,
							edgeFriction: 0,
							infinite: false,
							pauseOnHover: false,
							speed: 350,
							touchThreshold: 30,
							slidesToShow: 4,
							slidesToScroll: 4,
							responsive: [
								{
									breakpoint: 1024,
									settings: {
										slidesToShow: 3,
										slidesToScroll: 3
									}
								},
								{
									breakpoint: 768,
									settings: {
										slidesToShow: 2,
										slidesToScroll: 2
									}
								},
								{
									breakpoint: 518,
									settings: {
										slidesToShow: 1,
										slidesToScroll: 1
									}
								}
							]
						};
					
					$sliders.each(function() {
						var $slider = $(this);
						
						// Extend default slider settings with data attribute settings
						sliderOptions = $.extend(sliderOptions, $slider.data());
						
						$slider.slick(sliderOptions);
					});
				}
				
				
				/* VC element: Blog slider */
				if (self.$pageIncludes.hasClass('blog-slider')) {
					var $galleries = $('.nm-blog-slider'),
						sliderOptions = {
							prevArrow: '<a class="slick-prev"><i class="nm-font nm-font-angle-left"></i></a>',
							nextArrow: '<a class="slick-next"><i class="nm-font nm-font-angle-right"></i></a>',
							dots: true,
							edgeFriction: 0,
							infinite: false,
							pauseOnHover: false,
							speed: 350,
							touchThreshold: 30,
							responsive: [
								{
									breakpoint: 550,
									settings: {
										slidesToShow: 1
									}
								}
							]
						};
					
					$galleries.each(function() {
						var $gallery = $(this);
						
						// Extend default slider settings with data attribute settings
						sliderOptions = $.extend(sliderOptions, $gallery.data());
						
						$gallery.slick(sliderOptions);
					});
				}
				
				
				/* WP gallery popup */
                if (nm_wp_vars.wpGalleryPopup != '0' && self.$pageIncludes.hasClass('wp-gallery')) {
					$('.gallery').each(function() {
						$(this).magnificPopup({
							mainClass: 'nm-wp-gallery-popup nm-mfp-fade-in',
							closeMarkup: '<a class="mfp-close nm-font nm-font-close2"></a>',
							removalDelay: 180,
							delegate: '.gallery-icon > a', // Gallery item selector
							type: 'image',
							gallery: {
								enabled: true,
								arrowMarkup: '<a title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir% nm-font nm-font-angle-right"></a>'
							},
							closeBtnInside: false
						});
					});
				}
			
			}); // $window.load()
			
			
			/* VC element: Product categories */
			if (self.$pageIncludes.hasClass('product_categories')) {
				var $categories = $('.nm-product-categories');
				
				/* Bind: Category links */
				if (self.isShop && self.filtersEnableAjax) {
					$categories.find('.product-category a').bind('click', function(e) {
						e.preventDefault();
						
						// Load shop category page
						self.shopExternalGetPage($(this).attr('href'));
					});
				}
				
				if (self.$pageIncludes.hasClass('product_categories_packery')) {
					self.$window.load(function() {
						for (var i = 0; i < $categories.length; i++) {
							var $categoriesUl = $($categories[i]).children('.woocommerce').children('ul');
							
							// Initialize Packery
							$categoriesUl.packery({
								itemSelector: '.product-category',
								gutter: 0,
								isInitLayout: false // Disable initial layout
							});
							
							// Packery event: "layoutComplete"
							$categoriesUl.packery('once', 'layoutComplete', function() {
								$categoriesUl.closest('.nm-product-categories').removeClass('nm-loader'); // Hide preloader
								$categoriesUl.addClass('show');
							});
							
							// Manually trigger initial layout
							$categoriesUl.packery();
						}
					});
				}
			}
			
			
			/* VC element: Lightbox */
            if (self.$pageIncludes.hasClass('lightbox')) {
				var $this, type, lightboxOptions;
				
				$('.nm-lightbox').each(function() {
					$(this).bind('click', function(e) {
						e.preventDefault();
						e.stopPropagation();
						
						$this = $(this);
						type = $this.data('mfp-type');
						
                        lightboxOptions = {
                            mainClass: 'nm-wp-gallery-popup nm-mfp-zoom-in',
							closeMarkup: '<a class="mfp-close nm-font nm-font-close2"></a>',
							removalDelay: 180,
							type: type,
							closeBtnInside: false,
							image: {
								titleSrc: 'data-mfp-title',
								//verticalFit: false
							}
                        };
                        lightboxOptions.closeOnContentClick = (type == 'inline') ? false : true; // Disable "closeOnContentClick" for inline/HTML lightboxes
                        
						$this.magnificPopup(lightboxOptions).magnificPopup('open');
					});
				});
			}
		}
	
	};
	
	
	// Add core script to $.nmTheme so it can be extended
	$.nmTheme = NmTheme.prototype;
    
	
	$(document).ready(function() {
		// Initialize script
		new NmTheme();
	});
	
	
})(jQuery);
