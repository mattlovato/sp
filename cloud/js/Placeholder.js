if (!Modernizr.input.placeholder) {
    $(document).ready(function() {
        $("input[placeholder]").each(function() {
            var 
            input = $(this),
            label = input.attr('placeholder')
            ;

            input.before('<label for="' + input.attr('id') +'" class="placeholderText">' + label + '</label>');
        });
    });
}
