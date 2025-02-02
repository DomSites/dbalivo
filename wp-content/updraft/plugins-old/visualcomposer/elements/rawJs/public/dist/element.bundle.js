/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
(self["vcvWebpackJsonp4x"] = self["vcvWebpackJsonp4x"] || []).push([["element"],{

/***/ "./rawJs/component.js":
/*!****************************!*\
  !*** ./rawJs/component.js ***!
  \****************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"default\": function() { return /* binding */ RawJs; }\n/* harmony export */ });\n/* harmony import */ var _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/extends */ \"./node_modules/@babel/runtime/helpers/esm/extends.js\");\n/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/classCallCheck */ \"./node_modules/@babel/runtime/helpers/esm/classCallCheck.js\");\n/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/createClass */ \"./node_modules/@babel/runtime/helpers/esm/createClass.js\");\n/* harmony import */ var _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @babel/runtime/helpers/inherits */ \"./node_modules/@babel/runtime/helpers/esm/inherits.js\");\n/* harmony import */ var _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @babel/runtime/helpers/possibleConstructorReturn */ \"./node_modules/@babel/runtime/helpers/esm/possibleConstructorReturn.js\");\n/* harmony import */ var _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @babel/runtime/helpers/getPrototypeOf */ \"./node_modules/@babel/runtime/helpers/esm/getPrototypeOf.js\");\n/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! react */ \"./node_modules/react/index.js\");\n/* harmony import */ var vc_cake__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! vc-cake */ \"./node_modules/vc-cake/index.js\");\n/* harmony import */ var vc_cake__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(vc_cake__WEBPACK_IMPORTED_MODULE_7__);\n\n\n\n\n\n\n\nfunction _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = (0,_babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_5__[\"default\"])(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = (0,_babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_5__[\"default\"])(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return (0,_babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_4__[\"default\"])(this, result); }; }\n\nfunction _isNativeReflectConstruct() { if (typeof Reflect === \"undefined\" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === \"function\") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); return true; } catch (e) { return false; } }\n\n\n\nvar vcvAPI = (0,vc_cake__WEBPACK_IMPORTED_MODULE_7__.getService)('api');\n\nvar RawJs = /*#__PURE__*/function (_vcvAPI$elementCompon) {\n  (0,_babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_3__[\"default\"])(RawJs, _vcvAPI$elementCompon);\n\n  var _super = _createSuper(RawJs);\n\n  function RawJs(props) {\n    var _this;\n\n    (0,_babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1__[\"default\"])(this, RawJs);\n\n    _this = _super.call(this, props);\n    _this.rawJsWrapper = /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_6__.createRef();\n    return _this;\n  }\n\n  (0,_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2__[\"default\"])(RawJs, [{\n    key: \"componentDidMount\",\n    value: function componentDidMount() {\n      this.props.editor && this.updateJsScript(this.props.atts.rawJs);\n    }\n  }, {\n    key: \"componentDidUpdate\",\n    value: function componentDidUpdate(prevProps) {\n      if (prevProps.atts.rawJs !== this.props.atts.rawJs) {\n        this.props.editor && this.updateJsScript(this.props.atts.rawJs);\n      }\n    }\n  }, {\n    key: \"updateJsScript\",\n    value: function updateJsScript(rawJs) {\n      var component = this.rawJsWrapper.current;\n      this.updateInlineScript(component, rawJs);\n    }\n  }, {\n    key: \"render\",\n    value: function render() {\n      var _this$props = this.props,\n          id = _this$props.id,\n          atts = _this$props.atts,\n          editor = _this$props.editor;\n      var customClass = atts.customClass,\n          metaCustomId = atts.metaCustomId; // destructuring assignment for attributes from settings.json with access public\n\n      var classes = 'vce-raw-js-container';\n      var customProps = {};\n      var wrapperClasses = 'vce-raw-js-wrapper';\n\n      if (typeof customClass === 'string' && customClass) {\n        classes = classes.concat(' ' + customClass);\n      }\n\n      if (metaCustomId) {\n        customProps.id = metaCustomId;\n      }\n\n      var doAll = this.applyDO('all');\n      return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_6__.createElement(\"div\", (0,_babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__[\"default\"])({\n        className: classes\n      }, editor, customProps), /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_6__.createElement(\"div\", (0,_babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__[\"default\"])({\n        className: wrapperClasses,\n        id: 'el-' + id\n      }, doAll, {\n        ref: this.rawJsWrapper\n      })));\n    }\n  }]);\n\n  return RawJs;\n}(vcvAPI.elementComponent);\n\n\n\n//# sourceURL=webpack:///./rawJs/component.js?");

/***/ }),

/***/ "./rawJs/index.js":
/*!************************!*\
  !*** ./rawJs/index.js ***!
  \************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var vc_cake__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vc-cake */ \"./node_modules/vc-cake/index.js\");\n/* harmony import */ var vc_cake__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(vc_cake__WEBPACK_IMPORTED_MODULE_0__);\n/* harmony import */ var _component__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./component */ \"./rawJs/component.js\");\n/* eslint-disable import/no-webpack-loader-syntax */\n\n\nvar vcvAddElement = vc_cake__WEBPACK_IMPORTED_MODULE_0___default().getService('cook').add;\nvcvAddElement(__webpack_require__(/*! ./settings.json */ \"./rawJs/settings.json\"), // Component callback\nfunction (component) {\n  component.add(_component__WEBPACK_IMPORTED_MODULE_1__[\"default\"]);\n}, // css settings // css for element\n{\n  css: false,\n  editorCss: __webpack_require__(/*! raw-loader!./editor.css */ \"./node_modules/raw-loader/index.js!./rawJs/editor.css\")\n}, '');\n\n//# sourceURL=webpack:///./rawJs/index.js?");

/***/ }),

/***/ "./node_modules/raw-loader/index.js!./rawJs/editor.css":
/*!*****************************************************************!*\
  !*** ../../node_modules/raw-loader/index.js!./rawJs/editor.css ***!
  \*****************************************************************/
/***/ (function(module) {

eval("module.exports = \"/* ----------------------------------------------\\n * Raw JS\\n * ---------------------------------------------- */\\n.vce-raw-js-container {\\n  min-height: 30px;\\n}\\n\"\n\n//# sourceURL=webpack:///./rawJs/editor.css?../../node_modules/raw-loader/index.js");

/***/ }),

/***/ "./rawJs/settings.json":
/*!*****************************!*\
  !*** ./rawJs/settings.json ***!
  \*****************************/
/***/ (function(module) {

"use strict";
eval("module.exports = JSON.parse('{\"rawJs\":{\"type\":\"rawCode\",\"access\":\"public\",\"value\":\"var d=document;d.currentScript&&d.currentScript.parentNode.insertBefore(d.createTextNode(\\'JavaScript is a high-level, dynamic, untyped, and interpreted programming language.\\'),d.currentScript)\",\"options\":{\"label\":\"Raw JS\",\"description\":\"Add a custom JavaScript code to the WordPress website to execute it on this particular page.\",\"mode\":\"javascript\"}},\"customClass\":{\"type\":\"string\",\"access\":\"public\",\"value\":\"\",\"options\":{\"label\":\"Extra class name\",\"description\":\"Add an extra class name to the element and refer to it from the custom CSS option.\"}},\"designOptions\":{\"type\":\"designOptions\",\"access\":\"public\",\"value\":{},\"options\":{\"label\":\"Design Options\"}},\"editFormTab1\":{\"type\":\"group\",\"access\":\"protected\",\"value\":[\"rawJs\",\"metaCustomId\",\"customClass\"],\"options\":{\"label\":\"General\"}},\"metaEditFormTabs\":{\"type\":\"group\",\"access\":\"protected\",\"value\":[\"editFormTab1\",\"designOptions\"]},\"relatedTo\":{\"type\":\"group\",\"access\":\"protected\",\"value\":[\"General\"]},\"metaBackendLabels\":{\"type\":\"group\",\"access\":\"protected\",\"value\":[{\"value\":[\"rawJs\"]}]},\"metaCustomId\":{\"type\":\"customId\",\"access\":\"public\",\"value\":\"\",\"options\":{\"label\":\"Element ID\",\"description\":\"Apply a unique ID to the element to link it directly by using #your_id (for element ID use lowercase input only).\"}},\"tag\":{\"access\":\"protected\",\"type\":\"string\",\"value\":\"rawJs\"}}');\n\n//# sourceURL=webpack:///./rawJs/settings.json?");

/***/ })

},[['./rawJs/index.js']]]);