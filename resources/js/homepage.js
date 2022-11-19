import $ from 'jquery';
import select2 from 'select2'
window.$ = window.jQuery = $;

$(document).ready(function() {
    $('.js-example-disabled-results').select2();
});
