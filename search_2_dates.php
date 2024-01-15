<?php
if (!isset($by_sector)) {
  $by_sector = false;
}
?>
<div class="col-md-2">
  <label for="date1" class="field prepend-icon">
    <input type="text" name="date1" id="date1" class="datepicker form-control" value="">
  </label>
</div>
<div class="col-md-2">

  <input type="text" name="date2" id="date2" class="datepicker  form-control" value="">

</div>
<div class="col-md-2" id="divfilter">
  <label class="field select">
    <select id="filter-customer" name="filter-customer" onchange="<?php echo $by_sector ? "loadSectors(this.value)" : "loadSupervisors(this.value)"  ?>">
      <script>
        loadAgency("filter-customer");
      </script>
    </select>
    <i class="arrow double"></i>
  </label>
</div>
<?php if ($by_sector) : ?>
  <div class="col-md-2" id="div-sector">
    <label class="field select">
      <select id="f-sector" name="f-sector">
        <script>
          var supervisorDropdown = document.getElementById("f-sector");
          addOption(supervisorDropdown, "Secteur", "0");
        </script>
      </select>
      <i class="arrow double" id="fselect"></i>
    </label>
  </div>
<?php else : ?>
  <div class="col-md-2" id="div-superviseur">
    <label class="field select">
      <select id="f-customer" name="f-customer">
        <script>
          var supervisorDropdown = document.getElementById("f-customer");
          addOption(supervisorDropdown, "Superviseur", "0");
        </script>
      </select>
      <i class="arrow double" id="fselect"></i>
    </label>
  </div>
<?php endif; ?>


<div class="col-md-2">
  <a type="submit" href="#" onclick="loadme('<?php if (isset($api_action)) echo $api_action ?>' , <?php echo $by_sector ?> )" class="button btn-primary submit-btn">Consulter</a>
</div>