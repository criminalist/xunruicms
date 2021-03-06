<?php if ($fn_include = $this->_include("header.html")) include($fn_include); ?>
<div class="note note-danger">
    <p><?php echo dr_lang('./cache/目录一定要有可写权限'); ?></p>
</div>
<form action="" class="form-horizontal" method="post" name="myform" id="myform">
<?php echo $form; ?>
    <div class="portlet bordered light myfbody">
        <div class="portlet-title tabbable-line">
            <ul class="nav nav-tabs" style="float:left;">
                <li class="<?php if ($page==0) { ?>active<?php } ?>">
                    <a href="#tab_0" data-toggle="tab" onclick="$('#dr_page').val('0')"> <i class="fa fa-cog"></i> <?php echo dr_lang('系统参数'); ?> </a>
                </li>
                <li class="<?php if ($page==1) { ?>active<?php } ?>">
                    <a href="#tab_1" data-toggle="tab" onclick="$('#dr_page').val('1')"> <i class="fa fa-expeditedssl"></i> <?php echo dr_lang('安全设置'); ?> </a>
                </li>
                <li class="<?php if ($page==2) { ?>active<?php } ?>">
                    <a href="#tab_2" data-toggle="tab" onclick="$('#dr_page').val('2')"> <i class="fa fa-code"></i> <?php echo dr_lang('API设置'); ?> </a>
                </li>
            </ul>
        </div>
        <div class="portlet-body">
            <div class="tab-content">

                <div class="tab-pane <?php if ($page==0) { ?>active<?php } ?>" id="tab_0">
                    <div class="form-body">
                        <?php if (!IS_DEV) { ?>
                        <div class="form-group">
                            <label class="col-md-2 control-label"><?php echo dr_lang('调试器'); ?></label>
                            <div class="col-md-9">
                                <input type="checkbox" name="data[SYS_DEBUG]" value="1" <?php if ($data['SYS_DEBUG']) { ?>checked<?php } ?> data-on-text="<?php echo dr_lang('开启'); ?>" data-off-text="<?php echo dr_lang('关闭'); ?>" data-on-color="success" data-off-color="danger" class="make-switch" data-size="small">
                                <span class="help-block"><?php echo dr_lang('用于后台启用DebugBar工具查看程序和SQL执行详情'); ?></span>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="form-group">
                            <label class="col-md-2 control-label"><?php echo dr_lang('操作日志'); ?></label>
                            <div class="col-md-9">
                                <input type="checkbox" name="data[SYS_ADMIN_LOG]" value="1" <?php if ($data['SYS_ADMIN_LOG']) { ?>checked<?php } ?> data-on-text="<?php echo dr_lang('开启'); ?>" data-off-text="<?php echo dr_lang('关闭'); ?>" data-on-color="success" data-off-color="danger" class="make-switch" data-size="small">
                                <span class="help-block"><?php echo dr_lang('多用户操作后台建议打开日志功能'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label"><?php echo dr_lang('内容临时存储'); ?></label>
                            <div class="col-md-9">
                                <input type="checkbox" name="data[SYS_AUTO_FORM]" value="1" <?php if ($data['SYS_AUTO_FORM']) { ?>checked<?php } ?> data-on-text="<?php echo dr_lang('开启'); ?>" data-off-text="<?php echo dr_lang('关闭'); ?>" data-on-color="success" data-off-color="danger" class="make-switch" data-size="small">
                                <span class="help-block"><?php echo dr_lang('发布内容临时存储, 再次发布时自动填充'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label"><?php echo dr_lang('栏目折叠显示'); ?></label>
                            <div class="col-md-9">
                                <input type="checkbox" name="data[SYS_CAT_ZSHOW]" value="1" <?php if ($data['SYS_CAT_ZSHOW']) { ?>checked<?php } ?> data-on-text="<?php echo dr_lang('开启'); ?>" data-off-text="<?php echo dr_lang('关闭'); ?>" data-on-color="success" data-off-color="danger" class="make-switch" data-size="small">
                                <span class="help-block"><?php echo dr_lang('适用于栏目数量过多时的折叠缩放显示效果'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label"><?php echo dr_lang('栏目目录允许重复'); ?></label>
                            <div class="col-md-9">
                                <input type="checkbox" name="data[SYS_CAT_RNAME]" value="1" <?php if ($data['SYS_CAT_RNAME']) { ?>checked<?php } ?> data-on-text="<?php echo dr_lang('开启'); ?>" data-off-text="<?php echo dr_lang('关闭'); ?>" data-on-color="success" data-off-color="danger" class="make-switch" data-size="small">
                                <span class="help-block"><?php echo dr_lang('栏目开启之后请不要使用目录作为伪静态关键字'); ?></span>
                            </div>
                        </div>
                        <?php if (dr_is_app('page')) { ?>
                        <div class="form-group">
                            <label class="col-md-2 control-label"><?php echo dr_lang('自定义页面目录允许重复'); ?></label>
                            <div class="col-md-9">
                                <input type="checkbox" name="data[SYS_PAGE_RNAME]" value="1" <?php if ($data['SYS_PAGE_RNAME']) { ?>checked<?php } ?> data-on-text="<?php echo dr_lang('开启'); ?>" data-off-text="<?php echo dr_lang('关闭'); ?>" data-on-color="success" data-off-color="danger" class="make-switch" data-size="small">
                                <span class="help-block"><?php echo dr_lang('[自定义页面插件]开启之后请不要使用目录作为伪静态关键字'); ?></span>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="form-group">
                            <label class="col-md-2 control-label"><?php echo dr_lang('系统风格目录的作用域'); ?></label>
                            <div class="col-md-9">
                                <input type="checkbox" name="data[SYS_THEME_ROOT]" value="1" <?php if ($data['SYS_THEME_ROOT']) { ?>checked<?php } ?> data-on-text="<?php echo dr_lang('相对'); ?>" data-off-text="<?php echo dr_lang('绝对'); ?>" data-on-color="success" data-off-color="danger" class="make-switch" data-size="small">
                                <span class="help-block"><?php echo dr_lang('选择绝对模式时, 多站点和THEME_PATH变量在引用风格时, 路径为主站URL'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label"><?php echo dr_lang('后台数据分页条数'); ?></label>
                            <div class="col-md-9">
                                <label><input class="form-control" type="text" name="data[SYS_ADMIN_PAGESIZE]" value="<?php echo $data['SYS_ADMIN_PAGESIZE']; ?>" ></label>
                                <span class="help-block"><?php echo dr_lang('例如文章每页显示的数量控制'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label"><?php echo dr_lang('系统通知邮箱'); ?></label>
                            <div class="col-md-5">
                                <input class="form-control input-large" type="text" name="data[SYS_EMAIL]" value="<?php echo $data['SYS_EMAIL']; ?>" >
                                <span class="help-block"><?php echo dr_lang('用于系统管理员接收消息的邮箱'); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane  <?php if ($page==1) { ?>active<?php } ?>" id="tab_1">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-2 control-label">HTTPS</label>
                            <div class="col-md-9">
                                <input type="checkbox" name="data[SYS_HTTPS]" value="1" <?php if ($data['SYS_HTTPS']) { ?>checked<?php } ?> data-on-text="<?php echo dr_lang('开启'); ?>" data-off-text="<?php echo dr_lang('关闭'); ?>" data-on-color="success" data-off-color="danger" class="make-switch" data-size="small">
                                <span class="help-block"><?php echo dr_lang('采用https地址模式, 需要网站支持https访问, 才能开启此功能'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label"><?php echo dr_lang('跨站验证'); ?></label>
                            <div class="col-md-9">
                                <input type="checkbox" name="data[SYS_CSRF]" value="1" <?php if ($data['SYS_CSRF']) { ?>checked<?php } ?> data-on-text="<?php echo dr_lang('开启'); ?>" data-off-text="<?php echo dr_lang('关闭'); ?>" data-on-color="success" data-off-color="danger" class="make-switch" data-size="small">
                                <span class="help-block"><?php echo dr_lang('开启跨站验证后将禁止外部站点向本站提交数据'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label"><?php echo dr_lang('登录验证码'); ?></label>
                            <div class="col-md-9">
                                <input type="checkbox" name="data[SYS_ADMIN_CODE]" value="1" <?php if ($data['SYS_ADMIN_CODE']) { ?>checked<?php } ?> data-on-text="<?php echo dr_lang('开启'); ?>" data-off-text="<?php echo dr_lang('关闭'); ?>" data-on-color="success" data-off-color="danger" class="make-switch" data-size="small">
                                <span class="help-block"><?php echo dr_lang('登录后台的验证码开关'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label"><?php echo dr_lang('快捷方式登录'); ?></label>
                            <div class="col-md-9">
                                <input type="checkbox" name="data[SYS_ADMIN_OAUTH]" value="1" <?php if ($data['SYS_ADMIN_OAUTH']) { ?>checked<?php } ?> data-on-text="<?php echo dr_lang('开启'); ?>" data-off-text="<?php echo dr_lang('关闭'); ?>" data-on-color="success" data-off-color="danger" class="make-switch" data-size="small">
                                <span class="help-block"><?php echo dr_lang('登录后台时使用快捷方式登录, 需要提前在用户设置中开通快捷登录参数'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label"><?php echo dr_lang('登录失败次数'); ?></label>
                            <div class="col-md-9">
                                <label><input class="form-control" type="text" name="data[SYS_ADMIN_LOGINS]" value="<?php echo intval($data['SYS_ADMIN_LOGINS']); ?>" ></label>
                                <span class="help-inline"> <?php echo dr_lang('后台登录失败N次后, 系统将锁定登录, 0表示不限制'); ?> </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label"><?php echo dr_lang('登录失败时限'); ?></label>
                            <div class="col-md-9">
                                <div class="input-inline input-medium">
                                    <div class="input-group">
                                        <input type="text" name="data[SYS_ADMIN_LOGIN_TIME]" value="<?php echo intval($data['SYS_ADMIN_LOGIN_TIME']); ?>" class="form-control">
                                        <span class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </span>
                                    </div>
                                </div>
                                <span class="help-inline"> <?php echo dr_lang('单位分钟, 后台登录失败锁定后在x分钟内禁止登录'); ?> </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label"><?php echo dr_lang('安全密钥'); ?></label>
                            <div class="col-md-9">
                                <label><input class="form-control input-large" type="text" name="data[SYS_KEY]" id="sys_key" value="<?php if ($data['SYS_KEY']) { ?>************<?php } ?>"  ></label>
                                <label><button class="btn btn-sm blue" type="button" name="button" onclick="dr_to_key()"> <?php echo dr_lang('重新生成'); ?> </button></label>
                                <span class="help-block"><?php echo dr_lang('密钥建议定期更换, 更换密钥之后本次登录将会自动退出'); ?></span>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="tab-pane  <?php if ($page==2) { ?>active<?php } ?>" id="tab_2">
                    <div class="form-body">

						<div class="form-group">
                            <label class="col-md-2 control-label"><?php echo dr_lang('验证图片验证码'); ?></label>
                            <div class="col-md-9">
                                <input type="checkbox" name="data[SYS_API_CODE]" value="1" <?php if ($data['SYS_API_CODE']) { ?>checked<?php } ?> data-on-text="<?php echo dr_lang('启用'); ?>" data-off-text="<?php echo dr_lang('禁用'); ?>" data-on-color="success" data-off-color="danger" class="make-switch" data-size="small">
                                <span class="help-block"><?php echo dr_lang('通过API提交数据, 发送短信验证码时, 禁用后不进行图片验证码的验证操作'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label"><?php echo dr_lang('百度地图Api-AK'); ?></label>
                            <div class="col-md-5">
                                <label><input class="form-control input-large" type="text" name="data[SYS_BDMAP_API]" value="<?php echo $data['SYS_BDMAP_API']; ?>"  ></label>
                                <label><a class="btn btn-sm blue" href="javascript:dr_help(584);"> <?php echo dr_lang('立即申请'); ?> </a></label>
                                <span class="help-block"><?php echo dr_lang('用于百度地图调用'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label"><?php echo dr_lang('百度自然语言处理-AK'); ?></label>
                            <div class="col-md-5">
                                <label><input class="form-control input-large" type="text" name="data[SYS_BDNLP_AK]" value="<?php echo $data['SYS_BDNLP_AK']; ?>"  ></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label"><?php echo dr_lang('百度自然语言处理-SK'); ?></label>
                            <div class="col-md-5">
                                <label><input class="form-control input-large" type="text" name="data[SYS_BDNLP_SK]" value="<?php echo $data['SYS_BDNLP_SK']; ?>"  ></label>
                                <label><a class="btn btn-sm blue" href="javascript:dr_help(810);"> <?php echo dr_lang('立即申请'); ?> </a></label>
                                <span class="help-block"><?php echo dr_lang('百度自然语言处理相关接口, 例如关键词获取等'); ?></span>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="portlet-body form myfooter">
        <div class="form-actions text-center">
            <button type="button" onclick="dr_ajax_submit('<?php echo dr_now_url(); ?>&page='+$('#dr_page').val(), 'myform', '2000')" class="btn green"> <i class="fa fa-save"></i> <?php echo dr_lang('保存'); ?></button>
        </div>
    </div>
</form>
<script type="text/javascript">
    function dr_to_key() {
        $.get("<?php echo dr_url('api/syskey'); ?>", function(data){
            $("#sys_key").val(data);
        });
    }
</script>
<?php if ($fn_include = $this->_include("footer.html")) include($fn_include); ?>