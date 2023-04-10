const mapping = {
    DVD: "dvd_attributes",
    Book: "book_attributes",
    Furniture: "furniture_attributes"
}

function HideFields(node) {

    node.style.display = "none";
    node.lastElementChild.removeAttribute('required');

}
function selectProductType(value) {


    document.querySelectorAll('.fieldbox').forEach((node) => (HideFields(node)));

    
    document.getElementById(mapping[value]).style.display = "flex";
    document.getElementById(mapping[value]).style.flexDirection = "column";
    document.getElementById(mapping[value]).lastElementChild.setAttribute('required', '');
}

$(document).ready(function () {
    $("#productModal").on("hidden.bs.modal", function () {
        $('#product-attributes').empty();
    });

    $(".card-link").click(function () {
        var product_id = $(this).attr("id");
        $.ajax({
            type: "GET",
            url: "index.php",
            data: { MODAL_PRODUCT_ID: product_id },
            success: function (response) {
                const product = JSON.parse(response);
                const properties = {
                    id: product.id,
                    name: product.name,
                    description: product.description,
                    product_type: product.product_type
                };
                
                const attributes = {};
                for (const key in product) {
                    if (!properties.hasOwnProperty(key)) {
                        attributes[key] = product[key];
                    }
                }

                $("#product-title").text(properties.name);
                $("#product-description").text(properties.description);
                $("#update").attr("href", 'edit.php?id=' + product_id);

                const labels = {
                    size: 'MB',
                    height: 'CM',
                    width: 'CM',
                    length: 'CM'
                };

                for (const key in attributes) {
                    const value = attributes[key];
                    const label = labels[key] || '';
                    const displayValue = `${value} ${label}`;

                    $('#product-attributes').append(`<p><strong>${key.charAt(0).toUpperCase() + key.slice(1)}:</strong> ${displayValue}</p>`);
                }
                $("#productModal").modal('show');
            }
        })

    })

})