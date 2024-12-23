<div class="container card p-4 shadow-sm">
    <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-danger" role="alert">
            <?= htmlspecialchars($_GET['error']) ?>
        </div>
    <?php endif ?>
    <form method="POST">

        <?php if (isset($cuisine)): ?>
            <input type="hidden" name="id" value="<?= $cuisine['id'] ?>">
        <?php endif ?>

        <div class="mb-1">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $cuisine['name'] ?? '' ?>" required>
        </div>

        <div>
            <button type="submit" class="btn btn-success"><?= isset($cuisine) ? 'Update Cuisine' : 'Add Cuisine' ?></button>
        </div>
    </form>
</div>