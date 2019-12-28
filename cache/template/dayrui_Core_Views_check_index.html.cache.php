<?php if ($fn_include = $this->_include("header.html")) include($fn_include); ?>
<div class="note note-danger">
    <p><a href="javascript:dr_update_cache_all();"><?php echo dr_lang('更改数据之后请更新下全站缓存'); ?></a></p>
</div>

<div class="right-card-box">
<div class="table-scrollable">
<table class="table table-striped table-bordered table-hover table-checkable dataTable">
    <thead>
    <tr>
        <th width="55"> </th>
        <th width="300"> <?php echo dr_lang('检查项目'); ?> </th>
        <th> <?php echo dr_lang('检查结果'); ?> </th>
    </tr>
    </thead>
    <tbody>
    <?php if (is_array($list)) { $key_t=-1;$count_t=dr_count($list);foreach ($list as $id=>$t) { $key_t++; ?>
    <tr>
        <td>
            <span class="badge badge-success"> <?php echo $id; ?> </span>
        </td>
        <td>
            <?php echo $t; ?>
        </td>
        <td id="dr_<?php echo $id; ?>_result">
            <img style='height:17px' src='<?php echo THEME_PATH; ?>assets/images/loading-0.gif'>
        </td>
    </tr>
    <script>
        $(function () {
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "<?php echo dr_url('check/do_index'); ?>&id=<?php echo $id; ?>",
                success: function (json) {
                    $('#dr_<?php echo $id; ?>_result').html(json.msg);
                    if (json.code == 0) {
                        $('#dr_<?php echo $id; ?>_result').attr('style', 'color:red');
                    } else {
                        $('#dr_<?php echo $id; ?>_result').attr('style', 'color:green');
                    }
                },
                error: function(HttpRequest, ajaxOptions, thrownError) {
                    $('#dr_<?php echo $id; ?>_result').attr('style', 'color:red');
                    $('#dr_<?php echo $id; ?>_result').html('系统异常, 请检查错误日志');
                }
            });
        });
    </script>
    <?php } } ?>
    </tbody>
</table></div></div>





<?php if ($fn_include = $this->_include("footer.html")) include($fn_include); ?>