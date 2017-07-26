<div class="col-sm-3">
    <div class="well">Filters</div>
    <form action="index.php">
        <div class="well">
            <div class="form-group">
                <label for="category">Category</label>
                <input class="form-control" id="category" name="category"
                <?php if (isset($category)) echo "value=\"$category\"" ?>
                />
            </div>
        </div>
        <input type="submit" value="filter"/>
    </form>
</div>
