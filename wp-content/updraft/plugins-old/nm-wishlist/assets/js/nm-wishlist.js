(function($) {
	
	'use strict';
	
	/* NM Wishlist */
	var NM_Wishlist = {
		
		/**
		 *	Initialize Wishlist
		 */
		init: function() {
			var self = this,
                wishlistAjax = false,
                $wishlistAjaxButton;
			
			
			/* Update wishlist button classes for added items */
			if ($.cookie) {
				var wishlistCookie = $.cookie('nm-wishlist-items');
				if (wishlistCookie) {
					wishlistCookie = JSON.parse(wishlistCookie);
					
					for (var id in wishlistCookie) {
						if (wishlistCookie.hasOwnProperty(id)) {
							$('#nm-wishlist-item-' + id + '-button').addClass('added');
						}
					}
				}
			}
			
			
			/* Bind: Wishlist buttons */
			$(document).on('click', '.nm-wishlist-button', function(e) {
				e.preventDefault();
				
                var $this = $(this),
                    productId = $this.data('product-id');
                
                // Is an Ajax request already running?
				if (wishlistAjax) {
                    if ($this.hasClass('ajax-running')) {
                        wishlistAjax.abort(); // Abort Ajax request
                        wishlistAjax = false;
                    } else {
                        return;
                    }
				}
				
                $this.addClass('ajax-running');
                $wishlistAjaxButton = $this;
                
				var $buttons = $('.nm-wishlist-item-' + productId + '-button'), // Get all wishlist buttons on the page with the same product-id
                    removeItem = $buttons.first().hasClass('added') ? 1 : 0; // Should the item be added or removed?
                
				$buttons.toggleClass('added');
                
				wishlistAjax = $.ajax({
					type: 'POST',
					url: nm_wp_vars.ajaxUrl,
					data: {
						action: 'nm_wishlist_toggle',
                        remove_item: removeItem,
						product_id: productId
					},
					dataType: 'json',
					cache: false,
					headers: {'cache-control': 'no-cache'},
					complete: function() {
                        $wishlistAjaxButton.removeClass('ajax-running');
                        wishlistAjax = false;
                    },
                    success: function(json) {
                        if (json.status === '1') {
							$buttons.attr('title', nm_wishlist_vars.wlButtonTitleRemove); // Change button(s) title attribute
							$('body').trigger('wishlist_added_item');
						} else {
							$buttons.attr('title', nm_wishlist_vars.wlButtonTitleAdd); // Change button(s) title attribute
							$('body').trigger('wishlist_removed_item');
						}
					}
				});
			});
			
			
			var $wishlistTable = $('#nm-wishlist-table');
			
			
			if ($wishlistTable.length) {
				/* Function: Remove wishlist item */
				var _wishlistRemoveItem = function($this) {
					var	$thisTr = $this.closest('tr'),
						productId = $thisTr.data('product-id');
                    
					$.ajax({
						type: 'POST',
						url: nm_wp_vars.ajaxUrl,
						data: {
							action: 'nm_wishlist_toggle',
							remove_item: 1,
                            product_id: productId
						},
						dataType: 'json',
						cache: false,
						headers: {'cache-control': 'no-cache'},
						success: function(json) {
                            $('body').trigger('wishlist_removed_item');
						}
					});
					
					// Show "wishlist empty" container
					if ($wishlistTable.children('tbody').children('tr').not('.hiding').length == 1) {
						$('#nm-wishlist').css('display', 'none');
						$('#nm-wishlist-empty').addClass('show');
					}
										
					$thisTr.addClass('hiding').fadeOut(300, function() {
						$(this).remove();
					});	
				};
				
				
				/* Bind: Wishlist remove links */
				$wishlistTable.find('.title .nm-wishlist-remove').bind('click', function(e) {
					e.preventDefault();
					
					var $this = $(this);
					
					if ($this.hasClass('clicked')) { return; }
					
					$this.addClass('clicked');
					
					_wishlistRemoveItem($this);
				});
				
				
                /* Event - Add-to-cart: Remove wishlist item after adding it to the cart */
                $(document.body).on('added_to_cart', function(event, fragments, cartHash, $thisbutton) {
                    _wishlistRemoveItem($thisbutton);
                });
            }
		}
		
	}
	
	$(document).ready(function() {
		// Initialize script
		NM_Wishlist.init();
	});
	
})(jQuery);
