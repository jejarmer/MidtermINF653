<?php include("header.php") ?>
<?php if ($makes) { ?>
    <section id="list" class="list">
        <header>
            <h2>Make List</h2>
        </header>
        <?php foreach ($makes as $m) : ?>
            <div class="list_row">
                <div class="list_items">
                    <p class="bold"><?= $m['make'] ?></p>
                </div>
                <div class="list_removed">
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_make">
                        <input type="hidden" name="make_id" value="<?= $m['make_id'] ?>">
                        <button class="remove-button">Remove Make</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
<?php } else { ?>
    <p>No makes exist yet</p>
<?php } ?>
<section>
    <h2>Add Make</h2>
    <form action="." method="post" id="add_form" class="add_form">
        <input type="hidden" name="action" value="add_make">
        <div class="add_inputs">
            <input type="text" name="make" maxlength="30" placeholder="Make" autofocus required>
            <button class="bold">Add Make</button>
        </div>
    </form>
</section>
<section>
<a href=".?action=list_vehicles">View Vehicles</a>
<br />
<a href=".?action=list_types">View/Edit Types</a>
<br />
<a href=".?action=list_classes">View/Edit Classes</a>
</section>
<?php include("footer.php") ?>