<?php include("header.php") ?>
<?php if ($types) { ?>
    <section id="list" class="list">
        <header>
            <h2>Type List</h2>
        </header>
        <?php foreach ($types as $t) : ?>
            <div class="list_row">
                <div class="list_items">
                    <p class="bold"><?= $t['type'] ?></p>
                </div>
                <div class="list_removed">
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_type">
                        <input type="hidden" name="type_id" value="<?= $t['type_id'] ?>">
                        <button class="remove-button">Remove Type</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
<?php } else { ?>
    <p>No Types exist yet</p>
<?php } ?>
<section>
    <h2>Add Type</h2>
    <form action="." method="post" id="add_form" class="add_form">
        <input type="hidden" name="action" value="add_type">
        <div class="add_inputs">
            <input type="text" name="type" maxlength="30" placeholder="Type" autofocus required>
            
            <button>Add Type</button>
        </div>
    </form>
</section>
<section>
<a href=".?action=list_vehicles">View/Edit Vehicles</a>
<br />
<a href=".?action=list_classes">View/Edit Classes</a>
<br />
<a href=".?action=list_makes">View/Edit Makes</a>
</section>
<?php include("footer.php") ?>