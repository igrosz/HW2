var pcs = (function () {
    "use strict";

    function get(id) {
        return document.getElementById(id);
    }

    function setCss(elem, property, value) {
        elem.style[property] = value;
    }

    return function (id) {
        var elem = get(id);
        var oldDisplayVal;
        var oldFontSize;
        var interval;
        var i;
        return {
            setCss: function (property, value) {
                setCss(elem, property, value);
                return this;
            },
            getCss: function (property) {
                return getComputedStyle(elem).getPropertyValue(property);
            },
            /*css: function (property, value) {
                if (!undefined(value)) {
                    setCss(elem, property, value);
                }
                else {
                    setCss(elem, property, getComputedStyle(elem).getPropertyValue(property));
                }
                return this;
            },*/
            css: function (property, value) {
                var oldValue = getComputedStyle(elem).getPropertyValue(property);
                var newValue = value !== undefined ? value : oldValue;
                this.setCss(property, newValue);

                return this;
            },


            pulsate: function () {

                oldFontSize = parseInt(this.getCss('font-size'));
                i = 1,

                    interval = setInterval(function () {
                        if (i <= 5 || i > 15) {
                            oldFontSize += 5;
                        } else {
                            oldFontSize -= 5;
                        }


                        setCss(elem, "fontSize", oldFontSize + 'px');

                        if (i++ === 20) {
                            clearInterval(interval);
                        }
                    }, 100);

                return this;
            },
            click: function (callback) {
                elem.addEventListener('click', callback);
                return this;
            },
            hide: function () {
                oldDisplayVal = this.getCss("display");
                this.setCss("display", "none");
                //setCss(elem, "display", "none");

                return this;
            },
            show: function () {
                var newDisplay = oldDisplayVal !== "none" ? oldDisplayVal : "inline-block";
                this.setCss("display", newDisplay);

                return this;
            },
            setInnerHtml: function (html) {
                elem.innerHTML = html;
                return this;
            },
            getElement: function () {
                return elem;
            }
        };
    };
}());