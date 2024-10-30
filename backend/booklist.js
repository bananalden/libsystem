$(document).ready(function () {
  $("#myTable").DataTable();
  $("#recycleTable").DataTable();
});

$(document).ready(function () {
  $(".editbtn").on("click", function () {
    $("#editmodal").modal("show");
    $tr = $(this).closest("tr");

    var data = $tr.children("td").map(function () {
      return $(this).text();
    });

    console.log(data);

    $("#isbn_update").val(data[0]);
    $("#title_update").val(data[1]);
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

    $("#isbn_delete").val(data[0]);
    $("#missing_title").val(data[1]);
    $("#missing_author").val(data[2]);
    $("#missing_category").val(data[3]);
    $("#missing_year").val(data[4]);
    $("#missing_status").val(data[5]);
  });
});

$(document).ready(function () {
  $(".foundbtn").on("click", function () {
    $("#foundbtn").modal("show");

    $tr = $(this).closest("tr");

    var data = $tr.children("td").map(function () {
      return $(this).text();
    });

    console.log(data);

    $("#found_isbn").val(data[0]);
    $("#found_title").val(data[1]);
    $("#found_author").val(data[2]);
    $("#found_category").val(data[3]);
    $("#found_year").val(data[4]);
    $("#found_status").val(data[5]);
  });
});
