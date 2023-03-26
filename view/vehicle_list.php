<?php include('view/header.php'); ?>

<section id="list" class="list">
    <header>
    <h2>Class List</h2>
    </header>
    <form action="." method="get" id="list_header_select" class="list_header_select">
            <input type="hidden" name="action" value="list_items">
            <select name="type_id" required>
                <option value="0">View All Types</option>
                <?php foreach ($types as $t) : ?>
                    <?php if ($type_id == $t['type_id']) { ?>
                        <option value="<?= $t['type_id'] ?>" selected>
                        <?php } else { ?>
                        <option value="<?= $t['type_id'] ?>">
                        <?php } ?>
                        <?= $t['type'] ?>
                        </option>
                    <?php endforeach; ?>
            </select>
            <button>Go</button>
        </form>

        <form action="." method="get" id="list_header_select" class="list_header_select">
            <input type="hidden" name="action" value="list_items">
            <select name="class_id" required>
                <option value="0">View All Classes</option>
                <?php foreach ($classes as $c) : ?>
                    <?php if ($class_id == $c['class_id']) { ?>
                        <option value="<?= $c['class_id'] ?>" selected>
                        <?php } else { ?>
                        <option value="<?= $c['class_id'] ?>">
                        <?php } ?>
                        <?= $c['class'] ?>
                        </option>
                    <?php endforeach; ?>
            </select>
            <button>Go</button>
        </form>

        <form action="." method="get" id="list_header_select" class="list_header_select">
            <input type="hidden" name="action" value="list_items">
            <select name="make_id" required>
                <option value="0">View All Makes</option>
                <?php foreach ($makes as $m) : ?>
                    <?php if ($make_id == $m['make_id']) { ?>
                        <option value="<?= $m['make_id'] ?>" selected>
                        <?php } else { ?>
                        <option value="<?= $m['make_id'] ?>">
                        <?php } ?>
                        <?= $m['make'] ?>
                        </option>
                    <?php endforeach; ?>s   
            </select>
            <button>Go</button>
        </form>
        <form action="process.php" method="get">
  <label for="sortby">Sort By:</label>
  <input type="radio" id="sort_by_price" name="sort_by_price" value="price">
  <label for="sortby-price">Price</label>
  <input type="radio" id="sort_by_year" name="sort_by_year" value="year">
  <label for="sortby-year">Year</label>
  <input type="submit" value="Sort">
</form>
    <?php if ($items) {  ?>
        <?php foreach ($items as $items) : ?>
            <div>
                <div>
                    <p><?= $items['model'] ?></p>
                    <p><?= $items['year'] ?></p>
                    <p><?= $items['type'] ?></p>
                </div>
                <div>
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_item">
                        <input type="hidden" name="vehicle_id" value="<?= $items['vehicle_id'] ?>">
                        <button>Remove</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    <?php } else {  ?>
        <br>
        <?php if ($type_id) { ?>
            <p>No items exist for this type yet.</p>
        <?php } else { ?>
            <p>No items exist yet.</p>
        <?php } ?>
        <br>
    <?php } ?>
</section>

<section id="add" class="add">
    <h2>Add Vehicle</h2>
    
    <form action="." method="post" id="add_form" class="add_form">
        <input type="hidden" name="action" value="add_item">
        <div class="add_inputs">

        <label class ="bottom_label">Type</label>
            <select name="type_id" required>
                <option value="">Please Select</option>
                <?php foreach ($types as $t) : ?>
                    <option value="<?= $t['type_id'] ?>">
                        <?= $t['type']; ?>
                    </option>
                <?php endforeach; ?>
            </select>

        <br />
        <label class ="bottom_label">Class</label>
            <select name="class_id" required>
            <option value="">Please Select</option>
                <?php foreach ($classes as $c) : ?>
                    <option value="<?= $c['class_id'] ?>">
                        <?= $c['class']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        
        <br />
        <label class ="bottom_label">Make</label>
            <select name="make_id" required>
            <option value="">Please Select</option>
                <?php foreach ($makes as $m) : ?>
                    <option value="<?= $m['make_id'] ?>">
                        <?= $m['make']; ?>
                    </option>
                <?php endforeach; ?>
            </select>

            
            <br />
            <label class ="bottom_label">Model</label>
            <input class ="text_input" type="text" name="model" maxlength="20" placeholder="Model" required>
            <br />
            <label class ="bottom_label">Year</label>
            <input class ="text_input" type="text" name="year" maxlength="4" placeholder="Year" required>
            <br />
            <label class ="bottom_label">Price</label>
            <input class ="text_input" type="text" name="price" maxlength="10" placeholder="Price" required>
            <br />
            <button class="button_right">Add Vehicle</button>
            <br />
        </div>
 </form>
</section>
<section>
<a href=".?action=list_types">View/Edit Types</a>
<br />
<a href=".?action=list_classes">View/Edit Classes</a>
<br />
<a href=".?action=list_makes">View/Edit Makes</a>
</section>
<?php include('view/footer.php'); ?>