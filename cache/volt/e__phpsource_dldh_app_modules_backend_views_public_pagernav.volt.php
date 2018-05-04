<?php $disabled = 'ui-state-disabled'; ?>
<?php $disabledurl = 'javascript:void(0)'; ?>
<div id="mypagers">
    <div class="fg-toolbar ui-toolbar ui-widget-header ui-corner-bl ui-corner-br ui-helper-clearfix">
        <div class="dataTables_filter" id="DataTables_Table_0_filter"></div>
        <div class="dataTables_paginate fg-buttonset ui-buttonset fg-buttonset-multi ui-buttonset-multi paging_full_numbers" id="DataTables_Table_0_paginate">
            <a tabindex="0" href="<?php if ($first == 0) { ?><?= $disabledurl ?><?php } else { ?><?= $url ?><?= $first ?><?php } ?>" class="first ui-corner-tl ui-corner-bl fg-button ui-button ui-state-default <?php if ($first == 0) { ?><?= $disabled ?><?php } ?>" id="DataTables_Table_0_first">第1页</a>
            <a tabindex="0" href="<?php if ($pre == 0) { ?><?= $disabledurl ?><?php } else { ?><?= $url ?><?= $pre ?><?php } ?>" class="previous fg-button ui-button ui-state-default <?php if ($pre == 0) { ?><?= $disabled ?><?php } ?>" id="DataTables_Table_0_previous">上页</a><span>
                <?php $i = 0; ?>
                <?php foreach ($pager as $p) { ?>
                    <?php if ($i == 0) { ?>
                        <a href="javascript:void(0)" tabindex="0" class="fg-button ui-button ui-state-default ui-state-disabled"><?= $p ?></a>
                        <?php } else { ?>
                        <a href="<?= $url ?><?= $p ?>" tabindex="0" class="fg-button ui-button ui-state-default"><?= $p ?></a>
                    <?php } ?>
                    <?php $i = $i + 1; ?>
            <?php } ?>
            </span>
            <a tabindex="0" href="<?php if ($next == 0) { ?><?= $disabledurl ?><?php } else { ?><?= $url ?><?= $next ?><?php } ?>" class="next fg-button ui-button ui-state-default <?php if ($next == 0) { ?><?= $disabled ?><?php } ?>" id="DataTables_Table_0_next" >下页</a>
            <a tabindex="0" href="<?php if ($last == 0) { ?><?= $disabledurl ?><?php } else { ?><?= $url ?><?= $last ?><?php } ?>" class="last ui-corner-tr ui-corner-br fg-button ui-button ui-state-default  <?php if ($last == 0) { ?><?= $disabled ?><?php } ?> " id="DataTables_Table_0_last" >最后</a>
        </div>
    </div>
</div>