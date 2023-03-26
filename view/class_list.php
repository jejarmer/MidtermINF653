<?php include("header.php") ?>
<?php if ($classes) { ?>
    <section id="list" class="list">
        <header>
            <h2>Class List</h2>
        </header>
        <?php foreach ($classes as $m) : ?>
            <div class="list_row">
                <div class="list_items">
                    <p class="bold"><?= $m['class'] ?></p>
                </div>
                <div class="list_removed">
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_class">
                        <input type="hidden" name="class_id" value="<?= $m['class_id'] ?>">
                        <button class="remove-button">Remove Class</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
<?php } else { ?>
    <p>No Classes exist yet</p>
<?php } ?>
<section>
    <h2>Add Class</h2>
    <form action="." method="post" id="add_form" class="add_form">
        <input type="hidden" name="action" value="add_class">
        <div class="add_inputs">
            <input type="text" name="class" maxlength="30" placeholder="Class" autofocus required>
            <button class="bold">Add Class</button>
        </div>
    </form>
</section>
<section>
<a href=".?action=list_vehicles">View Vehicles</a>
<br />
<a href=".?action=list_types">View/Edit Types</a>
<br />
<a href=".?action=list_makes">View/Edit Makes</a>
</section>
<?php include("footer.php") ?>