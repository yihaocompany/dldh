<div class="row">
    <div class="col-sm-12">
        <?= $this->getContent() ?>
        <?= $this->flashSession->output() ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Migrations List</h3>
                <?= $this->tag->linkTo(['/webtools.php?_url=/migrations/generate', 'Generate', 'class' => 'btn btn-primary pull-right']) ?>
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Version</th>
                            <th>Migration</th>
                            <th>Size</th>
                            <th>Owner</th>
                            <th>Last modified</th>
                        </tr>
                    </thead>
                    <tbody><?php if (empty($migrations_dir)) { ?><tr class="warning">
                                <td colspan="1">
                                    <p class="text-center">
                                        Sorry, Phalcon WebTools doesn't know where the migrations directory is.<br>
                                        Please add the valid path for <code>migrationsDir</code>
                                        in the <code>application</code> section.
                                    </p>
                                </td>
                            </tr><?php } else { ?><?php foreach ($migrations as $version => $migration_files) { ?>
                                <?php $rowspan = count($migration_files); ?>
                                <?php $start = $rowspan > 1; ?>
                                <?php foreach ($migration_files as $file) { ?>
                                    <tr title="<?= $version ?>">
                                        <?php if ($rowspan <= 1) { ?>
                                            <th class="migration-version"><?= $version ?></th>
                                        <?php } else { ?>
                                            <?php if ($start == true) { ?>
                                                <th rowspan="<?= $rowspan ?>" class="migration-version"><?= $version ?></th>
                                                <?php $start = false; ?><?php } ?><?php } ?><td><?= $file->name ?></td>
                                        <td><?= $file->size ?> b</td>
                                        <td><?= $file->owner ?></td>
                                        <td><?= $file->modified_time ?></td>
                                    </tr>
                                <?php } ?>
                            <?php } ?><?php } ?></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
