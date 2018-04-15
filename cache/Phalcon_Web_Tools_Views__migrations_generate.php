<?php $this->_macros['input'] = function($__p = null) { if (isset($__p[0])) { $name = $__p[0]; } else { if (isset($__p["name"])) { $name = $__p["name"]; } else {  throw new \Phalcon\Mvc\View\Exception("Macro 'input' was called without parameter: name");  } } if (isset($__p[1])) { $placeholder = $__p[1]; } else { if (isset($__p["placeholder"])) { $placeholder = $__p["placeholder"]; } else { $placeholder = ''; } }  ?>
    <?php return $this->tag->textField([$name, 'class' => 'form-control', 'id' => $name, 'placeholder' => $placeholder]); ?><?php }; $this->_macros['input'] = \Closure::bind($this->_macros['input'], $this); ?><?php $this->_macros['input_disabled'] = function($__p = null) { if (isset($__p[0])) { $name = $__p[0]; } else { if (isset($__p["name"])) { $name = $__p["name"]; } else {  throw new \Phalcon\Mvc\View\Exception("Macro 'input_disabled' was called without parameter: name");  } }  ?>
    <?php return $this->tag->textField([$name, 'class' => 'form-control disabled', 'id' => $name, 'disabled' => 'disabled']); ?><?php }; $this->_macros['input_disabled'] = \Closure::bind($this->_macros['input_disabled'], $this); ?>
<div class="row">
    <div class="col-sm-12">
        <?= $this->getContent() ?>
        <?= $this->flashSession->output() ?>

        <div class="box box-success">
            <form role="form" class="form-horizontal" name="generate-migration" method="post" action="<?= $this->url->get('/webtools.php?_url=/migrations/generate') ?>">
                <div class="box-header with-border">
                    <p class="pull-left">New model will be placed at: [<?= $migration_path ?>]</p>
                    <?= $this->tag->submitButton(['Generate', 'class' => 'btn btn-success pull-right']) ?>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="oldVersion" class="col-sm-2 control-label">Current Version</label>
                        <div class="col-sm-10">
                            <?= $this->callMacro('input_disabled', ['oldVersion']) ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="version" class="col-sm-2 control-label">New version</label>
                        <div class="col-sm-10">
                            <?= $this->callMacro('input', ['version', 'Leave empty to automatically add new version']) ?>
                            <span class="help-block">Version to migrate</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tableName" class="col-sm-2 control-label">Table name</label>
                        <div class="col-sm-10">
                            <?= $this->tag->selectStatic(['tableName', $tables, 'useEmpty' => false, 'id' => 'tableName', 'class' => 'form-control']) ?>
                            <span class="help-block">Table to migrate. <em>Default: all</em></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="basePath" class="col-sm-2 control-label">Project Root</label>
                        <div class="col-sm-10">
                            <?= $this->callMacro('input', ['basePath', 'The absolute path to the project']) ?>
                            <span class="help-block">Directory where the project was created</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="migrationsDir" class="col-sm-2 control-label">Migrations Dir</label>
                        <div class="col-sm-10">
                            <?= $this->callMacro('input', ['migrationsDir', 'The absolute path to the model directory']) ?>
                            <span class="help-block">The absolute path to the migrations directory</span>
                        </div>
                    </div>

                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label for="exportData"><?= $this->tag->checkField(['exportData', 'value' => 1, 'id' => 'force']) . ' Export data' ?></label>
                        </div>
                    </div>

                    <div class="choose_type_data" id="choose_type_data" style="margin-right: -125px; display: none;">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="radio">
                                <label for="exportData">
                                    <input type="radio" name="exportDataType" value="oncreate"> oncreate
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="radio">
                                <label for="exportData">
                                    <input type="radio" name="exportDataType" value="always""> always
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label for="noAi"><?= $this->tag->checkField(['noAi', 'value' => 1, 'id' => 'force']) . ' Disable auto increment' ?></label>
                        </div>
                    </div>

                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label for="force"><?= $this->tag->checkField(['force', 'value' => 1, 'id' => 'force']) . ' Force' ?></label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
