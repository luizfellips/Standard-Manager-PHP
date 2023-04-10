<main>
    

    <h2 class="mt-3 mx-5 display-6">
        <?= TITLE ?>
    </h2>


    <form method="post">
        <div class="row p-4">
            <div class="col">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="Name" value="<?= $product->getName() ?>" required>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="Description" rows="6"
                        required><?= $product->getDescription() ?></textarea>
                </div>




                <div class="form-group m-3">
                    <button type="submit" class="btn btn-primary">Send</button>
                    <a href="index.php" class="link-danger pt-5 px-2">Cancel</a>
                </div>
            </div>

            <div class="col mb-4">
                <div class="fieldbox" id="dvd_attributes" style="display: none;">
                    <p>Specify the size of the DVD.</p>
                    <label>Size(MB)<input type="number" name="Size" id="size" class="form-control"></label>
                </div>

                <div class="fieldbox" id="book_attributes" style="display: none;">
                    <p>Please specify the author and the genre of the book.</p>
                    <label>Author <input type="text" name="Author" id="author" class="form-control"></label>
                    <label>Genre<input type="text" name="Genre" id="genre" class="form-control"></label>
                </div>

                <div class="fieldbox" id="furniture_attributes" style="display: none;">
                    <p>Please provide the dimensions of the furniture.</p>

                    <label>Height(CM) <input type="text" name="Height" id="height" class="form-control"></label>

                    <label>Width(CM) <input type="text" name="Width" id="width" class="form-control"></label>

                    <label>Length(CM) <input type="text" name="Length" id="length" class="form-control"></label>

                </div>
            </div>
            <script>
                $(document).ready(function () {
                    var product_type = "<?= $standard_product->getProducttype() ?>";
                    var id = product_type + "_attributes";
                    var element = document.getElementById(id.toLowerCase());
                    element.style.display = "block";
                    const attributes = {
                        'DVD': ['size'],
                        'Book': ['author', 'genre'],
                        'Furniture': ['height', 'width', 'length']
                    };

                    for (var i in attributes[product_type]) {

                        var attribute = attributes[product_type][i];
                        var attribute_element = document.getElementById(attribute);
                        attribute_element.setAttribute("required", "");
                        var method = "get" + (attribute.charAt(0).toUpperCase() + attribute.slice(1));
                        (function (i) {
                            $.ajax({
                                type: "POST",
                                url: "loadAttributes.php",
                                data: { data: [method, <?= $product->getId() ?>] },
                                success: function (response) {
                                    document.getElementById(attributes[product_type][i]).value = response;
                                }
                            });
                        })(i);
                    }
                })
            </script>
        </div>


    </form>

</main>