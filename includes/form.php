<main>
    <script src="src\scripts\scripts.js"></script>


    

    <div class="container">
    <h2 class="mt-3 display-6">
        <?= TITLE ?>
    </h2>
    <form method="post">
        <div class="row p-4">
            <div class="col">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="Name"  required>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="Description" rows="6"  required></textarea>
                </div>


                <label for="ProductType">Type Switcher
                    <select class="form-select" name="ProductType" id="productType"
                        onChange="selectProductType(this.value);" required>
                        <option value="">Type Switcher</option>
                        <option value="DVD" id="DVD">DVD</option>
                        <option value="Book" id="Book">Book</option>
                        <option value="Furniture" id="Furniture">Furniture</option>
                       
                    </select></label>

                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-primary">Send</button>
                    <a href="index.php" class="link-danger px-2">Cancel</a>
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
           
        </div>


    </form>
    </div>
    

</main>