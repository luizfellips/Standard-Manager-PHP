<main>
<script src="src\scripts\dynamic_form.js"></script>
    <section>
        <a href="index.php">
            <button class="btn btn-success">Cancel</button>
        </a>
    </section>

    <h2 class="mt-3">
        <?= TITLE ?>
    </h2>


    <form method="post">

        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="Name">
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" name="Description" rows="5"></textarea>
        </div>


        <label for="ProductType">Type Switcher
            <select name="ProductType" id="productType" onChange="selectProductType(this.value);" required>
                <option value="">Type Switcher</option>
                <option value="DVD" id="DVD">DVD</option>
                <option value="Book" id="Book">Book</option>
                <option value="Furniture" id="Furniture">Furniture</option>
            </select></label>



        <div class="fieldbox" id="dvd_attributes" style="display: none;">
            <p>Specify the size of the DVD.</p>
            <label>Size(MB)<input type="number" name="Size" id="size"></label>
        </div>

        <div class="fieldbox" id="book_attributes" style="display: none;">
            <p>Please specify the author and the genre of the book.</p>
            <label>Author <input type="text" name="Author" id="author"></label>
            <label>Genre<input type="number" name="Genre" id="genre"></label>
        </div>

        <div class="fieldbox" id="furniture_attributes" style="display: none;">
            <p>Please provide the dimensions of the furniture.</p>

            <label>Height(CM) <input type="text" name="Height" id="height"></label>

            <label>Width(CM) <input type="text" name="Width" id="width"></label>

            <label>Length(CM) <input type="text" name="Length" id="length"></label>

        </div>




        <div class="form-group">
            <button type="submit" class="btn btn-success">Send</button>
        </div>

    </form>

</main>