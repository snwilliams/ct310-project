$('document').ready(() => {
    $("table").tablesorter({
        theme: 'metro-dark',
      sortList: [[0,0],[1,0],[2,0]],
      widthFixed: true,
      widgets: ['zebra', 'columns', 'filter']
    })
    .tablesorterPager({
      container: $(".pager"),
      output: '{startRow} to {endRow} ({totalRows})'

    });
})