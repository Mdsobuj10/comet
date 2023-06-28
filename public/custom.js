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
        $('.data-table').DataTable();
    });
})(jQuery)