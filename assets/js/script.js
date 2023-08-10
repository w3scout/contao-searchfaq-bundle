/*
"use strict";

(function () {
    document.addEventListener("DOMContentLoaded", function() {

        let searchTerm,
            results= 0,
            faqSearchTerm = document.getElementById('faq_search_term'),
            submitBtn = document.getElementById('ctrl_submit_faqsearch');



        faqSearchTerm.addEventListener('click', function () {
            console.log('click faqSearchTerm');
            results = 0;
            reset();
        });

        submitBtn.addEventListener('click', function () {
            console.log('click submitBtn');

            results=0;
            searchTerm = faqSearchTerm.value.trim().split(" ");
            if(searchTerm.length == 0) return;


        })
    })
});



    jQuery(function($) {
    var searchTerm,
    results=0;

    $('#faq_search').on('click', function () {
        results=0;reset();
    });

    $('.search').on('click', function () {
        results=0;
        searchTerm = $('#faq_search').val();
        if(searchTerm.length == 0) return;

        $('.accordion').each(function () {
            if($(this).text().toUpperCase().indexOf(searchTerm.toUpperCase()) >= 0) {
                $(this).html(
                    $(this).html().replace(
                        new RegExp(searchTerm, "ig"),
                        function(match) {
                            return '<mark>' + match + '</mark>';
                        }
                    )
                ).show().parent().children('.toggler').addClass('accordion-header-active active ui-state-active').attr('aria-selected', 'true');
                results++;
            }
        });

        if(results>0) {
            $('.alert').addClass('alert-success').html(results+' Matches.').css('display', 'block');
        }
        else {
            $('.alert').addClass('alert-danger').html('No matches.').css('display', 'block');
        }
    });
    $('.reset').on('click', function() {
        reset();
    });
    function reset() {
        $('.alert').removeClass('alert-danger alert-success').css('display', 'none').text('');

        searchTerm = $('#faq_search').val();
        if(searchTerm == undefined || searchTerm.length == 0) return;
        $('#faq_search').val('');

        $('.accordion').each(function () {
            if($(this).text().toUpperCase().indexOf(searchTerm.toUpperCase()) >= 0) {
                $(this).html(
                    $(this).html().replace(/<mark>/g, "").replace(/<\/mark>/g, "")
                ).hide().parent().children('.toggler').removeClass('accordion-header-active active ui-state-active').attr('aria-selected', 'false');
            }
        });
    }
});

 */
