/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./assets/common-sass/bootstrap/js/dist/base-component.js":
/*!****************************************************************!*\
  !*** ./assets/common-sass/bootstrap/js/dist/base-component.js ***!
  \****************************************************************/
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;function _createForOfIteratorHelper(o, allowArrayLike) { var it = typeof Symbol !== "undefined" && o[Symbol.iterator] || o["@@iterator"]; if (!it) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = it.call(o); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }
function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }
function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) arr2[i] = arr[i]; return arr2; }
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, _toPropertyKey(descriptor.key), descriptor); } }
function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }
function _toPropertyKey(arg) { var key = _toPrimitive(arg, "string"); return _typeof(key) === "symbol" ? key : String(key); }
function _toPrimitive(input, hint) { if (_typeof(input) !== "object" || input === null) return input; var prim = input[Symbol.toPrimitive]; if (prim !== undefined) { var res = prim.call(input, hint || "default"); if (_typeof(res) !== "object") return res; throw new TypeError("@@toPrimitive must return a primitive value."); } return (hint === "string" ? String : Number)(input); }
function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); Object.defineProperty(subClass, "prototype", { writable: false }); if (superClass) _setPrototypeOf(subClass, superClass); }
function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }
function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _getPrototypeOf(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _getPrototypeOf(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _possibleConstructorReturn(this, result); }; }
function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } else if (call !== void 0) { throw new TypeError("Derived constructors may only return object or undefined"); } return _assertThisInitialized(self); }
function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }
function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); return true; } catch (e) { return false; } }
function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf.bind() : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
/*!
  * Bootstrap base-component.js v5.3.6 (https://getbootstrap.com/)
  * Copyright 2011-2025 The Bootstrap Authors (https://github.com/twbs/bootstrap/graphs/contributors)
  * Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)
  */
(function (global, factory) {
  ( false ? 0 : _typeof(exports)) === 'object' && "object" !== 'undefined' ? module.exports = factory(__webpack_require__(/*! ./dom/data.js */ "./assets/common-sass/bootstrap/js/dist/dom/data.js"), __webpack_require__(/*! ./dom/event-handler.js */ "./assets/common-sass/bootstrap/js/dist/dom/event-handler.js"), __webpack_require__(/*! ./util/config.js */ "./assets/common-sass/bootstrap/js/dist/util/config.js"), __webpack_require__(/*! ./util/index.js */ "./assets/common-sass/bootstrap/js/dist/util/index.js")) :  true ? !(__WEBPACK_AMD_DEFINE_ARRAY__ = [__webpack_require__(/*! ./dom/data */ "./assets/common-sass/bootstrap/js/dist/dom/data.js"), __webpack_require__(/*! ./dom/event-handler */ "./assets/common-sass/bootstrap/js/dist/dom/event-handler.js"), __webpack_require__(/*! ./util/config */ "./assets/common-sass/bootstrap/js/dist/util/config.js"), __webpack_require__(/*! ./util/index */ "./assets/common-sass/bootstrap/js/dist/util/index.js")], __WEBPACK_AMD_DEFINE_FACTORY__ = (factory),
		__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
		(__WEBPACK_AMD_DEFINE_FACTORY__.apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__)) : __WEBPACK_AMD_DEFINE_FACTORY__),
		__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__)) : (0);
})(this, function (Data, EventHandler, Config, index_js) {
  'use strict';

  /**
   * --------------------------------------------------------------------------
   * Bootstrap base-component.js
   * Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)
   * --------------------------------------------------------------------------
   */

  /**
   * Constants
   */
  var VERSION = '5.3.6';

  /**
   * Class definition
   */
  var BaseComponent = /*#__PURE__*/function (_Config) {
    _inherits(BaseComponent, _Config);
    var _super = _createSuper(BaseComponent);
    function BaseComponent(element, config) {
      var _this;
      _classCallCheck(this, BaseComponent);
      _this = _super.call(this);
      element = index_js.getElement(element);
      if (!element) {
        return _possibleConstructorReturn(_this);
      }
      _this._element = element;
      _this._config = _this._getConfig(config);
      Data.set(_this._element, _this.constructor.DATA_KEY, _assertThisInitialized(_this));
      return _this;
    }

    // Public
    _createClass(BaseComponent, [{
      key: "dispose",
      value: function dispose() {
        Data.remove(this._element, this.constructor.DATA_KEY);
        EventHandler.off(this._element, this.constructor.EVENT_KEY);
        var _iterator = _createForOfIteratorHelper(Object.getOwnPropertyNames(this)),
          _step;
        try {
          for (_iterator.s(); !(_step = _iterator.n()).done;) {
            var propertyName = _step.value;
            this[propertyName] = null;
          }
        } catch (err) {
          _iterator.e(err);
        } finally {
          _iterator.f();
        }
      }

      // Private
    }, {
      key: "_queueCallback",
      value: function _queueCallback(callback, element) {
        var isAnimated = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : true;
        index_js.executeAfterTransition(callback, element, isAnimated);
      }
    }, {
      key: "_getConfig",
      value: function _getConfig(config) {
        config = this._mergeConfigObj(config, this._element);
        config = this._configAfterMerge(config);
        this._typeCheckConfig(config);
        return config;
      }

      // Static
    }], [{
      key: "getInstance",
      value: function getInstance(element) {
        return Data.get(index_js.getElement(element), this.DATA_KEY);
      }
    }, {
      key: "getOrCreateInstance",
      value: function getOrCreateInstance(element) {
        var config = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};
        return this.getInstance(element) || new this(element, _typeof(config) === 'object' ? config : null);
      }
    }, {
      key: "VERSION",
      get: function get() {
        return VERSION;
      }
    }, {
      key: "DATA_KEY",
      get: function get() {
        return "bs.".concat(this.NAME);
      }
    }, {
      key: "EVENT_KEY",
      get: function get() {
        return ".".concat(this.DATA_KEY);
      }
    }, {
      key: "eventName",
      value: function eventName(name) {
        return "".concat(name).concat(this.EVENT_KEY);
      }
    }]);
    return BaseComponent;
  }(Config);
  return BaseComponent;
});

/***/ }),

/***/ "./assets/common-sass/bootstrap/js/dist/carousel.js":
/*!**********************************************************!*\
  !*** ./assets/common-sass/bootstrap/js/dist/carousel.js ***!
  \**********************************************************/
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;function _createForOfIteratorHelper(o, allowArrayLike) { var it = typeof Symbol !== "undefined" && o[Symbol.iterator] || o["@@iterator"]; if (!it) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = it.call(o); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }
function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }
function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) arr2[i] = arr[i]; return arr2; }
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, _toPropertyKey(descriptor.key), descriptor); } }
function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }
function _get() { if (typeof Reflect !== "undefined" && Reflect.get) { _get = Reflect.get.bind(); } else { _get = function _get(target, property, receiver) { var base = _superPropBase(target, property); if (!base) return; var desc = Object.getOwnPropertyDescriptor(base, property); if (desc.get) { return desc.get.call(arguments.length < 3 ? target : receiver); } return desc.value; }; } return _get.apply(this, arguments); }
function _superPropBase(object, property) { while (!Object.prototype.hasOwnProperty.call(object, property)) { object = _getPrototypeOf(object); if (object === null) break; } return object; }
function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); Object.defineProperty(subClass, "prototype", { writable: false }); if (superClass) _setPrototypeOf(subClass, superClass); }
function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }
function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _getPrototypeOf(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _getPrototypeOf(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _possibleConstructorReturn(this, result); }; }
function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } else if (call !== void 0) { throw new TypeError("Derived constructors may only return object or undefined"); } return _assertThisInitialized(self); }
function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }
function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); return true; } catch (e) { return false; } }
function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf.bind() : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }
function _defineProperty(obj, key, value) { key = _toPropertyKey(key); if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }
function _toPropertyKey(arg) { var key = _toPrimitive(arg, "string"); return _typeof(key) === "symbol" ? key : String(key); }
function _toPrimitive(input, hint) { if (_typeof(input) !== "object" || input === null) return input; var prim = input[Symbol.toPrimitive]; if (prim !== undefined) { var res = prim.call(input, hint || "default"); if (_typeof(res) !== "object") return res; throw new TypeError("@@toPrimitive must return a primitive value."); } return (hint === "string" ? String : Number)(input); }
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
/*!
  * Bootstrap carousel.js v5.3.6 (https://getbootstrap.com/)
  * Copyright 2011-2025 The Bootstrap Authors (https://github.com/twbs/bootstrap/graphs/contributors)
  * Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)
  */
(function (global, factory) {
  ( false ? 0 : _typeof(exports)) === 'object' && "object" !== 'undefined' ? module.exports = factory(__webpack_require__(/*! ./base-component.js */ "./assets/common-sass/bootstrap/js/dist/base-component.js"), __webpack_require__(/*! ./dom/event-handler.js */ "./assets/common-sass/bootstrap/js/dist/dom/event-handler.js"), __webpack_require__(/*! ./dom/manipulator.js */ "./assets/common-sass/bootstrap/js/dist/dom/manipulator.js"), __webpack_require__(/*! ./dom/selector-engine.js */ "./assets/common-sass/bootstrap/js/dist/dom/selector-engine.js"), __webpack_require__(/*! ./util/index.js */ "./assets/common-sass/bootstrap/js/dist/util/index.js"), __webpack_require__(/*! ./util/swipe.js */ "./assets/common-sass/bootstrap/js/dist/util/swipe.js")) :  true ? !(__WEBPACK_AMD_DEFINE_ARRAY__ = [__webpack_require__(/*! ./base-component */ "./assets/common-sass/bootstrap/js/dist/base-component.js"), __webpack_require__(/*! ./dom/event-handler */ "./assets/common-sass/bootstrap/js/dist/dom/event-handler.js"), __webpack_require__(/*! ./dom/manipulator */ "./assets/common-sass/bootstrap/js/dist/dom/manipulator.js"), __webpack_require__(/*! ./dom/selector-engine */ "./assets/common-sass/bootstrap/js/dist/dom/selector-engine.js"), __webpack_require__(/*! ./util/index */ "./assets/common-sass/bootstrap/js/dist/util/index.js"), __webpack_require__(/*! ./util/swipe */ "./assets/common-sass/bootstrap/js/dist/util/swipe.js")], __WEBPACK_AMD_DEFINE_FACTORY__ = (factory),
		__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
		(__WEBPACK_AMD_DEFINE_FACTORY__.apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__)) : __WEBPACK_AMD_DEFINE_FACTORY__),
		__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__)) : (0);
})(this, function (BaseComponent, EventHandler, Manipulator, SelectorEngine, index_js, Swipe) {
  'use strict';

  /**
   * --------------------------------------------------------------------------
   * Bootstrap carousel.js
   * Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)
   * --------------------------------------------------------------------------
   */

  /**
   * Constants
   */
  var _KEY_TO_DIRECTION;
  var NAME = 'carousel';
  var DATA_KEY = 'bs.carousel';
  var EVENT_KEY = ".".concat(DATA_KEY);
  var DATA_API_KEY = '.data-api';
  var ARROW_LEFT_KEY = 'ArrowLeft';
  var ARROW_RIGHT_KEY = 'ArrowRight';
  var TOUCHEVENT_COMPAT_WAIT = 500; // Time for mouse compat events to fire after touch

  var ORDER_NEXT = 'next';
  var ORDER_PREV = 'prev';
  var DIRECTION_LEFT = 'left';
  var DIRECTION_RIGHT = 'right';
  var EVENT_SLIDE = "slide".concat(EVENT_KEY);
  var EVENT_SLID = "slid".concat(EVENT_KEY);
  var EVENT_KEYDOWN = "keydown".concat(EVENT_KEY);
  var EVENT_MOUSEENTER = "mouseenter".concat(EVENT_KEY);
  var EVENT_MOUSELEAVE = "mouseleave".concat(EVENT_KEY);
  var EVENT_DRAG_START = "dragstart".concat(EVENT_KEY);
  var EVENT_LOAD_DATA_API = "load".concat(EVENT_KEY).concat(DATA_API_KEY);
  var EVENT_CLICK_DATA_API = "click".concat(EVENT_KEY).concat(DATA_API_KEY);
  var CLASS_NAME_CAROUSEL = 'carousel';
  var CLASS_NAME_ACTIVE = 'active';
  var CLASS_NAME_SLIDE = 'slide';
  var CLASS_NAME_END = 'carousel-item-end';
  var CLASS_NAME_START = 'carousel-item-start';
  var CLASS_NAME_NEXT = 'carousel-item-next';
  var CLASS_NAME_PREV = 'carousel-item-prev';
  var SELECTOR_ACTIVE = '.active';
  var SELECTOR_ITEM = '.carousel-item';
  var SELECTOR_ACTIVE_ITEM = SELECTOR_ACTIVE + SELECTOR_ITEM;
  var SELECTOR_ITEM_IMG = '.carousel-item img';
  var SELECTOR_INDICATORS = '.carousel-indicators';
  var SELECTOR_DATA_SLIDE = '[data-bs-slide], [data-bs-slide-to]';
  var SELECTOR_DATA_RIDE = '[data-bs-ride="carousel"]';
  var KEY_TO_DIRECTION = (_KEY_TO_DIRECTION = {}, _defineProperty(_KEY_TO_DIRECTION, ARROW_LEFT_KEY, DIRECTION_RIGHT), _defineProperty(_KEY_TO_DIRECTION, ARROW_RIGHT_KEY, DIRECTION_LEFT), _KEY_TO_DIRECTION);
  var Default = {
    interval: 5000,
    keyboard: true,
    pause: 'hover',
    ride: false,
    touch: true,
    wrap: true
  };
  var DefaultType = {
    interval: '(number|boolean)',
    // TODO:v6 remove boolean support
    keyboard: 'boolean',
    pause: '(string|boolean)',
    ride: '(boolean|string)',
    touch: 'boolean',
    wrap: 'boolean'
  };

  /**
   * Class definition
   */
  var Carousel = /*#__PURE__*/function (_BaseComponent) {
    _inherits(Carousel, _BaseComponent);
    var _super = _createSuper(Carousel);
    function Carousel(element, config) {
      var _this;
      _classCallCheck(this, Carousel);
      _this = _super.call(this, element, config);
      _this._interval = null;
      _this._activeElement = null;
      _this._isSliding = false;
      _this.touchTimeout = null;
      _this._swipeHelper = null;
      _this._indicatorsElement = SelectorEngine.findOne(SELECTOR_INDICATORS, _this._element);
      _this._addEventListeners();
      if (_this._config.ride === CLASS_NAME_CAROUSEL) {
        _this.cycle();
      }
      return _this;
    }

    // Getters
    _createClass(Carousel, [{
      key: "next",
      value:
      // Public
      function next() {
        this._slide(ORDER_NEXT);
      }
    }, {
      key: "nextWhenVisible",
      value: function nextWhenVisible() {
        // FIXME TODO use `document.visibilityState`
        // Don't call next when the page isn't visible
        // or the carousel or its parent isn't visible
        if (!document.hidden && index_js.isVisible(this._element)) {
          this.next();
        }
      }
    }, {
      key: "prev",
      value: function prev() {
        this._slide(ORDER_PREV);
      }
    }, {
      key: "pause",
      value: function pause() {
        if (this._isSliding) {
          index_js.triggerTransitionEnd(this._element);
        }
        this._clearInterval();
      }
    }, {
      key: "cycle",
      value: function cycle() {
        var _this2 = this;
        this._clearInterval();
        this._updateInterval();
        this._interval = setInterval(function () {
          return _this2.nextWhenVisible();
        }, this._config.interval);
      }
    }, {
      key: "_maybeEnableCycle",
      value: function _maybeEnableCycle() {
        var _this3 = this;
        if (!this._config.ride) {
          return;
        }
        if (this._isSliding) {
          EventHandler.one(this._element, EVENT_SLID, function () {
            return _this3.cycle();
          });
          return;
        }
        this.cycle();
      }
    }, {
      key: "to",
      value: function to(index) {
        var _this4 = this;
        var items = this._getItems();
        if (index > items.length - 1 || index < 0) {
          return;
        }
        if (this._isSliding) {
          EventHandler.one(this._element, EVENT_SLID, function () {
            return _this4.to(index);
          });
          return;
        }
        var activeIndex = this._getItemIndex(this._getActive());
        if (activeIndex === index) {
          return;
        }
        var order = index > activeIndex ? ORDER_NEXT : ORDER_PREV;
        this._slide(order, items[index]);
      }
    }, {
      key: "dispose",
      value: function dispose() {
        if (this._swipeHelper) {
          this._swipeHelper.dispose();
        }
        _get(_getPrototypeOf(Carousel.prototype), "dispose", this).call(this);
      }

      // Private
    }, {
      key: "_configAfterMerge",
      value: function _configAfterMerge(config) {
        config.defaultInterval = config.interval;
        return config;
      }
    }, {
      key: "_addEventListeners",
      value: function _addEventListeners() {
        var _this5 = this;
        if (this._config.keyboard) {
          EventHandler.on(this._element, EVENT_KEYDOWN, function (event) {
            return _this5._keydown(event);
          });
        }
        if (this._config.pause === 'hover') {
          EventHandler.on(this._element, EVENT_MOUSEENTER, function () {
            return _this5.pause();
          });
          EventHandler.on(this._element, EVENT_MOUSELEAVE, function () {
            return _this5._maybeEnableCycle();
          });
        }
        if (this._config.touch && Swipe.isSupported()) {
          this._addTouchEventListeners();
        }
      }
    }, {
      key: "_addTouchEventListeners",
      value: function _addTouchEventListeners() {
        var _this6 = this;
        var _iterator = _createForOfIteratorHelper(SelectorEngine.find(SELECTOR_ITEM_IMG, this._element)),
          _step;
        try {
          for (_iterator.s(); !(_step = _iterator.n()).done;) {
            var img = _step.value;
            EventHandler.on(img, EVENT_DRAG_START, function (event) {
              return event.preventDefault();
            });
          }
        } catch (err) {
          _iterator.e(err);
        } finally {
          _iterator.f();
        }
        var endCallBack = function endCallBack() {
          if (_this6._config.pause !== 'hover') {
            return;
          }

          // If it's a touch-enabled device, mouseenter/leave are fired as
          // part of the mouse compatibility events on first tap - the carousel
          // would stop cycling until user tapped out of it;
          // here, we listen for touchend, explicitly pause the carousel
          // (as if it's the second time we tap on it, mouseenter compat event
          // is NOT fired) and after a timeout (to allow for mouse compatibility
          // events to fire) we explicitly restart cycling

          _this6.pause();
          if (_this6.touchTimeout) {
            clearTimeout(_this6.touchTimeout);
          }
          _this6.touchTimeout = setTimeout(function () {
            return _this6._maybeEnableCycle();
          }, TOUCHEVENT_COMPAT_WAIT + _this6._config.interval);
        };
        var swipeConfig = {
          leftCallback: function leftCallback() {
            return _this6._slide(_this6._directionToOrder(DIRECTION_LEFT));
          },
          rightCallback: function rightCallback() {
            return _this6._slide(_this6._directionToOrder(DIRECTION_RIGHT));
          },
          endCallback: endCallBack
        };
        this._swipeHelper = new Swipe(this._element, swipeConfig);
      }
    }, {
      key: "_keydown",
      value: function _keydown(event) {
        if (/input|textarea/i.test(event.target.tagName)) {
          return;
        }
        var direction = KEY_TO_DIRECTION[event.key];
        if (direction) {
          event.preventDefault();
          this._slide(this._directionToOrder(direction));
        }
      }
    }, {
      key: "_getItemIndex",
      value: function _getItemIndex(element) {
        return this._getItems().indexOf(element);
      }
    }, {
      key: "_setActiveIndicatorElement",
      value: function _setActiveIndicatorElement(index) {
        if (!this._indicatorsElement) {
          return;
        }
        var activeIndicator = SelectorEngine.findOne(SELECTOR_ACTIVE, this._indicatorsElement);
        activeIndicator.classList.remove(CLASS_NAME_ACTIVE);
        activeIndicator.removeAttribute('aria-current');
        var newActiveIndicator = SelectorEngine.findOne("[data-bs-slide-to=\"".concat(index, "\"]"), this._indicatorsElement);
        if (newActiveIndicator) {
          newActiveIndicator.classList.add(CLASS_NAME_ACTIVE);
          newActiveIndicator.setAttribute('aria-current', 'true');
        }
      }
    }, {
      key: "_updateInterval",
      value: function _updateInterval() {
        var element = this._activeElement || this._getActive();
        if (!element) {
          return;
        }
        var elementInterval = Number.parseInt(element.getAttribute('data-bs-interval'), 10);
        this._config.interval = elementInterval || this._config.defaultInterval;
      }
    }, {
      key: "_slide",
      value: function _slide(order) {
        var _this7 = this;
        var element = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : null;
        if (this._isSliding) {
          return;
        }
        var activeElement = this._getActive();
        var isNext = order === ORDER_NEXT;
        var nextElement = element || index_js.getNextActiveElement(this._getItems(), activeElement, isNext, this._config.wrap);
        if (nextElement === activeElement) {
          return;
        }
        var nextElementIndex = this._getItemIndex(nextElement);
        var triggerEvent = function triggerEvent(eventName) {
          return EventHandler.trigger(_this7._element, eventName, {
            relatedTarget: nextElement,
            direction: _this7._orderToDirection(order),
            from: _this7._getItemIndex(activeElement),
            to: nextElementIndex
          });
        };
        var slideEvent = triggerEvent(EVENT_SLIDE);
        if (slideEvent.defaultPrevented) {
          return;
        }
        if (!activeElement || !nextElement) {
          // Some weirdness is happening, so we bail
          // TODO: change tests that use empty divs to avoid this check
          return;
        }
        var isCycling = Boolean(this._interval);
        this.pause();
        this._isSliding = true;
        this._setActiveIndicatorElement(nextElementIndex);
        this._activeElement = nextElement;
        var directionalClassName = isNext ? CLASS_NAME_START : CLASS_NAME_END;
        var orderClassName = isNext ? CLASS_NAME_NEXT : CLASS_NAME_PREV;
        nextElement.classList.add(orderClassName);
        index_js.reflow(nextElement);
        activeElement.classList.add(directionalClassName);
        nextElement.classList.add(directionalClassName);
        var completeCallBack = function completeCallBack() {
          nextElement.classList.remove(directionalClassName, orderClassName);
          nextElement.classList.add(CLASS_NAME_ACTIVE);
          activeElement.classList.remove(CLASS_NAME_ACTIVE, orderClassName, directionalClassName);
          _this7._isSliding = false;
          triggerEvent(EVENT_SLID);
        };
        this._queueCallback(completeCallBack, activeElement, this._isAnimated());
        if (isCycling) {
          this.cycle();
        }
      }
    }, {
      key: "_isAnimated",
      value: function _isAnimated() {
        return this._element.classList.contains(CLASS_NAME_SLIDE);
      }
    }, {
      key: "_getActive",
      value: function _getActive() {
        return SelectorEngine.findOne(SELECTOR_ACTIVE_ITEM, this._element);
      }
    }, {
      key: "_getItems",
      value: function _getItems() {
        return SelectorEngine.find(SELECTOR_ITEM, this._element);
      }
    }, {
      key: "_clearInterval",
      value: function _clearInterval() {
        if (this._interval) {
          clearInterval(this._interval);
          this._interval = null;
        }
      }
    }, {
      key: "_directionToOrder",
      value: function _directionToOrder(direction) {
        if (index_js.isRTL()) {
          return direction === DIRECTION_LEFT ? ORDER_PREV : ORDER_NEXT;
        }
        return direction === DIRECTION_LEFT ? ORDER_NEXT : ORDER_PREV;
      }
    }, {
      key: "_orderToDirection",
      value: function _orderToDirection(order) {
        if (index_js.isRTL()) {
          return order === ORDER_PREV ? DIRECTION_LEFT : DIRECTION_RIGHT;
        }
        return order === ORDER_PREV ? DIRECTION_RIGHT : DIRECTION_LEFT;
      }

      // Static
    }], [{
      key: "Default",
      get: function get() {
        return Default;
      }
    }, {
      key: "DefaultType",
      get: function get() {
        return DefaultType;
      }
    }, {
      key: "NAME",
      get: function get() {
        return NAME;
      }
    }, {
      key: "jQueryInterface",
      value: function jQueryInterface(config) {
        return this.each(function () {
          var data = Carousel.getOrCreateInstance(this, config);
          if (typeof config === 'number') {
            data.to(config);
            return;
          }
          if (typeof config === 'string') {
            if (data[config] === undefined || config.startsWith('_') || config === 'constructor') {
              throw new TypeError("No method named \"".concat(config, "\""));
            }
            data[config]();
          }
        });
      }
    }]);
    return Carousel;
  }(BaseComponent);
  /**
   * Data API implementation
   */
  EventHandler.on(document, EVENT_CLICK_DATA_API, SELECTOR_DATA_SLIDE, function (event) {
    var target = SelectorEngine.getElementFromSelector(this);
    if (!target || !target.classList.contains(CLASS_NAME_CAROUSEL)) {
      return;
    }
    event.preventDefault();
    var carousel = Carousel.getOrCreateInstance(target);
    var slideIndex = this.getAttribute('data-bs-slide-to');
    if (slideIndex) {
      carousel.to(slideIndex);
      carousel._maybeEnableCycle();
      return;
    }
    if (Manipulator.getDataAttribute(this, 'slide') === 'next') {
      carousel.next();
      carousel._maybeEnableCycle();
      return;
    }
    carousel.prev();
    carousel._maybeEnableCycle();
  });
  EventHandler.on(window, EVENT_LOAD_DATA_API, function () {
    var carousels = SelectorEngine.find(SELECTOR_DATA_RIDE);
    var _iterator2 = _createForOfIteratorHelper(carousels),
      _step2;
    try {
      for (_iterator2.s(); !(_step2 = _iterator2.n()).done;) {
        var carousel = _step2.value;
        Carousel.getOrCreateInstance(carousel);
      }
    } catch (err) {
      _iterator2.e(err);
    } finally {
      _iterator2.f();
    }
  });

  /**
   * jQuery
   */

  index_js.defineJQueryPlugin(Carousel);
  return Carousel;
});

/***/ }),

/***/ "./assets/common-sass/bootstrap/js/dist/dom/data.js":
/*!**********************************************************!*\
  !*** ./assets/common-sass/bootstrap/js/dist/dom/data.js ***!
  \**********************************************************/
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_RESULT__;function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
/*!
  * Bootstrap data.js v5.3.6 (https://getbootstrap.com/)
  * Copyright 2011-2025 The Bootstrap Authors (https://github.com/twbs/bootstrap/graphs/contributors)
  * Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)
  */
(function (global, factory) {
  ( false ? 0 : _typeof(exports)) === 'object' && "object" !== 'undefined' ? module.exports = factory() :  true ? !(__WEBPACK_AMD_DEFINE_FACTORY__ = (factory),
		__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
		(__WEBPACK_AMD_DEFINE_FACTORY__.call(exports, __webpack_require__, exports, module)) :
		__WEBPACK_AMD_DEFINE_FACTORY__),
		__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__)) : (0);
})(this, function () {
  'use strict';

  /**
   * --------------------------------------------------------------------------
   * Bootstrap dom/data.js
   * Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)
   * --------------------------------------------------------------------------
   */

  /**
   * Constants
   */
  var elementMap = new Map();
  var data = {
    set: function set(element, key, instance) {
      if (!elementMap.has(element)) {
        elementMap.set(element, new Map());
      }
      var instanceMap = elementMap.get(element);

      // make it clear we only want one instance per element
      // can be removed later when multiple key/instances are fine to be used
      if (!instanceMap.has(key) && instanceMap.size !== 0) {
        // eslint-disable-next-line no-console
        console.error("Bootstrap doesn't allow more than one instance per element. Bound instance: ".concat(Array.from(instanceMap.keys())[0], "."));
        return;
      }
      instanceMap.set(key, instance);
    },
    get: function get(element, key) {
      if (elementMap.has(element)) {
        return elementMap.get(element).get(key) || null;
      }
      return null;
    },
    remove: function remove(element, key) {
      if (!elementMap.has(element)) {
        return;
      }
      var instanceMap = elementMap.get(element);
      instanceMap["delete"](key);

      // free up element references if there are no instances left for an element
      if (instanceMap.size === 0) {
        elementMap["delete"](element);
      }
    }
  };
  return data;
});

/***/ }),

/***/ "./assets/common-sass/bootstrap/js/dist/dom/event-handler.js":
/*!*******************************************************************!*\
  !*** ./assets/common-sass/bootstrap/js/dist/dom/event-handler.js ***!
  \*******************************************************************/
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest(); }
function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _iterableToArrayLimit(arr, i) { var _i = null == arr ? null : "undefined" != typeof Symbol && arr[Symbol.iterator] || arr["@@iterator"]; if (null != _i) { var _s, _e, _x, _r, _arr = [], _n = !0, _d = !1; try { if (_x = (_i = _i.call(arr)).next, 0 === i) { if (Object(_i) !== _i) return; _n = !1; } else for (; !(_n = (_s = _x.call(_i)).done) && (_arr.push(_s.value), _arr.length !== i); _n = !0); } catch (err) { _d = !0, _e = err; } finally { try { if (!_n && null != _i["return"] && (_r = _i["return"](), Object(_r) !== _r)) return; } finally { if (_d) throw _e; } } return _arr; } }
function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }
function _createForOfIteratorHelper(o, allowArrayLike) { var it = typeof Symbol !== "undefined" && o[Symbol.iterator] || o["@@iterator"]; if (!it) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e2) { throw _e2; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = it.call(o); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e3) { didErr = true; err = _e3; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }
function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }
function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) arr2[i] = arr[i]; return arr2; }
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
/*!
  * Bootstrap event-handler.js v5.3.6 (https://getbootstrap.com/)
  * Copyright 2011-2025 The Bootstrap Authors (https://github.com/twbs/bootstrap/graphs/contributors)
  * Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)
  */
(function (global, factory) {
  ( false ? 0 : _typeof(exports)) === 'object' && "object" !== 'undefined' ? module.exports = factory(__webpack_require__(/*! ../util/index.js */ "./assets/common-sass/bootstrap/js/dist/util/index.js")) :  true ? !(__WEBPACK_AMD_DEFINE_ARRAY__ = [__webpack_require__(/*! ../util/index */ "./assets/common-sass/bootstrap/js/dist/util/index.js")], __WEBPACK_AMD_DEFINE_FACTORY__ = (factory),
		__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
		(__WEBPACK_AMD_DEFINE_FACTORY__.apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__)) : __WEBPACK_AMD_DEFINE_FACTORY__),
		__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__)) : (0);
})(this, function (index_js) {
  'use strict';

  /**
   * --------------------------------------------------------------------------
   * Bootstrap dom/event-handler.js
   * Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)
   * --------------------------------------------------------------------------
   */

  /**
   * Constants
   */
  var namespaceRegex = /[^.]*(?=\..*)\.|.*/;
  var stripNameRegex = /\..*/;
  var stripUidRegex = /::\d+$/;
  var eventRegistry = {}; // Events storage
  var uidEvent = 1;
  var customEvents = {
    mouseenter: 'mouseover',
    mouseleave: 'mouseout'
  };
  var nativeEvents = new Set(['click', 'dblclick', 'mouseup', 'mousedown', 'contextmenu', 'mousewheel', 'DOMMouseScroll', 'mouseover', 'mouseout', 'mousemove', 'selectstart', 'selectend', 'keydown', 'keypress', 'keyup', 'orientationchange', 'touchstart', 'touchmove', 'touchend', 'touchcancel', 'pointerdown', 'pointermove', 'pointerup', 'pointerleave', 'pointercancel', 'gesturestart', 'gesturechange', 'gestureend', 'focus', 'blur', 'change', 'reset', 'select', 'submit', 'focusin', 'focusout', 'load', 'unload', 'beforeunload', 'resize', 'move', 'DOMContentLoaded', 'readystatechange', 'error', 'abort', 'scroll']);

  /**
   * Private methods
   */

  function makeEventUid(element, uid) {
    return uid && "".concat(uid, "::").concat(uidEvent++) || element.uidEvent || uidEvent++;
  }
  function getElementEvents(element) {
    var uid = makeEventUid(element);
    element.uidEvent = uid;
    eventRegistry[uid] = eventRegistry[uid] || {};
    return eventRegistry[uid];
  }
  function bootstrapHandler(element, fn) {
    return function handler(event) {
      hydrateObj(event, {
        delegateTarget: element
      });
      if (handler.oneOff) {
        EventHandler.off(element, event.type, fn);
      }
      return fn.apply(element, [event]);
    };
  }
  function bootstrapDelegationHandler(element, selector, fn) {
    return function handler(event) {
      var domElements = element.querySelectorAll(selector);
      for (var target = event.target; target && target !== this; target = target.parentNode) {
        var _iterator = _createForOfIteratorHelper(domElements),
          _step;
        try {
          for (_iterator.s(); !(_step = _iterator.n()).done;) {
            var domElement = _step.value;
            if (domElement !== target) {
              continue;
            }
            hydrateObj(event, {
              delegateTarget: target
            });
            if (handler.oneOff) {
              EventHandler.off(element, event.type, selector, fn);
            }
            return fn.apply(target, [event]);
          }
        } catch (err) {
          _iterator.e(err);
        } finally {
          _iterator.f();
        }
      }
    };
  }
  function findHandler(events, callable) {
    var delegationSelector = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : null;
    return Object.values(events).find(function (event) {
      return event.callable === callable && event.delegationSelector === delegationSelector;
    });
  }
  function normalizeParameters(originalTypeEvent, handler, delegationFunction) {
    var isDelegated = typeof handler === 'string';
    // TODO: tooltip passes `false` instead of selector, so we need to check
    var callable = isDelegated ? delegationFunction : handler || delegationFunction;
    var typeEvent = getTypeEvent(originalTypeEvent);
    if (!nativeEvents.has(typeEvent)) {
      typeEvent = originalTypeEvent;
    }
    return [isDelegated, callable, typeEvent];
  }
  function addHandler(element, originalTypeEvent, handler, delegationFunction, oneOff) {
    if (typeof originalTypeEvent !== 'string' || !element) {
      return;
    }
    var _normalizeParameters = normalizeParameters(originalTypeEvent, handler, delegationFunction),
      _normalizeParameters2 = _slicedToArray(_normalizeParameters, 3),
      isDelegated = _normalizeParameters2[0],
      callable = _normalizeParameters2[1],
      typeEvent = _normalizeParameters2[2];

    // in case of mouseenter or mouseleave wrap the handler within a function that checks for its DOM position
    // this prevents the handler from being dispatched the same way as mouseover or mouseout does
    if (originalTypeEvent in customEvents) {
      var wrapFunction = function wrapFunction(fn) {
        return function (event) {
          if (!event.relatedTarget || event.relatedTarget !== event.delegateTarget && !event.delegateTarget.contains(event.relatedTarget)) {
            return fn.call(this, event);
          }
        };
      };
      callable = wrapFunction(callable);
    }
    var events = getElementEvents(element);
    var handlers = events[typeEvent] || (events[typeEvent] = {});
    var previousFunction = findHandler(handlers, callable, isDelegated ? handler : null);
    if (previousFunction) {
      previousFunction.oneOff = previousFunction.oneOff && oneOff;
      return;
    }
    var uid = makeEventUid(callable, originalTypeEvent.replace(namespaceRegex, ''));
    var fn = isDelegated ? bootstrapDelegationHandler(element, handler, callable) : bootstrapHandler(element, callable);
    fn.delegationSelector = isDelegated ? handler : null;
    fn.callable = callable;
    fn.oneOff = oneOff;
    fn.uidEvent = uid;
    handlers[uid] = fn;
    element.addEventListener(typeEvent, fn, isDelegated);
  }
  function removeHandler(element, events, typeEvent, handler, delegationSelector) {
    var fn = findHandler(events[typeEvent], handler, delegationSelector);
    if (!fn) {
      return;
    }
    element.removeEventListener(typeEvent, fn, Boolean(delegationSelector));
    delete events[typeEvent][fn.uidEvent];
  }
  function removeNamespacedHandlers(element, events, typeEvent, namespace) {
    var storeElementEvent = events[typeEvent] || {};
    for (var _i2 = 0, _Object$entries = Object.entries(storeElementEvent); _i2 < _Object$entries.length; _i2++) {
      var _Object$entries$_i = _slicedToArray(_Object$entries[_i2], 2),
        handlerKey = _Object$entries$_i[0],
        event = _Object$entries$_i[1];
      if (handlerKey.includes(namespace)) {
        removeHandler(element, events, typeEvent, event.callable, event.delegationSelector);
      }
    }
  }
  function getTypeEvent(event) {
    // allow to get the native events from namespaced events ('click.bs.button' --> 'click')
    event = event.replace(stripNameRegex, '');
    return customEvents[event] || event;
  }
  var EventHandler = {
    on: function on(element, event, handler, delegationFunction) {
      addHandler(element, event, handler, delegationFunction, false);
    },
    one: function one(element, event, handler, delegationFunction) {
      addHandler(element, event, handler, delegationFunction, true);
    },
    off: function off(element, originalTypeEvent, handler, delegationFunction) {
      if (typeof originalTypeEvent !== 'string' || !element) {
        return;
      }
      var _normalizeParameters3 = normalizeParameters(originalTypeEvent, handler, delegationFunction),
        _normalizeParameters4 = _slicedToArray(_normalizeParameters3, 3),
        isDelegated = _normalizeParameters4[0],
        callable = _normalizeParameters4[1],
        typeEvent = _normalizeParameters4[2];
      var inNamespace = typeEvent !== originalTypeEvent;
      var events = getElementEvents(element);
      var storeElementEvent = events[typeEvent] || {};
      var isNamespace = originalTypeEvent.startsWith('.');
      if (typeof callable !== 'undefined') {
        // Simplest case: handler is passed, remove that listener ONLY.
        if (!Object.keys(storeElementEvent).length) {
          return;
        }
        removeHandler(element, events, typeEvent, callable, isDelegated ? handler : null);
        return;
      }
      if (isNamespace) {
        for (var _i3 = 0, _Object$keys = Object.keys(events); _i3 < _Object$keys.length; _i3++) {
          var elementEvent = _Object$keys[_i3];
          removeNamespacedHandlers(element, events, elementEvent, originalTypeEvent.slice(1));
        }
      }
      for (var _i4 = 0, _Object$entries2 = Object.entries(storeElementEvent); _i4 < _Object$entries2.length; _i4++) {
        var _Object$entries2$_i = _slicedToArray(_Object$entries2[_i4], 2),
          keyHandlers = _Object$entries2$_i[0],
          event = _Object$entries2$_i[1];
        var handlerKey = keyHandlers.replace(stripUidRegex, '');
        if (!inNamespace || originalTypeEvent.includes(handlerKey)) {
          removeHandler(element, events, typeEvent, event.callable, event.delegationSelector);
        }
      }
    },
    trigger: function trigger(element, event, args) {
      if (typeof event !== 'string' || !element) {
        return null;
      }
      var $ = index_js.getjQuery();
      var typeEvent = getTypeEvent(event);
      var inNamespace = event !== typeEvent;
      var jQueryEvent = null;
      var bubbles = true;
      var nativeDispatch = true;
      var defaultPrevented = false;
      if (inNamespace && $) {
        jQueryEvent = $.Event(event, args);
        $(element).trigger(jQueryEvent);
        bubbles = !jQueryEvent.isPropagationStopped();
        nativeDispatch = !jQueryEvent.isImmediatePropagationStopped();
        defaultPrevented = jQueryEvent.isDefaultPrevented();
      }
      var evt = hydrateObj(new Event(event, {
        bubbles: bubbles,
        cancelable: true
      }), args);
      if (defaultPrevented) {
        evt.preventDefault();
      }
      if (nativeDispatch) {
        element.dispatchEvent(evt);
      }
      if (evt.defaultPrevented && jQueryEvent) {
        jQueryEvent.preventDefault();
      }
      return evt;
    }
  };
  function hydrateObj(obj) {
    var meta = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};
    var _loop = function _loop() {
      var _Object$entries3$_i = _slicedToArray(_Object$entries3[_i5], 2),
        key = _Object$entries3$_i[0],
        value = _Object$entries3$_i[1];
      try {
        obj[key] = value;
      } catch (_unused) {
        Object.defineProperty(obj, key, {
          configurable: true,
          get: function get() {
            return value;
          }
        });
      }
    };
    for (var _i5 = 0, _Object$entries3 = Object.entries(meta); _i5 < _Object$entries3.length; _i5++) {
      _loop();
    }
    return obj;
  }
  return EventHandler;
});

/***/ }),

/***/ "./assets/common-sass/bootstrap/js/dist/dom/manipulator.js":
/*!*****************************************************************!*\
  !*** ./assets/common-sass/bootstrap/js/dist/dom/manipulator.js ***!
  \*****************************************************************/
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_RESULT__;function _createForOfIteratorHelper(o, allowArrayLike) { var it = typeof Symbol !== "undefined" && o[Symbol.iterator] || o["@@iterator"]; if (!it) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = it.call(o); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }
function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }
function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) arr2[i] = arr[i]; return arr2; }
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
/*!
  * Bootstrap manipulator.js v5.3.6 (https://getbootstrap.com/)
  * Copyright 2011-2025 The Bootstrap Authors (https://github.com/twbs/bootstrap/graphs/contributors)
  * Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)
  */
(function (global, factory) {
  ( false ? 0 : _typeof(exports)) === 'object' && "object" !== 'undefined' ? module.exports = factory() :  true ? !(__WEBPACK_AMD_DEFINE_FACTORY__ = (factory),
		__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
		(__WEBPACK_AMD_DEFINE_FACTORY__.call(exports, __webpack_require__, exports, module)) :
		__WEBPACK_AMD_DEFINE_FACTORY__),
		__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__)) : (0);
})(this, function () {
  'use strict';

  /**
   * --------------------------------------------------------------------------
   * Bootstrap dom/manipulator.js
   * Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)
   * --------------------------------------------------------------------------
   */
  function normalizeData(value) {
    if (value === 'true') {
      return true;
    }
    if (value === 'false') {
      return false;
    }
    if (value === Number(value).toString()) {
      return Number(value);
    }
    if (value === '' || value === 'null') {
      return null;
    }
    if (typeof value !== 'string') {
      return value;
    }
    try {
      return JSON.parse(decodeURIComponent(value));
    } catch (_unused) {
      return value;
    }
  }
  function normalizeDataKey(key) {
    return key.replace(/[A-Z]/g, function (chr) {
      return "-".concat(chr.toLowerCase());
    });
  }
  var Manipulator = {
    setDataAttribute: function setDataAttribute(element, key, value) {
      element.setAttribute("data-bs-".concat(normalizeDataKey(key)), value);
    },
    removeDataAttribute: function removeDataAttribute(element, key) {
      element.removeAttribute("data-bs-".concat(normalizeDataKey(key)));
    },
    getDataAttributes: function getDataAttributes(element) {
      if (!element) {
        return {};
      }
      var attributes = {};
      var bsKeys = Object.keys(element.dataset).filter(function (key) {
        return key.startsWith('bs') && !key.startsWith('bsConfig');
      });
      var _iterator = _createForOfIteratorHelper(bsKeys),
        _step;
      try {
        for (_iterator.s(); !(_step = _iterator.n()).done;) {
          var key = _step.value;
          var pureKey = key.replace(/^bs/, '');
          pureKey = pureKey.charAt(0).toLowerCase() + pureKey.slice(1);
          attributes[pureKey] = normalizeData(element.dataset[key]);
        }
      } catch (err) {
        _iterator.e(err);
      } finally {
        _iterator.f();
      }
      return attributes;
    },
    getDataAttribute: function getDataAttribute(element, key) {
      return normalizeData(element.getAttribute("data-bs-".concat(normalizeDataKey(key))));
    }
  };
  return Manipulator;
});

/***/ }),

/***/ "./assets/common-sass/bootstrap/js/dist/dom/selector-engine.js":
/*!*********************************************************************!*\
  !*** ./assets/common-sass/bootstrap/js/dist/dom/selector-engine.js ***!
  \*********************************************************************/
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }
function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }
function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter); }
function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }
function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) arr2[i] = arr[i]; return arr2; }
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
/*!
  * Bootstrap selector-engine.js v5.3.6 (https://getbootstrap.com/)
  * Copyright 2011-2025 The Bootstrap Authors (https://github.com/twbs/bootstrap/graphs/contributors)
  * Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)
  */
(function (global, factory) {
  ( false ? 0 : _typeof(exports)) === 'object' && "object" !== 'undefined' ? module.exports = factory(__webpack_require__(/*! ../util/index.js */ "./assets/common-sass/bootstrap/js/dist/util/index.js")) :  true ? !(__WEBPACK_AMD_DEFINE_ARRAY__ = [__webpack_require__(/*! ../util/index */ "./assets/common-sass/bootstrap/js/dist/util/index.js")], __WEBPACK_AMD_DEFINE_FACTORY__ = (factory),
		__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
		(__WEBPACK_AMD_DEFINE_FACTORY__.apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__)) : __WEBPACK_AMD_DEFINE_FACTORY__),
		__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__)) : (0);
})(this, function (index_js) {
  'use strict';

  /**
   * --------------------------------------------------------------------------
   * Bootstrap dom/selector-engine.js
   * Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)
   * --------------------------------------------------------------------------
   */
  var getSelector = function getSelector(element) {
    var selector = element.getAttribute('data-bs-target');
    if (!selector || selector === '#') {
      var hrefAttribute = element.getAttribute('href');

      // The only valid content that could double as a selector are IDs or classes,
      // so everything starting with `#` or `.`. If a "real" URL is used as the selector,
      // `document.querySelector` will rightfully complain it is invalid.
      // See https://github.com/twbs/bootstrap/issues/32273
      if (!hrefAttribute || !hrefAttribute.includes('#') && !hrefAttribute.startsWith('.')) {
        return null;
      }

      // Just in case some CMS puts out a full URL with the anchor appended
      if (hrefAttribute.includes('#') && !hrefAttribute.startsWith('#')) {
        hrefAttribute = "#".concat(hrefAttribute.split('#')[1]);
      }
      selector = hrefAttribute && hrefAttribute !== '#' ? hrefAttribute.trim() : null;
    }
    return selector ? selector.split(',').map(function (sel) {
      return index_js.parseSelector(sel);
    }).join(',') : null;
  };
  var SelectorEngine = {
    find: function find(selector) {
      var _ref;
      var element = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : document.documentElement;
      return (_ref = []).concat.apply(_ref, _toConsumableArray(Element.prototype.querySelectorAll.call(element, selector)));
    },
    findOne: function findOne(selector) {
      var element = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : document.documentElement;
      return Element.prototype.querySelector.call(element, selector);
    },
    children: function children(element, selector) {
      var _ref2;
      return (_ref2 = []).concat.apply(_ref2, _toConsumableArray(element.children)).filter(function (child) {
        return child.matches(selector);
      });
    },
    parents: function parents(element, selector) {
      var parents = [];
      var ancestor = element.parentNode.closest(selector);
      while (ancestor) {
        parents.push(ancestor);
        ancestor = ancestor.parentNode.closest(selector);
      }
      return parents;
    },
    prev: function prev(element, selector) {
      var previous = element.previousElementSibling;
      while (previous) {
        if (previous.matches(selector)) {
          return [previous];
        }
        previous = previous.previousElementSibling;
      }
      return [];
    },
    // TODO: this is now unused; remove later along with prev()
    next: function next(element, selector) {
      var next = element.nextElementSibling;
      while (next) {
        if (next.matches(selector)) {
          return [next];
        }
        next = next.nextElementSibling;
      }
      return [];
    },
    focusableChildren: function focusableChildren(element) {
      var focusables = ['a', 'button', 'input', 'textarea', 'select', 'details', '[tabindex]', '[contenteditable="true"]'].map(function (selector) {
        return "".concat(selector, ":not([tabindex^=\"-\"])");
      }).join(',');
      return this.find(focusables, element).filter(function (el) {
        return !index_js.isDisabled(el) && index_js.isVisible(el);
      });
    },
    getSelectorFromElement: function getSelectorFromElement(element) {
      var selector = getSelector(element);
      if (selector) {
        return SelectorEngine.findOne(selector) ? selector : null;
      }
      return null;
    },
    getElementFromSelector: function getElementFromSelector(element) {
      var selector = getSelector(element);
      return selector ? SelectorEngine.findOne(selector) : null;
    },
    getMultipleElementsFromSelector: function getMultipleElementsFromSelector(element) {
      var selector = getSelector(element);
      return selector ? SelectorEngine.find(selector) : [];
    }
  };
  return SelectorEngine;
});

/***/ }),

/***/ "./assets/common-sass/bootstrap/js/dist/util/config.js":
/*!*************************************************************!*\
  !*** ./assets/common-sass/bootstrap/js/dist/util/config.js ***!
  \*************************************************************/
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest(); }
function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }
function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) arr2[i] = arr[i]; return arr2; }
function _iterableToArrayLimit(arr, i) { var _i = null == arr ? null : "undefined" != typeof Symbol && arr[Symbol.iterator] || arr["@@iterator"]; if (null != _i) { var _s, _e, _x, _r, _arr = [], _n = !0, _d = !1; try { if (_x = (_i = _i.call(arr)).next, 0 === i) { if (Object(_i) !== _i) return; _n = !1; } else for (; !(_n = (_s = _x.call(_i)).done) && (_arr.push(_s.value), _arr.length !== i); _n = !0); } catch (err) { _d = !0, _e = err; } finally { try { if (!_n && null != _i["return"] && (_r = _i["return"](), Object(_r) !== _r)) return; } finally { if (_d) throw _e; } } return _arr; } }
function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }
function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); enumerableOnly && (symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; })), keys.push.apply(keys, symbols); } return keys; }
function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = null != arguments[i] ? arguments[i] : {}; i % 2 ? ownKeys(Object(source), !0).forEach(function (key) { _defineProperty(target, key, source[key]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)) : ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } return target; }
function _defineProperty(obj, key, value) { key = _toPropertyKey(key); if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, _toPropertyKey(descriptor.key), descriptor); } }
function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }
function _toPropertyKey(arg) { var key = _toPrimitive(arg, "string"); return _typeof(key) === "symbol" ? key : String(key); }
function _toPrimitive(input, hint) { if (_typeof(input) !== "object" || input === null) return input; var prim = input[Symbol.toPrimitive]; if (prim !== undefined) { var res = prim.call(input, hint || "default"); if (_typeof(res) !== "object") return res; throw new TypeError("@@toPrimitive must return a primitive value."); } return (hint === "string" ? String : Number)(input); }
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
/*!
  * Bootstrap config.js v5.3.6 (https://getbootstrap.com/)
  * Copyright 2011-2025 The Bootstrap Authors (https://github.com/twbs/bootstrap/graphs/contributors)
  * Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)
  */
(function (global, factory) {
  ( false ? 0 : _typeof(exports)) === 'object' && "object" !== 'undefined' ? module.exports = factory(__webpack_require__(/*! ../dom/manipulator.js */ "./assets/common-sass/bootstrap/js/dist/dom/manipulator.js"), __webpack_require__(/*! ./index.js */ "./assets/common-sass/bootstrap/js/dist/util/index.js")) :  true ? !(__WEBPACK_AMD_DEFINE_ARRAY__ = [__webpack_require__(/*! ../dom/manipulator */ "./assets/common-sass/bootstrap/js/dist/dom/manipulator.js"), __webpack_require__(/*! ./index */ "./assets/common-sass/bootstrap/js/dist/util/index.js")], __WEBPACK_AMD_DEFINE_FACTORY__ = (factory),
		__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
		(__WEBPACK_AMD_DEFINE_FACTORY__.apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__)) : __WEBPACK_AMD_DEFINE_FACTORY__),
		__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__)) : (0);
})(this, function (Manipulator, index_js) {
  'use strict';

  /**
   * --------------------------------------------------------------------------
   * Bootstrap util/config.js
   * Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)
   * --------------------------------------------------------------------------
   */

  /**
   * Class definition
   */
  var Config = /*#__PURE__*/function () {
    function Config() {
      _classCallCheck(this, Config);
    }
    _createClass(Config, [{
      key: "_getConfig",
      value: function _getConfig(config) {
        config = this._mergeConfigObj(config);
        config = this._configAfterMerge(config);
        this._typeCheckConfig(config);
        return config;
      }
    }, {
      key: "_configAfterMerge",
      value: function _configAfterMerge(config) {
        return config;
      }
    }, {
      key: "_mergeConfigObj",
      value: function _mergeConfigObj(config, element) {
        var jsonConfig = index_js.isElement(element) ? Manipulator.getDataAttribute(element, 'config') : {}; // try to parse

        return _objectSpread(_objectSpread(_objectSpread(_objectSpread({}, this.constructor.Default), _typeof(jsonConfig) === 'object' ? jsonConfig : {}), index_js.isElement(element) ? Manipulator.getDataAttributes(element) : {}), _typeof(config) === 'object' ? config : {});
      }
    }, {
      key: "_typeCheckConfig",
      value: function _typeCheckConfig(config) {
        var configTypes = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : this.constructor.DefaultType;
        for (var _i = 0, _Object$entries = Object.entries(configTypes); _i < _Object$entries.length; _i++) {
          var _Object$entries$_i = _slicedToArray(_Object$entries[_i], 2),
            property = _Object$entries$_i[0],
            expectedTypes = _Object$entries$_i[1];
          var value = config[property];
          var valueType = index_js.isElement(value) ? 'element' : index_js.toType(value);
          if (!new RegExp(expectedTypes).test(valueType)) {
            throw new TypeError("".concat(this.constructor.NAME.toUpperCase(), ": Option \"").concat(property, "\" provided type \"").concat(valueType, "\" but expected type \"").concat(expectedTypes, "\"."));
          }
        }
      }
    }], [{
      key: "Default",
      get:
      // Getters
      function get() {
        return {};
      }
    }, {
      key: "DefaultType",
      get: function get() {
        return {};
      }
    }, {
      key: "NAME",
      get: function get() {
        throw new Error('You have to implement the static method "NAME", for each component!');
      }
    }]);
    return Config;
  }();
  return Config;
});

/***/ }),

/***/ "./assets/common-sass/bootstrap/js/dist/util/index.js":
/*!************************************************************!*\
  !*** ./assets/common-sass/bootstrap/js/dist/util/index.js ***!
  \************************************************************/
/***/ (function(module, exports) {

var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }
function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }
function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter); }
function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }
function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) arr2[i] = arr[i]; return arr2; }
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
/*!
  * Bootstrap index.js v5.3.6 (https://getbootstrap.com/)
  * Copyright 2011-2025 The Bootstrap Authors (https://github.com/twbs/bootstrap/graphs/contributors)
  * Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)
  */
(function (global, factory) {
  ( false ? 0 : _typeof(exports)) === 'object' && "object" !== 'undefined' ? factory(exports) :  true ? !(__WEBPACK_AMD_DEFINE_ARRAY__ = [exports], __WEBPACK_AMD_DEFINE_FACTORY__ = (factory),
		__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
		(__WEBPACK_AMD_DEFINE_FACTORY__.apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__)) : __WEBPACK_AMD_DEFINE_FACTORY__),
		__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__)) : (0);
})(this, function (exports) {
  'use strict';

  /**
   * --------------------------------------------------------------------------
   * Bootstrap util/index.js
   * Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)
   * --------------------------------------------------------------------------
   */
  var MAX_UID = 1000000;
  var MILLISECONDS_MULTIPLIER = 1000;
  var TRANSITION_END = 'transitionend';

  /**
   * Properly escape IDs selectors to handle weird IDs
   * @param {string} selector
   * @returns {string}
   */
  var parseSelector = function parseSelector(selector) {
    if (selector && window.CSS && window.CSS.escape) {
      // document.querySelector needs escaping to handle IDs (html5+) containing for instance /
      selector = selector.replace(/#([^\s"#']+)/g, function (match, id) {
        return "#".concat(CSS.escape(id));
      });
    }
    return selector;
  };

  // Shout-out Angus Croll (https://goo.gl/pxwQGp)
  var toType = function toType(object) {
    if (object === null || object === undefined) {
      return "".concat(object);
    }
    return Object.prototype.toString.call(object).match(/\s([a-z]+)/i)[1].toLowerCase();
  };

  /**
   * Public Util API
   */

  var getUID = function getUID(prefix) {
    do {
      prefix += Math.floor(Math.random() * MAX_UID);
    } while (document.getElementById(prefix));
    return prefix;
  };
  var getTransitionDurationFromElement = function getTransitionDurationFromElement(element) {
    if (!element) {
      return 0;
    }

    // Get transition-duration of the element
    var _window$getComputedSt = window.getComputedStyle(element),
      transitionDuration = _window$getComputedSt.transitionDuration,
      transitionDelay = _window$getComputedSt.transitionDelay;
    var floatTransitionDuration = Number.parseFloat(transitionDuration);
    var floatTransitionDelay = Number.parseFloat(transitionDelay);

    // Return 0 if element or transition duration is not found
    if (!floatTransitionDuration && !floatTransitionDelay) {
      return 0;
    }

    // If multiple durations are defined, take the first
    transitionDuration = transitionDuration.split(',')[0];
    transitionDelay = transitionDelay.split(',')[0];
    return (Number.parseFloat(transitionDuration) + Number.parseFloat(transitionDelay)) * MILLISECONDS_MULTIPLIER;
  };
  var triggerTransitionEnd = function triggerTransitionEnd(element) {
    element.dispatchEvent(new Event(TRANSITION_END));
  };
  var isElement = function isElement(object) {
    if (!object || _typeof(object) !== 'object') {
      return false;
    }
    if (typeof object.jquery !== 'undefined') {
      object = object[0];
    }
    return typeof object.nodeType !== 'undefined';
  };
  var getElement = function getElement(object) {
    // it's a jQuery object or a node element
    if (isElement(object)) {
      return object.jquery ? object[0] : object;
    }
    if (typeof object === 'string' && object.length > 0) {
      return document.querySelector(parseSelector(object));
    }
    return null;
  };
  var isVisible = function isVisible(element) {
    if (!isElement(element) || element.getClientRects().length === 0) {
      return false;
    }
    var elementIsVisible = getComputedStyle(element).getPropertyValue('visibility') === 'visible';
    // Handle `details` element as its content may falsie appear visible when it is closed
    var closedDetails = element.closest('details:not([open])');
    if (!closedDetails) {
      return elementIsVisible;
    }
    if (closedDetails !== element) {
      var summary = element.closest('summary');
      if (summary && summary.parentNode !== closedDetails) {
        return false;
      }
      if (summary === null) {
        return false;
      }
    }
    return elementIsVisible;
  };
  var isDisabled = function isDisabled(element) {
    if (!element || element.nodeType !== Node.ELEMENT_NODE) {
      return true;
    }
    if (element.classList.contains('disabled')) {
      return true;
    }
    if (typeof element.disabled !== 'undefined') {
      return element.disabled;
    }
    return element.hasAttribute('disabled') && element.getAttribute('disabled') !== 'false';
  };
  var findShadowRoot = function findShadowRoot(element) {
    if (!document.documentElement.attachShadow) {
      return null;
    }

    // Can find the shadow root otherwise it'll return the document
    if (typeof element.getRootNode === 'function') {
      var root = element.getRootNode();
      return root instanceof ShadowRoot ? root : null;
    }
    if (element instanceof ShadowRoot) {
      return element;
    }

    // when we don't find a shadow root
    if (!element.parentNode) {
      return null;
    }
    return findShadowRoot(element.parentNode);
  };
  var noop = function noop() {};

  /**
   * Trick to restart an element's animation
   *
   * @param {HTMLElement} element
   * @return void
   *
   * @see https://www.harrytheo.com/blog/2021/02/restart-a-css-animation-with-javascript/#restarting-a-css-animation
   */
  var reflow = function reflow(element) {
    element.offsetHeight; // eslint-disable-line no-unused-expressions
  };

  var getjQuery = function getjQuery() {
    if (window.jQuery && !document.body.hasAttribute('data-bs-no-jquery')) {
      return window.jQuery;
    }
    return null;
  };
  var DOMContentLoadedCallbacks = [];
  var onDOMContentLoaded = function onDOMContentLoaded(callback) {
    if (document.readyState === 'loading') {
      // add listener on the first call when the document is in loading state
      if (!DOMContentLoadedCallbacks.length) {
        document.addEventListener('DOMContentLoaded', function () {
          for (var _i = 0, _DOMContentLoadedCall = DOMContentLoadedCallbacks; _i < _DOMContentLoadedCall.length; _i++) {
            var _callback = _DOMContentLoadedCall[_i];
            _callback();
          }
        });
      }
      DOMContentLoadedCallbacks.push(callback);
    } else {
      callback();
    }
  };
  var isRTL = function isRTL() {
    return document.documentElement.dir === 'rtl';
  };
  var defineJQueryPlugin = function defineJQueryPlugin(plugin) {
    onDOMContentLoaded(function () {
      var $ = getjQuery();
      /* istanbul ignore if */
      if ($) {
        var name = plugin.NAME;
        var JQUERY_NO_CONFLICT = $.fn[name];
        $.fn[name] = plugin.jQueryInterface;
        $.fn[name].Constructor = plugin;
        $.fn[name].noConflict = function () {
          $.fn[name] = JQUERY_NO_CONFLICT;
          return plugin.jQueryInterface;
        };
      }
    });
  };
  var execute = function execute(possibleCallback) {
    var args = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : [];
    var defaultValue = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : possibleCallback;
    return typeof possibleCallback === 'function' ? possibleCallback.call.apply(possibleCallback, _toConsumableArray(args)) : defaultValue;
  };
  var executeAfterTransition = function executeAfterTransition(callback, transitionElement) {
    var waitForTransition = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : true;
    if (!waitForTransition) {
      execute(callback);
      return;
    }
    var durationPadding = 5;
    var emulatedDuration = getTransitionDurationFromElement(transitionElement) + durationPadding;
    var called = false;
    var handler = function handler(_ref) {
      var target = _ref.target;
      if (target !== transitionElement) {
        return;
      }
      called = true;
      transitionElement.removeEventListener(TRANSITION_END, handler);
      execute(callback);
    };
    transitionElement.addEventListener(TRANSITION_END, handler);
    setTimeout(function () {
      if (!called) {
        triggerTransitionEnd(transitionElement);
      }
    }, emulatedDuration);
  };

  /**
   * Return the previous/next element of a list.
   *
   * @param {array} list    The list of elements
   * @param activeElement   The active element
   * @param shouldGetNext   Choose to get next or previous element
   * @param isCycleAllowed
   * @return {Element|elem} The proper element
   */
  var getNextActiveElement = function getNextActiveElement(list, activeElement, shouldGetNext, isCycleAllowed) {
    var listLength = list.length;
    var index = list.indexOf(activeElement);

    // if the element does not exist in the list return an element
    // depending on the direction and if cycle is allowed
    if (index === -1) {
      return !shouldGetNext && isCycleAllowed ? list[listLength - 1] : list[0];
    }
    index += shouldGetNext ? 1 : -1;
    if (isCycleAllowed) {
      index = (index + listLength) % listLength;
    }
    return list[Math.max(0, Math.min(index, listLength - 1))];
  };
  exports.defineJQueryPlugin = defineJQueryPlugin;
  exports.execute = execute;
  exports.executeAfterTransition = executeAfterTransition;
  exports.findShadowRoot = findShadowRoot;
  exports.getElement = getElement;
  exports.getNextActiveElement = getNextActiveElement;
  exports.getTransitionDurationFromElement = getTransitionDurationFromElement;
  exports.getUID = getUID;
  exports.getjQuery = getjQuery;
  exports.isDisabled = isDisabled;
  exports.isElement = isElement;
  exports.isRTL = isRTL;
  exports.isVisible = isVisible;
  exports.noop = noop;
  exports.onDOMContentLoaded = onDOMContentLoaded;
  exports.parseSelector = parseSelector;
  exports.reflow = reflow;
  exports.toType = toType;
  exports.triggerTransitionEnd = triggerTransitionEnd;
  Object.defineProperty(exports, Symbol.toStringTag, {
    value: 'Module'
  });
});

/***/ }),

/***/ "./assets/common-sass/bootstrap/js/dist/util/swipe.js":
/*!************************************************************!*\
  !*** ./assets/common-sass/bootstrap/js/dist/util/swipe.js ***!
  \************************************************************/
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, _toPropertyKey(descriptor.key), descriptor); } }
function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }
function _toPropertyKey(arg) { var key = _toPrimitive(arg, "string"); return _typeof(key) === "symbol" ? key : String(key); }
function _toPrimitive(input, hint) { if (_typeof(input) !== "object" || input === null) return input; var prim = input[Symbol.toPrimitive]; if (prim !== undefined) { var res = prim.call(input, hint || "default"); if (_typeof(res) !== "object") return res; throw new TypeError("@@toPrimitive must return a primitive value."); } return (hint === "string" ? String : Number)(input); }
function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); Object.defineProperty(subClass, "prototype", { writable: false }); if (superClass) _setPrototypeOf(subClass, superClass); }
function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }
function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _getPrototypeOf(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _getPrototypeOf(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _possibleConstructorReturn(this, result); }; }
function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } else if (call !== void 0) { throw new TypeError("Derived constructors may only return object or undefined"); } return _assertThisInitialized(self); }
function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }
function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); return true; } catch (e) { return false; } }
function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf.bind() : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
/*!
  * Bootstrap swipe.js v5.3.6 (https://getbootstrap.com/)
  * Copyright 2011-2025 The Bootstrap Authors (https://github.com/twbs/bootstrap/graphs/contributors)
  * Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)
  */
(function (global, factory) {
  ( false ? 0 : _typeof(exports)) === 'object' && "object" !== 'undefined' ? module.exports = factory(__webpack_require__(/*! ../dom/event-handler.js */ "./assets/common-sass/bootstrap/js/dist/dom/event-handler.js"), __webpack_require__(/*! ./config.js */ "./assets/common-sass/bootstrap/js/dist/util/config.js"), __webpack_require__(/*! ./index.js */ "./assets/common-sass/bootstrap/js/dist/util/index.js")) :  true ? !(__WEBPACK_AMD_DEFINE_ARRAY__ = [__webpack_require__(/*! ../dom/event-handler */ "./assets/common-sass/bootstrap/js/dist/dom/event-handler.js"), __webpack_require__(/*! ./config */ "./assets/common-sass/bootstrap/js/dist/util/config.js"), __webpack_require__(/*! ./index */ "./assets/common-sass/bootstrap/js/dist/util/index.js")], __WEBPACK_AMD_DEFINE_FACTORY__ = (factory),
		__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
		(__WEBPACK_AMD_DEFINE_FACTORY__.apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__)) : __WEBPACK_AMD_DEFINE_FACTORY__),
		__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__)) : (0);
})(this, function (EventHandler, Config, index_js) {
  'use strict';

  /**
   * --------------------------------------------------------------------------
   * Bootstrap util/swipe.js
   * Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)
   * --------------------------------------------------------------------------
   */

  /**
   * Constants
   */
  var NAME = 'swipe';
  var EVENT_KEY = '.bs.swipe';
  var EVENT_TOUCHSTART = "touchstart".concat(EVENT_KEY);
  var EVENT_TOUCHMOVE = "touchmove".concat(EVENT_KEY);
  var EVENT_TOUCHEND = "touchend".concat(EVENT_KEY);
  var EVENT_POINTERDOWN = "pointerdown".concat(EVENT_KEY);
  var EVENT_POINTERUP = "pointerup".concat(EVENT_KEY);
  var POINTER_TYPE_TOUCH = 'touch';
  var POINTER_TYPE_PEN = 'pen';
  var CLASS_NAME_POINTER_EVENT = 'pointer-event';
  var SWIPE_THRESHOLD = 40;
  var Default = {
    endCallback: null,
    leftCallback: null,
    rightCallback: null
  };
  var DefaultType = {
    endCallback: '(function|null)',
    leftCallback: '(function|null)',
    rightCallback: '(function|null)'
  };

  /**
   * Class definition
   */
  var Swipe = /*#__PURE__*/function (_Config) {
    _inherits(Swipe, _Config);
    var _super = _createSuper(Swipe);
    function Swipe(element, config) {
      var _this;
      _classCallCheck(this, Swipe);
      _this = _super.call(this);
      _this._element = element;
      if (!element || !Swipe.isSupported()) {
        return _possibleConstructorReturn(_this);
      }
      _this._config = _this._getConfig(config);
      _this._deltaX = 0;
      _this._supportPointerEvents = Boolean(window.PointerEvent);
      _this._initEvents();
      return _this;
    }

    // Getters
    _createClass(Swipe, [{
      key: "dispose",
      value:
      // Public
      function dispose() {
        EventHandler.off(this._element, EVENT_KEY);
      }

      // Private
    }, {
      key: "_start",
      value: function _start(event) {
        if (!this._supportPointerEvents) {
          this._deltaX = event.touches[0].clientX;
          return;
        }
        if (this._eventIsPointerPenTouch(event)) {
          this._deltaX = event.clientX;
        }
      }
    }, {
      key: "_end",
      value: function _end(event) {
        if (this._eventIsPointerPenTouch(event)) {
          this._deltaX = event.clientX - this._deltaX;
        }
        this._handleSwipe();
        index_js.execute(this._config.endCallback);
      }
    }, {
      key: "_move",
      value: function _move(event) {
        this._deltaX = event.touches && event.touches.length > 1 ? 0 : event.touches[0].clientX - this._deltaX;
      }
    }, {
      key: "_handleSwipe",
      value: function _handleSwipe() {
        var absDeltaX = Math.abs(this._deltaX);
        if (absDeltaX <= SWIPE_THRESHOLD) {
          return;
        }
        var direction = absDeltaX / this._deltaX;
        this._deltaX = 0;
        if (!direction) {
          return;
        }
        index_js.execute(direction > 0 ? this._config.rightCallback : this._config.leftCallback);
      }
    }, {
      key: "_initEvents",
      value: function _initEvents() {
        var _this2 = this;
        if (this._supportPointerEvents) {
          EventHandler.on(this._element, EVENT_POINTERDOWN, function (event) {
            return _this2._start(event);
          });
          EventHandler.on(this._element, EVENT_POINTERUP, function (event) {
            return _this2._end(event);
          });
          this._element.classList.add(CLASS_NAME_POINTER_EVENT);
        } else {
          EventHandler.on(this._element, EVENT_TOUCHSTART, function (event) {
            return _this2._start(event);
          });
          EventHandler.on(this._element, EVENT_TOUCHMOVE, function (event) {
            return _this2._move(event);
          });
          EventHandler.on(this._element, EVENT_TOUCHEND, function (event) {
            return _this2._end(event);
          });
        }
      }
    }, {
      key: "_eventIsPointerPenTouch",
      value: function _eventIsPointerPenTouch(event) {
        return this._supportPointerEvents && (event.pointerType === POINTER_TYPE_PEN || event.pointerType === POINTER_TYPE_TOUCH);
      }

      // Static
    }], [{
      key: "Default",
      get: function get() {
        return Default;
      }
    }, {
      key: "DefaultType",
      get: function get() {
        return DefaultType;
      }
    }, {
      key: "NAME",
      get: function get() {
        return NAME;
      }
    }, {
      key: "isSupported",
      value: function isSupported() {
        return 'ontouchstart' in document.documentElement || navigator.maxTouchPoints > 0;
      }
    }]);
    return Swipe;
  }(Config);
  return Swipe;
});

/***/ }),

/***/ "./assets/common-sass/media-boxes/plugin/components/Isotope/jquery.isotope.js":
/*!************************************************************************************!*\
  !*** ./assets/common-sass/media-boxes/plugin/components/Isotope/jquery.isotope.js ***!
  \************************************************************************************/
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;var __WEBPACK_LOCAL_MODULE_1__, __WEBPACK_LOCAL_MODULE_1__factory, __WEBPACK_LOCAL_MODULE_1__module;var __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_LOCAL_MODULE_2__, __WEBPACK_LOCAL_MODULE_2__exports;var __WEBPACK_LOCAL_MODULE_3__, __WEBPACK_LOCAL_MODULE_3__factory, __WEBPACK_LOCAL_MODULE_3__module;var __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_LOCAL_MODULE_4__, __WEBPACK_LOCAL_MODULE_4__exports;var __WEBPACK_LOCAL_MODULE_5__array, __WEBPACK_LOCAL_MODULE_5__factory, __WEBPACK_LOCAL_MODULE_5__exports, __WEBPACK_LOCAL_MODULE_5__;var __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_LOCAL_MODULE_6__, __WEBPACK_LOCAL_MODULE_6__exports;var __WEBPACK_LOCAL_MODULE_7__array, __WEBPACK_LOCAL_MODULE_7__factory, __WEBPACK_LOCAL_MODULE_7__exports, __WEBPACK_LOCAL_MODULE_7__;var __WEBPACK_LOCAL_MODULE_8__array, __WEBPACK_LOCAL_MODULE_8__factory, __WEBPACK_LOCAL_MODULE_8__exports, __WEBPACK_LOCAL_MODULE_8__;var __WEBPACK_LOCAL_MODULE_9__array, __WEBPACK_LOCAL_MODULE_9__factory, __WEBPACK_LOCAL_MODULE_9__exports, __WEBPACK_LOCAL_MODULE_9__;var __WEBPACK_LOCAL_MODULE_10__array, __WEBPACK_LOCAL_MODULE_10__factory, __WEBPACK_LOCAL_MODULE_10__exports, __WEBPACK_LOCAL_MODULE_10__;var __WEBPACK_LOCAL_MODULE_11__array, __WEBPACK_LOCAL_MODULE_11__factory, __WEBPACK_LOCAL_MODULE_11__exports, __WEBPACK_LOCAL_MODULE_11__;var __WEBPACK_LOCAL_MODULE_12__array, __WEBPACK_LOCAL_MODULE_12__factory, __WEBPACK_LOCAL_MODULE_12__exports, __WEBPACK_LOCAL_MODULE_12__;var __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
/* 
 * Namespace changed by David Blanco to IsotopeMB
 */

/*!
 * IsotopeMB PACKAGED v3.0.1
 *
 * Licensed GPLv3 for open source use
 * or IsotopeMB Commercial License for commercial use
 *
 * http://isotopeMB.metafizzy.co
 * Copyright 2016 Metafizzy
 */

/**
 * Bridget makes jQuery widgets
 * v2.0.0
 * MIT license
 */

/* jshint browser: true, strict: true, undef: true, unused: true */

(function (window, factory) {
  'use strict';

  /* globals define: false, module: false, require: false */
  if (true) {
    // AMD
    !(__WEBPACK_AMD_DEFINE_ARRAY__ = [__webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")], __WEBPACK_AMD_DEFINE_RESULT__ = (function (jQuery) {
      factory(window, jQuery);
    }).apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__),
		__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));
  } else {}
})(window, function factory(window, jQuery) {
  'use strict';

  // ----- utils ----- //
  var arraySlice = Array.prototype.slice;

  // helper function for logging errors
  // $.error breaks jQuery chaining
  var console = window.console;
  var logError = typeof console == 'undefined' ? function () {} : function (message) {
    console.error(message);
  };

  // ----- jQueryBridget ----- //

  function jQueryBridget(namespace, PluginClass, $) {
    $ = $ || jQuery || window.jQuery;
    if (!$) {
      return;
    }

    // add option method -> $().plugin('option', {...})
    if (!PluginClass.prototype.option) {
      // option setter
      PluginClass.prototype.option = function (opts) {
        // bail out if not an object
        if (!$.isPlainObject(opts)) {
          return;
        }
        this.options = $.extend(true, this.options, opts);
      };
    }

    // make jQuery plugin
    $.fn[namespace] = function (arg0 /*, arg1 */) {
      if (typeof arg0 == 'string') {
        // method call $().plugin( 'methodName', { options } )
        // shift arguments by 1
        var args = arraySlice.call(arguments, 1);
        return methodCall(this, arg0, args);
      }
      // just $().plugin({ options })
      plainCall(this, arg0);
      return this;
    };

    // $().plugin('methodName')
    function methodCall($elems, methodName, args) {
      var returnValue;
      var pluginMethodStr = '$().' + namespace + '("' + methodName + '")';
      $elems.each(function (i, elem) {
        // get instance
        var instance = $.data(elem, namespace);
        if (!instance) {
          logError(namespace + ' not initialized. Cannot call methods, i.e. ' + pluginMethodStr);
          return;
        }
        var method = instance[methodName];
        if (!method || methodName.charAt(0) == '_') {
          logError(pluginMethodStr + ' is not a valid method');
          return;
        }

        // apply method, get return value
        var value = method.apply(instance, args);
        // set return value if value is returned, use only first value
        returnValue = returnValue === undefined ? value : returnValue;
      });
      return returnValue !== undefined ? returnValue : $elems;
    }
    function plainCall($elems, options) {
      $elems.each(function (i, elem) {
        var instance = $.data(elem, namespace);
        if (instance) {
          // set options & init
          instance.option(options);
          instance._init();
        } else {
          // initialize new instance
          instance = new PluginClass(elem, options);
          $.data(elem, namespace, instance);
        }
      });
    }
    updateJQuery($);
  }

  // ----- updateJQuery ----- //

  // set $.bridget for v1 backwards compatibility
  function updateJQuery($) {
    if (!$ || $ && $.bridget) {
      return;
    }
    $.bridget = jQueryBridget;
  }
  updateJQuery(jQuery || window.jQuery);

  // -----  ----- //

  return jQueryBridget;
});

/**
 * EvEmitter v1.0.3
 * Lil' event emitter
 * MIT License
 */

/* jshint unused: true, undef: true, strict: true */

(function (global, factory) {
  // universal module definition
  /* jshint strict: false */ /* globals define, module, window */
  if (true) {
    // AMD - RequireJS
    !(__WEBPACK_LOCAL_MODULE_1__factory = (factory), (typeof __WEBPACK_LOCAL_MODULE_1__factory === 'function' ? ((__WEBPACK_LOCAL_MODULE_1__module = { id: "ev-emitter/ev-emitter", exports: {}, loaded: false }), (__WEBPACK_LOCAL_MODULE_1__ = __WEBPACK_LOCAL_MODULE_1__factory.call(__WEBPACK_LOCAL_MODULE_1__module.exports, __webpack_require__, __WEBPACK_LOCAL_MODULE_1__module.exports, __WEBPACK_LOCAL_MODULE_1__module)), (__WEBPACK_LOCAL_MODULE_1__module.loaded = true), __WEBPACK_LOCAL_MODULE_1__ === undefined && (__WEBPACK_LOCAL_MODULE_1__ = __WEBPACK_LOCAL_MODULE_1__module.exports)) : __WEBPACK_LOCAL_MODULE_1__ = __WEBPACK_LOCAL_MODULE_1__factory));
  } else {}
})(typeof window != 'undefined' ? window : this, function () {
  function EvEmitter() {}
  var proto = EvEmitter.prototype;
  proto.on = function (eventName, listener) {
    if (!eventName || !listener) {
      return;
    }
    // set events hash
    var events = this._events = this._events || {};
    // set listeners array
    var listeners = events[eventName] = events[eventName] || [];
    // only add once
    if (listeners.indexOf(listener) == -1) {
      listeners.push(listener);
    }
    return this;
  };
  proto.once = function (eventName, listener) {
    if (!eventName || !listener) {
      return;
    }
    // add event
    this.on(eventName, listener);
    // set once flag
    // set onceEvents hash
    var onceEvents = this._onceEvents = this._onceEvents || {};
    // set onceListeners object
    var onceListeners = onceEvents[eventName] = onceEvents[eventName] || {};
    // set flag
    onceListeners[listener] = true;
    return this;
  };
  proto.off = function (eventName, listener) {
    var listeners = this._events && this._events[eventName];
    if (!listeners || !listeners.length) {
      return;
    }
    var index = listeners.indexOf(listener);
    if (index != -1) {
      listeners.splice(index, 1);
    }
    return this;
  };
  proto.emitEvent = function (eventName, args) {
    var listeners = this._events && this._events[eventName];
    if (!listeners || !listeners.length) {
      return;
    }
    var i = 0;
    var listener = listeners[i];
    args = args || [];
    // once stuff
    var onceListeners = this._onceEvents && this._onceEvents[eventName];
    while (listener) {
      var isOnce = onceListeners && onceListeners[listener];
      if (isOnce) {
        // remove listener
        // remove before trigger to prevent recursion
        this.off(eventName, listener);
        // unset once flag
        delete onceListeners[listener];
      }
      // trigger listener
      listener.apply(this, args);
      // get next listener
      i += isOnce ? 0 : 1;
      listener = listeners[i];
    }
    return this;
  };
  return EvEmitter;
});

/*!
 * getSize v2.0.2
 * measure size of elements
 * MIT license
 */

/*jshint browser: true, strict: true, undef: true, unused: true */
/*global define: false, module: false, console: false */

(function (window, factory) {
  'use strict';

  if (true) {
    // AMD
    !(__WEBPACK_AMD_DEFINE_ARRAY__ = [], __WEBPACK_LOCAL_MODULE_2__ = (function () {
      return factory();
    }).apply(__WEBPACK_LOCAL_MODULE_2__exports = {}, __WEBPACK_AMD_DEFINE_ARRAY__), __WEBPACK_LOCAL_MODULE_2__ === undefined && (__WEBPACK_LOCAL_MODULE_2__ = __WEBPACK_LOCAL_MODULE_2__exports));
  } else {}
})(window, function factory() {
  'use strict';

  // -------------------------- helpers -------------------------- //

  // get a number from a string, not a percentage
  function getStyleSize(value) {
    var num = parseFloat(value);
    // not a percent like '100%', and a number
    var isValid = value.indexOf('%') == -1 && !isNaN(num);
    return isValid && num;
  }
  function noop() {}
  var logError = typeof console == 'undefined' ? noop : function (message) {
    console.error(message);
  };

  // -------------------------- measurements -------------------------- //

  var measurements = ['paddingLeft', 'paddingRight', 'paddingTop', 'paddingBottom', 'marginLeft', 'marginRight', 'marginTop', 'marginBottom', 'borderLeftWidth', 'borderRightWidth', 'borderTopWidth', 'borderBottomWidth'];
  var measurementsLength = measurements.length;
  function getZeroSize() {
    var size = {
      width: 0,
      height: 0,
      innerWidth: 0,
      innerHeight: 0,
      outerWidth: 0,
      outerHeight: 0
    };
    for (var i = 0; i < measurementsLength; i++) {
      var measurement = measurements[i];
      size[measurement] = 0;
    }
    return size;
  }

  // -------------------------- getStyle -------------------------- //

  /**
   * getStyle, get style of element, check for Firefox bug
   * https://bugzilla.mozilla.org/show_bug.cgi?id=548397
   */
  function getStyle(elem) {
    var style = getComputedStyle(elem);
    if (!style) {
      logError('Style returned ' + style + '. Are you running this code in a hidden iframe on Firefox? ' + 'See http://bit.ly/getsizebug1');
    }
    return style;
  }

  // -------------------------- setup -------------------------- //

  var isSetup = false;
  var isBoxSizeOuter;

  /**
   * setup
   * check isBoxSizerOuter
   * do on first getSize() rather than on page load for Firefox bug
   */
  function setup() {
    // setup once
    if (isSetup) {
      return;
    }
    isSetup = true;

    // -------------------------- box sizing -------------------------- //

    /**
     * WebKit measures the outer-width on style.width on border-box elems
     * IE & Firefox<29 measures the inner-width
     */
    var div = document.createElement('div');
    div.style.width = '200px';
    div.style.padding = '1px 2px 3px 4px';
    div.style.borderStyle = 'solid';
    div.style.borderWidth = '1px 2px 3px 4px';
    div.style.boxSizing = 'border-box';
    var body = document.body || document.documentElement;
    body.appendChild(div);
    var style = getStyle(div);
    getSize.isBoxSizeOuter = isBoxSizeOuter = getStyleSize(style.width) == 200;
    body.removeChild(div);
  }

  // -------------------------- getSize -------------------------- //

  function getSize(elem) {
    setup();

    // use querySeletor if elem is string
    if (typeof elem == 'string') {
      elem = document.querySelector(elem);
    }

    // do not proceed on non-objects
    if (!elem || _typeof(elem) != 'object' || !elem.nodeType) {
      return;
    }
    var style = getStyle(elem);

    // if hidden, everything is 0
    if (style.display == 'none') {
      return getZeroSize();
    }
    var size = {};
    size.width = elem.offsetWidth;
    size.height = elem.offsetHeight;
    var isBorderBox = size.isBorderBox = style.boxSizing == 'border-box';

    // get all measurements
    for (var i = 0; i < measurementsLength; i++) {
      var measurement = measurements[i];
      var value = style[measurement];
      var num = parseFloat(value);
      // any 'auto', 'medium' value will be 0
      size[measurement] = !isNaN(num) ? num : 0;
    }
    var paddingWidth = size.paddingLeft + size.paddingRight;
    var paddingHeight = size.paddingTop + size.paddingBottom;
    var marginWidth = size.marginLeft + size.marginRight;
    var marginHeight = size.marginTop + size.marginBottom;
    var borderWidth = size.borderLeftWidth + size.borderRightWidth;
    var borderHeight = size.borderTopWidth + size.borderBottomWidth;
    var isBorderBoxSizeOuter = isBorderBox && isBoxSizeOuter;

    // overwrite width and height if we can get it from style
    var styleWidth = getStyleSize(style.width);
    if (styleWidth !== false) {
      size.width = styleWidth + (
      // add padding and border unless it's already including it
      isBorderBoxSizeOuter ? 0 : paddingWidth + borderWidth);
    }
    var styleHeight = getStyleSize(style.height);
    if (styleHeight !== false) {
      size.height = styleHeight + (
      // add padding and border unless it's already including it
      isBorderBoxSizeOuter ? 0 : paddingHeight + borderHeight);
    }
    size.innerWidth = size.width - (paddingWidth + borderWidth);
    size.innerHeight = size.height - (paddingHeight + borderHeight);
    size.outerWidth = size.width + marginWidth;
    size.outerHeight = size.height + marginHeight;
    return size;
  }
  return getSize;
});

/**
 * matchesSelector v2.0.1
 * matchesSelector( element, '.selector' )
 * MIT license
 */

/*jshint browser: true, strict: true, undef: true, unused: true */

(function (window, factory) {
  /*global define: false, module: false */
  'use strict';

  // universal module definition
  if (true) {
    // AMD
    !(__WEBPACK_LOCAL_MODULE_3__factory = (factory), (typeof __WEBPACK_LOCAL_MODULE_3__factory === 'function' ? ((__WEBPACK_LOCAL_MODULE_3__module = { id: "desandro-matches-selector/matches-selector", exports: {}, loaded: false }), (__WEBPACK_LOCAL_MODULE_3__ = __WEBPACK_LOCAL_MODULE_3__factory.call(__WEBPACK_LOCAL_MODULE_3__module.exports, __webpack_require__, __WEBPACK_LOCAL_MODULE_3__module.exports, __WEBPACK_LOCAL_MODULE_3__module)), (__WEBPACK_LOCAL_MODULE_3__module.loaded = true), __WEBPACK_LOCAL_MODULE_3__ === undefined && (__WEBPACK_LOCAL_MODULE_3__ = __WEBPACK_LOCAL_MODULE_3__module.exports)) : __WEBPACK_LOCAL_MODULE_3__ = __WEBPACK_LOCAL_MODULE_3__factory));
  } else {}
})(window, function factory() {
  'use strict';

  var matchesMethod = function () {
    var ElemProto = Element.prototype;
    // check for the standard method name first
    if (ElemProto.matches) {
      return 'matches';
    }
    // check un-prefixed
    if (ElemProto.matchesSelector) {
      return 'matchesSelector';
    }
    // check vendor prefixes
    var prefixes = ['webkit', 'moz', 'ms', 'o'];
    for (var i = 0; i < prefixes.length; i++) {
      var prefix = prefixes[i];
      var method = prefix + 'MatchesSelector';
      if (ElemProto[method]) {
        return method;
      }
    }
  }();
  return function matchesSelector(elem, selector) {
    return elem[matchesMethod](selector);
  };
});

/**
 * Fizzy UI utils v2.0.2
 * MIT license
 */

/*jshint browser: true, undef: true, unused: true, strict: true */

(function (window, factory) {
  // universal module definition
  /*jshint strict: false */ /*globals define, module, require */

  if (true) {
    // AMD
    !(__WEBPACK_AMD_DEFINE_ARRAY__ = [__WEBPACK_LOCAL_MODULE_3__], __WEBPACK_LOCAL_MODULE_4__ = (function (matchesSelector) {
      return factory(window, matchesSelector);
    }).apply(__WEBPACK_LOCAL_MODULE_4__exports = {}, __WEBPACK_AMD_DEFINE_ARRAY__), __WEBPACK_LOCAL_MODULE_4__ === undefined && (__WEBPACK_LOCAL_MODULE_4__ = __WEBPACK_LOCAL_MODULE_4__exports));
  } else {}
})(window, function factory(window, matchesSelector) {
  var utils = {};

  // ----- extend ----- //

  // extends objects
  utils.extend = function (a, b) {
    for (var prop in b) {
      a[prop] = b[prop];
    }
    return a;
  };

  // ----- modulo ----- //

  utils.modulo = function (num, div) {
    return (num % div + div) % div;
  };

  // ----- makeArray ----- //

  // turn element or nodeList into an array
  utils.makeArray = function (obj) {
    var ary = [];
    if (Array.isArray(obj)) {
      // use object if already an array
      ary = obj;
    } else if (obj && typeof obj.length == 'number') {
      // convert nodeList to array
      for (var i = 0; i < obj.length; i++) {
        ary.push(obj[i]);
      }
    } else {
      // array of single index
      ary.push(obj);
    }
    return ary;
  };

  // ----- removeFrom ----- //

  utils.removeFrom = function (ary, obj) {
    var index = ary.indexOf(obj);
    if (index != -1) {
      ary.splice(index, 1);
    }
  };

  // ----- getParent ----- //

  utils.getParent = function (elem, selector) {
    while (elem != document.body) {
      elem = elem.parentNode;
      if (matchesSelector(elem, selector)) {
        return elem;
      }
    }
  };

  // ----- getQueryElement ----- //

  // use element as selector string
  utils.getQueryElement = function (elem) {
    if (typeof elem == 'string') {
      return document.querySelector(elem);
    }
    return elem;
  };

  // ----- handleEvent ----- //

  // enable .ontype to trigger from .addEventListener( elem, 'type' )
  utils.handleEvent = function (event) {
    var method = 'on' + event.type;
    if (this[method]) {
      this[method](event);
    }
  };

  // ----- filterFindElements ----- //

  utils.filterFindElements = function (elems, selector) {
    // make array of elems
    elems = utils.makeArray(elems);
    var ffElems = [];
    elems.forEach(function (elem) {
      // check that elem is an actual element
      if (!(elem instanceof HTMLElement)) {
        return;
      }
      // add elem if no selector
      if (!selector) {
        ffElems.push(elem);
        return;
      }
      // filter & find items if we have a selector
      // filter
      if (matchesSelector(elem, selector)) {
        ffElems.push(elem);
      }
      // find children
      var childElems = elem.querySelectorAll(selector);
      // concat childElems to filterFound array
      for (var i = 0; i < childElems.length; i++) {
        ffElems.push(childElems[i]);
      }
    });
    return ffElems;
  };

  // ----- debounceMethod ----- //

  utils.debounceMethod = function (_class, methodName, threshold) {
    // original method
    var method = _class.prototype[methodName];
    var timeoutName = methodName + 'Timeout';
    _class.prototype[methodName] = function () {
      var timeout = this[timeoutName];
      if (timeout) {
        clearTimeout(timeout);
      }
      var args = arguments;
      var _this = this;
      this[timeoutName] = setTimeout(function () {
        method.apply(_this, args);
        delete _this[timeoutName];
      }, threshold || 100);
    };
  };

  // ----- docReady ----- //

  utils.docReady = function (callback) {
    var readyState = document.readyState;
    if (readyState == 'complete' || readyState == 'interactive') {
      callback();
    } else {
      document.addEventListener('DOMContentLoaded', callback);
    }
  };

  // ----- htmlInit ----- //

  // http://jamesroberts.name/blog/2010/02/22/string-functions-for-javascript-trim-to-camel-case-to-dashed-and-to-underscore/
  utils.toDashed = function (str) {
    return str.replace(/(.)([A-Z])/g, function (match, $1, $2) {
      return $1 + '-' + $2;
    }).toLowerCase();
  };
  var console = window.console;
  /**
   * allow user to initialize classes via [data-namespace] or .js-namespace class
   * htmlInit( Widget, 'widgetName' )
   * options are parsed from data-namespace-options
   */
  utils.htmlInit = function (WidgetClass, namespace) {
    utils.docReady(function () {
      var dashedNamespace = utils.toDashed(namespace);
      var dataAttr = 'data-' + dashedNamespace;
      var dataAttrElems = document.querySelectorAll('[' + dataAttr + ']');
      var jsDashElems = document.querySelectorAll('.js-' + dashedNamespace);
      var elems = utils.makeArray(dataAttrElems).concat(utils.makeArray(jsDashElems));
      var dataOptionsAttr = dataAttr + '-options';
      var jQuery = window.jQuery;
      elems.forEach(function (elem) {
        var attr = elem.getAttribute(dataAttr) || elem.getAttribute(dataOptionsAttr);
        var options;
        try {
          options = attr && JSON.parse(attr);
        } catch (error) {
          // log error, do not initialize
          if (console) {
            console.error('Error parsing ' + dataAttr + ' on ' + elem.className + ': ' + error);
          }
          return;
        }
        // initialize
        var instance = new WidgetClass(elem, options);
        // make available via $().data('layoutname')
        if (jQuery) {
          jQuery.data(elem, namespace, instance);
        }
      });
    });
  };

  // -----  ----- //

  return utils;
});

/**
 * Outlayer Item
 */

(function (window, factory) {
  // universal module definition
  /* jshint strict: false */ /* globals define, module, require */
  if (true) {
    // AMD - RequireJS
    !(__WEBPACK_LOCAL_MODULE_5__array = [__WEBPACK_LOCAL_MODULE_1__, __WEBPACK_LOCAL_MODULE_2__], __WEBPACK_LOCAL_MODULE_5__factory = (factory),
		(typeof __WEBPACK_LOCAL_MODULE_5__factory === 'function' ?
			((__WEBPACK_LOCAL_MODULE_5__ = __WEBPACK_LOCAL_MODULE_5__factory.apply(__WEBPACK_LOCAL_MODULE_5__exports = {}, __WEBPACK_LOCAL_MODULE_5__array)), __WEBPACK_LOCAL_MODULE_5__ === undefined && (__WEBPACK_LOCAL_MODULE_5__ = __WEBPACK_LOCAL_MODULE_5__exports)) :
			(__WEBPACK_LOCAL_MODULE_5__ = __WEBPACK_LOCAL_MODULE_5__factory)
		));
  } else {}
})(window, function factory(EvEmitter, getSize) {
  'use strict';

  // ----- helpers ----- //
  function isEmptyObj(obj) {
    for (var prop in obj) {
      return false;
    }
    prop = null;
    return true;
  }

  // -------------------------- CSS3 support -------------------------- //

  var docElemStyle = document.documentElement.style;
  var transitionProperty = typeof docElemStyle.transition == 'string' ? 'transition' : 'WebkitTransition';
  var transformProperty = typeof docElemStyle.transform == 'string' ? 'transform' : 'WebkitTransform';
  var transitionEndEvent = {
    WebkitTransition: 'webkitTransitionEnd',
    transition: 'transitionend'
  }[transitionProperty];

  // cache all vendor properties that could have vendor prefix
  var vendorProperties = {
    transform: transformProperty,
    transition: transitionProperty,
    transitionDuration: transitionProperty + 'Duration',
    transitionProperty: transitionProperty + 'Property',
    transitionDelay: transitionProperty + 'Delay'
  };

  // -------------------------- Item -------------------------- //

  function Item(element, layout) {
    if (!element) {
      return;
    }
    this.element = element;
    // parent layout class, i.e. Masonry, IsotopeMB, or Packery
    this.layout = layout;
    this.position = {
      x: 0,
      y: 0
    };
    this._create();
  }

  // inherit EvEmitter
  var proto = Item.prototype = Object.create(EvEmitter.prototype);
  proto.constructor = Item;
  proto._create = function () {
    // transition objects
    this._transn = {
      ingProperties: {},
      clean: {},
      onEnd: {}
    };
    this.css({
      position: 'absolute'
    });
  };

  // trigger specified handler for event type
  proto.handleEvent = function (event) {
    var method = 'on' + event.type;
    if (this[method]) {
      this[method](event);
    }
  };
  proto.getSize = function () {
    this.size = getSize(this.element);
  };

  /**
   * apply CSS styles to element
   * @param {Object} style
   */
  proto.css = function (style) {
    var elemStyle = this.element.style;
    for (var prop in style) {
      // use vendor property if available
      var supportedProp = vendorProperties[prop] || prop;
      elemStyle[supportedProp] = style[prop];
    }
  };

  // measure position, and sets it
  proto.getPosition = function () {
    var style = getComputedStyle(this.element);
    var isOriginLeft = this.layout._getOption('originLeft');
    var isOriginTop = this.layout._getOption('originTop');
    var xValue = style[isOriginLeft ? 'left' : 'right'];
    var yValue = style[isOriginTop ? 'top' : 'bottom'];
    // convert percent to pixels
    var layoutSize = this.layout.size;
    var x = xValue.indexOf('%') != -1 ? parseFloat(xValue) / 100 * layoutSize.width : parseInt(xValue, 10);
    var y = yValue.indexOf('%') != -1 ? parseFloat(yValue) / 100 * layoutSize.height : parseInt(yValue, 10);

    // clean up 'auto' or other non-integer values
    x = isNaN(x) ? 0 : x;
    y = isNaN(y) ? 0 : y;
    // remove padding from measurement
    x -= isOriginLeft ? layoutSize.paddingLeft : layoutSize.paddingRight;
    y -= isOriginTop ? layoutSize.paddingTop : layoutSize.paddingBottom;
    this.position.x = x;
    this.position.y = y;
  };

  // set settled position, apply padding
  proto.layoutPosition = function () {
    var layoutSize = this.layout.size;
    var style = {};
    var isOriginLeft = this.layout._getOption('originLeft');
    var isOriginTop = this.layout._getOption('originTop');

    // x
    var xPadding = isOriginLeft ? 'paddingLeft' : 'paddingRight';
    var xProperty = isOriginLeft ? 'left' : 'right';
    var xResetProperty = isOriginLeft ? 'right' : 'left';
    var x = this.position.x + layoutSize[xPadding];
    // set in percentage or pixels
    style[xProperty] = this.getXValue(x);
    // reset other property
    style[xResetProperty] = '';

    // y
    var yPadding = isOriginTop ? 'paddingTop' : 'paddingBottom';
    var yProperty = isOriginTop ? 'top' : 'bottom';
    var yResetProperty = isOriginTop ? 'bottom' : 'top';
    var y = this.position.y + layoutSize[yPadding];
    // set in percentage or pixels
    style[yProperty] = this.getYValue(y);
    // reset other property
    style[yResetProperty] = '';
    this.css(style);
    this.emitEvent('layout', [this]);
  };
  proto.getXValue = function (x) {
    var isHorizontal = this.layout._getOption('horizontal');
    return this.layout.options.percentPosition && !isHorizontal ? x / this.layout.size.width * 100 + '%' : x + 'px';
  };
  proto.getYValue = function (y) {
    var isHorizontal = this.layout._getOption('horizontal');
    return this.layout.options.percentPosition && isHorizontal ? y / this.layout.size.height * 100 + '%' : y + 'px';
  };
  proto._transitionTo = function (x, y) {
    this.getPosition();
    // get current x & y from top/left
    var curX = this.position.x;
    var curY = this.position.y;
    var compareX = parseInt(x, 10);
    var compareY = parseInt(y, 10);
    var didNotMove = compareX === this.position.x && compareY === this.position.y;

    // save end position
    this.setPosition(x, y);

    // if did not move and not transitioning, just go to layout
    if (didNotMove && !this.isTransitioning) {
      this.layoutPosition();
      return;
    }
    var transX = x - curX;
    var transY = y - curY;
    var transitionStyle = {};
    transitionStyle.transform = this.getTranslate(transX, transY);
    this.transition({
      to: transitionStyle,
      onTransitionEnd: {
        transform: this.layoutPosition
      },
      isCleaning: true
    });
  };
  proto.getTranslate = function (x, y) {
    // flip cooridinates if origin on right or bottom
    var isOriginLeft = this.layout._getOption('originLeft');
    var isOriginTop = this.layout._getOption('originTop');
    x = isOriginLeft ? x : -x;
    y = isOriginTop ? y : -y;
    return 'translate3d(' + x + 'px, ' + y + 'px, 0)';
  };

  // non transition + transform support
  proto.goTo = function (x, y) {
    this.setPosition(x, y);
    this.layoutPosition();
  };
  proto.moveTo = proto._transitionTo;
  proto.setPosition = function (x, y) {
    this.position.x = parseInt(x, 10);
    this.position.y = parseInt(y, 10);
  };

  // ----- transition ----- //

  /**
   * @param {Object} style - CSS
   * @param {Function} onTransitionEnd
   */

  // non transition, just trigger callback
  proto._nonTransition = function (args) {
    this.css(args.to);
    if (args.isCleaning) {
      this._removeStyles(args.to);
    }
    for (var prop in args.onTransitionEnd) {
      args.onTransitionEnd[prop].call(this);
    }
  };

  /**
   * proper transition
   * @param {Object} args - arguments
   *   @param {Object} to - style to transition to
   *   @param {Object} from - style to start transition from
   *   @param {Boolean} isCleaning - removes transition styles after transition
   *   @param {Function} onTransitionEnd - callback
   */
  proto.transition = function (args) {
    // redirect to nonTransition if no transition duration
    if (!parseFloat(this.layout.options.transitionDuration)) {
      this._nonTransition(args);
      return;
    }
    var _transition = this._transn;
    // keep track of onTransitionEnd callback by css property
    for (var prop in args.onTransitionEnd) {
      _transition.onEnd[prop] = args.onTransitionEnd[prop];
    }
    // keep track of properties that are transitioning
    for (prop in args.to) {
      _transition.ingProperties[prop] = true;
      // keep track of properties to clean up when transition is done
      if (args.isCleaning) {
        _transition.clean[prop] = true;
      }
    }

    // set from styles
    if (args.from) {
      this.css(args.from);
      // force redraw. http://blog.alexmaccaw.com/css-transitions
      var h = this.element.offsetHeight;
      // hack for JSHint to hush about unused var
      h = null;
    }
    // enable transition
    this.enableTransition(args.to);
    // set styles that are transitioning
    this.css(args.to);
    this.isTransitioning = true;
  };

  // dash before all cap letters, including first for
  // WebkitTransform => -webkit-transform
  function toDashedAll(str) {
    return str.replace(/([A-Z])/g, function ($1) {
      return '-' + $1.toLowerCase();
    });
  }
  var transitionProps = 'opacity,' + toDashedAll(transformProperty);
  proto.enableTransition = function /* style */
  () {
    // HACK changing transitionProperty during a transition
    // will cause transition to jump
    if (this.isTransitioning) {
      return;
    }

    // make `transition: foo, bar, baz` from style object
    // HACK un-comment this when enableTransition can work
    // while a transition is happening
    // var transitionValues = [];
    // for ( var prop in style ) {
    //   // dash-ify camelCased properties like WebkitTransition
    //   prop = vendorProperties[ prop ] || prop;
    //   transitionValues.push( toDashedAll( prop ) );
    // }
    // munge number to millisecond, to match stagger
    var duration = this.layout.options.transitionDuration;
    duration = typeof duration == 'number' ? duration + 'ms' : duration;
    // enable transition styles
    this.css({
      transitionProperty: transitionProps,
      transitionDuration: duration,
      transitionDelay: this.staggerDelay || 0
    });
    // listen for transition end event
    this.element.addEventListener(transitionEndEvent, this, false);
  };

  // ----- events ----- //

  proto.onwebkitTransitionEnd = function (event) {
    this.ontransitionend(event);
  };
  proto.onotransitionend = function (event) {
    this.ontransitionend(event);
  };

  // properties that I munge to make my life easier
  var dashedVendorProperties = {
    '-webkit-transform': 'transform'
  };
  proto.ontransitionend = function (event) {
    // disregard bubbled events from children
    if (event.target !== this.element) {
      return;
    }
    var _transition = this._transn;
    // get property name of transitioned property, convert to prefix-free
    var propertyName = dashedVendorProperties[event.propertyName] || event.propertyName;

    // remove property that has completed transitioning
    delete _transition.ingProperties[propertyName];
    // check if any properties are still transitioning
    if (isEmptyObj(_transition.ingProperties)) {
      // all properties have completed transitioning
      this.disableTransition();
    }
    // clean style
    if (propertyName in _transition.clean) {
      // clean up style
      this.element.style[event.propertyName] = '';
      delete _transition.clean[propertyName];
    }
    // trigger onTransitionEnd callback
    if (propertyName in _transition.onEnd) {
      var onTransitionEnd = _transition.onEnd[propertyName];
      onTransitionEnd.call(this);
      delete _transition.onEnd[propertyName];
    }
    this.emitEvent('transitionEnd', [this]);
  };
  proto.disableTransition = function () {
    this.removeTransitionStyles();
    this.element.removeEventListener(transitionEndEvent, this, false);
    this.isTransitioning = false;
  };

  /**
   * removes style property from element
   * @param {Object} style
  **/
  proto._removeStyles = function (style) {
    // clean up transition styles
    var cleanStyle = {};
    for (var prop in style) {
      cleanStyle[prop] = '';
    }
    this.css(cleanStyle);
  };
  var cleanTransitionStyle = {
    transitionProperty: '',
    transitionDuration: '',
    transitionDelay: ''
  };
  proto.removeTransitionStyles = function () {
    // remove transition
    this.css(cleanTransitionStyle);
  };

  // ----- stagger ----- //

  proto.stagger = function (delay) {
    delay = isNaN(delay) ? 0 : delay;
    this.staggerDelay = delay + 'ms';
  };

  // ----- show/hide/remove ----- //

  // remove element from DOM
  proto.removeElem = function () {
    this.element.parentNode.removeChild(this.element);
    // remove display: none
    this.css({
      display: ''
    });
    this.emitEvent('remove', [this]);
  };
  proto.remove = function () {
    // just remove element if no transition support or no transition
    if (!transitionProperty || !parseFloat(this.layout.options.transitionDuration)) {
      this.removeElem();
      return;
    }

    // start transition
    this.once('transitionEnd', function () {
      this.removeElem();
    });
    this.hide();
  };
  proto.reveal = function () {
    delete this.isHidden;
    // remove display: none
    this.css({
      display: ''
    });
    var options = this.layout.options;
    var onTransitionEnd = {};
    var transitionEndProperty = this.getHideRevealTransitionEndProperty('visibleStyle');
    onTransitionEnd[transitionEndProperty] = this.onRevealTransitionEnd;
    this.transition({
      from: options.hiddenStyle,
      to: options.visibleStyle,
      isCleaning: true,
      onTransitionEnd: onTransitionEnd
    });
  };
  proto.onRevealTransitionEnd = function () {
    // check if still visible
    // during transition, item may have been hidden
    if (!this.isHidden) {
      this.emitEvent('reveal');
    }
  };

  /**
   * get style property use for hide/reveal transition end
   * @param {String} styleProperty - hiddenStyle/visibleStyle
   * @returns {String}
   */
  proto.getHideRevealTransitionEndProperty = function (styleProperty) {
    var optionStyle = this.layout.options[styleProperty];
    // use opacity
    if (optionStyle.opacity) {
      return 'opacity';
    }
    // get first property
    for (var prop in optionStyle) {
      return prop;
    }
  };
  proto.hide = function () {
    // set flag
    this.isHidden = true;
    // remove display: none
    this.css({
      display: ''
    });
    var options = this.layout.options;
    var onTransitionEnd = {};
    var transitionEndProperty = this.getHideRevealTransitionEndProperty('hiddenStyle');
    onTransitionEnd[transitionEndProperty] = this.onHideTransitionEnd;
    this.transition({
      from: options.visibleStyle,
      to: options.hiddenStyle,
      // keep hidden stuff hidden
      isCleaning: true,
      onTransitionEnd: onTransitionEnd
    });
  };
  proto.onHideTransitionEnd = function () {
    // check if still hidden
    // during transition, item may have been un-hidden
    if (this.isHidden) {
      this.css({
        display: 'none'
      });
      this.emitEvent('hide');
    }
  };
  proto.destroy = function () {
    this.css({
      position: '',
      left: '',
      right: '',
      top: '',
      bottom: '',
      transition: '',
      transform: ''
    });
  };
  return Item;
});

/*!
 * Outlayer v2.1.0
 * the brains and guts of a layout library
 * MIT license
 */

(function (window, factory) {
  'use strict';

  // universal module definition
  /* jshint strict: false */ /* globals define, module, require */
  if (true) {
    // AMD - RequireJS
    !(__WEBPACK_AMD_DEFINE_ARRAY__ = [__WEBPACK_LOCAL_MODULE_1__, __WEBPACK_LOCAL_MODULE_2__, __WEBPACK_LOCAL_MODULE_4__, __WEBPACK_LOCAL_MODULE_5__], __WEBPACK_LOCAL_MODULE_6__ = (function (EvEmitter, getSize, utils, Item) {
      return factory(window, EvEmitter, getSize, utils, Item);
    }).apply(__WEBPACK_LOCAL_MODULE_6__exports = {}, __WEBPACK_AMD_DEFINE_ARRAY__), __WEBPACK_LOCAL_MODULE_6__ === undefined && (__WEBPACK_LOCAL_MODULE_6__ = __WEBPACK_LOCAL_MODULE_6__exports));
  } else {}
})(window, function factory(window, EvEmitter, getSize, utils, Item) {
  'use strict';

  // ----- vars ----- //
  var console = window.console;
  var jQuery = window.jQuery;
  var noop = function noop() {};

  // -------------------------- Outlayer -------------------------- //

  // globally unique identifiers
  var GUID = 0;
  // internal store of all Outlayer intances
  var instances = {};

  /**
   * @param {Element, String} element
   * @param {Object} options
   * @constructor
   */
  function Outlayer(element, options) {
    var queryElement = utils.getQueryElement(element);
    if (!queryElement) {
      if (console) {
        console.error('Bad element for ' + this.constructor.namespace + ': ' + (queryElement || element));
      }
      return;
    }
    this.element = queryElement;
    // add jQuery
    if (jQuery) {
      this.$element = jQuery(this.element);
    }

    // options
    this.options = utils.extend({}, this.constructor.defaults);
    this.option(options);

    // add id for Outlayer.getFromElement
    var id = ++GUID;
    this.element.outlayerGUID = id; // expando
    instances[id] = this; // associate via id

    // kick it off
    this._create();
    var isInitLayout = this._getOption('initLayout');
    if (isInitLayout) {
      this.layout();
    }
  }

  // settings are for internal use only
  Outlayer.namespace = 'outlayer';
  Outlayer.Item = Item;

  // default options
  Outlayer.defaults = {
    containerStyle: {
      position: 'relative'
    },
    initLayout: true,
    originLeft: true,
    originTop: true,
    resize: true,
    resizeContainer: true,
    // item options
    transitionDuration: '0.4s',
    hiddenStyle: {
      opacity: 0,
      transform: 'scale(0.001)'
    },
    visibleStyle: {
      opacity: 1,
      transform: 'scale(1)'
    }
  };
  var proto = Outlayer.prototype;
  // inherit EvEmitter
  utils.extend(proto, EvEmitter.prototype);

  /**
   * set options
   * @param {Object} opts
   */
  proto.option = function (opts) {
    utils.extend(this.options, opts);
  };

  /**
   * get backwards compatible option value, check old name
   */
  proto._getOption = function (option) {
    var oldOption = this.constructor.compatOptions[option];
    return oldOption && this.options[oldOption] !== undefined ? this.options[oldOption] : this.options[option];
  };
  Outlayer.compatOptions = {
    // currentName: oldName
    initLayout: 'isInitLayout',
    horizontal: 'isHorizontal',
    layoutInstant: 'isLayoutInstant',
    originLeft: 'isOriginLeft',
    originTop: 'isOriginTop',
    resize: 'isResizeBound',
    resizeContainer: 'isResizingContainer'
  };
  proto._create = function () {
    // get items from children
    this.reloadItems();
    // elements that affect layout, but are not laid out
    this.stamps = [];
    this.stamp(this.options.stamp);
    // set container style
    utils.extend(this.element.style, this.options.containerStyle);

    // bind resize method
    var canBindResize = this._getOption('resize');
    if (canBindResize) {
      this.bindResize();
    }
  };

  // goes through all children again and gets bricks in proper order
  proto.reloadItems = function () {
    // collection of item elements
    this.items = this._itemize(this.element.children);
  };

  /**
   * turn elements into Outlayer.Items to be used in layout
   * @param {Array or NodeList or HTMLElement} elems
   * @returns {Array} items - collection of new Outlayer Items
   */
  proto._itemize = function (elems) {
    var itemElems = this._filterFindItemElements(elems);
    var Item = this.constructor.Item;

    // create new Outlayer Items for collection
    var items = [];
    for (var i = 0; i < itemElems.length; i++) {
      var elem = itemElems[i];
      var item = new Item(elem, this);
      items.push(item);
    }
    return items;
  };

  /**
   * get item elements to be used in layout
   * @param {Array or NodeList or HTMLElement} elems
   * @returns {Array} items - item elements
   */
  proto._filterFindItemElements = function (elems) {
    return utils.filterFindElements(elems, this.options.itemSelector);
  };

  /**
   * getter method for getting item elements
   * @returns {Array} elems - collection of item elements
   */
  proto.getItemElements = function () {
    return this.items.map(function (item) {
      return item.element;
    });
  };

  // ----- init & layout ----- //

  /**
   * lays out all items
   */
  proto.layout = function () {
    this._resetLayout();
    this._manageStamps();

    // don't animate first layout
    var layoutInstant = this._getOption('layoutInstant');
    var isInstant = layoutInstant !== undefined ? layoutInstant : !this._isLayoutInited;
    this.layoutItems(this.items, isInstant);

    // flag for initalized
    this._isLayoutInited = true;
  };

  // _init is alias for layout
  proto._init = proto.layout;

  /**
   * logic before any new layout
   */
  proto._resetLayout = function () {
    this.getSize();
  };
  proto.getSize = function () {
    this.size = getSize(this.element);
  };

  /**
   * get measurement from option, for columnWidth, rowHeight, gutter
   * if option is String -> get element from selector string, & get size of element
   * if option is Element -> get size of element
   * else use option as a number
   *
   * @param {String} measurement
   * @param {String} size - width or height
   * @private
   */
  proto._getMeasurement = function (measurement, size) {
    var option = this.options[measurement];
    var elem;
    if (!option) {
      // default to 0
      this[measurement] = 0;
    } else {
      // use option as an element
      if (typeof option == 'string') {
        elem = this.element.querySelector(option);
      } else if (option instanceof HTMLElement) {
        elem = option;
      }
      // use size of element, if element
      this[measurement] = elem ? getSize(elem)[size] : option;
    }
  };

  /**
   * layout a collection of item elements
   * @api public
   */
  proto.layoutItems = function (items, isInstant) {
    items = this._getItemsForLayout(items);
    this._layoutItems(items, isInstant);
    this._postLayout();
  };

  /**
   * get the items to be laid out
   * you may want to skip over some items
   * @param {Array} items
   * @returns {Array} items
   */
  proto._getItemsForLayout = function (items) {
    return items.filter(function (item) {
      return !item.isIgnored;
    });
  };

  /**
   * layout items
   * @param {Array} items
   * @param {Boolean} isInstant
   */
  proto._layoutItems = function (items, isInstant) {
    this._emitCompleteOnItems('layout', items);
    if (!items || !items.length) {
      // no items, emit event with empty array
      return;
    }
    var queue = [];
    items.forEach(function (item) {
      // get x/y object from method
      var position = this._getItemLayoutPosition(item);
      // enqueue
      position.item = item;
      position.isInstant = isInstant || item.isLayoutInstant;
      queue.push(position);
    }, this);
    this._processLayoutQueue(queue);
  };

  /**
   * get item layout position
   * @param {Outlayer.Item} item
   * @returns {Object} x and y position
   */
  proto._getItemLayoutPosition = function /* item */
  () {
    return {
      x: 0,
      y: 0
    };
  };

  /**
   * iterate over array and position each item
   * Reason being - separating this logic prevents 'layout invalidation'
   * thx @paul_irish
   * @param {Array} queue
   */
  proto._processLayoutQueue = function (queue) {
    this.updateStagger();
    queue.forEach(function (obj, i) {
      this._positionItem(obj.item, obj.x, obj.y, obj.isInstant, i);
    }, this);
  };

  // set stagger from option in milliseconds number
  proto.updateStagger = function () {
    var stagger = this.options.stagger;
    if (stagger === null || stagger === undefined) {
      this.stagger = 0;
      return;
    }
    this.stagger = getMilliseconds(stagger);
    return this.stagger;
  };

  /**
   * Sets position of item in DOM
   * @param {Outlayer.Item} item
   * @param {Number} x - horizontal position
   * @param {Number} y - vertical position
   * @param {Boolean} isInstant - disables transitions
   */
  proto._positionItem = function (item, x, y, isInstant, i) {
    if (isInstant) {
      // if not transition, just set CSS
      item.goTo(x, y);
    } else {
      item.stagger(i * this.stagger);
      item.moveTo(x, y);
    }
  };

  /**
   * Any logic you want to do after each layout,
   * i.e. size the container
   */
  proto._postLayout = function () {
    this.resizeContainer();
  };
  proto.resizeContainer = function () {
    var isResizingContainer = this._getOption('resizeContainer');
    if (!isResizingContainer) {
      return;
    }
    var size = this._getContainerSize();
    if (size) {
      this._setContainerMeasure(size.width, true);
      this._setContainerMeasure(size.height, false);
    }
  };

  /**
   * Sets width or height of container if returned
   * @returns {Object} size
   *   @param {Number} width
   *   @param {Number} height
   */
  proto._getContainerSize = noop;

  /**
   * @param {Number} measure - size of width or height
   * @param {Boolean} isWidth
   */
  proto._setContainerMeasure = function (measure, isWidth) {
    if (measure === undefined) {
      return;
    }
    var elemSize = this.size;
    // add padding and border width if border box
    if (elemSize.isBorderBox) {
      measure += isWidth ? elemSize.paddingLeft + elemSize.paddingRight + elemSize.borderLeftWidth + elemSize.borderRightWidth : elemSize.paddingBottom + elemSize.paddingTop + elemSize.borderTopWidth + elemSize.borderBottomWidth;
    }
    measure = Math.max(measure, 0);
    this.element.style[isWidth ? 'width' : 'height'] = measure + 'px';
  };

  /**
   * emit eventComplete on a collection of items events
   * @param {String} eventName
   * @param {Array} items - Outlayer.Items
   */
  proto._emitCompleteOnItems = function (eventName, items) {
    var _this = this;
    function onComplete() {
      _this.dispatchEvent(eventName + 'Complete', null, [items]);
    }
    var count = items.length;
    if (!items || !count) {
      onComplete();
      return;
    }
    var doneCount = 0;
    function tick() {
      doneCount++;
      if (doneCount == count) {
        onComplete();
      }
    }

    // bind callback
    items.forEach(function (item) {
      item.once(eventName, tick);
    });
  };

  /**
   * emits events via EvEmitter and jQuery events
   * @param {String} type - name of event
   * @param {Event} event - original event
   * @param {Array} args - extra arguments
   */
  proto.dispatchEvent = function (type, event, args) {
    // add original event to arguments
    var emitArgs = event ? [event].concat(args) : args;
    this.emitEvent(type, emitArgs);
    if (jQuery) {
      // set this.$element
      this.$element = this.$element || jQuery(this.element);
      if (event) {
        // create jQuery event
        var $event = jQuery.Event(event);
        $event.type = type;
        this.$element.trigger($event, args);
      } else {
        // just trigger with type if no event available
        this.$element.trigger(type, args);
      }
    }
  };

  // -------------------------- ignore & stamps -------------------------- //

  /**
   * keep item in collection, but do not lay it out
   * ignored items do not get skipped in layout
   * @param {Element} elem
   */
  proto.ignore = function (elem) {
    var item = this.getItem(elem);
    if (item) {
      item.isIgnored = true;
    }
  };

  /**
   * return item to layout collection
   * @param {Element} elem
   */
  proto.unignore = function (elem) {
    var item = this.getItem(elem);
    if (item) {
      delete item.isIgnored;
    }
  };

  /**
   * adds elements to stamps
   * @param {NodeList, Array, Element, or String} elems
   */
  proto.stamp = function (elems) {
    elems = this._find(elems);
    if (!elems) {
      return;
    }
    this.stamps = this.stamps.concat(elems);
    // ignore
    elems.forEach(this.ignore, this);
  };

  /**
   * removes elements to stamps
   * @param {NodeList, Array, or Element} elems
   */
  proto.unstamp = function (elems) {
    elems = this._find(elems);
    if (!elems) {
      return;
    }
    elems.forEach(function (elem) {
      // filter out removed stamp elements
      utils.removeFrom(this.stamps, elem);
      this.unignore(elem);
    }, this);
  };

  /**
   * finds child elements
   * @param {NodeList, Array, Element, or String} elems
   * @returns {Array} elems
   */
  proto._find = function (elems) {
    if (!elems) {
      return;
    }
    // if string, use argument as selector string
    if (typeof elems == 'string') {
      elems = this.element.querySelectorAll(elems);
    }
    elems = utils.makeArray(elems);
    return elems;
  };
  proto._manageStamps = function () {
    if (!this.stamps || !this.stamps.length) {
      return;
    }
    this._getBoundingRect();
    this.stamps.forEach(this._manageStamp, this);
  };

  // update boundingLeft / Top
  proto._getBoundingRect = function () {
    // get bounding rect for container element
    var boundingRect = this.element.getBoundingClientRect();
    var size = this.size;
    this._boundingRect = {
      left: boundingRect.left + size.paddingLeft + size.borderLeftWidth,
      top: boundingRect.top + size.paddingTop + size.borderTopWidth,
      right: boundingRect.right - (size.paddingRight + size.borderRightWidth),
      bottom: boundingRect.bottom - (size.paddingBottom + size.borderBottomWidth)
    };
  };

  /**
   * @param {Element} stamp
  **/
  proto._manageStamp = noop;

  /**
   * get x/y position of element relative to container element
   * @param {Element} elem
   * @returns {Object} offset - has left, top, right, bottom
   */
  proto._getElementOffset = function (elem) {
    var boundingRect = elem.getBoundingClientRect();
    var thisRect = this._boundingRect;
    var size = getSize(elem);
    var offset = {
      left: boundingRect.left - thisRect.left - size.marginLeft,
      top: boundingRect.top - thisRect.top - size.marginTop,
      right: thisRect.right - boundingRect.right - size.marginRight,
      bottom: thisRect.bottom - boundingRect.bottom - size.marginBottom
    };
    return offset;
  };

  // -------------------------- resize -------------------------- //

  // enable event handlers for listeners
  // i.e. resize -> onresize
  proto.handleEvent = utils.handleEvent;

  /**
   * Bind layout to window resizing
   */
  proto.bindResize = function () {
    window.addEventListener('resize', this);
    this.isResizeBound = true;
  };

  /**
   * Unbind layout to window resizing
   */
  proto.unbindResize = function () {
    window.removeEventListener('resize', this);
    this.isResizeBound = false;
  };
  proto.onresize = function () {
    this.resize();
  };
  utils.debounceMethod(Outlayer, 'onresize', 100);
  proto.resize = function () {
    // don't trigger if size did not change
    // or if resize was unbound. See #9
    if (!this.isResizeBound || !this.needsResizeLayout()) {
      return;
    }
    this.layout();
  };

  /**
   * check if layout is needed post layout
   * @returns Boolean
   */
  proto.needsResizeLayout = function () {
    var size = getSize(this.element);
    // check that this.size and size are there
    // IE8 triggers resize on body size change, so they might not be
    var hasSizes = this.size && size;
    return hasSizes && size.innerWidth !== this.size.innerWidth;
  };

  // -------------------------- methods -------------------------- //

  /**
   * add items to Outlayer instance
   * @param {Array or NodeList or Element} elems
   * @returns {Array} items - Outlayer.Items
  **/
  proto.addItems = function (elems) {
    var items = this._itemize(elems);
    // add items to collection
    if (items.length) {
      this.items = this.items.concat(items);
    }
    return items;
  };

  /**
   * Layout newly-appended item elements
   * @param {Array or NodeList or Element} elems
   */
  proto.appended = function (elems) {
    var items = this.addItems(elems);
    if (!items.length) {
      return;
    }
    // layout and reveal just the new items
    this.layoutItems(items, true);
    this.reveal(items);
  };

  /**
   * Layout prepended elements
   * @param {Array or NodeList or Element} elems
   */
  proto.prepended = function (elems) {
    var items = this._itemize(elems);
    if (!items.length) {
      return;
    }
    // add items to beginning of collection
    var previousItems = this.items.slice(0);
    this.items = items.concat(previousItems);
    // start new layout
    this._resetLayout();
    this._manageStamps();
    // layout new stuff without transition
    this.layoutItems(items, true);
    this.reveal(items);
    // layout previous items
    this.layoutItems(previousItems);
  };

  /**
   * reveal a collection of items
   * @param {Array of Outlayer.Items} items
   */
  proto.reveal = function (items) {
    this._emitCompleteOnItems('reveal', items);
    if (!items || !items.length) {
      return;
    }
    var stagger = this.updateStagger();
    items.forEach(function (item, i) {
      item.stagger(i * stagger);
      item.reveal();
    });
  };

  /**
   * hide a collection of items
   * @param {Array of Outlayer.Items} items
   */
  proto.hide = function (items) {
    this._emitCompleteOnItems('hide', items);
    if (!items || !items.length) {
      return;
    }
    var stagger = this.updateStagger();
    items.forEach(function (item, i) {
      item.stagger(i * stagger);
      item.hide();
    });
  };

  /**
   * reveal item elements
   * @param {Array}, {Element}, {NodeList} items
   */
  proto.revealItemElements = function (elems) {
    var items = this.getItems(elems);
    this.reveal(items);
  };

  /**
   * hide item elements
   * @param {Array}, {Element}, {NodeList} items
   */
  proto.hideItemElements = function (elems) {
    var items = this.getItems(elems);
    this.hide(items);
  };

  /**
   * get Outlayer.Item, given an Element
   * @param {Element} elem
   * @param {Function} callback
   * @returns {Outlayer.Item} item
   */
  proto.getItem = function (elem) {
    // loop through items to get the one that matches
    for (var i = 0; i < this.items.length; i++) {
      var item = this.items[i];
      if (item.element == elem) {
        // return item
        return item;
      }
    }
  };

  /**
   * get collection of Outlayer.Items, given Elements
   * @param {Array} elems
   * @returns {Array} items - Outlayer.Items
   */
  proto.getItems = function (elems) {
    elems = utils.makeArray(elems);
    var items = [];
    elems.forEach(function (elem) {
      var item = this.getItem(elem);
      if (item) {
        items.push(item);
      }
    }, this);
    return items;
  };

  /**
   * remove element(s) from instance and DOM
   * @param {Array or NodeList or Element} elems
   */
  proto.remove = function (elems) {
    var removeItems = this.getItems(elems);
    this._emitCompleteOnItems('remove', removeItems);

    // bail if no items to remove
    if (!removeItems || !removeItems.length) {
      return;
    }
    removeItems.forEach(function (item) {
      item.remove();
      // remove item from collection
      utils.removeFrom(this.items, item);
    }, this);
  };

  // ----- destroy ----- //

  // remove and disable Outlayer instance
  proto.destroy = function () {
    // clean up dynamic styles
    var style = this.element.style;
    style.height = '';
    style.position = '';
    style.width = '';
    // destroy items
    this.items.forEach(function (item) {
      item.destroy();
    });
    this.unbindResize();
    var id = this.element.outlayerGUID;
    delete instances[id]; // remove reference to instance by id
    delete this.element.outlayerGUID;
    // remove data for jQuery
    if (jQuery) {
      jQuery.removeData(this.element, this.constructor.namespace);
    }
  };

  // -------------------------- data -------------------------- //

  /**
   * get Outlayer instance from element
   * @param {Element} elem
   * @returns {Outlayer}
   */
  Outlayer.data = function (elem) {
    elem = utils.getQueryElement(elem);
    var id = elem && elem.outlayerGUID;
    return id && instances[id];
  };

  // -------------------------- create Outlayer class -------------------------- //

  /**
   * create a layout class
   * @param {String} namespace
   */
  Outlayer.create = function (namespace, options) {
    // sub-class Outlayer
    var Layout = subclass(Outlayer);
    // apply new options and compatOptions
    Layout.defaults = utils.extend({}, Outlayer.defaults);
    utils.extend(Layout.defaults, options);
    Layout.compatOptions = utils.extend({}, Outlayer.compatOptions);
    Layout.namespace = namespace;
    Layout.data = Outlayer.data;

    // sub-class Item
    Layout.Item = subclass(Item);

    // -------------------------- declarative -------------------------- //

    utils.htmlInit(Layout, namespace);

    // -------------------------- jQuery bridge -------------------------- //

    // make into jQuery plugin
    if (jQuery && jQuery.bridget) {
      jQuery.bridget(namespace, Layout);
    }
    return Layout;
  };
  function subclass(Parent) {
    function SubClass() {
      Parent.apply(this, arguments);
    }
    SubClass.prototype = Object.create(Parent.prototype);
    SubClass.prototype.constructor = SubClass;
    return SubClass;
  }

  // ----- helpers ----- //

  // how many milliseconds are in each unit
  var msUnits = {
    ms: 1,
    s: 1000
  };

  // munge time-like parameter into millisecond number
  // '0.4s' -> 40
  function getMilliseconds(time) {
    if (typeof time == 'number') {
      return time;
    }
    var matches = time.match(/(^\d*\.?\d*)(\w*)/);
    var num = matches && matches[1];
    var unit = matches && matches[2];
    if (!num.length) {
      return 0;
    }
    num = parseFloat(num);
    var mult = msUnits[unit] || 1;
    return num * mult;
  }

  // ----- fin ----- //

  // back in global
  Outlayer.Item = Item;
  return Outlayer;
});

/**
 * IsotopeMB Item
**/

(function (window, factory) {
  // universal module definition
  /* jshint strict: false */ /*globals define, module, require */
  if (true) {
    // AMD
    !(__WEBPACK_LOCAL_MODULE_7__array = [__WEBPACK_LOCAL_MODULE_6__], __WEBPACK_LOCAL_MODULE_7__factory = (factory),
		(typeof __WEBPACK_LOCAL_MODULE_7__factory === 'function' ?
			((__WEBPACK_LOCAL_MODULE_7__ = __WEBPACK_LOCAL_MODULE_7__factory.apply(__WEBPACK_LOCAL_MODULE_7__exports = {}, __WEBPACK_LOCAL_MODULE_7__array)), __WEBPACK_LOCAL_MODULE_7__ === undefined && (__WEBPACK_LOCAL_MODULE_7__ = __WEBPACK_LOCAL_MODULE_7__exports)) :
			(__WEBPACK_LOCAL_MODULE_7__ = __WEBPACK_LOCAL_MODULE_7__factory)
		));
  } else {}
})(window, function factory(Outlayer) {
  'use strict';

  // -------------------------- Item -------------------------- //

  // sub-class Outlayer Item
  function Item() {
    Outlayer.Item.apply(this, arguments);
  }
  var proto = Item.prototype = Object.create(Outlayer.Item.prototype);
  var _create = proto._create;
  proto._create = function () {
    // assign id, used for original-order sorting
    this.id = this.layout.itemGUID++;
    _create.call(this);
    this.sortData = {};
  };
  proto.updateSortData = function () {
    if (this.isIgnored) {
      return;
    }
    // default sorters
    this.sortData.id = this.id;
    // for backward compatibility
    this.sortData['original-order'] = this.id;
    this.sortData.random = Math.random();
    // go thru getSortData obj and apply the sorters
    var getSortData = this.layout.options.getSortData;
    var sorters = this.layout._sorters;
    for (var key in getSortData) {
      var sorter = sorters[key];
      this.sortData[key] = sorter(this.element, this);
    }
  };
  var _destroy = proto.destroy;
  proto.destroy = function () {
    // call super
    _destroy.apply(this, arguments);
    // reset display, #741
    this.css({
      display: ''
    });
  };
  return Item;
});

/**
 * IsotopeMB LayoutMode
 */

(function (window, factory) {
  // universal module definition
  /* jshint strict: false */ /*globals define, module, require */
  if (true) {
    // AMD
    !(__WEBPACK_LOCAL_MODULE_8__array = [__WEBPACK_LOCAL_MODULE_2__, __WEBPACK_LOCAL_MODULE_6__], __WEBPACK_LOCAL_MODULE_8__factory = (factory),
		(typeof __WEBPACK_LOCAL_MODULE_8__factory === 'function' ?
			((__WEBPACK_LOCAL_MODULE_8__ = __WEBPACK_LOCAL_MODULE_8__factory.apply(__WEBPACK_LOCAL_MODULE_8__exports = {}, __WEBPACK_LOCAL_MODULE_8__array)), __WEBPACK_LOCAL_MODULE_8__ === undefined && (__WEBPACK_LOCAL_MODULE_8__ = __WEBPACK_LOCAL_MODULE_8__exports)) :
			(__WEBPACK_LOCAL_MODULE_8__ = __WEBPACK_LOCAL_MODULE_8__factory)
		));
  } else {}
})(window, function factory(getSize, Outlayer) {
  'use strict';

  // layout mode class
  function LayoutMode(isotopeMB) {
    this.isotopeMB = isotopeMB;
    // link properties
    if (isotopeMB) {
      this.options = isotopeMB.options[this.namespace];
      this.element = isotopeMB.element;
      this.items = isotopeMB.filteredItems;
      this.size = isotopeMB.size;
    }
  }
  var proto = LayoutMode.prototype;

  /**
   * some methods should just defer to default Outlayer method
   * and reference the IsotopeMB instance as `this`
  **/
  var facadeMethods = ['_resetLayout', '_getItemLayoutPosition', '_manageStamp', '_getContainerSize', '_getElementOffset', 'needsResizeLayout', '_getOption'];
  facadeMethods.forEach(function (methodName) {
    proto[methodName] = function () {
      return Outlayer.prototype[methodName].apply(this.isotopeMB, arguments);
    };
  });

  // -----  ----- //

  // for horizontal layout modes, check vertical size
  proto.needsVerticalResizeLayout = function () {
    // don't trigger if size did not change
    var size = getSize(this.isotopeMB.element);
    // check that this.size and size are there
    // IE8 triggers resize on body size change, so they might not be
    var hasSizes = this.isotopeMB.size && size;
    return hasSizes && size.innerHeight != this.isotopeMB.size.innerHeight;
  };

  // ----- measurements ----- //

  proto._getMeasurement = function () {
    this.isotopeMB._getMeasurement.apply(this, arguments);
  };
  proto.getColumnWidth = function () {
    this.getSegmentSize('column', 'Width');
  };
  proto.getRowHeight = function () {
    this.getSegmentSize('row', 'Height');
  };

  /**
   * get columnWidth or rowHeight
   * segment: 'column' or 'row'
   * size 'Width' or 'Height'
  **/
  proto.getSegmentSize = function (segment, size) {
    var segmentName = segment + size;
    var outerSize = 'outer' + size;
    // columnWidth / outerWidth // rowHeight / outerHeight
    this._getMeasurement(segmentName, outerSize);
    // got rowHeight or columnWidth, we can chill
    if (this[segmentName]) {
      return;
    }
    // fall back to item of first element
    var firstItemSize = this.getFirstItemSize();
    this[segmentName] = firstItemSize && firstItemSize[outerSize] ||
    // or size of container
    this.isotopeMB.size['inner' + size];
  };
  proto.getFirstItemSize = function () {
    var firstItem = this.isotopeMB.filteredItems[0];
    return firstItem && firstItem.element && getSize(firstItem.element);
  };

  // ----- methods that should reference isotopeMB ----- //

  proto.layout = function () {
    this.isotopeMB.layout.apply(this.isotopeMB, arguments);
  };
  proto.getSize = function () {
    this.isotopeMB.getSize();
    this.size = this.isotopeMB.size;
  };

  // -------------------------- create -------------------------- //

  LayoutMode.modes = {};
  LayoutMode.create = function (namespace, options) {
    function Mode() {
      LayoutMode.apply(this, arguments);
    }
    Mode.prototype = Object.create(proto);
    Mode.prototype.constructor = Mode;

    // default options
    if (options) {
      Mode.options = options;
    }
    Mode.prototype.namespace = namespace;
    // register in IsotopeMB
    LayoutMode.modes[namespace] = Mode;
    return Mode;
  };
  return LayoutMode;
});

/*!
 * Masonry v4.1.0
 * Cascading grid layout library
 * http://masonry.desandro.com
 * MIT License
 * by David DeSandro
 */

(function (window, factory) {
  // universal module definition
  /* jshint strict: false */ /*globals define, module, require */
  if (true) {
    // AMD
    !(__WEBPACK_LOCAL_MODULE_9__array = [__WEBPACK_LOCAL_MODULE_6__, __WEBPACK_LOCAL_MODULE_2__], __WEBPACK_LOCAL_MODULE_9__factory = (factory),
		(typeof __WEBPACK_LOCAL_MODULE_9__factory === 'function' ?
			((__WEBPACK_LOCAL_MODULE_9__ = __WEBPACK_LOCAL_MODULE_9__factory.apply(__WEBPACK_LOCAL_MODULE_9__exports = {}, __WEBPACK_LOCAL_MODULE_9__array)), __WEBPACK_LOCAL_MODULE_9__ === undefined && (__WEBPACK_LOCAL_MODULE_9__ = __WEBPACK_LOCAL_MODULE_9__exports)) :
			(__WEBPACK_LOCAL_MODULE_9__ = __WEBPACK_LOCAL_MODULE_9__factory)
		));
  } else {}
})(window, function factory(Outlayer, getSize) {
  // -------------------------- masonryDefinition -------------------------- //

  // create an Outlayer layout class
  var Masonry = Outlayer.create('masonry');
  // isFitWidth -> fitWidth
  Masonry.compatOptions.fitWidth = 'isFitWidth';
  Masonry.prototype._resetLayout = function () {
    this.getSize();
    this._getMeasurement('columnWidth', 'outerWidth');
    this._getMeasurement('gutter', 'outerWidth');
    this.measureColumns();

    // reset column Y
    this.colYs = [];
    for (var i = 0; i < this.cols; i++) {
      this.colYs.push(0);
    }
    this.maxY = 0;
  };
  Masonry.prototype.measureColumns = function () {
    this.getContainerWidth();
    // if columnWidth is 0, default to outerWidth of first item
    if (!this.columnWidth) {
      var firstItem = this.items[0];
      var firstItemElem = firstItem && firstItem.element;
      // columnWidth fall back to item of first element
      this.columnWidth = firstItemElem && getSize(firstItemElem).outerWidth ||
      // if first elem has no width, default to size of container
      this.containerWidth;
    }
    var columnWidth = this.columnWidth += this.gutter;

    // calculate columns
    var containerWidth = this.containerWidth + this.gutter;
    var cols = containerWidth / columnWidth;
    // fix rounding errors, typically with gutters
    var excess = columnWidth - containerWidth % columnWidth;
    // if overshoot is less than a pixel, round up, otherwise floor it
    var mathMethod = excess && excess < 1 ? 'round' : 'floor';
    cols = Math[mathMethod](cols);
    this.cols = Math.max(cols, 1);
  };
  Masonry.prototype.getContainerWidth = function () {
    // container is parent if fit width
    var isFitWidth = this._getOption('fitWidth');
    var container = isFitWidth ? this.element.parentNode : this.element;
    // check that this.size and size are there
    // IE8 triggers resize on body size change, so they might not be
    var size = getSize(container);
    this.containerWidth = size && size.innerWidth;
  };
  Masonry.prototype._getItemLayoutPosition = function (item) {
    item.getSize();
    // how many columns does this brick span
    var remainder = item.size.outerWidth % this.columnWidth;
    var mathMethod = remainder && remainder < 1 ? 'round' : 'ceil';
    // round if off by 1 pixel, otherwise use ceil
    var colSpan = Math[mathMethod](item.size.outerWidth / this.columnWidth);
    colSpan = Math.min(colSpan, this.cols);
    var colGroup = this._getColGroup(colSpan);
    // get the minimum Y value from the columns
    var minimumY = Math.min.apply(Math, colGroup);
    var shortColIndex = colGroup.indexOf(minimumY);

    // position the brick
    var position = {
      x: this.columnWidth * shortColIndex,
      y: minimumY
    };

    // apply setHeight to necessary columns
    var setHeight = minimumY + item.size.outerHeight;
    var setSpan = this.cols + 1 - colGroup.length;
    for (var i = 0; i < setSpan; i++) {
      this.colYs[shortColIndex + i] = setHeight;
    }
    return position;
  };

  /**
   * @param {Number} colSpan - number of columns the element spans
   * @returns {Array} colGroup
   */
  Masonry.prototype._getColGroup = function (colSpan) {
    if (colSpan < 2) {
      // if brick spans only one column, use all the column Ys
      return this.colYs;
    }
    var colGroup = [];
    // how many different places could this brick fit horizontally
    var groupCount = this.cols + 1 - colSpan;
    // for each group potential horizontal position
    for (var i = 0; i < groupCount; i++) {
      // make an array of colY values for that one group
      var groupColYs = this.colYs.slice(i, i + colSpan);
      // and get the max value of the array
      colGroup[i] = Math.max.apply(Math, groupColYs);
    }
    return colGroup;
  };
  Masonry.prototype._manageStamp = function (stamp) {
    var stampSize = getSize(stamp);
    var offset = this._getElementOffset(stamp);
    // get the columns that this stamp affects
    var isOriginLeft = this._getOption('originLeft');
    var firstX = isOriginLeft ? offset.left : offset.right;
    var lastX = firstX + stampSize.outerWidth;
    var firstCol = Math.floor(firstX / this.columnWidth);
    firstCol = Math.max(0, firstCol);
    var lastCol = Math.floor(lastX / this.columnWidth);
    // lastCol should not go over if multiple of columnWidth #425
    lastCol -= lastX % this.columnWidth ? 0 : 1;
    lastCol = Math.min(this.cols - 1, lastCol);
    // set colYs to bottom of the stamp

    var isOriginTop = this._getOption('originTop');
    var stampMaxY = (isOriginTop ? offset.top : offset.bottom) + stampSize.outerHeight;
    for (var i = firstCol; i <= lastCol; i++) {
      this.colYs[i] = Math.max(stampMaxY, this.colYs[i]);
    }
  };
  Masonry.prototype._getContainerSize = function () {
    this.maxY = Math.max.apply(Math, this.colYs);
    var size = {
      height: this.maxY
    };
    if (this._getOption('fitWidth')) {
      size.width = this._getContainerFitWidth();
    }
    return size;
  };
  Masonry.prototype._getContainerFitWidth = function () {
    var unusedCols = 0;
    // count unused columns
    var i = this.cols;
    while (--i) {
      if (this.colYs[i] !== 0) {
        break;
      }
      unusedCols++;
    }
    // fit container to columns that have been used
    return (this.cols - unusedCols) * this.columnWidth - this.gutter;
  };
  Masonry.prototype.needsResizeLayout = function () {
    var previousWidth = this.containerWidth;
    this.getContainerWidth();
    return previousWidth != this.containerWidth;
  };
  return Masonry;
});

/*!
 * Masonry layout mode
 * sub-classes Masonry
 * http://masonry.desandro.com
 */

(function (window, factory) {
  // universal module definition
  /* jshint strict: false */ /*globals define, module, require */
  if (true) {
    // AMD
    !(__WEBPACK_LOCAL_MODULE_10__array = [__WEBPACK_LOCAL_MODULE_8__, __WEBPACK_LOCAL_MODULE_9__], __WEBPACK_LOCAL_MODULE_10__factory = (factory),
		(typeof __WEBPACK_LOCAL_MODULE_10__factory === 'function' ?
			((__WEBPACK_LOCAL_MODULE_10__ = __WEBPACK_LOCAL_MODULE_10__factory.apply(__WEBPACK_LOCAL_MODULE_10__exports = {}, __WEBPACK_LOCAL_MODULE_10__array)), __WEBPACK_LOCAL_MODULE_10__ === undefined && (__WEBPACK_LOCAL_MODULE_10__ = __WEBPACK_LOCAL_MODULE_10__exports)) :
			(__WEBPACK_LOCAL_MODULE_10__ = __WEBPACK_LOCAL_MODULE_10__factory)
		));
  } else {}
})(window, function factory(LayoutMode, Masonry) {
  'use strict';

  // -------------------------- masonryDefinition -------------------------- //

  // create an Outlayer layout class
  var MasonryMode = LayoutMode.create('masonry');
  var proto = MasonryMode.prototype;
  var keepModeMethods = {
    _getElementOffset: true,
    layout: true,
    _getMeasurement: true
  };

  // inherit Masonry prototype
  for (var method in Masonry.prototype) {
    // do not inherit mode methods
    if (!keepModeMethods[method]) {
      proto[method] = Masonry.prototype[method];
    }
  }
  var measureColumns = proto.measureColumns;
  proto.measureColumns = function () {
    // set items, used if measuring first item
    this.items = this.isotopeMB.filteredItems;
    measureColumns.call(this);
  };

  // point to mode options for fitWidth
  var _getOption = proto._getOption;
  proto._getOption = function (option) {
    if (option == 'fitWidth') {
      return this.options.isFitWidth !== undefined ? this.options.isFitWidth : this.options.fitWidth;
    }
    return _getOption.apply(this.isotopeMB, arguments);
  };
  return MasonryMode;
});

/**
 * fitRows layout mode
 */

(function (window, factory) {
  // universal module definition
  /* jshint strict: false */ /*globals define, module, require */
  if (true) {
    // AMD
    !(__WEBPACK_LOCAL_MODULE_11__array = [__WEBPACK_LOCAL_MODULE_8__], __WEBPACK_LOCAL_MODULE_11__factory = (factory),
		(typeof __WEBPACK_LOCAL_MODULE_11__factory === 'function' ?
			((__WEBPACK_LOCAL_MODULE_11__ = __WEBPACK_LOCAL_MODULE_11__factory.apply(__WEBPACK_LOCAL_MODULE_11__exports = {}, __WEBPACK_LOCAL_MODULE_11__array)), __WEBPACK_LOCAL_MODULE_11__ === undefined && (__WEBPACK_LOCAL_MODULE_11__ = __WEBPACK_LOCAL_MODULE_11__exports)) :
			(__WEBPACK_LOCAL_MODULE_11__ = __WEBPACK_LOCAL_MODULE_11__factory)
		));
  } else {}
})(window, function factory(LayoutMode) {
  'use strict';

  var FitRows = LayoutMode.create('fitRows');
  var proto = FitRows.prototype;
  proto._resetLayout = function () {
    this.x = 0;
    this.y = 0;
    this.maxY = 0;
    this._getMeasurement('gutter', 'outerWidth');
  };
  proto._getItemLayoutPosition = function (item) {
    item.getSize();
    var itemWidth = item.size.outerWidth + this.gutter;
    // if this element cannot fit in the current row
    var containerWidth = this.isotopeMB.size.innerWidth + this.gutter;
    if (this.x !== 0 && itemWidth + this.x > containerWidth) {
      this.x = 0;
      this.y = this.maxY;
    }
    var position = {
      x: this.x,
      y: this.y
    };
    this.maxY = Math.max(this.maxY, this.y + item.size.outerHeight);
    this.x += itemWidth;
    return position;
  };
  proto._getContainerSize = function () {
    return {
      height: this.maxY
    };
  };
  return FitRows;
});

/**
 * vertical layout mode
 */

(function (window, factory) {
  // universal module definition
  /* jshint strict: false */ /*globals define, module, require */
  if (true) {
    // AMD
    !(__WEBPACK_LOCAL_MODULE_12__array = [__WEBPACK_LOCAL_MODULE_8__], __WEBPACK_LOCAL_MODULE_12__factory = (factory),
		(typeof __WEBPACK_LOCAL_MODULE_12__factory === 'function' ?
			((__WEBPACK_LOCAL_MODULE_12__ = __WEBPACK_LOCAL_MODULE_12__factory.apply(__WEBPACK_LOCAL_MODULE_12__exports = {}, __WEBPACK_LOCAL_MODULE_12__array)), __WEBPACK_LOCAL_MODULE_12__ === undefined && (__WEBPACK_LOCAL_MODULE_12__ = __WEBPACK_LOCAL_MODULE_12__exports)) :
			(__WEBPACK_LOCAL_MODULE_12__ = __WEBPACK_LOCAL_MODULE_12__factory)
		));
  } else {}
})(window, function factory(LayoutMode) {
  'use strict';

  var Vertical = LayoutMode.create('vertical', {
    horizontalAlignment: 0
  });
  var proto = Vertical.prototype;
  proto._resetLayout = function () {
    this.y = 0;
  };
  proto._getItemLayoutPosition = function (item) {
    item.getSize();
    var x = (this.isotopeMB.size.innerWidth - item.size.outerWidth) * this.options.horizontalAlignment;
    var y = this.y;
    this.y += item.size.outerHeight;
    return {
      x: x,
      y: y
    };
  };
  proto._getContainerSize = function () {
    return {
      height: this.y
    };
  };
  return Vertical;
});

/*!
 * IsotopeMB v3.0.1
 *
 * Licensed GPLv3 for open source use
 * or IsotopeMB Commercial License for commercial use
 *
 * http://isotopeMB.metafizzy.co
 * Copyright 2016 Metafizzy
 */

(function (window, factory) {
  // universal module definition
  /* jshint strict: false */ /*globals define, module, require */
  if (true) {
    // AMD
    !(__WEBPACK_AMD_DEFINE_ARRAY__ = [__WEBPACK_LOCAL_MODULE_6__, __WEBPACK_LOCAL_MODULE_2__, __WEBPACK_LOCAL_MODULE_3__, __WEBPACK_LOCAL_MODULE_4__, __WEBPACK_LOCAL_MODULE_7__, __WEBPACK_LOCAL_MODULE_8__,
    // include default layout modes
    __WEBPACK_LOCAL_MODULE_10__, __WEBPACK_LOCAL_MODULE_11__, __WEBPACK_LOCAL_MODULE_12__], __WEBPACK_AMD_DEFINE_RESULT__ = (function (Outlayer, getSize, matchesSelector, utils, Item, LayoutMode) {
      return factory(window, Outlayer, getSize, matchesSelector, utils, Item, LayoutMode);
    }).apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__),
		__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));
  } else {}
})(window, function factory(window, Outlayer, getSize, matchesSelector, utils, Item, LayoutMode) {
  // -------------------------- vars -------------------------- //

  var jQuery = window.jQuery;

  // -------------------------- helpers -------------------------- //

  var trim = String.prototype.trim ? function (str) {
    return str.trim();
  } : function (str) {
    return str.replace(/^\s+|\s+$/g, '');
  };

  // -------------------------- isotopeMBDefinition -------------------------- //

  // create an Outlayer layout class
  var IsotopeMB = Outlayer.create('isotopeMB', {
    layoutMode: 'masonry',
    isJQueryFiltering: true,
    sortAscending: true
  });
  IsotopeMB.Item = Item;
  IsotopeMB.LayoutMode = LayoutMode;
  var proto = IsotopeMB.prototype;
  proto._create = function () {
    this.itemGUID = 0;
    // functions that sort items
    this._sorters = {};
    this._getSorters();
    // call super
    Outlayer.prototype._create.call(this);

    // create layout modes
    this.modes = {};
    // start filteredItems with all items
    this.filteredItems = this.items;
    // keep of track of sortBys
    this.sortHistory = ['original-order'];
    // create from registered layout modes
    for (var name in LayoutMode.modes) {
      this._initLayoutMode(name);
    }
  };
  proto.reloadItems = function () {
    // reset item ID counter
    this.itemGUID = 0;
    // call super
    Outlayer.prototype.reloadItems.call(this);
  };
  proto._itemize = function () {
    var items = Outlayer.prototype._itemize.apply(this, arguments);
    // assign ID for original-order
    for (var i = 0; i < items.length; i++) {
      var item = items[i];
      item.id = this.itemGUID++;
    }
    this._updateItemsSortData(items);
    return items;
  };

  // -------------------------- layout -------------------------- //

  proto._initLayoutMode = function (name) {
    var Mode = LayoutMode.modes[name];
    // set mode options
    // HACK extend initial options, back-fill in default options
    var initialOpts = this.options[name] || {};
    this.options[name] = Mode.options ? utils.extend(Mode.options, initialOpts) : initialOpts;
    // init layout mode instance
    this.modes[name] = new Mode(this);
  };
  proto.layout = function () {
    // if first time doing layout, do all magic
    if (!this._isLayoutInited && this._getOption('initLayout')) {
      this.arrange();
      return;
    }
    this._layout();
  };

  // private method to be used in layout() & magic()
  proto._layout = function () {
    // don't animate first layout
    var isInstant = this._getIsInstant();
    // layout flow
    this._resetLayout();
    this._manageStamps();
    this.layoutItems(this.filteredItems, isInstant);

    // flag for initalized
    this._isLayoutInited = true;
  };

  // filter + sort + layout
  proto.arrange = function (opts) {
    // set any options pass
    this.option(opts);
    this._getIsInstant();
    // filter, sort, and layout

    // filter
    var filtered = this._filter(this.items);
    this.filteredItems = filtered.matches;
    this._bindArrangeComplete();
    if (this._isInstant) {
      this._noTransition(this._hideReveal, [filtered]);
    } else {
      this._hideReveal(filtered);
    }
    this._sort();
    this._layout();
  };
  // alias to _init for main plugin method
  proto._init = proto.arrange;
  proto._hideReveal = function (filtered) {
    this.reveal(filtered.needReveal);
    this.hide(filtered.needHide);
  };

  // HACK
  // Don't animate/transition first layout
  // Or don't animate/transition other layouts
  proto._getIsInstant = function () {
    var isLayoutInstant = this._getOption('layoutInstant');
    var isInstant = isLayoutInstant !== undefined ? isLayoutInstant : !this._isLayoutInited;
    this._isInstant = isInstant;
    return isInstant;
  };

  // listen for layoutComplete, hideComplete and revealComplete
  // to trigger arrangeComplete
  proto._bindArrangeComplete = function () {
    // listen for 3 events to trigger arrangeComplete
    var isLayoutComplete, isHideComplete, isRevealComplete;
    var _this = this;
    function arrangeParallelCallback() {
      if (isLayoutComplete && isHideComplete && isRevealComplete) {
        _this.dispatchEvent('arrangeComplete', null, [_this.filteredItems]);
      }
    }
    this.once('layoutComplete', function () {
      isLayoutComplete = true;
      arrangeParallelCallback();
    });
    this.once('hideComplete', function () {
      isHideComplete = true;
      arrangeParallelCallback();
    });
    this.once('revealComplete', function () {
      isRevealComplete = true;
      arrangeParallelCallback();
    });
  };

  // -------------------------- filter -------------------------- //

  proto._filter = function (items) {
    var filter = this.options.filter;
    filter = filter || '*';
    var matches = [];
    var hiddenMatched = [];
    var visibleUnmatched = [];
    var test = this._getFilterTest(filter);

    // test each item
    for (var i = 0; i < items.length; i++) {
      var item = items[i];
      if (item.isIgnored) {
        continue;
      }
      // add item to either matched or unmatched group
      var isMatched = test(item);
      // item.isFilterMatched = isMatched;
      // add to matches if its a match
      if (isMatched) {
        matches.push(item);
      }
      // add to additional group if item needs to be hidden or revealed
      if (isMatched && item.isHidden) {
        hiddenMatched.push(item);
      } else if (!isMatched && !item.isHidden) {
        visibleUnmatched.push(item);
      }
    }

    // return collections of items to be manipulated
    return {
      matches: matches,
      needReveal: hiddenMatched,
      needHide: visibleUnmatched
    };
  };

  // get a jQuery, function, or a matchesSelector test given the filter
  proto._getFilterTest = function (filter) {
    if (jQuery && this.options.isJQueryFiltering) {
      // use jQuery
      return function (item) {
        return jQuery(item.element).is(filter);
      };
    }
    if (typeof filter == 'function') {
      // use filter as function
      return function (item) {
        return filter(item.element);
      };
    }
    // default, use filter as selector string
    return function (item) {
      return matchesSelector(item.element, filter);
    };
  };

  // -------------------------- sorting -------------------------- //

  /**
   * @params {Array} elems
   * @public
   */
  proto.updateSortData = function (elems) {
    // get items
    var items;
    if (elems) {
      elems = utils.makeArray(elems);
      items = this.getItems(elems);
    } else {
      // update all items if no elems provided
      items = this.items;
    }
    this._getSorters();
    this._updateItemsSortData(items);
  };
  proto._getSorters = function () {
    var getSortData = this.options.getSortData;
    for (var key in getSortData) {
      var sorter = getSortData[key];
      this._sorters[key] = mungeSorter(sorter);
    }
  };

  /**
   * @params {Array} items - of IsotopeMB.Items
   * @private
   */
  proto._updateItemsSortData = function (items) {
    // do not update if no items
    var len = items && items.length;
    for (var i = 0; len && i < len; i++) {
      var item = items[i];
      item.updateSortData();
    }
  };

  // ----- munge sorter ----- //

  // encapsulate this, as we just need mungeSorter
  // other functions in here are just for munging
  var mungeSorter = function () {
    // add a magic layer to sorters for convienent shorthands
    // `.foo-bar` will use the text of .foo-bar querySelector
    // `[foo-bar]` will use attribute
    // you can also add parser
    // `.foo-bar parseInt` will parse that as a number
    function mungeSorter(sorter) {
      // if not a string, return function or whatever it is
      if (typeof sorter != 'string') {
        return sorter;
      }
      // parse the sorter string
      var args = trim(sorter).split(' ');
      var query = args[0];
      // check if query looks like [an-attribute]
      var attrMatch = query.match(/^\[(.+)\]$/);
      var attr = attrMatch && attrMatch[1];
      var getValue = getValueGetter(attr, query);
      // use second argument as a parser
      var parser = IsotopeMB.sortDataParsers[args[1]];
      // parse the value, if there was a parser
      sorter = parser ? function (elem) {
        return elem && parser(getValue(elem));
      } :
      // otherwise just return value
      function (elem) {
        return elem && getValue(elem);
      };
      return sorter;
    }

    // get an attribute getter, or get text of the querySelector
    function getValueGetter(attr, query) {
      // if query looks like [foo-bar], get attribute
      if (attr) {
        return function getAttribute(elem) {
          return elem.getAttribute(attr);
        };
      }

      // otherwise, assume its a querySelector, and get its text
      return function getChildText(elem) {
        var child = elem.querySelector(query);
        return child && child.textContent;
      };
    }
    return mungeSorter;
  }();

  // parsers used in getSortData shortcut strings
  IsotopeMB.sortDataParsers = {
    'parseInt': function (_parseInt) {
      function parseInt(_x) {
        return _parseInt.apply(this, arguments);
      }
      parseInt.toString = function () {
        return _parseInt.toString();
      };
      return parseInt;
    }(function (val) {
      return parseInt(val, 10);
    }),
    'parseFloat': function (_parseFloat) {
      function parseFloat(_x2) {
        return _parseFloat.apply(this, arguments);
      }
      parseFloat.toString = function () {
        return _parseFloat.toString();
      };
      return parseFloat;
    }(function (val) {
      return parseFloat(val);
    })
  };

  // ----- sort method ----- //

  // sort filteredItem order
  proto._sort = function () {
    var sortByOpt = this.options.sortBy;
    if (!sortByOpt) {
      return;
    }
    // concat all sortBy and sortHistory
    var sortBys = [].concat.apply(sortByOpt, this.sortHistory);
    // sort magic
    var itemSorter = getItemSorter(sortBys, this.options.sortAscending);
    this.filteredItems.sort(itemSorter);
    // keep track of sortBy History
    if (sortByOpt != this.sortHistory[0]) {
      // add to front, oldest goes in last
      this.sortHistory.unshift(sortByOpt);
    }
  };

  // returns a function used for sorting
  function getItemSorter(sortBys, sortAsc) {
    return function sorter(itemA, itemB) {
      // cycle through all sortKeys
      for (var i = 0; i < sortBys.length; i++) {
        var sortBy = sortBys[i];
        var a = itemA.sortData[sortBy];
        var b = itemB.sortData[sortBy];
        if (a > b || a < b) {
          // if sortAsc is an object, use the value given the sortBy key
          var isAscending = sortAsc[sortBy] !== undefined ? sortAsc[sortBy] : sortAsc;
          var direction = isAscending ? 1 : -1;
          return (a > b ? 1 : -1) * direction;
        }
      }
      return 0;
    };
  }

  // -------------------------- methods -------------------------- //

  // get layout mode
  proto._mode = function () {
    var layoutMode = this.options.layoutMode;
    var mode = this.modes[layoutMode];
    if (!mode) {
      // TODO console.error
      throw new Error('No layout mode: ' + layoutMode);
    }
    // HACK sync mode's options
    // any options set after init for layout mode need to be synced
    mode.options = this.options[layoutMode];
    return mode;
  };
  proto._resetLayout = function () {
    // trigger original reset layout
    Outlayer.prototype._resetLayout.call(this);
    this._mode()._resetLayout();
  };
  proto._getItemLayoutPosition = function (item) {
    return this._mode()._getItemLayoutPosition(item);
  };
  proto._manageStamp = function (stamp) {
    this._mode()._manageStamp(stamp);
  };
  proto._getContainerSize = function () {
    return this._mode()._getContainerSize();
  };
  proto.needsResizeLayout = function () {
    return this._mode().needsResizeLayout();
  };

  // -------------------------- adding & removing -------------------------- //

  // HEADS UP overwrites default Outlayer appended
  proto.appended = function (elems) {
    var items = this.addItems(elems);
    if (!items.length) {
      return;
    }
    // filter, layout, reveal new items
    var filteredItems = this._filterRevealAdded(items);
    // add to filteredItems
    this.filteredItems = this.filteredItems.concat(filteredItems);
  };

  // HEADS UP overwrites default Outlayer prepended
  proto.prepended = function (elems) {
    var items = this._itemize(elems);
    if (!items.length) {
      return;
    }
    // start new layout
    this._resetLayout();
    this._manageStamps();
    // filter, layout, reveal new items
    var filteredItems = this._filterRevealAdded(items);
    // layout previous items
    this.layoutItems(this.filteredItems);
    // add to items and filteredItems
    this.filteredItems = filteredItems.concat(this.filteredItems);
    this.items = items.concat(this.items);
  };
  proto._filterRevealAdded = function (items) {
    var filtered = this._filter(items);
    this.hide(filtered.needHide);
    // reveal all new items
    this.reveal(filtered.matches);
    // layout new items, no transition
    this.layoutItems(filtered.matches, true);
    return filtered.matches;
  };

  /**
   * Filter, sort, and layout newly-appended item elements
   * @param {Array or NodeList or Element} elems
   */
  proto.insert = function (elems) {
    var items = this.addItems(elems);
    if (!items.length) {
      return;
    }
    // append item elements
    var i, item;
    var len = items.length;
    for (i = 0; i < len; i++) {
      item = items[i];
      this.element.appendChild(item.element);
    }
    // filter new stuff
    var filteredInsertItems = this._filter(items).matches;
    // set flag
    for (i = 0; i < len; i++) {
      items[i].isLayoutInstant = true;
    }
    this.arrange();
    // reset flag
    for (i = 0; i < len; i++) {
      delete items[i].isLayoutInstant;
    }
    this.reveal(filteredInsertItems);
  };
  var _remove = proto.remove;
  proto.remove = function (elems) {
    elems = utils.makeArray(elems);
    var removeItems = this.getItems(elems);
    // do regular thing
    _remove.call(this, elems);
    // bail if no items to remove
    var len = removeItems && removeItems.length;
    // remove elems from filteredItems
    for (var i = 0; len && i < len; i++) {
      var item = removeItems[i];
      // remove item from collection
      utils.removeFrom(this.filteredItems, item);
    }
  };
  proto.shuffle = function () {
    // update random sortData
    for (var i = 0; i < this.items.length; i++) {
      var item = this.items[i];
      item.sortData.random = Math.random();
    }
    this.options.sortBy = 'random';
    this._sort();
    this._layout();
  };

  /**
   * trigger fn without transition
   * kind of hacky to have this in the first place
   * @param {Function} fn
   * @param {Array} args
   * @returns ret
   * @private
   */
  proto._noTransition = function (fn, args) {
    // save transitionDuration before disabling
    var transitionDuration = this.options.transitionDuration;
    // disable transition
    this.options.transitionDuration = 0;
    // do it
    var returnValue = fn.apply(this, args);
    // re-enable transition for reveal
    this.options.transitionDuration = transitionDuration;
    return returnValue;
  };

  // ----- helper methods ----- //

  /**
   * getter method for getting filtered item elements
   * @returns {Array} elems - collection of item elements
   */
  proto.getFilteredItemElements = function () {
    return this.filteredItems.map(function (item) {
      return item.element;
    });
  };

  // -----  ----- //

  return IsotopeMB;
});

/***/ }),

/***/ "./assets/common-sass/media-boxes/plugin/components/Magnific Popup/jquery.magnific-popup.min.js":
/*!******************************************************************************************************!*\
  !*** ./assets/common-sass/media-boxes/plugin/components/Magnific Popup/jquery.magnific-popup.min.js ***!
  \******************************************************************************************************/
/***/ ((module, exports, __webpack_require__) => {

var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
/*! Magnific Popup - v1.1.0 - 2016-02-20
* http://dimsemenov.com/plugins/magnific-popup/
* Copyright (c) 2016 Dmitry Semenov; */
!function (a) {
  "use strict";

   true ? !(__WEBPACK_AMD_DEFINE_ARRAY__ = [__webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")], __WEBPACK_AMD_DEFINE_FACTORY__ = (a),
		__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
		(__WEBPACK_AMD_DEFINE_FACTORY__.apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__)) : __WEBPACK_AMD_DEFINE_FACTORY__),
		__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__)) : 0;
}(function (a) {
  var b,
    c,
    d,
    e,
    f,
    g,
    h = "Close",
    i = "BeforeClose",
    j = "AfterClose",
    k = "BeforeAppend",
    l = "MarkupParse",
    m = "Open",
    n = "Change",
    o = "mfp",
    p = "." + o,
    q = "mfp-ready",
    r = "mfp-removing",
    s = "mfp-prevent-close",
    t = function t() {},
    u = !!window.jQuery,
    v = a(window),
    w = function w(a, c) {
      b.ev.on(o + a + p, c);
    },
    x = function x(b, c, d, e) {
      var f = document.createElement("div");
      return f.className = "mfp-" + b, d && (f.innerHTML = d), e ? c && c.appendChild(f) : (f = a(f), c && f.appendTo(c)), f;
    },
    y = function y(c, d) {
      b.ev.triggerHandler(o + c, d), b.st.callbacks && (c = c.charAt(0).toLowerCase() + c.slice(1), b.st.callbacks[c] && b.st.callbacks[c].apply(b, a.isArray(d) ? d : [d]));
    },
    z = function z(c) {
      return c === g && b.currTemplate.closeBtn || (b.currTemplate.closeBtn = a(b.st.closeMarkup.replace("%title%", b.st.tClose)), g = c), b.currTemplate.closeBtn;
    },
    A = function A() {
      a.magnificPopup.instance || (b = new t(), b.init(), a.magnificPopup.instance = b);
    },
    B = function B() {
      var a = document.createElement("p").style,
        b = ["ms", "O", "Moz", "Webkit"];
      if (void 0 !== a.transition) return !0;
      for (; b.length;) if (b.pop() + "Transition" in a) return !0;
      return !1;
    };
  t.prototype = {
    constructor: t,
    init: function init() {
      var c = navigator.appVersion;
      b.isLowIE = b.isIE8 = document.all && !document.addEventListener, b.isAndroid = /android/gi.test(c), b.isIOS = /iphone|ipad|ipod/gi.test(c), b.supportsTransition = B(), b.probablyMobile = b.isAndroid || b.isIOS || /(Opera Mini)|Kindle|webOS|BlackBerry|(Opera Mobi)|(Windows Phone)|IEMobile/i.test(navigator.userAgent), d = a(document), b.popupsCache = {};
    },
    open: function open(c) {
      var e;
      if (c.isObj === !1) {
        b.items = c.items.toArray(), b.index = 0;
        var g,
          h = c.items;
        for (e = 0; e < h.length; e++) if (g = h[e], g.parsed && (g = g.el[0]), g === c.el[0]) {
          b.index = e;
          break;
        }
      } else b.items = a.isArray(c.items) ? c.items : [c.items], b.index = c.index || 0;
      if (b.isOpen) return void b.updateItemHTML();
      b.types = [], f = "", c.mainEl && c.mainEl.length ? b.ev = c.mainEl.eq(0) : b.ev = d, c.key ? (b.popupsCache[c.key] || (b.popupsCache[c.key] = {}), b.currTemplate = b.popupsCache[c.key]) : b.currTemplate = {}, b.st = a.extend(!0, {}, a.magnificPopup.defaults, c), b.fixedContentPos = "auto" === b.st.fixedContentPos ? !b.probablyMobile : b.st.fixedContentPos, b.st.modal && (b.st.closeOnContentClick = !1, b.st.closeOnBgClick = !1, b.st.showCloseBtn = !1, b.st.enableEscapeKey = !1), b.bgOverlay || (b.bgOverlay = x("bg").on("click" + p, function () {
        b.close();
      }), b.wrap = x("wrap").attr("tabindex", -1).on("click" + p, function (a) {
        b._checkIfClose(a.target) && b.close();
      }), b.container = x("container", b.wrap)), b.contentContainer = x("content"), b.st.preloader && (b.preloader = x("preloader", b.container, b.st.tLoading));
      var i = a.magnificPopup.modules;
      for (e = 0; e < i.length; e++) {
        var j = i[e];
        j = j.charAt(0).toUpperCase() + j.slice(1), b["init" + j].call(b);
      }
      y("BeforeOpen"), b.st.showCloseBtn && (b.st.closeBtnInside ? (w(l, function (a, b, c, d) {
        c.close_replaceWith = z(d.type);
      }), f += " mfp-close-btn-in") : b.wrap.append(z())), b.st.alignTop && (f += " mfp-align-top"), b.fixedContentPos ? b.wrap.css({
        overflow: b.st.overflowY,
        overflowX: "hidden",
        overflowY: b.st.overflowY
      }) : b.wrap.css({
        top: v.scrollTop(),
        position: "absolute"
      }), (b.st.fixedBgPos === !1 || "auto" === b.st.fixedBgPos && !b.fixedContentPos) && b.bgOverlay.css({
        height: d.height(),
        position: "absolute"
      }), b.st.enableEscapeKey && d.on("keyup" + p, function (a) {
        27 === a.keyCode && b.close();
      }), v.on("resize" + p, function () {
        b.updateSize();
      }), b.st.closeOnContentClick || (f += " mfp-auto-cursor"), f && b.wrap.addClass(f);
      var k = b.wH = v.height(),
        n = {};
      if (b.fixedContentPos && b._hasScrollBar(k)) {
        var o = b._getScrollbarSize();
        o && (n.marginRight = o);
      }
      b.fixedContentPos && (b.isIE7 ? a("body, html").css("overflow", "hidden") : n.overflow = "hidden");
      var r = b.st.mainClass;
      return b.isIE7 && (r += " mfp-ie7"), r && b._addClassToMFP(r), b.updateItemHTML(), y("BuildControls"), a("html").css(n), b.bgOverlay.add(b.wrap).prependTo(b.st.prependTo || a(document.body)), b._lastFocusedEl = document.activeElement, setTimeout(function () {
        b.content ? (b._addClassToMFP(q), b._setFocus()) : b.bgOverlay.addClass(q), d.on("focusin" + p, b._onFocusIn);
      }, 16), b.isOpen = !0, b.updateSize(k), y(m), c;
    },
    close: function close() {
      b.isOpen && (y(i), b.isOpen = !1, b.st.removalDelay && !b.isLowIE && b.supportsTransition ? (b._addClassToMFP(r), setTimeout(function () {
        b._close();
      }, b.st.removalDelay)) : b._close());
    },
    _close: function _close() {
      y(h);
      var c = r + " " + q + " ";
      if (b.bgOverlay.detach(), b.wrap.detach(), b.container.empty(), b.st.mainClass && (c += b.st.mainClass + " "), b._removeClassFromMFP(c), b.fixedContentPos) {
        var e = {
          marginRight: ""
        };
        b.isIE7 ? a("body, html").css("overflow", "") : e.overflow = "", a("html").css(e);
      }
      d.off("keyup" + p + " focusin" + p), b.ev.off(p), b.wrap.attr("class", "mfp-wrap").removeAttr("style"), b.bgOverlay.attr("class", "mfp-bg"), b.container.attr("class", "mfp-container"), !b.st.showCloseBtn || b.st.closeBtnInside && b.currTemplate[b.currItem.type] !== !0 || b.currTemplate.closeBtn && b.currTemplate.closeBtn.detach(), b.st.autoFocusLast && b._lastFocusedEl && a(b._lastFocusedEl).focus(), b.currItem = null, b.content = null, b.currTemplate = null, b.prevHeight = 0, y(j);
    },
    updateSize: function updateSize(a) {
      if (b.isIOS) {
        var c = document.documentElement.clientWidth / window.innerWidth,
          d = window.innerHeight * c;
        b.wrap.css("height", d), b.wH = d;
      } else b.wH = a || v.height();
      b.fixedContentPos || b.wrap.css("height", b.wH), y("Resize");
    },
    updateItemHTML: function updateItemHTML() {
      var c = b.items[b.index];
      b.contentContainer.detach(), b.content && b.content.detach(), c.parsed || (c = b.parseEl(b.index));
      var d = c.type;
      if (y("BeforeChange", [b.currItem ? b.currItem.type : "", d]), b.currItem = c, !b.currTemplate[d]) {
        var f = b.st[d] ? b.st[d].markup : !1;
        y("FirstMarkupParse", f), f ? b.currTemplate[d] = a(f) : b.currTemplate[d] = !0;
      }
      e && e !== c.type && b.container.removeClass("mfp-" + e + "-holder");
      var g = b["get" + d.charAt(0).toUpperCase() + d.slice(1)](c, b.currTemplate[d]);
      b.appendContent(g, d), c.preloaded = !0, y(n, c), e = c.type, b.container.prepend(b.contentContainer), y("AfterChange");
    },
    appendContent: function appendContent(a, c) {
      b.content = a, a ? b.st.showCloseBtn && b.st.closeBtnInside && b.currTemplate[c] === !0 ? b.content.find(".mfp-close").length || b.content.append(z()) : b.content = a : b.content = "", y(k), b.container.addClass("mfp-" + c + "-holder"), b.contentContainer.append(b.content);
    },
    parseEl: function parseEl(c) {
      var d,
        e = b.items[c];
      if (e.tagName ? e = {
        el: a(e)
      } : (d = e.type, e = {
        data: e,
        src: e.src
      }), e.el) {
        for (var f = b.types, g = 0; g < f.length; g++) if (e.el.hasClass("mfp-" + f[g])) {
          d = f[g];
          break;
        }
        e.src = e.el.attr("data-mfp-src"), e.src || (e.src = e.el.attr("href"));
      }
      return e.type = d || b.st.type || "inline", e.index = c, e.parsed = !0, b.items[c] = e, y("ElementParse", e), b.items[c];
    },
    addGroup: function addGroup(a, c) {
      var d = function d(_d) {
        _d.mfpEl = this, b._openClick(_d, a, c);
      };
      c || (c = {});
      var e = "click.magnificPopup";
      c.mainEl = a, c.items ? (c.isObj = !0, a.off(e).on(e, d)) : (c.isObj = !1, c.delegate ? a.off(e).on(e, c.delegate, d) : (c.items = a, a.off(e).on(e, d)));
    },
    _openClick: function _openClick(c, d, e) {
      var f = void 0 !== e.midClick ? e.midClick : a.magnificPopup.defaults.midClick;
      if (f || !(2 === c.which || c.ctrlKey || c.metaKey || c.altKey || c.shiftKey)) {
        var g = void 0 !== e.disableOn ? e.disableOn : a.magnificPopup.defaults.disableOn;
        if (g) if (a.isFunction(g)) {
          if (!g.call(b)) return !0;
        } else if (v.width() < g) return !0;
        c.type && (c.preventDefault(), b.isOpen && c.stopPropagation()), e.el = a(c.mfpEl), e.delegate && (e.items = d.find(e.delegate)), b.open(e);
      }
    },
    updateStatus: function updateStatus(a, d) {
      if (b.preloader) {
        c !== a && b.container.removeClass("mfp-s-" + c), d || "loading" !== a || (d = b.st.tLoading);
        var e = {
          status: a,
          text: d
        };
        y("UpdateStatus", e), a = e.status, d = e.text, b.preloader.html(d), b.preloader.find("a").on("click", function (a) {
          a.stopImmediatePropagation();
        }), b.container.addClass("mfp-s-" + a), c = a;
      }
    },
    _checkIfClose: function _checkIfClose(c) {
      if (!a(c).hasClass(s)) {
        var d = b.st.closeOnContentClick,
          e = b.st.closeOnBgClick;
        if (d && e) return !0;
        if (!b.content || a(c).hasClass("mfp-close") || b.preloader && c === b.preloader[0]) return !0;
        if (c === b.content[0] || a.contains(b.content[0], c)) {
          if (d) return !0;
        } else if (e && a.contains(document, c)) return !0;
        return !1;
      }
    },
    _addClassToMFP: function _addClassToMFP(a) {
      b.bgOverlay.addClass(a), b.wrap.addClass(a);
    },
    _removeClassFromMFP: function _removeClassFromMFP(a) {
      this.bgOverlay.removeClass(a), b.wrap.removeClass(a);
    },
    _hasScrollBar: function _hasScrollBar(a) {
      return (b.isIE7 ? d.height() : document.body.scrollHeight) > (a || v.height());
    },
    _setFocus: function _setFocus() {
      (b.st.focus ? b.content.find(b.st.focus).eq(0) : b.wrap).focus();
    },
    _onFocusIn: function _onFocusIn(c) {
      return c.target === b.wrap[0] || a.contains(b.wrap[0], c.target) ? void 0 : (b._setFocus(), !1);
    },
    _parseMarkup: function _parseMarkup(b, c, d) {
      var e;
      d.data && (c = a.extend(d.data, c)), y(l, [b, c, d]), a.each(c, function (c, d) {
        if (void 0 === d || d === !1) return !0;
        if (e = c.split("_"), e.length > 1) {
          var f = b.find(p + "-" + e[0]);
          if (f.length > 0) {
            var g = e[1];
            "replaceWith" === g ? f[0] !== d[0] && f.replaceWith(d) : "img" === g ? f.is("img") ? f.attr("src", d) : f.replaceWith(a("<img>").attr("src", d).attr("class", f.attr("class"))) : f.attr(e[1], d);
          }
        } else b.find(p + "-" + c).html(d);
      });
    },
    _getScrollbarSize: function _getScrollbarSize() {
      if (void 0 === b.scrollbarSize) {
        var a = document.createElement("div");
        a.style.cssText = "width: 99px; height: 99px; overflow: scroll; position: absolute; top: -9999px;", document.body.appendChild(a), b.scrollbarSize = a.offsetWidth - a.clientWidth, document.body.removeChild(a);
      }
      return b.scrollbarSize;
    }
  }, a.magnificPopup = {
    instance: null,
    proto: t.prototype,
    modules: [],
    open: function open(b, c) {
      return A(), b = b ? a.extend(!0, {}, b) : {}, b.isObj = !0, b.index = c || 0, this.instance.open(b);
    },
    close: function close() {
      return a.magnificPopup.instance && a.magnificPopup.instance.close();
    },
    registerModule: function registerModule(b, c) {
      c.options && (a.magnificPopup.defaults[b] = c.options), a.extend(this.proto, c.proto), this.modules.push(b);
    },
    defaults: {
      disableOn: 0,
      key: null,
      midClick: !1,
      mainClass: "",
      preloader: !0,
      focus: "",
      closeOnContentClick: !1,
      closeOnBgClick: !0,
      closeBtnInside: !0,
      showCloseBtn: !0,
      enableEscapeKey: !0,
      modal: !1,
      alignTop: !1,
      removalDelay: 0,
      prependTo: null,
      fixedContentPos: "auto",
      fixedBgPos: "auto",
      overflowY: "auto",
      closeMarkup: '<button title="%title%" type="button" class="mfp-close">&#215;</button>',
      tClose: "Close (Esc)",
      tLoading: "Loading...",
      autoFocusLast: !0
    }
  }, a.fn.magnificPopup = function (c) {
    A();
    var d = a(this);
    if ("string" == typeof c) {
      if ("open" === c) {
        var e,
          f = u ? d.data("magnificPopup") : d[0].magnificPopup,
          g = parseInt(arguments[1], 10) || 0;
        f.items ? e = f.items[g] : (e = d, f.delegate && (e = e.find(f.delegate)), e = e.eq(g)), b._openClick({
          mfpEl: e
        }, d, f);
      } else b.isOpen && b[c].apply(b, Array.prototype.slice.call(arguments, 1));
    } else c = a.extend(!0, {}, c), u ? d.data("magnificPopup", c) : d[0].magnificPopup = c, b.addGroup(d, c);
    return d;
  };
  var C,
    D,
    E,
    F = "inline",
    G = function G() {
      E && (D.after(E.addClass(C)).detach(), E = null);
    };
  a.magnificPopup.registerModule(F, {
    options: {
      hiddenClass: "hide",
      markup: "",
      tNotFound: "Content not found"
    },
    proto: {
      initInline: function initInline() {
        b.types.push(F), w(h + "." + F, function () {
          G();
        });
      },
      getInline: function getInline(c, d) {
        if (G(), c.src) {
          var e = b.st.inline,
            f = a(c.src);
          if (f.length) {
            var g = f[0].parentNode;
            g && g.tagName && (D || (C = e.hiddenClass, D = x(C), C = "mfp-" + C), E = f.after(D).detach().removeClass(C)), b.updateStatus("ready");
          } else b.updateStatus("error", e.tNotFound), f = a("<div>");
          return c.inlineElement = f, f;
        }
        return b.updateStatus("ready"), b._parseMarkup(d, {}, c), d;
      }
    }
  });
  var H,
    I = "ajax",
    J = function J() {
      H && a(document.body).removeClass(H);
    },
    K = function K() {
      J(), b.req && b.req.abort();
    };
  a.magnificPopup.registerModule(I, {
    options: {
      settings: null,
      cursor: "mfp-ajax-cur",
      tError: '<a href="%url%">The content</a> could not be loaded.'
    },
    proto: {
      initAjax: function initAjax() {
        b.types.push(I), H = b.st.ajax.cursor, w(h + "." + I, K), w("BeforeChange." + I, K);
      },
      getAjax: function getAjax(c) {
        H && a(document.body).addClass(H), b.updateStatus("loading");
        var d = a.extend({
          url: c.src,
          success: function success(d, e, f) {
            var g = {
              data: d,
              xhr: f
            };
            y("ParseAjax", g), b.appendContent(a(g.data), I), c.finished = !0, J(), b._setFocus(), setTimeout(function () {
              b.wrap.addClass(q);
            }, 16), b.updateStatus("ready"), y("AjaxContentAdded");
          },
          error: function error() {
            J(), c.finished = c.loadError = !0, b.updateStatus("error", b.st.ajax.tError.replace("%url%", c.src));
          }
        }, b.st.ajax.settings);
        return b.req = a.ajax(d), "";
      }
    }
  });
  var L,
    M = function M(c) {
      if (c.data && void 0 !== c.data.title) return c.data.title;
      var d = b.st.image.titleSrc;
      if (d) {
        if (a.isFunction(d)) return d.call(b, c);
        if (c.el) return c.el.attr(d) || "";
      }
      return "";
    };
  a.magnificPopup.registerModule("image", {
    options: {
      markup: '<div class="mfp-figure"><div class="mfp-close"></div><figure><div class="mfp-img"></div><figcaption><div class="mfp-bottom-bar"><div class="mfp-title"></div><div class="mfp-counter"></div></div></figcaption></figure></div>',
      cursor: "mfp-zoom-out-cur",
      titleSrc: "title",
      verticalFit: !0,
      tError: '<a href="%url%">The image</a> could not be loaded.'
    },
    proto: {
      initImage: function initImage() {
        var c = b.st.image,
          d = ".image";
        b.types.push("image"), w(m + d, function () {
          "image" === b.currItem.type && c.cursor && a(document.body).addClass(c.cursor);
        }), w(h + d, function () {
          c.cursor && a(document.body).removeClass(c.cursor), v.off("resize" + p);
        }), w("Resize" + d, b.resizeImage), b.isLowIE && w("AfterChange", b.resizeImage);
      },
      resizeImage: function resizeImage() {
        var a = b.currItem;
        if (a && a.img && b.st.image.verticalFit) {
          var c = 0;
          b.isLowIE && (c = parseInt(a.img.css("padding-top"), 10) + parseInt(a.img.css("padding-bottom"), 10)), a.img.css("max-height", b.wH - c);
        }
      },
      _onImageHasSize: function _onImageHasSize(a) {
        a.img && (a.hasSize = !0, L && clearInterval(L), a.isCheckingImgSize = !1, y("ImageHasSize", a), a.imgHidden && (b.content && b.content.removeClass("mfp-loading"), a.imgHidden = !1));
      },
      findImageSize: function findImageSize(a) {
        var c = 0,
          d = a.img[0],
          e = function e(f) {
            L && clearInterval(L), L = setInterval(function () {
              return d.naturalWidth > 0 ? void b._onImageHasSize(a) : (c > 200 && clearInterval(L), c++, void (3 === c ? e(10) : 40 === c ? e(50) : 100 === c && e(500)));
            }, f);
          };
        e(1);
      },
      getImage: function getImage(c, d) {
        var e = 0,
          f = function f() {
            c && (c.img[0].complete ? (c.img.off(".mfploader"), c === b.currItem && (b._onImageHasSize(c), b.updateStatus("ready")), c.hasSize = !0, c.loaded = !0, y("ImageLoadComplete")) : (e++, 200 > e ? setTimeout(f, 100) : g()));
          },
          g = function g() {
            c && (c.img.off(".mfploader"), c === b.currItem && (b._onImageHasSize(c), b.updateStatus("error", h.tError.replace("%url%", c.src))), c.hasSize = !0, c.loaded = !0, c.loadError = !0);
          },
          h = b.st.image,
          i = d.find(".mfp-img");
        if (i.length) {
          var j = document.createElement("img");
          j.className = "mfp-img", c.el && c.el.find("img").length && (j.alt = c.el.find("img").attr("alt")), c.img = a(j).on("load.mfploader", f).on("error.mfploader", g), j.src = c.src, i.is("img") && (c.img = c.img.clone()), j = c.img[0], j.naturalWidth > 0 ? c.hasSize = !0 : j.width || (c.hasSize = !1);
        }
        return b._parseMarkup(d, {
          title: M(c),
          img_replaceWith: c.img
        }, c), b.resizeImage(), c.hasSize ? (L && clearInterval(L), c.loadError ? (d.addClass("mfp-loading"), b.updateStatus("error", h.tError.replace("%url%", c.src))) : (d.removeClass("mfp-loading"), b.updateStatus("ready")), d) : (b.updateStatus("loading"), c.loading = !0, c.hasSize || (c.imgHidden = !0, d.addClass("mfp-loading"), b.findImageSize(c)), d);
      }
    }
  });
  var N,
    O = function O() {
      return void 0 === N && (N = void 0 !== document.createElement("p").style.MozTransform), N;
    };
  a.magnificPopup.registerModule("zoom", {
    options: {
      enabled: !1,
      easing: "ease-in-out",
      duration: 300,
      opener: function opener(a) {
        return a.is("img") ? a : a.find("img");
      }
    },
    proto: {
      initZoom: function initZoom() {
        var a,
          c = b.st.zoom,
          d = ".zoom";
        if (c.enabled && b.supportsTransition) {
          var e,
            f,
            g = c.duration,
            j = function j(a) {
              var b = a.clone().removeAttr("style").removeAttr("class").addClass("mfp-animated-image"),
                d = "all " + c.duration / 1e3 + "s " + c.easing,
                e = {
                  position: "fixed",
                  zIndex: 9999,
                  left: 0,
                  top: 0,
                  "-webkit-backface-visibility": "hidden"
                },
                f = "transition";
              return e["-webkit-" + f] = e["-moz-" + f] = e["-o-" + f] = e[f] = d, b.css(e), b;
            },
            k = function k() {
              b.content.css("visibility", "visible");
            };
          w("BuildControls" + d, function () {
            if (b._allowZoom()) {
              if (clearTimeout(e), b.content.css("visibility", "hidden"), a = b._getItemToZoom(), !a) return void k();
              f = j(a), f.css(b._getOffset()), b.wrap.append(f), e = setTimeout(function () {
                f.css(b._getOffset(!0)), e = setTimeout(function () {
                  k(), setTimeout(function () {
                    f.remove(), a = f = null, y("ZoomAnimationEnded");
                  }, 16);
                }, g);
              }, 16);
            }
          }), w(i + d, function () {
            if (b._allowZoom()) {
              if (clearTimeout(e), b.st.removalDelay = g, !a) {
                if (a = b._getItemToZoom(), !a) return;
                f = j(a);
              }
              f.css(b._getOffset(!0)), b.wrap.append(f), b.content.css("visibility", "hidden"), setTimeout(function () {
                f.css(b._getOffset());
              }, 16);
            }
          }), w(h + d, function () {
            b._allowZoom() && (k(), f && f.remove(), a = null);
          });
        }
      },
      _allowZoom: function _allowZoom() {
        return "image" === b.currItem.type;
      },
      _getItemToZoom: function _getItemToZoom() {
        return b.currItem.hasSize ? b.currItem.img : !1;
      },
      _getOffset: function _getOffset(c) {
        var d;
        d = c ? b.currItem.img : b.st.zoom.opener(b.currItem.el || b.currItem);
        var e = d.offset(),
          f = parseInt(d.css("padding-top"), 10),
          g = parseInt(d.css("padding-bottom"), 10);
        e.top -= a(window).scrollTop() - f;
        var h = {
          width: d.width(),
          height: (u ? d.innerHeight() : d[0].offsetHeight) - g - f
        };
        return O() ? h["-moz-transform"] = h.transform = "translate(" + e.left + "px," + e.top + "px)" : (h.left = e.left, h.top = e.top), h;
      }
    }
  });
  var P = "iframe",
    Q = "//about:blank",
    R = function R(a) {
      if (b.currTemplate[P]) {
        var c = b.currTemplate[P].find("iframe");
        c.length && (a || (c[0].src = Q), b.isIE8 && c.css("display", a ? "block" : "none"));
      }
    };
  a.magnificPopup.registerModule(P, {
    options: {
      markup: '<div class="mfp-iframe-scaler"><div class="mfp-close"></div><iframe class="mfp-iframe" src="//about:blank" frameborder="0" allowfullscreen></iframe></div>',
      srcAction: "iframe_src",
      patterns: {
        youtube: {
          index: "youtube.com",
          id: "v=",
          src: "//www.youtube.com/embed/%id%?autoplay=1"
        },
        vimeo: {
          index: "vimeo.com/",
          id: "/",
          src: "//player.vimeo.com/video/%id%?autoplay=1"
        },
        gmaps: {
          index: "//maps.google.",
          src: "%id%&output=embed"
        }
      }
    },
    proto: {
      initIframe: function initIframe() {
        b.types.push(P), w("BeforeChange", function (a, b, c) {
          b !== c && (b === P ? R() : c === P && R(!0));
        }), w(h + "." + P, function () {
          R();
        });
      },
      getIframe: function getIframe(c, d) {
        var e = c.src,
          f = b.st.iframe;
        a.each(f.patterns, function () {
          return e.indexOf(this.index) > -1 ? (this.id && (e = "string" == typeof this.id ? e.substr(e.lastIndexOf(this.id) + this.id.length, e.length) : this.id.call(this, e)), e = this.src.replace("%id%", e), !1) : void 0;
        });
        var g = {};
        return f.srcAction && (g[f.srcAction] = e), b._parseMarkup(d, g, c), b.updateStatus("ready"), d;
      }
    }
  });
  var S = function S(a) {
      var c = b.items.length;
      return a > c - 1 ? a - c : 0 > a ? c + a : a;
    },
    T = function T(a, b, c) {
      return a.replace(/%curr%/gi, b + 1).replace(/%total%/gi, c);
    };
  a.magnificPopup.registerModule("gallery", {
    options: {
      enabled: !1,
      arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>',
      preload: [0, 2],
      navigateByImgClick: !0,
      arrows: !0,
      tPrev: "Previous (Left arrow key)",
      tNext: "Next (Right arrow key)",
      tCounter: "%curr% of %total%"
    },
    proto: {
      initGallery: function initGallery() {
        var c = b.st.gallery,
          e = ".mfp-gallery";
        return b.direction = !0, c && c.enabled ? (f += " mfp-gallery", w(m + e, function () {
          c.navigateByImgClick && b.wrap.on("click" + e, ".mfp-img", function () {
            return b.items.length > 1 ? (b.next(), !1) : void 0;
          }), d.on("keydown" + e, function (a) {
            37 === a.keyCode ? b.prev() : 39 === a.keyCode && b.next();
          });
        }), w("UpdateStatus" + e, function (a, c) {
          c.text && (c.text = T(c.text, b.currItem.index, b.items.length));
        }), w(l + e, function (a, d, e, f) {
          var g = b.items.length;
          e.counter = g > 1 ? T(c.tCounter, f.index, g) : "";
        }), w("BuildControls" + e, function () {
          if (b.items.length > 1 && c.arrows && !b.arrowLeft) {
            var d = c.arrowMarkup,
              e = b.arrowLeft = a(d.replace(/%title%/gi, c.tPrev).replace(/%dir%/gi, "left")).addClass(s),
              f = b.arrowRight = a(d.replace(/%title%/gi, c.tNext).replace(/%dir%/gi, "right")).addClass(s);
            e.click(function () {
              b.prev();
            }), f.click(function () {
              b.next();
            }), b.container.append(e.add(f));
          }
        }), w(n + e, function () {
          b._preloadTimeout && clearTimeout(b._preloadTimeout), b._preloadTimeout = setTimeout(function () {
            b.preloadNearbyImages(), b._preloadTimeout = null;
          }, 16);
        }), void w(h + e, function () {
          d.off(e), b.wrap.off("click" + e), b.arrowRight = b.arrowLeft = null;
        })) : !1;
      },
      next: function next() {
        b.direction = !0, b.index = S(b.index + 1), b.updateItemHTML();
      },
      prev: function prev() {
        b.direction = !1, b.index = S(b.index - 1), b.updateItemHTML();
      },
      goTo: function goTo(a) {
        b.direction = a >= b.index, b.index = a, b.updateItemHTML();
      },
      preloadNearbyImages: function preloadNearbyImages() {
        var a,
          c = b.st.gallery.preload,
          d = Math.min(c[0], b.items.length),
          e = Math.min(c[1], b.items.length);
        for (a = 1; a <= (b.direction ? e : d); a++) b._preloadItem(b.index + a);
        for (a = 1; a <= (b.direction ? d : e); a++) b._preloadItem(b.index - a);
      },
      _preloadItem: function _preloadItem(c) {
        if (c = S(c), !b.items[c].preloaded) {
          var d = b.items[c];
          d.parsed || (d = b.parseEl(c)), y("LazyLoad", d), "image" === d.type && (d.img = a('<img class="mfp-img" />').on("load.mfploader", function () {
            d.hasSize = !0;
          }).on("error.mfploader", function () {
            d.hasSize = !0, d.loadError = !0, y("LazyLoadError", d);
          }).attr("src", d.src)), d.preloaded = !0;
        }
      }
    }
  });
  var U = "retina";
  a.magnificPopup.registerModule(U, {
    options: {
      replaceSrc: function replaceSrc(a) {
        return a.src.replace(/\.\w+$/, function (a) {
          return "@2x" + a;
        });
      },
      ratio: 1
    },
    proto: {
      initRetina: function initRetina() {
        if (window.devicePixelRatio > 1) {
          var a = b.st.retina,
            c = a.ratio;
          c = isNaN(c) ? c() : c, c > 1 && (w("ImageHasSize." + U, function (a, b) {
            b.img.css({
              "max-width": b.img[0].naturalWidth / c,
              width: "100%"
            });
          }), w("ElementParse." + U, function (b, d) {
            d.src = a.replaceSrc(d, c);
          }));
        }
      }
    }
  }), A();
});

/***/ }),

/***/ "./assets/common-sass/media-boxes/plugin/components/Modernizr/modernizr.custom.min.js":
/*!********************************************************************************************!*\
  !*** ./assets/common-sass/media-boxes/plugin/components/Modernizr/modernizr.custom.min.js ***!
  \********************************************************************************************/
/***/ (() => {

function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
/*! modernizr 3.6.0 (Custom Build) | MIT *
 * https://modernizr.com/download/?-csstransitions-addtest-atrule-domprefixes-hasevent-mq-prefixed-prefixedcss-prefixedcssvalue-prefixes-setclasses-testallprops-testprop-teststyles !*/
!function (e, n, t) {
  "use strict";

  function r(e) {
    var n = S.className,
      t = Modernizr._config.classPrefix || "";
    if (x && (n = n.baseVal), Modernizr._config.enableJSClass) {
      var r = new RegExp("(^|\\s)" + t + "no-js(\\s|$)");
      n = n.replace(r, "$1" + t + "js$2");
    }
    Modernizr._config.enableClasses && (n += " " + t + e.join(" " + t), x ? S.className.baseVal = n : S.className = n);
  }
  function o(e, n) {
    return _typeof(e) === n;
  }
  function i() {
    var e, n, t, r, i, s, a;
    for (var u in b) if (b.hasOwnProperty(u)) {
      if (e = [], n = b[u], n.name && (e.push(n.name.toLowerCase()), n.options && n.options.aliases && n.options.aliases.length)) for (t = 0; t < n.options.aliases.length; t++) e.push(n.options.aliases[t].toLowerCase());
      for (r = o(n.fn, "function") ? n.fn() : n.fn, i = 0; i < e.length; i++) s = e[i], a = s.split("."), 1 === a.length ? Modernizr[a[0]] = r : (!Modernizr[a[0]] || Modernizr[a[0]] instanceof Boolean || (Modernizr[a[0]] = new Boolean(Modernizr[a[0]])), Modernizr[a[0]][a[1]] = r), _.push((r ? "" : "no-") + a.join("-"));
    }
  }
  function s(e, n) {
    if ("object" == _typeof(e)) for (var t in e) T(e, t) && s(t, e[t]);else {
      e = e.toLowerCase();
      var o = e.split("."),
        i = Modernizr[o[0]];
      if (2 == o.length && (i = i[o[1]]), "undefined" != typeof i) return Modernizr;
      n = "function" == typeof n ? n() : n, 1 == o.length ? Modernizr[o[0]] = n : (!Modernizr[o[0]] || Modernizr[o[0]] instanceof Boolean || (Modernizr[o[0]] = new Boolean(Modernizr[o[0]])), Modernizr[o[0]][o[1]] = n), r([(n && 0 != n ? "" : "no-") + o.join("-")]), Modernizr._trigger(e, n);
    }
    return Modernizr;
  }
  function a() {
    return "function" != typeof n.createElement ? n.createElement(arguments[0]) : x ? n.createElementNS.call(n, "http://www.w3.org/2000/svg", arguments[0]) : n.createElement.apply(n, arguments);
  }
  function u(e) {
    return e.replace(/([a-z])-([a-z])/g, function (e, n, t) {
      return n + t.toUpperCase();
    }).replace(/^-/, "");
  }
  function l(e) {
    return e.replace(/([A-Z])/g, function (e, n) {
      return "-" + n.toLowerCase();
    }).replace(/^ms-/, "-ms-");
  }
  function f() {
    var e = n.body;
    return e || (e = a(x ? "svg" : "body"), e.fake = !0), e;
  }
  function c(e, t, r, o) {
    var i,
      s,
      u,
      l,
      c = "modernizr",
      p = a("div"),
      d = f();
    if (parseInt(r, 10)) for (; r--;) u = a("div"), u.id = o ? o[r] : c + (r + 1), p.appendChild(u);
    return i = a("style"), i.type = "text/css", i.id = "s" + c, (d.fake ? d : p).appendChild(i), d.appendChild(p), i.styleSheet ? i.styleSheet.cssText = e : i.appendChild(n.createTextNode(e)), p.id = c, d.fake && (d.style.background = "", d.style.overflow = "hidden", l = S.style.overflow, S.style.overflow = "hidden", S.appendChild(d)), s = t(p, e), d.fake ? (d.parentNode.removeChild(d), S.style.overflow = l, S.offsetHeight) : p.parentNode.removeChild(p), !!s;
  }
  function p(e, n) {
    return !!~("" + e).indexOf(n);
  }
  function d(e, n) {
    return function () {
      return e.apply(n, arguments);
    };
  }
  function v(e, n, t) {
    var r;
    for (var i in e) if (e[i] in n) return t === !1 ? e[i] : (r = n[e[i]], o(r, "function") ? d(r, t || n) : r);
    return !1;
  }
  function m(n, t, r) {
    var o;
    if ("getComputedStyle" in e) {
      o = getComputedStyle.call(e, n, t);
      var i = e.console;
      if (null !== o) r && (o = o.getPropertyValue(r));else if (i) {
        var s = i.error ? "error" : "log";
        i[s].call(i, "getComputedStyle returning null, its possible modernizr test results are inaccurate");
      }
    } else o = !t && n.currentStyle && n.currentStyle[r];
    return o;
  }
  function h(n, r) {
    var o = n.length;
    if ("CSS" in e && "supports" in e.CSS) {
      for (; o--;) if (e.CSS.supports(l(n[o]), r)) return !0;
      return !1;
    }
    if ("CSSSupportsRule" in e) {
      for (var i = []; o--;) i.push("(" + l(n[o]) + ":" + r + ")");
      return i = i.join(" or "), c("@supports (" + i + ") { #modernizr { position: absolute; } }", function (e) {
        return "absolute" == m(e, null, "position");
      });
    }
    return t;
  }
  function y(e, n, r, i) {
    function s() {
      f && (delete q.style, delete q.modElem);
    }
    if (i = o(i, "undefined") ? !1 : i, !o(r, "undefined")) {
      var l = h(e, r);
      if (!o(l, "undefined")) return l;
    }
    for (var f, c, d, v, m, y = ["modernizr", "tspan", "samp"]; !q.style && y.length;) f = !0, q.modElem = a(y.shift()), q.style = q.modElem.style;
    for (d = e.length, c = 0; d > c; c++) if (v = e[c], m = q.style[v], p(v, "-") && (v = u(v)), q.style[v] !== t) {
      if (i || o(r, "undefined")) return s(), "pfx" == n ? v : !0;
      try {
        q.style[v] = r;
      } catch (g) {}
      if (q.style[v] != m) return s(), "pfx" == n ? v : !0;
    }
    return s(), !1;
  }
  function g(e, n, t, r, i) {
    var s = e.charAt(0).toUpperCase() + e.slice(1),
      a = (e + " " + j.join(s + " ") + s).split(" ");
    return o(n, "string") || o(n, "undefined") ? y(a, n, r, i) : (a = (e + " " + z.join(s + " ") + s).split(" "), v(a, n, t));
  }
  function C(e, n, r) {
    return g(e, t, t, n, r);
  }
  var _ = [],
    S = n.documentElement,
    w = "Moz O ms Webkit",
    x = "svg" === S.nodeName.toLowerCase(),
    b = [],
    P = {
      _version: "3.6.0",
      _config: {
        classPrefix: "",
        enableClasses: !0,
        enableJSClass: !0,
        usePrefixes: !0
      },
      _q: [],
      on: function on(e, n) {
        var t = this;
        setTimeout(function () {
          n(t[e]);
        }, 0);
      },
      addTest: function addTest(e, n, t) {
        b.push({
          name: e,
          fn: n,
          options: t
        });
      },
      addAsyncTest: function addAsyncTest(e) {
        b.push({
          name: null,
          fn: e
        });
      }
    },
    Modernizr = function Modernizr() {};
  Modernizr.prototype = P, Modernizr = new Modernizr();
  var E = P._config.usePrefixes ? " -webkit- -moz- -o- -ms- ".split(" ") : ["", ""];
  P._prefixes = E;
  var z = P._config.usePrefixes ? w.toLowerCase().split(" ") : [];
  P._domPrefixes = z;
  var T;
  !function () {
    var e = {}.hasOwnProperty;
    T = o(e, "undefined") || o(e.call, "undefined") ? function (e, n) {
      return n in e && o(e.constructor.prototype[n], "undefined");
    } : function (n, t) {
      return e.call(n, t);
    };
  }(), P._l = {}, P.on = function (e, n) {
    this._l[e] || (this._l[e] = []), this._l[e].push(n), Modernizr.hasOwnProperty(e) && setTimeout(function () {
      Modernizr._trigger(e, Modernizr[e]);
    }, 0);
  }, P._trigger = function (e, n) {
    if (this._l[e]) {
      var t = this._l[e];
      setTimeout(function () {
        var e, r;
        for (e = 0; e < t.length; e++) (r = t[e])(n);
      }, 0), delete this._l[e];
    }
  }, Modernizr._q.push(function () {
    P.addTest = s;
  });
  var j = P._config.usePrefixes ? w.split(" ") : [];
  P._cssomPrefixes = j;
  var A = function A(n) {
    var r,
      o = E.length,
      i = e.CSSRule;
    if ("undefined" == typeof i) return t;
    if (!n) return !1;
    if (n = n.replace(/^@/, ""), r = n.replace(/-/g, "_").toUpperCase() + "_RULE", r in i) return "@" + n;
    for (var s = 0; o > s; s++) {
      var a = E[s],
        u = a.toUpperCase() + "_" + r;
      if (u in i) return "@-" + a.toLowerCase() + "-" + n;
    }
    return !1;
  };
  P.atRule = A;
  var N = function () {
    function e(e, n) {
      var o;
      return e ? (n && "string" != typeof n || (n = a(n || "div")), e = "on" + e, o = e in n, !o && r && (n.setAttribute || (n = a("div")), n.setAttribute(e, ""), o = "function" == typeof n[e], n[e] !== t && (n[e] = t), n.removeAttribute(e)), o) : !1;
    }
    var r = !("onblur" in n.documentElement);
    return e;
  }();
  P.hasEvent = N;
  var L = function L(e, n) {
    var t = !1,
      r = a("div"),
      o = r.style;
    if (e in o) {
      var i = z.length;
      for (o[e] = n, t = o[e]; i-- && !t;) o[e] = "-" + z[i] + "-" + n, t = o[e];
    }
    return "" === t && (t = !1), t;
  };
  P.prefixedCSSValue = L;
  var O = function () {
    var n = e.matchMedia || e.msMatchMedia;
    return n ? function (e) {
      var t = n(e);
      return t && t.matches || !1;
    } : function (n) {
      var t = !1;
      return c("@media " + n + " { #modernizr { position: absolute; } }", function (n) {
        t = "absolute" == (e.getComputedStyle ? e.getComputedStyle(n, null) : n.currentStyle).position;
      }), t;
    };
  }();
  P.mq = O;
  var k = (P.testStyles = c, {
    elem: a("modernizr")
  });
  Modernizr._q.push(function () {
    delete k.elem;
  });
  var q = {
    style: k.elem.style
  };
  Modernizr._q.unshift(function () {
    delete q.style;
  });
  P.testProp = function (e, n, r) {
    return y([e], t, n, r);
  };
  P.testAllProps = g;
  var R = P.prefixed = function (e, n, t) {
    return 0 === e.indexOf("@") ? A(e) : (-1 != e.indexOf("-") && (e = u(e)), n ? g(e, n, t) : g(e, "pfx"));
  };
  P.prefixedCSS = function (e) {
    var n = R(e);
    return n && l(n);
  };
  P.testAllProps = C, Modernizr.addTest("csstransitions", C("transition", "all", !0)), i(), r(_), delete P.addTest, delete P.addAsyncTest;
  for (var M = 0; M < Modernizr._q.length; M++) Modernizr._q[M]();
  e.Modernizr = Modernizr;
}(window, document);

/***/ }),

/***/ "./assets/common-sass/media-boxes/plugin/components/Transit/jquery.transit.min.js":
/*!****************************************************************************************!*\
  !*** ./assets/common-sass/media-boxes/plugin/components/Transit/jquery.transit.min.js ***!
  \****************************************************************************************/
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
/*!
 * jQuery Transit - CSS3 transitions and transformations
 * (c) 2011-2012 Rico Sta. Cruz
 * MIT Licensed.
 *
 * http://ricostacruz.com/jquery.transit
 * http://github.com/rstacruz/jquery.transit
 */

(function (t, e) {
  "use strict";

  if (true) {
    !(__WEBPACK_AMD_DEFINE_ARRAY__ = [__webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")], __WEBPACK_AMD_DEFINE_FACTORY__ = (e),
		__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
		(__WEBPACK_AMD_DEFINE_FACTORY__.apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__)) : __WEBPACK_AMD_DEFINE_FACTORY__),
		__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));
  } else {}
})(this, function (t) {
  t.transit = {
    version: "0.9.12",
    propertyMap: {
      marginLeft: "margin",
      marginRight: "margin",
      marginBottom: "margin",
      marginTop: "margin",
      paddingLeft: "padding",
      paddingRight: "padding",
      paddingBottom: "padding",
      paddingTop: "padding"
    },
    enabled: true,
    useTransitionEnd: false
  };
  var e = document.createElement("div");
  var n = {};
  function i(t) {
    if (t in e.style) return t;
    var n = ["Moz", "Webkit", "O", "ms"];
    var i = t.charAt(0).toUpperCase() + t.substr(1);
    for (var r = 0; r < n.length; ++r) {
      var s = n[r] + i;
      if (s in e.style) {
        return s;
      }
    }
  }
  function r() {
    e.style[n.transform] = "";
    e.style[n.transform] = "rotateY(90deg)";
    return e.style[n.transform] !== "";
  }
  var s = navigator.userAgent.toLowerCase().indexOf("chrome") > -1;
  n.transition = i("transition");
  n.transitionDelay = i("transitionDelay");
  n.transform = i("transform");
  n.transformOrigin = i("transformOrigin");
  n.filter = i("Filter");
  n.transform3d = r();
  var a = {
    transition: "transitionend",
    MozTransition: "transitionend",
    OTransition: "oTransitionEnd",
    WebkitTransition: "webkitTransitionEnd",
    msTransition: "MSTransitionEnd"
  };
  var o = n.transitionEnd = a[n.transition] || null;
  for (var u in n) {
    if (n.hasOwnProperty(u) && typeof t.support[u] === "undefined") {
      t.support[u] = n[u];
    }
  }
  e = null;
  t.cssEase = {
    _default: "ease",
    "in": "ease-in",
    out: "ease-out",
    "in-out": "ease-in-out",
    snap: "cubic-bezier(0,1,.5,1)",
    easeInCubic: "cubic-bezier(.550,.055,.675,.190)",
    easeOutCubic: "cubic-bezier(.215,.61,.355,1)",
    easeInOutCubic: "cubic-bezier(.645,.045,.355,1)",
    easeInCirc: "cubic-bezier(.6,.04,.98,.335)",
    easeOutCirc: "cubic-bezier(.075,.82,.165,1)",
    easeInOutCirc: "cubic-bezier(.785,.135,.15,.86)",
    easeInExpo: "cubic-bezier(.95,.05,.795,.035)",
    easeOutExpo: "cubic-bezier(.19,1,.22,1)",
    easeInOutExpo: "cubic-bezier(1,0,0,1)",
    easeInQuad: "cubic-bezier(.55,.085,.68,.53)",
    easeOutQuad: "cubic-bezier(.25,.46,.45,.94)",
    easeInOutQuad: "cubic-bezier(.455,.03,.515,.955)",
    easeInQuart: "cubic-bezier(.895,.03,.685,.22)",
    easeOutQuart: "cubic-bezier(.165,.84,.44,1)",
    easeInOutQuart: "cubic-bezier(.77,0,.175,1)",
    easeInQuint: "cubic-bezier(.755,.05,.855,.06)",
    easeOutQuint: "cubic-bezier(.23,1,.32,1)",
    easeInOutQuint: "cubic-bezier(.86,0,.07,1)",
    easeInSine: "cubic-bezier(.47,0,.745,.715)",
    easeOutSine: "cubic-bezier(.39,.575,.565,1)",
    easeInOutSine: "cubic-bezier(.445,.05,.55,.95)",
    easeInBack: "cubic-bezier(.6,-.28,.735,.045)",
    easeOutBack: "cubic-bezier(.175, .885,.32,1.275)",
    easeInOutBack: "cubic-bezier(.68,-.55,.265,1.55)"
  };
  t.cssHooks["transit:transform"] = {
    get: function get(e) {
      return t(e).data("transform") || new f();
    },
    set: function set(e, i) {
      var r = i;
      if (!(r instanceof f)) {
        r = new f(r);
      }
      if (n.transform === "WebkitTransform" && !s) {
        e.style[n.transform] = r.toString(true);
      } else {
        e.style[n.transform] = r.toString();
      }
      t(e).data("transform", r);
    }
  };
  t.cssHooks.transform = {
    set: t.cssHooks["transit:transform"].set
  };
  t.cssHooks.filter = {
    get: function get(t) {
      return t.style[n.filter];
    },
    set: function set(t, e) {
      t.style[n.filter] = e;
    }
  };
  if (t.fn.jquery < "1.8") {
    t.cssHooks.transformOrigin = {
      get: function get(t) {
        return t.style[n.transformOrigin];
      },
      set: function set(t, e) {
        t.style[n.transformOrigin] = e;
      }
    };
    t.cssHooks.transition = {
      get: function get(t) {
        return t.style[n.transition];
      },
      set: function set(t, e) {
        t.style[n.transition] = e;
      }
    };
  }
  p("scale");
  p("scaleX");
  p("scaleY");
  p("translate");
  p("rotate");
  p("rotateX");
  p("rotateY");
  p("rotate3d");
  p("perspective");
  p("skewX");
  p("skewY");
  p("x", true);
  p("y", true);
  function f(t) {
    if (typeof t === "string") {
      this.parse(t);
    }
    return this;
  }
  f.prototype = {
    setFromString: function setFromString(t, e) {
      var n = typeof e === "string" ? e.split(",") : e.constructor === Array ? e : [e];
      n.unshift(t);
      f.prototype.set.apply(this, n);
    },
    set: function set(t) {
      var e = Array.prototype.slice.apply(arguments, [1]);
      if (this.setter[t]) {
        this.setter[t].apply(this, e);
      } else {
        this[t] = e.join(",");
      }
    },
    get: function get(t) {
      if (this.getter[t]) {
        return this.getter[t].apply(this);
      } else {
        return this[t] || 0;
      }
    },
    setter: {
      rotate: function rotate(t) {
        this.rotate = b(t, "deg");
      },
      rotateX: function rotateX(t) {
        this.rotateX = b(t, "deg");
      },
      rotateY: function rotateY(t) {
        this.rotateY = b(t, "deg");
      },
      scale: function scale(t, e) {
        if (e === undefined) {
          e = t;
        }
        this.scale = t + "," + e;
      },
      skewX: function skewX(t) {
        this.skewX = b(t, "deg");
      },
      skewY: function skewY(t) {
        this.skewY = b(t, "deg");
      },
      perspective: function perspective(t) {
        this.perspective = b(t, "px");
      },
      x: function x(t) {
        this.set("translate", t, null);
      },
      y: function y(t) {
        this.set("translate", null, t);
      },
      translate: function translate(t, e) {
        if (this._translateX === undefined) {
          this._translateX = 0;
        }
        if (this._translateY === undefined) {
          this._translateY = 0;
        }
        if (t !== null && t !== undefined) {
          this._translateX = b(t, "px");
        }
        if (e !== null && e !== undefined) {
          this._translateY = b(e, "px");
        }
        this.translate = this._translateX + "," + this._translateY;
      }
    },
    getter: {
      x: function x() {
        return this._translateX || 0;
      },
      y: function y() {
        return this._translateY || 0;
      },
      scale: function scale() {
        var t = (this.scale || "1,1").split(",");
        if (t[0]) {
          t[0] = parseFloat(t[0]);
        }
        if (t[1]) {
          t[1] = parseFloat(t[1]);
        }
        return t[0] === t[1] ? t[0] : t;
      },
      rotate3d: function rotate3d() {
        var t = (this.rotate3d || "0,0,0,0deg").split(",");
        for (var e = 0; e <= 3; ++e) {
          if (t[e]) {
            t[e] = parseFloat(t[e]);
          }
        }
        if (t[3]) {
          t[3] = b(t[3], "deg");
        }
        return t;
      }
    },
    parse: function parse(t) {
      var e = this;
      t.replace(/([a-zA-Z0-9]+)\((.*?)\)/g, function (t, n, i) {
        e.setFromString(n, i);
      });
    },
    toString: function toString(t) {
      var e = [];
      for (var i in this) {
        if (this.hasOwnProperty(i)) {
          if (!n.transform3d && (i === "rotateX" || i === "rotateY" || i === "perspective" || i === "transformOrigin")) {
            continue;
          }
          if (i[0] !== "_") {
            if (t && i === "scale") {
              e.push(i + "3d(" + this[i] + ",1)");
            } else if (t && i === "translate") {
              e.push(i + "3d(" + this[i] + ",0)");
            } else {
              e.push(i + "(" + this[i] + ")");
            }
          }
        }
      }
      return e.join(" ");
    }
  };
  function c(t, e, n) {
    if (e === true) {
      t.queue(n);
    } else if (e) {
      t.queue(e, n);
    } else {
      t.each(function () {
        n.call(this);
      });
    }
  }
  function l(e) {
    var i = [];
    t.each(e, function (e) {
      e = t.camelCase(e);
      e = t.transit.propertyMap[e] || t.cssProps[e] || e;
      e = h(e);
      if (n[e]) e = h(n[e]);
      if (t.inArray(e, i) === -1) {
        i.push(e);
      }
    });
    return i;
  }
  function d(e, n, i, r) {
    var s = l(e);
    if (t.cssEase[i]) {
      i = t.cssEase[i];
    }
    var a = "" + y(n) + " " + i;
    if (parseInt(r, 10) > 0) {
      a += " " + y(r);
    }
    var o = [];
    t.each(s, function (t, e) {
      o.push(e + " " + a);
    });
    return o.join(", ");
  }
  t.fn.transition = t.fn.transit = function (e, i, r, s) {
    var a = this;
    var u = 0;
    var f = true;
    var l = t.extend(true, {}, e);
    if (typeof i === "function") {
      s = i;
      i = undefined;
    }
    if (_typeof(i) === "object") {
      r = i.easing;
      u = i.delay || 0;
      f = typeof i.queue === "undefined" ? true : i.queue;
      s = i.complete;
      i = i.duration;
    }
    if (typeof r === "function") {
      s = r;
      r = undefined;
    }
    if (typeof l.easing !== "undefined") {
      r = l.easing;
      delete l.easing;
    }
    if (typeof l.duration !== "undefined") {
      i = l.duration;
      delete l.duration;
    }
    if (typeof l.complete !== "undefined") {
      s = l.complete;
      delete l.complete;
    }
    if (typeof l.queue !== "undefined") {
      f = l.queue;
      delete l.queue;
    }
    if (typeof l.delay !== "undefined") {
      u = l.delay;
      delete l.delay;
    }
    if (typeof i === "undefined") {
      i = t.fx.speeds._default;
    }
    if (typeof r === "undefined") {
      r = t.cssEase._default;
    }
    i = y(i);
    var p = d(l, i, r, u);
    var h = t.transit.enabled && n.transition;
    var b = h ? parseInt(i, 10) + parseInt(u, 10) : 0;
    if (b === 0) {
      var g = function g(t) {
        a.css(l);
        if (s) {
          s.apply(a);
        }
        if (t) {
          t();
        }
      };
      c(a, f, g);
      return a;
    }
    var m = {};
    var v = function v(e) {
      var i = false;
      var r = function r() {
        if (i) {
          a.unbind(o, r);
        }
        if (b > 0) {
          a.each(function () {
            this.style[n.transition] = m[this] || null;
          });
        }
        if (typeof s === "function") {
          s.apply(a);
        }
        if (typeof e === "function") {
          e();
        }
      };
      if (b > 0 && o && t.transit.useTransitionEnd) {
        i = true;
        a.bind(o, r);
      } else {
        window.setTimeout(r, b);
      }
      a.each(function () {
        if (b > 0) {
          this.style[n.transition] = p;
        }
        t(this).css(l);
      });
    };
    var z = function z(t) {
      this.offsetWidth;
      v(t);
    };
    c(a, f, z);
    return this;
  };
  function p(e, i) {
    if (!i) {
      t.cssNumber[e] = true;
    }
    t.transit.propertyMap[e] = n.transform;
    t.cssHooks[e] = {
      get: function get(n) {
        var i = t(n).css("transit:transform");
        return i.get(e);
      },
      set: function set(n, i) {
        var r = t(n).css("transit:transform");
        r.setFromString(e, i);
        t(n).css({
          "transit:transform": r
        });
      }
    };
  }
  function h(t) {
    return t.replace(/([A-Z])/g, function (t) {
      return "-" + t.toLowerCase();
    });
  }
  function b(t, e) {
    if (typeof t === "string" && !t.match(/^[\-0-9\.]+$/)) {
      return t;
    } else {
      return "" + t + e;
    }
  }
  function y(e) {
    var n = e;
    if (typeof n === "string" && !n.match(/^[\-0-9\.]+/)) {
      n = t.fx.speeds[n] || t.fx.speeds._default;
    }
    return b(n, "ms");
  }
  t.transit.getTransitionValue = d;
  return t;
});

/***/ }),

/***/ "./assets/common-sass/media-boxes/plugin/components/imagesLoaded/jquery.imagesLoaded.min.js":
/*!**************************************************************************************************!*\
  !*** ./assets/common-sass/media-boxes/plugin/components/imagesLoaded/jquery.imagesLoaded.min.js ***!
  \**************************************************************************************************/
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_LOCAL_MODULE_0__, __WEBPACK_LOCAL_MODULE_0__factory, __WEBPACK_LOCAL_MODULE_0__module;var __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
/* 
 *
 * Namespace changed by David Blanco to imagesLoadedMB
 * (old version was v4.1.0)
 *
 */

/*!
 * imagesLoadedMB PACKAGED v4.1.4
 * JavaScript is all like "You images are done yet or what?"
 * MIT License
 */

!function (e, t) {
   true ? !(__WEBPACK_LOCAL_MODULE_0__factory = (t), (typeof __WEBPACK_LOCAL_MODULE_0__factory === 'function' ? ((__WEBPACK_LOCAL_MODULE_0__module = { id: "ev-emitter/ev-emitter", exports: {}, loaded: false }), (__WEBPACK_LOCAL_MODULE_0__ = __WEBPACK_LOCAL_MODULE_0__factory.call(__WEBPACK_LOCAL_MODULE_0__module.exports, __webpack_require__, __WEBPACK_LOCAL_MODULE_0__module.exports, __WEBPACK_LOCAL_MODULE_0__module)), (__WEBPACK_LOCAL_MODULE_0__module.loaded = true), __WEBPACK_LOCAL_MODULE_0__ === undefined && (__WEBPACK_LOCAL_MODULE_0__ = __WEBPACK_LOCAL_MODULE_0__module.exports)) : __WEBPACK_LOCAL_MODULE_0__ = __WEBPACK_LOCAL_MODULE_0__factory)) : 0;
}("undefined" != typeof window ? window : this, function () {
  function e() {}
  var t = e.prototype;
  return t.on = function (e, t) {
    if (e && t) {
      var i = this._events = this._events || {},
        n = i[e] = i[e] || [];
      return n.indexOf(t) == -1 && n.push(t), this;
    }
  }, t.once = function (e, t) {
    if (e && t) {
      this.on(e, t);
      var i = this._onceEvents = this._onceEvents || {},
        n = i[e] = i[e] || {};
      return n[t] = !0, this;
    }
  }, t.off = function (e, t) {
    var i = this._events && this._events[e];
    if (i && i.length) {
      var n = i.indexOf(t);
      return n != -1 && i.splice(n, 1), this;
    }
  }, t.emitEvent = function (e, t) {
    var i = this._events && this._events[e];
    if (i && i.length) {
      i = i.slice(0), t = t || [];
      for (var n = this._onceEvents && this._onceEvents[e], o = 0; o < i.length; o++) {
        var r = i[o],
          s = n && n[r];
        s && (this.off(e, r), delete n[r]), r.apply(this, t);
      }
      return this;
    }
  }, t.allOff = function () {
    delete this._events, delete this._onceEvents;
  }, e;
}), function (e, t) {
  "use strict";

   true ? !(__WEBPACK_AMD_DEFINE_ARRAY__ = [__WEBPACK_LOCAL_MODULE_0__], __WEBPACK_AMD_DEFINE_RESULT__ = (function (i) {
    return t(e, i);
  }).apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__),
		__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__)) : 0;
}("undefined" != typeof window ? window : this, function (e, t) {
  function i(e, t) {
    for (var i in t) e[i] = t[i];
    return e;
  }
  function n(e) {
    if (Array.isArray(e)) return e;
    var t = "object" == _typeof(e) && "number" == typeof e.length;
    return t ? d.call(e) : [e];
  }
  function o(e, t, r) {
    if (!(this instanceof o)) return new o(e, t, r);
    var s = e;
    return "string" == typeof e && (s = document.querySelectorAll(e)), s ? (this.elements = n(s), this.options = i({}, this.options), "function" == typeof t ? r = t : i(this.options, t), r && this.on("always", r), this.getImages(), h && (this.jqDeferred = new h.Deferred()), void setTimeout(this.check.bind(this))) : void a.error("Bad element for imagesLoadedMB " + (s || e));
  }
  function r(e) {
    this.img = e;
  }
  function s(e, t) {
    this.url = e, this.element = t, this.img = new Image();
  }
  var h = e.jQuery,
    a = e.console,
    d = Array.prototype.slice;
  o.prototype = Object.create(t.prototype), o.prototype.options = {}, o.prototype.getImages = function () {
    this.images = [], this.elements.forEach(this.addElementImages, this);
  }, o.prototype.addElementImages = function (e) {
    "IMG" == e.nodeName && this.addImage(e), this.options.background === !0 && this.addElementBackgroundImages(e);
    var t = e.nodeType;
    if (t && u[t]) {
      for (var i = e.querySelectorAll("img"), n = 0; n < i.length; n++) {
        var o = i[n];
        this.addImage(o);
      }
      if ("string" == typeof this.options.background) {
        var r = e.querySelectorAll(this.options.background);
        for (n = 0; n < r.length; n++) {
          var s = r[n];
          this.addElementBackgroundImages(s);
        }
      }
    }
  };
  var u = {
    1: !0,
    9: !0,
    11: !0
  };
  return o.prototype.addElementBackgroundImages = function (e) {
    var t = getComputedStyle(e);
    if (t) for (var i = /url\((['"])?(.*?)\1\)/gi, n = i.exec(t.backgroundImage); null !== n;) {
      var o = n && n[2];
      o && this.addBackground(o, e), n = i.exec(t.backgroundImage);
    }
  }, o.prototype.addImage = function (e) {
    var t = new r(e);
    this.images.push(t);
  }, o.prototype.addBackground = function (e, t) {
    var i = new s(e, t);
    this.images.push(i);
  }, o.prototype.check = function () {
    function e(e, i, n) {
      setTimeout(function () {
        t.progress(e, i, n);
      });
    }
    var t = this;
    return this.progressedCount = 0, this.hasAnyBroken = !1, this.images.length ? void this.images.forEach(function (t) {
      t.once("progress", e), t.check();
    }) : void this.complete();
  }, o.prototype.progress = function (e, t, i) {
    this.progressedCount++, this.hasAnyBroken = this.hasAnyBroken || !e.isLoaded, this.emitEvent("progress", [this, e, t]), this.jqDeferred && this.jqDeferred.notify && this.jqDeferred.notify(this, e), this.progressedCount == this.images.length && this.complete(), this.options.debug && a && a.log("progress: " + i, e, t);
  }, o.prototype.complete = function () {
    var e = this.hasAnyBroken ? "fail" : "done";
    if (this.isComplete = !0, this.emitEvent(e, [this]), this.emitEvent("always", [this]), this.jqDeferred) {
      var t = this.hasAnyBroken ? "reject" : "resolve";
      this.jqDeferred[t](this);
    }
  }, r.prototype = Object.create(t.prototype), r.prototype.check = function () {
    var e = this.getIsImageComplete();
    return e ? void this.confirm(0 !== this.img.naturalWidth, "naturalWidth") : (this.proxyImage = new Image(), this.proxyImage.addEventListener("load", this), this.proxyImage.addEventListener("error", this), this.img.addEventListener("load", this), this.img.addEventListener("error", this), void (this.proxyImage.src = this.img.src));
  }, r.prototype.getIsImageComplete = function () {
    return this.img.complete && this.img.naturalWidth;
  }, r.prototype.confirm = function (e, t) {
    this.isLoaded = e, this.emitEvent("progress", [this, this.img, t]);
  }, r.prototype.handleEvent = function (e) {
    var t = "on" + e.type;
    this[t] && this[t](e);
  }, r.prototype.onload = function () {
    this.confirm(!0, "onload"), this.unbindEvents();
  }, r.prototype.onerror = function () {
    this.confirm(!1, "onerror"), this.unbindEvents();
  }, r.prototype.unbindEvents = function () {
    this.proxyImage.removeEventListener("load", this), this.proxyImage.removeEventListener("error", this), this.img.removeEventListener("load", this), this.img.removeEventListener("error", this);
  }, s.prototype = Object.create(r.prototype), s.prototype.check = function () {
    this.img.addEventListener("load", this), this.img.addEventListener("error", this), this.img.src = this.url;
    var e = this.getIsImageComplete();
    e && (this.confirm(0 !== this.img.naturalWidth, "naturalWidth"), this.unbindEvents());
  }, s.prototype.unbindEvents = function () {
    this.img.removeEventListener("load", this), this.img.removeEventListener("error", this);
  }, s.prototype.confirm = function (e, t) {
    this.isLoaded = e, this.emitEvent("progress", [this, this.element, t]);
  }, o.makeJQueryPlugin = function (t) {
    t = t || e.jQuery, t && (h = t, h.fn.imagesLoadedMB = function (e, t) {
      var i = new o(this, e, t);
      return i.jqDeferred.promise(h(this));
    });
  }, o.makeJQueryPlugin(), o;
});

/***/ }),

/***/ "./assets/common-sass/media-boxes/plugin/components/jQuery Easing/jquery.easing.js":
/*!*****************************************************************************************!*\
  !*** ./assets/common-sass/media-boxes/plugin/components/jQuery Easing/jquery.easing.js ***!
  \*****************************************************************************************/
/***/ (() => {

/*
 * jQuery Easing v1.3 - http://gsgd.co.uk/sandbox/jquery/easing/
*/
(function (window, jQuery, undefined) {
  "use strict";

  jQuery.easing.jswing = jQuery.easing.swing, jQuery.extend(jQuery.easing, {
    def: "easeOutQuad",
    swing: function swing(n, e, t, u, a) {
      return jQuery.easing[jQuery.easing.def](n, e, t, u, a);
    },
    easeInQuad: function easeInQuad(n, e, t, u, a) {
      return u * (e /= a) * e + t;
    },
    easeOutQuad: function easeOutQuad(n, e, t, u, a) {
      return -u * (e /= a) * (e - 2) + t;
    },
    easeInOutQuad: function easeInOutQuad(n, e, t, u, a) {
      return (e /= a / 2) < 1 ? u / 2 * e * e + t : -u / 2 * (--e * (e - 2) - 1) + t;
    },
    easeInCubic: function easeInCubic(n, e, t, u, a) {
      return u * (e /= a) * e * e + t;
    },
    easeOutCubic: function easeOutCubic(n, e, t, u, a) {
      return u * ((e = e / a - 1) * e * e + 1) + t;
    },
    easeInOutCubic: function easeInOutCubic(n, e, t, u, a) {
      return (e /= a / 2) < 1 ? u / 2 * e * e * e + t : u / 2 * ((e -= 2) * e * e + 2) + t;
    },
    easeInQuart: function easeInQuart(n, e, t, u, a) {
      return u * (e /= a) * e * e * e + t;
    },
    easeOutQuart: function easeOutQuart(n, e, t, u, a) {
      return -u * ((e = e / a - 1) * e * e * e - 1) + t;
    },
    easeInOutQuart: function easeInOutQuart(n, e, t, u, a) {
      return (e /= a / 2) < 1 ? u / 2 * e * e * e * e + t : -u / 2 * ((e -= 2) * e * e * e - 2) + t;
    },
    easeInQuint: function easeInQuint(n, e, t, u, a) {
      return u * (e /= a) * e * e * e * e + t;
    },
    easeOutQuint: function easeOutQuint(n, e, t, u, a) {
      return u * ((e = e / a - 1) * e * e * e * e + 1) + t;
    },
    easeInOutQuint: function easeInOutQuint(n, e, t, u, a) {
      return (e /= a / 2) < 1 ? u / 2 * e * e * e * e * e + t : u / 2 * ((e -= 2) * e * e * e * e + 2) + t;
    },
    easeInSine: function easeInSine(n, e, t, u, a) {
      return -u * Math.cos(e / a * (Math.PI / 2)) + u + t;
    },
    easeOutSine: function easeOutSine(n, e, t, u, a) {
      return u * Math.sin(e / a * (Math.PI / 2)) + t;
    },
    easeInOutSine: function easeInOutSine(n, e, t, u, a) {
      return -u / 2 * (Math.cos(Math.PI * e / a) - 1) + t;
    },
    easeInExpo: function easeInExpo(n, e, t, u, a) {
      return 0 == e ? t : u * Math.pow(2, 10 * (e / a - 1)) + t;
    },
    easeOutExpo: function easeOutExpo(n, e, t, u, a) {
      return e == a ? t + u : u * (1 - Math.pow(2, -10 * e / a)) + t;
    },
    easeInOutExpo: function easeInOutExpo(n, e, t, u, a) {
      return 0 == e ? t : e == a ? t + u : (e /= a / 2) < 1 ? u / 2 * Math.pow(2, 10 * (e - 1)) + t : u / 2 * (2 - Math.pow(2, -10 * --e)) + t;
    },
    easeInCirc: function easeInCirc(n, e, t, u, a) {
      return -u * (Math.sqrt(1 - (e /= a) * e) - 1) + t;
    },
    easeOutCirc: function easeOutCirc(n, e, t, u, a) {
      return u * Math.sqrt(1 - (e = e / a - 1) * e) + t;
    },
    easeInOutCirc: function easeInOutCirc(n, e, t, u, a) {
      return (e /= a / 2) < 1 ? -u / 2 * (Math.sqrt(1 - e * e) - 1) + t : u / 2 * (Math.sqrt(1 - (e -= 2) * e) + 1) + t;
    },
    easeInElastic: function easeInElastic(n, e, t, u, a) {
      var r = 1.70158,
        i = 0,
        s = u;
      if (0 == e) return t;
      if (1 == (e /= a)) return t + u;
      if (i || (i = .3 * a), s < Math.abs(u)) {
        s = u;
        r = i / 4;
      } else r = i / (2 * Math.PI) * Math.asin(u / s);
      return -s * Math.pow(2, 10 * (e -= 1)) * Math.sin((e * a - r) * (2 * Math.PI) / i) + t;
    },
    easeOutElastic: function easeOutElastic(n, e, t, u, a) {
      var r = 1.70158,
        i = 0,
        s = u;
      if (0 == e) return t;
      if (1 == (e /= a)) return t + u;
      if (i || (i = .3 * a), s < Math.abs(u)) {
        s = u;
        r = i / 4;
      } else r = i / (2 * Math.PI) * Math.asin(u / s);
      return s * Math.pow(2, -10 * e) * Math.sin((e * a - r) * (2 * Math.PI) / i) + u + t;
    },
    easeInOutElastic: function easeInOutElastic(n, e, t, u, a) {
      var r = 1.70158,
        i = 0,
        s = u;
      if (0 == e) return t;
      if (2 == (e /= a / 2)) return t + u;
      if (i || (i = a * (.3 * 1.5)), s < Math.abs(u)) {
        s = u;
        r = i / 4;
      } else r = i / (2 * Math.PI) * Math.asin(u / s);
      return e < 1 ? s * Math.pow(2, 10 * (e -= 1)) * Math.sin((e * a - r) * (2 * Math.PI) / i) * -.5 + t : s * Math.pow(2, -10 * (e -= 1)) * Math.sin((e * a - r) * (2 * Math.PI) / i) * .5 + u + t;
    },
    easeInBack: function easeInBack(n, e, t, u, a, r) {
      return void 0 == r && (r = 1.70158), u * (e /= a) * e * ((r + 1) * e - r) + t;
    },
    easeOutBack: function easeOutBack(n, e, t, u, a, r) {
      return void 0 == r && (r = 1.70158), u * ((e = e / a - 1) * e * ((r + 1) * e + r) + 1) + t;
    },
    easeInOutBack: function easeInOutBack(n, e, t, u, a, r) {
      return void 0 == r && (r = 1.70158), (e /= a / 2) < 1 ? u / 2 * (e * e * ((1 + (r *= 1.525)) * e - r)) + t : u / 2 * ((e -= 2) * e * ((1 + (r *= 1.525)) * e + r) + 2) + t;
    },
    easeInBounce: function easeInBounce(n, e, t, u, a) {
      return u - jQuery.easing.easeOutBounce(n, a - e, 0, u, a) + t;
    },
    easeOutBounce: function easeOutBounce(n, e, t, u, a) {
      return (e /= a) < 1 / 2.75 ? u * (7.5625 * e * e) + t : e < 2 / 2.75 ? u * (7.5625 * (e -= 1.5 / 2.75) * e + .75) + t : e < 2.5 / 2.75 ? u * (7.5625 * (e -= 2.25 / 2.75) * e + .9375) + t : u * (7.5625 * (e -= 2.625 / 2.75) * e + .984375) + t;
    },
    easeInOutBounce: function easeInOutBounce(n, e, t, u, a) {
      return e < a / 2 ? .5 * jQuery.easing.easeInBounce(n, 2 * e, 0, u, a) + t : .5 * jQuery.easing.easeOutBounce(n, 2 * e - a, 0, u, a) + .5 * u + t;
    }
  });
})(window, jQuery);

/***/ }),

/***/ "./assets/common-sass/media-boxes/plugin/components/jQuery Visible/jquery.visible.min.js":
/*!***********************************************************************************************!*\
  !*** ./assets/common-sass/media-boxes/plugin/components/jQuery Visible/jquery.visible.min.js ***!
  \***********************************************************************************************/
/***/ (() => {

/**
     * Copyright 2012, Digital Fusion
     * Licensed under the MIT license.
     * http://teamdf.com/jquery-plugins/license/
     *
     * @author Sam Sehnert
     * @desc A small plugin that checks whether elements are within
     *       the user visible viewport of a web browser.
     *       only accounts for vertical position, not horizontal.
     */

!function (a) {
  "use strict";

  var b = a(window);
  a.fn.visible = function (c, d, e, f) {
    if (!(this.length < 1)) {
      e = e || "both";
      var g = this.length > 1 ? this.eq(0) : this,
        h = void 0 !== f && null !== f,
        i = h ? a(f) : b,
        j = h ? i.position() : 0,
        k = g.get(0),
        l = i.outerWidth(),
        m = i.outerHeight(),
        n = !0 !== d || k.offsetWidth * k.offsetHeight;
      if ("function" == typeof k.getBoundingClientRect) {
        var o = k.getBoundingClientRect(),
          p = h ? o.top - j.top >= 0 && o.top < m + j.top : o.top >= 0 && o.top < m,
          q = h ? o.bottom - j.top > 0 && o.bottom <= m + j.top : o.bottom > 0 && o.bottom <= m,
          r = h ? o.left - j.left >= 0 && o.left < l + j.left : o.left >= 0 && o.left < l,
          s = h ? o.right - j.left > 0 && o.right < l + j.left : o.right > 0 && o.right <= l,
          t = c ? p || q : p && q,
          u = c ? r || s : r && s,
          t = o.top < 0 && o.bottom > m || t,
          u = o.left < 0 && o.right > l || u;
        if ("both" === e) return n && t && u;
        if ("vertical" === e) return n && t;
        if ("horizontal" === e) return n && u;
      } else {
        var v = h ? 0 : j,
          w = v + m,
          x = i.scrollLeft(),
          y = x + l,
          z = g.position(),
          A = z.top,
          B = A + g.height(),
          C = z.left,
          D = C + g.width(),
          E = !0 === c ? B : A,
          F = !0 === c ? A : B,
          G = !0 === c ? D : C,
          H = !0 === c ? C : D;
        if ("both" === e) return !!n && F <= w && E >= v && H <= y && G >= x;
        if ("vertical" === e) return !!n && F <= w && E >= v;
        if ("horizontal" === e) return !!n && H <= y && G >= x;
      }
    }
  };
}(jQuery);

/***/ }),

/***/ "./assets/common-sass/media-boxes/plugin/js/jquery.mediaBoxes.dropdown.js":
/*!********************************************************************************!*\
  !*** ./assets/common-sass/media-boxes/plugin/js/jquery.mediaBoxes.dropdown.js ***!
  \********************************************************************************/
/***/ (() => {

(function (window, $, undefined) {
  "use strict";

  $(document).ready(function () {
    /* CHECK FOR MOBILE BROWSER */
    function isMobileBrowser() {
      var check = false;
      (function (a) {
        if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))) check = true;
      })(navigator.userAgent || navigator.vendor || window.opera);
      if (/android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/i.test(navigator.userAgent.toLowerCase())) {
        check = true;
      }
      return check;
    }
    function start($wrapper) {
      var $menu = $wrapper.find('.media-boxes-drop-down-menu');
      var $header = $wrapper.find('.media-boxes-drop-down-header');
      function mouseout() {
        $menu.hide();
      }
      ;
      function mouseover() {
        $menu.show();
      }
      ;
      function updateHeader() {
        var $selectedDefault = $menu.find('.selected');
        var $selected = $selectedDefault.length ? $selectedDefault.closest('li') : $menu.children().first();
        var $clone = $selected.clone().find('a').html();

        //$clone.removeAttr('data-sort-toggle').removeAttr('data-sort-by');
        $header.html($clone + '<span class="fa fa-sort-desc"></span>');
      }
      updateHeader();
      function click(e, currentItem) {
        e.preventDefault();
        //e.stopPropagation();

        currentItem.closest('li').siblings('li').find('a').removeClass('selected').end().end().find('a').addClass('selected');
        updateHeader();

        //mouseout();
      }

      if (isMobileBrowser() || $wrapper.attr('data-event') == 'click') {
        var clickToggle = function clickToggle(e) {
          e.stopPropagation();
          if ($menu.is(":visible")) {
            mouseout();
          } else {
            mouseover();
          }
        };
        $('body').on('click', function () {
          if ($menu.is(":visible")) {
            mouseout();
          }
        });
        $header.bind('click', clickToggle);
        $menu.on('click', 'li > *', function (e) {
          click(e, $(this));
        });
      } else {
        $header.bind('mouseout', mouseout).bind('mouseover', mouseover);
        $menu.bind('mouseout', mouseout).bind('mouseover', mouseover);
        $menu.on('click', 'li > *', function (e) {
          click(e, $(this));
        });
      }
      $header.on('click', 'a', function (e) {
        e.preventDefault();
      });
    }
    $('.media-boxes-drop-down').each(function () {
      start($(this));
    });
  });
})(window, jQuery);

/***/ }),

/***/ "./assets/common-sass/media-boxes/plugin/js/jquery.mediaBoxes.js":
/*!***********************************************************************!*\
  !*** ./assets/common-sass/media-boxes/plugin/js/jquery.mediaBoxes.js ***!
  \***********************************************************************/
/***/ (() => {

/* =======================================================
 *
 *      Media Boxes
 *      Version: 3.7.4
 *      By castlecode
 *
 *      Contact: http://codecanyon.net/user/castlecode
 *      Created: March 11, 2014
 *
 *      Copyright (c) 2013, castlecode. All rights reserved.
 *      Available only in http://codecanyon.net/
 *
 *      ---------------------------------
 *      CONTENTS
 *      ---------------------------------
 *
 *      [A] MEDIA BOXES CLASS
 *      [B] DEFAULTS
 *      [C] INIT
 *          [1] SETUP
 *          [2] GRID METHODS
 *          [3] EXTENDING ISOTOPE
 *          [4] FILTERING ISOTOPE
 *          [5] LOAD MORE BOXES
 *          [6] FILTER
 *          [7] SEARCH
 *          [8] SORTING
 *          [9] THUMBNAIL OVERLAY EFFECT
 *          [10] IFRAME ON GRID
 *          [11] INIT POPUP
 *          [12] FANCYBOX
 *          [13] MAGNIFIC POPUP
 *          [14] DEEP LINKING
 *          [15] SOCIAL IN MAGNIFIC POPUP
 *      [D] DESTROY
 *      [E] INSERT
 *      [F] INSERT IN FLOW
 *      [G] REFRESH
 *      [H] RESIZE
 *      [I] MEDIA BOXES PLUGIN
 *
 * ======================================================= */

(function (window, $, undefined) {
  "use strict";

  /* ====================================================================== *
          [A] MEDIA BOXES CLASS
   * ====================================================================== */
  var MediaBoxes = function MediaBoxes(container, options) {
    this.init(container, options);
  };

  /* ====================================================================== *
          [B] DEFAULTS
   * ====================================================================== */

  MediaBoxes.DEFAULTS = {
    boxesToLoadStart: 8,
    boxesToLoad: 4,
    minBoxesPerFilter: 0,
    lazyLoad: true,
    horizontalSpaceBetweenBoxes: 15,
    verticalSpaceBetweenBoxes: 15,
    columnWidth: 'auto',
    columns: 4,
    resolutions: [{
      maxWidth: 960,
      columnWidth: 'auto',
      columns: 3
    }, {
      maxWidth: 650,
      columnWidth: 'auto',
      columns: 2,
      horizontalSpaceBetweenBoxes: 10,
      verticalSpaceBetweenBoxes: 10
    }, {
      maxWidth: 450,
      columnWidth: 'auto',
      columns: 1,
      horizontalSpaceBetweenBoxes: 10,
      verticalSpaceBetweenBoxes: 10
    }],
    multipleFilterLogic: 'AND',
    filterContainer: '#filter',
    search: '',
    // i.e. #search
    searchTarget: '.media-box-title',
    sortContainer: '',
    // i.e. #sort
    getSortData: {
      title: '.media-box-title',
      text: '.media-box-text'
    },
    waitUntilThumbWithRatioLoads: true,
    // When they have dimensions specified
    waitForAllThumbsNoMatterWhat: false,
    // Wait for all the thumbnails to load even if they got dimensions specified
    noEmptySpaceOnThumbWithRatio: true,
    // Make thumbnail automatically adapt to the 100% of its container (so no black space)
    thumbnailOverlay: true,
    //Show the overlay on mouse over
    overlayEffect: 'fade',
    // 'push-up', 'push-down', 'push-up-100%', 'push-down-100%', 'reveal-top', 'reveal-bottom', 'reveal-top-100%', 'reveal-bottom-100%', 'direction-aware', 'direction-aware-fade', 'direction-right', 'direction-left', 'direction-top', 'direction-bottom', 'fade'
    overlaySpeed: 200,
    overlayEasing: 'default',
    showOnlyVisibleBoxesInPopup: false,
    considerFilteringInPopup: true,
    deepLinkingOnPopup: true,
    deepLinkingOnFilter: true,
    deepLinkingOnSearch: false,
    LoadingWord: 'Cargando...',
    loadMoreWord: 'Cargando más',
    noMoreEntriesWord: 'No más entradas',
    percentage: false,
    popup: 'fancybox',
    // fancybox, magnificpopup, none
    magnificpopup: {
      gallery: true,
      alignTop: false,
      preload: [0, 2]
    },
    fancybox: {
      loop: false,
      // Enable infinite gallery navigation
      margin: [44, 0],
      // Space around image, ignored if zoomed-in or viewport smaller than 800px
      keyboard: true,
      // Enable keyboard navigation
      arrows: true,
      // Should display navigation arrows at the screen edges
      infobar: false,
      // Should display infobar (counter and arrows at the top)
      toolbar: true,
      // Should display toolbar (buttons at the top)
      buttons: [
      // What buttons should appear in the top right corner.
      'slideShow', 'fullScreen', 'thumbs', 'close'],
      idleTime: 999999999,
      // Detect "idle" time in seconds
      protect: false,
      // Disable right-click and use simple image protection for images
      animationEffect: 'zoom',
      // Open/close animation type, it could be: false, 'zoom', 'fade', 'zoom-in-out'
      animationDuration: 330,
      // Duration in ms for open/close animation
      transitionEffect: 'fade',
      // ransition effect between slides, it could be: false, 'fade', 'slide', 'circular', 'tube', 'zoom-in-out', 'rotate'
      transitionDuration: 330,
      // Duration in ms for transition animation
      slideShow: {
        autoStart: false,
        speed: 4000
      },
      // slideshow settings
      fullScreen: {
        autoStart: false
      },
      // activate or deactivate fullscreen when open
      thumbs: {
        autoStart: false,
        hideOnClose: true
      },
      // Display thumbnails on opening/closing
      touch: {
        vertical: true,
        momentum: true
      },
      // Allow to drag content
      compensateScrollbar: '.fancybox-compensate-for-scrollbar'
    },
    animation_on_thumbnail_overlay_hover: [
      // { item : '.fa', animation : 'zoom-out' } // zoom-out, zoom-in, from-top, from-bottom, from-left, from-right
    ],
    //some sharing hidden options (for magnific popup only) :D
    /*
    facebook                        : true,
    twitter                         : true,
    googleplus                      : true,
    pinterest                       : true,
    */

    /* Events */
    onLayoutFinish: function onLayoutFinish() {},
    onPopupStart: function onPopupStart() {},
    onPopupClose: function onPopupClose() {}
  };

  /* ====================================================================== *
          [C] INIT
   * ====================================================================== */

  MediaBoxes.prototype.init = function (container, options) {
    /* ====================================================================== *
            [1] SETUP
     * ====================================================================== */

    /* SETTINGS */
    var settings = $.extend(true, {}, MediaBoxes.DEFAULTS, options);
    if (options != undefined && options.resolutions != undefined) {
      // the extend propety do not replace arrays it merges them
      settings.resolutions = options.resolutions;
    }

    /* VARS */
    var $container = $(container).addClass('media-boxes-container');
    var itemSelector = '.media-box';
    var boxImageSelector = '.media-box-image';
    var itemClass = 'media-box'; /* same as itemSelector but without the '.' */
    var itemHiddenClass = 'media-box-hidden';
    var animation = Modernizr.csstransitions ? 'transition' : 'animate'; /* CSS3 transition or jQuery animate depending on the browser support */
    var filters = {};
    var loadingsCounter = 0; /* When there's more than one loading at the same time */
    var filtersContainers = $(settings.filterContainer);
    if (settings.overlayEasing == 'default') {
      settings.overlayEasing = animation == 'transition' ? '_default' : 'swing'; /* 'default' is for CSS3 and 'swing' for jQuery animate */
    }

    /* SET GLOBAL VARS, USED FOR "OUTSIDE" METHODS */
    this.container = $container;
    this.container_clone = $container.clone().removeClass('media-boxes-container');

    /* Load more button */
    var loadMoreButton = $('<div class="media-boxes-load-more media-boxes-load-more-button"></div>').insertAfter($container);

    /* Sort the resolutions from lower to higher */
    settings.resolutions.sort(function (a, b) {
      return a.maxWidth - b.maxWidth;
    });

    /* Save the settings in the container */
    $container.data('settings', settings);

    /* Fix the margins for the container (for horizontal and vertical space)  */
    //$container.css('margin-left', -settings.horizontalSpaceBetweenBoxes);

    /* Hide all boxes */
    $container.find(itemSelector).removeClass(itemClass).addClass(itemHiddenClass);

    /* default sort selected */
    var defSortElem = $(settings.sortContainer).find('*[data-sort-by]').filter('.selected');
    var defSort = defSortElem.attr('data-sort-by');
    var defAsc = getSortDirection(defSortElem);

    /* Add the sizer for defining the width of isotope */
    $container.append('<div class="media-boxes-grid-sizer"></div>');

    /* Initialize isotope plugin */
    $container.isotopeMB({
      itemSelector: itemSelector,
      transitionDuration: '0.5s',
      hiddenStyle: {
        opacity: 0,
        transform: 'scale(0.7)'
      },
      visibleStyle: {
        opacity: 1,
        transform: 'scale(1)'
      },
      masonry: {
        columnWidth: '.media-boxes-grid-sizer'
      },
      getSortData: settings.getSortData,
      sortBy: defSort,
      sortAscending: defAsc
    });

    /* If the filter item is hidden AND if its was marked as "selected by default" then fallback to "all" */
    filtersContainers.find('[data-filter]').addBack('[data-filter]').each(function () {
      var $this = $(this);
      if ($this.attr('data-visible-only-if') != undefined) {
        // if the filter item visibility is based on another item
        var $visible = $($this.attr('data-visible-only-if'));

        // if it is a checkbox
        if ($visible.is(':checkbox')) {
          if ($visible.is(':checked') == false) {
            // If the element is unchecked, then uncheck the item
            $this.prop('checked', false);
          }
        }

        // if it is a dropdown or inline
        if (!$visible.is(':checkbox') && !$visible.is('select')) {
          if ($visible.hasClass('selected') == false) {
            // if the element is not selected, then unselect the item (and select the "all" item)
            $this.removeClass('selected');
            $this.parents(settings.filterContainer).find('[data-filter="*"]').addClass('selected');
          }
        }
      }
    });

    /* default filters */
    filtersContainers.each(function () {
      /* current items */
      var current_filterContainer = $(this);
      var filterValue = '';

      /* if its a checkbox */
      if (current_filterContainer.is(':checkbox')) {
        filterValue = current_filterContainer.is(':checked') ? current_filterContainer.attr('data-filter') : '*';
      } else {
        var current_filter = current_filterContainer.find('*[data-filter]').filter('.selected');
        filterValue = current_filter[0] !== undefined ? current_filter.attr('data-filter') : '*';
      }
      show_hide_filters();

      /* Filter isotope */
      var filterGroup = current_filterContainer.data("id") != undefined ? current_filterContainer.data("id") : "filter"; // take the id of the filter container if exists, if not just a string
      filters[filterGroup] = filterValue;
      $container.isotopeMB({
        filter: combineFilters(filters)
      });
      updateFilterClasses();
    });

    /* ====================================================================== *
            [2] GRID METHODS
     * ====================================================================== */

    /* ****** Add div with margins (for horizontal and vertical space) ****** */
    function addWrapperForMargins(container) {
      /*var wrapper = $('<div class="media-box-container"></div').css({
                              'margin-left'       : container.data('settings').horizontalSpaceBetweenBoxes,
                              'margin-bottom'     : container.data('settings').verticalSpaceBetweenBoxes
                          });*/

      var wrapper = $('<div class="media-box-container"></div');
      container.find(itemSelector + ':not([data-wrapper-added])').attr('data-wrapper-added', 'yes').wrapInner(wrapper);
    }

    /* ****** FadeIn the thumbnail or show broken thumbnail only for the ones with ratio specified ****** */
    function fadeInOrBroken(container, imageObj) {
      var image = $(imageObj.img);
      var thumbnailDiv = image.parents('.image-with-dimensions');

      /* it has already been loaded or broken so skip it */

      if (image.hasClass('done')) {
        return;
      }
      image.addClass('done');

      /* if the media-box is fully scaled (100%) then no need for the delay, fadeIn right away */

      var delay = 200;
      var media_box = image.parents(itemSelector);
      var transform_matrix = media_box.css("-webkit-transform") || media_box.css("-moz-transform") || media_box.css("-ms-transform") || media_box.css("-o-transform") || media_box.css("transform");
      if (transform_matrix == 'none') {
        delay = 0;
      }

      /* Load or broken */

      //return; // HEREE

      setTimeout(function () {
        if (imageObj.isLoaded) {
          noEmptySpaceOnThumbnails(container);
          thumbnailDiv.find('.media-boxes-loading-animation').fadeOut(700);
          image.fadeIn(500, function () {
            /* This will only be trigger if you hide the image above (if the "waitUntilThumbWithRatioLoads" settings is true) */
            thumbnailDiv.removeClass('image-with-dimensions');
          });
        } else {
          thumbnailDiv.find('.media-boxes-loading-animation').fadeOut(500);
          thumbnailDiv.removeClass('image-with-dimensions');
          image.hide(); /* hide image since you are going to show a broken logo */
          thumbnailDiv.addClass('broken-image-here');
        }
      }, delay);
    }

    /* ****** No empty space on thumbnails (fill height or width) ****** */
    function noEmptySpaceOnThumbnails(container) {
      if (container.data('settings') && container.data('settings').noEmptySpaceOnThumbWithRatio) {
        container.find(itemSelector + ', .' + itemHiddenClass).each(function () {
          var $this = $(this);
          var thumbnailDiv = $this.find('div[data-width][data-height]');
          var image = thumbnailDiv.find('img');
          if (thumbnailDiv[0] != undefined) {
            var thumbnailDiv_ratio = parseFloat(thumbnailDiv.data('width')) / parseFloat(thumbnailDiv.data('height'));
            var image_ratio = parseFloat(image.width()) / parseFloat(image.height());

            //thumbnailDiv_ratio      = Math.floor(thumbnailDiv_ratio*100)/100;
            //image_ratio             = Math.floor(image_ratio*100)/100;

            thumbnailDiv_ratio = thumbnailDiv_ratio.toFixed(2);
            image_ratio = image_ratio.toFixed(2);
            if (thumbnailDiv_ratio < image_ratio) {
              thumbnailDiv.addClass('media-box-fill-height');
              //console.log(thumbnailDiv_ratio +" < "+ image_ratio);
            } else {
              thumbnailDiv.removeClass('media-box-fill-height');
            }
          }
        });
      }
    }

    /* ****** Load images with dimensions ****** */
    function loadImagesWithDimensions(container) {
      /* FadeIn thumbnails that have dimensions specified if you want to show them after they have been loaded */
      container.find('.image-with-dimensions').imagesLoadedMB().always(function (instance) {
        /* In case the progress event don't get to show the images (this happens sometimes when you refresh the page) */
        for (var index in instance.images) {
          var imageObj = instance.images[index];
          fadeInOrBroken(container, imageObj);
        }
      }).progress(function (instance, imageObj) {
        fadeInOrBroken(container, imageObj);
      });
    }

    /* ****** Convert the divs with the URL specified to real images ****** */
    function convertDivsIntoImages(container, imagesWithDimensions) {
      container.find(itemSelector).find(boxImageSelector + ':not([data-imageconverted])').each(function () {
        var boxImage = $(this);
        var thumbnailDiv = boxImage.find('div[data-thumbnail]').eq(0); /* only one thumb allowed */
        var thumbnailSrc = thumbnailDiv.attr('data-thumbnail');
        var thumbnailTitle = thumbnailDiv.attr('data-title') != undefined ? thumbnailDiv.attr('data-title') : "";
        var thumbnailAlt = thumbnailDiv.attr('data-alt') != undefined ? thumbnailDiv.attr('data-alt') : "";
        var gotDimensions = thumbnailDiv.attr('data-width') != undefined && thumbnailDiv.attr('data-height') != undefined;
        var waitForAll = container.data('settings').waitForAllThumbsNoMatterWhat;
        if (thumbnailSrc == 'none') {
          // if there's no URL then don't load an image
          return true; // same as "continue"
        }

        if (imagesWithDimensions == false && gotDimensions == true && waitForAll == false) {
          /* when the plugin wants the images WITHOUT dimensions, only ignore the images WITH dimensions if option "waitForAll..." is false */
          return;
        }
        var imgHTML = $('<img alt="' + thumbnailAlt + '" title="' + thumbnailTitle + '" src="' + thumbnailSrc + '" />');
        if (imagesWithDimensions == true) {
          /* If the dimensions are specified in the images then ignore them in the imagesLoaded plugin when you insert new items */
          imgHTML.attr('data-dont-wait-for-me', 'yes');
          thumbnailDiv.addClass('image-with-dimensions');
          thumbnailDiv.prepend('<div class="media-boxes-loading-animation"></div>');
          if (container.data('settings').waitUntilThumbWithRatioLoads) {
            imgHTML.hide();
          }
        }
        boxImage.attr('data-imageconverted', 'yes');
        thumbnailDiv.addClass('media-box-thumbnail-container').prepend(imgHTML);
      });
      loadImagesWithDimensions(container);
    }

    /* ****** Set the width and height for the media-box-image div, this is helpful for some overlay effects ****** */
    function setDimensionsToImageContainer(container) {
      container.find(itemSelector).find(boxImageSelector).each(function () {
        var boxImage = $(this);
        var box = boxImage.parents(itemSelector);
        var hiddenBox = box.css('display') == 'none';
        var thumbnailDiv = boxImage.find('div[data-thumbnail]').eq(0); // only one thumb allowed

        if (thumbnailDiv[0] != undefined) {
          // if you haven't specified a thumbnail then ignore
          if (hiddenBox) {
            // If it is hidden, display 'none' wont give you the right height so you need to do this trick
            box.css('margin-top', 99999999999999).show();
          }
          boxImage.width(thumbnailDiv[0].offsetWidth); // now using offsetWidth, since jQuery3.width() changed to getBoundingClientRect()
          boxImage.height(thumbnailDiv[0].offsetHeight);
          if (hiddenBox) {
            box.css('margin-top', 0).hide();
          }
        }
      });
    }

    /* ****** Calculate the right dimensions for the thumbnails ****** */
    function setStaticDimensionsOfThumbnails(container) {
      container.find(itemSelector).find(boxImageSelector).each(function () {
        var boxImage = $(this);
        var box = boxImage.parents(itemSelector);
        var hiddenBox = box.css('display') == 'none';
        var thumbnailDiv = boxImage.find('div[data-thumbnail]').eq(0); /* only one thumb allowed */
        var gotDimensions = thumbnailDiv.attr('data-width') != undefined && thumbnailDiv.attr('data-height') != undefined;
        var imgWidth = parseFloat(thumbnailDiv.data('width'));
        var imgHeight = parseFloat(thumbnailDiv.data('height'));
        if (hiddenBox) {
          // If it is hidden, display 'none' wont give you the right height so you need to do this trick
          box.css('margin-top', 99999999999999).show();
        }
        var newWidth = box[0].offsetWidth - container.data('current_horizontalSpaceBetweenBoxes'); // now using offsetWidth, since jQuery3.width() changed to getBoundingClientRect()
        var newHeight = imgHeight * newWidth / imgWidth;
        if (hiddenBox) {
          box.css('margin-top', 0).hide();
        }
        thumbnailDiv.css('width', newWidth);

        /* Set the height only to those thumbs with width and height specified */
        if (gotDimensions) {
          if (box.attr('data-current-columns') > 1 && box.attr('data-extra-height')) {
            newHeight = newHeight + parseFloat(box.attr('data-extra-height'));
          }
          thumbnailDiv.css('height', Math.floor(newHeight));
        }
      });
    }

    /* ****** Set the width of the columns according to the settings specified ****** */
    function setColumnWidth(container, columnWidth, columns) {
      var newWidth = 0;
      var percentage = container.data('settings').percentage;
      var symbol = '';
      if (columnWidth == 'auto') {
        if (percentage) {
          newWidth = 100 / columns;
          symbol = '%';
        } else {
          newWidth = Math.floor(Math.floor(container.width()) / columns); // minus 1px because some resolutions don't fit perfectly
        }
      } else {
        newWidth = columnWidth;
      }

      /* the width that the isotope logic will use for each column of the grid */
      container.find('.media-boxes-grid-sizer').css('width', newWidth + symbol);
      container.find(itemSelector).each(function (index) {
        var box = $(this);
        var boxColumns = box.data('columns');

        /* if the box has columns asigned, check that it doesn't have more than the number of columns in the grid */
        if (boxColumns != undefined && parseInt(boxColumns) > parseInt(columns)) {
          boxColumns = columns;
        }

        /* for columns that don't have data-columns specified */
        if (boxColumns == undefined) {
          boxColumns = 1;
        }

        /* number of columns for this item */
        box.attr('data-current-columns', boxColumns);

        /* Adjust the width */
        box.css('width', parseFloat(newWidth) * parseInt(boxColumns) + symbol);
      });
    }

    /* ****** Get viewport dimensions ****** */
    function viewport() {
      var e = window,
        a = 'inner';
      if (!('innerWidth' in window)) {
        a = 'client';
        e = document.documentElement || document.body;
      }
      return {
        width: e[a + 'Width'],
        height: e[a + 'Height']
      };
    }

    /* ****** Set new horizontal and vertical space between boxes ****** */
    function setSpaceBetweenBoxes(container, horizontal, vertical) {
      container.data('current_horizontalSpaceBetweenBoxes', horizontal);
      container.data('current_verticalSpaceBetweenBoxes', vertical);
      container.css('margin-left', -horizontal);
      /*container.find('.media-box-container').css({
                              'margin-left'       : horizontal,
                              'margin-bottom'     : vertical
                          });*/
      container.find('.media-box-container').each(function () {
        this.style.setProperty('margin-left', horizontal + "px", 'important');
        this.style.setProperty('margin-bottom', vertical + "px", 'important');
      });
    }

    /* ****** Get and set the correct columnWidth for the current resolution ****** */
    function getAndSetColumnWidth(container) {
      var resolutionFound = false;
      for (var key in container.data('settings').resolutions) {
        var value = container.data('settings').resolutions[key];
        if (value.maxWidth >= viewport().width) {
          if (value.horizontalSpaceBetweenBoxes != undefined && value.verticalSpaceBetweenBoxes != undefined) {
            setSpaceBetweenBoxes(container, value.horizontalSpaceBetweenBoxes, value.verticalSpaceBetweenBoxes);
          } else {
            setSpaceBetweenBoxes(container, container.data('settings').horizontalSpaceBetweenBoxes, container.data('settings').verticalSpaceBetweenBoxes);
          }
          setColumnWidth(container, value.columnWidth, value.columns);
          resolutionFound = true;
          break;
        }
      }

      /* If there wasn't a match then use the default one */
      if (resolutionFound == false) {
        setSpaceBetweenBoxes(container, container.data('settings').horizontalSpaceBetweenBoxes, container.data('settings').verticalSpaceBetweenBoxes);
        setColumnWidth(container, container.data('settings').columnWidth, container.data('settings').columns);
      }
    }

    /* ****** Hide overlays when resizing ****** */
    function hideOverlaysOnResize(container) {
      var boxes = container.find(itemSelector);
      boxes.each(function () {
        var box = $(this);
        var boxImage = box.find(boxImageSelector);
        var effect = container.data('settings').overlayEffect;
        if (effect.indexOf('100') >= 0 && effect.indexOf('100%') == -1) {
          // if its missing the % sign at the end then just add it
          effect = effect.split('100').join('100%');
        }
        if (effect.substr(0, 9) == 'direction') {
          boxImage.find('.thumbnail-overlay').hide();
        }
      });

      /* reload isotope for the new width */
      container.isotopeMB('layout');
    }

    /* ====================================================================== *
            [3] EXTENDING ISOTOPE
     * ====================================================================== */

    /* ****** Extending Isotope on resize event ****** */
    $.extend(IsotopeMB.prototype, {
      resize: function resize() {
        /* Hack for seting the grid */
        var container = $(this.element);
        getAndSetColumnWidth(container);
        setStaticDimensionsOfThumbnails(container);
        setDimensionsToImageContainer(container);
        hideOverlaysOnResize(container);
        /* End hack */

        // don't trigger if size did not change
        // or if resize was unbound. See #9
        if (!this.isResizeBound || !this.needsResizeLayout()) {
          return;
        }
        this.layout();
      }
    });

    /* ****** Extending Isotope so when it does set the container width the plugin can refresh the lazy load feature ****** */
    $.extend(IsotopeMB.prototype, {
      _setContainerMeasure: function _setContainerMeasure(measure, isWidth) {
        if (measure === undefined) {
          return;
        }
        var elemSize = this.size;
        // add padding and border width if border box
        if (elemSize.isBorderBox) {
          measure += isWidth ? elemSize.paddingLeft + elemSize.paddingRight + elemSize.borderLeftWidth + elemSize.borderRightWidth : elemSize.paddingBottom + elemSize.paddingTop + elemSize.borderTopWidth + elemSize.borderBottomWidth;
        }
        measure = Math.max(measure, 0);
        this.element.style[isWidth ? 'width' : 'height'] = measure + 'px';

        /* Hack to refresh the lazy load */
        var container = $(this.element);
        setTimeout(function () {
          container.addClass('lazy-load-ready');
        }, 10); // delay 10 ms
        /* End hack */

        /* Remove this class since the grid has been resized due to the filtering system */
        container.removeClass('filtering-isotope');
        /* End Remove this class */
      }
    });

    /* ****** Extending Isotope so when you insert items they got the right settings (like columnWidth, staticDimensions, convertDivsIntoImages, etc.) ****** */
    $.extend(IsotopeMB.prototype, {
      insert: function insert(elems, callback) {
        var container = $(this.element);
        if (!container.hasClass('first_time')) {
          container.addClass('first_time');
          this._isLayoutInited = false; // if a filter othan than all is selected, this will remove an "effect" of hidding boxes that doesn't belong to the current filter, only the first time it loads
        }

        /* Make sure the new boxes got all the sorting targets, this must be before the items are passed to isotope */
        container.find(itemSelector).each(function () {
          var mb = $(this);
          for (var key in container.data('settings').getSortData) {
            var obj = container.data('settings').getSortData[key];
            if (typeof obj === 'string' && mb.find(obj)[0] == undefined) {
              mb.append($('<div class="' + obj.substring(1) + '" style="display:none !important;" data-comment="This is added in JS because it needs it for sorting">ZZ</div>'));
            }
          }
        });
        var items = this.addItems(elems);
        if (!items.length) {
          /* Callback for inserting items, I added this 3 lines */
          if (typeof callback === 'function') {
            callback();
          }
          return;
        }

        // append item elements
        var i,
          item,
          firstHiddenBox = container.find('.' + itemHiddenClass)[0];
        var len = items.length;
        for (i = 0; i < len; i++) {
          item = items[i];
          if (firstHiddenBox != undefined) {
            this.element.insertBefore(item.element, firstHiddenBox);
          } else {
            this.element.appendChild(item.element);
          }
        }
        var isotopeDefaultLogic = function isotopeDefaultLogic() {
          // filter new stuff
          var filteredInsertItems = this._filter(items).matches;
          // hide all newitems
          this._noTransition(function () {
            this.hide(filteredInsertItems);
          });
          // set flag
          for (i = 0; i < len; i++) {
            items[i].isLayoutInstant = true;
          }
          this.arrange();
          // reset flag
          for (i = 0; i < len; i++) {
            delete items[i].isLayoutInstant;
          }
          this.reveal(filteredInsertItems);
        };

        /* ======== Hack when inserting new boxes so they are properly converted ======== */
        var checkForBrokenImages = function checkForBrokenImages(image) {
          var $image = $(image.img);
          var thumbnailDiv = $image.parents('div[data-thumbnail], div[data-popup]');
          if (image.isLoaded == false) {
            $image.hide();
            thumbnailDiv.addClass('broken-image-here');
          }
        };
        var instance = this;
        addPopupTrigger(container); /* Add popup trigger */
        addWrapperForMargins(container); /* Set the vertical and horizontal space between boxes */
        getAndSetColumnWidth(container); /* Set the column width */
        setStaticDimensionsOfThumbnails(container); /* Set the static ratio to the thumbnailDiv */
        convertDivsIntoImages(container, false); /* Only the ones that have NO width and height */

        container.find('img:not([data-dont-wait-for-me])').imagesLoadedMB().always(function () {
          if (container.data('settings').waitForAllThumbsNoMatterWhat == false) {
            convertDivsIntoImages(container, true); /* the ones left that have width and height */
          } else {
            setTimeout(function () {
              noEmptySpaceOnThumbnails(container);
            }, 0);
          }
          container.find(itemSelector).addClass('media-box-loaded'); /* Add the class to show the box */
          $(container.data('settings').search).trigger('keyup'); /* Show or hide according to the searching criteria */
          isotopeDefaultLogic.call(instance); /* Now you can call the default logic of the insert method from Isotope */
          setDimensionsToImageContainer(container); /* Set the same dimensions of the thumbnail to the container (for caption purposes) */
          setupOverlayForHoverEffect(container); /* Get ready for the overlay effect */

          /* Callback for inserting items */
          if (typeof callback === 'function') {
            callback();
            setTimeout(function () {
              container.data('settings').onLayoutFinish();
            }, 501);
          }

          /* In case the progress event don't get to check for broken images (this happens sometimes when you refresh the page) */
          for (index in instance.images) {
            var image = instance.images[index];
            checkForBrokenImages(image);
          }
        }).progress(function (instance, image) {
          /* For broken images */
          checkForBrokenImages(image);
        });

        /* ======== End Hack ======== */
      }
    });

    /* ====================================================================== *
            [4] FILTERING ISOTOPE
     * ====================================================================== */

    function updateFilterClasses() {
      var boxes = $container.find(itemSelector + ', .' + itemHiddenClass);
      var filter = getCurrentFilter();
      boxes.filter(filter).removeClass('hidden-media-boxes-by-filter').addClass('visible-media-boxes-by-filter');
      boxes.not(filter).addClass('hidden-media-boxes-by-filter').removeClass('visible-media-boxes-by-filter');
    }
    function filterTheBoxes(filterValue, filterGroup) {
      /* Add a class until it resizes the grid */
      $container.addClass('filtering-isotope');

      // Combined the filters and filter isotope
      goAndFilterIsotope(filterValue, filterGroup);

      // update some CSS classes
      updateFilterClasses();

      // Fix some details, like the loading button, the minBoxesPerFilter
      seeItFiltered();
    }
    function seeItFiltered() {
      // fix load more button
      if (getLoadingBoxesInCurrentFilter().length > 0) {
        loading();
      } else {
        fixLoadMoreButton();
      }

      // load more boxes if neccessary
      checkMinBoxesPerFilter();
    }
    function goAndFilterIsotope(filterValue, filterGroup) {
      // set filter for group
      filters[filterGroup] = filterValue;

      // set filters for Isotope
      $container.isotopeMB({
        filter: combineFilters(filters)
      });
    }
    function combineFilters(filters) {
      var output = [];
      for (var prop in filters) {
        var selector = filters[prop];
        var selector_clean = selector.split(" ").join(""); // Remove empty spaces, so if we have this: .red, .blue it should be: .red,.blue
        var selector_split = selector_clean.split(",");

        /* ###### AND ###### */
        if (settings.multipleFilterLogic == 'AND') {
          if (selector_clean != '*') {
            if (output.length == 0) {
              output = selector_split;
            } else {
              output = allPossibleCases([output, selector_split]);
            }
          }
        }

        /* ###### OR ###### */else if (settings.multipleFilterLogic == 'OR') {
          if (selector_clean != '*' && selector_clean != '.search-match') {
            if ('search' in filters) {
              // if the search filter is enable, then combine it with the current selector
              var mixed = allPossibleCases([['.search-match'], selector_split]);
              output.push(mixed.join(','));
            } else {
              output.push(selector_split.join(','));
            }
          }
        }
      }
      var combined = output.length > 0 ? output.join(',') : '*'; // if output is empty, is probably because all filters were '*'

      /* [start] when using OR if all filters where set to ALL and you type something in the search field, it was NOT filtering anything */
      if (combined == '*' && settings.multipleFilterLogic == 'OR') {
        // if the logic is OR and all filters were '*'
        if ('search' in filters) {
          // if the search filter is enable, then only filter by the "search-filter"
          combined = '.search-match';
        }
      }
      /* [end] when using OR if all filters where set to ALL and you type something in the search field, it was NOT filtering anything */

      return combined;
    }
    function allPossibleCases(arr) {
      if (arr.length == 1) {
        return arr[0];
      } else {
        var result = [];
        var allCasesOfRest = allPossibleCases(arr.slice(1)); // recur with the rest of array
        for (var i = 0; i < allCasesOfRest.length; i++) {
          for (var j = 0; j < arr[0].length; j++) {
            result.push(arr[0][j] + allCasesOfRest[i]);
          }
        }
        return result;
      }
    }

    /* ====================================================================== *
            [5] LOAD MORE BOXES
     * ====================================================================== */

    function checkMinBoxesPerFilter() {
      var filter = getCurrentFilter();
      var in_all = false;
      if (filter == '*' || filter == '.search-match' && $(settings.search).val() == '') {
        in_all = true;
      }
      if (in_all == false) {
        //only execute the minBoxesPerFilter when is not showing all the boxes

        var boxesInCurrentCategory = getBoxesInCurrentFilter().length;

        /* Also check if there's boxes waiting to get load from that category, because maybe there isn't and there's no case to try to load them */
        if (boxesInCurrentCategory < settings.minBoxesPerFilter && hiddenBoxesWaitingToLoad().length > 0) {
          /* Load the boxes that are missing */
          loadMore(settings.minBoxesPerFilter - boxesInCurrentCategory);
          return true;
        }
      }
      return false;
    }
    function getBoxesInCurrentFilter() {
      var boxes = $container.find(itemSelector);
      var filter = getCurrentFilter();
      if (filter != '*') {
        boxes = boxes.filter(filter);
      }
      return boxes;
    }
    function getLoadingBoxesInCurrentFilter() {
      var boxes = getBoxesInCurrentFilter().not('.media-box-loaded');
      return boxes;
    }
    function getCurrentFilter() {
      var filter = $container.data('isotopeMB').options.filter;
      if (filter == '' || filter == undefined) {
        filter = '*';
      }
      return filter;
    }
    function hiddenBoxesWaitingToLoad(ignoreFilter) {
      /* Number of hidden boxes waiting to get load, depending on the filter */
      var boxes = $container.find('.' + itemHiddenClass);
      var filter = getCurrentFilter();
      if (filter != '*' && ignoreFilter == undefined) {
        boxes = boxes.filter(filter);
      }
      return boxes;
    }
    function loading() {
      loadMoreButton.html(settings.LoadingWord);
      loadMoreButton.removeClass('media-boxes-load-more');
      loadMoreButton.addClass('media-boxes-loading');
    }
    function startLoading() {
      loadingsCounter++;
      loading();
    }
    function finishLoading() {
      loadingsCounter--;
      if (loadingsCounter == 0) {
        fixLoadMoreButton();
      }
    }
    function fixLoadMoreButton() {
      loadMoreButton.removeClass('media-boxes-load-more');
      loadMoreButton.removeClass('media-boxes-loading');
      loadMoreButton.removeClass('media-boxes-no-more-entries');
      if (hiddenBoxesWaitingToLoad().length > 0) {
        loadMoreButton.html(settings.loadMoreWord);
        loadMoreButton.addClass('media-boxes-load-more');
      } else {
        loadMoreButton.html(settings.noMoreEntriesWord);
        loadMoreButton.addClass('media-boxes-no-more-entries');
      }
    }
    function loadMore(boxesToLoad, ignoreFilter) {
      if (loadMoreButton.hasClass('media-boxes-no-more-entries') == true) {
        /* Only if it is the "load more" button or the "loading...", no the "no more entries" button */
        return;
      }

      /* Loading... */
      startLoading();

      /* The new boxes */
      var newBoxes = [];

      /* Boxes that will be loaded as part of isotope */
      hiddenBoxesWaitingToLoad(ignoreFilter).each(function (index) {
        var $this = $(this);
        if (index + 1 <= boxesToLoad) {
          $this.removeClass(itemHiddenClass).addClass(itemClass);
          $this.hide();
          newBoxes.push(this);
        }
      });
      $container.isotopeMB('insert', $(newBoxes), function () {
        /* Fix Load More Button */
        finishLoading();

        /* Force a relayout of Isotope */
        $container.isotopeMB('layout');
      });
    }
    loadMore(settings.boxesToLoadStart, true);
    checkMinBoxesPerFilter();

    /* Load more boxes when you click the button */
    loadMoreButton.on('click', function () {
      loadMore(settings.boxesToLoad);
    });
    function loadMoreIfButtonIsVisible() {
      if (loadMoreButton.filter(':visible')[0] !== undefined && loadMoreButton.filter(':visible').visible(true)) {
        if ($container.hasClass('lazy-load-ready')) {
          if ($container.hasClass('filtering-isotope') == false) {
            $container.removeClass('lazy-load-ready');
            loadMore(settings.boxesToLoad);
          }
        }
      }
    }
    if (settings.lazyLoad) {
      $(window).scroll(function () {
        loadMoreIfButtonIsVisible();
      });
    }

    /* ====================================================================== *
            [6] FILTER
     * ====================================================================== */

    /* DEFAULT FILTERS SELECTED (SAVE ORIGINAL SELECTED FILTER) */

    filtersContainers.each(function () {
      var $this = $(this);
      if ($this.is(':checkbox')) {
        $this.attr('default-value', $this.is(':checked') ? $this.attr('data-filter') : '*'); // set default value
      } else {
        $this.attr('default-value', $this.find('*[data-filter]').filter('.selected').attr('data-filter')); // set default value
      }
    });

    /* INIT DEFAULT FILTERING */

    setTimeout(function () {

      // filtersContainers.each(function(){
      //     /* current items */
      //     var current_filterContainer = $(this);
      //     var filterValue             = '';

      //     /* if its a checkbox */
      //     if(current_filterContainer.is(':checkbox')){
      //         filterValue         = current_filterContainer.is(':checked') ? current_filterContainer.attr('data-filter') : '*';
      //     }else{
      //         var current_filter  = current_filterContainer.find('*[data-filter]').filter('.selected');
      //         filterValue         = current_filter[0] !== undefined ? current_filter.attr('data-filter') : '*';
      //     }

      //     /* initialize the filtering */
      //     init_filtering(filterValue, current_filterContainer, 'default');
      // });
    }, 1); // this to fixes the following: when a selected filter is other than all when the page loads, the thumbnail-overlay of the first item in the grid was not working correctly, because some hidden boxes were on top of it, as if they were not fully hidden

    /* EVENT IF THE FILTER IS A SELECT */

    filtersContainers.on('change', function () {
      if ($(this).is('select')) {
        // check if its a select element
        /* current items */
        var current_filterContainer = $(this);

        /* initialize the filtering */
        init_filtering(current_filterContainer.val(), current_filterContainer);
      }
    });

    /* EVENT FOR WHEN CLICKING A FILTER NAVIGATION BAR OR A DROPDOWN MENU */

    filtersContainers.on('click', '*[data-filter]', function (e) {
      if (!$(this).is('option') && !$(this).is(':checkbox')) {
        // check if its not an option from a select element or if its not a checkbox
        /* current items */
        var current_filter = $(this);
        var current_filterContainer = $(this).parents(settings.filterContainer);

        /* Remove selected class from others and add selected to current */
        current_filterContainer.find('*[data-filter]').removeClass('selected');
        current_filter.addClass('selected');

        /* initialize the filtering */
        init_filtering(current_filter.attr('data-filter'), current_filterContainer);
        e.preventDefault();
      }
    });

    /* EVENT FOR WHEN CLICKING A CHECKBOX */

    $('body').on('change', settings.filterContainer, function () {
      if ($(this).is(':checkbox')) {
        /* current items */
        var current_filterContainer = $(this);

        /* initialize the filtering */
        init_filtering(current_filterContainer.is(':checked') ? current_filterContainer.attr('data-filter') : '*', current_filterContainer);
      }
    });

    /* FILTERING */

    function init_filtering(filterValue, current_filterContainer) {
      show_hide_filters();

      /* Filter isotope */
      var filterGroup = current_filterContainer.data("id") != undefined ? current_filterContainer.data("id") : "filter"; // take the id of the filter container if exists, if not just a string
      var is_default = current_filterContainer.attr('default-value') == filterValue;

      /* Hash on filter change (this is not executed when the plugin first load with a default filter) */
      set_hash_on_filter_change(filterValue, filterGroup, is_default);

      /* Filter the boxes */
      filterTheBoxes(filterValue, filterGroup);
    }

    /* SHOW-HIDE FILTERS (WHEN THE VISIBILITY OF A FILTER DEPENDS ON ANOTHER) */

    function show_hide_filters() {
      filtersContainers.find('[data-filter]').addBack('[data-filter]').each(function () {
        var $this = $(this);
        if ($this.attr('data-visible-only-if') != undefined) {
          var $visible = $($this.attr('data-visible-only-if'));

          // If its a checkbox
          if ($visible.is(':checkbox')) {
            if ($visible.is(':checked')) {
              // show item
              $this.removeClass('visibility_hidden');
              $this.parents('.media-boxes-checkboxes-label').show();
            } else {
              // hide item
              $this.addClass('visibility_hidden');
              $this.parents('.media-boxes-checkboxes-label').hide();
              if ($this.is(':checked')) {
                // if when hidding, the checkbox was "checked" then go back to "all"
                setTimeout(function () {
                  $this.prop('checked', false).trigger('change'); // uncheck if its checked
                }, 1);
              }
            }
          }

          // If its a dropdown or inline
          if (!$visible.is(':checkbox') && !$visible.is('select')) {
            if ($visible.hasClass('selected')) {
              // show item
              $this.show().removeClass('visibility_hidden');
            } else {
              // hide item
              $this.hide().addClass('visibility_hidden');
              if ($this.hasClass('selected')) {
                // if when hidding, the item was "selected" then go back to all
                $this.parents(settings.filterContainer).find('[data-filter="*"]').trigger('click');
              }
            }
          }
        }
      });
      show_hide_filter_container();
    }
    function show_hide_filter_container() {
      $('.media-boxes-drop-down, .media-boxes-filter, .media-boxes-checkboxes').each(function () {
        var $this = $(this);
        var items = $this.find('[data-filter]').not('.visibility_hidden');
        if ($this.find('[data-filter]')[0] == undefined) return; // only do this if there are filters

        if (!$this.hasClass('media-boxes-checkboxes')) {
          items = items.not('[data-filter="*"]');
        }
        if (items.length <= 0) {
          $this.hide();
        } else {
          $this.show();
        }
      });
    }

    /* ====================================================================== *
            [7] SEARCH
     * ====================================================================== */

    function search(value) {
      if (value == undefined) return;
      var allBoxes = $container.find('.' + itemClass + ', .' + itemHiddenClass);
      if (value == '') {
        /* If there's nothing in the input text field then show all the boxes */
        allBoxes.addClass('search-match');
      } else {
        allBoxes.removeClass('search-match');
        $container.find(settings.searchTarget).each(function () {
          var $this = $(this);
          var box = $this.parents('.' + itemClass + ', .' + itemHiddenClass);
          if ($this.text().toLowerCase().indexOf(value.toLowerCase()) !== -1) {
            box.addClass('search-match');
          }
        });
      }
      var is_default = $(settings.search).attr('default-value') == value;
      setTimeout(function () {
        // Hash on filter change
        set_hash_on_filter_change(value, 'search', is_default);

        // Filter the boxes
        filterTheBoxes('.search-match', 'search');
      }, 100);
    }
    $(settings.search).on('keyup', function () {
      search($(this).val());
    });

    /* set default value */
    $(settings.search).attr('default-value', $(settings.search).attr('value') === undefined ? "" : $(settings.search).attr('value'));

    /* default search  selected */
    search($(settings.search).val());
    $('body').on('click', '.media-boxes-clear', function () {
      $(this).parents('.media-boxes-search').find('input').val('').trigger('keyup').focus();
    });

    /* ====================================================================== *
            [8] SORTING
     * ====================================================================== */

    function getSortDirection($this) {
      var direction = $this.data('sort-ascending');
      if (direction == undefined) {
        direction = true;
      }
      if ($this.data('sort-toggle') && $this.data('sort-toggle') == true) {
        $this.data('sort-ascending', !direction);
      }

      /* if there's a sort order button then use the value from there */
      var sort_order = $this.parents('.media-boxes-sort').find('.media-boxes-sort-order').find('.selected');
      if (sort_order[0] !== undefined) {
        direction = sort_order.data('sort-ascending');
      }

      /* if the sort option is "original-order" then always true (ascending) */
      if ($this.attr('data-sort-by') == 'original-order') {
        direction = true;
      }
      return direction;
    }

    /* Clicking on the different sort options */

    $(settings.sortContainer).find('*[data-sort-by]').on('click', function (e) {
      var $this = $(this);

      /* Remove selected class from others */
      $this.parents(settings.sortContainer).find('*[data-sort-by]').removeClass('selected');

      /* Add class of selected */
      $this.addClass('selected');

      /* Sort isotope */
      var sortValue = $this.attr('data-sort-by');
      $container.isotopeMB({
        sortBy: sortValue,
        sortAscending: getSortDirection($this)
      });
      e.preventDefault();
    });

    /* Clicking on the sort order button */

    $(settings.sortContainer).parents('.media-boxes-sort').find('.media-boxes-sort-order').on('click', function (e) {
      var $this = $(this);

      /* change sort order */
      $this.find('.selected').removeClass('selected').siblings('span').addClass('selected');

      /* selected sort-by option */
      var sort_by = $this.parents('.media-boxes-sort').find('.selected[data-sort-by]');

      /* apply new sort order to isotope */
      $container.isotopeMB({
        sortAscending: getSortDirection(sort_by)
      });
    });

    /* ====================================================================== *
            [9] THUMBNAIL OVERLAY EFFECT
     * ====================================================================== */

    /* ****** Set the overlay depending on the overlay effect before the hover event is trigger ****** */
    function setupOverlayForHoverEffect(container) {
      if (container.data('settings').thumbnailOverlay == false) return;
      var boxes = container.find(itemSelector + ':not([data-set-overlay-for-hover-effect])').attr('data-set-overlay-for-hover-effect', 'yes');

      /* Add extra divs for vertical alignment */
      boxes.find('.thumbnail-overlay').wrapInner("<div class='aligment'><div class='aligment'></div></div>");
      boxes.each(function () {
        var box = $(this);
        var boxImage = box.find(boxImageSelector);
        var effect = container.data('settings').overlayEffect;
        if (boxImage.data('overlay-effect') != undefined) {
          effect = boxImage.data('overlay-effect');
          if (effect.indexOf('100') >= 0 && effect.indexOf('100%') == -1) {
            effect = effect.split('100').join('100%');
          }
        }

        /* Add wrapper for some effects */
        if (effect == 'push-up' || effect == 'push-down' || effect == 'push-up-100%' || effect == 'push-down-100%') {
          var thumbnailDiv = boxImage.find('.media-box-thumbnail-container');
          var thumbnailOverlay = boxImage.find('.thumbnail-overlay').css('position', 'relative');
          if (effect == 'push-up-100%' || effect == 'push-down-100%') {
            /* set the height of the overlay to the same of the thumbnail */
            thumbnailOverlay.outerHeight(thumbnailDiv.outerHeight(false));
          }
          var heightOverlay = thumbnailOverlay.outerHeight(false);
          var wrapper = $('<div class="wrapper-for-some-effects"></div');
          if (effect == 'push-up' || effect == 'push-up-100%') {
            thumbnailOverlay.appendTo(boxImage);
          } else if (effect == 'push-down' || effect == 'push-down-100%') {
            thumbnailOverlay.prependTo(boxImage);
            wrapper.css('margin-top', -heightOverlay);
          }
          boxImage.wrapInner(wrapper);
        }
        /* Set some CSS style for this effects */else if (effect == 'reveal-top' || effect == 'reveal-top-100%') {
          box.addClass('position-reveal-effect');
          var overlay = box.find('.thumbnail-overlay').css('top', 0);
          if (effect == 'reveal-top-100%') {
            overlay.css('height', '100%');
          }
        } else if (effect == 'reveal-bottom' || effect == 'reveal-bottom-100%') {
          box.addClass('position-reveal-effect').addClass('position-bottom-reveal-effect');
          var overlay = box.find('.thumbnail-overlay').css('bottom', 0);
          if (effect == 'reveal-bottom-100%') {
            overlay.css('height', '100%');
          }
        } else if (effect.substr(0, 9) == 'direction') {
          // 'direction-aware', 'direction-aware-fade', 'direction-right', 'direction-left', 'direction-top', 'direction-bottom'

          /* Set the height to 100% if not it would be just the default height of the overlay */
          box.find('.thumbnail-overlay').css('height', '100%');
        } else if (effect == 'fade') {
          var thumbOverlay = box.find('.thumbnail-overlay').hide();
          thumbOverlay.css({
            'height': '100%',
            'top': '0',
            'left': '0'
          });
          //thumbOverlay.find("[class^='fa-'],div[class*=' fa-']").css({ scale : 1.4 });
        }

        /* Init effect on overlay-thumbnail hover */
        container.data('settings').animation_on_thumbnail_overlay_hover.forEach(function (row) {
          var item = box.find('.thumbnail-overlay').find(row.item);
          if (row.animation == 'zoom-out') {
            item.css({
              scale: 1.4
            });
          } else if (row.animation == 'zoom-in') {
            item.css({
              scale: 0.6
            });
          } else if (row.animation == 'from-top') {
            item.transition({
              y: '-30px'
            }, 0);
          } else if (row.animation == 'from-bottom') {
            item.transition({
              y: '30px'
            }, 0);
          } else if (row.animation == 'from-left') {
            item.transition({
              x: '-30px'
            }, 0);
          } else if (row.animation == 'from-right') {
            item.transition({
              x: '30px'
            }, 0);
          }
        });
      });
    }

    /* ****** Hide element when done ****** */
    function hideWhenDone(element) {
      if (element.attr('data-stop') != undefined) {
        element.hide();
        element.removeAttr('data-stop');
      }
    }

    /* ****** Trigger the overlay effect ****** */
    $container.on('mouseenter.hoverdir, mouseleave.hoverdir', boxImageSelector, function (event) {
      if (settings.thumbnailOverlay == false) return;
      var boxImage = $(this);
      var effect = settings.overlayEffect;
      if (boxImage.data('overlay-effect') != undefined) {
        effect = boxImage.data('overlay-effect');
        if (effect.indexOf('100') >= 0 && effect.indexOf('100%') == -1) {
          // if its missing the % sign at the end then just add it
          effect = effect.split('100').join('100%');
        }
      }
      var eventType = event.type;
      var thumbnailDiv = boxImage.find('.media-box-thumbnail-container');
      var thumbnailOverlay = boxImage.find('.thumbnail-overlay');
      var heightOverlay = thumbnailOverlay.outerHeight(false);

      /* The effects */
      if (effect == 'push-up' || effect == 'push-up-100%') {
        var wrapper = boxImage.find('div.wrapper-for-some-effects');
        if (eventType === 'mouseenter') {
          wrapper.stop().show()[animation]({
            'margin-top': -heightOverlay
          }, settings.overlaySpeed, settings.overlayEasing);
        } else {
          wrapper.stop()[animation]({
            'margin-top': 0
          }, settings.overlaySpeed, settings.overlayEasing);
        }
      } else if (effect == 'push-down' || effect == 'push-down-100%') {
        var wrapper = boxImage.find('div.wrapper-for-some-effects');
        if (eventType === 'mouseenter') {
          wrapper.stop().show()[animation]({
            'margin-top': 0
          }, settings.overlaySpeed, settings.overlayEasing);
        } else {
          wrapper.stop()[animation]({
            'margin-top': -heightOverlay
          }, settings.overlaySpeed, settings.overlayEasing);
        }
      } else if (effect == 'reveal-top' || effect == 'reveal-top-100%') {
        if (eventType === 'mouseenter') {
          thumbnailDiv.stop().show()[animation]({
            'margin-top': heightOverlay
          }, settings.overlaySpeed, settings.overlayEasing);
        } else {
          thumbnailDiv.stop()[animation]({
            'margin-top': 0
          }, settings.overlaySpeed, settings.overlayEasing);
        }
      } else if (effect == 'reveal-bottom' || effect == 'reveal-bottom-100%') {
        if (eventType === 'mouseenter') {
          thumbnailDiv.stop().show()[animation]({
            'margin-top': -heightOverlay
          }, settings.overlaySpeed, settings.overlayEasing);
        } else {
          thumbnailDiv.stop()[animation]({
            'margin-top': 0
          }, settings.overlaySpeed, settings.overlayEasing);
        }
      } else if (effect.substr(0, 9) == 'direction') {
        // 'direction-aware', 'direction-aware-fade', 'direction-right', 'direction-left', 'direction-top', 'direction-bottom'
        var direction = _getDir(boxImage, {
          x: event.pageX,
          y: event.pageY
        });
        if (effect == 'direction-top') {
          direction = 0;
        } else if (effect == 'direction-bottom') {
          direction = 2;
        } else if (effect == 'direction-right') {
          direction = 1;
        } else if (effect == 'direction-left') {
          direction = 3;
        }
        var cssPos = _getPosition(direction, boxImage);
        if (eventType == 'mouseenter') {
          thumbnailOverlay.css({
            'left': cssPos.from,
            'top': cssPos.to
          });
          thumbnailOverlay.stop().show().fadeTo(0, 1, function () {
            $(this).stop()[animation]({
              'left': 0,
              'top': 0
            }, settings.overlaySpeed, settings.overlayEasing);
          });
        } else {
          if (effect == 'direction-aware-fade') {
            thumbnailOverlay.fadeOut(700);
          } else {
            thumbnailOverlay.stop()[animation]({
              'left': cssPos.from,
              'top': cssPos.to
            }, settings.overlaySpeed, settings.overlayEasing);
          }
        }
      } else if (effect == 'fade') {
        if (eventType == 'mouseenter') {
          thumbnailOverlay.stop().fadeOut(0);
          thumbnailOverlay.fadeIn(settings.overlaySpeed);
        } else {
          thumbnailOverlay.stop().fadeIn(0);
          thumbnailOverlay.fadeOut(settings.overlaySpeed);
        }
      }

      /* Init effect on overlay-thumbnail hover */
      settings.animation_on_thumbnail_overlay_hover.forEach(function (row) {
        var item = thumbnailOverlay.find(row.item);
        if (eventType == 'mouseenter') {
          if (row.animation == 'zoom-out') {
            item.css({
              scale: 1.4
            });
            item[animation]({
              scale: 1
            }, 200);
          } else if (row.animation == 'zoom-in') {
            item.css({
              scale: 0.6
            });
            item[animation]({
              scale: 1
            }, 200);
          } else if (row.animation == 'from-top') {
            item.transition({
              y: '-30px'
            }, 0);
            item.transition({
              y: '0px'
            }, 200);
          } else if (row.animation == 'from-bottom') {
            item.transition({
              y: '30px'
            }, 0);
            item.transition({
              y: '0px'
            }, 200);
          } else if (row.animation == 'from-left') {
            item.transition({
              x: '-30px'
            }, 0);
            item.transition({
              x: '0px'
            }, 200);
          } else if (row.animation == 'from-right') {
            item.transition({
              x: '30px'
            }, 0);
            item.transition({
              x: '0px'
            }, 200);
          }
        } else {
          if (row.animation == 'zoom-out') {
            item.css({
              scale: 1
            });
            item[animation]({
              scale: 1.4
            }, 200);
          } else if (row.animation == 'zoom-in') {
            item.css({
              scale: 1
            });
            item[animation]({
              scale: 0.6
            }, 200);
          } else if (row.animation == 'from-top') {
            item.transition({
              y: '0px'
            }, 0);
            item.transition({
              y: '-30px'
            }, 200);
          } else if (row.animation == 'from-bottom') {
            item.transition({
              y: '0px'
            }, 0);
            item.transition({
              y: '30px'
            }, 200);
          } else if (row.animation == 'from-left') {
            item.transition({
              x: '0px'
            }, 0);
            item.transition({
              x: '-30px'
            }, 200);
          } else if (row.animation == 'from-right') {
            item.transition({
              x: '0px'
            }, 0);
            item.transition({
              x: '30px'
            }, 200);
          }
        }
      });
    });

    /* ****** Methods for the direction-aware hover effect ****** */
    var _getDir = function _getDir($el, coordinates) {
      /** the width and height of the current div **/
      var w = $el.width(),
        h = $el.height(),
        /** calculate the x and y to get an angle to the center of the div from that x and y. **/
        /** gets the x value relative to the center of the DIV and "normalize" it **/
        x = (coordinates.x - $el.offset().left - w / 2) * (w > h ? h / w : 1),
        y = (coordinates.y - $el.offset().top - h / 2) * (h > w ? w / h : 1),
        /** the angle and the direction from where the mouse came in/went out clockwise (TRBL=0123);**/
        /** first calculate the angle of the point,
        add 180 deg to get rid of the negative values
        divide by 90 to get the quadrant
        add 3 and do a modulo by 4  to shift the quadrants to a proper clockwise TRBL (top/right/bottom/left) **/
        direction = Math.round((Math.atan2(y, x) * (180 / Math.PI) + 180) / 90 + 3) % 4;
      return direction;
    };
    var _getPosition = function _getPosition(direction, $el) {
      var fromLeft, fromTop;
      switch (direction) {
        case 0:
          // from top
          if (!settings.reverse) {
            fromLeft = 0, fromTop = -$el.height();
          } else {
            fromLeft = 0, fromTop = -$el.height();
          }
          break;
        case 1:
          // from right
          if (!settings.reverse) {
            fromLeft = $el.width(), fromTop = 0;
          } else {
            fromLeft = -$el.width(), fromTop = 0;
          }
          break;
        case 2:
          // from bottom
          if (!settings.reverse) {
            fromLeft = 0, fromTop = $el.height();
          } else {
            fromLeft = 0, fromTop = -$el.height();
          }
          break;
        case 3:
          // from left
          if (!settings.reverse) {
            fromLeft = -$el.width(), fromTop = 0;
          } else {
            fromLeft = $el.width(), fromTop = 0;
          }
          break;
      }
      ;
      return {
        from: fromLeft,
        to: fromTop
      };
    };

    /* ====================================================================== *
            [10] IFRAME ON GRID
     * ====================================================================== */

    /* Instead of openning the youtube/vimeo video in the popup open it in the grid  */
    $container.on('click', '.iframe-on-grid', function () {
      var $this = $(this);
      var mbImage = $this.parents(itemSelector).find(boxImageSelector);
      show_video_on_grid(mbImage, $this.attr('data-src'));
    });
    function show_video_on_grid(mbImage, src) {
      var iframeContainer = "";
      if (mbImage.find('.iframe-on-grid-container')[0] != undefined) {
        iframeContainer = mbImage.find('.iframe-on-grid-container');
      } else {
        if (src.indexOf('vimeo.com/') > -1) {
          src = src.split('vimeo.com/').pop();
          src = 'https://player.vimeo.com/video/' + src + '?autoplay=1';
        } else if (src.indexOf('youtube.com/') > -1) {
          src = src.split('?v=').pop();
          src = 'https://www.youtube.com/embed/' + src + '?autoplay=1';
        }
        iframeContainer = $('<div class="iframe-on-grid-container"><iframe src="' + src + '" allowfullscreen></iframe></div>').appendTo(mbImage);
        iframeContainer.find('iframe').load(function () {
          $(this).fadeIn(100);
        });
      }
      iframeContainer.fadeIn(300);
    }

    /* ====================================================================== *
            [11] INIT POPUP
     * ====================================================================== */

    function addPopupTrigger(container) {
      container.find(itemSelector + ', .' + itemHiddenClass).find('.mb-open-popup:not(.popup-trigger-added)').each(function () {
        var $this = $(this).addClass('popup-trigger-added');
        var attr_src = $this.attr('data-src');
        var attr_type = $this.attr('data-type'); // image, iframe, inline, and ajax
        var attr_title = $this.attr('data-title') != undefined ? $this.attr('data-title') : "";
        var attr_alt = $this.attr('data-alt') != undefined ? $this.attr('data-alt') : "";

        // Add data-thumb if is not specified (fancybox needs this for creating the thumbnails/small-gallery in the popup, sometimes it worked, because it was autodetecting the thumbnails if the thumbnails were inside the mb-open-popup)

        if ($this.attr('data-thumb') === undefined) {
          var box = $(this).parents(itemSelector);
          var thumbnailDiv = box.find('div[data-thumbnail]').eq(0); // only one thumb allowed

          $this.attr('data-thumb', thumbnailDiv.attr('data-thumbnail'));
        }

        // Instead of openning the iframe in the popup open it in the grid

        if ($this.hasClass('iframe-on-grid') && attr_type == 'iframe') {
          return;
        }

        // If the data-src is not specified, then ignore

        if (attr_src == undefined) {
          return;
        }
        if (attr_src == '') {
          $this.removeClass('mb-open-popup');
          $this.removeAttr('data-src');
          $this.removeAttr('data-type');
          $this.removeAttr('data-title');
          $this.removeAttr('data-alt');
        }

        // Check if type is valid

        if (attr_type == 'iframe' || attr_type == 'inline' || attr_type == 'ajax') {
          // all good
        } else {
          $this.removeAttr('data-type'); // remove invalid type
        }

        // Fancybox Attribures

        if (settings.popup == 'fancybox') {
          $this.attr('data-caption', attr_title);
          if (attr_src.indexOf('youtube') >= 0 || attr_src.indexOf('vimeo') >= 0) {
            $this.removeAttr('data-type');
          }
        }

        // Magnific Popup Attributes

        if (settings.popup == 'magnificpopup') {
          var type = 'mfp-image';
          if (attr_type == 'iframe') {
            type = 'mfp-iframe';
          } else if (attr_type == 'inline') {
            type = 'mfp-inline';
          } else if (attr_type == 'ajax') {
            type = 'mfp-ajax';
          }
          $this.attr('data-mfp-src', attr_src);
          $this.addClass(type);
          $this.attr('mfp-title', attr_title);
          $this.attr('mfp-alt', attr_alt);
        }
      });
    }
    if (settings.popup == 'fancybox' || settings.popup == 'magnificpopup') {
      var selector = '.mb-open-popup[data-src]';
      if (settings.considerFilteringInPopup) {
        selector = itemSelector + ':not(.hidden-media-boxes-by-filter) .mb-open-popup[data-src], .' + itemHiddenClass + ':not(.hidden-media-boxes-by-filter) .mb-open-popup[data-src]';
      }
      if (settings.showOnlyVisibleBoxesInPopup) {
        selector = itemSelector + ':visible .mb-open-popup[data-src]';
      }
      if (settings.popup == 'fancybox') {
        /*
            Example on how to have a gallery popup per media-box
            Add these in a media-box for extra popup items:
            <div class="mb-open-popup" data-src="gallery/img-37.jpg"></div>
            <div class="mb-open-popup" data-src="gallery/img-38.jpg"></div>
        */
        /*
        $container.find('.media-box, .media-box-hidden').each(function(){
            selector = ".mb-open-popup[data-src]";
            startFancybox($(this), selector);
        });
        */
        startFancybox($container, selector);
      }
      if (settings.popup == 'magnificpopup') {
        startMagnificpopup($container, selector);
      }
    }

    /* ====================================================================== *
            [12] FANCYBOX
     * ====================================================================== */

    function startFancybox(container, selector) {
      container.on('click', '.mb-open-popup', function () {
        var visibleLinks = container.find(selector);
        $.fancyboxMB.open(visibleLinks, {
          loop: settings.fancybox.loop,
          margin: settings.fancybox.margin,
          keyboard: settings.fancybox.keyboard,
          arrows: settings.fancybox.arrows,
          infobar: settings.fancybox.infobar,
          toolbar: settings.fancybox.toolbar,
          buttons: settings.fancybox.buttons,
          share: settings.fancybox.share,
          idleTime: settings.fancybox.idleTime,
          protect: settings.fancybox.protect,
          animationEffect: settings.fancybox.animationEffect,
          animationDuration: settings.fancybox.animationDuration,
          transitionEffect: settings.fancybox.transitionEffect,
          transitionDuration: settings.fancybox.transitionDuration,
          // ====== MODULES =====>

          slideShow: settings.fancybox.slideShow,
          fullScreen: settings.fancybox.fullScreen,
          thumbs: settings.fancybox.thumbs,
          touch: settings.fancybox.touch,
          // ====== EVENTS =====>

          afterShow: function afterShow(instance, slide) {
            // Add alt attribute to lightbox image

            if (slide.opts.$orig.attr('data-alt') != undefined) {
              slide.$image.attr('alt', slide.opts.$orig.attr('data-alt'));
            }

            // Add hash to URL

            set_hash_on_popup_change(slide.opts.$orig.attr('data-src'));
          },
          beforeClose: function beforeClose(instance, slide) {
            // Remove hash from URL

            if (settings.deepLinkingOnPopup) {
              remove_from_hash('(' + slide.opts.$orig.parents('.media-boxes-container').attr('id') + '|popup)=');
            }
          },
          onInit: function onInit() {
            settings.onPopupStart();
            $(settings.fancybox.compensateScrollbar).each(function () {
              $(this).css('padding-right', '+=' + $('body').css('margin-right'));
            });
          },
          afterClose: function afterClose() {
            settings.onPopupClose();
            $(settings.fancybox.compensateScrollbar).each(function () {
              $(this).css('padding-right', '-=' + $('body').css('margin-right'));
            });
          }
        }, visibleLinks.index(this));
        return false;
      });
      $.fancyboxMB.defaults.hash = false;
    }

    /* ====================================================================== *
            [13] MAGNIFIC POPUP
     * ====================================================================== */

    function startMagnificpopup(container, selector) {
      container.magnificPopup({
        delegate: selector,
        // child items selector, by clicking on it popup will open
        type: 'image',
        removalDelay: 200,
        closeOnContentClick: false,
        alignTop: settings.magnificpopup.alignTop,
        preload: settings.magnificpopup.preload,
        tLoading: 'loading...',
        mainClass: 'my-mfp-slide-bottom',
        gallery: {
          enabled: settings.magnificpopup.gallery
        },
        closeMarkup: '<button title="%title%" class="mfp-close"></button>',
        titleSrc: 'title',
        autoFocusLast: false,
        // in the new version of Magnific Popup on IE it jumps to the element that triggered the popup, which looks odd, so we better disable it
        iframe: {
          patterns: {
            youtube: {
              index: 'youtube.com/',
              // String that detects type of video (in this case YouTube). Simply via url.indexOf(index).
              id: 'v=',
              // String that splits URL in a two parts, second part should be %id%
              src: 'https://www.youtube.com/embed/%id%?autoplay=1' // URL that will be set as a source for iframe.
            },

            vimeo: {
              index: 'vimeo.com/',
              id: '/',
              src: 'https://player.vimeo.com/video/%id%?autoplay=1'
            }
          },
          markup: '<div class="mfp-iframe-scaler">' + '<div class="mfp-close"></div>' + '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' + '<div class="mfp-bottom-bar" style="margin-top:4px;"><div class="mfp-title"></div><div class="mfp-counter"></div></div>' + '</div>'
        },
        callbacks: {
          change: function change() {
            var item = $(this.currItem.el);
            setTimeout(function () {
              $('.mfp-title').html(item.attr('mfp-title'));
              $('.mfp-img').attr('alt', item.attr('mfp-alt'));
              addSocialButtons(item);
            }, 5);
            set_hash_on_popup_change(item.attr('data-src'));
          },
          close: function close() {
            if (settings.deepLinkingOnPopup) {
              var item = $(this.currItem.el);
              remove_from_hash('(' + item.parents('.media-boxes-container').attr('id') + '|popup)=');
            }
          },
          // FIX SO THE BACKGROUND DOESN'T MOVE
          beforeOpen: function beforeOpen() {
            this.container.data('scrollTop', parseInt($(window).scrollTop()));
          },
          open: function open() {
            $('html, body').scrollTop(this.container.data('scrollTop'));
          }
        }
      });
    }

    /* ====================================================================== *
            [14] DEEP LINKING
     * ====================================================================== */

    /* ### SET HAS WHEN FILTER, SEARCH OR POPUP CHANGE ### */

    function set_hash_on_filter_change(filterValue, filterGroup, is_default) {
      if (filterGroup == 'search' && settings.deepLinkingOnSearch || filterGroup != 'search' && settings.deepLinkingOnFilter) {
        if (is_default === true) {
          remove_from_hash('(' + $container.attr('id') + '|' + filterGroup + ')=');
        } else {
          set_key_and_value_in_hash('(' + $container.attr('id') + '|' + filterGroup + ')=', filterValue);
        }
      }
    }
    function set_hash_on_popup_change(value) {
      if (settings.deepLinkingOnPopup) {
        set_key_and_value_in_hash('(' + $container.attr('id') + '|popup)=', value); /* with the "src" of the image and the "id" of the container */
      }
    }

    /* ### INIT SEARCH, FILTER AND POPUP ### */

    function trigger_search() {
      if (settings.deepLinkingOnSearch) {
        var key = '(' + $container.attr('id') + '|search)=';
        var hash_value = get_value_from_hash(key);
        if (hash_value != '') {
          $(settings.search).val(hash_value).trigger('keyup');
        }
      }
    }
    trigger_search();
    function trigger_filter() {
      if (settings.deepLinkingOnFilter) {
        $(settings.filterContainer).each(function () {
          var current_filterContainer = $(this);
          var filterGroup = current_filterContainer.data("id") != undefined ? current_filterContainer.data("id") : "filter"; // take the id of the filter container if exists, if not just a string
          var key = '(' + $container.attr('id') + '|' + filterGroup + ')=';
          var hash_value = get_value_from_hash(key);
          if (hash_value != '') {
            if (current_filterContainer.is("select")) {
              // check if its a select element
              var val = current_filterContainer.find('*[data-filter="' + hash_value + '"]').val();
              current_filterContainer.val(val).trigger('change');
            } else if (current_filterContainer.is(":checkbox")) {
              // checkbox
              if (hash_value == '*') {
                current_filterContainer.prop('checked', false).trigger('change');
              } else {
                current_filterContainer.prop('checked', true).trigger('change');
              }
              //current_filterContainer.attr('data-filter', hash_value).trigger('click');
            } else {
              // dropdown menu or inline menu
              current_filterContainer.find('*[data-filter="' + hash_value + '"]').trigger('click');
            }
          }
        });
      }
    }
    trigger_filter();
    function trigger_popup() {
      if (settings.deepLinkingOnPopup) {
        var key = '(' + $container.attr('id') + '|popup)=';
        var hash_value = get_value_from_hash(key);
        if (hash_value != '') {
          setTimeout(function () {
            $container.find('.mb-open-popup[data-src="' + hash_value + '"]').trigger('click');
          }, 50);
        }
      }
    }
    trigger_popup();

    /* ### HELPFUL METHODS ### */

    function set_hash(new_hash) {
      if (new_hash === '' || new_hash === '#' || new_hash === '!') {
        /* if the hash will be empty then use this following peace of code, otherwise it will jump back to the top of the page if you set an empty result for the hash */
        if (history.pushState) {
          history.pushState(null, null, ' ');
        } else {
          location.hash = '#!';
        }
      } else {
        location.hash = '#' + new_hash;

        /* This may be helpful later on (I found in a site it jumps to the beginning of the page the first time you change the hash, but in the examples is working like a charm)
        if(history.pushState) {
            history.pushState(null, null, '#'+ new_hash);
        }else{
            location.hash = '#!'+ new_hash;
        }
        */
      }
    }

    function replace_in_hash(old_value, new_value) {
      var hash = get_hash();
      if (hash.indexOf(old_value) > -1 && old_value != "") {
        // if the old value exists, then just replace it
        set_hash(hash.split(old_value).join(new_value));
      } else {
        // if the old value doesn't exists then just add the new one
        set_hash(hash + new_value);
      }
    }
    function get_hash() {
      if (location.href.indexOf("#") != -1) {
        //return decodeURI( location.href.split("#")[1] ); // this wouldn't work if there are more # in the hash
        return decodeURI(location.href.substring(location.href.indexOf('#') + 1));
      } else {
        return '';
      }
    }
    function get_value_and_key_from_hash(start) {
      var hash = get_hash();
      var output = '';
      var index_start = hash.indexOf(start);
      if (index_start > -1 && hash.indexOf(';', index_start) > -1) {
        output = hash.substring(index_start, hash.indexOf(';', index_start) + 1);
      }
      return output;
    }
    function get_value_from_hash(start) {
      var hash = get_hash();
      var output = '';
      var index_start = hash.indexOf(start);
      if (index_start > -1 && hash.indexOf(';', index_start) > -1) {
        output = hash.substring(index_start + start.length, hash.indexOf(';', index_start));
      }
      return output;
    }
    function remove_from_hash(start) {
      var new_hash = get_hash().split(get_value_and_key_from_hash(start)).join('');
      set_hash(new_hash);
    }
    function set_key_and_value_in_hash(start, value) {
      if (get_value_from_hash(start) == value) {
        // do nothing, since there's no change in the hash
      } else {
        var old_value = get_value_and_key_from_hash(start);
        var new_value = start + value + ';'; // i.e. // (grid|popup)=some_image.png;
        replace_in_hash(old_value, new_value);
      }
    }

    /* ====================================================================== *
            [15] SOCIAL IN MAGNIFIC POPUP
     * ====================================================================== */

    function addSocialButtons(item) {
      var FullURL = location.href; // the url of your page
      var URLWithoutHash = location.href.replace(location.hash, ""); // the url of your page without the hashtag
      var imageURL = item.attr('data-src'); // the image URL

      // which URL do you want to share of the 3 options above?
      // var sharingURL = URLWithoutHash+"/"+imageURL;
      var sharingURL = FullURL;
      var social = "<div class='media-boxes-social-container'>";
      if (settings.facebook != undefined) {
        //FB
        social += "<div class='media-boxes-facebook fa fa-facebook-square' data-url='" + sharingURL + "'></div>";
      }
      if (settings.twitter != undefined) {
        //Twitter
        social += "<div class='media-boxes-twitter fa fa-twitter-square' data-url='" + sharingURL + "'></div>";
      }
      if (settings.googleplus != undefined) {
        //Google+
        social += "<div class='media-boxes-googleplus fa fa-google-plus-square' data-url='" + sharingURL + "'></div>";
      }
      if (settings.pinterest != undefined) {
        //Pintrest
        social += "<div class='media-boxes-pinterest fa fa-pinterest-square' data-url='" + sharingURL + "'></div>";
      }
      social += "</div>";
      var oldHTML = $('.mfp-title').html();
      $('.mfp-title').html(oldHTML + social);
    }

    // OPEN WINDOWS FOR SHARING :D
    var openWindow = function openWindow(url) {
      var w = window.open(url, "ftgw", "location=1,status=1,scrollbars=1,width=600,height=400");
      w.moveTo(screen.width / 2 - 300, screen.height / 2 - 200);
    };

    //FACEBOOK SHARE
    $('body').on('click', 'div.media-boxes-facebook', function () {
      var $this = $(this);
      var url = encodeURIComponent($this.data('url'));
      url = 'https://www.facebook.com/sharer/sharer.php?u=' + url;
      openWindow(url);
    });
    //TWITTER SHARE
    $('body').on('click', 'div.media-boxes-twitter', function () {
      var $this = $(this);
      var url = encodeURIComponent($this.data('url'));
      url = "https://twitter.com/intent/tweet?url=&text=" + url;
      openWindow(url);
    });
    //GOOGLE PLUS
    $('body').on('click', 'div.media-boxes-googleplus', function () {
      var $this = $(this);
      var url = encodeURIComponent($this.data('url'));
      url = 'https://plus.google.com/share?url=' + url;
      openWindow(url);
    });
    //PINTREST
    $('body').on('click', 'div.media-boxes-pinterest', function () {
      var $this = $(this);
      var url = encodeURIComponent($this.data('url'));
      url = 'http://pinterest.com/pin/create/button/?url=' + url + '&media=' + url;
      openWindow(url);
    });

    /* ====================================================================== *
            [D] DESTROY
     * ====================================================================== */

    this.destroy = function () {
      // Destroy grid and put it back as it were before being initialized

      this.container_clone.insertBefore(this.container).removeData('mediaBoxes');
      this.container.removeClass(); // remove all classes! (if I don't the lazy load gets triggered)
      this.container.next('.media-boxes-load-more-button').remove();
      this.container.isotopeMB('destroy');
      this.container.remove();
    };

    /* ====================================================================== *
            [E] INSERT
     * ====================================================================== */

    this.insert = function (content, callback) {
      // insert and load all content into the grid

      var $container = this.container;
      $container.isotopeMB('insert', $(content), function () {
        callback();
        $container.isotopeMB('layout');
      });
    };

    /* ====================================================================== *
            [F] INSERT IN FLOW
     * ====================================================================== */

    this.insert_in_flow = function (content, callback) {
      // insert more boxes and continue with the loadMore/lazyLoad effect

      var $container = this.container;
      $container.append($(content).removeClass(itemClass).addClass(itemHiddenClass));
      loadMoreButton.removeClass('media-boxes-no-more-entries');
      loadMore(settings.boxesToLoadStart, true);
      callback();
    };

    /* ====================================================================== *
            [G] REFRESH
     * ====================================================================== */

    this.refresh = function () {
      // refresh layout grid only

      this.container.isotopeMB('layout');
    };

    /* ====================================================================== *
            [H] RESIZE
     * ====================================================================== */

    this.resize = function () {
      // refresh all the variables and things, its like resizing the browser width

      this.container.isotopeMB('resize');
    };
  }; //END OF INIT

  /* ====================================================================== *
          [I] MEDIA BOXES PLUGIN
   * ====================================================================== */

  $.fn.mediaBoxes = function (options, content, callback) {
    return this.each(function (key, value) {
      var $this = $(this);
      var data = $this.data('mediaBoxes');

      // Initialize plugin
      if (!data && typeof options != 'string') {
        $this.data('mediaBoxes', new MediaBoxes(this, options));
      }

      // Call method
      if (data && typeof options == 'string') {
        data[options](content, callback);
      }
    });
  };
})(window, jQuery);

/***/ }),

/***/ "./assets/common-sass/owl.carousel/dist/owl.carousel.js":
/*!**************************************************************!*\
  !*** ./assets/common-sass/owl.carousel/dist/owl.carousel.js ***!
  \**************************************************************/
/***/ (() => {

function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
/**
 * Owl Carousel v2.3.4
 * Copyright 2013-2018 David Deutsch
 * Licensed under: SEE LICENSE IN https://github.com/OwlCarousel2/OwlCarousel2/blob/master/LICENSE
 */
/**
 * Owl carousel
 * @version 2.3.4
 * @author Bartosz Wojciechowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 * @todo Lazy Load Icon
 * @todo prevent animationend bubling
 * @todo itemsScaleUp
 * @todo Test Zepto
 * @todo stagePadding calculate wrong active classes
 */
;
(function ($, window, document, undefined) {
  /**
   * Creates a carousel.
   * @class The Owl Carousel.
   * @public
   * @param {HTMLElement|jQuery} element - The element to create the carousel for.
   * @param {Object} [options] - The options
   */
  function Owl(element, options) {
    /**
     * Current settings for the carousel.
     * @public
     */
    this.settings = null;

    /**
     * Current options set by the caller including defaults.
     * @public
     */
    this.options = $.extend({}, Owl.Defaults, options);

    /**
     * Plugin element.
     * @public
     */
    this.$element = $(element);

    /**
     * Proxied event handlers.
     * @protected
     */
    this._handlers = {};

    /**
     * References to the running plugins of this carousel.
     * @protected
     */
    this._plugins = {};

    /**
     * Currently suppressed events to prevent them from being retriggered.
     * @protected
     */
    this._supress = {};

    /**
     * Absolute current position.
     * @protected
     */
    this._current = null;

    /**
     * Animation speed in milliseconds.
     * @protected
     */
    this._speed = null;

    /**
     * Coordinates of all items in pixel.
     * @todo The name of this member is missleading.
     * @protected
     */
    this._coordinates = [];

    /**
     * Current breakpoint.
     * @todo Real media queries would be nice.
     * @protected
     */
    this._breakpoint = null;

    /**
     * Current width of the plugin element.
     */
    this._width = null;

    /**
     * All real items.
     * @protected
     */
    this._items = [];

    /**
     * All cloned items.
     * @protected
     */
    this._clones = [];

    /**
     * Merge values of all items.
     * @todo Maybe this could be part of a plugin.
     * @protected
     */
    this._mergers = [];

    /**
     * Widths of all items.
     */
    this._widths = [];

    /**
     * Invalidated parts within the update process.
     * @protected
     */
    this._invalidated = {};

    /**
     * Ordered list of workers for the update process.
     * @protected
     */
    this._pipe = [];

    /**
     * Current state information for the drag operation.
     * @todo #261
     * @protected
     */
    this._drag = {
      time: null,
      target: null,
      pointer: null,
      stage: {
        start: null,
        current: null
      },
      direction: null
    };

    /**
     * Current state information and their tags.
     * @type {Object}
     * @protected
     */
    this._states = {
      current: {},
      tags: {
        'initializing': ['busy'],
        'animating': ['busy'],
        'dragging': ['interacting']
      }
    };
    $.each(['onResize', 'onThrottledResize'], $.proxy(function (i, handler) {
      this._handlers[handler] = $.proxy(this[handler], this);
    }, this));
    $.each(Owl.Plugins, $.proxy(function (key, plugin) {
      this._plugins[key.charAt(0).toLowerCase() + key.slice(1)] = new plugin(this);
    }, this));
    $.each(Owl.Workers, $.proxy(function (priority, worker) {
      this._pipe.push({
        'filter': worker.filter,
        'run': $.proxy(worker.run, this)
      });
    }, this));
    this.setup();
    this.initialize();
  }

  /**
   * Default options for the carousel.
   * @public
   */
  Owl.Defaults = {
    items: 3,
    loop: false,
    center: false,
    rewind: false,
    checkVisibility: true,
    mouseDrag: true,
    touchDrag: true,
    pullDrag: true,
    freeDrag: false,
    margin: 0,
    stagePadding: 0,
    merge: false,
    mergeFit: true,
    autoWidth: false,
    startPosition: 0,
    rtl: false,
    smartSpeed: 250,
    fluidSpeed: false,
    dragEndSpeed: false,
    responsive: {},
    responsiveRefreshRate: 200,
    responsiveBaseElement: window,
    fallbackEasing: 'swing',
    slideTransition: '',
    info: false,
    nestedItemSelector: false,
    itemElement: 'div',
    stageElement: 'div',
    refreshClass: 'owl-refresh',
    loadedClass: 'owl-loaded',
    loadingClass: 'owl-loading',
    rtlClass: 'owl-rtl',
    responsiveClass: 'owl-responsive',
    dragClass: 'owl-drag',
    itemClass: 'owl-item',
    stageClass: 'owl-stage',
    stageOuterClass: 'owl-stage-outer',
    grabClass: 'owl-grab'
  };

  /**
   * Enumeration for width.
   * @public
   * @readonly
   * @enum {String}
   */
  Owl.Width = {
    Default: 'default',
    Inner: 'inner',
    Outer: 'outer'
  };

  /**
   * Enumeration for types.
   * @public
   * @readonly
   * @enum {String}
   */
  Owl.Type = {
    Event: 'event',
    State: 'state'
  };

  /**
   * Contains all registered plugins.
   * @public
   */
  Owl.Plugins = {};

  /**
   * List of workers involved in the update process.
   */
  Owl.Workers = [{
    filter: ['width', 'settings'],
    run: function run() {
      this._width = this.$element.width();
    }
  }, {
    filter: ['width', 'items', 'settings'],
    run: function run(cache) {
      cache.current = this._items && this._items[this.relative(this._current)];
    }
  }, {
    filter: ['items', 'settings'],
    run: function run() {
      this.$stage.children('.cloned').remove();
    }
  }, {
    filter: ['width', 'items', 'settings'],
    run: function run(cache) {
      var margin = this.settings.margin || '',
        grid = !this.settings.autoWidth,
        rtl = this.settings.rtl,
        css = {
          'width': 'auto',
          'margin-left': rtl ? margin : '',
          'margin-right': rtl ? '' : margin
        };
      !grid && this.$stage.children().css(css);
      cache.css = css;
    }
  }, {
    filter: ['width', 'items', 'settings'],
    run: function run(cache) {
      var width = (this.width() / this.settings.items).toFixed(3) - this.settings.margin,
        merge = null,
        iterator = this._items.length,
        grid = !this.settings.autoWidth,
        widths = [];
      cache.items = {
        merge: false,
        width: width
      };
      while (iterator--) {
        merge = this._mergers[iterator];
        merge = this.settings.mergeFit && Math.min(merge, this.settings.items) || merge;
        cache.items.merge = merge > 1 || cache.items.merge;
        widths[iterator] = !grid ? this._items[iterator].width() : width * merge;
      }
      this._widths = widths;
    }
  }, {
    filter: ['items', 'settings'],
    run: function run() {
      var clones = [],
        items = this._items,
        settings = this.settings,
        // TODO: Should be computed from number of min width items in stage
        view = Math.max(settings.items * 2, 4),
        size = Math.ceil(items.length / 2) * 2,
        repeat = settings.loop && items.length ? settings.rewind ? view : Math.max(view, size) : 0,
        append = '',
        prepend = '';
      repeat /= 2;
      while (repeat > 0) {
        // Switch to only using appended clones
        clones.push(this.normalize(clones.length / 2, true));
        append = append + items[clones[clones.length - 1]][0].outerHTML;
        clones.push(this.normalize(items.length - 1 - (clones.length - 1) / 2, true));
        prepend = items[clones[clones.length - 1]][0].outerHTML + prepend;
        repeat -= 1;
      }
      this._clones = clones;
      $(append).addClass('cloned').appendTo(this.$stage);
      $(prepend).addClass('cloned').prependTo(this.$stage);
    }
  }, {
    filter: ['width', 'items', 'settings'],
    run: function run() {
      var rtl = this.settings.rtl ? 1 : -1,
        size = this._clones.length + this._items.length,
        iterator = -1,
        previous = 0,
        current = 0,
        coordinates = [];
      while (++iterator < size) {
        previous = coordinates[iterator - 1] || 0;
        current = this._widths[this.relative(iterator)] + this.settings.margin;
        coordinates.push(previous + current * rtl);
      }
      this._coordinates = coordinates;
    }
  }, {
    filter: ['width', 'items', 'settings'],
    run: function run() {
      var padding = this.settings.stagePadding,
        coordinates = this._coordinates,
        css = {
          'width': Math.ceil(Math.abs(coordinates[coordinates.length - 1])) + padding * 2,
          'padding-left': padding || '',
          'padding-right': padding || ''
        };
      this.$stage.css(css);
    }
  }, {
    filter: ['width', 'items', 'settings'],
    run: function run(cache) {
      var iterator = this._coordinates.length,
        grid = !this.settings.autoWidth,
        items = this.$stage.children();
      if (grid && cache.items.merge) {
        while (iterator--) {
          cache.css.width = this._widths[this.relative(iterator)];
          items.eq(iterator).css(cache.css);
        }
      } else if (grid) {
        cache.css.width = cache.items.width;
        items.css(cache.css);
      }
    }
  }, {
    filter: ['items'],
    run: function run() {
      this._coordinates.length < 1 && this.$stage.removeAttr('style');
    }
  }, {
    filter: ['width', 'items', 'settings'],
    run: function run(cache) {
      cache.current = cache.current ? this.$stage.children().index(cache.current) : 0;
      cache.current = Math.max(this.minimum(), Math.min(this.maximum(), cache.current));
      this.reset(cache.current);
    }
  }, {
    filter: ['position'],
    run: function run() {
      this.animate(this.coordinates(this._current));
    }
  }, {
    filter: ['width', 'position', 'items', 'settings'],
    run: function run() {
      var rtl = this.settings.rtl ? 1 : -1,
        padding = this.settings.stagePadding * 2,
        begin = this.coordinates(this.current()) + padding,
        end = begin + this.width() * rtl,
        inner,
        outer,
        matches = [],
        i,
        n;
      for (i = 0, n = this._coordinates.length; i < n; i++) {
        inner = this._coordinates[i - 1] || 0;
        outer = Math.abs(this._coordinates[i]) + padding * rtl;
        if (this.op(inner, '<=', begin) && this.op(inner, '>', end) || this.op(outer, '<', begin) && this.op(outer, '>', end)) {
          matches.push(i);
        }
      }
      this.$stage.children('.active').removeClass('active');
      this.$stage.children(':eq(' + matches.join('), :eq(') + ')').addClass('active');
      this.$stage.children('.center').removeClass('center');
      if (this.settings.center) {
        this.$stage.children().eq(this.current()).addClass('center');
      }
    }
  }];

  /**
   * Create the stage DOM element
   */
  Owl.prototype.initializeStage = function () {
    this.$stage = this.$element.find('.' + this.settings.stageClass);

    // if the stage is already in the DOM, grab it and skip stage initialization
    if (this.$stage.length) {
      return;
    }
    this.$element.addClass(this.options.loadingClass);

    // create stage
    this.$stage = $('<' + this.settings.stageElement + '>', {
      "class": this.settings.stageClass
    }).wrap($('<div/>', {
      "class": this.settings.stageOuterClass
    }));

    // append stage
    this.$element.append(this.$stage.parent());
  };

  /**
   * Create item DOM elements
   */
  Owl.prototype.initializeItems = function () {
    var $items = this.$element.find('.owl-item');

    // if the items are already in the DOM, grab them and skip item initialization
    if ($items.length) {
      this._items = $items.get().map(function (item) {
        return $(item);
      });
      this._mergers = this._items.map(function () {
        return 1;
      });
      this.refresh();
      return;
    }

    // append content
    this.replace(this.$element.children().not(this.$stage.parent()));

    // check visibility
    if (this.isVisible()) {
      // update view
      this.refresh();
    } else {
      // invalidate width
      this.invalidate('width');
    }
    this.$element.removeClass(this.options.loadingClass).addClass(this.options.loadedClass);
  };

  /**
   * Initializes the carousel.
   * @protected
   */
  Owl.prototype.initialize = function () {
    this.enter('initializing');
    this.trigger('initialize');
    this.$element.toggleClass(this.settings.rtlClass, this.settings.rtl);
    if (this.settings.autoWidth && !this.is('pre-loading')) {
      var imgs, nestedSelector, width;
      imgs = this.$element.find('img');
      nestedSelector = this.settings.nestedItemSelector ? '.' + this.settings.nestedItemSelector : undefined;
      width = this.$element.children(nestedSelector).width();
      if (imgs.length && width <= 0) {
        this.preloadAutoWidthImages(imgs);
      }
    }
    this.initializeStage();
    this.initializeItems();

    // register event handlers
    this.registerEventHandlers();
    this.leave('initializing');
    this.trigger('initialized');
  };

  /**
   * @returns {Boolean} visibility of $element
   *                    if you know the carousel will always be visible you can set `checkVisibility` to `false` to
   *                    prevent the expensive browser layout forced reflow the $element.is(':visible') does
   */
  Owl.prototype.isVisible = function () {
    return this.settings.checkVisibility ? this.$element.is(':visible') : true;
  };

  /**
   * Setups the current settings.
   * @todo Remove responsive classes. Why should adaptive designs be brought into IE8?
   * @todo Support for media queries by using `matchMedia` would be nice.
   * @public
   */
  Owl.prototype.setup = function () {
    var viewport = this.viewport(),
      overwrites = this.options.responsive,
      match = -1,
      settings = null;
    if (!overwrites) {
      settings = $.extend({}, this.options);
    } else {
      $.each(overwrites, function (breakpoint) {
        if (breakpoint <= viewport && breakpoint > match) {
          match = Number(breakpoint);
        }
      });
      settings = $.extend({}, this.options, overwrites[match]);
      if (typeof settings.stagePadding === 'function') {
        settings.stagePadding = settings.stagePadding();
      }
      delete settings.responsive;

      // responsive class
      if (settings.responsiveClass) {
        this.$element.attr('class', this.$element.attr('class').replace(new RegExp('(' + this.options.responsiveClass + '-)\\S+\\s', 'g'), '$1' + match));
      }
    }
    this.trigger('change', {
      property: {
        name: 'settings',
        value: settings
      }
    });
    this._breakpoint = match;
    this.settings = settings;
    this.invalidate('settings');
    this.trigger('changed', {
      property: {
        name: 'settings',
        value: this.settings
      }
    });
  };

  /**
   * Updates option logic if necessery.
   * @protected
   */
  Owl.prototype.optionsLogic = function () {
    if (this.settings.autoWidth) {
      this.settings.stagePadding = false;
      this.settings.merge = false;
    }
  };

  /**
   * Prepares an item before add.
   * @todo Rename event parameter `content` to `item`.
   * @protected
   * @returns {jQuery|HTMLElement} - The item container.
   */
  Owl.prototype.prepare = function (item) {
    var event = this.trigger('prepare', {
      content: item
    });
    if (!event.data) {
      event.data = $('<' + this.settings.itemElement + '/>').addClass(this.options.itemClass).append(item);
    }
    this.trigger('prepared', {
      content: event.data
    });
    return event.data;
  };

  /**
   * Updates the view.
   * @public
   */
  Owl.prototype.update = function () {
    var i = 0,
      n = this._pipe.length,
      filter = $.proxy(function (p) {
        return this[p];
      }, this._invalidated),
      cache = {};
    while (i < n) {
      if (this._invalidated.all || $.grep(this._pipe[i].filter, filter).length > 0) {
        this._pipe[i].run(cache);
      }
      i++;
    }
    this._invalidated = {};
    !this.is('valid') && this.enter('valid');
  };

  /**
   * Gets the width of the view.
   * @public
   * @param {Owl.Width} [dimension=Owl.Width.Default] - The dimension to return.
   * @returns {Number} - The width of the view in pixel.
   */
  Owl.prototype.width = function (dimension) {
    dimension = dimension || Owl.Width.Default;
    switch (dimension) {
      case Owl.Width.Inner:
      case Owl.Width.Outer:
        return this._width;
      default:
        return this._width - this.settings.stagePadding * 2 + this.settings.margin;
    }
  };

  /**
   * Refreshes the carousel primarily for adaptive purposes.
   * @public
   */
  Owl.prototype.refresh = function () {
    this.enter('refreshing');
    this.trigger('refresh');
    this.setup();
    this.optionsLogic();
    this.$element.addClass(this.options.refreshClass);
    this.update();
    this.$element.removeClass(this.options.refreshClass);
    this.leave('refreshing');
    this.trigger('refreshed');
  };

  /**
   * Checks window `resize` event.
   * @protected
   */
  Owl.prototype.onThrottledResize = function () {
    window.clearTimeout(this.resizeTimer);
    this.resizeTimer = window.setTimeout(this._handlers.onResize, this.settings.responsiveRefreshRate);
  };

  /**
   * Checks window `resize` event.
   * @protected
   */
  Owl.prototype.onResize = function () {
    if (!this._items.length) {
      return false;
    }
    if (this._width === this.$element.width()) {
      return false;
    }
    if (!this.isVisible()) {
      return false;
    }
    this.enter('resizing');
    if (this.trigger('resize').isDefaultPrevented()) {
      this.leave('resizing');
      return false;
    }
    this.invalidate('width');
    this.refresh();
    this.leave('resizing');
    this.trigger('resized');
  };

  /**
   * Registers event handlers.
   * @todo Check `msPointerEnabled`
   * @todo #261
   * @protected
   */
  Owl.prototype.registerEventHandlers = function () {
    if ($.support.transition) {
      this.$stage.on($.support.transition.end + '.owl.core', $.proxy(this.onTransitionEnd, this));
    }
    if (this.settings.responsive !== false) {
      this.on(window, 'resize', this._handlers.onThrottledResize);
    }
    if (this.settings.mouseDrag) {
      this.$element.addClass(this.options.dragClass);
      this.$stage.on('mousedown.owl.core', $.proxy(this.onDragStart, this));
      this.$stage.on('dragstart.owl.core selectstart.owl.core', function () {
        return false;
      });
    }
    if (this.settings.touchDrag) {
      this.$stage.on('touchstart.owl.core', $.proxy(this.onDragStart, this));
      this.$stage.on('touchcancel.owl.core', $.proxy(this.onDragEnd, this));
    }
  };

  /**
   * Handles `touchstart` and `mousedown` events.
   * @todo Horizontal swipe threshold as option
   * @todo #261
   * @protected
   * @param {Event} event - The event arguments.
   */
  Owl.prototype.onDragStart = function (event) {
    var stage = null;
    if (event.which === 3) {
      return;
    }
    if ($.support.transform) {
      stage = this.$stage.css('transform').replace(/.*\(|\)| /g, '').split(',');
      stage = {
        x: stage[stage.length === 16 ? 12 : 4],
        y: stage[stage.length === 16 ? 13 : 5]
      };
    } else {
      stage = this.$stage.position();
      stage = {
        x: this.settings.rtl ? stage.left + this.$stage.width() - this.width() + this.settings.margin : stage.left,
        y: stage.top
      };
    }
    if (this.is('animating')) {
      $.support.transform ? this.animate(stage.x) : this.$stage.stop();
      this.invalidate('position');
    }
    this.$element.toggleClass(this.options.grabClass, event.type === 'mousedown');
    this.speed(0);
    this._drag.time = new Date().getTime();
    this._drag.target = $(event.target);
    this._drag.stage.start = stage;
    this._drag.stage.current = stage;
    this._drag.pointer = this.pointer(event);
    $(document).on('mouseup.owl.core touchend.owl.core', $.proxy(this.onDragEnd, this));
    $(document).one('mousemove.owl.core touchmove.owl.core', $.proxy(function (event) {
      var delta = this.difference(this._drag.pointer, this.pointer(event));
      $(document).on('mousemove.owl.core touchmove.owl.core', $.proxy(this.onDragMove, this));
      if (Math.abs(delta.x) < Math.abs(delta.y) && this.is('valid')) {
        return;
      }
      event.preventDefault();
      this.enter('dragging');
      this.trigger('drag');
    }, this));
  };

  /**
   * Handles the `touchmove` and `mousemove` events.
   * @todo #261
   * @protected
   * @param {Event} event - The event arguments.
   */
  Owl.prototype.onDragMove = function (event) {
    var minimum = null,
      maximum = null,
      pull = null,
      delta = this.difference(this._drag.pointer, this.pointer(event)),
      stage = this.difference(this._drag.stage.start, delta);
    if (!this.is('dragging')) {
      return;
    }
    event.preventDefault();
    if (this.settings.loop) {
      minimum = this.coordinates(this.minimum());
      maximum = this.coordinates(this.maximum() + 1) - minimum;
      stage.x = ((stage.x - minimum) % maximum + maximum) % maximum + minimum;
    } else {
      minimum = this.settings.rtl ? this.coordinates(this.maximum()) : this.coordinates(this.minimum());
      maximum = this.settings.rtl ? this.coordinates(this.minimum()) : this.coordinates(this.maximum());
      pull = this.settings.pullDrag ? -1 * delta.x / 5 : 0;
      stage.x = Math.max(Math.min(stage.x, minimum + pull), maximum + pull);
    }
    this._drag.stage.current = stage;
    this.animate(stage.x);
  };

  /**
   * Handles the `touchend` and `mouseup` events.
   * @todo #261
   * @todo Threshold for click event
   * @protected
   * @param {Event} event - The event arguments.
   */
  Owl.prototype.onDragEnd = function (event) {
    var delta = this.difference(this._drag.pointer, this.pointer(event)),
      stage = this._drag.stage.current,
      direction = delta.x > 0 ^ this.settings.rtl ? 'left' : 'right';
    $(document).off('.owl.core');
    this.$element.removeClass(this.options.grabClass);
    if (delta.x !== 0 && this.is('dragging') || !this.is('valid')) {
      this.speed(this.settings.dragEndSpeed || this.settings.smartSpeed);
      this.current(this.closest(stage.x, delta.x !== 0 ? direction : this._drag.direction));
      this.invalidate('position');
      this.update();
      this._drag.direction = direction;
      if (Math.abs(delta.x) > 3 || new Date().getTime() - this._drag.time > 300) {
        this._drag.target.one('click.owl.core', function () {
          return false;
        });
      }
    }
    if (!this.is('dragging')) {
      return;
    }
    this.leave('dragging');
    this.trigger('dragged');
  };

  /**
   * Gets absolute position of the closest item for a coordinate.
   * @todo Setting `freeDrag` makes `closest` not reusable. See #165.
   * @protected
   * @param {Number} coordinate - The coordinate in pixel.
   * @param {String} direction - The direction to check for the closest item. Ether `left` or `right`.
   * @return {Number} - The absolute position of the closest item.
   */
  Owl.prototype.closest = function (coordinate, direction) {
    var position = -1,
      pull = 30,
      width = this.width(),
      coordinates = this.coordinates();
    if (!this.settings.freeDrag) {
      // check closest item
      $.each(coordinates, $.proxy(function (index, value) {
        // on a left pull, check on current index
        if (direction === 'left' && coordinate > value - pull && coordinate < value + pull) {
          position = index;
          // on a right pull, check on previous index
          // to do so, subtract width from value and set position = index + 1
        } else if (direction === 'right' && coordinate > value - width - pull && coordinate < value - width + pull) {
          position = index + 1;
        } else if (this.op(coordinate, '<', value) && this.op(coordinate, '>', coordinates[index + 1] !== undefined ? coordinates[index + 1] : value - width)) {
          position = direction === 'left' ? index + 1 : index;
        }
        return position === -1;
      }, this));
    }
    if (!this.settings.loop) {
      // non loop boundries
      if (this.op(coordinate, '>', coordinates[this.minimum()])) {
        position = coordinate = this.minimum();
      } else if (this.op(coordinate, '<', coordinates[this.maximum()])) {
        position = coordinate = this.maximum();
      }
    }
    return position;
  };

  /**
   * Animates the stage.
   * @todo #270
   * @public
   * @param {Number} coordinate - The coordinate in pixels.
   */
  Owl.prototype.animate = function (coordinate) {
    var animate = this.speed() > 0;
    this.is('animating') && this.onTransitionEnd();
    if (animate) {
      this.enter('animating');
      this.trigger('translate');
    }
    if ($.support.transform3d && $.support.transition) {
      this.$stage.css({
        transform: 'translate3d(' + coordinate + 'px,0px,0px)',
        transition: this.speed() / 1000 + 's' + (this.settings.slideTransition ? ' ' + this.settings.slideTransition : '')
      });
    } else if (animate) {
      this.$stage.animate({
        left: coordinate + 'px'
      }, this.speed(), this.settings.fallbackEasing, $.proxy(this.onTransitionEnd, this));
    } else {
      this.$stage.css({
        left: coordinate + 'px'
      });
    }
  };

  /**
   * Checks whether the carousel is in a specific state or not.
   * @param {String} state - The state to check.
   * @returns {Boolean} - The flag which indicates if the carousel is busy.
   */
  Owl.prototype.is = function (state) {
    return this._states.current[state] && this._states.current[state] > 0;
  };

  /**
   * Sets the absolute position of the current item.
   * @public
   * @param {Number} [position] - The new absolute position or nothing to leave it unchanged.
   * @returns {Number} - The absolute position of the current item.
   */
  Owl.prototype.current = function (position) {
    if (position === undefined) {
      return this._current;
    }
    if (this._items.length === 0) {
      return undefined;
    }
    position = this.normalize(position);
    if (this._current !== position) {
      var event = this.trigger('change', {
        property: {
          name: 'position',
          value: position
        }
      });
      if (event.data !== undefined) {
        position = this.normalize(event.data);
      }
      this._current = position;
      this.invalidate('position');
      this.trigger('changed', {
        property: {
          name: 'position',
          value: this._current
        }
      });
    }
    return this._current;
  };

  /**
   * Invalidates the given part of the update routine.
   * @param {String} [part] - The part to invalidate.
   * @returns {Array.<String>} - The invalidated parts.
   */
  Owl.prototype.invalidate = function (part) {
    if ($.type(part) === 'string') {
      this._invalidated[part] = true;
      this.is('valid') && this.leave('valid');
    }
    return $.map(this._invalidated, function (v, i) {
      return i;
    });
  };

  /**
   * Resets the absolute position of the current item.
   * @public
   * @param {Number} position - The absolute position of the new item.
   */
  Owl.prototype.reset = function (position) {
    position = this.normalize(position);
    if (position === undefined) {
      return;
    }
    this._speed = 0;
    this._current = position;
    this.suppress(['translate', 'translated']);
    this.animate(this.coordinates(position));
    this.release(['translate', 'translated']);
  };

  /**
   * Normalizes an absolute or a relative position of an item.
   * @public
   * @param {Number} position - The absolute or relative position to normalize.
   * @param {Boolean} [relative=false] - Whether the given position is relative or not.
   * @returns {Number} - The normalized position.
   */
  Owl.prototype.normalize = function (position, relative) {
    var n = this._items.length,
      m = relative ? 0 : this._clones.length;
    if (!this.isNumeric(position) || n < 1) {
      position = undefined;
    } else if (position < 0 || position >= n + m) {
      position = ((position - m / 2) % n + n) % n + m / 2;
    }
    return position;
  };

  /**
   * Converts an absolute position of an item into a relative one.
   * @public
   * @param {Number} position - The absolute position to convert.
   * @returns {Number} - The converted position.
   */
  Owl.prototype.relative = function (position) {
    position -= this._clones.length / 2;
    return this.normalize(position, true);
  };

  /**
   * Gets the maximum position for the current item.
   * @public
   * @param {Boolean} [relative=false] - Whether to return an absolute position or a relative position.
   * @returns {Number}
   */
  Owl.prototype.maximum = function (relative) {
    var settings = this.settings,
      maximum = this._coordinates.length,
      iterator,
      reciprocalItemsWidth,
      elementWidth;
    if (settings.loop) {
      maximum = this._clones.length / 2 + this._items.length - 1;
    } else if (settings.autoWidth || settings.merge) {
      iterator = this._items.length;
      if (iterator) {
        reciprocalItemsWidth = this._items[--iterator].width();
        elementWidth = this.$element.width();
        while (iterator--) {
          reciprocalItemsWidth += this._items[iterator].width() + this.settings.margin;
          if (reciprocalItemsWidth > elementWidth) {
            break;
          }
        }
      }
      maximum = iterator + 1;
    } else if (settings.center) {
      maximum = this._items.length - 1;
    } else {
      maximum = this._items.length - settings.items;
    }
    if (relative) {
      maximum -= this._clones.length / 2;
    }
    return Math.max(maximum, 0);
  };

  /**
   * Gets the minimum position for the current item.
   * @public
   * @param {Boolean} [relative=false] - Whether to return an absolute position or a relative position.
   * @returns {Number}
   */
  Owl.prototype.minimum = function (relative) {
    return relative ? 0 : this._clones.length / 2;
  };

  /**
   * Gets an item at the specified relative position.
   * @public
   * @param {Number} [position] - The relative position of the item.
   * @return {jQuery|Array.<jQuery>} - The item at the given position or all items if no position was given.
   */
  Owl.prototype.items = function (position) {
    if (position === undefined) {
      return this._items.slice();
    }
    position = this.normalize(position, true);
    return this._items[position];
  };

  /**
   * Gets an item at the specified relative position.
   * @public
   * @param {Number} [position] - The relative position of the item.
   * @return {jQuery|Array.<jQuery>} - The item at the given position or all items if no position was given.
   */
  Owl.prototype.mergers = function (position) {
    if (position === undefined) {
      return this._mergers.slice();
    }
    position = this.normalize(position, true);
    return this._mergers[position];
  };

  /**
   * Gets the absolute positions of clones for an item.
   * @public
   * @param {Number} [position] - The relative position of the item.
   * @returns {Array.<Number>} - The absolute positions of clones for the item or all if no position was given.
   */
  Owl.prototype.clones = function (position) {
    var odd = this._clones.length / 2,
      even = odd + this._items.length,
      map = function map(index) {
        return index % 2 === 0 ? even + index / 2 : odd - (index + 1) / 2;
      };
    if (position === undefined) {
      return $.map(this._clones, function (v, i) {
        return map(i);
      });
    }
    return $.map(this._clones, function (v, i) {
      return v === position ? map(i) : null;
    });
  };

  /**
   * Sets the current animation speed.
   * @public
   * @param {Number} [speed] - The animation speed in milliseconds or nothing to leave it unchanged.
   * @returns {Number} - The current animation speed in milliseconds.
   */
  Owl.prototype.speed = function (speed) {
    if (speed !== undefined) {
      this._speed = speed;
    }
    return this._speed;
  };

  /**
   * Gets the coordinate of an item.
   * @todo The name of this method is missleanding.
   * @public
   * @param {Number} position - The absolute position of the item within `minimum()` and `maximum()`.
   * @returns {Number|Array.<Number>} - The coordinate of the item in pixel or all coordinates.
   */
  Owl.prototype.coordinates = function (position) {
    var multiplier = 1,
      newPosition = position - 1,
      coordinate;
    if (position === undefined) {
      return $.map(this._coordinates, $.proxy(function (coordinate, index) {
        return this.coordinates(index);
      }, this));
    }
    if (this.settings.center) {
      if (this.settings.rtl) {
        multiplier = -1;
        newPosition = position + 1;
      }
      coordinate = this._coordinates[position];
      coordinate += (this.width() - coordinate + (this._coordinates[newPosition] || 0)) / 2 * multiplier;
    } else {
      coordinate = this._coordinates[newPosition] || 0;
    }
    coordinate = Math.ceil(coordinate);
    return coordinate;
  };

  /**
   * Calculates the speed for a translation.
   * @protected
   * @param {Number} from - The absolute position of the start item.
   * @param {Number} to - The absolute position of the target item.
   * @param {Number} [factor=undefined] - The time factor in milliseconds.
   * @returns {Number} - The time in milliseconds for the translation.
   */
  Owl.prototype.duration = function (from, to, factor) {
    if (factor === 0) {
      return 0;
    }
    return Math.min(Math.max(Math.abs(to - from), 1), 6) * Math.abs(factor || this.settings.smartSpeed);
  };

  /**
   * Slides to the specified item.
   * @public
   * @param {Number} position - The position of the item.
   * @param {Number} [speed] - The time in milliseconds for the transition.
   */
  Owl.prototype.to = function (position, speed) {
    var current = this.current(),
      revert = null,
      distance = position - this.relative(current),
      direction = (distance > 0) - (distance < 0),
      items = this._items.length,
      minimum = this.minimum(),
      maximum = this.maximum();
    if (this.settings.loop) {
      if (!this.settings.rewind && Math.abs(distance) > items / 2) {
        distance += direction * -1 * items;
      }
      position = current + distance;
      revert = ((position - minimum) % items + items) % items + minimum;
      if (revert !== position && revert - distance <= maximum && revert - distance > 0) {
        current = revert - distance;
        position = revert;
        this.reset(current);
      }
    } else if (this.settings.rewind) {
      maximum += 1;
      position = (position % maximum + maximum) % maximum;
    } else {
      position = Math.max(minimum, Math.min(maximum, position));
    }
    this.speed(this.duration(current, position, speed));
    this.current(position);
    if (this.isVisible()) {
      this.update();
    }
  };

  /**
   * Slides to the next item.
   * @public
   * @param {Number} [speed] - The time in milliseconds for the transition.
   */
  Owl.prototype.next = function (speed) {
    speed = speed || false;
    this.to(this.relative(this.current()) + 1, speed);
  };

  /**
   * Slides to the previous item.
   * @public
   * @param {Number} [speed] - The time in milliseconds for the transition.
   */
  Owl.prototype.prev = function (speed) {
    speed = speed || false;
    this.to(this.relative(this.current()) - 1, speed);
  };

  /**
   * Handles the end of an animation.
   * @protected
   * @param {Event} event - The event arguments.
   */
  Owl.prototype.onTransitionEnd = function (event) {
    // if css2 animation then event object is undefined
    if (event !== undefined) {
      event.stopPropagation();

      // Catch only owl-stage transitionEnd event
      if ((event.target || event.srcElement || event.originalTarget) !== this.$stage.get(0)) {
        return false;
      }
    }
    this.leave('animating');
    this.trigger('translated');
  };

  /**
   * Gets viewport width.
   * @protected
   * @return {Number} - The width in pixel.
   */
  Owl.prototype.viewport = function () {
    var width;
    if (this.options.responsiveBaseElement !== window) {
      width = $(this.options.responsiveBaseElement).width();
    } else if (window.innerWidth) {
      width = window.innerWidth;
    } else if (document.documentElement && document.documentElement.clientWidth) {
      width = document.documentElement.clientWidth;
    } else {
      console.warn('Can not detect viewport width.');
    }
    return width;
  };

  /**
   * Replaces the current content.
   * @public
   * @param {HTMLElement|jQuery|String} content - The new content.
   */
  Owl.prototype.replace = function (content) {
    this.$stage.empty();
    this._items = [];
    if (content) {
      content = content instanceof jQuery ? content : $(content);
    }
    if (this.settings.nestedItemSelector) {
      content = content.find('.' + this.settings.nestedItemSelector);
    }
    content.filter(function () {
      return this.nodeType === 1;
    }).each($.proxy(function (index, item) {
      item = this.prepare(item);
      this.$stage.append(item);
      this._items.push(item);
      this._mergers.push(item.find('[data-merge]').addBack('[data-merge]').attr('data-merge') * 1 || 1);
    }, this));
    this.reset(this.isNumeric(this.settings.startPosition) ? this.settings.startPosition : 0);
    this.invalidate('items');
  };

  /**
   * Adds an item.
   * @todo Use `item` instead of `content` for the event arguments.
   * @public
   * @param {HTMLElement|jQuery|String} content - The item content to add.
   * @param {Number} [position] - The relative position at which to insert the item otherwise the item will be added to the end.
   */
  Owl.prototype.add = function (content, position) {
    var current = this.relative(this._current);
    position = position === undefined ? this._items.length : this.normalize(position, true);
    content = content instanceof jQuery ? content : $(content);
    this.trigger('add', {
      content: content,
      position: position
    });
    content = this.prepare(content);
    if (this._items.length === 0 || position === this._items.length) {
      this._items.length === 0 && this.$stage.append(content);
      this._items.length !== 0 && this._items[position - 1].after(content);
      this._items.push(content);
      this._mergers.push(content.find('[data-merge]').addBack('[data-merge]').attr('data-merge') * 1 || 1);
    } else {
      this._items[position].before(content);
      this._items.splice(position, 0, content);
      this._mergers.splice(position, 0, content.find('[data-merge]').addBack('[data-merge]').attr('data-merge') * 1 || 1);
    }
    this._items[current] && this.reset(this._items[current].index());
    this.invalidate('items');
    this.trigger('added', {
      content: content,
      position: position
    });
  };

  /**
   * Removes an item by its position.
   * @todo Use `item` instead of `content` for the event arguments.
   * @public
   * @param {Number} position - The relative position of the item to remove.
   */
  Owl.prototype.remove = function (position) {
    position = this.normalize(position, true);
    if (position === undefined) {
      return;
    }
    this.trigger('remove', {
      content: this._items[position],
      position: position
    });
    this._items[position].remove();
    this._items.splice(position, 1);
    this._mergers.splice(position, 1);
    this.invalidate('items');
    this.trigger('removed', {
      content: null,
      position: position
    });
  };

  /**
   * Preloads images with auto width.
   * @todo Replace by a more generic approach
   * @protected
   */
  Owl.prototype.preloadAutoWidthImages = function (images) {
    images.each($.proxy(function (i, element) {
      this.enter('pre-loading');
      element = $(element);
      $(new Image()).one('load', $.proxy(function (e) {
        element.attr('src', e.target.src);
        element.css('opacity', 1);
        this.leave('pre-loading');
        !this.is('pre-loading') && !this.is('initializing') && this.refresh();
      }, this)).attr('src', element.attr('src') || element.attr('data-src') || element.attr('data-src-retina'));
    }, this));
  };

  /**
   * Destroys the carousel.
   * @public
   */
  Owl.prototype.destroy = function () {
    this.$element.off('.owl.core');
    this.$stage.off('.owl.core');
    $(document).off('.owl.core');
    if (this.settings.responsive !== false) {
      window.clearTimeout(this.resizeTimer);
      this.off(window, 'resize', this._handlers.onThrottledResize);
    }
    for (var i in this._plugins) {
      this._plugins[i].destroy();
    }
    this.$stage.children('.cloned').remove();
    this.$stage.unwrap();
    this.$stage.children().contents().unwrap();
    this.$stage.children().unwrap();
    this.$stage.remove();
    this.$element.removeClass(this.options.refreshClass).removeClass(this.options.loadingClass).removeClass(this.options.loadedClass).removeClass(this.options.rtlClass).removeClass(this.options.dragClass).removeClass(this.options.grabClass).attr('class', this.$element.attr('class').replace(new RegExp(this.options.responsiveClass + '-\\S+\\s', 'g'), '')).removeData('owl.carousel');
  };

  /**
   * Operators to calculate right-to-left and left-to-right.
   * @protected
   * @param {Number} [a] - The left side operand.
   * @param {String} [o] - The operator.
   * @param {Number} [b] - The right side operand.
   */
  Owl.prototype.op = function (a, o, b) {
    var rtl = this.settings.rtl;
    switch (o) {
      case '<':
        return rtl ? a > b : a < b;
      case '>':
        return rtl ? a < b : a > b;
      case '>=':
        return rtl ? a <= b : a >= b;
      case '<=':
        return rtl ? a >= b : a <= b;
      default:
        break;
    }
  };

  /**
   * Attaches to an internal event.
   * @protected
   * @param {HTMLElement} element - The event source.
   * @param {String} event - The event name.
   * @param {Function} listener - The event handler to attach.
   * @param {Boolean} capture - Wether the event should be handled at the capturing phase or not.
   */
  Owl.prototype.on = function (element, event, listener, capture) {
    if (element.addEventListener) {
      element.addEventListener(event, listener, capture);
    } else if (element.attachEvent) {
      element.attachEvent('on' + event, listener);
    }
  };

  /**
   * Detaches from an internal event.
   * @protected
   * @param {HTMLElement} element - The event source.
   * @param {String} event - The event name.
   * @param {Function} listener - The attached event handler to detach.
   * @param {Boolean} capture - Wether the attached event handler was registered as a capturing listener or not.
   */
  Owl.prototype.off = function (element, event, listener, capture) {
    if (element.removeEventListener) {
      element.removeEventListener(event, listener, capture);
    } else if (element.detachEvent) {
      element.detachEvent('on' + event, listener);
    }
  };

  /**
   * Triggers a public event.
   * @todo Remove `status`, `relatedTarget` should be used instead.
   * @protected
   * @param {String} name - The event name.
   * @param {*} [data=null] - The event data.
   * @param {String} [namespace=carousel] - The event namespace.
   * @param {String} [state] - The state which is associated with the event.
   * @param {Boolean} [enter=false] - Indicates if the call enters the specified state or not.
   * @returns {Event} - The event arguments.
   */
  Owl.prototype.trigger = function (name, data, namespace, state, enter) {
    var status = {
        item: {
          count: this._items.length,
          index: this.current()
        }
      },
      handler = $.camelCase($.grep(['on', name, namespace], function (v) {
        return v;
      }).join('-').toLowerCase()),
      event = $.Event([name, 'owl', namespace || 'carousel'].join('.').toLowerCase(), $.extend({
        relatedTarget: this
      }, status, data));
    if (!this._supress[name]) {
      $.each(this._plugins, function (name, plugin) {
        if (plugin.onTrigger) {
          plugin.onTrigger(event);
        }
      });
      this.register({
        type: Owl.Type.Event,
        name: name
      });
      this.$element.trigger(event);
      if (this.settings && typeof this.settings[handler] === 'function') {
        this.settings[handler].call(this, event);
      }
    }
    return event;
  };

  /**
   * Enters a state.
   * @param name - The state name.
   */
  Owl.prototype.enter = function (name) {
    $.each([name].concat(this._states.tags[name] || []), $.proxy(function (i, name) {
      if (this._states.current[name] === undefined) {
        this._states.current[name] = 0;
      }
      this._states.current[name]++;
    }, this));
  };

  /**
   * Leaves a state.
   * @param name - The state name.
   */
  Owl.prototype.leave = function (name) {
    $.each([name].concat(this._states.tags[name] || []), $.proxy(function (i, name) {
      this._states.current[name]--;
    }, this));
  };

  /**
   * Registers an event or state.
   * @public
   * @param {Object} object - The event or state to register.
   */
  Owl.prototype.register = function (object) {
    if (object.type === Owl.Type.Event) {
      if (!$.event.special[object.name]) {
        $.event.special[object.name] = {};
      }
      if (!$.event.special[object.name].owl) {
        var _default = $.event.special[object.name]._default;
        $.event.special[object.name]._default = function (e) {
          if (_default && _default.apply && (!e.namespace || e.namespace.indexOf('owl') === -1)) {
            return _default.apply(this, arguments);
          }
          return e.namespace && e.namespace.indexOf('owl') > -1;
        };
        $.event.special[object.name].owl = true;
      }
    } else if (object.type === Owl.Type.State) {
      if (!this._states.tags[object.name]) {
        this._states.tags[object.name] = object.tags;
      } else {
        this._states.tags[object.name] = this._states.tags[object.name].concat(object.tags);
      }
      this._states.tags[object.name] = $.grep(this._states.tags[object.name], $.proxy(function (tag, i) {
        return $.inArray(tag, this._states.tags[object.name]) === i;
      }, this));
    }
  };

  /**
   * Suppresses events.
   * @protected
   * @param {Array.<String>} events - The events to suppress.
   */
  Owl.prototype.suppress = function (events) {
    $.each(events, $.proxy(function (index, event) {
      this._supress[event] = true;
    }, this));
  };

  /**
   * Releases suppressed events.
   * @protected
   * @param {Array.<String>} events - The events to release.
   */
  Owl.prototype.release = function (events) {
    $.each(events, $.proxy(function (index, event) {
      delete this._supress[event];
    }, this));
  };

  /**
   * Gets unified pointer coordinates from event.
   * @todo #261
   * @protected
   * @param {Event} - The `mousedown` or `touchstart` event.
   * @returns {Object} - Contains `x` and `y` coordinates of current pointer position.
   */
  Owl.prototype.pointer = function (event) {
    var result = {
      x: null,
      y: null
    };
    event = event.originalEvent || event || window.event;
    event = event.touches && event.touches.length ? event.touches[0] : event.changedTouches && event.changedTouches.length ? event.changedTouches[0] : event;
    if (event.pageX) {
      result.x = event.pageX;
      result.y = event.pageY;
    } else {
      result.x = event.clientX;
      result.y = event.clientY;
    }
    return result;
  };

  /**
   * Determines if the input is a Number or something that can be coerced to a Number
   * @protected
   * @param {Number|String|Object|Array|Boolean|RegExp|Function|Symbol} - The input to be tested
   * @returns {Boolean} - An indication if the input is a Number or can be coerced to a Number
   */
  Owl.prototype.isNumeric = function (number) {
    return !isNaN(parseFloat(number));
  };

  /**
   * Gets the difference of two vectors.
   * @todo #261
   * @protected
   * @param {Object} - The first vector.
   * @param {Object} - The second vector.
   * @returns {Object} - The difference.
   */
  Owl.prototype.difference = function (first, second) {
    return {
      x: first.x - second.x,
      y: first.y - second.y
    };
  };

  /**
   * The jQuery Plugin for the Owl Carousel
   * @todo Navigation plugin `next` and `prev`
   * @public
   */
  $.fn.owlCarousel = function (option) {
    var args = Array.prototype.slice.call(arguments, 1);
    return this.each(function () {
      var $this = $(this),
        data = $this.data('owl.carousel');
      if (!data) {
        data = new Owl(this, _typeof(option) == 'object' && option);
        $this.data('owl.carousel', data);
        $.each(['next', 'prev', 'to', 'destroy', 'refresh', 'replace', 'add', 'remove'], function (i, event) {
          data.register({
            type: Owl.Type.Event,
            name: event
          });
          data.$element.on(event + '.owl.carousel.core', $.proxy(function (e) {
            if (e.namespace && e.relatedTarget !== this) {
              this.suppress([event]);
              data[event].apply(this, [].slice.call(arguments, 1));
              this.release([event]);
            }
          }, data));
        });
      }
      if (typeof option == 'string' && option.charAt(0) !== '_') {
        data[option].apply(data, args);
      }
    });
  };

  /**
   * The constructor for the jQuery Plugin
   * @public
   */
  $.fn.owlCarousel.Constructor = Owl;
})(window.Zepto || window.jQuery, window, document);

/**
 * AutoRefresh Plugin
 * @version 2.3.4
 * @author Artus Kolanowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;
(function ($, window, document, undefined) {
  /**
   * Creates the auto refresh plugin.
   * @class The Auto Refresh Plugin
   * @param {Owl} carousel - The Owl Carousel
   */
  var AutoRefresh = function AutoRefresh(carousel) {
    /**
     * Reference to the core.
     * @protected
     * @type {Owl}
     */
    this._core = carousel;

    /**
     * Refresh interval.
     * @protected
     * @type {number}
     */
    this._interval = null;

    /**
     * Whether the element is currently visible or not.
     * @protected
     * @type {Boolean}
     */
    this._visible = null;

    /**
     * All event handlers.
     * @protected
     * @type {Object}
     */
    this._handlers = {
      'initialized.owl.carousel': $.proxy(function (e) {
        if (e.namespace && this._core.settings.autoRefresh) {
          this.watch();
        }
      }, this)
    };

    // set default options
    this._core.options = $.extend({}, AutoRefresh.Defaults, this._core.options);

    // register event handlers
    this._core.$element.on(this._handlers);
  };

  /**
   * Default options.
   * @public
   */
  AutoRefresh.Defaults = {
    autoRefresh: true,
    autoRefreshInterval: 500
  };

  /**
   * Watches the element.
   */
  AutoRefresh.prototype.watch = function () {
    if (this._interval) {
      return;
    }
    this._visible = this._core.isVisible();
    this._interval = window.setInterval($.proxy(this.refresh, this), this._core.settings.autoRefreshInterval);
  };

  /**
   * Refreshes the element.
   */
  AutoRefresh.prototype.refresh = function () {
    if (this._core.isVisible() === this._visible) {
      return;
    }
    this._visible = !this._visible;
    this._core.$element.toggleClass('owl-hidden', !this._visible);
    this._visible && this._core.invalidate('width') && this._core.refresh();
  };

  /**
   * Destroys the plugin.
   */
  AutoRefresh.prototype.destroy = function () {
    var handler, property;
    window.clearInterval(this._interval);
    for (handler in this._handlers) {
      this._core.$element.off(handler, this._handlers[handler]);
    }
    for (property in Object.getOwnPropertyNames(this)) {
      typeof this[property] != 'function' && (this[property] = null);
    }
  };
  $.fn.owlCarousel.Constructor.Plugins.AutoRefresh = AutoRefresh;
})(window.Zepto || window.jQuery, window, document);

/**
 * Lazy Plugin
 * @version 2.3.4
 * @author Bartosz Wojciechowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;
(function ($, window, document, undefined) {
  /**
   * Creates the lazy plugin.
   * @class The Lazy Plugin
   * @param {Owl} carousel - The Owl Carousel
   */
  var Lazy = function Lazy(carousel) {
    /**
     * Reference to the core.
     * @protected
     * @type {Owl}
     */
    this._core = carousel;

    /**
     * Already loaded items.
     * @protected
     * @type {Array.<jQuery>}
     */
    this._loaded = [];

    /**
     * Event handlers.
     * @protected
     * @type {Object}
     */
    this._handlers = {
      'initialized.owl.carousel change.owl.carousel resized.owl.carousel': $.proxy(function (e) {
        if (!e.namespace) {
          return;
        }
        if (!this._core.settings || !this._core.settings.lazyLoad) {
          return;
        }
        if (e.property && e.property.name == 'position' || e.type == 'initialized') {
          var settings = this._core.settings,
            n = settings.center && Math.ceil(settings.items / 2) || settings.items,
            i = settings.center && n * -1 || 0,
            position = (e.property && e.property.value !== undefined ? e.property.value : this._core.current()) + i,
            clones = this._core.clones().length,
            load = $.proxy(function (i, v) {
              this.load(v);
            }, this);
          //TODO: Need documentation for this new option
          if (settings.lazyLoadEager > 0) {
            n += settings.lazyLoadEager;
            // If the carousel is looping also preload images that are to the "left"
            if (settings.loop) {
              position -= settings.lazyLoadEager;
              n++;
            }
          }
          while (i++ < n) {
            this.load(clones / 2 + this._core.relative(position));
            clones && $.each(this._core.clones(this._core.relative(position)), load);
            position++;
          }
        }
      }, this)
    };

    // set the default options
    this._core.options = $.extend({}, Lazy.Defaults, this._core.options);

    // register event handler
    this._core.$element.on(this._handlers);
  };

  /**
   * Default options.
   * @public
   */
  Lazy.Defaults = {
    lazyLoad: false,
    lazyLoadEager: 0
  };

  /**
   * Loads all resources of an item at the specified position.
   * @param {Number} position - The absolute position of the item.
   * @protected
   */
  Lazy.prototype.load = function (position) {
    var $item = this._core.$stage.children().eq(position),
      $elements = $item && $item.find('.owl-lazy');
    if (!$elements || $.inArray($item.get(0), this._loaded) > -1) {
      return;
    }
    $elements.each($.proxy(function (index, element) {
      var $element = $(element),
        image,
        url = window.devicePixelRatio > 1 && $element.attr('data-src-retina') || $element.attr('data-src') || $element.attr('data-srcset');
      this._core.trigger('load', {
        element: $element,
        url: url
      }, 'lazy');
      if ($element.is('img')) {
        $element.one('load.owl.lazy', $.proxy(function () {
          $element.css('opacity', 1);
          this._core.trigger('loaded', {
            element: $element,
            url: url
          }, 'lazy');
        }, this)).attr('src', url);
      } else if ($element.is('source')) {
        $element.one('load.owl.lazy', $.proxy(function () {
          this._core.trigger('loaded', {
            element: $element,
            url: url
          }, 'lazy');
        }, this)).attr('srcset', url);
      } else {
        image = new Image();
        image.onload = $.proxy(function () {
          $element.css({
            'background-image': 'url("' + url + '")',
            'opacity': '1'
          });
          this._core.trigger('loaded', {
            element: $element,
            url: url
          }, 'lazy');
        }, this);
        image.src = url;
      }
    }, this));
    this._loaded.push($item.get(0));
  };

  /**
   * Destroys the plugin.
   * @public
   */
  Lazy.prototype.destroy = function () {
    var handler, property;
    for (handler in this.handlers) {
      this._core.$element.off(handler, this.handlers[handler]);
    }
    for (property in Object.getOwnPropertyNames(this)) {
      typeof this[property] != 'function' && (this[property] = null);
    }
  };
  $.fn.owlCarousel.Constructor.Plugins.Lazy = Lazy;
})(window.Zepto || window.jQuery, window, document);

/**
 * AutoHeight Plugin
 * @version 2.3.4
 * @author Bartosz Wojciechowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;
(function ($, window, document, undefined) {
  /**
   * Creates the auto height plugin.
   * @class The Auto Height Plugin
   * @param {Owl} carousel - The Owl Carousel
   */
  var AutoHeight = function AutoHeight(carousel) {
    /**
     * Reference to the core.
     * @protected
     * @type {Owl}
     */
    this._core = carousel;
    this._previousHeight = null;

    /**
     * All event handlers.
     * @protected
     * @type {Object}
     */
    this._handlers = {
      'initialized.owl.carousel refreshed.owl.carousel': $.proxy(function (e) {
        if (e.namespace && this._core.settings.autoHeight) {
          this.update();
        }
      }, this),
      'changed.owl.carousel': $.proxy(function (e) {
        if (e.namespace && this._core.settings.autoHeight && e.property.name === 'position') {
          this.update();
        }
      }, this),
      'loaded.owl.lazy': $.proxy(function (e) {
        if (e.namespace && this._core.settings.autoHeight && e.element.closest('.' + this._core.settings.itemClass).index() === this._core.current()) {
          this.update();
        }
      }, this)
    };

    // set default options
    this._core.options = $.extend({}, AutoHeight.Defaults, this._core.options);

    // register event handlers
    this._core.$element.on(this._handlers);
    this._intervalId = null;
    var refThis = this;

    // These changes have been taken from a PR by gavrochelegnou proposed in #1575
    // and have been made compatible with the latest jQuery version
    $(window).on('load', function () {
      if (refThis._core.settings.autoHeight) {
        refThis.update();
      }
    });

    // Autoresize the height of the carousel when window is resized
    // When carousel has images, the height is dependent on the width
    // and should also change on resize
    $(window).resize(function () {
      if (refThis._core.settings.autoHeight) {
        if (refThis._intervalId != null) {
          clearTimeout(refThis._intervalId);
        }
        refThis._intervalId = setTimeout(function () {
          refThis.update();
        }, 250);
      }
    });
  };

  /**
   * Default options.
   * @public
   */
  AutoHeight.Defaults = {
    autoHeight: false,
    autoHeightClass: 'owl-height'
  };

  /**
   * Updates the view.
   */
  AutoHeight.prototype.update = function () {
    var start = this._core._current,
      end = start + this._core.settings.items,
      lazyLoadEnabled = this._core.settings.lazyLoad,
      visible = this._core.$stage.children().toArray().slice(start, end),
      heights = [],
      maxheight = 0;
    $.each(visible, function (index, item) {
      heights.push($(item).height());
    });
    maxheight = Math.max.apply(null, heights);
    if (maxheight <= 1 && lazyLoadEnabled && this._previousHeight) {
      maxheight = this._previousHeight;
    }
    this._previousHeight = maxheight;
    this._core.$stage.parent().height(maxheight).addClass(this._core.settings.autoHeightClass);
  };
  AutoHeight.prototype.destroy = function () {
    var handler, property;
    for (handler in this._handlers) {
      this._core.$element.off(handler, this._handlers[handler]);
    }
    for (property in Object.getOwnPropertyNames(this)) {
      typeof this[property] !== 'function' && (this[property] = null);
    }
  };
  $.fn.owlCarousel.Constructor.Plugins.AutoHeight = AutoHeight;
})(window.Zepto || window.jQuery, window, document);

/**
 * Video Plugin
 * @version 2.3.4
 * @author Bartosz Wojciechowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;
(function ($, window, document, undefined) {
  /**
   * Creates the video plugin.
   * @class The Video Plugin
   * @param {Owl} carousel - The Owl Carousel
   */
  var Video = function Video(carousel) {
    /**
     * Reference to the core.
     * @protected
     * @type {Owl}
     */
    this._core = carousel;

    /**
     * Cache all video URLs.
     * @protected
     * @type {Object}
     */
    this._videos = {};

    /**
     * Current playing item.
     * @protected
     * @type {jQuery}
     */
    this._playing = null;

    /**
     * All event handlers.
     * @todo The cloned content removale is too late
     * @protected
     * @type {Object}
     */
    this._handlers = {
      'initialized.owl.carousel': $.proxy(function (e) {
        if (e.namespace) {
          this._core.register({
            type: 'state',
            name: 'playing',
            tags: ['interacting']
          });
        }
      }, this),
      'resize.owl.carousel': $.proxy(function (e) {
        if (e.namespace && this._core.settings.video && this.isInFullScreen()) {
          e.preventDefault();
        }
      }, this),
      'refreshed.owl.carousel': $.proxy(function (e) {
        if (e.namespace && this._core.is('resizing')) {
          this._core.$stage.find('.cloned .owl-video-frame').remove();
        }
      }, this),
      'changed.owl.carousel': $.proxy(function (e) {
        if (e.namespace && e.property.name === 'position' && this._playing) {
          this.stop();
        }
      }, this),
      'prepared.owl.carousel': $.proxy(function (e) {
        if (!e.namespace) {
          return;
        }
        var $element = $(e.content).find('.owl-video');
        if ($element.length) {
          $element.css('display', 'none');
          this.fetch($element, $(e.content));
        }
      }, this)
    };

    // set default options
    this._core.options = $.extend({}, Video.Defaults, this._core.options);

    // register event handlers
    this._core.$element.on(this._handlers);
    this._core.$element.on('click.owl.video', '.owl-video-play-icon', $.proxy(function (e) {
      this.play(e);
    }, this));
  };

  /**
   * Default options.
   * @public
   */
  Video.Defaults = {
    video: false,
    videoHeight: false,
    videoWidth: false
  };

  /**
   * Gets the video ID and the type (YouTube/Vimeo/vzaar only).
   * @protected
   * @param {jQuery} target - The target containing the video data.
   * @param {jQuery} item - The item containing the video.
   */
  Video.prototype.fetch = function (target, item) {
    var type = function () {
        if (target.attr('data-vimeo-id')) {
          return 'vimeo';
        } else if (target.attr('data-vzaar-id')) {
          return 'vzaar';
        } else {
          return 'youtube';
        }
      }(),
      id = target.attr('data-vimeo-id') || target.attr('data-youtube-id') || target.attr('data-vzaar-id'),
      width = target.attr('data-width') || this._core.settings.videoWidth,
      height = target.attr('data-height') || this._core.settings.videoHeight,
      url = target.attr('href');
    if (url) {
      /*
      		Parses the id's out of the following urls (and probably more):
      		https://www.youtube.com/watch?v=:id
      		https://youtu.be/:id
      		https://vimeo.com/:id
      		https://vimeo.com/channels/:channel/:id
      		https://vimeo.com/groups/:group/videos/:id
      		https://app.vzaar.com/videos/:id
      			Visual example: https://regexper.com/#(http%3A%7Chttps%3A%7C)%5C%2F%5C%2F(player.%7Cwww.%7Capp.)%3F(vimeo%5C.com%7Cyoutu(be%5C.com%7C%5C.be%7Cbe%5C.googleapis%5C.com)%7Cvzaar%5C.com)%5C%2F(video%5C%2F%7Cvideos%5C%2F%7Cembed%5C%2F%7Cchannels%5C%2F.%2B%5C%2F%7Cgroups%5C%2F.%2B%5C%2F%7Cwatch%5C%3Fv%3D%7Cv%5C%2F)%3F(%5BA-Za-z0-9._%25-%5D*)(%5C%26%5CS%2B)%3F
      */

      id = url.match(/(http:|https:|)\/\/(player.|www.|app.)?(vimeo\.com|youtu(be\.com|\.be|be\.googleapis\.com|be\-nocookie\.com)|vzaar\.com)\/(video\/|videos\/|embed\/|channels\/.+\/|groups\/.+\/|watch\?v=|v\/)?([A-Za-z0-9._%-]*)(\&\S+)?/);
      if (id[3].indexOf('youtu') > -1) {
        type = 'youtube';
      } else if (id[3].indexOf('vimeo') > -1) {
        type = 'vimeo';
      } else if (id[3].indexOf('vzaar') > -1) {
        type = 'vzaar';
      } else {
        throw new Error('Video URL not supported.');
      }
      id = id[6];
    } else {
      throw new Error('Missing video URL.');
    }
    this._videos[url] = {
      type: type,
      id: id,
      width: width,
      height: height
    };
    item.attr('data-video', url);
    this.thumbnail(target, this._videos[url]);
  };

  /**
   * Creates video thumbnail.
   * @protected
   * @param {jQuery} target - The target containing the video data.
   * @param {Object} info - The video info object.
   * @see `fetch`
   */
  Video.prototype.thumbnail = function (target, video) {
    var tnLink,
      icon,
      path,
      dimensions = video.width && video.height ? 'width:' + video.width + 'px;height:' + video.height + 'px;' : '',
      customTn = target.find('img'),
      srcType = 'src',
      lazyClass = '',
      settings = this._core.settings,
      create = function create(path) {
        icon = '<div class="owl-video-play-icon"></div>';
        if (settings.lazyLoad) {
          tnLink = $('<div/>', {
            "class": 'owl-video-tn ' + lazyClass,
            "srcType": path
          });
        } else {
          tnLink = $('<div/>', {
            "class": "owl-video-tn",
            "style": 'opacity:1;background-image:url(' + path + ')'
          });
        }
        target.after(tnLink);
        target.after(icon);
      };

    // wrap video content into owl-video-wrapper div
    target.wrap($('<div/>', {
      "class": "owl-video-wrapper",
      "style": dimensions
    }));
    if (this._core.settings.lazyLoad) {
      srcType = 'data-src';
      lazyClass = 'owl-lazy';
    }

    // custom thumbnail
    if (customTn.length) {
      create(customTn.attr(srcType));
      customTn.remove();
      return false;
    }
    if (video.type === 'youtube') {
      path = "//img.youtube.com/vi/" + video.id + "/hqdefault.jpg";
      create(path);
    } else if (video.type === 'vimeo') {
      $.ajax({
        type: 'GET',
        url: '//vimeo.com/api/v2/video/' + video.id + '.json',
        jsonp: 'callback',
        dataType: 'jsonp',
        success: function success(data) {
          path = data[0].thumbnail_large;
          create(path);
        }
      });
    } else if (video.type === 'vzaar') {
      $.ajax({
        type: 'GET',
        url: '//vzaar.com/api/videos/' + video.id + '.json',
        jsonp: 'callback',
        dataType: 'jsonp',
        success: function success(data) {
          path = data.framegrab_url;
          create(path);
        }
      });
    }
  };

  /**
   * Stops the current video.
   * @public
   */
  Video.prototype.stop = function () {
    this._core.trigger('stop', null, 'video');
    this._playing.find('.owl-video-frame').remove();
    this._playing.removeClass('owl-video-playing');
    this._playing = null;
    this._core.leave('playing');
    this._core.trigger('stopped', null, 'video');
  };

  /**
   * Starts the current video.
   * @public
   * @param {Event} event - The event arguments.
   */
  Video.prototype.play = function (event) {
    var target = $(event.target),
      item = target.closest('.' + this._core.settings.itemClass),
      video = this._videos[item.attr('data-video')],
      width = video.width || '100%',
      height = video.height || this._core.$stage.height(),
      html,
      iframe;
    if (this._playing) {
      return;
    }
    this._core.enter('playing');
    this._core.trigger('play', null, 'video');
    item = this._core.items(this._core.relative(item.index()));
    this._core.reset(item.index());
    html = $('<iframe frameborder="0" allowfullscreen mozallowfullscreen webkitAllowFullScreen ></iframe>');
    html.attr('height', height);
    html.attr('width', width);
    if (video.type === 'youtube') {
      html.attr('src', '//www.youtube.com/embed/' + video.id + '?autoplay=1&rel=0&v=' + video.id);
    } else if (video.type === 'vimeo') {
      html.attr('src', '//player.vimeo.com/video/' + video.id + '?autoplay=1');
    } else if (video.type === 'vzaar') {
      html.attr('src', '//view.vzaar.com/' + video.id + '/player?autoplay=true');
    }
    iframe = $(html).wrap('<div class="owl-video-frame" />').insertAfter(item.find('.owl-video'));
    this._playing = item.addClass('owl-video-playing');
  };

  /**
   * Checks whether an video is currently in full screen mode or not.
   * @todo Bad style because looks like a readonly method but changes members.
   * @protected
   * @returns {Boolean}
   */
  Video.prototype.isInFullScreen = function () {
    var element = document.fullscreenElement || document.mozFullScreenElement || document.webkitFullscreenElement;
    return element && $(element).parent().hasClass('owl-video-frame');
  };

  /**
   * Destroys the plugin.
   */
  Video.prototype.destroy = function () {
    var handler, property;
    this._core.$element.off('click.owl.video');
    for (handler in this._handlers) {
      this._core.$element.off(handler, this._handlers[handler]);
    }
    for (property in Object.getOwnPropertyNames(this)) {
      typeof this[property] != 'function' && (this[property] = null);
    }
  };
  $.fn.owlCarousel.Constructor.Plugins.Video = Video;
})(window.Zepto || window.jQuery, window, document);

/**
 * Animate Plugin
 * @version 2.3.4
 * @author Bartosz Wojciechowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;
(function ($, window, document, undefined) {
  /**
   * Creates the animate plugin.
   * @class The Navigation Plugin
   * @param {Owl} scope - The Owl Carousel
   */
  var Animate = function Animate(scope) {
    this.core = scope;
    this.core.options = $.extend({}, Animate.Defaults, this.core.options);
    this.swapping = true;
    this.previous = undefined;
    this.next = undefined;
    this.handlers = {
      'change.owl.carousel': $.proxy(function (e) {
        if (e.namespace && e.property.name == 'position') {
          this.previous = this.core.current();
          this.next = e.property.value;
        }
      }, this),
      'drag.owl.carousel dragged.owl.carousel translated.owl.carousel': $.proxy(function (e) {
        if (e.namespace) {
          this.swapping = e.type == 'translated';
        }
      }, this),
      'translate.owl.carousel': $.proxy(function (e) {
        if (e.namespace && this.swapping && (this.core.options.animateOut || this.core.options.animateIn)) {
          this.swap();
        }
      }, this)
    };
    this.core.$element.on(this.handlers);
  };

  /**
   * Default options.
   * @public
   */
  Animate.Defaults = {
    animateOut: false,
    animateIn: false
  };

  /**
   * Toggles the animation classes whenever an translations starts.
   * @protected
   * @returns {Boolean|undefined}
   */
  Animate.prototype.swap = function () {
    if (this.core.settings.items !== 1) {
      return;
    }
    if (!$.support.animation || !$.support.transition) {
      return;
    }
    this.core.speed(0);
    var left,
      clear = $.proxy(this.clear, this),
      previous = this.core.$stage.children().eq(this.previous),
      next = this.core.$stage.children().eq(this.next),
      incoming = this.core.settings.animateIn,
      outgoing = this.core.settings.animateOut;
    if (this.core.current() === this.previous) {
      return;
    }
    if (outgoing) {
      left = this.core.coordinates(this.previous) - this.core.coordinates(this.next);
      previous.one($.support.animation.end, clear).css({
        'left': left + 'px'
      }).addClass('animated owl-animated-out').addClass(outgoing);
    }
    if (incoming) {
      next.one($.support.animation.end, clear).addClass('animated owl-animated-in').addClass(incoming);
    }
  };
  Animate.prototype.clear = function (e) {
    $(e.target).css({
      'left': ''
    }).removeClass('animated owl-animated-out owl-animated-in').removeClass(this.core.settings.animateIn).removeClass(this.core.settings.animateOut);
    this.core.onTransitionEnd();
  };

  /**
   * Destroys the plugin.
   * @public
   */
  Animate.prototype.destroy = function () {
    var handler, property;
    for (handler in this.handlers) {
      this.core.$element.off(handler, this.handlers[handler]);
    }
    for (property in Object.getOwnPropertyNames(this)) {
      typeof this[property] != 'function' && (this[property] = null);
    }
  };
  $.fn.owlCarousel.Constructor.Plugins.Animate = Animate;
})(window.Zepto || window.jQuery, window, document);

/**
 * Autoplay Plugin
 * @version 2.3.4
 * @author Bartosz Wojciechowski
 * @author Artus Kolanowski
 * @author David Deutsch
 * @author Tom De Caluwé
 * @license The MIT License (MIT)
 */
;
(function ($, window, document, undefined) {
  /**
   * Creates the autoplay plugin.
   * @class The Autoplay Plugin
   * @param {Owl} scope - The Owl Carousel
   */
  var Autoplay = function Autoplay(carousel) {
    /**
     * Reference to the core.
     * @protected
     * @type {Owl}
     */
    this._core = carousel;

    /**
     * The autoplay timeout id.
     * @type {Number}
     */
    this._call = null;

    /**
     * Depending on the state of the plugin, this variable contains either
     * the start time of the timer or the current timer value if it's
     * paused. Since we start in a paused state we initialize the timer
     * value.
     * @type {Number}
     */
    this._time = 0;

    /**
     * Stores the timeout currently used.
     * @type {Number}
     */
    this._timeout = 0;

    /**
     * Indicates whenever the autoplay is paused.
     * @type {Boolean}
     */
    this._paused = true;

    /**
     * All event handlers.
     * @protected
     * @type {Object}
     */
    this._handlers = {
      'changed.owl.carousel': $.proxy(function (e) {
        if (e.namespace && e.property.name === 'settings') {
          if (this._core.settings.autoplay) {
            this.play();
          } else {
            this.stop();
          }
        } else if (e.namespace && e.property.name === 'position' && this._paused) {
          // Reset the timer. This code is triggered when the position
          // of the carousel was changed through user interaction.
          this._time = 0;
        }
      }, this),
      'initialized.owl.carousel': $.proxy(function (e) {
        if (e.namespace && this._core.settings.autoplay) {
          this.play();
        }
      }, this),
      'play.owl.autoplay': $.proxy(function (e, t, s) {
        if (e.namespace) {
          this.play(t, s);
        }
      }, this),
      'stop.owl.autoplay': $.proxy(function (e) {
        if (e.namespace) {
          this.stop();
        }
      }, this),
      'mouseover.owl.autoplay': $.proxy(function () {
        if (this._core.settings.autoplayHoverPause && this._core.is('rotating')) {
          this.pause();
        }
      }, this),
      'mouseleave.owl.autoplay': $.proxy(function () {
        if (this._core.settings.autoplayHoverPause && this._core.is('rotating')) {
          this.play();
        }
      }, this),
      'touchstart.owl.core': $.proxy(function () {
        if (this._core.settings.autoplayHoverPause && this._core.is('rotating')) {
          this.pause();
        }
      }, this),
      'touchend.owl.core': $.proxy(function () {
        if (this._core.settings.autoplayHoverPause) {
          this.play();
        }
      }, this)
    };

    // register event handlers
    this._core.$element.on(this._handlers);

    // set default options
    this._core.options = $.extend({}, Autoplay.Defaults, this._core.options);
  };

  /**
   * Default options.
   * @public
   */
  Autoplay.Defaults = {
    autoplay: false,
    autoplayTimeout: 5000,
    autoplayHoverPause: false,
    autoplaySpeed: false
  };

  /**
   * Transition to the next slide and set a timeout for the next transition.
   * @private
   * @param {Number} [speed] - The animation speed for the animations.
   */
  Autoplay.prototype._next = function (speed) {
    this._call = window.setTimeout($.proxy(this._next, this, speed), this._timeout * (Math.round(this.read() / this._timeout) + 1) - this.read());
    if (this._core.is('interacting') || document.hidden) {
      return;
    }
    this._core.next(speed || this._core.settings.autoplaySpeed);
  };

  /**
   * Reads the current timer value when the timer is playing.
   * @public
   */
  Autoplay.prototype.read = function () {
    return new Date().getTime() - this._time;
  };

  /**
   * Starts the autoplay.
   * @public
   * @param {Number} [timeout] - The interval before the next animation starts.
   * @param {Number} [speed] - The animation speed for the animations.
   */
  Autoplay.prototype.play = function (timeout, speed) {
    var elapsed;
    if (!this._core.is('rotating')) {
      this._core.enter('rotating');
    }
    timeout = timeout || this._core.settings.autoplayTimeout;

    // Calculate the elapsed time since the last transition. If the carousel
    // wasn't playing this calculation will yield zero.
    elapsed = Math.min(this._time % (this._timeout || timeout), timeout);
    if (this._paused) {
      // Start the clock.
      this._time = this.read();
      this._paused = false;
    } else {
      // Clear the active timeout to allow replacement.
      window.clearTimeout(this._call);
    }

    // Adjust the origin of the timer to match the new timeout value.
    this._time += this.read() % timeout - elapsed;
    this._timeout = timeout;
    this._call = window.setTimeout($.proxy(this._next, this, speed), timeout - elapsed);
  };

  /**
   * Stops the autoplay.
   * @public
   */
  Autoplay.prototype.stop = function () {
    if (this._core.is('rotating')) {
      // Reset the clock.
      this._time = 0;
      this._paused = true;
      window.clearTimeout(this._call);
      this._core.leave('rotating');
    }
  };

  /**
   * Pauses the autoplay.
   * @public
   */
  Autoplay.prototype.pause = function () {
    if (this._core.is('rotating') && !this._paused) {
      // Pause the clock.
      this._time = this.read();
      this._paused = true;
      window.clearTimeout(this._call);
    }
  };

  /**
   * Destroys the plugin.
   */
  Autoplay.prototype.destroy = function () {
    var handler, property;
    this.stop();
    for (handler in this._handlers) {
      this._core.$element.off(handler, this._handlers[handler]);
    }
    for (property in Object.getOwnPropertyNames(this)) {
      typeof this[property] != 'function' && (this[property] = null);
    }
  };
  $.fn.owlCarousel.Constructor.Plugins.autoplay = Autoplay;
})(window.Zepto || window.jQuery, window, document);

/**
 * Navigation Plugin
 * @version 2.3.4
 * @author Artus Kolanowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;
(function ($, window, document, undefined) {
  'use strict';

  /**
   * Creates the navigation plugin.
   * @class The Navigation Plugin
   * @param {Owl} carousel - The Owl Carousel.
   */
  var Navigation = function Navigation(carousel) {
    /**
     * Reference to the core.
     * @protected
     * @type {Owl}
     */
    this._core = carousel;

    /**
     * Indicates whether the plugin is initialized or not.
     * @protected
     * @type {Boolean}
     */
    this._initialized = false;

    /**
     * The current paging indexes.
     * @protected
     * @type {Array}
     */
    this._pages = [];

    /**
     * All DOM elements of the user interface.
     * @protected
     * @type {Object}
     */
    this._controls = {};

    /**
     * Markup for an indicator.
     * @protected
     * @type {Array.<String>}
     */
    this._templates = [];

    /**
     * The carousel element.
     * @type {jQuery}
     */
    this.$element = this._core.$element;

    /**
     * Overridden methods of the carousel.
     * @protected
     * @type {Object}
     */
    this._overrides = {
      next: this._core.next,
      prev: this._core.prev,
      to: this._core.to
    };

    /**
     * All event handlers.
     * @protected
     * @type {Object}
     */
    this._handlers = {
      'prepared.owl.carousel': $.proxy(function (e) {
        if (e.namespace && this._core.settings.dotsData) {
          this._templates.push('<div class="' + this._core.settings.dotClass + '">' + $(e.content).find('[data-dot]').addBack('[data-dot]').attr('data-dot') + '</div>');
        }
      }, this),
      'added.owl.carousel': $.proxy(function (e) {
        if (e.namespace && this._core.settings.dotsData) {
          this._templates.splice(e.position, 0, this._templates.pop());
        }
      }, this),
      'remove.owl.carousel': $.proxy(function (e) {
        if (e.namespace && this._core.settings.dotsData) {
          this._templates.splice(e.position, 1);
        }
      }, this),
      'changed.owl.carousel': $.proxy(function (e) {
        if (e.namespace && e.property.name == 'position') {
          this.draw();
        }
      }, this),
      'initialized.owl.carousel': $.proxy(function (e) {
        if (e.namespace && !this._initialized) {
          this._core.trigger('initialize', null, 'navigation');
          this.initialize();
          this.update();
          this.draw();
          this._initialized = true;
          this._core.trigger('initialized', null, 'navigation');
        }
      }, this),
      'refreshed.owl.carousel': $.proxy(function (e) {
        if (e.namespace && this._initialized) {
          this._core.trigger('refresh', null, 'navigation');
          this.update();
          this.draw();
          this._core.trigger('refreshed', null, 'navigation');
        }
      }, this)
    };

    // set default options
    this._core.options = $.extend({}, Navigation.Defaults, this._core.options);

    // register event handlers
    this.$element.on(this._handlers);
  };

  /**
   * Default options.
   * @public
   * @todo Rename `slideBy` to `navBy`
   */
  Navigation.Defaults = {
    nav: false,
    navText: ['<span aria-label="' + 'Previous' + '">&#x2039;</span>', '<span aria-label="' + 'Next' + '">&#x203a;</span>'],
    navSpeed: false,
    navElement: 'button type="button" role="presentation"',
    navContainer: false,
    navContainerClass: 'owl-nav',
    navClass: ['owl-prev', 'owl-next'],
    slideBy: 1,
    dotClass: 'owl-dot',
    dotsClass: 'owl-dots',
    dots: true,
    dotsEach: false,
    dotsData: false,
    dotsSpeed: false,
    dotsContainer: false
  };

  /**
   * Initializes the layout of the plugin and extends the carousel.
   * @protected
   */
  Navigation.prototype.initialize = function () {
    var override,
      settings = this._core.settings;

    // create DOM structure for relative navigation
    this._controls.$relative = (settings.navContainer ? $(settings.navContainer) : $('<div>').addClass(settings.navContainerClass).appendTo(this.$element)).addClass('disabled');
    this._controls.$previous = $('<' + settings.navElement + '>').addClass(settings.navClass[0]).html(settings.navText[0]).prependTo(this._controls.$relative).on('click', $.proxy(function (e) {
      this.prev(settings.navSpeed);
    }, this));
    this._controls.$next = $('<' + settings.navElement + '>').addClass(settings.navClass[1]).html(settings.navText[1]).appendTo(this._controls.$relative).on('click', $.proxy(function (e) {
      this.next(settings.navSpeed);
    }, this));

    // create DOM structure for absolute navigation
    if (!settings.dotsData) {
      this._templates = [$('<button role="button">').addClass(settings.dotClass).append($('<span>')).prop('outerHTML')];
    }
    this._controls.$absolute = (settings.dotsContainer ? $(settings.dotsContainer) : $('<div>').addClass(settings.dotsClass).appendTo(this.$element)).addClass('disabled');
    this._controls.$absolute.on('click', 'button', $.proxy(function (e) {
      var index = $(e.target).parent().is(this._controls.$absolute) ? $(e.target).index() : $(e.target).parent().index();
      e.preventDefault();
      this.to(index, settings.dotsSpeed);
    }, this));

    /*$el.on('focusin', function() {
    	$(document).off(".carousel");
    		$(document).on('keydown.carousel', function(e) {
    		if(e.keyCode == 37) {
    			$el.trigger('prev.owl')
    		}
    		if(e.keyCode == 39) {
    			$el.trigger('next.owl')
    		}
    	});
    });*/

    // override public methods of the carousel
    for (override in this._overrides) {
      this._core[override] = $.proxy(this[override], this);
    }
  };

  /**
   * Destroys the plugin.
   * @protected
   */
  Navigation.prototype.destroy = function () {
    var handler, control, property, override, settings;
    settings = this._core.settings;
    for (handler in this._handlers) {
      this.$element.off(handler, this._handlers[handler]);
    }
    for (control in this._controls) {
      if (control === '$relative' && settings.navContainer) {
        this._controls[control].html('');
      } else {
        this._controls[control].remove();
      }
    }
    for (override in this.overides) {
      this._core[override] = this._overrides[override];
    }
    for (property in Object.getOwnPropertyNames(this)) {
      typeof this[property] != 'function' && (this[property] = null);
    }
  };

  /**
   * Updates the internal state.
   * @protected
   */
  Navigation.prototype.update = function () {
    var i,
      j,
      k,
      lower = this._core.clones().length / 2,
      upper = lower + this._core.items().length,
      maximum = this._core.maximum(true),
      settings = this._core.settings,
      size = settings.center || settings.autoWidth || settings.dotsData ? 1 : settings.dotsEach || settings.items;
    if (settings.slideBy !== 'page') {
      settings.slideBy = Math.min(settings.slideBy, settings.items);
    }
    if (settings.dots || settings.slideBy == 'page') {
      this._pages = [];
      for (i = lower, j = 0, k = 0; i < upper; i++) {
        if (j >= size || j === 0) {
          this._pages.push({
            start: Math.min(maximum, i - lower),
            end: i - lower + size - 1
          });
          if (Math.min(maximum, i - lower) === maximum) {
            break;
          }
          j = 0, ++k;
        }
        j += this._core.mergers(this._core.relative(i));
      }
    }
  };

  /**
   * Draws the user interface.
   * @todo The option `dotsData` wont work.
   * @protected
   */
  Navigation.prototype.draw = function () {
    var difference,
      settings = this._core.settings,
      disabled = this._core.items().length <= settings.items,
      index = this._core.relative(this._core.current()),
      loop = settings.loop || settings.rewind;
    this._controls.$relative.toggleClass('disabled', !settings.nav || disabled);
    if (settings.nav) {
      this._controls.$previous.toggleClass('disabled', !loop && index <= this._core.minimum(true));
      this._controls.$next.toggleClass('disabled', !loop && index >= this._core.maximum(true));
    }
    this._controls.$absolute.toggleClass('disabled', !settings.dots || disabled);
    if (settings.dots) {
      difference = this._pages.length - this._controls.$absolute.children().length;
      if (settings.dotsData && difference !== 0) {
        this._controls.$absolute.html(this._templates.join(''));
      } else if (difference > 0) {
        this._controls.$absolute.append(new Array(difference + 1).join(this._templates[0]));
      } else if (difference < 0) {
        this._controls.$absolute.children().slice(difference).remove();
      }
      this._controls.$absolute.find('.active').removeClass('active');
      this._controls.$absolute.children().eq($.inArray(this.current(), this._pages)).addClass('active');
    }
  };

  /**
   * Extends event data.
   * @protected
   * @param {Event} event - The event object which gets thrown.
   */
  Navigation.prototype.onTrigger = function (event) {
    var settings = this._core.settings;
    event.page = {
      index: $.inArray(this.current(), this._pages),
      count: this._pages.length,
      size: settings && (settings.center || settings.autoWidth || settings.dotsData ? 1 : settings.dotsEach || settings.items)
    };
  };

  /**
   * Gets the current page position of the carousel.
   * @protected
   * @returns {Number}
   */
  Navigation.prototype.current = function () {
    var current = this._core.relative(this._core.current());
    return $.grep(this._pages, $.proxy(function (page, index) {
      return page.start <= current && page.end >= current;
    }, this)).pop();
  };

  /**
   * Gets the current succesor/predecessor position.
   * @protected
   * @returns {Number}
   */
  Navigation.prototype.getPosition = function (successor) {
    var position,
      length,
      settings = this._core.settings;
    if (settings.slideBy == 'page') {
      position = $.inArray(this.current(), this._pages);
      length = this._pages.length;
      successor ? ++position : --position;
      position = this._pages[(position % length + length) % length].start;
    } else {
      position = this._core.relative(this._core.current());
      length = this._core.items().length;
      successor ? position += settings.slideBy : position -= settings.slideBy;
    }
    return position;
  };

  /**
   * Slides to the next item or page.
   * @public
   * @param {Number} [speed=false] - The time in milliseconds for the transition.
   */
  Navigation.prototype.next = function (speed) {
    $.proxy(this._overrides.to, this._core)(this.getPosition(true), speed);
  };

  /**
   * Slides to the previous item or page.
   * @public
   * @param {Number} [speed=false] - The time in milliseconds for the transition.
   */
  Navigation.prototype.prev = function (speed) {
    $.proxy(this._overrides.to, this._core)(this.getPosition(false), speed);
  };

  /**
   * Slides to the specified item or page.
   * @public
   * @param {Number} position - The position of the item or page.
   * @param {Number} [speed] - The time in milliseconds for the transition.
   * @param {Boolean} [standard=false] - Whether to use the standard behaviour or not.
   */
  Navigation.prototype.to = function (position, speed, standard) {
    var length;
    if (!standard && this._pages.length) {
      length = this._pages.length;
      $.proxy(this._overrides.to, this._core)(this._pages[(position % length + length) % length].start, speed);
    } else {
      $.proxy(this._overrides.to, this._core)(position, speed);
    }
  };
  $.fn.owlCarousel.Constructor.Plugins.Navigation = Navigation;
})(window.Zepto || window.jQuery, window, document);

/**
 * Hash Plugin
 * @version 2.3.4
 * @author Artus Kolanowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;
(function ($, window, document, undefined) {
  'use strict';

  /**
   * Creates the hash plugin.
   * @class The Hash Plugin
   * @param {Owl} carousel - The Owl Carousel
   */
  var Hash = function Hash(carousel) {
    /**
     * Reference to the core.
     * @protected
     * @type {Owl}
     */
    this._core = carousel;

    /**
     * Hash index for the items.
     * @protected
     * @type {Object}
     */
    this._hashes = {};

    /**
     * The carousel element.
     * @type {jQuery}
     */
    this.$element = this._core.$element;

    /**
     * All event handlers.
     * @protected
     * @type {Object}
     */
    this._handlers = {
      'initialized.owl.carousel': $.proxy(function (e) {
        if (e.namespace && this._core.settings.startPosition === 'URLHash') {
          $(window).trigger('hashchange.owl.navigation');
        }
      }, this),
      'prepared.owl.carousel': $.proxy(function (e) {
        if (e.namespace) {
          var hash = $(e.content).find('[data-hash]').addBack('[data-hash]').attr('data-hash');
          if (!hash) {
            return;
          }
          this._hashes[hash] = e.content;
        }
      }, this),
      'changed.owl.carousel': $.proxy(function (e) {
        if (e.namespace && e.property.name === 'position') {
          var current = this._core.items(this._core.relative(this._core.current())),
            hash = $.map(this._hashes, function (item, hash) {
              return item === current ? hash : null;
            }).join();
          if (!hash || window.location.hash.slice(1) === hash) {
            return;
          }
          window.location.hash = hash;
        }
      }, this)
    };

    // set default options
    this._core.options = $.extend({}, Hash.Defaults, this._core.options);

    // register the event handlers
    this.$element.on(this._handlers);

    // register event listener for hash navigation
    $(window).on('hashchange.owl.navigation', $.proxy(function (e) {
      var hash = window.location.hash.substring(1),
        items = this._core.$stage.children(),
        position = this._hashes[hash] && items.index(this._hashes[hash]);
      if (position === undefined || position === this._core.current()) {
        return;
      }
      this._core.to(this._core.relative(position), false, true);
    }, this));
  };

  /**
   * Default options.
   * @public
   */
  Hash.Defaults = {
    URLhashListener: false
  };

  /**
   * Destroys the plugin.
   * @public
   */
  Hash.prototype.destroy = function () {
    var handler, property;
    $(window).off('hashchange.owl.navigation');
    for (handler in this._handlers) {
      this._core.$element.off(handler, this._handlers[handler]);
    }
    for (property in Object.getOwnPropertyNames(this)) {
      typeof this[property] != 'function' && (this[property] = null);
    }
  };
  $.fn.owlCarousel.Constructor.Plugins.Hash = Hash;
})(window.Zepto || window.jQuery, window, document);

/**
 * Support Plugin
 *
 * @version 2.3.4
 * @author Vivid Planet Software GmbH
 * @author Artus Kolanowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;
(function ($, window, document, undefined) {
  var style = $('<support>').get(0).style,
    prefixes = 'Webkit Moz O ms'.split(' '),
    events = {
      transition: {
        end: {
          WebkitTransition: 'webkitTransitionEnd',
          MozTransition: 'transitionend',
          OTransition: 'oTransitionEnd',
          transition: 'transitionend'
        }
      },
      animation: {
        end: {
          WebkitAnimation: 'webkitAnimationEnd',
          MozAnimation: 'animationend',
          OAnimation: 'oAnimationEnd',
          animation: 'animationend'
        }
      }
    },
    tests = {
      csstransforms: function csstransforms() {
        return !!test('transform');
      },
      csstransforms3d: function csstransforms3d() {
        return !!test('perspective');
      },
      csstransitions: function csstransitions() {
        return !!test('transition');
      },
      cssanimations: function cssanimations() {
        return !!test('animation');
      }
    };
  function test(property, prefixed) {
    var result = false,
      upper = property.charAt(0).toUpperCase() + property.slice(1);
    $.each((property + ' ' + prefixes.join(upper + ' ') + upper).split(' '), function (i, property) {
      if (style[property] !== undefined) {
        result = prefixed ? property : true;
        return false;
      }
    });
    return result;
  }
  function prefixed(property) {
    return test(property, true);
  }
  if (tests.csstransitions()) {
    /* jshint -W053 */
    $.support.transition = new String(prefixed('transition'));
    $.support.transition.end = events.transition.end[$.support.transition];
  }
  if (tests.cssanimations()) {
    /* jshint -W053 */
    $.support.animation = new String(prefixed('animation'));
    $.support.animation.end = events.animation.end[$.support.animation];
  }
  if (tests.csstransforms()) {
    /* jshint -W053 */
    $.support.transform = new String(prefixed('transform'));
    $.support.transform3d = tests.csstransforms3d();
  }
})(window.Zepto || window.jQuery, window, document);

/***/ }),

/***/ "./assets/pages/home/homeFunctions.js":
/*!********************************************!*\
  !*** ./assets/pages/home/homeFunctions.js ***!
  \********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _common_sass_bootstrap_js_dist_carousel__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../common-sass/bootstrap/js/dist/carousel */ "./assets/common-sass/bootstrap/js/dist/carousel.js");
/* harmony import */ var _common_sass_bootstrap_js_dist_carousel__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_common_sass_bootstrap_js_dist_carousel__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _common_sass_owl_carousel_dist_owl_carousel__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../common-sass/owl.carousel/dist/owl.carousel */ "./assets/common-sass/owl.carousel/dist/owl.carousel.js");
/* harmony import */ var _common_sass_owl_carousel_dist_owl_carousel__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_common_sass_owl_carousel_dist_owl_carousel__WEBPACK_IMPORTED_MODULE_1__);


window.IsotopeMB = __webpack_require__(/*! ../../common-sass/media-boxes/plugin/components/Isotope/jquery.isotope */ "./assets/common-sass/media-boxes/plugin/components/Isotope/jquery.isotope.js");
__webpack_require__(/*! ../../common-sass/media-boxes/plugin/components/imagesLoaded/jquery.imagesLoaded.min */ "./assets/common-sass/media-boxes/plugin/components/imagesLoaded/jquery.imagesLoaded.min.js");
__webpack_require__(/*! ../../common-sass/media-boxes/plugin/components/Transit/jquery.transit.min */ "./assets/common-sass/media-boxes/plugin/components/Transit/jquery.transit.min.js");
__webpack_require__(/*! ../../common-sass/media-boxes/plugin/components/jQuery Easing/jquery.easing */ "./assets/common-sass/media-boxes/plugin/components/jQuery Easing/jquery.easing.js");
__webpack_require__(/*! ../../common-sass/media-boxes/plugin/components/jQuery Visible/jquery.visible.min */ "./assets/common-sass/media-boxes/plugin/components/jQuery Visible/jquery.visible.min.js");
__webpack_require__(/*! ../../common-sass/media-boxes/plugin/components/Modernizr/modernizr.custom.min */ "./assets/common-sass/media-boxes/plugin/components/Modernizr/modernizr.custom.min.js");
__webpack_require__(/*! ../../common-sass/media-boxes/plugin/components/Magnific Popup/jquery.magnific-popup.min */ "./assets/common-sass/media-boxes/plugin/components/Magnific Popup/jquery.magnific-popup.min.js");
__webpack_require__(/*! ../../common-sass/media-boxes/plugin/js/jquery.mediaBoxes.dropdown */ "./assets/common-sass/media-boxes/plugin/js/jquery.mediaBoxes.dropdown.js");
__webpack_require__(/*! ../../common-sass/media-boxes/plugin/js/jquery.mediaBoxes */ "./assets/common-sass/media-boxes/plugin/js/jquery.mediaBoxes.js");
var homeFunctions = new function () {
  //CAROUSEL HOME BOOTSTRAP CON ANIMACION CSS3 ANIMATE
  this.carouselHomeBootstrapAnimateCSS3 = function () {
    //Function to animate slider captions
    function doAnimations(elems) {
      //Cache the animationend event in a variable
      var animEndEv = "webkitAnimationEnd animationend";
      elems.each(function () {
        var $this = $(this),
          $animationType = $this.data("animation");
        $this.addClass($animationType).one(animEndEv, function () {
          $this.removeClass($animationType);
        });
      });
    }

    //Variables on page load
    var $myCarousel = $("#carouselHome"),
      $firstAnimatingElems = $myCarousel.find(".carousel-item:first").find("[data-animation ^= 'animated']");

    //Initialize carousel
    $myCarousel.carousel();

    //Animate captions in first slide on page load
    doAnimations($firstAnimatingElems);

    //Other slides to be animated on carousel slide event
    $myCarousel.on("slide.bs.carousel", function (e) {
      var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
      doAnimations($animatingElems);
    });
  };
  //Carrousel Home Owl
  this.carouselHomeOwl = function () {
    var owlCarouselHome = $('.owl-carousel-slider');
    $(owlCarouselHome).owlCarousel({
      animateOut: 'fadeOut',
      //animateOut: 'slideOutDown',
      //animateIn: 'flipInX',
      items: 1,
      dots: false,
      //navText:['<i class="fa-solid fa-arrow-left fa-fw fa-2xl"></i>','<i class="fa-solid fa-arrow-right fa-fw fa-2xl"></i>'],
      autoplay: true,
      autoplayTimeout: 1600,
      autoplayHoverPause: true
    });
  };
  //Media Boxes Todos los productos
  this.mediaBoxesHome = function () {
    $('#gridProductHome').mediaBoxes({
      filterContainer: '#filter',
      search: '#search',
      sortContainer: '#sort',
      overlayEffect: 'push-up',
      columns: 3,
      boxesToLoadStart: 6,
      boxesToLoad: 6,
      horizontalSpaceBetweenBoxes: 30,
      verticalSpaceBetweenBoxes: 30,
      getSortData: {
        title: '.media-box-title',
        categories: '.media-box-carbon-footprint'
      },
      minBoxesPerFilter: 999,
      deepLinkingOnFilter: false,
      popup: 'magnificpopup'
    });
  };
  //función de arranque
  this.init = function () {
    homeFunctions.carouselHomeBootstrapAnimateCSS3();
    homeFunctions.carouselHomeOwl();
    homeFunctions.mediaBoxesHome();
  };
}();
$(document).ready(function () {
  homeFunctions.init();
});

/***/ }),

/***/ "./node_modules/jquery/dist/jquery.js":
/*!********************************************!*\
  !*** ./node_modules/jquery/dist/jquery.js ***!
  \********************************************/
/***/ (function(module, exports) {

var __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;/*!
 * jQuery JavaScript Library v3.7.0
 * https://jquery.com/
 *
 * Copyright OpenJS Foundation and other contributors
 * Released under the MIT license
 * https://jquery.org/license
 *
 * Date: 2023-05-11T18:29Z
 */
( function( global, factory ) {

	"use strict";

	if (  true && typeof module.exports === "object" ) {

		// For CommonJS and CommonJS-like environments where a proper `window`
		// is present, execute the factory and get jQuery.
		// For environments that do not have a `window` with a `document`
		// (such as Node.js), expose a factory as module.exports.
		// This accentuates the need for the creation of a real `window`.
		// e.g. var jQuery = require("jquery")(window);
		// See ticket trac-14549 for more info.
		module.exports = global.document ?
			factory( global, true ) :
			function( w ) {
				if ( !w.document ) {
					throw new Error( "jQuery requires a window with a document" );
				}
				return factory( w );
			};
	} else {
		factory( global );
	}

// Pass this if window is not defined yet
} )( typeof window !== "undefined" ? window : this, function( window, noGlobal ) {

// Edge <= 12 - 13+, Firefox <=18 - 45+, IE 10 - 11, Safari 5.1 - 9+, iOS 6 - 9.1
// throw exceptions when non-strict code (e.g., ASP.NET 4.5) accesses strict mode
// arguments.callee.caller (trac-13335). But as of jQuery 3.0 (2016), strict mode should be common
// enough that all such attempts are guarded in a try block.
"use strict";

var arr = [];

var getProto = Object.getPrototypeOf;

var slice = arr.slice;

var flat = arr.flat ? function( array ) {
	return arr.flat.call( array );
} : function( array ) {
	return arr.concat.apply( [], array );
};


var push = arr.push;

var indexOf = arr.indexOf;

var class2type = {};

var toString = class2type.toString;

var hasOwn = class2type.hasOwnProperty;

var fnToString = hasOwn.toString;

var ObjectFunctionString = fnToString.call( Object );

var support = {};

var isFunction = function isFunction( obj ) {

		// Support: Chrome <=57, Firefox <=52
		// In some browsers, typeof returns "function" for HTML <object> elements
		// (i.e., `typeof document.createElement( "object" ) === "function"`).
		// We don't want to classify *any* DOM node as a function.
		// Support: QtWeb <=3.8.5, WebKit <=534.34, wkhtmltopdf tool <=0.12.5
		// Plus for old WebKit, typeof returns "function" for HTML collections
		// (e.g., `typeof document.getElementsByTagName("div") === "function"`). (gh-4756)
		return typeof obj === "function" && typeof obj.nodeType !== "number" &&
			typeof obj.item !== "function";
	};


var isWindow = function isWindow( obj ) {
		return obj != null && obj === obj.window;
	};


var document = window.document;



	var preservedScriptAttributes = {
		type: true,
		src: true,
		nonce: true,
		noModule: true
	};

	function DOMEval( code, node, doc ) {
		doc = doc || document;

		var i, val,
			script = doc.createElement( "script" );

		script.text = code;
		if ( node ) {
			for ( i in preservedScriptAttributes ) {

				// Support: Firefox 64+, Edge 18+
				// Some browsers don't support the "nonce" property on scripts.
				// On the other hand, just using `getAttribute` is not enough as
				// the `nonce` attribute is reset to an empty string whenever it
				// becomes browsing-context connected.
				// See https://github.com/whatwg/html/issues/2369
				// See https://html.spec.whatwg.org/#nonce-attributes
				// The `node.getAttribute` check was added for the sake of
				// `jQuery.globalEval` so that it can fake a nonce-containing node
				// via an object.
				val = node[ i ] || node.getAttribute && node.getAttribute( i );
				if ( val ) {
					script.setAttribute( i, val );
				}
			}
		}
		doc.head.appendChild( script ).parentNode.removeChild( script );
	}


function toType( obj ) {
	if ( obj == null ) {
		return obj + "";
	}

	// Support: Android <=2.3 only (functionish RegExp)
	return typeof obj === "object" || typeof obj === "function" ?
		class2type[ toString.call( obj ) ] || "object" :
		typeof obj;
}
/* global Symbol */
// Defining this global in .eslintrc.json would create a danger of using the global
// unguarded in another place, it seems safer to define global only for this module



var version = "3.7.0",

	rhtmlSuffix = /HTML$/i,

	// Define a local copy of jQuery
	jQuery = function( selector, context ) {

		// The jQuery object is actually just the init constructor 'enhanced'
		// Need init if jQuery is called (just allow error to be thrown if not included)
		return new jQuery.fn.init( selector, context );
	};

jQuery.fn = jQuery.prototype = {

	// The current version of jQuery being used
	jquery: version,

	constructor: jQuery,

	// The default length of a jQuery object is 0
	length: 0,

	toArray: function() {
		return slice.call( this );
	},

	// Get the Nth element in the matched element set OR
	// Get the whole matched element set as a clean array
	get: function( num ) {

		// Return all the elements in a clean array
		if ( num == null ) {
			return slice.call( this );
		}

		// Return just the one element from the set
		return num < 0 ? this[ num + this.length ] : this[ num ];
	},

	// Take an array of elements and push it onto the stack
	// (returning the new matched element set)
	pushStack: function( elems ) {

		// Build a new jQuery matched element set
		var ret = jQuery.merge( this.constructor(), elems );

		// Add the old object onto the stack (as a reference)
		ret.prevObject = this;

		// Return the newly-formed element set
		return ret;
	},

	// Execute a callback for every element in the matched set.
	each: function( callback ) {
		return jQuery.each( this, callback );
	},

	map: function( callback ) {
		return this.pushStack( jQuery.map( this, function( elem, i ) {
			return callback.call( elem, i, elem );
		} ) );
	},

	slice: function() {
		return this.pushStack( slice.apply( this, arguments ) );
	},

	first: function() {
		return this.eq( 0 );
	},

	last: function() {
		return this.eq( -1 );
	},

	even: function() {
		return this.pushStack( jQuery.grep( this, function( _elem, i ) {
			return ( i + 1 ) % 2;
		} ) );
	},

	odd: function() {
		return this.pushStack( jQuery.grep( this, function( _elem, i ) {
			return i % 2;
		} ) );
	},

	eq: function( i ) {
		var len = this.length,
			j = +i + ( i < 0 ? len : 0 );
		return this.pushStack( j >= 0 && j < len ? [ this[ j ] ] : [] );
	},

	end: function() {
		return this.prevObject || this.constructor();
	},

	// For internal use only.
	// Behaves like an Array's method, not like a jQuery method.
	push: push,
	sort: arr.sort,
	splice: arr.splice
};

jQuery.extend = jQuery.fn.extend = function() {
	var options, name, src, copy, copyIsArray, clone,
		target = arguments[ 0 ] || {},
		i = 1,
		length = arguments.length,
		deep = false;

	// Handle a deep copy situation
	if ( typeof target === "boolean" ) {
		deep = target;

		// Skip the boolean and the target
		target = arguments[ i ] || {};
		i++;
	}

	// Handle case when target is a string or something (possible in deep copy)
	if ( typeof target !== "object" && !isFunction( target ) ) {
		target = {};
	}

	// Extend jQuery itself if only one argument is passed
	if ( i === length ) {
		target = this;
		i--;
	}

	for ( ; i < length; i++ ) {

		// Only deal with non-null/undefined values
		if ( ( options = arguments[ i ] ) != null ) {

			// Extend the base object
			for ( name in options ) {
				copy = options[ name ];

				// Prevent Object.prototype pollution
				// Prevent never-ending loop
				if ( name === "__proto__" || target === copy ) {
					continue;
				}

				// Recurse if we're merging plain objects or arrays
				if ( deep && copy && ( jQuery.isPlainObject( copy ) ||
					( copyIsArray = Array.isArray( copy ) ) ) ) {
					src = target[ name ];

					// Ensure proper type for the source value
					if ( copyIsArray && !Array.isArray( src ) ) {
						clone = [];
					} else if ( !copyIsArray && !jQuery.isPlainObject( src ) ) {
						clone = {};
					} else {
						clone = src;
					}
					copyIsArray = false;

					// Never move original objects, clone them
					target[ name ] = jQuery.extend( deep, clone, copy );

				// Don't bring in undefined values
				} else if ( copy !== undefined ) {
					target[ name ] = copy;
				}
			}
		}
	}

	// Return the modified object
	return target;
};

jQuery.extend( {

	// Unique for each copy of jQuery on the page
	expando: "jQuery" + ( version + Math.random() ).replace( /\D/g, "" ),

	// Assume jQuery is ready without the ready module
	isReady: true,

	error: function( msg ) {
		throw new Error( msg );
	},

	noop: function() {},

	isPlainObject: function( obj ) {
		var proto, Ctor;

		// Detect obvious negatives
		// Use toString instead of jQuery.type to catch host objects
		if ( !obj || toString.call( obj ) !== "[object Object]" ) {
			return false;
		}

		proto = getProto( obj );

		// Objects with no prototype (e.g., `Object.create( null )`) are plain
		if ( !proto ) {
			return true;
		}

		// Objects with prototype are plain iff they were constructed by a global Object function
		Ctor = hasOwn.call( proto, "constructor" ) && proto.constructor;
		return typeof Ctor === "function" && fnToString.call( Ctor ) === ObjectFunctionString;
	},

	isEmptyObject: function( obj ) {
		var name;

		for ( name in obj ) {
			return false;
		}
		return true;
	},

	// Evaluates a script in a provided context; falls back to the global one
	// if not specified.
	globalEval: function( code, options, doc ) {
		DOMEval( code, { nonce: options && options.nonce }, doc );
	},

	each: function( obj, callback ) {
		var length, i = 0;

		if ( isArrayLike( obj ) ) {
			length = obj.length;
			for ( ; i < length; i++ ) {
				if ( callback.call( obj[ i ], i, obj[ i ] ) === false ) {
					break;
				}
			}
		} else {
			for ( i in obj ) {
				if ( callback.call( obj[ i ], i, obj[ i ] ) === false ) {
					break;
				}
			}
		}

		return obj;
	},


	// Retrieve the text value of an array of DOM nodes
	text: function( elem ) {
		var node,
			ret = "",
			i = 0,
			nodeType = elem.nodeType;

		if ( !nodeType ) {

			// If no nodeType, this is expected to be an array
			while ( ( node = elem[ i++ ] ) ) {

				// Do not traverse comment nodes
				ret += jQuery.text( node );
			}
		} else if ( nodeType === 1 || nodeType === 9 || nodeType === 11 ) {
			return elem.textContent;
		} else if ( nodeType === 3 || nodeType === 4 ) {
			return elem.nodeValue;
		}

		// Do not include comment or processing instruction nodes

		return ret;
	},

	// results is for internal usage only
	makeArray: function( arr, results ) {
		var ret = results || [];

		if ( arr != null ) {
			if ( isArrayLike( Object( arr ) ) ) {
				jQuery.merge( ret,
					typeof arr === "string" ?
						[ arr ] : arr
				);
			} else {
				push.call( ret, arr );
			}
		}

		return ret;
	},

	inArray: function( elem, arr, i ) {
		return arr == null ? -1 : indexOf.call( arr, elem, i );
	},

	isXMLDoc: function( elem ) {
		var namespace = elem && elem.namespaceURI,
			docElem = elem && ( elem.ownerDocument || elem ).documentElement;

		// Assume HTML when documentElement doesn't yet exist, such as inside
		// document fragments.
		return !rhtmlSuffix.test( namespace || docElem && docElem.nodeName || "HTML" );
	},

	// Support: Android <=4.0 only, PhantomJS 1 only
	// push.apply(_, arraylike) throws on ancient WebKit
	merge: function( first, second ) {
		var len = +second.length,
			j = 0,
			i = first.length;

		for ( ; j < len; j++ ) {
			first[ i++ ] = second[ j ];
		}

		first.length = i;

		return first;
	},

	grep: function( elems, callback, invert ) {
		var callbackInverse,
			matches = [],
			i = 0,
			length = elems.length,
			callbackExpect = !invert;

		// Go through the array, only saving the items
		// that pass the validator function
		for ( ; i < length; i++ ) {
			callbackInverse = !callback( elems[ i ], i );
			if ( callbackInverse !== callbackExpect ) {
				matches.push( elems[ i ] );
			}
		}

		return matches;
	},

	// arg is for internal usage only
	map: function( elems, callback, arg ) {
		var length, value,
			i = 0,
			ret = [];

		// Go through the array, translating each of the items to their new values
		if ( isArrayLike( elems ) ) {
			length = elems.length;
			for ( ; i < length; i++ ) {
				value = callback( elems[ i ], i, arg );

				if ( value != null ) {
					ret.push( value );
				}
			}

		// Go through every key on the object,
		} else {
			for ( i in elems ) {
				value = callback( elems[ i ], i, arg );

				if ( value != null ) {
					ret.push( value );
				}
			}
		}

		// Flatten any nested arrays
		return flat( ret );
	},

	// A global GUID counter for objects
	guid: 1,

	// jQuery.support is not used in Core but other projects attach their
	// properties to it so it needs to exist.
	support: support
} );

if ( typeof Symbol === "function" ) {
	jQuery.fn[ Symbol.iterator ] = arr[ Symbol.iterator ];
}

// Populate the class2type map
jQuery.each( "Boolean Number String Function Array Date RegExp Object Error Symbol".split( " " ),
	function( _i, name ) {
		class2type[ "[object " + name + "]" ] = name.toLowerCase();
	} );

function isArrayLike( obj ) {

	// Support: real iOS 8.2 only (not reproducible in simulator)
	// `in` check used to prevent JIT error (gh-2145)
	// hasOwn isn't used here due to false negatives
	// regarding Nodelist length in IE
	var length = !!obj && "length" in obj && obj.length,
		type = toType( obj );

	if ( isFunction( obj ) || isWindow( obj ) ) {
		return false;
	}

	return type === "array" || length === 0 ||
		typeof length === "number" && length > 0 && ( length - 1 ) in obj;
}


function nodeName( elem, name ) {

	return elem.nodeName && elem.nodeName.toLowerCase() === name.toLowerCase();

}
var pop = arr.pop;


var sort = arr.sort;


var splice = arr.splice;


var whitespace = "[\\x20\\t\\r\\n\\f]";


var rtrimCSS = new RegExp(
	"^" + whitespace + "+|((?:^|[^\\\\])(?:\\\\.)*)" + whitespace + "+$",
	"g"
);




// Note: an element does not contain itself
jQuery.contains = function( a, b ) {
	var bup = b && b.parentNode;

	return a === bup || !!( bup && bup.nodeType === 1 && (

		// Support: IE 9 - 11+
		// IE doesn't have `contains` on SVG.
		a.contains ?
			a.contains( bup ) :
			a.compareDocumentPosition && a.compareDocumentPosition( bup ) & 16
	) );
};




// CSS string/identifier serialization
// https://drafts.csswg.org/cssom/#common-serializing-idioms
var rcssescape = /([\0-\x1f\x7f]|^-?\d)|^-$|[^\x80-\uFFFF\w-]/g;

function fcssescape( ch, asCodePoint ) {
	if ( asCodePoint ) {

		// U+0000 NULL becomes U+FFFD REPLACEMENT CHARACTER
		if ( ch === "\0" ) {
			return "\uFFFD";
		}

		// Control characters and (dependent upon position) numbers get escaped as code points
		return ch.slice( 0, -1 ) + "\\" + ch.charCodeAt( ch.length - 1 ).toString( 16 ) + " ";
	}

	// Other potentially-special ASCII characters get backslash-escaped
	return "\\" + ch;
}

jQuery.escapeSelector = function( sel ) {
	return ( sel + "" ).replace( rcssescape, fcssescape );
};




var preferredDoc = document,
	pushNative = push;

( function() {

var i,
	Expr,
	outermostContext,
	sortInput,
	hasDuplicate,
	push = pushNative,

	// Local document vars
	document,
	documentElement,
	documentIsHTML,
	rbuggyQSA,
	matches,

	// Instance-specific data
	expando = jQuery.expando,
	dirruns = 0,
	done = 0,
	classCache = createCache(),
	tokenCache = createCache(),
	compilerCache = createCache(),
	nonnativeSelectorCache = createCache(),
	sortOrder = function( a, b ) {
		if ( a === b ) {
			hasDuplicate = true;
		}
		return 0;
	},

	booleans = "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|" +
		"loop|multiple|open|readonly|required|scoped",

	// Regular expressions

	// https://www.w3.org/TR/css-syntax-3/#ident-token-diagram
	identifier = "(?:\\\\[\\da-fA-F]{1,6}" + whitespace +
		"?|\\\\[^\\r\\n\\f]|[\\w-]|[^\0-\\x7f])+",

	// Attribute selectors: https://www.w3.org/TR/selectors/#attribute-selectors
	attributes = "\\[" + whitespace + "*(" + identifier + ")(?:" + whitespace +

		// Operator (capture 2)
		"*([*^$|!~]?=)" + whitespace +

		// "Attribute values must be CSS identifiers [capture 5] or strings [capture 3 or capture 4]"
		"*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|(" + identifier + "))|)" +
		whitespace + "*\\]",

	pseudos = ":(" + identifier + ")(?:\\((" +

		// To reduce the number of selectors needing tokenize in the preFilter, prefer arguments:
		// 1. quoted (capture 3; capture 4 or capture 5)
		"('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|" +

		// 2. simple (capture 6)
		"((?:\\\\.|[^\\\\()[\\]]|" + attributes + ")*)|" +

		// 3. anything else (capture 2)
		".*" +
		")\\)|)",

	// Leading and non-escaped trailing whitespace, capturing some non-whitespace characters preceding the latter
	rwhitespace = new RegExp( whitespace + "+", "g" ),

	rcomma = new RegExp( "^" + whitespace + "*," + whitespace + "*" ),
	rleadingCombinator = new RegExp( "^" + whitespace + "*([>+~]|" + whitespace + ")" +
		whitespace + "*" ),
	rdescend = new RegExp( whitespace + "|>" ),

	rpseudo = new RegExp( pseudos ),
	ridentifier = new RegExp( "^" + identifier + "$" ),

	matchExpr = {
		ID: new RegExp( "^#(" + identifier + ")" ),
		CLASS: new RegExp( "^\\.(" + identifier + ")" ),
		TAG: new RegExp( "^(" + identifier + "|[*])" ),
		ATTR: new RegExp( "^" + attributes ),
		PSEUDO: new RegExp( "^" + pseudos ),
		CHILD: new RegExp(
			"^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" +
				whitespace + "*(even|odd|(([+-]|)(\\d*)n|)" + whitespace + "*(?:([+-]|)" +
				whitespace + "*(\\d+)|))" + whitespace + "*\\)|)", "i" ),
		bool: new RegExp( "^(?:" + booleans + ")$", "i" ),

		// For use in libraries implementing .is()
		// We use this for POS matching in `select`
		needsContext: new RegExp( "^" + whitespace +
			"*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + whitespace +
			"*((?:-\\d)?\\d*)" + whitespace + "*\\)|)(?=[^-]|$)", "i" )
	},

	rinputs = /^(?:input|select|textarea|button)$/i,
	rheader = /^h\d$/i,

	// Easily-parseable/retrievable ID or TAG or CLASS selectors
	rquickExpr = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,

	rsibling = /[+~]/,

	// CSS escapes
	// https://www.w3.org/TR/CSS21/syndata.html#escaped-characters
	runescape = new RegExp( "\\\\[\\da-fA-F]{1,6}" + whitespace +
		"?|\\\\([^\\r\\n\\f])", "g" ),
	funescape = function( escape, nonHex ) {
		var high = "0x" + escape.slice( 1 ) - 0x10000;

		if ( nonHex ) {

			// Strip the backslash prefix from a non-hex escape sequence
			return nonHex;
		}

		// Replace a hexadecimal escape sequence with the encoded Unicode code point
		// Support: IE <=11+
		// For values outside the Basic Multilingual Plane (BMP), manually construct a
		// surrogate pair
		return high < 0 ?
			String.fromCharCode( high + 0x10000 ) :
			String.fromCharCode( high >> 10 | 0xD800, high & 0x3FF | 0xDC00 );
	},

	// Used for iframes; see `setDocument`.
	// Support: IE 9 - 11+, Edge 12 - 18+
	// Removing the function wrapper causes a "Permission Denied"
	// error in IE/Edge.
	unloadHandler = function() {
		setDocument();
	},

	inDisabledFieldset = addCombinator(
		function( elem ) {
			return elem.disabled === true && nodeName( elem, "fieldset" );
		},
		{ dir: "parentNode", next: "legend" }
	);

// Support: IE <=9 only
// Accessing document.activeElement can throw unexpectedly
// https://bugs.jquery.com/ticket/13393
function safeActiveElement() {
	try {
		return document.activeElement;
	} catch ( err ) { }
}

// Optimize for push.apply( _, NodeList )
try {
	push.apply(
		( arr = slice.call( preferredDoc.childNodes ) ),
		preferredDoc.childNodes
	);

	// Support: Android <=4.0
	// Detect silently failing push.apply
	// eslint-disable-next-line no-unused-expressions
	arr[ preferredDoc.childNodes.length ].nodeType;
} catch ( e ) {
	push = {
		apply: function( target, els ) {
			pushNative.apply( target, slice.call( els ) );
		},
		call: function( target ) {
			pushNative.apply( target, slice.call( arguments, 1 ) );
		}
	};
}

function find( selector, context, results, seed ) {
	var m, i, elem, nid, match, groups, newSelector,
		newContext = context && context.ownerDocument,

		// nodeType defaults to 9, since context defaults to document
		nodeType = context ? context.nodeType : 9;

	results = results || [];

	// Return early from calls with invalid selector or context
	if ( typeof selector !== "string" || !selector ||
		nodeType !== 1 && nodeType !== 9 && nodeType !== 11 ) {

		return results;
	}

	// Try to shortcut find operations (as opposed to filters) in HTML documents
	if ( !seed ) {
		setDocument( context );
		context = context || document;

		if ( documentIsHTML ) {

			// If the selector is sufficiently simple, try using a "get*By*" DOM method
			// (excepting DocumentFragment context, where the methods don't exist)
			if ( nodeType !== 11 && ( match = rquickExpr.exec( selector ) ) ) {

				// ID selector
				if ( ( m = match[ 1 ] ) ) {

					// Document context
					if ( nodeType === 9 ) {
						if ( ( elem = context.getElementById( m ) ) ) {

							// Support: IE 9 only
							// getElementById can match elements by name instead of ID
							if ( elem.id === m ) {
								push.call( results, elem );
								return results;
							}
						} else {
							return results;
						}

					// Element context
					} else {

						// Support: IE 9 only
						// getElementById can match elements by name instead of ID
						if ( newContext && ( elem = newContext.getElementById( m ) ) &&
							find.contains( context, elem ) &&
							elem.id === m ) {

							push.call( results, elem );
							return results;
						}
					}

				// Type selector
				} else if ( match[ 2 ] ) {
					push.apply( results, context.getElementsByTagName( selector ) );
					return results;

				// Class selector
				} else if ( ( m = match[ 3 ] ) && context.getElementsByClassName ) {
					push.apply( results, context.getElementsByClassName( m ) );
					return results;
				}
			}

			// Take advantage of querySelectorAll
			if ( !nonnativeSelectorCache[ selector + " " ] &&
				( !rbuggyQSA || !rbuggyQSA.test( selector ) ) ) {

				newSelector = selector;
				newContext = context;

				// qSA considers elements outside a scoping root when evaluating child or
				// descendant combinators, which is not what we want.
				// In such cases, we work around the behavior by prefixing every selector in the
				// list with an ID selector referencing the scope context.
				// The technique has to be used as well when a leading combinator is used
				// as such selectors are not recognized by querySelectorAll.
				// Thanks to Andrew Dupont for this technique.
				if ( nodeType === 1 &&
					( rdescend.test( selector ) || rleadingCombinator.test( selector ) ) ) {

					// Expand context for sibling selectors
					newContext = rsibling.test( selector ) && testContext( context.parentNode ) ||
						context;

					// We can use :scope instead of the ID hack if the browser
					// supports it & if we're not changing the context.
					// Support: IE 11+, Edge 17 - 18+
					// IE/Edge sometimes throw a "Permission denied" error when
					// strict-comparing two documents; shallow comparisons work.
					// eslint-disable-next-line eqeqeq
					if ( newContext != context || !support.scope ) {

						// Capture the context ID, setting it first if necessary
						if ( ( nid = context.getAttribute( "id" ) ) ) {
							nid = jQuery.escapeSelector( nid );
						} else {
							context.setAttribute( "id", ( nid = expando ) );
						}
					}

					// Prefix every selector in the list
					groups = tokenize( selector );
					i = groups.length;
					while ( i-- ) {
						groups[ i ] = ( nid ? "#" + nid : ":scope" ) + " " +
							toSelector( groups[ i ] );
					}
					newSelector = groups.join( "," );
				}

				try {
					push.apply( results,
						newContext.querySelectorAll( newSelector )
					);
					return results;
				} catch ( qsaError ) {
					nonnativeSelectorCache( selector, true );
				} finally {
					if ( nid === expando ) {
						context.removeAttribute( "id" );
					}
				}
			}
		}
	}

	// All others
	return select( selector.replace( rtrimCSS, "$1" ), context, results, seed );
}

/**
 * Create key-value caches of limited size
 * @returns {function(string, object)} Returns the Object data after storing it on itself with
 *	property name the (space-suffixed) string and (if the cache is larger than Expr.cacheLength)
 *	deleting the oldest entry
 */
function createCache() {
	var keys = [];

	function cache( key, value ) {

		// Use (key + " ") to avoid collision with native prototype properties
		// (see https://github.com/jquery/sizzle/issues/157)
		if ( keys.push( key + " " ) > Expr.cacheLength ) {

			// Only keep the most recent entries
			delete cache[ keys.shift() ];
		}
		return ( cache[ key + " " ] = value );
	}
	return cache;
}

/**
 * Mark a function for special use by jQuery selector module
 * @param {Function} fn The function to mark
 */
function markFunction( fn ) {
	fn[ expando ] = true;
	return fn;
}

/**
 * Support testing using an element
 * @param {Function} fn Passed the created element and returns a boolean result
 */
function assert( fn ) {
	var el = document.createElement( "fieldset" );

	try {
		return !!fn( el );
	} catch ( e ) {
		return false;
	} finally {

		// Remove from its parent by default
		if ( el.parentNode ) {
			el.parentNode.removeChild( el );
		}

		// release memory in IE
		el = null;
	}
}

/**
 * Returns a function to use in pseudos for input types
 * @param {String} type
 */
function createInputPseudo( type ) {
	return function( elem ) {
		return nodeName( elem, "input" ) && elem.type === type;
	};
}

/**
 * Returns a function to use in pseudos for buttons
 * @param {String} type
 */
function createButtonPseudo( type ) {
	return function( elem ) {
		return ( nodeName( elem, "input" ) || nodeName( elem, "button" ) ) &&
			elem.type === type;
	};
}

/**
 * Returns a function to use in pseudos for :enabled/:disabled
 * @param {Boolean} disabled true for :disabled; false for :enabled
 */
function createDisabledPseudo( disabled ) {

	// Known :disabled false positives: fieldset[disabled] > legend:nth-of-type(n+2) :can-disable
	return function( elem ) {

		// Only certain elements can match :enabled or :disabled
		// https://html.spec.whatwg.org/multipage/scripting.html#selector-enabled
		// https://html.spec.whatwg.org/multipage/scripting.html#selector-disabled
		if ( "form" in elem ) {

			// Check for inherited disabledness on relevant non-disabled elements:
			// * listed form-associated elements in a disabled fieldset
			//   https://html.spec.whatwg.org/multipage/forms.html#category-listed
			//   https://html.spec.whatwg.org/multipage/forms.html#concept-fe-disabled
			// * option elements in a disabled optgroup
			//   https://html.spec.whatwg.org/multipage/forms.html#concept-option-disabled
			// All such elements have a "form" property.
			if ( elem.parentNode && elem.disabled === false ) {

				// Option elements defer to a parent optgroup if present
				if ( "label" in elem ) {
					if ( "label" in elem.parentNode ) {
						return elem.parentNode.disabled === disabled;
					} else {
						return elem.disabled === disabled;
					}
				}

				// Support: IE 6 - 11+
				// Use the isDisabled shortcut property to check for disabled fieldset ancestors
				return elem.isDisabled === disabled ||

					// Where there is no isDisabled, check manually
					elem.isDisabled !== !disabled &&
						inDisabledFieldset( elem ) === disabled;
			}

			return elem.disabled === disabled;

		// Try to winnow out elements that can't be disabled before trusting the disabled property.
		// Some victims get caught in our net (label, legend, menu, track), but it shouldn't
		// even exist on them, let alone have a boolean value.
		} else if ( "label" in elem ) {
			return elem.disabled === disabled;
		}

		// Remaining elements are neither :enabled nor :disabled
		return false;
	};
}

/**
 * Returns a function to use in pseudos for positionals
 * @param {Function} fn
 */
function createPositionalPseudo( fn ) {
	return markFunction( function( argument ) {
		argument = +argument;
		return markFunction( function( seed, matches ) {
			var j,
				matchIndexes = fn( [], seed.length, argument ),
				i = matchIndexes.length;

			// Match elements found at the specified indexes
			while ( i-- ) {
				if ( seed[ ( j = matchIndexes[ i ] ) ] ) {
					seed[ j ] = !( matches[ j ] = seed[ j ] );
				}
			}
		} );
	} );
}

/**
 * Checks a node for validity as a jQuery selector context
 * @param {Element|Object=} context
 * @returns {Element|Object|Boolean} The input node if acceptable, otherwise a falsy value
 */
function testContext( context ) {
	return context && typeof context.getElementsByTagName !== "undefined" && context;
}

/**
 * Sets document-related variables once based on the current document
 * @param {Element|Object} [node] An element or document object to use to set the document
 * @returns {Object} Returns the current document
 */
function setDocument( node ) {
	var subWindow,
		doc = node ? node.ownerDocument || node : preferredDoc;

	// Return early if doc is invalid or already selected
	// Support: IE 11+, Edge 17 - 18+
	// IE/Edge sometimes throw a "Permission denied" error when strict-comparing
	// two documents; shallow comparisons work.
	// eslint-disable-next-line eqeqeq
	if ( doc == document || doc.nodeType !== 9 || !doc.documentElement ) {
		return document;
	}

	// Update global variables
	document = doc;
	documentElement = document.documentElement;
	documentIsHTML = !jQuery.isXMLDoc( document );

	// Support: iOS 7 only, IE 9 - 11+
	// Older browsers didn't support unprefixed `matches`.
	matches = documentElement.matches ||
		documentElement.webkitMatchesSelector ||
		documentElement.msMatchesSelector;

	// Support: IE 9 - 11+, Edge 12 - 18+
	// Accessing iframe documents after unload throws "permission denied" errors (see trac-13936)
	// Support: IE 11+, Edge 17 - 18+
	// IE/Edge sometimes throw a "Permission denied" error when strict-comparing
	// two documents; shallow comparisons work.
	// eslint-disable-next-line eqeqeq
	if ( preferredDoc != document &&
		( subWindow = document.defaultView ) && subWindow.top !== subWindow ) {

		// Support: IE 9 - 11+, Edge 12 - 18+
		subWindow.addEventListener( "unload", unloadHandler );
	}

	// Support: IE <10
	// Check if getElementById returns elements by name
	// The broken getElementById methods don't pick up programmatically-set names,
	// so use a roundabout getElementsByName test
	support.getById = assert( function( el ) {
		documentElement.appendChild( el ).id = jQuery.expando;
		return !document.getElementsByName ||
			!document.getElementsByName( jQuery.expando ).length;
	} );

	// Support: IE 9 only
	// Check to see if it's possible to do matchesSelector
	// on a disconnected node.
	support.disconnectedMatch = assert( function( el ) {
		return matches.call( el, "*" );
	} );

	// Support: IE 9 - 11+, Edge 12 - 18+
	// IE/Edge don't support the :scope pseudo-class.
	support.scope = assert( function() {
		return document.querySelectorAll( ":scope" );
	} );

	// Support: Chrome 105 - 111 only, Safari 15.4 - 16.3 only
	// Make sure the `:has()` argument is parsed unforgivingly.
	// We include `*` in the test to detect buggy implementations that are
	// _selectively_ forgiving (specifically when the list includes at least
	// one valid selector).
	// Note that we treat complete lack of support for `:has()` as if it were
	// spec-compliant support, which is fine because use of `:has()` in such
	// environments will fail in the qSA path and fall back to jQuery traversal
	// anyway.
	support.cssHas = assert( function() {
		try {
			document.querySelector( ":has(*,:jqfake)" );
			return false;
		} catch ( e ) {
			return true;
		}
	} );

	// ID filter and find
	if ( support.getById ) {
		Expr.filter.ID = function( id ) {
			var attrId = id.replace( runescape, funescape );
			return function( elem ) {
				return elem.getAttribute( "id" ) === attrId;
			};
		};
		Expr.find.ID = function( id, context ) {
			if ( typeof context.getElementById !== "undefined" && documentIsHTML ) {
				var elem = context.getElementById( id );
				return elem ? [ elem ] : [];
			}
		};
	} else {
		Expr.filter.ID =  function( id ) {
			var attrId = id.replace( runescape, funescape );
			return function( elem ) {
				var node = typeof elem.getAttributeNode !== "undefined" &&
					elem.getAttributeNode( "id" );
				return node && node.value === attrId;
			};
		};

		// Support: IE 6 - 7 only
		// getElementById is not reliable as a find shortcut
		Expr.find.ID = function( id, context ) {
			if ( typeof context.getElementById !== "undefined" && documentIsHTML ) {
				var node, i, elems,
					elem = context.getElementById( id );

				if ( elem ) {

					// Verify the id attribute
					node = elem.getAttributeNode( "id" );
					if ( node && node.value === id ) {
						return [ elem ];
					}

					// Fall back on getElementsByName
					elems = context.getElementsByName( id );
					i = 0;
					while ( ( elem = elems[ i++ ] ) ) {
						node = elem.getAttributeNode( "id" );
						if ( node && node.value === id ) {
							return [ elem ];
						}
					}
				}

				return [];
			}
		};
	}

	// Tag
	Expr.find.TAG = function( tag, context ) {
		if ( typeof context.getElementsByTagName !== "undefined" ) {
			return context.getElementsByTagName( tag );

		// DocumentFragment nodes don't have gEBTN
		} else {
			return context.querySelectorAll( tag );
		}
	};

	// Class
	Expr.find.CLASS = function( className, context ) {
		if ( typeof context.getElementsByClassName !== "undefined" && documentIsHTML ) {
			return context.getElementsByClassName( className );
		}
	};

	/* QSA/matchesSelector
	---------------------------------------------------------------------- */

	// QSA and matchesSelector support

	rbuggyQSA = [];

	// Build QSA regex
	// Regex strategy adopted from Diego Perini
	assert( function( el ) {

		var input;

		documentElement.appendChild( el ).innerHTML =
			"<a id='" + expando + "' href='' disabled='disabled'></a>" +
			"<select id='" + expando + "-\r\\' disabled='disabled'>" +
			"<option selected=''></option></select>";

		// Support: iOS <=7 - 8 only
		// Boolean attributes and "value" are not treated correctly in some XML documents
		if ( !el.querySelectorAll( "[selected]" ).length ) {
			rbuggyQSA.push( "\\[" + whitespace + "*(?:value|" + booleans + ")" );
		}

		// Support: iOS <=7 - 8 only
		if ( !el.querySelectorAll( "[id~=" + expando + "-]" ).length ) {
			rbuggyQSA.push( "~=" );
		}

		// Support: iOS 8 only
		// https://bugs.webkit.org/show_bug.cgi?id=136851
		// In-page `selector#id sibling-combinator selector` fails
		if ( !el.querySelectorAll( "a#" + expando + "+*" ).length ) {
			rbuggyQSA.push( ".#.+[+~]" );
		}

		// Support: Chrome <=105+, Firefox <=104+, Safari <=15.4+
		// In some of the document kinds, these selectors wouldn't work natively.
		// This is probably OK but for backwards compatibility we want to maintain
		// handling them through jQuery traversal in jQuery 3.x.
		if ( !el.querySelectorAll( ":checked" ).length ) {
			rbuggyQSA.push( ":checked" );
		}

		// Support: Windows 8 Native Apps
		// The type and name attributes are restricted during .innerHTML assignment
		input = document.createElement( "input" );
		input.setAttribute( "type", "hidden" );
		el.appendChild( input ).setAttribute( "name", "D" );

		// Support: IE 9 - 11+
		// IE's :disabled selector does not pick up the children of disabled fieldsets
		// Support: Chrome <=105+, Firefox <=104+, Safari <=15.4+
		// In some of the document kinds, these selectors wouldn't work natively.
		// This is probably OK but for backwards compatibility we want to maintain
		// handling them through jQuery traversal in jQuery 3.x.
		documentElement.appendChild( el ).disabled = true;
		if ( el.querySelectorAll( ":disabled" ).length !== 2 ) {
			rbuggyQSA.push( ":enabled", ":disabled" );
		}

		// Support: IE 11+, Edge 15 - 18+
		// IE 11/Edge don't find elements on a `[name='']` query in some cases.
		// Adding a temporary attribute to the document before the selection works
		// around the issue.
		// Interestingly, IE 10 & older don't seem to have the issue.
		input = document.createElement( "input" );
		input.setAttribute( "name", "" );
		el.appendChild( input );
		if ( !el.querySelectorAll( "[name='']" ).length ) {
			rbuggyQSA.push( "\\[" + whitespace + "*name" + whitespace + "*=" +
				whitespace + "*(?:''|\"\")" );
		}
	} );

	if ( !support.cssHas ) {

		// Support: Chrome 105 - 110+, Safari 15.4 - 16.3+
		// Our regular `try-catch` mechanism fails to detect natively-unsupported
		// pseudo-classes inside `:has()` (such as `:has(:contains("Foo"))`)
		// in browsers that parse the `:has()` argument as a forgiving selector list.
		// https://drafts.csswg.org/selectors/#relational now requires the argument
		// to be parsed unforgivingly, but browsers have not yet fully adjusted.
		rbuggyQSA.push( ":has" );
	}

	rbuggyQSA = rbuggyQSA.length && new RegExp( rbuggyQSA.join( "|" ) );

	/* Sorting
	---------------------------------------------------------------------- */

	// Document order sorting
	sortOrder = function( a, b ) {

		// Flag for duplicate removal
		if ( a === b ) {
			hasDuplicate = true;
			return 0;
		}

		// Sort on method existence if only one input has compareDocumentPosition
		var compare = !a.compareDocumentPosition - !b.compareDocumentPosition;
		if ( compare ) {
			return compare;
		}

		// Calculate position if both inputs belong to the same document
		// Support: IE 11+, Edge 17 - 18+
		// IE/Edge sometimes throw a "Permission denied" error when strict-comparing
		// two documents; shallow comparisons work.
		// eslint-disable-next-line eqeqeq
		compare = ( a.ownerDocument || a ) == ( b.ownerDocument || b ) ?
			a.compareDocumentPosition( b ) :

			// Otherwise we know they are disconnected
			1;

		// Disconnected nodes
		if ( compare & 1 ||
			( !support.sortDetached && b.compareDocumentPosition( a ) === compare ) ) {

			// Choose the first element that is related to our preferred document
			// Support: IE 11+, Edge 17 - 18+
			// IE/Edge sometimes throw a "Permission denied" error when strict-comparing
			// two documents; shallow comparisons work.
			// eslint-disable-next-line eqeqeq
			if ( a === document || a.ownerDocument == preferredDoc &&
				find.contains( preferredDoc, a ) ) {
				return -1;
			}

			// Support: IE 11+, Edge 17 - 18+
			// IE/Edge sometimes throw a "Permission denied" error when strict-comparing
			// two documents; shallow comparisons work.
			// eslint-disable-next-line eqeqeq
			if ( b === document || b.ownerDocument == preferredDoc &&
				find.contains( preferredDoc, b ) ) {
				return 1;
			}

			// Maintain original order
			return sortInput ?
				( indexOf.call( sortInput, a ) - indexOf.call( sortInput, b ) ) :
				0;
		}

		return compare & 4 ? -1 : 1;
	};

	return document;
}

find.matches = function( expr, elements ) {
	return find( expr, null, null, elements );
};

find.matchesSelector = function( elem, expr ) {
	setDocument( elem );

	if ( documentIsHTML &&
		!nonnativeSelectorCache[ expr + " " ] &&
		( !rbuggyQSA || !rbuggyQSA.test( expr ) ) ) {

		try {
			var ret = matches.call( elem, expr );

			// IE 9's matchesSelector returns false on disconnected nodes
			if ( ret || support.disconnectedMatch ||

					// As well, disconnected nodes are said to be in a document
					// fragment in IE 9
					elem.document && elem.document.nodeType !== 11 ) {
				return ret;
			}
		} catch ( e ) {
			nonnativeSelectorCache( expr, true );
		}
	}

	return find( expr, document, null, [ elem ] ).length > 0;
};

find.contains = function( context, elem ) {

	// Set document vars if needed
	// Support: IE 11+, Edge 17 - 18+
	// IE/Edge sometimes throw a "Permission denied" error when strict-comparing
	// two documents; shallow comparisons work.
	// eslint-disable-next-line eqeqeq
	if ( ( context.ownerDocument || context ) != document ) {
		setDocument( context );
	}
	return jQuery.contains( context, elem );
};


find.attr = function( elem, name ) {

	// Set document vars if needed
	// Support: IE 11+, Edge 17 - 18+
	// IE/Edge sometimes throw a "Permission denied" error when strict-comparing
	// two documents; shallow comparisons work.
	// eslint-disable-next-line eqeqeq
	if ( ( elem.ownerDocument || elem ) != document ) {
		setDocument( elem );
	}

	var fn = Expr.attrHandle[ name.toLowerCase() ],

		// Don't get fooled by Object.prototype properties (see trac-13807)
		val = fn && hasOwn.call( Expr.attrHandle, name.toLowerCase() ) ?
			fn( elem, name, !documentIsHTML ) :
			undefined;

	if ( val !== undefined ) {
		return val;
	}

	return elem.getAttribute( name );
};

find.error = function( msg ) {
	throw new Error( "Syntax error, unrecognized expression: " + msg );
};

/**
 * Document sorting and removing duplicates
 * @param {ArrayLike} results
 */
jQuery.uniqueSort = function( results ) {
	var elem,
		duplicates = [],
		j = 0,
		i = 0;

	// Unless we *know* we can detect duplicates, assume their presence
	//
	// Support: Android <=4.0+
	// Testing for detecting duplicates is unpredictable so instead assume we can't
	// depend on duplicate detection in all browsers without a stable sort.
	hasDuplicate = !support.sortStable;
	sortInput = !support.sortStable && slice.call( results, 0 );
	sort.call( results, sortOrder );

	if ( hasDuplicate ) {
		while ( ( elem = results[ i++ ] ) ) {
			if ( elem === results[ i ] ) {
				j = duplicates.push( i );
			}
		}
		while ( j-- ) {
			splice.call( results, duplicates[ j ], 1 );
		}
	}

	// Clear input after sorting to release objects
	// See https://github.com/jquery/sizzle/pull/225
	sortInput = null;

	return results;
};

jQuery.fn.uniqueSort = function() {
	return this.pushStack( jQuery.uniqueSort( slice.apply( this ) ) );
};

Expr = jQuery.expr = {

	// Can be adjusted by the user
	cacheLength: 50,

	createPseudo: markFunction,

	match: matchExpr,

	attrHandle: {},

	find: {},

	relative: {
		">": { dir: "parentNode", first: true },
		" ": { dir: "parentNode" },
		"+": { dir: "previousSibling", first: true },
		"~": { dir: "previousSibling" }
	},

	preFilter: {
		ATTR: function( match ) {
			match[ 1 ] = match[ 1 ].replace( runescape, funescape );

			// Move the given value to match[3] whether quoted or unquoted
			match[ 3 ] = ( match[ 3 ] || match[ 4 ] || match[ 5 ] || "" )
				.replace( runescape, funescape );

			if ( match[ 2 ] === "~=" ) {
				match[ 3 ] = " " + match[ 3 ] + " ";
			}

			return match.slice( 0, 4 );
		},

		CHILD: function( match ) {

			/* matches from matchExpr["CHILD"]
				1 type (only|nth|...)
				2 what (child|of-type)
				3 argument (even|odd|\d*|\d*n([+-]\d+)?|...)
				4 xn-component of xn+y argument ([+-]?\d*n|)
				5 sign of xn-component
				6 x of xn-component
				7 sign of y-component
				8 y of y-component
			*/
			match[ 1 ] = match[ 1 ].toLowerCase();

			if ( match[ 1 ].slice( 0, 3 ) === "nth" ) {

				// nth-* requires argument
				if ( !match[ 3 ] ) {
					find.error( match[ 0 ] );
				}

				// numeric x and y parameters for Expr.filter.CHILD
				// remember that false/true cast respectively to 0/1
				match[ 4 ] = +( match[ 4 ] ?
					match[ 5 ] + ( match[ 6 ] || 1 ) :
					2 * ( match[ 3 ] === "even" || match[ 3 ] === "odd" )
				);
				match[ 5 ] = +( ( match[ 7 ] + match[ 8 ] ) || match[ 3 ] === "odd" );

			// other types prohibit arguments
			} else if ( match[ 3 ] ) {
				find.error( match[ 0 ] );
			}

			return match;
		},

		PSEUDO: function( match ) {
			var excess,
				unquoted = !match[ 6 ] && match[ 2 ];

			if ( matchExpr.CHILD.test( match[ 0 ] ) ) {
				return null;
			}

			// Accept quoted arguments as-is
			if ( match[ 3 ] ) {
				match[ 2 ] = match[ 4 ] || match[ 5 ] || "";

			// Strip excess characters from unquoted arguments
			} else if ( unquoted && rpseudo.test( unquoted ) &&

				// Get excess from tokenize (recursively)
				( excess = tokenize( unquoted, true ) ) &&

				// advance to the next closing parenthesis
				( excess = unquoted.indexOf( ")", unquoted.length - excess ) - unquoted.length ) ) {

				// excess is a negative index
				match[ 0 ] = match[ 0 ].slice( 0, excess );
				match[ 2 ] = unquoted.slice( 0, excess );
			}

			// Return only captures needed by the pseudo filter method (type and argument)
			return match.slice( 0, 3 );
		}
	},

	filter: {

		TAG: function( nodeNameSelector ) {
			var expectedNodeName = nodeNameSelector.replace( runescape, funescape ).toLowerCase();
			return nodeNameSelector === "*" ?
				function() {
					return true;
				} :
				function( elem ) {
					return nodeName( elem, expectedNodeName );
				};
		},

		CLASS: function( className ) {
			var pattern = classCache[ className + " " ];

			return pattern ||
				( pattern = new RegExp( "(^|" + whitespace + ")" + className +
					"(" + whitespace + "|$)" ) ) &&
				classCache( className, function( elem ) {
					return pattern.test(
						typeof elem.className === "string" && elem.className ||
							typeof elem.getAttribute !== "undefined" &&
								elem.getAttribute( "class" ) ||
							""
					);
				} );
		},

		ATTR: function( name, operator, check ) {
			return function( elem ) {
				var result = find.attr( elem, name );

				if ( result == null ) {
					return operator === "!=";
				}
				if ( !operator ) {
					return true;
				}

				result += "";

				if ( operator === "=" ) {
					return result === check;
				}
				if ( operator === "!=" ) {
					return result !== check;
				}
				if ( operator === "^=" ) {
					return check && result.indexOf( check ) === 0;
				}
				if ( operator === "*=" ) {
					return check && result.indexOf( check ) > -1;
				}
				if ( operator === "$=" ) {
					return check && result.slice( -check.length ) === check;
				}
				if ( operator === "~=" ) {
					return ( " " + result.replace( rwhitespace, " " ) + " " )
						.indexOf( check ) > -1;
				}
				if ( operator === "|=" ) {
					return result === check || result.slice( 0, check.length + 1 ) === check + "-";
				}

				return false;
			};
		},

		CHILD: function( type, what, _argument, first, last ) {
			var simple = type.slice( 0, 3 ) !== "nth",
				forward = type.slice( -4 ) !== "last",
				ofType = what === "of-type";

			return first === 1 && last === 0 ?

				// Shortcut for :nth-*(n)
				function( elem ) {
					return !!elem.parentNode;
				} :

				function( elem, _context, xml ) {
					var cache, outerCache, node, nodeIndex, start,
						dir = simple !== forward ? "nextSibling" : "previousSibling",
						parent = elem.parentNode,
						name = ofType && elem.nodeName.toLowerCase(),
						useCache = !xml && !ofType,
						diff = false;

					if ( parent ) {

						// :(first|last|only)-(child|of-type)
						if ( simple ) {
							while ( dir ) {
								node = elem;
								while ( ( node = node[ dir ] ) ) {
									if ( ofType ?
										nodeName( node, name ) :
										node.nodeType === 1 ) {

										return false;
									}
								}

								// Reverse direction for :only-* (if we haven't yet done so)
								start = dir = type === "only" && !start && "nextSibling";
							}
							return true;
						}

						start = [ forward ? parent.firstChild : parent.lastChild ];

						// non-xml :nth-child(...) stores cache data on `parent`
						if ( forward && useCache ) {

							// Seek `elem` from a previously-cached index
							outerCache = parent[ expando ] || ( parent[ expando ] = {} );
							cache = outerCache[ type ] || [];
							nodeIndex = cache[ 0 ] === dirruns && cache[ 1 ];
							diff = nodeIndex && cache[ 2 ];
							node = nodeIndex && parent.childNodes[ nodeIndex ];

							while ( ( node = ++nodeIndex && node && node[ dir ] ||

								// Fallback to seeking `elem` from the start
								( diff = nodeIndex = 0 ) || start.pop() ) ) {

								// When found, cache indexes on `parent` and break
								if ( node.nodeType === 1 && ++diff && node === elem ) {
									outerCache[ type ] = [ dirruns, nodeIndex, diff ];
									break;
								}
							}

						} else {

							// Use previously-cached element index if available
							if ( useCache ) {
								outerCache = elem[ expando ] || ( elem[ expando ] = {} );
								cache = outerCache[ type ] || [];
								nodeIndex = cache[ 0 ] === dirruns && cache[ 1 ];
								diff = nodeIndex;
							}

							// xml :nth-child(...)
							// or :nth-last-child(...) or :nth(-last)?-of-type(...)
							if ( diff === false ) {

								// Use the same loop as above to seek `elem` from the start
								while ( ( node = ++nodeIndex && node && node[ dir ] ||
									( diff = nodeIndex = 0 ) || start.pop() ) ) {

									if ( ( ofType ?
										nodeName( node, name ) :
										node.nodeType === 1 ) &&
										++diff ) {

										// Cache the index of each encountered element
										if ( useCache ) {
											outerCache = node[ expando ] ||
												( node[ expando ] = {} );
											outerCache[ type ] = [ dirruns, diff ];
										}

										if ( node === elem ) {
											break;
										}
									}
								}
							}
						}

						// Incorporate the offset, then check against cycle size
						diff -= last;
						return diff === first || ( diff % first === 0 && diff / first >= 0 );
					}
				};
		},

		PSEUDO: function( pseudo, argument ) {

			// pseudo-class names are case-insensitive
			// https://www.w3.org/TR/selectors/#pseudo-classes
			// Prioritize by case sensitivity in case custom pseudos are added with uppercase letters
			// Remember that setFilters inherits from pseudos
			var args,
				fn = Expr.pseudos[ pseudo ] || Expr.setFilters[ pseudo.toLowerCase() ] ||
					find.error( "unsupported pseudo: " + pseudo );

			// The user may use createPseudo to indicate that
			// arguments are needed to create the filter function
			// just as jQuery does
			if ( fn[ expando ] ) {
				return fn( argument );
			}

			// But maintain support for old signatures
			if ( fn.length > 1 ) {
				args = [ pseudo, pseudo, "", argument ];
				return Expr.setFilters.hasOwnProperty( pseudo.toLowerCase() ) ?
					markFunction( function( seed, matches ) {
						var idx,
							matched = fn( seed, argument ),
							i = matched.length;
						while ( i-- ) {
							idx = indexOf.call( seed, matched[ i ] );
							seed[ idx ] = !( matches[ idx ] = matched[ i ] );
						}
					} ) :
					function( elem ) {
						return fn( elem, 0, args );
					};
			}

			return fn;
		}
	},

	pseudos: {

		// Potentially complex pseudos
		not: markFunction( function( selector ) {

			// Trim the selector passed to compile
			// to avoid treating leading and trailing
			// spaces as combinators
			var input = [],
				results = [],
				matcher = compile( selector.replace( rtrimCSS, "$1" ) );

			return matcher[ expando ] ?
				markFunction( function( seed, matches, _context, xml ) {
					var elem,
						unmatched = matcher( seed, null, xml, [] ),
						i = seed.length;

					// Match elements unmatched by `matcher`
					while ( i-- ) {
						if ( ( elem = unmatched[ i ] ) ) {
							seed[ i ] = !( matches[ i ] = elem );
						}
					}
				} ) :
				function( elem, _context, xml ) {
					input[ 0 ] = elem;
					matcher( input, null, xml, results );

					// Don't keep the element
					// (see https://github.com/jquery/sizzle/issues/299)
					input[ 0 ] = null;
					return !results.pop();
				};
		} ),

		has: markFunction( function( selector ) {
			return function( elem ) {
				return find( selector, elem ).length > 0;
			};
		} ),

		contains: markFunction( function( text ) {
			text = text.replace( runescape, funescape );
			return function( elem ) {
				return ( elem.textContent || jQuery.text( elem ) ).indexOf( text ) > -1;
			};
		} ),

		// "Whether an element is represented by a :lang() selector
		// is based solely on the element's language value
		// being equal to the identifier C,
		// or beginning with the identifier C immediately followed by "-".
		// The matching of C against the element's language value is performed case-insensitively.
		// The identifier C does not have to be a valid language name."
		// https://www.w3.org/TR/selectors/#lang-pseudo
		lang: markFunction( function( lang ) {

			// lang value must be a valid identifier
			if ( !ridentifier.test( lang || "" ) ) {
				find.error( "unsupported lang: " + lang );
			}
			lang = lang.replace( runescape, funescape ).toLowerCase();
			return function( elem ) {
				var elemLang;
				do {
					if ( ( elemLang = documentIsHTML ?
						elem.lang :
						elem.getAttribute( "xml:lang" ) || elem.getAttribute( "lang" ) ) ) {

						elemLang = elemLang.toLowerCase();
						return elemLang === lang || elemLang.indexOf( lang + "-" ) === 0;
					}
				} while ( ( elem = elem.parentNode ) && elem.nodeType === 1 );
				return false;
			};
		} ),

		// Miscellaneous
		target: function( elem ) {
			var hash = window.location && window.location.hash;
			return hash && hash.slice( 1 ) === elem.id;
		},

		root: function( elem ) {
			return elem === documentElement;
		},

		focus: function( elem ) {
			return elem === safeActiveElement() &&
				document.hasFocus() &&
				!!( elem.type || elem.href || ~elem.tabIndex );
		},

		// Boolean properties
		enabled: createDisabledPseudo( false ),
		disabled: createDisabledPseudo( true ),

		checked: function( elem ) {

			// In CSS3, :checked should return both checked and selected elements
			// https://www.w3.org/TR/2011/REC-css3-selectors-20110929/#checked
			return ( nodeName( elem, "input" ) && !!elem.checked ) ||
				( nodeName( elem, "option" ) && !!elem.selected );
		},

		selected: function( elem ) {

			// Support: IE <=11+
			// Accessing the selectedIndex property
			// forces the browser to treat the default option as
			// selected when in an optgroup.
			if ( elem.parentNode ) {
				// eslint-disable-next-line no-unused-expressions
				elem.parentNode.selectedIndex;
			}

			return elem.selected === true;
		},

		// Contents
		empty: function( elem ) {

			// https://www.w3.org/TR/selectors/#empty-pseudo
			// :empty is negated by element (1) or content nodes (text: 3; cdata: 4; entity ref: 5),
			//   but not by others (comment: 8; processing instruction: 7; etc.)
			// nodeType < 6 works because attributes (2) do not appear as children
			for ( elem = elem.firstChild; elem; elem = elem.nextSibling ) {
				if ( elem.nodeType < 6 ) {
					return false;
				}
			}
			return true;
		},

		parent: function( elem ) {
			return !Expr.pseudos.empty( elem );
		},

		// Element/input types
		header: function( elem ) {
			return rheader.test( elem.nodeName );
		},

		input: function( elem ) {
			return rinputs.test( elem.nodeName );
		},

		button: function( elem ) {
			return nodeName( elem, "input" ) && elem.type === "button" ||
				nodeName( elem, "button" );
		},

		text: function( elem ) {
			var attr;
			return nodeName( elem, "input" ) && elem.type === "text" &&

				// Support: IE <10 only
				// New HTML5 attribute values (e.g., "search") appear
				// with elem.type === "text"
				( ( attr = elem.getAttribute( "type" ) ) == null ||
					attr.toLowerCase() === "text" );
		},

		// Position-in-collection
		first: createPositionalPseudo( function() {
			return [ 0 ];
		} ),

		last: createPositionalPseudo( function( _matchIndexes, length ) {
			return [ length - 1 ];
		} ),

		eq: createPositionalPseudo( function( _matchIndexes, length, argument ) {
			return [ argument < 0 ? argument + length : argument ];
		} ),

		even: createPositionalPseudo( function( matchIndexes, length ) {
			var i = 0;
			for ( ; i < length; i += 2 ) {
				matchIndexes.push( i );
			}
			return matchIndexes;
		} ),

		odd: createPositionalPseudo( function( matchIndexes, length ) {
			var i = 1;
			for ( ; i < length; i += 2 ) {
				matchIndexes.push( i );
			}
			return matchIndexes;
		} ),

		lt: createPositionalPseudo( function( matchIndexes, length, argument ) {
			var i;

			if ( argument < 0 ) {
				i = argument + length;
			} else if ( argument > length ) {
				i = length;
			} else {
				i = argument;
			}

			for ( ; --i >= 0; ) {
				matchIndexes.push( i );
			}
			return matchIndexes;
		} ),

		gt: createPositionalPseudo( function( matchIndexes, length, argument ) {
			var i = argument < 0 ? argument + length : argument;
			for ( ; ++i < length; ) {
				matchIndexes.push( i );
			}
			return matchIndexes;
		} )
	}
};

Expr.pseudos.nth = Expr.pseudos.eq;

// Add button/input type pseudos
for ( i in { radio: true, checkbox: true, file: true, password: true, image: true } ) {
	Expr.pseudos[ i ] = createInputPseudo( i );
}
for ( i in { submit: true, reset: true } ) {
	Expr.pseudos[ i ] = createButtonPseudo( i );
}

// Easy API for creating new setFilters
function setFilters() {}
setFilters.prototype = Expr.filters = Expr.pseudos;
Expr.setFilters = new setFilters();

function tokenize( selector, parseOnly ) {
	var matched, match, tokens, type,
		soFar, groups, preFilters,
		cached = tokenCache[ selector + " " ];

	if ( cached ) {
		return parseOnly ? 0 : cached.slice( 0 );
	}

	soFar = selector;
	groups = [];
	preFilters = Expr.preFilter;

	while ( soFar ) {

		// Comma and first run
		if ( !matched || ( match = rcomma.exec( soFar ) ) ) {
			if ( match ) {

				// Don't consume trailing commas as valid
				soFar = soFar.slice( match[ 0 ].length ) || soFar;
			}
			groups.push( ( tokens = [] ) );
		}

		matched = false;

		// Combinators
		if ( ( match = rleadingCombinator.exec( soFar ) ) ) {
			matched = match.shift();
			tokens.push( {
				value: matched,

				// Cast descendant combinators to space
				type: match[ 0 ].replace( rtrimCSS, " " )
			} );
			soFar = soFar.slice( matched.length );
		}

		// Filters
		for ( type in Expr.filter ) {
			if ( ( match = matchExpr[ type ].exec( soFar ) ) && ( !preFilters[ type ] ||
				( match = preFilters[ type ]( match ) ) ) ) {
				matched = match.shift();
				tokens.push( {
					value: matched,
					type: type,
					matches: match
				} );
				soFar = soFar.slice( matched.length );
			}
		}

		if ( !matched ) {
			break;
		}
	}

	// Return the length of the invalid excess
	// if we're just parsing
	// Otherwise, throw an error or return tokens
	if ( parseOnly ) {
		return soFar.length;
	}

	return soFar ?
		find.error( selector ) :

		// Cache the tokens
		tokenCache( selector, groups ).slice( 0 );
}

function toSelector( tokens ) {
	var i = 0,
		len = tokens.length,
		selector = "";
	for ( ; i < len; i++ ) {
		selector += tokens[ i ].value;
	}
	return selector;
}

function addCombinator( matcher, combinator, base ) {
	var dir = combinator.dir,
		skip = combinator.next,
		key = skip || dir,
		checkNonElements = base && key === "parentNode",
		doneName = done++;

	return combinator.first ?

		// Check against closest ancestor/preceding element
		function( elem, context, xml ) {
			while ( ( elem = elem[ dir ] ) ) {
				if ( elem.nodeType === 1 || checkNonElements ) {
					return matcher( elem, context, xml );
				}
			}
			return false;
		} :

		// Check against all ancestor/preceding elements
		function( elem, context, xml ) {
			var oldCache, outerCache,
				newCache = [ dirruns, doneName ];

			// We can't set arbitrary data on XML nodes, so they don't benefit from combinator caching
			if ( xml ) {
				while ( ( elem = elem[ dir ] ) ) {
					if ( elem.nodeType === 1 || checkNonElements ) {
						if ( matcher( elem, context, xml ) ) {
							return true;
						}
					}
				}
			} else {
				while ( ( elem = elem[ dir ] ) ) {
					if ( elem.nodeType === 1 || checkNonElements ) {
						outerCache = elem[ expando ] || ( elem[ expando ] = {} );

						if ( skip && nodeName( elem, skip ) ) {
							elem = elem[ dir ] || elem;
						} else if ( ( oldCache = outerCache[ key ] ) &&
							oldCache[ 0 ] === dirruns && oldCache[ 1 ] === doneName ) {

							// Assign to newCache so results back-propagate to previous elements
							return ( newCache[ 2 ] = oldCache[ 2 ] );
						} else {

							// Reuse newcache so results back-propagate to previous elements
							outerCache[ key ] = newCache;

							// A match means we're done; a fail means we have to keep checking
							if ( ( newCache[ 2 ] = matcher( elem, context, xml ) ) ) {
								return true;
							}
						}
					}
				}
			}
			return false;
		};
}

function elementMatcher( matchers ) {
	return matchers.length > 1 ?
		function( elem, context, xml ) {
			var i = matchers.length;
			while ( i-- ) {
				if ( !matchers[ i ]( elem, context, xml ) ) {
					return false;
				}
			}
			return true;
		} :
		matchers[ 0 ];
}

function multipleContexts( selector, contexts, results ) {
	var i = 0,
		len = contexts.length;
	for ( ; i < len; i++ ) {
		find( selector, contexts[ i ], results );
	}
	return results;
}

function condense( unmatched, map, filter, context, xml ) {
	var elem,
		newUnmatched = [],
		i = 0,
		len = unmatched.length,
		mapped = map != null;

	for ( ; i < len; i++ ) {
		if ( ( elem = unmatched[ i ] ) ) {
			if ( !filter || filter( elem, context, xml ) ) {
				newUnmatched.push( elem );
				if ( mapped ) {
					map.push( i );
				}
			}
		}
	}

	return newUnmatched;
}

function setMatcher( preFilter, selector, matcher, postFilter, postFinder, postSelector ) {
	if ( postFilter && !postFilter[ expando ] ) {
		postFilter = setMatcher( postFilter );
	}
	if ( postFinder && !postFinder[ expando ] ) {
		postFinder = setMatcher( postFinder, postSelector );
	}
	return markFunction( function( seed, results, context, xml ) {
		var temp, i, elem, matcherOut,
			preMap = [],
			postMap = [],
			preexisting = results.length,

			// Get initial elements from seed or context
			elems = seed ||
				multipleContexts( selector || "*",
					context.nodeType ? [ context ] : context, [] ),

			// Prefilter to get matcher input, preserving a map for seed-results synchronization
			matcherIn = preFilter && ( seed || !selector ) ?
				condense( elems, preMap, preFilter, context, xml ) :
				elems;

		if ( matcher ) {

			// If we have a postFinder, or filtered seed, or non-seed postFilter
			// or preexisting results,
			matcherOut = postFinder || ( seed ? preFilter : preexisting || postFilter ) ?

				// ...intermediate processing is necessary
				[] :

				// ...otherwise use results directly
				results;

			// Find primary matches
			matcher( matcherIn, matcherOut, context, xml );
		} else {
			matcherOut = matcherIn;
		}

		// Apply postFilter
		if ( postFilter ) {
			temp = condense( matcherOut, postMap );
			postFilter( temp, [], context, xml );

			// Un-match failing elements by moving them back to matcherIn
			i = temp.length;
			while ( i-- ) {
				if ( ( elem = temp[ i ] ) ) {
					matcherOut[ postMap[ i ] ] = !( matcherIn[ postMap[ i ] ] = elem );
				}
			}
		}

		if ( seed ) {
			if ( postFinder || preFilter ) {
				if ( postFinder ) {

					// Get the final matcherOut by condensing this intermediate into postFinder contexts
					temp = [];
					i = matcherOut.length;
					while ( i-- ) {
						if ( ( elem = matcherOut[ i ] ) ) {

							// Restore matcherIn since elem is not yet a final match
							temp.push( ( matcherIn[ i ] = elem ) );
						}
					}
					postFinder( null, ( matcherOut = [] ), temp, xml );
				}

				// Move matched elements from seed to results to keep them synchronized
				i = matcherOut.length;
				while ( i-- ) {
					if ( ( elem = matcherOut[ i ] ) &&
						( temp = postFinder ? indexOf.call( seed, elem ) : preMap[ i ] ) > -1 ) {

						seed[ temp ] = !( results[ temp ] = elem );
					}
				}
			}

		// Add elements to results, through postFinder if defined
		} else {
			matcherOut = condense(
				matcherOut === results ?
					matcherOut.splice( preexisting, matcherOut.length ) :
					matcherOut
			);
			if ( postFinder ) {
				postFinder( null, results, matcherOut, xml );
			} else {
				push.apply( results, matcherOut );
			}
		}
	} );
}

function matcherFromTokens( tokens ) {
	var checkContext, matcher, j,
		len = tokens.length,
		leadingRelative = Expr.relative[ tokens[ 0 ].type ],
		implicitRelative = leadingRelative || Expr.relative[ " " ],
		i = leadingRelative ? 1 : 0,

		// The foundational matcher ensures that elements are reachable from top-level context(s)
		matchContext = addCombinator( function( elem ) {
			return elem === checkContext;
		}, implicitRelative, true ),
		matchAnyContext = addCombinator( function( elem ) {
			return indexOf.call( checkContext, elem ) > -1;
		}, implicitRelative, true ),
		matchers = [ function( elem, context, xml ) {

			// Support: IE 11+, Edge 17 - 18+
			// IE/Edge sometimes throw a "Permission denied" error when strict-comparing
			// two documents; shallow comparisons work.
			// eslint-disable-next-line eqeqeq
			var ret = ( !leadingRelative && ( xml || context != outermostContext ) ) || (
				( checkContext = context ).nodeType ?
					matchContext( elem, context, xml ) :
					matchAnyContext( elem, context, xml ) );

			// Avoid hanging onto element
			// (see https://github.com/jquery/sizzle/issues/299)
			checkContext = null;
			return ret;
		} ];

	for ( ; i < len; i++ ) {
		if ( ( matcher = Expr.relative[ tokens[ i ].type ] ) ) {
			matchers = [ addCombinator( elementMatcher( matchers ), matcher ) ];
		} else {
			matcher = Expr.filter[ tokens[ i ].type ].apply( null, tokens[ i ].matches );

			// Return special upon seeing a positional matcher
			if ( matcher[ expando ] ) {

				// Find the next relative operator (if any) for proper handling
				j = ++i;
				for ( ; j < len; j++ ) {
					if ( Expr.relative[ tokens[ j ].type ] ) {
						break;
					}
				}
				return setMatcher(
					i > 1 && elementMatcher( matchers ),
					i > 1 && toSelector(

						// If the preceding token was a descendant combinator, insert an implicit any-element `*`
						tokens.slice( 0, i - 1 )
							.concat( { value: tokens[ i - 2 ].type === " " ? "*" : "" } )
					).replace( rtrimCSS, "$1" ),
					matcher,
					i < j && matcherFromTokens( tokens.slice( i, j ) ),
					j < len && matcherFromTokens( ( tokens = tokens.slice( j ) ) ),
					j < len && toSelector( tokens )
				);
			}
			matchers.push( matcher );
		}
	}

	return elementMatcher( matchers );
}

function matcherFromGroupMatchers( elementMatchers, setMatchers ) {
	var bySet = setMatchers.length > 0,
		byElement = elementMatchers.length > 0,
		superMatcher = function( seed, context, xml, results, outermost ) {
			var elem, j, matcher,
				matchedCount = 0,
				i = "0",
				unmatched = seed && [],
				setMatched = [],
				contextBackup = outermostContext,

				// We must always have either seed elements or outermost context
				elems = seed || byElement && Expr.find.TAG( "*", outermost ),

				// Use integer dirruns iff this is the outermost matcher
				dirrunsUnique = ( dirruns += contextBackup == null ? 1 : Math.random() || 0.1 ),
				len = elems.length;

			if ( outermost ) {

				// Support: IE 11+, Edge 17 - 18+
				// IE/Edge sometimes throw a "Permission denied" error when strict-comparing
				// two documents; shallow comparisons work.
				// eslint-disable-next-line eqeqeq
				outermostContext = context == document || context || outermost;
			}

			// Add elements passing elementMatchers directly to results
			// Support: iOS <=7 - 9 only
			// Tolerate NodeList properties (IE: "length"; Safari: <number>) matching
			// elements by id. (see trac-14142)
			for ( ; i !== len && ( elem = elems[ i ] ) != null; i++ ) {
				if ( byElement && elem ) {
					j = 0;

					// Support: IE 11+, Edge 17 - 18+
					// IE/Edge sometimes throw a "Permission denied" error when strict-comparing
					// two documents; shallow comparisons work.
					// eslint-disable-next-line eqeqeq
					if ( !context && elem.ownerDocument != document ) {
						setDocument( elem );
						xml = !documentIsHTML;
					}
					while ( ( matcher = elementMatchers[ j++ ] ) ) {
						if ( matcher( elem, context || document, xml ) ) {
							push.call( results, elem );
							break;
						}
					}
					if ( outermost ) {
						dirruns = dirrunsUnique;
					}
				}

				// Track unmatched elements for set filters
				if ( bySet ) {

					// They will have gone through all possible matchers
					if ( ( elem = !matcher && elem ) ) {
						matchedCount--;
					}

					// Lengthen the array for every element, matched or not
					if ( seed ) {
						unmatched.push( elem );
					}
				}
			}

			// `i` is now the count of elements visited above, and adding it to `matchedCount`
			// makes the latter nonnegative.
			matchedCount += i;

			// Apply set filters to unmatched elements
			// NOTE: This can be skipped if there are no unmatched elements (i.e., `matchedCount`
			// equals `i`), unless we didn't visit _any_ elements in the above loop because we have
			// no element matchers and no seed.
			// Incrementing an initially-string "0" `i` allows `i` to remain a string only in that
			// case, which will result in a "00" `matchedCount` that differs from `i` but is also
			// numerically zero.
			if ( bySet && i !== matchedCount ) {
				j = 0;
				while ( ( matcher = setMatchers[ j++ ] ) ) {
					matcher( unmatched, setMatched, context, xml );
				}

				if ( seed ) {

					// Reintegrate element matches to eliminate the need for sorting
					if ( matchedCount > 0 ) {
						while ( i-- ) {
							if ( !( unmatched[ i ] || setMatched[ i ] ) ) {
								setMatched[ i ] = pop.call( results );
							}
						}
					}

					// Discard index placeholder values to get only actual matches
					setMatched = condense( setMatched );
				}

				// Add matches to results
				push.apply( results, setMatched );

				// Seedless set matches succeeding multiple successful matchers stipulate sorting
				if ( outermost && !seed && setMatched.length > 0 &&
					( matchedCount + setMatchers.length ) > 1 ) {

					jQuery.uniqueSort( results );
				}
			}

			// Override manipulation of globals by nested matchers
			if ( outermost ) {
				dirruns = dirrunsUnique;
				outermostContext = contextBackup;
			}

			return unmatched;
		};

	return bySet ?
		markFunction( superMatcher ) :
		superMatcher;
}

function compile( selector, match /* Internal Use Only */ ) {
	var i,
		setMatchers = [],
		elementMatchers = [],
		cached = compilerCache[ selector + " " ];

	if ( !cached ) {

		// Generate a function of recursive functions that can be used to check each element
		if ( !match ) {
			match = tokenize( selector );
		}
		i = match.length;
		while ( i-- ) {
			cached = matcherFromTokens( match[ i ] );
			if ( cached[ expando ] ) {
				setMatchers.push( cached );
			} else {
				elementMatchers.push( cached );
			}
		}

		// Cache the compiled function
		cached = compilerCache( selector,
			matcherFromGroupMatchers( elementMatchers, setMatchers ) );

		// Save selector and tokenization
		cached.selector = selector;
	}
	return cached;
}

/**
 * A low-level selection function that works with jQuery's compiled
 *  selector functions
 * @param {String|Function} selector A selector or a pre-compiled
 *  selector function built with jQuery selector compile
 * @param {Element} context
 * @param {Array} [results]
 * @param {Array} [seed] A set of elements to match against
 */
function select( selector, context, results, seed ) {
	var i, tokens, token, type, find,
		compiled = typeof selector === "function" && selector,
		match = !seed && tokenize( ( selector = compiled.selector || selector ) );

	results = results || [];

	// Try to minimize operations if there is only one selector in the list and no seed
	// (the latter of which guarantees us context)
	if ( match.length === 1 ) {

		// Reduce context if the leading compound selector is an ID
		tokens = match[ 0 ] = match[ 0 ].slice( 0 );
		if ( tokens.length > 2 && ( token = tokens[ 0 ] ).type === "ID" &&
				context.nodeType === 9 && documentIsHTML && Expr.relative[ tokens[ 1 ].type ] ) {

			context = ( Expr.find.ID(
				token.matches[ 0 ].replace( runescape, funescape ),
				context
			) || [] )[ 0 ];
			if ( !context ) {
				return results;

			// Precompiled matchers will still verify ancestry, so step up a level
			} else if ( compiled ) {
				context = context.parentNode;
			}

			selector = selector.slice( tokens.shift().value.length );
		}

		// Fetch a seed set for right-to-left matching
		i = matchExpr.needsContext.test( selector ) ? 0 : tokens.length;
		while ( i-- ) {
			token = tokens[ i ];

			// Abort if we hit a combinator
			if ( Expr.relative[ ( type = token.type ) ] ) {
				break;
			}
			if ( ( find = Expr.find[ type ] ) ) {

				// Search, expanding context for leading sibling combinators
				if ( ( seed = find(
					token.matches[ 0 ].replace( runescape, funescape ),
					rsibling.test( tokens[ 0 ].type ) &&
						testContext( context.parentNode ) || context
				) ) ) {

					// If seed is empty or no tokens remain, we can return early
					tokens.splice( i, 1 );
					selector = seed.length && toSelector( tokens );
					if ( !selector ) {
						push.apply( results, seed );
						return results;
					}

					break;
				}
			}
		}
	}

	// Compile and execute a filtering function if one is not provided
	// Provide `match` to avoid retokenization if we modified the selector above
	( compiled || compile( selector, match ) )(
		seed,
		context,
		!documentIsHTML,
		results,
		!context || rsibling.test( selector ) && testContext( context.parentNode ) || context
	);
	return results;
}

// One-time assignments

// Support: Android <=4.0 - 4.1+
// Sort stability
support.sortStable = expando.split( "" ).sort( sortOrder ).join( "" ) === expando;

// Initialize against the default document
setDocument();

// Support: Android <=4.0 - 4.1+
// Detached nodes confoundingly follow *each other*
support.sortDetached = assert( function( el ) {

	// Should return 1, but returns 4 (following)
	return el.compareDocumentPosition( document.createElement( "fieldset" ) ) & 1;
} );

jQuery.find = find;

// Deprecated
jQuery.expr[ ":" ] = jQuery.expr.pseudos;
jQuery.unique = jQuery.uniqueSort;

// These have always been private, but they used to be documented
// as part of Sizzle so let's maintain them in the 3.x line
// for backwards compatibility purposes.
find.compile = compile;
find.select = select;
find.setDocument = setDocument;

find.escape = jQuery.escapeSelector;
find.getText = jQuery.text;
find.isXML = jQuery.isXMLDoc;
find.selectors = jQuery.expr;
find.support = jQuery.support;
find.uniqueSort = jQuery.uniqueSort;

	/* eslint-enable */

} )();


var dir = function( elem, dir, until ) {
	var matched = [],
		truncate = until !== undefined;

	while ( ( elem = elem[ dir ] ) && elem.nodeType !== 9 ) {
		if ( elem.nodeType === 1 ) {
			if ( truncate && jQuery( elem ).is( until ) ) {
				break;
			}
			matched.push( elem );
		}
	}
	return matched;
};


var siblings = function( n, elem ) {
	var matched = [];

	for ( ; n; n = n.nextSibling ) {
		if ( n.nodeType === 1 && n !== elem ) {
			matched.push( n );
		}
	}

	return matched;
};


var rneedsContext = jQuery.expr.match.needsContext;

var rsingleTag = ( /^<([a-z][^\/\0>:\x20\t\r\n\f]*)[\x20\t\r\n\f]*\/?>(?:<\/\1>|)$/i );



// Implement the identical functionality for filter and not
function winnow( elements, qualifier, not ) {
	if ( isFunction( qualifier ) ) {
		return jQuery.grep( elements, function( elem, i ) {
			return !!qualifier.call( elem, i, elem ) !== not;
		} );
	}

	// Single element
	if ( qualifier.nodeType ) {
		return jQuery.grep( elements, function( elem ) {
			return ( elem === qualifier ) !== not;
		} );
	}

	// Arraylike of elements (jQuery, arguments, Array)
	if ( typeof qualifier !== "string" ) {
		return jQuery.grep( elements, function( elem ) {
			return ( indexOf.call( qualifier, elem ) > -1 ) !== not;
		} );
	}

	// Filtered directly for both simple and complex selectors
	return jQuery.filter( qualifier, elements, not );
}

jQuery.filter = function( expr, elems, not ) {
	var elem = elems[ 0 ];

	if ( not ) {
		expr = ":not(" + expr + ")";
	}

	if ( elems.length === 1 && elem.nodeType === 1 ) {
		return jQuery.find.matchesSelector( elem, expr ) ? [ elem ] : [];
	}

	return jQuery.find.matches( expr, jQuery.grep( elems, function( elem ) {
		return elem.nodeType === 1;
	} ) );
};

jQuery.fn.extend( {
	find: function( selector ) {
		var i, ret,
			len = this.length,
			self = this;

		if ( typeof selector !== "string" ) {
			return this.pushStack( jQuery( selector ).filter( function() {
				for ( i = 0; i < len; i++ ) {
					if ( jQuery.contains( self[ i ], this ) ) {
						return true;
					}
				}
			} ) );
		}

		ret = this.pushStack( [] );

		for ( i = 0; i < len; i++ ) {
			jQuery.find( selector, self[ i ], ret );
		}

		return len > 1 ? jQuery.uniqueSort( ret ) : ret;
	},
	filter: function( selector ) {
		return this.pushStack( winnow( this, selector || [], false ) );
	},
	not: function( selector ) {
		return this.pushStack( winnow( this, selector || [], true ) );
	},
	is: function( selector ) {
		return !!winnow(
			this,

			// If this is a positional/relative selector, check membership in the returned set
			// so $("p:first").is("p:last") won't return true for a doc with two "p".
			typeof selector === "string" && rneedsContext.test( selector ) ?
				jQuery( selector ) :
				selector || [],
			false
		).length;
	}
} );


// Initialize a jQuery object


// A central reference to the root jQuery(document)
var rootjQuery,

	// A simple way to check for HTML strings
	// Prioritize #id over <tag> to avoid XSS via location.hash (trac-9521)
	// Strict HTML recognition (trac-11290: must start with <)
	// Shortcut simple #id case for speed
	rquickExpr = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]+))$/,

	init = jQuery.fn.init = function( selector, context, root ) {
		var match, elem;

		// HANDLE: $(""), $(null), $(undefined), $(false)
		if ( !selector ) {
			return this;
		}

		// Method init() accepts an alternate rootjQuery
		// so migrate can support jQuery.sub (gh-2101)
		root = root || rootjQuery;

		// Handle HTML strings
		if ( typeof selector === "string" ) {
			if ( selector[ 0 ] === "<" &&
				selector[ selector.length - 1 ] === ">" &&
				selector.length >= 3 ) {

				// Assume that strings that start and end with <> are HTML and skip the regex check
				match = [ null, selector, null ];

			} else {
				match = rquickExpr.exec( selector );
			}

			// Match html or make sure no context is specified for #id
			if ( match && ( match[ 1 ] || !context ) ) {

				// HANDLE: $(html) -> $(array)
				if ( match[ 1 ] ) {
					context = context instanceof jQuery ? context[ 0 ] : context;

					// Option to run scripts is true for back-compat
					// Intentionally let the error be thrown if parseHTML is not present
					jQuery.merge( this, jQuery.parseHTML(
						match[ 1 ],
						context && context.nodeType ? context.ownerDocument || context : document,
						true
					) );

					// HANDLE: $(html, props)
					if ( rsingleTag.test( match[ 1 ] ) && jQuery.isPlainObject( context ) ) {
						for ( match in context ) {

							// Properties of context are called as methods if possible
							if ( isFunction( this[ match ] ) ) {
								this[ match ]( context[ match ] );

							// ...and otherwise set as attributes
							} else {
								this.attr( match, context[ match ] );
							}
						}
					}

					return this;

				// HANDLE: $(#id)
				} else {
					elem = document.getElementById( match[ 2 ] );

					if ( elem ) {

						// Inject the element directly into the jQuery object
						this[ 0 ] = elem;
						this.length = 1;
					}
					return this;
				}

			// HANDLE: $(expr, $(...))
			} else if ( !context || context.jquery ) {
				return ( context || root ).find( selector );

			// HANDLE: $(expr, context)
			// (which is just equivalent to: $(context).find(expr)
			} else {
				return this.constructor( context ).find( selector );
			}

		// HANDLE: $(DOMElement)
		} else if ( selector.nodeType ) {
			this[ 0 ] = selector;
			this.length = 1;
			return this;

		// HANDLE: $(function)
		// Shortcut for document ready
		} else if ( isFunction( selector ) ) {
			return root.ready !== undefined ?
				root.ready( selector ) :

				// Execute immediately if ready is not present
				selector( jQuery );
		}

		return jQuery.makeArray( selector, this );
	};

// Give the init function the jQuery prototype for later instantiation
init.prototype = jQuery.fn;

// Initialize central reference
rootjQuery = jQuery( document );


var rparentsprev = /^(?:parents|prev(?:Until|All))/,

	// Methods guaranteed to produce a unique set when starting from a unique set
	guaranteedUnique = {
		children: true,
		contents: true,
		next: true,
		prev: true
	};

jQuery.fn.extend( {
	has: function( target ) {
		var targets = jQuery( target, this ),
			l = targets.length;

		return this.filter( function() {
			var i = 0;
			for ( ; i < l; i++ ) {
				if ( jQuery.contains( this, targets[ i ] ) ) {
					return true;
				}
			}
		} );
	},

	closest: function( selectors, context ) {
		var cur,
			i = 0,
			l = this.length,
			matched = [],
			targets = typeof selectors !== "string" && jQuery( selectors );

		// Positional selectors never match, since there's no _selection_ context
		if ( !rneedsContext.test( selectors ) ) {
			for ( ; i < l; i++ ) {
				for ( cur = this[ i ]; cur && cur !== context; cur = cur.parentNode ) {

					// Always skip document fragments
					if ( cur.nodeType < 11 && ( targets ?
						targets.index( cur ) > -1 :

						// Don't pass non-elements to jQuery#find
						cur.nodeType === 1 &&
							jQuery.find.matchesSelector( cur, selectors ) ) ) {

						matched.push( cur );
						break;
					}
				}
			}
		}

		return this.pushStack( matched.length > 1 ? jQuery.uniqueSort( matched ) : matched );
	},

	// Determine the position of an element within the set
	index: function( elem ) {

		// No argument, return index in parent
		if ( !elem ) {
			return ( this[ 0 ] && this[ 0 ].parentNode ) ? this.first().prevAll().length : -1;
		}

		// Index in selector
		if ( typeof elem === "string" ) {
			return indexOf.call( jQuery( elem ), this[ 0 ] );
		}

		// Locate the position of the desired element
		return indexOf.call( this,

			// If it receives a jQuery object, the first element is used
			elem.jquery ? elem[ 0 ] : elem
		);
	},

	add: function( selector, context ) {
		return this.pushStack(
			jQuery.uniqueSort(
				jQuery.merge( this.get(), jQuery( selector, context ) )
			)
		);
	},

	addBack: function( selector ) {
		return this.add( selector == null ?
			this.prevObject : this.prevObject.filter( selector )
		);
	}
} );

function sibling( cur, dir ) {
	while ( ( cur = cur[ dir ] ) && cur.nodeType !== 1 ) {}
	return cur;
}

jQuery.each( {
	parent: function( elem ) {
		var parent = elem.parentNode;
		return parent && parent.nodeType !== 11 ? parent : null;
	},
	parents: function( elem ) {
		return dir( elem, "parentNode" );
	},
	parentsUntil: function( elem, _i, until ) {
		return dir( elem, "parentNode", until );
	},
	next: function( elem ) {
		return sibling( elem, "nextSibling" );
	},
	prev: function( elem ) {
		return sibling( elem, "previousSibling" );
	},
	nextAll: function( elem ) {
		return dir( elem, "nextSibling" );
	},
	prevAll: function( elem ) {
		return dir( elem, "previousSibling" );
	},
	nextUntil: function( elem, _i, until ) {
		return dir( elem, "nextSibling", until );
	},
	prevUntil: function( elem, _i, until ) {
		return dir( elem, "previousSibling", until );
	},
	siblings: function( elem ) {
		return siblings( ( elem.parentNode || {} ).firstChild, elem );
	},
	children: function( elem ) {
		return siblings( elem.firstChild );
	},
	contents: function( elem ) {
		if ( elem.contentDocument != null &&

			// Support: IE 11+
			// <object> elements with no `data` attribute has an object
			// `contentDocument` with a `null` prototype.
			getProto( elem.contentDocument ) ) {

			return elem.contentDocument;
		}

		// Support: IE 9 - 11 only, iOS 7 only, Android Browser <=4.3 only
		// Treat the template element as a regular one in browsers that
		// don't support it.
		if ( nodeName( elem, "template" ) ) {
			elem = elem.content || elem;
		}

		return jQuery.merge( [], elem.childNodes );
	}
}, function( name, fn ) {
	jQuery.fn[ name ] = function( until, selector ) {
		var matched = jQuery.map( this, fn, until );

		if ( name.slice( -5 ) !== "Until" ) {
			selector = until;
		}

		if ( selector && typeof selector === "string" ) {
			matched = jQuery.filter( selector, matched );
		}

		if ( this.length > 1 ) {

			// Remove duplicates
			if ( !guaranteedUnique[ name ] ) {
				jQuery.uniqueSort( matched );
			}

			// Reverse order for parents* and prev-derivatives
			if ( rparentsprev.test( name ) ) {
				matched.reverse();
			}
		}

		return this.pushStack( matched );
	};
} );
var rnothtmlwhite = ( /[^\x20\t\r\n\f]+/g );



// Convert String-formatted options into Object-formatted ones
function createOptions( options ) {
	var object = {};
	jQuery.each( options.match( rnothtmlwhite ) || [], function( _, flag ) {
		object[ flag ] = true;
	} );
	return object;
}

/*
 * Create a callback list using the following parameters:
 *
 *	options: an optional list of space-separated options that will change how
 *			the callback list behaves or a more traditional option object
 *
 * By default a callback list will act like an event callback list and can be
 * "fired" multiple times.
 *
 * Possible options:
 *
 *	once:			will ensure the callback list can only be fired once (like a Deferred)
 *
 *	memory:			will keep track of previous values and will call any callback added
 *					after the list has been fired right away with the latest "memorized"
 *					values (like a Deferred)
 *
 *	unique:			will ensure a callback can only be added once (no duplicate in the list)
 *
 *	stopOnFalse:	interrupt callings when a callback returns false
 *
 */
jQuery.Callbacks = function( options ) {

	// Convert options from String-formatted to Object-formatted if needed
	// (we check in cache first)
	options = typeof options === "string" ?
		createOptions( options ) :
		jQuery.extend( {}, options );

	var // Flag to know if list is currently firing
		firing,

		// Last fire value for non-forgettable lists
		memory,

		// Flag to know if list was already fired
		fired,

		// Flag to prevent firing
		locked,

		// Actual callback list
		list = [],

		// Queue of execution data for repeatable lists
		queue = [],

		// Index of currently firing callback (modified by add/remove as needed)
		firingIndex = -1,

		// Fire callbacks
		fire = function() {

			// Enforce single-firing
			locked = locked || options.once;

			// Execute callbacks for all pending executions,
			// respecting firingIndex overrides and runtime changes
			fired = firing = true;
			for ( ; queue.length; firingIndex = -1 ) {
				memory = queue.shift();
				while ( ++firingIndex < list.length ) {

					// Run callback and check for early termination
					if ( list[ firingIndex ].apply( memory[ 0 ], memory[ 1 ] ) === false &&
						options.stopOnFalse ) {

						// Jump to end and forget the data so .add doesn't re-fire
						firingIndex = list.length;
						memory = false;
					}
				}
			}

			// Forget the data if we're done with it
			if ( !options.memory ) {
				memory = false;
			}

			firing = false;

			// Clean up if we're done firing for good
			if ( locked ) {

				// Keep an empty list if we have data for future add calls
				if ( memory ) {
					list = [];

				// Otherwise, this object is spent
				} else {
					list = "";
				}
			}
		},

		// Actual Callbacks object
		self = {

			// Add a callback or a collection of callbacks to the list
			add: function() {
				if ( list ) {

					// If we have memory from a past run, we should fire after adding
					if ( memory && !firing ) {
						firingIndex = list.length - 1;
						queue.push( memory );
					}

					( function add( args ) {
						jQuery.each( args, function( _, arg ) {
							if ( isFunction( arg ) ) {
								if ( !options.unique || !self.has( arg ) ) {
									list.push( arg );
								}
							} else if ( arg && arg.length && toType( arg ) !== "string" ) {

								// Inspect recursively
								add( arg );
							}
						} );
					} )( arguments );

					if ( memory && !firing ) {
						fire();
					}
				}
				return this;
			},

			// Remove a callback from the list
			remove: function() {
				jQuery.each( arguments, function( _, arg ) {
					var index;
					while ( ( index = jQuery.inArray( arg, list, index ) ) > -1 ) {
						list.splice( index, 1 );

						// Handle firing indexes
						if ( index <= firingIndex ) {
							firingIndex--;
						}
					}
				} );
				return this;
			},

			// Check if a given callback is in the list.
			// If no argument is given, return whether or not list has callbacks attached.
			has: function( fn ) {
				return fn ?
					jQuery.inArray( fn, list ) > -1 :
					list.length > 0;
			},

			// Remove all callbacks from the list
			empty: function() {
				if ( list ) {
					list = [];
				}
				return this;
			},

			// Disable .fire and .add
			// Abort any current/pending executions
			// Clear all callbacks and values
			disable: function() {
				locked = queue = [];
				list = memory = "";
				return this;
			},
			disabled: function() {
				return !list;
			},

			// Disable .fire
			// Also disable .add unless we have memory (since it would have no effect)
			// Abort any pending executions
			lock: function() {
				locked = queue = [];
				if ( !memory && !firing ) {
					list = memory = "";
				}
				return this;
			},
			locked: function() {
				return !!locked;
			},

			// Call all callbacks with the given context and arguments
			fireWith: function( context, args ) {
				if ( !locked ) {
					args = args || [];
					args = [ context, args.slice ? args.slice() : args ];
					queue.push( args );
					if ( !firing ) {
						fire();
					}
				}
				return this;
			},

			// Call all the callbacks with the given arguments
			fire: function() {
				self.fireWith( this, arguments );
				return this;
			},

			// To know if the callbacks have already been called at least once
			fired: function() {
				return !!fired;
			}
		};

	return self;
};


function Identity( v ) {
	return v;
}
function Thrower( ex ) {
	throw ex;
}

function adoptValue( value, resolve, reject, noValue ) {
	var method;

	try {

		// Check for promise aspect first to privilege synchronous behavior
		if ( value && isFunction( ( method = value.promise ) ) ) {
			method.call( value ).done( resolve ).fail( reject );

		// Other thenables
		} else if ( value && isFunction( ( method = value.then ) ) ) {
			method.call( value, resolve, reject );

		// Other non-thenables
		} else {

			// Control `resolve` arguments by letting Array#slice cast boolean `noValue` to integer:
			// * false: [ value ].slice( 0 ) => resolve( value )
			// * true: [ value ].slice( 1 ) => resolve()
			resolve.apply( undefined, [ value ].slice( noValue ) );
		}

	// For Promises/A+, convert exceptions into rejections
	// Since jQuery.when doesn't unwrap thenables, we can skip the extra checks appearing in
	// Deferred#then to conditionally suppress rejection.
	} catch ( value ) {

		// Support: Android 4.0 only
		// Strict mode functions invoked without .call/.apply get global-object context
		reject.apply( undefined, [ value ] );
	}
}

jQuery.extend( {

	Deferred: function( func ) {
		var tuples = [

				// action, add listener, callbacks,
				// ... .then handlers, argument index, [final state]
				[ "notify", "progress", jQuery.Callbacks( "memory" ),
					jQuery.Callbacks( "memory" ), 2 ],
				[ "resolve", "done", jQuery.Callbacks( "once memory" ),
					jQuery.Callbacks( "once memory" ), 0, "resolved" ],
				[ "reject", "fail", jQuery.Callbacks( "once memory" ),
					jQuery.Callbacks( "once memory" ), 1, "rejected" ]
			],
			state = "pending",
			promise = {
				state: function() {
					return state;
				},
				always: function() {
					deferred.done( arguments ).fail( arguments );
					return this;
				},
				"catch": function( fn ) {
					return promise.then( null, fn );
				},

				// Keep pipe for back-compat
				pipe: function( /* fnDone, fnFail, fnProgress */ ) {
					var fns = arguments;

					return jQuery.Deferred( function( newDefer ) {
						jQuery.each( tuples, function( _i, tuple ) {

							// Map tuples (progress, done, fail) to arguments (done, fail, progress)
							var fn = isFunction( fns[ tuple[ 4 ] ] ) && fns[ tuple[ 4 ] ];

							// deferred.progress(function() { bind to newDefer or newDefer.notify })
							// deferred.done(function() { bind to newDefer or newDefer.resolve })
							// deferred.fail(function() { bind to newDefer or newDefer.reject })
							deferred[ tuple[ 1 ] ]( function() {
								var returned = fn && fn.apply( this, arguments );
								if ( returned && isFunction( returned.promise ) ) {
									returned.promise()
										.progress( newDefer.notify )
										.done( newDefer.resolve )
										.fail( newDefer.reject );
								} else {
									newDefer[ tuple[ 0 ] + "With" ](
										this,
										fn ? [ returned ] : arguments
									);
								}
							} );
						} );
						fns = null;
					} ).promise();
				},
				then: function( onFulfilled, onRejected, onProgress ) {
					var maxDepth = 0;
					function resolve( depth, deferred, handler, special ) {
						return function() {
							var that = this,
								args = arguments,
								mightThrow = function() {
									var returned, then;

									// Support: Promises/A+ section 2.3.3.3.3
									// https://promisesaplus.com/#point-59
									// Ignore double-resolution attempts
									if ( depth < maxDepth ) {
										return;
									}

									returned = handler.apply( that, args );

									// Support: Promises/A+ section 2.3.1
									// https://promisesaplus.com/#point-48
									if ( returned === deferred.promise() ) {
										throw new TypeError( "Thenable self-resolution" );
									}

									// Support: Promises/A+ sections 2.3.3.1, 3.5
									// https://promisesaplus.com/#point-54
									// https://promisesaplus.com/#point-75
									// Retrieve `then` only once
									then = returned &&

										// Support: Promises/A+ section 2.3.4
										// https://promisesaplus.com/#point-64
										// Only check objects and functions for thenability
										( typeof returned === "object" ||
											typeof returned === "function" ) &&
										returned.then;

									// Handle a returned thenable
									if ( isFunction( then ) ) {

										// Special processors (notify) just wait for resolution
										if ( special ) {
											then.call(
												returned,
												resolve( maxDepth, deferred, Identity, special ),
												resolve( maxDepth, deferred, Thrower, special )
											);

										// Normal processors (resolve) also hook into progress
										} else {

											// ...and disregard older resolution values
											maxDepth++;

											then.call(
												returned,
												resolve( maxDepth, deferred, Identity, special ),
												resolve( maxDepth, deferred, Thrower, special ),
												resolve( maxDepth, deferred, Identity,
													deferred.notifyWith )
											);
										}

									// Handle all other returned values
									} else {

										// Only substitute handlers pass on context
										// and multiple values (non-spec behavior)
										if ( handler !== Identity ) {
											that = undefined;
											args = [ returned ];
										}

										// Process the value(s)
										// Default process is resolve
										( special || deferred.resolveWith )( that, args );
									}
								},

								// Only normal processors (resolve) catch and reject exceptions
								process = special ?
									mightThrow :
									function() {
										try {
											mightThrow();
										} catch ( e ) {

											if ( jQuery.Deferred.exceptionHook ) {
												jQuery.Deferred.exceptionHook( e,
													process.error );
											}

											// Support: Promises/A+ section 2.3.3.3.4.1
											// https://promisesaplus.com/#point-61
											// Ignore post-resolution exceptions
											if ( depth + 1 >= maxDepth ) {

												// Only substitute handlers pass on context
												// and multiple values (non-spec behavior)
												if ( handler !== Thrower ) {
													that = undefined;
													args = [ e ];
												}

												deferred.rejectWith( that, args );
											}
										}
									};

							// Support: Promises/A+ section 2.3.3.3.1
							// https://promisesaplus.com/#point-57
							// Re-resolve promises immediately to dodge false rejection from
							// subsequent errors
							if ( depth ) {
								process();
							} else {

								// Call an optional hook to record the error, in case of exception
								// since it's otherwise lost when execution goes async
								if ( jQuery.Deferred.getErrorHook ) {
									process.error = jQuery.Deferred.getErrorHook();

								// The deprecated alias of the above. While the name suggests
								// returning the stack, not an error instance, jQuery just passes
								// it directly to `console.warn` so both will work; an instance
								// just better cooperates with source maps.
								} else if ( jQuery.Deferred.getStackHook ) {
									process.error = jQuery.Deferred.getStackHook();
								}
								window.setTimeout( process );
							}
						};
					}

					return jQuery.Deferred( function( newDefer ) {

						// progress_handlers.add( ... )
						tuples[ 0 ][ 3 ].add(
							resolve(
								0,
								newDefer,
								isFunction( onProgress ) ?
									onProgress :
									Identity,
								newDefer.notifyWith
							)
						);

						// fulfilled_handlers.add( ... )
						tuples[ 1 ][ 3 ].add(
							resolve(
								0,
								newDefer,
								isFunction( onFulfilled ) ?
									onFulfilled :
									Identity
							)
						);

						// rejected_handlers.add( ... )
						tuples[ 2 ][ 3 ].add(
							resolve(
								0,
								newDefer,
								isFunction( onRejected ) ?
									onRejected :
									Thrower
							)
						);
					} ).promise();
				},

				// Get a promise for this deferred
				// If obj is provided, the promise aspect is added to the object
				promise: function( obj ) {
					return obj != null ? jQuery.extend( obj, promise ) : promise;
				}
			},
			deferred = {};

		// Add list-specific methods
		jQuery.each( tuples, function( i, tuple ) {
			var list = tuple[ 2 ],
				stateString = tuple[ 5 ];

			// promise.progress = list.add
			// promise.done = list.add
			// promise.fail = list.add
			promise[ tuple[ 1 ] ] = list.add;

			// Handle state
			if ( stateString ) {
				list.add(
					function() {

						// state = "resolved" (i.e., fulfilled)
						// state = "rejected"
						state = stateString;
					},

					// rejected_callbacks.disable
					// fulfilled_callbacks.disable
					tuples[ 3 - i ][ 2 ].disable,

					// rejected_handlers.disable
					// fulfilled_handlers.disable
					tuples[ 3 - i ][ 3 ].disable,

					// progress_callbacks.lock
					tuples[ 0 ][ 2 ].lock,

					// progress_handlers.lock
					tuples[ 0 ][ 3 ].lock
				);
			}

			// progress_handlers.fire
			// fulfilled_handlers.fire
			// rejected_handlers.fire
			list.add( tuple[ 3 ].fire );

			// deferred.notify = function() { deferred.notifyWith(...) }
			// deferred.resolve = function() { deferred.resolveWith(...) }
			// deferred.reject = function() { deferred.rejectWith(...) }
			deferred[ tuple[ 0 ] ] = function() {
				deferred[ tuple[ 0 ] + "With" ]( this === deferred ? undefined : this, arguments );
				return this;
			};

			// deferred.notifyWith = list.fireWith
			// deferred.resolveWith = list.fireWith
			// deferred.rejectWith = list.fireWith
			deferred[ tuple[ 0 ] + "With" ] = list.fireWith;
		} );

		// Make the deferred a promise
		promise.promise( deferred );

		// Call given func if any
		if ( func ) {
			func.call( deferred, deferred );
		}

		// All done!
		return deferred;
	},

	// Deferred helper
	when: function( singleValue ) {
		var

			// count of uncompleted subordinates
			remaining = arguments.length,

			// count of unprocessed arguments
			i = remaining,

			// subordinate fulfillment data
			resolveContexts = Array( i ),
			resolveValues = slice.call( arguments ),

			// the primary Deferred
			primary = jQuery.Deferred(),

			// subordinate callback factory
			updateFunc = function( i ) {
				return function( value ) {
					resolveContexts[ i ] = this;
					resolveValues[ i ] = arguments.length > 1 ? slice.call( arguments ) : value;
					if ( !( --remaining ) ) {
						primary.resolveWith( resolveContexts, resolveValues );
					}
				};
			};

		// Single- and empty arguments are adopted like Promise.resolve
		if ( remaining <= 1 ) {
			adoptValue( singleValue, primary.done( updateFunc( i ) ).resolve, primary.reject,
				!remaining );

			// Use .then() to unwrap secondary thenables (cf. gh-3000)
			if ( primary.state() === "pending" ||
				isFunction( resolveValues[ i ] && resolveValues[ i ].then ) ) {

				return primary.then();
			}
		}

		// Multiple arguments are aggregated like Promise.all array elements
		while ( i-- ) {
			adoptValue( resolveValues[ i ], updateFunc( i ), primary.reject );
		}

		return primary.promise();
	}
} );


// These usually indicate a programmer mistake during development,
// warn about them ASAP rather than swallowing them by default.
var rerrorNames = /^(Eval|Internal|Range|Reference|Syntax|Type|URI)Error$/;

// If `jQuery.Deferred.getErrorHook` is defined, `asyncError` is an error
// captured before the async barrier to get the original error cause
// which may otherwise be hidden.
jQuery.Deferred.exceptionHook = function( error, asyncError ) {

	// Support: IE 8 - 9 only
	// Console exists when dev tools are open, which can happen at any time
	if ( window.console && window.console.warn && error && rerrorNames.test( error.name ) ) {
		window.console.warn( "jQuery.Deferred exception: " + error.message,
			error.stack, asyncError );
	}
};




jQuery.readyException = function( error ) {
	window.setTimeout( function() {
		throw error;
	} );
};




// The deferred used on DOM ready
var readyList = jQuery.Deferred();

jQuery.fn.ready = function( fn ) {

	readyList
		.then( fn )

		// Wrap jQuery.readyException in a function so that the lookup
		// happens at the time of error handling instead of callback
		// registration.
		.catch( function( error ) {
			jQuery.readyException( error );
		} );

	return this;
};

jQuery.extend( {

	// Is the DOM ready to be used? Set to true once it occurs.
	isReady: false,

	// A counter to track how many items to wait for before
	// the ready event fires. See trac-6781
	readyWait: 1,

	// Handle when the DOM is ready
	ready: function( wait ) {

		// Abort if there are pending holds or we're already ready
		if ( wait === true ? --jQuery.readyWait : jQuery.isReady ) {
			return;
		}

		// Remember that the DOM is ready
		jQuery.isReady = true;

		// If a normal DOM Ready event fired, decrement, and wait if need be
		if ( wait !== true && --jQuery.readyWait > 0 ) {
			return;
		}

		// If there are functions bound, to execute
		readyList.resolveWith( document, [ jQuery ] );
	}
} );

jQuery.ready.then = readyList.then;

// The ready event handler and self cleanup method
function completed() {
	document.removeEventListener( "DOMContentLoaded", completed );
	window.removeEventListener( "load", completed );
	jQuery.ready();
}

// Catch cases where $(document).ready() is called
// after the browser event has already occurred.
// Support: IE <=9 - 10 only
// Older IE sometimes signals "interactive" too soon
if ( document.readyState === "complete" ||
	( document.readyState !== "loading" && !document.documentElement.doScroll ) ) {

	// Handle it asynchronously to allow scripts the opportunity to delay ready
	window.setTimeout( jQuery.ready );

} else {

	// Use the handy event callback
	document.addEventListener( "DOMContentLoaded", completed );

	// A fallback to window.onload, that will always work
	window.addEventListener( "load", completed );
}




// Multifunctional method to get and set values of a collection
// The value/s can optionally be executed if it's a function
var access = function( elems, fn, key, value, chainable, emptyGet, raw ) {
	var i = 0,
		len = elems.length,
		bulk = key == null;

	// Sets many values
	if ( toType( key ) === "object" ) {
		chainable = true;
		for ( i in key ) {
			access( elems, fn, i, key[ i ], true, emptyGet, raw );
		}

	// Sets one value
	} else if ( value !== undefined ) {
		chainable = true;

		if ( !isFunction( value ) ) {
			raw = true;
		}

		if ( bulk ) {

			// Bulk operations run against the entire set
			if ( raw ) {
				fn.call( elems, value );
				fn = null;

			// ...except when executing function values
			} else {
				bulk = fn;
				fn = function( elem, _key, value ) {
					return bulk.call( jQuery( elem ), value );
				};
			}
		}

		if ( fn ) {
			for ( ; i < len; i++ ) {
				fn(
					elems[ i ], key, raw ?
						value :
						value.call( elems[ i ], i, fn( elems[ i ], key ) )
				);
			}
		}
	}

	if ( chainable ) {
		return elems;
	}

	// Gets
	if ( bulk ) {
		return fn.call( elems );
	}

	return len ? fn( elems[ 0 ], key ) : emptyGet;
};


// Matches dashed string for camelizing
var rmsPrefix = /^-ms-/,
	rdashAlpha = /-([a-z])/g;

// Used by camelCase as callback to replace()
function fcamelCase( _all, letter ) {
	return letter.toUpperCase();
}

// Convert dashed to camelCase; used by the css and data modules
// Support: IE <=9 - 11, Edge 12 - 15
// Microsoft forgot to hump their vendor prefix (trac-9572)
function camelCase( string ) {
	return string.replace( rmsPrefix, "ms-" ).replace( rdashAlpha, fcamelCase );
}
var acceptData = function( owner ) {

	// Accepts only:
	//  - Node
	//    - Node.ELEMENT_NODE
	//    - Node.DOCUMENT_NODE
	//  - Object
	//    - Any
	return owner.nodeType === 1 || owner.nodeType === 9 || !( +owner.nodeType );
};




function Data() {
	this.expando = jQuery.expando + Data.uid++;
}

Data.uid = 1;

Data.prototype = {

	cache: function( owner ) {

		// Check if the owner object already has a cache
		var value = owner[ this.expando ];

		// If not, create one
		if ( !value ) {
			value = {};

			// We can accept data for non-element nodes in modern browsers,
			// but we should not, see trac-8335.
			// Always return an empty object.
			if ( acceptData( owner ) ) {

				// If it is a node unlikely to be stringify-ed or looped over
				// use plain assignment
				if ( owner.nodeType ) {
					owner[ this.expando ] = value;

				// Otherwise secure it in a non-enumerable property
				// configurable must be true to allow the property to be
				// deleted when data is removed
				} else {
					Object.defineProperty( owner, this.expando, {
						value: value,
						configurable: true
					} );
				}
			}
		}

		return value;
	},
	set: function( owner, data, value ) {
		var prop,
			cache = this.cache( owner );

		// Handle: [ owner, key, value ] args
		// Always use camelCase key (gh-2257)
		if ( typeof data === "string" ) {
			cache[ camelCase( data ) ] = value;

		// Handle: [ owner, { properties } ] args
		} else {

			// Copy the properties one-by-one to the cache object
			for ( prop in data ) {
				cache[ camelCase( prop ) ] = data[ prop ];
			}
		}
		return cache;
	},
	get: function( owner, key ) {
		return key === undefined ?
			this.cache( owner ) :

			// Always use camelCase key (gh-2257)
			owner[ this.expando ] && owner[ this.expando ][ camelCase( key ) ];
	},
	access: function( owner, key, value ) {

		// In cases where either:
		//
		//   1. No key was specified
		//   2. A string key was specified, but no value provided
		//
		// Take the "read" path and allow the get method to determine
		// which value to return, respectively either:
		//
		//   1. The entire cache object
		//   2. The data stored at the key
		//
		if ( key === undefined ||
				( ( key && typeof key === "string" ) && value === undefined ) ) {

			return this.get( owner, key );
		}

		// When the key is not a string, or both a key and value
		// are specified, set or extend (existing objects) with either:
		//
		//   1. An object of properties
		//   2. A key and value
		//
		this.set( owner, key, value );

		// Since the "set" path can have two possible entry points
		// return the expected data based on which path was taken[*]
		return value !== undefined ? value : key;
	},
	remove: function( owner, key ) {
		var i,
			cache = owner[ this.expando ];

		if ( cache === undefined ) {
			return;
		}

		if ( key !== undefined ) {

			// Support array or space separated string of keys
			if ( Array.isArray( key ) ) {

				// If key is an array of keys...
				// We always set camelCase keys, so remove that.
				key = key.map( camelCase );
			} else {
				key = camelCase( key );

				// If a key with the spaces exists, use it.
				// Otherwise, create an array by matching non-whitespace
				key = key in cache ?
					[ key ] :
					( key.match( rnothtmlwhite ) || [] );
			}

			i = key.length;

			while ( i-- ) {
				delete cache[ key[ i ] ];
			}
		}

		// Remove the expando if there's no more data
		if ( key === undefined || jQuery.isEmptyObject( cache ) ) {

			// Support: Chrome <=35 - 45
			// Webkit & Blink performance suffers when deleting properties
			// from DOM nodes, so set to undefined instead
			// https://bugs.chromium.org/p/chromium/issues/detail?id=378607 (bug restricted)
			if ( owner.nodeType ) {
				owner[ this.expando ] = undefined;
			} else {
				delete owner[ this.expando ];
			}
		}
	},
	hasData: function( owner ) {
		var cache = owner[ this.expando ];
		return cache !== undefined && !jQuery.isEmptyObject( cache );
	}
};
var dataPriv = new Data();

var dataUser = new Data();



//	Implementation Summary
//
//	1. Enforce API surface and semantic compatibility with 1.9.x branch
//	2. Improve the module's maintainability by reducing the storage
//		paths to a single mechanism.
//	3. Use the same single mechanism to support "private" and "user" data.
//	4. _Never_ expose "private" data to user code (TODO: Drop _data, _removeData)
//	5. Avoid exposing implementation details on user objects (eg. expando properties)
//	6. Provide a clear path for implementation upgrade to WeakMap in 2014

var rbrace = /^(?:\{[\w\W]*\}|\[[\w\W]*\])$/,
	rmultiDash = /[A-Z]/g;

function getData( data ) {
	if ( data === "true" ) {
		return true;
	}

	if ( data === "false" ) {
		return false;
	}

	if ( data === "null" ) {
		return null;
	}

	// Only convert to a number if it doesn't change the string
	if ( data === +data + "" ) {
		return +data;
	}

	if ( rbrace.test( data ) ) {
		return JSON.parse( data );
	}

	return data;
}

function dataAttr( elem, key, data ) {
	var name;

	// If nothing was found internally, try to fetch any
	// data from the HTML5 data-* attribute
	if ( data === undefined && elem.nodeType === 1 ) {
		name = "data-" + key.replace( rmultiDash, "-$&" ).toLowerCase();
		data = elem.getAttribute( name );

		if ( typeof data === "string" ) {
			try {
				data = getData( data );
			} catch ( e ) {}

			// Make sure we set the data so it isn't changed later
			dataUser.set( elem, key, data );
		} else {
			data = undefined;
		}
	}
	return data;
}

jQuery.extend( {
	hasData: function( elem ) {
		return dataUser.hasData( elem ) || dataPriv.hasData( elem );
	},

	data: function( elem, name, data ) {
		return dataUser.access( elem, name, data );
	},

	removeData: function( elem, name ) {
		dataUser.remove( elem, name );
	},

	// TODO: Now that all calls to _data and _removeData have been replaced
	// with direct calls to dataPriv methods, these can be deprecated.
	_data: function( elem, name, data ) {
		return dataPriv.access( elem, name, data );
	},

	_removeData: function( elem, name ) {
		dataPriv.remove( elem, name );
	}
} );

jQuery.fn.extend( {
	data: function( key, value ) {
		var i, name, data,
			elem = this[ 0 ],
			attrs = elem && elem.attributes;

		// Gets all values
		if ( key === undefined ) {
			if ( this.length ) {
				data = dataUser.get( elem );

				if ( elem.nodeType === 1 && !dataPriv.get( elem, "hasDataAttrs" ) ) {
					i = attrs.length;
					while ( i-- ) {

						// Support: IE 11 only
						// The attrs elements can be null (trac-14894)
						if ( attrs[ i ] ) {
							name = attrs[ i ].name;
							if ( name.indexOf( "data-" ) === 0 ) {
								name = camelCase( name.slice( 5 ) );
								dataAttr( elem, name, data[ name ] );
							}
						}
					}
					dataPriv.set( elem, "hasDataAttrs", true );
				}
			}

			return data;
		}

		// Sets multiple values
		if ( typeof key === "object" ) {
			return this.each( function() {
				dataUser.set( this, key );
			} );
		}

		return access( this, function( value ) {
			var data;

			// The calling jQuery object (element matches) is not empty
			// (and therefore has an element appears at this[ 0 ]) and the
			// `value` parameter was not undefined. An empty jQuery object
			// will result in `undefined` for elem = this[ 0 ] which will
			// throw an exception if an attempt to read a data cache is made.
			if ( elem && value === undefined ) {

				// Attempt to get data from the cache
				// The key will always be camelCased in Data
				data = dataUser.get( elem, key );
				if ( data !== undefined ) {
					return data;
				}

				// Attempt to "discover" the data in
				// HTML5 custom data-* attrs
				data = dataAttr( elem, key );
				if ( data !== undefined ) {
					return data;
				}

				// We tried really hard, but the data doesn't exist.
				return;
			}

			// Set the data...
			this.each( function() {

				// We always store the camelCased key
				dataUser.set( this, key, value );
			} );
		}, null, value, arguments.length > 1, null, true );
	},

	removeData: function( key ) {
		return this.each( function() {
			dataUser.remove( this, key );
		} );
	}
} );


jQuery.extend( {
	queue: function( elem, type, data ) {
		var queue;

		if ( elem ) {
			type = ( type || "fx" ) + "queue";
			queue = dataPriv.get( elem, type );

			// Speed up dequeue by getting out quickly if this is just a lookup
			if ( data ) {
				if ( !queue || Array.isArray( data ) ) {
					queue = dataPriv.access( elem, type, jQuery.makeArray( data ) );
				} else {
					queue.push( data );
				}
			}
			return queue || [];
		}
	},

	dequeue: function( elem, type ) {
		type = type || "fx";

		var queue = jQuery.queue( elem, type ),
			startLength = queue.length,
			fn = queue.shift(),
			hooks = jQuery._queueHooks( elem, type ),
			next = function() {
				jQuery.dequeue( elem, type );
			};

		// If the fx queue is dequeued, always remove the progress sentinel
		if ( fn === "inprogress" ) {
			fn = queue.shift();
			startLength--;
		}

		if ( fn ) {

			// Add a progress sentinel to prevent the fx queue from being
			// automatically dequeued
			if ( type === "fx" ) {
				queue.unshift( "inprogress" );
			}

			// Clear up the last queue stop function
			delete hooks.stop;
			fn.call( elem, next, hooks );
		}

		if ( !startLength && hooks ) {
			hooks.empty.fire();
		}
	},

	// Not public - generate a queueHooks object, or return the current one
	_queueHooks: function( elem, type ) {
		var key = type + "queueHooks";
		return dataPriv.get( elem, key ) || dataPriv.access( elem, key, {
			empty: jQuery.Callbacks( "once memory" ).add( function() {
				dataPriv.remove( elem, [ type + "queue", key ] );
			} )
		} );
	}
} );

jQuery.fn.extend( {
	queue: function( type, data ) {
		var setter = 2;

		if ( typeof type !== "string" ) {
			data = type;
			type = "fx";
			setter--;
		}

		if ( arguments.length < setter ) {
			return jQuery.queue( this[ 0 ], type );
		}

		return data === undefined ?
			this :
			this.each( function() {
				var queue = jQuery.queue( this, type, data );

				// Ensure a hooks for this queue
				jQuery._queueHooks( this, type );

				if ( type === "fx" && queue[ 0 ] !== "inprogress" ) {
					jQuery.dequeue( this, type );
				}
			} );
	},
	dequeue: function( type ) {
		return this.each( function() {
			jQuery.dequeue( this, type );
		} );
	},
	clearQueue: function( type ) {
		return this.queue( type || "fx", [] );
	},

	// Get a promise resolved when queues of a certain type
	// are emptied (fx is the type by default)
	promise: function( type, obj ) {
		var tmp,
			count = 1,
			defer = jQuery.Deferred(),
			elements = this,
			i = this.length,
			resolve = function() {
				if ( !( --count ) ) {
					defer.resolveWith( elements, [ elements ] );
				}
			};

		if ( typeof type !== "string" ) {
			obj = type;
			type = undefined;
		}
		type = type || "fx";

		while ( i-- ) {
			tmp = dataPriv.get( elements[ i ], type + "queueHooks" );
			if ( tmp && tmp.empty ) {
				count++;
				tmp.empty.add( resolve );
			}
		}
		resolve();
		return defer.promise( obj );
	}
} );
var pnum = ( /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/ ).source;

var rcssNum = new RegExp( "^(?:([+-])=|)(" + pnum + ")([a-z%]*)$", "i" );


var cssExpand = [ "Top", "Right", "Bottom", "Left" ];

var documentElement = document.documentElement;



	var isAttached = function( elem ) {
			return jQuery.contains( elem.ownerDocument, elem );
		},
		composed = { composed: true };

	// Support: IE 9 - 11+, Edge 12 - 18+, iOS 10.0 - 10.2 only
	// Check attachment across shadow DOM boundaries when possible (gh-3504)
	// Support: iOS 10.0-10.2 only
	// Early iOS 10 versions support `attachShadow` but not `getRootNode`,
	// leading to errors. We need to check for `getRootNode`.
	if ( documentElement.getRootNode ) {
		isAttached = function( elem ) {
			return jQuery.contains( elem.ownerDocument, elem ) ||
				elem.getRootNode( composed ) === elem.ownerDocument;
		};
	}
var isHiddenWithinTree = function( elem, el ) {

		// isHiddenWithinTree might be called from jQuery#filter function;
		// in that case, element will be second argument
		elem = el || elem;

		// Inline style trumps all
		return elem.style.display === "none" ||
			elem.style.display === "" &&

			// Otherwise, check computed style
			// Support: Firefox <=43 - 45
			// Disconnected elements can have computed display: none, so first confirm that elem is
			// in the document.
			isAttached( elem ) &&

			jQuery.css( elem, "display" ) === "none";
	};



function adjustCSS( elem, prop, valueParts, tween ) {
	var adjusted, scale,
		maxIterations = 20,
		currentValue = tween ?
			function() {
				return tween.cur();
			} :
			function() {
				return jQuery.css( elem, prop, "" );
			},
		initial = currentValue(),
		unit = valueParts && valueParts[ 3 ] || ( jQuery.cssNumber[ prop ] ? "" : "px" ),

		// Starting value computation is required for potential unit mismatches
		initialInUnit = elem.nodeType &&
			( jQuery.cssNumber[ prop ] || unit !== "px" && +initial ) &&
			rcssNum.exec( jQuery.css( elem, prop ) );

	if ( initialInUnit && initialInUnit[ 3 ] !== unit ) {

		// Support: Firefox <=54
		// Halve the iteration target value to prevent interference from CSS upper bounds (gh-2144)
		initial = initial / 2;

		// Trust units reported by jQuery.css
		unit = unit || initialInUnit[ 3 ];

		// Iteratively approximate from a nonzero starting point
		initialInUnit = +initial || 1;

		while ( maxIterations-- ) {

			// Evaluate and update our best guess (doubling guesses that zero out).
			// Finish if the scale equals or crosses 1 (making the old*new product non-positive).
			jQuery.style( elem, prop, initialInUnit + unit );
			if ( ( 1 - scale ) * ( 1 - ( scale = currentValue() / initial || 0.5 ) ) <= 0 ) {
				maxIterations = 0;
			}
			initialInUnit = initialInUnit / scale;

		}

		initialInUnit = initialInUnit * 2;
		jQuery.style( elem, prop, initialInUnit + unit );

		// Make sure we update the tween properties later on
		valueParts = valueParts || [];
	}

	if ( valueParts ) {
		initialInUnit = +initialInUnit || +initial || 0;

		// Apply relative offset (+=/-=) if specified
		adjusted = valueParts[ 1 ] ?
			initialInUnit + ( valueParts[ 1 ] + 1 ) * valueParts[ 2 ] :
			+valueParts[ 2 ];
		if ( tween ) {
			tween.unit = unit;
			tween.start = initialInUnit;
			tween.end = adjusted;
		}
	}
	return adjusted;
}


var defaultDisplayMap = {};

function getDefaultDisplay( elem ) {
	var temp,
		doc = elem.ownerDocument,
		nodeName = elem.nodeName,
		display = defaultDisplayMap[ nodeName ];

	if ( display ) {
		return display;
	}

	temp = doc.body.appendChild( doc.createElement( nodeName ) );
	display = jQuery.css( temp, "display" );

	temp.parentNode.removeChild( temp );

	if ( display === "none" ) {
		display = "block";
	}
	defaultDisplayMap[ nodeName ] = display;

	return display;
}

function showHide( elements, show ) {
	var display, elem,
		values = [],
		index = 0,
		length = elements.length;

	// Determine new display value for elements that need to change
	for ( ; index < length; index++ ) {
		elem = elements[ index ];
		if ( !elem.style ) {
			continue;
		}

		display = elem.style.display;
		if ( show ) {

			// Since we force visibility upon cascade-hidden elements, an immediate (and slow)
			// check is required in this first loop unless we have a nonempty display value (either
			// inline or about-to-be-restored)
			if ( display === "none" ) {
				values[ index ] = dataPriv.get( elem, "display" ) || null;
				if ( !values[ index ] ) {
					elem.style.display = "";
				}
			}
			if ( elem.style.display === "" && isHiddenWithinTree( elem ) ) {
				values[ index ] = getDefaultDisplay( elem );
			}
		} else {
			if ( display !== "none" ) {
				values[ index ] = "none";

				// Remember what we're overwriting
				dataPriv.set( elem, "display", display );
			}
		}
	}

	// Set the display of the elements in a second loop to avoid constant reflow
	for ( index = 0; index < length; index++ ) {
		if ( values[ index ] != null ) {
			elements[ index ].style.display = values[ index ];
		}
	}

	return elements;
}

jQuery.fn.extend( {
	show: function() {
		return showHide( this, true );
	},
	hide: function() {
		return showHide( this );
	},
	toggle: function( state ) {
		if ( typeof state === "boolean" ) {
			return state ? this.show() : this.hide();
		}

		return this.each( function() {
			if ( isHiddenWithinTree( this ) ) {
				jQuery( this ).show();
			} else {
				jQuery( this ).hide();
			}
		} );
	}
} );
var rcheckableType = ( /^(?:checkbox|radio)$/i );

var rtagName = ( /<([a-z][^\/\0>\x20\t\r\n\f]*)/i );

var rscriptType = ( /^$|^module$|\/(?:java|ecma)script/i );



( function() {
	var fragment = document.createDocumentFragment(),
		div = fragment.appendChild( document.createElement( "div" ) ),
		input = document.createElement( "input" );

	// Support: Android 4.0 - 4.3 only
	// Check state lost if the name is set (trac-11217)
	// Support: Windows Web Apps (WWA)
	// `name` and `type` must use .setAttribute for WWA (trac-14901)
	input.setAttribute( "type", "radio" );
	input.setAttribute( "checked", "checked" );
	input.setAttribute( "name", "t" );

	div.appendChild( input );

	// Support: Android <=4.1 only
	// Older WebKit doesn't clone checked state correctly in fragments
	support.checkClone = div.cloneNode( true ).cloneNode( true ).lastChild.checked;

	// Support: IE <=11 only
	// Make sure textarea (and checkbox) defaultValue is properly cloned
	div.innerHTML = "<textarea>x</textarea>";
	support.noCloneChecked = !!div.cloneNode( true ).lastChild.defaultValue;

	// Support: IE <=9 only
	// IE <=9 replaces <option> tags with their contents when inserted outside of
	// the select element.
	div.innerHTML = "<option></option>";
	support.option = !!div.lastChild;
} )();


// We have to close these tags to support XHTML (trac-13200)
var wrapMap = {

	// XHTML parsers do not magically insert elements in the
	// same way that tag soup parsers do. So we cannot shorten
	// this by omitting <tbody> or other required elements.
	thead: [ 1, "<table>", "</table>" ],
	col: [ 2, "<table><colgroup>", "</colgroup></table>" ],
	tr: [ 2, "<table><tbody>", "</tbody></table>" ],
	td: [ 3, "<table><tbody><tr>", "</tr></tbody></table>" ],

	_default: [ 0, "", "" ]
};

wrapMap.tbody = wrapMap.tfoot = wrapMap.colgroup = wrapMap.caption = wrapMap.thead;
wrapMap.th = wrapMap.td;

// Support: IE <=9 only
if ( !support.option ) {
	wrapMap.optgroup = wrapMap.option = [ 1, "<select multiple='multiple'>", "</select>" ];
}


function getAll( context, tag ) {

	// Support: IE <=9 - 11 only
	// Use typeof to avoid zero-argument method invocation on host objects (trac-15151)
	var ret;

	if ( typeof context.getElementsByTagName !== "undefined" ) {
		ret = context.getElementsByTagName( tag || "*" );

	} else if ( typeof context.querySelectorAll !== "undefined" ) {
		ret = context.querySelectorAll( tag || "*" );

	} else {
		ret = [];
	}

	if ( tag === undefined || tag && nodeName( context, tag ) ) {
		return jQuery.merge( [ context ], ret );
	}

	return ret;
}


// Mark scripts as having already been evaluated
function setGlobalEval( elems, refElements ) {
	var i = 0,
		l = elems.length;

	for ( ; i < l; i++ ) {
		dataPriv.set(
			elems[ i ],
			"globalEval",
			!refElements || dataPriv.get( refElements[ i ], "globalEval" )
		);
	}
}


var rhtml = /<|&#?\w+;/;

function buildFragment( elems, context, scripts, selection, ignored ) {
	var elem, tmp, tag, wrap, attached, j,
		fragment = context.createDocumentFragment(),
		nodes = [],
		i = 0,
		l = elems.length;

	for ( ; i < l; i++ ) {
		elem = elems[ i ];

		if ( elem || elem === 0 ) {

			// Add nodes directly
			if ( toType( elem ) === "object" ) {

				// Support: Android <=4.0 only, PhantomJS 1 only
				// push.apply(_, arraylike) throws on ancient WebKit
				jQuery.merge( nodes, elem.nodeType ? [ elem ] : elem );

			// Convert non-html into a text node
			} else if ( !rhtml.test( elem ) ) {
				nodes.push( context.createTextNode( elem ) );

			// Convert html into DOM nodes
			} else {
				tmp = tmp || fragment.appendChild( context.createElement( "div" ) );

				// Deserialize a standard representation
				tag = ( rtagName.exec( elem ) || [ "", "" ] )[ 1 ].toLowerCase();
				wrap = wrapMap[ tag ] || wrapMap._default;
				tmp.innerHTML = wrap[ 1 ] + jQuery.htmlPrefilter( elem ) + wrap[ 2 ];

				// Descend through wrappers to the right content
				j = wrap[ 0 ];
				while ( j-- ) {
					tmp = tmp.lastChild;
				}

				// Support: Android <=4.0 only, PhantomJS 1 only
				// push.apply(_, arraylike) throws on ancient WebKit
				jQuery.merge( nodes, tmp.childNodes );

				// Remember the top-level container
				tmp = fragment.firstChild;

				// Ensure the created nodes are orphaned (trac-12392)
				tmp.textContent = "";
			}
		}
	}

	// Remove wrapper from fragment
	fragment.textContent = "";

	i = 0;
	while ( ( elem = nodes[ i++ ] ) ) {

		// Skip elements already in the context collection (trac-4087)
		if ( selection && jQuery.inArray( elem, selection ) > -1 ) {
			if ( ignored ) {
				ignored.push( elem );
			}
			continue;
		}

		attached = isAttached( elem );

		// Append to fragment
		tmp = getAll( fragment.appendChild( elem ), "script" );

		// Preserve script evaluation history
		if ( attached ) {
			setGlobalEval( tmp );
		}

		// Capture executables
		if ( scripts ) {
			j = 0;
			while ( ( elem = tmp[ j++ ] ) ) {
				if ( rscriptType.test( elem.type || "" ) ) {
					scripts.push( elem );
				}
			}
		}
	}

	return fragment;
}


var rtypenamespace = /^([^.]*)(?:\.(.+)|)/;

function returnTrue() {
	return true;
}

function returnFalse() {
	return false;
}

function on( elem, types, selector, data, fn, one ) {
	var origFn, type;

	// Types can be a map of types/handlers
	if ( typeof types === "object" ) {

		// ( types-Object, selector, data )
		if ( typeof selector !== "string" ) {

			// ( types-Object, data )
			data = data || selector;
			selector = undefined;
		}
		for ( type in types ) {
			on( elem, type, selector, data, types[ type ], one );
		}
		return elem;
	}

	if ( data == null && fn == null ) {

		// ( types, fn )
		fn = selector;
		data = selector = undefined;
	} else if ( fn == null ) {
		if ( typeof selector === "string" ) {

			// ( types, selector, fn )
			fn = data;
			data = undefined;
		} else {

			// ( types, data, fn )
			fn = data;
			data = selector;
			selector = undefined;
		}
	}
	if ( fn === false ) {
		fn = returnFalse;
	} else if ( !fn ) {
		return elem;
	}

	if ( one === 1 ) {
		origFn = fn;
		fn = function( event ) {

			// Can use an empty set, since event contains the info
			jQuery().off( event );
			return origFn.apply( this, arguments );
		};

		// Use same guid so caller can remove using origFn
		fn.guid = origFn.guid || ( origFn.guid = jQuery.guid++ );
	}
	return elem.each( function() {
		jQuery.event.add( this, types, fn, data, selector );
	} );
}

/*
 * Helper functions for managing events -- not part of the public interface.
 * Props to Dean Edwards' addEvent library for many of the ideas.
 */
jQuery.event = {

	global: {},

	add: function( elem, types, handler, data, selector ) {

		var handleObjIn, eventHandle, tmp,
			events, t, handleObj,
			special, handlers, type, namespaces, origType,
			elemData = dataPriv.get( elem );

		// Only attach events to objects that accept data
		if ( !acceptData( elem ) ) {
			return;
		}

		// Caller can pass in an object of custom data in lieu of the handler
		if ( handler.handler ) {
			handleObjIn = handler;
			handler = handleObjIn.handler;
			selector = handleObjIn.selector;
		}

		// Ensure that invalid selectors throw exceptions at attach time
		// Evaluate against documentElement in case elem is a non-element node (e.g., document)
		if ( selector ) {
			jQuery.find.matchesSelector( documentElement, selector );
		}

		// Make sure that the handler has a unique ID, used to find/remove it later
		if ( !handler.guid ) {
			handler.guid = jQuery.guid++;
		}

		// Init the element's event structure and main handler, if this is the first
		if ( !( events = elemData.events ) ) {
			events = elemData.events = Object.create( null );
		}
		if ( !( eventHandle = elemData.handle ) ) {
			eventHandle = elemData.handle = function( e ) {

				// Discard the second event of a jQuery.event.trigger() and
				// when an event is called after a page has unloaded
				return typeof jQuery !== "undefined" && jQuery.event.triggered !== e.type ?
					jQuery.event.dispatch.apply( elem, arguments ) : undefined;
			};
		}

		// Handle multiple events separated by a space
		types = ( types || "" ).match( rnothtmlwhite ) || [ "" ];
		t = types.length;
		while ( t-- ) {
			tmp = rtypenamespace.exec( types[ t ] ) || [];
			type = origType = tmp[ 1 ];
			namespaces = ( tmp[ 2 ] || "" ).split( "." ).sort();

			// There *must* be a type, no attaching namespace-only handlers
			if ( !type ) {
				continue;
			}

			// If event changes its type, use the special event handlers for the changed type
			special = jQuery.event.special[ type ] || {};

			// If selector defined, determine special event api type, otherwise given type
			type = ( selector ? special.delegateType : special.bindType ) || type;

			// Update special based on newly reset type
			special = jQuery.event.special[ type ] || {};

			// handleObj is passed to all event handlers
			handleObj = jQuery.extend( {
				type: type,
				origType: origType,
				data: data,
				handler: handler,
				guid: handler.guid,
				selector: selector,
				needsContext: selector && jQuery.expr.match.needsContext.test( selector ),
				namespace: namespaces.join( "." )
			}, handleObjIn );

			// Init the event handler queue if we're the first
			if ( !( handlers = events[ type ] ) ) {
				handlers = events[ type ] = [];
				handlers.delegateCount = 0;

				// Only use addEventListener if the special events handler returns false
				if ( !special.setup ||
					special.setup.call( elem, data, namespaces, eventHandle ) === false ) {

					if ( elem.addEventListener ) {
						elem.addEventListener( type, eventHandle );
					}
				}
			}

			if ( special.add ) {
				special.add.call( elem, handleObj );

				if ( !handleObj.handler.guid ) {
					handleObj.handler.guid = handler.guid;
				}
			}

			// Add to the element's handler list, delegates in front
			if ( selector ) {
				handlers.splice( handlers.delegateCount++, 0, handleObj );
			} else {
				handlers.push( handleObj );
			}

			// Keep track of which events have ever been used, for event optimization
			jQuery.event.global[ type ] = true;
		}

	},

	// Detach an event or set of events from an element
	remove: function( elem, types, handler, selector, mappedTypes ) {

		var j, origCount, tmp,
			events, t, handleObj,
			special, handlers, type, namespaces, origType,
			elemData = dataPriv.hasData( elem ) && dataPriv.get( elem );

		if ( !elemData || !( events = elemData.events ) ) {
			return;
		}

		// Once for each type.namespace in types; type may be omitted
		types = ( types || "" ).match( rnothtmlwhite ) || [ "" ];
		t = types.length;
		while ( t-- ) {
			tmp = rtypenamespace.exec( types[ t ] ) || [];
			type = origType = tmp[ 1 ];
			namespaces = ( tmp[ 2 ] || "" ).split( "." ).sort();

			// Unbind all events (on this namespace, if provided) for the element
			if ( !type ) {
				for ( type in events ) {
					jQuery.event.remove( elem, type + types[ t ], handler, selector, true );
				}
				continue;
			}

			special = jQuery.event.special[ type ] || {};
			type = ( selector ? special.delegateType : special.bindType ) || type;
			handlers = events[ type ] || [];
			tmp = tmp[ 2 ] &&
				new RegExp( "(^|\\.)" + namespaces.join( "\\.(?:.*\\.|)" ) + "(\\.|$)" );

			// Remove matching events
			origCount = j = handlers.length;
			while ( j-- ) {
				handleObj = handlers[ j ];

				if ( ( mappedTypes || origType === handleObj.origType ) &&
					( !handler || handler.guid === handleObj.guid ) &&
					( !tmp || tmp.test( handleObj.namespace ) ) &&
					( !selector || selector === handleObj.selector ||
						selector === "**" && handleObj.selector ) ) {
					handlers.splice( j, 1 );

					if ( handleObj.selector ) {
						handlers.delegateCount--;
					}
					if ( special.remove ) {
						special.remove.call( elem, handleObj );
					}
				}
			}

			// Remove generic event handler if we removed something and no more handlers exist
			// (avoids potential for endless recursion during removal of special event handlers)
			if ( origCount && !handlers.length ) {
				if ( !special.teardown ||
					special.teardown.call( elem, namespaces, elemData.handle ) === false ) {

					jQuery.removeEvent( elem, type, elemData.handle );
				}

				delete events[ type ];
			}
		}

		// Remove data and the expando if it's no longer used
		if ( jQuery.isEmptyObject( events ) ) {
			dataPriv.remove( elem, "handle events" );
		}
	},

	dispatch: function( nativeEvent ) {

		var i, j, ret, matched, handleObj, handlerQueue,
			args = new Array( arguments.length ),

			// Make a writable jQuery.Event from the native event object
			event = jQuery.event.fix( nativeEvent ),

			handlers = (
				dataPriv.get( this, "events" ) || Object.create( null )
			)[ event.type ] || [],
			special = jQuery.event.special[ event.type ] || {};

		// Use the fix-ed jQuery.Event rather than the (read-only) native event
		args[ 0 ] = event;

		for ( i = 1; i < arguments.length; i++ ) {
			args[ i ] = arguments[ i ];
		}

		event.delegateTarget = this;

		// Call the preDispatch hook for the mapped type, and let it bail if desired
		if ( special.preDispatch && special.preDispatch.call( this, event ) === false ) {
			return;
		}

		// Determine handlers
		handlerQueue = jQuery.event.handlers.call( this, event, handlers );

		// Run delegates first; they may want to stop propagation beneath us
		i = 0;
		while ( ( matched = handlerQueue[ i++ ] ) && !event.isPropagationStopped() ) {
			event.currentTarget = matched.elem;

			j = 0;
			while ( ( handleObj = matched.handlers[ j++ ] ) &&
				!event.isImmediatePropagationStopped() ) {

				// If the event is namespaced, then each handler is only invoked if it is
				// specially universal or its namespaces are a superset of the event's.
				if ( !event.rnamespace || handleObj.namespace === false ||
					event.rnamespace.test( handleObj.namespace ) ) {

					event.handleObj = handleObj;
					event.data = handleObj.data;

					ret = ( ( jQuery.event.special[ handleObj.origType ] || {} ).handle ||
						handleObj.handler ).apply( matched.elem, args );

					if ( ret !== undefined ) {
						if ( ( event.result = ret ) === false ) {
							event.preventDefault();
							event.stopPropagation();
						}
					}
				}
			}
		}

		// Call the postDispatch hook for the mapped type
		if ( special.postDispatch ) {
			special.postDispatch.call( this, event );
		}

		return event.result;
	},

	handlers: function( event, handlers ) {
		var i, handleObj, sel, matchedHandlers, matchedSelectors,
			handlerQueue = [],
			delegateCount = handlers.delegateCount,
			cur = event.target;

		// Find delegate handlers
		if ( delegateCount &&

			// Support: IE <=9
			// Black-hole SVG <use> instance trees (trac-13180)
			cur.nodeType &&

			// Support: Firefox <=42
			// Suppress spec-violating clicks indicating a non-primary pointer button (trac-3861)
			// https://www.w3.org/TR/DOM-Level-3-Events/#event-type-click
			// Support: IE 11 only
			// ...but not arrow key "clicks" of radio inputs, which can have `button` -1 (gh-2343)
			!( event.type === "click" && event.button >= 1 ) ) {

			for ( ; cur !== this; cur = cur.parentNode || this ) {

				// Don't check non-elements (trac-13208)
				// Don't process clicks on disabled elements (trac-6911, trac-8165, trac-11382, trac-11764)
				if ( cur.nodeType === 1 && !( event.type === "click" && cur.disabled === true ) ) {
					matchedHandlers = [];
					matchedSelectors = {};
					for ( i = 0; i < delegateCount; i++ ) {
						handleObj = handlers[ i ];

						// Don't conflict with Object.prototype properties (trac-13203)
						sel = handleObj.selector + " ";

						if ( matchedSelectors[ sel ] === undefined ) {
							matchedSelectors[ sel ] = handleObj.needsContext ?
								jQuery( sel, this ).index( cur ) > -1 :
								jQuery.find( sel, this, null, [ cur ] ).length;
						}
						if ( matchedSelectors[ sel ] ) {
							matchedHandlers.push( handleObj );
						}
					}
					if ( matchedHandlers.length ) {
						handlerQueue.push( { elem: cur, handlers: matchedHandlers } );
					}
				}
			}
		}

		// Add the remaining (directly-bound) handlers
		cur = this;
		if ( delegateCount < handlers.length ) {
			handlerQueue.push( { elem: cur, handlers: handlers.slice( delegateCount ) } );
		}

		return handlerQueue;
	},

	addProp: function( name, hook ) {
		Object.defineProperty( jQuery.Event.prototype, name, {
			enumerable: true,
			configurable: true,

			get: isFunction( hook ) ?
				function() {
					if ( this.originalEvent ) {
						return hook( this.originalEvent );
					}
				} :
				function() {
					if ( this.originalEvent ) {
						return this.originalEvent[ name ];
					}
				},

			set: function( value ) {
				Object.defineProperty( this, name, {
					enumerable: true,
					configurable: true,
					writable: true,
					value: value
				} );
			}
		} );
	},

	fix: function( originalEvent ) {
		return originalEvent[ jQuery.expando ] ?
			originalEvent :
			new jQuery.Event( originalEvent );
	},

	special: {
		load: {

			// Prevent triggered image.load events from bubbling to window.load
			noBubble: true
		},
		click: {

			// Utilize native event to ensure correct state for checkable inputs
			setup: function( data ) {

				// For mutual compressibility with _default, replace `this` access with a local var.
				// `|| data` is dead code meant only to preserve the variable through minification.
				var el = this || data;

				// Claim the first handler
				if ( rcheckableType.test( el.type ) &&
					el.click && nodeName( el, "input" ) ) {

					// dataPriv.set( el, "click", ... )
					leverageNative( el, "click", true );
				}

				// Return false to allow normal processing in the caller
				return false;
			},
			trigger: function( data ) {

				// For mutual compressibility with _default, replace `this` access with a local var.
				// `|| data` is dead code meant only to preserve the variable through minification.
				var el = this || data;

				// Force setup before triggering a click
				if ( rcheckableType.test( el.type ) &&
					el.click && nodeName( el, "input" ) ) {

					leverageNative( el, "click" );
				}

				// Return non-false to allow normal event-path propagation
				return true;
			},

			// For cross-browser consistency, suppress native .click() on links
			// Also prevent it if we're currently inside a leveraged native-event stack
			_default: function( event ) {
				var target = event.target;
				return rcheckableType.test( target.type ) &&
					target.click && nodeName( target, "input" ) &&
					dataPriv.get( target, "click" ) ||
					nodeName( target, "a" );
			}
		},

		beforeunload: {
			postDispatch: function( event ) {

				// Support: Firefox 20+
				// Firefox doesn't alert if the returnValue field is not set.
				if ( event.result !== undefined && event.originalEvent ) {
					event.originalEvent.returnValue = event.result;
				}
			}
		}
	}
};

// Ensure the presence of an event listener that handles manually-triggered
// synthetic events by interrupting progress until reinvoked in response to
// *native* events that it fires directly, ensuring that state changes have
// already occurred before other listeners are invoked.
function leverageNative( el, type, isSetup ) {

	// Missing `isSetup` indicates a trigger call, which must force setup through jQuery.event.add
	if ( !isSetup ) {
		if ( dataPriv.get( el, type ) === undefined ) {
			jQuery.event.add( el, type, returnTrue );
		}
		return;
	}

	// Register the controller as a special universal handler for all event namespaces
	dataPriv.set( el, type, false );
	jQuery.event.add( el, type, {
		namespace: false,
		handler: function( event ) {
			var result,
				saved = dataPriv.get( this, type );

			if ( ( event.isTrigger & 1 ) && this[ type ] ) {

				// Interrupt processing of the outer synthetic .trigger()ed event
				if ( !saved ) {

					// Store arguments for use when handling the inner native event
					// There will always be at least one argument (an event object), so this array
					// will not be confused with a leftover capture object.
					saved = slice.call( arguments );
					dataPriv.set( this, type, saved );

					// Trigger the native event and capture its result
					this[ type ]();
					result = dataPriv.get( this, type );
					dataPriv.set( this, type, false );

					if ( saved !== result ) {

						// Cancel the outer synthetic event
						event.stopImmediatePropagation();
						event.preventDefault();

						return result;
					}

				// If this is an inner synthetic event for an event with a bubbling surrogate
				// (focus or blur), assume that the surrogate already propagated from triggering
				// the native event and prevent that from happening again here.
				// This technically gets the ordering wrong w.r.t. to `.trigger()` (in which the
				// bubbling surrogate propagates *after* the non-bubbling base), but that seems
				// less bad than duplication.
				} else if ( ( jQuery.event.special[ type ] || {} ).delegateType ) {
					event.stopPropagation();
				}

			// If this is a native event triggered above, everything is now in order
			// Fire an inner synthetic event with the original arguments
			} else if ( saved ) {

				// ...and capture the result
				dataPriv.set( this, type, jQuery.event.trigger(
					saved[ 0 ],
					saved.slice( 1 ),
					this
				) );

				// Abort handling of the native event by all jQuery handlers while allowing
				// native handlers on the same element to run. On target, this is achieved
				// by stopping immediate propagation just on the jQuery event. However,
				// the native event is re-wrapped by a jQuery one on each level of the
				// propagation so the only way to stop it for jQuery is to stop it for
				// everyone via native `stopPropagation()`. This is not a problem for
				// focus/blur which don't bubble, but it does also stop click on checkboxes
				// and radios. We accept this limitation.
				event.stopPropagation();
				event.isImmediatePropagationStopped = returnTrue;
			}
		}
	} );
}

jQuery.removeEvent = function( elem, type, handle ) {

	// This "if" is needed for plain objects
	if ( elem.removeEventListener ) {
		elem.removeEventListener( type, handle );
	}
};

jQuery.Event = function( src, props ) {

	// Allow instantiation without the 'new' keyword
	if ( !( this instanceof jQuery.Event ) ) {
		return new jQuery.Event( src, props );
	}

	// Event object
	if ( src && src.type ) {
		this.originalEvent = src;
		this.type = src.type;

		// Events bubbling up the document may have been marked as prevented
		// by a handler lower down the tree; reflect the correct value.
		this.isDefaultPrevented = src.defaultPrevented ||
				src.defaultPrevented === undefined &&

				// Support: Android <=2.3 only
				src.returnValue === false ?
			returnTrue :
			returnFalse;

		// Create target properties
		// Support: Safari <=6 - 7 only
		// Target should not be a text node (trac-504, trac-13143)
		this.target = ( src.target && src.target.nodeType === 3 ) ?
			src.target.parentNode :
			src.target;

		this.currentTarget = src.currentTarget;
		this.relatedTarget = src.relatedTarget;

	// Event type
	} else {
		this.type = src;
	}

	// Put explicitly provided properties onto the event object
	if ( props ) {
		jQuery.extend( this, props );
	}

	// Create a timestamp if incoming event doesn't have one
	this.timeStamp = src && src.timeStamp || Date.now();

	// Mark it as fixed
	this[ jQuery.expando ] = true;
};

// jQuery.Event is based on DOM3 Events as specified by the ECMAScript Language Binding
// https://www.w3.org/TR/2003/WD-DOM-Level-3-Events-20030331/ecma-script-binding.html
jQuery.Event.prototype = {
	constructor: jQuery.Event,
	isDefaultPrevented: returnFalse,
	isPropagationStopped: returnFalse,
	isImmediatePropagationStopped: returnFalse,
	isSimulated: false,

	preventDefault: function() {
		var e = this.originalEvent;

		this.isDefaultPrevented = returnTrue;

		if ( e && !this.isSimulated ) {
			e.preventDefault();
		}
	},
	stopPropagation: function() {
		var e = this.originalEvent;

		this.isPropagationStopped = returnTrue;

		if ( e && !this.isSimulated ) {
			e.stopPropagation();
		}
	},
	stopImmediatePropagation: function() {
		var e = this.originalEvent;

		this.isImmediatePropagationStopped = returnTrue;

		if ( e && !this.isSimulated ) {
			e.stopImmediatePropagation();
		}

		this.stopPropagation();
	}
};

// Includes all common event props including KeyEvent and MouseEvent specific props
jQuery.each( {
	altKey: true,
	bubbles: true,
	cancelable: true,
	changedTouches: true,
	ctrlKey: true,
	detail: true,
	eventPhase: true,
	metaKey: true,
	pageX: true,
	pageY: true,
	shiftKey: true,
	view: true,
	"char": true,
	code: true,
	charCode: true,
	key: true,
	keyCode: true,
	button: true,
	buttons: true,
	clientX: true,
	clientY: true,
	offsetX: true,
	offsetY: true,
	pointerId: true,
	pointerType: true,
	screenX: true,
	screenY: true,
	targetTouches: true,
	toElement: true,
	touches: true,
	which: true
}, jQuery.event.addProp );

jQuery.each( { focus: "focusin", blur: "focusout" }, function( type, delegateType ) {

	function focusMappedHandler( nativeEvent ) {
		if ( document.documentMode ) {

			// Support: IE 11+
			// Attach a single focusin/focusout handler on the document while someone wants
			// focus/blur. This is because the former are synchronous in IE while the latter
			// are async. In other browsers, all those handlers are invoked synchronously.

			// `handle` from private data would already wrap the event, but we need
			// to change the `type` here.
			var handle = dataPriv.get( this, "handle" ),
				event = jQuery.event.fix( nativeEvent );
			event.type = nativeEvent.type === "focusin" ? "focus" : "blur";
			event.isSimulated = true;

			// First, handle focusin/focusout
			handle( nativeEvent );

			// ...then, handle focus/blur
			//
			// focus/blur don't bubble while focusin/focusout do; simulate the former by only
			// invoking the handler at the lower level.
			if ( event.target === event.currentTarget ) {

				// The setup part calls `leverageNative`, which, in turn, calls
				// `jQuery.event.add`, so event handle will already have been set
				// by this point.
				handle( event );
			}
		} else {

			// For non-IE browsers, attach a single capturing handler on the document
			// while someone wants focusin/focusout.
			jQuery.event.simulate( delegateType, nativeEvent.target,
				jQuery.event.fix( nativeEvent ) );
		}
	}

	jQuery.event.special[ type ] = {

		// Utilize native event if possible so blur/focus sequence is correct
		setup: function() {

			var attaches;

			// Claim the first handler
			// dataPriv.set( this, "focus", ... )
			// dataPriv.set( this, "blur", ... )
			leverageNative( this, type, true );

			if ( document.documentMode ) {

				// Support: IE 9 - 11+
				// We use the same native handler for focusin & focus (and focusout & blur)
				// so we need to coordinate setup & teardown parts between those events.
				// Use `delegateType` as the key as `type` is already used by `leverageNative`.
				attaches = dataPriv.get( this, delegateType );
				if ( !attaches ) {
					this.addEventListener( delegateType, focusMappedHandler );
				}
				dataPriv.set( this, delegateType, ( attaches || 0 ) + 1 );
			} else {

				// Return false to allow normal processing in the caller
				return false;
			}
		},
		trigger: function() {

			// Force setup before trigger
			leverageNative( this, type );

			// Return non-false to allow normal event-path propagation
			return true;
		},

		teardown: function() {
			var attaches;

			if ( document.documentMode ) {
				attaches = dataPriv.get( this, delegateType ) - 1;
				if ( !attaches ) {
					this.removeEventListener( delegateType, focusMappedHandler );
					dataPriv.remove( this, delegateType );
				} else {
					dataPriv.set( this, delegateType, attaches );
				}
			} else {

				// Return false to indicate standard teardown should be applied
				return false;
			}
		},

		// Suppress native focus or blur if we're currently inside
		// a leveraged native-event stack
		_default: function( event ) {
			return dataPriv.get( event.target, type );
		},

		delegateType: delegateType
	};

	// Support: Firefox <=44
	// Firefox doesn't have focus(in | out) events
	// Related ticket - https://bugzilla.mozilla.org/show_bug.cgi?id=687787
	//
	// Support: Chrome <=48 - 49, Safari <=9.0 - 9.1
	// focus(in | out) events fire after focus & blur events,
	// which is spec violation - http://www.w3.org/TR/DOM-Level-3-Events/#events-focusevent-event-order
	// Related ticket - https://bugs.chromium.org/p/chromium/issues/detail?id=449857
	//
	// Support: IE 9 - 11+
	// To preserve relative focusin/focus & focusout/blur event order guaranteed on the 3.x branch,
	// attach a single handler for both events in IE.
	jQuery.event.special[ delegateType ] = {
		setup: function() {

			// Handle: regular nodes (via `this.ownerDocument`), window
			// (via `this.document`) & document (via `this`).
			var doc = this.ownerDocument || this.document || this,
				dataHolder = document.documentMode ? this : doc,
				attaches = dataPriv.get( dataHolder, delegateType );

			// Support: IE 9 - 11+
			// We use the same native handler for focusin & focus (and focusout & blur)
			// so we need to coordinate setup & teardown parts between those events.
			// Use `delegateType` as the key as `type` is already used by `leverageNative`.
			if ( !attaches ) {
				if ( document.documentMode ) {
					this.addEventListener( delegateType, focusMappedHandler );
				} else {
					doc.addEventListener( type, focusMappedHandler, true );
				}
			}
			dataPriv.set( dataHolder, delegateType, ( attaches || 0 ) + 1 );
		},
		teardown: function() {
			var doc = this.ownerDocument || this.document || this,
				dataHolder = document.documentMode ? this : doc,
				attaches = dataPriv.get( dataHolder, delegateType ) - 1;

			if ( !attaches ) {
				if ( document.documentMode ) {
					this.removeEventListener( delegateType, focusMappedHandler );
				} else {
					doc.removeEventListener( type, focusMappedHandler, true );
				}
				dataPriv.remove( dataHolder, delegateType );
			} else {
				dataPriv.set( dataHolder, delegateType, attaches );
			}
		}
	};
} );

// Create mouseenter/leave events using mouseover/out and event-time checks
// so that event delegation works in jQuery.
// Do the same for pointerenter/pointerleave and pointerover/pointerout
//
// Support: Safari 7 only
// Safari sends mouseenter too often; see:
// https://bugs.chromium.org/p/chromium/issues/detail?id=470258
// for the description of the bug (it existed in older Chrome versions as well).
jQuery.each( {
	mouseenter: "mouseover",
	mouseleave: "mouseout",
	pointerenter: "pointerover",
	pointerleave: "pointerout"
}, function( orig, fix ) {
	jQuery.event.special[ orig ] = {
		delegateType: fix,
		bindType: fix,

		handle: function( event ) {
			var ret,
				target = this,
				related = event.relatedTarget,
				handleObj = event.handleObj;

			// For mouseenter/leave call the handler if related is outside the target.
			// NB: No relatedTarget if the mouse left/entered the browser window
			if ( !related || ( related !== target && !jQuery.contains( target, related ) ) ) {
				event.type = handleObj.origType;
				ret = handleObj.handler.apply( this, arguments );
				event.type = fix;
			}
			return ret;
		}
	};
} );

jQuery.fn.extend( {

	on: function( types, selector, data, fn ) {
		return on( this, types, selector, data, fn );
	},
	one: function( types, selector, data, fn ) {
		return on( this, types, selector, data, fn, 1 );
	},
	off: function( types, selector, fn ) {
		var handleObj, type;
		if ( types && types.preventDefault && types.handleObj ) {

			// ( event )  dispatched jQuery.Event
			handleObj = types.handleObj;
			jQuery( types.delegateTarget ).off(
				handleObj.namespace ?
					handleObj.origType + "." + handleObj.namespace :
					handleObj.origType,
				handleObj.selector,
				handleObj.handler
			);
			return this;
		}
		if ( typeof types === "object" ) {

			// ( types-object [, selector] )
			for ( type in types ) {
				this.off( type, selector, types[ type ] );
			}
			return this;
		}
		if ( selector === false || typeof selector === "function" ) {

			// ( types [, fn] )
			fn = selector;
			selector = undefined;
		}
		if ( fn === false ) {
			fn = returnFalse;
		}
		return this.each( function() {
			jQuery.event.remove( this, types, fn, selector );
		} );
	}
} );


var

	// Support: IE <=10 - 11, Edge 12 - 13 only
	// In IE/Edge using regex groups here causes severe slowdowns.
	// See https://connect.microsoft.com/IE/feedback/details/1736512/
	rnoInnerhtml = /<script|<style|<link/i,

	// checked="checked" or checked
	rchecked = /checked\s*(?:[^=]|=\s*.checked.)/i,

	rcleanScript = /^\s*<!\[CDATA\[|\]\]>\s*$/g;

// Prefer a tbody over its parent table for containing new rows
function manipulationTarget( elem, content ) {
	if ( nodeName( elem, "table" ) &&
		nodeName( content.nodeType !== 11 ? content : content.firstChild, "tr" ) ) {

		return jQuery( elem ).children( "tbody" )[ 0 ] || elem;
	}

	return elem;
}

// Replace/restore the type attribute of script elements for safe DOM manipulation
function disableScript( elem ) {
	elem.type = ( elem.getAttribute( "type" ) !== null ) + "/" + elem.type;
	return elem;
}
function restoreScript( elem ) {
	if ( ( elem.type || "" ).slice( 0, 5 ) === "true/" ) {
		elem.type = elem.type.slice( 5 );
	} else {
		elem.removeAttribute( "type" );
	}

	return elem;
}

function cloneCopyEvent( src, dest ) {
	var i, l, type, pdataOld, udataOld, udataCur, events;

	if ( dest.nodeType !== 1 ) {
		return;
	}

	// 1. Copy private data: events, handlers, etc.
	if ( dataPriv.hasData( src ) ) {
		pdataOld = dataPriv.get( src );
		events = pdataOld.events;

		if ( events ) {
			dataPriv.remove( dest, "handle events" );

			for ( type in events ) {
				for ( i = 0, l = events[ type ].length; i < l; i++ ) {
					jQuery.event.add( dest, type, events[ type ][ i ] );
				}
			}
		}
	}

	// 2. Copy user data
	if ( dataUser.hasData( src ) ) {
		udataOld = dataUser.access( src );
		udataCur = jQuery.extend( {}, udataOld );

		dataUser.set( dest, udataCur );
	}
}

// Fix IE bugs, see support tests
function fixInput( src, dest ) {
	var nodeName = dest.nodeName.toLowerCase();

	// Fails to persist the checked state of a cloned checkbox or radio button.
	if ( nodeName === "input" && rcheckableType.test( src.type ) ) {
		dest.checked = src.checked;

	// Fails to return the selected option to the default selected state when cloning options
	} else if ( nodeName === "input" || nodeName === "textarea" ) {
		dest.defaultValue = src.defaultValue;
	}
}

function domManip( collection, args, callback, ignored ) {

	// Flatten any nested arrays
	args = flat( args );

	var fragment, first, scripts, hasScripts, node, doc,
		i = 0,
		l = collection.length,
		iNoClone = l - 1,
		value = args[ 0 ],
		valueIsFunction = isFunction( value );

	// We can't cloneNode fragments that contain checked, in WebKit
	if ( valueIsFunction ||
			( l > 1 && typeof value === "string" &&
				!support.checkClone && rchecked.test( value ) ) ) {
		return collection.each( function( index ) {
			var self = collection.eq( index );
			if ( valueIsFunction ) {
				args[ 0 ] = value.call( this, index, self.html() );
			}
			domManip( self, args, callback, ignored );
		} );
	}

	if ( l ) {
		fragment = buildFragment( args, collection[ 0 ].ownerDocument, false, collection, ignored );
		first = fragment.firstChild;

		if ( fragment.childNodes.length === 1 ) {
			fragment = first;
		}

		// Require either new content or an interest in ignored elements to invoke the callback
		if ( first || ignored ) {
			scripts = jQuery.map( getAll( fragment, "script" ), disableScript );
			hasScripts = scripts.length;

			// Use the original fragment for the last item
			// instead of the first because it can end up
			// being emptied incorrectly in certain situations (trac-8070).
			for ( ; i < l; i++ ) {
				node = fragment;

				if ( i !== iNoClone ) {
					node = jQuery.clone( node, true, true );

					// Keep references to cloned scripts for later restoration
					if ( hasScripts ) {

						// Support: Android <=4.0 only, PhantomJS 1 only
						// push.apply(_, arraylike) throws on ancient WebKit
						jQuery.merge( scripts, getAll( node, "script" ) );
					}
				}

				callback.call( collection[ i ], node, i );
			}

			if ( hasScripts ) {
				doc = scripts[ scripts.length - 1 ].ownerDocument;

				// Reenable scripts
				jQuery.map( scripts, restoreScript );

				// Evaluate executable scripts on first document insertion
				for ( i = 0; i < hasScripts; i++ ) {
					node = scripts[ i ];
					if ( rscriptType.test( node.type || "" ) &&
						!dataPriv.access( node, "globalEval" ) &&
						jQuery.contains( doc, node ) ) {

						if ( node.src && ( node.type || "" ).toLowerCase()  !== "module" ) {

							// Optional AJAX dependency, but won't run scripts if not present
							if ( jQuery._evalUrl && !node.noModule ) {
								jQuery._evalUrl( node.src, {
									nonce: node.nonce || node.getAttribute( "nonce" )
								}, doc );
							}
						} else {

							// Unwrap a CDATA section containing script contents. This shouldn't be
							// needed as in XML documents they're already not visible when
							// inspecting element contents and in HTML documents they have no
							// meaning but we're preserving that logic for backwards compatibility.
							// This will be removed completely in 4.0. See gh-4904.
							DOMEval( node.textContent.replace( rcleanScript, "" ), node, doc );
						}
					}
				}
			}
		}
	}

	return collection;
}

function remove( elem, selector, keepData ) {
	var node,
		nodes = selector ? jQuery.filter( selector, elem ) : elem,
		i = 0;

	for ( ; ( node = nodes[ i ] ) != null; i++ ) {
		if ( !keepData && node.nodeType === 1 ) {
			jQuery.cleanData( getAll( node ) );
		}

		if ( node.parentNode ) {
			if ( keepData && isAttached( node ) ) {
				setGlobalEval( getAll( node, "script" ) );
			}
			node.parentNode.removeChild( node );
		}
	}

	return elem;
}

jQuery.extend( {
	htmlPrefilter: function( html ) {
		return html;
	},

	clone: function( elem, dataAndEvents, deepDataAndEvents ) {
		var i, l, srcElements, destElements,
			clone = elem.cloneNode( true ),
			inPage = isAttached( elem );

		// Fix IE cloning issues
		if ( !support.noCloneChecked && ( elem.nodeType === 1 || elem.nodeType === 11 ) &&
				!jQuery.isXMLDoc( elem ) ) {

			// We eschew jQuery#find here for performance reasons:
			// https://jsperf.com/getall-vs-sizzle/2
			destElements = getAll( clone );
			srcElements = getAll( elem );

			for ( i = 0, l = srcElements.length; i < l; i++ ) {
				fixInput( srcElements[ i ], destElements[ i ] );
			}
		}

		// Copy the events from the original to the clone
		if ( dataAndEvents ) {
			if ( deepDataAndEvents ) {
				srcElements = srcElements || getAll( elem );
				destElements = destElements || getAll( clone );

				for ( i = 0, l = srcElements.length; i < l; i++ ) {
					cloneCopyEvent( srcElements[ i ], destElements[ i ] );
				}
			} else {
				cloneCopyEvent( elem, clone );
			}
		}

		// Preserve script evaluation history
		destElements = getAll( clone, "script" );
		if ( destElements.length > 0 ) {
			setGlobalEval( destElements, !inPage && getAll( elem, "script" ) );
		}

		// Return the cloned set
		return clone;
	},

	cleanData: function( elems ) {
		var data, elem, type,
			special = jQuery.event.special,
			i = 0;

		for ( ; ( elem = elems[ i ] ) !== undefined; i++ ) {
			if ( acceptData( elem ) ) {
				if ( ( data = elem[ dataPriv.expando ] ) ) {
					if ( data.events ) {
						for ( type in data.events ) {
							if ( special[ type ] ) {
								jQuery.event.remove( elem, type );

							// This is a shortcut to avoid jQuery.event.remove's overhead
							} else {
								jQuery.removeEvent( elem, type, data.handle );
							}
						}
					}

					// Support: Chrome <=35 - 45+
					// Assign undefined instead of using delete, see Data#remove
					elem[ dataPriv.expando ] = undefined;
				}
				if ( elem[ dataUser.expando ] ) {

					// Support: Chrome <=35 - 45+
					// Assign undefined instead of using delete, see Data#remove
					elem[ dataUser.expando ] = undefined;
				}
			}
		}
	}
} );

jQuery.fn.extend( {
	detach: function( selector ) {
		return remove( this, selector, true );
	},

	remove: function( selector ) {
		return remove( this, selector );
	},

	text: function( value ) {
		return access( this, function( value ) {
			return value === undefined ?
				jQuery.text( this ) :
				this.empty().each( function() {
					if ( this.nodeType === 1 || this.nodeType === 11 || this.nodeType === 9 ) {
						this.textContent = value;
					}
				} );
		}, null, value, arguments.length );
	},

	append: function() {
		return domManip( this, arguments, function( elem ) {
			if ( this.nodeType === 1 || this.nodeType === 11 || this.nodeType === 9 ) {
				var target = manipulationTarget( this, elem );
				target.appendChild( elem );
			}
		} );
	},

	prepend: function() {
		return domManip( this, arguments, function( elem ) {
			if ( this.nodeType === 1 || this.nodeType === 11 || this.nodeType === 9 ) {
				var target = manipulationTarget( this, elem );
				target.insertBefore( elem, target.firstChild );
			}
		} );
	},

	before: function() {
		return domManip( this, arguments, function( elem ) {
			if ( this.parentNode ) {
				this.parentNode.insertBefore( elem, this );
			}
		} );
	},

	after: function() {
		return domManip( this, arguments, function( elem ) {
			if ( this.parentNode ) {
				this.parentNode.insertBefore( elem, this.nextSibling );
			}
		} );
	},

	empty: function() {
		var elem,
			i = 0;

		for ( ; ( elem = this[ i ] ) != null; i++ ) {
			if ( elem.nodeType === 1 ) {

				// Prevent memory leaks
				jQuery.cleanData( getAll( elem, false ) );

				// Remove any remaining nodes
				elem.textContent = "";
			}
		}

		return this;
	},

	clone: function( dataAndEvents, deepDataAndEvents ) {
		dataAndEvents = dataAndEvents == null ? false : dataAndEvents;
		deepDataAndEvents = deepDataAndEvents == null ? dataAndEvents : deepDataAndEvents;

		return this.map( function() {
			return jQuery.clone( this, dataAndEvents, deepDataAndEvents );
		} );
	},

	html: function( value ) {
		return access( this, function( value ) {
			var elem = this[ 0 ] || {},
				i = 0,
				l = this.length;

			if ( value === undefined && elem.nodeType === 1 ) {
				return elem.innerHTML;
			}

			// See if we can take a shortcut and just use innerHTML
			if ( typeof value === "string" && !rnoInnerhtml.test( value ) &&
				!wrapMap[ ( rtagName.exec( value ) || [ "", "" ] )[ 1 ].toLowerCase() ] ) {

				value = jQuery.htmlPrefilter( value );

				try {
					for ( ; i < l; i++ ) {
						elem = this[ i ] || {};

						// Remove element nodes and prevent memory leaks
						if ( elem.nodeType === 1 ) {
							jQuery.cleanData( getAll( elem, false ) );
							elem.innerHTML = value;
						}
					}

					elem = 0;

				// If using innerHTML throws an exception, use the fallback method
				} catch ( e ) {}
			}

			if ( elem ) {
				this.empty().append( value );
			}
		}, null, value, arguments.length );
	},

	replaceWith: function() {
		var ignored = [];

		// Make the changes, replacing each non-ignored context element with the new content
		return domManip( this, arguments, function( elem ) {
			var parent = this.parentNode;

			if ( jQuery.inArray( this, ignored ) < 0 ) {
				jQuery.cleanData( getAll( this ) );
				if ( parent ) {
					parent.replaceChild( elem, this );
				}
			}

		// Force callback invocation
		}, ignored );
	}
} );

jQuery.each( {
	appendTo: "append",
	prependTo: "prepend",
	insertBefore: "before",
	insertAfter: "after",
	replaceAll: "replaceWith"
}, function( name, original ) {
	jQuery.fn[ name ] = function( selector ) {
		var elems,
			ret = [],
			insert = jQuery( selector ),
			last = insert.length - 1,
			i = 0;

		for ( ; i <= last; i++ ) {
			elems = i === last ? this : this.clone( true );
			jQuery( insert[ i ] )[ original ]( elems );

			// Support: Android <=4.0 only, PhantomJS 1 only
			// .get() because push.apply(_, arraylike) throws on ancient WebKit
			push.apply( ret, elems.get() );
		}

		return this.pushStack( ret );
	};
} );
var rnumnonpx = new RegExp( "^(" + pnum + ")(?!px)[a-z%]+$", "i" );

var rcustomProp = /^--/;


var getStyles = function( elem ) {

		// Support: IE <=11 only, Firefox <=30 (trac-15098, trac-14150)
		// IE throws on elements created in popups
		// FF meanwhile throws on frame elements through "defaultView.getComputedStyle"
		var view = elem.ownerDocument.defaultView;

		if ( !view || !view.opener ) {
			view = window;
		}

		return view.getComputedStyle( elem );
	};

var swap = function( elem, options, callback ) {
	var ret, name,
		old = {};

	// Remember the old values, and insert the new ones
	for ( name in options ) {
		old[ name ] = elem.style[ name ];
		elem.style[ name ] = options[ name ];
	}

	ret = callback.call( elem );

	// Revert the old values
	for ( name in options ) {
		elem.style[ name ] = old[ name ];
	}

	return ret;
};


var rboxStyle = new RegExp( cssExpand.join( "|" ), "i" );



( function() {

	// Executing both pixelPosition & boxSizingReliable tests require only one layout
	// so they're executed at the same time to save the second computation.
	function computeStyleTests() {

		// This is a singleton, we need to execute it only once
		if ( !div ) {
			return;
		}

		container.style.cssText = "position:absolute;left:-11111px;width:60px;" +
			"margin-top:1px;padding:0;border:0";
		div.style.cssText =
			"position:relative;display:block;box-sizing:border-box;overflow:scroll;" +
			"margin:auto;border:1px;padding:1px;" +
			"width:60%;top:1%";
		documentElement.appendChild( container ).appendChild( div );

		var divStyle = window.getComputedStyle( div );
		pixelPositionVal = divStyle.top !== "1%";

		// Support: Android 4.0 - 4.3 only, Firefox <=3 - 44
		reliableMarginLeftVal = roundPixelMeasures( divStyle.marginLeft ) === 12;

		// Support: Android 4.0 - 4.3 only, Safari <=9.1 - 10.1, iOS <=7.0 - 9.3
		// Some styles come back with percentage values, even though they shouldn't
		div.style.right = "60%";
		pixelBoxStylesVal = roundPixelMeasures( divStyle.right ) === 36;

		// Support: IE 9 - 11 only
		// Detect misreporting of content dimensions for box-sizing:border-box elements
		boxSizingReliableVal = roundPixelMeasures( divStyle.width ) === 36;

		// Support: IE 9 only
		// Detect overflow:scroll screwiness (gh-3699)
		// Support: Chrome <=64
		// Don't get tricked when zoom affects offsetWidth (gh-4029)
		div.style.position = "absolute";
		scrollboxSizeVal = roundPixelMeasures( div.offsetWidth / 3 ) === 12;

		documentElement.removeChild( container );

		// Nullify the div so it wouldn't be stored in the memory and
		// it will also be a sign that checks already performed
		div = null;
	}

	function roundPixelMeasures( measure ) {
		return Math.round( parseFloat( measure ) );
	}

	var pixelPositionVal, boxSizingReliableVal, scrollboxSizeVal, pixelBoxStylesVal,
		reliableTrDimensionsVal, reliableMarginLeftVal,
		container = document.createElement( "div" ),
		div = document.createElement( "div" );

	// Finish early in limited (non-browser) environments
	if ( !div.style ) {
		return;
	}

	// Support: IE <=9 - 11 only
	// Style of cloned element affects source element cloned (trac-8908)
	div.style.backgroundClip = "content-box";
	div.cloneNode( true ).style.backgroundClip = "";
	support.clearCloneStyle = div.style.backgroundClip === "content-box";

	jQuery.extend( support, {
		boxSizingReliable: function() {
			computeStyleTests();
			return boxSizingReliableVal;
		},
		pixelBoxStyles: function() {
			computeStyleTests();
			return pixelBoxStylesVal;
		},
		pixelPosition: function() {
			computeStyleTests();
			return pixelPositionVal;
		},
		reliableMarginLeft: function() {
			computeStyleTests();
			return reliableMarginLeftVal;
		},
		scrollboxSize: function() {
			computeStyleTests();
			return scrollboxSizeVal;
		},

		// Support: IE 9 - 11+, Edge 15 - 18+
		// IE/Edge misreport `getComputedStyle` of table rows with width/height
		// set in CSS while `offset*` properties report correct values.
		// Behavior in IE 9 is more subtle than in newer versions & it passes
		// some versions of this test; make sure not to make it pass there!
		//
		// Support: Firefox 70+
		// Only Firefox includes border widths
		// in computed dimensions. (gh-4529)
		reliableTrDimensions: function() {
			var table, tr, trChild, trStyle;
			if ( reliableTrDimensionsVal == null ) {
				table = document.createElement( "table" );
				tr = document.createElement( "tr" );
				trChild = document.createElement( "div" );

				table.style.cssText = "position:absolute;left:-11111px;border-collapse:separate";
				tr.style.cssText = "border:1px solid";

				// Support: Chrome 86+
				// Height set through cssText does not get applied.
				// Computed height then comes back as 0.
				tr.style.height = "1px";
				trChild.style.height = "9px";

				// Support: Android 8 Chrome 86+
				// In our bodyBackground.html iframe,
				// display for all div elements is set to "inline",
				// which causes a problem only in Android 8 Chrome 86.
				// Ensuring the div is display: block
				// gets around this issue.
				trChild.style.display = "block";

				documentElement
					.appendChild( table )
					.appendChild( tr )
					.appendChild( trChild );

				trStyle = window.getComputedStyle( tr );
				reliableTrDimensionsVal = ( parseInt( trStyle.height, 10 ) +
					parseInt( trStyle.borderTopWidth, 10 ) +
					parseInt( trStyle.borderBottomWidth, 10 ) ) === tr.offsetHeight;

				documentElement.removeChild( table );
			}
			return reliableTrDimensionsVal;
		}
	} );
} )();


function curCSS( elem, name, computed ) {
	var width, minWidth, maxWidth, ret,
		isCustomProp = rcustomProp.test( name ),

		// Support: Firefox 51+
		// Retrieving style before computed somehow
		// fixes an issue with getting wrong values
		// on detached elements
		style = elem.style;

	computed = computed || getStyles( elem );

	// getPropertyValue is needed for:
	//   .css('filter') (IE 9 only, trac-12537)
	//   .css('--customProperty) (gh-3144)
	if ( computed ) {

		// Support: IE <=9 - 11+
		// IE only supports `"float"` in `getPropertyValue`; in computed styles
		// it's only available as `"cssFloat"`. We no longer modify properties
		// sent to `.css()` apart from camelCasing, so we need to check both.
		// Normally, this would create difference in behavior: if
		// `getPropertyValue` returns an empty string, the value returned
		// by `.css()` would be `undefined`. This is usually the case for
		// disconnected elements. However, in IE even disconnected elements
		// with no styles return `"none"` for `getPropertyValue( "float" )`
		ret = computed.getPropertyValue( name ) || computed[ name ];

		if ( isCustomProp && ret ) {

			// Support: Firefox 105+, Chrome <=105+
			// Spec requires trimming whitespace for custom properties (gh-4926).
			// Firefox only trims leading whitespace. Chrome just collapses
			// both leading & trailing whitespace to a single space.
			//
			// Fall back to `undefined` if empty string returned.
			// This collapses a missing definition with property defined
			// and set to an empty string but there's no standard API
			// allowing us to differentiate them without a performance penalty
			// and returning `undefined` aligns with older jQuery.
			//
			// rtrimCSS treats U+000D CARRIAGE RETURN and U+000C FORM FEED
			// as whitespace while CSS does not, but this is not a problem
			// because CSS preprocessing replaces them with U+000A LINE FEED
			// (which *is* CSS whitespace)
			// https://www.w3.org/TR/css-syntax-3/#input-preprocessing
			ret = ret.replace( rtrimCSS, "$1" ) || undefined;
		}

		if ( ret === "" && !isAttached( elem ) ) {
			ret = jQuery.style( elem, name );
		}

		// A tribute to the "awesome hack by Dean Edwards"
		// Android Browser returns percentage for some values,
		// but width seems to be reliably pixels.
		// This is against the CSSOM draft spec:
		// https://drafts.csswg.org/cssom/#resolved-values
		if ( !support.pixelBoxStyles() && rnumnonpx.test( ret ) && rboxStyle.test( name ) ) {

			// Remember the original values
			width = style.width;
			minWidth = style.minWidth;
			maxWidth = style.maxWidth;

			// Put in the new values to get a computed value out
			style.minWidth = style.maxWidth = style.width = ret;
			ret = computed.width;

			// Revert the changed values
			style.width = width;
			style.minWidth = minWidth;
			style.maxWidth = maxWidth;
		}
	}

	return ret !== undefined ?

		// Support: IE <=9 - 11 only
		// IE returns zIndex value as an integer.
		ret + "" :
		ret;
}


function addGetHookIf( conditionFn, hookFn ) {

	// Define the hook, we'll check on the first run if it's really needed.
	return {
		get: function() {
			if ( conditionFn() ) {

				// Hook not needed (or it's not possible to use it due
				// to missing dependency), remove it.
				delete this.get;
				return;
			}

			// Hook needed; redefine it so that the support test is not executed again.
			return ( this.get = hookFn ).apply( this, arguments );
		}
	};
}


var cssPrefixes = [ "Webkit", "Moz", "ms" ],
	emptyStyle = document.createElement( "div" ).style,
	vendorProps = {};

// Return a vendor-prefixed property or undefined
function vendorPropName( name ) {

	// Check for vendor prefixed names
	var capName = name[ 0 ].toUpperCase() + name.slice( 1 ),
		i = cssPrefixes.length;

	while ( i-- ) {
		name = cssPrefixes[ i ] + capName;
		if ( name in emptyStyle ) {
			return name;
		}
	}
}

// Return a potentially-mapped jQuery.cssProps or vendor prefixed property
function finalPropName( name ) {
	var final = jQuery.cssProps[ name ] || vendorProps[ name ];

	if ( final ) {
		return final;
	}
	if ( name in emptyStyle ) {
		return name;
	}
	return vendorProps[ name ] = vendorPropName( name ) || name;
}


var

	// Swappable if display is none or starts with table
	// except "table", "table-cell", or "table-caption"
	// See here for display values: https://developer.mozilla.org/en-US/docs/CSS/display
	rdisplayswap = /^(none|table(?!-c[ea]).+)/,
	cssShow = { position: "absolute", visibility: "hidden", display: "block" },
	cssNormalTransform = {
		letterSpacing: "0",
		fontWeight: "400"
	};

function setPositiveNumber( _elem, value, subtract ) {

	// Any relative (+/-) values have already been
	// normalized at this point
	var matches = rcssNum.exec( value );
	return matches ?

		// Guard against undefined "subtract", e.g., when used as in cssHooks
		Math.max( 0, matches[ 2 ] - ( subtract || 0 ) ) + ( matches[ 3 ] || "px" ) :
		value;
}

function boxModelAdjustment( elem, dimension, box, isBorderBox, styles, computedVal ) {
	var i = dimension === "width" ? 1 : 0,
		extra = 0,
		delta = 0,
		marginDelta = 0;

	// Adjustment may not be necessary
	if ( box === ( isBorderBox ? "border" : "content" ) ) {
		return 0;
	}

	for ( ; i < 4; i += 2 ) {

		// Both box models exclude margin
		// Count margin delta separately to only add it after scroll gutter adjustment.
		// This is needed to make negative margins work with `outerHeight( true )` (gh-3982).
		if ( box === "margin" ) {
			marginDelta += jQuery.css( elem, box + cssExpand[ i ], true, styles );
		}

		// If we get here with a content-box, we're seeking "padding" or "border" or "margin"
		if ( !isBorderBox ) {

			// Add padding
			delta += jQuery.css( elem, "padding" + cssExpand[ i ], true, styles );

			// For "border" or "margin", add border
			if ( box !== "padding" ) {
				delta += jQuery.css( elem, "border" + cssExpand[ i ] + "Width", true, styles );

			// But still keep track of it otherwise
			} else {
				extra += jQuery.css( elem, "border" + cssExpand[ i ] + "Width", true, styles );
			}

		// If we get here with a border-box (content + padding + border), we're seeking "content" or
		// "padding" or "margin"
		} else {

			// For "content", subtract padding
			if ( box === "content" ) {
				delta -= jQuery.css( elem, "padding" + cssExpand[ i ], true, styles );
			}

			// For "content" or "padding", subtract border
			if ( box !== "margin" ) {
				delta -= jQuery.css( elem, "border" + cssExpand[ i ] + "Width", true, styles );
			}
		}
	}

	// Account for positive content-box scroll gutter when requested by providing computedVal
	if ( !isBorderBox && computedVal >= 0 ) {

		// offsetWidth/offsetHeight is a rounded sum of content, padding, scroll gutter, and border
		// Assuming integer scroll gutter, subtract the rest and round down
		delta += Math.max( 0, Math.ceil(
			elem[ "offset" + dimension[ 0 ].toUpperCase() + dimension.slice( 1 ) ] -
			computedVal -
			delta -
			extra -
			0.5

		// If offsetWidth/offsetHeight is unknown, then we can't determine content-box scroll gutter
		// Use an explicit zero to avoid NaN (gh-3964)
		) ) || 0;
	}

	return delta + marginDelta;
}

function getWidthOrHeight( elem, dimension, extra ) {

	// Start with computed style
	var styles = getStyles( elem ),

		// To avoid forcing a reflow, only fetch boxSizing if we need it (gh-4322).
		// Fake content-box until we know it's needed to know the true value.
		boxSizingNeeded = !support.boxSizingReliable() || extra,
		isBorderBox = boxSizingNeeded &&
			jQuery.css( elem, "boxSizing", false, styles ) === "border-box",
		valueIsBorderBox = isBorderBox,

		val = curCSS( elem, dimension, styles ),
		offsetProp = "offset" + dimension[ 0 ].toUpperCase() + dimension.slice( 1 );

	// Support: Firefox <=54
	// Return a confounding non-pixel value or feign ignorance, as appropriate.
	if ( rnumnonpx.test( val ) ) {
		if ( !extra ) {
			return val;
		}
		val = "auto";
	}


	// Support: IE 9 - 11 only
	// Use offsetWidth/offsetHeight for when box sizing is unreliable.
	// In those cases, the computed value can be trusted to be border-box.
	if ( ( !support.boxSizingReliable() && isBorderBox ||

		// Support: IE 10 - 11+, Edge 15 - 18+
		// IE/Edge misreport `getComputedStyle` of table rows with width/height
		// set in CSS while `offset*` properties report correct values.
		// Interestingly, in some cases IE 9 doesn't suffer from this issue.
		!support.reliableTrDimensions() && nodeName( elem, "tr" ) ||

		// Fall back to offsetWidth/offsetHeight when value is "auto"
		// This happens for inline elements with no explicit setting (gh-3571)
		val === "auto" ||

		// Support: Android <=4.1 - 4.3 only
		// Also use offsetWidth/offsetHeight for misreported inline dimensions (gh-3602)
		!parseFloat( val ) && jQuery.css( elem, "display", false, styles ) === "inline" ) &&

		// Make sure the element is visible & connected
		elem.getClientRects().length ) {

		isBorderBox = jQuery.css( elem, "boxSizing", false, styles ) === "border-box";

		// Where available, offsetWidth/offsetHeight approximate border box dimensions.
		// Where not available (e.g., SVG), assume unreliable box-sizing and interpret the
		// retrieved value as a content box dimension.
		valueIsBorderBox = offsetProp in elem;
		if ( valueIsBorderBox ) {
			val = elem[ offsetProp ];
		}
	}

	// Normalize "" and auto
	val = parseFloat( val ) || 0;

	// Adjust for the element's box model
	return ( val +
		boxModelAdjustment(
			elem,
			dimension,
			extra || ( isBorderBox ? "border" : "content" ),
			valueIsBorderBox,
			styles,

			// Provide the current computed size to request scroll gutter calculation (gh-3589)
			val
		)
	) + "px";
}

jQuery.extend( {

	// Add in style property hooks for overriding the default
	// behavior of getting and setting a style property
	cssHooks: {
		opacity: {
			get: function( elem, computed ) {
				if ( computed ) {

					// We should always get a number back from opacity
					var ret = curCSS( elem, "opacity" );
					return ret === "" ? "1" : ret;
				}
			}
		}
	},

	// Don't automatically add "px" to these possibly-unitless properties
	cssNumber: {
		animationIterationCount: true,
		aspectRatio: true,
		borderImageSlice: true,
		columnCount: true,
		flexGrow: true,
		flexShrink: true,
		fontWeight: true,
		gridArea: true,
		gridColumn: true,
		gridColumnEnd: true,
		gridColumnStart: true,
		gridRow: true,
		gridRowEnd: true,
		gridRowStart: true,
		lineHeight: true,
		opacity: true,
		order: true,
		orphans: true,
		scale: true,
		widows: true,
		zIndex: true,
		zoom: true,

		// SVG-related
		fillOpacity: true,
		floodOpacity: true,
		stopOpacity: true,
		strokeMiterlimit: true,
		strokeOpacity: true
	},

	// Add in properties whose names you wish to fix before
	// setting or getting the value
	cssProps: {},

	// Get and set the style property on a DOM Node
	style: function( elem, name, value, extra ) {

		// Don't set styles on text and comment nodes
		if ( !elem || elem.nodeType === 3 || elem.nodeType === 8 || !elem.style ) {
			return;
		}

		// Make sure that we're working with the right name
		var ret, type, hooks,
			origName = camelCase( name ),
			isCustomProp = rcustomProp.test( name ),
			style = elem.style;

		// Make sure that we're working with the right name. We don't
		// want to query the value if it is a CSS custom property
		// since they are user-defined.
		if ( !isCustomProp ) {
			name = finalPropName( origName );
		}

		// Gets hook for the prefixed version, then unprefixed version
		hooks = jQuery.cssHooks[ name ] || jQuery.cssHooks[ origName ];

		// Check if we're setting a value
		if ( value !== undefined ) {
			type = typeof value;

			// Convert "+=" or "-=" to relative numbers (trac-7345)
			if ( type === "string" && ( ret = rcssNum.exec( value ) ) && ret[ 1 ] ) {
				value = adjustCSS( elem, name, ret );

				// Fixes bug trac-9237
				type = "number";
			}

			// Make sure that null and NaN values aren't set (trac-7116)
			if ( value == null || value !== value ) {
				return;
			}

			// If a number was passed in, add the unit (except for certain CSS properties)
			// The isCustomProp check can be removed in jQuery 4.0 when we only auto-append
			// "px" to a few hardcoded values.
			if ( type === "number" && !isCustomProp ) {
				value += ret && ret[ 3 ] || ( jQuery.cssNumber[ origName ] ? "" : "px" );
			}

			// background-* props affect original clone's values
			if ( !support.clearCloneStyle && value === "" && name.indexOf( "background" ) === 0 ) {
				style[ name ] = "inherit";
			}

			// If a hook was provided, use that value, otherwise just set the specified value
			if ( !hooks || !( "set" in hooks ) ||
				( value = hooks.set( elem, value, extra ) ) !== undefined ) {

				if ( isCustomProp ) {
					style.setProperty( name, value );
				} else {
					style[ name ] = value;
				}
			}

		} else {

			// If a hook was provided get the non-computed value from there
			if ( hooks && "get" in hooks &&
				( ret = hooks.get( elem, false, extra ) ) !== undefined ) {

				return ret;
			}

			// Otherwise just get the value from the style object
			return style[ name ];
		}
	},

	css: function( elem, name, extra, styles ) {
		var val, num, hooks,
			origName = camelCase( name ),
			isCustomProp = rcustomProp.test( name );

		// Make sure that we're working with the right name. We don't
		// want to modify the value if it is a CSS custom property
		// since they are user-defined.
		if ( !isCustomProp ) {
			name = finalPropName( origName );
		}

		// Try prefixed name followed by the unprefixed name
		hooks = jQuery.cssHooks[ name ] || jQuery.cssHooks[ origName ];

		// If a hook was provided get the computed value from there
		if ( hooks && "get" in hooks ) {
			val = hooks.get( elem, true, extra );
		}

		// Otherwise, if a way to get the computed value exists, use that
		if ( val === undefined ) {
			val = curCSS( elem, name, styles );
		}

		// Convert "normal" to computed value
		if ( val === "normal" && name in cssNormalTransform ) {
			val = cssNormalTransform[ name ];
		}

		// Make numeric if forced or a qualifier was provided and val looks numeric
		if ( extra === "" || extra ) {
			num = parseFloat( val );
			return extra === true || isFinite( num ) ? num || 0 : val;
		}

		return val;
	}
} );

jQuery.each( [ "height", "width" ], function( _i, dimension ) {
	jQuery.cssHooks[ dimension ] = {
		get: function( elem, computed, extra ) {
			if ( computed ) {

				// Certain elements can have dimension info if we invisibly show them
				// but it must have a current display style that would benefit
				return rdisplayswap.test( jQuery.css( elem, "display" ) ) &&

					// Support: Safari 8+
					// Table columns in Safari have non-zero offsetWidth & zero
					// getBoundingClientRect().width unless display is changed.
					// Support: IE <=11 only
					// Running getBoundingClientRect on a disconnected node
					// in IE throws an error.
					( !elem.getClientRects().length || !elem.getBoundingClientRect().width ) ?
					swap( elem, cssShow, function() {
						return getWidthOrHeight( elem, dimension, extra );
					} ) :
					getWidthOrHeight( elem, dimension, extra );
			}
		},

		set: function( elem, value, extra ) {
			var matches,
				styles = getStyles( elem ),

				// Only read styles.position if the test has a chance to fail
				// to avoid forcing a reflow.
				scrollboxSizeBuggy = !support.scrollboxSize() &&
					styles.position === "absolute",

				// To avoid forcing a reflow, only fetch boxSizing if we need it (gh-3991)
				boxSizingNeeded = scrollboxSizeBuggy || extra,
				isBorderBox = boxSizingNeeded &&
					jQuery.css( elem, "boxSizing", false, styles ) === "border-box",
				subtract = extra ?
					boxModelAdjustment(
						elem,
						dimension,
						extra,
						isBorderBox,
						styles
					) :
					0;

			// Account for unreliable border-box dimensions by comparing offset* to computed and
			// faking a content-box to get border and padding (gh-3699)
			if ( isBorderBox && scrollboxSizeBuggy ) {
				subtract -= Math.ceil(
					elem[ "offset" + dimension[ 0 ].toUpperCase() + dimension.slice( 1 ) ] -
					parseFloat( styles[ dimension ] ) -
					boxModelAdjustment( elem, dimension, "border", false, styles ) -
					0.5
				);
			}

			// Convert to pixels if value adjustment is needed
			if ( subtract && ( matches = rcssNum.exec( value ) ) &&
				( matches[ 3 ] || "px" ) !== "px" ) {

				elem.style[ dimension ] = value;
				value = jQuery.css( elem, dimension );
			}

			return setPositiveNumber( elem, value, subtract );
		}
	};
} );

jQuery.cssHooks.marginLeft = addGetHookIf( support.reliableMarginLeft,
	function( elem, computed ) {
		if ( computed ) {
			return ( parseFloat( curCSS( elem, "marginLeft" ) ) ||
				elem.getBoundingClientRect().left -
					swap( elem, { marginLeft: 0 }, function() {
						return elem.getBoundingClientRect().left;
					} )
			) + "px";
		}
	}
);

// These hooks are used by animate to expand properties
jQuery.each( {
	margin: "",
	padding: "",
	border: "Width"
}, function( prefix, suffix ) {
	jQuery.cssHooks[ prefix + suffix ] = {
		expand: function( value ) {
			var i = 0,
				expanded = {},

				// Assumes a single number if not a string
				parts = typeof value === "string" ? value.split( " " ) : [ value ];

			for ( ; i < 4; i++ ) {
				expanded[ prefix + cssExpand[ i ] + suffix ] =
					parts[ i ] || parts[ i - 2 ] || parts[ 0 ];
			}

			return expanded;
		}
	};

	if ( prefix !== "margin" ) {
		jQuery.cssHooks[ prefix + suffix ].set = setPositiveNumber;
	}
} );

jQuery.fn.extend( {
	css: function( name, value ) {
		return access( this, function( elem, name, value ) {
			var styles, len,
				map = {},
				i = 0;

			if ( Array.isArray( name ) ) {
				styles = getStyles( elem );
				len = name.length;

				for ( ; i < len; i++ ) {
					map[ name[ i ] ] = jQuery.css( elem, name[ i ], false, styles );
				}

				return map;
			}

			return value !== undefined ?
				jQuery.style( elem, name, value ) :
				jQuery.css( elem, name );
		}, name, value, arguments.length > 1 );
	}
} );


function Tween( elem, options, prop, end, easing ) {
	return new Tween.prototype.init( elem, options, prop, end, easing );
}
jQuery.Tween = Tween;

Tween.prototype = {
	constructor: Tween,
	init: function( elem, options, prop, end, easing, unit ) {
		this.elem = elem;
		this.prop = prop;
		this.easing = easing || jQuery.easing._default;
		this.options = options;
		this.start = this.now = this.cur();
		this.end = end;
		this.unit = unit || ( jQuery.cssNumber[ prop ] ? "" : "px" );
	},
	cur: function() {
		var hooks = Tween.propHooks[ this.prop ];

		return hooks && hooks.get ?
			hooks.get( this ) :
			Tween.propHooks._default.get( this );
	},
	run: function( percent ) {
		var eased,
			hooks = Tween.propHooks[ this.prop ];

		if ( this.options.duration ) {
			this.pos = eased = jQuery.easing[ this.easing ](
				percent, this.options.duration * percent, 0, 1, this.options.duration
			);
		} else {
			this.pos = eased = percent;
		}
		this.now = ( this.end - this.start ) * eased + this.start;

		if ( this.options.step ) {
			this.options.step.call( this.elem, this.now, this );
		}

		if ( hooks && hooks.set ) {
			hooks.set( this );
		} else {
			Tween.propHooks._default.set( this );
		}
		return this;
	}
};

Tween.prototype.init.prototype = Tween.prototype;

Tween.propHooks = {
	_default: {
		get: function( tween ) {
			var result;

			// Use a property on the element directly when it is not a DOM element,
			// or when there is no matching style property that exists.
			if ( tween.elem.nodeType !== 1 ||
				tween.elem[ tween.prop ] != null && tween.elem.style[ tween.prop ] == null ) {
				return tween.elem[ tween.prop ];
			}

			// Passing an empty string as a 3rd parameter to .css will automatically
			// attempt a parseFloat and fallback to a string if the parse fails.
			// Simple values such as "10px" are parsed to Float;
			// complex values such as "rotate(1rad)" are returned as-is.
			result = jQuery.css( tween.elem, tween.prop, "" );

			// Empty strings, null, undefined and "auto" are converted to 0.
			return !result || result === "auto" ? 0 : result;
		},
		set: function( tween ) {

			// Use step hook for back compat.
			// Use cssHook if its there.
			// Use .style if available and use plain properties where available.
			if ( jQuery.fx.step[ tween.prop ] ) {
				jQuery.fx.step[ tween.prop ]( tween );
			} else if ( tween.elem.nodeType === 1 && (
				jQuery.cssHooks[ tween.prop ] ||
					tween.elem.style[ finalPropName( tween.prop ) ] != null ) ) {
				jQuery.style( tween.elem, tween.prop, tween.now + tween.unit );
			} else {
				tween.elem[ tween.prop ] = tween.now;
			}
		}
	}
};

// Support: IE <=9 only
// Panic based approach to setting things on disconnected nodes
Tween.propHooks.scrollTop = Tween.propHooks.scrollLeft = {
	set: function( tween ) {
		if ( tween.elem.nodeType && tween.elem.parentNode ) {
			tween.elem[ tween.prop ] = tween.now;
		}
	}
};

jQuery.easing = {
	linear: function( p ) {
		return p;
	},
	swing: function( p ) {
		return 0.5 - Math.cos( p * Math.PI ) / 2;
	},
	_default: "swing"
};

jQuery.fx = Tween.prototype.init;

// Back compat <1.8 extension point
jQuery.fx.step = {};




var
	fxNow, inProgress,
	rfxtypes = /^(?:toggle|show|hide)$/,
	rrun = /queueHooks$/;

function schedule() {
	if ( inProgress ) {
		if ( document.hidden === false && window.requestAnimationFrame ) {
			window.requestAnimationFrame( schedule );
		} else {
			window.setTimeout( schedule, jQuery.fx.interval );
		}

		jQuery.fx.tick();
	}
}

// Animations created synchronously will run synchronously
function createFxNow() {
	window.setTimeout( function() {
		fxNow = undefined;
	} );
	return ( fxNow = Date.now() );
}

// Generate parameters to create a standard animation
function genFx( type, includeWidth ) {
	var which,
		i = 0,
		attrs = { height: type };

	// If we include width, step value is 1 to do all cssExpand values,
	// otherwise step value is 2 to skip over Left and Right
	includeWidth = includeWidth ? 1 : 0;
	for ( ; i < 4; i += 2 - includeWidth ) {
		which = cssExpand[ i ];
		attrs[ "margin" + which ] = attrs[ "padding" + which ] = type;
	}

	if ( includeWidth ) {
		attrs.opacity = attrs.width = type;
	}

	return attrs;
}

function createTween( value, prop, animation ) {
	var tween,
		collection = ( Animation.tweeners[ prop ] || [] ).concat( Animation.tweeners[ "*" ] ),
		index = 0,
		length = collection.length;
	for ( ; index < length; index++ ) {
		if ( ( tween = collection[ index ].call( animation, prop, value ) ) ) {

			// We're done with this property
			return tween;
		}
	}
}

function defaultPrefilter( elem, props, opts ) {
	var prop, value, toggle, hooks, oldfire, propTween, restoreDisplay, display,
		isBox = "width" in props || "height" in props,
		anim = this,
		orig = {},
		style = elem.style,
		hidden = elem.nodeType && isHiddenWithinTree( elem ),
		dataShow = dataPriv.get( elem, "fxshow" );

	// Queue-skipping animations hijack the fx hooks
	if ( !opts.queue ) {
		hooks = jQuery._queueHooks( elem, "fx" );
		if ( hooks.unqueued == null ) {
			hooks.unqueued = 0;
			oldfire = hooks.empty.fire;
			hooks.empty.fire = function() {
				if ( !hooks.unqueued ) {
					oldfire();
				}
			};
		}
		hooks.unqueued++;

		anim.always( function() {

			// Ensure the complete handler is called before this completes
			anim.always( function() {
				hooks.unqueued--;
				if ( !jQuery.queue( elem, "fx" ).length ) {
					hooks.empty.fire();
				}
			} );
		} );
	}

	// Detect show/hide animations
	for ( prop in props ) {
		value = props[ prop ];
		if ( rfxtypes.test( value ) ) {
			delete props[ prop ];
			toggle = toggle || value === "toggle";
			if ( value === ( hidden ? "hide" : "show" ) ) {

				// Pretend to be hidden if this is a "show" and
				// there is still data from a stopped show/hide
				if ( value === "show" && dataShow && dataShow[ prop ] !== undefined ) {
					hidden = true;

				// Ignore all other no-op show/hide data
				} else {
					continue;
				}
			}
			orig[ prop ] = dataShow && dataShow[ prop ] || jQuery.style( elem, prop );
		}
	}

	// Bail out if this is a no-op like .hide().hide()
	propTween = !jQuery.isEmptyObject( props );
	if ( !propTween && jQuery.isEmptyObject( orig ) ) {
		return;
	}

	// Restrict "overflow" and "display" styles during box animations
	if ( isBox && elem.nodeType === 1 ) {

		// Support: IE <=9 - 11, Edge 12 - 15
		// Record all 3 overflow attributes because IE does not infer the shorthand
		// from identically-valued overflowX and overflowY and Edge just mirrors
		// the overflowX value there.
		opts.overflow = [ style.overflow, style.overflowX, style.overflowY ];

		// Identify a display type, preferring old show/hide data over the CSS cascade
		restoreDisplay = dataShow && dataShow.display;
		if ( restoreDisplay == null ) {
			restoreDisplay = dataPriv.get( elem, "display" );
		}
		display = jQuery.css( elem, "display" );
		if ( display === "none" ) {
			if ( restoreDisplay ) {
				display = restoreDisplay;
			} else {

				// Get nonempty value(s) by temporarily forcing visibility
				showHide( [ elem ], true );
				restoreDisplay = elem.style.display || restoreDisplay;
				display = jQuery.css( elem, "display" );
				showHide( [ elem ] );
			}
		}

		// Animate inline elements as inline-block
		if ( display === "inline" || display === "inline-block" && restoreDisplay != null ) {
			if ( jQuery.css( elem, "float" ) === "none" ) {

				// Restore the original display value at the end of pure show/hide animations
				if ( !propTween ) {
					anim.done( function() {
						style.display = restoreDisplay;
					} );
					if ( restoreDisplay == null ) {
						display = style.display;
						restoreDisplay = display === "none" ? "" : display;
					}
				}
				style.display = "inline-block";
			}
		}
	}

	if ( opts.overflow ) {
		style.overflow = "hidden";
		anim.always( function() {
			style.overflow = opts.overflow[ 0 ];
			style.overflowX = opts.overflow[ 1 ];
			style.overflowY = opts.overflow[ 2 ];
		} );
	}

	// Implement show/hide animations
	propTween = false;
	for ( prop in orig ) {

		// General show/hide setup for this element animation
		if ( !propTween ) {
			if ( dataShow ) {
				if ( "hidden" in dataShow ) {
					hidden = dataShow.hidden;
				}
			} else {
				dataShow = dataPriv.access( elem, "fxshow", { display: restoreDisplay } );
			}

			// Store hidden/visible for toggle so `.stop().toggle()` "reverses"
			if ( toggle ) {
				dataShow.hidden = !hidden;
			}

			// Show elements before animating them
			if ( hidden ) {
				showHide( [ elem ], true );
			}

			/* eslint-disable no-loop-func */

			anim.done( function() {

				/* eslint-enable no-loop-func */

				// The final step of a "hide" animation is actually hiding the element
				if ( !hidden ) {
					showHide( [ elem ] );
				}
				dataPriv.remove( elem, "fxshow" );
				for ( prop in orig ) {
					jQuery.style( elem, prop, orig[ prop ] );
				}
			} );
		}

		// Per-property setup
		propTween = createTween( hidden ? dataShow[ prop ] : 0, prop, anim );
		if ( !( prop in dataShow ) ) {
			dataShow[ prop ] = propTween.start;
			if ( hidden ) {
				propTween.end = propTween.start;
				propTween.start = 0;
			}
		}
	}
}

function propFilter( props, specialEasing ) {
	var index, name, easing, value, hooks;

	// camelCase, specialEasing and expand cssHook pass
	for ( index in props ) {
		name = camelCase( index );
		easing = specialEasing[ name ];
		value = props[ index ];
		if ( Array.isArray( value ) ) {
			easing = value[ 1 ];
			value = props[ index ] = value[ 0 ];
		}

		if ( index !== name ) {
			props[ name ] = value;
			delete props[ index ];
		}

		hooks = jQuery.cssHooks[ name ];
		if ( hooks && "expand" in hooks ) {
			value = hooks.expand( value );
			delete props[ name ];

			// Not quite $.extend, this won't overwrite existing keys.
			// Reusing 'index' because we have the correct "name"
			for ( index in value ) {
				if ( !( index in props ) ) {
					props[ index ] = value[ index ];
					specialEasing[ index ] = easing;
				}
			}
		} else {
			specialEasing[ name ] = easing;
		}
	}
}

function Animation( elem, properties, options ) {
	var result,
		stopped,
		index = 0,
		length = Animation.prefilters.length,
		deferred = jQuery.Deferred().always( function() {

			// Don't match elem in the :animated selector
			delete tick.elem;
		} ),
		tick = function() {
			if ( stopped ) {
				return false;
			}
			var currentTime = fxNow || createFxNow(),
				remaining = Math.max( 0, animation.startTime + animation.duration - currentTime ),

				// Support: Android 2.3 only
				// Archaic crash bug won't allow us to use `1 - ( 0.5 || 0 )` (trac-12497)
				temp = remaining / animation.duration || 0,
				percent = 1 - temp,
				index = 0,
				length = animation.tweens.length;

			for ( ; index < length; index++ ) {
				animation.tweens[ index ].run( percent );
			}

			deferred.notifyWith( elem, [ animation, percent, remaining ] );

			// If there's more to do, yield
			if ( percent < 1 && length ) {
				return remaining;
			}

			// If this was an empty animation, synthesize a final progress notification
			if ( !length ) {
				deferred.notifyWith( elem, [ animation, 1, 0 ] );
			}

			// Resolve the animation and report its conclusion
			deferred.resolveWith( elem, [ animation ] );
			return false;
		},
		animation = deferred.promise( {
			elem: elem,
			props: jQuery.extend( {}, properties ),
			opts: jQuery.extend( true, {
				specialEasing: {},
				easing: jQuery.easing._default
			}, options ),
			originalProperties: properties,
			originalOptions: options,
			startTime: fxNow || createFxNow(),
			duration: options.duration,
			tweens: [],
			createTween: function( prop, end ) {
				var tween = jQuery.Tween( elem, animation.opts, prop, end,
					animation.opts.specialEasing[ prop ] || animation.opts.easing );
				animation.tweens.push( tween );
				return tween;
			},
			stop: function( gotoEnd ) {
				var index = 0,

					// If we are going to the end, we want to run all the tweens
					// otherwise we skip this part
					length = gotoEnd ? animation.tweens.length : 0;
				if ( stopped ) {
					return this;
				}
				stopped = true;
				for ( ; index < length; index++ ) {
					animation.tweens[ index ].run( 1 );
				}

				// Resolve when we played the last frame; otherwise, reject
				if ( gotoEnd ) {
					deferred.notifyWith( elem, [ animation, 1, 0 ] );
					deferred.resolveWith( elem, [ animation, gotoEnd ] );
				} else {
					deferred.rejectWith( elem, [ animation, gotoEnd ] );
				}
				return this;
			}
		} ),
		props = animation.props;

	propFilter( props, animation.opts.specialEasing );

	for ( ; index < length; index++ ) {
		result = Animation.prefilters[ index ].call( animation, elem, props, animation.opts );
		if ( result ) {
			if ( isFunction( result.stop ) ) {
				jQuery._queueHooks( animation.elem, animation.opts.queue ).stop =
					result.stop.bind( result );
			}
			return result;
		}
	}

	jQuery.map( props, createTween, animation );

	if ( isFunction( animation.opts.start ) ) {
		animation.opts.start.call( elem, animation );
	}

	// Attach callbacks from options
	animation
		.progress( animation.opts.progress )
		.done( animation.opts.done, animation.opts.complete )
		.fail( animation.opts.fail )
		.always( animation.opts.always );

	jQuery.fx.timer(
		jQuery.extend( tick, {
			elem: elem,
			anim: animation,
			queue: animation.opts.queue
		} )
	);

	return animation;
}

jQuery.Animation = jQuery.extend( Animation, {

	tweeners: {
		"*": [ function( prop, value ) {
			var tween = this.createTween( prop, value );
			adjustCSS( tween.elem, prop, rcssNum.exec( value ), tween );
			return tween;
		} ]
	},

	tweener: function( props, callback ) {
		if ( isFunction( props ) ) {
			callback = props;
			props = [ "*" ];
		} else {
			props = props.match( rnothtmlwhite );
		}

		var prop,
			index = 0,
			length = props.length;

		for ( ; index < length; index++ ) {
			prop = props[ index ];
			Animation.tweeners[ prop ] = Animation.tweeners[ prop ] || [];
			Animation.tweeners[ prop ].unshift( callback );
		}
	},

	prefilters: [ defaultPrefilter ],

	prefilter: function( callback, prepend ) {
		if ( prepend ) {
			Animation.prefilters.unshift( callback );
		} else {
			Animation.prefilters.push( callback );
		}
	}
} );

jQuery.speed = function( speed, easing, fn ) {
	var opt = speed && typeof speed === "object" ? jQuery.extend( {}, speed ) : {
		complete: fn || !fn && easing ||
			isFunction( speed ) && speed,
		duration: speed,
		easing: fn && easing || easing && !isFunction( easing ) && easing
	};

	// Go to the end state if fx are off
	if ( jQuery.fx.off ) {
		opt.duration = 0;

	} else {
		if ( typeof opt.duration !== "number" ) {
			if ( opt.duration in jQuery.fx.speeds ) {
				opt.duration = jQuery.fx.speeds[ opt.duration ];

			} else {
				opt.duration = jQuery.fx.speeds._default;
			}
		}
	}

	// Normalize opt.queue - true/undefined/null -> "fx"
	if ( opt.queue == null || opt.queue === true ) {
		opt.queue = "fx";
	}

	// Queueing
	opt.old = opt.complete;

	opt.complete = function() {
		if ( isFunction( opt.old ) ) {
			opt.old.call( this );
		}

		if ( opt.queue ) {
			jQuery.dequeue( this, opt.queue );
		}
	};

	return opt;
};

jQuery.fn.extend( {
	fadeTo: function( speed, to, easing, callback ) {

		// Show any hidden elements after setting opacity to 0
		return this.filter( isHiddenWithinTree ).css( "opacity", 0 ).show()

			// Animate to the value specified
			.end().animate( { opacity: to }, speed, easing, callback );
	},
	animate: function( prop, speed, easing, callback ) {
		var empty = jQuery.isEmptyObject( prop ),
			optall = jQuery.speed( speed, easing, callback ),
			doAnimation = function() {

				// Operate on a copy of prop so per-property easing won't be lost
				var anim = Animation( this, jQuery.extend( {}, prop ), optall );

				// Empty animations, or finishing resolves immediately
				if ( empty || dataPriv.get( this, "finish" ) ) {
					anim.stop( true );
				}
			};

		doAnimation.finish = doAnimation;

		return empty || optall.queue === false ?
			this.each( doAnimation ) :
			this.queue( optall.queue, doAnimation );
	},
	stop: function( type, clearQueue, gotoEnd ) {
		var stopQueue = function( hooks ) {
			var stop = hooks.stop;
			delete hooks.stop;
			stop( gotoEnd );
		};

		if ( typeof type !== "string" ) {
			gotoEnd = clearQueue;
			clearQueue = type;
			type = undefined;
		}
		if ( clearQueue ) {
			this.queue( type || "fx", [] );
		}

		return this.each( function() {
			var dequeue = true,
				index = type != null && type + "queueHooks",
				timers = jQuery.timers,
				data = dataPriv.get( this );

			if ( index ) {
				if ( data[ index ] && data[ index ].stop ) {
					stopQueue( data[ index ] );
				}
			} else {
				for ( index in data ) {
					if ( data[ index ] && data[ index ].stop && rrun.test( index ) ) {
						stopQueue( data[ index ] );
					}
				}
			}

			for ( index = timers.length; index--; ) {
				if ( timers[ index ].elem === this &&
					( type == null || timers[ index ].queue === type ) ) {

					timers[ index ].anim.stop( gotoEnd );
					dequeue = false;
					timers.splice( index, 1 );
				}
			}

			// Start the next in the queue if the last step wasn't forced.
			// Timers currently will call their complete callbacks, which
			// will dequeue but only if they were gotoEnd.
			if ( dequeue || !gotoEnd ) {
				jQuery.dequeue( this, type );
			}
		} );
	},
	finish: function( type ) {
		if ( type !== false ) {
			type = type || "fx";
		}
		return this.each( function() {
			var index,
				data = dataPriv.get( this ),
				queue = data[ type + "queue" ],
				hooks = data[ type + "queueHooks" ],
				timers = jQuery.timers,
				length = queue ? queue.length : 0;

			// Enable finishing flag on private data
			data.finish = true;

			// Empty the queue first
			jQuery.queue( this, type, [] );

			if ( hooks && hooks.stop ) {
				hooks.stop.call( this, true );
			}

			// Look for any active animations, and finish them
			for ( index = timers.length; index--; ) {
				if ( timers[ index ].elem === this && timers[ index ].queue === type ) {
					timers[ index ].anim.stop( true );
					timers.splice( index, 1 );
				}
			}

			// Look for any animations in the old queue and finish them
			for ( index = 0; index < length; index++ ) {
				if ( queue[ index ] && queue[ index ].finish ) {
					queue[ index ].finish.call( this );
				}
			}

			// Turn off finishing flag
			delete data.finish;
		} );
	}
} );

jQuery.each( [ "toggle", "show", "hide" ], function( _i, name ) {
	var cssFn = jQuery.fn[ name ];
	jQuery.fn[ name ] = function( speed, easing, callback ) {
		return speed == null || typeof speed === "boolean" ?
			cssFn.apply( this, arguments ) :
			this.animate( genFx( name, true ), speed, easing, callback );
	};
} );

// Generate shortcuts for custom animations
jQuery.each( {
	slideDown: genFx( "show" ),
	slideUp: genFx( "hide" ),
	slideToggle: genFx( "toggle" ),
	fadeIn: { opacity: "show" },
	fadeOut: { opacity: "hide" },
	fadeToggle: { opacity: "toggle" }
}, function( name, props ) {
	jQuery.fn[ name ] = function( speed, easing, callback ) {
		return this.animate( props, speed, easing, callback );
	};
} );

jQuery.timers = [];
jQuery.fx.tick = function() {
	var timer,
		i = 0,
		timers = jQuery.timers;

	fxNow = Date.now();

	for ( ; i < timers.length; i++ ) {
		timer = timers[ i ];

		// Run the timer and safely remove it when done (allowing for external removal)
		if ( !timer() && timers[ i ] === timer ) {
			timers.splice( i--, 1 );
		}
	}

	if ( !timers.length ) {
		jQuery.fx.stop();
	}
	fxNow = undefined;
};

jQuery.fx.timer = function( timer ) {
	jQuery.timers.push( timer );
	jQuery.fx.start();
};

jQuery.fx.interval = 13;
jQuery.fx.start = function() {
	if ( inProgress ) {
		return;
	}

	inProgress = true;
	schedule();
};

jQuery.fx.stop = function() {
	inProgress = null;
};

jQuery.fx.speeds = {
	slow: 600,
	fast: 200,

	// Default speed
	_default: 400
};


// Based off of the plugin by Clint Helfers, with permission.
jQuery.fn.delay = function( time, type ) {
	time = jQuery.fx ? jQuery.fx.speeds[ time ] || time : time;
	type = type || "fx";

	return this.queue( type, function( next, hooks ) {
		var timeout = window.setTimeout( next, time );
		hooks.stop = function() {
			window.clearTimeout( timeout );
		};
	} );
};


( function() {
	var input = document.createElement( "input" ),
		select = document.createElement( "select" ),
		opt = select.appendChild( document.createElement( "option" ) );

	input.type = "checkbox";

	// Support: Android <=4.3 only
	// Default value for a checkbox should be "on"
	support.checkOn = input.value !== "";

	// Support: IE <=11 only
	// Must access selectedIndex to make default options select
	support.optSelected = opt.selected;

	// Support: IE <=11 only
	// An input loses its value after becoming a radio
	input = document.createElement( "input" );
	input.value = "t";
	input.type = "radio";
	support.radioValue = input.value === "t";
} )();


var boolHook,
	attrHandle = jQuery.expr.attrHandle;

jQuery.fn.extend( {
	attr: function( name, value ) {
		return access( this, jQuery.attr, name, value, arguments.length > 1 );
	},

	removeAttr: function( name ) {
		return this.each( function() {
			jQuery.removeAttr( this, name );
		} );
	}
} );

jQuery.extend( {
	attr: function( elem, name, value ) {
		var ret, hooks,
			nType = elem.nodeType;

		// Don't get/set attributes on text, comment and attribute nodes
		if ( nType === 3 || nType === 8 || nType === 2 ) {
			return;
		}

		// Fallback to prop when attributes are not supported
		if ( typeof elem.getAttribute === "undefined" ) {
			return jQuery.prop( elem, name, value );
		}

		// Attribute hooks are determined by the lowercase version
		// Grab necessary hook if one is defined
		if ( nType !== 1 || !jQuery.isXMLDoc( elem ) ) {
			hooks = jQuery.attrHooks[ name.toLowerCase() ] ||
				( jQuery.expr.match.bool.test( name ) ? boolHook : undefined );
		}

		if ( value !== undefined ) {
			if ( value === null ) {
				jQuery.removeAttr( elem, name );
				return;
			}

			if ( hooks && "set" in hooks &&
				( ret = hooks.set( elem, value, name ) ) !== undefined ) {
				return ret;
			}

			elem.setAttribute( name, value + "" );
			return value;
		}

		if ( hooks && "get" in hooks && ( ret = hooks.get( elem, name ) ) !== null ) {
			return ret;
		}

		ret = jQuery.find.attr( elem, name );

		// Non-existent attributes return null, we normalize to undefined
		return ret == null ? undefined : ret;
	},

	attrHooks: {
		type: {
			set: function( elem, value ) {
				if ( !support.radioValue && value === "radio" &&
					nodeName( elem, "input" ) ) {
					var val = elem.value;
					elem.setAttribute( "type", value );
					if ( val ) {
						elem.value = val;
					}
					return value;
				}
			}
		}
	},

	removeAttr: function( elem, value ) {
		var name,
			i = 0,

			// Attribute names can contain non-HTML whitespace characters
			// https://html.spec.whatwg.org/multipage/syntax.html#attributes-2
			attrNames = value && value.match( rnothtmlwhite );

		if ( attrNames && elem.nodeType === 1 ) {
			while ( ( name = attrNames[ i++ ] ) ) {
				elem.removeAttribute( name );
			}
		}
	}
} );

// Hooks for boolean attributes
boolHook = {
	set: function( elem, value, name ) {
		if ( value === false ) {

			// Remove boolean attributes when set to false
			jQuery.removeAttr( elem, name );
		} else {
			elem.setAttribute( name, name );
		}
		return name;
	}
};

jQuery.each( jQuery.expr.match.bool.source.match( /\w+/g ), function( _i, name ) {
	var getter = attrHandle[ name ] || jQuery.find.attr;

	attrHandle[ name ] = function( elem, name, isXML ) {
		var ret, handle,
			lowercaseName = name.toLowerCase();

		if ( !isXML ) {

			// Avoid an infinite loop by temporarily removing this function from the getter
			handle = attrHandle[ lowercaseName ];
			attrHandle[ lowercaseName ] = ret;
			ret = getter( elem, name, isXML ) != null ?
				lowercaseName :
				null;
			attrHandle[ lowercaseName ] = handle;
		}
		return ret;
	};
} );




var rfocusable = /^(?:input|select|textarea|button)$/i,
	rclickable = /^(?:a|area)$/i;

jQuery.fn.extend( {
	prop: function( name, value ) {
		return access( this, jQuery.prop, name, value, arguments.length > 1 );
	},

	removeProp: function( name ) {
		return this.each( function() {
			delete this[ jQuery.propFix[ name ] || name ];
		} );
	}
} );

jQuery.extend( {
	prop: function( elem, name, value ) {
		var ret, hooks,
			nType = elem.nodeType;

		// Don't get/set properties on text, comment and attribute nodes
		if ( nType === 3 || nType === 8 || nType === 2 ) {
			return;
		}

		if ( nType !== 1 || !jQuery.isXMLDoc( elem ) ) {

			// Fix name and attach hooks
			name = jQuery.propFix[ name ] || name;
			hooks = jQuery.propHooks[ name ];
		}

		if ( value !== undefined ) {
			if ( hooks && "set" in hooks &&
				( ret = hooks.set( elem, value, name ) ) !== undefined ) {
				return ret;
			}

			return ( elem[ name ] = value );
		}

		if ( hooks && "get" in hooks && ( ret = hooks.get( elem, name ) ) !== null ) {
			return ret;
		}

		return elem[ name ];
	},

	propHooks: {
		tabIndex: {
			get: function( elem ) {

				// Support: IE <=9 - 11 only
				// elem.tabIndex doesn't always return the
				// correct value when it hasn't been explicitly set
				// Use proper attribute retrieval (trac-12072)
				var tabindex = jQuery.find.attr( elem, "tabindex" );

				if ( tabindex ) {
					return parseInt( tabindex, 10 );
				}

				if (
					rfocusable.test( elem.nodeName ) ||
					rclickable.test( elem.nodeName ) &&
					elem.href
				) {
					return 0;
				}

				return -1;
			}
		}
	},

	propFix: {
		"for": "htmlFor",
		"class": "className"
	}
} );

// Support: IE <=11 only
// Accessing the selectedIndex property
// forces the browser to respect setting selected
// on the option
// The getter ensures a default option is selected
// when in an optgroup
// eslint rule "no-unused-expressions" is disabled for this code
// since it considers such accessions noop
if ( !support.optSelected ) {
	jQuery.propHooks.selected = {
		get: function( elem ) {

			/* eslint no-unused-expressions: "off" */

			var parent = elem.parentNode;
			if ( parent && parent.parentNode ) {
				parent.parentNode.selectedIndex;
			}
			return null;
		},
		set: function( elem ) {

			/* eslint no-unused-expressions: "off" */

			var parent = elem.parentNode;
			if ( parent ) {
				parent.selectedIndex;

				if ( parent.parentNode ) {
					parent.parentNode.selectedIndex;
				}
			}
		}
	};
}

jQuery.each( [
	"tabIndex",
	"readOnly",
	"maxLength",
	"cellSpacing",
	"cellPadding",
	"rowSpan",
	"colSpan",
	"useMap",
	"frameBorder",
	"contentEditable"
], function() {
	jQuery.propFix[ this.toLowerCase() ] = this;
} );




	// Strip and collapse whitespace according to HTML spec
	// https://infra.spec.whatwg.org/#strip-and-collapse-ascii-whitespace
	function stripAndCollapse( value ) {
		var tokens = value.match( rnothtmlwhite ) || [];
		return tokens.join( " " );
	}


function getClass( elem ) {
	return elem.getAttribute && elem.getAttribute( "class" ) || "";
}

function classesToArray( value ) {
	if ( Array.isArray( value ) ) {
		return value;
	}
	if ( typeof value === "string" ) {
		return value.match( rnothtmlwhite ) || [];
	}
	return [];
}

jQuery.fn.extend( {
	addClass: function( value ) {
		var classNames, cur, curValue, className, i, finalValue;

		if ( isFunction( value ) ) {
			return this.each( function( j ) {
				jQuery( this ).addClass( value.call( this, j, getClass( this ) ) );
			} );
		}

		classNames = classesToArray( value );

		if ( classNames.length ) {
			return this.each( function() {
				curValue = getClass( this );
				cur = this.nodeType === 1 && ( " " + stripAndCollapse( curValue ) + " " );

				if ( cur ) {
					for ( i = 0; i < classNames.length; i++ ) {
						className = classNames[ i ];
						if ( cur.indexOf( " " + className + " " ) < 0 ) {
							cur += className + " ";
						}
					}

					// Only assign if different to avoid unneeded rendering.
					finalValue = stripAndCollapse( cur );
					if ( curValue !== finalValue ) {
						this.setAttribute( "class", finalValue );
					}
				}
			} );
		}

		return this;
	},

	removeClass: function( value ) {
		var classNames, cur, curValue, className, i, finalValue;

		if ( isFunction( value ) ) {
			return this.each( function( j ) {
				jQuery( this ).removeClass( value.call( this, j, getClass( this ) ) );
			} );
		}

		if ( !arguments.length ) {
			return this.attr( "class", "" );
		}

		classNames = classesToArray( value );

		if ( classNames.length ) {
			return this.each( function() {
				curValue = getClass( this );

				// This expression is here for better compressibility (see addClass)
				cur = this.nodeType === 1 && ( " " + stripAndCollapse( curValue ) + " " );

				if ( cur ) {
					for ( i = 0; i < classNames.length; i++ ) {
						className = classNames[ i ];

						// Remove *all* instances
						while ( cur.indexOf( " " + className + " " ) > -1 ) {
							cur = cur.replace( " " + className + " ", " " );
						}
					}

					// Only assign if different to avoid unneeded rendering.
					finalValue = stripAndCollapse( cur );
					if ( curValue !== finalValue ) {
						this.setAttribute( "class", finalValue );
					}
				}
			} );
		}

		return this;
	},

	toggleClass: function( value, stateVal ) {
		var classNames, className, i, self,
			type = typeof value,
			isValidValue = type === "string" || Array.isArray( value );

		if ( isFunction( value ) ) {
			return this.each( function( i ) {
				jQuery( this ).toggleClass(
					value.call( this, i, getClass( this ), stateVal ),
					stateVal
				);
			} );
		}

		if ( typeof stateVal === "boolean" && isValidValue ) {
			return stateVal ? this.addClass( value ) : this.removeClass( value );
		}

		classNames = classesToArray( value );

		return this.each( function() {
			if ( isValidValue ) {

				// Toggle individual class names
				self = jQuery( this );

				for ( i = 0; i < classNames.length; i++ ) {
					className = classNames[ i ];

					// Check each className given, space separated list
					if ( self.hasClass( className ) ) {
						self.removeClass( className );
					} else {
						self.addClass( className );
					}
				}

			// Toggle whole class name
			} else if ( value === undefined || type === "boolean" ) {
				className = getClass( this );
				if ( className ) {

					// Store className if set
					dataPriv.set( this, "__className__", className );
				}

				// If the element has a class name or if we're passed `false`,
				// then remove the whole classname (if there was one, the above saved it).
				// Otherwise bring back whatever was previously saved (if anything),
				// falling back to the empty string if nothing was stored.
				if ( this.setAttribute ) {
					this.setAttribute( "class",
						className || value === false ?
							"" :
							dataPriv.get( this, "__className__" ) || ""
					);
				}
			}
		} );
	},

	hasClass: function( selector ) {
		var className, elem,
			i = 0;

		className = " " + selector + " ";
		while ( ( elem = this[ i++ ] ) ) {
			if ( elem.nodeType === 1 &&
				( " " + stripAndCollapse( getClass( elem ) ) + " " ).indexOf( className ) > -1 ) {
				return true;
			}
		}

		return false;
	}
} );




var rreturn = /\r/g;

jQuery.fn.extend( {
	val: function( value ) {
		var hooks, ret, valueIsFunction,
			elem = this[ 0 ];

		if ( !arguments.length ) {
			if ( elem ) {
				hooks = jQuery.valHooks[ elem.type ] ||
					jQuery.valHooks[ elem.nodeName.toLowerCase() ];

				if ( hooks &&
					"get" in hooks &&
					( ret = hooks.get( elem, "value" ) ) !== undefined
				) {
					return ret;
				}

				ret = elem.value;

				// Handle most common string cases
				if ( typeof ret === "string" ) {
					return ret.replace( rreturn, "" );
				}

				// Handle cases where value is null/undef or number
				return ret == null ? "" : ret;
			}

			return;
		}

		valueIsFunction = isFunction( value );

		return this.each( function( i ) {
			var val;

			if ( this.nodeType !== 1 ) {
				return;
			}

			if ( valueIsFunction ) {
				val = value.call( this, i, jQuery( this ).val() );
			} else {
				val = value;
			}

			// Treat null/undefined as ""; convert numbers to string
			if ( val == null ) {
				val = "";

			} else if ( typeof val === "number" ) {
				val += "";

			} else if ( Array.isArray( val ) ) {
				val = jQuery.map( val, function( value ) {
					return value == null ? "" : value + "";
				} );
			}

			hooks = jQuery.valHooks[ this.type ] || jQuery.valHooks[ this.nodeName.toLowerCase() ];

			// If set returns undefined, fall back to normal setting
			if ( !hooks || !( "set" in hooks ) || hooks.set( this, val, "value" ) === undefined ) {
				this.value = val;
			}
		} );
	}
} );

jQuery.extend( {
	valHooks: {
		option: {
			get: function( elem ) {

				var val = jQuery.find.attr( elem, "value" );
				return val != null ?
					val :

					// Support: IE <=10 - 11 only
					// option.text throws exceptions (trac-14686, trac-14858)
					// Strip and collapse whitespace
					// https://html.spec.whatwg.org/#strip-and-collapse-whitespace
					stripAndCollapse( jQuery.text( elem ) );
			}
		},
		select: {
			get: function( elem ) {
				var value, option, i,
					options = elem.options,
					index = elem.selectedIndex,
					one = elem.type === "select-one",
					values = one ? null : [],
					max = one ? index + 1 : options.length;

				if ( index < 0 ) {
					i = max;

				} else {
					i = one ? index : 0;
				}

				// Loop through all the selected options
				for ( ; i < max; i++ ) {
					option = options[ i ];

					// Support: IE <=9 only
					// IE8-9 doesn't update selected after form reset (trac-2551)
					if ( ( option.selected || i === index ) &&

							// Don't return options that are disabled or in a disabled optgroup
							!option.disabled &&
							( !option.parentNode.disabled ||
								!nodeName( option.parentNode, "optgroup" ) ) ) {

						// Get the specific value for the option
						value = jQuery( option ).val();

						// We don't need an array for one selects
						if ( one ) {
							return value;
						}

						// Multi-Selects return an array
						values.push( value );
					}
				}

				return values;
			},

			set: function( elem, value ) {
				var optionSet, option,
					options = elem.options,
					values = jQuery.makeArray( value ),
					i = options.length;

				while ( i-- ) {
					option = options[ i ];

					/* eslint-disable no-cond-assign */

					if ( option.selected =
						jQuery.inArray( jQuery.valHooks.option.get( option ), values ) > -1
					) {
						optionSet = true;
					}

					/* eslint-enable no-cond-assign */
				}

				// Force browsers to behave consistently when non-matching value is set
				if ( !optionSet ) {
					elem.selectedIndex = -1;
				}
				return values;
			}
		}
	}
} );

// Radios and checkboxes getter/setter
jQuery.each( [ "radio", "checkbox" ], function() {
	jQuery.valHooks[ this ] = {
		set: function( elem, value ) {
			if ( Array.isArray( value ) ) {
				return ( elem.checked = jQuery.inArray( jQuery( elem ).val(), value ) > -1 );
			}
		}
	};
	if ( !support.checkOn ) {
		jQuery.valHooks[ this ].get = function( elem ) {
			return elem.getAttribute( "value" ) === null ? "on" : elem.value;
		};
	}
} );




// Return jQuery for attributes-only inclusion
var location = window.location;

var nonce = { guid: Date.now() };

var rquery = ( /\?/ );



// Cross-browser xml parsing
jQuery.parseXML = function( data ) {
	var xml, parserErrorElem;
	if ( !data || typeof data !== "string" ) {
		return null;
	}

	// Support: IE 9 - 11 only
	// IE throws on parseFromString with invalid input.
	try {
		xml = ( new window.DOMParser() ).parseFromString( data, "text/xml" );
	} catch ( e ) {}

	parserErrorElem = xml && xml.getElementsByTagName( "parsererror" )[ 0 ];
	if ( !xml || parserErrorElem ) {
		jQuery.error( "Invalid XML: " + (
			parserErrorElem ?
				jQuery.map( parserErrorElem.childNodes, function( el ) {
					return el.textContent;
				} ).join( "\n" ) :
				data
		) );
	}
	return xml;
};


var rfocusMorph = /^(?:focusinfocus|focusoutblur)$/,
	stopPropagationCallback = function( e ) {
		e.stopPropagation();
	};

jQuery.extend( jQuery.event, {

	trigger: function( event, data, elem, onlyHandlers ) {

		var i, cur, tmp, bubbleType, ontype, handle, special, lastElement,
			eventPath = [ elem || document ],
			type = hasOwn.call( event, "type" ) ? event.type : event,
			namespaces = hasOwn.call( event, "namespace" ) ? event.namespace.split( "." ) : [];

		cur = lastElement = tmp = elem = elem || document;

		// Don't do events on text and comment nodes
		if ( elem.nodeType === 3 || elem.nodeType === 8 ) {
			return;
		}

		// focus/blur morphs to focusin/out; ensure we're not firing them right now
		if ( rfocusMorph.test( type + jQuery.event.triggered ) ) {
			return;
		}

		if ( type.indexOf( "." ) > -1 ) {

			// Namespaced trigger; create a regexp to match event type in handle()
			namespaces = type.split( "." );
			type = namespaces.shift();
			namespaces.sort();
		}
		ontype = type.indexOf( ":" ) < 0 && "on" + type;

		// Caller can pass in a jQuery.Event object, Object, or just an event type string
		event = event[ jQuery.expando ] ?
			event :
			new jQuery.Event( type, typeof event === "object" && event );

		// Trigger bitmask: & 1 for native handlers; & 2 for jQuery (always true)
		event.isTrigger = onlyHandlers ? 2 : 3;
		event.namespace = namespaces.join( "." );
		event.rnamespace = event.namespace ?
			new RegExp( "(^|\\.)" + namespaces.join( "\\.(?:.*\\.|)" ) + "(\\.|$)" ) :
			null;

		// Clean up the event in case it is being reused
		event.result = undefined;
		if ( !event.target ) {
			event.target = elem;
		}

		// Clone any incoming data and prepend the event, creating the handler arg list
		data = data == null ?
			[ event ] :
			jQuery.makeArray( data, [ event ] );

		// Allow special events to draw outside the lines
		special = jQuery.event.special[ type ] || {};
		if ( !onlyHandlers && special.trigger && special.trigger.apply( elem, data ) === false ) {
			return;
		}

		// Determine event propagation path in advance, per W3C events spec (trac-9951)
		// Bubble up to document, then to window; watch for a global ownerDocument var (trac-9724)
		if ( !onlyHandlers && !special.noBubble && !isWindow( elem ) ) {

			bubbleType = special.delegateType || type;
			if ( !rfocusMorph.test( bubbleType + type ) ) {
				cur = cur.parentNode;
			}
			for ( ; cur; cur = cur.parentNode ) {
				eventPath.push( cur );
				tmp = cur;
			}

			// Only add window if we got to document (e.g., not plain obj or detached DOM)
			if ( tmp === ( elem.ownerDocument || document ) ) {
				eventPath.push( tmp.defaultView || tmp.parentWindow || window );
			}
		}

		// Fire handlers on the event path
		i = 0;
		while ( ( cur = eventPath[ i++ ] ) && !event.isPropagationStopped() ) {
			lastElement = cur;
			event.type = i > 1 ?
				bubbleType :
				special.bindType || type;

			// jQuery handler
			handle = ( dataPriv.get( cur, "events" ) || Object.create( null ) )[ event.type ] &&
				dataPriv.get( cur, "handle" );
			if ( handle ) {
				handle.apply( cur, data );
			}

			// Native handler
			handle = ontype && cur[ ontype ];
			if ( handle && handle.apply && acceptData( cur ) ) {
				event.result = handle.apply( cur, data );
				if ( event.result === false ) {
					event.preventDefault();
				}
			}
		}
		event.type = type;

		// If nobody prevented the default action, do it now
		if ( !onlyHandlers && !event.isDefaultPrevented() ) {

			if ( ( !special._default ||
				special._default.apply( eventPath.pop(), data ) === false ) &&
				acceptData( elem ) ) {

				// Call a native DOM method on the target with the same name as the event.
				// Don't do default actions on window, that's where global variables be (trac-6170)
				if ( ontype && isFunction( elem[ type ] ) && !isWindow( elem ) ) {

					// Don't re-trigger an onFOO event when we call its FOO() method
					tmp = elem[ ontype ];

					if ( tmp ) {
						elem[ ontype ] = null;
					}

					// Prevent re-triggering of the same event, since we already bubbled it above
					jQuery.event.triggered = type;

					if ( event.isPropagationStopped() ) {
						lastElement.addEventListener( type, stopPropagationCallback );
					}

					elem[ type ]();

					if ( event.isPropagationStopped() ) {
						lastElement.removeEventListener( type, stopPropagationCallback );
					}

					jQuery.event.triggered = undefined;

					if ( tmp ) {
						elem[ ontype ] = tmp;
					}
				}
			}
		}

		return event.result;
	},

	// Piggyback on a donor event to simulate a different one
	// Used only for `focus(in | out)` events
	simulate: function( type, elem, event ) {
		var e = jQuery.extend(
			new jQuery.Event(),
			event,
			{
				type: type,
				isSimulated: true
			}
		);

		jQuery.event.trigger( e, null, elem );
	}

} );

jQuery.fn.extend( {

	trigger: function( type, data ) {
		return this.each( function() {
			jQuery.event.trigger( type, data, this );
		} );
	},
	triggerHandler: function( type, data ) {
		var elem = this[ 0 ];
		if ( elem ) {
			return jQuery.event.trigger( type, data, elem, true );
		}
	}
} );


var
	rbracket = /\[\]$/,
	rCRLF = /\r?\n/g,
	rsubmitterTypes = /^(?:submit|button|image|reset|file)$/i,
	rsubmittable = /^(?:input|select|textarea|keygen)/i;

function buildParams( prefix, obj, traditional, add ) {
	var name;

	if ( Array.isArray( obj ) ) {

		// Serialize array item.
		jQuery.each( obj, function( i, v ) {
			if ( traditional || rbracket.test( prefix ) ) {

				// Treat each array item as a scalar.
				add( prefix, v );

			} else {

				// Item is non-scalar (array or object), encode its numeric index.
				buildParams(
					prefix + "[" + ( typeof v === "object" && v != null ? i : "" ) + "]",
					v,
					traditional,
					add
				);
			}
		} );

	} else if ( !traditional && toType( obj ) === "object" ) {

		// Serialize object item.
		for ( name in obj ) {
			buildParams( prefix + "[" + name + "]", obj[ name ], traditional, add );
		}

	} else {

		// Serialize scalar item.
		add( prefix, obj );
	}
}

// Serialize an array of form elements or a set of
// key/values into a query string
jQuery.param = function( a, traditional ) {
	var prefix,
		s = [],
		add = function( key, valueOrFunction ) {

			// If value is a function, invoke it and use its return value
			var value = isFunction( valueOrFunction ) ?
				valueOrFunction() :
				valueOrFunction;

			s[ s.length ] = encodeURIComponent( key ) + "=" +
				encodeURIComponent( value == null ? "" : value );
		};

	if ( a == null ) {
		return "";
	}

	// If an array was passed in, assume that it is an array of form elements.
	if ( Array.isArray( a ) || ( a.jquery && !jQuery.isPlainObject( a ) ) ) {

		// Serialize the form elements
		jQuery.each( a, function() {
			add( this.name, this.value );
		} );

	} else {

		// If traditional, encode the "old" way (the way 1.3.2 or older
		// did it), otherwise encode params recursively.
		for ( prefix in a ) {
			buildParams( prefix, a[ prefix ], traditional, add );
		}
	}

	// Return the resulting serialization
	return s.join( "&" );
};

jQuery.fn.extend( {
	serialize: function() {
		return jQuery.param( this.serializeArray() );
	},
	serializeArray: function() {
		return this.map( function() {

			// Can add propHook for "elements" to filter or add form elements
			var elements = jQuery.prop( this, "elements" );
			return elements ? jQuery.makeArray( elements ) : this;
		} ).filter( function() {
			var type = this.type;

			// Use .is( ":disabled" ) so that fieldset[disabled] works
			return this.name && !jQuery( this ).is( ":disabled" ) &&
				rsubmittable.test( this.nodeName ) && !rsubmitterTypes.test( type ) &&
				( this.checked || !rcheckableType.test( type ) );
		} ).map( function( _i, elem ) {
			var val = jQuery( this ).val();

			if ( val == null ) {
				return null;
			}

			if ( Array.isArray( val ) ) {
				return jQuery.map( val, function( val ) {
					return { name: elem.name, value: val.replace( rCRLF, "\r\n" ) };
				} );
			}

			return { name: elem.name, value: val.replace( rCRLF, "\r\n" ) };
		} ).get();
	}
} );


var
	r20 = /%20/g,
	rhash = /#.*$/,
	rantiCache = /([?&])_=[^&]*/,
	rheaders = /^(.*?):[ \t]*([^\r\n]*)$/mg,

	// trac-7653, trac-8125, trac-8152: local protocol detection
	rlocalProtocol = /^(?:about|app|app-storage|.+-extension|file|res|widget):$/,
	rnoContent = /^(?:GET|HEAD)$/,
	rprotocol = /^\/\//,

	/* Prefilters
	 * 1) They are useful to introduce custom dataTypes (see ajax/jsonp.js for an example)
	 * 2) These are called:
	 *    - BEFORE asking for a transport
	 *    - AFTER param serialization (s.data is a string if s.processData is true)
	 * 3) key is the dataType
	 * 4) the catchall symbol "*" can be used
	 * 5) execution will start with transport dataType and THEN continue down to "*" if needed
	 */
	prefilters = {},

	/* Transports bindings
	 * 1) key is the dataType
	 * 2) the catchall symbol "*" can be used
	 * 3) selection will start with transport dataType and THEN go to "*" if needed
	 */
	transports = {},

	// Avoid comment-prolog char sequence (trac-10098); must appease lint and evade compression
	allTypes = "*/".concat( "*" ),

	// Anchor tag for parsing the document origin
	originAnchor = document.createElement( "a" );

originAnchor.href = location.href;

// Base "constructor" for jQuery.ajaxPrefilter and jQuery.ajaxTransport
function addToPrefiltersOrTransports( structure ) {

	// dataTypeExpression is optional and defaults to "*"
	return function( dataTypeExpression, func ) {

		if ( typeof dataTypeExpression !== "string" ) {
			func = dataTypeExpression;
			dataTypeExpression = "*";
		}

		var dataType,
			i = 0,
			dataTypes = dataTypeExpression.toLowerCase().match( rnothtmlwhite ) || [];

		if ( isFunction( func ) ) {

			// For each dataType in the dataTypeExpression
			while ( ( dataType = dataTypes[ i++ ] ) ) {

				// Prepend if requested
				if ( dataType[ 0 ] === "+" ) {
					dataType = dataType.slice( 1 ) || "*";
					( structure[ dataType ] = structure[ dataType ] || [] ).unshift( func );

				// Otherwise append
				} else {
					( structure[ dataType ] = structure[ dataType ] || [] ).push( func );
				}
			}
		}
	};
}

// Base inspection function for prefilters and transports
function inspectPrefiltersOrTransports( structure, options, originalOptions, jqXHR ) {

	var inspected = {},
		seekingTransport = ( structure === transports );

	function inspect( dataType ) {
		var selected;
		inspected[ dataType ] = true;
		jQuery.each( structure[ dataType ] || [], function( _, prefilterOrFactory ) {
			var dataTypeOrTransport = prefilterOrFactory( options, originalOptions, jqXHR );
			if ( typeof dataTypeOrTransport === "string" &&
				!seekingTransport && !inspected[ dataTypeOrTransport ] ) {

				options.dataTypes.unshift( dataTypeOrTransport );
				inspect( dataTypeOrTransport );
				return false;
			} else if ( seekingTransport ) {
				return !( selected = dataTypeOrTransport );
			}
		} );
		return selected;
	}

	return inspect( options.dataTypes[ 0 ] ) || !inspected[ "*" ] && inspect( "*" );
}

// A special extend for ajax options
// that takes "flat" options (not to be deep extended)
// Fixes trac-9887
function ajaxExtend( target, src ) {
	var key, deep,
		flatOptions = jQuery.ajaxSettings.flatOptions || {};

	for ( key in src ) {
		if ( src[ key ] !== undefined ) {
			( flatOptions[ key ] ? target : ( deep || ( deep = {} ) ) )[ key ] = src[ key ];
		}
	}
	if ( deep ) {
		jQuery.extend( true, target, deep );
	}

	return target;
}

/* Handles responses to an ajax request:
 * - finds the right dataType (mediates between content-type and expected dataType)
 * - returns the corresponding response
 */
function ajaxHandleResponses( s, jqXHR, responses ) {

	var ct, type, finalDataType, firstDataType,
		contents = s.contents,
		dataTypes = s.dataTypes;

	// Remove auto dataType and get content-type in the process
	while ( dataTypes[ 0 ] === "*" ) {
		dataTypes.shift();
		if ( ct === undefined ) {
			ct = s.mimeType || jqXHR.getResponseHeader( "Content-Type" );
		}
	}

	// Check if we're dealing with a known content-type
	if ( ct ) {
		for ( type in contents ) {
			if ( contents[ type ] && contents[ type ].test( ct ) ) {
				dataTypes.unshift( type );
				break;
			}
		}
	}

	// Check to see if we have a response for the expected dataType
	if ( dataTypes[ 0 ] in responses ) {
		finalDataType = dataTypes[ 0 ];
	} else {

		// Try convertible dataTypes
		for ( type in responses ) {
			if ( !dataTypes[ 0 ] || s.converters[ type + " " + dataTypes[ 0 ] ] ) {
				finalDataType = type;
				break;
			}
			if ( !firstDataType ) {
				firstDataType = type;
			}
		}

		// Or just use first one
		finalDataType = finalDataType || firstDataType;
	}

	// If we found a dataType
	// We add the dataType to the list if needed
	// and return the corresponding response
	if ( finalDataType ) {
		if ( finalDataType !== dataTypes[ 0 ] ) {
			dataTypes.unshift( finalDataType );
		}
		return responses[ finalDataType ];
	}
}

/* Chain conversions given the request and the original response
 * Also sets the responseXXX fields on the jqXHR instance
 */
function ajaxConvert( s, response, jqXHR, isSuccess ) {
	var conv2, current, conv, tmp, prev,
		converters = {},

		// Work with a copy of dataTypes in case we need to modify it for conversion
		dataTypes = s.dataTypes.slice();

	// Create converters map with lowercased keys
	if ( dataTypes[ 1 ] ) {
		for ( conv in s.converters ) {
			converters[ conv.toLowerCase() ] = s.converters[ conv ];
		}
	}

	current = dataTypes.shift();

	// Convert to each sequential dataType
	while ( current ) {

		if ( s.responseFields[ current ] ) {
			jqXHR[ s.responseFields[ current ] ] = response;
		}

		// Apply the dataFilter if provided
		if ( !prev && isSuccess && s.dataFilter ) {
			response = s.dataFilter( response, s.dataType );
		}

		prev = current;
		current = dataTypes.shift();

		if ( current ) {

			// There's only work to do if current dataType is non-auto
			if ( current === "*" ) {

				current = prev;

			// Convert response if prev dataType is non-auto and differs from current
			} else if ( prev !== "*" && prev !== current ) {

				// Seek a direct converter
				conv = converters[ prev + " " + current ] || converters[ "* " + current ];

				// If none found, seek a pair
				if ( !conv ) {
					for ( conv2 in converters ) {

						// If conv2 outputs current
						tmp = conv2.split( " " );
						if ( tmp[ 1 ] === current ) {

							// If prev can be converted to accepted input
							conv = converters[ prev + " " + tmp[ 0 ] ] ||
								converters[ "* " + tmp[ 0 ] ];
							if ( conv ) {

								// Condense equivalence converters
								if ( conv === true ) {
									conv = converters[ conv2 ];

								// Otherwise, insert the intermediate dataType
								} else if ( converters[ conv2 ] !== true ) {
									current = tmp[ 0 ];
									dataTypes.unshift( tmp[ 1 ] );
								}
								break;
							}
						}
					}
				}

				// Apply converter (if not an equivalence)
				if ( conv !== true ) {

					// Unless errors are allowed to bubble, catch and return them
					if ( conv && s.throws ) {
						response = conv( response );
					} else {
						try {
							response = conv( response );
						} catch ( e ) {
							return {
								state: "parsererror",
								error: conv ? e : "No conversion from " + prev + " to " + current
							};
						}
					}
				}
			}
		}
	}

	return { state: "success", data: response };
}

jQuery.extend( {

	// Counter for holding the number of active queries
	active: 0,

	// Last-Modified header cache for next request
	lastModified: {},
	etag: {},

	ajaxSettings: {
		url: location.href,
		type: "GET",
		isLocal: rlocalProtocol.test( location.protocol ),
		global: true,
		processData: true,
		async: true,
		contentType: "application/x-www-form-urlencoded; charset=UTF-8",

		/*
		timeout: 0,
		data: null,
		dataType: null,
		username: null,
		password: null,
		cache: null,
		throws: false,
		traditional: false,
		headers: {},
		*/

		accepts: {
			"*": allTypes,
			text: "text/plain",
			html: "text/html",
			xml: "application/xml, text/xml",
			json: "application/json, text/javascript"
		},

		contents: {
			xml: /\bxml\b/,
			html: /\bhtml/,
			json: /\bjson\b/
		},

		responseFields: {
			xml: "responseXML",
			text: "responseText",
			json: "responseJSON"
		},

		// Data converters
		// Keys separate source (or catchall "*") and destination types with a single space
		converters: {

			// Convert anything to text
			"* text": String,

			// Text to html (true = no transformation)
			"text html": true,

			// Evaluate text as a json expression
			"text json": JSON.parse,

			// Parse text as xml
			"text xml": jQuery.parseXML
		},

		// For options that shouldn't be deep extended:
		// you can add your own custom options here if
		// and when you create one that shouldn't be
		// deep extended (see ajaxExtend)
		flatOptions: {
			url: true,
			context: true
		}
	},

	// Creates a full fledged settings object into target
	// with both ajaxSettings and settings fields.
	// If target is omitted, writes into ajaxSettings.
	ajaxSetup: function( target, settings ) {
		return settings ?

			// Building a settings object
			ajaxExtend( ajaxExtend( target, jQuery.ajaxSettings ), settings ) :

			// Extending ajaxSettings
			ajaxExtend( jQuery.ajaxSettings, target );
	},

	ajaxPrefilter: addToPrefiltersOrTransports( prefilters ),
	ajaxTransport: addToPrefiltersOrTransports( transports ),

	// Main method
	ajax: function( url, options ) {

		// If url is an object, simulate pre-1.5 signature
		if ( typeof url === "object" ) {
			options = url;
			url = undefined;
		}

		// Force options to be an object
		options = options || {};

		var transport,

			// URL without anti-cache param
			cacheURL,

			// Response headers
			responseHeadersString,
			responseHeaders,

			// timeout handle
			timeoutTimer,

			// Url cleanup var
			urlAnchor,

			// Request state (becomes false upon send and true upon completion)
			completed,

			// To know if global events are to be dispatched
			fireGlobals,

			// Loop variable
			i,

			// uncached part of the url
			uncached,

			// Create the final options object
			s = jQuery.ajaxSetup( {}, options ),

			// Callbacks context
			callbackContext = s.context || s,

			// Context for global events is callbackContext if it is a DOM node or jQuery collection
			globalEventContext = s.context &&
				( callbackContext.nodeType || callbackContext.jquery ) ?
				jQuery( callbackContext ) :
				jQuery.event,

			// Deferreds
			deferred = jQuery.Deferred(),
			completeDeferred = jQuery.Callbacks( "once memory" ),

			// Status-dependent callbacks
			statusCode = s.statusCode || {},

			// Headers (they are sent all at once)
			requestHeaders = {},
			requestHeadersNames = {},

			// Default abort message
			strAbort = "canceled",

			// Fake xhr
			jqXHR = {
				readyState: 0,

				// Builds headers hashtable if needed
				getResponseHeader: function( key ) {
					var match;
					if ( completed ) {
						if ( !responseHeaders ) {
							responseHeaders = {};
							while ( ( match = rheaders.exec( responseHeadersString ) ) ) {
								responseHeaders[ match[ 1 ].toLowerCase() + " " ] =
									( responseHeaders[ match[ 1 ].toLowerCase() + " " ] || [] )
										.concat( match[ 2 ] );
							}
						}
						match = responseHeaders[ key.toLowerCase() + " " ];
					}
					return match == null ? null : match.join( ", " );
				},

				// Raw string
				getAllResponseHeaders: function() {
					return completed ? responseHeadersString : null;
				},

				// Caches the header
				setRequestHeader: function( name, value ) {
					if ( completed == null ) {
						name = requestHeadersNames[ name.toLowerCase() ] =
							requestHeadersNames[ name.toLowerCase() ] || name;
						requestHeaders[ name ] = value;
					}
					return this;
				},

				// Overrides response content-type header
				overrideMimeType: function( type ) {
					if ( completed == null ) {
						s.mimeType = type;
					}
					return this;
				},

				// Status-dependent callbacks
				statusCode: function( map ) {
					var code;
					if ( map ) {
						if ( completed ) {

							// Execute the appropriate callbacks
							jqXHR.always( map[ jqXHR.status ] );
						} else {

							// Lazy-add the new callbacks in a way that preserves old ones
							for ( code in map ) {
								statusCode[ code ] = [ statusCode[ code ], map[ code ] ];
							}
						}
					}
					return this;
				},

				// Cancel the request
				abort: function( statusText ) {
					var finalText = statusText || strAbort;
					if ( transport ) {
						transport.abort( finalText );
					}
					done( 0, finalText );
					return this;
				}
			};

		// Attach deferreds
		deferred.promise( jqXHR );

		// Add protocol if not provided (prefilters might expect it)
		// Handle falsy url in the settings object (trac-10093: consistency with old signature)
		// We also use the url parameter if available
		s.url = ( ( url || s.url || location.href ) + "" )
			.replace( rprotocol, location.protocol + "//" );

		// Alias method option to type as per ticket trac-12004
		s.type = options.method || options.type || s.method || s.type;

		// Extract dataTypes list
		s.dataTypes = ( s.dataType || "*" ).toLowerCase().match( rnothtmlwhite ) || [ "" ];

		// A cross-domain request is in order when the origin doesn't match the current origin.
		if ( s.crossDomain == null ) {
			urlAnchor = document.createElement( "a" );

			// Support: IE <=8 - 11, Edge 12 - 15
			// IE throws exception on accessing the href property if url is malformed,
			// e.g. http://example.com:80x/
			try {
				urlAnchor.href = s.url;

				// Support: IE <=8 - 11 only
				// Anchor's host property isn't correctly set when s.url is relative
				urlAnchor.href = urlAnchor.href;
				s.crossDomain = originAnchor.protocol + "//" + originAnchor.host !==
					urlAnchor.protocol + "//" + urlAnchor.host;
			} catch ( e ) {

				// If there is an error parsing the URL, assume it is crossDomain,
				// it can be rejected by the transport if it is invalid
				s.crossDomain = true;
			}
		}

		// Convert data if not already a string
		if ( s.data && s.processData && typeof s.data !== "string" ) {
			s.data = jQuery.param( s.data, s.traditional );
		}

		// Apply prefilters
		inspectPrefiltersOrTransports( prefilters, s, options, jqXHR );

		// If request was aborted inside a prefilter, stop there
		if ( completed ) {
			return jqXHR;
		}

		// We can fire global events as of now if asked to
		// Don't fire events if jQuery.event is undefined in an AMD-usage scenario (trac-15118)
		fireGlobals = jQuery.event && s.global;

		// Watch for a new set of requests
		if ( fireGlobals && jQuery.active++ === 0 ) {
			jQuery.event.trigger( "ajaxStart" );
		}

		// Uppercase the type
		s.type = s.type.toUpperCase();

		// Determine if request has content
		s.hasContent = !rnoContent.test( s.type );

		// Save the URL in case we're toying with the If-Modified-Since
		// and/or If-None-Match header later on
		// Remove hash to simplify url manipulation
		cacheURL = s.url.replace( rhash, "" );

		// More options handling for requests with no content
		if ( !s.hasContent ) {

			// Remember the hash so we can put it back
			uncached = s.url.slice( cacheURL.length );

			// If data is available and should be processed, append data to url
			if ( s.data && ( s.processData || typeof s.data === "string" ) ) {
				cacheURL += ( rquery.test( cacheURL ) ? "&" : "?" ) + s.data;

				// trac-9682: remove data so that it's not used in an eventual retry
				delete s.data;
			}

			// Add or update anti-cache param if needed
			if ( s.cache === false ) {
				cacheURL = cacheURL.replace( rantiCache, "$1" );
				uncached = ( rquery.test( cacheURL ) ? "&" : "?" ) + "_=" + ( nonce.guid++ ) +
					uncached;
			}

			// Put hash and anti-cache on the URL that will be requested (gh-1732)
			s.url = cacheURL + uncached;

		// Change '%20' to '+' if this is encoded form body content (gh-2658)
		} else if ( s.data && s.processData &&
			( s.contentType || "" ).indexOf( "application/x-www-form-urlencoded" ) === 0 ) {
			s.data = s.data.replace( r20, "+" );
		}

		// Set the If-Modified-Since and/or If-None-Match header, if in ifModified mode.
		if ( s.ifModified ) {
			if ( jQuery.lastModified[ cacheURL ] ) {
				jqXHR.setRequestHeader( "If-Modified-Since", jQuery.lastModified[ cacheURL ] );
			}
			if ( jQuery.etag[ cacheURL ] ) {
				jqXHR.setRequestHeader( "If-None-Match", jQuery.etag[ cacheURL ] );
			}
		}

		// Set the correct header, if data is being sent
		if ( s.data && s.hasContent && s.contentType !== false || options.contentType ) {
			jqXHR.setRequestHeader( "Content-Type", s.contentType );
		}

		// Set the Accepts header for the server, depending on the dataType
		jqXHR.setRequestHeader(
			"Accept",
			s.dataTypes[ 0 ] && s.accepts[ s.dataTypes[ 0 ] ] ?
				s.accepts[ s.dataTypes[ 0 ] ] +
					( s.dataTypes[ 0 ] !== "*" ? ", " + allTypes + "; q=0.01" : "" ) :
				s.accepts[ "*" ]
		);

		// Check for headers option
		for ( i in s.headers ) {
			jqXHR.setRequestHeader( i, s.headers[ i ] );
		}

		// Allow custom headers/mimetypes and early abort
		if ( s.beforeSend &&
			( s.beforeSend.call( callbackContext, jqXHR, s ) === false || completed ) ) {

			// Abort if not done already and return
			return jqXHR.abort();
		}

		// Aborting is no longer a cancellation
		strAbort = "abort";

		// Install callbacks on deferreds
		completeDeferred.add( s.complete );
		jqXHR.done( s.success );
		jqXHR.fail( s.error );

		// Get transport
		transport = inspectPrefiltersOrTransports( transports, s, options, jqXHR );

		// If no transport, we auto-abort
		if ( !transport ) {
			done( -1, "No Transport" );
		} else {
			jqXHR.readyState = 1;

			// Send global event
			if ( fireGlobals ) {
				globalEventContext.trigger( "ajaxSend", [ jqXHR, s ] );
			}

			// If request was aborted inside ajaxSend, stop there
			if ( completed ) {
				return jqXHR;
			}

			// Timeout
			if ( s.async && s.timeout > 0 ) {
				timeoutTimer = window.setTimeout( function() {
					jqXHR.abort( "timeout" );
				}, s.timeout );
			}

			try {
				completed = false;
				transport.send( requestHeaders, done );
			} catch ( e ) {

				// Rethrow post-completion exceptions
				if ( completed ) {
					throw e;
				}

				// Propagate others as results
				done( -1, e );
			}
		}

		// Callback for when everything is done
		function done( status, nativeStatusText, responses, headers ) {
			var isSuccess, success, error, response, modified,
				statusText = nativeStatusText;

			// Ignore repeat invocations
			if ( completed ) {
				return;
			}

			completed = true;

			// Clear timeout if it exists
			if ( timeoutTimer ) {
				window.clearTimeout( timeoutTimer );
			}

			// Dereference transport for early garbage collection
			// (no matter how long the jqXHR object will be used)
			transport = undefined;

			// Cache response headers
			responseHeadersString = headers || "";

			// Set readyState
			jqXHR.readyState = status > 0 ? 4 : 0;

			// Determine if successful
			isSuccess = status >= 200 && status < 300 || status === 304;

			// Get response data
			if ( responses ) {
				response = ajaxHandleResponses( s, jqXHR, responses );
			}

			// Use a noop converter for missing script but not if jsonp
			if ( !isSuccess &&
				jQuery.inArray( "script", s.dataTypes ) > -1 &&
				jQuery.inArray( "json", s.dataTypes ) < 0 ) {
				s.converters[ "text script" ] = function() {};
			}

			// Convert no matter what (that way responseXXX fields are always set)
			response = ajaxConvert( s, response, jqXHR, isSuccess );

			// If successful, handle type chaining
			if ( isSuccess ) {

				// Set the If-Modified-Since and/or If-None-Match header, if in ifModified mode.
				if ( s.ifModified ) {
					modified = jqXHR.getResponseHeader( "Last-Modified" );
					if ( modified ) {
						jQuery.lastModified[ cacheURL ] = modified;
					}
					modified = jqXHR.getResponseHeader( "etag" );
					if ( modified ) {
						jQuery.etag[ cacheURL ] = modified;
					}
				}

				// if no content
				if ( status === 204 || s.type === "HEAD" ) {
					statusText = "nocontent";

				// if not modified
				} else if ( status === 304 ) {
					statusText = "notmodified";

				// If we have data, let's convert it
				} else {
					statusText = response.state;
					success = response.data;
					error = response.error;
					isSuccess = !error;
				}
			} else {

				// Extract error from statusText and normalize for non-aborts
				error = statusText;
				if ( status || !statusText ) {
					statusText = "error";
					if ( status < 0 ) {
						status = 0;
					}
				}
			}

			// Set data for the fake xhr object
			jqXHR.status = status;
			jqXHR.statusText = ( nativeStatusText || statusText ) + "";

			// Success/Error
			if ( isSuccess ) {
				deferred.resolveWith( callbackContext, [ success, statusText, jqXHR ] );
			} else {
				deferred.rejectWith( callbackContext, [ jqXHR, statusText, error ] );
			}

			// Status-dependent callbacks
			jqXHR.statusCode( statusCode );
			statusCode = undefined;

			if ( fireGlobals ) {
				globalEventContext.trigger( isSuccess ? "ajaxSuccess" : "ajaxError",
					[ jqXHR, s, isSuccess ? success : error ] );
			}

			// Complete
			completeDeferred.fireWith( callbackContext, [ jqXHR, statusText ] );

			if ( fireGlobals ) {
				globalEventContext.trigger( "ajaxComplete", [ jqXHR, s ] );

				// Handle the global AJAX counter
				if ( !( --jQuery.active ) ) {
					jQuery.event.trigger( "ajaxStop" );
				}
			}
		}

		return jqXHR;
	},

	getJSON: function( url, data, callback ) {
		return jQuery.get( url, data, callback, "json" );
	},

	getScript: function( url, callback ) {
		return jQuery.get( url, undefined, callback, "script" );
	}
} );

jQuery.each( [ "get", "post" ], function( _i, method ) {
	jQuery[ method ] = function( url, data, callback, type ) {

		// Shift arguments if data argument was omitted
		if ( isFunction( data ) ) {
			type = type || callback;
			callback = data;
			data = undefined;
		}

		// The url can be an options object (which then must have .url)
		return jQuery.ajax( jQuery.extend( {
			url: url,
			type: method,
			dataType: type,
			data: data,
			success: callback
		}, jQuery.isPlainObject( url ) && url ) );
	};
} );

jQuery.ajaxPrefilter( function( s ) {
	var i;
	for ( i in s.headers ) {
		if ( i.toLowerCase() === "content-type" ) {
			s.contentType = s.headers[ i ] || "";
		}
	}
} );


jQuery._evalUrl = function( url, options, doc ) {
	return jQuery.ajax( {
		url: url,

		// Make this explicit, since user can override this through ajaxSetup (trac-11264)
		type: "GET",
		dataType: "script",
		cache: true,
		async: false,
		global: false,

		// Only evaluate the response if it is successful (gh-4126)
		// dataFilter is not invoked for failure responses, so using it instead
		// of the default converter is kludgy but it works.
		converters: {
			"text script": function() {}
		},
		dataFilter: function( response ) {
			jQuery.globalEval( response, options, doc );
		}
	} );
};


jQuery.fn.extend( {
	wrapAll: function( html ) {
		var wrap;

		if ( this[ 0 ] ) {
			if ( isFunction( html ) ) {
				html = html.call( this[ 0 ] );
			}

			// The elements to wrap the target around
			wrap = jQuery( html, this[ 0 ].ownerDocument ).eq( 0 ).clone( true );

			if ( this[ 0 ].parentNode ) {
				wrap.insertBefore( this[ 0 ] );
			}

			wrap.map( function() {
				var elem = this;

				while ( elem.firstElementChild ) {
					elem = elem.firstElementChild;
				}

				return elem;
			} ).append( this );
		}

		return this;
	},

	wrapInner: function( html ) {
		if ( isFunction( html ) ) {
			return this.each( function( i ) {
				jQuery( this ).wrapInner( html.call( this, i ) );
			} );
		}

		return this.each( function() {
			var self = jQuery( this ),
				contents = self.contents();

			if ( contents.length ) {
				contents.wrapAll( html );

			} else {
				self.append( html );
			}
		} );
	},

	wrap: function( html ) {
		var htmlIsFunction = isFunction( html );

		return this.each( function( i ) {
			jQuery( this ).wrapAll( htmlIsFunction ? html.call( this, i ) : html );
		} );
	},

	unwrap: function( selector ) {
		this.parent( selector ).not( "body" ).each( function() {
			jQuery( this ).replaceWith( this.childNodes );
		} );
		return this;
	}
} );


jQuery.expr.pseudos.hidden = function( elem ) {
	return !jQuery.expr.pseudos.visible( elem );
};
jQuery.expr.pseudos.visible = function( elem ) {
	return !!( elem.offsetWidth || elem.offsetHeight || elem.getClientRects().length );
};




jQuery.ajaxSettings.xhr = function() {
	try {
		return new window.XMLHttpRequest();
	} catch ( e ) {}
};

var xhrSuccessStatus = {

		// File protocol always yields status code 0, assume 200
		0: 200,

		// Support: IE <=9 only
		// trac-1450: sometimes IE returns 1223 when it should be 204
		1223: 204
	},
	xhrSupported = jQuery.ajaxSettings.xhr();

support.cors = !!xhrSupported && ( "withCredentials" in xhrSupported );
support.ajax = xhrSupported = !!xhrSupported;

jQuery.ajaxTransport( function( options ) {
	var callback, errorCallback;

	// Cross domain only allowed if supported through XMLHttpRequest
	if ( support.cors || xhrSupported && !options.crossDomain ) {
		return {
			send: function( headers, complete ) {
				var i,
					xhr = options.xhr();

				xhr.open(
					options.type,
					options.url,
					options.async,
					options.username,
					options.password
				);

				// Apply custom fields if provided
				if ( options.xhrFields ) {
					for ( i in options.xhrFields ) {
						xhr[ i ] = options.xhrFields[ i ];
					}
				}

				// Override mime type if needed
				if ( options.mimeType && xhr.overrideMimeType ) {
					xhr.overrideMimeType( options.mimeType );
				}

				// X-Requested-With header
				// For cross-domain requests, seeing as conditions for a preflight are
				// akin to a jigsaw puzzle, we simply never set it to be sure.
				// (it can always be set on a per-request basis or even using ajaxSetup)
				// For same-domain requests, won't change header if already provided.
				if ( !options.crossDomain && !headers[ "X-Requested-With" ] ) {
					headers[ "X-Requested-With" ] = "XMLHttpRequest";
				}

				// Set headers
				for ( i in headers ) {
					xhr.setRequestHeader( i, headers[ i ] );
				}

				// Callback
				callback = function( type ) {
					return function() {
						if ( callback ) {
							callback = errorCallback = xhr.onload =
								xhr.onerror = xhr.onabort = xhr.ontimeout =
									xhr.onreadystatechange = null;

							if ( type === "abort" ) {
								xhr.abort();
							} else if ( type === "error" ) {

								// Support: IE <=9 only
								// On a manual native abort, IE9 throws
								// errors on any property access that is not readyState
								if ( typeof xhr.status !== "number" ) {
									complete( 0, "error" );
								} else {
									complete(

										// File: protocol always yields status 0; see trac-8605, trac-14207
										xhr.status,
										xhr.statusText
									);
								}
							} else {
								complete(
									xhrSuccessStatus[ xhr.status ] || xhr.status,
									xhr.statusText,

									// Support: IE <=9 only
									// IE9 has no XHR2 but throws on binary (trac-11426)
									// For XHR2 non-text, let the caller handle it (gh-2498)
									( xhr.responseType || "text" ) !== "text"  ||
									typeof xhr.responseText !== "string" ?
										{ binary: xhr.response } :
										{ text: xhr.responseText },
									xhr.getAllResponseHeaders()
								);
							}
						}
					};
				};

				// Listen to events
				xhr.onload = callback();
				errorCallback = xhr.onerror = xhr.ontimeout = callback( "error" );

				// Support: IE 9 only
				// Use onreadystatechange to replace onabort
				// to handle uncaught aborts
				if ( xhr.onabort !== undefined ) {
					xhr.onabort = errorCallback;
				} else {
					xhr.onreadystatechange = function() {

						// Check readyState before timeout as it changes
						if ( xhr.readyState === 4 ) {

							// Allow onerror to be called first,
							// but that will not handle a native abort
							// Also, save errorCallback to a variable
							// as xhr.onerror cannot be accessed
							window.setTimeout( function() {
								if ( callback ) {
									errorCallback();
								}
							} );
						}
					};
				}

				// Create the abort callback
				callback = callback( "abort" );

				try {

					// Do send the request (this may raise an exception)
					xhr.send( options.hasContent && options.data || null );
				} catch ( e ) {

					// trac-14683: Only rethrow if this hasn't been notified as an error yet
					if ( callback ) {
						throw e;
					}
				}
			},

			abort: function() {
				if ( callback ) {
					callback();
				}
			}
		};
	}
} );




// Prevent auto-execution of scripts when no explicit dataType was provided (See gh-2432)
jQuery.ajaxPrefilter( function( s ) {
	if ( s.crossDomain ) {
		s.contents.script = false;
	}
} );

// Install script dataType
jQuery.ajaxSetup( {
	accepts: {
		script: "text/javascript, application/javascript, " +
			"application/ecmascript, application/x-ecmascript"
	},
	contents: {
		script: /\b(?:java|ecma)script\b/
	},
	converters: {
		"text script": function( text ) {
			jQuery.globalEval( text );
			return text;
		}
	}
} );

// Handle cache's special case and crossDomain
jQuery.ajaxPrefilter( "script", function( s ) {
	if ( s.cache === undefined ) {
		s.cache = false;
	}
	if ( s.crossDomain ) {
		s.type = "GET";
	}
} );

// Bind script tag hack transport
jQuery.ajaxTransport( "script", function( s ) {

	// This transport only deals with cross domain or forced-by-attrs requests
	if ( s.crossDomain || s.scriptAttrs ) {
		var script, callback;
		return {
			send: function( _, complete ) {
				script = jQuery( "<script>" )
					.attr( s.scriptAttrs || {} )
					.prop( { charset: s.scriptCharset, src: s.url } )
					.on( "load error", callback = function( evt ) {
						script.remove();
						callback = null;
						if ( evt ) {
							complete( evt.type === "error" ? 404 : 200, evt.type );
						}
					} );

				// Use native DOM manipulation to avoid our domManip AJAX trickery
				document.head.appendChild( script[ 0 ] );
			},
			abort: function() {
				if ( callback ) {
					callback();
				}
			}
		};
	}
} );




var oldCallbacks = [],
	rjsonp = /(=)\?(?=&|$)|\?\?/;

// Default jsonp settings
jQuery.ajaxSetup( {
	jsonp: "callback",
	jsonpCallback: function() {
		var callback = oldCallbacks.pop() || ( jQuery.expando + "_" + ( nonce.guid++ ) );
		this[ callback ] = true;
		return callback;
	}
} );

// Detect, normalize options and install callbacks for jsonp requests
jQuery.ajaxPrefilter( "json jsonp", function( s, originalSettings, jqXHR ) {

	var callbackName, overwritten, responseContainer,
		jsonProp = s.jsonp !== false && ( rjsonp.test( s.url ) ?
			"url" :
			typeof s.data === "string" &&
				( s.contentType || "" )
					.indexOf( "application/x-www-form-urlencoded" ) === 0 &&
				rjsonp.test( s.data ) && "data"
		);

	// Handle iff the expected data type is "jsonp" or we have a parameter to set
	if ( jsonProp || s.dataTypes[ 0 ] === "jsonp" ) {

		// Get callback name, remembering preexisting value associated with it
		callbackName = s.jsonpCallback = isFunction( s.jsonpCallback ) ?
			s.jsonpCallback() :
			s.jsonpCallback;

		// Insert callback into url or form data
		if ( jsonProp ) {
			s[ jsonProp ] = s[ jsonProp ].replace( rjsonp, "$1" + callbackName );
		} else if ( s.jsonp !== false ) {
			s.url += ( rquery.test( s.url ) ? "&" : "?" ) + s.jsonp + "=" + callbackName;
		}

		// Use data converter to retrieve json after script execution
		s.converters[ "script json" ] = function() {
			if ( !responseContainer ) {
				jQuery.error( callbackName + " was not called" );
			}
			return responseContainer[ 0 ];
		};

		// Force json dataType
		s.dataTypes[ 0 ] = "json";

		// Install callback
		overwritten = window[ callbackName ];
		window[ callbackName ] = function() {
			responseContainer = arguments;
		};

		// Clean-up function (fires after converters)
		jqXHR.always( function() {

			// If previous value didn't exist - remove it
			if ( overwritten === undefined ) {
				jQuery( window ).removeProp( callbackName );

			// Otherwise restore preexisting value
			} else {
				window[ callbackName ] = overwritten;
			}

			// Save back as free
			if ( s[ callbackName ] ) {

				// Make sure that re-using the options doesn't screw things around
				s.jsonpCallback = originalSettings.jsonpCallback;

				// Save the callback name for future use
				oldCallbacks.push( callbackName );
			}

			// Call if it was a function and we have a response
			if ( responseContainer && isFunction( overwritten ) ) {
				overwritten( responseContainer[ 0 ] );
			}

			responseContainer = overwritten = undefined;
		} );

		// Delegate to script
		return "script";
	}
} );




// Support: Safari 8 only
// In Safari 8 documents created via document.implementation.createHTMLDocument
// collapse sibling forms: the second one becomes a child of the first one.
// Because of that, this security measure has to be disabled in Safari 8.
// https://bugs.webkit.org/show_bug.cgi?id=137337
support.createHTMLDocument = ( function() {
	var body = document.implementation.createHTMLDocument( "" ).body;
	body.innerHTML = "<form></form><form></form>";
	return body.childNodes.length === 2;
} )();


// Argument "data" should be string of html
// context (optional): If specified, the fragment will be created in this context,
// defaults to document
// keepScripts (optional): If true, will include scripts passed in the html string
jQuery.parseHTML = function( data, context, keepScripts ) {
	if ( typeof data !== "string" ) {
		return [];
	}
	if ( typeof context === "boolean" ) {
		keepScripts = context;
		context = false;
	}

	var base, parsed, scripts;

	if ( !context ) {

		// Stop scripts or inline event handlers from being executed immediately
		// by using document.implementation
		if ( support.createHTMLDocument ) {
			context = document.implementation.createHTMLDocument( "" );

			// Set the base href for the created document
			// so any parsed elements with URLs
			// are based on the document's URL (gh-2965)
			base = context.createElement( "base" );
			base.href = document.location.href;
			context.head.appendChild( base );
		} else {
			context = document;
		}
	}

	parsed = rsingleTag.exec( data );
	scripts = !keepScripts && [];

	// Single tag
	if ( parsed ) {
		return [ context.createElement( parsed[ 1 ] ) ];
	}

	parsed = buildFragment( [ data ], context, scripts );

	if ( scripts && scripts.length ) {
		jQuery( scripts ).remove();
	}

	return jQuery.merge( [], parsed.childNodes );
};


/**
 * Load a url into a page
 */
jQuery.fn.load = function( url, params, callback ) {
	var selector, type, response,
		self = this,
		off = url.indexOf( " " );

	if ( off > -1 ) {
		selector = stripAndCollapse( url.slice( off ) );
		url = url.slice( 0, off );
	}

	// If it's a function
	if ( isFunction( params ) ) {

		// We assume that it's the callback
		callback = params;
		params = undefined;

	// Otherwise, build a param string
	} else if ( params && typeof params === "object" ) {
		type = "POST";
	}

	// If we have elements to modify, make the request
	if ( self.length > 0 ) {
		jQuery.ajax( {
			url: url,

			// If "type" variable is undefined, then "GET" method will be used.
			// Make value of this field explicit since
			// user can override it through ajaxSetup method
			type: type || "GET",
			dataType: "html",
			data: params
		} ).done( function( responseText ) {

			// Save response for use in complete callback
			response = arguments;

			self.html( selector ?

				// If a selector was specified, locate the right elements in a dummy div
				// Exclude scripts to avoid IE 'Permission Denied' errors
				jQuery( "<div>" ).append( jQuery.parseHTML( responseText ) ).find( selector ) :

				// Otherwise use the full result
				responseText );

		// If the request succeeds, this function gets "data", "status", "jqXHR"
		// but they are ignored because response was set above.
		// If it fails, this function gets "jqXHR", "status", "error"
		} ).always( callback && function( jqXHR, status ) {
			self.each( function() {
				callback.apply( this, response || [ jqXHR.responseText, status, jqXHR ] );
			} );
		} );
	}

	return this;
};




jQuery.expr.pseudos.animated = function( elem ) {
	return jQuery.grep( jQuery.timers, function( fn ) {
		return elem === fn.elem;
	} ).length;
};




jQuery.offset = {
	setOffset: function( elem, options, i ) {
		var curPosition, curLeft, curCSSTop, curTop, curOffset, curCSSLeft, calculatePosition,
			position = jQuery.css( elem, "position" ),
			curElem = jQuery( elem ),
			props = {};

		// Set position first, in-case top/left are set even on static elem
		if ( position === "static" ) {
			elem.style.position = "relative";
		}

		curOffset = curElem.offset();
		curCSSTop = jQuery.css( elem, "top" );
		curCSSLeft = jQuery.css( elem, "left" );
		calculatePosition = ( position === "absolute" || position === "fixed" ) &&
			( curCSSTop + curCSSLeft ).indexOf( "auto" ) > -1;

		// Need to be able to calculate position if either
		// top or left is auto and position is either absolute or fixed
		if ( calculatePosition ) {
			curPosition = curElem.position();
			curTop = curPosition.top;
			curLeft = curPosition.left;

		} else {
			curTop = parseFloat( curCSSTop ) || 0;
			curLeft = parseFloat( curCSSLeft ) || 0;
		}

		if ( isFunction( options ) ) {

			// Use jQuery.extend here to allow modification of coordinates argument (gh-1848)
			options = options.call( elem, i, jQuery.extend( {}, curOffset ) );
		}

		if ( options.top != null ) {
			props.top = ( options.top - curOffset.top ) + curTop;
		}
		if ( options.left != null ) {
			props.left = ( options.left - curOffset.left ) + curLeft;
		}

		if ( "using" in options ) {
			options.using.call( elem, props );

		} else {
			curElem.css( props );
		}
	}
};

jQuery.fn.extend( {

	// offset() relates an element's border box to the document origin
	offset: function( options ) {

		// Preserve chaining for setter
		if ( arguments.length ) {
			return options === undefined ?
				this :
				this.each( function( i ) {
					jQuery.offset.setOffset( this, options, i );
				} );
		}

		var rect, win,
			elem = this[ 0 ];

		if ( !elem ) {
			return;
		}

		// Return zeros for disconnected and hidden (display: none) elements (gh-2310)
		// Support: IE <=11 only
		// Running getBoundingClientRect on a
		// disconnected node in IE throws an error
		if ( !elem.getClientRects().length ) {
			return { top: 0, left: 0 };
		}

		// Get document-relative position by adding viewport scroll to viewport-relative gBCR
		rect = elem.getBoundingClientRect();
		win = elem.ownerDocument.defaultView;
		return {
			top: rect.top + win.pageYOffset,
			left: rect.left + win.pageXOffset
		};
	},

	// position() relates an element's margin box to its offset parent's padding box
	// This corresponds to the behavior of CSS absolute positioning
	position: function() {
		if ( !this[ 0 ] ) {
			return;
		}

		var offsetParent, offset, doc,
			elem = this[ 0 ],
			parentOffset = { top: 0, left: 0 };

		// position:fixed elements are offset from the viewport, which itself always has zero offset
		if ( jQuery.css( elem, "position" ) === "fixed" ) {

			// Assume position:fixed implies availability of getBoundingClientRect
			offset = elem.getBoundingClientRect();

		} else {
			offset = this.offset();

			// Account for the *real* offset parent, which can be the document or its root element
			// when a statically positioned element is identified
			doc = elem.ownerDocument;
			offsetParent = elem.offsetParent || doc.documentElement;
			while ( offsetParent &&
				( offsetParent === doc.body || offsetParent === doc.documentElement ) &&
				jQuery.css( offsetParent, "position" ) === "static" ) {

				offsetParent = offsetParent.parentNode;
			}
			if ( offsetParent && offsetParent !== elem && offsetParent.nodeType === 1 ) {

				// Incorporate borders into its offset, since they are outside its content origin
				parentOffset = jQuery( offsetParent ).offset();
				parentOffset.top += jQuery.css( offsetParent, "borderTopWidth", true );
				parentOffset.left += jQuery.css( offsetParent, "borderLeftWidth", true );
			}
		}

		// Subtract parent offsets and element margins
		return {
			top: offset.top - parentOffset.top - jQuery.css( elem, "marginTop", true ),
			left: offset.left - parentOffset.left - jQuery.css( elem, "marginLeft", true )
		};
	},

	// This method will return documentElement in the following cases:
	// 1) For the element inside the iframe without offsetParent, this method will return
	//    documentElement of the parent window
	// 2) For the hidden or detached element
	// 3) For body or html element, i.e. in case of the html node - it will return itself
	//
	// but those exceptions were never presented as a real life use-cases
	// and might be considered as more preferable results.
	//
	// This logic, however, is not guaranteed and can change at any point in the future
	offsetParent: function() {
		return this.map( function() {
			var offsetParent = this.offsetParent;

			while ( offsetParent && jQuery.css( offsetParent, "position" ) === "static" ) {
				offsetParent = offsetParent.offsetParent;
			}

			return offsetParent || documentElement;
		} );
	}
} );

// Create scrollLeft and scrollTop methods
jQuery.each( { scrollLeft: "pageXOffset", scrollTop: "pageYOffset" }, function( method, prop ) {
	var top = "pageYOffset" === prop;

	jQuery.fn[ method ] = function( val ) {
		return access( this, function( elem, method, val ) {

			// Coalesce documents and windows
			var win;
			if ( isWindow( elem ) ) {
				win = elem;
			} else if ( elem.nodeType === 9 ) {
				win = elem.defaultView;
			}

			if ( val === undefined ) {
				return win ? win[ prop ] : elem[ method ];
			}

			if ( win ) {
				win.scrollTo(
					!top ? val : win.pageXOffset,
					top ? val : win.pageYOffset
				);

			} else {
				elem[ method ] = val;
			}
		}, method, val, arguments.length );
	};
} );

// Support: Safari <=7 - 9.1, Chrome <=37 - 49
// Add the top/left cssHooks using jQuery.fn.position
// Webkit bug: https://bugs.webkit.org/show_bug.cgi?id=29084
// Blink bug: https://bugs.chromium.org/p/chromium/issues/detail?id=589347
// getComputedStyle returns percent when specified for top/left/bottom/right;
// rather than make the css module depend on the offset module, just check for it here
jQuery.each( [ "top", "left" ], function( _i, prop ) {
	jQuery.cssHooks[ prop ] = addGetHookIf( support.pixelPosition,
		function( elem, computed ) {
			if ( computed ) {
				computed = curCSS( elem, prop );

				// If curCSS returns percentage, fallback to offset
				return rnumnonpx.test( computed ) ?
					jQuery( elem ).position()[ prop ] + "px" :
					computed;
			}
		}
	);
} );


// Create innerHeight, innerWidth, height, width, outerHeight and outerWidth methods
jQuery.each( { Height: "height", Width: "width" }, function( name, type ) {
	jQuery.each( {
		padding: "inner" + name,
		content: type,
		"": "outer" + name
	}, function( defaultExtra, funcName ) {

		// Margin is only for outerHeight, outerWidth
		jQuery.fn[ funcName ] = function( margin, value ) {
			var chainable = arguments.length && ( defaultExtra || typeof margin !== "boolean" ),
				extra = defaultExtra || ( margin === true || value === true ? "margin" : "border" );

			return access( this, function( elem, type, value ) {
				var doc;

				if ( isWindow( elem ) ) {

					// $( window ).outerWidth/Height return w/h including scrollbars (gh-1729)
					return funcName.indexOf( "outer" ) === 0 ?
						elem[ "inner" + name ] :
						elem.document.documentElement[ "client" + name ];
				}

				// Get document width or height
				if ( elem.nodeType === 9 ) {
					doc = elem.documentElement;

					// Either scroll[Width/Height] or offset[Width/Height] or client[Width/Height],
					// whichever is greatest
					return Math.max(
						elem.body[ "scroll" + name ], doc[ "scroll" + name ],
						elem.body[ "offset" + name ], doc[ "offset" + name ],
						doc[ "client" + name ]
					);
				}

				return value === undefined ?

					// Get width or height on the element, requesting but not forcing parseFloat
					jQuery.css( elem, type, extra ) :

					// Set width or height on the element
					jQuery.style( elem, type, value, extra );
			}, type, chainable ? margin : undefined, chainable );
		};
	} );
} );


jQuery.each( [
	"ajaxStart",
	"ajaxStop",
	"ajaxComplete",
	"ajaxError",
	"ajaxSuccess",
	"ajaxSend"
], function( _i, type ) {
	jQuery.fn[ type ] = function( fn ) {
		return this.on( type, fn );
	};
} );




jQuery.fn.extend( {

	bind: function( types, data, fn ) {
		return this.on( types, null, data, fn );
	},
	unbind: function( types, fn ) {
		return this.off( types, null, fn );
	},

	delegate: function( selector, types, data, fn ) {
		return this.on( types, selector, data, fn );
	},
	undelegate: function( selector, types, fn ) {

		// ( namespace ) or ( selector, types [, fn] )
		return arguments.length === 1 ?
			this.off( selector, "**" ) :
			this.off( types, selector || "**", fn );
	},

	hover: function( fnOver, fnOut ) {
		return this.mouseenter( fnOver ).mouseleave( fnOut || fnOver );
	}
} );

jQuery.each(
	( "blur focus focusin focusout resize scroll click dblclick " +
	"mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave " +
	"change select submit keydown keypress keyup contextmenu" ).split( " " ),
	function( _i, name ) {

		// Handle event binding
		jQuery.fn[ name ] = function( data, fn ) {
			return arguments.length > 0 ?
				this.on( name, null, data, fn ) :
				this.trigger( name );
		};
	}
);




// Support: Android <=4.0 only
// Make sure we trim BOM and NBSP
// Require that the "whitespace run" starts from a non-whitespace
// to avoid O(N^2) behavior when the engine would try matching "\s+$" at each space position.
var rtrim = /^[\s\uFEFF\xA0]+|([^\s\uFEFF\xA0])[\s\uFEFF\xA0]+$/g;

// Bind a function to a context, optionally partially applying any
// arguments.
// jQuery.proxy is deprecated to promote standards (specifically Function#bind)
// However, it is not slated for removal any time soon
jQuery.proxy = function( fn, context ) {
	var tmp, args, proxy;

	if ( typeof context === "string" ) {
		tmp = fn[ context ];
		context = fn;
		fn = tmp;
	}

	// Quick check to determine if target is callable, in the spec
	// this throws a TypeError, but we will just return undefined.
	if ( !isFunction( fn ) ) {
		return undefined;
	}

	// Simulated bind
	args = slice.call( arguments, 2 );
	proxy = function() {
		return fn.apply( context || this, args.concat( slice.call( arguments ) ) );
	};

	// Set the guid of unique handler to the same of original handler, so it can be removed
	proxy.guid = fn.guid = fn.guid || jQuery.guid++;

	return proxy;
};

jQuery.holdReady = function( hold ) {
	if ( hold ) {
		jQuery.readyWait++;
	} else {
		jQuery.ready( true );
	}
};
jQuery.isArray = Array.isArray;
jQuery.parseJSON = JSON.parse;
jQuery.nodeName = nodeName;
jQuery.isFunction = isFunction;
jQuery.isWindow = isWindow;
jQuery.camelCase = camelCase;
jQuery.type = toType;

jQuery.now = Date.now;

jQuery.isNumeric = function( obj ) {

	// As of jQuery 3.0, isNumeric is limited to
	// strings and numbers (primitives or objects)
	// that can be coerced to finite numbers (gh-2662)
	var type = jQuery.type( obj );
	return ( type === "number" || type === "string" ) &&

		// parseFloat NaNs numeric-cast false positives ("")
		// ...but misinterprets leading-number strings, particularly hex literals ("0x...")
		// subtraction forces infinities to NaN
		!isNaN( obj - parseFloat( obj ) );
};

jQuery.trim = function( text ) {
	return text == null ?
		"" :
		( text + "" ).replace( rtrim, "$1" );
};



// Register as a named AMD module, since jQuery can be concatenated with other
// files that may use define, but not via a proper concatenation script that
// understands anonymous AMD modules. A named AMD is safest and most robust
// way to register. Lowercase jquery is used because AMD module names are
// derived from file names, and jQuery is normally delivered in a lowercase
// file name. Do this after creating the global so that if an AMD module wants
// to call noConflict to hide this version of jQuery, it will work.

// Note that for maximum portability, libraries that are not jQuery should
// declare themselves as anonymous modules, and avoid setting a global if an
// AMD loader is present. jQuery is a special case. For more information, see
// https://github.com/jrburke/requirejs/wiki/Updating-existing-libraries#wiki-anon

if ( true ) {
	!(__WEBPACK_AMD_DEFINE_ARRAY__ = [], __WEBPACK_AMD_DEFINE_RESULT__ = (function() {
		return jQuery;
	}).apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__),
		__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));
}




var

	// Map over jQuery in case of overwrite
	_jQuery = window.jQuery,

	// Map over the $ in case of overwrite
	_$ = window.$;

jQuery.noConflict = function( deep ) {
	if ( window.$ === jQuery ) {
		window.$ = _$;
	}

	if ( deep && window.jQuery === jQuery ) {
		window.jQuery = _jQuery;
	}

	return jQuery;
};

// Expose jQuery and $ identifiers, even in AMD
// (trac-7102#comment:10, https://github.com/jquery/jquery/pull/557)
// and CommonJS for browser emulators (trac-13566)
if ( typeof noGlobal === "undefined" ) {
	window.jQuery = window.$ = jQuery;
}




return jQuery;
} );


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
/************************************************************************/
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
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!***********************************!*\
  !*** ./assets/pages/home/home.js ***!
  \***********************************/
/**
**
** Aquí requerimos los js para compilar
**
**/

window.$ = window.jQuery = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
__webpack_require__(/*! ./homeFunctions */ "./assets/pages/home/homeFunctions.js");
})();

/******/ })()
;