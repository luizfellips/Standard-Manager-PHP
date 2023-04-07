<main>

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

        
        <select class="form-select" name="ProductType">
            <option selected>Select the product type</option>
            <option value="Book">Book</option>
            <option value="DVD">DVD</option>
            <option value="Furniture">Furniture</option>
        </select>

        <div class="form-group">
            <label>Author</label>
            <input type="text" class="form-control" name="Author">
        </div>
        <div class="form-group">
            <label>Genre</label>
            <input type="text" class="form-control" name="Genre">
        </div>




        <div class="form-group">
            <button type="submit" class="btn btn-success">Send</button>
        </div>

    </form>

</main>