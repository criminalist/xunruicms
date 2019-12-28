<?php if ($fn_include = $this->_include("header.html")) include($fn_include); ?>

<div class="note note-danger">
    <p><?php echo dr_lang('更改系统配置之后需要重新生成一次缓存文件'); ?></p>
</div>

<div class="right-card-box">
<div class="table-scrollable">
<table class="table table-striped table-bordered table-hover table-checkable dataTable">
    <thead>
    <tr>
        <th width="55"> </th>
        <th width="350"> <?php echo dr_lang('更新项目'); ?> </th>
        <th> </th>
    </tr>
    </thead>
    <tbody>
    <?php if (is_array($list)) { $key_t=-1;$count_t=dr_count($list);foreach ($list as $id=>$t) { $key_t++; ?>
    <tr>
        <td>
            <span class="badge badge-success"> <?php echo $id+1; ?> </span>
        </td>
        <td>
            <?php echo dr_lang($t[0]); ?>
        </td>
        <td style="overflow:auto">
            <label>
                <a href="javascript:my_update_cache('<?php echo $id; ?>', '<?php echo $t[1]; ?>');" class="btn red btn-xs"><i class="fa fa-refresh"></i> <?php echo dr_lang('立即更新'); ?> </a>
            </label>
            <label id="dr_<?php echo $id; ?>_result" >

            </label>
        </td>
    </tr>
    <?php } } ?>

    </tbody>
</table>
</div>
</div>

<script>
    function my_update_cache(id, m) {
        var obj = $('#dr_'+id+'_result');
        obj.html("<img style='height:17px' src='<?php echo THEME_PATH; ?>assets/images/loading-0.gif' />");

        if (m == 'update_attachment') {
            my_update_attachment(id, 0);
        } else {
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "<?php echo SELF; ?>?c=api&m=cache&id="+m,
                success: function (json) {
                    if (json.code == 0) {
                        obj.html('<font color="red">'+json.msg+'</font>');
                    } else {
                        obj.html('<font color="green"><?php echo dr_lang("更新完成"); ?></font>');
                    }
                },
                error: function(HttpRequest, ajaxOptions, thrownError) {
                    obj.html('<a href="javascript:dr_show_file_code(\'<?php echo dr_lang('查看日志'); ?>\', \'<?php echo dr_url('error/log_show'); ?>\');" style="color:red"><?php echo dr_lang("系统崩溃, 请将错误日志发送给官方处理"); ?></a>');
                }
            });
        }


    }
    function my_update_attachment(id, page) {
        var obj = $('#dr_'+id+'_result');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "<?php echo SELF; ?>?c=api&m=cache&id=update_attachment&page="+page,
            success: function (json) {
                if (json.code == 0) {
                    obj.html('<font color="red">'+json.msg+'</font>');

                } else {
                    if (json.data == 0) {
                        obj.html('<font color="green">'+json.msg+'</font>');
                    } else {
                        my_update_attachment(id, json.data);
                        obj.html('<font color="blue">'+json.msg+'</font>');
                    }
                }
            },
            error: function(HttpRequest, ajaxOptions, thrownError) {
                obj.html('<a href="javascript:dr_show_file_code(\'<?php echo dr_lang('查看日志'); ?>\', \'<?php echo dr_url('error/log_show'); ?>\');" style="color:red"><?php echo dr_lang("系统崩溃, 请将错误日志发送给官方处理"); ?></a>');
            }
        });
    }
</script>
<?php if ($fn_include = $this->_include("footer.html")) include($fn_include); ?>