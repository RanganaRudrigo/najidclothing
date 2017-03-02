/**
 * Created by Gowtham on 5/17/2016.
 */


//global variables
var selectedCombination = null;
var globalQuantity = 0;
var colors = [];
var size_id = 0;
var colors_id = 0;

$(document).ready(function(){

    //init the serialScroll for thumbs
    $('#thumbs_list').serialScroll({
        items:'li:visible',
        prev:'#view_scroll_left',
        next:'#view_scroll_right',
        axis:'x',
        offset:0,
        start:0,
        stop:true,
        onBefore:serialScrollFixLock,
        duration:700,
        step: 2,
        lazy: true,
        lock: false,
        force:false,
        cycle:false
    });

    $('#thumbs_list').trigger('goto', 1);// SerialScroll Bug on goto 0 ?
    $('#thumbs_list').trigger('goto', 0);

     

    //set jqZoom parameters if needed
    if (typeof(jqZoomEnabled) != 'undefined' && jqZoomEnabled)
    {
        $('.jqzoom').jqzoom({
            zoomType: 'innerzoom', //innerzoom/standard/reverse/drag
            zoomWidth: 458, //zooming div default width(default width value is 200)
            zoomHeight: 458, //zooming div default width(default height value is 200)
            xOffset: 21, //zooming div default offset(default offset value is 10)
            yOffset: 0,
            title: false
        });
    }
    //add a link on the span 'view full size' and on the big image
    $(document).on('click', '#view_full_size, #image-block', function(e){
        $('#views_block .shown').click();
    });

    //catch the click on the "more infos" button at the top of the page
    $(document).on('click', '#short_description_block .button', function(e){
        $('#more_info_tab_more_info').click();
        $.scrollTo( '#more_info_tabs', 1200 );
    });

    // Hide the customization submit button and display some message
    $(document).on('click', '#customizedDatas input', function(e){
        $('#customizedDatas input').hide();
        $('#ajax-loader').fadeIn();
        $('#customizedDatas').append(uploading_in_progress);
    });

    original_url = window.location + '';
    first_url_check = true;

    // color id
    // size id
    var url_value = checkUrl();
 

    if(attribute_available) {
        if(!url_value){
            findCombination(false);
        }else{
            $('#availability_value').text('Please Select Color');
            $(".box-cart-bottom").fadeOut(600);
        }
    }else{
         colors_id = 1 ;
         size_id = 1 ;
        findCombination(false);
    }





/*

    displaySize();
    findCombination(true);


    var url_found = checkUrl();
    initLocationChange();

    findCombination(true);*/

    if (contentOnly == false)
    {
        if (!!$.prototype.fancybox)
            $('li:visible .fancybox, .fancybox.shown').fancybox({
                'hideOnContentClick': true,
                'openEffect'	: 'elastic',
                'closeEffect'	: 'elastic'
            });
    }
    else
    {
        $(document).on('click', '.fancybox', function(e){
            e.preventDefault();
        });

        $(document).on('click', '#image-block', function(e){
            e.preventDefault();
            var productUrl = window.document.location.href + '';
            var data = productUrl.replace('content_only=1', '');
            window.parent.document.location.href = data;
            return;
        });

        if (typeof ajax_allowed != 'undefined' && !ajax_allowed)
            $('#buy_block').attr('target', '_top');
    }

    if (!!$.prototype.bxSlider)
        $('#bxslider').bxSlider({
            minSlides: 1,
            maxSlides: 6,
            slideWidth: 178,
            slideMargin: 20,
            pager: false,
            nextText: '',
            prevText: '',
            moveSlides:1,
            infiniteLoop:false,
            hideControlOnEnd: true
        });

    // The button to increment the product value
    $(document).on('click', '.product_quantity_up', function(e){
        e.preventDefault();
        fieldName = $(this).data('field-qty');
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        if (quantityAvailable > 0)
            quantityAvailableT = quantityAvailable;
        else
            quantityAvailableT = 100000000;
        if (!isNaN(currentVal) && currentVal < quantityAvailableT)
            $('input[name='+fieldName+']').val(currentVal + 1).trigger('keyup');
        else
            $('input[name='+fieldName+']').val(quantityAvailableT);
    });
    // The button to decrement the product value
    $(document).on('click', '.product_quantity_down', function(e){
        e.preventDefault();
        fieldName = $(this).data('field-qty');
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        if (!isNaN(currentVal) && currentVal > 1)
            $('input[name='+fieldName+']').val(currentVal - 1).trigger('keyup');
        else
            $('input[name='+fieldName+']').val(1);
    });

    if (typeof minimalQuantity != 'undefined' && minimalQuantity)
    {
        checkMinimalQuantity();
        $(document).on('keyup', 'input[name=qty]', function(e){
            checkMinimalQuantity(minimalQuantity);
        });
    }

    if (typeof ad !== 'undefined' && ad && typeof adtoken !== 'undefined' && adtoken)
    {
        $(document).on('click', 'input[name=publish_button]', function(e){
            e.preventDefault();
            submitPublishProduct(ad, 0, adtoken);
        });
        $(document).on('click', 'input[name=lnk_view]', function(e){
            e.preventDefault();
            submitPublishProduct(ad, 1, adtoken);
        });
    }

    if (typeof product_fileDefaultHtml !== 'undefined')
        $.uniform.defaults.fileDefaultHtml = product_fileDefaultHtml;
    if (typeof product_fileButtonHtml !== 'undefined')
        $.uniform.defaults.fileButtonHtml = product_fileButtonHtml;



    $(document).on('click', '.color_pick', function(e){
        e.preventDefault();
        colorPickerClick($(this));
        findCombination(false);
        getProductAttribute();
    });

    $(document).on('change', '#attributes select', function(e){
        e.preventDefault();
        size_id = $(this).val();
        findCombination(false);
        getProductAttribute();
    });





});


// Serialscroll exclude option bug ?
function serialScrollFixLock(event, targeted, scrolled, items, position)
{
    serialScrollNbImages = $('#thumbs_list li:visible').length;
    serialScrollNbImagesDisplayed = 3;

    var leftArrow = position == 0 ? true : false;
    var rightArrow = position + serialScrollNbImagesDisplayed >= serialScrollNbImages ? true : false;

    $('#view_scroll_left').css('cursor', leftArrow ? 'default' : 'pointer').css('display', leftArrow ? 'none' : 'block').fadeTo(0, leftArrow ? 0 : 1);
    $('#view_scroll_right').css('cursor', rightArrow ? 'default' : 'pointer').fadeTo(0, rightArrow ? 0 : 1).css('display', rightArrow ? 'none' : 'block');
    return true;
}


function initLocationChange(time)
{
    if (!time) time = 500;
    setInterval(checkUrl, time);
}

function oldcheckUrl()
{
    if (original_url != window.location || first_url_check)
    {
        first_url_check = false;
        url = window.location + '';
        // if we need to load a specific combination
        if (url.indexOf('#/') != -1)
        {
            // get the params to fill from a "normal" url
            params = url.substring(url.indexOf('#') + 1, url.length);
            tabParams = params.split('/');
            tabValues = [];
            if (tabParams[0] == '')
                tabParams.shift();
            for (var i in tabParams)
                tabValues.push(tabParams[i].split(attribute_anchor_separator));
            product_id = $('#product_page_product_id').val();
            // fill html with values
            $('.color_pick').removeClass('selected');
            $('.color_pick').parent().parent().children().removeClass('selected');
            count = 0;

            for (var z in tabValues)
                for (var a in attributesCombinations)
                    if (attributesCombinations[a]['group'] === decodeURIComponent(tabValues[z][0])
                        && attributesCombinations[a]['attribute'] === decodeURIComponent(tabValues[z][1]))
                    {


                        count++;
                        // add class 'selected' to the selected color
                        $('#color_' + attributesCombinations[a]['id_attribute']).addClass('selected');
                        $('#color_' + attributesCombinations[a]['id_attribute']).parent().addClass('selected');
                        $('input:radio[value=' + attributesCombinations[a]['id_attribute'] + ']').attr('checked', true);
                        $('input[type=hidden][name=group_' + attributesCombinations[a]['id_attribute_group'] + ']').val(attributesCombinations[a]['id_attribute']);
                        debugger ;

                        $('select[name=group_3]').val(attributesCombinations[a]['id_attribute']);
                    }

            // find combination
            if (count >= 0)
            {
                //findCombination(false);
                original_url = url;
                return true;
            }
            // no combination found = removing attributes from url
            else
                window.location = url.substring(0, url.indexOf('#'));
        }
    }
    return false;
}


function checkUrl(){
    url = window.location + '';
    count = 0;
    // if we need to load a specific combination
    if (url.indexOf('#/') != -1) {
        // get the params to fill from a "normal" url
        params = url.substring(url.indexOf('#') + 1, url.length);
        tabParams = params.split('/');
        tabValues = [];
        if (tabParams[0] == '')
            tabParams.shift();
        for (var i in tabParams)
            tabValues.push(tabParams[i].split(attribute_anchor_separator));
        product_id = $('#product_page_product_id').val();
        // fill html with values
        $('.color_pick').removeClass('selected');
        $('.color_pick').parent().parent().children().removeClass('selected');

        for (var z in tabValues)
            for (var a in attributesCombinations)
                if (attributesCombinations[a]['group'] === decodeURIComponent(tabValues[z][0])
                    && attributesCombinations[a]['attribute'] === decodeURIComponent(tabValues[z][1]))
                {
                    count++;
                    if(attributesCombinations[a]['group'] == 'color' ){
                        colors_id  = attributesCombinations[a]['id_attribute'];
                        $('#color_' + attributesCombinations[a]['id_attribute']).addClass('selected')
                            .parent().addClass('selected');
                        displaySize();
                    }else{
                        size_id = attributesCombinations[a]['id_attribute'];
                        $("#size_picker").val(size_id);
                    }
                }

    }

    return !count ;
}


function checkMinimalQuantity(minimal_quantity)
{
    if ($('#quantity_wanted').val() < minimal_quantity)
    {
        $('#quantity_wanted').css('border', '1px solid red');
        $('#minimal_quantity_wanted_p').css('color', 'red');
    }
    else
    {
        $('#quantity_wanted').css('border', '1px solid #BDC2C9');
        $('#minimal_quantity_wanted_p').css('color', '#374853');
    }
}

function colorPickerClick(elt)
{
    id_attribute = $(elt).attr('id').replace('color_', '');
    $(elt).parent().parent().children().removeClass('selected');
    $(elt).fadeTo('fast', 1, function(){
        $(this).fadeTo('fast', 0, function(){
            $(this).fadeTo('fast', 1, function(){
                $(this).parent().addClass('selected');
            });
        });
    });
    $(elt).parent().parent().parent().children('.color_pick_hidden').val(id_attribute);

    if( combinationsFromController[id_attribute] != 'undefined' ){
        displaySize();
    }
    colors_id = id_attribute ;
    size_id = 0;
    displaySize();
}

function  displaySize() {

    if( typeof colors_id == 'undefined' )
        colors_id = $("input[name=group_2]").val();

    var option ="";
    if($("select[name=group_3]").length && colors_id != "" ){
        for (var i in combinationsFromController[colors_id]['size'] ){
            if(i == 0 ) size_id = combinationsFromController[colors_id]['size'][i]['option_detail_id'] ;
            option += "<option " +
                " value='"+combinationsFromController[colors_id]['size'][i]['option_detail_id'] + "' " +
                "title='"+combinationsFromController[colors_id]['size'][i]['size'] +"'  > "+
                combinationsFromController[colors_id]['size'][i]['size'] +
                "</option>";
        }
        $("#size_picker").html(option);
    }

}


function getProductAttribute()
{
    // get product attribute id
    product_attribute_id = $('#idCombination').val();
    product_id = $('#product_page_product_id').val();

    // get every attributes values
    request = '';
    //create a temporary 'tab_attributes' array containing the choices of the customer
    var tab_attributes = [];
    var radio_inputs = parseInt($('#attributes .checked > input[type=radio]').length);
    if (radio_inputs)
        radio_inputs = '#attributes .checked > input[type=radio]';
    else
        radio_inputs = '#attributes input[type=radio]:checked';

    $('#attributes select, #attributes input[type=hidden], ' + radio_inputs).each(function(){
        tab_attributes.push($(this).val());
    });

    // build new request
    for (var i in attributesCombinations)
        for (var a in tab_attributes)
            if (attributesCombinations[i]['id_attribute'] === tab_attributes[a])
                request += '/'+attributesCombinations[i]['group'] + attribute_anchor_separator + attributesCombinations[i]['attribute'];
    request = request.replace(request.substring(0, 1), '#/');
    url = window.location + '';

    // redirection
    if (url.indexOf('#') != -1)
        url = url.substring(0, url.indexOf('#'));

    // set ipa to the customization form
    $('#customizationForm').attr('action', $('#customizationForm').attr('action') + request);
    window.location = url + request;
}

//check if a function exists
function function_exists(function_name)
{
    if (typeof function_name == 'string')
        return (typeof window[function_name] == 'function');
    return (function_name instanceof Function);
}


// search the combinations' case of attributes and update displaying of availability, prices, ecotax, and image
function findCombination(firstTime) {

    //create a temporary 'choice' array containing the choices of the customer

    var choice = [];
    choice.push(colors_id);
    choice.push(size_id);

    if (typeof combinations == 'undefined' || !combinations)
        combinations = [];
    selectedCombination = null;
    for ( var combination in  combinations ){
        //verify if this combinaison is the same that the user's choice
        var combinationMatchForm = true; 
        $.each(combinations[combination]['attributes'], function(key, value)
        {
            if (!in_array(parseInt(value), choice))
                combinationMatchForm = false;
        });

       if(combinationMatchForm){
           $("#idCombination").val(combination);
           id_attribute = combination;
           selectedCombination = combinations[combination];
       }
    }

    updateDisplay();
    
}


 function updateDisplay(){

    if(  selectedCombination != null  && selectedCombination.quantity ){
        $("#our_price_display").html(selectedCombination['price'] + currencySign );
        $('#availability_value').text('In stock')
        $(".box-cart-bottom").fadeIn(600);
    }else{
        if(  selectedCombination != null )
            $("#our_price_display").html(selectedCombination['price'] + currencySign );
         $('#availability_value').text(doesntExistNoMore + (globalQuantity > 0 ? ' ' + doesntExistNoMoreBut : ''));
        $(".box-cart-bottom").fadeOut(600);
    }
 }
