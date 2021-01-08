$(document).ready(function() {


    var gotourl = getRootPath() + "/views/color_list.php"
    ///////datagrid選中行變色與滑鼠經過行變色///////////////
    var dtSelector = '.list';
    var tbList = $(dtSelector);

    tbList.each(function() {
        var self = this;
        $('tr:even:not(:first)', $(self)).addClass('normalEvenTD'); // 從標頭行下一行開始的奇數行，行數：（1，3，5…）
        $('tr:odd', $(self)).addClass('normalOddTD'); // 從標頭行下一行開始的偶數行，行數：（2，4，6…）

        // 滑鼠經過的行變色
        $('tr:not(:first)', $(self)).hover(
            function() {
                $(this).addClass('hoverTD');
                $(this).removeClass('table-td-content');
            },
            function() {
                $(this).removeClass('hoverTD');
                $(this).addClass('table-td-content');
            }
        );

        // 選擇行變色
        $('tr', $(self)).click(function() {
            var trThis = this;
            $(self).find('.trSelected').removeClass('trSelected');
            if ($(trThis).get(0) == $('tr:first', $(self)).get(0)) {
                return;
            }
            $(trThis).addClass('trSelected');
        });
    });



    $(".edit").click(function() {
        var val = $(this).val();
        var edit_del = 'edit_del' + val
        var check_cancel = 'check_cancel' + val
        $('.' + edit_del).hide();
        $('.' + check_cancel).show();
        var tr_length = $('.list .table-tr-content').length; //tr 長度
        for(var i=0; i < tr_length; i++){ 
            $('.table-tr-content:eq('+i+') td:eq(1) input:eq(3)').hide()
        }
        $(this).parent().siblings(".td_edit").each(function() { // 获取当前行的其他单元格
            var obj_text = $(this).find("input:text"); // 判断单元格下是否有文本框
            if (!obj_text.length) // 如果没有文本框，则添加文本框使之可以编辑
                $(this).html("<input type='text' style='width:100%;hight:100%' value='" + $(this).text() + "'>");

            // else
            //     $(this).html(obj_text.val());
        });
        $(this).parent().siblings(".td_edit_textarea").each(function() { // 获取当前行的其他单元格
            var obj_text = $(this).find("textarea"); // 判断单元格下是否有文本框
            if (!obj_text.length) // 如果没有文本框，则添加文本框使之可以编辑
                $(this).html("<textarea type='text' style='width:100%;hight:100%'>" + $(this).text() + "</textarea>");
            // else
            //     $(this).html(obj_text.val());
        });



    });




    $(".cancel").click(function() {
        var val = $(this).val();
        var edit_del = 'edit_del' + val
        var check_cancel = 'check_cancel' + val
        $('.' + check_cancel).hide();
        $('.' + edit_del).show();
        var tr_length = $('.list .table-tr-content').length; //tr 長度
        for(var i=0; i < tr_length; i++){ 
            $('.table-tr-content:eq('+i+') td:eq(1) input:eq(3)').show()
        }
        $(this).parent().siblings(".td_edit").each(function() { // 获取当前行的其他单元格
            var obj_text = $(this).find("input:text"); // 判断单元格下是否有文本框
            if (!obj_text.length) // 如果没有文本框，则添加文本框使之可以编辑
                $(this).html("<input type='text' style='width:150px;' value='" + $(this).text() + "'>");

            else
                $(this).html(obj_text.val());
        });
        $(this).parent().siblings(".td_edit_textarea").each(function() { // 获取当前行的其他单元格
            var obj_text = $(this).find("textarea"); // 判断单元格下是否有文本框
            if (!obj_text.length) // 如果没有文本框，则添加文本框使之可以编辑
                $(this).html("<textarea type='text' style='width:160px;hight:100px'>" + $(this).text() + "</textarea>");
            else
                $(this).html(obj_text.val());
        });


    });

    $(".check").click(function() {
        var url = getRootPath() + "/Controller/color_Process.php?oper=edit"
        var id_val = $(this).val();
        var id = 'id' + id_val;
        var id = $('#' + id).text();
        var guest = $('#guest' + id).children().val();
        var Book_Name = $('#Book_Name' + id).children().val();
        var content = $('#content' + id).children().val();
        var number = $('#number' + id).children().val();
        var Remarks = $('#Remarks' + id).children().val();
        var proportion = $('#proportion' + id).children().val();
        var $this =  $(this).parent().siblings(".td_edit").each(function() { // 获取当前行的其他单元格
                        var obj_text = $(this).find("input:text"); // 判断单元格下是否有文本框
                        if (!obj_text.length) // 如果没有文本框，则添加文本框使之可以编辑
                            $(this).html("<input type='text' style='width:150px;' value='" + $(this).text() + "'>");

                        else
                            $(this).html(obj_text.val());
                    });
                    $(this).parent().siblings(".td_edit_textarea").each(function() { // 获取当前行的其他单元格
                        var obj_text = $(this).find("textarea"); // 判断单元格下是否有文本框
                        if (!obj_text.length) // 如果没有文本框，则添加文本框使之可以编辑
                            $(this).html("<textarea type='text' style='width:160px;hight:100px'>" + $(this).text() + "</textarea>");
                        else
                            $(this).html(obj_text.val());
                    });  
        $.ajax({
            type: "post",
            url: url,
            data:{id:id_val, guest:guest, Book_Name:Book_Name, content:content, number:number, Remarks:Remarks, proportion:proportion},
            // dataType: "json",
            success: function(res) {
                alertify
                  .alert("修改成功", function(){
                    alertify.message('修改成功');
                  });
                    // if (fh.length > 0) {
                    //     alert("有東西")
                    // }
                    // console.log($this.find("input:text"))
                    var edit_del = 'edit_del' + id_val
                    var check_cancel = 'check_cancel' + id_val
                    $('.' + check_cancel).hide();
                    $('.' + edit_del).show();
                    $this;

            },
            error: function(res) {
                    alert("修改失敗");

            }
        });
    })


$("#myBtn").click(function(){
  $("#myModal").show();
  $('#insert_guest').val('')
  $('#insert_Book_Name').val('')
  $('#insert_content').val('')
  $('#insert_number').val('')
  $('#insert_Remarks').val('')
  $('#insert_proportion').val('')
});

$(".close").click(function(){
  $("#myModal").hide();
});

// Get the modal
var myModal = document.getElementById("myModal");
// Get the modal
var select_Modal = document.getElementById("select_Modal");

var Problem_Email = document.getElementById("Problem_Email_Modal");

window.onclick = function(event) {
  if (event.target == myModal || event.target == select_Modal ||  event.target == Problem_Email) {
   $("#myModal").hide();
   $("#select_Modal").hide();
   $('#Problem_Email_Modal').hide();
  }
}


$("#Btn").click(function(){
    var url = getRootPath() + "/Controller/color_Process.php?oper=add"
    var gotourl = getRootPath() + "/views/color_list.php"
    var guest = $('#insert_guest').val();
    var Book_Name = $('#insert_Book_Name').val();
    var content = $('#insert_content').val();
    var number = $('#insert_number').val();
    var Remarks = $('#insert_Remarks').val();
    var proportion = $('#insert_proportion').val();
            $.ajax({
            type: "post",
            url: url,
            data:{guest:guest, Book_Name:Book_Name, content:content, number:number, Remarks:Remarks, proportion:proportion},
            // dataType: "json",
            success: function(res) {
                alertify
                  .alert('新增成功即將返回列表', function(){
                    alertify.message('新增成功');
                    window.location.replace(gotourl);
                  });
 
            },
            error: function(res) {
                alertify
                     .alert("新增失敗", function(){
                       alertify.message('新增失敗');
                     });

            }
        });



});
$("#refresh_btn").click(function(){
    var url = getRootPath() + "/Controller/color_Process.php?oper=remove_session"
        $.ajax({
            type: "post",
            url: url,
            success: function(res) {
                window.location.replace(gotourl);
            },
            error: function(res) {
                    alert("重新整理失敗");

            }
        });
});
$("#select_btn").click(function(){
  $("#select_Modal").show();
});

$(".select_close").click(function(){
  $("#select_Modal").hide();
});

$("#select_submit").click(function(){
    var url = getRootPath() + "/Controller/color_Process.php?oper=selectcolor"
    var gotourl = getRootPath() + "/views/color_list.php"
    var id = $('#select_id').val();
    var guest = $('#select_guest').val();
    var Book_Name = $('#select_Book_Name').val();
    var content = $('#select_content').val();
    var number = $('#select_number').val();
            $.ajax({
            type: "post",
            url: url,
            // asyn:false,
            dataType: 'text',
            data:{id:id,guest:guest, Book_Name:Book_Name, content:content, number:number},
            success: function(adata) {
                if(adata=="ok"){
                    window.location.replace(gotourl);
                }else{
                    alertify
                          .alert("搜尋失敗", function(){
                            alertify.message('搜尋失敗');
                          });
                          console.log(adata)
                }

            },
            error: function(data) {
            }
        });



});

// 複製
$(".copy_content").click(function(){
    $('#myModal').show();
    var id = $(this).val();
    var guest =$('#guest'+id).text();
    var Book_Name =$('#Book_Name'+id).text();
    var content =$('#content'+id).text();
    var number =$('#number'+id).text();
    var Remarks =$('#Remarks'+id).text();
    var proportion =$('#proportion'+id).text();
    $('#insert_guest').val(guest)
    $('#insert_Book_Name').val(Book_Name)
    $('#insert_content').val(content)
    $('#insert_number').val(number)
    $('#insert_Remarks').val(Remarks)
    $('#insert_proportion').val(proportion)
  
});

$("#Problem_Email_btn").click(function(){
  $("#Problem_Email_Modal").show();
});

$(".Problem_Email_close").click(function(){
  $("#Problem_Email_Modal").hide();
});

$("#Problem_Email_submit").click(function(){
    alertify.confirm("是否要將問題回報寄出",
  function(){
    alertify.success('確定');
    var url = getRootPath() + "/Controller/EmailProcess.php?oper=Email"
    var headers = $('#headers').val();
    var msg = $('#msg').val();
    var subject = $('#subject').val();
            $.ajax({
            type: "post",
            url: url,
            asyn:false,
            data:{headers:headers,msg:msg,subject:subject},
            success: function(data) {
                    window.location.replace(gotourl);
            },
            error: function(data) {
            }
        });
  },
  function(){
    alertify.error('取消');

  });




});


});




//跟目錄
function getRootPath() {
    var strFullPath = window.document.location.href;
    var strPath = window.document.location.pathname;
    var pos = strFullPath.indexOf(strPath);
    var prePath = strFullPath.substring(0, pos);
    var postPath = strPath.substring(0, strPath.substr(1).indexOf('/') + 1);
    return (prePath + postPath);
}

//需要做一個input hidden 來帶id
function confirmDele(obj) {
    var val = $(obj).next().val()
    url = getRootPath() + "/Controller/color_Process.php?oper=del&id=" + val


alertify.confirm("是否要刪除編號為" + val + "的色票",
  function(){
    alertify.success('確定');
    window.location.replace(url);
  },
  function(){
    alertify.error('取消');

  });
}

