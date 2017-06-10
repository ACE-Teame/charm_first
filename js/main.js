(function($) {
    $(function() {
        $('body').on('click', '.login', function(){
            $('.popupLogin').addClass('active');
            return false;
        });
        $('body').on('click', '.popupLogin .close', function(){
            $('.popupLogin').removeClass('active');
            return false;
        });
        $('body').on('click', '.popupLogin .cancle', function(){
            $('.popupLogin').removeClass('active');
            return false;
        });
        

        $('body').on('click', '.add', function(){
            $('.popup').addClass('active');
            return false;
        });
        $('body').on('click', '.menu_list', function(){
            $(".menu_list").removeClass('active');
            $(this).addClass('active');
            // return false;
        });

        $('body').on('click', '.modify', function(){
            $('.popup').addClass('active');
            return false;
        });
        $('body').on('click', '.popup .close', function(){
            $('.popup').removeClass('active');
            return false;
        });
        $('body').on('click', '.popup .cancle', function(){
            $('.popup').removeClass('active');
            return false;
        });
        
    });
})(jQuery);

function delete_by_id(id, state) {
    // if(type == 'domain') {
        if(confirm('确认删除？')) {
            $.get('app.php', {type:'del', id:id, state:state}, function(data) {
                if(data.status == 200) {
                    alert('删除成功');
                    location.reload();
                }
            }, 'json');
        }
    // }
}