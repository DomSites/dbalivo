(function($) {
	
	'use strict';
	
	// Extend core script
	$.extend($.nmTheme, {
		
		/**
		 *	Initialize checkout scripts
		 */
		checkout_init: function() {
            var self = this;
            
            
            /* Bind: Login link */
            $('.showlogin').bind('click.nmShowForm', function(e) {
                e.preventDefault();
                self.loginCouponShowForm('#nm-checkout-login-form', 'nm-login-popup');
            });
            
            
            /* Bind: Coupon link */
            $('.showcoupon').bind('click.nmShowForm', function(e) {
                e.preventDefault();
                self.loginCouponShowForm('#nm-coupon-login-form', 'nm-coupon-popup');
            });
            
            
            /* Bind: Payment methods label */
            var paymentsAnim = false;
            self.$document.on('click', '#payment .wc_payment_methods label', function(e) {
                var $this = $(this).parent('li'),
                    $active = $this.parent('.wc_payment_methods').children('.active');
                
                $active.removeClass('active');
                $this.addClass('active');
                
                if (!paymentsAnim) {
                    $active.children('.payment_box').hide();
                    $this.children('.payment_box').show();
                }
            });
		},
        
        
        /**
		 *    Login/Coupon: Show popup form
		 */
		loginCouponShowForm: function($formContainer, containerClass) {
            $.magnificPopup.open({
                mainClass: containerClass + ' nm-mfp-fade-in',
                alignTop: true,
                closeMarkup: '<a class="mfp-close nm-font nm-font-close2"></a>',
                removalDelay: 180,
                items: {
                    src: $formContainer,
                    type: 'inline'
                }/*,
                callbacks: {
                    close: function() {
                        // Make sure the login form is displayed when the modal is re-opened
                        $('#nm-login-wrap').addClass('inline fade-in slide-up');
                        $('#nm-register-wrap').removeClass('inline fade-in slide-up');
                    }
                }*/
            });
        }
		
	});
	
	// Add extension so it can be called from $.nmThemeExtensions
	$.nmThemeExtensions.checkout = $.nmTheme.checkout_init;
	
})(jQuery);
