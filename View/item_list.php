<?php include('header.php') ?>
<section>
<?php if(!empty($categories)) { ?>
<h2> Categories: </h2>
        <section>
            <table>
                <?php foreach ($categories as $cat) : ?>
                <tr>
                    <td><?php echo $cat['categoryName']; ?></td>
                    <td><form action="." method="post">
                        <input type="hidden" name="id" value="<?php echo $cat['categoryID']?>">
                        <input type="hidden" name='action' value="delete_category">
                        <input type="submit" value="Delete">
                    </form></td>
                </tr>
                <?php endforeach; ?>
            </table>
        <section>
    <?php } else { ?>
        <p>No categories exist yet.</p>
    <?php } ?>

    <h2> Add Description </h2>
    <form action="<?php echo $_SERVER ['PHP_SELF'] ?>" method = "POST">
        <input type="hidden" name='action' value="insert_category">
        <label for="item">Category:</label>
        <input type="text" id="cat" name="cat" required>

        <button>Add Category</button>
    </form>
    


    <?php if(!empty($results)) { ?>
        <section>
            <table>
                <?php foreach ($results as $result) : ?>
                <tr>
                    <td><?php echo $result['ItemNum']; ?></td>
                    <td><?php echo $result['Title']; ?></td>
                    <td><?php echo $result['Description']; ?></td>
                    <td><form action="." method="post">
                        <input type="hidden" name="id" value="<?php echo $result['ItemNum']?>">
                        <input type="hidden" name='action' value="delete_item">
                        <input type="submit" value="Delete">
                    </form></td>
                </tr>
                <?php endforeach; ?>
            </table>
        <section>
    <?php } else { ?>
        <p>No to do list items exist yet.</p>
    <?php } ?>

    <h2> Add Item </h2>
    <form action="<?php echo $_SERVER ['PHP_SELF'] ?>" method = "POST">
        <input type="hidden" name='action' value="insert_item">
        <label for="item">Item:</label>
        <input type="text" id="item" name="item" required>

        <label for="description">Description:</label>
        <input type="text" id="description" name="description" required>
        <button>Add Item</button>
    </form>
</section>
<?php include('footer.php') ?>