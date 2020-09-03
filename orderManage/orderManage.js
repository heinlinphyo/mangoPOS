
$(document).ready(function(){

    fetch_data();

    $(document).on('click', '#check', function(){
        var id=$(this).data("id");
        var name=$(this).data('name');
        var price=$(this).data("price");
        var tbid=$(this).data("tbid");

        $.ajax({
            url:"orderManage/create.php",
            method:"POST",
            data:{id:id, name:name, price:price, tbid:tbid},
            dataType:"text",
            success:function(data){

                fetch_data()
            }
        });
    });

    $(document).on('click', '#del', function(){
        var id=$(this).data("id");
        var tbid=$(this).data("tbid");
        $.ajax({
            url:"orderManage/single_del.php",
            method:"POST",
            data:{id:id, tbid:tbid},
            dataType:"text",
            success:function(data){
                fetch_data();
            }
        });
    });

    $(document).on('click', '#allDel', function(){
        var id=$(this).data("id");
        var tbid=$(this).data("tbid");
        $.ajax({
            url:"orderManage/all_del.php",
            method:"POST",
            data:{id:id, tbid:tbid},
            dataType:"text",
            success:function(data){
                fetch_data();
            }
        });
    });

});