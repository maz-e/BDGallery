jQuery(function() {
    document.formvalidator.setHandler('album',
        function (value) {
            // Match any single character except symbols. 
            regex=/^[^$-/:-?{-~!"^_`\[\]]+$/;
            return regex.test(value);
        });
});
