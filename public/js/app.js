/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/***/ (() => {

$(document).ready(function () {
  // START Dom Ready -------------------------------------------------------------------------

  /**
   * Initialize ajax
   */
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  /**
   * Initialize tooltips
   */
  $('[data-bs-toggle="tooltip"]').tooltip({
    trigger: 'hover',
    html: true
  });

  /**
   * Select input placeholder color fix
   */
  function select_placeholder() {
    $('.form-select').each(function () {
      var select_val = $(this).val();
      if (select_val != '') {
        $(this).removeClass('select-placeholder');
      } else {
        $(this).addClass('select-placeholder');
      }
    });
  }
  $(document).on('change', '.form-select', function () {
    select_placeholder();
  });
  select_placeholder();

  /**
   * Edit or view a masseur
   */
  $('.edit-masseur').on('click', function () {
    var masseurId = $(this).data('masseur-id');
    $.ajax({
      url: '/masseurs/fetch/' + masseurId,
      method: 'GET',
      success: function success(res) {
        console.log(res);
        if (res.details.avatar !== null) {
          $('#masseurProfileImage').attr('src', res.details.avatar);
          $('#masseurProfileImageHidden').val(res.details.avatar);
        } else {
          $('#masseurProfileImage').attr('src', '/img/noimage.png');
        }
        $('#masseurShortName').text(res.name);
        $('#masseurName').val(res.name);
        $('#masseurFullName').val(res.full_name);
        $('#masseurMotherName').val(res.details.mother_name);
        $('#masseurBirthDate').val(res.details.birth_date);
        $('#masseurBirthPlace').val(res.details.birth_place);
        $('#masseurVisaNumber').val(res.details.visa_number);
        $('#masseurVisaExpire').val(res.details.visa_expire);
        $('#masseurPassportNumber').val(res.details.passport_number);
        $('#masseurPassportExpire').val(res.details.passport_expire);
        $('#masseurIntroduction').val(res.introduction);
        $('#masseurOtherNotes').val(res.details.notes);
      },
      error: function error(jqXHR, textStatus, errorThrown) {
        console.error('AJAX call failed: ', textStatus, errorThrown);
      }
    });
  });

  /**
   * Submit the store masseur form
   */
  $('#storeMasseurButton').on('click', function (event) {
    event.preventDefault();
    $('#storeMasseurForm').submit();
  });

  /**
   * Run masonry on masseurs listing on page load
   */
  $('#masseursList').masonry({
    'percentPosition': true
  });

  /**
   * Function to sort masseurs listing dynamically
   */
  function fetchMasseurs() {
    var sortBy = $('#sortBySelect').val();
    var salonId = $('#salonSelect').val();
    var status = $('#statusSelect').val();
    var searchQuery = $('#searchField').val();
    $.ajax({
      url: '/masseurs/sort',
      type: 'GET',
      data: {
        sortBy: sortBy,
        salonId: salonId,
        status: status,
        searchQuery: searchQuery
      },
      success: function success(data) {
        $('#masseursList').html(data);
        $('#masseursList').masonry('reloadItems').masonry({
          'percentPosition': true
        });
      }
    });
  }

  /**
   * Function to format date fields dynamically
   */
  function formatDateField() {
    var value = e.target.value.replace(/\D/g, ''); // Remove all non-digit characters
    if (value.length > 8) {
      value = value.slice(0, 8); // Limit input to 8 digits
    }
    var formattedValue = value;
    if (value.length >= 5) {
      formattedValue = value.slice(0, 4) + '-' + value.slice(4, 6) + '-' + value.slice(6, 8);
    } else if (value.length >= 3) {
      formattedValue = value.slice(0, 4) + '-' + value.slice(4, 6);
    } else if (value.length >= 1) {
      formattedValue = value.slice(0, 4);
    }
    e.target.value = formattedValue;
  }

  /**
   * Run masseurs sort function if filters change
   */
  $('#sortBySelect').on('change', fetchMasseurs);
  $('#salonSelect').on('change', fetchMasseurs);
  $('#statusSelect').on('change', fetchMasseurs);
  $('#searchField').on('keyup', fetchMasseurs);

  /**
   * Run date input formatter when user types in
   */
  $('.date-input').on('input', formatDateField);

  // END Dom Ready ---------------------------------------------------------------------------
});

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
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
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
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
/******/ 			"/js/app": 0,
/******/ 			"css/app": 0
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
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/js/app.js")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/sass/app.scss")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;