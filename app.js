/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./js/app.js":
/*!*******************!*\
  !*** ./js/app.js ***!
  \*******************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _headroom_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./headroom.js */ "./js/headroom.js");
/* harmony import */ var _post_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./post.js */ "./js/post.js");
/* harmony import */ var _post_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_post_js__WEBPACK_IMPORTED_MODULE_1__);



/***/ }),

/***/ "./js/headroom.js":
/*!************************!*\
  !*** ./js/headroom.js ***!
  \************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_headroom_js_dist_headroom_min_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../node_modules/headroom.js/dist/headroom.min.js */ "./node_modules/headroom.js/dist/headroom.min.js");
/* harmony import */ var _node_modules_headroom_js_dist_headroom_min_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_headroom_js_dist_headroom_min_js__WEBPACK_IMPORTED_MODULE_0__);

var header = document.querySelector('.navbar');
var headroom = new (_node_modules_headroom_js_dist_headroom_min_js__WEBPACK_IMPORTED_MODULE_0___default())(header, {
  offset: 150
});
headroom.init();

/***/ }),

/***/ "./js/post.js":
/*!********************!*\
  !*** ./js/post.js ***!
  \********************/
/***/ (() => {

(function ($) {
  $('.entry-header .circle').click(function () {
    $('html, body').animate({
      scrollTop: jQuery('.entry-content').offset().top
    });
  });
})(jQuery);

/***/ }),

/***/ "./node_modules/headroom.js/dist/headroom.min.js":
/*!*******************************************************!*\
  !*** ./node_modules/headroom.js/dist/headroom.min.js ***!
  \*******************************************************/
/***/ (function(module) {

/*!
 * headroom.js v0.12.0 - Give your page some headroom. Hide your header until you need it
 * Copyright (c) 2020 Nick Williams - http://wicky.nillia.ms/headroom.js
 * License: MIT
 */

!function(t,n){ true?module.exports=n():0}(this,function(){"use strict";function t(){return"undefined"!=typeof window}function d(t){return function(t){return t&&t.document&&function(t){return 9===t.nodeType}(t.document)}(t)?function(t){var n=t.document,o=n.body,s=n.documentElement;return{scrollHeight:function(){return Math.max(o.scrollHeight,s.scrollHeight,o.offsetHeight,s.offsetHeight,o.clientHeight,s.clientHeight)},height:function(){return t.innerHeight||s.clientHeight||o.clientHeight},scrollY:function(){return void 0!==t.pageYOffset?t.pageYOffset:(s||o.parentNode||o).scrollTop}}}(t):function(t){return{scrollHeight:function(){return Math.max(t.scrollHeight,t.offsetHeight,t.clientHeight)},height:function(){return Math.max(t.offsetHeight,t.clientHeight)},scrollY:function(){return t.scrollTop}}}(t)}function n(t,s,e){var n,o=function(){var n=!1;try{var t={get passive(){n=!0}};window.addEventListener("test",t,t),window.removeEventListener("test",t,t)}catch(t){n=!1}return n}(),i=!1,r=d(t),l=r.scrollY(),a={};function c(){var t=Math.round(r.scrollY()),n=r.height(),o=r.scrollHeight();a.scrollY=t,a.lastScrollY=l,a.direction=l<t?"down":"up",a.distance=Math.abs(t-l),a.isOutOfBounds=t<0||o<t+n,a.top=t<=s.offset[a.direction],a.bottom=o<=t+n,a.toleranceExceeded=a.distance>s.tolerance[a.direction],e(a),l=t,i=!1}function h(){i||(i=!0,n=requestAnimationFrame(c))}var u=!!o&&{passive:!0,capture:!1};return t.addEventListener("scroll",h,u),c(),{destroy:function(){cancelAnimationFrame(n),t.removeEventListener("scroll",h,u)}}}function o(t){return t===Object(t)?t:{down:t,up:t}}function s(t,n){n=n||{},Object.assign(this,s.options,n),this.classes=Object.assign({},s.options.classes,n.classes),this.elem=t,this.tolerance=o(this.tolerance),this.offset=o(this.offset),this.initialised=!1,this.frozen=!1}return s.prototype={constructor:s,init:function(){return s.cutsTheMustard&&!this.initialised&&(this.addClass("initial"),this.initialised=!0,setTimeout(function(t){t.scrollTracker=n(t.scroller,{offset:t.offset,tolerance:t.tolerance},t.update.bind(t))},100,this)),this},destroy:function(){this.initialised=!1,Object.keys(this.classes).forEach(this.removeClass,this),this.scrollTracker.destroy()},unpin:function(){!this.hasClass("pinned")&&this.hasClass("unpinned")||(this.addClass("unpinned"),this.removeClass("pinned"),this.onUnpin&&this.onUnpin.call(this))},pin:function(){this.hasClass("unpinned")&&(this.addClass("pinned"),this.removeClass("unpinned"),this.onPin&&this.onPin.call(this))},freeze:function(){this.frozen=!0,this.addClass("frozen")},unfreeze:function(){this.frozen=!1,this.removeClass("frozen")},top:function(){this.hasClass("top")||(this.addClass("top"),this.removeClass("notTop"),this.onTop&&this.onTop.call(this))},notTop:function(){this.hasClass("notTop")||(this.addClass("notTop"),this.removeClass("top"),this.onNotTop&&this.onNotTop.call(this))},bottom:function(){this.hasClass("bottom")||(this.addClass("bottom"),this.removeClass("notBottom"),this.onBottom&&this.onBottom.call(this))},notBottom:function(){this.hasClass("notBottom")||(this.addClass("notBottom"),this.removeClass("bottom"),this.onNotBottom&&this.onNotBottom.call(this))},shouldUnpin:function(t){return"down"===t.direction&&!t.top&&t.toleranceExceeded},shouldPin:function(t){return"up"===t.direction&&t.toleranceExceeded||t.top},addClass:function(t){this.elem.classList.add.apply(this.elem.classList,this.classes[t].split(" "))},removeClass:function(t){this.elem.classList.remove.apply(this.elem.classList,this.classes[t].split(" "))},hasClass:function(t){return this.classes[t].split(" ").every(function(t){return this.classList.contains(t)},this.elem)},update:function(t){t.isOutOfBounds||!0!==this.frozen&&(t.top?this.top():this.notTop(),t.bottom?this.bottom():this.notBottom(),this.shouldUnpin(t)?this.unpin():this.shouldPin(t)&&this.pin())}},s.options={tolerance:{up:0,down:0},offset:0,scroller:t()?window:null,classes:{frozen:"headroom--frozen",pinned:"headroom--pinned",unpinned:"headroom--unpinned",top:"headroom--top",notTop:"headroom--not-top",bottom:"headroom--bottom",notBottom:"headroom--not-bottom",initial:"headroom"}},s.cutsTheMustard=!!(t()&&function(){}.bind&&"classList"in document.documentElement&&Object.assign&&Object.keys&&requestAnimationFrame),s});

/***/ }),

/***/ "./sass/style.scss":
/*!*************************!*\
  !*** ./sass/style.scss ***!
  \*************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/app": 0,
/******/ 			"style": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkIds[i]] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunkeirerepublic"] = self["webpackChunkeirerepublic"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["style"], () => (__webpack_require__("./js/app.js")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["style"], () => (__webpack_require__("./sass/style.scss")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;