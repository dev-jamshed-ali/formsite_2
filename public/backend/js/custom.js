(function ($) {
    "use strict";
    
    if($(".editor").length){ 
        $(".editor").summernote({
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['fontname', 'fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['link', ['link']],
                ['picture', ['picture']],
                ['video', ['video']],
                ['fullscreen', ['fullscreen']],
                ['codeview', ['codeview']],
                ['undo', ['undo']],
                ['help', ['help']],
                
            ],
            lineHeights: ['0.5', '0.75', '1.0', '1.25', '1.5', '1.75', '2.0', '2.5', '3.0'],
            fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Helvetica Neue', 'Helvetica', 'Impact', 'Lucida Grande', 'Tahoma', 'Times New Roman', 'Verdana','Montserrat'],
            fontNamesIgnoreCheck: ['Montserrat'],
            styleTags: ['p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'],
            defaultFontName: 'Montserrat',
            colors: [
                ['#000000', '#424242', '#636363', '#9C9C94', '#CEC6CE', '#EFEFEF', '#F7F7F7', '#FFFFFF'],
                ['#FF0000', '#FF9C00', '#FFFF00', '#00FF00', '#00FFFF', '#0000FF', '#9C00FF', '#FF00FF'],
                ['#F4CCCC', '#FCE5CD', '#FFF2CC', '#D9EAD3', '#D0E0E3', '#C9DAF8', '#CFE2F3', '#D9D2E9'],
                ['#EA9999', '#F9CB9C', '#FFE599', '#B6D7A8', '#A2C4C9', '#A4C2F4', '#9FC5E8', '#B4A7D6'],
                ['#E06666', '#F6B26B', '#FFD966', '#93C47D', '#76A5AF', '#6D9EEB', '#6FA8DC', '#8E7CC3'],
                ['#C00', '#F90', '#FF0', '#0F0', '#0FF', '#00F', '#90F', '#F0F'],
                ['#f44336', '#e91e63', '#9c27b0', '#673ab7', '#3f51b5', '#2196f3', '#03a9f4', '#00bcd4', '#009688', '#4CAF50', '#8BC34A', '#CDDC39', '#FFEB3B', '#FFC107', '#FF9800', '#FF5722', '#795548', '#9E9E9E', '#607D8B', '#000000']
            ],
            tabsize: 2,
            height: 300,
            
        });
    } 
    if($("#datepicker").length){
        $("#datepicker").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy/mm/dd",
        });
    }

    if($("#datepicker1").length){
        $("#datepicker1").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy/mm/dd",
        });
    }

    if($("#timepicker").length){
        $("#timepicker").timepicker();
    }
   
})(jQuery);
