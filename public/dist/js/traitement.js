$(document).ready(function () {
   
    $('#datatable').DataTable({
    pageLength: 5,
    lengthMenu:[5,8,15,20,25],
    order: [[1, 'asc'], [0, 'desc']],
    pagingType: "simple_numbers",
    columns: [
        {type: "text"},
        {type: "html"},
        {orderable: false}
    ]
  });



  
});