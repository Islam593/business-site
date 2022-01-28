(function($){


$(document).ready(function(){


//logout system

$('#logout_btn').click(function(e){
e.preventDefault();
$('#logout-form').submit();



});

// post tags select-2
$('.post-tags').select2();

// post editor

CKEDITOR.replace( 'posteditor');

// post type manage

$('#post-type').change(function(){

let type = $(this).val();
if(type == 'Standard'){

$('.post-type-area').html(`<div class="form-group">
<label class="">Featured Image</label>

    <input name="image" type="file" class="form-control">

</div>`);
}else if(type == 'Gallery'){

    $('.post-type-area').html(`<div class="form-group">
    <label class="">Gallery Images</label>
    
        <input name="gallery[]" type="file" class="form-control" multiple>
    
    </div>`);


}else if(type == 'Video'){

    $('.post-type-area').html(`<div class="form-group">
    <label class="">Video URL</label>
    
        <input name="video" type="text" class="form-control">
    
    </div>`);

}else if(type == 'Audio'){
    $('.post-type-area').html(`<div class="form-group">
    <label class="">Audio URL</label>
    
        <input name="audio" type="text" class="form-control">
    
    </div>`);

}else if(type == 'Quotation'){

    $('.post-type-area').html(`<div class="form-group">
    <label class="">Quotation</label>
    <div class="col-lg-12">
    <textarea name="quotation" class="form-control"> </textarea>
    </div>
        
    
    </div>`);

}else{
    $('.post-type-area').html('')

}




});

// post table to data table

$('#post').DataTable();



});



})(jQuery)