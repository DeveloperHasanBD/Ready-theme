

(function ($) {
    $(document).ready(function () {

        var url = action_url_ajax.ajax_url;
        const selectedCategory = [];
        const spinner = `<div class="text-center" style="height:150px"> <div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>`;

        let currentPage = 1;
        let activeFilters = new FormData($('#ricerca_avanzata_filter')[0]);


        // Function to load products (for filter or pagination)
        function loadProducts(loadMore = false,selectedCategory,is_mobile= false) {
            if (!loadMore) currentPage = 1; // Reset page on new filter
            let search = $('#ricerca_search_input_des').val() || $('#mobileSearch').val() || '';
            activeFilters = new FormData($('#ricerca_avanzata_filter')[0]);
            activeFilters.append('action', 'ricerca_avanzata_filter_action');
            activeFilters.append('search', search);
            activeFilters.append('paged', currentPage);
            activeFilters.append('selectedCategory', selectedCategory);
            activeFilters.append('is_mobile', is_mobile);
            console.log('activeFilters',activeFilters)
            $.ajax({
                type: 'POST',
                url: url,
                data: activeFilters,
                processData: false,
                contentType: false,
                dataType: 'json',
                beforeSend: function () {
                    $('#loading_id').html(spinner);
                    $('.mobile_filter_btn').html(spinner);
                },
                success: function (response) {
                    const filters = response?.mobile_filters || {};
                    const ambienti_html = filters.ambienti_html || '';
                    const categorie_html = filters.categorie_html || '';
                    const marchi_html = filters.marchi_html || '';
                    const disponibilita_html = filters.disponibilita_html || '';
                    
                    $('#ambienti_mobile_filter').html(filters.ambienti_html || '');
                    $('#category_mobile_filter').html(filters.categorie_html || '');
                    $('#marchi_mobile_filter').html(filters.marchi_html || '');
                    $('#disponibilitai_mobile_filter').html(filters.disponibilita_html || '');
                    
                    if(ambienti_html){
                        $('#ambienti_tab_title').removeClass('d-none');
                        $('#ambienti-tab-pane').removeClass('d-none');
                    }else{
                        $('#ambienti_tab_title').addClass('d-none');
                        $('#ambienti-tab-pane').addClass('d-none');
                    } 
                    
                    if(categorie_html){
                        $('#categorie_tab_title').removeClass('d-none');
                        $('#categorie-tab-pane').removeClass('d-none');
                    }else{
                        $('#categorie_tab_title').addClass('d-none');
                        $('#categorie-tab-pane').addClass('d-none');
                    }  
                    
                    if(marchi_html){
                        $('#marchi_tab_title').removeClass('d-none');
                        $('#marchi-tab-pane').removeClass('d-none');
                    }else{
                        $('#marchi_tab_title').addClass('d-none');
                        $('#marchi-tab-pane').addClass('d-none');
                    }   
                    
                    if(disponibilita_html){
                        $('#disponibilitaies_m_filter').removeClass('d-none');
                    }else{
                        $('#disponibilitaies_m_filter').addClass('d-none');
                    }
                    
                    $('#loading_id').html('');
                    $('.mobile_filter_btn').html('cerca');
                    // $('.mobile-filter-sidebar').removeClass('show');
                    // Update products
                    if (loadMore) {
                        $('#filter_product_container').append(response.products_html);
                    } else {
                        $('#filter_product_container').html(response.products_html);
                    }

                    // Update filters dynamically
                    $('#desktop_filter_content').html(response.filters_html);
                    $('.fiter-result').html(`${response.total} risultati`);
                    // Update Load More visibility
                    if (response.has_more) {
                        $('.load-more-btn').show();
                    } else {
                        $('.load-more-btn').hide();
                    }
                },
                error: function (xhr, status, error) {
                    console.log('AJAX Error:', error);
                    $('#loading_id').html('');
                    $('.mobile_filter_btn').html('cerca');
                }
            });
        }

        // Filter change event
        $('body').on('change', '.change_ricerca_filter', function () {
            const name = $(this).attr('name').replace(/\[\]$/, '');
            if (!selectedCategory.includes(name)) {
                selectedCategory.push(name);
            }
            loadProducts(false,selectedCategory);
        });        
        
        $('body').on('change', '.mobile_term_filter', function () {
            loadProducts(false,selectedCategory,true);
        });

        // Load more button click
        $('body').on('click', '.load-more-btn', function (e) {
            e.preventDefault();
            currentPage++;
            loadProducts(true,selectedCategory);
        });

        $('body').on('click', '.ricerca_filter_btn', function (e) {
            e.preventDefault();
            loadProducts(false,selectedCategory);
        })
        $('body').on('click', '.mobile_filter_btn', function (e) {
            e.preventDefault();
            // loadProducts(false,selectedCategory,true);
            $('.mobile-filter-sidebar').removeClass('show');
        })
        
        $('body').on('click', '.mobile-serach-btn', function (e) {
            e.preventDefault();
            loadProducts(false,selectedCategory);
        })

        const currentPath = window.location.pathname;

        if (currentPath.includes('ricerca-avanzata')) {
            loadProducts(false,selectedCategory);
        }
        

        $("body").delegate('.single-accrodion-group', 'click', function (e) {
            const title = $(this)
                        .find('.accordion-header h3')
                        .text()
                        .trim();
                        
            const index = selectedCategory.indexOf(title);
            if (index !== -1) {
                selectedCategory.splice(index, 1);
            }
        });
        
        // $("body").delegate('.term_filter_class_input', 'click', function (e) {

        //     const spinner = `<div class="text-center" style="height:150px">
        //     <div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>`;
        //     $('.display_filter_data').html(spinner);

        //     const input_id = $(this).attr('id');
        //     if ($(`#${input_id}`).prop("checked") == true) {
        //         $(`#${input_id}`).prop("checked", true);
        //     } else {
        //         $(`#${input_id}`).prop("checked", false);
        //     }

        //     let value = $(this).val();
        //     if (value == 'ASC') {
        //         $(`#za`).prop("checked", false);
        //     }
        //     if (value == 'DESC') {
        //         $(`#az`).prop("checked", false);
        //     }
        //     var form = new FormData($('#product_filter_form')[0]);
        //     form.append("action", 'product_filter_form_action');
        //     form.append("slider_filter_items", encodeURIComponent(JSON.stringify(slider_filter_items)));
        //     jQuery.ajax({
        //         type: 'POST',
        //         url: url,
        //         data: form,
        //         processData: false,
        //         contentType: false,
        //         dataType: 'JSON',
        //         success: function (data) {
        //             if (data.error == true) {
        //                 alert(data.message);
        //             } else {
        //                 console.log(data.results);
        //                 $(".display_filter_data").html(data.results.post_tems);
        //                 $("#accordionPanelsStayOpenExample").html(data.results.left_side_html);
        //                 range_slider(data.results.is_lc_passaggio_term_id, data.results.is_ing_ingombro_term_id);
        //             }
        //         },
        //     });
        // });






        // nel mondo country search 
        // $("#nl_mnd_country_search").on('keyup', function () {
        //   var input_value = $("#nl_mnd_country_search").val();
        //   var input_value_length = input_value.length;
        //   if (input_value_length > 0) {
        //     $.ajax({
        //       url: url,
        //       data: {
        //         action: 'nel_mondo_country_search',
        //         input_value: input_value,
        //       },
        //       dataType: "json",
        //       type: 'post',
        //       success: function (data) {
        //         $(".crzf_country_list").html(data);
        //       },
        //     });
        //   } else {
        //     $.ajax({
        //       url: url,
        //       data: {
        //         action: 'existing_nel_mondo_country_search',
        //         input_value: input_value,
        //       },
        //       dataType: "json",
        //       type: 'post',
        //       success: function (data) {
        //         $(".crzf_country_list").html(data);
        //       },
        //     });
        //   }
        // });













    $(document).on('input', 'input[name="header-search"]', function () {
        this.value = this.value.toLowerCase();
    });    

    });

})(jQuery)
