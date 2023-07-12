(function($){
    $(document).ready(function(){
        $('.delete-btn').submit(function (e){
            let conf = confirm("Are you sure");
            if(conf){
                return true;
            }else{
                return e.preventDefault();
            }

        });
    
        
        // image pre view
        $('#slider-photo').change(function(e){
              let photo_url = URL.createObjectURL(e.target.files[0]);
              $('#slider-preview-photo').attr('src', photo_url )
        });
        let btn_no = 1;
        $('#slider-btn-click').click(function(e){
            e.preventDefault();
            $('.slider-btn-otp').append(`
            <div class="btn-option-area">
                <span>Button #${btn_no}</span>
                <span class="badge badge-danger remove-btn" style="margin-left:170px; cursor:pointer">Remove</span>
                
                <input name="btn_title[]" class="form-control" placeholder="title" type="text">
                <input name="btn_link[]" class="form-control" placeholder="link" type="text">
                <br>
                  <select class="form-control" name="btn_type[]" >
                  <option value="btn btn-light-out">deaful butoon</option>
                  <option value="btn btn-color btn-full">Red</option>
                  </select>
                
            </div>`);
            btn_no++;
      });
          //btn delete 
        $(document).on('click', '.remove-btn',function(e){
             $(this).closest('.btn-option-area').remove();
        });
        //data tible
        $('.data-table').DataTable();
       
    });
})(jQuery)