// jquery start
// strict mode
"use strict";
$(document).ready(function () {
  var $add_product_fields = $("#add_product");
  var $products_list = $("#products_list");
  var form = $("#form-invoice");
  var $index = 0;

  // on click add product button
  $add_product_fields.on("click", function () {
    // foreach product fields append to products list
    $products_list.append(create_product_fields());
  });

  // function  create product fields
  function create_product_fields() {
    var $product_fields = $(
      '<div class="form-group row product_fields">' +
        '<div class="col-md">' +
        '<input type="text" name="products[' +
        $index +
        '][name]" class="form-control" placeholder="Product Name">' +
        "</div>" +
        '<div class="col-md">' +
        '<input type="text" name="products[' +
        $index +
        '][quantity]" class="form-control" placeholder="Quantity">' +
        "</div>" +
        '<div class="col-md">' +
        '<input type="text" name="products[' +
        $index +
        '][price]" class="form-control" placeholder="Price">' +
        "</div>" +
        '<div class="col-md-1">' +
        '<button type="button" class="btn btn-danger remove_product_fields">X</button>' +
        "</div>" +
        "</div>"
    );
    $products_list.append($product_fields);
    $index++;
  }

  //  multiple product fields remove
  $products_list.on("click", ".remove_product_fields", function () {
    $(this).closest(".product_fields").remove();
  });
});
