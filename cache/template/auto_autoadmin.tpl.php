<? include template('snippet/auto_header'); ?><script>
var AUTO_QUERY = <? echo json_encode($data['querydata']) ?>;
var AUTO_TABLEFIELD = <? echo json_encode($data['tablefield']) ?>;
</script>

<h2>
<a href="/auto/?id=<?=$data['querydata']['id']?>"><?=$data['title']?></a>
</h2>

<div style="margin:10px 0;">
<button type="button" class="btn btn-primary btn-sm" id="auto-btn-add">添加</button> &nbsp;
<button type="button" class="btn btn-info btn-sm" id="auto-btn-update">更新</button> &nbsp;
<button type="button" class="btn btn-default btn-sm" id="auto-btn-search">搜索</button> &nbsp;
<button type="button" class="btn btn-danger btn-sm" id="auto-btn-delete">删除</button> &nbsp;
</div>

<p class="text-muted">
<span class="bg-warning"><?=$data['sql']?></span>
</p><? if($data['groups']) { if(is_array($data['groups'])) { foreach($data['groups'] as $group) { ?>
<div style="margin-bottom:10px;"><?=$group['name']?> &nbsp;
<select class="form-control input-sm auto-group" data-field="<?=$group['field']?>" style="display: inline-block;width: 300px;">
<? if(is_array($group['value'])) { foreach($group['value'] as $v) { ?>
<option value="<?=$v['0']?>" <? if($group['default'] == $v['0']) { ?>selected<? } ?>><?=$v['1']?></option>
<? } } ?>
</select>
</div>
<? } } } ?><div id="new-row">
<table class="table table-bordered table-condensed"><? if($data['newrows']) { if(is_array($data['newrows'])) { foreach($data['newrows'] as $row) { ?>
<tr>
<td><?=$row['0']?></td>
<td><?=$row['1']?></td>
</tr>
<? } } ?>
<tr><td>&nbsp;</td><td><button class="btn btn-primary" id="new-row-add">提交</button> &nbsp;<button class="btn btn-info" id="new-row-cancel">取消</button></td></tr><? } ?></table>
</div>

<div id="data-rows"><? if($data['tablerows']) { ?><table class="table table-bordered table-condensed table-nonfluid">
<tr>
<th width="30px"><input type="checkbox" id="select-all" /></th>
<? if(is_array($data['tablefield'])) { foreach($data['tablefield'] as $field) { if($field['is_display'] == 1) { ?><th>
<span <? echo ($field['is_virtual'] ? 'style="color:#ec971f;"' : '') ?> title="<?=$field['field']?>">
<?=$field['name']?>
</span></th><? } } } ?>
</tr>
<? if(is_array($data['tablerows'])) { foreach($data['tablerows'] as $row) { ?>
<tr>
<td><input type="checkbox" class="select-row" value="<?=$row[$data['config']['primary_key']]?>" /></td>
<? if(is_array($data['tablefield'])) { foreach($data['tablefield'] as $field) { if($field['is_display'] == 1) { ?><td><? echo wei()->autofield->getFieldHtml($field['auto_type'], $field['auto_param'], $field['field'], isset($row[$field['field']]) ? $row[$field['field']] : '', $row, $row[$data['config']['primary_key']]); ?></td><? } } } ?>
</tr>
<? } } ?>
</table><? } else { ?><p class="bg-warning">暂无记录！</p><? } ?></div>

<iframe name="target-iframe" class="hide"></iframe><? if($data['has_richtext_field']) { ?><link rel="stylesheet" href="/static/lib/kindeditor/themes/default/default.css" />
<script src="/static/lib/kindeditor/kindeditor-all-min.js"></script>
<script src="/static/lib/kindeditor/lang/zh-CN.js"></script><? } if($data['has_timestamp_field']) { ?><link rel="stylesheet" href="/static/lib/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" />
<script src="/static/lib/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="/static/lib/bootstrap-datepicker/locales/bootstrap-datepicker.zh-CN.min.js"></script><? } if($data['has_datetime_field']) { ?><link rel="stylesheet" href="/static/lib/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" />
<script src="/static/lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script src="/static/lib/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js"></script><? } ?><script src="/static/lib/iframe-resizer/iframeResizer.contentWindow.min.js"></script>

<script src="/static/js/auto.json_parse.js"></script>
<script src="/static/lib/md5.js"></script>

<script src="/static/js/auto.admin.js"></script><? include template('snippet/auto_footer'); ?>