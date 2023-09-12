
<div class="col-md-2">
  <label for="date1" class="field prepend-icon">
    <input type="text" name="date1" id="date1" class="datepicker form-control" value="">
  </label>
</div>
<div class="col-md-2">

  <input type="text" name="date2" id="date2" class="datepicker  form-control" value="">
  <!-- <script>
        //
        var date = new Date();
        var todaystr = date.getDate() + '/' + (date.getMonth() + 1) + '/' +  date.getFullYear();
        document.getElementById("date2").value = todaystr;
        document.getElementById("date1").value = todaystr;
      </script> -->


</div>
<div class="col-md-2" id="divfilter">
  <label class="field select">
    <select id="filter-customer" name="filter-customer" onchange="loadpartner(this.value)">
      <script>
        function getsup() {

          var e = document.getElementById("f-customer");
          var supid = e.options[e.selectedIndex].value;

          return supid;

        }

        function getag() {

          var e = document.getElementById("filter-customer");
          var supid = e.options[e.selectedIndex].value;

          return supid;

        }

        function loadagency(link) {
          var DDU = document.getElementById("date1").value;
          DDU = DDU.split('/');


          var date_du = DDU[2] + "" + DDU[1] + "" + DDU[0];

          var DAU = document.getElementById("date2").value;
          DAU = DAU.split('/');


          var date_au = DAU[2] + "" + DAU[1] + "" + DAU[0];

          var date1 = new Date(DDU[2], DDU[1], DDU[0]);
          var date2 = new Date(DAU[2], DAU[1], DAU[0]);
          var timeDiff = Math.abs(date2.getTime() - date1.getTime());
          nb_jours = (Math.ceil(timeDiff / (1000 * 3600 * 24))) + 1;

          var ch = 1

          var str = "?date1=" + date_du + "&date2=" + date_au;


          /*make an HTTP request using the attribute value as the file name:*/
          xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4) {
              var list = document.getElementById("filter-customer");

              // As long as <ul> has a child node, remove it
              while (list.hasChildNodes()) {
                list.removeChild(list.firstChild);
              }

              var sel2 = document.getElementById('filter-customer');
              var opt2 = document.createElement('option');
              opt2.appendChild(document.createTextNode("Tout"));

              // set value property of opt
              opt2.value = "0";

              // add opt to end of select box (sel)
              sel2.appendChild(opt2);

              var sel3 = document.getElementById('f-customer');
              var opt3 = document.createElement('option');
              opt3.appendChild(document.createTextNode("Tout"));

              // set value property of opt
              opt3.value = "0";

              // add opt to end of select box (sel)
              sel3.appendChild(opt3);


              var b = JSON.parse(this.response);


              var dataSet1 = b;


              var dataSet = [];
              var sel = document.getElementById('filter-customer');


              for (var i = 0, len = dataSet1.length; i < len; i++) {
                vard = dataSet1[i][1];

                // create new option element
                var opt = document.createElement('option');
                opt.appendChild(document.createTextNode(vard));

                // set value property of opt
                opt.value = dataSet1[i][0];

                // add opt to end of select box (sel)
                sel.appendChild(opt);


              }
            }
          }
          xhttp.open("POST", link, true);

          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send("date1=" + date_du + "&date2=" + date_au + "&ch=" + ch);

          /*exit the function:*/
          return;

        }
        loadagency("agency.php");
      </script>


    </select>
    <i class="arrow double"></i>
  </label>
</div>
<div class="col-md-2" id="div-superviseur">
  <label class="field select">
    <select id="f-customer" name="f-customer">
      <script>
        function loadpartner(agency) {



          /*make an HTTP request using the attribute value as the file name:*/
          xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4) {
              var list = document.getElementById("f-customer");

              // As long as <ul> has a child node, remove it
              while (list.hasChildNodes()) {
                list.removeChild(list.firstChild);
              }

              var sel2 = document.getElementById('f-customer');
              var opt2 = document.createElement('option');
              opt2.appendChild(document.createTextNode("Tout"));

              // set value property of opt
              opt2.value = "0";

              // add opt to end of select box (sel)
              sel2.appendChild(opt2);

              var b = JSON.parse(this.response);


              var dataSet1 = b;

              var dataSet = [];
              var sel = document.getElementById('f-customer');


              for (var i = 0, len = dataSet1.length; i < len; i++) {
                vard = dataSet1[i][1];

                // create new option element
                var opt = document.createElement('option');
                opt.appendChild(document.createTextNode(vard));

                // set value property of opt
                opt.value = dataSet1[i][0];

                // add opt to end of select box (sel)
                sel.appendChild(opt);


              }
            }
          }
          xhttp.open("POST", "superviseur.php", true);

          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send("location_id=" + agency);

          /*exit the function:*/
          return;

        }
      </script>
    </select>
    <i class="arrow double" id="fselect"></i>
  </label>
</div>

<div class="col-md-2">

  <a type="submit" href="#" onclick="loadme(getsup(),getag(),'<?php if (isset($api_action)) echo $api_action ?>')" class="button btn-primary submit-btn">Consulter</a>

</div>