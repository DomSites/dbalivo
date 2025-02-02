/* <![CDATA[ */
(function($){
	
	"use strict";

    var Slide = function(el) {
        this.el = el;
        this.txt = new TextFx(this.el.querySelector('.title'));
    },
    // The Slideshow obj.
    Slideshow = function(el) {
        this.el = el;
        this.current = 0;
        this.slides = [];
        var self = this;
        [].slice.call(this.el.querySelectorAll('.ut-word-effect-slide')).forEach(function(slide) {
            self.slides.push(new Slide(slide));
        });
        this.slidesTotal = this.slides.length;
        this.effect = this.el.getAttribute('data-effect');
    };
    
    Slideshow.prototype._navigate = function(direction) {
        if( this.isAnimating ) {
            return false;
        }
        this.isAnimating = true;
    
        var self = this, currentSlide = this.slides[this.current];
    
        this.current = direction === 'next' ? (this.current < this.slidesTotal - 1 ? this.current + 1 : 0) : (this.current = this.current > 0 ? this.current - 1 : this.slidesTotal - 1);
        var nextSlide = this.slides[this.current];
    
        var checkEndCnt = 0, checkEnd = function() {
            ++checkEndCnt;
            if( checkEndCnt === 2 ) {
                currentSlide.el.classList.remove('slide--current');
                nextSlide.el.classList.add('slide--current');
                self.isAnimating = false;
            }
        };
        
        // Call the TextFx hide method and pass the effect string defined in the data-effect attribute of the Slideshow element.
        currentSlide.txt.hide(this.effect, function() {
            currentSlide.el.style.opacity = 0;
            checkEnd();
        });
        // First hide the next slide´s TextFx text.
        nextSlide.txt.hide();
        nextSlide.el.style.opacity = 1;
        // And now call the TextFx show method.
        nextSlide.txt.show(this.effect, function() {
            checkEnd();
        });
    };
    
    Slideshow.prototype.next = function() { this._navigate('next'); };
    
    Slideshow.prototype.prev = function() { this._navigate('prev');	};
    
    [].slice.call(document.querySelectorAll('.ut-word-effects')).forEach(function(el) {
        
        var slideshow = new Slideshow(el);
        
        setInterval(function(){ slideshow.next(); }, 3000);            
                    
    });

})(jQuery);
 /* ]]> */    	