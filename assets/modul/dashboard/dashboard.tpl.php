<style>
    #Container_jbeeb_261, #TextBox_jbeeb_345, #Container_jbeeb_346, #TextBox_jbeeb_430 {
      display:none;
    }
    #clockdiv > div{
    padding: 10px;
    border-radius: 3px;
    background: #ccc;
    display: inline-block;
    margin: 2px;
  }
  #clockdiv div > span{
    padding: 15px;
    border-radius: 3px;
    background: white;
    display: inline-block;
    width: 55px;
    text-align:center;
  }
  .smalltext{
    padding-top: 5px;
    font-size: 14px;
    text-align: center;
}
</style>
<link rel="stylesheet" href="../../assets/plugins/flipclock/flipclock.css">
<?php 
  $product=get_data($_SESSION['uid'],'product');
  $role=get_data($_SESSION['uid'],'role');
  $fecha_vencimiento=getFechaExpiracion($product);
  $ffinal=strtotime($fecha_vencimiento.' 23:59:59');
  $fahora=strtotime(date('Y-m-d H:i:s'));
  $resta=$ffinal-$fahora;
  if($resta<0){
    $resta=1;
  }
?>

<div class="row dash" style="width:98%">
  <h3>Dashboard</h3>
        <div class="col-sm-6">
          <h2>Vencimiento de la menbresia</h2>
 <div id="expiration_date" class="clock">
  <div id="clockdiv">
  <div>
    <span class="days"></span>
    <div class="smalltext">Dias</div>
  </div>
  <div>
    <span class="hours"></span>
    <div class="smalltext">Horas</div>
  </div>
  <div>
    <span class="minutes"></span>
    <div class="smalltext">Minutos</div>
  </div>
  <div>
    <span class="seconds"></span>
    <div class="smalltext">Segundos</div>
  </div>
</div>
</div>
<script src="../../assets/plugins/flipclock/flipclock.js" ></script>

<script type="application/javascript">

            $.ajax({
                type: "GET",
                url: "/user-management",
                cache: false,
                complete: function(e, xhr, settings){
                    console.log(e, xhr, settings);
                }
            }); 

  </script>
    </div>
     

    <div class=" col-sm-6" >
      <h2>Precio del Bitcoin en USD</h2>
<p style="font-size:32px; margin-top: 20px; color:black" >$<span class="pricer" id="price" style="font-size: 2em;"></span></p>
  <p class="col-sm-12 datep" style="font-size:16px" id="datep"></p>
    </div>
</div>

<script type="text/javascript" >

var clock;
usdtobitcoins=0;

$(document).ready(function() {
  

 /*var clock = $('#expiration_date').FlipClock(3600 * 24 * 3, {
    clockFace: 'DailyCounter',
    countdown: true
  });*/
 

  function perro(){
 
   $.ajax({
            url: 'http://api.coindesk.com/v1/bpi/currentprice.json',
            type:'GET',
            dataType: 'JSON',
            success: function (data) {
            var numero = data.bpi.USD.rate;

            $("#datep").html(data.time.updated); 
            $("#price").html(numero);
              var btx=$('#realavailable').html();
              if(btx>0){
                
                  var numero1=parseFloat(numero.replace(',','').replace('.',',')).toFixed('2');
                  var numero2=parseFloat(btx).toFixed(2);
                  var usdtobitcoins=btx/numero1;

                  if(usdtobitcoins>0){
                    $('#usdavailable').html(usdtobitcoins.toFixed(4));
                  }else{
                    $('#usdavailable').html("UNLIMITED");
                  }
              }
              setTimeout(perro(),3000);
                 
            }
          });

  }
  
  setTimeout(perro(),3000);

});

//Clock

function getTimeRemaining(endtime) {
  var t = Date.parse(endtime) - Date.parse(new Date());
  var seconds = Math.floor((t / 1000) % 60);
  var minutes = Math.floor((t / 1000 / 60) % 60);
  var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
  var days = Math.floor(t / (1000 * 60 * 60 * 24));
  return {
    'total': t,
    'days': days,
    'hours': hours,
    'minutes': minutes,
    'seconds': seconds
  };
}

function initializeClock(id, endtime) {
  var clock = document.getElementById(id);
  var daysSpan = clock.querySelector('.days');
  var hoursSpan = clock.querySelector('.hours');
  var minutesSpan = clock.querySelector('.minutes');
  var secondsSpan = clock.querySelector('.seconds');

  function updateClock() {
    var t = getTimeRemaining(endtime);

    daysSpan.innerHTML = t.days;
    hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
    minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
    secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

    if (t.total <= 0) {
      clearInterval(timeinterval);
    }
  }

  updateClock();
  var timeinterval = setInterval(updateClock, 1000);
}
var segundos="<?php echo $resta ?>";
var deadline = new Date(Date.parse(new Date()) + (segundos) * 1000);
initializeClock('clockdiv', deadline);
</script> 