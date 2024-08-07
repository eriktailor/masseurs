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
   * Logout button clicked
   */
  $('#logoutButton').on('click', function (event) {
    event.preventDefault();
    $('#logout-form').submit();
  });

  /**
   * Run select input placeholder color change function
   */
  selectPlaceholderColor();
  $(document).on('change', '.form-select', selectPlaceholderColor);

  /**
   * Run hide loading div in modal after content loaded
   */
  $('#masseurModal').on('show.bs.modal', hideLoadingDiv);

  /**
   * Run submit the masseur form from modal
   */
  $('#storeMasseurButton').on('click', submitMasseurForm);

  /**
   * Run masonry on masseurs listing on page load
   */
  $('#masseursList').masonry({
    'percentPosition': true
  });

  /**
   * Run masseurs sort & filter function if filters change
   */
  $('#sortBySelect').on('change', sortMasseurs);
  $('#salonSelect').on('change', sortMasseurs);
  $('#statusSelect').on('change', sortMasseurs);
  $('#searchField').on('keyup', sortMasseurs);

  /**
   * Run edit or just view masseur modal
   */
  $('.edit-masseur').on('click', openMasseurModal);

  /**
   * Run date input formatter when user types in
   */
  $('.date-input').on('input', formatDateField);

  /**
   * Run profile image uploader feature on avatar click
   */
  masseurAvatarUpload('#masseurProfileImageHover', '#masseurProfileImageHidden', '#masseurProfileImage');

  // END Dom Ready ---------------------------------------------------------------------------
});

// FUNCTIONS -------------------------------------------------------------------------------

/**
 * Function to change select inputs placeholder color
 */
function selectPlaceholderColor() {
  $('.form-select').each(function () {
    var select_val = $(this).val();
    if (select_val != '') {
      $(this).removeClass('select-placeholder');
    } else {
      $(this).addClass('select-placeholder');
    }
  });
}

/**
 * Function to hide loading divs after open modals
 */
function hideLoadingDiv() {
  setTimeout(function () {
    $('.loading-div').fadeOut(500);
    setTimeout(function () {
      $('.loading-div').addClass('invisible');
    }, 400);
  }, 1000);
}

/**
 * Function to edit or view a masseur in modal
 */
function openMasseurModal() {
  var masseurId = $(this).data('masseur-id');
  $('#masseurForm').trigger('reset');
  $('#masseurProfileImage').attr('src', '/img/noimage.png');
  $('#loadingDiv').removeClass('invisible');
  $.ajax({
    url: '/masseurs/fetch/' + masseurId,
    method: 'GET',
    success: function success(res) {
      console.log(res);
      if (res.details.avatar !== null) {
        $('#masseurProfileImage').attr('src', res.details.avatar);
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
}

/**
 * Function to store masseur date from form in modal
 */
function submitMasseurForm(e) {
  e.preventDefault();
  $('#masseurForm').submit();
}

/**
 * Function to sort & filter masseurs listing dynamically
 */
function sortMasseurs() {
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
function formatDateField(e) {
  // Remove all non-digit characters
  var value = e.target.value.replace(/\D/g, '');
  var formattedValue = '';
  if (value.length <= 4) {
    formattedValue = value;
  } else if (value.length <= 6) {
    formattedValue = value.slice(0, 4) + '-' + value.slice(4);
  } else {
    formattedValue = value.slice(0, 4) + '-' + value.slice(4, 6) + '-' + value.slice(6);
  }
  e.target.value = formattedValue;
}

/**
 * Function to open file browser at avatar click
 */
function masseurAvatarUpload(hoverDivId, fileInputId, imageId) {
  // When the hover div is clicked
  $(hoverDivId).on('click', function (event) {
    event.stopPropagation(); // Prevent any event propagation issues
    $(fileInputId).trigger('click');
  });

  // When a file is selected
  $(fileInputId).on('change', function (event) {
    var input = event.target;
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $(imageId).attr('src', e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
    }
  });
}

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