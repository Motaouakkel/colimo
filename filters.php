<?php

if (!isset($_POST["filtersData"])) {
    return;
}
?>
<div class="row ls-filters">
    <nav>
        <ul class="filters-list">
            <?php
            foreach ($_POST["filtersData"] as $mainkey => $filter) {
                $filtersList = [];
                if (isset($filter['data'])) {
                    $default_id = isset($filter['default_id']) ? $filter['default_id'] : null;
                    if ($default_id != null) {
                        $filtersList[] = $filter['data'][$default_id];
                    } else {
                        $filtersList = $filter['data'];
                    }
                } else {
                    foreach ($filter['mapper'] as $key => $subArray) {
                        foreach ($subArray as $key => $value) {
                            $filtersList[] = $value;
                        }
                    }
                }
                $filtersListJson = json_encode($filtersList);
            ?>
                <li class="filter-child" data-id="<?php echo $mainkey ?>">
                    <span class="filter-title"><?php echo (isset($filter['caption']) ? $filter['caption']  : $filter['name'])  ?></span>
                    <span class="filter-subtitle"><?php echo  isset($filter['default_id']) ? "Quelques" : "Tout"  ?> </span>
                </li>
                <script>
                    demodata = <?php echo $filtersListJson; ?>;
                    localStorage.setItem('<?php echo "filter" . $mainkey; ?>', JSON.stringify(<?php echo $filtersListJson; ?>));
                </script>
            <?php
            }
            ?>
        </ul>
    </nav>

    <div class="filters-pop-up">
        <div class="content">
            <div class="container">
                <div class="row pop-up-header">
                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                        <div class="filter-title">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
                        <div class="filter-search input-group mb-3">
                            <input type="text" class="form-control" placeholder="Search...">
                        </div>

                    </div>
                </div>
                <div class="row pop-up-body">
                    <div class="select-all form-check">
                        <input class="form-check-input" type="checkbox" value="" id="select-all">
                        <label class="form-check-label" for="select-all">
                            Sélectionner tous
                        </label>
                    </div>
                    <ul class="filter-list">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                            </label>
                        </div>
                    </ul>
                </div>
                <div class="row pop-up-footer pop-up-btn">
                    <span class="back">Annuler</span>
                    <span class="save">Appliquer</span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    injectHorizontalScrollButtons();
    var filtersData = <?php echo json_encode($_POST["filtersData"]); ?>;
    $('.filter-child').click(function() {
        var popup = $('.filters-pop-up');
        var filterList = $('.filter-list');
        var popupTitle = $('.pop-up-header .filter-title');
        popupTitle.html($(this).children(".filter-title").html());
        filterList.empty();
        var filterData = filtersData[$(this).data("id")];
        popup.attr("data-active", $(this).data("id"));
        var index = 0;
        if (filterData['data']) {
            filterData['data'].forEach(filter => {
                var htmlToAppend = buildFilterItem(index, filter);
                $('.filter-list').append(htmlToAppend);
                index++;
            });
        } else if (filterData['mapper']) {
            var parentFilters = [];
            var parentStoredData = localStorage.getItem("filter" + filterData["parent_id"]);
            if (parentStoredData.length > 0) {
                parentFilters = JSON.parse(parentStoredData);
            }
            Object.keys(filterData['mapper']).forEach(maper => {
                if (parentFilters.includes(maper)) {
                    filterData['mapper'][maper].forEach(maperItem => {
                        var htmlToAppend = buildFilterItem(index, maperItem);
                        $('.filter-list').append(htmlToAppend);
                        index++;
                    });
                }
            });
        }
        prefFilters = [];
        var storedData = localStorage.getItem("filter" + $(this).data("id"));
        if (storedData.length > 0) {
            var prefFilters = JSON.parse(storedData);
            $('.filter-list .form-check-input').each(function() {
                if (prefFilters.includes($(this).next('label').text())) {
                    $(this).prop("checked", true);
                }
                filtersCounter++;
            });
        }
        var filtersCounter = 0;

        $('#select-all').prop("checked", isAllSet());
        $('.form-check').each(function() {
            $(this).click(function() {
                $('#select-all').prop("checked", isAllSet());
                if (isNoOneSelected()) {
                    $('.filters-pop-up .save').addClass('disabled');
                } else {
                    $('.filters-pop-up .save').removeClass('disabled');
                }
            });
        });
        $('.filters-pop-up').addClass('open');
    });

    $('.filters-pop-up .back').click(function() {
        $('.filters-pop-up').removeClass('open');
    });

    $('#select-all').click(function() {
        $('.filter-list .form-check-input').each(function() {
            $(this).prop("checked", $('#select-all').is(":checked"));
        });
    });

    $('.filters-pop-up .save').click(async function() {
        var popup = $('.filters-pop-up');
        var filters = [];

        // Get checked filters
        $('.filter-list .form-check-input').each(function() {
            if ($(this).is(":checked")) {
                filters.push($(this).next("label").text());
            }
        });
        var activeId = popup.attr("data-active");
        var jsonString = JSON.stringify(filters);

        // Save checked filters in localStorage 
        localStorage.setItem('filter' + activeId, jsonString);

        // Change Filters label [ Tout  , Quelques , Aucun]
        var selectedElement = $('li.filter-child[data-id="' + activeId + '"]');
        var filterSubtitle = selectedElement.find('.filter-subtitle');
        if ($('.filter-list .form-check-input:checked').length == 0) {
            filterSubtitle.html("Aucun");
        } else {
            filterSubtitle.html((isAllSet() ? "Tout" : "Quelques"));
        }

        // Set the filter children [ Agence => bloc ...]
        await activeFilterChildrens(activeId);

        // Trigger a custom ( LSFiltersChanged )
        $(document).trigger('LSFiltersChanged', activeId);

        // Close the filters box
        $('.filters-pop-up').removeClass('open');
    });


    $('.filter-search input').on('input', function() {
        // Get the entered value
        var filterValue = $(this).val().toLowerCase();

        // Loop through each form-check div
        $('.form-check').each(function() {
            // Check if the label's text contains the filter value
            if (!$(this).hasClass('select-all')) {
                if ($(this).find('.form-check-label').text().toLowerCase().includes(filterValue)) {
                    $(this).fadeIn(); // Show the form-check div if it matches
                } else {
                    $(this).fadeOut(); // Hide the form-check div if it doesn't match
                }
            }
        });
    });

    function buildFilterItem(index, label) {
        return '<div class="form-check">' +
            '<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault' + index + '">' +
            '<label class="form-check-label" for="flexCheckDefault' + index + '">' + label + '</label>' +
            '</div>';
    }

    function isAllSet() {
        return $('.filter-list .form-check-input').length === $('.filter-list .form-check-input:checked').length
    }

    function isNoOneSelected() {
        return $('.filter-list .form-check-input:checked').length == 0;
    }

    async function activeFilterChildrens(filterId) {
        if (filtersData[filterId]) {
            var childId = filtersData[filterId]['child_id'];
            var parentId = filterId;
            while (childId) {
                if (filtersData[childId]) {
                    // Get parent config
                    var parentFilters = [];
                    var parentStoredData = localStorage.getItem("filter" + parentId);
                    if (parentStoredData.length > 0) {
                        parentFilters = JSON.parse(parentStoredData);

                        // Set the child data
                        var childFilters = [];
                        if (filtersData[childId]['mapper']) {
                            Object.keys(filtersData[childId]['mapper']).forEach(maper => {
                                if (parentFilters.includes(maper)) {
                                    filtersData[childId]['mapper'][maper].forEach(maperItem => {
                                        childFilters.push(maperItem);
                                    });
                                }
                            });
                            var jsonString = JSON.stringify(childFilters);
                            localStorage.setItem('filter' + childId, jsonString);
                        }
                    }
                }
                if (filtersData[childId]['child_id']) {
                    parentId = childId;
                    childId = filtersData[childId]['child_id'];
                } else {
                    break;
                }
            }
        }
    }

    async function applayLSFilters(pivot, captionsMapper, bol) {
        $(document).on('LSFiltersChanged', async function(event, filterId) {
            const filterss = [];

            for (let index = 0; index < filtersData.length; index++) {
                const filter = filtersData[index];
                const totalFilters = filter['data'] ? filter['data'].length : Object.values(filter['mapper']).flat().length;

                const currentFilter = {
                    "uniqueName": filter.name
                };

                const filterConfig = getFilterConfigById(index);

                if (filterConfig.length > 0 && filterConfig.length < totalFilters) {
                    currentFilter.filter = {
                        "members": filterConfig.map(fi => `${filter.name}.${fi}`)
                    };
                }

                if (filter["static"] !== undefined && currentFilter.filter) {
                    currentFilter.filter.members.push(`${filter.name}.${filter["static"]}`);
                }
                if (currentFilter.filter && currentFilter.filter["members"]) {
                    currentFilter.filter.members.push(`${filter.name}.lxjiwil`)
                }
                filterss.push(currentFilter);
            }

            const firstrep = pivot.getReport();
            // firstrep.slice.reportFilters = filterss;

            for (const element of firstrep.slice.measures) {
                if (captionsMapper) {
                    const captionMapper = captionsMapper.find(item => item.uniqueName === element.uniqueName);
                    if (captionMapper) {
                        element['caption'] = captionMapper.caption;
                    }
                }
            }
            pivot.setReport(firstrep)
            filterss.forEach(e => {
                if (e.filter) {
                    pivot.setFilter(e.uniqueName, e.filter.members)
                } else {
                    pivot.setFilter(e.uniqueName, [])
                }

            })

        });
    }

    function getFilterConfigById(filterId) {
        var storedData = localStorage.getItem("filter" + filterId);
        if (storedData.length > 0) {
            return JSON.parse(storedData);
        }
        return;
    }

    function injectHorizontalScrollButtons() {
        var scrollInterval;
        var scrollIncrement = 0;
        var scrollContainerHtml = `
                    <div class="row h-scroll-container">
                        <div class="scroll-btn scoll-left"></div>
                        <div class="scroll-btn scoll-right"></div>
                    </div>
                `;
        $('.navbar.navbar-fixed-top.bg-light').after(scrollContainerHtml);


        $('.scoll-right').on('mousedown', function() {
            var scrollElements = $('#wdr-data-sheet .wdr-ui-element.wdr-scroll-pane');
            scrollInterval = setInterval(function() {
                if (scrollElements.length > 0) {
                    scrollIncrement += 5;
                    scrollElements.scrollLeft(scrollIncrement);
                }
            }, 5);
        });

        $('.scoll-left').on('mousedown', function() {
            var scrollElements = $('#wdr-data-sheet .wdr-ui-element.wdr-scroll-pane');
            scrollInterval = setInterval(function() {
                if (scrollElements.length > 0) {
                    scrollIncrement -= 5;
                    scrollElements.scrollLeft(scrollIncrement);
                }
            }, 5);
        });

        $('.scoll-left').on('mouseup', function() {
            clearInterval(scrollInterval);
        });

        $('.scoll-right').on('mouseup', function() {
            clearInterval(scrollInterval);
        });
    }
</script>