function chart(){
  var cx = $("#canvas-holder");
  var url = getRootPath() + "/Controller/chart_Process.php"
  var chart = 'pie'
  var select_num=$('#select_num').val()
  var use_num = $('#select1').val()
  var ran_k='no'
  cx.empty()
  cx.append('<canvas id="chart-area"></canvas>')
  // cx.empty()
  $.ajax({
      type: "post",
      url: url,
      data:{chart:chart,select_num:select_num,use_num:use_num,ran_k:ran_k},
      dataType: "json",
      success: function(res) {
        num=[]
        count=[]
        $.each(res,function(i,n){    
          num[i]=n.guest;
          count[i]=n.count;
        }); 
            var ctx = document.getElementById("chart-area");
            //標籤若超過兩個要用陣列表示，若沒有就是字串表示
            var labeltags = ["test01", "test02"];
            var myChart = new Chart(ctx, {
              type: "pie", //圖表類型
              data: {
                //標題
                labels: num,
                datasets: [
                  {
                    label: labeltags, //標籤
                    data: count, //資料
                  //圖表背景色
                  backgroundColor: ["rgba(153,246,197,0.8)", "rgba(200,176,194,0.8)", "rgba(184,55,134,0.8)", "rgba(64,205,154,0.8)", "rgba(93,174,7,0.8)", "rgba(177,236,191,0.8)", "rgba(120,79,246,0.8)", "rgba(49,226,177,0.8)", "rgba(76,41,51,0.8)", "rgba(49,80,93,0.8)", "rgba(220,18,133,0.8)", "rgba(142,137,207,0.8)", "rgba(154,88,138,0.8)", "rgba(50,101,49,0.8)", "rgba(146,207,160,0.8)", "rgba(151,107,15,0.8)", "rgba(2,221,94,0.8)", "rgba(12,31,39,0.8)", "rgba(197,95,120,0.8)", "rgba(125,230,203,0.8)", "rgba(87,235,92,0.8)", "rgba(192,150,238,0.8)", "rgba(217,110,193,0.8)", "rgba(108,201,234,0.8)", "rgba(81,205,226,0.8)", "rgba(82,11,209,0.8)", "rgba(78,215,193,0.8)", "rgba(108,143,164,0.8)", "rgba(8,190,244,0.8)", "rgba(75,72,185,0.8)", "rgba(237,21,0,0.8)", "rgba(180,177,90,0.8)", "rgba(234,176,39,0.8)", "rgba(96,154,247,0.8)", "rgba(171,230,17,0.8)", "rgba(175,102,224,0.8)", "rgba(33,231,14,0.8)", "rgba(133,150,9,0.8)", "rgba(221,33,51,0.8)", "rgba(12,168,6,0.8)", "rgba(179,177,11,0.8)", "rgba(131,14,26,0.8)", "rgba(202,232,2,0.8)", "rgba(85,5,89,0.8)", "rgba(73,74,248,0.8)", "rgba(49,145,95,0.8)", "rgba(251,172,15,0.8)", "rgba(238,52,176,0.8)", "rgba(19,61,76,0.8)", "rgba(99,39,153,0.8)", "rgba(39,128,116,0.8)", "rgba(187,16,34,0.8)"],
                  //圖表外框線色
                  borderColor: ["rgba(153,246,197,0.8)", "rgba(200,176,194,0.8)", "rgba(184,55,134,0.8)", "rgba(64,205,154,0.8)", "rgba(93,174,7,0.8)", "rgba(177,236,191,0.8)", "rgba(120,79,246,0.8)", "rgba(49,226,177,0.8)", "rgba(76,41,51,0.8)", "rgba(49,80,93,0.8)", "rgba(220,18,133,0.8)", "rgba(142,137,207,0.8)", "rgba(154,88,138,0.8)", "rgba(50,101,49,0.8)", "rgba(146,207,160,0.8)", "rgba(151,107,15,0.8)", "rgba(2,221,94,0.8)", "rgba(12,31,39,0.8)", "rgba(197,95,120,0.8)", "rgba(125,230,203,0.8)", "rgba(87,235,92,0.8)", "rgba(192,150,238,0.8)", "rgba(217,110,193,0.8)", "rgba(108,201,234,0.8)", "rgba(81,205,226,0.8)", "rgba(82,11,209,0.8)", "rgba(78,215,193,0.8)", "rgba(108,143,164,0.8)", "rgba(8,190,244,0.8)", "rgba(75,72,185,0.8)", "rgba(237,21,0,0.8)", "rgba(180,177,90,0.8)", "rgba(234,176,39,0.8)", "rgba(96,154,247,0.8)", "rgba(171,230,17,0.8)", "rgba(175,102,224,0.8)", "rgba(33,231,14,0.8)", "rgba(133,150,9,0.8)", "rgba(221,33,51,0.8)", "rgba(12,168,6,0.8)", "rgba(179,177,11,0.8)", "rgba(131,14,26,0.8)", "rgba(202,232,2,0.8)", "rgba(85,5,89,0.8)", "rgba(73,74,248,0.8)", "rgba(49,145,95,0.8)", "rgba(251,172,15,0.8)", "rgba(238,52,176,0.8)", "rgba(19,61,76,0.8)", "rgba(99,39,153,0.8)", "rgba(39,128,116,0.8)", "rgba(187,16,34,0.8)"],
                  //外框線寬度
                    borderWidth: 1
                  }
                ]
              },
              options: {
                scales: {
                  yAxes: [
                    {
                      ticks: {
                        beginAtZero: true, //從 0 開始
                        responsive: true //符合響應式
                      }
                    }
                  ]
                }
              }
            });
      },
      error: function(res) {
              alert("搜尋次數錯誤");

      }
  });


}


///////////////////////////////////////////////
$(function(){ 
    var url = getRootPath() + "/Controller/chart_Process.php"
    var chart = 'year'
    //取得年分
    $.ajax({
        type: "post",
        url: url,
        data:{chart:chart},
        dataType: "json",
        success: function(res) {
          $.each(res,function(i,n){
            if(n.year!='0000'){
              var option = $("<option>").val(n.year).text(n.year); 
              $("#select1").append(option); 
            }
          })
              $('#select1 option[value=2020]').attr('selected', 'selected');


  var cx = $("#canvas-holder");
  var url = getRootPath() + "/Controller/chart_Process.php"
  var chart = 'bar'
  var use_num= $('#select1').val();
  var ran_k='ALL'
  var html='<div style="background-color:#F1F1F1;" class="col-sm-3 col-md-3 col-xs-3  col-lg-3 tborder ">'+'出版社'+'</div><div style="background-color:#F1F1F1;" class="col-sm-3 col-md-3 col-xs-3 col-lg-3 tborder">'+'調色次數'+'</div><div style="background-color:#F1F1F1;" class="col-sm-3 col-md-3 col-xs-3 col-lg-3 tborder">'+'印件數'+'</div><div style="background-color:#F1F1F1;" class="col-sm-3 col-md-3 col-xs-3 col-lg-3 tborder">'+'詳情'+'</div>'
  $("#top").empty()
  $('.chart_div').empty()
  $('.table_cont').empty()
  cx.empty()
  cx.append('<canvas id="chart-area"></canvas>')
  if(use_num=='請選擇搜尋時間'){
    alertify
      .alert("請選擇正確時間", function(){
        alertify.message('請選擇正確時間');
      });
    return false
  }
  // 依照年分取得出版社色票次數(詳情)
  $.ajax({
      type: "post",
      url: url,
      data:{chart:chart,use_num:use_num,ran_k:ran_k},
      dataType: "json",
      success: function(res) {
        guest=[]
        count=[]
        $.each(res,function(i,n){
          guest[i]=n.guest;
          count[i]=n.count;
          // console.log(n.guest)
          if(i%2==0){
              html += '<div  class=" col-sm-3 col-md-3 col-xs-3 col-lg-3 border" style="height:22px" >'+n.guest+
              '</div><div class="count col-sm-3 col-md-3 col-xs-3 col-lg-3 border" >'+n.count+
              '</div><div style="height:22px"  class="count col-sm-3 col-md-3 col-xs-3 col-lg-3 border">'+n.Number_of_prints+
              '</div><div class=" col-sm-3 col-md-3 col-xs-3  col-lg-3 border"  style="height:22px"><input style="width:40px;height:20px;font-size:4px;" type="button"  data-title="'+n.guest+
              '" value="詳情" onclick="getcount_content(this)"></div>'

          }else{

              html += '<div  class=" col-sm-3 col-md-3 col-xs-3  col-lg-3 border" style="background-color:#F1F1F1;height:22px;">'+n.guest+
              '</div><div style="background-color:#F1F1F1;height:22px"  class="count col-sm-3 col-md-3 col-xs-3 col-lg-3 border">'+n.count+
              '</div><div style="background-color:#F1F1F1;height:22px"  class="count col-sm-3 col-md-3 col-xs-3 col-lg-3 border">'+n.Number_of_prints+
              '</div><div class=" col-sm-3 col-md-3 col-xs-3  col-lg-3 border"  style="background-color:#F1F1F1;height:22px"><input style="width:40px;height:20px;font-size:4px;" type="button" data-title="'
              +n.guest+'" value="詳情" onclick="getcount_content(this)"></div>'
          }
          $('.chart_div').html(html)

        }); 
          $(".border").mouseover(function () {
            oldColor = $(this).css("background-color");
          $(this).css("background-color","#d9e8fb");
            }).mouseout(function () {
                $(this).css("background-color",oldColor);
            });
          $('[data-toggle="popover"]').popover()
          var ctx = document.getElementById("chart-area");
          //標籤若超過兩個要用陣列表示，若沒有就是字串表示
          // var myChart = new Chart(ctx, {
          //   type: "bar", //圖表類型
          //   data: {
          //     //項目標題
          //     labels: guest,
          //     datasets: [
          //       {
          //         label: "", //標籤
          //         data: count, //資料
          //         //圖表背景色
          //         backgroundColor: ["rgba(153,246,197,0.8)", "rgba(200,176,194,0.8)", "rgba(184,55,134,0.8)", "rgba(64,205,154,0.8)", "rgba(93,174,7,0.8)", "rgba(177,236,191,0.8)", "rgba(120,79,246,0.8)", "rgba(49,226,177,0.8)", "rgba(76,41,51,0.8)", "rgba(49,80,93,0.8)", "rgba(220,18,133,0.8)", "rgba(142,137,207,0.8)", "rgba(154,88,138,0.8)", "rgba(50,101,49,0.8)", "rgba(146,207,160,0.8)", "rgba(151,107,15,0.8)", "rgba(2,221,94,0.8)", "rgba(12,31,39,0.8)", "rgba(197,95,120,0.8)", "rgba(125,230,203,0.8)", "rgba(87,235,92,0.8)", "rgba(192,150,238,0.8)", "rgba(217,110,193,0.8)", "rgba(108,201,234,0.8)", "rgba(81,205,226,0.8)", "rgba(82,11,209,0.8)", "rgba(78,215,193,0.8)", "rgba(108,143,164,0.8)", "rgba(8,190,244,0.8)", "rgba(75,72,185,0.8)", "rgba(237,21,0,0.8)", "rgba(180,177,90,0.8)", "rgba(234,176,39,0.8)", "rgba(96,154,247,0.8)", "rgba(171,230,17,0.8)", "rgba(175,102,224,0.8)", "rgba(33,231,14,0.8)", "rgba(133,150,9,0.8)", "rgba(221,33,51,0.8)", "rgba(12,168,6,0.8)", "rgba(179,177,11,0.8)", "rgba(131,14,26,0.8)", "rgba(202,232,2,0.8)", "rgba(85,5,89,0.8)", "rgba(73,74,248,0.8)", "rgba(49,145,95,0.8)", "rgba(251,172,15,0.8)", "rgba(238,52,176,0.8)", "rgba(19,61,76,0.8)", "rgba(99,39,153,0.8)", "rgba(39,128,116,0.8)", "rgba(187,16,34,0.8)"],
          //         //圖表外框線色
          //         borderColor: ["rgba(153,246,197,0.8)", "rgba(200,176,194,0.8)", "rgba(184,55,134,0.8)", "rgba(64,205,154,0.8)", "rgba(93,174,7,0.8)", "rgba(177,236,191,0.8)", "rgba(120,79,246,0.8)", "rgba(49,226,177,0.8)", "rgba(76,41,51,0.8)", "rgba(49,80,93,0.8)", "rgba(220,18,133,0.8)", "rgba(142,137,207,0.8)", "rgba(154,88,138,0.8)", "rgba(50,101,49,0.8)", "rgba(146,207,160,0.8)", "rgba(151,107,15,0.8)", "rgba(2,221,94,0.8)", "rgba(12,31,39,0.8)", "rgba(197,95,120,0.8)", "rgba(125,230,203,0.8)", "rgba(87,235,92,0.8)", "rgba(192,150,238,0.8)", "rgba(217,110,193,0.8)", "rgba(108,201,234,0.8)", "rgba(81,205,226,0.8)", "rgba(82,11,209,0.8)", "rgba(78,215,193,0.8)", "rgba(108,143,164,0.8)", "rgba(8,190,244,0.8)", "rgba(75,72,185,0.8)", "rgba(237,21,0,0.8)", "rgba(180,177,90,0.8)", "rgba(234,176,39,0.8)", "rgba(96,154,247,0.8)", "rgba(171,230,17,0.8)", "rgba(175,102,224,0.8)", "rgba(33,231,14,0.8)", "rgba(133,150,9,0.8)", "rgba(221,33,51,0.8)", "rgba(12,168,6,0.8)", "rgba(179,177,11,0.8)", "rgba(131,14,26,0.8)", "rgba(202,232,2,0.8)", "rgba(85,5,89,0.8)", "rgba(73,74,248,0.8)", "rgba(49,145,95,0.8)", "rgba(251,172,15,0.8)", "rgba(238,52,176,0.8)", "rgba(19,61,76,0.8)", "rgba(99,39,153,0.8)", "rgba(39,128,116,0.8)", "rgba(187,16,34,0.8)"],
          //         //外框線寬度
          //         borderWidth: 1 //從這裡開始加第二筆資料
          //       }
          //     ]
          //   },
          //   options: {
          //             legend: {
          //               display: false
          //             },
          //             tooltips: {
          //                 enabled: true,
          //                 mode: 'single',
          //                 callbacks: {
          //                     label: function(tooltipItems, data) {
          //                         return '出版社使用特殊色票次數:'+tooltipItems.yLabel;
          //                     }
          //                 }
          //             },
          //             scales: {
          //               yAxes: [
          //                 {
          //                   ticks: {
          //                     beginAtZero: true, //從 0 開始
          //                     responsive: true //符合響應式
          //                   }
          //                 }
          //               ]
          //             }
          //   }
          // });

      },
      error: function(res) {
              alert("搜尋次數錯誤");

      }


  });

  var date = $('#select1').val()
  var chart = 'top'
  var ran_k ='ALL'
  //取得名次列表
  $.ajax({
        type: "post",
        url: url,
        data:{chart:chart,date:date,ran_k:ran_k},
        dataType: "json",
        success: function(res) {
            var option = $("<option>").text('請選擇搜名次區間'); 
            $("#top").append(option); 
            var option = $("<option>").val('year_ALL').text('全部排名'); 
            $("#top").append(option); 
            ranking=res.length/5
            ranking=Math.ceil(ranking)
            var rank='5'
            for( var i=1;i<=ranking;i++){
              End=i*rank
              Start=End-4
              var option = $("<option>").val(Start-1).text(Start+'-'+End); 
              $("#top").append(option); 

            }
            //選取1~5名
            $('#top option[value=0]').attr('selected', 'selected');


  var cx = $("#canvas-holder");
  var url = getRootPath() + "/Controller/chart_Process.php"
  var chart = 'bar'
  var ran_k='ALL_yes'
  var use_num= $('#select1').val();
  var rank_val=$('#top').val();
  var html='<div style="background-color:#F1F1F1;" class="col-sm-3 col-md-3 col-xs-3  col-lg-3 tborder ">'+'出版社'+'</div><div style="background-color:#F1F1F1;" class="col-sm-3 col-md-3 col-xs-3 col-lg-3 tborder">'+'調色次數'+'</div><div style="background-color:#F1F1F1;" class="col-sm-3 col-md-3 col-xs-3 col-lg-3 tborder">'+'印件數'+'</div><div style="background-color:#F1F1F1;" class="col-sm-3 col-md-3 col-xs-3 col-lg-3 tborder">'+'詳情'+'</div>'
  cx.empty()
  cx.append('<canvas id="chart-area"></canvas>')
  // 因為上面選取了1~5名 這邊開始取出資料
  $.ajax({
      type: "post",
      url: url,
      data:{chart:chart,use_num:use_num,ran_k:ran_k,rank_val:rank_val},
      dataType: "json",
      success: function(res) {
        guest=[]
        count=[]
        // console.log(res)
        $.each(res,function(i,n){
          guest[i]=n.guest;
          count[i]=n.count;
          // console.log(n.guest)
          if(i%2==0){
              html += '<div  class=" col-sm-3 col-md-3 col-xs-3 col-lg-3 border" style="height:22px" >'+n.guest+
              '</div><div class="count col-sm-3 col-md-3 col-xs-3 col-lg-3 border" >'+n.count+
              '</div><div style="height:22px"  class="count col-sm-3 col-md-3 col-xs-3 col-lg-3 border">'+n.Number_of_prints+
              '</div><div class=" col-sm-3 col-md-3 col-xs-3  col-lg-3 border"  style="height:22px"><input style="width:40px;height:20px;font-size:4px;" type="button"  data-title="'+n.guest+
              '" value="詳情" onclick="getcount_content(this)"></div>'

          }else{

              html += '<div  class=" col-sm-3 col-md-3 col-xs-3  col-lg-3 border" style="background-color:#F1F1F1;height:22px;">'+n.guest+
              '</div><div style="background-color:#F1F1F1;height:22px"  class="count col-sm-3 col-md-3 col-xs-3 col-lg-3 border">'+n.count+
              '</div><div style="background-color:#F1F1F1;height:22px"  class="count col-sm-3 col-md-3 col-xs-3 col-lg-3 border">'+n.Number_of_prints+
              '</div><div class=" col-sm-3 col-md-3 col-xs-3  col-lg-3 border"  style="background-color:#F1F1F1;height:22px"><input style="width:40px;height:20px;font-size:4px;" type="button" data-title="'
              +n.guest+'" value="詳情" onclick="getcount_content(this)"></div>'
          }
          $('.chart_div').html(html)

        }); 
          $(".border").mouseover(function () {
            oldColor = $(this).css("background-color");
          $(this).css("background-color","#d9e8fb");
            }).mouseout(function () {
                $(this).css("background-color",oldColor);
            });
          $('[data-toggle="popover"]').popover()
          var ctx = document.getElementById("chart-area");
          //標籤若超過兩個要用陣列表示，若沒有就是字串表示
          var myChart = new Chart(ctx, {
            type: "bar", //圖表類型
            data: {
              //項目標題
              labels: guest,
              datasets: [
                {
                  label: "", //標籤
                  data: count, //資料
                  //圖表背景色
                  backgroundColor: ["rgba(153,246,197,0.8)", "rgba(200,176,194,0.8)", "rgba(184,55,134,0.8)", "rgba(64,205,154,0.8)", "rgba(93,174,7,0.8)", "rgba(177,236,191,0.8)", "rgba(120,79,246,0.8)", "rgba(49,226,177,0.8)", "rgba(76,41,51,0.8)", "rgba(49,80,93,0.8)", "rgba(220,18,133,0.8)", "rgba(142,137,207,0.8)", "rgba(154,88,138,0.8)", "rgba(50,101,49,0.8)", "rgba(146,207,160,0.8)", "rgba(151,107,15,0.8)", "rgba(2,221,94,0.8)", "rgba(12,31,39,0.8)", "rgba(197,95,120,0.8)", "rgba(125,230,203,0.8)", "rgba(87,235,92,0.8)", "rgba(192,150,238,0.8)", "rgba(217,110,193,0.8)", "rgba(108,201,234,0.8)", "rgba(81,205,226,0.8)", "rgba(82,11,209,0.8)", "rgba(78,215,193,0.8)", "rgba(108,143,164,0.8)", "rgba(8,190,244,0.8)", "rgba(75,72,185,0.8)", "rgba(237,21,0,0.8)", "rgba(180,177,90,0.8)", "rgba(234,176,39,0.8)", "rgba(96,154,247,0.8)", "rgba(171,230,17,0.8)", "rgba(175,102,224,0.8)", "rgba(33,231,14,0.8)", "rgba(133,150,9,0.8)", "rgba(221,33,51,0.8)", "rgba(12,168,6,0.8)", "rgba(179,177,11,0.8)", "rgba(131,14,26,0.8)", "rgba(202,232,2,0.8)", "rgba(85,5,89,0.8)", "rgba(73,74,248,0.8)", "rgba(49,145,95,0.8)", "rgba(251,172,15,0.8)", "rgba(238,52,176,0.8)", "rgba(19,61,76,0.8)", "rgba(99,39,153,0.8)", "rgba(39,128,116,0.8)", "rgba(187,16,34,0.8)"],
                  //圖表外框線色
                  borderColor: ["rgba(153,246,197,0.8)", "rgba(200,176,194,0.8)", "rgba(184,55,134,0.8)", "rgba(64,205,154,0.8)", "rgba(93,174,7,0.8)", "rgba(177,236,191,0.8)", "rgba(120,79,246,0.8)", "rgba(49,226,177,0.8)", "rgba(76,41,51,0.8)", "rgba(49,80,93,0.8)", "rgba(220,18,133,0.8)", "rgba(142,137,207,0.8)", "rgba(154,88,138,0.8)", "rgba(50,101,49,0.8)", "rgba(146,207,160,0.8)", "rgba(151,107,15,0.8)", "rgba(2,221,94,0.8)", "rgba(12,31,39,0.8)", "rgba(197,95,120,0.8)", "rgba(125,230,203,0.8)", "rgba(87,235,92,0.8)", "rgba(192,150,238,0.8)", "rgba(217,110,193,0.8)", "rgba(108,201,234,0.8)", "rgba(81,205,226,0.8)", "rgba(82,11,209,0.8)", "rgba(78,215,193,0.8)", "rgba(108,143,164,0.8)", "rgba(8,190,244,0.8)", "rgba(75,72,185,0.8)", "rgba(237,21,0,0.8)", "rgba(180,177,90,0.8)", "rgba(234,176,39,0.8)", "rgba(96,154,247,0.8)", "rgba(171,230,17,0.8)", "rgba(175,102,224,0.8)", "rgba(33,231,14,0.8)", "rgba(133,150,9,0.8)", "rgba(221,33,51,0.8)", "rgba(12,168,6,0.8)", "rgba(179,177,11,0.8)", "rgba(131,14,26,0.8)", "rgba(202,232,2,0.8)", "rgba(85,5,89,0.8)", "rgba(73,74,248,0.8)", "rgba(49,145,95,0.8)", "rgba(251,172,15,0.8)", "rgba(238,52,176,0.8)", "rgba(19,61,76,0.8)", "rgba(99,39,153,0.8)", "rgba(39,128,116,0.8)", "rgba(187,16,34,0.8)"],
                  //外框線寬度
                  borderWidth: 1 //從這裡開始加第二筆資料
                }
              ]
            },
            options: {
              legend: {
                display: false
              },
              tooltips: {
                enabled: true,
                mode: 'single',
                callbacks: {
                    label: function(tooltipItems, data) {
                        return '出版社使用特殊色票次數:'+tooltipItems.yLabel;
                    }
                }
              },
              scales: {
                yAxes: [
                  {
                    ticks: {
                      beginAtZero: true, //從 0 開始
                      responsive: true //符合響應式
                    }
                  }
                ]
              }

            }
          });
      },
      error: function(res) {
              alert("搜尋次數錯誤");

      }


  });
        },
        error: function(res) {
                // console.log(res)
        }
  });

        },
        error: function(res) {
            alert("年分搜尋失敗");

        }

    });

///////////////////////////////////////////////////////////////////////

$("#select1").change(function(){
  var cx = $("#canvas-holder");
  var url = getRootPath() + "/Controller/chart_Process.php"
  var chart = 'bar'
  var use_num= $(this).val();
  var ran_k='ALL'
  var html='<div style="background-color:#F1F1F1;" class="col-sm-3 col-md-3 col-xs-3  col-lg-3 tborder ">'+'出版社'+'</div><div style="background-color:#F1F1F1;" class="col-sm-3 col-md-3 col-xs-3 col-lg-3 tborder">'+'調色次數'+'</div><div style="background-color:#F1F1F1;" class="col-sm-3 col-md-3 col-xs-3 col-lg-3 tborder">'+'印件數'+'</div><div style="background-color:#F1F1F1;" class="col-sm-3 col-md-3 col-xs-3 col-lg-3 tborder">'+'詳情'+'</div>'
  $("#top").empty()
  $('.chart_div').empty()
  $('.table_cont').empty()
  cx.empty()
  cx.append('<canvas id="chart-area"></canvas>')
  if(use_num=='請選擇搜尋時間'){
    alertify
      .alert("請選擇正確時間", function(){
        alertify.message('請選擇正確時間');
      });
    return false
  }
  // cx.empty()
  $.ajax({
      type: "post",
      url: url,
      data:{chart:chart,use_num:use_num,ran_k:ran_k},
      dataType: "json",
      success: function(res) {
        guest=[]
        count=[]
        $.each(res,function(i,n){
          guest[i]=n.guest;
          count[i]=n.count;
          // console.log(n.guest)
          if(i%2==0){
              html += '<div  class=" col-sm-3 col-md-3 col-xs-3 col-lg-3 border" style="height:22px" >'+n.guest+
              '</div><div class="count col-sm-3 col-md-3 col-xs-3 col-lg-3 border" >'+n.count+
              '</div><div style="height:22px"  class="count col-sm-3 col-md-3 col-xs-3 col-lg-3 border">'+n.Number_of_prints+
              '</div><div class=" col-sm-3 col-md-3 col-xs-3  col-lg-3 border"  style="height:22px"><input style="width:40px;height:20px;font-size:4px;" type="button"  data-title="'+n.guest+
              '" value="詳情" onclick="getcount_content(this)"></div>'

          }else{

              html += '<div  class=" col-sm-3 col-md-3 col-xs-3  col-lg-3 border" style="background-color:#F1F1F1;height:22px;">'+n.guest+
              '</div><div style="background-color:#F1F1F1;height:22px"  class="count col-sm-3 col-md-3 col-xs-3 col-lg-3 border">'+n.count+
              '</div><div style="background-color:#F1F1F1;height:22px"  class="count col-sm-3 col-md-3 col-xs-3 col-lg-3 border">'+n.Number_of_prints+
              '</div><div class=" col-sm-3 col-md-3 col-xs-3  col-lg-3 border"  style="background-color:#F1F1F1;height:22px"><input style="width:40px;height:20px;font-size:4px;" type="button" data-title="'
              +n.guest+'" value="詳情" onclick="getcount_content(this)"></div>'
          }
          $('.chart_div').html(html)

        }); 
          $(".border").mouseover(function () {
            oldColor = $(this).css("background-color");
          $(this).css("background-color","#d9e8fb");
            }).mouseout(function () {
                $(this).css("background-color",oldColor);
            });
          $('[data-toggle="popover"]').popover()
          var ctx = document.getElementById("chart-area");
          //標籤若超過兩個要用陣列表示，若沒有就是字串表示
          var myChart = new Chart(ctx, {
            type: "bar", //圖表類型
            data: {
              //項目標題
              labels: guest,
              datasets: [
                {
                  label: "", //標籤
                  data: count, //資料
                  //圖表背景色
                  backgroundColor: ["rgba(153,246,197,0.8)", "rgba(200,176,194,0.8)", "rgba(184,55,134,0.8)", "rgba(64,205,154,0.8)", "rgba(93,174,7,0.8)", "rgba(177,236,191,0.8)", "rgba(120,79,246,0.8)", "rgba(49,226,177,0.8)", "rgba(76,41,51,0.8)", "rgba(49,80,93,0.8)", "rgba(220,18,133,0.8)", "rgba(142,137,207,0.8)", "rgba(154,88,138,0.8)", "rgba(50,101,49,0.8)", "rgba(146,207,160,0.8)", "rgba(151,107,15,0.8)", "rgba(2,221,94,0.8)", "rgba(12,31,39,0.8)", "rgba(197,95,120,0.8)", "rgba(125,230,203,0.8)", "rgba(87,235,92,0.8)", "rgba(192,150,238,0.8)", "rgba(217,110,193,0.8)", "rgba(108,201,234,0.8)", "rgba(81,205,226,0.8)", "rgba(82,11,209,0.8)", "rgba(78,215,193,0.8)", "rgba(108,143,164,0.8)", "rgba(8,190,244,0.8)", "rgba(75,72,185,0.8)", "rgba(237,21,0,0.8)", "rgba(180,177,90,0.8)", "rgba(234,176,39,0.8)", "rgba(96,154,247,0.8)", "rgba(171,230,17,0.8)", "rgba(175,102,224,0.8)", "rgba(33,231,14,0.8)", "rgba(133,150,9,0.8)", "rgba(221,33,51,0.8)", "rgba(12,168,6,0.8)", "rgba(179,177,11,0.8)", "rgba(131,14,26,0.8)", "rgba(202,232,2,0.8)", "rgba(85,5,89,0.8)", "rgba(73,74,248,0.8)", "rgba(49,145,95,0.8)", "rgba(251,172,15,0.8)", "rgba(238,52,176,0.8)", "rgba(19,61,76,0.8)", "rgba(99,39,153,0.8)", "rgba(39,128,116,0.8)", "rgba(187,16,34,0.8)"],
                  //圖表外框線色
                  borderColor: ["rgba(153,246,197,0.8)", "rgba(200,176,194,0.8)", "rgba(184,55,134,0.8)", "rgba(64,205,154,0.8)", "rgba(93,174,7,0.8)", "rgba(177,236,191,0.8)", "rgba(120,79,246,0.8)", "rgba(49,226,177,0.8)", "rgba(76,41,51,0.8)", "rgba(49,80,93,0.8)", "rgba(220,18,133,0.8)", "rgba(142,137,207,0.8)", "rgba(154,88,138,0.8)", "rgba(50,101,49,0.8)", "rgba(146,207,160,0.8)", "rgba(151,107,15,0.8)", "rgba(2,221,94,0.8)", "rgba(12,31,39,0.8)", "rgba(197,95,120,0.8)", "rgba(125,230,203,0.8)", "rgba(87,235,92,0.8)", "rgba(192,150,238,0.8)", "rgba(217,110,193,0.8)", "rgba(108,201,234,0.8)", "rgba(81,205,226,0.8)", "rgba(82,11,209,0.8)", "rgba(78,215,193,0.8)", "rgba(108,143,164,0.8)", "rgba(8,190,244,0.8)", "rgba(75,72,185,0.8)", "rgba(237,21,0,0.8)", "rgba(180,177,90,0.8)", "rgba(234,176,39,0.8)", "rgba(96,154,247,0.8)", "rgba(171,230,17,0.8)", "rgba(175,102,224,0.8)", "rgba(33,231,14,0.8)", "rgba(133,150,9,0.8)", "rgba(221,33,51,0.8)", "rgba(12,168,6,0.8)", "rgba(179,177,11,0.8)", "rgba(131,14,26,0.8)", "rgba(202,232,2,0.8)", "rgba(85,5,89,0.8)", "rgba(73,74,248,0.8)", "rgba(49,145,95,0.8)", "rgba(251,172,15,0.8)", "rgba(238,52,176,0.8)", "rgba(19,61,76,0.8)", "rgba(99,39,153,0.8)", "rgba(39,128,116,0.8)", "rgba(187,16,34,0.8)"],
                  //外框線寬度
                  borderWidth: 1 //從這裡開始加第二筆資料
                }
              ]
            },
            options: {
                      legend: {
                        display: false
                      },
                      tooltips: {
                          enabled: true,
                          mode: 'single',
                          callbacks: {
                              label: function(tooltipItems, data) {
                                  return '出版社使用特殊色票次數:'+tooltipItems.yLabel;
                              }
                          }
                      },
                      scales: {
                        yAxes: [
                          {
                            ticks: {
                              beginAtZero: true, //從 0 開始
                              responsive: true //符合響應式
                            }
                          }
                        ]
                      }
            }
          });

      },
      error: function(res) {
              alert("搜尋次數錯誤");

      }


  });
  var date = $('#select1').val()
  var chart = 'top'
  var ran_k ='ALL'
  $.ajax({
        type: "post",
        url: url,
        data:{chart:chart,date:date,ran_k:ran_k},
        dataType: "json",
        success: function(res) {
            var option = $("<option>").text('請選擇搜名次區間'); 
            $("#top").append(option); 
            var option = $("<option>").val('year_ALL').text('全部排名'); 
            $("#top").append(option); 
            ranking=res.length/5
            ranking=Math.ceil(ranking)
            var rank='5'
            for( var i=1;i<=ranking;i++){
              End=i*rank
              Start=End-3
              var option = $("<option>").val(Start-1).text(Start+'-'+End); 
              $("#top").append(option); 
            }
        },
        error: function(res) {
                // console.log(res)
        }
  });
})

//排名 取得統計圖
$("#top").change(function(){
  var cx = $("#canvas-holder");
  var url = getRootPath() + "/Controller/chart_Process.php"
  var chart = 'bar'
  var ran_k='ALL_yes'
  var use_num= $('#select1').val();
  var rank_val=$('#top').val();
  var html='<div style="background-color:#F1F1F1;" class="col-sm-3 col-md-3 col-xs-3  col-lg-3 tborder ">'+'出版社'+'</div><div style="background-color:#F1F1F1;" class="col-sm-3 col-md-3 col-xs-3 col-lg-3 tborder">'+'調色次數'+'</div><div style="background-color:#F1F1F1;" class="col-sm-3 col-md-3 col-xs-3 col-lg-3 tborder">'+'印件數'+'</div><div style="background-color:#F1F1F1;" class="col-sm-3 col-md-3 col-xs-3 col-lg-3 tborder">'+'詳情'+'</div>'
  cx.empty()
  cx.append('<canvas id="chart-area"></canvas>')
  // cx.empty()
  $.ajax({
      type: "post",
      url: url,
      data:{chart:chart,use_num:use_num,ran_k:ran_k,rank_val:rank_val},
      dataType: "json",
      success: function(res) {
        guest=[]
        count=[]
        // console.log(res)
        $.each(res,function(i,n){
          guest[i]=n.guest;
          count[i]=n.count;
          // console.log(n.guest)
          if(i%2==0){
              html += '<div  class=" col-sm-3 col-md-3 col-xs-3 col-lg-3 border" style="height:22px" >'+n.guest+
              '</div><div class="count col-sm-3 col-md-3 col-xs-3 col-lg-3 border" >'+n.count+
              '</div><div style="height:22px"  class="count col-sm-3 col-md-3 col-xs-3 col-lg-3 border">'+n.Number_of_prints+
              '</div><div class=" col-sm-3 col-md-3 col-xs-3  col-lg-3 border"  style="height:22px"><input style="width:40px;height:20px;font-size:4px;" type="button"  data-title="'+n.guest+
              '" value="詳情" onclick="getcount_content(this)"></div>'

          }else{

              html += '<div  class=" col-sm-3 col-md-3 col-xs-3  col-lg-3 border" style="background-color:#F1F1F1;height:22px;">'+n.guest+
              '</div><div style="background-color:#F1F1F1;height:22px"  class="count col-sm-3 col-md-3 col-xs-3 col-lg-3 border">'+n.count+
              '</div><div style="background-color:#F1F1F1;height:22px"  class="count col-sm-3 col-md-3 col-xs-3 col-lg-3 border">'+n.Number_of_prints+
              '</div><div class=" col-sm-3 col-md-3 col-xs-3  col-lg-3 border"  style="background-color:#F1F1F1;height:22px"><input style="width:40px;height:20px;font-size:4px;" type="button" data-title="'
              +n.guest+'" value="詳情" onclick="getcount_content(this)"></div>'
          }
          $('.chart_div').html(html)

        }); 
          $(".border").mouseover(function () {
            oldColor = $(this).css("background-color");
          $(this).css("background-color","#d9e8fb");
            }).mouseout(function () {
                $(this).css("background-color",oldColor);
            });
          $('[data-toggle="popover"]').popover()
          var ctx = document.getElementById("chart-area");
          //標籤若超過兩個要用陣列表示，若沒有就是字串表示
          var myChart = new Chart(ctx, {
            type: "bar", //圖表類型
            data: {
              //項目標題
              labels: guest,
              datasets: [
                {
                  label: "", //標籤
                  data: count, //資料
                  //圖表背景色
                  backgroundColor: ["rgba(153,246,197,0.5)", "rgba(200,176,194,0.8)", "rgba(184,55,134,0.8)", "rgba(64,205,154,0.8)", "rgba(93,174,7,0.8)", "rgba(177,236,191,0.8)", "rgba(120,79,246,0.8)", "rgba(49,226,177,0.8)", "rgba(76,41,51,0.8)", "rgba(49,80,93,0.8)", "rgba(220,18,133,0.8)", "rgba(142,137,207,0.8)", "rgba(154,88,138,0.8)", "rgba(50,101,49,0.8)", "rgba(146,207,160,0.8)", "rgba(151,107,15,0.8)", "rgba(2,221,94,0.8)", "rgba(12,31,39,0.8)", "rgba(197,95,120,0.8)", "rgba(125,230,203,0.8)", "rgba(87,235,92,0.8)", "rgba(192,150,238,0.8)", "rgba(217,110,193,0.8)", "rgba(108,201,234,0.8)", "rgba(81,205,226,0.8)", "rgba(82,11,209,0.8)", "rgba(78,215,193,0.8)", "rgba(108,143,164,0.8)", "rgba(8,190,244,0.8)", "rgba(75,72,185,0.8)", "rgba(237,21,0,0.8)", "rgba(180,177,90,0.8)", "rgba(234,176,39,0.8)", "rgba(96,154,247,0.8)", "rgba(171,230,17,0.8)", "rgba(175,102,224,0.8)", "rgba(33,231,14,0.8)", "rgba(133,150,9,0.8)", "rgba(221,33,51,0.8)", "rgba(12,168,6,0.8)", "rgba(179,177,11,0.8)", "rgba(131,14,26,0.8)", "rgba(202,232,2,0.8)", "rgba(85,5,89,0.8)", "rgba(73,74,248,0.8)", "rgba(49,145,95,0.8)", "rgba(251,172,15,0.8)", "rgba(238,52,176,0.8)", "rgba(19,61,76,0.8)", "rgba(99,39,153,0.8)", "rgba(39,128,116,0.8)", "rgba(187,16,34,0.8)"],
                  //圖表外框線色
                  borderColor: ["rgba(153,246,197,0.1)", "rgba(200,176,194,0.8)", "rgba(184,55,134,0.8)", "rgba(64,205,154,0.8)", "rgba(93,174,7,0.8)", "rgba(177,236,191,0.8)", "rgba(120,79,246,0.8)", "rgba(49,226,177,0.8)", "rgba(76,41,51,0.8)", "rgba(49,80,93,0.8)", "rgba(220,18,133,0.8)", "rgba(142,137,207,0.8)", "rgba(154,88,138,0.8)", "rgba(50,101,49,0.8)", "rgba(146,207,160,0.8)", "rgba(151,107,15,0.8)", "rgba(2,221,94,0.8)", "rgba(12,31,39,0.8)", "rgba(197,95,120,0.8)", "rgba(125,230,203,0.8)", "rgba(87,235,92,0.8)", "rgba(192,150,238,0.8)", "rgba(217,110,193,0.8)", "rgba(108,201,234,0.8)", "rgba(81,205,226,0.8)", "rgba(82,11,209,0.8)", "rgba(78,215,193,0.8)", "rgba(108,143,164,0.8)", "rgba(8,190,244,0.8)", "rgba(75,72,185,0.8)", "rgba(237,21,0,0.8)", "rgba(180,177,90,0.8)", "rgba(234,176,39,0.8)", "rgba(96,154,247,0.8)", "rgba(171,230,17,0.8)", "rgba(175,102,224,0.8)", "rgba(33,231,14,0.8)", "rgba(133,150,9,0.8)", "rgba(221,33,51,0.8)", "rgba(12,168,6,0.8)", "rgba(179,177,11,0.8)", "rgba(131,14,26,0.8)", "rgba(202,232,2,0.8)", "rgba(85,5,89,0.8)", "rgba(73,74,248,0.8)", "rgba(49,145,95,0.8)", "rgba(251,172,15,0.8)", "rgba(238,52,176,0.8)", "rgba(19,61,76,0.8)", "rgba(99,39,153,0.8)", "rgba(39,128,116,0.8)", "rgba(187,16,34,0.8)"],
                  //外框線寬度
                  borderWidth: 1 //從這裡開始加第二筆資料
                }
              ]
            },
            options: {
              legend: {
                display: false
              },
              tooltips: {
                enabled: true,
                mode: 'single',
                callbacks: {
                    label: function(tooltipItems, data) {
                        return '出版社使用特殊色票次數:'+tooltipItems.yLabel;
                    }
                }
              },
              scales: {
                yAxes: [
                  {
                    ticks: {
                      beginAtZero: true, //從 0 開始
                      responsive: true //符合響應式
                    }
                  }
                ]
              }

            }
          });
      },
      error: function(res) {
              alert("搜尋次數錯誤");

      }


  });

})
});

function getcount_content(myObj){
    var url = getRootPath() + "/Controller/chart_Process.php"
    var chart = 'count'
  // $(".count").each(function(){
     var select_num=$(myObj).data('title')
     // console.log(select_num)
     var date = $('#select1').val()
     var t_his=$('.table_cont')
     var sss=''
     var Book_Name=[]
     var content =[]
     var number = []
     $.ajax({
        type: "post",
        url: url,
        data:{chart:chart,select_num:select_num,date:date},
        dataType: "json",
        success: function(res) {
          $('#title_data').text(select_num)
          sss = "<thead><th><span  style='color:black;'>NO</span></th><th><span  style='color:black;'>書名</span></th><th><span style='color:black;'>內容</span></th><th><span style='color:black;'>色票</span></th></thead><tbody class='tbody_css'>"
          // select_num
        $.each(res,function(i,n){
          a=i+1
          if(i%2==0){
            sss +='<tr ><td>'+a+'</td><td>'+n.Book_Name+'</td><td>'+n.content+'</td><td>'+n.number+'</td></tr>'
          }else{
            sss +='<tr style="background-color:#F1F1F1"><td>'+a+'</td><td>'+n.Book_Name+'</td><td>'+n.content+'</td><td>'+n.number+'</td></tr>'
          }
        })
          sss +=' </tbody>'
           t_his.html(sss)

        },
        error: function(res) {
                alert("搜尋次數錯誤");

        }
    });
  // });

  }