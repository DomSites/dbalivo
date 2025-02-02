/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
(self["vcvWebpackJsonp4x"] = self["vcvWebpackJsonp4x"] || []).push([["element"],{

/***/ "./separator/component.js":
/*!********************************!*\
  !*** ./separator/component.js ***!
  \********************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"default\": function() { return /* binding */ BasicSeparator; }\n/* harmony export */ });\n/* harmony import */ var _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/extends */ \"./node_modules/@babel/runtime/helpers/esm/extends.js\");\n/* harmony import */ var _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/toConsumableArray */ \"./node_modules/@babel/runtime/helpers/esm/toConsumableArray.js\");\n/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/classCallCheck */ \"./node_modules/@babel/runtime/helpers/esm/classCallCheck.js\");\n/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @babel/runtime/helpers/createClass */ \"./node_modules/@babel/runtime/helpers/esm/createClass.js\");\n/* harmony import */ var _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @babel/runtime/helpers/inherits */ \"./node_modules/@babel/runtime/helpers/esm/inherits.js\");\n/* harmony import */ var _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @babel/runtime/helpers/possibleConstructorReturn */ \"./node_modules/@babel/runtime/helpers/esm/possibleConstructorReturn.js\");\n/* harmony import */ var _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @babel/runtime/helpers/getPrototypeOf */ \"./node_modules/@babel/runtime/helpers/esm/getPrototypeOf.js\");\n/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! react */ \"./node_modules/react/index.js\");\n/* harmony import */ var vc_cake__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! vc-cake */ \"./node_modules/vc-cake/index.js\");\n/* harmony import */ var vc_cake__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(vc_cake__WEBPACK_IMPORTED_MODULE_8__);\n\n\n\n\n\n\n\n\nfunction _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = (0,_babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_6__[\"default\"])(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = (0,_babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_6__[\"default\"])(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return (0,_babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_5__[\"default\"])(this, result); }; }\n\nfunction _isNativeReflectConstruct() { if (typeof Reflect === \"undefined\" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === \"function\") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); return true; } catch (e) { return false; } }\n\n\n\nvar vcvAPI = vc_cake__WEBPACK_IMPORTED_MODULE_8___default().getService('api');\n\nvar BasicSeparator = /*#__PURE__*/function (_vcvAPI$elementCompon) {\n  (0,_babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_4__[\"default\"])(BasicSeparator, _vcvAPI$elementCompon);\n\n  var _super = _createSuper(BasicSeparator);\n\n  function BasicSeparator() {\n    (0,_babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_2__[\"default\"])(this, BasicSeparator);\n\n    return _super.apply(this, arguments);\n  }\n\n  (0,_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_3__[\"default\"])(BasicSeparator, [{\n    key: \"getColorSelector\",\n    value: function getColorSelector(color) {\n      return (0,_babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_1__[\"default\"])(color.matchAll(/[\\da-f]+/gi)).map(function (match) {\n        return match[0];\n      }).join('-');\n    }\n  }, {\n    key: \"render\",\n    value: function render() {\n      var _this$props = this.props,\n          id = _this$props.id,\n          atts = _this$props.atts,\n          editor = _this$props.editor;\n      var alignment = atts.alignment,\n          customClass = atts.customClass,\n          metaCustomId = atts.metaCustomId,\n          style = atts.style,\n          color = atts.color,\n          width = atts.width,\n          thickness = atts.thickness;\n\n      var classNames = __webpack_require__(/*! classnames */ \"./node_modules/classnames/index.js\");\n\n      var customProps = {};\n      var separator;\n      var containerClasses = ['vce', 'vce-separator-container'];\n      var classes = ['vce-separator'];\n\n      if (typeof customClass === 'string' && customClass) {\n        containerClasses.push(customClass);\n      }\n\n      if (alignment) {\n        containerClasses.push(\"vce-separator--align-\".concat(alignment));\n      }\n\n      if (style) {\n        containerClasses.push(\"vce-separator--style-\".concat(style));\n      }\n\n      classes.push(\"vce-separator--color-\".concat(this.getColorSelector(color)));\n      classes.push(\"vce-separator--width-\".concat(width));\n      classes.push(\"vce-separator--thickness-\".concat(thickness));\n\n      if (metaCustomId) {\n        customProps.id = metaCustomId;\n      }\n\n      classes = classNames(classes);\n      containerClasses = classNames(containerClasses);\n      var doMargin = this.applyDO('margin');\n      var doRest = this.applyDO('border padding background animation');\n\n      if (style === 'shadow') {\n        separator = /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_7__.createElement(\"div\", (0,_babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__[\"default\"])({\n          className: classes\n        }, customProps, doRest), /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_7__.createElement(\"div\", {\n          className: \"vce-separator-shadow vce-separator-shadow-left\"\n        }), /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_7__.createElement(\"div\", {\n          className: \"vce-separator-shadow vce-separator-shadow-right\"\n        }));\n      } else {\n        separator = /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_7__.createElement(\"div\", (0,_babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__[\"default\"])({\n          className: classes\n        }, customProps, doRest));\n      }\n\n      return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_7__.createElement(\"div\", (0,_babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__[\"default\"])({\n        className: containerClasses\n      }, editor, {\n        id: 'el-' + id\n      }, doMargin), separator);\n    }\n  }]);\n\n  return BasicSeparator;\n}(vcvAPI.elementComponent);\n\n\n\n//# sourceURL=webpack:///./separator/component.js?");

/***/ }),

/***/ "./separator/index.js":
/*!****************************!*\
  !*** ./separator/index.js ***!
  \****************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var vc_cake__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vc-cake */ \"./node_modules/vc-cake/index.js\");\n/* harmony import */ var vc_cake__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(vc_cake__WEBPACK_IMPORTED_MODULE_0__);\n/* harmony import */ var _component__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./component */ \"./separator/component.js\");\n/* eslint-disable import/no-webpack-loader-syntax */\n\n\nvar vcvAddElement = vc_cake__WEBPACK_IMPORTED_MODULE_0___default().getService('cook').add;\nvcvAddElement(__webpack_require__(/*! ./settings.json */ \"./separator/settings.json\"), // Component callback\nfunction (component) {\n  component.add(_component__WEBPACK_IMPORTED_MODULE_1__[\"default\"]);\n}, // css settings // css for element\n{\n  css: __webpack_require__(/*! raw-loader!./styles.css */ \"./node_modules/raw-loader/index.js!./separator/styles.css\"),\n  editorCss: __webpack_require__(/*! raw-loader!./editor.css */ \"./node_modules/raw-loader/index.js!./separator/editor.css\"),\n  mixins: {\n    basicColor: {\n      mixin: __webpack_require__(/*! raw-loader!./cssMixins/basicColor.pcss */ \"./node_modules/raw-loader/index.js!./separator/cssMixins/basicColor.pcss\")\n    },\n    separatorWidth: {\n      mixin: __webpack_require__(/*! raw-loader!./cssMixins/separatorWidth.pcss */ \"./node_modules/raw-loader/index.js!./separator/cssMixins/separatorWidth.pcss\")\n    },\n    separatorThickness: {\n      mixin: __webpack_require__(/*! raw-loader!./cssMixins/separatorThickness.pcss */ \"./node_modules/raw-loader/index.js!./separator/cssMixins/separatorThickness.pcss\")\n    }\n  }\n}, '');\n\n//# sourceURL=webpack:///./separator/index.js?");

/***/ }),

/***/ "./node_modules/raw-loader/index.js!./separator/cssMixins/basicColor.pcss":
/*!************************************************************************************!*\
  !*** ../../node_modules/raw-loader/index.js!./separator/cssMixins/basicColor.pcss ***!
  \************************************************************************************/
/***/ (function(module) {

eval("module.exports = \".vce-separator--color-$selector {\\n  color: $color;\\n}\"\n\n//# sourceURL=webpack:///./separator/cssMixins/basicColor.pcss?../../node_modules/raw-loader/index.js");

/***/ }),

/***/ "./node_modules/raw-loader/index.js!./separator/cssMixins/separatorThickness.pcss":
/*!********************************************************************************************!*\
  !*** ../../node_modules/raw-loader/index.js!./separator/cssMixins/separatorThickness.pcss ***!
  \********************************************************************************************/
/***/ (function(module) {

eval("module.exports = \".vce-separator--thickness-$selector {\\n  &::before {\\n    border-width: $(thickness)px;\\n  }\\n  .vce-separator-shadow {\\n    height: calc($(thickness)px * 2.5);\\n  }\\n  .vce-separator-shadow-left {\\n    &::before {\\n      box-shadow: 10px 10px 10px $(thickness)px;\\n    }\\n  }\\n  .vce-separator-shadow-right {\\n    &::before {\\n      box-shadow: -10px 10px 10px $(thickness)px;\\n    }\\n  }\\n}\"\n\n//# sourceURL=webpack:///./separator/cssMixins/separatorThickness.pcss?../../node_modules/raw-loader/index.js");

/***/ }),

/***/ "./node_modules/raw-loader/index.js!./separator/cssMixins/separatorWidth.pcss":
/*!****************************************************************************************!*\
  !*** ../../node_modules/raw-loader/index.js!./separator/cssMixins/separatorWidth.pcss ***!
  \****************************************************************************************/
/***/ (function(module) {

eval("module.exports = \".vce-separator--width-$selector {\\n  width: $(width)%;\\n}\"\n\n//# sourceURL=webpack:///./separator/cssMixins/separatorWidth.pcss?../../node_modules/raw-loader/index.js");

/***/ }),

/***/ "./node_modules/raw-loader/index.js!./separator/editor.css":
/*!*********************************************************************!*\
  !*** ../../node_modules/raw-loader/index.js!./separator/editor.css ***!
  \*********************************************************************/
/***/ (function(module) {

eval("module.exports = \".vce-basic-separator-container {\\n  min-height: 1em;\\n}\\n\"\n\n//# sourceURL=webpack:///./separator/editor.css?../../node_modules/raw-loader/index.js");

/***/ }),

/***/ "./node_modules/raw-loader/index.js!./separator/styles.css":
/*!*********************************************************************!*\
  !*** ../../node_modules/raw-loader/index.js!./separator/styles.css ***!
  \*********************************************************************/
/***/ (function(module) {

eval("module.exports = \"/* ----------------------------------------------\\n * Separator\\n * ---------------------------------------------- */\\n.vce-separator-container {\\n  line-height: 0;\\n}\\n.vce-separator {\\n  display: inline-block;\\n  vertical-align: middle;\\n  line-height: 1;\\n  padding-top: 10px;\\n  padding-bottom: 10px;\\n  transition: color .3s ease;\\n}\\n.vce-separator::before {\\n  display: block;\\n  content: '';\\n  box-sizing: content-box;\\n  border-top-style: solid;\\n  width: 100%;\\n}\\n.vce-separator--align-left {\\n  text-align: left;\\n}\\n.vce-separator--align-center {\\n  text-align: center;\\n}\\n.vce-separator--align-right {\\n  text-align: right;\\n}\\n.vce-separator--style-solid .vce-separator::before {\\n  border-top-style: solid;\\n}\\n.vce-separator--style-dotted .vce-separator::before {\\n  border-top-style: dotted;\\n}\\n.vce-separator--style-dashed .vce-separator::before {\\n  border-top-style: dashed;\\n}\\n.vce-separator--style-double .vce-separator::before {\\n  border-top-style: double;\\n}\\n.vce-separator--style-shadow .vce-separator {\\n  display: -ms-flexbox;\\n  display: flex;\\n  margin-right: auto;\\n  margin-left: auto;\\n}\\n.vce-separator--style-shadow .vce-separator::before {\\n  display: none;\\n}\\n.vce-separator-shadow {\\n  position: relative;\\n  min-height: 10px;\\n  -ms-flex: 1 1 auto;\\n      flex: 1 1 auto;\\n  min-width: 10%;\\n  overflow: hidden;\\n}\\n.vce-separator-shadow::before {\\n  content: '';\\n  display: block;\\n  position: absolute;\\n  left: 0;\\n  top: -20px;\\n  right: 0;\\n  height: 10px;\\n  border-radius: 100%;\\n}\\n.vce-separator-shadow-left::before {\\n  right: -100%;\\n}\\n.vce-separator-shadow-right::before {\\n  left: -100%;\\n}\\n\"\n\n//# sourceURL=webpack:///./separator/styles.css?../../node_modules/raw-loader/index.js");

/***/ }),

/***/ "./separator/settings.json":
/*!*********************************!*\
  !*** ./separator/settings.json ***!
  \*********************************/
/***/ (function(module) {

"use strict";
eval("module.exports = JSON.parse('{\"groups\":{\"type\":\"string\",\"access\":\"protected\",\"value\":\"Separators\"},\"color\":{\"type\":\"color\",\"access\":\"public\",\"value\":\"#bfc0c1\",\"options\":{\"label\":\"Separator color\",\"cssMixin\":{\"mixin\":\"basicColor\",\"property\":\"color\",\"namePattern\":\"[\\\\\\\\da-f]+\"}}},\"alignment\":{\"type\":\"buttonGroup\",\"access\":\"public\",\"value\":\"center\",\"options\":{\"label\":\"Alignment\",\"values\":[{\"label\":\"Left\",\"value\":\"left\",\"icon\":\"vcv-ui-icon-attribute-alignment-left\"},{\"label\":\"Center\",\"value\":\"center\",\"icon\":\"vcv-ui-icon-attribute-alignment-center\"},{\"label\":\"Right\",\"value\":\"right\",\"icon\":\"vcv-ui-icon-attribute-alignment-right\"}]}},\"style\":{\"type\":\"dropdown\",\"access\":\"public\",\"value\":\"solid\",\"options\":{\"label\":\"Style\",\"values\":[{\"label\":\"Line\",\"value\":\"solid\"},{\"label\":\"Dashed\",\"value\":\"dashed\"},{\"label\":\"Dotted\",\"value\":\"dotted\"},{\"label\":\"Double\",\"value\":\"double\"},{\"label\":\"Shadow\",\"value\":\"shadow\"}]}},\"thickness\":{\"type\":\"number\",\"access\":\"public\",\"value\":\"1\",\"options\":{\"label\":\"Thickness\",\"description\":\"Enter a separator thickness in pixels.\",\"cssMixin\":{\"mixin\":\"separatorThickness\",\"property\":\"thickness\",\"namePattern\":\"[\\\\\\\\da-f]+\"},\"min\":1}},\"width\":{\"type\":\"range\",\"access\":\"public\",\"value\":\"60\",\"options\":{\"label\":\"Separator width\",\"description\":\"Enter a separator width in percentage (example: 60).\",\"cssMixin\":{\"mixin\":\"separatorWidth\",\"property\":\"width\",\"namePattern\":\"[\\\\\\\\da-f]+\"},\"min\":1,\"max\":100,\"measurement\":\"%\"}},\"customClass\":{\"type\":\"string\",\"access\":\"public\",\"value\":\"\",\"options\":{\"label\":\"Extra class name\",\"description\":\"Add an extra class name to the element and refer to it from the custom CSS option.\"}},\"designOptions\":{\"type\":\"designOptions\",\"access\":\"public\",\"value\":{},\"options\":{\"label\":\"Design Options\"}},\"editFormTab1\":{\"type\":\"group\",\"access\":\"protected\",\"value\":[\"color\",\"alignment\",\"style\",\"thickness\",\"width\",\"metaCustomId\",\"customClass\"],\"options\":{\"label\":\"General\"}},\"metaEditFormTabs\":{\"type\":\"group\",\"access\":\"protected\",\"value\":[\"editFormTab1\",\"designOptions\"]},\"relatedTo\":{\"type\":\"group\",\"access\":\"protected\",\"value\":[\"General\"]},\"assetsLibrary\":{\"access\":\"public\",\"type\":\"string\",\"value\":[\"animate\"]},\"metaBackendLabels\":{\"type\":\"group\",\"access\":\"protected\",\"value\":[{\"value\":[\"color\"]}]},\"metaCustomId\":{\"type\":\"customId\",\"access\":\"public\",\"value\":\"\",\"options\":{\"label\":\"Element ID\",\"description\":\"Apply a unique ID to the element to link it directly by using #your_id (for element ID use lowercase input only).\"}},\"tag\":{\"access\":\"protected\",\"type\":\"string\",\"value\":\"separator\"}}');\n\n//# sourceURL=webpack:///./separator/settings.json?");

/***/ })

},[['./separator/index.js']]]);