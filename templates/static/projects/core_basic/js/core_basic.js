const CoreBasic = function () {
    const general = function () {
        $('.carousel').carousel();
    };
    return {
        init: function () {
            general();
        }
    };

}();