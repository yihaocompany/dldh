<?php $this->_macros['input'] = function($__p = null) { if (isset($__p[0])) { $name = $__p[0]; } else { if (isset($__p["name"])) { $name = $__p["name"]; } else {  throw new \Phalcon\Mvc\View\Exception("Macro 'input' was called without parameter: name");  } } if (isset($__p[1])) { $placeholder = $__p[1]; } else { if (isset($__p["placeholder"])) { $placeholder = $__p["placeholder"]; } else { $placeholder = ''; } }  ?>
    <?php return $this->tag->textField([$name, 'class' => 'form-control', 'id' => $name, 'placeholder' => $placeholder]); ?><?php }; $this->_macros['input'] = \Closure::bind($this->_macros['input'], $this); ?><?php $this->_macros['input_disabled'] = function($__p = null) { if (isset($__p[0])) { $name = $__p[0]; } else { if (isset($__p["name"])) { $name = $__p["name"]; } else {  throw new \Phalcon\Mvc\View\Exception("Macro 'input_disabled' was called without parameter: name");  } }  ?>
    <?php return $this->tag->textField([$name, 'class' => 'form-control disabled', 'id' => $name, 'disabled' => 'disabled']); ?><?php }; $this->_macros['input_disabled'] = \Closure::bind($this->_macros['input_disabled'], $this); ?>
<div class="row">
    <div class="col-sm-12">
        <?= $this->getContent() ?>
        <?= $this->flashSession->output() ?>

        <div class="box box-success">
            <form role="form" class="form-horizontal" name="generate-controller" method="post" action="<?= $this->url->get('/webtools.php?_url=/controllers/generate') ?>">
                <div class="box-header with-border">
                    <p class="pull-left"><?= $controller_name ?> - [<?= $controller_path ?>]</p>
                    <?= $this->tag->submitButton(['Generate', 'class' => 'btn btn-success pull-right']) ?>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Controller name</label>
                        <div class="col-sm-10">
                            <?= $this->callMacro('input', ['name', 'Class name without suffix eg. Users']) ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="namespace" class="col-sm-2 control-label">Namespace</label>
                        <div class="col-sm-10">
                            <?= $this->callMacro('input', ['namespace', 'eg. My\Awesome\Namespace']) ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="baseClass" class="col-sm-2 control-label">Base class</label>
                        <div class="col-sm-10">
                            <?= $this->callMacro('input', ['baseClass', 'eg. BaseController']) ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="basePath" class="col-sm-2 control-label">Project Root</label>
                        <div class="col-sm-10">
                            <?= $this->callMacro('input', ['basePath', 'The absolute path to the project']) ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="controllersDir" class="col-sm-2 control-label">Controller Directory</label>
                        <div class="col-sm-10">
                            <?= $this->callMacro('input', ['controllersDir', 'The absolute path to the controller directory']) ?>
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
