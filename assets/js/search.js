"use strict";

(function () {
    document.addEventListener("DOMContentLoaded", function () {

        if(document.querySelector('.mod_faqpage')) {
            let results = 0,
                searchFields = [],
                searchHeadlines = document.querySelectorAll('.mod_faqpage section h3'),
                searchTexts = document.querySelectorAll('.mod_faqpage section .ce_text p'),

                html = document.getElementsByTagName('html'),
                lang = html[0].getAttribute('lang'),

                resultHint = document.getElementById('result_hint'),
                hint = '';

            searchFields.push(...searchHeadlines);
            searchFields.push(...searchTexts);

            function showHint(results) {

                if(results) {
                    // ToDo: implement translations via data attribute
                    if(lang == 'de') hint = `Es wurden ${results} Treffer gefunden und <mark>markiert</mark>.`;
                    if(lang == 'en') hint = `${results} results found and <mark>marked</mark>.`;
                }
                else {
                    // ToDo: implement translations via data attribute
                    if(lang == 'de') hint = `Es wurden leider keine Treffer gefunden.`;
                    if(lang == 'en') hint = `Sorry, no results found.`;
                }

                resultHint.style.display = 'block';
                resultHint.innerHTML = hint;
            }

            function search() {
                const searchTerms = document.getElementById('ctrl_faq_keywords').value.trim().split(",");
                searchFields.forEach(function(e, i) {
                    if(searchTerms.length >= 1 && searchTerms[0] !== '') {
                        searchTerms.forEach(function(t, i) {
                            if(e.innerText.toLowerCase().indexOf(t.toLowerCase()) >= 0) {
                                let s = e.innerHTML;
                                e.innerHTML = s.replace(
                                    new RegExp(t, 'ig'),
                                    function(match) {
                                        results = results+1;
                                        return `<mark>${match}</mark>`;
                                    }
                                )
                            }
                        })
                    }
                })
                showHint(results);
            }

            // ToDo: Hinweisbox vereinfachen
            function clear() {
                results = 0;
                resultHint.style.display = 'none';

                document.getElementById('ctrl_faq_keywords').value = '';

                searchFields.forEach(function(e, i) {
                    const s = e.innerHTML;
                    e.innerHTML = s.replace(/<mark>/g, "").replace(/<\/mark>/g, "")
                })
            }
            document.getElementById('ctrl_submit_faqsearch').addEventListener('click', function(e){
                e.preventDefault();
                search();
            });
            document.getElementById('ctrl_faq_keywords').addEventListener('focus', function(e){
                e.preventDefault();
                clear();
            });
            // ToDo: Reset-Button für Eingabefeld funzt nicht
            document.getElementById('ctrl_reset_faqsearch').addEventListener('click', function(e){
                e.preventDefault();
                clear();
            });
        }
    })
})();
