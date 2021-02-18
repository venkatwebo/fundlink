<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.js"></script>
<script src="<?php echo scriptjs($path = "", $type = "fe");  ?>jquery.min.js"></script>
<script src="<?php echo scriptjs($path = "", $type = "fe");  ?>popper.min.js"></script>
<script src="<?php echo scriptjs($path = "", $type = "fe");  ?>bootstrap.min.js"></script>
<script src="<?php echo scriptjs($path = "", $type = "fe");  ?>owl.carousel.js"></script>
<script src="<?php echo scriptjs($path = "", $type = "fe");  ?>jquery.easing.min.js"></script>
<script src="<?php echo scriptjs($path = "", $type = "fe");  ?>navigation.js"></script>
<script src="<?php echo scriptjs($path = "", $type = "fe");  ?>header.js"></script>
<script src='<?php echo scriptjs($path = "", $type = "fe");  ?>rangeslider.js'></script>
<script src="<?php echo scriptjs($path = "", $type = "fe");  ?>main.js"></script>
<script src="<?php echo scriptjs($path = "", $type = "fe");  ?>jquery_slider/rangeslider.js"></script>
<script>
    $(function() {
        var $document = $(document),
            selector = '[data-rangeslider]',
            $element = $(selector);
        // Example functionality to demonstrate a value feedback
        function valueOutput(element) {
            var value = element.value,
                output = element.parentNode.getElementsByTagName('output')[0];
            output.innerHTML = value;
        }
        for (var i = $element.length - 1; i >= 0; i--) {
            valueOutput($element[i]);
        };
        $document.on('change', 'input[type="range"]', function(e) {
            valueOutput(e.target);
        });

        // Example functionality to demonstrate disabled functionality
        $document.on('click', '#js-example-disabled button[data-behaviour="toggle"]', function(e) {
            var $inputRange = $('input[type="range"]', e.target.parentNode);

            if ($inputRange[0].disabled) {
                $inputRange.prop("disabled", false);
            } else {
                $inputRange.prop("disabled", true);
            }
            $inputRange.rangeslider('update');
        });

        // Example functionality to demonstrate programmatic value changes
        $document.on('click', '#js-example-change-value button', function(e) {
            var $inputRange = $('input[type="range"]', e.target.parentNode),
                value = $('input[type="number"]', e.target.parentNode)[0].value;

            $inputRange.val(value).change();
        });

        // Example functionality to demonstrate destroy functionality
        $document
            .on('click', '#js-example-destroy button[data-behaviour="destroy"]', function(e) {
                $('input[type="range"]', e.target.parentNode).rangeslider('destroy');
            })
            .on('click', '#js-example-destroy button[data-behaviour="initialize"]', function(e) {
                $('input[type="range"]', e.target.parentNode).rangeslider({
                    polyfill: false
                });
            });

        // Example functionality to test initialisation on hidden elements
        $document
            .on('click', '#js-example-hidden button[data-behaviour="toggle"]', function(e) {
                var $container = $(e.target.previousElementSibling);
                $container.toggle();
            });

        // Basic rangeslider initialization
        $element.rangeslider({

            // Deactivate the feature detection
            polyfill: false,

            // Callback function
            onInit: function() {},

            // Callback function
            onSlide: function(position, value) {
                console.log('onSlide');
                console.log('position: ' + position, 'value: ' + value);
            },

            // Callback function
            onSlideEnd: function(position, value) {
                console.log('onSlideEnd');
                console.log('position: ' + position, 'value: ' + value);
            }
        });

    });
</script>