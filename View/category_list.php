<?php include('header.php') ?>
<section>

    <?php if(!empty($results)) { ?>
        <section>
            <table>
                <?php foreach ($results as $result) : ?>
                <tr>
                    <td><?php echo $result['categoryID']; ?></td>
                    <td><?php echo $result['categoryName']; ?></td>
                    <td><form action="." method="post">
                        <input type="hidden" name="id" value="<?php echo $result['ItemNum']?>">
                        <input type="hidden" name='action' value="delete">
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
        <input type="hidden" name='action' value="insert">
        <label for="item">Item:</label>
        <input type="text" id="item" name="item" required>

        <label for="description">Description:</label>
        <input type="text" id="description" name="description" required>
        <button>Add Item</button>
    </form>
</section>
<?php include('footer.php') ?>