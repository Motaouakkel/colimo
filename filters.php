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

    $('.filters-pop-up .save').click(function() {
        var popup = $('.filters-pop-up');
        var filters = [];
        $('.filter-list .form-check-input').each(function() {
            if ($(this).is(":checked")) {
                filters.push($(this).next("label").text());
            }
        });
        var activeId = popup.attr("data-active");
        var jsonString = JSON.stringify(filters);
        localStorage.setItem('filter' + activeId, jsonString);
        var selectedElement = $('li.filter-child[data-id="' + activeId + '"]');
        var filterSubtitle = selectedElement.find('.filter-subtitle');
        if ($('.filter-list .form-check-input:checked').length == 0) {
            filterSubtitle.html("Aucun");
        } else {
            filterSubtitle.html((isAllSet() ? "Tout" : "Quelques"));
        }
        activeFilterChildrens(activeId);
        $(document).trigger('LSFiltersChanged', activeId);
        $('.filters-pop-up').removeClass('open');
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

    function activeFilterChildrens(filterId) {
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

    function applayLSFilters(pivot, captionsMapper) {

        $(document).on('LSFiltersChanged', async function(event, filterId) {
            filterss = []
            // Use local storage to  get all filters ( from filter0 to filter(data.length))
            var index = 0;
            filtersData.forEach(filter => {
                currentFilter = {
                    "uniqueName": filter.name
                }
                var filterConfig = getFilterConfigById(index);
                if (filterConfig.length > 0) {
                    currentFilter["filter"] = {
                        "members": []
                    }
                    filterConfig.forEach(fi => {
                        currentFilter.filter.members.push(filter.name + "." + fi);
                    })
                    filterss.push(currentFilter)

                }
                index++;

            });


            firstrep = pivot.getReport()

            firstrep.slice.reportFilters = filterss;
            firstrep.slice.measures.forEach(element => {
                if (captionsMapper) {
                    const captionMapper = captionsMapper.find(item => item.uniqueName === element.uniqueName);
                    if (captionMapper) {
                        element['caption'] = captionMapper.caption;
                    }
                }

            });
            await pivot.runQuery(firstrep.slice);
            pivot.refresh()
        });

    }

    function getFilterConfigById(filterId) {
        var storedData = localStorage.getItem("filter" + filterId);
        if (storedData.length > 0) {
            return JSON.parse(storedData);
        }
        return;
    }
    //applayLSFilters(null);
</script>