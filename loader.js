// Helper function to add an option to a select element
function addOption(selectElement, text, value) {
    var option = document.createElement("option");
    option.appendChild(document.createTextNode(text));
    option.value = value;
    selectElement.appendChild(option);
}


// Removes all options from the specified dropdown.
function removeAllOptions(dropdown) {
    while (dropdown.options.length > 0) {
        dropdown.remove(0);
    }
}


// Load Agency
function loadAgency(agenceySelector) {
    // Create a new XMLHttpRequest
    var xhttp = new XMLHttpRequest();

    // Define the callback function for when the request is complete
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4) {
            // Get the select element
            var selectElement = document.getElementById(agenceySelector);

            // Clear all existing options in the select element
            removeAllOptions(selectElement);

            // Parse the JSON response
            var data = JSON.parse(this.response);

            // Add default options (Agence and Superviseur)
            if (data.length > 1 || data.length == 0) {
                addOption(selectElement, "Agence", "0");
            }
            // Load supervisors if there is just one agency
            if (data.length == 1) {
                var agencyId = data[0][0];
                loadSupervisors(agencyId);
            }

            // Iterate over the data and add options to the select element
            for (var i = 0; i < data.length; i++) {
                var optionText = data[i][1];
                var optionValue = data[i][0];

                // Add the option to the select element
                addOption(selectElement, optionText, optionValue);
            }
        }
    };

    // Open the HTTP request
    xhttp.open("POST", "agency.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Send the request
    xhttp.send();
}

/* Gets the selected supervisor ID from the "f-customer" dropdown. */
function getSupervisorId() {
    // Get the "f-customer" dropdown element
    var dropdownElement = document.getElementById("f-customer");

    // Get the selected option from the dropdown
    var selectedOption = dropdownElement.options[dropdownElement.selectedIndex];

    // Get the value (supervisor ID) of the selected option
    var supervisorId = selectedOption.value;

    // Return the selected supervisor ID
    return supervisorId;
}

/* Gets the selected sector ID from the "f-sector" dropdown. */
function getSectorId() {
    // Get the "f-sector" dropdown element
    var dropdownElement = document.getElementById("f-sector");

    // Get the selected option from the dropdown
    var selectedOption = dropdownElement.options[dropdownElement.selectedIndex];

    // Get the value (sector ID) of the selected option
    var sectorId = selectedOption.value;

    // Return the selected sector ID
    return sectorId;
}

/* Gets the selected agency ID from the "filter-customer" dropdown. */
function getAgencyId() {
    // Get the "filter-customer" dropdown element
    var dropdownElement = document.getElementById("filter-customer");

    // Get the selected option from the dropdown
    var selectedOption = dropdownElement.options[dropdownElement.selectedIndex];

    // Get the value (agency ID) of the selected option
    var agencyId = selectedOption.value;

    // Return the selected agency ID
    return agencyId;
}

/* Loads the list of supervisors based on the selected agency. */
function loadSupervisors(agency) {
    // Create a new XMLHttpRequest
    var xhttp = new XMLHttpRequest();

    // Define the callback function for when the request is complete
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4) {
            // Get the "f-customer" dropdown element
            var supervisorDropdown = document.getElementById("f-customer");

            // Clear all existing options in the supervisor dropdown
            removeAllOptions(supervisorDropdown);

            // Parse the JSON response
            var supervisorsData = JSON.parse(this.response);

            // Add a default option for "Superviseur" with value "0"
            if (supervisorsData.length > 1 || supervisorsData.length == 0) {
                addOption(supervisorDropdown, "Superviseur", "0");
            }

            // Populate the supervisor dropdown with options
            for (var i = 0; i < supervisorsData.length; i++) {
                var optionText = supervisorsData[i][1];
                var optionValue = supervisorsData[i][0];

                // Add an option to the dropdown
                addOption(supervisorDropdown, optionText, optionValue);
            }
        }
    };

    // Open the HTTP request
    xhttp.open("POST", "superviseur.php", true);

    // Set the request headers
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Send the request with the selected agency ID
    xhttp.send("location_id=" + agency);
}

/* Loads the list of sectors based on the selected locationId. */
function loadSectors(locationId) {
    // Create a new XMLHttpRequest
    var xhttp = new XMLHttpRequest();

    // Define the callback function for when the request is complete
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4) {
            // Get the "f-sector" dropdown element
            var sectorDropdown = document.getElementById("f-sector");

            // Clear all existing options in the sector dropdown
            removeAllOptions(sectorDropdown);

            // Parse the JSON response
            var sectorsData = JSON.parse(this.response);

            // Add a default option for "Sector" with value "0"
            if (sectorsData.length > 1 || sectorsData.length == 0) {
                addOption(sectorDropdown, "Secteur", "0");
            }

            // Populate the sector dropdown with options
            for (var i = 0; i < sectorsData.length; i++) {
                var optionText = sectorsData[i][1];
                var optionValue = sectorsData[i][0];

                // Add an option to the dropdown
                addOption(sectorDropdown, optionText, optionValue);
            }
        }
    };

    // Open the HTTP request
    xhttp.open("POST", "sectors.php", true);

    // Set the request headers
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Send the request with the selected location ID
    xhttp.send("location_id=" + locationId);
}


/* Loads yesterday's date into the specified input fields. */
function loaddate() {
    // Create a new Date object representing yesterday's date
    var yesterday = new Date(new Date().setDate(new Date().getDate() - 1));

    // Get day, month, and year components with leading zeros if needed
    var dd = ("0" + yesterday.getDate()).slice(-2);
    var mm = ("0" + (yesterday.getMonth() + 1)).slice(-2);
    var yyyy = yesterday.getFullYear();

    // Format the date as "dd/mm/yyyy"
    var formattedDate = dd + "/" + mm + "/" + yyyy;

    // Load the formatted date into input fields from date1 to date4
    for (var i = 1; i <= 4; i++) {
        var dateField = document.getElementById("date" + i);
        if (dateField) {
            dateField.value = formattedDate;
        }
    }
}

/* Loads data based on the specified action, supervisor ID, agency ID, and date range.*/
function loadme(action, bySector = false) {

    // Get supervisor and agency IDs or Sector Id
    var ag_id = getAgencyId();
    if (bySector) {
        var sector_id = getSectorId();
        if (sector_id == 0) {
            alert("Veuillez sélectionner un secteur.");
            return false;
        }
    } else {
        var sup_id = getSupervisorId();
    }

    // Initialize an array to store date parameters
    var dateParams = [];

    // Check and add date1 to date4 if selectors exist
    for (var i = 1; i <= 4; i++) {
        var dateSelector = document.getElementById("date" + i);
        if (dateSelector) {
            dateParams.push(formatDate(dateSelector.value));
        }
    }

    // Check if there are valid date parameters
    if (dateParams.length === 0) {
        console.error("No valid date selectors found");
        return;
    }

    // Prepare query string with date parameters
    var queryString = "?";
    for (var i = 0; i < dateParams.length; i++) {
        queryString += `date${i + 1}=${dateParams[i]}&`;
    }

    // Create an XMLHttpRequest
    var xhttp = new XMLHttpRequest();

    // Define the callback function for when the request is complete
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4) {
            // Call the loadfile function with the response data
            loadfile(this.response);
        }
    };

    // Open the HTTP request
    xhttp.open("POST", "php_to_js.php" + queryString, true);

    // Set the request headers
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Send the request with the specified parameters

    if (bySector) {
        xhttp.send(`action=${action}&sector_id=${sector_id}&agency_id=${ag_id}`);
    } else {
        xhttp.send(`action=${action}&user_id=${sup_id}&agency_id=${ag_id}`);
    }

    // Exit the function
    return;
}

/* Formats the date in the format "YYYYMMDD". */
function formatDate(inputDate) {
    var dateComponents = inputDate.split('/');
    return `${dateComponents[2]}${dateComponents[1]}${dateComponents[0]}`;
}