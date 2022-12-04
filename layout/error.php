<ul>
    <?php if (isset($error)): ?>
    <?php foreach ($error as $e): ?>
    <li class="text-danger">
        <?php echo $e ?>
    </li>
    <?php endforeach; ?>
    <?php endif; ?>
</ul>