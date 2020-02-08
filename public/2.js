(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[2],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Films.vue?vue&type=script&lang=js&":
/*!****************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Films.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_1__);


function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  name: 'FilmList',
  mounted: function mounted() {
    this.getFilms();
  },
  methods: {
    getFilms: function getFilms() {
      var _this = this;

      return _asyncToGenerator(
      /*#__PURE__*/
      _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee() {
        var response;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                _this.submitting = true;
                _context.next = 3;
                return axios__WEBPACK_IMPORTED_MODULE_1___default.a.get('api/films?page=' + _this.pagination.current_page);

              case 3:
                response = _context.sent.data;
                _this.submitting = false;
                _this.films = response.data;
                _this.pagination = response.meta.pagination;

              case 7:
              case "end":
                return _context.stop();
            }
          }
        }, _callee);
      }))();
    },
    goToPage: function goToPage(page) {
      this.pagination.current_page = page;
      this.getFilms();
    }
  },
  data: function data() {
    return {
      submitting: false,
      films: [],
      pagination: {
        total: 0,
        current_page: 1
      }
    };
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Films.vue?vue&type=template&id=dad836d8&":
/*!********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Films.vue?vue&type=template&id=dad836d8& ***!
  \********************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _vm._l(_vm.films, function(film) {
        return _vm.films.length > 0
          ? _c("div", [
              !_vm.submitting
                ? _c("div", [
                    _c("h1", [_vm._v(_vm._s(film.name))]),
                    _vm._v(" "),
                    _c("p", [_vm._v(_vm._s(film.description))]),
                    _vm._v(" "),
                    _c(
                      "p",
                      [
                        _c(
                          "router-link",
                          {
                            staticClass: "btn btn-lg btn-primary",
                            attrs: {
                              href: "",
                              role: "button",
                              to: {
                                name: "films.detail",
                                params: { slug: film.slug }
                              }
                            }
                          },
                          [
                            _vm._v(
                              "\n                    View Details\n                "
                            )
                          ]
                        )
                      ],
                      1
                    )
                  ])
                : _c("div", [_vm._v("\n            Loading...\n        ")])
            ])
          : _c("div", [_vm._v("\n        Loading...\n    ")])
      }),
      _vm._v(" "),
      _c("div", [
        _c("nav", { attrs: { "aria-label": "Page navigation" } }, [
          _c(
            "ul",
            { staticClass: "pagination" },
            [
              _vm.pagination.current_page > 1
                ? _c("li", [
                    _c(
                      "a",
                      {
                        attrs: { href: "#", "aria-label": "Previous" },
                        on: {
                          click: function($event) {
                            $event.preventDefault()
                            return _vm.goToPage(_vm.pagination.current_page - 1)
                          }
                        }
                      },
                      [
                        _c("span", { attrs: { "aria-hidden": "true" } }, [
                          _vm._v("«")
                        ])
                      ]
                    )
                  ])
                : _vm._e(),
              _vm._v(" "),
              _vm._l(_vm.pagination.total, function(page) {
                return _c(
                  "li",
                  {
                    class: { active: page == _vm.pagination.current_page },
                    on: {
                      click: function($event) {
                        $event.preventDefault()
                        return _vm.goToPage(page)
                      }
                    }
                  },
                  [_c("a", { attrs: { href: "#" } }, [_vm._v(_vm._s(page))])]
                )
              }),
              _vm._v(" "),
              _vm.pagination.current_page < _vm.pagination.total
                ? _c("li", [
                    _c(
                      "a",
                      {
                        attrs: { href: "#", "aria-label": "Next" },
                        on: {
                          click: function($event) {
                            $event.preventDefault()
                            return _vm.goToPage(_vm.pagination.current_page + 1)
                          }
                        }
                      },
                      [
                        _c("span", { attrs: { "aria-hidden": "true" } }, [
                          _vm._v("»")
                        ])
                      ]
                    )
                  ])
                : _vm._e()
            ],
            2
          )
        ])
      ])
    ],
    2
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/Films.vue":
/*!*******************************************!*\
  !*** ./resources/js/components/Films.vue ***!
  \*******************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Films_vue_vue_type_template_id_dad836d8___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Films.vue?vue&type=template&id=dad836d8& */ "./resources/js/components/Films.vue?vue&type=template&id=dad836d8&");
/* harmony import */ var _Films_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Films.vue?vue&type=script&lang=js& */ "./resources/js/components/Films.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Films_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Films_vue_vue_type_template_id_dad836d8___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Films_vue_vue_type_template_id_dad836d8___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/Films.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/Films.vue?vue&type=script&lang=js&":
/*!********************************************************************!*\
  !*** ./resources/js/components/Films.vue?vue&type=script&lang=js& ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Films_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./Films.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Films.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Films_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/Films.vue?vue&type=template&id=dad836d8&":
/*!**************************************************************************!*\
  !*** ./resources/js/components/Films.vue?vue&type=template&id=dad836d8& ***!
  \**************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Films_vue_vue_type_template_id_dad836d8___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./Films.vue?vue&type=template&id=dad836d8& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Films.vue?vue&type=template&id=dad836d8&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Films_vue_vue_type_template_id_dad836d8___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Films_vue_vue_type_template_id_dad836d8___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);