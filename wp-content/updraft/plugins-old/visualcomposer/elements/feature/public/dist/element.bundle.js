/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
(self["vcvWebpackJsonp4x"] = self["vcvWebpackJsonp4x"] || []).push([["element"],{

/***/ "./feature/component.js":
/*!******************************!*\
  !*** ./feature/component.js ***!
  \******************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"default\": function() { return /* binding */ Feature; }\n/* harmony export */ });\n/* harmony import */ var _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/extends */ \"./node_modules/@babel/runtime/helpers/esm/extends.js\");\n/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/classCallCheck */ \"./node_modules/@babel/runtime/helpers/esm/classCallCheck.js\");\n/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/createClass */ \"./node_modules/@babel/runtime/helpers/esm/createClass.js\");\n/* harmony import */ var _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @babel/runtime/helpers/inherits */ \"./node_modules/@babel/runtime/helpers/esm/inherits.js\");\n/* harmony import */ var _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @babel/runtime/helpers/possibleConstructorReturn */ \"./node_modules/@babel/runtime/helpers/esm/possibleConstructorReturn.js\");\n/* harmony import */ var _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @babel/runtime/helpers/getPrototypeOf */ \"./node_modules/@babel/runtime/helpers/esm/getPrototypeOf.js\");\n/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! react */ \"./node_modules/react/index.js\");\n/* harmony import */ var vc_cake__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! vc-cake */ \"./node_modules/vc-cake/index.js\");\n/* harmony import */ var vc_cake__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(vc_cake__WEBPACK_IMPORTED_MODULE_7__);\n\n\n\n\n\n\n\nfunction _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = (0,_babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_5__[\"default\"])(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = (0,_babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_5__[\"default\"])(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return (0,_babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_4__[\"default\"])(this, result); }; }\n\nfunction _isNativeReflectConstruct() { if (typeof Reflect === \"undefined\" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === \"function\") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); return true; } catch (e) { return false; } }\n\n\n\nvar vcvAPI = vc_cake__WEBPACK_IMPORTED_MODULE_7___default().getService('api');\nvar Cook = vc_cake__WEBPACK_IMPORTED_MODULE_7___default().getService('cook');\n\nvar Feature = /*#__PURE__*/function (_vcvAPI$elementCompon) {\n  (0,_babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_3__[\"default\"])(Feature, _vcvAPI$elementCompon);\n\n  var _super = _createSuper(Feature);\n\n  function Feature() {\n    (0,_babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1__[\"default\"])(this, Feature);\n\n    return _super.apply(this, arguments);\n  }\n\n  (0,_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2__[\"default\"])(Feature, [{\n    key: \"render\",\n    value: function render() {\n      var _this$props = this.props,\n          id = _this$props.id,\n          atts = _this$props.atts,\n          editor = _this$props.editor;\n      var description = atts.description,\n          align = atts.align,\n          icon = atts.icon,\n          customClass = atts.customClass,\n          metaCustomId = atts.metaCustomId;\n\n      var classNames = __webpack_require__(/*! classnames */ \"./node_modules/classnames/index.js\");\n\n      var customProps = {};\n      var customContainerProps = {};\n      var containerClasses = classNames({\n        'vce-feature': true,\n        'vce-feature--alignment--left': align === 'left',\n        'vce-feature--alignment--right': align === 'right',\n        'vce-feature--alignment--center': align === 'center'\n      });\n      var wrapperClasses = ['vce', 'vce-feature--wrap-row'];\n      wrapperClasses = classNames(wrapperClasses);\n\n      if (typeof customClass === 'string' && customClass) {\n        containerClasses = containerClasses.concat(' ' + customClass);\n      }\n\n      if (metaCustomId) {\n        customContainerProps.id = metaCustomId;\n      }\n\n      var Icon = Cook.get(icon);\n      var iconOutput = Icon.render(null, false);\n      var doAll = this.applyDO('all');\n      return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_6__.createElement(\"section\", (0,_babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__[\"default\"])({\n        className: containerClasses\n      }, editor, customContainerProps), /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_6__.createElement(\"div\", (0,_babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__[\"default\"])({\n        className: wrapperClasses,\n        id: 'el-' + id\n      }, customProps, doAll), iconOutput, description));\n    }\n  }]);\n\n  return Feature;\n}(vcvAPI.elementComponent);\n\n\n\n//# sourceURL=webpack:///./feature/component.js?");

/***/ }),

/***/ "./feature/index.js":
/*!**************************!*\
  !*** ./feature/index.js ***!
  \**************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var vc_cake__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vc-cake */ \"./node_modules/vc-cake/index.js\");\n/* harmony import */ var vc_cake__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(vc_cake__WEBPACK_IMPORTED_MODULE_0__);\n/* harmony import */ var _component__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./component */ \"./feature/component.js\");\n/* eslint-disable import/no-webpack-loader-syntax */\n\n\nvar vcvAddElement = vc_cake__WEBPACK_IMPORTED_MODULE_0___default().getService('cook').add;\nvcvAddElement(__webpack_require__(/*! ./settings.json */ \"./feature/settings.json\"), // Component callback\nfunction (component) {\n  component.add(_component__WEBPACK_IMPORTED_MODULE_1__[\"default\"]);\n}, // css settings // css for element\n{\n  css: __webpack_require__(/*! raw-loader!./styles.css */ \"./node_modules/raw-loader/index.js!./feature/styles.css\"),\n  editorCss: __webpack_require__(/*! raw-loader!./editor.css */ \"./node_modules/raw-loader/index.js!./feature/editor.css\")\n}, '');\n\n//# sourceURL=webpack:///./feature/index.js?");

/***/ }),

/***/ "./node_modules/raw-loader/index.js!./feature/editor.css":
/*!*******************************************************************!*\
  !*** ../../node_modules/raw-loader/index.js!./feature/editor.css ***!
  \*******************************************************************/
/***/ (function(module) {

eval("module.exports = \".vce-feature {\\n  min-height: 1em;\\n}\\n\"\n\n//# sourceURL=webpack:///./feature/editor.css?../../node_modules/raw-loader/index.js");

/***/ }),

/***/ "./node_modules/raw-loader/index.js!./feature/styles.css":
/*!*******************************************************************!*\
  !*** ../../node_modules/raw-loader/index.js!./feature/styles.css ***!
  \*******************************************************************/
/***/ (function(module) {

eval("module.exports = \".vce-feature--alignment--left {\\n  text-align: left;\\n}\\n.vce-feature--alignment--right {\\n  text-align: right;\\n}\\n.vce-feature--alignment--center {\\n  text-align: center;\\n}\\n\"\n\n//# sourceURL=webpack:///./feature/styles.css?../../node_modules/raw-loader/index.js");

/***/ }),

/***/ "./feature/settings.json":
/*!*******************************!*\
  !*** ./feature/settings.json ***!
  \*******************************/
/***/ (function(module) {

"use strict";
eval("module.exports = JSON.parse('{\"tag\":{\"access\":\"protected\",\"type\":\"string\",\"value\":\"feature\"},\"description\":{\"type\":\"htmleditor\",\"access\":\"public\",\"value\":\"<h3>VIDEO TUTORIALS</h3>\\\\n<p>Take full control over your website with our new exciting page builder. You\\'ll be grinning in delight when you see just how easy it is to create stunning layouts with little effort.</p>\",\"options\":{\"label\":\"Description\",\"inline\":true,\"dynamicField\":true,\"skinToggle\":\"darkTextSkin\"}},\"darkTextSkin\":{\"type\":\"toggleSmall\",\"access\":\"public\",\"value\":false},\"align\":{\"type\":\"buttonGroup\",\"access\":\"public\",\"value\":\"center\",\"options\":{\"label\":\"Content alignment\",\"description\":\"Select content alignment.\",\"values\":[{\"label\":\"Left\",\"value\":\"left\",\"icon\":\"vcv-ui-icon-attribute-alignment-left\"},{\"label\":\"Center\",\"value\":\"center\",\"icon\":\"vcv-ui-icon-attribute-alignment-center\"},{\"label\":\"Right\",\"value\":\"right\",\"icon\":\"vcv-ui-icon-attribute-alignment-right\"}]}},\"icon\":{\"type\":\"element\",\"access\":\"public\",\"value\":{\"tag\":\"icon\",\"iconAlignment\":\"center\"},\"options\":{\"category\":\"Icon\",\"tabLabel\":\"Icon\"}},\"customClass\":{\"type\":\"string\",\"access\":\"public\",\"value\":\"\",\"options\":{\"label\":\"Extra class name\",\"description\":\"Add an extra class name to the element and refer to it from the custom CSS option.\"}},\"designOptions\":{\"type\":\"designOptions\",\"access\":\"public\",\"value\":{},\"options\":{\"label\":\"Design Options\"}},\"editFormTab1\":{\"type\":\"group\",\"access\":\"protected\",\"value\":[\"description\",\"align\",\"metaCustomId\",\"customClass\"],\"options\":{\"label\":\"General\"}},\"metaEditFormTabs\":{\"type\":\"group\",\"access\":\"protected\",\"value\":[\"editFormTab1\",\"icon\",\"designOptions\"]},\"relatedTo\":{\"type\":\"group\",\"access\":\"protected\",\"value\":[\"General\"]},\"metaCustomId\":{\"type\":\"customId\",\"access\":\"public\",\"value\":\"\",\"options\":{\"label\":\"Element ID\",\"description\":\"Apply a unique ID to the element to link it directly by using #your_id (for element ID use lowercase input only).\"}}}');\n\n//# sourceURL=webpack:///./feature/settings.json?");

/***/ })

},[['./feature/index.js']]]);