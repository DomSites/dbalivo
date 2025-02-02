/* Snapback Cache: https://github.com/highrisehq/snapback_cache */
var SnapbackCache = (function(options) {
    var options = options || {};

    var SessionStorageHash = (function() {
        var set = function(namespace, key, item) {
            var storageHash = sessionStorage.getItem(namespace);
            
            if (! storageHash) {
                storageHash = {}
            } else {
                storageHash = JSON.parse(storageHash)
            }

            if (item) {
                storageHash[key] = JSON.stringify(item)
            } else {
                delete storageHash[key]
            }

            sessionStorage.setItem(namespace, JSON.stringify(storageHash))
        };

        var get = function(namespace, key, item) {
            var storageHash = sessionStorage.getItem(namespace)

            if (storageHash) {
                storageHash = JSON.parse(storageHash)
                if (storageHash[key]) {
                    return JSON.parse(storageHash[key])
                }
            }

            return null
        }

        return {
            set: set,
            get: get
        }
    })();

    var enabled = true;

    var supported = function() {
        return !!(sessionStorage && history && enabled)
    };

    var setItem = function(url, value){
        if (value) {
            // Only keep 10 things cached
            trimStorage()
        }
        SessionStorageHash.set('pageCache', url, value)
    };

    var getItem = function(url) {
        return SessionStorageHash.get('pageCache', url)
    };

    var removeItem = function(url) {
        setItem(url, null)
    };

    var disableAutofocusIfReplacingCachedPage = function() {
        if (typeof options.removeAutofocus === 'function') {
            if (willUseCacheOnThisPage()) {
                options.removeAutofocus()
            }
        }
    };

    var cachePage = function() {
        //console.log('NM Snapback: CACHING START');

        if (! supported()) {
            return;
        }
        
        //console.log('NM Snapback: CACHING SUPPORTED');
        
        // Get jQuery animations to finish
        /*jQuery(document).finish();
        if (typeof options.wait === 'function') {
            options.finish()
        }*/

        // Give transitions/animations a chance to finish
        //setTimeout(function() {
        if (typeof options.removeAutofocus === 'function') {
            options.removeAutofocus();
        }

        var $cachedBody = jQuery(options.bodySelector);
        
        //console.log('NM Snapback: CACHED BODY BELOW:');
        //console.log($cachedBody);
        
        // NM: Remove "loader" class from pagination
        $cachedBody.children('.nm-infload-controls').removeClass('nm-loader');
        // /NM
        
        var cachedPage = {
            body: $cachedBody.html(),
            // NM
            wrapperClass: jQuery(options.bodySelector).attr('class'),
            // /NM
            // NM: title: document.title,
            positionY: window.pageYOffset,
            positionX: window.pageXOffset,
            cachedAt: new Date().getTime()
        }

        // Help to setup the next page of infinite scrolling
        /*if (typeof options.nextPageOffset === 'function') {
            cachedPage.nextPageOffset = options.nextPageOffset()
        }*/
        
        setItem(document.location.href, cachedPage);
        
        jQuery(options.bodySelector).trigger('snapback-cache:cached', cachedPage);
        //}, 500)
    };

    var loadFromCache = function(/*noCacheCallback*/){
        // Check if there is a cache and if its less than 15 minutes old
        if (willUseCacheOnThisPage()) {
            var cachedPage = getItem(document.location.href);

            //console.log('NM Snapback: LOADING CACHE');

            // NM: Add previous classes to wrapper container
            var $bodySelector = jQuery(options.bodySelector);
            $bodySelector.removeClass().addClass(cachedPage.wrapperClass);
            // /NM

            // Replace the content and scroll
            // NM
            //jQuery(options.bodySelector).html(cachedPage.body)
            $bodySelector.html(cachedPage.body);
            // NM
            
            // NM: Show hidden products (in case cache was saved when products were just added)
            setTimeout(function() {
                var $hiddenProducts = $bodySelector.children('.nm-products').children('.hide');
                if ($hiddenProducts.length) {
                    $hiddenProducts.find('.lazyloading').removeClass('lazyloading').addClass('lazyloaded');
                    $hiddenProducts.removeClass('hide');
                }
            }, 300);
            // /NM
            
            // Try to make sure autofocus events don't run. 
            if (typeof options.removeAutofocus === 'function') {
                options.removeAutofocus();
            }

            // IE 10+ needs a delay to stop the autofocus during dom load
            setTimeout(function() {
                window.scrollTo(cachedPage.positionX, cachedPage.positionY)
            }, 1);

            // Pop the cache
            removeItem(document.location.href);

            // NM: Reset page cache views
            sessionStorage.setItem('pageCacheViews', 1);
            // /NM

            jQuery(options.bodySelector).trigger('snapback-cache:loaded', cachedPage);

            return false;
        } else {
            return
        }
    };

    var trimStorage = function() {
        var storageHash = sessionStorage.getItem('pageCache');
        
        if (storageHash) {
            storageHash = JSON.parse(storageHash);

            var tuples = [];

            for (var key in storageHash) {
                tuples.push([key, storageHash[key]])
            }
            
            // If storage is bigger than size, sort them, and remove oldest
            if (tuples.length >= 10) {
                tuples.sort(function(a, b) {
                    a = a[1].cachedAt;
                    b = b[1].cachedAt;
                    return b < a ? -1 : (b > a ? 1 : 0);
                });

                for (var i = 0; i < (tuples.length + 1 - 10); i++) {
                    var key = tuples[i][0];
                    delete storageHash[key];
                }

                sessionStorage.setItem(namespace, JSON.stringify(storageHash));
            }
        }
    };

    var willUseCacheOnThisPage = function() {
        if (! supported()) {
            return false;
        }

        var cachedPage = getItem(document.location.href);

        // Check if there is a cache and if its less than 15 minutes old
        if (cachedPage && cachedPage.cachedAt > (new Date().getTime()-900000)) {
            // NM: Remove cache after 2 page loads
            var pageViews = sessionStorage.getItem('pageCacheViews');
            
            //console.log('NM Snapback: PAGE VIEWS: '+pageViews);
            
            if (parseInt(pageViews) > 3) {
                //console.log('NM Snapback: PAGE VIEWS - REMOVING CACHE');

                removeItem(document.location.href);
                sessionStorage.setItem('pageCacheViews', 1);
                return false;
            }
            // /NM
            
            //console.log('NM Snapback: CACHE FOUND');

            return true; 
        } else {
            return false;
        }
    };
    
    jQuery(function() {
        disableAutofocusIfReplacingCachedPage()
    });

    jQuery(window).on('load', function() {
        loadFromCache()
    });

    return {
        remove: removeItem,
        loadFromCache: loadFromCache,
        cachePage: cachePage,
        willUseCacheOnThisPage: willUseCacheOnThisPage
    }
});