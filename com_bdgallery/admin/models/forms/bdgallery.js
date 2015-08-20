jQuery(function() {
    document.formvalidator.setHandler('album',
        function (value) {
            regex=/^[^0-9]+$/;
            return regex.test(value);
        });
});
