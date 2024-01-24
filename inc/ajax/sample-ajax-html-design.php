<form action="" id="product_filter_form">

    <div class="accordion" id="accordionPanelsStayOpenExample">

        <div class="accordion-item">

            <h2 class="accordion-header">

                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#ordinamento"
                    aria-expanded="true" aria-controls="ordinamento">

                    ordinamento

                </button>

            </h2>

            <div id="ordinamento" class="accordion-collapse collapse show">

                <div class="accordion-body" term_taxonomy_name="special-category">

                    <div class="double-checks">

                        <div class="single-checkbox">

                            <div class="form-check">

                                <input value="ASC" name="orderby" class="term_filter_class_input" type="checkbox"
                                    id="az">

                                <label for="az"> A/Z </label>

                            </div>

                        </div>

                        <div class="single-checkbox">

                            <div class="form-check">

                                <input value="DESC" name="orderby" class="term_filter_class_input" type="checkbox"
                                    id="za">

                                <label for="za"> Z/A </label>

                            </div>

                        </div>

                    </div>

                    <div class="display_special_term">


                        <div class="single-checkbox">

                            <div class="form-check">

                                <input name="special-category[]" value="39" class="term_filter_class_input"
                                    type="checkbox" id="term_id_39">

                                <label class="term_filter_class" for="term_id_39"> i più venduti </label>

                            </div>

                        </div>


                        <div class="single-checkbox">

                            <div class="form-check">

                                <input name="special-category[]" value="40" class="term_filter_class_input"
                                    type="checkbox" id="term_id_40">

                                <label class="term_filter_class" for="term_id_40"> garanzia 25 anni </label>

                            </div>

                        </div>


                    </div>



                </div>

            </div>

        </div>


        <div class="accordion-item show_hide_in_out">

            <h2 class="accordion-header">

                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#inout"
                    aria-expanded="true" aria-controls="inout">

                    in /out

                </button>

            </h2>

            <div id="inout" class="accordion-collapse collapse show">

                <div class="accordion-body display_in_out_terms">


                    <div class="single-checkbox">

                        <div class="form-check">

                            <input name="in-out[]" value="35" class="term_filter_class_input" type="checkbox"
                                id="term_id_35">

                            <label class="term_filter_class" for="term_id_35"> da esterno </label>

                        </div>

                    </div>


                    <div class="single-checkbox">

                        <div class="form-check">

                            <input name="in-out[]" value="36" class="term_filter_class_input" type="checkbox"
                                id="term_id_36">

                            <label class="term_filter_class" for="term_id_36"> da interno </label>

                        </div>

                    </div>


                </div>

            </div>

        </div>


        <div class="accordion-item">

            <h2 class="accordion-header">

                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#tipodiparete"
                    aria-expanded="true" aria-controls="tipodiparete">

                    tipo di parete

                </button>

            </h2>

            <div id="tipodiparete" class="accordion-collapse collapse show">



                <div class="accordion-body display_di_parete_terms">


                    <div class="single-checkbox">

                        <div class="form-check">

                            <input name="tipo-di-parete[]" value="30" class="term_filter_class_input" type="checkbox"
                                id="term_id_30">

                            <label class="term_filter_class" for="term_id_30"> intonaco </label>

                        </div>

                    </div>


                    <div class="single-checkbox">

                        <div class="form-check">

                            <input name="tipo-di-parete[]" value="31" class="term_filter_class_input" type="checkbox"
                                id="term_id_31">

                            <label class="term_filter_class" for="term_id_31"> cartongesso </label>

                        </div>

                    </div>


                </div>

            </div>

        </div>


        <div class="accordion-item">

            <h2 class="accordion-header">

                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#misure"
                    aria-expanded="true" aria-controls="misure">

                    misure

                </button>

            </h2>

            <div id="misure" class="accordion-collapse collapse show">

                <div class="accordion-body">

                    <!-- 1 val for "LUCE DI PASSAGGIO" -->

                    <input type="hidden" id="luce_term_id" value="9">

                    <input class="final_pass_min" type="hidden" value="1">

                    <input class="final_pass_max" type="hidden" value="480">

                    <input class="final_largh_min" type="hidden" value="3">

                    <input class="final_largh_max" type="hidden" value="900">



                    <div class="passaggio-box">

                        <div class="title">LUCE DI PASSAGGIO</div>

                        <div class="price-range-slider">

                            <div class="test">

                                <div class="subtitle-flex">

                                    <div class="subtitle">altezza</div>

                                    <div class="allvalue-boxes">

                                        <span id="altezza-value1" class="value">1</span>

                                        <span id="separtor">-</span>

                                        <span id="altezza-value2" class="value ">480</span>

                                    </div>

                                </div>

                                <div id="altezza" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
                                    <div class="noUi-base">
                                        <div class="noUi-origin noUi-connect" style="left: 0%;">
                                            <div class="noUi-handle noUi-handle-lower"></div>
                                        </div>
                                        <div class="noUi-origin noUi-background" style="left: 100%;">
                                            <div class="noUi-handle noUi-handle-upper"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="hidden-range-input">

                                <input type="hidden" id="altezza-min-value" value="1">

                                <input type="hidden" id="altezza-max-value" value="480">

                            </div>

                        </div>

                        <div class="price-range-slider">

                            <div class="test">

                                <div class="subtitle-flex">

                                    <div class="subtitle">larghezza</div>

                                    <div class="allvalue-boxes">

                                        <span id="larghezza-value1" class="value">3</span>

                                        <span id="separtor">-</span>

                                        <span id="larghezza-value2" class="value">900</span>

                                    </div>

                                </div>

                                <div id="larghezza" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
                                    <div class="noUi-base">
                                        <div class="noUi-origin noUi-connect" style="left: 0%;">
                                            <div class="noUi-handle noUi-handle-lower"></div>
                                        </div>
                                        <div class="noUi-origin noUi-background" style="left: 100%;">
                                            <div class="noUi-handle noUi-handle-upper"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="hidden-range-input">

                                <input type="hidden" id="larghezza-min-value" value="3">

                                <input type="hidden" id="larghezza-max-value" value="900">

                            </div>

                        </div>

                    </div>

                    <!-- end item  -->

                    <input type="hidden" id="ingo_term_id" value="10">

                    <input class="final_ing_alt_min" type="hidden" value="8">

                    <input class="final_ing_alt_max" type="hidden" value="450">

                    <input class="final_ing_larg_min" type="hidden" value="6">

                    <input class="final_ing_larg_max" type="hidden" value="600">



                    <div class="ingombro-box">

                        <div class="title">Ingombro</div>

                        <div class="price-range-slider">

                            <div class="test">

                                <div class="subtitle-flex">

                                    <div class="subtitle">altezza</div>

                                    <div class="allvalue-boxes">

                                        <span id="ingaltezza-value1" class="value">8</span>

                                        <span id="separtor">-</span>

                                        <span id="ingaltezza-value2" class="value">450</span>

                                    </div>

                                </div>

                                <div id="ingaltezza" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
                                    <div class="noUi-base">
                                        <div class="noUi-origin noUi-connect" style="left: 0%;">
                                            <div class="noUi-handle noUi-handle-lower"></div>
                                        </div>
                                        <div class="noUi-origin noUi-background" style="left: 100%;">
                                            <div class="noUi-handle noUi-handle-upper"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="hidden-range-input">

                                <input type="hidden" id="ingaltezza-min-value" value="8">

                                <input type="hidden" id="ingaltezza-max-value" value="450">

                            </div>

                        </div>

                        <div class="price-range-slider">

                            <div class="test">

                                <div class="subtitle-flex">

                                    <div class="subtitle">larghezza</div>

                                    <div class="allvalue-boxes">

                                        <span id="inglarghezza-value1" class="value">6</span>

                                        <span id="separtor">-</span>

                                        <span id="inglarghezza-value2" class="value">600</span>

                                    </div>

                                </div>

                                <div id="inglarghezza" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
                                    <div class="noUi-base">
                                        <div class="noUi-origin noUi-connect" style="left: 0%;">
                                            <div class="noUi-handle noUi-handle-lower"></div>
                                        </div>
                                        <div class="noUi-origin noUi-background" style="left: 100%;">
                                            <div class="noUi-handle noUi-handle-upper"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="hidden-range-input">

                                <input type="hidden" id="inglarghezza-min-value" value="6">

                                <input type="hidden" id="inglarghezza-max-value" value="600">

                            </div>

                        </div>

                    </div>

                    <!-- end item  -->





                </div>

            </div>

        </div>


        <div class="accordion-item">

            <h2 class="accordion-header">

                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#tipodisupporto" aria-expanded="true" aria-controls="tipodisupporto">

                    tipo di supporto

                </button>

            </h2>

            <div id="tipodisupporto" class="accordion-collapse collapse show">

                <div class="accordion-body" term_taxonomy_name="collezione">




                    <div class="single-checkbox">

                        <div class="form-check">

                            <input name="collezione[]" value="12" class="term_filter_class_input" type="checkbox"
                                id="term_id_12">

                            <label class="term_filter_class" for="term_id_12"> controtelai per stipiti e coprifili
                            </label>

                        </div>

                    </div>


                    <div class="single-checkbox">

                        <div class="form-check">

                            <input name="collezione[]" value="14" class="term_filter_class_input" type="checkbox"
                                id="term_id_14">

                            <label class="term_filter_class" for="term_id_14"> controtelai senza stipiti e coprifili
                            </label>

                        </div>

                    </div>


                    <div class="single-checkbox">

                        <div class="form-check">

                            <input name="collezione[]" value="16" class="term_filter_class_input" type="checkbox"
                                id="term_id_16">

                            <label class="term_filter_class" for="term_id_16"> controtelai per utenze elettriche/idriche
                            </label>

                        </div>

                    </div>


                    <div class="single-checkbox">

                        <div class="form-check">

                            <input name="collezione[]" value="18" class="term_filter_class_input" type="checkbox"
                                id="term_id_18">

                            <label class="term_filter_class" for="term_id_18"> controtelai in kit </label>

                        </div>

                    </div>


                    <div class="single-checkbox">

                        <div class="form-check">

                            <input name="collezione[]" value="20" class="term_filter_class_input" type="checkbox"
                                id="term_id_20">

                            <label class="term_filter_class" for="term_id_20"> kit scorrevoli esteno muro </label>

                        </div>

                    </div>


                    <div class="single-checkbox">

                        <div class="form-check">

                            <input name="collezione[]" value="22" class="term_filter_class_input" type="checkbox"
                                id="term_id_22">

                            <label class="term_filter_class" for="term_id_22"> controtelai per esterno </label>

                        </div>

                    </div>




                </div>

            </div>

        </div>


        <div class="accordion-item">

            <h2 class="accordion-header">

                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collezione"
                    aria-expanded="true" aria-controls="collezione">

                    COLLEZIONE

                </button>

            </h2>

            <div id="collezione" class="accordion-collapse collapse show">

                <div class="accordion-body" term_taxonomy_name="collezione">




                    <div class="single-checkbox">

                        <div class="form-check">

                            <input name="collezione[]" value="11" class="term_filter_class_input" type="checkbox"
                                id="term_id_11">

                            <label class="term_filter_class" for="term_id_11"> classic </label>

                        </div>

                    </div>


                    <div class="single-checkbox">

                        <div class="form-check">

                            <input name="collezione[]" value="13" class="term_filter_class_input" type="checkbox"
                                id="term_id_13">

                            <label class="term_filter_class" for="term_id_13"> linear </label>

                        </div>

                    </div>


                    <div class="single-checkbox">

                        <div class="form-check">

                            <input name="collezione[]" value="15" class="term_filter_class_input" type="checkbox"
                                id="term_id_15">

                            <label class="term_filter_class" for="term_id_15"> magic box </label>

                        </div>

                    </div>


                    <div class="single-checkbox">

                        <div class="form-check">

                            <input name="collezione[]" value="17" class="term_filter_class_input" type="checkbox"
                                id="term_id_17">

                            <label class="term_filter_class" for="term_id_17"> skudo </label>

                        </div>

                    </div>


                    <div class="single-checkbox">

                        <div class="form-check">

                            <input name="collezione[]" value="19" class="term_filter_class_input" type="checkbox"
                                id="term_id_19">

                            <label class="term_filter_class" for="term_id_19"> wallout </label>

                        </div>

                    </div>


                    <div class="single-checkbox">

                        <div class="form-check">

                            <input name="collezione[]" value="21" class="term_filter_class_input" type="checkbox"
                                id="term_id_21">

                            <label class="term_filter_class" for="term_id_21"> outdoor </label>

                        </div>

                    </div>


                </div>

            </div>

        </div>


        <div class="accordion-item">

            <h2 class="accordion-header">

                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#colore"
                    aria-expanded="true" aria-controls="colore">

                    colore

                </button>

            </h2>
            <div id="colore" class="accordion-collapse collapse show">
                <div class="accordion-body" term_taxonomy_name="colore">
                    <div class="single-checkbox">
                        <div class="form-check">
                            <input name="colore[]" value="23" class="term_filter_class_input" type="checkbox"
                                id="term_id_23">
                            <label class="term_filter_class" for="term_id_23"> bianco </label>
                        </div>
                    </div>
                    <div class="single-checkbox">
                        <div class="form-check">
                            <input name="colore[]" value="24" class="term_filter_class_input" type="checkbox"
                                id="term_id_24">
                            <label class="term_filter_class" for="term_id_24"> nero </label>
                        </div>
                    </div>
                    <div class="single-checkbox">
                        <div class="form-check">
                            <input name="colore[]" value="25" class="term_filter_class_input" type="checkbox"
                                id="term_id_25">
                            <label class="term_filter_class" for="term_id_25"> acciaio opaco </label>
                        </div>
                    </div>
                    <div class="single-checkbox">
                        <div class="form-check">
                            <input name="colore[]" value="26" class="term_filter_class_input" type="checkbox"
                                id="term_id_26">
                            <label class="term_filter_class" for="term_id_26"> acciaio lucido </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>
