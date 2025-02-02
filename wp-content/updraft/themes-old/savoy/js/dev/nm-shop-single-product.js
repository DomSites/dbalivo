(function($) {
	
	'use strict';
	
	// Extend core script
	$.extend($.nmTheme, {
		
		/**
		 *	Initialize single product scripts
		 */
		singleProduct_init: function() {
			var self = this;
            
            
            self.zoomEnabled = (!self.isTouch && $('.woocommerce-product-gallery').hasClass('zoom-enabled'));
            
            
            /* PhotoSwipe: Bind */
            if ( typeof PhotoSwipe !== 'undefined' && wc_single_product_params.photoswipe_enabled ) {
                self.$window.load(function() {
                    self.singleProductPhotoSwipeBind();
                });
			}                                                            
            
			
            self.singleProductVariationsInit();
            self.quantityInputsBindButtons($('.summary'));
            self.singleProductGalleryArrowsInit();
            self.singleProductGalleryZoomInit();
            self.singleProductFeaturedVideoInit();
			
			
            /* Star-rating: bind click event */
			var $ratingWrap = $('#nm-comment-form-rating');
			$ratingWrap.on('click.nmAddParentClass', '.stars a', function() {
				$ratingWrap.children('.stars').addClass('has-active');
            });
			
			
            /* Related/up-sell products: Load images (init Unveil) */
			var $upsellsImages = $('#nm-upsells').find('.nm-shop-loop-thumbnail .unveil-image'),
				$relatedImages = $('#nm-related').find('.nm-shop-loop-thumbnail .unveil-image'),
				$images = $.merge($upsellsImages, $relatedImages);
			self.$window.load(function() {
				if ($images.length) {
					$images.unveil(1, function() {
						$(this).parents('li').first().addClass('image-loaded');
					});
				}
			});
            
            
            if (nm_wp_vars.shopRedirectScroll != '0') {
                /* Bind: Breadcrumbs (add query arg) */
                $('#nm-breadcrumb').find('a').bind('click.nmShopRedirect', function(e) {
                    e.preventDefault();
                    self.singleProductRedirectWithHash(this);
                });

                /* Bind: Category and tag links */
                $('#nm-product-meta').find('a').bind('click.nmShopRedirect', function(e) {
                    e.preventDefault();
                    self.singleProductRedirectWithHash(this);
                });
            }
		},
		
        
        /**
		 *	Single product: Redirect to shop with #shop URL hash (scrolls the page to the shop section)
		 */
		singleProductRedirectWithHash: function(shopLink) {
            var url = $(shopLink).attr('href');
            window.location.href = url + '#shop';
        },
		
        
		/**
		 *	Single product: Variations
		 */
		singleProductVariationsInit: function() {
			var self = this;
			
			
			/* Variations: Elements */
			self.$variationsForm = $('#nm-variations-form');
			self.$variationsWrap = self.$variationsForm.children('.variations');
			self.$variationDetailsWrap = self.$variationsForm.children('.single_variation_wrap').children('.single_variation');
            
				
			/* Variations: Select boxes */
            if (self.shopCustomSelect) {
                self.$variationsWrap.find('select').selectOrDie(self.shopSelectConfig);
            }
			
			
			/* Variation details: Init */
            self.shopCheckVariationDetails(self.$variationDetailsWrap);
            
            
            /* Variation details: Bind WooCommerce "show_variation" event */
			self.$variationDetailsWrap.on('show_variation', function() {
                //self.$variationDetailsWrap.css('display', 'block'); // Add "display:block" to skip default animation
                self.shopCheckVariationDetails(self.$variationDetailsWrap);
            });
            
            
            /* Variation details: Bind WooCommerce "hide_variation" event */
			self.$variationDetailsWrap.on('hide_variation', function() {
                self.$variationDetailsWrap.css('display', 'none'); // Add "display:none" to skip default animation
            });
			
			/* Variations select: "woocommerce_variation_select_change" event */
			self.$variationsForm.on('woocommerce_variation_select_change', function() {
                // Gallery zoom: Update image (in case a variation image is used)
				if (self.zoomEnabled) {
					self.singleProductZoomUpdateImage();
				}
			});
		},
        
        
        /**
		 *	Single product: Gallery arrows - Init
		 */
        singleProductGalleryArrowsInit() {
            var self = this,
                $galleryImages = $('.woocommerce-product-gallery__wrapper').children('.woocommerce-product-gallery__image');
            
            // Is there more than one gallery image?
            if ($galleryImages.length > 1) {
                self.singleProductGalleryArrowsOffset();
                
                $('.flex-direction-nav').addClass('show');
                
                /* Bind: Window resize */
                var timer = null;
                self.$window.resize(function() {
                    if (timer) { clearTimeout(timer); }
                    timer = setTimeout(function() {
                        self.singleProductGalleryArrowsOffset();
                    }, 250);
                });
            }
        },
        
        
        /**
		 *	Single product: Gallery arrows - Set offset
		 */
        singleProductGalleryArrowsOffset() {
            var $galleryContainer = $('.woocommerce-product-gallery'),
                $galleryArrows = $galleryContainer.children('.flex-direction-nav').find('a'),
                
                galleryContainerHeight = Math.ceil($galleryContainer.outerHeight()),
                galleryHeight = Math.ceil($galleryContainer.children('.woocommerce-product-gallery__wrapper').height()),
                
                galleryArrowDefaultOffset = $galleryArrows.first().outerHeight() / 2,
                galleryArrowOffset = (galleryContainerHeight > galleryHeight) ? (galleryContainerHeight - galleryHeight) / 2 : 0;
            
            $galleryArrows.css('marginTop', '-'+(galleryArrowDefaultOffset + galleryArrowOffset)+'px');
        },
        
        
        /**
		 *	Single product: Gallery zoom
		 */
        singleProductGalleryZoomInit: function() {
            var self = this;
            
            // Gallery: Hover zoom (EasyZoom)
            if (self.zoomEnabled) {
                self.$window.load(function() {                  
                    var $productGalleryImages = $('.woocommerce-product-gallery__wrapper').children('.woocommerce-product-gallery__image');
                    $productGalleryImages.easyZoom();
                });
            }
        },
        
        
        /**
		 *	Single product: Gallery zoom - Update image
		 */
		singleProductZoomUpdateImage: function() {
			var self = this,
				$firstGalleryImage = $('.woocommerce-product-gallery__wrapper').children('.woocommerce-product-gallery__image').first(),
				firstGalleryImageUrl = $firstGalleryImage.children('a').attr('href');
            
            if (firstGalleryImageUrl && firstGalleryImageUrl.length > 0) {
                // Get the zoom plugin API for the first gallery image
                var zoomApi = $firstGalleryImage.data('easyZoom');
                // Swap/update zoom image url
                zoomApi.swap(firstGalleryImageUrl);
            }
		},
		
		
		/**
		 *	Single product: Featured video
		 */
		singleProductFeaturedVideoInit: function() {
			var self = this;
			
			self.hasFeaturedVideo = false;
			self.$featuredVideoBtn = $('#nm-featured-video-link');
			
			if (self.$featuredVideoBtn.length) {
				self.hasFeaturedVideo = true;
				
				// Bind: Featured video button
				self.$featuredVideoBtn.bind('click', function(e) {
					e.preventDefault();
					
                    // Modal settings
                    var mfpSettings = {
						mainClass: 'nm-featured-video-popup nm-mfp-fade-in',
						closeMarkup: '<a class="mfp-close nm-font nm-font-close2"></a>',
						removalDelay: 180,
						type: 'iframe',
						closeOnContentClick: true,
						closeBtnInside: false
                    };
                    // Modal settings: YouTube - Disable related videos ("rel=0")
                    if (nm_wp_vars.shopYouTubeRelated == '0') {
                        mfpSettings['iframe'] = {
                            patterns: {
                                youtube: {
                                   src: '//www.youtube.com/embed/%id%?rel=0&autoplay=1'
                                }
                            }
                        };
                    }
                    
					// Open video modal
					self.$featuredVideoBtn.magnificPopup(mfpSettings).magnificPopup('open');
				});
			}
		},
        
        
        /**
         *  PhotoSwipe: Bind
         *  Note: Code from "../wp-content/plugins/woocommerce/assets/js/frontend/single-product.js"
         */
        singleProductPhotoSwipeBind: function() {
            var self = this;
            this.$target = $( '.woocommerce-product-gallery' );
            
            //if ( this.zoom_enabled && this.$images.length > 0 ) {
                this.$target.prepend( '<a href="#" class="woocommerce-product-gallery__trigger">🔍</a>' );
                //this.$target.on( 'click', '.woocommerce-product-gallery__trigger', this.openPhotoswipe );
                this.$target.off( 'click', '.woocommerce-product-gallery__trigger' );
                this.$target.on('click.nmGalleryTrigger', '.woocommerce-product-gallery__trigger', function(e) {
                    e.preventDefault();
                    self.singleProductPhotoswipeInit(e);
                });
            //}
            //this.$target.on( 'click', '.woocommerce-product-gallery__image a', this.openPhotoswipe );
            this.$target.off( 'click', '.woocommerce-product-gallery__image a' );
            this.$target.on('click.nmGalleryTrigger', '.woocommerce-product-gallery__image a', function(e) {
                e.preventDefault();
                self.singleProductPhotoswipeInit(e);
            });
        },
        
        
        /**
         *  PhotoSwipe: Get gallery image items
         *  Note: Code from "../wp-content/plugins/woocommerce/assets/js/frontend/single-product.js"
         */
        singleProductPhotoSwipeGetItems: function() {
            // NM
            //var $slides = this.$images,
            var $slides = $( '.woocommerce-product-gallery__wrapper' ).children(),
            // /NM
                items   = [];
            
            if ( $slides.length > 0 ) {
                $slides.each( function( i, el ) {
                    var img = $( el ).find( 'img' ),
                        large_image_src = img.attr( 'data-large_image' ),
                        large_image_w   = img.attr( 'data-large_image_width' ),
                        large_image_h   = img.attr( 'data-large_image_height' ),
                        item            = {
                            src: large_image_src,
                            w:   large_image_w,
                            h:   large_image_h,
                            title: img.attr( 'title' )
                        };
                    items.push( item );
                } );
            }
            
            return items;
        },
        
        
        /**
         *  PhotoSwipe: Init
         *  Note: Code from "../wp-content/plugins/woocommerce/assets/js/frontend/single-product.js"
         */
        singleProductPhotoswipeInit: function( e ) {
            // NM
            //e.preventDefault();
            var self = this;
            // /NM
            
            var pswpElement = $( '.pswp' )[0],
                // NM
                //items       = this.getGalleryItems(),
                items  = self.singleProductPhotoSwipeGetItems(),
                // /NM
                eventTarget = $( e.target ),
                clicked;
            
            if ( ! eventTarget.is( '.woocommerce-product-gallery__trigger' ) ) {
                clicked = eventTarget.closest( '.woocommerce-product-gallery__image' );
            } else {
                clicked = this.$target.find( '.flex-active-slide' );
            }
            
            var options = {
                index:                 $( clicked ).index(),
                // NM
                /*shareEl:               false,
                closeOnScroll:         false,
                history:               false,
                hideAnimationDuration: 0,
                showAnimationDuration: 0*/
                history:               false,
                showHideOpacity:       true,
                showAnimationDuration: 0,
                bgOpacity:             1, // Note: Setting this below "1" makes slide transition slow in Chrome (using "rgba" background instead)
                loop:                  false,
                closeOnVerticalDrag:   false,
                barsSize:              { top: 0, bottom: 0 },
                shareE1:               true,
                tapToClose:            true,
                tapToToggleControls:   false
                // /NM
            };

            // Initializes and opens PhotoSwipe.
            var photoswipe = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options );
		    photoswipe.init();
            
            // NM
            // PhotoSwipe "beforeChange" event
            var slide = options.index;
            photoswipe.listen('beforeChange', function(dirVal) {
				slide = slide + dirVal;
                $('.woocommerce-product-gallery').flexslider(slide); // Go to slide
            });
            // /NM
        }
		
	});
	
	// Add extension so it can be called from $.nmThemeExtensions
	$.nmThemeExtensions.singleProduct = $.nmTheme.singleProduct_init;
	
})(jQuery);