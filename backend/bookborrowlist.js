$(document).ready(function () {
  $("#myTable").DataTable();
  $("#studentTable").DataTable();
  $("#bookTable").DataTable();
});

$(document).ready(function () {
  $(".editbtn").on("click", function () {
    $("#editmodal").modal("show");
    $tr = $(this).closest("tr");

    var data = $tr.children("td").map(function () {
      return $(this).text();
    });

    console.log(data);

    $("#ref_id").val(data[0]);
    $("#isbn_return").val(data[1]);
    $("#author_update").val(data[2]);
    $("#category_update").val(data[3]);
    $("#yearpublished_update").val(data[4]);
  });
});

$(document).ready(function () {
  $(".deletebtn").on("click", function () {
    $("#deletemodal").modal("show");

    $tr = $(this).closest("tr");

    var data = $tr.children("td").map(function () {
      return $(this).text();
    });

    console.log(data);

    $("#refID").val(data[0]);
    $("#recordisbn").val(data[1]);
  });
});
