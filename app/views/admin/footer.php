

  
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
      thongke();

   var char = new Morris.Area({
 // ID of the element in which to draw the chart.
 element: 'chart',
 // Chart data records -- each entry in this array corresponds to a point on
 // the chart.
 data: [
   { date: '2022',order: 5, sales:1500, quantity: 20 },
   { date: '2022',order: 4, sales:1000, quantity: 10 },
   { date: '2023',order: 5, sales:1500, quantity: 15 },
   { date: '2024',order: 5, sales:1500, quantity: 20 },
   
 ],
 // The name of the data record attribute that contains x-values.
 xkey: 'date',
 // A list of names of data record attributes that contain y-values.
 ykeys: ['date','order','sales','quantity'],
 // Labels for the ykeys -- will be displayed when you hover over the
 // chart.
 labels: ['Đơn hàng','Doanh thu','Số lượng bán ra']
});
$('.select-date').change(function(){
  //lay gia trj của opption
  var thoigian=$(this).val();
  if(thoigian=='7ngay'){
    var text= '7 ngày qua';
  }else if(thoigian=='28ngay'){
    var text= '28 ngày qua';
  }else if(thoigian=='90ngay'){
    var text= '90 ngày qua';
  }else{
    var text= '365 ngày qua';
  }
  $('#text-date').text(text);

  
})
function thongke(){
  var text= '365 Ngày qua';
  $('#text-date').text(text);
 
}
});
</script>
</body>


</html>